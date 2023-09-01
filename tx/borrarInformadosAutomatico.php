<?php

/**
 	Skinatech
    Autor: Jenny Gamez
    Fecha: 28-02-2020
    Info: Este archivo es ejecutado mediante un cron, el cual cumple la función de limpiar las bandejas de informados de los usuarioss.
**/

session_start();
error_reporting(7);
$ruta_raiz = "..";

include_once "../include/db/ConnectionHandler.php";
// include_once($ruta_raiz . "/include/PHPMailer/class.phpmailer.php");
include_once($ruta_raiz . "/include/PHPMailer5.2/PHPMailerAutoload.php");
include_once($ruta_raiz . "/config.php");
include_once($ruta_raiz . "/include/tx/Historico.php");

$db = new ConnectionHandler("$ruta_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$hist = new Historico($db);
//$db->conn->debug=true;

$radicadosSel = array();
$observacion = "Se borró el radicado de la bandeja de informados de forma automática";
$codTx = 7;

// Se consulta todos los radicados que han sido informados a los usuarios
$sqlInformados = "select radi_nume_radi, depe_codi, usua_codi from informados";
$rsSqlInformados = $db->conn->Execute($sqlInformados);

	// Se recorre cada uno de los registros con el fin de saber el radicado, el usuarios y la dependencia
	while (!$rsSqlInformados->EOF) {

		$radicadosSel[] = $rsSqlInformados->fields['RADI_NUME_RADI'];
		$radicadoUno = $rsSqlInformados->fields['RADI_NUME_RADI'];
		$dependencia = $rsSqlInformados->fields['DEPE_CODI'];
		$codusuario = $rsSqlInformados->fields['USUA_CODI'];

		$borradoInformados = "delete from informados where radi_nume_radi='".$radicadoUno."' and usua_codi= ".$codusuario." and depe_codi ='".$dependencia."'";
		$deleteSQL = $db->conn->Execute($borradoInformados);

		$resultHistorico = $hist->insertarHistorico($radicadosSel, $dependencia, $codusuario, $dependencia, $codusuario, $observacion, $codTx);

		$radicadosSel = array();
		
		$rsSqlInformados->MoveNext();
	}
?>