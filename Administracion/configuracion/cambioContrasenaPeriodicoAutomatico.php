<?php

/**
 	Skinatech
    Autor: Jenny Gamez
    Fecha: 28-02-2020
    Info: Este archivo es ejecutado mediante un cron, el cual cumple la función de actualizar la información del usuario cuando la contraseña ya esta vencida.
**/

session_start();
error_reporting(7);
$ruta_raiz = "..";

include_once "../include/db/ConnectionHandler.php";
// include_once($ruta_raiz . "/include/PHPMailer/class.phpmailer.php");
include_once ($ruta_raiz . "/include/PHPMailer5.2/PHPMailerAutoload.php");
include_once($ruta_raiz . "/config.php");
include_once($ruta_raiz . "/include/tx/Historico.php");

$db = new ConnectionHandler("$ruta_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$fecha = date('Y-m-d');

// Se consulta todos los radicados que han sido informados a los usuarios
$sqlPassword = "select usua_login_contrasena_guardada, fecha_vencimiento_contrasena_guardada from contrasenas_guardadas where fecha_vencimiento_contrasena_guardada < ".$fecha;
$rsSqlPassword = $db->conn->Execute($sqlPassword);

// Se recorre cada uno de los registros con el fin de saber el radicado, el usuarios y la dependencia
while (!$rsSqlPassword->EOF) {

	$usua_login = $rsSqlPassword->fields['USUA_LOGIN_CONTRASENA_GUARDADA'];
	$fecha_guardada = $rsSqlPassword->fields['FECHA_VENCIMIENTO_CONTRASENA_GUARDADA'];

	$fecha1= new DateTime($fecha);
	$fecha2= new DateTime($fecha_guardada);
	$diff = $fecha1->diff($fecha2);

	// El resultados sera 3 dias
	echo $diff->days . ' dias';

	// Actualiza el usuario para que cuando inicie sesión pida cambiar la contraseña
    $isql = "update usuario set usua_nuevo='1' where usua_login='$usua_login'";
    $rs = $db->conn->query($isql);		

    $rsSqlPassword->MoveNext();
}
?>