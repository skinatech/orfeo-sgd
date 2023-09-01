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


/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
session_start();
$ruta_raiz = "..";
error_reporting(7);

foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

if (!isset($_SESSION['dependencia']))
    include "../rec_session.php";
/**
 * Modificacion para aceptar Variables GLobales
 * @autor Jairo Losada 
 * @fecha 2009/05
 */
/* * ******************************************************
 *           Variables  del archivo                      *
 * ****************************************************** */

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];

$codusuario = $_SESSION["codusuario"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];
$usua_nomb = $_SESSION['usua_nomb'];

/* * ******************************************************
 *          Encabezados de librerias estandares          *
 * ****************************************************** */
include_once "$ruta_raiz/include/db/ConnectionHandler.php";

/* * ******************************************************
 *           Constantes del archivo                      *
 * ****************************************************** */
$db = new ConnectionHandler("$ruta_raiz");
define('ADODB_ASSOC_CASE', $assoc);

//$db->conn->debug = true;
$generar_listado = $_POST['generar_listado'];

/* * ******************************************************
 *                   Programa Principal                  *
 * ****************************************************** */


/*
 * Genera planilla de envios 
 * @autor Isabel Rodriguez 
 * @fecha 2009/06 Modificacion Variables Globales. Arreglo cambio de los request Gracias a recomendacion de Hollman Ladino
 */

$htmlE = "";
?>

<html>
    <head>
        <title>Untitled Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="<?= $ruta_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $ruta_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>
    <body>
        <?php
        if ($gen_lisDefi and ! $cancelarListado) {
            $indi_generar = "SI";
        } else {
            $indi_generar = "NO";
        }
        ?>
        <table class=borde_tab width="50%" cellspacing="5">
            <tr><td class=titulos2><center>LISTADO DOCUMENTOS ENVIADOS</center></td></tr>
</table>

<table><tr><td></td></tr></table>

<form name='forma' action='generaplanilla.php?<?= session_name() . "=" . session_id() . "&krd=$krd&hora_ini=$hora_ini&hora_fin=$hora_fin&minutos_ini=$minutos_ini&minutos_fin=$minutos_fin&tip_radi=$tip_radi&fecha_busq=$fecha_busq&fecha_busqH=$fecha_busqH&fecha_h=$fechah&dep_sel=$dep_sel&num=$num" ?>' method=post>
    <?php
// proceso fechas
    $fecha_ini = $fecha_busq;
    $fecha_fin = $fecha_busq;
    $fecha_ini = mktime($hora_ini, $minutos_ini, 00, substr($fecha_ini, 5, 2), substr($fecha_ini, 8, 2), substr($fecha_ini, 0, 4));
    $fecha_fin = mktime($hora_fin, $minutos_fin, 59, substr($fecha_fin, 5, 2), substr($fecha_fin, 8, 2), substr($fecha_fin, 0, 4));

    $fecha_ini1 = "$fecha_busq $hora_ini:$minutos_ini:00";
    $fecha_mes = "'" . substr($fecha_ini1, 0, 7) . "'";
    $sqlChar = $db->conn->SQLDate("Y-m", "SGD_RENV_FECH");

// Si la variable $generar_listado_existente viene entonces este if genera
// la planilla existente
    $order_isql = " ORDER BY SGD_RENV_CODIGO,SGD_RENV_VALOR";
    include "$ruta_raiz/include/query/radsalida/queryListado_planillas.php";

    if ($generar_listado_existente) {
        $where_isql = $where_isql2;
    } else {
        $where_isql = $where_isql1;
    }
// Obtengo listado
    $isql = $query . $where_isql . $order_isql;
    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
    $rsMarcar = $db->conn->query($isql);

//echo "isql= $isql";    
    $no_registros = 0;
//$no_registros = $rsMarcar->recordcount(); 
    $radiNumero = $rsMarcar->fields["RADICADO"];

//if ($no_registros <=0) {
    if ($radiNumero == '') {
        $estado = "Error";
        if ($_POST['codigo_envio'] == 0) {
            $mensaje = "Debe seleccionar un tipo de salida";
        }
        echo "<script>alert('No se puede Generar el Listado. No existen registros $mensaje  ')</script>";
    } else {
        //Modificado skina
        $no_planilla = $db->conn->nextId('SEC_PLANILLA_ENVIO', $db->driver);

        if (!$no_planilla or intval($no_planilla) == 0)
            die("<table class=borde_tab width='100%'><tr><td class=titulosError><center>Debe colocar un Numero de Planilla v&aacute;lido</center></td></tr></table>");

        $archivo = "../bodega/pdfs/planillas/envios/$krd" . date("Ymd_hms") . "_lis_IMP.csv";
        $fp = fopen($archivo, "w");
        $com = chr(34);
        //$contenido="$com*No*$com,$com*Fecha*$com,$com*Radicado*$com,$com*Destino*$com,,$com*Departamento*$com,$com*Destinatario*$com,$com*Direccion*$com,$com*Telefono*$com,$com*Observacion*$com,$com*Dependencia*$com\n";
        $contenido = "$com*Radicado*$com,$com*Fecha*$com,$com*Remitente*$com,$com*Asunto*$com,$com*Destinatario*$com,$com*Direccion*$com,$com*Ciudad*$com,$com*Firma y fecha quien recibe*$com\n";
        $query_t = $isql;
        $ruta_raiz = "..";
        define('ADODB_FETCH_NUM', 1);
        $ADODB_FETCH_MODE = ADODB_FETCH_NUM;
        require "../radsalida/classControlLis.php";
        $btt = new CONTROL_ORFEO($db);
        $campos_align = array("C", "C", "C", "C", "C", "C", "C", "C", "C");
        //$campos_tabla = array("$verradicado","$padre","$fecha","$destinatario","$tipo_doc","$dep_envio","$direccion","-","-");
        $campos_vista = array("No. RADICADO", "RADICADO", "RADICADO PADRE", "FECHA RAD", "DESTINATARIO", "ASUNTO", "REMITENTE",  "OBSERVACIONES", "FIRMA,FECHA RECIBIDO");
        $campos_width = array(2, 200, 15, 19, 100, 200, 200,  200, 19);
        $btt->campos_align = $campos_align;
        $btt->campos_tabla = $campos_tabla;
        $btt->campos_vista = $campos_vista;
        $btt->campos_width = $campos_width;
        $btt->tabla_sql($query_t, $fecha_busq, $fecha_busq);
        $htmlE = $btt->tabla_htmlE;
        
        // By Skinatech - 14/08/2018
        // Para la construcción del número de radicado, esto indica la parte inicial del radicado.
        if ($estructuraRad == 'ymd'){
            $num = 9;
        }elseif ($estructuraRad == 'ym') {
            $num = 7;
        }else {
            $num = 5;
        }

        while (!$rsMarcar->EOF) {
            $no_registros = $no_registros + 1;
            $mensaje = "";
            $fecha = $rsMarcar->fields["FECHA"];
            $verradicado = $rsMarcar->fields["RADICADO"];
            $destinatario = $rsMarcar->fields["DESTINATARIO"];
            $moto = $rsMarcar->fields["TIPO"];
            $dep_envio = $rsMarcar->fields["DEPE_ENVIO"];
            $dep_envio2 = $rsMarcar->fields["DEPE_DIR"];
            $guia = $rsMarcar->fields["GUIA"];
            $tipo_doc = $rsMarcar->fields["TIPO_DOC"];
            $depto = $rsMarcar->fields["DEPARTAMENTO"];
            $mpio = $rsMarcar->fields["MUNICIPIO"];
            $direccion = $rsMarcar->fields["DIRECCION"];
            $padre = $rsMarcar->fields["PADRE"];
            $asun = $rsMarcar->fields["ASUNTO"];
            $observa_env = $rsMarcar->fields["OBSERVA"];
            $remitente_env = $rsMarcar->fields["REMITENTE"];
            $dep_radicado = substr($verradicado, $num, 3);
            $ano_radicado = substr($verradicado, 0, 4);

            //by skina; Extrayendo rango de masiva
            $rank_sql = "select r.RADI_NUME_GRUPO , count(*) as DOCUMENTOS , min(r.RADI_NUME_SAL) as RAD_INI , MAX(r.RADI_NUME_SAL) as RAD_FIN , TO_CHAR(r.SGD_RENV_FECH,'YYYY/MM/DD') AS FECHA , r.USUA_DOC ,rd.TDOC_CODI from sgd_renv_regenvio r, radicado rd WHERE r.sgd_renv_tipo = 2 and rd.RADI_NUME_RADI= r.RADI_NUME_GRUPO and sgd_depe_genera = '998' and RADI_NUME_GRUPO='$verradicado' group by r.radi_nume_grupo, TO_CHAR(r.SGD_RENV_FECH,'YYYY/MM/DD'),r.usua_doc,rd.TDOC_CODI order by r.radi_nume_grupo";
            $grupoMasiva = $db->conn->query($rank_sql);
            $radicado_ini = $grupoMasiva->fields["RAD_INI"];
            $radicado_fin = $grupoMasiva->fields["RAD_FIN"];

            if ($radicado_ini !== NULL) {
                $rango_rad = $radicado_ini . '<br>' . $radicado_fin;
                $campos_tabla = array("$no_registros", "$rango_rad", "$padre", "$fecha", "$destinatario", "$direccion","$asun", "$remitente_env",  "$observa_env", " ");
            } else {
                $campos_tabla = array("$no_registros", "$verradicado", "$padre", "$fecha", "$destinatario", "$direccion", "$asun", "$remitente_env",  "$observa_env", " ");
            }
            $btt->campos_tabla = $campos_tabla;
            $btt->tabla_Cuerpo();

            $contenido = "$com*Radicado*$com,$com*Fecha*$com,$com*Remitente*$com,$com*Asunto*$com,$com*Destinatario*$com,$com*Direccion*$com,$com*Ciudad*$com,$com*Firma y fecha quien recibe*$com\n";

            $rsMarcar->MoveNext();

            //Despues de crear la planilla se actualiza la tabla para escribir el numero de planilla
            $update_isql = "update sgd_renv_regenvio set sgd_renv_planilla='$no_planilla' WHERE RADI_NUME_SAL ='$verradicado' AND ( SGD_RENV_PLANILLA IS NULL OR SGD_RENV_PLANILLA = '' )";
            $rs_update = $db->conn->query($update_isql);
        } // FIN del WHILE (!$rsMarcar->EOF)

        fputs($fp, $contenido);
        fclose($fp);
        $fecha_dia = date("Ymd - H:i:s");
//    $html  = $htmlE;
        $html = $btt->tabla_html;
        $html .= "</tbody>";
        $html .= "</table>";

        //$html  = $btt->tabla_html;
        // by skina
        //define(FPDF_FONTPATH,'../fpdf/font/');
        //require("../fpdf/html_table.php");
        //$pdf = new PDF("L","mm","letter");
        //$pdf->AddPage();
        //$pdf->SetFont('Arial','',8);

        require_once('../include/tcpdf/config/lang/spa.php');
        require_once('../include/tcpdf/tcpdf.php');
        //$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, "FOLIO", true, 'UTF-8', false);
        // $pdf->SetFont('Arial', '', 8);
        $pdf->AddPage();


        $entidad = $db->entidad;
        $entidad_largo = $db->entidad_largo;
        $entidad_largo = strtoupper($entidad_largo);
        $nit_entidad = $db->nit_entidad;
        $encaenti = "../logoEntidad_negro_pdf.jpg";

        $isql = "SELECT SGD_FENV_DESCRIP FROM SGD_FENV_FRMENVIO WHERE SGD_FENV_CODIGO=$codigo_envio";
        $rs_tipo = $db->conn->Execute($isql);
        $tipo = $rs_tipo->fields["SGD_FENV_DESCRIP"];

        $empo_encabeza = <<<EOD
<table border="1">
<tbody>
<tr>
<td colspan="2" rowspan="6" align="center"><img src="$encaenti" alt=logo_fnd height="80px" width="100px"></td>
<td colspan="10" rowspan="1" align="center"><small><b>$entidad</b></small></td>
</tr>
<tr align="center">
<td colspan="10" rowspan="1"><small><b>NIT 892300285-6</b></small></td>
</tr>
<tr align="center">
<td colspan="10" rowspan="1"><br><small>NOMBRE DEL FORMATO: <b>CONTROL ENTREGA DE CORRESPONDENCIA</b></small></td>
</tr>
<tr align="center">
<td colspan="2" rowspan="1"><small>$no_planilla</small></td>
</tr>
<tr align="center">
<td colspan="5" rowspan="1"><small><b>USUARIO RESPONSABLE</b></small></td>
<td colspan="5" rowspan="1"><small><b>FIRMA DEL MENSAJERO</b></small></td>
</tr>
<tr align="center">
<td colspan="5" rowspan="1"><small>$usua_nomb</small></td>
<td colspan="5" rowspan="1"><small></small></td>
</tr>
</tbody>
</table>
<br>
<table border="1" cellpadding="1" cellspacing="1">
<tbody>
<tr align="center">
<td colspan="1" rowspan="1" width="0.5cm"><small><b>No.</b></small></td>
<td colspan="1" rowspan="1" width="2.5cm"><small><b>RADICADO</b></small></td>
<td colspan="1" rowspan="1" width="2.5cm"><small><b>RADICADO PADRE</b></small></td>
<td colspan="1" rowspan="1" width="1.7cm"><small><b>FECHA Y HORA DE RADICADO</b></small></td>
<td colspan="1" rowspan="1" width="4cm"><small><b>DESTINATARIO</b></small></td>
<td colspan="1" rowspan="1" width="4cm"><small><b>DIRECCION</b></small></td>
<td colspan="1" rowspan="1" width="6cm"><small><b>ASUNTO</b></small></td>
<td colspan="1" rowspan="1" width="2.6cm"><small><b>REMITENTE</b></small></td>
<td colspan="1" rowspan="1" width="3.5cm"><small><b>OBSERVACIONES</b></small></td>
<td colspan="1" rowspan="1" width="2.8cm"><small><b>FIRMA, FECHA Y HORA DE RECIBIDO</b></small></td>
</tr>
EOD;

        //$pdf->WriteHTML($encabezado. $html);
        //Imprimeindo intento 1
        $pdf->WriteHTML($empo_encabeza . $html, true, false, false, false, '');
        //    $pdf->WriteHTML($encabezado, true, false,false, false, '');
        //    $pdf->WriteHTML($html, true, false,false, false, '');

        $arpdf_tmp = "../bodega/pdfs/planillas/envios/$krd" . date("Ymd_hms") . "_lis_IMP.pdf";
        //$pdf->Output($arpdf_tmp);
        $pdf->Output($arpdf_tmp, 'F');
        echo "</br><h4>Para imprimir la planilla siga el siguiente v&iacute;nculo  <a class=vinculos href='$arpdf_tmp' target='" . date("dmYh") . time() . "'>Abrir Archivo Pdf</a></h4>";
        echo "<br>";
        $salida = "csv";
        //echo "Para obtener el archivo csv guarde del destino del siguiente v&iacute;nculo  <a class=vinculos href='$archivo' target='".date("dmYh").time()."'>Generado         </a>";
    }
//FIN else if ($no_registros <=0)
    ?>
</form>
<?
?>  
</body>
</html>


