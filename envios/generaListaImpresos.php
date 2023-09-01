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

session_start();
error_reporting(7);
$url_raiz="..";
$dir_raiz=$_SESSION['dir_raiz'];
$ESTILOS_PATH2 =$_SESSION['ESTILOS_PATH2'];

        /*---------------------------------------------------------+
        |                       MAIN                               |
        +---------------------------------------------------------*/

$krd = $_SESSION['krd'];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];

if (!$dependencia and ! $depe_codi_territorial)
    include "../rec_session.php";
//include_once dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."config.php";
$gen_lisDefi = $_GET['gen_lisDefi'];
$cancelarListado = $_GET['cancelarListado'];
$checkValue = $_GET['checkValue'];

$htmlE = "";
($gen_lisDefi and ! $cancelarListado) ? $indi_generar = "SI" : $indi_generar = "NO";
?>
<html>
    <head>
        <title>Untitled Document</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>
    <body>
        <?php
        if ($indi_generar == "SI") {
            ?>
        <br>
        <center>
            <div id="titulo" style="width: 50%;" align="center">Listado Documentos Impresos <br> Generación listado de entrega </div>
<!--            <table class=borde_tab width='95%' cellspacing="5">
                <tr>
                    <td class=titulos2>
                <center>Listado documentos impresos</center>
                </td>
                </tr>
            </table>-->
            <form name='forma' action='generaListaImpresos.php?<?= session_name() . "=" . session_id() . "&krd=$krd&hora_ini=$hora_ini&hora_fin=$hora_fin&minutos_ini=$minutos_ini&minutos_fin=$minutos_fin&tip_radi=$tip_radi&fecha_busq=$fecha_busq&fecha_busqH=$fecha_busqH&fecha_h=$fechah&dep_sel=$dep_sel&num=$num" ?>' method=post>
                <?php
                $fecha_ini = $fecha_busq . ":" . $hora_ini . ":" . $minutos_ini;
                $fecha_fin = $fecha_busqH . ":" . $hora_fin . ":" . $minutos_fin;
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
                        $whereFiltro = " and b.radi_nume_radi in($setFiltroSelect)";
                } // FIN  if ($checkValue)

                if ($setFiltroSelect)
                    $filtroSelect = $setFiltroSelect;
                if ($filtroSelect) {

// En este proceso se utilizan las variabels $item, $textElements, $newText que son temporales para esta operacion.

                    $filtroSelect = trim($filtroSelect);
                    $textElements = preg_split(",", $filtroSelect);
                    $newText = "";
                    foreach ($textElements as $item) {
                        $item = trim($item);
                        if (strlen($item) != 0) {
                            if (strlen($item) <= 6)
                                $sec = str_pad($item, 6, "0", STR_PAD_left);
                        }
                    }
                } // FIN if ($filtroSelect)

                $carp_codi = substr($dep_radicado, 0, 2);

                error_reporting(7);

                include_once "$dir_raiz/include/db/ConnectionHandler.php";
                $db = new ConnectionHandler("$dir_raiz");
                define('ADODB_FETCH_ASSOC', 0);
                $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
                include "$dir_raiz/include/query/envios/queryListaImpresos.php";

                $rsMarcar = $db->query($isql);
               // echo '-------------------->  '.$isql;
		$no_registros = 0;
                //$no_registros = $rsMarcar->recordcount(); 
                $radiNumero = $rsMarcar->fields["RADI_NUME_RADI"];
                //if ($no_registros <=0) {
                if ($radiNumero == '') {
                    $estado = "Error";
                    $mensaje = "Verifique...";
                    foreach ($textElements as $item) {
                        $verrad_sal = trim($item);
                    }
                    echo "<script>alert('No se puede Generar el Listado $verrad_sal . $mensaje  ')</script>";
                } else {
                    //Modificacion 28112005
                    $archivo = "../bodega/pdfs/planillas/envios/$krd" . date("Ymd_hms") . "_lis_IMP.csv";
                    $fp = fopen($archivo, "w");
                    $com = chr(34);
                    $contenido = "$com*Radicado*$com,$com*Radicado Padre*$com,$com*Destinatario*$com,$com*Direccion*$com,$com*Municipio*$com,$com*Departamento*$com,$com*Observacion*$com\n";
                    $query_t = $isql;

                    $ruta_raiz = "..";
                    error_reporting(7);
                    define('ADODB_FETCH_NUM', 2);
                    $ADODB_FETCH_MODE = ADODB_FETCH_NUM;
                    require "../envios/classControlLis.php";
                    $btt = new CONTROL_ORFEO($db);
                    $campos_align = array("C", "C", "L", "L", "L", "L", "L");
                    $campos_tabla = array("$verrad_sal", "$verrad", "$nombre_us", "$direccion_us", "$destino", "$departamento", "$observa");
                    $campos_vista = array("Radicado", "Radicado Padre", "Destinatario", "Dirección", "Municipio", "Departamento", "Observación");
                    $campos_width = array(120, 120, 280, 290, 120, 110, 80);
                    $btt->campos_align = $campos_align;
                    $btt->campos_tabla = $campos_tabla;
                    $btt->campos_vista = $campos_vista;
                    $btt->campos_width = $campos_width;
                    $btt->tabla_sql($query_t, $fecha_ini, $fecha_fin);
                    $htmlE = $btt->tabla_htmlE;
                    //Fin Modificacion 28112005
                    while (!$rsMarcar->EOF) {
                        $no_registros = $no_registros + 1;
                        $mensaje = "";
                        $verrad_sal = $rsMarcar->fields["RADI_NUME_SALIDA"];
                        $verradicado = $rsMarcar->fields["RADI_NUME_RADI"];
                        $ref_pdf = $rsMarcar->fields["ANEX_NOMB_ARCHIVO"];
                        $asunto = $rsMarcar->fields["ANEX_DESC"];
                        $sgd_dir_tipo = $rsMarcar->fields["SGD_DIR_TIPO"];
                        $rem_destino = $rsMarcar->fields["SGD_DIR_TIPO"];
                        $anex_radi_nume = $rsMarcar->fields["ANEX_RADI_NUME"];
                        $dep_radicado = substr($verrad_sal, 4, $longitud_codigo_dependencia);
                        $ano_radicado = substr($verrad_sal, 0, 4);
                        $carp_codi = substr($dep_radicado, 0, 2);
                        $radi_path_sal = "/$ano_radicado/$dep_radicado/docs/$ref_pdf";

                        if (substr($rem_destino, 0, 1) == "7")
                            $anex_radi_nume = $verrad_sal;
                        $nurad = $anex_radi_nume;
                        $verrad = $anex_radi_nume;
                        $verradicado = $anex_radi_nume;

                        $ruta_raiz = "..";
                        include "../ver_datosrad.php";

                        if ($radicadopadre)
                            $radicado = $radicadopadre;
                        if ($nurad)
                            $radicado = $nurad;

                        $pCodDep = $dpto;
                        $pCodMun = $muni;

                        $nombre_us = $otro . "-" . substr($nombre . " " . $papel . " " . $sapel, 0, 29);

                        if (!$rem_destino)
                            $rem_destino = 1;
                        $sgd_dir_tipo = 1;
                        echo "<input type=hidden name=$espcodi value='$espcodi'>";

                        $ruta_raiz = "..";
                        include "".$dir_raiz."/include/jh_class/funciones_sgd.php";
                        /*
                         * Se incluyen ya que en ver_datosrad no esta contemplada esta opcion
                         * que corresponde a copias
                         */
                        $a = new LOCALIZACION($codep_us7, $muni_us7, $db);
                        $dpto_nombre_us7 = $a->departamento;
                        $muni_nombre_us7 = $a->municipio;
                        /*
                         * Fin modificacion
                         */
                        $a = new LOCALIZACION($pCodDep, $pCodMun, $db);
                        $dpto_nombre_us = $a->departamento;
                        $muni_nombre_us = $a->municipio;
                        $direccion_us = $dir;
                        $destino = $muni_nombre_us;
                        $departamento = $dpto_nombre_us;
                        $dir_codigo = $documento;
                        /*
                         * Modificado 27072005
                         * Se modifica para que asuma el destinatario
                         */

                        if ($rem_destino == 1) {
                            $email_us = $email_us1;
                            $telefono_us = $telefono_us1;
                            $nombre_us = trim($nombre_us1);
                            if ($otro_us1)
                                $nombre_us = $otro_us1 . " - " . $nombre_us;
                            if ($tipo_emp_us1 == 0)
                                $nombre_us .= " " . trim($prim_apel_us1) . " " . trim($seg_apel_us1);
                            $destino = $muni_nombre_us1;
                            $departamento = $dpto_nombre_us1;
                            $direccion_us = $direccion_us1;
                            $dir_codigo = $dir_codigo_us1;
                            $dir_tipo = 1;
                        }
                        if ($rem_destino == 2) {
                            $email_us = $email_us2;
                            $telefono_us = $telefono_us2;
                            $nombre_us = trim($nombre_us2);
                            if ($otro_us2)
                                $nombre_us = $otro_us2 . " - " . $nombre_us;
                            if ($tipo_emp_us2 == 0)
                                $nombre_us .= " " . trim($prim_apel_us2) . " " . trim($seg_apel_us2);
                            $destino = $muni_nombre_us2;
                            $departamento = $dpto_nombre_us2;
                            $direccion_us = $direccion_us2;
                            $dir_codigo = $dir_codigo_us2;
                            $dir_tipo = 2;
                        }
                        if ($rem_destino == 3) {
                            $email_us = $email_us3;
                            $telefono_us = $telefono_us3;
                            $destino = $muni_nombre_us3;
                            $departamento = $dpto_nombre_us3;
                            $nombre_us = trim($nombre_us3);
                            if ($tipo_emp_us3 == 0)
                                $nombre_us .= " " . trim($prim_apel_us3) . " " . trim($seg_apel_us3);
                            $dir_codigo = $dir_codigo_us3;
                            $direccion_us = $direccion_us3;
                            $dir_tipo = 3;
                        }
                        if (substr($rem_destino, 0, 1) == 7) {
                            $email_us = $email_us7;
                            $telefono_us = $telefono_us7;
                            $destino = $muni_nombre_us7;
                            $departamento = $dpto_nombre_us7;
                            $nombre_us = trim($nombre_us7);
                            if ($otro_us7)
                                $nombre_us = $otro_us7 . " - " . $nombre_us;
                            if ($tipo_emp_us7 == 0)
                                $nombre_us .= " " . trim($prim_apel_us7) . " " . trim($seg_apel_us7);
                            $dir_codigo = $dir_codigo_us7;
                            $direccion_us = $direccion_us7;
                            $dir_tipo = $rem_destino;
                        }
                        $nombre_us = substr(trim($nombre_us), 0, 29);
                        /*
                         * Fin modificacion
                         */
                        if (!$mensaje) {
                            $mensaje = "";
                            $error = "no";
                            if (!$nombre_us) {
                                $mensaje = "Nombre,";
                                $error = "si";
                            }
                            if (!$direccion_us) {
                                $mensaje .= "Direccion,";
                                $error = "si";
                            }
                            if (!$destino) {
                                $mensaje .= "Municipio,";
                                $error = "si";
                            }
                            if (!$departamento) {
                                $mensaje .= "Departamento,";
                                $error = "si";
                            }
                        }

                        if ($error == "no") {
                            
                        } else {
                            $estado = "Error ";
                            $mensaje = "Faltan Datos $mensaje";
                            echo "<script>alert('Se debe revisar el siguiente Radicado $verrad_sal . $mensaje  ')</script>";
                        }
//Modificacion 28112005
                        $observa = "_";
                        $campos_tabla = array("$verrad_sal", "$verrad", "$nombre_us", "$direccion_us", "$destino", "$departamento", "$observa");
                        $btt->campos_tabla = $campos_tabla;
                        $btt->tabla_Cuerpo();
                        error_reporting(7);
                        //$contenido= $contenido ."0,$com$verrad_sal$com,$com$verrad$com,$com$nombre_us$com,$com$direccion_us$com,$com$destino$com,$com$departamento$com,$com$observa$com\n";
                        //by skina 20120813
                        $contenido = $contenido . "$com$verrad_sal$com,$com$verrad$com,$com$nombre_us$com,$com$direccion_us$com,$com$destino$com,$com$departamento$com,$com$observa$com\n";
//Fin Modificacion 28112005
                        $rsMarcar->MoveNext();
                    } // FIN del WHILE (!$rsMarcar->EOF)
                    fputs($fp, $contenido);
                    fclose($fp);
                    $fecha_dia = date("Ymd - H:i:s");
                    $html = $htmlE;
                    $html .= $btt->tabla_html;
                    //$html  = $btt->tabla_html;
                    error_reporting(7);
                    define(FPDF_FONTPATH, ''.$dir_raiz.'/include/fpdf/font/');
                    require("$dir_raiz/include/fpdf/html_table.php");
                    error_reporting(7);
                    $pdf = new PDF("L", "mm", "A4");
                    $pdf->AddPage();
                    $pdf->SetFont('Arial', '', 8);
                    $entidad = $db->entidad;
                    $encaenti = "$dir_raiz/images/logoEntidad.jpg";
                    $encabezado = "<table border=0>
            <tr><td width=1120 height=70><img src=$encaenti  height=53></td></tr>
			<tr><td width=1120 height=40> </td></tr>
			<tr><td width=1120 height=40> </td></tr>
			<tr><td width=1120 height=40> </td></tr>
			<tr><td width=1120 height=80> </td></tr> 
			<tr><td width=1120 height=20>Dependencia         : $depe_nomb </td></tr>
			<tr><td width=1120 height=20>Usuario responsable : $usua_nomb </td></tr>
			<tr><td width=1120 height=20>Fecha Inicial       : $fecha_ini </td></tr>
			<tr><td width=1120 height=20>Fecha Final         : $fecha_fin </td></tr>
			<tr><td width=1120 height=20>Fecha Generado      : $fecha_dia </td></tr>
			<tr><td width=1120 height=20>Numero de Registros : $no_registros </td></tr>
			<tr><td width=1120 height=40></td></tr>
			</table>";
                    $fin = "<table border=0 >
		    <tr><td wid th=1120 height=40></td></tr>
			<tr><td width=1120 height=40 >Fecha de Entrega         ________________________________________________</td></tr>
			<tr><td width=560 height=40 > Funcionario que Entrega  ________________________________________________</td>
			<td width=560 height=30 > Funcionario que Recibe   ______________________________________________</td></tr>
			<tr><td width=1120 height=40 >Observaciones	  ____________________________________________________________________________________________________________________________________________________________________</td></tr>
			<tr><td width=1120 height=40 >__________________________________________________________________________________________________________________________________________________________________________________</td></tr>
			<tr><td width=1120 height=40></td></tr>
		</table>
		<br>";

                    $pdf->WriteHTML($encabezado . $html . $fin);
                    $arpdf_tmp = "../bodega/pdfs/planillas/envios/$krd" . date("Ymd_hms") . "_lis_IMP.pdf";
                    $pdf->Output($arpdf_tmp);
                    echo '<br>';
                    echo "<b>Para ver la planilla de envio por favor  <a class=vinculos href='$arpdf_tmp' target='" . date("dmYh") . time() . "'>Abrir Archivo Pdf</a></b>";
                    echo "<br>";
                    $salida = "csv";
                    echo "<b>Para obtener el archivo csv guarde del destino del siguiente v&iacute;nculo  <a class=vinculos href='$archivo' target='" . date("dmYh") . time() . "'>Generado
              </a></b>";
                }
                //FIN else if ($no_registros <=0)
                ?>
            </form>
            <?
        } else {
            echo "<hr><center><b><span class='alarmas'>Operacion CANCELADA</span></center></b></hr>";
        }
        ?>  
    </body>
</html>
