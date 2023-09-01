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
error_reporting(7);
$url_raiz="..";
$dir_raiz=$_SESSION['dir_raiz'];
$ESTILOS_PATH2 =$_SESSION['ESTILOS_PATH2'];

        /*---------------------------------------------------------+
        |                       MAIN                               |
        +---------------------------------------------------------*/

/*
 * Lista Subseries documentales
 * @autor Jairo Losada
 * @fecha 2009/06 Modificacion Variables Globales.
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;
$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$usua_perm_trd = $_SESSION["usua_perm_trd"];

require_once("$dir_raiz/include/db/ConnectionHandler.php");
//Si no llega la dependencia recupera la sesi�n
if (!$_SESSION['dependencia']) {
    include "$dir_raiz/rec_session.php";
}
if (!$db)
    $db = new ConnectionHandler($dir_raiz);

$phpsession = session_name() . "=" . session_id();
?>
<html>
    <head>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>
    <body bgcolor="#FFFFFF" topmargin="0" onLoad="window_onload();">
        <br>
    <center>
        <div id="titulo" style="width: 47%;" align="center">Administraci&oacute;n - Tablas de retenci&oacute;n documental -</div>
        <table width="47%" align="center" border="2" cellpadding="0" cellspacing="5" class="borde_tab">
            <?php
            if ($usua_perm_trd == 2) {
                ?>
                <tr align="center"> 
                    <td class="listado1" >
                        <a href='../trd/admin_tipodoc.php?<?= $phpsession ?>&krd=<?= $krd ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah"; ?>' class="vinculos" target='mainFrame'>Tipos 
                            documentales </a>
                    </td>
                </tr>
                <tr align="center"> 
                    <td class="listado2" > 
                        <a href='../trd/admin_series.php?<?= $phpsession ?>&krd=<?= $krd ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah"; ?>' class="vinculos" target='mainFrame'>Series </a>
                    </td>
                </tr>
                <tr align="center"> 
                    <td class="listado1" > 
                        <a href='../trd/admin_subseries.php?<?= $phpsession ?>&krd=<?= $krd ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah"; ?>' class="vinculos" target='mainFrame'>Subseries </a>
                    </td>
                </tr>
                <tr align="center"> 
                    <td class="listado2" > 
                        <a href='../trd/cuerpoMatriTRD.php?<?= $phpsession ?>&krd=<?= $krd ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah"; ?>' class="vinculos" target='mainFrame'>Matriz 
                            relaci&oacute;n </a>
                    </td>
                </tr>
                <tr align="center"> 
                    <td class="listado1" >
                        <a href='../trd/procModTrdArea.php?<?= $phpsession ?>&krd=<?= $krd ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah"; ?>' class="vinculos" target='mainFrame'>Asignaci&oacute;n 
                            TRD &Aacute;rea </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr align="center"> 
                <td class="listado2" >
                    <a href='../trd/informe_trd.php?<?= $phpsession ?>&krd=<?= $krd ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah"; ?>' class="vinculos" target='mainFrame'>Listado 
                        tablas de retenci&oacute;n documental </a>
                </td>
            </tr>  
            </tr>
        </table>
    </center>
</body>
</html>
