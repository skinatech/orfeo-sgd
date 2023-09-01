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
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

session_start();
error_reporting(7);
$krdold = $krd;
$ruta_raiz = "..";
$url_raiz = $_SESSION['url_raiz'];
$dir_raiz = $_SESSION['dir_raiz'];
$krd = $_GET['krd'];
$nurad = $_GET['numRad'];
$nivelRad = $_POST['nivelRad'];
$grbNivel = $_POST['grbNivel'];
$ESTILOS_PATH2 = $_SESSION["ESTILOS_PATH2"];
$dependencia = $_SESSION["dependencia"];;
$codusuario = $_SESSION["codusuario"];;

if (!$krd) {
    $krd = $krdold;
}

if (!$nurad) {
    $nurad = $_GET['verrad'];
    $ent = substr($nurad, -1);
}

include_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$dir_raiz");

include_once "$dir_raiz/include/tx/Historico.php";
include_once ("$dir_raiz/class_control/TipoDocumental.php");
include_once "$dir_raiz/include/tx/Expediente.php";
$trd = new TipoDocumental($db);
$encabezadol = "$PHP_SELF?" . session_name() . "=" . session_id() . "&opcionExp=$opcionExp&numeroExpediente=$numeroExpediente&dependencia=$dependencia&krd=$krd&nurad=$nurad&coddepe=$coddepe&codusua=$codusua&depende=$depende&ent=$ent&tdoc=$tdoc&codiTRDModi=$codiTRDModi&codiTRDEli=$codiTRDEli&codserie=$codserie&tsub=$tsub&ind_ProcAnex=$ind_ProcAnex";
?>
<html>
    <head>
        <title>Nivel de Confidencialidad</title>
        <link href="<?= $ruta_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $ruta_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script>
            function regresar() {
                document.TipoDocu.submit();
            }
        </script><style type="text/css">
            <!--
            .style1 {font-size: 14px}
            -->
        </style>
    </head>
    <body bgcolor="#FFFFFF">
        <form method="POST" action="radicado.php?krd=<?= $krd ?>&numRad=<?= $nurad ?>" name="TipoDocu">
            <center>
                <div id="titulo" style="width: 80%;" align="center">Nivel de seguridad del radicado No.<?= $nurad ?></div>
                <table width="80%" border="1" cellspacing="1" cellpadding="0" align="center" class="borde_tab">
                    <tr>
                        <td width="62%" class="titulos5" >Nivel</td>
                        <td width="38%" class=listado2>
                            <select name=nivelRad class=select>
                                <?php
                                if ($nivelRad == 0)
                                    $datoss = " selected ";
                                else
                                    $datoss = "";
                                ?>
                                <option value=0 <?= $datoss ?>>Publico</option>
                                <?php
                                if ($nivelRad == 1)
                                    $datoss = " selected ";
                                else
                                    $datoss = "";
                                ?>
                                <option value=1 <?= $datoss ?>>Confidencial</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <TD class=titulos5 COLSPAN=2 >
                            <center>
                                Si selecciona Confidencial, solo podrá acceder al radicado el dueño del mismo, las personas informadas en el radicado o el usuario que tenga el permiso para ver documentos confidenciales
                            </center>
                        </TD>
                    </tr>
                    <tr class="titulos5">
                        <td align="center">
                            <input type="submit" class="botones" name=grbNivel value="Grabar Nivel">
                        </td>
                        <td align="center">
                            <input name="Cerrar" type="button" class="botones" id="envia22" onClick="opener.regresar();window.close();"value="Cerrar"></center>
                        </td>
                    </tr>
                </table>
                <br>
                <p>
                    <?php
                    //$db->conn->debug = true;
                    if ($grbNivel and $nurad) {
                        if ($nivelRad == 1) {
                            $query = "UPDATE RADICADO SET SGD_SPUB_CODIGO=1 where radi_nume_radi='$nurad'";
                            $observa = "Radicado Confidencial";
                        } else {
                            $query = "UPDATE RADICADO SET SGD_SPUB_CODIGO=0 where radi_nume_radi='$nurad'";
                            $observa = "Radicado Publico.";
                        }
                        if ($db->conn->Execute($query)) {
                            echo "<span class=alarmas>El nivel de seguridad se actualiz&oacute; correctamente.";
                            include_once "$ruta_raiz/include/tx/Historico.php";
                            $codiRegH = "";
                            $Historico = new Historico($db);
                            $codiRegE[0] = $nurad;
                            $radiModi = $Historico->insertarHistorico($codiRegE, $dependencia, $codusuario, $dependencia, $codusuario, $observa, 54);
                        } else {
                            echo "<span class=titulosError> !No se pudo actualizar el nivel de seguridad!";
                        }
                    }
                    ?>
                    <b><?= $mensaje_err ?></b>
                </p>
            </center>
        </form>
    </body>
</html>
