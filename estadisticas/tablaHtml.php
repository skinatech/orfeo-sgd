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
$assoc = $_SESSION['assoc'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


require_once($dir_raiz . "/include/myPaginador.inc.php");
//$db->conn->debug = true;

$paginador = new myPaginador($db, ($queryE), $orden);
$paginador->moreLinks = "$tipoEstadistica=$tipoEstadistica&";

if (!isset($_GET['genDetalle'])) {
    $orden = isset($orden) ? $orden : "";
    $paginador->setFuncionFilas("pintarEstadistica");
} else {
    $paginador->setFuncionFilas("pintarEstadisticaDetalle");
}
$paginador->setImagenASC($dir_raiz . "iconos/flechaasc.gif");
$paginador->setImagenDESC($dir_raiz . "iconos/flechadesc.gif");
//$paginador->setPie($pie);
echo $paginador->generarPagina($titulos, "titulos3");
if (!isset($_GET['genDetalle']) && $paginador->getTotal() > 0) {
    $total = $paginador->getId() . "_total";
    if (!isset($_REQUEST[$total])) {
        $res = $db->query($queryE);
        $datos = 0;
        while (!$res->EOF) {
            $data1y[] = $res->fields[1];
            $nombUs[] = $res->fields[0];
            $res->MoveNext();
        }
        $nombYAxis = substr($titulos[1], strpos($titulos[1], "#") + 1);
        $nombXAxis = substr($titulos[2], strpos($titulos[2], "#") + 1);
        $nombreGraficaTmp = "../bodega/tmp/E_$krd.png";
        $rutaImagen = $nombreGraficaTmp;
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        }
        $notaSubtitulo = $subtituloE[$tipoEstadistica] . "\n";
        $tituloGraph = $tituloE[$tipoEstadistica];
    }
}
?>
</center>
</body>
</html>
