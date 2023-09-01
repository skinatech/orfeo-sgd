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

        /*---------------------------------------------------------+
        |                     INCLUDES                             |
        +---------------------------------------------------------*/


        /*---------------------------------------------------------+
        |                    DEFINICIONES                          |
        +---------------------------------------------------------*/
session_start();
error_reporting(7);
$url_raiz="..";
$dir_raiz=$_SESSION['dir_raiz'];
$ESTILOS_PATH2 =$_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];     

/*---------------------------------------------------------+
|                       MAIN                               |
+---------------------------------------------------------*/
foreach ($_GET as $key => $valor)   ${$key} = $valor;
foreach ($_POST as $key => $valor)   ${$key} = $valor;

if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";
$dependencia = $_SESSION['dependencia'];

//if(isset($buscaDepe) && $buscaDepe == 1){
    $dep_sel = $_GET['dep_sel'];
//}else{
//    $dep_sel = $dependencia;
//}

$busq_radicados= $_POST['busq_radicados'];
$longitud_codigo_dependencia = $_SESSION['longitud_codigo_dependencia'];
$estructuraRad = $_SESSION['estructuraRad'];


$anoActual = date("Y");
$ano_ini = date("Y");
$mes_ini = substr("00" . (date("m") - 1), -2);
if ($mes_ini == 0) {
    $ano_ini = $ano_ini - 1;
    $mes_ini = "12";
}
$dia_ini = date("d");
$ano_ini = date("Y");
if (!$fecha_ini){
    $ano_ini = $ano_ini - 1;
    $fecha_ini = "$ano_ini/$mes_ini/$dia_ini";
}
$fecha_fin = date("Y/m/d");
$where_fecha = "";
//error_reporting(7);

define('ADODB_ASSOC_CASE', $assoc);
?>
<html>
    <head>
        <title>Orfeo. Devoluci&oacute;n de Correspondencia</title>
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
//        $db->conn->debug = true;
        if (!$estado_sal) {
            $estado_sal = 2;
        }
        if (!$estado_sal_max)
            $estado_sal_max = 3;
        if ($estado_sal == 4) {
            if ($devolucion == 1) {
                $accion_sal = "Devolucion de Documentos";
                $pagina_sig = "dev_corresp_otras.php";
                $dev_documentos = "";
                $nomcarpeta = "Devolucion de Documentos";
            }
            if (!$dep_sel)
                $dep_sel = $dependencia;
        }
        if ($busq_radicados) {
            $busq_radicados = trim($busq_radicados);
            $textElements = preg_split(",", $busq_radicados);
            $newText = "";
            $i = 0;
            foreach ($textElements as $item) {
                $item = trim($item);
                if (strlen($item) != 0) {
                    $i++;
                    if ($i != 1)
                        $busq_and = " and ";
                    else
                        $busq_and = " ";
                    $busq_radicados_tmp .= " $busq_and radi_nume_sal like '%$item%' ";
                }
            }
            $dependencia_busq1 .= " $busq_radicados_tmp ";
            if (!$dep_sel)
                $dep_sel = $dependencia;
        }else {
            $sql_masiva = " and a.sgd_renv_planilla != '00' ";
            $sql_masiva = "";
        }


        $tbbordes = "#CEDFC6";
        $tbfondo = "#FFFFCC";
        if (!$orno) {
            $orno = 1;
        }
        $imagen = "flechadesc.gif";


        $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&filtroSelect=$filtroSelect&accion_sal=$accion_sal&dependencia=$dependencia&tpAnulacion=$tpAnulacion&orderNo=";
        $linkPagina = "$PHP_SELF?$encabezado&accion_sal=$accion_sal&orderTipo=$orderTipo&orderNo=$orderNo";

        $swBusqDep = "si";
        $pagina_actual = "../devolucion/cuerpoDevOtras.php";
        $carpeta = "xx";
        include "../envios/paEncabeza.php";
        $varBuscada = "radi_nume_sal";
        include "../envios/paBuscar.php";
        $accion_sal = "Devoluci&oacute;n de Documentos";
        $pagina_sig = "../devolucion/dev_corresp_otras.php";
        include "../envios/paOpciones.php";
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
        error_reporting(7);
        if ($orderNo == 98 or $orderNo == 99) {
            $order = 1;
            if ($orderNo == 98)
                $orderTipo = "desc";

            if ($orderNo == 99)
                $orderTipo = "";
        }

        else {
            if (!$orderNo)
                $orderNo = 4;
            $order = $orderNo + 1;

            if ($orden_cambio == 1) {
                if (!$orderTipo) {
                    $orderTipo = "desc";
                } else {
                    $orderTipo = "";
                }
            }
        }
        $sqlChar = $db->conn->SQLDate("d-m-Y H:i A", "SGD_RENV_FECH");
        
        include "$dir_raiz/include/query/devolucion/querycuerpoDevOtras.php";
        ?>
        <form name=formEnviar action='../devolucion/dev_corresp_otras.php?<?= session_name() . "=" . session_id() . "&krd=$krd" ?>&estado_sal=<?= $estado_sal ?>&estado_sal_max=<?= $estado_sal_max ?>&pagina_sig=<?= $pagina_sig ?>&dep_sel=<?= $dep_sel ?>&nomcarpeta=<?= $nomcarpeta ?>&orderNo=<?= $orderNo ?>' method=post>
            <?php
            $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&estado_sal=$estado_sal&estado_sal_max=$estado_sal_max&accion_sal=$accion_sal&dependencia_busq2=$dependencia_busq2&dep_sel=$dep_sel&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion&nomcarpeta=$nomcarpeta&orderTipo=$orderTipo&orderNo=";
            $linkPagina = "$PHP_SELF?$encabezado&orderTipo=$orderTipo&orderNo=$orderNo";
            //	$db->conn->debug = true;
            $pager = new ADODB_Pager($db, $isql, 'adodb', true, $orderNo, $orderTipo, '..');
            $pager->toRefLinks = $linkPagina;
            $pager->toRefVars = $encabezado;
            $pager->checkAll = true;
            $pager->checkTitulo = false;
            $pager->Render($rows_per_page = 15, $linkPagina, $checkbox = chkEnviar);
            ?>
        </form>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>
