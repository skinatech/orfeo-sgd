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

require_once("$dir_raiz/include/db/ConnectionHandler.php");
include_once "../class_control/AplIntegrada.php";
if (!$db)
    $db = new ConnectionHandler("$dir_raiz");

$db->conn->SetFetchMode(ADODB_FETCH_NUM);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tpNumRad = $_SESSION["tpNumRad"];
$tpPerRad = $_SESSION["tpPerRad"];
$tpDescRad = $_SESSION["tpDescRad"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3img = $_SESSION["tip3img"];
$tpDepeRad = $_SESSION["tpDepeRad"];
$tip3desc = $_SESSION["tip3desc"];
$tipoRadicadoPqr = $_SESSION["tipoRadicadoPqr"];
$estructuraRad = $_SESSION['estructuraRad'];
$longitud_codigo_dependencia = $_SESSION["largoDependencia"];

//by skinatech
if (!$birds22)
    $birds22 = 0;

$tipoMedio = $_GET['tipoMedio'];

/**  Fin variables de session de Radicacion de Mail. * */
if (!isset($_SESSION['dependencia']) and ! isset($_SESSION['cod_local']))
    include "../rec_session.php";

include "crea_combos_universales.php";
include "../include/tx/Tx.php";
include("../include/tx/Radicacion.php");

if ($nurad) {
    $nurad = trim($nurad);
    $ent = substr($nurad, -1);
}
?>
<HTML>
    <head>
        <title>.:: Orfeo Modulo de Radicaci&acuoteo;n::.</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" href="../js/jquery-ui/development-bundle/themes/base/jquery.ui.all.css">
        <script src="../js/jquery-ui/development-bundle/jquery-1.7.1.js"></script>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script type="text/javascript">
            function alerta() {
                var opcion = confirm("Esta seguro, en generar el Numero de radicado?");
                if (opcion == true) {
                    $('#postradicacion').val($('#radicacion').val());
                    document.preformulario.submit();
                }
            }
        </script> 
    </head> 
    <body bgcolor="#FFFFFF" >
        <form action='pre_radicacion.php'  method="POST" name="preformulario" id="preformulario" class="borde_tab">
            <center>
                <br>
                <div id="titulo" style="width: 90%;" align="center">
                    <table width="99%"  border="0" align="center" cellpadding="1" cellspacing="1" class="borde_tab">
                        <tr>
                            <td width="94%" align="center" valign="middle" class="titulos2" style="font-size: 21px;"><b>
                                    Generaci&oacute;n de Radicado
                            </td>
                        </tr>
                    </table>
                </div>
                <table width=90%  border='1' name='pes' id='pes' class="borde_tab" align="center" cellpadding="0" cellspacing="1">
                    <tr>
                        <td colspan="2">
                            <b>Importante: </b>Todos los n&uacute;meros de radicados generados desde esta opci&oacute;n deben ser actualizados inmediatamente 
                            por el usuario de radicaci&oacute;n, de lo contrario no tendr&aacute; asignado ni responsable, ni tampoco informaci&oacute;n del remitente.
                            Lo que implicaria no dar inicio al tramite correspondiente del documento.
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF"  class="listado2 ">
                    <center>
                        <INPUT type="hidden" value="" name="postradicacion" id="postradicacion"/>
                        <input name="radicacion" id="radicacion" type="button" value="Generar Radicado" onclick="alerta();" class='botones_largo'>
                    </center>
                    </td>       
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php
                            if ($_POST['postradicacion'] && $_POST['postradicacion'] != '') {
                                $rad = new Radicacion($db);
                                $ent = 2;
                                $date = date('Y-m-d H:i:s');

                                // Se pasa el driver de conexión con el fin de diferenciar cual es el metodo para el incremento de la secuencia
                                $noRad = $rad->newPreradicado($ent, $tpDepeRad[$ent], $db->driver);
                                $insertpre = "insert into pre_radicado (radi_nume_radi, radi_fech_radi, estado)";
                                $insertpre .= " values ('$noRad', '$date', 1)";
                                $resul = $db->conn->query($insertpre);

                                if ($noRad) {
                                    $varEnvio = session_name()."=".session_id()."&leido=no&krd=$krd&verrad=$noRad&nurad=$noRad&ent=$ent&dependenciaDestino=$dependencia";
                                    ?>
                            <center>
                                <img src='../iconos/img_alerta_2.gif' title="Icono de alerta">
                                <font face='Arial' size='3'><b>Se ha generado el radicado No.</b></font>
                                <font face='Arial' size='4' color='red'><b><u> <?php echo $noRad; ?></u></b></font>
                            </center>
                            <center>
                                <br>
                                <font face='Arial' size='3' color='black'>Haga click en el c&oacute;digo de barras para imprimir el sticker</font>
                                <br>
                                <a href="#"  class=vinculos onClick="window.open('stickerWeb/indexpre.php?<?= $varEnvio ?>&alineacion=Center', 'sticker<?= $noRad ?>', 'menubar=0,resizable=0,scrollbars=0,width=360,height=110,toolbar=0,location=0');"><img src="stickerWeb/codigoBarras.png" alt="Al dar click en la imagen se abrìra una nueva ventana que ejecutara la accion de imprimir                   " width="300" height="80" border="0"></a>
                                <br>
                            </center>
                            <?php
                        } else {
                            echo "<font color=red >Ha ocurrido un Problema<br>Verfique los datos e intente de nuevo</font>";
                        }
                    }
                    ?>
                    </td>
                    </tr>
                </table>            
            </center>
        </form>
    </body>
</html>