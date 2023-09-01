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

session_start();
error_reporting(7);
//error_reporting(E_ALL);
$url_raiz="..";
$dir_raiz=$_SESSION['dir_raiz'];
$ESTILOS_PATH2 =$_SESSION['ESTILOS_PATH2'];

// Ultima Modificacion Kasandra 2012-10    Agregamos templates documentacion

if (!isset($_SESSION['krd']))
    include "$dir_raiz/rec_session.php";

foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

set_include_path(".:/usr/share/php:/usr/share/pear");
?>
<html>
    <head>
       	<link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>	
    <body>
        <div class="panelCorreo">
            <ul style="padding-left: 0px;">
                <li class="tit"><h4>Opciones</h4></li>
                <?php
                    /** ******************************************************
                     *          Encabezados de librerias estandares          *
                     * *******************************************************/
                    include "connectIMAP.php";
                    
                    /** ******************************************************
                     *           Constantes del archivo                      *
                     * *******************************************************/

                    $TIT_Recargar_Carpetas = "Recargar <br> Carpetas";

                    /* ******************************************************
                    *                   Programa Principal                  *
                    * *******************************************************/
                    
                    if (isset($folders) && is_array($folders) && count($folders)) {
                        foreach ($folders as $name) {
                ?>
                        <li><a href='emailinbox.php?inboxEmail=<?= $name ?>' target='formulario'><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;<?= $name ?></a></li>
                <?php
                        }
                    } else {
                ?>
                    <li><a href='menu_buzones.php?inboxEmail=<?= $buzon_mail ?? '' ?>'><span class="glyphicon glyphicon-refresh"></span> <? echo $TIT_Recargar_Carpetas ?></a></li>
                    <li><a href='login_email.php?inboxEmail=<?= $buzon_mail ?? '' ?>' target="formulario"><span class="glyphicon glyphicon-inbox"></span> Inbox</a></li>
                <?php
                    }
                ?>
            </ul>
        </div>

    </body>
</html>