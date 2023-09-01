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
error_reporting(7);
$url_raiz = "../..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

/*
 * Se incluye archivo config.php con ruta dinámica para evitar 
 * errores si se incluye este archivo en otro
 */
include dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . 'config.php';           // incluir configuracion.
/*
 * Se incluye archivo ConnectionHandler.php con ruta dinámica para evitar 
 * errores si se incluye este archivo en otro
 */
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "include/db/ConnectionHandler.php";
//Creo nueva instancia de conexión a Base de datos.
$db = new ConnectionHandler("$dir_raiz");
//$db->conn->debug = true;
include($ADODB_PATH . '/adodb.inc.php');
$ADODB_FETCH_MODE = ADODB_FETCH_NUM;
$ADODB_COUNTRECS = false;
$error = 0;

switch ($_GET['var']) {
    case 'reg' : {
            $titulo = "LISTADO GENERAL DE REGIONALES";
            $tit_columnas = array('Codigo', 'Nombre Regional');
            $isql = "select reg_codi AS CODIGO, reg_nombre AS REGIONAL from regional";
        }break;
    case 'asun' : {
            $titulo = "LISTADO GENERAL DE ASUNTOS";
            $isql = "select asun_descrip AS ASUNTO, CASE estado WHEN '0' THEN 'Inactivo' WHEN '1' THEN 'Activo' END AS ESTADO from asuntos";
        }break;
}

//$db->conn->debug=true;
$Rs_clta = $db->conn->Execute($isql);
?>
<html>
    <head>
        <title><?= $titulo ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>
    <body>
        <?php
        //24-02-2017 se actualiza a la libreria de creacion de tablas de bootstrap
        switch ($_GET['var']) {
            case 'reg' : {
                    $linkPagina = $PHP_SELF . "?var=" . $_GET['var'];
                    $pager = new ADODB_Pager($db, $isql, 'adodb', true, "1", "asc", "../..");
                    $pager->checkAll = false;
                    $pager->checkTitulo = true;
                    $pager->toRefLinks = $linkPagina;
                    //                    $pager->toRefVars = $encabezado;
                    $pager->toRefVars = "var=" . $_GET['var'] . "&";
                    $pager->Render($rows_per_page = 15, $linkPagina);
                    break;
                }break;
            case 'asun' : {
                    $linkPagina = $PHP_SELF . "?var=" . $_GET['var'];
                    $pager = new ADODB_Pager($db, $isql, 'adodb', true, "1", "asc", "../..");
                    $pager->checkAll = false;
                    $pager->checkTitulo = true;
                    $pager->toRefLinks = $linkPagina;
                    //                    $pager->toRefVars = $encabezado;
                    $pager->toRefVars = "var=" . $_GET['var'] . "&";
                    $pager->Render($rows_per_page = 15, $linkPagina);
                    break;
                }break;
        }
        $Rs_clta->Close();
        ?>
    </body>
</html>
