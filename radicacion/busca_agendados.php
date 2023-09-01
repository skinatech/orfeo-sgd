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

$envioCorreo = true; // Indica true se envia la notificación o solo es para probar la consulta
$correoCliente = true; // Indica false se envia notificación al usuario administrador o ha cada usuario.
$diasVencimiento = 2; // Indica la cantidad de días antes de estar vencidos los radicados.

$db = new ConnectionHandler("$ruta_raiz");
$mail = new PHPMailer();

//$db->conn->debug=true;
$fechahoy = date("Y-m-d");
$sqlFecha = $db->conn->SQLDate("Y-m-d", "RADI_FECH_RADI");
$order = " b.RADI_DEPE_ACTU";
$nombre = 'ADMINISTRADOR';
$apellido = 'SGD ORFEO';
$dependencia = "b.radi_depe_actu";
$whereUsuario = "";
$whereFiltro = '';
$whereCarpeta = '';
$sqlAgendado = '';
$orderTipo = '';
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

//Para los que no tienen flujo
echo "Alertas para los documentos que no tienen flujo ";
echo "<br>";
$redondeo = "round(SGD_AGEN_FECHPLAZO-current_date)";

$isql = 'select distinct
			  RADI_NUME_RADI AS RADICADO
			, SGD_AGEN_OBSERVACION
			, USUA_DOC AS "HID_USUA"
			, SGD_AGEN_FECHPLAZO AS "PLAZO"
			, '.$redondeo.' AS "HID_DIAS_R"
			, DEPE_CODI AS "HID_DEPE"
			, SGD_AGEN_ACTIVO 
		from SGD_AGEN_AGENDADOS 
		where SGD_AGEN_ACTIVO=1';
$rs = $db->conn->query($isql);
$array = array();

//AQUI INSERTO EL RESULTADO DEL QUERY EN EL ARRAY
while ($agrupado = $rs->FetchRow()) {
    $array[$agrupado['hid_depe']][$agrupado['hid_usua']][] = $agrupado;
    $rs->MoveNext();
}

foreach ($array as $iddependencia => $dependencia) {
    foreach ($dependencia as $idusuario => $usuario) {

        //PASO LAS VARIABLES DEL ARCHIVO CONFIG Y DEL ARREGLO.
        enviarcorreo($idusuario, $iddependencia, $usuario, $db, $entidad, $servidor_mail_smtp, $puerto_mail_smtp, $cuenta_mail, $contrasena_mail, $entidad_contacto, $ambiente, $envioCorreo, $correoCliente);
    }
}

function enviarcorreo($idusuario, $iddependencia, $arrayusuarios, $db, $entidad, $servidor_mail_smtp, $puerto_mail_smtp, $cuenta_mail, $contrasena_mail, $entidad_contacto, $ambiente, $envioCorreo, $correoCliente)
{
    $mail = new PHPMailer();
    $usua_codi = $idusuario; // Usua_doc
    $depe_codi = $iddependencia;

    echo "<br>";
    $sql_mail = "select us.USUA_EMAIL, us.USUA_NOMB, de.DEPE_NOMB from USUARIO us "
        . "inner join DEPENDENCIA de ON de.depe_codi=us.depe_codi "
        . "where us.USUA_DOC='$usua_codi' AND us.DEPE_CODI='$depe_codi'";
    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
    $rs_mail = $db->conn->query($sql_mail);

    /**
     * Si $correoCliente es false quiere decir que no se envia notificación a cada uno de los funcionarios si no que al
     * administrador del sistema (soporte.skinatech@gmail.com).
     */
    if ($correoCliente == true) {
        $mail_usu = isset($rs_mail->fields["usua_email"]) ? $rs_mail->fields["usua_email"] : $rs_mail->fields["USUA_EMAIL"];
    } else {
        $mail_usu = 'soporte.skinatech@gmail.com';
    }

    $usua_codi_envio = isset($rs_mail->fields["usua_nomb"]) ? $rs_mail->fields["usua_nomb"] : $rs_mail->fields["USUA_NOMB"];
    $depe_codi_envio = isset($rs_mail->fields["depe_nomb"]) ? $rs_mail->fields["depe_nomb"] : $rs_mail->fields["DEPE_NOMB"];
    $fecha = date("F j, Y H:i:s");

    //SE VERIFICA SI ES EMAIL
    if (filter_var($mail_usu, FILTER_VALIDATE_EMAIL)) {$mail_correcto = 1;} else { $mail_correcto = 0;}

    if ($mail_correcto == 0) {
        echo "No se pudo enviar notificacion, el usuario no tiene correo electronico o tiene un formato incorrecto, comuniquese con el administrador del sistema";
    } else {
        $fecha = date("F j, Y H:i:s");
        $usMailSelect = $cuenta_mail;
        list($a, $b) = split("@", $usMailSelect);
        $userName = $a;

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SetFrom($usMailSelect, "SGD Orfeo");
        $mail->Host = $servidor_mail_smtp;
        $mail->Port = $puerto_mail_smtp;
        $mail->SMTPDebug = "0"; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = "";
        $mail->Username = $usMailSelect; // SMTP account username
        $mail->Password = $contrasena_mail; // SMTP account password
        $mail->Subject = "Ha recibido un documento en orfeo";
        $mail->AltBody = "Para ver el mensaje, por favor use un visor de E-mail compatible!";
        $mail->AddAddress($mail_usu);
        $encabezado = "" . session_name() . "=" . session_id() . "&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion&carpeta=$carpeta&tipo_carp=$tipo_carp&chkCarpeta=$chkCarpeta&busqRadicados=$busqRadicados&nomcarpeta=$nomcarpeta&agendado=$agendado&";

        $imageLogo = $entidad_contacto . $ambiente . '/logoEntidad.jpg';
        $headMailText = utf8_decode('Ha recibido un documento');
        $imageHeader = '../logoHeaderEmail.jpg';

        // Contenido del correo tambíen puede viajar en html
        $messageContent = "Se&ntilde;or(a): " . $usua_codi_envio . " de la dependencia: " . utf8_decode($depe_codi_envio) . "<br><br> A continuaci&oacute;n se presenta un listado con todos los radicados agendados por usuario, los cuales requieren gesti&oacute;n de su parte.<br>Ingrese a Orfeo y realice el tr&aacute;mite correspondiente.<br><br> ";

        $messageContent .= "
            <table border = 1>
                <thead>
                    <tr>
                        <th>Radicado</th>
                        <th>Plazo Vencimiento</th>
                        <th>D&iacute;as Restantes</th>
                        <th>Observaci&oacute;n</th>
                    </tr>
                </thead>";
							
        //AQUI CONSTRUIMOS EL CONTENIDO DE LA TABLA.
        foreach ($arrayusuarios as $arrayusuario) {

			$radi_nume = $arrayusuario['radicado'];
            $observacion = utf8_decode($arrayusuario['sgd_agen_observacion']);
            $diasr = $arrayusuario['hid_dias_r'];
            $fecha_rad = $arrayusuario['plazo'];
            $messageContent .= "
                <tr>
                    <td><a href='" . $entidad_contacto . $ambiente . "/verradicado.php?verrad=" . trim($radi_nume) . "&" . $encabezado . "'> " . $radi_nume . " </a></td>
                    <td>" . $fecha_rad . "</td>
                    <td>" . $diasr . "</td>
                    <td>" . $observacion . "</td>
                </tr>";
        }

        $messageContent .= "</table>
                         <br><br><b>Por favor, NO responda a este mensaje, es un envío automático</b><br><br>Cordialmente,
                         <br>Sistema de Gesti&oacute;n Documental Orfeo  </p>";

        // Se incluye el template 
        include('../email/emailTemplate.php');
        if($emailHtml){
            $mail->MsgHTML($emailHtml);
        }else{
            $mail->MsgHTML(utf8_decode($messageContent));
        }

        echo $mensaje;

        if ($envioCorreo == true) {

            $mail->ErrorInfo;
            $exito = $mail->Send();
            if (!$exito) {
                $mensajeErrorCorreo = "No se pudo enviar notificaci&oacute;n";
                $envioOk = '';
            } else {
                $mensajeErrorCorreo = 'Se envio notificaci&oacute;n al remitente/destinatario con el correo <b>' . $mail_usu . "</b> <br><br>";
                $envioOk = 'ok';
            }
            $mail->ClearAddresses();
        }
        
    }
    echo "<br>";
}
?>
<html>
    <HEAD>
        <TITLE>Envio de Notificacion a Email
        </TITLE></HEAD>
    <BODY>
        <script>
            //window.close();
        </script>
    </BODY>
</html>
