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
session_cache_limiter();
session_start();
error_reporting(7);
$url_raiz = $_SESSION['url_raiz'];
$dir_raiz = $_SESSION['dir_raiz'];

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
//
//
//session_start();
/**
 * Modificacion Variables Globales Infometrika 2009-05
 * Licencia GNU/GPL 
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

$imagenes = $_SESSION["imagenes"];

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tpNumRad = $_SESSION["tpNumRad"];
$tpPerRad = $_SESSION["tpPerRad"];
$tpDescRad = $_SESSION["tpDescRad"];
$menuOrfeoExpress = $_SESSION["menuOrfeoExpress"];

if (isset($usunom))
    $where = " USUA_LOGIN='$usunom'";
else
    $where = "";
$tpDepeRad = $_SESSION["tpDepeRad"];
$ruta_raiz = ".";
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "include/db/ConnectionHandler.php";
if (isset($_SESSION['tipoMedio']))
    $tipoMed = $_SESSION['tipoMedio'];
else
    $tipoMed = "";

if (!defined('ADODB_ASSOC_CASE'))
    define('ADODB_ASSOC_CASE', 0);

$db = new ConnectionHandler("$ruta_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
//session_cache_limiter('public');

$fechah = date("dmy") . "_" . time();
?>

<table border="0" cellpadding="0" cellspacing="0" width="160">

    <tr>
        <th colspan="2"><img name="menu_r3_c1" src="<?= $imagenes ?>/menu_r3_c1.gif" height="31" border="0" alt="MENU RADICACIÓN"></th>
    </tr>
    <tr>
        
        <td valign="top"><table width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="c0ccca">
                <tr>
                    <td valign="top"><table width="150"  border="0" cellpadding="0" cellspacing="3" bgcolor="#C0CCCA">
                            <?php
                            $i = 0;
                            foreach ($_SESSION["tpNumRad"]as $key => $valueTp) {
                                $valueImg = "";
                                $valueDesc = $tpDescRad[$key];
                                $valueImg = $tpImgRad[$key];

                                /** 
                                 * $unificacionRadicados == true y $tipoRadicadoPqr = 2
                                 * quiere decir que PQRS y Entrada van a ser un solo tipo de radicado, siempre y cuando 
                                 * $valueTp sea 2=entrada o 4=Pqrs
                                **/
                                if($unificacionRadicados && ($valueTp == 2 or $valueTp == 4)){
                                    $valueTp = $tipoRadicadoPqr;
                                }

                                $encabezado = "$phpsession&krd=$krd&fechah=$fechah&primera=1&ent=$valueTp&depende=$dependencia";
                                if ($tpPerRad[$valueTp] == 1 or $tpPerRad[$valueTp] == 3) {
                                    ?>
                                    <tr valign="middle">
                                        <!--By Skina -Ing Camilo Pintor Nov-12-2013 Se comenta para dar accesibilidad en el movimiento entre aplicaciones con el tab inci -->
                                        <td width="125"><a onclick="cambioMenu(<?= $i ?>);" href="radicacion/NEW.php?<?= session_name() . "=" . trim(session_id()) ?>&dependencia=<?= $dependencia ?>&faxPath=<?= $faxPath ?>&ent=<?= $valueTp ?>" alt='M&oacute;dulo de radicaci&oacute;n de <?= $valueDesc ?>' aria-label='M&oacute;dulo de radicaci&oacute;n de <?= $valueDesc ?>' title='M&oacute;dulo de radicaci&oacute;n de <?= $valueDesc ?>'  target='mainFrame' class="menu_princ menu2"><?= $valueDesc ?></a></td>
                                    </tr>
                                    <?php
                                }
                                $i++;
                            }
                            // Permiso para realizar pre-radicados
                            if ($_SESSION["preRadica"] == 1 &&  $_SESSION["tpPerRad"][2] == 3) {
                            ?>
                            <tr valign="middle">
                                <td width="125"><a onclick="cambioMenu(<?= $i ?>);" href="radicacion/pre_radicacion.php?<?= session_name() . "=" . trim(session_id()) ?>&dependencia=<?= $dependencia ?>&faxPath=<?= $faxPath ?>&ent=<?= $valueTp ?>" alt='M&oacute;dulo de radicaci&oacute;n de <?= $valueDesc ?>' aria-label='M&oacute;dulo de radicaci&oacute;n de <?= $valueDesc ?>' title='M&oacute;dulo de radicaci&oacute;n de <?= $valueDesc ?>'  target='mainFrame' class="menu_princ menu2">Pre-radicaci&oacute;n</a></td>
                            </tr>
                            <?php
                            }
                            // Realiza Link a pagina de combianciï¿½ de correspondencia masiva
                            if ($_SESSION["usua_masiva"] == 1) {
                                ?>

                                <tr valign="middle">
                                    <!--By Skina -Ing Camilo Pintor Nov-12-2013 Se comenta para dar accesibilidad en el movimiento entre aplicaciones con el tab inci -->
                                            <!--<td width="25"><img src="<?= $imagenes ?>/menu.gif" height="18"></td>-->
                                    <td width="125"><a  onclick="cambioMenu(<?= $i ?>);" href='radsalida/masiva/menu_masiva.php?<?= $phpsession ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah"; ?>'  target='mainFrame' class="menu_princ menu2" title="M&oacute;dulo de radicaci&oacute;n masiva" aria-label="M&oacute;dulo de radicaci&oacute;n masiva" alt="M&oacute;dulo de radicaci&oacute;n masiva">Masiva</a></td>
                                </tr>
                                <?php
                            }
                            $i++;
                            if ($_SESSION["perm_radi"] >= 1) {
                                ?>
                                <tr valign="middle">
                                    <td width="125">
                                        <a onclick="cambioMenu(<?= $i ?>);" href='uploadFiles/uploadFileRadicado.php?<?= $phpsession ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah&usr=".md5($dep)."&primera=1&ent=2&depende=$dependencia"; ?>' alt='Asociar imagen de radicado' title="Asociar imagen de radicado" aria-label='Asociar imagen de radicado' target='mainFrame' class="menu_princ menu2">Asociar Imagen Radicado</a>
                                    </td>
                                </tr>
                                <tr valign="middle">
                                    <td width="125">
                                        <a onclick="cambioMenu(<?= $i ?>);" href='uploadFiles/formUploadAnexo.php?<?= $phpsession ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah&usr=".md5($dep)."&primera=1&ent=2&depende=$dependencia"; ?>' alt='Asociar Anexo Radicado' title="Asociar imagen de radicado" aria-label='Asociar Anexo Radicado' target='mainFrame' class="menu_princ menu2">Asociar Anexo Radicado</a>
                                    </td>
                                </tr>
                                <tr valign="middle">
                                    <td width="125">
                                        <a  onclick="cambioMenu(<?= $i ?>);" href='radicacion/paramListaImpresos.php?<?= $phpsession ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah&usr=".md5($dep)."&primera=1&ent=2&depende=$dependencia"; ?>' alt="Generar planilla de distribuci&oacute;n y entrega de radicados generados" title="Generar planilla de distribuci&oacute;n y entrega de radicados entregados" aria-label="Generar planilla de distribuci&oacute;n y entrega de radicados entregados" target='mainFrame' class="menu_princ menu2">Planilla Radicados</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            $i++;
                            ?>
                            <tr valign="middle">
                                <td width="125">
                                    <a  onclick="cambioMenu(<?= $i ?>);" href='tx/paramListaImpresos.php?<?= $phpsession ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah&usr=".md5($dep)."&primera=1&ent=2&depende=$dependencia"; ?>' title="Genera planilla de distribuci&oacute;n y entrega de radicados reasignados" alt='Generar planilla de distribuci&oacute;n y entrega de radicados reasignados'  aria-label='Generar planilla de distribuci&oacute;n y entrega de radicados reasignados' target='mainFrame' class="menu_princ menu2">Planilla Reasignados</a>
                                </td>
                            </tr>
                            <?php
                            //}
                            if ($_SESSION["usuaPermRadEmail"] == 1 && $menuOrfeoExpress == false) {
                                ?>
                                <tr valign="middle">
                                    <td width="125"><a  onclick="cambioMenu(<?= $i ?>);" href='email/index.php?<?= $phpsession ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah&usr=".md5($dep)."&primera=1&ent=2&depende=$dependencia"; ?>' alt='M&oacute;dulo de radicaci&oacute;n email' title="M&oacute;dulo de radicaci&oacute;n email" target='mainFrame' aria-label="M&oacute;dulo de radicaci&oacute;n email" class="menu_princ menu2">Radicaci&oacute;n e-mail</a></td>
                                </tr>
                                <?php
                            }

                            if (($_SESSION["dependencia"] == 340 || $_SESSION["dependencia"] == 998) && $_SESSION["usua_perm_agrcontacto"] == 1) {
                                ?>
                                <tr valign="middle">
                                    <!--By Skina -Ing Camilo Pintor Nov-12-2013 Se comenta para dar accesibilidad en el movimiento entre aplicaciones con el tab inci -->
                                    <td width="125"><a  onclick="cambioMenu(<?= $i ?>);" href='Administracion/tbasicas/adm_esp.php?krd=<?= $krd ?>' alt='M&oacute;dulo de administraci&oacute;n terceros' title="M&oacute;dulo de administraci&oacute;n terceros" target='mainFrame' aria-label="M&oacute;dulo de administraci&oacute;n terceros" class="menu_princ menu2">Adm. Terceros</a></td>
                                </tr>

                                <?php
                            }
                            ?>
                        </table></td>
                </tr>
            </table></td>
    </tr>
</table>
