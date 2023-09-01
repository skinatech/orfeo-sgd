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


/*
 * Lista Subseries documentales
 * @autor Jairo Losada
 * @fecha 2009/06 Modificacion Variables Globales.
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;
$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
if (!$_SESSION['dependencia'])
    include "$dir_raiz/rec_session.php";
if (!isset($coddepe))
    $coddepe = $dependencia;
if (!isset($tsub))
    $tsub = 0;
if (!isset($codserie))
    $codserie = 0;
$fecha_fin = date("Y/m/d");
$where_fecha = "";
//error_reporting(7);
?>
<html>
    <head>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>

    <body bgcolor="#FFFFFF" topmargin="0" >
        <div id="spiffycalendar" class="text"></div>
        <link rel="stylesheet" type="text/css" href="js/spiffyCal/spiffyCal_v2_1.css">
        <?php
        include_once "$dir_raiz/include/db/ConnectionHandler.php";
        $db = new ConnectionHandler("$dir_raiz");
// $db->conn->debug = true;

        if (!isset($filtroSelect))
            $filtroSelect = "";
        if (!isset($accion_sal))
            $accion_sal = "";
        if (!isset($tpAnulacion))
            $tpAnulacion = "";
        if (!isset($orderTipo))
            $orderTipo = "";
        if (!isset($orderNo))
            $orderNo = "";
        $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&filtroSelect=$filtroSelect&accion_sal=$accion_sal&dependencia=$dependencia&tpAnulacion=$tpAnulacion&orderNo=";
        $linkPagina = "$PHP_SELF?$encabezado&accion_sal=$accion_sal&orderTipo=$orderTipo&orderNo=$orderNo";
        /*  GENERACION LISTADO DE RADICADOS
         *  Aqui utilizamos la clase adodb para generar el listado de los radicados
         *  Esta clase cuenta con una adaptacion a las clases utiilzadas de orfeo.
         *  el archivo original es adodb-pager.inc.php la modificada es adodb-paginacion.inc.php
         */
        ?>
        <form name=formEnviar action='../trd/procModTrdArea.php?<?= session_name() . "=" . session_id() . "&krd=$krd" ?>&estado_sal=<?= $estado_sal ?>&estado_sal_max=<?= $estado_sal_max ?>&pagina_sig=<?= $pagina_sig ?>&dep_sel=<?= $dep_sel ?>&nomcarpeta=<?= $nomcarpeta ?>&orderNo=<?= $orderNo ?>' method=post>
            <?php
            if ($activar_trda) {
                $valCambio = '1';
            }
            if ($desactivar_trda) {
                $valCambio = '0';
            }

            if ($activar_trda or $desactivar_trda) {
                if ($codserie != 0) {
                    $var_where = " and sgd_srd_codigo = '$codserie'";
                    if ($tsub != 0) {
                        $var_where = $var_where . " and sgd_sbrd_codigo = '$tsub'";
                        if ($tdoc != 0) {
                            $var_where = $var_where . " and sgd_tpr_codigo = '$tdoc'";
                        }
                    }
                    $bien = true;
                    if ($bien) {
                        $isqlActi = "update SGD_MRD_MATRIRD set SGD_MRD_ESTA='$valCambio' " .
                                "where depe_codi = '$coddepe'" . $var_where;
                        $bien = $db->query($isqlActi);
                    }
                    if ($bien) {
                        $mensaje = "Modificado el Estado de la Relacion segun los parametros seleccionados<br> ";
                        $db->conn->CommitTrans();
                    } else {
                        $mensaje = "No fue posible Activar la Relacion segun los parametros</br>";
                        $db->conn->RollbackTrans();
                    }
                } else {
                    echo "<script>alert('Debe seleccionar por lo menos la Serie');</script>";
                }
            }
            ?>
            <!--<table class=borde_tab width='100%' cellspacing="5"><tr><td class=titulos2><center>MODIFICACION RELACION TRD</center></td></tr></table>-->
            <center>
                <br>
                <div id="titulo" style="width: 950px;" align="center">Modificaci&oacute;n relaci&oacute;n TRD</div> 
                <TABLE width="950" border='1' class="borde_tab" cellspacing="5">  
                    <TR>
                        <td width="125" height="21"  class='titulos2'> <label for="coddepe">Dependencia</label></td>
                        <td colspan="3"  class="listado2"> 
                            <?php
                            include_once "$dir_raiz/include/query/envios/queryPaencabeza.php";
                            $sqlConcat = $db->conn->Concat($db->conn->substr . "($conversion,1,5) ", "'-'", $db->conn->substr . "(depe_nomb,1,30) ");
                            $sql = "select $sqlConcat ,depe_codi from dependencia where depe_estado=1
							order by depe_codi
							";
                            $rsDep = $db->conn->Execute($sql);
                            if (!$depeBuscada)
                                $depeBuscada = $dependencia;
                            print $rsDep->GetMenu2("coddepe", "$coddepe", false, false, 0, " onChange='submit();' class='select' id='coddepe' title='Listado de las dependencias existentes'");
                            ?>
                        </td>
                    </tr>
                    <TR>
                        <TD width="125" height="21"  class='titulos2'> <label for="codserie">Serie</label> </td>
                        <td colspan="3"  class="listado2"> 
                            <?php
                            include "$dir_raiz/trd/actu_matritrd.php";
                            if (!$codserie)
                                $codserie = 0;
                            $fechah = date("dmy") . " " . time();
                            $fecha_hoy = Date("Y-m-d");
                            $sqlFechaHoy = $db->conn->DBDate($fecha_hoy);
                            $check = 1;
                            $fechaf = date("dmy") . "_" . time();
                            $num_car = 4;
                            $nomb_varc = "s.sgd_srd_codigo";
                            $nomb_varde = "s.sgd_srd_descrip";
                            include "$dir_raiz/include/query/trd/queryCodiDetalle.php";
                            $querySerie = "select distinct ($sqlConcat) as detalle, s.sgd_srd_codigo 
	      from sgd_srd_seriesrd s,sgd_mrd_matrird m
		  where s.sgd_srd_codigo = m.sgd_srd_codigo 
		  and m.depe_codi = '$coddepe'
		  order by detalle
		  ";
                            $rsD = $db->conn->query($querySerie);
                            $comentarioDev = "Muestra las Series Docuementales";
                            include "$dir_raiz/include/tx/ComentarioTx.php";
                            print $rsD->GetMenu2("codserie", $codserie, "0:-- Seleccione --", false, "", "onChange='submit()' class='select' id='codserie' title='Listado de todas las series existentes'");
                            ?>
                    <TR>
                        <TD width="125" height="21"  class='titulos2'><label for="tsub"> Subserie</label></td>
                        <td colspan="3"  class="listado2"> 
                            <?php
                            $nomb_varc = "su.sgd_sbrd_codigo";
                            $nomb_varde = "su.sgd_sbrd_descrip";
                            include "$dir_raiz/include/query/trd/queryCodiDetalle.php";
                            $querySub = "select distinct ($sqlConcat) as detalle, su.sgd_sbrd_codigo 
	      from sgd_sbrd_subserierd su, sgd_mrd_matrird m 
		  where su.sgd_srd_codigo = '$codserie'
 		  and " . $sqlFechaHoy . " between su.sgd_sbrd_fechini and su.sgd_sbrd_fechfin
		  and m.depe_codi = '$coddepe'
		  and su.sgd_srd_codigo = m.sgd_srd_codigo 
			 order by detalle
			  ";
                            $rsSub = $db->conn->query($querySub);
                            include "$dir_raiz/include/tx/ComentarioTx.php";
                            print $rsSub->GetMenu2("tsub", $tsub, "0:-- Todas las subseries documentales --", false, "", "onChange='submit()' class='select' id='tsub' title='Listado de subseries'");
                            ?> 
                        </td>
                    <TR>
                        <TD width="125" height="21"  class='titulos2'><label for="tdoc">Tipo documental</label></td>
                        <td colspan="3"  class="listado2"> 
                            <?php
                            $nomb_varc = "t.sgd_tpr_codigo";
                            $nomb_varde = "t.sgd_tpr_descrip";
                            include "$dir_raiz/include/query/trd/queryCodiDetalle.php";
                            $queryTipDcto = "select distinct ($sqlConcat) as detalle, t.sgd_tpr_codigo 
	          from sgd_tpr_tpdcumento t, sgd_mrd_matrird m ,sgd_sbrd_subserierd su
			  where m.depe_codi = '$coddepe'
			  and m.sgd_srd_codigo = '$codserie'
			  and m.sgd_sbrd_codigo = '$tsub'
			  and m.sgd_tpr_codigo = t.sgd_tpr_codigo
 			  and " . $sqlFechaHoy . " between su.sgd_sbrd_fechini and su.sgd_sbrd_fechfin
		      and su.sgd_srd_codigo = m.sgd_srd_codigo 
 		      and su.sgd_sbrd_codigo = m.sgd_sbrd_codigo
			 order by detalle
			  ";
                            $rsTipDcto = $db->conn->query($queryTipDcto);
                            include "$dir_raiz/include/tx/ComentarioTx.php";
                            print $rsTipDcto->GetMenu2("tdoc", $tdoc, "0:-- Todos los tipos documentales --", false, "", "onChange='submit()' class='select' id='tdoc' title='Listado de tipos documentales'");
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td height="26" colspan="4" valign="top" class='listado1'> 
                    <center>
                        <input type=submit name=activar_trda value='Activar' class=botones_mediano aria-label="Activar relación">
                        <input type=submit name=desactivar_trda value='Desactivar' class=botones_mediano aria-label="Desactivar relación"> 
                        </td>
                        </tr>
                        </table>
                        <br>
                        <?php echo "<hr><center><b><span class='alarmas'>$mensaje</span></center></b></hr>"; ?>
                        </form>
                        </body>
                        </html>
