<?php
include '../fpdf/fpdf.php';
//include '../db/config.php';
$ruta_raiz = "../..";
include "$ruta_raiz/config.php";
include_once "$ruta_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$ruta_raiz");
define('ADODB_ASSOC_CASE', 1);

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    global $entidad;

    $this->Image('/var/www/conf-orfeo/instalacion/files/logo_cliente.jpg',10,8,33);
    $fecha= date("Y-m-d");
     $hora=date("H:i:s");
    // Arial bold 15
    $this->Rect(1,1,213,31);
    $this->Rect(1,31,213,1,'DF');
    //Arial bold 15
            $this->SetFont('Arial','B',14);
            //Movernos a la derecha
            $this->Cell(30);
            //Título
            $this->Cell(150,8,'Formato : Series',0,0,'C');
            $this->Ln(2);
            $this->SetFont('Arial','B',10);
            $this->Cell(36);
            //$this->Cell(150,10,utf8_decode("Sistema de Gestión Documental Orfeo 5"),0,0,'C');
            $this->Cell(36);
            $this->Text(76,18,utf8_decode("Sistema de Gestión Documental Orfeo 5"),0,0,'C');
            $this->Text(76,22,utf8_decode("Fecha : ").$fecha);
            $this->Text(76,26,utf8_decode("Empresa : ").$entidad);
            //$this->Text(170,10.5,$hora);
            //$this->SetFont('Arial','',6);

            $this->SetFont('Arial','',7);
            $this->Line(1,32,214,32);

        $this->Text(12,36,'#');
        $this->Text(22,36,utf8_decode("Codigo"));
        $this->Text(40,36,utf8_decode("Descripción"));
        $this->Text(100,36,utf8_decode("Fecha inicio"));
        $this->Text(140,36,utf8_decode("Fecha final"));
        $this->Line(1,38,214,38);
        $this->Line(1,39,214,39);
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
    $this->Cell(20,-10,utf8_decode("Empresa :"),1,0,'C');*/
// Salto de línea
}

// Pie de página
function Footer()
{
  //Posición: a 1,5 cm del final

      $this->SetY(-15);
      //Arial italic 8
      $this->SetFont('Arial','I',7);
      //Número de página
      $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
      $this->Cell(-210,0,utf8_decode("Cr 64 # 96 -17 Bogotá - Colombia +57 (1) 2262080"),0,0,C);
      $this->Cell(50,0,utf8_decode("Expert Tech Consulting"),0,0,C);

    $this->Line(1,260,214,260);
    $this->Image('/var/www/conf-orfeo/instalacion/files/logo_cliente.jpg',175,262,33);
    $this->Line(1,273,214,273);
    $fecha= date("Y-m-d");
     $hora=date("H:i:s");

      $this->Text(148,270.5,$this->f_ini);
      $this->Text(180,270.5,$this->f_fin);
}

function __construct()
    {
        //Llama al constructor de su clase Padre.
        //Modificar aka segun la forma del papel del reporte

        parent::__construct('P','mm','Letter');
    }

}

$pdf=new PDF();
    $pdf->SetTopMargin(5.4);
    $pdf->SetLeftMargin(4.5);
    $pdf->AliasNbPages();
    $pdf->SetFont('Times','',7);

$cadconex="dbname=$servicio host=$servidor port=$port user=$usuario password=$contrasena";
$conexion = pg_connect($cadconex);


$cadbusca = "SELECT sgd_srd_codigo, sgd_srd_descrip, sgd_srd_fechini, sgd_srd_fechfin FROM sgd_srd_seriesrd;
";
           $result=pg_query($cadbusca) or die('La consulta fallo: ' . pg_last_error());

       $j=1;
   $pdf->AddPage();

        while($row = pg_fetch_array($result))
       {
         $codigo_serie = $row["sgd_srd_codigo"];
         $descri_serie = utf8_decode($row["sgd_srd_descrip"]);
         $fechin_serie = $row["sgd_srd_fechini"];
         $fechfi_serie = $row["sgd_srd_fechfin"];

         $pdf->Text(12,$pdf->GetY(),($j));
         $pdf->Text(22,$pdf->GetY(),$codigo_serie);
         $pdf->Text(40,$pdf->GetY(),$descri_serie);
         $pdf->Text(100,$pdf->GetY(),$fechin_serie);
         $pdf->Text(140,$pdf->GetY(),$fechfi_serie);
         $pdf->cell(0,5.5,'',0,1);
         $j=$j+1;
       }
          $pdf->cell(0,8,'',0,1);
          $pdf->Ln(5);
          $pdf->Text(15,$pdf->GetY(),'_________________________________________');
          $pdf->Text(145,$pdf->GetY(),'_________________________________________');
          $pdf->Ln(5);
          $pdf->Text(15,$pdf->GetY(),'Firma Empresa');
          $pdf->Text(145,$pdf->GetY(),'Firma Skina Technologies');
          $pdf->Ln(5);
          $pdf->Text(15,$pdf->GetY(),'Responsable:');
          $pdf->Text(145,$pdf->GetY(),'Responsable:');
          $pdf->Ln(5);
          $pdf->Text(15,$pdf->GetY(),'Cargo:');
          $pdf->Text(145,$pdf->GetY(),'Cargo:');
          $pdf->Ln(5);

          $pdf->cell(0,5,'',0,1);
          //$pdf->Text(100,$pdf->GetY(),'________________________');
          //$pdf->Text(145,$pdf->GetY(),'________________________');
   $pdf->Output();
 ?>
