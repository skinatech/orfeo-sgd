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
if (!$ruta_raiz)
    $ruta_raiz = "..";
require_once("$ruta_raiz/include/db/ConnectionHandler.php");

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

if (!$db)
    $db = new ConnectionHandler("$ruta_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_NUM);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

$q = $_GET["term"];
$isql = "SELECT nom_claserie as nom_claserie FROM cla_serie  WHERE  nom_claserie  LIKE '%$q%'";
$rs = $db->query($isql);
$datos = array();
while (!$rs->EOF) {
    $var = $rs->fields["nom_claserie"];
    $datos[$var] = $var;

    $rs->MoveNext();
}

$q = strtolower($_GET["term"]);
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
//    if (count($result) > 10)
//        break;
}
echo array_to_json($result);
?>
