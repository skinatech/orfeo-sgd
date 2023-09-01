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

if (isset($_GET['carpeta']))
    $nomcarpeta = $_GET["carpeta"];
if (isset($_GET['tipo_carpt']))
    $tipo_carpt = $_GET["tipo_carpt"];
if (isset($_GET['adodb_next_page']))
    $adodb_next_page = $_GET["adodb_next_page"];
//if (isset($_GET["dep_sel"])) $dep_sel=$_GET["dep_sel"];
if (isset($_GET["orderTipo"]))
    $orderTipo = $_GET["orderTipo"];
if (isset($_GET["busqRadicados"]))
    $busqRadicados = $_GET["busqRadicados"];
elseif (isset($_POST["busqRadicados"]))
    $busqRadicados = $_POST["busqRadicados"];
if (isset($_GET["busq_radicados"]))
    $busq_radicados = $_GET["busq_radicados"];
if (isset($_GET["depeBuscada"]))
    $depeBuscada = $_GET["depeBuscada"];

if (!isset($_SESSION['dependencia']))
    include "../../rec_session.php";

$ano_ini = date("Y");
$mes_ini = substr("00" . (date("m") - 1), -2);
if ($mes_ini == 0) {
    $ano_ini = $ano_ini - 1;
    $mes_ini = "12";
}
$dia_ini = date("d");
$ano_ini = date("Y");
if (!isset($fecha_ini))
    $fecha_ini = "$ano_ini/$mes_ini/$dia_ini";
$fecha_fin = date("Y/m/d");
$where_fecha = "";
$radSelec = "";
//$tpDepeRad = "NADA";
?>

<html>
    <head>
        <title>Envio de Documentos. Orfeo...</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script src="<?= $url_raiz ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?= $url_raiz ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body bgcolor="#FFFFFF" topmargin="0" onLoad="window_onload();">
        <div id="spiffycalendar" class="text"></div>
        <link rel="stylesheet" type="text/css" href="js/spiffyCal/spiffyCal_v2_1.css">
        <?php
        include_once "$dir_raiz/include/db/ConnectionHandler.php";
        $db = new ConnectionHandler("$dir_raiz");
        $dep_sel = $_GET["dep_sel"];

        if (!isset($dep_sel)) {
            $dep_sel = $_SESSION['dependencia'];
        }
        $nomcarpeta = "Consulta Usuarios";

        if (isset($busq_radicados)) {
            $busq_radicados = trim($busq_radicados);
            $textElements = preg_split(",", $busq_radicados);
            $newText = "";
            $i = 0;
            foreach ($textElements as $item) {
                $item = trim($item);
                if (strlen($item) != 0) {
                    $i++;
                    if ($i > 1)
                        $busq_and = " and ";
                    else
                        $busq_and = " ";
                    $busq_radicados_tmp .= " $busq_and radi_nume_sal like '%$item%' ";
                }
            }
            $dependencia_busq1 .= " and $busq_radicados_tmp ";
        }else {
            $sql_masiva = "";
        }

        if (isset($orden_cambio) && $orden_cambio == 1) {
            if (!$orderTipo) {
                $orderTipo = "desc";
            } else {
                $orderTipo = "";
            }
        }
       if (!isset($pagina_sig))
            $pagina_sig = '';
        if (!isset($accion_sal))
            $accion_sal = '';
        if (!isset($radSelec))
            $radSelec = '';
        if (!isset($dependencia))
            $dependencia = '';
        if (!isset($dep_sel))
            $dep_sel = '';
        if (!isset($nomcarpeta))
            $nomcarpeta = '';
        if (!isset($orderTipo))
            $orderTipo = '';
        if (!isset($selecdoc))
            $selecdoc = '';
        if (!isset($orderNo))
            $orderNo = '';
        if (!isset($dependencia_busq1))
            $dependencia_busq1 = '';
        $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&pagina_sig=$pagina_sig&accion_sal=$accion_sal&radSelec=$radSelec&dependencia=$dependencia&dep_sel=$dep_sel&selecdoc=$selecdoc&nomcarpeta=$nomcarpeta&orderTipo=$orderTipo&orderNo=";
        $linkPagina = "$PHP_SELF?$encabezado&radSelec=$radSelec&accion_sal=$accion_sal&nomcarpeta=$nomcarpeta&orderTipo=$orderTipo&orderNo=$orderNo";
        $carpeta = "nada";
        $swBusqDep = "si";
        $pagina_actual = "../usuario/cuerpoConsulta.php";
        include "../paEncabeza.php";
        
        $varBuscada = "usua_nomb";
        if ($_POST['Buscar']) {
            $boton = $_POST['Buscar'];
        } else {
            $boton = '';
        }
        $tituloBuscar = "Buscar Usuario(s) (Separados por coma)";
        include "../paBuscar.php";
        $pagina_sig = "../usuario/consultaDatosGrales.php";
        $accion_sal = "Consultar";
        include "../paOpciones.php";

        if ($busq_radicados_tmp) {
            $where_fecha = " ";
        } else {
            $fecha_ini = mktime(00, 00, 00, substr($fecha_ini, 5, 2), substr($fecha_ini, 8, 2), substr($fecha_ini, 0, 4));
            $fecha_fin = mktime(23, 59, 59, substr($fecha_fin, 5, 2), substr($fecha_fin, 8, 2), substr($fecha_fin, 0, 4));
            $where_fecha = " (a.SGD_RENV_FECH >= " . $db->conn->DBTimeStamp($fecha_ini) . " and a.SGD_RENV_FECH <= " . $db->conn->DBTimeStamp($fecha_fin) . ") ";
            $dependencia_busq1 .= " $where_fecha and ";
        }

        /*  GENERACION LISTADO DE RADICADOS
         *  Aqui utilizamos la clase adodb para generar el listado de los radicados
         *  Esta clase cuenta con una adaptacion a las clases utiilzadas de orfeo.
         *  el archivo original es adodb-pager.inc.php la modificada es adodb-paginacion.inc.php
         */

        error_reporting(0);
        ?>
       
        <form name=formEnviar action='consultaDatosGrales.php?<?= $encabezado ?>&usModo=2' method=post>
            <?php
            if ($orderNo == 98 or $orderNo == 99) {
                $order = 1;
                if ($orderNo == 98)
                    $orderTipo = "desc";

                if ($orderNo == 99)
                    $orderTipo = "";
            }
            else {
                if (!$orderNo) {
                    $orderNo = 0;
                }
                $order = $orderNo + 1;
            }
            $sqlChar = $db->conn->SQLDate("d-m-Y H:i A", "SGD_RENV_FECH");
            $sqlConcat = $db->conn->Concat("a.radi_nume_sal", "'-'", "a.sgd_renv_codigo", "'-'", "a.sgd_fenv_codigo", "'-'", "a.sgd_renv_peso");
            include "$dir_raiz/include/query/administracion/queryCuerpoConsulta.php";
            
            $rs = $db->conn->Execute($isql);
            
            
            $nregis = $rs->fields["NOMBRE"];
            if (!$nregis) {
                echo "<hr><center><b>No se encontraron registros con el criterio de b&uacute;squeda</center></b></hr>";
            } else {
                $pager = new ADODB_Pager($db, $isql, 'adodb', true, $orderNo, $orderTipo, "../..");
                $pager->toRefLinks = $linkPagina;
                $pager->toRefVars = $encabezado;
                $pager->Render($rows_per_page = 20, $linkPagina, $checkbox = $chkEnviar);
            }
            ?>
        </form>
    </body>
</html>