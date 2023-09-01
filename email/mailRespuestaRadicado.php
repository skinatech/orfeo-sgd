<?php
session_start();

$ruta_raiz = "..";
$dir_raiz = "..";
include_once $dir_raiz . "/include/db/ConnectionHandler.php";
// include_once($ruta_raiz . "/include/PHPMailer/class.phpmailer.php");
include_once($ruta_raiz . "/include/PHPMailer5.2/PHPMailerAutoload.php");
include_once($ruta_raiz . "/config.php");
include("$ruta_raiz/include/tx/Historico.php");

$db = new ConnectionHandler("$dir_raiz");
$hist = new Historico($db);
//$db->conn->debug=true;

if (isset($_POST['contactFrmSubmit'])) {

    $correoNotifica = $_POST['email'];
    $numAnexo = $_POST['numAnexo'];
    $dependencia = $_POST['dependencia'];
    $codusuario = $_POST['codusuario'];
    $numRadicado = $_POST['numRadicado'];

    $SetFrom = 'SGD Orfeo ' . $entidad_largo;
    $Subject = $entidad_largo . ' ha emitido una comunicación para usted ';

    $numeroRadicado = substr($numAnexo, 0, -5);
    $anoRadi = substr($numeroRadicado, 0, 4);
    $depeRadi = substr($numeroRadicado, 4, $longitud_codigo_dependencia);
    $rutaArchivo = $entidad_contacto . $ambiente . '/bodega' . '/' . $anoRadi . '/' . $depeRadi . '/docs' . '/';
    $accesoArchivo = '../bodega' . '/' . $anoRadi . '/' . $depeRadi . '/docs' . '/';

    $radicadosSel[0] = $numeroRadicado;
    $codTx = 71;

    $selectRad = "select radi_depe_actu, radi_usua_actu from radicado where radi_nume_radi='" . $numeroRadicado . "'";
    $rsRadicadoInfo = $db->conn->query($selectRad);

    $depeActu = $rsRadicadoInfo->fields['RADI_DEPE_ACTU'];
    $usuaActu = $rsRadicadoInfo->fields['RADI_USUA_ACTU'];
}

$fecha = date("F j, Y H:i:s");
$usMailSelect = $correoNotifica;
list($a, $b) = preg_split("/[\s@]+/", $usMailSelect);
$userName = $a;

$mail = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SetFrom($cuenta_mail, $SetFrom);
$mail->Host = $servidor_mail_smtp;
$mail->Port = $puerto_mail_smtp;
$mail->SMTPDebug = "0"; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
$mail->SMTPAuth = "true";
$mail->SMTPSecure = $protocolo_smtp;
$mail->Username = $cuenta_mail;   // SMTP account username
$mail->Password = $contrasena_mail; // SMTP account password
$mail->Subject = $Subject;
$mail->AltBody = "Para ver el mensaje, por favor use un visor de E-mail compatible!";

$selectRadAnexos = "select anex_nomb_archivo,anex_numero, ANEX_RADICADO from anexos where anex_codigo in (" . $_POST['anexosSel'] . ")";
$rsAnexosInfo = $db->conn->query($selectRadAnexos);

while (!$rsAnexosInfo->EOF) {

    $anex_nomb_archivo = $rsAnexosInfo->fields['ANEX_NOMB_ARCHIVO'];
    $numero_anex = $rsAnexosInfo->fields['ANEX_NUMERO'];
    $anex_radicado = $rsAnexosInfo->fields['ANEX_RADICADO'];

    if ($anex_radicado == 1) {
        $nombrearchivo = 'respuesta_emitida_' . $anex_nomb_archivo;
    } else {
        $nombrearchivo = 'anexo_' . $anex_nomb_archivo;
    }

    $mail->AddAttachment($accesoArchivo . $anex_nomb_archivo, $nombrearchivo);
    $rsAnexosInfo->MoveNext();
}

$explodeCorreo = explode(',', $correoNotifica);
if (count($explodeCorreo) > 0) {
    for ($i = 0; $i < count($explodeCorreo); $i++) {

        $cuenta = trim($explodeCorreo[$i]);
        if (!filter_var($cuenta, FILTER_VALIDATE_EMAIL)) {
            $correoError = false;
        } else {
            $array[] = $cuenta;
        }
    }
} else {

    if (!filter_var($usMailSelect, FILTER_VALIDATE_EMAIL)) {
        $correoError = false;
    } else {
        $array[] = $usMailSelect;
    }
}

foreach ($array as $email) {
    $mail->AddAddress($email);

    /**
     * Autor: Luis Miguel Romero
     * Fecha: 10/12/2019
     * Informacion: Se crea template de correo
     **/
    // logo del correo va en el header
    $imageLogo = $ruta_raiz . '/logoEntidad.png';
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

    // Contenido del correo tambíen puede viajar en html
    $messageContent = 'Apreciado(a) Ciudadano: ';
    $messageContent .= 'Se ha emitido una respuesta por parte de la <b>' . $entidad_largo . '</b> a su solicitud,';
    $messageContent .= ' adjunto encontrará el archivo en formato PDF. Para verlo haga clic en el archivo.';
    $messageContent .=  '<br><br>Gracias por permitir el envio de notificaciones de manera electrónica';
    $messageContent .= '<br><br><b>Por favor, NO responda a este mensaje, es un envío automático</b><br><br>Cordialmente,</br><br>Sistema de Gestion Documental Orfeo';

    // Se incluye el template 
    include($ruta_raiz . '/email/emailTemplate.php');
    $mail->MsgHTML(utf8_decode($emailHtml));

    $mail->ErrorInfo;
    // $exito = ;

    if (!$mail->Send()) {
        $mensajeErrorCorreo = "No se pudo enviar la notificación de correo sobre la respuesta dada al remitente/destinatario, presento algún error en el envío.";
        $status = 'no';
    } else {
        $mensajeErrorCorreo = 'Se envió la notificación de correo sobre la respuesta dada con No.radicado ' . $numeroRadicado . ' al remitente/destinatario.' . $email;
        $status = 'ok';

        // Se actualiza el estado del anexo, cuando se envia la respuesta por correo electrónico
        $select = "update anexos set anex_estado = 4, fecha_rec_remi='" . date("Y-m-d") . "', anex_tipo_envio=2 where anex_codigo ='" . $numAnexo . "'";
        $rsaExtension = $db->conn->query($select);

        $hist->insertarHistorico($radicadosSel, $dependencia, $codusuario, $depeActu, $usuaActu, $mensajeErrorCorreo, $codTx);
    }

    $mail->ClearAddresses();
}

echo $status;
