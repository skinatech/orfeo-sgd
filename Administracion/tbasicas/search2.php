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


//http://www.bloogie.es/tecnologia/programacion/34-ajax-con-jquery-php-y-json-ejemplo-paso-a-paso

if (!$dir_raiz)
    $dir_raiz = "../..";
require_once("$dir_raiz/include/db/ConnectionHandler.php");
if (!$db)
    $db = new ConnectionHandler("$dir_raiz");

define('ADODB_ASSOC_CASE', $assoc);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
//$db->conn->debug=true;

$q = mb_convert_case($_GET["producto"], MB_CASE_UPPER, 'UTF-8');
$data_empresa = explode('- NIT -', $q);
$q = trim($data_empresa[0]);
$q_doc = trim($data_empresa[1]);
// 0: ciudadanos, 1: Terceros , 2: Empresas, 6:funcionarios
$usua_concat = $db->conn->Concat("RTRIM(SGD_CIU_NOMBRE)", "' '", "CASE WHEN  SGD_CIU_APELL1 is NULL THEN ' '
ELSE RTRIM(SGD_CIU_APELL1) END", "' '", "CASE WHEN  SGD_CIU_APELL2 is NULL THEN ' ' ELSE RTRIM(SGD_CIU_APELL2) END");
$usua_concat = "RTRIM(" . $usua_concat . ")";

$isql1 = "SELECT NUIR AS nuir, ARE_ESP_SECUE AS tdid_codi,IDENTIFICADOR_EMPRESA AS sgd_ciu_codigo, NOMBRE_DE_LA_EMPRESA as sgd_ciu_nombre, DIRECCION as" .
        " sgd_ciu_direccion, NOMBRE_REP_LEGAL  as sgd_ciu_apell1, SIGLA_DE_LA_EMPRESA as sgd_ciu_apell2, TELEFONO_1 AS sgd_ciu_telefono, TELEFONO_2 AS sgd_ciu_telefono2, ACTIVA AS activa," .
        "EMAIL AS sgd_ciu_email,  CODIGO_DEL_MUNICIPIO  as muni_codi, CODIGO_DEL_DEPARTAMENTO " .
        " as dpto_codi, NIT_DE_LA_EMPRESA AS sgd_ciu_cedula, CODIGO_SUSCRIPTOR AS suscriptor , id_cont, id_pais  from BODEGA_EMPRESAS WHERE NOMBRE_DE_LA_EMPRESA= '$q' AND NIT_DE_LA_EMPRESA = '$q_doc' ";
//Para conocer  si es ciudadano, empresa,entidad o funcionario.

$rs1 = $db->query($isql1);
//error_log('******************* '.$isql1);

$nomb1 = $assoc == 1 ? $rs1->fields["SGD_CIU_NOMBRE"] : $rs1->fields["sgd_ciu_nombre"];
//Modificado skinatech
//Garantizamos que solo setea un tbusqueda
//Presentaba error cuando el mismo codigo estaba en varias tablas
//ej ciu 1 y oem 1, tomaba el ultimo y no el real
$tbusqueda = 0;
if ($nomb1 != null) {
    $tbusqueda = 1;
    $isql = $isql1;
}

//  $isql=$isql0 ." UNION ".$isql1." UNION ".$isql2." UNION ".$isql6;
//ECHO "TBUSQUEDA $tbusqueda nom $nomb0 1 $nomb1 2 $nomb2 6 $nomb6";
$rs = $db->query($isql);

$jsondata = array();

//   $jsondata['DOCUMENTO']    =$rs->fields["sgd_ciu_codigo"];
$jsondata['NOM'] = str_replace('"', ' ', $assoc == 1 ? $rs->fields["SGD_CIU_NOMBRE"] : $rs->fields["sgd_ciu_nombre"]) . " ";
$jsondata['APELL1'] = str_replace('"', ' ', $assoc == 1 ? $rs->fields["SGD_CIU_APELL1"] : $rs->fields["sgd_ciu_apell1"]) . " ";
$jsondata['APELL2'] = str_replace('"', ' ', $assoc == 1 ? $rs->fields["SGD_CIU_APELL2"] : $rs->fields["sgd_ciu_apell2"]) . " ";
$jsondata['TELEFONO'] = str_replace('"', ' ', $assoc == 1 ? $rs->fields["SGD_CIU_TELEFONO"]: $rs->fields["sgd_ciu_telefono"]) . " ";
$jsondata['TELEFONO2'] = str_replace('"', ' ', $assoc == 1 ? $rs->fields["SGD_CIU_TELEFONO2"] : $rs->fields["sgd_ciu_telefono2"]) . " ";
$jsondata['DIRECCION'] = str_replace('"', ' ', $assoc == 1 ? $rs->fields["SGD_CIU_DIRECCION"] : $rs->fields["sgd_ciu_direccion"]) . " ";
$jsondata['DOCUMENTO'] = $assoc == 1 ? trim($rs->fields["SGD_CIU_CODIGO"]) : trim($rs->fields["sgd_ciu_codigo"]);
$jsondata['NUIR'] = $assoc == 1 ? trim($rs->fields["NUIR"]) :  trim($rs->fields["nuir"]);
$jsondata['MAIL'] = str_replace('"', ' ', $assoc == 1 ? $rs->fields["SGD_CIU_EMAIL"] : $rs->fields["sgd_ciu_email"]) . " ";
$jsondata['TIPO_EMPRESA'] = $tbusqueda;
$jsondata['CC_DOCUMENTO'] = $assoc == 1 ? trim($rs->fields["SGD_CIU_CEDULA"]) : trim($rs->fields["sgd_ciu_cedula"]);
$jsondata['SUSCRIPTOR'] = $assoc == 1 ? trim($rs->fields["SUSCRIPTOR"]) : trim($rs->fields["suscriptor"]);
$jsondata['ACTIVA'] = $assoc == 1 ? trim($rs->fields["ACTIVA"]) : trim($rs->fields["activa"]);
$jsondata['CONT'] = $assoc == 1 ? $rs->fields["ID_CONT"] : $rs->fields["id_cont"];
$jsondata['PAIS'] = $assoc == 1 ?$rs->fields["ID_PAIS"] : $rs->fields["id_pais"];
$jsondata['DPTO'] = $assoc == 1 ? $rs->fields["DPTO_CODI"] : $rs->fields["dpto_codi"];
$jsondata['MUNI'] = $assoc == 1 ? $rs->fields["MUNI_CODI"] : $rs->fields["muni_codi"];


echo json_encode($jsondata);
?>
