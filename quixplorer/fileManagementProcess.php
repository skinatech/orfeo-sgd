<?php

session_start();
error_reporting(7);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$dir_raiz = $_SESSION['dir_raiz'];
// JEG: Este man reporta localhost .. por eso lo quitamos
// $rutaHttpBase = $_SESSION['entidad_contacto'] . $_SESSION['ambiente'] ;
$rutaHttpBase = $_SESSION['url_raiz'];
/***
require_once("../../include/db/ConnectionHandler.php");
include "../../config.php";
$dbProcess = new ConnectionHandler("$dir_raiz");
$dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$dbProcess->conn->debug = false;

include_once("../../include/PHPMailer/class.phpmailer.php");

//Instancia de mail para realizar las notificaciones a los usuarios
$mail = new PHPMailer();

//Incluido el archivo que tiene la clase historico
include("../../include/tx/Historico.php");
$historiRecord = new Historico($dbProcess);
****/

$archivosPermitidos = array(
    // adobe
    'application/pdf' => [ 'pdf', 'Archivo PDF'],
    // ms office
    'application/msword' => [ 'doc', 'Microsoft Word'],
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => [ 'docx', 'Microsoft Word'],
    // open office
    'application/vnd.oasis.opendocument.text' => [ 'odt', 'Documento de texto OpenDocument'],
);

/*$archivosPermitidos = [
    $mime_types['pdf'][0], $mime_types['doc'][0], $mime_types['docx'][0], $mime_types['odt'][0], $mime_types['ods'][0]
];*/

//Lanzamiento automático inicial - listado de carpetas de orfeo
if (isset($_POST['type']) && $_POST['type'] == 100) {
    $selectCarpetasOrfeo = "";

    //$directorio = opendir("ovrimos_fetch_row(result_id)"); //ruta actual
    $directorio = opendir("orfeo"); //ruta actual
    
    $selectCarpetasOrfeo = "<select name='moduloAyuda' id ='moduloAyuda' class='select form-control'>";
    $selectCarpetasOrfeo .= "<option value='0'>-- Seleccione una opción --</option>";
    while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
    {
        if (!is_dir($archivo))//verificamos si es o no un directorio
        {
            $selectCarpetasOrfeo .= "<option value='" . $archivo . "'>" . $archivo . "</option>";
        }
    }
    $selectCarpetasOrfeo .= "</select>";
    
    echo $selectCarpetasOrfeo;
}

//consulta de archivos pertenecientes a la carpeta
if (isset($_POST['type']) && $_POST['type'] == 200 && isset($_POST['carpeta'])) {
    $tableFilesContent = "";
    $directorio = opendir('orfeo/' . $_POST['carpeta']); //ruta de plantillas

    $i = 0;
    while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
    {
        $rutaArchivo = 'orfeo/' . $_POST['carpeta'] . '/' . $archivo;
        $mostrarArchivo = true;

        if (!is_dir($archivo))//verificamos si es o no un directorio
        {
            $tipoArchivo = filetype('orfeo/' . $_POST['carpeta'] . '/' . $archivo);
            if ($tipoArchivo == 'dir') {
                $tipoArchivo = 'Directorio';
            } elseif ($tipoArchivo == 'file') {
                $mimeType = mime_content_type('orfeo/' . $_POST['carpeta'] . '/' . $archivo);
                if (in_array($mimeType, array_keys($archivosPermitidos))) {
                    $tipoArchivo = $archivosPermitidos[$mimeType][1];
                } else {
                    if (pathinfo('orfeo/' . $_POST['carpeta'] . '/' . $archivo, PATHINFO_EXTENSION) == 'docx') {
                        $tipoArchivo = 'Microsoft Word';
                    } else {
                        $mostrarArchivo = false;
                    }
                }
            } else {

            }

            /** Calcular peso del archvo */
            $pesoArchivo = filesize('orfeo/' . $_POST['carpeta'] . '/' . $archivo);
            $pesoArchivo = ($pesoArchivo / 1024);
            if ($pesoArchivo <= 1024) {
                $pesoArchivo = number_format($pesoArchivo, 2, '.', '') . ' KB';// ' bytes';
            } else {
                $pesoArchivo = ($pesoArchivo / 1024);
                $pesoArchivo = number_format($pesoArchivo, 2, '.', '') . ' MB';// ' bytes';
            }
            /** Fin Calcular peso del archvo */

            /** Consultar permisos del archivo */
            $permisos = fileperms('orfeo/' . $_POST['carpeta'] . '/' . $archivo);
            switch ($permisos & 0xF000) {
                case 0xC000: // Socket
                    $info = 's';
                    break;
                case 0xA000: // Enlace simbólico
                    $info = 'l';
                    break;
                case 0x8000: // Normal
                    $info = 'r';
                    break;
                case 0x6000: // Bloque especial
                    $info = 'b';
                    break;
                case 0x4000: // Directorio
                    $info = 'd';
                    break;
                case 0x2000: // Carácter especial
                    $info = 'c';
                    break;
                case 0x1000: // Tubería FIFO pipe
                    $info = 'p';
                    break;
                default: // Desconocido
                    $info = '-';
            }

            // Propietario
            $info .= (($permisos & 0x0100) ? 'r' : '-');
            $info .= (($permisos & 0x0080) ? 'w' : '-');
            $info .= (($permisos & 0x0040) ? (($permisos & 0x0800) ? 's' : 'x' ) : (($permisos & 0x0800) ? 'S' : '-'));

            // Grupo
            $info .= (($permisos & 0x0020) ? 'r' : '-');
            $info .= (($permisos & 0x0010) ? 'w' : '-');
            $info .= (($permisos & 0x0008) ? (($permisos & 0x0400) ? 's' : 'x' ) : (($permisos & 0x0400) ? 'S' : '-'));

            // Mundo
            $info .= (($permisos & 0x0004) ? 'r' : '-');
            $info .= (($permisos & 0x0002) ? 'w' : '-');
            $info .= (($permisos & 0x0001) ? (($permisos & 0x0200) ? 't' : 'x' ) : (($permisos & 0x0200) ? 'T' : '-'));
            /** Fin Consultar permisos del archivo */

            // Imprimir archivos que se pueden mostrar
            if ($mostrarArchivo == true) {
                $i++;
                $tableFilesContent .= "<tr>";
                // $tableFilesContent .= "<td><input type='checkbox' name='" . $archivo . "' class='inputCheckboxFile' /></td>";
                $tableFilesContent .= "<td>" . $i . "</td>";
                $tableFilesContent .= "<td>" . $archivo . "</td>";
                $tableFilesContent .= "<td>" . $pesoArchivo . "</td>";
                $tableFilesContent .= "<td>" . $tipoArchivo . "</td>";
                $tableFilesContent .= "<td>" . date ("Y/m/d H:i", filemtime($rutaArchivo)) . "</td>";
                $tableFilesContent .= "<td>" . $info . "</td>";
                
                $tableFilesContent .= "<td>" . "<a href='" . $rutaArchivo . "' target='_blank'>Descargar</a>&nbsp; " . " &nbsp;";
                
                if($_SESSION["rol"] == 2){                    
                    $tableFilesContent .= "<a style='cursor: pointer;' onclick=deleteFile('" . $_POST['carpeta'] . "/" . $archivo . "')>Eliminar</a>" . "</td>";
                }
                
                $tableFilesContent .= "</tr>";
            }
        }
    }
    echo $tableFilesContent;
}

//Subida de archivo
if (isset($_POST['type']) && $_POST['type'] == 300) {
    
    //var_dump($_FILES);
    // //echo $_POST;
    //var_dump($_POST);

    if (isset($_FILES["subirArchivo"]) && isset($_POST['carpeta']) && $_POST['carpeta'] != '0') {

        if ($_FILES["subirArchivo"]["name"]) {
            $filename = $_FILES["subirArchivo"]["name"]; //Obtenemos el nombre original del archivo
            $filename = str_replace(" ", "_", $filename);
            $source = $_FILES["subirArchivo"]["tmp_name"]; //Obtenemos un nombre temporal del archivo
    
            $directorio = $_SESSION['dir_raiz'] . '/quixplorer/orfeo/' . $_POST['carpeta'];
    
            $dir = opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if (move_uploaded_file($source, $target_path)) {
                closedir($dir); //Cerramos el directorio de destino
                header('Location: ' . $rutaHttpBase . '/index.php?errorUploadFile=false');
            } else {
                closedir($dir); //Cerramos el directorio de destino
                header('Location: ' . $rutaHttpBase . '/index.php?errorUploadFile=true');
            }
        
        } else {
            header('Location: ' . $rutaHttpBase . '/index.php?errorUploadFile=true');
        }

    } else {

        header('Location: ' . $rutaHttpBase . '/index.php?errorUploadFile=true');

    }

}

//Eliminación de archivo
if (isset($_POST['type']) && $_POST['type'] == 400) {
    if (isset($_POST['file']) && $_POST['file'] != '') {
        
        if ( file_exists($_SESSION['dir_raiz'] . '/quixplorer/orfeo/' . $_POST['file']) ) {
            $rutaArchivo = $_SESSION['dir_raiz'] . '/quixplorer/orfeo/' . $_POST['file'];
            unlink($rutaArchivo);
        }
        echo "Archivo Eliminado";
    } else {
        echo "Debe seleccionar el archivo";
    }
}
?>
