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


/** Modulo de Expedientes o Carpetas Virtuales
  * Modificacion Variables 
  *@autor Jairo Losada 2009/06
  *Licencia GNU/GPL 
  */
foreach ($_GET as $key => $valor)   ${$key} = $valor;
foreach ($_POST as $key => $valor)   ${$key} = $valor;

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tip3Nombre=$_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img =$_SESSION["tip3img"];
$tpNumRad = $_SESSION["tpNumRad"];
$tpPerRad = $_SESSION["tpPerRad"];
$tpDescRad = $_SESSION["tpDescRad"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tpDepeRad = $_SESSION["tpDepeRad"];
$usuaPermExpediente = $_SESSION["usuaPermExpediente"];

if (!$dir_raiz) $dir_raiz = "..";
include_once("$dir_raiz/include/db/ConnectionHandler.php");
include_once "$dir_raiz/include/tx/Historico.php";
include_once "$dir_raiz/include/tx/Expediente.php";
include_once dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."config.php";
	//$db->conn->debug=true;
	$db = new ConnectionHandler("$dir_raiz");
	$objHistorico= new Historico($db); 
$encabezadol = "$PHP_SELF?".session_name()."=".session_id()."&numeroExpediente=$numeroExpediente&dependencia=$dependencia&krd=$krd&numRad=$numRad&coddepe=$coddepe&codusua=$codusua&depende=$depende&codserie=$codserie";
?>
<html height=50,width=150>
<head>
<title>Cambiar Responsable</title>
<link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
<CENTER>
<body bgcolor="#FFFFFF">
<div id="spiffycalendar" class="text"></div>
 <link rel="stylesheet" type="text/css" href="../js/spiffyCal/spiffyCal_v2_1.css">
 <script language="JavaScript" src="../js/spiffyCal/spiffyCal_v2_1.js">


 </script>

<form name=responsable action="<?=$encabezadol?>" method='post' action='responsable.php?<?=session_name()?>=<?=trim(session_id())?>&numeroExpediente=<?=$numeroExpediente?>&krd=<?=$krd?>&texp=<?=$texp?>&numRad=<?=$numRad?>&<?="&mostrar_opc_envio=$mostrar_opc_envio&nomcarpeta=$nomcarpeta&carpeta=$carpeta&leido=$leido"?>'>
<br>

<table border=1 cellpadding="0" cellspacing="5" class="borde_tab">
<TD class=titulos5 >
		Usuario Responsable del Proceso
	</TD>
	<td class=listado2>
<?

$depe=substr($numeroExpediente,4,$longitud_codigo_dependencia);

	$queryUs = "select usua_nomb, usua_doc from usuario where depe_codi='$depe' AND USUA_ESTA='1'
							order by usua_nomb";
//$db->conn->debug=true;
	$rsUs = $db->conn->Execute($queryUs);
	print $rsUs->GetMenu2("usuaDocExp", "$usuaDocExp", "0:-- Seleccione --", false,""," class='select' aria-label='Listado de usuarios de la dependencia para aignar como responsable del expediente'");
		$observa = "Se modifico el responsable  ";
		$arrayRad[0]=$numRad;

	if($Grabar){
	if($usuaDocExp!=0 ){
	$query="update sgd_sexp_secexpedientes set USUA_DOC_RESPONSABLE='$usuaDocExp' 
							WHERE SGD_EXP_NUMERO = '$numeroExpediente' and depe_codi='$depe'";
	$rsUs = $db->conn->Execute($query);
		
}
}
	if(!$Grabar){
?>
</td>
<tr><TD colspan='2'class="listado2">
<CENTER><input name='Grabar' type=submit class="botones_mediano" aria-label="Boton grabar cambio de responsable" value="Grabar" >
<?
}
?>
	<input name="Cerrar" type="button" class="botones_mediano" id="envia22" onClick="opener.regresar();window.close();" value=" Cerrar " aria-label='Cerrar ventana' >

	</TD></tr>
</table>
<?
if($Grabar){
if($usuaDocExp!=0){
	$isqlDepR = "SELECT USUA_CODI 
			FROM usuario 
			WHERE USUA_LOGIN = '$krd'";
	$rsDepR = $db->conn->Execute($isqlDepR);
	$codusua = $rsDepR->fields['USUA_CODI'];

$objHistorico->insertarHistoricoExp($numeroExpediente,$arrayRad,$dependencia, $codusua,$observa,56,1);

//$objHistorico->insertarHistoricoExp($numeroExpediente,$arrayRad,$coddepe ,$codusua, $observa, 56,0);
//print $numeroExpediente.$arrayRad.$coddepe.$codusua.$observa;
echo "<CENTER><table><tr><td class=titulosError>EL RESPONSABLE HA SIDO MODIFICADO.</td></tr></table>";
}
else{
echo "<CENTER><table><tr><td class=titulosError>NO HA SELECCIONADO NINGUN RESPONSABLE.</td></tr></table>";
}
}

?>

</form>
</CENTER>
</html>
