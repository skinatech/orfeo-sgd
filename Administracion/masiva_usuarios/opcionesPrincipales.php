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
$url_raiz = "../..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];

foreach ($_GET as $key => $valor) ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor;

if (!$menu_ver)
    $menu_ver = 1;

if ($menu_ver_tmp)
    $menu_ver = $menu_ver_tmp;

include "$dir_raiz/config.php";
include_once "$dir_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$dir_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
//$db->conn->debug = true;
?>
<html>
    <head>
        <title>.: Modulo total :.</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#tabs").tabs();
            });
        </script>
    </head>
    <body bgcolor="#FFFFFF" topmargin="0" >
        <?php
        $tipo_documento .= "<input type=hidden name=menu_ver value='$menu_ver'>";
        $hdatos = session_name() . "=" . session_id() . "&leido=$leido&nomcarpeta=$nomcarpeta&tipo_carp=$tipo_carp&carpeta=$carpeta&verrad=$verrad&datoVer=$datoVer&fechah=fechah&menu_ver_tmp=";
        ?>

        <table border=1 align="center" cellpadding="0" cellspacing="0" width="85%" >
            <tr bordercolor="#FFFFFF">
            <div id="titulo" style="margin-left: 100px; width: 85%;" align="center" >Carga e Inactivación de Usuarios de forma masiva</div>
            <br>
            </tr>
            <tr class="titulos3">
                <td>
                    <ul class="tabbernav" style="margin-left: -400px; width: 100%;">
                        <li class='<?= $datos6 ?>'>
                            <a id="opPrincipal" title="CargaUsuarios" href='opcionesPrincipales.php?<?= $hdatos ?>1'>Carga de Usuarios</a>
                        </li>
                        <li class='<?= $datos3 ?>'>
                            <a id="opGeneral" title="InactivarUsuarios" href='opcionesPrincipales.php?<?= $hdatos ?>2'>Inactivación de Usuarios</a>
                        </li>
                    </ul>
                </td>       
            </tr>
            <tr >
                <td border="1" bgcolor="" width="94%" height="100">
                    <?php
                    error_reporting(7);
                    switch ($menu_ver) {
                        case 1:
                            include "cargarUsuarios.php";
                            break;
                        case 2:
                            include "inactivarUsuarios.php";
                            break;
                        default:
                            break;
                    }
                    ?>
                </td>
            </tr>
            <input type=hidden name=menu_ver value='<?= $menu_ver ?>'>
        </table>
    </body>
</html>
