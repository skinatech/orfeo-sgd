<?php
use Dompdf\Dompdf;
require_once '../include/dompdf/autoload.inc.php';
$dompdf = new Dompdf();
$dompdf->loadHtml($archivoRadicado);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
file_put_contents( "../bodega/$directorio" . $nurad . ".pdf", $dompdf->output());
?>