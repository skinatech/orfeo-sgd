<?php

session_start();
error_reporting(7);
$ruta_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
if (!$dir_raiz) $dir_raiz = "..";
require_once("$dir_raiz/include/db/ConnectionHandler.php");
// include_once($dir_raiz . "/include/PHPMailer/class.phpmailer.php");
include_once($ruta_raiz . "/include/PHPMailer5.2/PHPMailerAutoload.php");
if (!$db)  $db = new ConnectionHandler("$dir_raiz");
$mail = new PHPMailer();
$radicado = $_GET['verrad'];
$notificacion = $_GET['notificacion'];

# Se busca la información del radicado para enviar la notificación al usuario
$sqlDir = "SELECT * FROM sgd_dir_drecciones WHERE radi_nume_radi='$radicado'";
$rsSqlDir = $db->conn->query($sqlDir);

# Usuario de empresa
if(isset($rsSqlDir->fields["sgd_oem_codigo"])) {
    $idUser = $rsSqlDir->fields["sgd_oem_codigo"];  

    $sqlEmp = "SELECT * FROM sgd_oem_oempresas WHERE sgd_oem_codigo='$idUser'";
    $rsSqlEmp = $db->conn->query($sqlEmp);

    $mail_usu = isset($rsSqlEmp->fields["email"]) ? $rsSqlEmp->fields["email"] : $rsSqlEmp->fields["EMAIL"];
}

# Usuario de terceros
if(isset($rsSqlDir->fields["sgd_esp_codi"])) {
    $idUser = $rsSqlDir->fields["sgd_esp_codi"];

    $sqlTercero = "SELECT * FROM bodega_empresas WHERE identificador_empresa='$idUser'";
    $rsSqlTercero = $db->conn->query($sqlTercero);

    $mail_usu = isset($rsSqlTercero->fields["email"]) ? $rsSqlTercero->fields["email"] : $rsSqlTercero->fields["EMAIL"];    
}    

# Usuario ciudadano
if(isset($rsSqlDir->fields["sgd_ciu_codigo"])) {
    $idUser = $rsSqlDir->fields["sgd_ciu_codigo"];

    $sqlCiu = "SELECT us.email ". 
               "FROM sgd_ciu_ciudadano ci ".
                  "INNER JOIN public.user us on us.id=ci.id_users_pqrs ".
                "WHERE sgd_ciu_codigo='$idUser'";
    $rsSqlCiu = $db->conn->query($sqlCiu);

    $mail_usu = isset($rsSqlCiu->fields["email"]) ? $rsSqlCiu->fields["email"] : $rsSqlCiu->fields["EMAIL"];
} 

# Usuario funcionario
if(isset($rsSqlDir->fields["sgd_doc_fun"])) {
    $idUser = $rsSqlDir->fields["sgd_doc_fun"];
    $docUser = $rsSqlDir->fields["sgd_dir_doc"];

    $sqlUser = "SELECT * ".
                "FROM usuario us ".
                    "INNER JOIN sgd_dir_drecciones dr on dr.sgd_dir_doc=us.usua_doc ".
                "WHERE us.usua_doc='$docUser' AND us.usua_codi='$idUser'";
    $rsSqlUser = $db->conn->query($sqlUser);

    $mail_usu = isset($rsSqlUser->fields["usua_email"]) ? $rsSqlUser->fields["usua_email"] : $rsSqlUser->fields["USUA_EMAIL"];
}      

//$db->conn->debug=true;

$diasTermino = "select * from sgd_dt_radicado where radi_nume_radi='$radicado'";
$rsRadiPQRS = $db->conn->query($diasTermino);
$termino = isset($rsRadiPQRS->fields['dias_termino']) ? $rsRadiPQRS->fields['dias_termino']:$rsRadiPQRS->fields['DIAS_TERMINO'];

$radicadoAuto = "select radi_envio_correo from radicado where radi_nume_radi='$radicado'";
$rsRadiAutoriza = $db->conn->query($radicadoAuto);
$autorizacion = isset($rsRadiAutoriza->fields['radi_envio_correo']) ? $rsRadiAutoriza->fields['radi_envio_correo']:$rsRadiAutoriza->fields['RADI_ENVIO_CORREO'];


include $dir_raiz . "/config.php";

$fecha = date("F j, Y H:i:s");
$usMailSelect = $cuenta_mail;
list($a, $b) = preg_split("/[\s@]+/", $usMailSelect);
$userName = $a;

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SetFrom($usMailSelect, " SGD Orfeo ".utf8_decode($entidad));
$mail->Host = $servidor_mail_smtp;
$mail->Port = $puerto_mail_smtp;
$mail->SMTPDebug = "0"; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
$mail->SMTPAuth = "true";
$mail->SMTPSecure = $protocolo_smtp;
$mail->Username = $usMailSelect;   // SMTP account username
$mail->Password = $contrasena_mail; // SMTP account password
$mail->Subject = "Notificacion - ".$entidad;
$mail->AltBody = "Para ver el mensaje, por favor use un visor de E-mail compatible!";

//SE VERIFICA SI ES EMAIL
if (filter_var($mail_usu, FILTER_VALIDATE_EMAIL)) {$mail_correcto = 1;} else { $mail_correcto = 0;}

$mensajeCorreo = '';

if($autorizacion == true){
    if ($mail_usu != ' ' or $mail_correcto != 0) {

        $mail->AddAddress($mail_usu);
        // logo del correo va en el header
        $imageLogo = $entidad_contacto . $ambiente . '/logoEntidad.png';
        // titulo del correo
        $headMailText = 'Correspondencia en orfeo';
        // valida si muestra el boton 
        $showButton = true;
        // Texto del boton 
        $textButton = 'Ingresar';
        // Url del boton para direccionar 
        $linkButton = $entidad_contacto.'/'.$ambientePqrs;
        // Imagen del header se repite
        $imageHeader = $dir_raiz . '/logoHeaderEmail.jpg';
    
        // Contenido del correo tambíen puede viajar en html
        $messageContent = "La <b>$entidad_largo</b> informa que se registró correctamente solicitud y/o documentación, asignándole el número Radicado: <b>" . $radicado . "</b>,  con el cual usted podrá saber el trámite que se le haya realizado hasta la fecha. Importante tener en cuenta que esté tiene " . $termino . " d&iacute;as h&aacute;biles para darle respuesta.";
        $messageContent .= '<br><br><b>Por favor, NO responda a este mensaje, es un envío automático</b><br><br>Cordialmente,</br><br>Sistema de Gesti&oacute;n Documental Orfeo';

        // Se incluye el template 
        include( $dir_raiz . '/email/emailTemplate.php');
        // $emailHtml Es la variable que contiene el template completo con el html
        $mail->MsgHTML($emailHtml);
    
        $mail->ErrorInfo;
        $exito = $mail->Send();
   
        if (!$exito) {
            $mensajeCorreo .= " No se pudo enviar la notificaci&oacute;n.";
        } else {
            $mensajeCorreo .= ' Se envio la notificaci&oacute;n correctamente al correo electr&oacute;nico <b>' . $mail_usu . "</b>".' y ';
        }
    
        if ($mail_usu == ' ' or $mail_correcto == 0) {
            $mensajeCorreo .= " el correo electr&oacute;nico <b>" . $mail_usu . "</b> es incorrecto.";
        } 
    
        echo $mensajeCorreo;
        $mail->ClearAddresses();
    }
}
?>
