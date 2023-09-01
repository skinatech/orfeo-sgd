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


        /*---------------------------------------------------------+
        |                       MAIN                               |
        +---------------------------------------------------------*/


// Ultima Modificacion Kasandra 2012-10    Agregamos templates documentacion

//error_reporting(E_ALL);
error_reporting(E_ERROR | E_PARSE);

session_start();
if(!isset($_SESSION['krd'])) include "../rec_session.php";

foreach ($_GET as $key => $valor)  ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor;

if (!$ruta_raiz) $ruta_raiz = "..";

set_include_path(".:/usr/share/php:/usr/share/pear");

        /********************************************************
        *           Constantes del archivo                      *
        ********************************************************/

$MSG_NO_CORREO="No hay Correo disponible";

        /********************************************************
        *          Encabezados de librerias estandares          *
        ********************************************************/

include $ruta_raiz.'/config.php' ;   // configuracion general
include 'email.inc.php' ;
include 'connectIMAP.php';           // Conecta a servidor correo

       /********************************************************
        *                   Programa Principal                  *
        ********************************************************/
$folder = $_GET['folder'];
$msgno = $_GET['msgno'];
$numadj = $_GET['numadj'];
$emailInfo = $msg->getEmailInfo($msgno, $folder);
$attachment = $emailInfo['emailAttachments'][$numadj];

$file = fopen('../bodega/tmp/'.$attachment['filename'], 'w');

if(!$file){
     die('Error al crear el archivo ' . $attachment['filename']);
}

fputs($file, imap_base64($attachment['attachment']));
fclose($file);


$file_out = file_get_contents('../bodega/tmp/'. $attachment['filename']);

ob_clean();
ob_start();
header("Content-Description: File Transfer");
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=" . $attachment['filename']);
header("Content-Transfer-Encoding: binary");
header("Expires: 0");
header("Cache-Control: must-revalidate");
header("Pragma: public");
echo $file_out;
ob_flush();

?>
