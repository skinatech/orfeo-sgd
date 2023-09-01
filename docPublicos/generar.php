<?php
/**
 * En este frame se van cargado cada una de las funcionalidades del sistema
 *
 * Autor: Luis Miguel Romero
 * Fecha: 18-12-2019
 * Info: Se genera  accion publicar un anexo con extension PDF
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
session_start();
$url_raiz = $_SESSION['url_raiz'];
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$depeNomb = $_SESSION["depe_nomb"];
$abreviatura = $_SESSION["abreviatura"];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

$assoc = $_SESSION['assoc'];
define('ADODB_ASSOC_CASE', $assoc);

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

$krd = $_SESSION["krd"];
$depe_codi = $_SESSION["depecodi"];
$usua_codi = $_SESSION["codusuario"];
$usua_doc = $_SESSION["usua_doc"];
$usua_nomb = $_SESSION["usua_nomb"];

// Variables a utilizar
$msj = '';
$codanexo = $_GET['codanexo'];
$estadoPublico = $_GET['estadoPublico'];

if (!$dir_raiz)
    $dir_raiz = ".";
include("$dir_raiz/config.php");
if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";
if (isset($db))
    unset($db);
include_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$dir_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$sqlFechaHoy = $db->conn->OffsetDate(0, $db->conn->sysTimeStamp);
// $db->conn->debug=true;

// Si el $estadoPublico es igual a TRUE 't' cambia el estado
if( $_GET['estadoPublico'] == 'f' ){
    $estadoPublico = 't';
    $estadoPublicoObserva = 'Publico';
}else{
    $estadoPublico = 'f';
    $estadoPublicoObserva = 'Confidencial';
}

$sqlPer = "SELECT USUA_PERM_DOC_PUBLICO FROM USUARIO WHERE USUA_LOGIN ='".$_SESSION['krd']."' ";
$rsP = $db->conn->Execute($sqlPer);
// Verifica que tenga permisos 
if( $rsP->fields["USUA_PERM_DOC_PUBLICO"] == 1) {

    // Actualiza el estado del anexo
    $sqlUp = "UPDATE ANEXOS SET RADI_DOCU_PUBLICO = '".$estadoPublico."' WHERE ANEX_CODIGO = '".$codanexo."' ";

    $rsUp = $db->query($sqlUp);
    
    if( !$rsUp ){
       $msj .= 'No se pudo actualizar el estado del anexo.<br>';
    }else{
        $msj .= 'Se actualizó el estado del anexo.<br>';

        include_once "$dir_raiz/include/tx/Historico.php";
                
        // Se asigna el radicado a un arreglo
        $radicados[] = $numrad;

        $codTx = 72;
        $observacion = 'Se cambió el estado del anexo: '.$codanexo.' a '.$estadoPublicoObserva ;
        $hist = new Historico($db);
        $hist->insertarHistorico($radicados, $depe_codi, $usua_codi, $depe_codi, $usua_codi, $observacion, $codTx );
    }

}else{
    $msj .= 'No tiene permisos para actualizar el estado.<br>';
}

?>

<head>
    <title>SGD Orfeo</title>
    <link rel="stylesheet" href="../estilos_totales.css">
</head>

<body>
    <center>
        <br>
        <br>
        <font size='3' color='#000000'>
            <span class='etextomenu'><b><?= $msj ?><BR>
            <a class='vinculos' href="../verradicado.php?<?= session_name().'='.session_id().'&krd='.$krd ?>&verrad=<?= $numrad ?>&menu_ver_tmp=2&verrad=<?= $radicar_documento ?>">Volver al radicado <?= $numrad ?></a></b></span>
        </font>
    </center>
</body>
