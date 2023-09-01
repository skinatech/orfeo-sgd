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

foreach ($_GET as $key => $valor)   ${$key} = $valor;
foreach ($_POST as $key => $valor)   ${$key} = $valor;

// $dep_sel = $_POST["dep_sel"];
// $fecha_busq = $_POST["fecha_busq"];
// $fecha_busqH = $_POST["fecha_busqH"];
// $hora_ini = $_POST["hora_ini"];
// $minutos_ini = $_POST["minutos_ini"];
// $hora_fin = $_POST["hora_fin"];
// $minutos_fin = $_POST["minutos_fin"];
// $tip_radi = $_POST["tip_radi"];
// $generar_listado = $_POST['generar_listado'];
// $cancelarAnular = $_POST['cancelarAnular'];

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tpNumRad = $_SESSION["tpNumRad"];
$tpPerRad = $_SESSION["tpPerRad"];
$tpDescRad = $_SESSION["tpDescRad"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3img = $_SESSION["tip3img"];
$tpDepeRad = $_SESSION["tpDepeRad"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];

$verrad = "";
if (!$_SESSION['dependencia'])
    include "../rec_session.php";

$depeBuscada = $dep_sel;
?>
<html>
    <head>
        <title>Generacion planilla de entrega</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script src="<?= $url_raiz ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?= $url_raiz ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="spiffycalendar" class="text"></div>
        <link rel="stylesheet" type="text/css" href="js/spiffyCal/spiffyCal_v2_1.css">
        <?php
        include_once "$dir_raiz/include/db/ConnectionHandler.php";
        $db = new ConnectionHandler("$dir_raiz");
//        $db->conn->debug=true;
        
        if ($generar_listado and ! $cancelarAnular) {
            $indi_generar = "SI";
        } else {
            $indi_generar = "NO";
        }

        $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&num=$num&hora_ini=$hora_ini&hora_fin=$hora_fin&minutos_ini=$minutos_ini&minutos_fin=$minutos_fin&tip_radi=$tip_radi&fecha_busqH=$fecha_busqH&fecha_busq=$fecha_busq&dep_sel=$dep_sel&filtroSelect=$filtroSelect&nomcarpeta=$nomcarpeta";
        $linkPagina = "$PHP_SELF?$encabezado&orderTipo=$orderTipo&orderNo=$orderNo";
        $encabezado = "" . session_name() . "=" . session_id() . "&adodb_next_page=1&krd=$krd&num=$num&hora_ini=$hora_ini&hora_fin=$hora_fin&minutos_ini=$minutos_ini&minutos_fin=$minutos_fin&tip_radi=$tip_radi&fecha_busqH=$fecha_busqH&fecha_busq=$fecha_busq&dep_sel=$dep_sel&filtroSelect=$filtroSelect&nomcarpeta=$nomcarpeta&orderTipo=$orderTipo&orderNo=";
        ?>
        <script>
            function Marcar() {
                marcados = 0;
                for (i = 2; i < document.gen_lisDefi.elements.length; i++){
                    if (document.gen_lisDefi.elements[i].checked == 1) {
                        marcados++;
                    }
                }
                if (marcados >= 1) {
                    document.gen_lisDefi.submit();
                } else {
                    alert("Debe marcar un elemento");
                }
            }
        </script>

        <?php
        if (strlen($orderNo) == 0) {
            $orderNo = "1";
            $order = 2;
        } else {
            $order = $orderNo + 1;
        }

        //Condicion Dependencia
        if ($dep_sel != 0)
            $dependencia_busq2 = " and c.radi_depe_actu = '$dep_sel'";
        //Construccion Condicion de Fechas//
        $fecha_ini = $fecha_busq;
        $fecha_fin = $fecha_busqH;
        $fecha_ini = mktime($hora_ini, $minutos_ini, 00, substr($fecha_busq, 5, 2), substr($fecha_busq, 8, 2), substr($fecha_busq, 0, 4));
        $fecha_fin = mktime($hora_fin, $minutos_fin, 59, substr($fecha_busqH, 5, 2), substr($fecha_busqH, 8, 2), substr($fecha_busqH, 0, 4));

        $where_fecha = " and c.radi_fech_radi BETWEEN
		" . $db->conn->DBTimeStamp($fecha_ini) . " and " . $db->conn->DBTimeStamp($fecha_fin);
        //Condicion Tipo Radicacion
        if ($tip_radi == 0) {
            $where_tipRadi = "";
        } else {
            $where_tipRadi = " and c.radi_nume_radi like '%$tip_radi'";
        }
        include "$dir_raiz/include/query/radicacion/queryParamListaImpresos.php";
        $rs = $db->conn->Execute($isql);
        
        if (!$rs->EOF) {
            ?>	
            <br>
        <center>
            <div id="titulo" style="width: 40%;" align="center">Generacion listado de entrega</div>
            <table border=1 cellspace=2 cellpad=2 WIDTH=40%  class="t_bordeGris">
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Fecha inicial :
                    </td>
                    <td  width="65%" height="25" class="listado2">
                        &nbsp;<?= $fecha_busq . " " . $hora_ini . " : " . $minutos_ini . ":00" ?>
                    </td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Fecha final :
                    </td>
                    <td  width="65%" height="25" class="listado2">
                        &nbsp;<?= $fecha_busqH . " " . $hora_fin . " : " . $minutos_fin . ":59" ?>
                    </td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Fecha generacion :
                    </td>
                    <td  width="65%" height="25" class="listado2">
                        &nbsp;<? echo date("Y-m-d - H:i:s"); ?>
                    </td>
                </tr>	
            </table>
            <form name=gen_lisDefi  action='generaListaImpresos.php?<?= $encabezado ?>' method="get">
                <table border=0 cellspace=2 cellpad=2 WIDTH=40%  class="t_bordeGris" >
                    <tr tr align= "right">
                        <td width="1120" height="26" colspan="2" valign="top" class="listado1">

                            <input type="hidden" name="fecha_busq"  value="<?= $fecha_busq ?>">
                            <input type="hidden" name="hora_ini"    value="<?= $hora_ini ?>">
                            <input type="hidden" name="minutos_ini" value="<?= $minutos_ini . ":59" ?>">

                            <input type="hidden" name="fecha_busqH" value="<?= $fecha_busqH ?>">
                            <input type="hidden" name="hora_fin"    value="<?= $hora_fin ?>">
                            <input type="hidden" name="minutos_fin" value="<?= $minutos_fin . ":59" ?>">


                            <INPUT TYPE=submit name=gen_lisDefi Value=' Confirmar ' class=botones id=Confirmar onclick="Marcar();">
                            <INPUT TYPE=submit name=cancelarListado value=Cancelar class=botones>
                        </td>
                    </tr>
                </table>
        </center>
        <?php
        /* $pager = new ADODB_Pager($db, $isql, 'adodb', true, $orderNo, $orderTipo);
          $pager->checkAll = true;
          //$pager->checkTitulo = true;
          $pager->toRefLinks = $linkPagina;
          $pager->toRefVars = $encabezado;
          $pager->Render($rows_per_page = 15, $linkPagina, $checkbox = chkEnviar); */

        $pager = new ADODB_Pager($db, $isql, 'adodb', true, $orderNo, $orderTipo, '..');
        $pager->checkAll = true;
        $pager->checkTitulo = true;
        $pager->toRefLinks = $linkPagina;
        $pager->toRefVars = $encabezado;
        $pager->Render($rows_per_page = 15, $linkPagina, $checkbox = chkEnviar);
    } else {
        echo "<hr><center><b><span class='alarmas'>No se encuentra ningun radicado con el criterio de seleccion</span></center></b></hr>";
    }
    ?>	
</form>
    <?php
    /* } else {
      echo "<hr><center><b><span class='alarmas'>Operacion CANCELADA</span></center></b></hr>";
      } */
    if ($cancelarAnular) {
        echo "<hr><center><b><span class='alarmas'>Operacion CANCELADA</span></center></b></hr>";
    }
    ?>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>
