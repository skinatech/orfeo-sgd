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
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


/**
 * Se añadio compatibilidad con variables globales en Off
 * @autor Jairo Losada 2009-05
 * @licencia GNU/GPL V 3
 */
$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];

$nomcarpeta = $_GET["carpeta"];
$tipo_carpt = $_GET["tipo_carpt"];
$adodb_next_page = $_GET["adodb_next_page"];
if ($_GET["dep_sel"])
    $dep_sel = $_GET["dep_sel"];
if ($_GET["btn_accion"])
    $btn_accion = $_GET["btn_accion"];
if ($_GET["orderNo"])
    $orderNo = $_GET["orderNo"];
if ($_REQUEST["orderTipo"])
    $orderTipo = $_GET["orderTipo"];
if ($_REQUEST["busqRadicados"])
    $busqRadicados = $_REQUEST["busqRadicados"];
if ($_REQUEST["Buscar"])
    $Buscar = $_REQUEST["Buscar"];
if ($_REQUEST["$busq_radicados_tmp"])
    $$busq_radicados_tmp = $_REQUEST["$busq_radicados_tmp"];

if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";
require_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler($dir_raiz);
$verrad = "";

//$db->conn->debug=true;
/** PROGRAMA DE CARGA DE IMAGENES DE RADICADOS
 * @author JAIRO LOSADA - DNP - SSPD
 * @version Orfeo 3.5.1
 *
 * @param $varBuscada sTRING Contiene el nombre del campo que buscara
 * @param $krd  string Trae el Login del Usuario actual
 * @param $isql string Variable temporal que almacena consulta
 */
?>
<HTML>
    <head>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script src="<?= $url_raiz ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?= $url_raiz ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <form ACTION="<?= $_SERVER['PHPSELF'] ?>?<?= session_name() ?>=<?= session_id() ?>" method="POST">
            <?php
            /**
             * @param $varBuscada string Contiene el nombre del campo que buscara
             * @param $busq_radicados_tmp string Almacena cadena de busqueda de radicados generada por pagina paBuscar.php
             */
            $varBuscada = "RADI_NUME_RADI";
            
            include "$dir_raiz/envios/paEncabeza.php";
            include "$dir_raiz/envios/paBuscar.php";
            
            $encabezado = "" . session_name() . "=" . session_id() . "&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion&carpeta=$carpeta&tipo_carp=$tipo_carp&chkCarpeta=$chkCarpeta&busqRadicados=$busqRadicados&nomcarpeta=$nomcarpeta&agendado=$agendado&";
            $linkPagina = "$PHP_SELF?$encabezado&orderTipo=$orderTipo&orderNo=$orderNo";
            $encabezado = "" . session_name() . "=" . session_id() . "&adodb_next_page=1&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion&carpeta=$carpeta&tipo_carp=$tipo_carp&nomcarpeta=$nomcarpeta&agendado=$agendado&orderTipo=$orderTipo&orderNo=";
            ?>
        </form>
        <form action="formUpload.php?krd=<?= $krd ?>&<?= session_name() ?>=<?= session_id() ?>&busqRadicados=<?=$busqRadicados?>" method="POST">
            <?php
            if ($Buscar AND $busq_radicados_tmp) {
                include "$dir_raiz/include/query/uploadFile/queryUploadFileRad.php";
//                $rs = $db->conn->Execute($query);
                if ($rs->EOF) {
                    echo "<hr><center><b><span class='alarmas'>". utf8_decode("No se encuentra ningun radicado con el criterio de búsqueda") ."</span></center></b></hr>";
                } else {
                    echo '<center><input type="submit" value="Asociar Imagen del Radicado" id="asocImgRad" name="asocImgRad" class="botones_largo"></center>';
                    $orderNo = 1;
                    $orderTipo = " Desc ";
                    $pager = new ADODB_Pager($db, $query, 'adodb', true, $orderNo, $orderTipo, "..");
                    $pager->checkAll = false;
                    $pager->checkTitulo = true;
                    $pager->toRefLinks = $linkPagina;
                    $pager->toRefVars = $encabezado;
                    $pager->descCarpetasGen = $descCarpetasGen;
                    $pager->descCarpetasPer = $descCarpetasPer;
                    $pager->Render($rows_per_page = 15, $linkPagina, $checkbox = $chkAnulados);
                }
            }
            ?>

        </form>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>
