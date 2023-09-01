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
   session_start();
   $ruta_raiz="..";

   require_once("$ruta_raiz/include/db/ConnectionHandler.php");
   $db = new ConnectionHandler("$ruta_raiz");

   //error_reporting(7);
   $db->conn->SetFetchMode(ADODB_FETCH_NUM);
   $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
   // $db->conn->debug=true;

   // Parametro de entrada -> Codigo del tipo documental enviado desde el select.
   $q = $_GET["tipoDoc"];
   $arrayNoHabiles = array();
   $jsondata=array(); 

   $isql1="SELECT SGD_TPR_TERMINO FROM SGD_TPR_TPDCUMENTO WHERE SGD_TPR_CODIGO='$q'";
   $rs=$db->query($isql1);
   $diass = $rs->fields["SGD_TPR_TERMINO"];
   $fecha_noti = date('Y-m-d');
   
   if(isset($_GET['option']) && $_GET['option'] == 2){
      $diasMas = $_GET['dias'];
      $fecha_venci_noti = date("Y-m-d", strtotime("$fecha_noti + $diasMas days"));
   }else{
      $fecha_venci_noti = date("Y-m-d", strtotime("$fecha_noti + $diass days"));
   }

   //error_log($fecha_venci_noti);

   $valor = "select count(*) as conteo from sgd_noh_nohabiles where NOH_FECHA between ".$db->conn->sysTimeStamp." and '".$fecha_venci_noti."'";
   $rsValor = $db->query($valor);
   $diasNoHa = $rsValor->fields['CONTEO'];

   $fecha_venci_noti_new = date("Y-m-d", strtotime("$fecha_venci_noti + $diasNoHa days"));

   $jsondata['DIAS']  = str_replace('"',' ',$rs->fields["SGD_TPR_TERMINO"]);
   $jsondata['FECHA_VENCIMIENTO']  = $fecha_venci_noti_new;

   echo json_encode($jsondata);
?>
