<?php
/**
 * Vista busquedas OCR
 * @autor Skinatech 
 * @fecha 2017/03
 */

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

session_start();
$dir_raiz = $_SESSION['dir_raiz'];
$where = '';
$dep_sel = $_POST['dep_sel'];
$usu_sel = $_POST['usu_sel'];
$fecharchivo = $_POST['fecharchivo'];
$resultados['data'] = [];

if (empty($_SESSION)) {
    reportarErrores("Error de permisos: No se encuentran datos del usuario");
}

include_once "../include/db/ConnectionHandler.php";

/* Consulto en la tabla usuario para confirmar si este usuario tiene permisos de transferencias documentales */
$db = new ConnectionHandler("$dir_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
//$db->conn->debug = true;

$consPermiso = "select per_transferencia_documental	from usuario where usua_login = '" . $_SESSION['krd']."' ";
$rsPer = $db->conn->query($consPermiso);
if ( $rsPer->fields['PER_TRANSFERENCIA_DOCUMENTAL'] == 0) {
    reportarErrores("Error de permisos: El usuario no tiene permisos para realizar transferencias documentales");
}

/***
* Se construye la consulta con los valores que llegan por POST para este caso siempre se reciben tres parametros
* dep_sel = dependencia  
* usu_sel = usuario
* fecharchivo
donde dep_sel y usu_sel si llegan en valor 0 no se debe tener en cuenta
***/

if( $dep_sel != '0' && $fecharchivo != '' ){
    $where = " E.depe_codi = '".$dep_sel."' and to_char(E.sgd_exp_fech_arch, 'YYYY-MM-DD') = '".$fecharchivo."' ";
}

if( $usu_sel != '0' ){
    $where .= " and E.radi_usua_arch = '".$usu_sel."' ";
}

/*** Se construye la consulta ***/
if( $where != '' ){
    $valida = true;

    /*** En el include de queryConsulta se construye la consulta en la variable $sqlC ***/
    include( '../include/query/transfeDocumentales/queryConsulta.php');
    $sqlC .= $where ;
    //echo 'sqlC: '.$sqlC;
    $rsC = $db->conn->query($sqlC);
}

if ( $rsC === false ) {
    reportarErrores("Fallo en Query");
} else {
   
   if( $rsC ){
        while (!$rsC->EOF) {

            $resultados['data'][] = array(
                (string) $rsC->fields["RADI_NUME_RADI"],
                $rsC->fields["NOMBRE_EXPEDIENTE"], 
                $rsC->fields["SERIE"],
                $rsC->fields["SUBSERIE"],
                $rsC->fields["TIPO_DOCUMENTAL"], 
                (string) $rsC->fields["RADI_NUME_RADI"],
                $rsC->fields["FECHA_ARCHIVADO"],
                $rsC->fields["DEPENDENCIA_ARCHIVADO"],
                $rsC->fields["USUARIO_ARCHIVADO"],
            );

            $rsC->MoveNext();
        }

        if( count($resultados) > 0 ){
            echo json_encode($resultados);
        }
   }
    
}

function reportarErrores($error) {
    header('HTTP/1.0 500 Internal Server Error');
    error_log("Búsqueda error: " . $error);
    die(json_encode($error));
}
