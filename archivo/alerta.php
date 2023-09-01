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
 * Administrador de Transferencias documentales
 * Sistema de gestion Documental ORFEO.
 * Permite traer un listado de los expedientes a los cuales se les debe realizar algun procedimiento por cumplimiento de tiempos por TRD
 * Se verifica por expediente y no por radicado
 * se presume que un expediente tiene una unica Serie-subserie
 */
//valido sesion
$dependencia = $_SESSION['dependencia'];
if (!$dependencia)
    include "$dir_raiz/rec_session.php";

foreach ($_GET as $key => $valor) ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor;

include_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$dir_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
//$db->conn->debug=false;

include("$dir_raiz/include/query/archivo/queryAlerta.php");

$encabezado = session_name() . "=" . session_id() . "&krd=$krd";
$linkPagina = "$PHP_SELF?$encabezado&orderTipo='DESC'&orderNo=1";
?>
<html height=50,width=150>
    <head>
        <title>Alerta Archivo</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script src="<?= $dir_raiz ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?= $dir_raiz ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
    <body bgcolor="#FFFFFF">
        <div id="spiffycalendar" class="text"></div>
        <link rel="stylesheet" type="text/css" href="<?= $dir_raiz ?>/js/spiffyCal/spiffyCal_v2_1.css">
        <script language="JavaScript" src="<?= $dir_raiz ?>/js/spiffyCal/spiffyCal_v2_1.js"></script>
        <script>
            function confirma(e)
            {
                var r = confirm("Esta seguro de modificar el estado de los expedientes? \n Asegurese de realizar todas las labores necesarias para el cambio de estado: transferir, eliminar, seleccionar, etc. Este procedimiento no realiza ninguna de estas labores, el sistema realizara el cambio de estado para posteriores consultas");
                if (r == true)
                {
                    document.getElementById('status').value = e;
                    document.modificar.submit();
                }
            }
        </script>
    <center>
        <form name=alerta action="alerta.php?<?= $encabezado ?>" method='post'>
            <div id="titulo" style="width: 90%;" align="center">Alertas de transferencias documentales</div>
            <table border=1 width="90%" cellpadding="0" cellspacing="5" class="borde_tab">
        <!--    <tr>
                <TD class=titulos2 align="center" colspan="5" >ALERTAS DE TRANSFERENCIAS DOCUMENTALES
            </td>
            </tr>-->
                <tr class="listado2">
                    <td class="titulos2" colspan="2"><label for="dep_sel">DEPENDENCIA</label></td>
                    <td colspan="2">
                        <?php
                        $rs1 = $db->conn->query($query_dep);
                        print $rs1->GetMenu2('dep_sel', $dep_sel, "0:--- TODAS LAS DEPENDENCIAS ---", false, "", "onChange='submit()' id='dep_sel' class='select form-control' title='Listado de todas las dependencias existentes'");
                        ?>
                    </td>
                </tr>
                <tr class="listado2">
                    <td class="titulos2" colspan="2"><label for="codserie">SERIE</label></td>
                    <TD colspan="2">
                        <?php
                        $rsD = $db->conn->query($querySerie);
                        print $rsD->GetMenu2("codserie", $codserie, "0:-- TODAS --", false, "", "onChange='submit()' class='select form-control' id='codserie' title='Listado de todas las series existentes'");
                        ?>
                    </td>
                </tr>
                <tr class="listado2">
                    <td class="titulos2 " colspan="2"><label for="tsub">SUBSERIE</label></td>
                    <td colspan="2">
                        <?php
                        //valido si no selecciono una serie para traer las subseries
                        if ($codserie != 0)
                            $wheresub = " and m.sgd_srd_codigo = '$codserie' and su.sgd_srd_codigo = '$codserie' ";
                        else
                            $wheresub = "";

                        $querySub = $querySub . $wheresub . " order by detalle";

                        $rsSub = $db->conn->query($querySub);
                        print $rsSub->GetMenu2("tsub", $tsub, "0:-- TODAS --", false, "", "onChange='submit()' class='select form-control' id='tsub' title='Listado de todas las subseries existentes, se actualiza al seleccionar una serie'");
                        ?>
                    </td></tr>
                <tr class="listado1">
                    <td colspan="2" align="right"><input type="submit" name="Traer" value="Traer" class="botones_mediano" align="middle" aria-label="Mostrar alertas de transferencias documentales por categorías"></td>
                    <td colspan="2" align="left"><a href='archivo.php?<?= session_name() ?>=<?= trim(session_id()) ?>krd=<?= $krd ?>'><input name='Regresar' align="middle" type="button" class="botones_mediano" id="envia22" value="Regresar" aria-label="regresar al menú del módulo de archivo"></a></td>
                </tr>
            </table>
        </form>

        <?php
        if ($Traer) {
            //valido si selecciono informacion en el formulario 
            $where = " where sb.sgd_sbrd_dispfin!=''";
            if ($dep_sel != 0)
                $where .= " and sexp.depe_codi='$dep_sel'";
            if ($codserie != 0)
                $where .= " and sexp.sgd_srd_codigo=$codserie";
            if ($tsub != 0)
                $where .= " and sexp.sgd_sbrd_codigo=$tsub";

            include("$dir_raiz/include/query/archivo/queryAlerta.php");
            $queryAlertaw = $queryCont . $where;
            include("$dir_raiz/archivo/busca_transferencias.php");
            ?>
            <form name="modificar" id="modificar" action="./cambiar_estado.php?<?= $encabezado ?>" method="get">
                <input type='hidden' name=status id=status value="">
                <table border=0 width='80%' cellpadding="0" cellspacing="5" class="borde_tab">
                    <tr>
                        <TD class=titulos2 align="center" colspan="5" >
                            LOS SIGUIENTES RADICADOS COMENZARON EL TIEMPO EN ARCHIVO CENTRAL :
                        </td>
                        <?php
                        /* Verifico si en la logica de busca_transferencias.php
                          el contador de transferencia primaria es >0 */
                        if ($primaria > 0) {
                            /* Busco los expedientes que cumplieron su tiempo en gestion
                              y su disposicion final es conservacion total 1 */
                            $query_ag = $queryAlerta . $where . " and sexp.sgd_sexp_estado = 0 and sb.sgd_sbrd_dispfin='1' and " . $redondeo_ag . " < 0";
                            $rs_ag = $db->conn->query($query_ag);
                            if (!$rs_ag->EOF) {
                                ?>
                                <td><input type=button value=Transferir name=estado align=bottom class=botones id=estado onclick="confirma(1)"></td></tr> 
                            <?php
                            $pager = new ADODB_Pager($db, $query_ag, 'adodb', true, $orderNo, $orderTipo);
                            $pager->checkAll = false;
                            $pager->checkTitulo = false;
                            $pager->toRefLinks = $linkPagina;
                            $pager->toRefVars = $encabezado;
                            $pager->Render($rows_per_page = 20, $linkPagina, $checkbox = chkAnulados);
                        }
                    } else {
                        ?>
                        <tr><td class=leidos2 align="center">No se encontraron Radicados Proximos a pasar a Archivo Central</td></tr></table>
        <?php
    }//Fin trasnferir 1
    ?>
                <table border=0 width='80%' cellpadding="0" cellspacing="5" class="borde_tab">
                    <tr><TD class=titulos2 align="center" colspan="5" >
                            LOS SIGUIENTES RADICADOS COMENZARON EL TIEMPO EN ARCHIVO HISTORICO :
                        </td></tr>
                    <?php
                    /* Verifico si en la logica de busca_transferencias.php
                      el contador de transferencia secundaria es >0 */
                    if ($secundaria > 0) {
                        ?>
                        <td><input type=button value=Transferir name=estado align=bottom class=botones id=estado onclick="confirma(2)"></td></tr> 
                        <?php
                        /* Busco los expedientes que cumplieron su tiempo en central 
                          y su disposicion final es conservacion total 1 */
                        $query_ac = $queryAlerta . $where . " and sexp.sgd_sexp_estado = 1 and sb.sgd_sbrd_dispfin='1' and " . $redondeo_ac . " < 0";
                        $rs_ac = $db->conn->query($query_ac);

                        if (!$rs_ac->EOF) {
                            $pager = new ADODB_Pager($db, $query_ac, 'adodb', true, $orderNo, $orderTipo);
                            $pager->checkAll = false;
                            $pager->checkTitulo = false;
                            $pager->toRefLinks = $linkPagina;
                            $pager->toRefVars = $encabezado;
                            $pager->Render($rows_per_page = 20, $linkPagina, $checkbox = chkAnulados);
                        }
                    } else {
                        ?>
                        <td class=leidos2 align="center">No se encontraron Radicados Proximos a pasar a Archivo Historico</td></table>
        <?php
    } //fin Transferir 2
    ?>
                <table border=0 width='80%' cellpadding="0" cellspacing="5" class="borde_tab">
                    <tr><TD class=titulos2 align="center" colspan="5" >
                            LOS SIGUIENTES EXPEDIENTES DEBEN SER ELIMINADOS :
                        </td>
                        <?php
                        /* Verifico si en la logica de busca_transferencias.php
                          el contador de eliminacion es >0 */
                        if ($eliminar > 0) {
                            /* Busco los expedientes que cumplieron su tiempo en gestion
                              y su disposicion final es eliminacin 2 */
                            $query_el = $queryAlerta . $where . " and sexp.sgd_sexp_estado = 0 and sb.sgd_sbrd_dispfin='2' and " . $redondeo_ag . " < 0";
                            $rs_el = $db->conn->query($query_el);
                            if (!$rs_el->EOF) {
                                ?>
                                <td><input type=button value=Eliminar name=estado align=bottom class=botones id=estado onclick="confirma(3)"></td></tr> 
                            <?php
                            $pager = new ADODB_Pager($db, $query_el, 'adodb', true, $orderNo, $orderTipo);
                            $pager->checkAll = false;
                            $pager->checkTitulo = false;
                            $pager->toRefLinks = $linkPagina;
                            $pager->toRefVars = $encabezado;
                            $pager->Render($rows_per_page = 20, $linkPagina, $checkbox = chkAnulados);
                        }
                    } else {
                        ?>
                        <tr><td class=leidos2 align="center">No se encontraron Radicados Proximos a eliminar<td> </tr></table>
        <?php
    } //Fin Eliminar
    ?>
                <table border=0 width='80%' cellpadding="0" cellspacing="5" class="borde_tab">
                    <tr><TD class=titulos2 align="center" colspan="5" >
                            LOS SIGUIENTES EXPEDIENTES DEBEN SER SELECCIONADOS :
                        </td>
                        <?php
                        /* Verifico si en la logica de busca_transferencias.php
                          el contador de seleccion es >0 */
                        if ($seleccion > 0) {
                            /* Busco los expedientes que cumplieron su tiempo en gestion
                              y su disposicion final es seleccion 4 */
                            $query_sel = $queryAlerta . $where . " and sexp.sgd_sexp_estado = 0 and sb.sgd_sbrd_dispfin='4' and " . $redondeo_ag . " < 0";
                            $rs_sel = $db->conn->query($query_sel);

                            if (!$rs_sel->EOF) {
                                ?>
                                <td><input type=button value=Seleccionar name=estado align=bottom class=botones id=estado onclick="confirma(4)"></td></tr> 
                            <?php
                            $pager = new ADODB_Pager($db, $query_sel, 'adodb', true, $orderNo, $orderTipo);
                            $pager->checkAll = false;
                            $pager->checkTitulo = false;
                            $pager->toRefLinks = $linkPagina;
                            $pager->toRefVars = $encabezado;
                            $pager->Render($rows_per_page = 20, $linkPagina, $checkbox = chkAnulados);
                        }
                    } else {
                        ?>
                        <tr><td class=leidos2 align="center">No se encontraron Radicados Proximos a seleccionar </td></tr> </table>
                        <?php
                    } //Fin seleccion
                } //Fin Traer 
                ?>
        </form>
    </center>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>
