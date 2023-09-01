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


session_start();
/** Modulo de Expedientes o Carpetas Virtuales
 * Modificacion Variables 
 * @autor Jairo Losada 2009/06
 * Licencia GNU/GPL 
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];
$tpNumRad = $_SESSION["tpNumRad"];
$tpPerRad = $_SESSION["tpPerRad"];
$tpDescRad = $_SESSION["tpDescRad"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tpDepeRad = $_SESSION["tpDepeRad"];
$usuaPermExpediente = $_SESSION["usuaPermExpediente"];

$ruta_raiz = "..";

if (!$nurad) {
    $nurad = $rad;
}

$radseleccionado = $arrRadSeleccionados;

include_once( "$ruta_raiz/include/db/ConnectionHandler.php" );
$db = new ConnectionHandler("$ruta_raiz");
include_once( "$ruta_raiz/include/tx/Historico.php" );
include_once( "$ruta_raiz/include/tx/Expediente.php" );

$encabezado = "$PHP_SELF?" . session_name() . "=" . session_id() . "&opcionExp=$opcionExp&numeroExpediente=$numeroExpediente&dependencia=$dependencia&krd=$krd&nurad=$nurad&coddepe=$coddepe&codusua=$codusua&depende=$depende&ent=$ent&tdoc=$tdoc&codiTRDModi=$codiTRDModi&codiTRDEli=$codiTRDEli&codserie=$codserie&tsub=$tsub&ind_ProcAnex=$ind_ProcAnex";

error_reporting(7);
include_once ("$ruta_raiz/include/tx/Expediente.php");
$expediente = new Expediente($db);

if (( isset($_POST['expSeleccionados']) && $_POST['expSeleccionados'] != "" ) && ( isset($_POST['strRadSeleccionados']) && $_POST['strRadSeleccionados'] != "" )) {
    $mensaje = "<center class='titulosError2'>EST&Aacute; SEGURO DE INCLUIR EL(LOS) RADICADO(S) EN EL(LOS) EXPEDIENTE(S):</center> <br>";
    $mensaje .= "<center>" . $_POST['expSeleccionados'] . "</center><br>";
    $mensaje .= " <div align='justify'><br>";
    $mensaje .= " <span class='listado2'>Recuerde: No podr&aacute; modificar el numero de expediente si";
    $mensaje .= " hay un error en el expediente, mas adelante tendr&aacute; que excluir este";
    $mensaje .= " radicado del expediente y si es el caso solicitar la anulaci&oacute;n del";
    $mensaje .= " mismo. Adem&aacute;s debe tener en cuenta que apenas coloca un nombre de expediente,";
    $mensaje .= " en Archivo crean una carpeta f&iacute;sica en la cual empezar&aacute;n a incluir los";
    $mensaje .= " documentos pertenecientes al mismo.</span></div>";

    // Excluye el radicado del expediente
    if (isset($_POST['confirmaIncluirExp']) && $_POST['confirmaIncluirExp'] == "INCLUIR_EXP") {
        $arrExpSeleccionados = explode(",", $_POST['expSeleccionados']);
        $arrRadSeleccionados = explode(",", $_POST['strRadSeleccionados']);

        $Historico = new Historico($db);

        foreach ($arrExpSeleccionados as $clave => $numExpediente) {
            foreach ($arrRadSeleccionados as $llave => $numRadicado) {
                $resultadoExp = $expediente->insertar_expediente($numExpediente, $numRadicado, $dependencia, $codusuario, $usua_doc);

                if ($resultadoExp == 1) {
                    $observa = "Incluir radicado en Expediente";
                    include_once "$ruta_raiz/include/tx/Historico.php";
                    $radicados[0] = $numRadicado;
                    $tipoTx = 53;
                    $Historico->insertarHistoricoExp($numExpediente, $radicados, $dependencia, $codusuario, $observa, $tipoTx, 0);
                } else {
                    print '<hr><font color=red>No se incluy&oacute; el radicado No. ' . $numRadicado . ' en el expediente No. ' . $numExpediente . '. Por favor intente de nuevo.</font><hr>';
                    break;
                }
            }
        }
        ?>
        <script language="JavaScript">
            opener.regresar();
            window.close();
        </script>
        <?php
    }
}
/** CONSULTA SI EL EXPEDIENTE TIENE UNA CLASIFICACION TRD
 */
// Consulta los expedientes a los que pertenece un radicado
$arrExpedientes = $expediente->expedientesRadicado($_GET['nurad']);

if ($arrExpedientes[0] != 0) {
    foreach ($arrExpedientes as $clave => $numExpediente) {
        // Consulta el proceso y el estado del expediente
        $arrTRDExp = $expediente->getTRDExp($numExpediente, "", "", "");

        $arrDatosExpediente[$numExpediente]['proceso'] = $arrTRDExp['proceso'];
        $arrDatosExpediente[$numExpediente]['estado'] = $arrTRDExp['estado'];
    }
}
?>
<html>
    <head>
        <title>Incluir Documentos Asociados a Expediente</title>
        <link href="<?= $ruta_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $ruta_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script language="JavaScript" src="../js/funciones.js"></script>
        <script language="JavaScript">
            
            function incluirExpediente() {
                var strExpSeleccionados = "";
                frm = document.excExp;
                if (typeof frm.check_uno.length != "undefined") {
                    for (i = 0; i < frm.check_uno.length; i++) {
                        if (frm.check_uno[i].checked) {
                            if (strExpSeleccionados == "") {
                                coma = "";
                            } else {
                                coma = ",";
                            }
                            strExpSeleccionados += coma + frm.check_uno[i].value;
                        }
                    }
                } else {
                    if (frm.check_uno.checked) {
                        strExpSeleccionados = frm.check_uno.value;
                    }
                }

                if (strExpSeleccionados != "") {
                    frm.expSeleccionados.value = strExpSeleccionados;
                    frm.submit();
                } else {
                    alert("Error. Debe especificar el nombre de un Expediente.");
                    return false;
                }
            }
            
            function confirmaIncluir(){
                document.getElementById('confirmaIncluirExp').value = "INCLUIR_EXP";
                document.excExp.submit();
            }
        </script>
    </head>

    <body>
    <center>
        <form name='excExp' action='<?php print $encabezado; ?>' method="post">
            <input type="hidden" name="expSeleccionados" value="<?php print $_POST['expSeleccionados']; ?>">
            <?php
            if (isset($_GET['strRadSeleccionados']) && $_GET['strRadSeleccionados'] != "") {
                $valorStrRadSeleccionados = $_GET['strRadSeleccionados'];
            } else if (isset($_POST['strRadSeleccionados']) && $_POST['strRadSeleccionados'] != "") {
                $valorStrRadSeleccionados = $_POST['strRadSeleccionados'];
            }
            ?>
            <input type="hidden" name="strRadSeleccionados" value="<?php print $valorStrRadSeleccionados; ?>">
            <input type="hidden" name='confirmaIncluirExp' id='confirmaIncluirExp' value="" >
            <center>
                <div id="titulo" style="width: 93%;" align="center">Incluir documentos asociados a expediente</div>
                <table width="93%"  border="1" align="center">
                    <tr></tr>
                </table>
                <table width="93%"  border="1" align="center">
                    <tr bordercolor="#FFFFFF">
                        <td colspan="2" class="titulos2">
                    <center>
                        <p><B>Seleccione el expediente al cual desea incluir los radicados</B> </p>
                    </center></td>
                    </tr>
                </table>
                <table width="93%"  border="1" align="center">
                    <tr></tr>
                </table>
                <div align="center">
                    <table width="93%" class="borde_tab" border="1">
                        <tr class="titulos3">
                            <td width="26%" height="66" align="center">
                                Expediente
                            </td>
                            <td width="24%" align="center">Proceso</td>
                            <td width="30%" align="center">Estado</td>
                            <td width="20%" height="66" ><div align="center">
                                    <input type="checkbox" name="check_todos" value="checkbox" onClick="todos(document.forms[0]);">
                                </div></td>
                        </tr>
                        <?php
                        if (is_array($arrDatosExpediente)) {
                            foreach ($arrDatosExpediente as $numeroExpediente => $datosExpediente) {
                                ?>
                                <tr class="listado2">
                                    <td align="center">
                                        <?php print $numeroExpediente; ?>
                                    </td>
                                    <td align="center" >
                                        <?php print $datosExpediente['proceso']; ?>
                                    </td>
                                    <td align="center">
                                        <?php print $datosExpediente['estado']; ?>
                                    </td>
                                    <td align="center">
                                        <input type="checkbox" name="check_uno" value="<?php print $numeroExpediente; ?>" onClick="uno(document.forms[0]);">
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>
                <?php
                if (!isset($_POST['expSeleccionados'])) {
                    ?>
                    <div align="center">
                        <table border=0 width=93% class="t_bordeGris">
                            <tr class="timparr">
                                <td height="30" colspan="2" class="listado1">
                            <center>
                                <input class="botones" type="button" name="btnIncluir" id="btnIncluir" Value="INCLUIR" onClick="incluirExpediente();">
                            </center>
                            </td>
                            <td width="50%" height="30" colspan="2" class="listado1"><center>
                                <input class="botones" type="button" name="Cancelar" id="Cancelar" value="CANCELAR" onClick="opener.regresar();
                                            window.close();"></center>  </td>
                            </tr>
                        </table>
                    </div>
                    <?php
                }
                // Solicita confirmacion para exclsuir el radicado del expediente
                else if (isset($_POST['expSeleccionados']) && $_POST['expSeleccionados'] != "") {
                    ?>
                    <table border=1 width="93%" align="center" class="borde_tab">
                        <tr align="center">
                            <td width="33%" height="25" class='listado2' align="center">
                                <br>
                                <?php print $mensaje; ?>
                            </td>
                        </tr>
                    </table>
                    <table border=1 width="93%" align="center" class="borde_tab">
                        <tr align="center">
                            <td width="33%" height="25" class="listado2" align="center">
                        <center>
                            <input name="btnConfirmar" type="button" onClick="confirmaIncluir();" class="botones_funcion" value="Confirmar">
                        </center>
                        </td>
                        <td width="33%" class="listado2" height="25">
                        <center><input name="cerrar" type="button" class="botones_funcion" id="envia22" onClick="opener.regresar(); window.close();" value=" Cerrar "></center></TD>
                        </tr>
                    </table>
                    <?php
                }
                ?>
        </form>
        <span class="etexto"><center>
            </center></span>
    </body>
</html>
