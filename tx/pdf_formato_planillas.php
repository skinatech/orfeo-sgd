<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('../include/fpdf18/fpdf.php');
// require_once('../include/fpdf18/html2pdf.php');
require('../include/fpdf18/htmlparser.inc');

function hex2dec($couleur = "#000000") {
    $R = substr($couleur, 1, 2);
    $rouge = hexdec($R);
    $V = substr($couleur, 3, 2);
    $vert = hexdec($V);
    $B = substr($couleur, 5, 2);
    $bleu = hexdec($B);
    $tbl_couleur = array();
    $tbl_couleur['R'] = $rouge;
    $tbl_couleur['V'] = $vert;
    $tbl_couleur['B'] = $bleu;
    return $tbl_couleur;
}

//conversion pixel -> millimeter at 72 dpi
function px2mm($px) {
    return $px * 25.4 / 72;
}

function txtentities($html) {
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}

class PDF extends FPDF {
    /* var $B;
      var $I;
      var $U;
      var $HREF; */

    function __construct($orientation = 'P', $unit = 'mm', $format = 'A4') {

        global $no_planilla;
        //Call parent constructor
        parent::__construct($orientation, $unit, $format);

        //Initialization
        $this->B = 0;
        $this->I = 0;
        $this->U = 0;
        $this->HREF = '';

        $this->tableborder = 0;
        $this->tdbegin = false;
        $this->tdwidth = 0;
        $this->tdheight = 0;
        $this->tdalign = "L";
        $this->tdbgcolor = false;

        $this->oldx = 0;
        $this->oldy = 0;

        $this->fontlist = array("arial", "times", "courier", "helvetica", "symbol");
        $this->issetfont = false;
        $this->issetcolor = false;
    }

    //Cabecera de página
    function Header() {
        // define('FPDF_FONTPATH','/usr/share/fonts/');
        $this->HREF = '';
        // Ubicacion inicial
        $this->SetY(5);
        $this->SetX(5);
        // Columna 1
        $this->Cell(40, 30, '', 1, 0, 'C');
        $this->Image('../logoEntidad_negro_pdf.jpg', 6, 8, 40);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(248, 10, ' ', 1, 2, 'C');
        $this->SetY(5);
        $this->SetX(45);
        $this->Cell(248, 5, utf8_decode(strtoupper($_SESSION['entidad'])), 0, 2, 'C');
        $this->SetY(10);
        $this->SetX(45);
        $this->Cell(248, 5, utf8_decode('NIT ' . $_SESSION['nit_entidad']), 0, 2, 'C');
        $this->Cell(248, 10, ' ', 1, 2, 'C');
        $this->SetY(15);
        $this->SetX(45);
        $this->Cell(248, 5, utf8_decode('NOMBRE DEL FORMATO:'), 0, 2, 'L');
        $this->SetY(20);
        $this->SetX(45);
        $this->Cell(248, 5, utf8_decode('PLANILLA DE REASIGNACION'), 0, 2, 'C');
        $this->Cell(148, 10, utf8_decode('PROCESO DE GESTIÓN DOCUMENTAL'), 1, 2, 'C');
        $this->SetY(25);
        $this->SetX(193);
        $this->Cell(20, 5, utf8_decode('VIGENCIA'), 1, 2, 'C');
        $this->Cell(20, 5, utf8_decode(' '), 1, 2, 'C');
        $this->SetY(25);
        $this->SetX(213);
        $this->Cell(20, 5, utf8_decode('VERSIÓN:'), 1, 2, 'C');
        $this->Cell(20, 5, utf8_decode('2'), 1, 2, 'C');
        $this->SetY(25);
        $this->SetX(233);
        $this->Cell(20, 5, utf8_decode('CÓDIGO'), 1, 2, 'C');
        $this->Cell(20, 5, utf8_decode(' '), 1, 2, 'C');
        $this->SetY(25);
        $this->SetX(253);
        $this->Cell(40, 5, utf8_decode('CONSECUTIVO'), 1, 2, 'C');
        $this->Cell(40, 5, utf8_decode(' '), 1, 2, 'C');
        $this->SetY(40);
        $this->SetX(5);
        $this->Cell(30, 5, utf8_decode('Radicado'), 1, 0, 'L');
        $this->Cell(25, 5, utf8_decode('Fecha Radicado'), 1, 0, 'L');
        $this->Cell(50, 5, utf8_decode('Remitente'), 1, 0, 'L');
        $this->Cell(40, 5, utf8_decode('Asunto'), 1, 0, 'L');
        $this->Cell(50, 5, utf8_decode('Dependencia'), 1, 0, 'L');
        $this->Cell(30, 5, utf8_decode('Firma'), 1, 0, 'L');
        $this->Cell(33, 5, utf8_decode('Nombre quien recibe'), 1, 0, 'L');
        $this->Cell(30, 5, utf8_decode('Fecha'), 1, 2, 'L');
        $this->SetY(45);
        $this->SetX(5);
    }

    //Pie de página
    function Footer() {
        $this->SetY(-25);
        $this->SetX(5);  // Columna 1
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(40, 5, 'FECHA DE ENTREGA:', 1, 0, 'L');
        $this->Cell(40, 5, date('d / m / Y'), 1, 0, 'L');
        $this->Cell(40, 5, 'USUARIO QUE ENTREGA:', 1, 0, 'L');
        $this->Cell(64, 5, utf8_decode(strtoupper($_SESSION['usua_nomb'])), 1, 0, 'L');
        $this->Cell(40, 5, 'DEPENDENCIA:', 1, 0, 'L');
        $this->Cell(64, 5, utf8_decode(strtoupper($_SESSION["depe_nomb"])), 1, 1, 'L');
        $this->SetX(5);  // Columna 2
        $this->Cell(288, 15, ' ', 1, 0, 'L');
        $this->SetY(-20);
        $this->SetX(5);
        $this->Cell(35, 5, 'OBSERVACIONES:', 0, 2, 'L');
        $this->SetY(-5);
        $this->Cell(0, 5, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function WriteHTML2($html) {
        //HTML parser

        $html = str_replace("\n", ' ', $html);
        $a = preg_split('/<(.*)>/U', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
        foreach ($a as $i => $e) {
            if ($i % 2 == 0) {
                //Text
                if ($this->HREF)
                    $this->PutLink($this->HREF, $e);
                else
                    $this->Write(5, $e);
            }
            else {
                //Tag
                if ($e[0] == '/')
                    $this->CloseTag(strtoupper(substr($e, 1)));
                else {
                    //Extract attributes
                    $a2 = explode(' ', $e);
                    $tag = strtoupper(array_shift($a2));
                    $attr = array();
                    foreach ($a2 as $v) {
                        if (preg_match('/([^=]*)=["\']?([^"\']*)/', $v, $a3))
                            $attr[strtoupper($a3[1])] = $a3[2];
                    }
                    $this->OpenTag($tag, $attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr) {
        //Opening tag
        switch ($tag) {

            case 'SUP':
                if (!empty($attr['SUP'])) {
                    //Set current font to 6pt     
                    $this->SetFont('', '', 6);
                    //Start 125cm plus width of cell to the right of left margin         
                    //Superscript "1" 
                    $this->Cell(2, 2, $attr['SUP'], 0, 0, 'L');
                }
                break;

            case 'TABLE': // TABLE-BEGIN
                if (!empty($attr['BORDER']))
                    $this->tableborder = $attr['BORDER'];
                else
                    $this->tableborder = 0;
                break;
            case 'TR': //TR-BEGIN
                break;
            case 'TD': // TD-BEGIN
                if (!empty($attr['WIDTH']))
                    $this->tdwidth = ($attr['WIDTH'] / 4);
                else
                    $this->tdwidth = 30; // Set to your own width if you need bigger fixed cells
                if (!empty($attr['HEIGHT']))
                    $this->tdheight = ($attr['HEIGHT'] / 6);
                else
                    $this->tdheight = 6; // Set to your own height if you need bigger fixed cells
                if (!empty($attr['ALIGN'])) {
                    $align = $attr['ALIGN'];
                    if ($align == 'LEFT')
                        $this->tdalign = 'L';
                    if ($align == 'CENTER')
                        $this->tdalign = 'C';
                    if ($align == 'RIGHT')
                        $this->tdalign = 'R';
                } else
                    $this->tdalign = 'L'; // Set to your own
                if (!empty($attr['BGCOLOR'])) {
                    $coul = hex2dec($attr['BGCOLOR']);
                    $this->SetFillColor($coul['R'], $coul['G'], $coul['B']);
                    $this->tdbgcolor = true;
                }
                $this->tdbegin = true;
                break;

            case 'HR':
                if (!empty($attr['WIDTH']))
                    $Width = $attr['WIDTH'];
                else
                    $Width = $this->w - $this->lMargin - $this->rMargin;
                $x = $this->GetX();
                $y = $this->GetY();
                $this->SetLineWidth(0.2);
                $this->Line($x, $y, $x + $Width, $y);
                $this->SetLineWidth(0.2);
                $this->Ln(1);
                break;
            case 'STRONG':
                $this->SetStyle('B', true);
                break;
            case 'EM':
                $this->SetStyle('I', true);
                break;
            case 'B':
            case 'I':
            case 'U':
                $this->SetStyle($tag, true);
                break;
            case 'A':
                $this->HREF = $attr['HREF'];
                break;
            case 'IMG':
                if (isset($attr['SRC']) && (isset($attr['WIDTH']) || isset($attr['HEIGHT']))) {
                    if (!isset($attr['WIDTH']))
                        $attr['WIDTH'] = 0;
                    if (!isset($attr['HEIGHT']))
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
                if (isset($attr['COLOR']) && $attr['COLOR'] != '') {
                    $coul = hex2dec($attr['COLOR']);
                    $this->SetTextColor($coul['R'], $coul['G'], $coul['B']);
                    $this->issetcolor = true;
                }
                if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist)) {
                    $this->SetFont(strtolower($attr['FACE']));
                    $this->issetfont = true;
                }
                if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist) && isset($attr['SIZE']) && $attr['SIZE'] != '') {
                    $this->SetFont(strtolower($attr['FACE']), '', $attr['SIZE']);
                    $this->issetfont = true;
                }
                break;
        }
    }

    function CloseTag($tag) {
        //Closing tag
        if ($tag == 'SUP') {
            
        }

        if ($tag == 'TD') { // TD-END
            $this->tdbegin = false;
            $this->tdwidth = 0;
            $this->tdheight = 0;
            $this->tdalign = "L";
            $this->tdbgcolor = false;
        }
        if ($tag == 'TR') { // TR-END
            $this->Ln();
        }
        if ($tag == 'TABLE') { // TABLE-END
            $this->tableborder = 0;
        }

        if ($tag == 'STRONG')
            $tag = 'B';
        if ($tag == 'EM')
            $tag = 'I';
        if ($tag == 'B' || $tag == 'I' || $tag == 'U')
            $this->SetStyle($tag, false);
        if ($tag == 'A')
            $this->HREF = '';
        if ($tag == 'FONT') {
            if ($this->issetcolor == true) {
                $this->SetTextColor(0);
            }
            if ($this->issetfont) {
                $this->SetFont('arial');
                $this->issetfont = false;
            }
        }
    }

    function SetStyle($tag, $enable) {
        //Modify style and select corresponding font
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach (array('B', 'I', 'U') as $s)
            if ($this->$s > 0)
                $style .= $s;
        $this->SetFont('', $style);
    }

    function PutLink($URL, $txt) {
        //Put a hyperlink
        $this->SetTextColor(0, 0, 255);
        $this->SetStyle('U', true);
        $this->Write(5, $txt, $URL);
        $this->SetStyle('U', false);
        $this->SetTextColor(0);
    }

    function WriteTable($data, $w) {
        $this->SetLineWidth(.3);
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetFont('');

        foreach ($data as $row) {
            $this->SetX(5);
            $nb = 0;
            for ($i = 0; $i < count($row); $i++)
                $nb = max($nb, $this->NbLines($w[$i], trim($row[$i])));

            $h = 5 * $nb;
            $this->CheckPageBreak($h);
            for ($i = 0; $i < count($row); $i++) {
                $x = $this->GetX();
                $y = $this->GetY();

                // print_r( $x.', '.$y.', '.$w[$i].', '.$h );

                $this->Rect($x, $y, $w[$i], $h);
                $mostrar = utf8_decode(trim($row[$i]));
                $this->MultiCell($w[$i], 5, $mostrar, 0, 'L');
                //Put the position to the right of the cell
                $this->SetXY($x + $w[$i], $y);
            }

            $this->Ln($h);
        }
    }

    function NbLines($w, $txt) {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }

    function CheckPageBreak($h) {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function ReplaceHTML($html) {
        $html = str_replace('<li>', "\n<br> - ", $html);
        $html = str_replace('<LI>', "\n - ", $html);
        $html = str_replace('</ul>', "\n\n", $html);
        $html = str_replace('<strong>', "<b>", $html);
        $html = str_replace('</strong>', "</b>", $html);
        $html = str_replace('&#160;', "\n", $html);
        $html = str_replace('&nbsp;', " ", $html);
        $html = str_replace('&quot;', "\"", $html);
        $html = str_replace('&#39;', "'", $html);
        return $html;
    }

    function ParseTable($Table) {
        $_var = '';
        $data = [];
        $htmlText = $Table;
        $parser = new HtmlParser($htmlText);
        while ($parser->parse()) {
            if (strtolower($parser->iNodeName) == 'table') {
                if ($parser->iNodeType == NODE_TYPE_ENDELEMENT)
                    $_var .= '/::';
                else
                    $_var .= '::';
            }

            if (strtolower($parser->iNodeName) == 'tr') {
                if ($parser->iNodeType == NODE_TYPE_ENDELEMENT)
                    $_var .= '!-:'; //opening row
                else
                    $_var .= ':-!'; //closing row
            }
            if (strtolower($parser->iNodeName) == 'td' && $parser->iNodeType == NODE_TYPE_ENDELEMENT) {
                $_var .= '#,#';
            }
            if ($parser->iNodeName == 'Text' && isset($parser->iNodeValue)) {
                $_var .= $parser->iNodeValue;
            }
        }
        $elems = explode(':-!', str_replace('/', '', str_replace('::', '', str_replace('!-:', '', $_var)))); //opening row
        foreach ($elems as $key => $value) {
            if (trim($value) != '') {
                $elems2 = explode('#,#', $value);
                array_pop($elems2);
                $data[] = $elems2;
            }
        }
        return $data;
    }

    function WriteHTML($html) {
        $w = [];
        $this->SetX(5);
        $html = $this->ReplaceHTML($html);
        //Search for a table
        $start = strpos(strtolower($html), '<table');
        $end = strpos(strtolower($html), '</table');
        if ($start !== false && $end !== false) {
            $this->WriteHTML2(substr($html, 0, $start) . '<BR>');

            $tableVar = substr($html, $start, $end - $start);
            $tableData = $this->ParseTable($tableVar);
            // print_r( $tableData );

            for ($i = 1; $i <= count($tableData[0]); $i++) {

                if ($this->CurOrientation == 'L') {

                    switch ($i) {
                        case '1':
                            //Fecha Radicado
                            $w[] = 30;
                            break;
                        case '2':
                            // No.Radicado 
                            $w[] = 25;
                            break;
                        case '3':
                            // Destinatario
                            $w[] = 50;
                            break;
                        case '4':
                            // Dirección
                            $w[] = 40;
                            break;
                        case '5':
                            // Asunto 
                            $w[] = 50;
                            break;
                        case '6':
                            // Remitente
                            $w[] = 30;
                            break;
                        case '7':
                            // Fecha/Hora Entrega
                            $w[] = 33;
                            break;
                        case '8':
                            // Firma Recibido
                            $w[] = 30;
                            break;

                        default:
                            $w[] = abs(50 / (count($tableData[0]) - 1)) + 24;
                            break;
                    }
                } else {
                    $w[] = abs(50 / (count($tableData[0]) - 1)) + 5;
                }
            }
            $this->WriteTable($tableData, $w);

            $this->WriteHTML2(substr($html, $end + 8, strlen($html) - 1) . '<BR>');
        } else {
            $this->WriteHTML2($html);
        }
    }

}

//end of class
