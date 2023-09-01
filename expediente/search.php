<?php
session_start();
$ruta_raiz="..";

require_once("$ruta_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$ruta_raiz");
$dependencia = $_SESSION["dependencia"];
//include("crea_combos_universales.php");
//error_reporting(7);

$db->conn->SetFetchMode(ADODB_FETCH_NUM);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

//$db->conn->debug=true;

//$q = strtoupper($_GET["term"]);
 $q = mb_convert_case($_GET["term"], MB_CASE_UPPER, 'UTF-8');

//$sql_nomEx="select sgd_sexp_parexp1 as SGD_EXP_NOM from sgd_sexp_secexpedientes where upper(sgd_sexp_parexp1) like '%".$q."%' and depe_codi='$dependencia' ORDER BY sgd_sexp_parexp1";

$sql_nomEx="select distinct sexp.sgd_sexp_parexp1 as SGD_EXP_NOM from sgd_sexp_secexpedientes sexp where upper(sexp.sgd_sexp_parexp1) like '%".$q."%' and sexp.depe_codi='$dependencia'  ORDER BY sexp.sgd_sexp_parexp1";

$rs=$db->query($sql_nomEx);
//error_log('ooooooo '.$sql_nomEx);

$datos=array();

while (!$rs->EOF){
   $var=$rs->fields["SGD_EXP_NOM"]; 
   $datos[$var]=$var;
       
   $rs->MoveNext();
}

$q = strtolower($_GET["term"]);

if (!$q) return;

$items=$datos;
function array_to_json( $array ){

    if( !is_array( $array ) ){
        return false;
    }

    $associative = count( array_diff( array_keys($array), array_keys( array_keys( $array )) ));
    if( $associative ){

        $construct = array();
        foreach( $array as $key => $value ){

            // We first copy each key/value pair into a staging array,
            // formatting each key and value properly as we go.

            // Format the key:
            if( is_numeric($key) ){
                $key = "key_$key";
            }
            $key = "\"".addslashes($key)."\"";

            // Format the value:
            if( is_array( $value )){
                $value = array_to_json( $value );
            } else if( !is_numeric( $value ) || is_string( $value ) ){
                $value = "\"".addslashes($value)."\"";
            }

            // Add to staging array:
            $construct[] = "$key: $value";
        }

        // Then we collapse the staging array into the JSON form:
        $result = "{ " . implode( ", ", $construct ) . " }";

    } else { // If the array is a vector (not associative):

        $construct = array();
        foreach( $array as $value ){

            // Format the value:
            if( is_array( $value )){
                $value = array_to_json( $value );
            } else if( !is_numeric( $value ) || is_string( $value ) ){
                $value = "'".addslashes($value)."'";
            }

            // Add to staging array:
            $construct[] = $value;
        }

        // Then we collapse the staging array into the JSON form:
        $result = "[ " . implode( ", ", $construct ) . " ]";
    }

    return $result;
}

$result = array();
foreach ($items as $key=>$value) {
	if (strpos(strtolower($key), $q) !== false) {
		array_push($result, array("id"=>$value, "label"=>$key, "value" => strip_tags($key)));
	}
	if (count($result) > 11)
		break;
}
echo array_to_json($result);

?>
