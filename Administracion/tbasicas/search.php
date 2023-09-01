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


if (!$dir_raiz)
    $dir_raiz = "../..";
require_once("$dir_raiz/include/db/ConnectionHandler.php");
if (!$db)
    $db = new ConnectionHandler("$dir_raiz");
//include("crea_combos_universales.php");
//error_reporting(7);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
//$db->conn->debug=true;
$q = mb_convert_case($_GET["term"], MB_CASE_UPPER, 'UTF-8');
// Reemplazo agregado para que busque en toda la cadena de caracteres
$q_modif = str_replace(" ", "%", $q);
// 0: ciudadanos, 1: Terceros , 2: Empresas, 6:funcionarios
$usua_concat = $db->conn->Concat("RTRIM(SGD_CIU_NOMBRE)", "' '", "CASE WHEN  SGD_CIU_APELL1 is NULL THEN ' '
ELSE RTRIM(SGD_CIU_APELL1) END", "' '", "CASE WHEN  SGD_CIU_APELL2 is NULL THEN ' ' ELSE RTRIM(SGD_CIU_APELL2) END");
$usua_concat = "RTRIM(" . $usua_concat . ")";
//carlinho
$vec = explode(" ", $q);
$tam_vec = sizeof($vec);

$strtoupper = strtoupper($vec[0]);
$strtolower = strtolower($vec[0]);
$ucwords = ucwords($vec[0]);

$sql_and = "(SGD_CIU_NOMBRE  LIKE '%$vec[0]%' OR SGD_CIU_APELL1 LIKE '%$vec[0]%' OR SGD_CIU_APELL2 LIKE '%$vec[0]%') ";
$sql_and .= " or (SGD_CIU_NOMBRE  LIKE '%$strtoupper%' OR SGD_CIU_APELL1 LIKE '%$strtoupper%' OR SGD_CIU_APELL2 LIKE '%$strtoupper%') ";
$sql_and .= " or (SGD_CIU_NOMBRE  LIKE '%$strtolower%' OR SGD_CIU_APELL1 LIKE '%$strtolower%' OR SGD_CIU_APELL2 LIKE '%$strtolower%') ";
$sql_and .= " or (SGD_CIU_NOMBRE  LIKE '%$ucwords%' OR SGD_CIU_APELL1 LIKE '%$ucwords%' OR SGD_CIU_APELL2 LIKE '%$ucwords%') ";
for ($i = 1; $i < $tam_vec; $i++) {
    $sql_and = $sql_and . " AND (SGD_CIU_NOMBRE  LIKE '%$vec[$i]%' OR SGD_CIU_APELL1 LIKE '%$vec[$i]%' OR SGD_CIU_APELL2 LIKE '%$vec[$i]%') ";
}
           
////$sql_and = "(SGD_CIU_NOMBRE  LIKE '%$vec[0]%' OR SGD_CIU_APELL1 LIKE '%$vec[0]%' OR SGD_CIU_APELL2 LIKE '%$vec[0]%') ";
//
//for ($i = 1; $i < $tam_vec; $i++) {
//    $sql_and = $sql_and . " AND (SGD_CIU_NOMBRE  ILIKE '%$vec[$i]%' OR SGD_CIU_APELL1 ILIKE '%$vec[$i]%' OR SGD_CIU_APELL2 ILIKE '%$vec[$i]%') ";
//}
switch($db->driver){
    case 'oci8':
        $campoEmpresa = " NOMBRE_DE_LA_EMPRESA || '- NIT -' || nit_de_la_empresa";
        break;
    case 'postgres':
        $campoEmpresa = " CONCAT(NOMBRE_DE_LA_EMPRESA ,'- NIT -',nit_de_la_empresa)";
        break;
}


$isql1 = "SELECT $campoEmpresa as usua_nomb FROM BODEGA_EMPRESAS  WHERE  NOMBRE_DE_LA_EMPRESA  LIKE '%$q_modif%' or NOMBRE_DE_LA_EMPRESA  LIKE '%$strtoupper%' or NOMBRE_DE_LA_EMPRESA  LIKE '%$strtolower%' or NOMBRE_DE_LA_EMPRESA  LIKE '%$ucwords%'";
$isql = $isql1;

$rs = $db->query($isql);

$datos = array();
while (!$rs->EOF) {
    $var = isset($rs->fields["usua_nomb"]) ? $rs->fields["usua_nomb"] : $rs->fields["USUA_NOMB"];
    $datos[$var] = $var;

    $rs->MoveNext();
}

$q = strtolower($_GET["term"]);
// $q = strtoupper($_GET["term"]);
// 0: ciudadanos, 1: Terceros , 2: Empresas, 6:funcionarios
if (!$q)
    return;

$items = $datos;

function array_to_json($array) {

    if (!is_array($array)) {
        return false;
    }

    $associative = count(array_diff(array_keys($array), array_keys(array_keys($array))));
    if ($associative) {

        $construct = array();
        foreach ($array as $key => $value) {

            // We first copy each key/value pair into a staging array,
            // formatting each key and value properly as we go.
            // Format the key:
            if (is_numeric($key)) {
                $key = "key_$key";
            }
            $key = "\"" . addslashes($key) . "\"";

            // Format the value:
            if (is_array($value)) {
                $value = array_to_json($value);
            } else if (!is_numeric($value) || is_string($value)) {
                $value = "\"" . addslashes($value) . "\"";
            }

            // Add to staging array:
            $construct[] = "$key: $value";
        }

        // Then we collapse the staging array into the JSON form:
        $result = "{ " . implode(", ", $construct) . " }";
    } else { // If the array is a vector (not associative):
        $construct = array();
        foreach ($array as $value) {

            // Format the value:
            if (is_array($value)) {
                $value = array_to_json($value);
            } else if (!is_numeric($value) || is_string($value)) {
                $value = "'" . addslashes($value) . "'";
            }

            // Add to staging array:
            $construct[] = $value;
        }

        // Then we collapse the staging array into the JSON form:
        $result = "[ " . implode(", ", $construct) . " ]";
    }

    return $result;
}

$result = array();
foreach ($items as $key => $value) {
    //Condicion suprimida para busquedas mas completas
    //if (strpos(strtolower($key), $q) !== false) {
    array_push($result, array("id" => $value, "label" => $key, "value" => strip_tags($key)));
    //}
    if (count($result) > 10)
        break;
}
echo array_to_json($result);
?>
