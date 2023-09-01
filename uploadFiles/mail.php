<?php

$ruta_raiz = "..";
//$db->conn->debug=true;

$correoNotifica = $siNotifica->fields['USUA_EMAIL'];
$radicado = $valRadio;

// include_once $ruta_raiz . "/include/PHPMailer/class.phpmailer.php";
include_once $ruta_raiz . "/include/PHPMailer5.2/PHPMailerAutoload.php";
include_once $ruta_raiz . "/config.php";

$fecha = date("F j, Y H:i:s");
$usMailSelect = $correoNotifica;
list($a, $b) = preg_split("/[\s@]+/", $usMailSelect);
$userName = $a;

$mail = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SetFrom($cuenta_mail, "SGD Orfeo");
$mail->Host = $servidor_mail_smtp;
$mail->Port = $puerto_mail_smtp;
$mail->SMTPDebug = "0"; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
$mail->SMTPAuth = "true";
$mail->SMTPSecure = $protocolo_smtp;
$mail->Username = $cuenta_mail; // SMTP account username
$mail->Password = $contrasena_mail; // SMTP account password
$mail->Subject = "Se ha cargado un documento al radicado $radicado";
$mail->AltBody = "Para ver el mensaje, por favor use un visor de E-mail compatible!";
$mail_usu = $usMailSelect;
$mail_correcto = 0;

//SE VERIFICA SI ES EMAIL
if (filter_var($mail_usu, FILTER_VALIDATE_EMAIL)) {$mail_correcto = 1;} else { $mail_correcto = 0;}

if ($mail_usu == ' ' or $mail_correcto == 0) {
    $mensajeErrorCorreo = "No se pudo enviar notificación, el usuario " . $mail_usu . " no tiene  correo electrónico o tiene un formato incorrecto.";
    $envioOk = '';
} else {
    $array[] = $mail_usu;
}

foreach ($array as $email) {

    $mail->AddAddress($email);

    /**
     * Autor: Luis Miguel Romero
     * Fecha: 10/12/2019
     * Informacion: Se crea template de correo
     **/
    $imageLogo = $entidad_contacto . $ambiente . '/logoEntidad.png';
    $headMailText = 'Correspondencia en orfeo';
    $showButton = false;
    $textButton = '';
    $linkButton = '';
    $imageHeader = $ruta_raiz . '/logoHeaderEmail.jpg';

    $encabezado = session_name() . "=" . session_id() . "&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion&carpeta=$carpeta&tipo_carp=$tipo_carp&chkCarpeta=$chkCarpeta&busqRadicados=$busqRadicados&nomcarpeta=$nomcarpeta&agendado=$agendado&";

    // Contenido del correo tambíen puede viajar en html
    $messageContent = 'Se ha cargado un documento ';

    $datosRad = "select ra_asun from radicado where radi_nume_radi='" . trim($radicado) . "'";
    $rsdatosRad = $db->conn->query($datosRad);
    $asuntoMostrar = isset($rsdatosRad->fields['RA_ASUN']) ? $rsdatosRad->fields['RA_ASUN'] : $rsdatosRad->fields['ra_asun'];
    $asunto = substr($asuntoMostrar, 1, 300);

    $messageContent .= 'al radicado <a href="' . $entidad_contacto . $ambiente . '/verradicado.php?verrad=' . trim($radicado) . '&' . $encabezado . '"> ' . $radicado . ' </a>, ';
    $messageContent .= ' con el asunto '.utf8_decode($asunto);

    $messageContent .= '<br><br><b>Por favor, NO responda a este mensaje, es un envío automático</b><br><br>Cordialmente,</br><br>Sistema de Gestion Documental Orfeo';

    // Se incluye el template
    include $ruta_raiz . '/email/emailTemplate.php';
    $mail->MsgHTML($emailHtml);

    $mail->ErrorInfo;
    $exito = $mail->Send();

    if (!$exito) {
        $mensajeErrorCorreo = "No se pudo enviar correo, error en el envio.";
        $envioOk = '';
    } else {
        $mensajeErrorCorreo = 'Se envio notificación al usuario actual del radicado registrado con el correo <b>' . $mail_usu . "</b> <br><br>";
        $envioOk = 'ok';
    }
    $mail->ClearAddresses();
}
?>
