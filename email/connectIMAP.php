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

        /*---------------------------------------------------------+
        |                     INCLUDES                             |
        +---------------------------------------------------------*/


        /*---------------------------------------------------------+
        |                    DEFINICIONES                          |
        +---------------------------------------------------------*/
session_start();
$url_raiz="..";
$dir_raiz=$_SESSION['dir_raiz'];
$ESTILOS_PATH2 =$_SESSION['ESTILOS_PATH2'];

        /*---------------------------------------------------------+
        |                       MAIN                               |
        +---------------------------------------------------------*/



// Ultima Modificacion Kasandra 2012-10    Agregamos templates documentacion

// error_reporting(E_ERROR | E_PARSE);

if(!isset($_SESSION['krd'])) include "../rec_session.php";

set_include_path(".:/usr/share/php:/usr/share/pear");

        /********************************************************
        *          Encabezados de librerias estandares          *
        ********************************************************/

//require_once "Mail/IMAPv2.php";
// clase de reemplazo para ImapV2
require_once "ImapSkina.php";
        /********************************************************
        *           Constantes del archivo                      *
        ****************************************** **************/

$MSG_NO_CONNECT="No se pudo realizar la conexion al serv. de correo.";

        /********************************************************
        *           Variables  del archivo                      *
        ********************************************************/

$protocolo_mail = $_SESSION['protocolo_mail'];
$servidor_mail = $_SESSION['servidor_mail'];

$passwdEmail=$_SESSION['passwdEmail'];
$usuaEmail = $_SESSION['usua_email'];
$usuaDoc = $_SESSION['usua_doc'];
$puerto_mail = $_SESSION['puerto_mail'];
$tmpNameEmail = "tmpEmail_".$usuaDoc."_".md5(date("dmy hms")).".html";
$_SESSION['tmpNameEmail'] = $tmpNameEmail;

//define('BUZON', '[GMAIL]');
//echo $usuaEmail,"-",$dominioEmail,"-",$passwdEmail,"+" ;


        /********************************************************
        *                   Programa Principal                  *
        ********************************************************/

if(!$_SESSION['eMailPid']) {
    $_SESSION['eMailAmp'] = $_GET['mid'] ?? $_SESSION['eMailMid'];
    $_SESSION['eMailPid'] = $_GET['pid'] ?? $_SESSION['eMailPid'];
    $eMailPid = $_GET['pid'] ?? $_SESSION['eMailPid'];;
    $eMailMid = $_GET['mid'] ?? $_SESSION['eMailMid'];
}else{
    $eMailPid = $_SESSION['eMailPid'];
    $eMailMid = $_SESSION['eMailMid'];
    $eMailAmp = $_SESSION['eMailAmp'];
}
list($a,$b)=preg_split("/[\s@]+/",$usuaEmail);
$usuaEmail1=$a;

$buzon_mail = $_SESSION['buzon_mail'] ?? '';

//if ( $protocolo_mail == "imaps" ){
if ( $protocolo_mail == "imap" || $protocolo_mail == "imaps" ){
  //$connection = "$protocolo_mail://$usuaEmail:$passwdEmail@$servidor_mail:$puerto_mail/$buzon_mail#novalidate-cert";
  //$connection = '{'.$servidor_mail.':'.$puerto_mail.'/ssl}' . $buzon_mail;
  $flags = '/ssl/novalidate-cert';
} else {
  //$connection = "$protocolo_mail://$usuaEmail:$passwdEmail@$servidor_mail:$puerto_mail/$buzon_mail#notls";
  $connection = '{'.$servidor_mail.':'.$puerto_mail.'/pop3}' . $buzon_mail;
  $flags = '/pop3/notls';
}
if (!isset($_GET['dump_mid'])) {
    //$msg = new Mail_IMAPv2();
    if(isset($usuaEmail) && isset($passwdEmail)){
        $msg =  new ImapSkina($servidor_mail, $puerto_mail, $usuaEmail, $passwdEmail, '', $flags);
        $msg->testConnection();
        
        if(!$msg->findOrfeoFolder()){
            $msg->makeOrfeoFolder();
        }

        $folders = $msg->getFolders();
    }
}

 
?>


