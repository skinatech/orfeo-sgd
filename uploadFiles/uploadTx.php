<?php
/**
 * En este frame se van cargado cada una de las funcionalidades del sistema
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
|                    DEFINICIONES                          |
+--------------------------------------------------------- */
session_start();
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];
/* ---------------------------------------------------------+
|                       MAIN                               |
+--------------------------------------------------------- */
/*
 * Lista Subseries documentales
 * @autor Jairo Losada SuperSOlidaria
 * @fecha 2009/06 Modificacion Variables Globales.
 */
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";
foreach ($_GET as $key => $valor) { ${$key} = $valor;}
foreach ($_POST as $key => $valor) { ${$key} = $valor;}

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$valRadio = $_POST['valRadio'];
//$db->conn->debug =true;

/**
 * Retorna la cantidad de bytes de una expresion como 7M, 4G u 8K.
 * @param char $var
 * @return numeric
 */
function return_bytes($val)
{
    $val = trim($val);
    $ultimo = strtolower($val{strlen($val) - 1});
    switch ($ultimo) { // El modificador 'G' se encuentra disponible desde PHP 5.1.0
        case 'g':$val *= 1024;
        case 'm':$val *= 1024;
        case 'k':$val *= 1024;
    }
    return $val;
}
?>
<html>
    <head>
        <title>Realizar Transaccion - Orfeo </title>
        <link href="<?=$url_raiz . $ESTILOS_PATH2?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?=$url_raiz . $_SESSION['ESTILOS_PATH_ORFEO']?>">
    </head>
    <?php
    /**
     * Inclusion de archivos para utilizar la libreria ADODB
     */
    define('ADODB_ASSOC_CASE', $assoc);
    include_once "$dir_raiz/include/db/ConnectionHandler.php";
    $db = new ConnectionHandler("$dir_raiz");
    //$db->conn->debug =true;

    /* Genreamos el encabezado que envia las variable a la paginas siguientes.*/
    $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion";

    if ($checkValue) {
        $num = count($checkValue);
        $i = 0;
        while ($i < $num) {
            $record_id = key($checkValue);
            $setFiltroSelect .= $record_id;
            $radicadosSel[] = $record_id;
            if ($i <= ($num - 2)) {
                $setFiltroSelect .= ",";
            }
            next($checkValue);
            $i++;
        }
        if ($radicadosSel) {
            $whereFiltro = " and b.radi_nume_radi in($setFiltroSelect)";
        }
    }
    if ($setFiltroSelect) {
        $filtroSelect = $setFiltroSelect;
    }

    echo $filtroSelect;
    $causaAccion = "Asociar Imagen a Radicado";
    ?>
    <body>
        <br>
        <?php
            /** Aqui se intenta subir el archivo al sitio original **/
            include "$dir_raiz/include/upload/upload_class.php"; //classes is the map where the class file is stored (one above the root)
            $max_size = return_bytes(ini_get('upload_max_filesize')); // the max. size for uploading
            $my_upload = new file_upload;
            $my_upload->language = "es";
            $my_upload->upload_dir = "$dir_raiz/bodega/tmp/"; // "files" is the folder for the uploaded files (you have to create this folder)
            $my_upload->extensions = array(".pdf"); // array en donde valida los tipos de imagenes que se puede asociar a un radicado
            $my_upload->max_length_filename = 50; // change this value to fit your field length in your database (standard 100)
            $my_upload->rename_file = true;

            if (isset($_POST['Realizar'])) {

                $tmpFile = trim($_FILES['upload']['name']);
                $newFile = $valRadio;
                $uploadDir = "$dir_raiz/bodega/" . substr($valRadio, 0, 4) . "/" . substr($valRadio, 4, $longitud_codigo_dependencia) . "/";
                $fileGrb = substr($valRadio, 0, 4) . "/" . substr($valRadio, 4, $longitud_codigo_dependencia) . "/$valRadio" . "." . substr($tmpFile, -3);
                $my_upload->upload_dir = $uploadDir;

                $my_upload->the_temp_file = $_FILES['upload']['tmp_name'];
                $my_upload->the_file = $_FILES['upload']['name'];
                $my_upload->http_error = $_FILES['upload']['error'];
                $my_upload->replace = (isset($_POST['replace'])) ? $_POST['replace'] : "n"; 
                $my_upload->do_filename_check = (isset($_POST['check'])) ? $_POST['check'] : "n";

                if ($my_upload->upload($newFile)) {
                    
                    $full_path = $my_upload->upload_dir . $my_upload->file_copy;
                    $info = $my_upload->get_uploaded_file_info($full_path);

                    if ($info) { //Si intento anexar archivo y Subio correctamente

                        $sqlUsuarioRadicado = "select ra.radi_usua_actu, ra.radi_depe_actu, us.usua_login, us.usua_email from radicado ra inner join usuario us ON (ra.radi_usua_actu=us.usua_codi and ra.radi_depe_actu=us.depe_codi) where radi_nume_radi ='" . $valRadio . "'";
                        $siNotifica = $db->conn->query($sqlUsuarioRadicado);

                        $db->conn->CommitTrans();

                        try {
                            /* Se elimina el anexo en la tabla datos ocr y se agrega
                            * este al listado de documentos a eliminar
                            */
                            $existeIndice = $db->conn->query("select indice from datosocr where nume_radi='$valRadio'");
                            if (!$existeIndice->EOF && $existeIndice->fields[0] != '') {
                                $queryEliminaIndice = "delete from datosocr where indice='" . $existeIndice->fields[0] . "' ";
                                $queryColaEliminaIndice = "insert into sphinx_index_remove "
                                . "(indice,estado,fecha_creacion,identificador) values "
                                . "(" . $existeIndice->fields[0] . ",1,'" . date('Y-m-d H:i:s') . "','" . $valRadio . "')";

                                $db->conn->execute($queryEliminaIndice);
                                $db->conn->execute($queryColaEliminaIndice);
                            }
                        } catch (Exception $ex) {
                            error_log("#### Error ejecutando supresión de indice" . $ex);
                        }
                    } else {
                        $resp1 = "ERROR";
                        $db->conn->RollbackTrans();
                    }

                } else {
                    die("<table class=borde_tab><tr><td class=titulosError>Ocurrio un Error la Fila no fue cargada Correctamente <p>" . $my_upload->show_error_string() . "<br><blockquote>" . nl2br($info) . "</blockquote></td></tr></table>");
                }
            }
        ?>
        <center>
            <div id="titulo" style="width: 60%;" align="center">Acci&oacute;n requerida --> <?=$causaAccion?> </div>
            <table cellspace=2 WIDTH=60% id=tb_general border="1" class="borde_tab">
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">acci&oacute;n requerida :
                    </td>
                    <td  width="65%" height="25" class="listado2">
                        Asociaci&oacute;n de imagen a radicado
                    </td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Radicados involucrados :
                    </td>
                    <td  width="65%" height="25" class="listado2"><?=$valRadio?>
                    </td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Confirmación :
                    </td>
                    <td  width="65%" height="25" class="listado2">Se envio notificación al usuario actual del radicado registrado con el correo <b> <?=$siNotifica->fields['USUA_EMAIL']?> </b> 
                    </td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Datos fila asociada :
                    </td>
                    <td  width="65%" height="25" class="listado2">
                        <?=$info?>
                    </td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Fecha y hora :
                    </td>
                    <td  width="65%" height="25" class="listado2">
                        <?php
                        date_default_timezone_set("America/Bogota");
                        ?>
                        <?=date("m-d-Y H:i:s")?>
                    </td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Usuario origen:
                    </td>
                    <td  width="65%" height="25" class="listado2">
                        <?=$_SESSION['usua_nomb']?>
                    </td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Dependencia origen:
                    </td>
                    <td  width="65%" height="25" class="listado2">
                        <?=$_SESSION['depe_nomb']?>
                    </td>
                </tr>
            </table>
            <table class="borde_tab">
                <tr>
                    <td class="titulosError">
                        <?php
                            //by skina agregamos strtolower
                            $query = "update radicado  set radi_path='" . strtoupper(substr($fileGrb, 0, -3)) . "pdf' where radi_nume_radi='$valRadio'";
                            if ($db->conn->Execute($query)) {
                                $radicadosSel[] = $valRadio;
                                $codTx = 42;
                                include "$dir_raiz/include/tx/Historico.php";
                                $hist = new Historico($db);
                                $hist->insertarHistorico($radicadosSel, $dependencia, $codusuario, $dependencia, $codusuario, $observa, $codTx);

                                if ($krd != $siNotifica->fields['USUA_LOGIN']) {
                                    include 'mail.php';
                                }

                            } else {
                                echo "<hr>No actualizo la BD <hr>";
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>