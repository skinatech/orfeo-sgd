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
$url_raiz = "../..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

/**
 * Se añadio compatibilidad con variables globales en Off
 * @autor Jairo Losada 2009-05
 * @licencia GNU/GPL V 3
 */
if (!$_SESSION['dependencia'] or ! $_SESSION['tpDepeRad'])
    include "$dir_raiz/rec_session.php";
?>
<html>
    <head>
        <title>Documento sin t&iacute;tulo</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>
    <body>
        <br>
        <br>
        <form name='frmMnuUsuarios' action='../formAdministracion.php' method="post">
            <table width="32%" align="center" border="1" cellpadding="0" cellspacing="5" class="menuEnlaces">
                <div id="titulo" style="width: 32%; margin-left: 34%;" align="center">Administraci&oacute;n de Usuarios</div>
                <tr bordercolor="#FFFFFF">
                    <td align="center" class="listado2" width="98%"><a href='crear.php?usModo=1' class="vinculos" target='mainFrame'>1. Creaci&oacute;n de Usuario</a></td>
                </tr>
                <tr bordercolor="#FFFFFF">
                    <td align="center" class="listado1" width="98%"><a href='cuerpoEdicion.php?usModo=2' class="vinculos" target='mainFrame'>2. Editar Usuario</a></td>
                </tr>
                <tr bordercolor="#FFFFFF">
                    <td align="center" class="listado2" width="98%"><a href='cuerpoConsulta.php' class="vinculos" target='mainFrame'>3. Consultar Usuario</a></td>
                </tr>
                <!--<tr bordercolor="#FFFFFF">
                    <td align="center" class="listado1" width="98%"><a href='../masiva_usuarios/opcionesPrincipales.php' class="vinculos" target='mainFrame'>4. Usuarios Masiva</a></td>
                    <!--<td align="center" class="listado1" width="98%"><a href='../masiva_usuarios/parametrizar.php' class="vinculos" target='mainFrame'>4. Usuarios Masiva</a></td>-->

                <!--</tr>-->
                <tr bordercolor="#FFFFFF">
                    <td align="center" class="listado1">
                <center><input align="middle" class="botones" type="submit" name="Submit" value="Regresar"></center>
                </td> </tr>
            </table>
        </form>
    </body>
</html>