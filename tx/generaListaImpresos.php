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

$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];
$entidad_contacto = ( isset($_SESSION["entidad_contacto"]) ? $_SESSION["entidad_contacto"] : '');
$ambiente = $_SESSION['ambiente'];
$krd = $_SESSION['krd'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
// $gen_lisDefi = $_POST["gen_lisDefi"];
// $cancelarListado = ( isset($_POST["cancelarListado"]) ? $_POST["cancelarListado"] : '');
// $checkValue = $_POST["checkValue"];
// $dep_sel = $_GET["dep_sel"];
// $fecha_busqH = $_GET["fecha_busqH"];
// $fecha_busq = $_GET["fecha_busq"];
// $hora_ini = $_GET["hora_ini"];
// $minutos_ini = $_GET["minutos_ini"];
// $hora_fin = $_GET["hora_fin"];
// $minutos_fin = $_GET["minutos_fin"];
$fechah = '';
$rem_destino = '';
$ref_pdf = '';

if (!$_SESSION["dependencia"] and ! $_SESSION["depe_codi_territorial"])
    include "../rec_session.php";
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";
$htmlE = "";

function get_dep_name($iadb, $num_radica) {
    $asql = "SELECT depe_nomb FROM dependencia WHERE depe_codi='$num_radica'";
    $ars_dep = $iadb->conn->Execute($asql);
    return $ars_dep->fields['DEPE_NOMB'];
}

foreach ($_GET as $key => $valor) ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor; 

?>
<html>
    <head>
        <title>Untitled Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>
    <body>
        <?php
        include_once "$dir_raiz/include/db/ConnectionHandler.php";
        $db = new ConnectionHandler("$dir_raiz");
        //$db->conn->debug = true;
        $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

        if ($gen_lisDefi and ! $cancelarListado) {
            $indi_generar = "SI";
        } else {
            $indi_generar = "NO";
        }

        if ($indi_generar == "SI") {
            ?>
        <center>
            <table class=borde_tab width='95%' cellspacing="5">
                <tr>
                    <td class=titulos2><center>Listado documentos radicados</center></td>
                </tr>
            </table>
        </center>
        <form name='forma' action='generaListaImpresos.php?<?= session_name() . "=" . session_id() . "&krd=$krd&hora_ini=$hora_ini&hora_fin=$hora_fin&minutos_ini=$minutos_ini&minutos_fin=$minutos_fin&tip_radi=$tip_radi&fecha_busq=$fecha_busq&fecha_busqH=$fecha_busqH&fecha_h=$fechah&dep_sel=$dep_sel&num=$num" ?>' method=post>
            <?php
            $fecha_ini = $fecha_busq . ":" . $hora_ini . ":" . $minutos_ini;
            $fecha_fin = $fecha_busqH . ":" . $hora_fin . ":" . $minutos_fin;

            $setFiltroSelect = '';

            if ($checkValue) {
                $num = count($checkValue);

                $i = 0;
                while ($i < $num) {
                    $record_id = key($checkValue);

                    $radicadosSel[$i] = $record_id;
                    $setFiltroSelect .= "'" . $record_id . "'";                    

                    if ($i <= ($num - 2)) {
                        $setFiltroSelect .= ",";
                    }

                    next($checkValue);
                    $i++;
                }
                if ($radicadosSel)
                    $whereFiltro = " and c.radi_nume_radi in($setFiltroSelect)";
            } // FIN  if ($checkValue)

            if ($setFiltroSelect)
                $filtroSelect = $setFiltroSelect;
            if ($filtroSelect) {

                // En este proceso se utilizan las variabels $item, $textElements, $newText que son temporales para esta operacion.
                $filtroSelect = trim($filtroSelect);
                $textElements = explode(",", $filtroSelect);
                $newText = "";
                foreach ($textElements as $item) {
                    $item = trim($item);
                    if (strlen($item) != 0) {
                        if (strlen($item) <= 6)
                            $sec = str_pad($item, 6, "0", STR_PAD_left);
                    }
                }
            } // FIN if ($filtroSelect)
            //Condicion Dependencia
            if (strlen($orderNo) == 0) {
                $orderNo = "1";
                $order = 2;
            } else {
                $order = $orderNo + 1;
            }
            $dependencia_busq2 = '';
            if ($dep_sel != 0)
                $dependencia_busq2 = " and h.depe_codi_dest = '$dep_sel'";
            //Construccion Condicion de Fechas//
            $fecha_ini = $fecha_busq;
            $fecha_fin = $fecha_busqH;
            $fecha_ini = mktime($hora_ini, $minutos_ini, 00, substr($fecha_busq, 5, 2), substr($fecha_busq, 8, 2), substr($fecha_busq, 0, 4));
            $fecha_fin = mktime($hora_fin, $minutos_fin, 59, substr($fecha_busqH, 5, 2), substr($fecha_busqH, 8, 2), substr($fecha_busqH, 0, 4));

            $where_fecha = " and h.hist_fech BETWEEN " . $db->conn->DBTimeStamp($fecha_ini) . " and " . $db->conn->DBTimeStamp($fecha_fin);
            //Condicion Tipo Radicacion
            if ($tip_radi == 0) {
                $where_tipRadi = "";
            } else {
                $where_tipRadi = " and c.radi_nume_radi like '%$tip_radi'";
            }

            include "../include/query/tx/queryListaImpresos.php";
            $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
            $rsMarcar = $db->conn->Execute($isql);
            $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
            $no_registros = 0;

            //$no_registros = $rsMarcar->recordcount(); 
            $radiNumero = $rsMarcar->fields["NUMERO_RADICADO"];

            if ($radiNumero == '') {
                $estado = "Error";
                $mensaje = "Verifique...";
                foreach ($textElements as $item) {
                    $verrad_sal = trim($item);
                }
                echo "<script>alert('No se puede Generar el Listado $verrad_sal . $mensaje  ')</script>";
            } else {
                //Modificacion 28112005
                //Modificado skina 31-10-08
                $archivo = "../bodega/pdfs/planillas/envios/$krd" . date("Ymd_hms") . "_lis_IMP.txt";
                $fp = fopen($archivo, "w");
                $com = chr(34);
                $tab = chr(9);
                $contenido = "$com*Radicado*$com$tab$com*Fecha Radicado*$com$tab$com*Remitente*$com$tab$com*Asunto*$com$tab$com*Dependencia*$com$tab$com*Firma*$com$tab$com*Nombre recibe*$com$tab$com*Fecha*$com\n";
                $query_t = $isql;

                $dir_raiz = "..";
                //error_reporting(7);
                // define('ADODB_FETCH_NUM', $assoc);
                $ADODB_FETCH_MODE = ADODB_FETCH_NUM;
                require "../tx/classControlLis.php";
                $btt = new CONTROL_ORFEO($db);
                $campos_align = array("C", "C", "L", "L", "L", "L", "L", "L");

                $campos_vista = array("Radicado", "Fecha Radicado", "Remitente", "Asunto", "Dependencia", "Firma", "Nombre quien recibe", "Fecha");
                $campos_width = array(120, 120, 200, 320, 180, 150, 150, 110);
                $campos_tabla = '';
                $btt->campos_align = $campos_align;
                $btt->campos_tabla = $campos_tabla;
                $btt->campos_vista = $campos_vista;
                $btt->campos_width = $campos_width;
                $btt->tabla_sql($query_t, $fecha_ini, $fecha_fin);
                $htmlE = $btt->tabla_htmlE;

                $no_planilla = $db->conn->nextId('sec_planilla_tx', $driver);

                /*** pdf_formato contiene el HEADER y el FOOTER del PDF ***/
                include 'pdf_formato_planillas.php';

                /*** Creación del objeto de la clase heredada ***/
                $pdf_New = new PDF('L', 'mm', 'A4');
                $pdf_New->AliasNbPages();
                $pdf_New->AddPage();
                // $pdf_New->SetFont('Arial','',12);
                $pdf_New->SetFont('Arial', 'B', 8);
                $htmlTable = '<table BORDER=1 >';

                //Fin Modificacion 28112005
                while (!$rsMarcar->EOF) {
                    $no_registros = $no_registros + 1;
                    $mensaje = "";
                    $verrad_sal = $rsMarcar->fields["NUMERO_RADICADO"];
                    $fecha_radi = $rsMarcar->fields["FECHA_RADICADO"];
                    $asunto = $rsMarcar->fields["ASUNTO"];
                    $rem_destino = $rsMarcar->fields["REMITENTE"];
                    $cuentai = $rsMarcar->fields["NO_DOCUMENTO"];
                    $firma = $rsMarcar->fields["FIRMA"];
                    $fecha = $rsMarcar->fields["FECHA"];
                    $depe_nomb = $rsMarcar->fields["DEPENDENCIA"];
                    $dep_radicado = substr($verrad_sal, 4, $longitud_codigo_dependencia);
                    $ano_radicado = substr($verrad_sal, 0, 4);
                    $carp_codi = substr($dep_radicado, 0, 2);
                    $radi_path_sal = "/$ano_radicado/$dep_radicado/docs/$ref_pdf";

                    $campos_tabla = array("$verrad_sal", "$fecha_radi", "$rem_destino", "$asunto", "$depe_nomb", "$firma", "$cuentai", "$fecha");
                    $btt->campos_tabla = $campos_tabla;
                    $btt->tabla_Cuerpo();
                    $contenido = $contenido . "$com$verrad_sal$com$tab$com$fecha_radi$com$tab$com$rem_destino$com$tab$com$asunto$com$tab$com$depe_nomb$com$tab$com$firma$com$tab$com$cuentai$com$tab$com$fecha$com\n";
                    
                    // construccion de la tabla 
                    $htmlTable .= '<TR>';
                    $htmlTable .= '<TD>' . $verrad_sal . '</TD>';
                    $htmlTable .= '<TD>' . $fecha_radi . '</TD>';
                    $htmlTable .= '<TD>' . $rem_destino . '</TD>';
                    $htmlTable .= '<TD>' . $asunto . '</TD>';
                    $htmlTable .= '<TD>' . $depe_nomb . '</TD>';
                    $htmlTable .= '<TD>' . $firma . '</TD>';
                    $htmlTable .= '<TD>' . $cuentai . '</TD>';
                    $htmlTable .= '<TD>' . $fecha .' </TD>';
                    $htmlTable .= '</TR>';

                    //Fin Modificacion 28112005
                    $rsMarcar->MoveNext();
                } // FIN del WHILE (!$rsMarcar->EOF)

                $htmlTable .= '</table>';
                $pdf_New->SetY(40);
                $pdf_New->SetX(5);
                $pdf_New->WriteHTML($htmlTable);

                $arpdf_tmp = "../bodega/pdfs/planillas/tx/$krd" . date("Ymd_hms") . "_lis_IMP.pdf";
                $pdf_New->Output($arpdf_tmp, 'F');

                echo '<div style=margin-left: 2%; margin-top: 1%;>';
                echo "Se genero la planilla No. " . $no_planilla;
                echo "<br>";
                echo "Para obtener el archivo pdf haga click en el siguiente vinculo <a class=vinculos href='$arpdf_tmp' target='" . date("Ymd_hms") . "'>Abrir Archivo Pdf</a>";
                echo "<br>";
                $salida = "csv";
                echo '</div><br>';

            }
            //FIN else if ($no_registros <=0)
            ?>
        </form>
            <?php
        }
        else {
            echo "<hr><center><b><span class='alarmas'>Operacion CANCELADA</span></center></b></hr>";
        }
        ?>  
</body>
</html>

