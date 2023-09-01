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
$url_raiz = $_SESSION['url_raiz'];
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

// Modificado SGD 20-Septiembre-2007
/**
 * Paggina Cuerpo.php que muestra el contenido de las Carpetas
 * Creado en la SSPD en el año 2003
 * 
 * Se añadio compatibilidad con variables globales en Off
 * @autor Jairo Losada 2009-05
 * @licencia GNU/GPL V 3
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;
$nomcarpeta = $_GET["nomcarpeta"];
if ($_GET["tipo_carp"])
    $tipo_carp = $_GET["tipo_carp"];

$busqRadicados = $_GET["busqRadicados"];

//else $carpeta='';
define('ADODB_ASSOC_CASE', $assoc);

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];
if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";
$verrad = "";
$_SESSION['numExpedienteSelected'] = null;
$_SESSION['carpeta'] = $_GET['carpeta'];

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';


?>
<html>
    <head>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <link rel="stylesheet" href="<?= $url_raiz . $ESTILOS_PATH2 ?>header.css">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="estilos/js/bootstrap.min.js" type="text/javascript"></sc/home/jmgamez/ript> 
        <script src="js/popcalendar.js"></script>
        <script src="js/mensajeria.js"></script>
    <div id="spiffycalendar" class="text"></div> 
</head>
<?php
include "./envios/paEncabeza.php";
?>
<body bgcolor="#FFFFFF" topmargin="0" onLoad="window_onload();" >

    <script language="JavaScript">
        //Menu inferior visible
        var visible = true;

        function showSearchTable() {
            var searchTable = document.getElementById('searchTable');
            if (searchTable.style.display == 'none') {
                searchTable.style.display = 'table';
            } else {
                searchTable.style.display = 'none';
            }
        }
    </script>

    <?php
    include_once "$dir_raiz/include/db/ConnectionHandler.php";
    require_once("$dir_raiz/class_control/Mensaje.php");
    if (!$db)
        $db = new ConnectionHandler($dir_raiz);
    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
//    $db->conn->debug=true;
    $objMensaje = new Mensaje($db);
    $mesajes = $objMensaje->getMsgsUsr($_SESSION['usua_doc'], $_SESSION['dependencia']);

    if ($swLog == 1)
        echo ($mesajes);
    if (trim($orderTipo) == "")
        $orderTipo = "DESC";
    if ($orden_cambio == 1) {
        if (trim($orderTipo) != "DESC") {
            $orderTipo = "DESC";
        } else {
            $orderTipo = "ASC";
        }
    }
    $carpeta1 = $_GET['carpeta'];
    if (!$carpeta) {
        $carpeta = 0;
    }
    if ($busqRadicados) {
        $busqRadicados = trim($busqRadicados);
        $textElements = preg_split("/[\s,]+/", $busqRadicados);
        $newText = "";
        $dep_sel = $dependencia;
        foreach ($textElements as $item) {
            $item = trim($item);
            if (strlen($item) != 0) {
                $busqRadicadosTmp .= " b.radi_nume_radi like '%$item%' or";
            }
        }
        if (substr($busqRadicadosTmp, -2) == "or") {
            $busqRadicadosTmp = substr($busqRadicadosTmp, 0, strlen($busqRadicadosTmp) - 2);
        }
        if (trim($busqRadicadosTmp)) {
            $whereFiltro .= "and ( $busqRadicadosTmp ) ";
        }
    }

    //echo print_r($_SESSION);
    //$carpeta = $rest = substr($busqRadicados, -1);
    $encabezado = "" . session_name() . "=" . session_id() . "&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion&carpeta=$carpeta&tipo_carp=$tipo_carp&chkCarpeta=$chkCarpeta&busqRadicados=$busqRadicados&nomcarpeta=$nomcarpeta&agendado=$agendado&";
    $linkPagina = "$PHP_SELF?$encabezado&orderTipo=$orderTipo&orderNo=$orderNo";
    $encabezado = "" . session_name() . "=" . session_id() . "&adodb_next_page=1&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion&carpeta=$carpeta&tipo_carp=$tipo_carp&nomcarpeta=$nomcarpeta&agendado=$agendado&orderTipo=$orderTipo&orderNo=";

    ?>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
            <span>
                <?php
                    /***
                    Autor: Andrés Mosquera
                    Fecha: 2019-09-06
                    Info: se llama el archivo que contiene html y consulta para el contador de los reasignados masivos
                    ***/
                    include './radicacion/reasignacion_masiva/contadorReasignacionMasiva.php';
                ?>
            </span>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
            <table style="font-size:inherit;">
                <tr>
                    <td><img src='<?=$url_raiz?>/iconos/semaforo_rojo.png' style="width: auto; margin-left: 2px;" alt='Radicados Vencidos' title='Radicados Vencidos'></td>
                    <td>&nbsp;Radicados Vencidos</td>
                </tr>
                <tr>
                    <td><img src='<?=$url_raiz?>/iconos/semaforo_amarillo.png' style="width: auto; margin-left: 2px;" alt='Radicados Pronto Vencer' title='Radicados Pronto Vencer'></td>
                    <td>&nbsp;Radicados Pronto Vencer (2 días)</td>
                </tr>
                <tr>
                    <td><img src='<?=$url_raiz?>/iconos/semaforo_verde.png' style="width: auto; margin-left: 2px; height: 20px" alt='Radicados al Dia' title='Radicados al Dia'></td>
                    <td>&nbsp;Radicados al Día</td>
                </tr>
            </table>
        </div>
    </div>
    <br>
    <table id="searchTable" width="100%" align="center" cellspacing="0" cellpadding="0" class="borde_tab" style="display: none">
        <tr class="tablas">
            <td>
                <span class="etextomenu">
                    <form name="form_busq_rad" id="form_busq_rad" action='<?= $_SERVER['PHP_SELF'] ?>?<?= $encabezado ?>' method="get">
                        Buscar radicados (Separe los radicados por coma)<span class="etextomenu">
                            <input name="busqRadicados" type="text" size="40" class="tex_area" value="<?= $busqRadicados ?>" title="Digite los radicados a buscar en el listado actual">
                            <input name="carpeta" type="hidden" value="<?= $_GET['carpeta'] ?>">		  
                            <input type=submit value='Buscar radicados' alt='Envia la consulta de radicados' title='Envia la consulta de radicados' name='Buscar Radicados' valign='middle' class='botones'>
                        </span>
                        <?php
                        //if(!$busqRadicados) $carpeta=0;
                        if (!$tipo_carp)
                            $tipo_carp = 0;
                        /**
                         * Este if verifica si se debe buscar en los radicados de todas las carpetas.
                         * @$chkCarpeta char  Variable que indica si se busca en todas las carpetas.
                         *
                         */
                        if ($chkCarpeta) {
                            $chkValue = " checked ";
                            $whereCarpeta = " ";
                        } else {
                            $chkValue = "checked";
                            $whereCarpeta = " and b.carp_codi=$carpeta ";
                        }

                        $whereCarpeta = $whereCarpeta . " and b.carp_per=$tipo_carp ";

                        $fecha_hoy = Date("Y-m-d");
                        $sqlFechaHoy = $db->conn->DBDate($fecha_hoy);
                        //Filtra el query para documentos agendados
                        if ($agendado == 1) {
                            $sqlAgendado = " and (radi_agend=1 and radi_fech_agend > $sqlFechaHoy) "; // No vencidos
                        } else if ($agendado == 2) {
                            $sqlAgendado = " and (radi_agend=1 and radi_fech_agend <= $sqlFechaHoy)  "; // vencidos
                        }


                        if ($agendado) {
                            $colAgendado = "," . $db->conn->SQLDate("Y-m-d H:i A", "b.RADI_FECH_AGEND") . ' as "Fecha Agendado"';
                            $whereCarpeta = "";
                        }

                        //Filtra teniendo en cienta que se trate de la carpeta Vb.
                        if ($carpeta == 11 && $_GET['tipo_carp'] != 1) {
		            $whereUsuario = " and b.radi_usua_actu=$codusuario ";
                        } else {
                            $whereUsuario = " and b.radi_usua_actu=$codusuario ";
                        }
                        ?>
                        <input type="checkbox" name="chkCarpeta" title="Buscar en todas las carpetas" value=xxx <?= $chkValue ?> > Buscar en todas las carpetas
                    </form>
                </span>
            </td>
        </tr>
    </table>

    <form name="form1" id="form1" action="./tx/formEnvio.php?<?= $encabezado ?>" method="GET">
        <?php
        $controlAgenda = 1;
        if ($carpeta == 11 and ! $tipo_carp and $codusuario != 1) {
            
        } else {
            include "$dir_raiz/tx/txOrfeo.php";
        }
        /*  GENERACION LISTADO DE RADICADOS
         *  Aqui utilizamos la clase adodb para generar el listado de los radicados
         *  Esta clase cuenta con una adaptacion a las clases utiilzadas de orfeo.
         *  el archivo original es adodb-pager.inc.php la modificada es adodb-paginacion.inc.php
         */


        if (strlen($orderNo) == 0) {
            $orderNo = "2";
            $order = 3;
        } else {
            $order = $orderNo + 1;
        }

        $sqlFecha = $db->conn->SQLDate("Y-m-d H:i A", "b.RADI_FECH_RADI");
//        $db->conn->debug = true;

        include "$dir_raiz/include/query/queryCuerpo.php";
        
        if(isset($_GET['chkCarpeta'])){
            $rs = $db->conn->query($isql);
        }
        
        //echo ' +++ '.$isql;

        if ($rs->EOF and $busqRadicados) {
            echo "<hr><center><strong><span class='alarmas'>No se encuentra ningun radicado con el criterio de búsqueda</span></center></strong></hr>";
        } else {
            $pager = new ADODB_Pager($db, $isql, 'adodb', true, $orderNo, $orderTipo);
            $pager->checkAll = false;
            $pager->checkTitulo = true;
            $pager->toRefLinks = $linkPagina;
            $pager->toRefVars = $encabezado;
            $pager->descCarpetasGen = $descCarpetasGen;
            $pager->descCarpetasPer = $descCarpetasPer;
            $pager->Render($rows_per_page = 15, $linkPagina, $checkbox = $chkAnulados);
        }
        ?>
    </form>
</tr>
</td>
</table>

<br>
<br>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>
