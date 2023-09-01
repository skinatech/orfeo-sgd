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
session_start();

$ruta_raiz = "..";
$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$assoc = $_SESSION['assoc'];

        /*---------------------------------------------------------+
        |                    DEFINICIONES                          |
        +---------------------------------------------------------*/


        /*---------------------------------------------------------+
        |                       MAIN                               |
        +---------------------------------------------------------*/
/**
 * Pagina que muestra el contenido de los reportes de devoluciones
 * Creado en la SSPD en el año 2003
 * 
 * Se añadio compatibilidad con variables globales en Off
 * @autor Jairo Losada 2009-06
 * @licencia GNU/GPL V 3
 */


include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";
include_once "../include/db/ConnectionHandler.php";
$db = new ConnectionHandler("..");
//$db->conn->debug = true;
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;
error_reporting(7);
$ruta_raiz = "..";
if (!$fecha_busq)
    $fecha_busq = date("Y-m-d");
if (!$fecha_busq2)
    $fecha_busq2 = date("Y-m-d");
if (!$dependencia)
    include "$ruta_raiz/rec_session.php";
?>
<head>
    <link href="<?= $ruta_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?= $ruta_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
</head>
<BODY>
    <div id="spiffycalendar" class="text"></div>
    <link rel="stylesheet" type="text/css" href="../js/spiffyCal/spiffyCal_v2_1.css">
    <script language="JavaScript" src="../js/spiffyCal/spiffyCal_v2_1.js"></script>
    <script language="javascript">
        setRutaRaiz("..");
        <!--
      var dateAvailable = new ctlSpiffyCalendarBox("dateAvailable", "formboton", "fecha_busq", "btnDate1", "<?= $fecha_busq ?>", scBTNMODE_CUSTOMBLUE);
        var dateAvailable2 = new ctlSpiffyCalendarBox("dateAvailable2", "formboton", "fecha_busq2", "btnDate1", "<?= $fecha_busq2 ?>", scBTNMODE_CUSTOMBLUE);
        //-->
    </script>
    <P>
    <form name=formboton  method=post  action='generar_estadisticas.php?<?= session_name() . "=" . session_id() . "&krd=$krd&fecha_h=$fechah&fecha_busq=$fecha_busq&fecha_busq2=$fecha_busq2" ?>'>
        <center>
        <TABLE width="650px" class="borde_tab" border="2" align="center">
            <!--DWLayoutTable-->
            <tr>
            <div id="titulo" style="width: 650px;" align="center">Generaci&oacute;n Listados de Documentos <br> Devueltos por Agencia de Correo</div>
            </tr>
            <TR>
                <TD width="125" height="21"  class='titulos2'><label for="fecha_busq"> Fecha inicial</label><br>
                    <?php
                    echo "($fecha_busq)";
                    ?>
                </TD>
                <TD width="415" align="right" valign="top" class='listado2'>
                    <script language="javascript">
        dateAvailable.date = "2003-08-05";
        dateAvailable.writeControl();
        dateAvailable.dateFormat = "yyyy-MM-dd";
                    </script>
                </TD>
            </TR>
            <TR>
                <TD width="125" height="21"  class='titulos2'><label for="fecha_busq2"> Fecha final</label><br>
                    <?php
                    echo "($fecha_busq2)";
                    ?>
                </TD>
                <TD width="415" align="right" valign="top" class='listado2'>
                    <script language="javascript">
                        dateAvailable2.date = "2003-08-05";
                        dateAvailable2.writeControl();
                        dateAvailable2.dateFormat = "yyyy-MM-dd";
                    </script>
                </TD>
            </TR>
            <tr>
                <TD height="26" class='titulos2'><label for="tipo_envio">Tipo de Salida</label></TD>
                <TD valign="top" align="left" class='listado2'>
                    <?php
                    $ss_RADI_DEPE_ACTUDisplayValue = "--- TODOS LOS TIPOS ---";
                    $valor = 0;
                    include "../include/query/reportes/querytipo_envio.php";
                    $sqlTS = "select $sqlConcat ,SGD_FENV_CODIGO from SGD_FENV_FRMENVIO order by SGD_FENV_CODIGO";
                    $rsTs = $db->conn->Execute($sqlTS);
                    print $rsTs->GetMenu2("tipo_envio", "$tipo_envio", $blank1stItem = "$valor:$ss_RADI_DEPE_ACTUDisplayValue", false, 0, " onChange='submit();' class='select' id='tipo_envio' title='Listado de los tipos de envío registrados'");
                    ?>

            </tr>
            <TR>
                <TD height="26" class='titulos2'><label for="dep_sel">Dependencia</label></TD>
                <TD valign="top" class='listado2'>
                    <?php
                    $ss_RADI_DEPE_ACTUDisplayValue = "--- TODAS LAS DEPENDENCIAS ---";
                    $valor = 0;
                    include "$ruta_raiz/include/query/devolucion/querydependencia.php";
                    $sqlD = "select $sqlConcat ,depe_codi from dependencia order by depe_codi";
                    $rsDep = $db->conn->Execute($sqlD);
                    print $rsDep->GetMenu2("dep_sel", "$dep_sel", $blank1stItem = "$valor:$ss_RADI_DEPE_ACTUDisplayValue", false, 0, " onChange='submit();' class='select' id='dep_sel' title='Listado de las dependencias existentes'");
                    ?>

            </TR>
            <tr>
                <td height="26" colspan="2" valign="top" class='listado1'> <center>
                <INPUT TYPE=SUBMIT name=generar_informe Value=' Generar Informe ' class='botones_largo' aria-label="generar informe de documentos devueltos por la agencia de correo"></center>
            </td>
            </tr>
        </TABLE>
        </center>
        <?php
        if (!$fecha_busq)
            $fecha_busq = date("Y-m-d");
        if ($generar_informe) {
            if ($tipo_envio == 0) {
                $where_tipo = "";
            } else {
                $where_tipo = " and a.SGD_FENV_CODIGO = $tipo_envio ";
            }
            if (isset($dep_sel) && $dep_sel == '0') {
                /*
                 * Seleccionar todas las dependencias de una territorial
                 * byu skina 
                 * quitamos la restriccion por territorial 
                 * permite ver todas las dependencias de la entidad
                 */
                include "$ruta_raiz/include/query/devolucion/querydependencia.php";
                $sqlD = "select $sqlConcat ,depe_codi from dependencia order by depe_codi";
                $rsDep = $db->conn->Execute($sqlD);
                while (!$rsDep->EOF) {
                    $depcod = $rsDep->fields["DEPE_CODI"];
                    $lista_depcod .= " '$depcod',";
                    $rsDep->MoveNext();
                }
                $lista_depcod .= "'0'";
            } else {
                $lista_depcod = "'" . $dep_sel . "'";
            }
//Se limita la consulta al substring del numero de radicado de salida 27092005
            include "../include/query/reportes/querydepe_selecc.php";
            $generar_informe = 'generar_informe';
            error_reporting(7);
            $fecha_ini = $fecha_busq;
            $fecha_fin = $fecha_busq2;
            $fecha_ini = mktime(00, 00, 00, substr($fecha_ini, 5, 2), substr($fecha_ini, 8, 2), substr($fecha_ini, 0, 4));
            $fecha_fin = mktime(23, 59, 59, substr($fecha_fin, 5, 2), substr($fecha_fin, 8, 2), substr($fecha_fin, 0, 4));
            $guion = "'-'";
            include "../include/query/reportes/querygenerar_estadisticas.php";

            $order_isql = " ORDER BY a.SGD_DEVE_FECH ASC";
            $query_t = $query . $where_isql . $where_depe . $where_tipo . $order_isql;
            $ruta_raiz = "..";
            error_reporting(7);
            define('ADODB_FETCH_NUM', 1);
            $ADODB_FETCH_MODE = ADODB_FETCH_NUM;
            require "../anulacion/class_control_anu.php";
            $db->conn->SetFetchMode(ADODB_FETCH_NUM);
            $btt = new CONTROL_ORFEO($db);
            $campos_align = array("L", "C", "L", "L", "L", "L", "L", "L", "L", "L", "L", "L", "L", "L", "L");
            $campos_tabla = array("sgd_fenv_descrip", "depe_nomb", "radi_nume_sal", "sgd_renv_nombre", "sgd_renv_dir", "sgd_renv_mpio", "sgd_renv_depto", "sgd_renv_fech", "sgd_deve_fech", "sgd_deve_desc", "firma");
            $campos_vista = array("Forma de Env&iacute;o", "Dependencia", "Radicado", "Destinatario", "Direcci&oacute;n", "Municipio", "Departamento", "Fecha de Env&iacute;o", "Fecha Dev", "Motivo Devoluci&oacute;n", "Recibido");
            $campos_width = array(80, 110, 100, 160, 120, 70, 70, 80, 70, 150, 110);
            $btt->campos_align = $campos_align;
            $btt->campos_tabla = $campos_tabla;
            $btt->campos_vista = $campos_vista;
            $btt->campos_width = $campos_width;
            ?>
        </center>
        <br>
        <div style="margin-left: 2.5%;">
                <b>Listado de documentos Devueltos</b><br>
                Fecha Inicial <?= $fecha_busq . "  00:00:00" ?> <br>
                Fecha Final   <?= $fecha_busq2 . "  23:59:59" ?> <br>
                Fecha Generado <? echo date("Ymd - H:i:s"); ?>
            </div><br>
        <?php
        $btt->tabla_sql($query_t);
        error_reporting(7);

        $html = $btt->tabla_html;
        error_reporting(7);
        define(FPDF_FONTPATH, '../include/fpdf/font/');
        require("../include/fpdf/html_table.php");
        error_reporting(7);
        $pdf = new PDF("L", "mm", "A4");
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 7);
        $entidad = $db->entidad;
        $encabezado = "<table border=1>
			<tr>
			<td width=1120 height=30>$entidad</td>
			</tr>
			<tr>
			<td width=1120 height=30>Reporte de devoluci&oacute;n de documentos entre $fecha_busq   00:00:00  y $fecha_busq2   23:59:59 </td>
			</tr>
			</table>";
        $fin = "<table border=1 bgcolor='#FFFFFF'>
			<tr>
			<td width=1120 height=60 bgcolor='#CCCCCC'>FUNCIONARIO CORRESPONDENCIA</td>
			</tr>
			<tr>
			<td width=1120 height=60></td>
			</tr>
		</table>";

        $pdf->WriteHTML($encabezado . $html . $fin);
        $arpdf_tmp = "../bodega/pdfs/planillas/dev/$dependencia_$krd_" . date("Ymd_hms") . "_dev.pdf";
        $pdf->Output($arpdf_tmp);
        echo "<div style='margin-left: 2.5%; margin-top: -395px; font-size: 16px;'>"
        . "<strong>" 
                . "<a href='$arpdf_tmp' target='" . date("dmYh") . time() . "'  aria-label='Generar informe en archivo pdf'>Abrir Archivo Pdf</a>"
                . "</strong>"
                . "</div>";
    }
    ?>
