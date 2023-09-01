<?php
/**
 * En este frame se van cargado cada una de las funcionalidades del sistema
 *
 * Descripcion Larga
 *
 * @category
 * @package      SGD Orfeo
 * @subpackage   Main
 * @author       Community
 * @author       Skina Technologies SAS (http://www.skinatech.com)
 * @license      GNU/GPL <http://www.gnu.org/licenses/gpl-2.0.html>
 * @link         http://www.orfeolibre.org
 * @version      SVN: $Id$
 * @since
 */
/* ---------------------------------------------------------+
  |                     INCLUDES                             |
  +--------------------------------------------------------- */


/* ---------------------------------------------------------+
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
session_start();
$url_raiz = $_SESSION['url_raiz'];
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$depeNomb = $_SESSION["depe_nomb"];
$abreviatura = $_SESSION["abreviatura"];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
/**
 * Pagina Realiza la radicacion de Documentos.
 * hay dos opciones ODT que realiza el mismo servidor para lo cual es requerido librerias xml
 * 
 * Se añadio compatibilidad con variables globales en Off
 * @autor Jairo Losada 2009-05
 * @licencia GNU/GPL
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

$assoc = $_SESSION['assoc'];
define('ADODB_ASSOC_CASE', $assoc);

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

$krd = $_SESSION["krd"];
$depe_codi = $_SESSION["depecodi"];
$usua_codi = $_SESSION["codusuario"];
$usua_doc = $_SESSION["usua_doc"];
$usua_nomb = $_SESSION["usua_nomb"];
$firmas_qr = $_SESSION["firma_qr"];
$msj = '';

if (!$dir_raiz)
    $dir_raiz = ".";
include("$dir_raiz/config.php");
if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";
if (isset($db))
    unset($db);
include_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$dir_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$sqlFechaHoy = $db->conn->OffsetDate(0, $db->conn->sysTimeStamp);
// $db->conn->debug=true;

//Convinacion de variables 
require_once '../include/phpword/PHPWord.php';

$sqlF = " select firma_qr, descarga_arc_original from usuario where usua_login ='".$_SESSION['krd']."' ";
$rsF = $db->conn->Execute($sqlF);

if( $rsF->fields["FIRMA_QR"] == 1) {

    include('../include/phpqrcode/lib/full/qrlib.php');
    // require_once('../include/fpdf18/fpdf.php');
    // require_once('../include/fpdi1.6.2/fpdi.php');

    $fecha = date('Ymd').'T'.date('Hi00');
    $data  = '<b>URL: '.$entidad_contacto.$ambiente.'/consultaFirmaqr/index.php?radicado='.base64_encode($num_radi_salida).' <br>';

    // Ruta donde se guardara el codigo QR
    $filename_qr = $dir_raiz.'/bodega/firmasqr/QR'.$num_radi_salida.'.png';

    // Ruta donde toma el archivo a editar
    $linkarchivo = str_replace('./', '', $linkarchivo );
    $filename_pdf = $dir_raiz.'/'.$linkarchivo;

    $nombre_archivoArray = explode('/', $linkarchivo);
    $nombreArchivo = $nombre_archivoArray[4];

    // Exporta el QR en la carpeta de bodega QR 
    QRcode::png( $data, $filename_qr );

    if(is_file( $filename_qr ) ){

        /*** Consulta que toma el "Documento Orginal" ***/
        $sqlDO = "SELECT anex_nomb_archivo_orig FROM anexos WHERE radi_nume_salida = '".$num_radi_salida."' ";
        $rsDO = $db->query($sqlDO);

        /*** se construye el archivo con la ruta y el nombre del achivo oiginal ***/
        $arr_filename_pdf = substr($filename_pdf, 0, -4 );
        // print_r($arr_filename_pdf);
        $arr_filename_ori = explode('.', $rsDO->fields['ANEX_NOMB_ARCHIVO_ORIG']);
        // print_r($arr_filename_ori);
        /*
        * $arr_filename_pdf[0] Contiene la ruta y nombre del archivo
        * $arr_filename_ori[1] Contiene la extension del archivo
        */
        $filename_ori = $arr_filename_pdf.'.'.$arr_filename_ori[1];
        /*** Validamos si existe el archivo original ***/
        if(is_file($filename_ori)){

            /*** Se agrega la imagen de la firma ***/
            $PHPWord = new PHPWord();
            $document = $PHPWord->loadTemplate($filename_ori);
            #reemplaza una variable con una imagen
            $aImgs = array(
                array(
                    'img' => $filename_qr,
                    'size' => array(80, 80)
                )
            );

            // Cambia las variables  *VARIABLE* estas se deben de pegar en la plantilla sin ningun formato luego se les puede dar el formato que necesiten
            $document->replaceStrToImg( 'FIRMA_QR', $aImgs );
            $document->setValue( 'FIRMA_USUARIO', strtoupper($_SESSION["usua_nomb"]) );
            $document->save($filename_ori.'QR');


            /*** Se convierte con la libreria UNOCON un archivo en PDF ***/
            exec('unoconv -f pdf -o "'.$filename_pdf.'" "'.$filename_ori.'QR" ');
            /*** Se elimina el archivo finalizado en QR ya que es temporal ***/
            exec(' rm '.$filename_ori.'QR ' );

        }else{
            die("<span class='etextomenu'><b>No se encontro el documento original </span><BR>");
        }

    }else{
        die("<span class='etextomenu'><b>No se generó QR </span><BR>");
    }

    if(is_file( $filename_pdf )){

        // $estado = exec(' mv '.$nombreArchivo.' '.$filename_pdf );
        
        $sqlF = "insert into sgd_firmas_qr (radi_nume_radi, usua_login, usua_nomb, usua_doc, depe_codi, usua_codi, permiso_firma, firma_fecha )
                
            VALUES ('".$num_radi_salida."', '".$krd."', '".$usua_nomb."', '".$usua_doc."', '".$depe_codi."', ".$usua_codi.", ".$firmas_qr.", ".$sqlFechaHoy." )";

        $sqlR = "UPDATE anexos SET doc_firmado_qr = '1' WHERE radi_nume_salida = '".$num_radi_salida."' ";

        $rsF = $db->query($sqlF);
        $rsR = $db->query($sqlR);

        if (!$rsF) {
            $db->RollbackTrans();
            die("<span class='etextomenu'>No se pudo insertar en la tabla de firmas qr. </span>");
        }else{

            if (!$rsR) {
                $db->conn->RollbackTrans();
                die("<span class='etextomenu'>No se pudo actualizar la firmas qr en el radicado: ".$num_radi_salida.'. </span>');
            }else{

                include_once "$dir_raiz/include/tx/Historico.php";
                
                // Si $num_radi_salida == $radicar_documento significa que es un radicado de salida //
                if( $num_radi_salida == $radicar_documento ){
                    $radicados[] = $num_radi_salida;
                }else{
                    $radicados[] = $num_radi_salida;
                    $radicados[] = $radicar_documento;
                }

                $codTx = 67;
                $observacion = 'Se firmó el documento con el radicado '.$num_radi_salida ;
                $hist = new Historico($db);
                
                $hist->insertarHistorico($radicados, $depe_codi, $usua_codi, $depe_codi, $usua_codi, $observacion, $codTx );

                $msj ='Se firmo correctamente el radicado '. $num_radi_salida.' <br><br>';
                
                $selectCorreo = "select dir.sgd_dir_mail,ra.radi_envio_correo from anexos an inner join sgd_dir_drecciones dir on an.anex_radi_nume=dir.radi_nume_radi inner join radicado ra on ra.radi_nume_radi=an.anex_radi_nume where an.radi_nume_salida='$num_radi_salida'";
                $rsSelectCorreo = $db->query($selectCorreo);
                
                if( $rsSelectCorreo->fields['RADI_ENVIO_CORREO'] == 't'){
                    include './mailInformar.php';
                    
                    if($envioOk){
                        $msj .= $mensajeErrorCorreo;
                        $isql = "update ANEXOS  set ANEX_ESTADO=4,SGD_FECH_IMPRES= " . $db->conn->OffsetDate(0, $db->conn->sysTimeStamp) . ", ANEX_FECH_ENVIO=" . $db->conn->OffsetDate(0, $db->conn->sysTimeStamp) . ",SGD_DEVE_FECH = NULL, SGD_DEVE_CODIGO=NULL where RADI_NUME_SALIDA ='$num_radi_salida'  and sgd_dir_tipo <>7  and anex_estado=2";
                        $rsUpdate = $db->query($isql);
                            
                        $hist->insertarHistorico($radicados, $depe_codi, $usua_codi, $depe_codi, $usua_codi, $mensajeErrorCorreo, 71 );
                    }
                    
                }              
            } 

        }

    }else{
        $msj = 'No existe archivo <br>';
    }
}else{
    $msj = 'No tiene permisos para firmar <br>';
}

?>

<head>
    <title>SGD Orfeo 5 </title>
    <link rel="stylesheet" href="../estilos_totales.css">
</head>

<body>
    <center>
        <br>
        <br>
        <font size='3' color='#000000'>
            <span class='etextomenu'><b><?= $msj ?><BR>
            <a class='vinculos' href="../verradicado.php?<?= session_name().'='.session_id().'&krd='.$krd ?>&verrad=<?= $num_radi_salida ?>&menu_ver_tmp=2&verrad=<?= $radicar_documento ?>">Volver al radicado <?= $num_radi_salida ?></a></b></span>
        </font>
    </center>
</body>