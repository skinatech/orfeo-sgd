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
$assoc = $_SESSION['assoc'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


if (!$_SESSION['dependencia'])
    include "../rec_session.php";
if (!isset($dependencia_busq1))
    $dependencia_busq1 = "";
$ano_ini = date("Y");
$mes_ini = substr("00" . (date("m") - 1), -2);
if ($mes_ini == 0) {
    $ano_ini = $ano_ini - 1;
    $mes_ini = "12";
}
$dia_ini = date("d");
if (!isset($fecha_ini))
    $fecha_ini = "$ano_ini/$mes_ini/$dia_ini";
$fecha_fin = date("Y/m/d");
$where_fecha = "";
$radSelec = "";

$krd = $_GETN['krd'];

if ($_GET['depe_sel']) {
    $dep_sel = $_GET['dep_sel'];
} else {
    $dep_sel = $_SESSION['dependencia'];
}

?>

<html>
    <head>
        <title>Modificación de envíos</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script src="<?= $url_raiz ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?= $url_raiz ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body bgcolor="#FFFFFF" topmargin="0" >
        <div id="spiffycalendar" class="text"></div>
        <link rel="stylesheet" type="text/css" href="js/spiffyCal/spiffyCal_v2_1.css">

        <?php
        // Modificado SGD 14-Septiembre-2007
        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";
        include_once "$dir_raiz/include/db/ConnectionHandler.php";
        $db = new ConnectionHandler("$dir_raiz");
        /** Se agrega esta funcion para que el recordset que trae la consulta muestre los nombres de las consultas mas no la posicion */
        $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
        //$db->conn->debug = true;
        

        if (!$estado_sal) {
            $estado_sal = 2;
        }
        if (!$estado_sal_max)
            $estado_sal_max = 3;
        if ($estado_sal == 4) {
            if ($devolucion == 3) {
                $accion_sal = "Modificar Env&iacute;o";
                $pagina_sig = "envio_mod.php";
                $nomcarpeta = "Modificacion Registro de env&iacute;o";
                $dev_documentos = "";
            }
            if (!isset($dep_sel))
                $dep_sel = $dependencia;
        }
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
            if (!$dep_sel)
                $dep_sel = $dependencia;
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
        if (!isset($orderNo))
            $orderNo = "";
        if (!isset($orderTipo))
            $orderTipo = "";
        if (!isset($tpAnulacion))
            $tpAnulacion = "";
        if (!isset($filtroSelect))
            $filtroSelect = "";
        $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&filtroSelect=$filtroSelect&accion_sal=$accion_sal&radSelec=$radSelec&dependencia=$dependencia&dep_sel=$dep_sel&nomcarpeta=$nomcarpeta&orderTipo=$orderTipo&tpAnulacion=$tpAnulacion&orderNo=";
        $linkPagina = "$PHP_SELF?$encabezado&radSelec=$radSelec&accion_sal=$accion_sal&nomcarpeta=$nomcarpeta&orderTipo=$orderTipo&orderNo=$orderNo";
        $carpeta = "nada";
        $swBusqDep = "si";
        $pagina_actual = "../envios/cuerpoModifEnvio.php";
        include "../envios/paEncabeza.php";
        $varBuscada = "radi_nume_sal";
        include "../envios/paBuscar.php";
        $pagina_sig = "../envios/envio_mod.php";
        $accion_sal = "Modificar Env&iacute;o";
        include "../envios/paOpciones.php";

        if (isset($busq_radicados_tmp)) {
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
        ?>
        <form name=formEnviar action='../envios/envio_mod.php?<?= $encabezado ?>' method=post>
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
                    $orderNo = 4;
                }
                $order = $orderNo + 1;
            }

            $sqlChar = $db->conn->SQLDate("d-m-Y H:i A", "SGD_RENV_FECH");
            $sqlConcat = $db->conn->Concat("a.radi_nume_sal", "'-'", "a.sgd_renv_codigo", "'-'", "a.sgd_fenv_codigo", "'-'", "a.sgd_renv_peso");
            include "$dir_raiz/include/query/envios/queryCuerpoModifEnvio.php";

            //$rs = $db->conn->Execute($isql);
            //echo '************** '.$isql;
            // $nregis = $rs->recordcount();

            if ($rs->EOF and $busqRadicados) {
                echo "<table class=borde_tab width='100%'><tr><td class=titulosError><center>NO se encontro nada con el criterio de busqueda</center></td></tr></table>";
            } else {
                $pager = new ADODB_Pager($db, $isql, 'adodb', true, $orderNo, $orderTipo, "..");
                $pager->toRefLinks = $linkPagina;
                $pager->toRefVars = $encabezado;
                $pager->Render($rows_per_page = 20, $linkPagina, $checkbox = $chkEnviar);
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

