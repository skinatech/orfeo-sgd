<?php
/**
 * En este frame se van cargado cada una de las funcionalidades del sistema
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

 // Ultima Modificacion Kasandra 2012-10    Agregamos templates documentacion
//error_reporting(E_ALL);
error_reporting(E_ERROR | E_PARSE);

session_start();
if (!isset($_SESSION['krd']))
    include "../rec_session.php";

foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

set_include_path(".:/usr/share/php:/usr/share/pear");

/* * ******************************************************
 *          Encabezados de librerias estandares          *
 * ****************************************************** */

include '../config.php';
include 'email.inc.php';
include 'connectIMAP.php';

/* * ******************************************************
 *           Constantes del archivo                      *
 * ****************************************************** */

$TIT_Email_Entra = "Email Entrante";
$TIT_Entradas_Pendientes = "Entradas Pendientes";
$MSG_No_Servidor = "No se pudo establecer coneccion con el Servidor.";
$ruta_raiz = "..";

/* * ******************************************************
 *           Variables  del archivo                      *
 * ****************************************************** */

$_SESSION['eMailAmp'] = "";
$_SESSION['eMailMid'] = "";
$_SESSION['eMailPid'] = "";
$_SESSION['fileeMailAtach'] = "";
$_SESSION['tipoMedio'] = "";

/* * ******************************************************
 *                   Programa Principal                  *
 * ****************************************************** */

$krd = $_SESSION["krd"];

$usuaEmail = $_SESSION['usuaEmail'];
$usuario_mail = $_SESSION['usua_email'];
$dominioEmail = $_SESSION['dominioEmail'];

if (!$_SESSION['passwdEmail']) {
    $passwdEmail = $passwd_mail;
    $_SESSION['passwdEmail'] = $passwd_mail;
} else {
    $passwdEmail = $_SESSION['passwdEmail'];
}
// echo $usuaEmail,"-",$usuario_mail,"-",$dominioEmail,"-",$passwdEmail,"+" ;

if (!$passwdEmail) {
    $splitEmail = explode("@", $usuario_mail);
    $usuaEmail = $splitEmail[0];
    $dominioEmail = $splitEmail[1];
    $_SESSION['usuaEmail'] = $usuaEmail;
    $_SESSION['dominioEmail'] = $dominioEmail;
    $_SESSION['passwdEmail'] = $passwd_mail;
}
if (!$dominioEmail) {
    $splitEmail = explode("@", $usuario_mail);
    $usuaEmail = $splitEmail[0];
    $dominioEmail = $splitEmail[1];
}

$inbox_email = $_GET['inboxEmail'] ?? 'INBOX';

$_SESSION['buzon_mail'] = $buzon_mail;
$_SESSION['inboxEmail'] = $_GET['inboxEmail'];


//------------------------------------------------------------------------------
//contar los mensajes en el buzón actual
$msgcount = $msg->countMessages($inbox_email);
//asignar de acuerdo a la cantidad de correos que se deseen ver por vista
$correos_por_vista = 15;

// valores para el paginador
if(isset($maxval) && $maxval != ''){
    $maxValue = $maxval;
}else{
    $maxValue = $msgcount;
}

if(isset($minval) && $minval != ''){
    $minValue = $minval >= 1 ? $minval : 1 ;
}else{
    $newMinValue =  (int)$maxValue - (int)$correos_por_vista;
    $minValue = $newMinValue >= 1 ? $newMinValue : 1;
}

$response = $msg->getHeadersEmailsInSequence($inbox_email, $minValue, $maxValue, false);
//print_r($response);
$attachments = $response['attachments'];
//print_r($attachments);
$quotaroot = $msg->getQuotaRoot($inbox_email);

?>
<html>
    <head>
        <title> <?= $TIT_Entradas_Pendientes ?> </title>
        <link href="<?= $ruta_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $ruta_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>
    <body>
        <!--<div style='display:none;'>-->
        <div style='display:block;'>
            <?php
            $status = true;
            $status = $msg->testConnection();
            
            if(!$status):
            ?>
                <div><b>NO SE PUDO REALIZAR LA CONEXIÓN, LOS ERRORES SON: <b></div>
                <div>
                    <ul>
                        <?php 
                            $errors = $msg->getErrors();
                            foreach( $errors as $error): 
                        ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php
                endif;
            ?>
        </div>
        <dix style="align:center;">
            <div id="titulo" style="width:99%;" align="center">
                E-mails (<?= $usuaEmail ?>@<?= $dominioEmail ?>) Buzon <?= $inbox_email ?>
            </div>
            <?php if(is_array($response['headers'])): ?>
                <?php if (count($response['headers']) > 0): ?>   
                    <table border="1" class="borde_tab" width="99%">    
                        <tr class="titulos3">
                            <th height="40"> ID </th>
                            <th height="40"> Asunto </th>
                            <th height="40"> Remitente </th>
                            <th height="40"> Fecha </th>
                            <th height="40"> Adjuntos </th>
                        </tr>
                        <?php foreach($response['headers'] as $header): ?>
                            <?php
                                $msgno = $header->msgno;
                                $style = ((isset($header->recent) && $header->recent != 0) || (isset($header_info->seen) && $header_info->seen != 0)) ? 'gray' : 'black';
                            ?>
                            <tr class="listado1">
                                <td class="msgitem">
                                    <?= $header->msgno ?>
                                </td>
                                <td class="msgitem">
                                    <a href="mensaje.php?msgno=<?= $msgno ?>&inboxEmail=<?= $inbox_email ?>" target="formulario">
                                        <?= imap_utf8($header->subject) ?? ''?>
                                    </a>
                                </td>
                                <td class="msgitem">
                                    <?= imap_utf8($header->from) ?? 'Sin definir' ?>
                                </td>
                                <td class="msgitem">
                                    <?= imap_utf8($header->date) ?? 'Sin definir' ?>
                                </td>
                                <td class="msgitem">
                                    <?php if(isset($attachments[$msgno]) && $attachments[$msgno] == true): ?>
                                        <img src='imagenes/attach.png' width='18' height='18' border='0' alt='tiene adjunto'>
                                    <?php endif;?>
                                </td>    
                            </tr>
                        <?php endforeach; ?>    
                    </table>
                    <div id="paginador" style="padding:20px;background-color:#1C4056;color:white;width:99%">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <?php
                                        $actualval = $maxValue;
                                        $minimal = 1;
                                        $maximal = $msgcount;

                                        $mininferior = 1;
                                        $maxinferior = $correos_por_vista;
                                        
                                        $minval1 = $actualval - (2 * $correos_por_vista);
                                        $maxval1 = $actualval - (1 * $correos_por_vista);

                                        $minval2 = $actualval - (1 * $correos_por_vista);
                                        $maxval2 = $actualval;

                                        $minval3 = $actualval;
                                        $maxval3 = $actualval + (1* $correos_por_vista);

                                        $minsuperior = $msgcount - $correos_por_vista;
                                        $maxsuperior = $msgcount;
                                        
                                    ?>

                                    <nav aria-label="Page navigation correos" style="margin:0 auto">
                                        <ul class="pagination">
                                        <?php if($maxval2 < $maxsuperior): ?>
                                            <li class="page-item " style=""><a class="page-link" href='login_email.php?inboxEmail=<?= $buzon_mail ?? '' ?>&minval=<?= $minsuperior ?>&maxval=<?= $maxsuperior ?>'><?= $maxsuperior ?></a></li>
                                            <?php endif; ?>
                                            <?php if($maxval3 < $maxsuperior): ?>
                                                <li class="page-item " style=""><a class="page-link" href='login_email.php?inboxEmail=<?= $buzon_mail ?? '' ?>&minval=<?= $minval3 ?>&maxval=<?= $maxval3 ?>'> << <?= $maxval3 ?></a></li>
                                            <?php endif; ?> 
                                            <li class="page-item active" style=""><a class="page-link" href='login_email.php?inboxEmail=<?= $buzon_mail ?? '' ?>&minval=<?= $minval2 ?>&maxval=<?= $maxval2 ?>'> << <?= $maxval2 ?> >> </a></li>
                                            
                                            <?php if($minval2 > $mininferior): ?>
                                            <li class="page-item " style=""><a class="page-link" href='login_email.php?inboxEmail=<?= $buzon_mail ?? '' ?>&minval=<?= $minval1 ?>&maxval=<?= $maxval1 ?>'> <?= $maxval1 ?> >> </a></li>
                                            <?php endif; ?>    
                                            <?php if($minval1 > $mininferior): ?>
                                            <li class="page-item " style=""><a class="page-link" href='login_email.php?inboxEmail=<?= $buzon_mail ?? '' ?>&minval=<?= $mininferior ?>&maxval=<?= $maxinferior ?>'><?= $maxinferior ?></a></li>
                                            <?php endif; ?>
                                             
                                                  
                                        </ul>
                                    </nav>  
                                </div>
                            </div>
                        </div>                            
                        
                    </div>
                <?php endif; ?>
                <div id="quota" style="text-align:center;">
                    <?php if(count($quotaroot)): ?>
                    mailbox: <?= $quotaroot['usage'] ?? ''  ?>
                    <br>
                    Cuota: <?= $quotaroot['usage'] ?? '' ?> bytes usados de un total de <?= $quotaroot['limit'] ?? '' ?> bytes
                    <?php endif; ?>
                </div>
            <?php else: ?>                                        
                <div style='font-size: 30pt; text-align: center; padding: 50px 3px 30px 20px;'>
                    No hay Mensajes
                </div>
            <?php endif; ?>
            <div id="titulo-cantidad" style="width:99%;" align="center">
                Cantidad de correos en el buzón: <?= $msgcount ?? '' ?>
            </div>        
</div>
</center>
</body>
</html>
