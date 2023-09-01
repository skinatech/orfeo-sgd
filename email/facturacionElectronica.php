<?php
//echo 'entro a facturacion electronica';

include '../config.php' ;   // configuracion general
include 'email.inc.php' ;
include 'connectIMAP.php';           // Conecta a servidor correo

session_start();
if(!isset($_SESSION['krd'])) include "../rec_session.php";

foreach ($_GET as $key => $valor)  ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor;

if (!$ruta_raiz) $ruta_raiz = "..";

set_include_path(".:/usr/share/php:/usr/share/pear");

$folder = $_GET['folder'];
$msgno = $_GET['msgno'];
$numadj = $_GET['numadj'];

$emailInfo = $msg->getEmailInfo($msgno, $folder);

$emailAttachments = $emailInfo['emailAttachments'];

foreach($emailAttachments as $attachment){
    if(strripos($attachment['filename'],'.zip')){
        $emailAttachment = $attachment;
        $numadj = $emailAttachment['id'];
        break;
    }
}
//si el adjunto viene con un slash lanza un error al intentar crear una 
//carpeta, se toma la ultima parte para crear la carpeta
$fnameAttachArray = explode('/', $emailAttachment['filename']);
$fnameAALength = count($fnameAttachArray);

$fnameAttachment = $fnameAttachArray[$fnameAALength - 1];

$fileUriStr = "$dir_raiz/bodega/tmp/$fnameAttachment";

$file = fopen($fileUriStr, 'w+');
fputs($file, imap_base64($emailAttachment['attachment']));
fclose($file);

//obtener información sobre el tipo de archivo
$fileRoute = '../bodega/tmp/'. $fnameAttachment;
$fileInfo = pathinfo($fileRoute);

//descomprimir el archivo y guardarlo en una carpeta
//validando que sea zip

if($fileInfo['extension'] == 'zip' || $fileInfo['extension'] == 'ZIP'){
    $zip = new ZipARchive();
    if($zip->open($fileRoute)){
        $dirExtract = '../bodega/tmp/unzip/'. $fileInfo['filename'];
        try{
            $zip->extractTo($dirExtract);
        }catch (\Throwable $th) {
            var_dump($th);
        }
        
        $zip->close();
        //variable que se utiliza para pasar el nombre de la carpeta por las rutas 
        //hasta llegar a la inclusión de anexo
        $unzipFolder = $fileInfo['filename'];
        //escanear la carpeta para traer los archivos
        $filesExtracted = scandir($dirExtract);
        if(count($filesExtracted) <= 2){
            die('No se cargaron los archivos en el directorio '. $fileRoute);
        }
        // se restan las carpetas . y ..
        $cantidadAnexos = count($filesExtracted)-2;
        //buscar si en la carpeta existe un XML
        $fileXMLRequired = '';
        foreach($filesExtracted as $key => $value){
            if(stristr($value, '.xml') || stristr($value, '.XML')){
                $fileXMLRequired = $value;
                break;
            }
        }
        //si existe un xml se procesa
        if($fileXMLRequired !== ''){
            
            $fileXMLRoute = $dirExtract . '/'. $fileXMLRequired;
            
            $xmlContent = file_get_contents($fileXMLRoute);
            
            require_once('../facturacionElectronica/supplierInfo.php');

            $xml = new SupplierInfo($fileXMLRoute);
            $supplier = $xml->readInfoCdata();

            require_once('../facturacionElectronica/dataModel.php');
            $dataModel = new DataModel();
            //buscar si existe el nit o la razón social de la empresa
            $remitente = $dataModel->searchRemitente($supplier['razon_social'], $supplier['nit']);
            //sino existe insertar la información
            if(!$remitente){
                $dataModel->insertRemitente($supplier);
                 //obtener la información de la empresa para pasar al formulario de radicación
                $remitente = $dataModel->searchRemitente($supplier['razon_social'], $supplier['nit']);
            }
            
        }else{
            die('no se encontró un archivo XML válido');
        }
        

    }else{
        die('Ocurrio un problema al intentar descomprimir el archivo');
    }
}else{
    die('no es un archivo .zip');
}