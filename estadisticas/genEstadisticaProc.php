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

        /*---------------------------------------------------------+
        |                       MAIN                               |
        +---------------------------------------------------------*/


if(!$db)
{
	
$krdOld = $krd;
$carpetaOld = $carpeta;
$tipoCarpOld = $tipo_carp;
if(!$tipoCarpOld) $tipoCarpOld= $tipo_carpt;
session_start();
if(!$krd) $krd=$krdOsld;
include "$dir_raiz/rec_session.php";

include_once "$dir_raiz/include/db/ConnectionHandler.php";
require_once("$dir_raiz/class_control/Mensaje.php");
include("$dir_raiz/class_control/usuario.php");

$db = new ConnectionHandler($dir_raiz);	 
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

//$db->conn->debug = true;
$objUsuario = new Usuario($db);
error_reporting(7);
?>
<br />
<?php 
if( isset($_GET['genDetalle']) && $_GET['dendetalle']=1){
	$tipo_carp=false;
	$usuaDocProc=trim($_GET['usuaDocProc']);
	?>
<html>
<head>
<title>Detalle de las Est&aacute;disticas</title>
<link rel="stylesheet" href="<?=$url_raiz?>/estilos/orfeo.css" type="text/css">
</head>
<?php	
}
require_once("$dir_raiz/envios/paEncabeza.php");

$datosaenviar = "fechaf=$fechaf&genDetalle=$genDetalle&tipoEstadistica=$tipoEstadistica&codus=$codus&krd=$krd&dependencia_busq=$dependencia_busq&dir_raiz=$dir_raiz&fecha_ini=$fecha_ini&fecha_fin=$fecha_fin&tipoRadicado=$tipoRadicado&tipoDocumento=$tipoDocumento&codUs=$codUs&fecSel=$fecSel&codProc="; 
}
	$where=($_REQUEST['codProceso']=="0") ?"":" AND sExp.SGD_FEXP_CODIGO <> 0 ";
	print $_POST['codProceso'];
	$wheretapaProc=isset($_GET['etapaProc'])?" AND sExp.SGD_FEXP_CODIGO =".$_GET['etapaProc']:"";
	
	if(isset($_REQUEST['codus']) && $_REQUEST['codus']!="0"){
		$whereTipoRadicado.=" AND b.USUA_CODI = ".$_REQUEST['codus'];
	}elseif((!isset($_REQUEST['codus']) && $_REQUEST['codus']!="0") && $usua_perm_estadistica<1){
	    $whereTipoRadicado.=" AND b.USUA_CODI = ".$_SESSION['codusuario'];
	}
	
	if($tipoDocumento and ($_REQUEST['tipoDocumento']!='9999' and $_REQUEST['tipoDocumento']!='9998')){
		$whereTipoRadicado.=" AND t.SGD_TPR_CODIGO = ".$_REQUEST['tipoDocumento'];
	}
	$whereProc=isset($_REQUEST['codProceso']) && $_REQUEST['codProceso'] !="" ?" AND sExp.SGD_PEXP_CODIGO=".$_REQUEST['codProceso']." ":"";
	
	$whereAnoExp =(isset($_REQUEST['codAno']) && $_REQUEST['codAno']!='0')?" AND sExp.SGD_SEXP_ANO = ".$_REQUEST['codAno'] :"";
	$whereDependencia = " AND sExp.DEPE_CODI=".$_REQUEST['dependencia_busq'];
	$whereDependencia.=$where.$whereProc;
	$whereEstadoProc.=$whereProc.$wheretapaProc.$where;
	
	
	
	
switch($tipoEstadistica){
	case "1":
	include "$dir_raiz/include/query/estadisticas/consultaProc001.php";
	$generar = "ok";
	break;
	case "2":
	include "$dir_raiz/include/query/estadisticas/consultaProc002.php";
	$generar = "ok";
	break;
}
if($generar == "ok") {
	require_once($dir_raiz."/include/myPaginador.inc.php");
	//$db->conn->debug=true;
	if($genDetalle==1) $queryE = $queryEDetalle;
	if($genTodosDetalle==1) $queryE = $queryETodosDetalle;
	if ($tipoEstadistica==2) include ("./tablaProcHtml42.php");
    else include ("./tablaProcHtml.php");
 }
?>
