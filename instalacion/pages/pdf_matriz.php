<?php
include '../fpdf/fpdf.php';
//include '../../config.php';

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

    $this->Image('/var/www/conf-orfeo/instalacion/files/logo_cliente.jpg',20,8,33);
    $fecha= date("Y-m-d");
     $hora=date("H:i:s");
    // Arial bold 15
    $this->Rect(1,1,277,31);
    $this->Rect(1,31,277,1,'DF');
    //Arial bold 15
            $this->SetFont('Arial','B',14);
            //Movernos a la derecha
            $this->Cell(70);
            //Título
            $this->Cell(150,8,utf8_decode('Formato : Tablas de Retención Documental'),0,0,'C');
            $this->Ln(2);
            $this->SetFont('Arial','B',10);
            $this->Cell(36);
            //$this->Cell(150,10,utf8_decode("Sistema de Gestión Documental Orfeo 5"),0,0,'C');
            $this->Cell(36);
            $this->Text(76,18,utf8_decode("Sistema de Gestión Documental Orfeo 5"),0,0,'C');
            $this->Text(76,22,utf8_decode("Fecha : ").$fecha);
            $this->Text(76,26,utf8_decode("Empresa : ").$entidad);
            //$this->Text(76,26,utf8_decode("Empresa : ").$entidad);
            //$this->Text(170,10.5,$hora);
            //$this->SetFont('Arial','',6);

            $this->SetFont('Arial','',7);
            $this->Line(1,32,277,32);

        $this->Text(5,36,'#');
        $this->Text(13,36,utf8_decode("Codigó"));
        $this->Text(27,36,utf8_decode("Dependencia"));
        $this->Text(74,36,utf8_decode("Serie"));
        $this->Text(115,36,utf8_decode("Subserie"));
        $this->Text(162,36,utf8_decode("Tipo Documental"));
        $this->Text(219,36,utf8_decode("AG"));
        $this->Text(226,36,utf8_decode("AC"));
        $this->Text(239,36,utf8_decode("Disposición"));
        $this->Text(259,36,utf8_decode("Soporte"));
        $this->Line(1,38,277,38);
        $this->Line(1,39,277,39);
        //Salto de línea
        $this->Ln(10);
        $this->SetY(45);

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

        parent::__construct('L','mm','Letter');
    }

}

$pdf=new PDF();
    $pdf->SetTopMargin(5.4);
    $pdf->SetLeftMargin(4.5);
    $pdf->AliasNbPages();
    $pdf->SetFont('Times','',7);

/*$cadconex="dbname=$servicio host=$servidor port=$port user=$usuario password=$contrasena";
$conexion = pg_connect($cadconex);*/


$cadbusca = "SELECT m.depe_codi, d.depe_nomb, s.sgd_srd_descrip, su.sgd_sbrd_descrip, t.sgd_tpr_descrip, (CASE WHEN m.sgd_mrd_esta = '1' THEN 'A' ELSE 'I' END) AS estado, su.sgd_sbrd_tiemag, su.sgd_sbrd_tiemac,(CASE WHEN su.sgd_sbrd_dispfin = '1' THEN 'CT' ELSE CASE WHEN su.sgd_sbrd_dispfin = '2' THEN 'E' ELSE CASE WHEN su.sgd_sbrd_dispfin = '3' THEN 'MT' ELSE CASE WHEN su.sgd_sbrd_dispfin  = '4' THEN 'S' ELSE CASE WHEN su.sgd_sbrd_dispfin = '5' THEN 'CT/MT' ELSE CASE WHEN su.sgd_sbrd_dispfin = '6' THEN 'E/MT' ELSE CASE WHEN su.sgd_sbrd_dispfin = '7' THEN 'MT/S' ELSE 'CT' END END END END END END END) AS disposicion, su.sgd_sbrd_soporte, su.SGD_SBRD_PROCEDI FROM SGD_MRD_MATRIRD m, SGD_SRD_SERIESRD s, SGD_SBRD_SUBSERIERD su, SGD_TPR_TPDCUMENTO t, DEPENDENCIA d WHERE m.depe_codi = d.depe_codi AND m.sgd_srd_codigo = s.sgd_srd_codigo AND m.sgd_sbrd_codigo = su.sgd_sbrd_codigo AND m.sgd_tpr_codigo = t.sgd_tpr_codigo AND s.sgd_srd_codigo = su.sgd_srd_codigo AND m.SGD_MRD_ESTA='1' order by m.depe_codi, m.sgd_srd_codigo, m.sgd_sbrd_codigo, m.sgd_tpr_codigo";
           $result=pg_query($cadbusca) or die('La consulta fallo: ' . pg_last_error());

       $j=1;
   $pdf->AddPage();

        while($row = pg_fetch_array($result))
       {
         $codigo_depe = $row["depe_codi"];
         $nombre_depe = utf8_decode($row["depe_nomb"]);
         $descrip_serie = utf8_decode($row["sgd_srd_descrip"]);
         $descrip_subserie = utf8_decode($row["sgd_sbrd_descrip"]);
         $descrip_tipodoc = utf8_decode($row["sgd_tpr_descrip"]);
         $tiempo_ag = $row["sgd_sbrd_tiemag"];
         $tiempo_ac = $row["sgd_sbrd_tiemac"];
         $disposicion = $row["disposicion"];
         $soporte = utf8_decode($row["sgd_sbrd_soporte"]);

         $pdf->Text(5,$pdf->GetY(),($j));
         $pdf->Text(14,$pdf->GetY(),$codigo_depe);
         $pdf->Text(28,$pdf->GetY(),$nombre_depe);
         $pdf->Text(78,$pdf->GetY(),$descrip_serie);
         $pdf->Text(118,$pdf->GetY(),$descrip_subserie);
         $pdf->Text(167,$pdf->GetY(),$descrip_tipodoc);
         $pdf->Text(220,$pdf->GetY(),$tiempo_ag);
         $pdf->Text(227,$pdf->GetY(),$tiempo_ac);
         $pdf->Text(240,$pdf->GetY(),$disposicion);
         $pdf->Text(260,$pdf->GetY(),$soporte);
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
