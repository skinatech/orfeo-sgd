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
            $this->Cell(150,8,'Formato : Tipos documentales',0,0,'C');
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

        $this->Text(12,36,'Cons');
        $this->Text(22,36,utf8_decode("Codigo tipo"));
        $this->Text(40,36,utf8_decode("Descripción"));
        $this->Text(120,36,utf8_decode("Días termino"));
        $this->Text(140,36,utf8_decode("Radica salida"));
        $this->Text(160,36,utf8_decode("Radica entrada"));
        $this->Text(180,36,utf8_decode("Radica web"));
        $this->Text(200,36,utf8_decode("Estado"));
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

/*$cadconex="dbname=$servicio host=$servidor port=$port user=$usuario password=$contrasena";
$conexion = pg_connect($cadconex);*/


$cadbusca = "SELECT sgd_tpr_codigo, sgd_tpr_descrip, sgd_tpr_termino,
CASE WHEN sgd_tpr_tp1 = 1 THEN 'SI' WHEN sgd_tpr_tp1 = 0 THEN 'NO' END AS sgd_tpr_tp1,
CASE WHEN sgd_tpr_tp2 = 1 THEN 'SI' WHEN sgd_tpr_tp2 = 0 THEN 'NO' END AS sgd_tpr_tp2,
CASE WHEN sgd_tpr_web=1 THEN 'SI' WHEN sgd_tpr_web=0 THEN 'NO' END AS sgd_tpr_web,
CASE WHEN sgd_tpr_estado=1 THEN 'ACTIVO' WHEN sgd_tpr_estado=0 THEN 'INACTIVO' END AS sgd_tpr_estado FROM sgd_tpr_tpdcumento
";
           $result=pg_query($cadbusca) or die('La consulta fallo: ' . pg_last_error());

       $j=1;
   $pdf->AddPage();

        while($row = pg_fetch_array($result))
       {
         $codigo_tipodocu = $row["sgd_tpr_codigo"];
         $descri_tipodocu = utf8_decode($row["sgd_tpr_descrip"]);
         $termin_tipodocu = $row["sgd_tpr_termino"];
         $tp1____tipodocu = $row["sgd_tpr_tp1"];
         $tp2____tipodocu = $row["sgd_tpr_tp2"];
         $web____tipodocu = $row["sgd_tpr_web"];
         $estado_tipodocu = $row["sgd_tpr_estado"];

         $pdf->Text(12,$pdf->GetY(),($j));
         $pdf->Text(22,$pdf->GetY(),$codigo_tipodocu);
         $pdf->Text(40,$pdf->GetY(),$descri_tipodocu);
         $pdf->Text(120,$pdf->GetY(),$termin_tipodocu);
         $pdf->Text(140,$pdf->GetY(),$tp1____tipodocu);
         $pdf->Text(160,$pdf->GetY(),$tp2____tipodocu);
         $pdf->Text(180,$pdf->GetY(),$web____tipodocu);
         $pdf->Text(200,$pdf->GetY(),$estado_tipodocu);

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
          $pdf->Text(15,$pdf->GetY(),'Consultor:');
          $pdf->Text(145,$pdf->GetY(),'Consultor:');
          $pdf->Ln(5);
          $pdf->Text(15,$pdf->GetY(),'Cargo:');
          $pdf->Text(145,$pdf->GetY(),'Cargo:');
          $pdf->Ln(5);

          $pdf->cell(0,5,'',0,1);
          //$pdf->Text(100,$pdf->GetY(),'________________________');
          //$pdf->Text(145,$pdf->GetY(),'________________________');
   $pdf->Output();
 ?>
