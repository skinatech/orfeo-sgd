<?php
/**
 * En este frame se van cargado cada una de las funcionalidades del sistema
 *
 * Descripcion Larga
 *
 * @category
 * @package      SGD Orfeo
 * @subpackage   Main
 * @author       Community
 * @author       Skina Technologies SAS (http://www.skinatech.com)
 * @license      GNU/GPL <http://www.gnu.org/licenses/gpl-2.0.html>
 * @link         http://www.orfeolibre.org
 * @version      SVN: $Id$
 * @since
 */
/* ---------------------------------------------------------+
  |                     INCLUDES                             |
  +--------------------------------------------------------- */
//Envio de mail by skinatech
session_start();
error_reporting(7);
$ruta_raiz = "..";
define('ADODB_ASSOC_CASE', 0);
include_once "../include/db/ConnectionHandler.php";
// include_once($ruta_raiz . "/include/PHPMailer/class.phpmailer.php");
include_once($ruta_raiz . "/include/PHPMailer5.2/PHPMailerAutoload.php");
include_once($ruta_raiz . "/config.php");
$entidad_contacto = $_SESSION['entidad_contacto'];
/* ---------------------------------------------------------+
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
$db = new ConnectionHandler("$ruta_raiz");
$mail = new PHPMailer();

foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
//$db->conn->debug=true;
    
$tx = $_GET['tx'];
$codusu = $_GET['codusu'];
$verrad = $_GET['verrad'];
$asunto = $_GET['asunto'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$krd = $_SESSION['krd'];
$usunom = $_GET['usunom'];
$count = $_GET['count'];

$usuarios = "select USUA_NOMB from usuario where usua_login='$krd'";
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$rsUsuario = $db->conn->query($usuarios);
$usuariors = isset($rsUsuario->fields["usua_nomb"]) ? $rsUsuario->fields["usua_nomb"] : $rsUsuario->fields["USUA_NOMB"];

$usaurioExplode = explode(',', $usunom);
$array = array();



$fecha = date("F j, Y H:i:s");
$usMailSelect = $cuenta_mail;
list($a, $b) = preg_split("/[\s@]+/", $usMailSelect);
$userName = $a;

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SetFrom($usMailSelect, "SGD Orfeo");
$mail->Host = $servidor_mail_smtp;
$mail->Port = $puerto_mail_smtp;
$mail->SMTPDebug = "0"; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
$mail->SMTPAuth = "true";
$mail->SMTPSecure = $protocolo_smtp;
$mail->Username = $usMailSelect;   // SMTP account username
$mail->Password = $contrasena_mail; // SMTP account password
$mail->Subject = "Ha recibido un documento en orfeo";
$mail->AltBody = "Para ver el mensaje, por favor use un visor de E-mail compatible!";

for ($x = 0; $x < count($usaurioExplode); $x++) {
    
    if ($usaurioExplode[$x] != '') {
        $sql = "SELECT USUA_EMAIL FROM USUARIO WHERE USUA_NOMB='" . trim($usaurioExplode[$x]) . "'";
        $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
        $rs = $db->conn->query($sql);
        $mail_usu = isset($rs->fields["USUA_EMAIL"]) ? $rs->fields["USUA_EMAIL"] : $rs->fields["usua_email"];

        //SE VERIFICA SI ES EMAIL
        $mail_correcto = 0;
        //compruebo unas cosas primeras
        if ((strlen($mail_usu) >= 6) && (substr_count($mail_usu, "@") == 1) && (substr($mail_usu, 0, 1) != "@") && (substr($mail_usu, strlen($mail_usu) - 1, 1) != "@")) {
            if ((!strstr($mail_usu, "'")) && (!strstr($mail_usu, "\"")) && (!strstr($mail_usu, "\\")) && (!strstr($mail_usu, "\$")) && (!strstr($mail_usu, " "))) {
                //miro si tiene caracter .
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
        } 
        
        if ($mail_usu == ' ' or $mail_correcto == 0) {
            echo "No se pudo enviar notificacion, el usuario " . $mail_usu . " no tiene correo electronico o tiene un formato incorrecto, comuniquese con el administrador del sistema<br>";
        } else {
            $array[] = $mail_usu;
        }
    }    
}
$mensage = '';
$encabezado = session_name() . "=" . session_id() . "&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion&carpeta=$carpeta&tipo_carp=$tipo_carp&chkCarpeta=$chkCarpeta&busqRadicados=$busqRadicados&nomcarpeta=$nomcarpeta&agendado=$agendado&";

foreach ($array as $email) {
    $mail->AddAddress($email);
    
    $expCant = explode("','", $verrad . " " . $radi_nume);

    $imageLogo = $entidad_contacto . $ambiente . '/logoEntidad.png';
    $headMailText = utf8_decode('Ha recibido una notificaci&oacute;n Orfeo');
    $imageHeader = '../logoHeaderEmail.jpg';

    // Contenido del correo tambíen puede viajar en html
    $messageContent = 'Se ha <b>' . $tx . '</b> los siguientes documentos en Orfeo ';

    // By Skina - jmgamez@skinatech.com - 22 de Julio 2016
    // Se agrega el ciclo para validar la URL por cada radicado que se notifique, este cambio aplica para Informados, Radicacion, Reasignacion  
    for ($i = 0; $i < count($expCant); $i++) {
        $bodytag = str_replace("'", "", $expCant[$i]);
        $datosRad = "select ra_asun from radicado where radi_nume_radi='" . trim($bodytag) . "'";
        $rsdatosRad = $db->conn->query($datosRad);

        if(isset($rsdatosRad->fields['ra_asun'])){
            $asunto = substr($rsdatosRad->fields['ra_asun'], 1, 300);
        }else{
            $asunto = substr($rsdatosRad->fields['RA_ASUN'], 1, 300);
        }
        
        $messageContent .= 'con los n&uacute;meros: <a href="'.$entidad_contacto . $ambiente . '/verradicado.php?verrad=' . trim($bodytag) . '&'.$encabezado.'"> ' . $bodytag . ' </a> de <b>asunto:</b> '.utf8_encode($asunto).', realizados por el <b>funcionario:</b> '. $usuariors.' ';
    }

    $messageContent .= " en la <b>fecha</b> " . $fecha ." , los cuales pueden ser consultados desde la carpeta 'Informados'.";
    $messageContent .= '<br><br><b>Por favor, NO responda a este mensaje, es un envío automático</b><br><br>Cordialmente,</br><br>Sistema de Gestion Documental Orfeo';

    // Se incluye el template 
    include('../email/emailTemplate.php');
    if($emailHtml){
        $mail->MsgHTML($emailHtml);
    }else{
        $mail->MsgHTML(utf8_decode($messageContent));
    }

    $mail->ErrorInfo;
    $exito = $mail->Send();

    if (!$exito) {
        $mensajeErrorCorreo = "No se pudo enviar notificaci&oacute;n";
        $envioOk = '';
    } else {
        $mensajeErrorCorreo = 'Se envio notificación al remitente/destinatario con el correo <b>' . $mail_usu . "</b> ";
        $envioOk = 'ok';
    }

    $mail->ClearAddresses();
}

?>
<html>
    <HEAD>
        <TITLE>Envio de Notificacion a Email
        </TITLE></HEAD>
    <BODY>
        <?php echo $mensajeErrorCorreo ?>
    </BODY>
</html>
