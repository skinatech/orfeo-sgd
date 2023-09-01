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
//$url_raiz= dirname( $_SERVER['HTTP_HOST'] );
//$dir_raiz= dirname(__FILE__);
session_start();
error_reporting(7);
$url_raiz = "../..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

$titulo = htmlentities("Cierre de sesión - ORFEO 6", 0, 'UTF-8');
$mensaje = htmlentities("Su sesión ha expirado o ha ingresado en otro equipo por favor cierre su navegador e intente de nuevo", 0, 'UTF-8');
$enlace = (array_key_exists('data', $_GET)) ? "#" : "login.php";
$enlaceEvalucacion = 'https://forms.gle/r7skDCS5m2ZdwE8K7';

$notificacion = (array_key_exists('data', $_GET)) ? htmlentities(base64_decode($_GET['data']), 0, 'UTF-8') : $mensaje;


/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
?>
<html>
    <head>
        <title>.:: SGD Orfeo 6 ::.</title>
        <link rel="shortcut icon" href="<?= $imagenes ?>/orfeolibre.ico">
        <link rel="stylesheet" href="estilos/orfeo.css">
        <link href="estilos/orfeo50/logout.css" rel="stylesheet" type="text/css"/>
        <link href="estilos/orfeo50/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <center>
        <div class="flotante">
            <img border="0" src="estilos/orfeo50/imagenes50/logoEntidad.png" alt='Volver al formulario de inicio de sesion' style="width: 35%;">
            <h3 style="color: ffffff"><?= $notificacion; ?></h3>
            <div id="imgOrfeo">
                <a href="<?=$enlace?>">
                    <img border="0" src="estilos/orfeo50/imagenes50/sgd.png" alt='Volver al formulario de inicio de sesion'></a>
            </div>
        </div>
    </center>
    <?php
    if (!array_key_exists('data', $_GET) && session_id()){
        session_destroy();
    }
    ?>
</body>
</html>
