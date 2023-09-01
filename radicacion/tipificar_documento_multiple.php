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
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


/* By skinatech
 * creamos una funcion para que permtia seleccionar varios documentos y asignarle TRD al mismo tiempo
 */
foreach ($_GET as $key => $valor) ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor;

$nomcarpeta = $_GET["nomcarpeta"];
if ($_GET["tipo_carp"])
    $tipo_carp = $_GET["tipo_carp"];

$whereFiltro = $_GET["whereFiltro"];
$whereFiltro2 = ltrim($_GET["whereFiltro2"], "'");
//echo $whereFiltro;
$record_id = $_GET["record_id"];
if ($_GET["codserie"])
    $codserie = $_GET["codserie"];
if ($_GET["tsub"])
    $tsub = $_GET["tsub"];
if ($_GET["tdoc"])
    $tdoc = $_GET["tdoc"];
if ($_GET["insertar_registro"])
    $insertar_registro = $_GET["insertar_registro"];
if ($_GET["actualizar"])
    $actualizar = $_GET["actualizar"];
if ($_GET["borrar"])
    $borrar = $_GET["borrar"];
if ($_GET["linkarchivo"])
    $linkarchivo = $_GET["linkarchivo"];
//defino el case en 1 para mayusculas
define('ADODB_ASSOC_CASE', 1);
$ADODB_FETCH_MODE = $ADODB_FETCH_ASSOC;

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];

if (!isset($_SESSION['dependencia']))
    include "./rec_session.php";

if (!$nurad)
    $nurad = $record_id;
//by skina	if($nurad)
if ($record_id) {
    //by skina	$ent = substr($nurad,-1);
    $ent = substr($record_id, -1);
}

include_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$dir_raiz");
//Modificado skina
//$db->conn->debug = true;

$record_id = $whereFiltro;

$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

include_once "$dir_raiz/include/tx/Historico.php";
include_once ("$dir_raiz/class_control/TipoDocumentalMultiple.php");
include_once "$dir_raiz/include/tx/Expediente.php";
$coddepe = $dependencia;
$codusua = $codusuario;

while (list($recordid, $tmp) = each($record_id)) {
    $record_id = $recordid;
    $isqlDepR = "SELECT RADI_DEPE_ACTU,RADI_USUA_ACTU from radicado WHERE RADI_NUME_RADI = '$record_id'";
    $rsDepR = $db->conn->Execute($isqlDepR);
}
if ($rsDepR) { // $coddepe = $rsDepR->fields['RADI_DEPE_ACTU'];
    // $codusua = $rsDepR->fields['RADI_USUA_ACTU'];
}

$trd = new TipoDocumental($db);
$encabezadol = "$PHP_SELF?" . session_name() . "=" . session_id() . "&krd=$krd&record_id=$record_id&whereFiltro=$whereFiltro&whereFiltro2=$whereFiltro2&coddepe=$coddepe&codusuario=$codusua&codusua=$codusua&codusuario=$codusuario&depende=$depende&ent=$ent&tdoc=$tdoc&codiTRDModi=$codiTRDModi&codiTRDEli=$codiTRDEli&codserie=$codserie&tsub=$tsub&ind_ProcAnex=$ind_ProcAnex";
?>
<html>
    <head>
        <title>Tipificar Documento</title>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <script>
            function confirmaTrd() {
                serie = document.TipoDocu.dserie.value;
                subserie = document.TipoDocu.dsubser.value;
                tipodocumental = document.TipoDocu.dtipodo.value;
                if (serie) {
                    opener.document.realizarTx.observa.value = 'Se asigna la TRD: ' + serie + '/' + subserie + '/' + tipodocumental;
                    opener.document.realizarTx.observa.focus();
                }
                document.TipoDocu.submit();
                opener.focus();
            }

            function regresar() {
                document.TipoDocu.submit();
            }
        </script>
    </head>
    <body bgcolor="#FFFFFF">
        <form method="GET" action="<?= $encabezadol ?>" name="TipoDocu" id="TipoDocu"> 
            <?php
            /*
             * Adicion nuevo Registro
             */
            if ($insertar_registro && $tdoc != 0 && $tsub != 0 && $codserie != 0) {
                include_once("../include/query/busqueda/busquedaPiloto1.php");
                $sql = "SELECT radi_nume_radi AS RADI_NUME_RADI 
                        FROM SGD_RDF_RETDOCF b 
                        WHERE DEPE_CODI =  '$dependencia'" .
                        $whereFiltro;
                $rs = $db->conn->query($sql);
                $radiNumero = $rs->fields["RADI_NUME_RADI"];
                if ($radiNumero != '') {
                    $codserie = 0;
                    $tsub = 0;
                    $tdoc = 0;
                    $mensaje_err = "<HR>
		   <center><B><FONT COLOR=RED>
		   	Ya existe una Clasificacion para esta dependencia <$coddepe> <BR>  VERIFIQUE LA INFORMACION E INTENTE DE NUEVO
		   	</FONT></B></center>
		   	<HR>";
                } else {
                    $isqlTRD = "select SGD_MRD_CODIGO "
                            . "from SGD_MRD_MATRIRD "
                            . "where DEPE_CODI = '$dependencia' "
                            . "and SGD_SRD_CODIGO = '$codserie' "
                            . "and SGD_SBRD_CODIGO = '$tsub'"
                            . "and SGD_TPR_CODIGO = '$tdoc'";
                    $rsTRD = $db->conn->Execute($isqlTRD);
                    $mrd_sgd_mrd_codigo = $rsTRD->fields["SGD_MRD_CODIGO"];
                                        
                    if($mrd_sgd_mrd_codigo == ''){
                        $conteoTRd = "select max(SGD_MRD_CODIGO) as maximo from SGD_MRD_MATRIRD";
                        $rsconteoTRd = $db->conn->Execute($conteoTRd);
                        $idMrd = $rsconteoTRd->fields['MAXIMO'] + 1;
                        /***
                         * Inserta en la tabla de retención documental la combinación de serie/subserie/tipo documental
                         * en caso que el tipo docuemntal asignado al radicado no se encuentre la TRD
                         ***/
                        $inserTRD = "insert into SGD_MRD_MATRIRD values ($idMrd,'$dependencia',$codserie,$tsub,$tdoc,'Electronico','".date('Y-m-d')."','2050-12-31','1')";
                        $rsInsertTRD = $db->conn->Execute($inserTRD);        
                        
                        if($rsInsertTRD){
                            
                            $isqlTRD = "select SGD_MRD_CODIGO from SGD_MRD_MATRIRD where DEPE_CODI = '$dependencia'
                               and SGD_SRD_CODIGO = '$codserie' and SGD_SBRD_CODIGO = '$tsub' and SGD_TPR_CODIGO = '$tdoc'";
                            $rsTRD = $db->conn->Execute($isqlTRD);
                        }
                    }
                    $i = 0;
                    while (!$rsTRD->EOF) {
                        $codiTRDS[$i] = $rsTRD->fields['SGD_MRD_CODIGO'];
                        $codiTRD = $rsTRD->fields['SGD_MRD_CODIGO'];
                        $i++;
                        $rsTRD->MoveNext();
                    }
                    
                    $radicadosExplode = explode(',', $whereFiltro2);
//                    $whereFiltro2 = substr($whereFiltro2, 0, (strlen($whereFiltro2) - 1));
//                    $whereFiltro2 = str_replace("''", "'", $whereFiltro2);
                    for ($x = 0; $x < count($radicadosExplode); $x++) {    
                        if ($radicadosExplode[$x] != '') {
                            $radicados = $trd->insertarTRD($codiTRDS, $codiTRD, $radicadosExplode[$x], $coddepe, $codusua);
                        }
                    }
                    
                    $TRD = $codiTRD;
                    include "$dir_raiz/radicacion/detalle_clasificacionTRD.php";
                    $sqlH = "SELECT radi_nume_radi as RADI_NUME_RADI FROM SGD_RDF_RETDOCF b  WHERE SGD_MRD_CODIGO =  '$codiTRD'" . $whereFiltro;
                    $rsH = $db->conn->query($sqlH);
                    $i = 0;
                    while (!$rsH->EOF) {
                        $codiRegH[$i] = $rsH->fields['RADI_NUME_RADI'];
                        $i++;
                        $rsH->MoveNext();
                    }
                    
                    $observa = 'Asignación de TRD';
                    $Historico = new Historico($db);
                    
                    if (isset($_GET['multiple'])) {
                        $codTrans = 61;
                        $radiModi = $Historico->insertarHistorico($codiRegH, $dependencia, $codusuario, $dependencia, $codusuario, $observa, $codTrans);
                    }
                    /*
                     * Actualiza el campo tdoc_codi de la tabla Radicados
                     */
                    $radiUp = $trd->actualizarTRD($codiRegH, $tdoc);
                    
                    // Sea para actualizar o para la inserción de la TRD en el radicado se aplica a los anexos
                    $trd->insertarAnexoTRD($nurad, $codserie, $tsub);
                    
                    $codserie = 0;
                    $tsub = 0;
                    $tdoc = 0;
                }
            }
            ?>  
            <center>
                <div id="titulo" style="width: 70%;" align="center" >Aplicación de la TRD</div>
                <table width="70%" border="1" cellspacing="1" cellpadding="0" align="center" class="borde_tab">
                    <tr >
                        <td class="titulos5">SERIE</td>
                        <td class='listado2'>
                            <?php
                            if (!$tdoc)
                                $tdoc = 0;
                            if (!$codserie)
                                $codserie = 0;
                            if (!$tsub)
                                $tsub = 0;
                            $fechah = date("dmy") . " " . time();
                            $fecha_hoy = date();
                            $sqlFechaHoy = $db->conn->SQLDate('Y-m-d', $fecha_hoy);
                            $check = 1;
                            $fechaf = date("dmy") . "_" . time();
                            $num_car = 4;
                            $nomb_varc = "s.sgd_srd_codigo";
                            $nomb_varde = "s.sgd_srd_descrip";
                            include "$dir_raiz/include/query/trd/queryCodiDetalle.php";
                            $sqlFechaHoy = $db->conn->SQLDate('Y-m-d', $fecha_hoy);
                            $querySerie = "select distinct ($sqlConcat) as detalle, s.sgd_srd_codigo 
	         from sgd_mrd_matrird m, sgd_srd_seriesrd s
			 where m.depe_codi = '$dependencia'
			 	   and s.sgd_srd_codigo = m.sgd_srd_codigo
			       and " . $sqlFechaHoy . " between $sgd_srd_fechini and $sgd_srd_fechfin
			 order by detalle
			  ";
                            $rsD = $db->conn->query($querySerie);
                            $comentarioDev = "Muestra las Series Docuementales";
                            include "$dir_raiz/include/tx/ComentarioTx.php";
                            print $rsD->GetMenu2("codserie", $codserie, "0:-- Seleccione --", false, "", "onChange='submit()' class='select' aria-label='Lista con las series documentales disponibles'");
                            ?>   
                        </td>
                    </tr>
                    <tr>
                        <td class="titulos5" >SUBSERIE</td>
                        <td class='listado2' >
                            <?php
                            $nomb_varc = "su.sgd_sbrd_codigo";
                            $nomb_varde = "su.sgd_sbrd_descrip";
                            include "$dir_raiz/include/query/trd/queryCodiDetalle.php";
                            $sqlFechaHoy=$db->conn->SQLDate('Y-m-d',$fecha_hoy);
                            $querySub = "select distinct ($sqlConcat) as detalle, su.sgd_sbrd_codigo 
                            from sgd_mrd_matrird m, sgd_sbrd_subserierd su
                            where m.depe_codi = '$dependencia'
                            and m.sgd_srd_codigo = '$codserie'
                            and su.sgd_srd_codigo = '$codserie'
                            and su.sgd_sbrd_codigo = m.sgd_sbrd_codigo
                            and ".$sqlFechaHoy." between $sgd_sbrd_fechini and $sgd_sbrd_fechfin
                            order by detalle
                            ";
                            $rsSub=$db->conn->query($querySub);
                            include "$dir_raiz/include/tx/ComentarioTx.php";
                            print $rsSub->GetMenu2("tsub", $tsub, "0:-- Seleccione --", false,"","onChange='submit()' class='select' aria-label='Lista de subseries disponibles de la serie seleccionada'" );

                            ?> 
                        </td>
                    </tr>
                    <tr>
                        <td class="titulos5" >TIPO DE DOCUMENTO</td>
                        <td class='listado2' >
                            <?php
                            $nomb_varc = "t.sgd_tpr_codigo";
                            $nomb_varde = "t.sgd_tpr_descrip";
                            include "$dir_raiz/include/query/trd/queryCodiDetalle.php"; 
                            $queryTip = "select distinct ($sqlConcat) as detalle, t.sgd_tpr_codigo 
                            from sgd_mrd_matrird m, sgd_tpr_tpdcumento t
                            where m.depe_codi = '$dependencia'
                            and m.sgd_mrd_esta = '1'
                            and m.sgd_srd_codigo = '$codserie'
                            and m.sgd_sbrd_codigo = '$tsub'
                            and t.sgd_tpr_codigo = m.sgd_tpr_codigo
                            order by detalle
                            ";

                            $rsTip=$db->conn->query($queryTip);
                            include "$dir_raiz/include/tx/ComentarioTx.php";
                            print $rsTip->GetMenu2("tdoc", $tdoc, "0:-- Seleccione --", false,"","onChange='submit()' class='select' aria-label='Lista de tipos documentales disponibles de la serie y subserie seleccionada'" );
                            ?>

                        </td>
                    </tr>
                </table>
                <br>
                <table border=1 width=70% align="center" class="borde_tab">
                    <tr align="center" class="listado1">
                        <td width="33%" height="25"  align="center">
                            <input type="hidden" name="krd" value="<?= $krd ?>">  
                            <input type="hidden" name="record_id" value="<?= $record_id ?>">
                            <input type="hidden" name="whereFiltro" value="<?= $whereFiltro ?>"> 
                            <input type="hidden" name="whereFiltro2" value="<?= $whereFiltro2 ?>"> 
                            <input type="hidden" name="coddepe" value="<?= $coddepe ?>"> 
                            <input type="hidden" name="codusuario" value="<?= $codusuario ?>"> 
                            <input type="hidden" name="codusua" value="<?= $codusua ?>"> 
                            <input type="hidden" name="depende" value="<?= $depende ?>"> 
                            <input type="hidden" name="ent" value="<?= $ent ?>"> 
                            <input type="hidden" name="codiTRDModi" value="<?= $codiTRDModi ?>"> 
                            <input type="hidden" name="codiTRDEli" value="<?= $codiTRDEli ?>"> 
                            <input type="hidden" name="ind_ProcAnex" value="<?= $ind_ProcAnex ?>"> 


                    <center><input name="insertar_registro" type=submit class="botones" value=" Insertar " onClick="confirmaTrd();" aria-label="Agregar clasificación trd"></center></TD>
                    <td width="33%"  height="25">
                    <center><input name="actualizar" type="button" class="botones" id="envia23" onClick="procModificar();"value=" Modificar " aria-label="Modificar la clasificacion de trd actual"></center></TD>
                    <td width="33%"  height="25">
                    <center><input name="Cerrar" type="button" class="botones" id="envia22" onClick="opener.focus(); window.close();"value="Cerrar" aria-label="Cerrar la ventana"></center></TD>
                    </tr>
                </table>
                <table width="70%" border="0" cellspacing="1" cellpadding="0" align="center" class="borde_tab">
                    <tr align="center">
                        <td>
                            <?php
                            include "lista_tiposAsignadosMultiple.php";
                            if ($ind_ProcAnex == "S") {
                                echo " <br> <input type='button' value='Cerrar' class='botones_largo' onclick='opener.regresar();window.close();' aria-label='Cerrar Ventana'> ";
                            }
                            ?>
                            <input type="hidden" name="dserie" id="dserie" value="<?= $dserie ?>" />                
                            <input type="hidden" name="dsubser" id="dsubser" value="<?= $dsubser ?>" />
                            <input type="hidden" name="dtipodo" id="dtipodo" value="<?= $dtipodo ?>" />
                        </td>
                    </tr>
                </table>
            </center>
            <script>
                function borrarArchivo(anexo, linkarch) {
                    if (confirm('Esta seguro de borrar este Registro ?')){
                        nombreventana = "ventanaBorrarR1";
                        // by skina		
                        // url="tipificar_documentos_transacciones.php?borrar=1&usua=<?= $krd ?>&codusua=<?= $codusua ?>&coddepe=<?= $coddepe ?>&codusuario=<?= $codusuario ?>&dependencia=<?= $dependencia ?>&nurad=<?= $nurad ?>&codiTRDEli="+anexo+"&linkarchivo="+linkarch;
                        url = "tipificar_documentos_transacciones_multiple.php?whereFiltro=<?= $whereFiltro ?>&whereFiltro2=<?= $whereFiltro2 ?>&borrar=1&usua=<?= $krd ?>&codusua=<?= $codusua ?>&coddepe=<?= $coddepe ?>&codusuario=<?= $codusuario ?>&dependencia=<?= $dependencia ?>&record_id=<?= $record_id ?>&codiTRDEli=" + anexo + "&linkarchivo=" + linkarch;
                        window.open(url, nombreventana, 'height=250,width=300');
                    }
                    return;
                }

                function procModificar() {
                    if (document.TipoDocu.tdoc.value != 0 && document.TipoDocu.codserie.value != 0 && document.TipoDocu.tsub.value != 0) {
                        <?php
                        $sql = "SELECT RADI_NUME_RADI FROM SGD_RDF_RETDOCF b WHERE DEPE_CODI =  '$coddepe' $whereFiltro";
                        $rs = $db->conn->query($sql);
                        $radiNumero = $rs->fields["RADI_NUME_RADI"];
                        if ($radiNumero != '') {
                            ?>
                            if (confirm('Esta Seguro de Modificar el Registro de su Dependencia ?')) {
                                nombreventana = "ventanaModiR1";
                                // by skina	url="tipificar_documentos_transacciones_multiple.php?modificar=1&usua=<?= $krd ?>&codusua=<?= $codusua ?>&tdoc=<?= $tdoc ?>&tsub=<?= $tsub ?>&codserie=<?= $codserie ?>&coddepe=<?= $coddepe ?>&codusuario=<?= $codusuario ?>&dependencia=<?= $dependencia ?>&nurad=<?= $nurad ?>";
                                url = "tipificar_documentos_transacciones_multiple.php?modificar=1&usua=<?= $krd ?>&codusua=<?= $codusua ?>&tdoc=<?= $tdoc ?>&tsub=<?= $tsub ?>&codserie=<?= $codserie ?>&coddepe=<?= $coddepe ?>&codusuario=<?= $codusuario ?>&dependencia=<?= $dependencia ?>&record_id=<?= $record_id ?>&whereFiltro=<?= $whereFiltro ?>&whereFiltro2=<?= $whereFiltro2 ?>";
                                window.open(url, nombreventana, 'height=200,width=300 scrollbar=yes');
                            }
                            <?php
                        } else {
                            ?>
                            alert("No existe Registro para Modificar ");
                            <?php
                        }
                        ?>
                    } else {
                        alert("Campos obligatorios ");
                    }
                    return;
                }
            </script>
        </form>
    </span>
    <p>
<?= $mensaje_err ?>
    </p>
</span>
</body>
</html>
