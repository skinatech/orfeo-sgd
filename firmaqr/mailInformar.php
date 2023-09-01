<?php

$ruta_raiz = "..";
//$db->conn->debug=true;

$correoNotifica = $rsSelectCorreo->fields['SGD_DIR_MAIL'];

// include_once($ruta_raiz . "/include/PHPMailer/class.phpmailer.php");
include_once($ruta_raiz . "/include/PHPMailer5.2/PHPMailerAutoload.php");
include_once($ruta_raiz . "/config.php");

$fecha = date("F j, Y H:i:s");
$usMailSelect = $correoNotifica;
list($a, $b) = preg_split("/[\s@]+/", $usMailSelect);
$userName = $a;

$mail = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SetFrom($cuenta_mail, "PQRs - Orfeo");
$mail->Host = $servidor_mail_smtp;
$mail->Port = $puerto_mail_smtp;
$mail->SMTPDebug = "0"; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
$mail->SMTPAuth = "true";
$mail->SMTPSecure = $protocolo_smtp;
$mail->Username = $cuenta_mail;   // SMTP account username
$mail->Password = $contrasena_mail; // SMTP account password
$mail->Subject = "Se ha dado respuesta a su PQRs # $radicado";
$mail->AltBody = "Para ver el mensaje, por favor use un visor de E-mail compatible!";

$mail_usu = $usMailSelect;

//SE VERIFICA SI ES EMAIL
$mail_correcto = 0;
//compruebo unas cosas primeras
if ((strlen($mail_usu) >= 6) && (substr_count($mail_usu, "@") == 1) && (substr($mail_usu, 0, 1) != "@") && (substr($mail_usu, strlen($mail_usu) - 1, 1) != "@")) {
    if (substr_count($mail_usu, ".") >= 1) {                        
        //obtengo la terminacion del dominio
        $term_dom = substr(strrchr($mail_usu, '.'), 1);
        //compruebo que la terminación del dominio sea correcta
        if (strlen($term_dom) > 1 && strlen($term_dom) < 5 && (!strstr($term_dom, "@"))) {                
            //compruebo que lo de antes del dominio sea correcto
            $antes_dom = substr($mail_usu, 0, strlen($mail_usu) - strlen($term_dom) - 1);
            $caracter_ult = substr($antes_dom, strlen($antes_dom) - 1, 1);
            if ($caracter_ult != "@" && $caracter_ult != ".") {                    
                $mail_correcto = 1;
            }
        }
    }
}

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
    // logo del correo va en el header
    $imageLogo = $entidad_contacto . $ambiente . '/logoEntidad.png';
    // titulo del correo
    $headMailText = 'Correspondencia en orfeo';
    // valida si muestra el boton
    $showButton = false;
    // Texto del boton 
    $textButton = '';
    // Url del boton para direccionar 
    $linkButton = '';
    // Imagen del header se repite
    $imageHeader = $ruta_raiz . '/logoHeaderEmail.jpg';

    $expCant = explode("','", $verrad . " " . $radi_nume);
    $encabezado = session_name() . "=" . session_id() . "&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion&carpeta=$carpeta&tipo_carp=$tipo_carp&chkCarpeta=$chkCarpeta&busqRadicados=$busqRadicados&nomcarpeta=$nomcarpeta&agendado=$agendado&";

    // Contenido del correo tambíen puede viajar en html
    $messageContent = 'Ha recibido un <b>documento ' . $tx . '</b> en el Sistema de Gesti&oacute;n Documental Orfeo. Ingrese ';

    // By Skina - jmgamez@skinatech.com - 22 de Julio 2016
    // Se agrega el ciclo para validar la URL por cada radicado que se notifique, este cambio aplica para Informados, Radicacion, Reasignacion  
    for ($i = 0; $i < count($expCant); $i++) {
        $bodytag = str_replace("'", "", $expCant[$i]);
        $datosRad = "select ra_asun from radicado where radi_nume_radi='" . trim($bodytag) . "'";
        $rsdatosRad = $db->conn->query($datosRad);
        $asunto = substr($rsdatosRad->fields['RA_ASUNT'], 1, 300);
        $messageContent .= 'al radicado <a href="' . $entidad_contacto . $ambiente . '/verradicado.php?verrad=' . trim($bodytag) . '&' . $encabezado . '"> ' . $bodytag . ' </a>, ';
    }

    $messageContent .= '<br><br><b>Por favor, NO responda a este mensaje, es un envío automático</b><br><br>Cordialmente,</br><br>Sistema de Gestion Documental Orfeo';

    // Se incluye el template 
    include( $ruta_raiz . '/email/emailTemplate.php');
    // $emailHtml Es la variable que contiene el template completo con el html

    /**
     * Fin
     **/
    $mail->MsgHTML($emailHtml);

    $mail->ErrorInfo;
    $exito = $mail->Send();

    if (!$exito) {
        $mensajeErrorCorreo = "No se pudo enviar correo, error en el envio.";
        $envioOk = '';
    } else {
        $mensajeErrorCorreo = 'Se envio notificación al ciudadano con el correo <b>' . $mail_usu . "</b> <br><br>";
        $envioOk = 'ok';
    }
    $mail->ClearAddresses();
}
?>
