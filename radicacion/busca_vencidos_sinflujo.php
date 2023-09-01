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
$redondeo = "date_part('days', radi_fech_radi-" . $db->conn->sysTimeStamp . ")+dt.dias_termino +(select count(*) from sgd_noh_nohabiles where NOH_FECHA between radi_fech_radi and " . $db->conn->sysTimeStamp . ")";

$radi_nume_deri = " and b.radi_nume_deri ='0' ";
$dependenciaArchivo = " and b.radi_depe_actu <> '" . $dependenciaSalida . "' ";

$isql = 'select
            ' . $sqlFecha . ' as "DAT_Fecha Radicado"
            ,b.RA_ASUN  as "HID_ASUN"' . $colAgendado . '
            ,d.SGD_DIR_NOMREMDES as "Remitente/Destinatario"
            ,c.SGD_TPR_DESCRIP as "Tipo_Documento"
            ,' . $redondeo . ' as "HID_DIAS_R"
            ,b.RADI_USUA_ACTU as "HID_USUA"
            ,b.RADI_DEPE_ACTU as "HID_DEPE"
            ,b.RADI_NUME_RADI as "CHK_CHKANULAR"
        from
            radicado b
            left outer join SGD_TPR_TPDCUMENTO c on b.tdoc_codi=c.sgd_tpr_codigo
            left outer join SGD_DIR_DRECCIONES d on b.radi_nume_radi=d.radi_nume_radi
            left outer join SGD_DT_RADICADO dt on b.radi_nume_radi=dt.radi_nume_radi
        where
            (b.radi_nume_radi is not null
            ' . $radi_nume_deri . $dependenciaArchivo . ')
            and ' . $redondeo . ' <= ' . $diasVencimiento . '
            and b.radi_depe_actu=' . $dependencia . $whereUsuario . $whereFiltro . ' ' . $whereCarpeta . ' ' . $sqlAgendado . '
        order by ' . $order . ' ' . $orderTipo;
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
        enviarcorreo($idusuario, $iddependencia, $usuario, $db, $entidad, $servidor_mail_smtp, $puerto_mail_smtp, $cuenta_mail, $contrasena_mail, $entidad_contacto, $ambiente, $envioCorreo, $correoCliente, $imageLogo);
    }
}

function enviarcorreo($idusuario, $iddependencia, $arrayusuarios, $db, $entidad, $servidor_mail_smtp, $puerto_mail_smtp, $cuenta_mail, $contrasena_mail, $entidad_contacto, $ambiente, $envioCorreo, $correoCliente, $imageLogo = '../logoEntidad.jpg')
{
    $mail = new PHPMailer();
    $usua_codi = $idusuario;
    $depe_codi = $iddependencia;

    echo "<br>";
    $sql_mail = "SELECT us.USUA_EMAIL, us.USUA_NOMB, de.DEPE_NOMB FROM USUARIO us "
        . "inner join DEPENDENCIA de ON de.depe_codi=us.depe_codi "
        . "WHERE us.USUA_CODI=$usua_codi AND us.DEPE_CODI='$depe_codi'";
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
        list($a, $b) = preg_split("@", $usMailSelect);
        $userName = $a;

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SetFrom($usMailSelect, "SGD Orfeo");
        $mail->Host = $servidor_mail_smtp;
        $mail->Port = $puerto_mail_smtp;
        $mail->SMTPDebug = "0"; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = $protocolo_smtp;
        $mail->Username = $usMailSelect; // SMTP account username
        $mail->Password = $contrasena_mail; // SMTP account password
        $mail->Subject = "Ha recibido un documento en orfeo";
        $mail->AltBody = "Para ver el mensaje, por favor use un visor de E-mail compatible!";
        $mail->AddAddress($mail_usu);
        $encabezado = "" . session_name() . "=" . session_id() . "&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion&carpeta=$carpeta&tipo_carp=$tipo_carp&chkCarpeta=$chkCarpeta&busqRadicados=$busqRadicados&nomcarpeta=$nomcarpeta&agendado=$agendado&";

        $imageLogo = $imageLogo;
        $headMailText = utf8_decode('Ha recibido un documento');
        $imageHeader = '../logoHeaderEmail.jpg';

        // Contenido del correo tambíen puede viajar en html
        $messageContent = "Se&ntilde;or(a): " . $usua_codi_envio . " de la dependencia: " . utf8_decode($depe_codi_envio) . "<br><br> A continuaci&oacute;n se presenta un listado con los radicados vencidos y/o pr&oacute;ximos a vencer en 2 d&iacute;as, se requiere gesti&oacute;n de su parte. <br>Ingrese a Orfeo y realice el tr&aacute;mite correspondiente.<br><br>";

        $messageContent .= "
                        <table border = 1>
                            <thead>
                                <tr>
                                    <th>Radicado</th>
                                    <th>Fecha</th>
                                    <th>D&iacute;as Restantes</th>
                                    <th>Tipo Documental</th>
                                    <th>Enviado Por</th>
                                    <th>Asunto</th>
                                </tr>
                            </thead>";

        //AQUI CONSTRUIMOS EL CONTENIDO DE LA TABLA.
        foreach ($arrayusuarios as $arrayusuario) {
            //AQUI TRAIGO LOS VALORES DEL ARREGLO
            //QUITO EL utf8_decode YA QUE LOS VALORES LLEGAN BIEN
            $radi_nume = $arrayusuario['chk_chkanular'];
            $asunto = utf8_decode($arrayusuario['hid_asun']);
            $diasr = $arrayusuario['hid_dias_r'];
            $tipodoc = utf8_decode($arrayusuario['tipo_documento']);
            $fecha_rad = $arrayusuario['dat_fecha radicado'];
            $usuariors = utf8_decode($arrayusuario['remitente/destinatario']);
            $messageContent .= "
                <tr>
                    <td><a href='" . $entidad_contacto . $ambiente . "/verradicado.php?verrad=" . trim($radi_nume) . "&" . $encabezado . "'> " . $radi_nume . " </a></td>
                    <td>" . $fecha_rad . "</td>
                    <td>" . $diasr . "</td>
                    <td>" . $tipodoc . "</td>
                    <td>" . $usuariors . "</td>
                    <td>" . $asunto . "</td>
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
