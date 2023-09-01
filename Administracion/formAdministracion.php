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
$menuOrfeoExpress = $_SESSION["menuOrfeoExpress"];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


/**
 * Se añadio compatibilidad con variables globales en Off
 * @autor Jairo Losada 2009-05
 * @licencia GNU/GPL V 3
 */
define('ADODB_ASSOC_CASE', 0);

foreach ($_GET as $k => $v) $k = $v;

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];

if (isset($_GET['carpeta']))
    $nomcarpeta = $_GET["carpeta"];
if (isset($_GET['tipo_carpt']))
    $tipo_carpt = $_GET["tipo_carpt"];
if (isset($_GET['adodb_next_page']))
    $adodb_next_page = $_GET["adodb_next_page"];
if ($_SESSION['usua_admin_sistema'] != 1)
    die(include "$url_raiz/sinacceso.php");

// Esto permite indicar al sistema, si el usuario puede o no acceder a todas las opciones del administrador
// si es true muestra los menus de administración de todo Orfeo
if($menuOrfeoExpress == false){
    $leidoClass = 'listado2';
    $leidoClass4Fila = 'listado1';
}else{
    $leidoClass = 'listado1';
    $leidoClass4Fila = 'listado2';
}

?>
<html>
    <head>
        <title>Documento  sin t&iacute;tulo</title>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION["ESTILOS_PATH_ORFEO"] ?>">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <br>
        <br>
        <table width="45%" align="center" border="1" cellpadding="0" cellspacing="5" class="menuEnlaces">
            <div id="titulo" style="width: 45%; margin-left: 27.5%" align="center" >M&oacute;dulos Principales</div>
            <tr bordercolor="#FFFFFF">
                <td align="center" class="listado1" width="48%">
                    <a href="tbasicas/adm_dependencias.php" class="vinculos" target="mainFrame">Dependencias</a>
                </td>
                <td align="center" class="listado1" width="48%">
                    <a href='roles/opcionesPermisos.php' target='mainFrame' class="vinculos">Roles y permisos</a>
                </td>
            </tr>
            <tr bordercolor="#FFFFFF">    
                <td align="center" class="listado2" width="48%">
                    <a href='usuario/mnuUsuarios.php?krd=<?= $krd ?>' target='mainFrame' class="vinculos">Usuarios</a>
                </td>
                <td align="center" class="listado2" width="48%"> 
                    <a  href="tbasicas/adm_nohabiles.php" class="vinculos" target='mainFrame'>D&iacute;as no h&aacute;biles</a>
                </td>    
            </tr>
            <?php
            if($menuOrfeoExpress == false){
                ?>
                <tr bordercolor="#FFFFFF" >
                    <td align="center" class="listado1" width="48%">
                        <a href="tbasicas/adm_fenvios.php" class="vinculos" target='mainFrame' disabled='true'>Env&iacute;o de correspondencia</a> 
                    </td>
                    <td align="center" class="listado1" width="48%">
                        <a href="tbasicas/adm_tsencillas.php" class="vinculos" target='mainFrame'>Tablas sencillas</a>
                    </td>
                </tr>
                <?php
                }
            ?>
            <tr bordercolor="#FFFFFF">
                <td align="center" class="<?=$leidoClass?>" width="48%">
                    <a href="tbasicas/adm_trad.php?krd=<?= $krd ?>" class="vinculos" target='mainFrame'>Tipos de radicaci&oacute;n</a>
                </td>
                <?php
                if($menuOrfeoExpress == false){
                    ?>
                    <td align="center" class="<?=$leidoClass?>" width="48%">
                        <a href="tbasicas/adm_esp.php?krd=<?= $krd ?>" class="vinculos" target='mainFrame'>Terceros </a>
                    </td>
                    <?php
                }else{
                    ?>
                    <td align="center" class="<?=$leidoClass?>" width="48%">
                        <a href="tbasicas/adm_tarifas.php" class="vinculos" target='mainFrame'>Tarifas</a>
                    </td>
                    <?php
                }
                ?>
            </tr>
            <tr bordercolor="#FFFFFF">                
                <td align="center" class="<?=$leidoClass4Fila?>" width="48%">
                    <a href="tbasicas/adm_paises.php" class="vinculos" target='mainFrame'>Pa&iacute;ses</a>
                </td>
                <td align="center" class="<?=$leidoClass4Fila?>" width="48%">
                    <a href="tbasicas/adm_dptos.php" class="vinculos" target='mainFrame'>Departamentos</a>
                </td>
            </tr>
            <tr bordercolor="#FFFFFF">                
                <td align="center" class="<?=$leidoClass?>" width="48%">
                    <a href="tbasicas/adm_mcpios.php" class="vinculos" target='mainFrame'>Municipios</a>
                </td>  
                <td align="center" class="<?=$leidoClass?>" width="48%">
                    <a href="tbasicas/adm_contactos.php" class="vinculos" target='mainFrame'>Contactos</a>
                </td>
            </tr>
            <?php
            if($menuOrfeoExpress == false){
                ?>
                <tr bordercolor="#FFFFFF" >                 
                    <td align="center" class="listado1" width="48%">
                        <a href="tbasicas/adm_esp.php?krd=<?= $krd ?>" class="vinculos" target='mainFrame'>Terceros </a>
                    </td>
                    <td align="center" class="listado1" width="48%">
                        <a href="configuracion/contrasenia.php" class="vinculos" target='mainFrame'>Configuración Contraseña </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
