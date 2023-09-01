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

define('ADODB_ASSOC_CASE', $assoc);

if (!isset($_SESSION['dependencia']))
    include "../rec_session.php";
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];


if (!is_object($db)) {
    include_once "$dir_raiz/include/db/ConnectionHandler.php";
    $db = new ConnectionHandler("$dir_raiz");
}

$motivo_devol = $_POST['motivo_devol'];
$devolver_rad = $_POST['devolver_rad'];
$checkValue = $_POST['checkValue'];
//$db->conn->debug=true;

$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$encabezado_i = "estado_sal=$estado_sal&motivo_devol=$motivo_devol&estado_sal_max=$estado_sal_max&pagina_sig=$pagina_sig&dep_sel=$dep_sel&krd=$krd";
?>
<head>
    <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    <script src="<?= $url_raiz ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="<?= $url_raiz ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<BODY>
    <br>
<center><span class=vinculos> 
        <a href="cuerpoDevOtras.php?<?= $encabezado_i ?>&<?= session_name() . '=' . session_id() . "&devolucion=1" ?>"> Devolver al Listado</a>
    </span>
</CENTER>
<div id="spiffycalendar" class="text"></div>
<form name="new_product"  action='dev_corresp_otras.php?<?= session_name() . "=" . session_id() . "&krd=$krd&fecha_h=$fechah&$encabezado_i" ?>' method=post><center>
        <?php
        if (!$devolver_rad or $motivo_devol == 0) {
            ?>
            <center>
                <table width="55%" class="borde_tab" border="2" cellpadding="5">
                    <tr>
                    <div id="titulo" style="width: 55%;" align="center">Devoluci&oacute;n de documentos</div>
                    </tr>
                    <TR>
                        <TD width="125" height="21"  class='titulos2'>Tipo de Devoluci&oacute;n<br></TD>
                        <TD width="225" align="right" valign="top" class='listado2'>
                            <?php
                            $ss_RADI_DEPE_ACTUDisplayValue = "----- Escoja un Motivo -----";
                            $valor = 0;
                            include "$dir_raiz/include/query/devolucion/querytipo_dev_corresp.php";
                            $sql = "select $sqlConcat ,SGD_DEVE_CODIGO from SGD_DEVE_DEV_ENVIO
				WHERE SGD_DEVE_CODIGO < 99
				 order by SGD_DEVE_CODIGO";
                            $rsDep = $db->conn->Execute($sql);
                            print $rsDep->GetMenu2("motivo_devol", "$motivo_devol", $blank1stItem = "$valor:$ss_RADI_DEPE_ACTUDisplayValue", false, 0, " class='select'");
                            $municodi = "";
                            $muninomb = "";
                            $depto = "";
                            ?>
                        </TD>
                    </TR>
                    <TR>
                        <TD height="26" class='titulos2'>Comentarios</TD>
                        <TD valign="top" class='listado2'>
                            <input type=text name=comentarios_dev value='<?= $comentarios_dev ?>' class=tex_area size=60>
                        </TD>
                    </TR><tr>
                    </tr><tr><td height="26" colspan="2" valign="top" class='titulos2'> <center>
                        <input type=SUBMIT name='devolver_rad'  value = 'Confirmar devoluci&oacute;n' class='botones_largo' ></center></td>
                    </tr>
                </TABLE>
            </center>
            <?php
        } else {//<input type=SUBMIT name='devolver_rad'  value = 'CONFIRMAR DEVOLUCION' class=ebuttons2 onclick="markDev();"></center></td>
            error_reporting(7);
            $isql = "select SGD_DEVE_DESC from SGD_DEVE_DEV_ENVIO WHERE SGD_DEVE_CODIGO = $motivo_devol ";
            $sim = 0;

            define('ADODB_ASSOC_CASE', $assoc);
            $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
            $rs = $db->conn->Execute($isql);
            $motivo = $rs->fields["SGD_DEVE_DESC"];
        }
        error_reporting(7);
        /** Procediminiento que recorre el array de valores de radicados a devolver.....*/
        if (!$radicados_dev or $motivo_devol == 0) {
            $sum = '';
            $num = count($checkValue);
            $i = 0;
            while ($i < $num) {
                $record_id = key($checkValue);
                $radicados_dev .= $record_id . ",";
                next($checkValue);
                $i++;
            }
            $radicados_devOrginal = $radicados_dev;
            $radicados_dev = str_replace("-", "", $radicados_dev);
            $radicados_dev .= "9999";
        }

        echo "<input type=hidden name=radicados_dev value='$radicados_dev'>";
        echo "<input type=hidden name=radicados_devOrginal value='$radicados_devOrginal'>";
        if ($devolver_rad and $motivo_devol == 0) {
            echo "
		 <script>
		 alert('Elija un Motivo de devolucion.');
		 </script>
		 ";
        }
        /***
        Autor: Jenny Gamez
        Fecha: 2019-09-05
        Info: Se realiza corrección en esta sección de código en referencia a que cuando se seleccionaba a mas de un
              radicado desde la opción de envios/otras devoluciones, el caracter de separación no se estaba cargado
              correctamente lo que ocasionava que la query generará error
        ***/
        if ($devolver_rad and $motivo_devol) {
            if ($motivo_devol != 0) {
                $systemDate = $db->conn->OffsetDate(0, $db->conn->sysTimeStamp);
                $sqlConcat = $db->conn->Concat("'$comentarios_dev'", "'-'", "sgd_renv_observa");
                include "$dir_raiz/include/query/devolucion/querydev_corresp_otras.php";

                // Se recibe la información de los radicados y se concatena un ) para finalizar la sentencia IN
                // de forma correcta, luego se lee ,) para reemplazarlo por ',' esto con el fin de al selecionar 
                // mas de un resultado no genere error.

                $radicados_devOrginal = $radicados_devOrginal . ")";                 
                $radicados_devOrginal = str_replace(",)", "", $radicados_devOrginal);     
                $radicados_devOrginal = str_replace(",", "','", $radicados_devOrginal);
                $condicion = " radi_nume_sal in ('$radicados_devOrginal')";

                $isqlu = "update sgd_renv_regenvio
                                set sgd_deve_fech=$systemDate, sgd_deve_codigo = $motivo_devol,
                                sgd_renv_observa = " . $db->conn->substr . "($sqlConcat,0,199) where $condicion ";                
                $rs = $db->conn->Execute($isqlu);

                $num = count($checkValue);
                $i = 0;
                foreach($checkValue as $value){
                    $record_id = key($checkValue);
                    $chkt = $record_id;
                    $radicados_lis .= $record_id . ",";
                    $systemDate = $db->conn->OffsetDate(0, $db->conn->sysTimeStamp);
                    $isql = "update anexos set anex_estado=3, sgd_deve_fech=$systemDate, sgd_deve_codigo = $motivo_devol
                        where sgd_dir_tipo=sgd_dir_tipo and radi_nume_salida='$chkt'";
                    $ADODB_COUNTRECS = true;
                    $rs = $db->conn->Execute($isql);
                    if ($rs) {
                        $anexos_act = $rs->recordcount();
                    } else {
                        $anexos_act = 0;
                    }
                    $ADODB_COUNTRECS = false;
                    $isql_hl = "insert
                into hist_eventos(DEPE_CODI, HIST_FECH, USUA_CODI, RADI_NUME_RADI, HIST_OBSE, USUA_CODI_DEST, USUA_DOC, SGD_TTR_CODIGO)
                values ($dependencia, $systemDate ,$codusuario,'$chkt','Devolucion ($motivo). $comentarios_dev',NULL,'$usua_doc',28)";

                    $rs = $db->conn->Execute($isql_hl);

                    if ($radi_nume_padre != $radi_nume_deri and $radi_nume_padre) {
                        $isql_hl = "insert
                        into hist_eventos(DEPE_CODI   ,HIST_FECH,USUA_CODI  ,RADI_NUME_RADI   ,HIST_OBSE         ,USUA_CODI_DEST,USUA_DOC   ,SGD_TTR_CODIGO)
                        values ($dependencia, $systemDate ,$codusuario,$radi_nume_padre,'Devolucion('$chkt', $motivo). $comentarios_dev',''            ,'$usua_doc','28')";
                        $rs = $db->conn->Execute($isql_hl);
                    }
                }
                ?>
                <table><tr><td></td></tr></table>
                <table><tr><td></td></tr></table>
                <TABLE width="100%" class='borde_tab' cellspacing="5"><TR><TD height="30" valign="middle"   class='listado2' align="center">
                    <center><b>Se ha realizado la devoluci&oacute;n de los siguientes registros enviados<br>
                            <?= $radicados_lis ?></b></center>
                    </td></tr></table>
                <table><tr><td></td></tr></table>
                <table><tr><td></td></tr></table>
                <?php
                //echo "DEVUELTOS  ".$radicados_dev;
                $sqlFecha = $db->conn->SQLDate("d-m-Y H:i A", "a.SGD_RENV_FECH");
                include "$dir_raiz/include/query/devolucion/querydev_corresp_otras.php";

                $condicion = " and radi_nume_sal in ('$radicados_devOrginal')";

                $isql = 'select distinct
                         ' . $nombre . '    as "DAT_Numero Radicado",
                         sgd_renv_planilla  as "Planilla",
                         ' . $sqlFecha . '  as "FECHA ENVIO",
                         sgd_renv_nombre    as "Destinatario",
                         sgd_renv_dir       as "Direccion",
                         sgd_renv_depto     as "Departamento",
                         sgd_renv_mpio	    as "Municipio",
                         sgd_renv_cantidad  as "Documentos",
                         sgd_renv_valor     as "Valor Unitario",
                         a.sgd_renv_codigo  as "HID_sgd_renv_codigo"
                         from SGD_RENV_REGENVIO a , radicado b
                         where
                         a.radi_nume_sal=b.radi_nume_radi
                         ' . $condicion . '';
                $rs = $db->conn->Execute($isql);
                $pager = new ADODB_Pager($db, $isql, 'adodb', true, $orderNo, $orderTipo,'..');
                $pager->toRefLinks = $linkPagina;
                $pager->toRefVars = $encabezado;
                $pager->checkAll = true;
                $pager->checkTitulo = false;
                $pager->Render($rows_per_page = 20, $linkPagina);
                //echo $radicados_dev;
            } else {
                echo "<span class=etexto><b>No se actualizaron los registros <br>Debe seleccionar un tipo de devolucion<br>";
                echo "<input type=hidden name=devolucion_rad value=si>";
            }
        }
        if (!$devolver_rad or ! $motivo_devol) {

            $sqlFecha = $db->conn->SQLDate("d-m-Y H:i A", "a.SGD_RENV_FECH");
            include "$dir_raiz/include/query/devolucion/querydev_corresp_otras.php";
            $radicados_dev = str_replace(",9999", "", $radicados_dev);

            // Se recibe la información de los radicados y se concatena un ) para finalizar la sentencia IN
            // de forma correcta, luego se lee ,) para reemplazarlo por ',' esto con el fin de al selecionar 
            // mas de un resultado no genere error.

            $radicados_devOrginal = $radicados_devOrginal . ")";    
            $radicados_devOrginal = str_replace(",)", "", $radicados_devOrginal);     
            $radicados_devOrginal = str_replace(",", "','", $radicados_devOrginal);
            $condicion = " and radi_nume_sal in ('$radicados_devOrginal')";

            //Modificacion skina 
            $isql = 'select
                         ' . $nombre . '    as  "DAT_Numero Radicado",
                         sgd_dir_codigo     as "HID_Codigo Destinatario",
                         sgd_renv_planilla  as "Planilla",
                         ' . $sqlFecha . '      as "FECHA ENVIO",
                         sgd_renv_nombre    as "Destinatario",
                         sgd_renv_dir       as  "Direccion",
                         sgd_renv_depto     as  "Departamento",
                         sgd_renv_mpio	    as   "Municipio",
                         sgd_renv_cantidad  as  "Documentos",
                         sgd_renv_valor     as  "Valor Unitario",
                        a.sgd_renv_codigo   as "HID_sgd_renv_codigo",
                         ' . $nombre . '  AS "CHK_CHKANULAR"
                         from SGD_RENV_REGENVIO a , radicado b
                         where
                         a.radi_nume_sal=b.radi_nume_radi
                         ' . $condicion . '';
            $rs = $db->conn->Execute($isql);
            $pager = new ADODB_Pager($db, $isql, 'adodb', false, $orderNo, $orderTipo,'..');
            $pager->toRefLinks = $linkPagina;
            $pager->toRefVars = $encabezado;
            $pager->checkAll = true;
            $pager->checkTitulo = false;
            $pager->Render($rows_per_page = 20, $linkPagina, $checkbox = chkEnviar);
        }
        /***
        Autor: Jenny Gamez
        Fecha: 2019-09-05
        Info: Fin
        ***/  
        ?>
</form>
<script>
    function markDev()
    {
        for (i = 1; i < document.new_product.elements.length; i++)
            document.new_product.elements[i].checked = 1;
    }
</script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</html>
