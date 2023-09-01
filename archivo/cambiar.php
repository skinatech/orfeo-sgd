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
session_start();
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
foreach ($_GET as $key => $valor) ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor;

$krdOld = $krd;
$per = 1;
//session_start();
$krd = $_GET['krd'];
$dependencia = $_GET['dependencia'];
$est = $_GET['est'];
if (!$krd)
    $krd = $krdOld;
if (!$dir_raiz)
    $dir_raiz = ".";
if (!$dependencia)
    include "$dir_raiz/rec_session.php";
include_once("$url_raiz/include/db/ConnectionHandler.php");
include_once "$url_raiz/include/tx/Historico.php";
$db = new ConnectionHandler("$url_raiz");
//$db->conn->debug = true;
$objHistorico = new Historico($db);
$encabezado = session_name() . "=" . session_id() . "&krd=$krd&nomcarpeta=$nomcarpeta";
?>
<html height=50 width=150>
    <head>
        <title>Cambio Estado Expediente</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>
    <body bgcolor="#FFFFFF">
        <form name=cambiar action="lista_expediente.php?<?= $encabezado ?>" method='get'>
            <?php
            $dat = date("Y-m-d");
            $sqle = "update SGD_EXP_EXPEDIENTE set SGD_EXP_ARCHIVO='$est',SGD_EXP_FECHFIN='$dat' where SGD_EXP_NUMERO LIKE '$expediente'";
            $rs = $db->query($sqle);
            $arrayRad[0] = $numRad;
            $isqlDepR = "SELECT USUA_CODI FROM usuario WHERE USUA_LOGIN = '$krd'";
            $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
            $rsDepR = $db->conn->Execute($isqlDepR);
            
            $codusua = $rsDepR->fields['USUA_CODI'];
            if ($est == 2) {
                $observa = "Se Cerro el Expediente  ";
                $objHistorico->insertarHistoricoExp($expediente, $arrayRad, $dependencia, $codusua, $observa, 58, 1);
                echo '<center> <b> El Expediente fue Cerrado<b></center>';
            }
            if ($est == 1) {
                $observa = "Se Reabrio el Expediente  ";
                $objHistorico->insertarHistoricoExp($expediente, $arrayRad, $dependencia, $codusua, $observa, 59, 1);
                echo '<center>El Expediente fue Reabierto</center>';
            }
            ?>
            <center><input type="button" value="Cerrar" class="botones_mediano" onclick="opener.regresar();window.close()"></center>
        </form>
    </body>    
</html>
