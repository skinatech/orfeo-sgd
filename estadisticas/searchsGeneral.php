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

/**
 * Se añadio compatibilidad con variables globales en Off
 * @autor Jairo Losada 2009-05
 * @licencia GNU/GPL V 3
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

include_once "$url_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$url_raiz");
//$db->conn->debug = true;

$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

//if (isset($_GET["term"])) {
    $q = $_GET["term"];
    $isql = "select consecutivo,nom_claserie from cla_serie where nom_claserie LIKE '%$q%'";
    $rs = $db->query($isql);

//    error_log('************* '.$isql);
    $datos = array();
    while (!$rs->EOF) {
        $var = $rs->fields["consecutivo"].'-'.$rs->fields["nom_claserie"];
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
        array_push($result, array("id" => $value, "label" => $key, "value" => strip_tags($key)));
    }
    echo array_to_json($result);
//}

//if (isset($_POST['tipodoc'])) {
//    $q = $_POST['tipodoc'];
//    $isql = "SELECT sgd_tpr_codigo, sgd_tpr_descrip FROM sgd_tpr_tpdcumento WHERE  sgd_tpr_descrip = '$q'";
//    $rs = $db->query($isql);
//    $jsondata = array();
//
//    $jsondata['NOMBRE'] = $rs->fields["sgd_tpr_descrip"];
//    $jsondata['CODIGO'] = $rs->fields["sgd_tpr_codigo"];
//    echo json_encode($jsondata);
//}
?>
