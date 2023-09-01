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


/* ---------------------------------------------------------+
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */


/* ---------------------------------------------------------+
  |                       MAIN                               |
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

$db = new ConnectionHandler("$ruta_raiz");
$mail = new PHPMailer();

//$db->conn->debug=true;
$fechahoy = date("Y-m-d");
$sqlFecha = $db->conn->SQLDate("Y-m-d", "RADI_FECH_RADI");
$order = " 1";
$nombre = 'ADMINISTRADOR';
$apellido = 'SGD ORFEO';
$dependencia = "b.radi_depe_actu";
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

//Busco los expedientes que tienen flujo
echo "Alertas para los documentos que tienen flujo";
echo "<br>";

$redondeo = "date_part('days', radi_fech_radi-" . $db->conn->sysTimeStamp . ")+floor(fe.SGD_FEXP_TERMINOS * 7/5)+(select count(*) from sgd_noh_nohabiles where NOH_FECHA between radi_fech_radi and " . $db->conn->sysTimeStamp . ")";


$isql_exp = 'SELECT se.SGD_FEXP_CODIGO, se.SGD_PEXP_CODIGO, fe.SGD_FEXP_DESCRIP as ETAPA,
                e.SGD_EXP_NUMERO, r.RADI_NUME_RADI as CHK_CHKANULAR, dir.SGD_DIR_NOMREMDES AS "Remitente/Destinatario",
                r.RADI_USUA_ACTU AS HID_USUA, r.RADI_DEPE_ACTU AS HID_DEPE,' . $redondeo . ' as "HID_DIAS_R",
		tp.SGD_TPR_DESCRIP as "Tipo_Documento", r. RA_ASUN      AS HID_ASUN
                from SGD_TPR_TPDCUMENTO tp, SGD_DIR_DRECCIONES dir, 
			RADICADO r LEFT OUTER JOIN SGD_EXP_EXPEDIENTE e
                         ON r.RADI_NUME_RADI=e.RADI_NUME_RADI
                join  SGD_SEXP_SECEXPEDIENTES se ON  SE.SGD_EXP_NUMERO=E.SGD_EXP_NUMERO 
			AND SE.SGD_PEXP_CODIGO!=0, SGD_FEXP_FLUJOEXPEDIENTES fe
	         WHERE  SE.SGD_FEXP_CODIGO=FE.SGD_FEXP_CODIGO
                 	AND SE.SGD_PEXP_CODIGO=FE.SGD_PEXP_CODIGO
			AND r.RADI_NUME_RADI=dir.RADI_NUME_RADI
			AND r.tdoc_codi=tp.sgd_tpr_codigo
		ORDER BY HID_DEPE';

$rs = $db->conn->query($isql_exp);

while (!$rs->EOF) {
    $usua_codi = $rs->fields["hid_usua"];
    $depe_codi = $rs->fields["hid_depe"];
    $radi_nume = $rs->fields["chk_chkanular"];
    $asunto = $rs->fields["hid_asun"];
    $diasr = $rs->fields["hid_dias_r"];
    $remitente = $rs->fields["Remitente/Destinatario"];
    $remitente = utf8_decode($remitente);
    $tipodoc = $rs->fields["tipo_documento"];
    $tipodoc = utf8_decode($tipodoc);
    $etapa = $rs->fields["etapa"];

    if ($diasr <= 1 and $depe_codi != '0999') {
        echo "<br>";
        echo "Radicado $radi_nume fecha $fecha_rad Dias restantes $diasr Tipo Documental $tipodoc <br> Etapa $etapa";
        echo "<br>";

        $sql_mail = "SELECT USUA_EMAIL FROM USUARIO WHERE USUA_CODI=$usua_codi AND DEPE_CODI='$depe_codi'";
        $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
        $rs_mail = $db->conn->query($sql_mail);
        $mail_usu = $rs_mail->fields["usua_email"];
        $fecha = date("F j, Y H:i:s");

        if ($usua_codi != 1) {
            $sql_mail = "SELECT USUA_EMAIL FROM USUARIO WHERE USUA_CODI=1 AND DEPE_CODI='$depe_codi'";
            $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
            $rs_mail = $db->conn->query($sql_mail);
            $mail_jefe = $rs_mail->fields["usua_email"];
        }

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

        $usuarios = "select USUA_NOMB from usuario where usua_login='$krd'";
        $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
        $rsUsuario = $db->conn->query($usuarios);
        $usuariors = isset($rsUsuario->fields["usua_nomb"]) ? $rsUsuario->fields["usua_nomb"] : $rsUsuario->fields["USUA_NOMB"];

        if ($mail_usu == ' ' or $mail_correcto == 0) {
            echo "No se pudo enviar notificacion, el usuario no tiene correo electronico o tiene un formato incorrecto, comuniquese con el administrador del sistema";
        } else {
            $usMailSelect = $cuenta_mail;
            list($a, $b) = preg_split("@", $usMailSelect);
            $userName = $a;
            $fecha = date("F j, Y H:i:s");

            $mail->IsSMTP(); // telling the class to use SMTP
            $mail->SetFrom($usMailSelect, "Sistema Gestion documental ORFEO");
            $mail->Host = $servidor_mail_smtp;
            $mail->Port = $puerto_mail_smtp;
            $mail->SMTPDebug = "0"; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
            $mail->SMTPAuth = "true";
            $mail->SMTPSecure = "";
            $mail->Username = $usMailSelect;   // SMTP account username
            $mail->Password = $contrasena_mail; // SMTP account password
            $mail->Subject = "Tiene un documento vencido en Orfeo";
            $mail->AltBody = "Para ver el mensaje, por favor use un visor de E-mail compatible!";
            $mail->AddAddress($mail_usu);
            $expCant = explode("','", $verrad . " " . $radi_nume);
            $encabezado = "" . session_name() . "=" . session_id() . "&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion&carpeta=$carpeta&tipo_carp=$tipo_carp&chkCarpeta=$chkCarpeta&busqRadicados=$busqRadicados&nomcarpeta=$nomcarpeta&agendado=$agendado&";

            $asu .= "<hr>Sistema de gestion documental Orfeo.";
            $mensaje = "<html>
                            <head>
                            <title>CORRESPONDENCIA EN ORFEO</title>
                            </head>
                            <body><p>
                            " . utf8_decode($entidad) . " , " . $fecha . " <br>
                            <br></br>
                            Ha recibido un <b>documento " . $tx . "</b> en el Sistema de Gesti&oacute;n Documental Orfeo. Ingrese ";

            // By Skina - jmgamez@skinatech.com - 22 de Julio 2016
            // Se agrega el ciclo para validar la URL por cada radicado que se notifique, este cambio aplica para Informados, Radicacion, Reasignacion 	
            for ($i = 0; $i < count($expCant); $i++) {
                $bodytag = str_replace("'", "", $expCant[$i]);
                $mensaje .= 'al radicado <a href="' . $entidad_contacto . $ambiente . '/verradicado.php?verrad=' . trim($bodytag) . '&' . $encabezado . '"> ' . $bodytag . ' </a> , ';
            }
            $mensaje .= "enviado por " . utf8_decode($usuariors) . " <br></br>
			<br>Asunto:  " . utf8_decode($asunto) . "</br>
			<br>Tipo de documento:  " . utf8_decode($tipodoc) . "</br>
        		<br>Etapa:  " . $etapa . "</br>
                        <br></br>
                        <br><b>Por favor, NO responda a este mensaje, es un envío automático</b><br><br>Cordialmente, </br>
                        <br>Sistema de Gesti&oacute;n Documental Orfeo
                        </p>
                        </body>
                        </html>";
            $mail->MsgHTML(utf8_decode($mensaje));
            while ((!$exito) && ($intentos < 5) && $mail_usu != "") {
                $mail->ErrorInfo;
                $exito = $mail->Send();
                if (!$exito) {
                    echo ("<br> No se pudo enviar correo");
                } else {
                    echo("<br> Se ha enviado una notificaci&oacute;n a $mail_usu");
                }
                $intentos = $intentos + 1;
                sleep(7);
            }
        }
        echo "<br>";
    }
    $rs->MoveNext();
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

