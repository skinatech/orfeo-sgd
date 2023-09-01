<?
require_once('../include/fpdf18/fpdf.php');
require('../include/fpdf18/htmlparser.inc');


function hex2dec($couleur = "#000000"){
    $R = substr($couleur, 1, 2);
    $rouge = hexdec($R);
    $V = substr($couleur, 3, 2);
    $vert = hexdec($V);
    $B = substr($couleur, 5, 2);
    $bleu = hexdec($B);
    $tbl_couleur = array();
    $tbl_couleur['R']=$rouge;
    $tbl_couleur['V']=$vert;
    $tbl_couleur['B']=$bleu;
    return $tbl_couleur;
}

//conversion pixel -> millimeter at 72 dpi
function px2mm($px){
    return $px*25.4/72;
}

function txtentities($html){
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}

class PDF extends FPDF
{

	/*var $B;
	var $I;
	var $U;
	var $HREF;*/

	function __construct($orientation='P', $unit='mm', $format='A4')
	{
	    //Call parent constructor
	    parent::__construct($orientation,$unit,$format);

	    //Initialization
	    $this->B=0;
	    $this->I=0;
	    $this->U=0;
	    $this->HREF='';

	    $this->tableborder=0;
	    $this->tdbegin=false;
	    $this->tdwidth=0;
	    $this->tdheight=0;
	    $this->tdalign="L";
	    $this->tdbgcolor=false;

	    $this->oldx=0;
	    $this->oldy=0;

	    $this->fontlist=array("arial","times","courier","helvetica","symbol");
	    $this->issetfont=false;
	    $this->issetcolor=false;
	}


   //Cabecera de página
   function Header()
   {
   		$this->HREF='';
   		// Ubicacion inicial
   		$this->SetY(5);
   		$this->SetX(5);
   		// Columna 1
      	$this->SetFont('Arial','B',12);
      	$this->Cell(40,30,'',1,0,'C');
      	$this->Image('../logoEntidad.png',8,8,30);
      	$this->Cell(185,20, utf8_decode('PROCESO DE GESTIÓN DOCUMENTAL'), 1, 2,'C');
      	$this->Cell(185,10,' INVENTARIO DOCUMENTAL ', 1, 0,'C');
      	// Columna 2
      	$this->SetY(5);
   		$this->SetX(230);
      	$this->Cell(60,20, utf8_decode('Código FT-SGD-SKN-001'), 1, 2,'C');
      	$this->Cell(60,10,utf8_decode('Página ').$this->PageNo().'/{nb}',1,0,'C');
      	// Columna 3
      	$this->SetFont('Arial','B',8);
      	$this->SetY(35);
   		$this->SetX(5);
   		$this->Cell(100,5, utf8_decode($_SESSION['entidad']) , 1, 0,'C');
   		$this->Cell(125,5, utf8_decode($_SESSION['tipo_transferencia']), 1, 0,'C');
   		$this->Cell(30,10,'REG. DE ENTRADA', 1, 0,'C');
   		$this->Cell(30,10,' NIT ', 1, 0,'C');
   		// Columna 4
   		$this->SetY(40);
   		$this->SetX(5);
   		$this->Cell(100,5, utf8_decode($_SESSION['val_nombre_depe']), 1, 0,'C');
   		$this->Cell(125,5,' OBJETO ', 1, 0,'C');
   		// Columna 5
   		$this->SetY(45);
   		$this->SetX(5);
   		$this->Cell(100,10, utf8_decode('INFORMACIÓN DEL EXPEDIENTE'), 1, 0,'C');
   		$this->Cell(125,10,' TRANSFERENCIAS PRIMARIAS ', 1, 0,'C');
   		$this->Cell(8,5,'DD', 1, 0,'C');
   		$this->Cell(8,5,'MM', 1, 0,'C');
   		$this->Cell(14,5,'AAAA', 1, 0,'C');
   		$this->Cell(30,10, utf8_decode($_SESSION['nit_entidad']), 1, 1,'C');
   		// Ubicacion de fecha hora vacio
   		$this->SetY(50);
   		$this->SetX(230);
   		$this->Cell(8,5, date('d') , 1, 0,'C');
   		$this->Cell(8,5, date('m') , 1, 0,'C');
   		$this->Cell(14,5, date('Y') , 1, 0,'C');
   		// Columna 6
   		$this->SetY(55);
   		$this->SetX(5);
   		$this->Cell(20,10,'No. ORDEN', 1, 0,'C');
   		$this->Cell(20,10,utf8_decode('EXPEDIENTE'), 1, 0,'C');
   		$this->Cell(60,10,'SERIES Y SUBSERIES', 1, 0,'C');
   		$this->Cell(36,5,'FECHAS EXTREMAS', 1, 0,'C');
   		$this->MultiCell(29, 5, utf8_decode('UNIDAD DE CONSERVACIÓN'), 1 );
   		$this->SetY(55);
   		$this->SetX(170);
   		// $this->Cell(20,10,'TOTAL RADICADOS', 1, 0,'C');
   		$this->MultiCell(15,5, 'TOTAL RAD.', 1 );
   		$this->SetY(55);
   		$this->SetX(185);
   		$this->Cell(20,10,'SOPORTE', 1, 0,'C');
   		//$this->Cell(20,10,'FRECUENCIA DE USO', 1, 0,'C');
   		$this->MultiCell(25,5, 'FRECUENCIA DE USO', 1 );
   		$this->SetY(55);
   		$this->SetX(230);
   		$this->Cell(60,10,'NOTAS', 1, 0,'C');
   		// Ubicacion fecha INICIAL y FINAL
   		$this->SetY(60);
   		$this->SetX(105);
   		$this->Cell(18,5,'INICIAL', 1, 0,'C');
   		$this->Cell(18,5,'FINAL', 1, 0,'C');
   		$this->SetY(65);
   		$this->SetX(5);

   }

   //Pie de página
	function Footer()
	{
		$this->SetY(-25);
		$this->SetX(5);  // Columna 1
		$this->SetFont('Arial','B',8);
		$this->Cell(40,5,'ELABORADO POR:', 1, 0,'L');
		$this->Cell(102,5, utf8_decode($_SESSION['usua_nomb']), 1, 0,'L');
		$this->Cell(40,5,'RECIBODO POR:', 1, 0,'L');
		$this->Cell(102,5,'', 1, 1,'L');
		$this->SetX(5);  // Columna 2
		$this->Cell(40,5,'FIRMA:', 1, 0,'L');
		$this->Cell(102,5,'', 1, 0,'L');
		$this->Cell(40,5,'FIRMA:', 1, 0,'L');
		$this->Cell(102,5,'', 1, 1,'L');
		$this->SetX(5);  // Columna 3
		$this->Cell(40,5,'CARGO:', 1, 0,'L');
		$this->Cell(102,5, utf8_decode($_SESSION['rol_usuario']), 1, 0,'L');
		$this->Cell(40,5,'CARGO:', 1, 0,'L');
		$this->Cell(102,5,'', 1, 1,'L');
		$this->SetX(5);  // Columna 3
		$this->Cell(40,5,'LUGAR Y FIRMA:', 1, 0,'L');
		$this->Cell(102,5,'', 1, 0,'L');
		$this->Cell(40,5,'LUGAR Y FIRMA:', 1, 0,'L');
		$this->Cell(102,5,'', 1, 1,'L');

		// $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}

	function WriteHTML2($html)
	{
		//HTML parser
		
		$html=str_replace("\n",' ',$html);
		$a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
		foreach($a as $i=>$e)
		{
			if($i%2==0)
			{
				//Text
				if($this->HREF)
					$this->PutLink($this->HREF,$e);
				else
					$this->Write(5,$e);
			}
			else
			{
				//Tag
				if($e[0]=='/')
					$this->CloseTag(strtoupper(substr($e,1)));
				else
				{
					//Extract attributes
					$a2=explode(' ',$e);
					$tag=strtoupper(array_shift($a2));
					$attr=array();
					foreach($a2 as $v)
					{
						if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
							$attr[strtoupper($a3[1])]=$a3[2];
					}
					$this->OpenTag($tag,$attr);
				}
			}
		}
	}

	function OpenTag($tag, $attr)
{
    //Opening tag
    switch($tag){

        case 'SUP':
            if( !empty($attr['SUP']) ) {    
                //Set current font to 6pt     
                $this->SetFont('','',6);
                //Start 125cm plus width of cell to the right of left margin         
                //Superscript "1" 
                $this->Cell(2,2,$attr['SUP'],0,0,'L');
            }
            break;

        case 'TABLE': // TABLE-BEGIN
            if( !empty($attr['BORDER']) ) $this->tableborder=$attr['BORDER'];
            else $this->tableborder=0;
            break;
        case 'TR': //TR-BEGIN
            break;
        case 'TD': // TD-BEGIN
            if( !empty($attr['WIDTH']) ) $this->tdwidth=($attr['WIDTH']/4);
            else $this->tdwidth=30; // Set to your own width if you need bigger fixed cells
            if( !empty($attr['HEIGHT']) ) $this->tdheight=($attr['HEIGHT']/6);
            else $this->tdheight=6; // Set to your own height if you need bigger fixed cells
            if( !empty($attr['ALIGN']) ) {
                $align=$attr['ALIGN'];        
                if($align=='LEFT') $this->tdalign='L';
                if($align=='CENTER') $this->tdalign='C';
                if($align=='RIGHT') $this->tdalign='R';
            }
            else $this->tdalign='L'; // Set to your own
            if( !empty($attr['BGCOLOR']) ) {
                $coul=hex2dec($attr['BGCOLOR']);
                    $this->SetFillColor($coul['R'],$coul['G'],$coul['B']);
                    $this->tdbgcolor=true;
                }
            $this->tdbegin=true;
            break;

        case 'HR':
            if( !empty($attr['WIDTH']) )
                $Width = $attr['WIDTH'];
            else
                $Width = $this->w - $this->lMargin-$this->rMargin;
            $x = $this->GetX();
            $y = $this->GetY();
            $this->SetLineWidth(0.2);
            $this->Line($x,$y,$x+$Width,$y);
            $this->SetLineWidth(0.2);
            $this->Ln(1);
            break;
        case 'STRONG':
            $this->SetStyle('B',true);
            break;
        case 'EM':
            $this->SetStyle('I',true);
            break;
        case 'B':
        case 'I':
        case 'U':
            $this->SetStyle($tag,true);
            break;
        case 'A':
            $this->HREF=$attr['HREF'];
            break;
        case 'IMG':
            if(isset($attr['SRC']) && (isset($attr['WIDTH']) || isset($attr['HEIGHT']))) {
                if(!isset($attr['WIDTH']))
                    $attr['WIDTH'] = 0;
                if(!isset($attr['HEIGHT']))
                    $attr['HEIGHT'] = 0;
                $this->Image($attr['SRC'], $this->GetX(), $this->GetY(), px2mm($attr['WIDTH']), px2mm($attr['HEIGHT']));
            }
            break;
        case 'BLOCKQUOTE':
        case 'BR':
            $this->Ln(5);
            break;
        case 'P':
            $this->Ln(10);
            break;
        case 'FONT':
            if (isset($attr['COLOR']) && $attr['COLOR']!='') {
                $coul=hex2dec($attr['COLOR']);
                $this->SetTextColor($coul['R'],$coul['G'],$coul['B']);
                $this->issetcolor=true;
            }
            if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist)) {
                $this->SetFont(strtolower($attr['FACE']));
                $this->issetfont=true;
            }
            if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist) && isset($attr['SIZE']) && $attr['SIZE']!='') {
                $this->SetFont(strtolower($attr['FACE']),'',$attr['SIZE']);
                $this->issetfont=true;
            }
            break;
    }
}

	function CloseTag($tag)
{
    //Closing tag
    if($tag=='SUP') {
    }

    if($tag=='TD') { // TD-END
        $this->tdbegin=false;
        $this->tdwidth=0;
        $this->tdheight=0;
        $this->tdalign="L";
        $this->tdbgcolor=false;
    }
    if($tag=='TR') { // TR-END
        $this->Ln();
    }
    if($tag=='TABLE') { // TABLE-END
        $this->tableborder=0;
    }

    if($tag=='STRONG')
        $tag='B';
    if($tag=='EM')
        $tag='I';
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF='';
    if($tag=='FONT'){
        if ($this->issetcolor==true) {
            $this->SetTextColor(0);
        }
        if ($this->issetfont) {
            $this->SetFont('arial');
            $this->issetfont=false;
        }
    }
}

	function SetStyle($tag, $enable)
	{
		//Modify style and select corresponding font
		$this->$tag+=($enable ? 1 : -1);
		$style='';
		foreach(array('B','I','U') as $s)
			if($this->$s>0)
				$style.=$s;
		$this->SetFont('',$style);
	}

	function PutLink($URL, $txt)
	{
		//Put a hyperlink
		$this->SetTextColor(0,0,255);
		$this->SetStyle('U',true);
		$this->Write(5,$txt,$URL);
		$this->SetStyle('U',false);
		$this->SetTextColor(0);
	}

	function WriteTable($data, $w)
	{
		$this->SetLineWidth(.3);
		$this->SetFillColor(255,255,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		
		foreach($data as $row)
		{
			$this->SetX(5);
			$nb=0;
			for($i=0;$i<count($row);$i++)
				$nb = max($nb,$this->NbLines($w[$i],trim($row[$i])));

			$h = 5*$nb;
			$this->CheckPageBreak($h);
			for($i=0;$i<count($row);$i++)
			{
				$x = $this->GetX();
				$y = $this->GetY();
				if( $y == 60  ){
					$y = $y + 5;
					$x = 5;
				}
				
				// print_r( $x.', '.$y.', '.$w[$i].', '.$h );

				$this->Rect($x,$y,$w[$i],$h);
				$mostrar = utf8_decode(trim($row[$i]));
				$this->MultiCell($w[$i],5, $mostrar ,0,'L');
				//Put the position to the right of the cell
				$this->SetXY($x+$w[$i],$y);					
			}
			
			$this->Ln($h);

		}
	}

	function NbLines($w, $txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 && $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}

	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function ReplaceHTML($html)
	{
		$html = str_replace( '<li>', "\n<br> - " , $html );
		$html = str_replace( '<LI>', "\n - " , $html );
		$html = str_replace( '</ul>', "\n\n" , $html );
		$html = str_replace( '<strong>', "<b>" , $html );
		$html = str_replace( '</strong>', "</b>" , $html );
		$html = str_replace( '&#160;', "\n" , $html );
		$html = str_replace( '&nbsp;', " " , $html );
		$html = str_replace( '&quot;', "\"" , $html ); 
		$html = str_replace( '&#39;', "'" , $html );
		return $html;
	}

	function ParseTable($Table)
	{
		$_var='';
		$htmlText = $Table;
		$parser = new HtmlParser ($htmlText);
		while ($parser->parse())
		{
			if(strtolower($parser->iNodeName)=='table')
			{
				if($parser->iNodeType == NODE_TYPE_ENDELEMENT)
					$_var .='/::';
				else
					$_var .='::';
			}

			if(strtolower($parser->iNodeName)=='tr')
			{
				if($parser->iNodeType == NODE_TYPE_ENDELEMENT)
					$_var .='!-:'; //opening row
				else
					$_var .=':-!'; //closing row
			}
			if(strtolower($parser->iNodeName)=='td' && $parser->iNodeType == NODE_TYPE_ENDELEMENT)
			{
				$_var .='#,#';
			}
			if ($parser->iNodeName=='Text' && isset($parser->iNodeValue))
			{
				$_var .= $parser->iNodeValue;
			}
		}
		$elems = explode(':-!',str_replace('/','',str_replace('::','',str_replace('!-:','',$_var)))); //opening row
		foreach($elems as $key=>$value)
		{
			if(trim($value)!='')
			{
				$elems2 = explode('#,#',$value);
				array_pop($elems2);
				$data[] = $elems2;
			}
		}
		return $data;
	}

	function WriteHTML($html)
	{
		$this->SetX(5);
		$html = $this->ReplaceHTML($html);
		//Search for a table
		$start = strpos(strtolower($html),'<table');
		$end = strpos(strtolower($html),'</table');
		if($start!==false && $end!==false)
		{
			$this->WriteHTML2(substr($html,0,$start).'<BR>');

			$tableVar = substr($html,$start,$end-$start);
			$tableData = $this->ParseTable($tableVar);
			// print_r( $tableData );

			for( $i = 1; $i<=count($tableData[0]); $i++ )
			{

				if($this->CurOrientation=='L'){

					switch ($i) {
						case '1':
							//NO ORDEN
							$w[] = 20;
							break;
						case '2':
							// CODIGO 
							$w[] = 20;
							break;
						case '3':
							// SERIES Y TIPOS DOCUMENTALES
							$w[] = 60;
							break;
						case '4':
							// INICIAL
							$w[] = 18;
							break;
						case '5':
							// FINAL 
							$w[] = 18;
							break;
						case '6':
							// UNIDAD DE CONSERVACION
							$w[] = 29;
							break;
						case '7':
							// TOTAL RAD.
							$w[] = 15;
							break;
						case '8':
							// SOPORTE
							$w[] = 20;
							break;
						case '9':
							// FRECUENCIA USO
							$w[] = 25;
							break;
						case '10':
							// NOTAS
							$w[] = 60;
							break;
					
						default:
							$w[] = abs(50/(count($tableData[0])-1))+24;
							break;
					}

				}else{
					$w[] = abs(50/(count($tableData[0])-1))+5;
				}
			}
			$this->WriteTable($tableData,$w);

			$this->WriteHTML2(substr($html,$end+8,strlen($html)-1).'<BR>');
		}
		else
		{
			$this->WriteHTML2($html);
		}
	}


} //end of class