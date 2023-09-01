<?php
require '../include/fpdf18/fpdf.php';

$de = imap_utf8($header->fromaddress) . " <" . imap_utf8($header->from[0]->personal) . ">";
$de = acentos($de);
$para = imap_utf8($header->toaddress) . " <" . imap_utf8($header->to[0]->personal) . ">";
$para = acentos($para);
$asunto =  imap_utf8($header->subject) ?? imap_utf8($header->Subject);
$asunto = acentos($asunto);
$entidad = $_SESSION['entidad'] ?? '';
$cuerpoMensaje = strip_tags($body);
$cuerpoMensaje = acentos($cuerpoMensaje);
$contact = $contact ?? '';

$tmpNameEmailPdf = $nurad . "." . 'pdf';
$fileRadicadoPdf = "../bodega/$directorio" . $tmpNameEmailPdf;

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);
$pdf->addPage();
$pdf->SetFont('arial', '', 10);
$pdf->Cell(0, 10, 'De: ' . $de, 1);
$pdf->Ln();
$pdf->Cell(0, 10, 'Para: ' . $para, 1);
$pdf->Ln();
$pdf->Cell(0, 10, 'Asunto: ' . $para, 1);
$pdf->Ln();
$pdf->Cell(0, 10, 'Radicado No. ' . $nurad, 1);
$pdf->Ln();
$pdf->Cell(0, 10, 'Entidad: ' . $entidad, 1);
$pdf->Ln();
$pdf->Cell(0, 10, "Consulte su Tramite " . $contact, 1);
$pdf->Ln();
$pdf->MultiCell(0, 10, $cuerpoMensaje, 1);
$pdf->Ln();
$pdf->Output('F', $fileRadicadoPdf);


$routeFile = str_replace('../bodega', '', $fileRadicadoPdf);
$isqlRadicado = "update radicado set RADI_PATH = '$routeFile' where radi_nume_radi = '$nurad'";
$rs = $db->conn->query($isqlRadicado);
// echo "<br> <h4> Imagen de Radicado ---> <a href='$fileRadicadoPdf' target='image'> $fileRadicadoPdf </a></h4>";
if (!$rs) {  //Si actualizo BD correctamente
    echo "Fallo la Actualizacion del Path en radicado < $isqlRadicado >";
}
