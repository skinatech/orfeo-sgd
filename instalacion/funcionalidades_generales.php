<?php
//Envio de mail by skinatech
session_start();
error_reporting(7);
$ruta_raiz = "..";
define('ADODB_ASSOC_CASE', 0);
include_once "../include/db/ConnectionHandler.php";
// include_once $ruta_raiz . "/include/PHPMailer/class.phpmailer.php";
include_once $ruta_raiz . "/include/PHPMailer5.2/PHPMailerAutoload.php";
include_once $ruta_raiz . "/config.php";

$imageLogo = $entidad_contacto . $ambiente . '/logoEntidad.jpg';

$envioCorreo = true; // Indica true se envia la notificación o solo es para probar la consulta
$correoCliente = true; // Indica false se envia notificación al usuario administrador o ha cada usuario.
$diasVencimiento = 2; // Indica la cantidad de días antes de estar vencidos los radicados.

$db = new ConnectionHandler("$ruta_raiz");
$mail = new PHPMailer();



?>