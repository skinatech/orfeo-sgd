<?php

include '../fpdf/fpdf.php';
$ambiente = 'pruebas';
$ruta_raiz = "..";

//error_log ('***** '.$_SERVER['DOCUMENT_ROOT'] . '/' . $ambiente . "/config.php");
include $_SERVER['DOCUMENT_ROOT'] . '/' . $ambiente . "/config.php";

//error_log(' ------- '.$driver);

include_once $_SERVER['DOCUMENT_ROOT'] . '/' . $ambiente . "/include/db/ConnectionHandler.php";

//error_log(' ------- '.$_SERVER['DOCUMENT_ROOT'] . '/' . $ambiente . "/include/db/ConnectionHandler.php");

//if ($driver != '') {
//    $db = new ConnectionHandler("$ruta_raiz");
//}

//define('ADODB_ASSOC_CASE', 1);

$rutaCompleta = $_SERVER['DOCUMENT_ROOT'] . '/' . $ambiente;

class PDF extends FPDF {

// Cabecera de página
    function Header() {
        // Logo
        global $entidad;

        $this->Image($rutaCompleta . '/instalacion/files/logo_cliente.jpg', 10, 8, 33);
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        // Arial bold 15
        $this->Rect(1, 1, 213, 31);
        $this->Rect(1, 31, 213, 1, 'DF');
        //Arial bold 15
        $this->SetFont('Arial', 'B', 14);
        //Movernos a la derecha
        $this->Cell(30);
        //Título
        $this->Cell(150, 8, 'Formato : Tipos de Radicado', 0, 0, 'C');
        $this->Ln(2);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(36);
        //$this->Cell(150,10,utf8_decode("Sistema de Gestión Documenital Orfeo 5"),0,0,'C');
        $this->Cell(36);
        $this->Text(76, 18, utf8_decode("Sistema de Gestión Documental Orfeo 5"), 0, 0, 'C');
        $this->Text(76, 22, utf8_decode("Fecha : ") . $fecha);
        $this->Text(76, 26, utf8_decode("Empresa : ") . $entidad);
        //$this->Text(76,26,utf8_decode("Empresa : ").$entidad);
        //$this->Text(170,10.5,$hora);
        //$this->SetFont('Arial','',6);

        $this->SetFont('Arial', '', 7);
        $this->Line(1, 32, 214, 32);

        $this->Text(12, 36, '#');
        $this->Text(22, 36, utf8_decode("Tipo Radicado"));
        $this->Text(40, 36, utf8_decode("Descripción"));
        $this->Text(80, 36, utf8_decode("Días bloqueo"));
        $this->Text(120, 36, utf8_decode("Radicado salida"));
        $this->Line(1, 38, 214, 38);
        $this->Line(1, 39, 214, 39);
        //Salto de línea
        $this->Ln(10);
        $this->SetY(45);



        /*
          $this->SetFont('Arial','B',15);
          // Movernos a la derecha
          $this->Cell(50);
          // Título
          $this->Cell(100,10,'Formato: Tipos de Radicado',0,0,'C');
          $this->Ln(1);
          $this->Cell(229,22,utf8_decode("Sistema de Gestión Documental Orfeo 5"),0,0,'C');
          $this->Ln(1);
          $this->Cell(149,32,utf8_decode("Fecha : "),0,0,'C');
          $this->Cell(-104,32,date('d/m/Y'),0,1,'C');
          $this->Ln(1);
          $this->Line(10,33,190,33);
          $this->Ln(1);
          $this->Cell(1);
          $this->SetFont('Arial','',12);
          $this->Cell(20,-10,utf8_decode("Empresa :"),1,0,'C'); */
// Salto de línea
    }

// Pie de página
    function Footer() {
        //Posición: a 1,5 cm del final

        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 7);
        //Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->Cell(-210, 0, utf8_decode("Cr 64 # 96 -17 Bogotá - Colombia +57 (1) 2262080"), 0, 0, C);
        $this->Cell(50, 0, utf8_decode("Expert Tech Consulting"), 0, 0, C);

        $this->Line(1, 260, 214, 260);
        $this->Image($rutaCompleta . '/instalacion/files/logo_cliente.jpg', 175, 262, 33);
        $this->Line(1, 273, 214, 273);
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");

        $this->Text(148, 270.5, $this->f_ini);
        $this->Text(180, 270.5, $this->f_fin);
    }

    function __construct() {
        //Llama al constructor de su clase Padre.
        //Modificar aka segun la forma del papel del reporte

        parent::__construct('P', 'mm', 'Letter');
    }

}

$pdf = new PDF();
$pdf->SetTopMargin(5.4);
$pdf->SetLeftMargin(4.5);
$pdf->AliasNbPages();
$pdf->SetFont('Times', '', 7);

$cadconex = "dbname=$servicio host=$servidor port=$port user=$usuario password=$contrasena";
$conexion = pg_connect($cadconex);


$cadbusca = "SELECT sgd_trad_codigo, sgd_trad_descr, sgd_trad_diasbloqueo,  CASE WHEN sgd_trad_genradsal=0 THEN 'NO' when sgd_trad_genradsal=1 THEN 'SI' END AS sgd_trad_genradsal FROM sgd_trad_tiporad";
$result = pg_query($cadbusca) or die('La consulta fallo: ' . pg_last_error());

echo '******** '.$cadbusca;

$j = 1;
$pdf->AddPage();

while ($row = pg_fetch_array($result)) {
    $trad_codigo = $row["sgd_trad_codigo"];
    $trad_descri = utf8_decode($row["sgd_trad_descr"]);
    //$apellidos = $row[utf8_decode("sgd_trad_descr")];
    $trad_diasbl = $row["sgd_trad_diasbloqueo"];
    $trad_gensal = $row["sgd_trad_genradsal"];

    $pdf->Text(12, $pdf->GetY(), ($j));
    $pdf->Text(22, $pdf->GetY(), $trad_codigo);
    $pdf->Text(40, $pdf->GetY(), $trad_descri);
    $pdf->Text(80, $pdf->GetY(), $trad_diasbl);
    $pdf->Text(120, $pdf->GetY(), $trad_gensal);
    $pdf->cell(0, 5.5, '', 0, 1);
    $j = $j + 1;
}
$pdf->cell(0, 8, '', 0, 1);
$pdf->Ln(5);
$pdf->Text(15, $pdf->GetY(), '_________________________________________');
$pdf->Text(145, $pdf->GetY(), '_________________________________________');
$pdf->Ln(5);
$pdf->Text(15, $pdf->GetY(), 'Firma Empresa');
$pdf->Text(145, $pdf->GetY(), 'Firma Skina Technologies');
$pdf->Ln(5);
$pdf->Text(15, $pdf->GetY(), 'Responsable:');
$pdf->Text(145, $pdf->GetY(), 'Responsble:');
$pdf->Ln(5);
$pdf->Text(15, $pdf->GetY(), 'Cargo:');
$pdf->Text(145, $pdf->GetY(), 'Cargo:');
$pdf->Ln(5);

$pdf->cell(0, 5, '', 0, 1);
//$pdf->Text(100,$pdf->GetY(),'________________________');
//$pdf->Text(145,$pdf->GetY(),'________________________');
//$pdf->Output('D','OrfeoTipoRadicado.pdf');
$pdf->Output();
?>
