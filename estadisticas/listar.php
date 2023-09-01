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

?>
<a href='listar.php?ano=2007:'>Listar a&ntilde;o 2007</a><br>
<a href='listar.php?ano=2006'>Listar a&ntilde;o 2006</a><br>
<a href='listar.php?ano=2005'>Listar a&ntilde;o 2005</a><br>
<a href='listar.php?ano=2004'>Listar a&ntilde;o 2004</a><br>
<a href='listar.php?ano=2003'>Listar a&ntilde;o 2003</a><br>
<a href='listar.php?ano=2002'>Listar a&ntilde;o 2002</a><br>
<a href='listar.php?ano=2001'>Listar a&ntilde;o 2001</a><br>
<a href='listar.php?ano=2000'>Listar a&ntilde;o 2000</a><br>
<a href='listar.php?ano=1999'>Listar a&ntilde;o 1999</a><br>
<a href='listar.php?ano=1998'>Listar a&ntilde;o 1998</a><br>
<a href='listar.php?ano=1997'>Listar a&ntilde;o 1997</a><br>
<a href='listar.php?ano=1996'>Listar a&ntilde;o 1996</a><br>
<?
if(!$ano) $ano = 2002;
$dir = $dir_raiz. "/bodega/$ano/res";
$directorio=opendir($dir);
echo "<b><center>Resoluciones Historicas que no estan en Orfeo del año :</b><br>$dir<br></center>";
echo "<b>Archivos:</b><br>";
while ($archivo = readdir($directorio))
  echo "<a href='$dir/$archivo'>$archivo</a><br>";
closedir($directorio);
?>
