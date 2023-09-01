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
$url_raiz = $_SESSION['url_raiz'];
$dir_raiz = $_SESSION['dir_raiz'];
$assoc = $_SESSION['assoc'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$ruta_raiz = "..";
$nurad = $_GET["nurad"];
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


if ($nurad) {
    $ent = substr($nurad, -1);
}
include_once("$ruta_raiz/include/db/ConnectionHandler.php");

$db = new ConnectionHandler("$ruta_raiz");
//$db->conn->debug = true; 
//Modificado skina

define('ADODB_FETCH_ASSOC', $assoc);

$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
include_once "$ruta_raiz/include/tx/Historico.php";
include_once ("$ruta_raiz/class_control/TipoDocumental.php");
include_once "$ruta_raiz/include/tx/Expediente.php";
$coddepe = $dependencia;
$codusua = $codusuario;
$isqlDepR = "SELECT RADI_DEPE_ACTU,RADI_USUA_ACTU, tdoc_codi from radicado WHERE RADI_NUME_RADI = '$nurad'";
$rsDepR = $db->conn->Execute($isqlDepR);
if ($rsDepR) { // $coddepe = $rsDepR->fields['RADI_DEPE_ACTU'];
    // $codusua = $rsDepR->fields['RADI_USUA_ACTU'];
    $tdoc = $rsDepR->fields['TDOC_CODI'];
}

$trd = new TipoDocumental($db);
$encabezadol = "$PHP_SELF?" . session_name() . "=" . session_id() . "&nurad=$nurad&ent=$ent&tdoc=$tdoc&codiTRDModi=$codiTRDModi&codiTRDEli=$codiTRDEli&codserie=$codserie&tsub=$tsub&ind_ProcAnex=$ind_ProcAnex";
?>
<html>
    <head>
        <title>Tipificar Documento</title>
        <link href="<?= $ruta_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $ruta_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script>
            function regresar() {
                document.TipoDocu.submit();
            }
        </script>
    </head>
    <body bgcolor="#FFFFFF">
        <form method="GET" action="<?= $encabezadol ?>" name="TipoDocu"> 
            <input type=hidden name=nurad value='<?= $nurad ?>'>
            <?php
            /*
             * Adicion nuevo Registro
             */
            if ($insertar_registro && $tsub != 0 && $codserie != 0) {
                include_once("../include/query/busqueda/busquedaPiloto1.php");
                $sql = "SELECT $radi_nume_radi AS RADI_NUME_RADI 
				FROM SGD_RDF_RETDOCF r 
				WHERE RADI_NUME_RADI = '$nurad'
				AND  DEPE_CODI =  '$dependencia'";
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
                     /***
                     * Se realiza la busqueda la TRD para esa dependencia, si encuentra resultados, procede a asignar
                     * la TRD que se aplico para ese radicado, si la TRD no aplica para esa dependencia
                     * se procede a insertar la TRD primero y luego se asigna al radicado
                     ***/
                    $isqlTRD = "select SGD_MRD_CODIGO from SGD_MRD_MATRIRD where DEPE_CODI = '$dependencia'
                               and SGD_SRD_CODIGO = '$codserie' and SGD_SBRD_CODIGO = '$tsub' and SGD_TPR_CODIGO = '$tdoc'";
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
                    
                    $radicados = $trd->insertarTRD($codiTRDS, $codiTRD, $nurad, $coddepe, $codusua);
                    
                    $TRD = $codiTRD;
                    include "$ruta_raiz/radicacion/detalle_clasificacionTRD.php";
                    //Modificado skina
                    $sqlH = "SELECT $radi_nume_radi as RADI_NUME_RADI "
                            . "FROM SGD_RDF_RETDOCF r "
                            . "WHERE r.RADI_NUME_RADI = '$nurad'
				    AND r.SGD_MRD_CODIGO =  '$codiTRD'";
                    $rsH = $db->conn->query($sqlH);
                    $i = 0;
                    while (!$rsH->EOF) {
                        $codiRegH[$i] = $rsH->fields['RADI_NUME_RADI'];
                        $i++;
                        $rsH->MoveNext();
                    }
                    $observa = 'Asignación de TRD';
                    $Historico = new Historico($db);
                    
                    $radiModi = $Historico->insertarHistorico($codiRegH, $dependencia, $codusuario, $dependencia, $codusuario, $observa, 32);
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
                <table width="75%" border="1" cellspacing="1" cellpadding="0" align="center" class="borde_tab">
                    <tr>
                    <div id="titulo" style="width: 75%;" align="center">Cuadro de clasificacion documental - radicado No&nbsp;<?= $nurad ?></div>
                    </tr>
                    <tr >
                        <td class="titulos5" >Serie</td>
                        <td class=listado2 >
                            <?php
                            if (!$tdoc)
                                $tdoc = 0;
                            if (!$codserie)
                                $codserie = 0;
                            if (!$tsub)
                                $tsub = 0;
                            $fechah = date("dmy") . " " . time();
                            $fecha_hoy = Date("Y-m-d");
                            $sqlFechaHoy = $db->conn->DBDate($fecha_hoy);
                            $sqlFechaHoy2 = $db->conn->SQLDate('Y-m-d', $db->conn->sysTimeStamp);
                            $check = 1;
                            $fechaf = date("dmy") . "_" . time();
                            $num_car = 4;
                            $nomb_varc = "s.sgd_srd_codigo";
                            $nomb_varde = "s.sgd_srd_descrip";
                            include "$ruta_raiz/include/query/trd/queryCodiDetalle.php";
                            $querySerie = "select distinct ($sqlConcat) as detalle, s.sgd_srd_codigo 
	         from sgd_mrd_matrird m, sgd_srd_seriesrd s
			 where m.depe_codi = '$dependencia'
			 	   and s.sgd_srd_codigo = m.sgd_srd_codigo
			       and " . $sqlFechaHoy2 . " between $sgd_srd_fechini and $sgd_srd_fechfin
			 order by detalle
			  ";

                            $rsD = $db->conn->query($querySerie);
                            $comentarioDev = "Muestra las Series Docuementales";
                            include "$ruta_raiz/include/tx/ComentarioTx.php";
                            print $rsD->GetMenu2("codserie", $codserie, "0:-- Seleccione --", false, "", "onChange='submit()' class='select' aria-label='Lista de series disponibles para asignar' ");
                            ?>   
                        </td>
                    </tr>
                    <tr>
                        <td class="titulos5" >Subserie</td>
                        <td class=listado2 >
                            <?php
                            $nomb_varc = "su.sgd_sbrd_codigo";
                            $nomb_varde = "su.sgd_sbrd_descrip";
                            include "$ruta_raiz/include/query/trd/queryCodiDetalle.php";
                            $querySub = "select distinct ($sqlConcat) as detalle, su.sgd_sbrd_codigo 
                            from sgd_mrd_matrird m, sgd_sbrd_subserierd su
                            where m.depe_codi = '$dependencia'
                            and m.sgd_srd_codigo = '$codserie'
                            and su.sgd_srd_codigo = '$codserie'
                            and su.sgd_sbrd_codigo = m.sgd_sbrd_codigo
                            and " . $sqlFechaHoy2 . " between $sgd_sbrd_fechini and $sgd_sbrd_fechfin
                            order by detalle";
                            $rsSub = $db->conn->query($querySub);
                            include "$ruta_raiz/include/tx/ComentarioTx.php";
                            print $rsSub->GetMenu2("tsub", $tsub, "0:-- Seleccione --", false, "", "onChange='submit()' class='select' aria-label='Lista de subseries disponibles de la serie seleccionada'");
                            ?> 
                        </td>
                    </tr>
<!--                    <tr>
                        <td class="titulos5" >TIpo de documento</td>
                        <td class=listado2>
                            <?php
//                            $nomb_varc = "t.sgd_tpr_codigo";
//                            $nomb_varde = "t.sgd_tpr_descrip";
//                            include "$ruta_raiz/include/query/trd/queryCodiDetalle.php";
//                            $queryTip = "select distinct ($sqlConcat) as detalle, t.sgd_tpr_codigo 
//                            from sgd_mrd_matrird m, sgd_tpr_tpdcumento t
//                            where m.depe_codi = '$dependencia'
//                            and m.sgd_mrd_esta = '1'
//                            and m.sgd_srd_codigo = '$codserie'
//                            and m.sgd_sbrd_codigo = '$tsub'
//                            and t.sgd_tpr_codigo = m.sgd_tpr_codigo
//                            order by detalle
//                            ";
//
//                            $rsTip = $db->conn->query($queryTip);
//                            $ruta_raiz = "..";
//                            include "$ruta_raiz/include/tx/ComentarioTx.php";
//                            print $rsTip->GetMenu2("tdoc", $tdoc, "0:-- Seleccione --", false, "", "onChange='submit()' class='select' aria-label='Lista de tipos docuemntales disponibles de la serie y subserie'");
                            ?>
                        </td>
                    </tr>-->
                </table>
                <table border=0 width=75% align="center" class="borde_tab">
                    <tr align="center" class="listado1">
                        <td width="33%" height="25" align="center">
                    <center><input name="insertar_registro" type=submit class="botones_mediano" value=" Insertar " aria-label="Agregar Clasificacion de trd"></center></TD>
                    <td width="33%" height="25">
                    <center><input name="actualizar" type="button" class="botones_mediano" id="envia23" onClick="procModificar();"value=" Modificar " aria-label='Modificar el registro actual de trd'></center></TD>
                    <td width="33%"  height="25">
                    <center><input name="Cerrar" type="button" class="botones_mediano" id="envia22" onClick="opener.regresar();window.close();"value="Cerrar" aria-label="Cerrar Ventana"></center></TD>
                    </tr>
                </table>
                <table width="75%" border="0" cellspacing="1" cellpadding="0" align="center" class="borde_tab">
                    <tr align="center">
                        <td>
                            <?
                            include "lista_tiposAsignados.php";
                            if ($ind_ProcAnex == "S") {
                            echo " <br> <input type='button' value='Cerrar' class='botones_largo' onclick='opener.regresar();window.close();'> ";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </center>
            <script>
                function borrarArchivo(anexo, linkarch) {
                    if (confirm('Esta seguro de borrar este Registro ?')){
                        nombreventana = "ventanaBorrarR1";
                        url = "tipificar_documentos_transacciones.php?borrar=1&nurad=<?= $nurad ?>&codiTRDEli=" + anexo + "&linkarchivo=" + linkarch;
                        window.open(url, nombreventana, 'height=250,width=300');
                    }
                    return;
                }
                function procModificar() {
                    if (document.TipoDocu.codserie.value != 0 && document.TipoDocu.tsub.value != 0){
                        <?php
                        $sql = "SELECT RADI_NUME_RADI
                        FROM SGD_RDF_RETDOCF 
                        WHERE RADI_NUME_RADI = '$nurad'
                        AND  DEPE_CODI =  '$coddepe'";
                        $rs = $db->conn->query($sql);
                        $radiNumero = $rs->fields["RADI_NUME_RADI"];
                        if ($radiNumero != '') {
                            ?>
                            if (confirm('Esta Seguro de Modificar el Registro de su Dependencia ?')) {
                                nombreventana = "ventanaModiR1";
                                url = "tipificar_documentos_transacciones.php?modificar=1&usua=<?= $krd ?>&codusua=<?= $codusua ?>&tdoc=<?= $tdoc ?>&tsub=<?= $tsub ?>&codserie=<?= $codserie ?>&coddepe=<?= $coddepe ?>&codusuario=<?= $codusuario ?>&dependencia=<?= $dependencia ?>&nurad=<?= $nurad ?>";
                                window.open(url, nombreventana, 'height=200,width=300');
                            }
                            <?php
                        } else {
                            ?>
                                alert("No existe Registro para Modificar ");
                            <?php
                        }
                        ?>
                    } else
                    {
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
