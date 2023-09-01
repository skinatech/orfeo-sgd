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


session_start();
/**
 * Modificacion para aceptar Variables GLobales
 * @autor Jairo Losada 2009/05
 * @fecha 2009/05
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$carpeta = $_SESSION["carpeta"];
$busq_radicados = $_SESSION["busq_radicados"];

$assoc = $_SESSION['assoc'];
define('ADODB_ASSOC_CASE', $assoc);

if (!isset($_SESSION['dependencia']))
    include "./rec_session.php";
$ADODB_COUNTRECS = false;
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "." . DIRECTORY_SEPARATOR . "config.php";
require_once("$dir_raiz/include/db/ConnectionHandler.php");
require_once("$dir_raiz/include/combos.php");
//$ADODB_COUNTRECS = false;
$db = new ConnectionHandler($dir_raiz);
//$db->conn->debug = true;
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

// Procedimiento para filtro de radicados....
if ($busq_radicados) {
    $busq_radicados = trim($busq_radicados);
    $textElements = preg_split("/[\s,]+/", $busq_radicados);
    $newText = "";
    $dep_sel = $dependencia;
    foreach ($textElements as $item) {
        $item = trim($item);
        if (strlen($item) != 0) {
            if (strlen($item) <= 6) {
                $sec = str_pad($item, 6, "0", STR_PAD_left);
                //$item = date("Y") . $dep_sel . $sec;
            } else {
                
            }
            $busq_radicados_tmp .= " a.radi_nume_radi like '%$item%' or";
        }
    }
    if (substr($busq_radicados_tmp, -2) == "or")
        $busq_radicados_tmp = substr($busq_radicados_tmp, 0, strlen($busq_radicados_tmp) - 2);
    if (trim($busq_radicados_tmp))
        $where_filtro .= "and ( $busq_radicados_tmp ) ";
}
?>
<html>
    <head>
        <title>.: Modulo total :.</title>
        <?$url_raiz="."?>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script src="<?= $url_raiz ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?= $url_raiz ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
        <style type="text/css">
            <!--
            .textoOpcion {  font-family: Arial, Helvetica, sans-serif; font-size: 8pt; color: #000000; text-decoration: underline}
            -->
        </style>
        <!-- seleccionar todos los checkboxes-->
        <script>
            function window_onload()
            {
                document.getElementById('depsel8').style.display = 'none';
            }

            function markAll()
            {
                if (document.form1.elements['checkAll'].checked)
                    for (i = 10; i < document.form1.elements.length; i++)
                        document.form1.elements[i].checked = 1;
                else
                    for (i = 10; i < document.form1.elements.length; i++)
                        document.form1.elements[i].checked = 0;
            }

            function changedepesel()
            {
                if (document.getElementById('enviara').value == 7) {
                    document.getElementById('depsel8').style.display = 'none';
                    document.form1.cambioInf.value = 'B';
                } else {
                    document.getElementById('depsel8').style.display = '';
                    document.form1.cambioInf.value = 'I';
                }
            }

            function enviar()
            {
                document.form1.codTx.value = document.getElementById('enviara').value;
                sw = 0;
                cnt_notinf = 0;
                cnt_inf = 0;
                for (i = 3; i < document.form1.elements.length; i++)
                    if (document.form1.elements[i].checked)
                    {
                        sw = 1;
                        if (document.form1.elements[i].name[11] == '0')
                            cnt_notinf += 1;
                        else
                            cnt_inf += 1;
                    }
                if (sw == 0)
                {
                    alert("Debe seleccionar uno o mas informados");
                    return;
                }
                if (cnt_inf > 0 && cnt_notinf > 0 && document.getElementById('enviara').value == 7)
                {
                    alert("Los informados seleccionados ... o todos tienen informador o no tienen informador.");
                    return;
                }
                document.form1.submit();
            }
        </script>
        <?php
        $tbbordes = "#CEDFC6";
        $tbfondo = "#FFFFCC";
        $imagen = "flechadesc.gif";
        ?>
        <SCRIPT>
<?php
include "js/libjs.php";
?>
        </SCRIPT>
    </head>
    <body bgcolor="#FFFFFF" topmargin="0" onLoad="setupDescriptions();
            window_onload();">
        <p>
            <?php
            $krd = strtoupper($krd);
            $check = 1;
            $numeroa = 0;
            $numero = 0;
            $numeros = 0;
            $numerot = 0;
            $numerop = 0;
            $numeroh = 0;
            $fechaf = date("dmy") . time();
            $fechah = date("dmy") . time();
            $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion&carpeta=$carpeta";
            ?>
        <table border=0 width=100% class="t_bordeGris">
            <tr>
                <td>
                    <!-- Inicia tabla de cabezote -->
                    <table BORDER=0  cellpad=2 cellspacing='0' WIDTH=98% class='borde_tab' valign='top' align='center' >
                        <TR>
                            <td width='33%' >
                                <table width='100%' border='0' cellspacing='1' cellpadding='0' class="borde_tab">
                                    <tr>
                                        <td height="20">
                                            <div align="left" class="titulo1">
                                                <label>Listado de:</label>
                                            </div>
                                            Informados
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width='33%' >
<!--                                <table width='100%' border='0' cellspacing='1' cellpadding='0'>
                                    <tr>
                                        <td height="20" bgcolor="377584"><div align="left" class="titulo1">USUARIO </div></td>
                                    </tr>
                                    <tr class="info">
                                        <td height="20"><?= $_SESSION['usua_nomb'] ?></td>
                                    </tr>
                                </table>-->
                            </td>
                            <td width='34%' >
                                <table width='100%' border='0' cellspacing='1' cellpadding='0' class="borde_tab">
                                    <tr>
                                        <td height="20">
                                            <div align="left" class="titulo1">
                                                <label>Dependencia</label>
                                            </div>
                                            <?= $_SESSION['depe_nomb'] ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </TR>
                    </table>
                    <TABLE width="96%" align="center" cellspacing="0" cellpadding="0">
                        <tr class="tablas">
                            <TD class="titulos2">
                                <FORM style="margin: 10px" name=form_busq_rad action='cuerpoinf.php?krd=<?= $krd ?>&<?= session_name() . "=" . trim(session_id()) . $encabezado ?>' method=post>
                                    Buscar radicado(s) informado(s) (Separados por coma)
                                    <input name="busq_radicados" type="text" size="70" class="tex_area" value="<?= $busq_radicados ?>">
                                    <input type=submit value='Buscar ' name=Buscar valign='middle' class='botones' onChange="form_busq_rad.submit();">
                                </FORM>
                            </td>
                        </tr>
                    </table>
                    <form name='form1' action='tx/formEnvio.php?<?= $encabezado ?>' method='post'>
                        <input name="cambioInf" value="I" type="hidden">
                        <br>
                        <!-- Finaliza tabla de cabezote --> <!-- Inicia tabla de datos -->
                        <?php
                        $imagen = "img_flecha_sort.gif";
                        $row = array();
                        echo "<input type=hidden name=contra value=$drde> ";
                        echo "<input type=hidden name=sesion value=" . md5($krd) . "> ";
                        echo "<input type=hidden name=krd value=$krd>";
                        echo "<input type=hidden name=drde value=$drde>";
                        echo "<input type=hidden name=carpeta value=$carpeta>";
                        ?>
                        <table width="98%" align="center" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td colspan="2" height="80">
                                    <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" class="borde_tab">
                                        <tr>
                                            <td width="50%"  class="titulos2">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                                                    <tr class="titulos2">
                                                        <td width="20%" class="titulos2">Listar por:</td>
                                                        <td height="30">
                                                            <a href='cuerpoinf.php?<?php echo "$encabezado&orderNo=9&orderTipo=desc"; ?>' alt='Ordenar Por Leidos'><span class='leidos'>Le&iacute;dos</span></a>&nbsp;
                                                            <?= $img7 ?>
                                                            <a href='cuerpoinf.php?<?php echo "$encabezado&orderNo=9&orderTipo=asc"; ?>' alt='Ordenar Por Leidos'><span class='no_leidos'>No Le&iacute;dos</span></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="50%" align=right class="titulos2">
                                                <?php
                                                $ADODB_COUNTRECS = true;
                                                $isql = "select depe_codi,depe_nomb from DEPENDENCIA ORDER BY DEPE_NOMB";
                                                $rs = $db->query($isql);
                                                $ADODB_COUNTRECS = false;
                                                $numerot = $rs->RecordCount();
                                                ?>
                                                <span class='etitulos'><b>
                                                        <select name='enviara' id='enviara' class='select'  language='javascript' onchange=changedepesel()>
                                                            <option value=7>Borrar Documento informado</option>
                                                            <option value=8>Informar (Enviar copia de documentos)</option>
                                                        </select><br>
                                                        <select name='depsel8[]' id='depsel8' class='select' multiple size="5">
                                                            <?php
                                                            include "$dir_raiz/include/query/queryCuerpoinf.php";
                                                            $a = new combo($db);
                                                            $concatSQL = $db->conn->concat($concatenar, "' '", "depe_nomb");
                                                            $s = "SELECT DEPE_CODI,$concatSQL as NOMBRE  from dependencia order by depe_nomb asc ";
                                                            $r = "DEPE_CODI";
                                                            $t = "NOMBRE";
                                                            $v = $dependencia;
                                                            $sim = 0;
                                                            $a->conectar($s, $r, $t, $v, $sim, $sim);
                                                            ?>
                                                        </select>
                                                        </td>
                                                        <td class="titulos2">
                                                            <input type=button value="REALIZAR" name=Enviar valign="middle" class="botones" onClick="enviar();">
                                                            <input type=hidden name=codTx>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <td  colspan="3">
                                                                <?php
                                                                $iusuario = " and us_usuario='$krd'";
                                                                $sqlFecha = $db->conn->SQLDate("Y-m-d H:i A", "a.RADI_FECH_RADI");
                                                                $systemDate = $db->conn->sysTimeStamp;

                                                                $sqlOffset = $db->conn->OffsetDate("b.sgd_tpr_termino", "radi_fech_radi");
                                                                $concatSQL = $db->conn->Concat("a.RADI_NOMB", "' '", "a.RADI_PRIM_APEL", "' '", "a.RADI_SEGU_APEL");
                                                                
//                                                                if (strlen($orderNo) == 0) {
//                                                                    $orderNo = '0';
//                                                                    $order = 'info_leido ';
//                                                                } else
                                                                    $order = ' info_leido ';

                                                                if ($orden_cambio == 1) {
                                                                    if (trim(strtoupper($orderTipo)) != "DESC")
                                                                        $orderTipo = "DESC";
                                                                    else
                                                                        $orderTipo = "ASC";
                                                                }

                                                                include "$dir_raiz/include/query/queryCuerpoinf.php";
                                                                $linkPagina = "$PHP_SELF?$encabezado&orderTipo=$orderTipo&orderNo=$orderNo";
                                                                $encabezado .= "&adodb_next_page=1&orderTipo=$orderTipo&orderNo=";

                                                                if ($chk_carpeta)
                                                                    $chk_value = " checked ";
                                                                else
                                                                    $chk_value = " ";
                                                                
//                                                                echo '******************** '.$isql;
                                                                
                                                                $pager = new ADODB_Pager($db, $isql, 'adodb', true, $orderNo, $orderTipo, '.');
                                                                $pager->toRefLinks = $linkPagina;
                                                                $pager->toRefVars = $encabezado;
                                                                $pager->checkAll = false;
                                                                $pager->checkTitulo = true;
                                                                $pager->Render($rows_per_page = 15, $linkPagina, $checkbox = checkValue);
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        </table>
                                                        </form>
                                                        </td>
                                                        </tr>
                                                        </table>
                                                        <script>
                                                            $(document).ready(function () {
                                                                $('[data-toggle="tooltip"]').tooltip();
                                                            });
                                                        </script>
                                                        </body>
                                                        </html>
