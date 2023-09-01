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
$krdOld = $krd;
// Modificado SGD 10-Septiembre-2007
if (!isset($codDpto)) {
    $codDpto = 0;
}

if (!isset($codMuni)) {
    $codMuni = 0;
}

if (!$krd)
    $krd = $krdOld;
if (!$dir_raiz)
    $dir_raiz = "..";


foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

//include "$dir_raiz/rec_session.php";
include_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$dir_raiz");
$db2 = new ConnectionHandler("$dir_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$encabezadol = "$PHP_SELF?" . session_name() . "=" . session_id() . "&dependencia=$dependencia&krd=$krd&sel=$sel";
$encabezado = session_name() . "=" . session_id() . "&krd=$krd&tipo_archivo=1&nomcarpeta=$nomcarpeta";

function fnc_date_calcy($this_date, $num_years) {
    $my_time = strtotime($this_date); //converts date string to UNIX timestamp
    $timestamp = $my_time + ($num_years * 86400); //calculates # of days passed ($num_days) * # seconds in a day (86400)
    $return_date = date("Y-m-d", $timestamp);  //puts the UNIX timestamp back into string format
    return $return_date; //exit function and return string
}

function fnc_date_calcm($this_date, $num_month) {
    $my_time = strtotime($this_date); //converts date string to UNIX timestamp
    $timestamp = $my_time - ($num_month * 2678400 ); //calculates # of days passed ($num_days) * # seconds in a day (86400)
    $return_date = date("Y-m-d", $timestamp);  //puts the UNIX timestamp back into string format
    return $return_date; //exit function and return string
}
?>
<html height=50,width=150>
    <head>
        <title>Busqueda Avanzada en Archivo</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    <CENTER>
        <body bgcolor="#FFFFFF">
            <div id="spiffycalendar" class="text"></div>
            <link rel="stylesheet" type="text/css" href="../js/spiffyCal/spiffyCal_v2_1.css">
            <script language="JavaScript" src="../js/spiffyCal/spiffyCal_v2_1.js"></script>

            <form name=busqueda_archivo action="<?= $encabezadol ?>" method='post' action='busqueda_archivo.php?<?= session_name() ?>=<?= trim(session_id()) ?>krd=<?= $krd ?>'>
                <br>

                <?php
                // parametrizacion de items
                //$db->conn->debug=true;
                include("$dir_raiz/include/query/archivo/queryBusqueda_exp.php");
                $rs = $db->query($sql1);
                $item11 = isset($rs->fields["sgd_eit_nombre"]) ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                $tm = explode(' ', $item11);
                $item1 = $tm[0];

                include("$dir_raiz/include/query/archivo/queryBusqueda_exp.php");
                $rs = $db->query($sql12);
                $item21 = isset($rs->fields["sgd_eit_nombre"]) ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                $tm = explode(' ', $item21);
                $item2 = $tm[0];

                include("$dir_raiz/include/query/archivo/queryBusqueda_exp.php");
                $rs = $db->query($sql6);
                $item31 = isset($rs->fields["sgd_eit_nombre"]) ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                $tm = explode(' ', $item31);
                $item3 = $tm[0];

                include("$dir_raiz/include/query/archivo/queryBusqueda_exp.php");
                $rs = $db->query($sql7);
                $item41 = isset($rs->fields["sgd_eit_nombre"]) ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                $tm = explode(' ', $item41);
                $item4 = $tm[0];

                include("$dir_raiz/include/query/archivo/queryBusqueda_exp.php");
                $rs = $db->query($sql8);
                $item51 = isset($rs->fields["sgd_eit_nombre"]) ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                $tm = explode(' ', $item51);
                $item5 = $tm[0];

                include("$dir_raiz/include/query/archivo/queryBusqueda_exp.php");
                $rs = $db->query($sql9);
                $item61 = isset($rs->fields["sgd_eit_nombre"]) ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                $tm = explode(' ', $item61);
                $item6 = $tm[0];

                ?>

                <table border=1 width="90%" cellpadding="0"  class="borde_tab">

                    <div id="titulo" style="width: 90%;" align="center"> B&uacute;squeda avanzada (solo para radicados archivados)</div>

                    <tr>
                        <td class='titulos5' width="8%" align="left"><label for="codserie">&nbsp;<label for="codserie">SERIE</label></label> </td>
                        <td class='listado2' width="20%" colspan="1">
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
                            $check = 1;
                            $fechaf = date("dmy") . "_" . time();
                            $num_car = 4;
                            $nomb_varc = "s.sgd_srd_codigo";
                            $nomb_varde = "s.sgd_srd_descrip";
                            include "$dir_raiz/include/query/trd/queryCodiDetalle.php";
                            $querySerie = "select distinct ($sqlConcat) as detalle, s.sgd_srd_codigo from sgd_mrd_matrird m, sgd_srd_seriesrd s where s.sgd_srd_codigo = m.sgd_srd_codigo and " . $sqlFechaHoy . " between s.sgd_srd_fechini and s.sgd_srd_fechfin order by detalle ";
                            $rsD = $db->conn->query($querySerie);
                            $comentarioDev = "Muestra las Series Docuementales";
                            include "$dir_raiz/include/tx/ComentarioTx.php";
                            print $rsD->GetMenu2("codserie", $codserie, "0:-- Seleccione --", false, "", "onChange='submit()' class='form-control select' id='codserie' title='Listado de todas las series existentes'");
                            ?>
                        </td>
                        <td class='titulos5' width="8%" align="left"><label for="tsub"><label for="tsub">SUBSERIE</label></label></td>
                        <td class='listado2' colspan="4">
                            <?php
                            $nomb_varc = "su.sgd_sbrd_codigo";
                            $nomb_varde = "su.sgd_sbrd_descrip";
                            include "$dir_raiz/include/query/trd/queryCodiDetalle.php";
                            $querySub = "select distinct ($sqlConcat) as detalle, su.sgd_sbrd_codigo from sgd_mrd_matrird m, sgd_sbrd_subserierd su where m.sgd_srd_codigo = '$codserie' and su.sgd_srd_codigo = '$codserie' and su.sgd_sbrd_codigo = m.sgd_sbrd_codigo and " . $sqlFechaHoy . " between su.sgd_sbrd_fechini and su.sgd_sbrd_fechfin order by detalle ";
                            $rsSub = $db->conn->query($querySub);
                            include "$dir_raiz/include/tx/ComentarioTx.php";
                            print $rsSub->GetMenu2("tsub", $tsub, "0:-- Seleccione --", false, "", "onChange='submit()' class='form-control select' id='tsub' title='Listado de todas las subseries existentes'");

                            if (!$codiSRD) {
                                $codiSRD = $codserie;
                                $codiSBRD = $tsub;
                            }
                            ?>
                        </td>   
                    </tr>
                    <tr>
                        <td class='titulos5' width="8%" align="left"><label for="buscar_exp"><label for="buscar_exp">EXPEDIENTE</label></label></td>
                        <td class='listado2' width="20%" colspan="1"><input type=text name=buscar_exp value='<?= $buscar_exp ?>' id="buscar_exp" class="form-control tex_area" title="Buscar radicados por expediente">
                        </td>
                        <td class='titulos5' width="8%" align="left"><label for="buscar_rad"><label for="buscar_rad">RADICADO</label></label></td>
                        <td class='listado2' colspan="4"><input id="buscar_rad" type=text name=buscar_rad value='<?= trim($buscar_rad, ' ') ?>' class="form-control tex_area" title="Buscar por número de radicado"></td>
                    </tr>
                    <tr>
                        <td class='titulos5' width="8%"><label for="exp_edificio">EDIFICIO</label> </td>
                        <TD class='listado2' width="20%" >
                            <?php
                            $sql5 = "select SGD_EIT_SIGLA,SGD_EIT_CODIGO from SGD_EIT_ITEMS where SGD_EIT_COD_PADRE='0' ";
                            $rs = $db->query($sql5);
                            print $rs->GetMenu2('exp_edificio', $exp_edificio, true, false, "", "onChange='submit()'  class='form-control select' id='exp_edificio'");
                            ?>
                        </td>
                    
                        <td class='titulos5' width="8%" align="left"><label for="buscar_piso"><?= $item1 ?></label> </td>
                        <td class='listado2' width="10%">
                            <?php
                            $query = "select SGD_EIT_NOMBRE,SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as char(5)) = '$exp_edificio'";
                            $rs1 = $db->conn->query($query);
                            print $rs1->GetMenu2('buscar_piso', $buscar_piso, true, false, "", "onChange='submit()' class='form-control select' id='buscar_piso' title='Nivel del edificio en el que se encuentra el archivo central'");
                            ?>
                        </td>
                        <td class='titulos5' width="8%"><label for="buscar_ufisica"><?= $item2 ?></label> </td>
                        <td class='listado2' colspan="4" width="20%">
                            <?php
                            $sql = "select SGD_EIT_NOMBRE,SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as char(5)) = '$buscar_piso'";
                            $rs = $db->query($sql);
                            print $rs->GetMenu2('buscar_ufisica', $buscar_ufisica, true, false, "", "onChange='submit()'  class='form-control select' title='buscar_ufisica' title='Ubicación del archivo físico (en papel)'");
                            ?>
                        </td>
                    </tr>
                    <!--MODIFICADO POR SKINA JUNIO 10/09 PARA SHT-->
                    <tr>
                        <td class='listado1' width="20%" align="left" colspan="3"> 
                            <label for="sep">Fecha inicial</label>
                            <? if($sep == 1) $datoss = "checked"; else $datoss= ""; ?>
                            <input name="sep" type="checkbox" class="select" value="1" <?= $datoss ?> id="sep">
                            <label for="fechaInii" > Desde</label> 
                            <script language="javascript">
                                <? 	if(!$fechaInii) $fechaInii=fnc_date_calcm(date('Y-m-d'),'1');
                                if(!$fechaInif) $fechaInif = date('Y-m-d');
                                ?>
                                var dateAvailable1 = new ctlSpiffyCalendarBox("dateAvailable1", "busqueda_archivo", "fechaInii","btnDate1","<?= $fechaInii ?>",scBTNMODE_CUSTOMBLUE);
                                dateAvailable1.date = "<?= date('Y-m-d'); ?>";
                                dateAvailable1.writeControl();
                                dateAvailable1.dateFormat="yyyy-MM-dd";
                            </script> 
                            <label for="fechaInif">Hasta</label>
                            <script language="javascript">
                                var dateAvailable2 = new ctlSpiffyCalendarBox("dateAvailable2", "busqueda_archivo", "fechaInif","btnDate1","<?= $fechaInif ?>",scBTNMODE_CUSTOMBLUE);
                                dateAvailable2.date = "<?= date('Y-m-d'); ?>";
                                dateAvailable2.writeControl();
                                dateAvailable2.dateFormat="yyyy-MM-dd";
                            </script>
                        </td>
                        <td class='listado1' colspan="3">
                            <? if($sel1 == 1) $datoss = "checked"; else $datoss= "";?>
                            <input id="sel1" name="sel1" type="checkbox" class="select" value="1" <?= $datoss ?>>
                            <label for="sel1">Fecha final</label> 
                            <label for="fechaFini"> Desde</label>          
                            <script language="javascript">
                                <?php
                                if (!$fechaFini)
                                    $fechaFini = fnc_date_calcm(date('Y-m-d'), '1');
                                if (!$fechaFinf)
                                    $fechaFinf = date('Y-m-d');
                                ?>
                                var dateAvailable3 = new ctlSpiffyCalendarBox("dateAvailable3", "busqueda_archivo", "fechaFini","btnDate1","<?= $fechaFini ?>",scBTNMODE_CUSTOMBLUE);
                                dateAvailable3.date = "<?= date('Y-m-d'); ?>";
                                dateAvailable3.writeControl();
                                dateAvailable3.dateFormat="yyyy-MM-dd";
                            </script>
                            <label for="fechaFinf">Hasta</label>
                            <script language="javascript">
                                var dateAvailable4 = new ctlSpiffyCalendarBox("dateAvailable4", "busqueda_archivo", "fechaFinf","btnDate1","<?= $fechaFinf ?>",scBTNMODE_CUSTOMBLUE);
                                dateAvailable4.date = "<?= date('Y-m-d'); ?>";
                                dateAvailable4.writeControl();
                                dateAvailable4.dateFormat="yyyy-MM-dd";
                            </script>
                        </td>
                    </tr>
                    <tr >
                        <td colspan="3" style="text-align: center;" class="listado1"><input type=submit value=Buscar name=Buscar class="botones" aria-label="Buscar archivos de acuerdo a criterios ingresados">&nbsp;</td>
                        <td colspan="3" style="text-align: center;" class="listado1"><a href='archivo.php?<?= session_name() ?>=<?= trim(session_id()) ?>krd=<?= $krd ?>'><input aria-label="Volver al menú del módulo de archivo" name='Regresar' align="middle" type="button" class="botones" id="envia22" value="Regresar"></td>
                    </tr>

                </table>
                <br>
                <?php if ($Buscar) { ?>
                                    <table border=1 width=90% cellpadding="1"  class="borde_tab">
                                    <tr>
                                        <TD class=titulos5 >RADICADO
                                        <TD class=titulos5 >FECHA RADICADO
                                        <TD class=titulos5 >EXPEDIENTE
                                        <TD class=titulos5 >SERIE
                                        <TD class=titulos5 >SUBSERIE
                                        <TD class=titulos5 >FOLIOS
                                        <TD class=titulos5 >ANEXO
                                        <TD class=titulos5 >EDIFICIO
                                        <TD class=titulos5 >ARCHIVO
                                        <TD class=titulos5 >ESTANTE
                                        <TD class=titulos5 >ENTREPANO
                                        <TD class=titulos5 >CAJA
                                        <TD class=titulos5 >UNIDAD DOCUMENTAL
                                        <TD class=titulos5 >FECHA ARCHIVO
                                        <TD class=titulos5 >FECHA FINAL
                                            </tr>

                                            <?php
                                            $buscar_exp = trim($buscar_exp, ' ');
                                            $buscar_rad = trim($buscar_rad, ' ');

                                            $perm2 = 0;
                                            if ($buscar_exp != "") {
                                                $x = "e.SGD_EXP_NUMERO LIKE '%$buscar_exp%'";
                                                $a = "and";
                                                $perm2 = 1;
                                            } else {
                                                $x = "";
                                                $a = "";
                                            }
                                            if ($buscar_rad != "") {
                                                $r = "e.RADI_NUME_RADI LIKE '%$buscar_rad%'";
                                                $b = "and";
                                                $perm2 = 1;
                                            } else {
                                                $r = "";
                                                $b = "";
                                            }
                                            if ($codserie != '0') {
                                                $srds = "s.SGD_SRD_CODIGO = $codserie";
                                                $c = "and";
                                                $perm2 = 1;
                                            } else {
                                                $srds = "";
                                                $c = "";
                                            }
                                            if ($codiSBRD != '0') {
                                                $sbrds = "s.SGD_SBRD_CODIGO = $codiSBRD";
                                                $d = "and";
                                                $perm2 = 1;
                                            } else {
                                                $sbrds = "";
                                                $d = "";
                                            }
                                            // if ($codProc != '0') {
                                            //     $pross = "s.SGD_PEXP_CODIGO LIKE '$codProc'";
                                            //     $ef = "and";
                                            //     $perm2 = 1;
                                            // } else {
                                            //     $pross = "";
                                            //     $ef = "";
                                            // }
                                            if ($buscar_piso != "") {
                                                if ($item1) {
                                                    $piso = "e.SGD_EXP_ISLA LIKE '$buscar_piso'";
                                                    $t4 = "and";
                                                }
                                            } else {
                                                $piiso = "";
                                                $t4 = "";
                                            }
                                            if ($buscar_ufisica != "") {
                                                if ($item2) {
                                                    $ufisica = "e.SGD_EXP_UFISICA LIKE '$buscar_ufisica'";
                                                    $t3 = "and";
                                                }
                                            } else {
                                                $ufisica = "";
                                                $t3 = "";
                                            }

                                            if ($buscar_estan != "") {
                                                if ($item3 == "ESTANTE") {
                                                    $estan = "e.SGD_EXP_CARRO LIKE '$buscar_estan'";
                                                    $t2 = "and";
                                                } elseif ($item3 == "CAJA") {
                                                    $estan = "e.SGD_EXP_CAJA LIKE '$buscar_estan'";
                                                    $t2 = "and";
                                                }
                                            } else {
                                                $estan = "";
                                                $t2 = "";
                                            }


                                            if ($buscar_entre != "") {
                                                if ($item4 == "ESTANTE" or $item4 == "ENTREPA�O") {
                                                    $entre = "e.SGD_EXP_ENTREPA LIKE '$buscar_entre'";
                                                    $t1 = "and";
                                                } elseif ($item4 == "CAJA" or $item4 == "CAJAS" or $item4 == "CARAS") {
                                                    $entre = "e.SGD_EXP_CAJA LIKE '$buscar_entre'";
                                                    $t1 = "and";
                                                }
                                            } else {
                                                $entre = "";
                                                $t1 = "";
                                            }

                                            if ($buscar_caja != "") {
                                                if ($item5 == "ENTREPANO" or $item5 == "ENTREPA�O") {
                                                    $caja = "e.SGD_EXP_ENTREPA LIKE '$buscar_caja'";
                                                    $t = "and";
                                                } elseif ($item5 == "CAJA") {
                                                    $caja = "e.SGD_EXP_CAJA LIKE '$buscar_caja'";
                                                    $t = "and";
                                                }
                                            } else {
                                                $caja = "";
                                                $t = "";
                                            }

                                            if ($buscar_caja != "") {
                                                if ($item6 == "ENTREPANO" or $item6 == "ENTREPA�O") {
                                                    $caja = "e.SGD_EXP_ENTREPA LIKE '$buscar_caja'";
                                                    $u1 = "and";
                                                } elseif ($item6 == "CAJA") {
                                                    $caja = "e.SGD_EXP_CAJA LIKE '$buscar_caja'";
                                                    $u1 = "and";
                                                }
                                            } else {
                                                $caja = "";
                                                $u1 = "";
                                            }

                                            if ($exp_edificio != "") {
                                                $edifi = "e.SGD_EXP_EDIFICIO LIKE '$exp_edificio'";
                                                $edi = "and";
                                            } else {
                                                $edifi = "";
                                                $edi = "";
                                            }
                                            if ($sep == '1') {
                                                if ($fechaInii == $fechaInif) {
                                                    $fecha = "e.SGD_EXP_FECH_ARCH like '$fechaInii'";
                                                } else {
                                                    $time = fnc_date_calcy($fechaInif, '1');
                                                    $fecha = "e.SGD_EXP_FECH_ARCH <= '$time' and e.SGD_EXP_FECH_ARCH >= '$fechaInii'";
                                                }
                                                $perm2 = 1;
                                                $i = "and";
                                            } else {
                                                $fecha = "";
                                                $fech = "";
                                                $i = "";
                                            }
                                            if ($sel1 == '1') {
                                                if ($fechaFini == $fechaFinf)
                                                    $fecha = "e.SGD_EXP_FECHFIN like '$fechaFini'";
                                                else {
                                                    $time2 = fnc_date_calcy($fechaFinf, '1');
                                                    $fechafin = "e.SGD_EXP_FECHFIN <= '$time2' and e.SGD_EXP_FECHFIN >= '$fechaFini'";
                                                }
                                                $perm2 = 1;
                                                $j = "and";
                                            } else {
                                                $fechafin = "";
                                                $fechfin = "";
                                                $j = "";
                                            }
                                            if ($buscar_rete != "") {
                                                $foli = "e.SGD_EXP_RETE = $buscar_rete";
                                                $k = "and";
                                                $perm2 = 1;
                                            } else {
                                                $foli = "";
                                                $k = "";
                                            }
                                            if ($buscar_parametros != "") {
                                                $param = "s.SGD_SEXP_PAREXP1 LIKE '%$buscar_parametros%' OR s.SGD_SEXP_PAREXP2 LIKE '%$buscar_parametros%' OR s.SGD_SEXP_PAREXP3 LIKE '%$buscar_parametros%' OR s.SGD_SEXP_PAREXP4 LIKE '%$buscar_parametros%' OR s.SGD_SEXP_PAREXP5 LIKE '%$buscar_parametros%'";
                                                $l = "and";
                                                $perm2 = 1;
                                            } else {
                                                $param = "";
                                                $l = "";
                                            }
                                            if ($buscar_consecutivo != "") {
                                                $conse = "e.SGD_EXP_CARPETA LIKE '$buscar_consecutivo'";
                                                $n = "and";
                                                $perm2 = 1;
                                            } else {
                                                $conse = "";
                                                $n = "";
                                            }
                                            if ($codMuni != '0') {
                                                $queryMuni = "select MUNI_NOMB FROM MUNICIPIO WHERE MUNI_CODI= '$codMuni' and DPTO_CODI= '$codDpto'";
                                            // MODIFICADO SKINA JUNIO 10/09 PARA SHT
                                                $rsm=$db->query($queryMuni);
                                                $munici = $rsm->fields['MUNI_NOMB'];
                                                $perm2 = 1;
                                            } else {
                                                $muni = "";
                                                $p = "";
                                            }
                                            if ($codDpto != '0') {
                                                $queryDpto = "select DPTO_NOMB FROM DEPARTAMENTO WHERE DPTO_CODI= '$codDpto'";
                                                $rsD = $db->query($queryDpto);
                                                $departa = $rsD->fields['DPTO_NOMB'];
                                            } else {
                                                $depa = "";
                                                $q = "";
                                            }
                                            if ($fecha != "" or $fechafin != "")
                                                $orde = " order by 2";
                                            else
                                                $orde = " order by 1";

                                            $at = $buscar_exp . $buscar_rad . $buscar_piso . $buscar_caja . $buscar_estan . $buscar_entre . $buscar_caja . $buscar_caja2 . $buscar_rete . $fecha . $fechafin . $buscar_parametros . $buscar_consecutivo . $buscar_ufisica . $codserie . $codiSBRD . $codProc;

                                            $bt = $buscar_exp . $buscar_rad . $buscar_piso . $buscar_caja . $buscar_estan . $buscar_entre . $buscar_caja . $buscar_caja2 . $buscar_rete . $fecha . $fechafin . $buscar_parametros . $buscar_consecutivo . $buscar_ufisica . $codMuni . $codDpto;

                                            $cont = 0;

                                            if (($buscar_docu != "" and $at == '000')) {
                                                include("$dir_raiz/include/query/archivo/queryBusqueda_exp.php");                                                
                                                $rs = $db->query($sqlca);
                                                //echo ' ########## '.$sqlca;

                                                while (!$rs->EOF) {
                                                    $radi = $rs->fields["RAD"];
                                                    $fechrad = $rs->fields['FECH'];
                                                    $path = $rs->fields['RADI_PATH'];
                                                    $folios = $rs->fields['RADI_NUME_HOJA'];
                                                    $anexos = $rs->fields['MEDIO_M'];
                                                    if ($docu1 != 0)
                                                        $perm2 = 1;
                                                    if ($docu1 == 3)
                                                        $documento = $rs->fields['RADI_CUENTAI'];
                                                    if ($docu1 == 1) {
                                                        $documento = $rs->fields['NIT_DE_LA_EMPRESA'];
                                                        $perm6 = 1;
                                                    } else
                                                        $documento = $rs->fields['SGD_DIR_DOC'];
                                                    include("$dir_raiz/include/query/archivo/queryBusqueda_exp.php");
                                                    $rsr = $db->query($sqlmin);
                                                    while (!$rsr->EOF) {
                                                        $expnum = $rsr->fields['SGD_EXP_NUMERO'];
                                                        $parametro1 = $rsr->fields['SGD_SEXP_PAREXP1'];
                                                        $parametro2 = $rsr->fields['SGD_SEXP_PAREXP2'];
                                                        $parametro3 = $rsr->fields['SGD_SEXP_PAREXP3'];
                                                        $parametro4 = $rsr->fields['SGD_SEXP_PAREXP5'];
                                                        $edificio = $rsr->fields['SGD_EXP_EDIFICIO'];
                                                        $fech = $rsr->fields['SGD_EXP_FECH_ARCH'];
                                                        $fechfin = $rsr->fields['SGD_EXP_FECHFIN'];
                                                        $estan = $rsr->fields['SGD_EXP_ISLA'];
                                                        $caja = $rsr->fields['SGD_EXP_CAJA'];
                                                        $referencia = $rs->fields['RADI_CUENTAI'];
                                                        $unicon = $rsr->fields['SGD_EXP_UNICON'];
                                                        $consecu = $rsr->fields['SGD_EXP_CARPETA'];
                                                        $entrepa1 = $rsr->fields['SGD_EXP_UFISICA'];

                                                        $infoSerie = "select sgd_srd_descrip from sgd_srd_seriesrd where sgd_srd_codigo=".$rsr->fields['SGD_SRD_CODIGO'];
                                                        $rsSerie = $db->query($infoSerie);
                                                        $srd = $rsSerie->fields['SGD_SRD_DESCRIP'];

                                                        $infoSubSerie = "select sgd_sbrd_descrip from sgd_sbrd_subserierd where sgd_srd_codigo=".$rsr->fields['SGD_SRD_CODIGO']." and sgd_sbrd_codigo=".$rsSubSerie->fields['SGD_SBRD_CODIGO'];
                                                        $rsSubSerie = $db->query($infoSubSerie);
                                                        $sbrd = $rsSubSerie->fields['SGD_SBRD_DESCRIP'];

                                                        $proceso = $rsr->fields['SGD_PEXP_CODIGO'];

                                                        if (($caja == "" or $caja == 0) and $entrepa1 != "")
                                                            $bus = $entrepa1;
                                                        else
                                                            $bus = $caja;
                                                        $qpri = $db->conn->Execute("select SGD_EIT_COD_PADRE from SGD_EIT_ITEMS where sgd_eit_codigo like '$bus'");
                                                        if (!$qpri->EOF) {
                                                            $it1 = $qpri->fields['SGD_EIT_COD_PADRE'];
                                                            $qsec = $db->conn->Execute("select SGD_EIT_COD_PADRE from SGD_EIT_ITEMS where sgd_eit_codigo like '$it1'");
                                                            if (!$qsec->EOF) {
                                                                $it2 = $qsec->fields['SGD_EIT_COD_PADRE'];
                                                                $qtir = $db->conn->Execute("select SGD_EIT_COD_PADRE from SGD_EIT_ITEMS where sgd_eit_codigo like '$it2'");
                                                                if (!$qtir->EOF) {
                                                                    $it3 = $qtir->fields['SGD_EIT_COD_PADRE'];
                                                                    $qcua = $db->conn->Execute("select SGD_EIT_COD_PADRE from SGD_EIT_ITEMS where sgd_eit_codigo like '$it3'");
                                                                    if (!$qcua->EOF) {
                                                                        $it4 = $qcua->fields['SGD_EIT_COD_PADRE'];
                                                                        $qqin = $db->conn->Execute("select SGD_EIT_COD_PADRE from SGD_EIT_ITEMS where sgd_eit_codigo like '$it4'");
                                                                        if (!$qqin->EOF) {
                                                                            $it5 = $qqin->fields['SGD_EIT_COD_PADRE'];
                                                                            $qsex = $db->conn->Execute("select SGD_EIT_COD_PADRE from SGD_EIT_ITEMS where sgd_eit_codigo like '$it5'");
                                                                            if (!$qsex->EOF) {
                                                                                $it6 = $qsex->fields['SGD_EIT_COD_PADRE'];
                                                                                $qset = $db->conn->Execute("select SGD_EIT_COD_PADRE from SGD_EIT_ITEMS where sgd_eit_codigo like '$it6'");
                                                                                if (!$qset->EOF) {
                                                                                    $it7 = $qset->fields['SGD_EIT_COD_PADRE'];
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }

                                                        include("$dir_raiz/include/query/archivo/queryBusqueda_exp.php");
                                                        $rst = $db->query($sql2);
                                                        
                                                        if (!$rsr->EOF)
                                                            $nam1 = $rsr->fields["SGD_EIT_SIGLA"];
                                                        $rsr = $db->query($sql3);
                                                        if (!$rsr->EOF)
                                                            $nam2 = $rsr->fields["SGD_EIT_SIGLA"];
                                                        $rsr = $db->query($sql4);
                                                        if (!$rsr->EOF)
                                                            $nam3 = $rsr->fields["SGD_EIT_SIGLA"];
                                                        // (Edificios, SHT)
                                                        $rsr = $db->query($sql13);
                                                        if (!$rsr->EOF)
                                                            $nam0 = $rsr->fields["SGD_EIT_SIGLA"];
                                                        // (Entrepano, SHT)
                                                        $rsr = $db->query($sql14);
                                                        if (!$rsr->EOF)
                                                            $nam7 = $rsr->fields["SGD_EIT_SIGLA"];
                                                        // MODIFICADO SKINA JUNIO 8/09 (cajas, SHT) 
                                                        $rsr = $db->query($sql5);
                                                        if (!$rsr->EOF)
                                                            $nam4 = $rsr->fields["SGD_EIT_SIGLA"];

                                                        if ($ite5) {
                                                            $rsr = $db->query($sql10);
                                                            if (!$rsr->EOF)
                                                                $nam5 = $rsr->fields["SGD_EIT_SIGLA"];
                                                        }
                                                        if ($ite6) {
                                                            $rsr = $db->query($sql11);
                                                            if (!$rsr->EOF)
                                                                $nam6 = $rsr->fields["SGD_EIT_SIGLA"];
                                                        }
                                                        if (($exp_edificio != "" and ( ($perm == 1 and $perm3 == 2) or ( $perm3 == 2 and $perm4 == 3) or ( $perm4 == 3 and $perm5 == 4) or $perm5 == 4)) or $perm2 == 1) {
                                                            if (($buscar_estan != "" and $perm3 == 2) or ( $buscar_entre != "" and $perm == 1) or $buscar_estan == "" or $buscar_entre == "" or $perm2 == 1) {

                                                                if (($docu1 == 1 and $perm6 == 1) or $buscar_docu == "" or $docu1 == 0 or $perm2 == 1) {
                                                                    ?>
                                                                <tr>
                                                                <?php if ($path != " " && $path != null) { ?> 
                                                                        <td class=leidos2 align="center"><a href='../bodega/<?= $path ?>' > <?= $radi ?></b></td>
                                                                <?php } else { ?>
                                                                        <td class=leidos2 align="center"><?= $radi ?></b></td>
                                                                <?php } ?>
                                                                    <td class=leidos2 align="center"><a href='../verradicado.php?<?= $encabezado . "&num_expediente=$expnum&verrad=$radi&carpeta_per=0&carpeta=8&nombcarpeta=Expedientes" ?>' > <? echo $fechrad;?></a></td>
                                                                    <td class=leidos2 align="center"><a href='datos_expediente.php?<?= $encabezado . "&num_expediente=$expnum&ent=1&nurad=$radi" ?>' class='vinculos'><?= $expnum ?></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $srd ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $sbrd ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $parametro1 ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $parametro2 ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $parametro3 ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $parametro4 ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $folios ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $nam0 ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $nam1 ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $nam2 ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $nam3 ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $nam4 ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $nam5 ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $nam6 ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $nam7 ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $consecu ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $fech ?></b></td>
                                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $fechfin ?></b></td>

                                                                </tr>
                                                                    <?php
                                                                    $cont++;
                                                                }
                                                            }
                                                        }
                                                        $rsr->MoveNext();
                                                    }
                                                    $rs->MoveNext();
                                                }
                                            } else {
                                                include("$dir_raiz/include/query/archivo/queryBusqueda_exp.php");
                                                $rs = $db->query($sql);
                                                //echo ' *************** '.$sql;
                                                
                                                while (!$rs->EOF) {
                                                    $expnum = $rs->fields['SGD_EXP_NUMERO'];
                                                    
                                                    $infoSerie = "select sgd_srd_descrip from sgd_srd_seriesrd where sgd_srd_codigo=".$rs->fields['SGD_SRD_CODIGO'];
                                                    $rsSerie = $db->query($infoSerie);
                                                    $srd = $rsSerie->fields['SGD_SRD_DESCRIP'];

                                                    $infoSubSerie = "select sgd_sbrd_descrip from sgd_sbrd_subserierd where sgd_srd_codigo=".$rs->fields['SGD_SRD_CODIGO']." and sgd_sbrd_codigo=".$rs->fields['SGD_SBRD_CODIGO'];
                                                    $rsSubSerie = $db->query($infoSubSerie);
                                                    $sbrd = $rsSubSerie->fields['SGD_SBRD_DESCRIP'];

                                                    $proceso = $rs->fields['SGD_PEXP_CODIGO'];
                                                    $parametro1 = $rs->fields['SGD_SEXP_PAREXP1'];
                                                    $parametro2 = $rs->fields['SGD_SEXP_PAREXP2'];
                                                    $parametro3 = $rs->fields['SGD_SEXP_PAREXP3'];
                                                    $parametro4 = $rs->fields['SGD_SEXP_PAREXP5'];
                                                    $fech = $rs->fields['SGD_EXP_FECH_ARCH'];
                                                    $fechfin = $rs->fields['SGD_EXP_FECHFIN'];
                                                    $folios = $rs->fields['RADI_NUME_HOJA'];
                                                    $anexos = $rs->fields['MEDIO_M'];
                                                    $estan = $rs->fields['SGD_EXP_ISLA'];
                                                    $caja = $rs->fields['SGD_EXP_CAJA'];
                                                    $edificio = $rs->fields['SGD_EXP_EDIFICIO'];
                                                    $radi = $rs->fields["RADI_NUME_RADI"];
                                                    $referencia = $rs->fields['RADI_CUENTAI'];
                                                    $unicon = $rs->fields['SGD_EXP_UNICON'];
                                                    $consecu = $rs->fields['SGD_EXP_CARPETA'];
                                                    $entrepa1 = $rs->fields['SGD_EXP_UFISICA'];
                                                    $fechrad = $rs->fields['FECH'];
                                                    $path = $rs->fields['RADI_PATH'];
                                                    $eesp = $rs->fields['EESP_CODI'];

                                                    if (($caja == "" or $caja == 0) and $entrepa1 != "")
                                                        $bus = $entrepa1;
                                                    else
                                                        $bus = $caja;

                                                    $queryItems = "select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $bus";
                                                    $qpri = $db->conn->Execute($queryItems);
                                                                       
                                                    if (!$qpri->EOF) {
                                                        $it1 = $qpri->fields['SGD_EIT_COD_PADRE'];
                                                        $qsec = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where  sgd_eit_codigo =$it1");
                                                        
                                                        if (!$qsec->EOF) {
                                                            $it2 = $qsec->fields['SGD_EIT_COD_PADRE'];
                                                            $qtir = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $it2");
                                                            
                                                            if (!$qtir->EOF) {
                                                                $it3 = $qtir->fields['SGD_EIT_COD_PADRE'];
                                                                $qcua = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $it3");
                                                                
                                                                if (!$qcua->EOF) {
                                                                    $it4 = $qcua->fields['SGD_EIT_COD_PADRE'];
                                                                    $qqin = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $it4");
                                                                    
                                                                    if (!$qqin->EOF) {
                                                                        $it5 = $qqin->fields['SGD_EIT_COD_PADRE'];
                                                                        $qsex = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $it5");
                                                                        
                                                                        if (!$qsex->EOF) {
                                                                            $it6 = $qsex->fields['SGD_EIT_COD_PADRE'];
                                                                            $qset = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $it6");
                                                                            
                                                                            if (!$qset->EOF) {
                                                                                $it7 = $qset->fields['SGD_EIT_COD_PADRE'];
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }

                                                    include("$dir_raiz/include/query/archivo/queryBusqueda_exp.php");
                                                    if ($docu1 == 1) {
                                                        $rsm = $db->query($sqld);

                                                        if (!$rsm->EOF) {
                                                            $documento = $rsm->fields['NIT_DE_LA_EMPRESA'];
                                                            echo $perm6 = 1;
                                                        }
                                                    }
                                                    if ($docu1 == 3)
                                                        $documento = $rs->fields['RADI_CUENTAI'];
                                                    else
                                                        $documento = $rs->fields['SGD_DIR_DOC'];

                                                    include("$dir_raiz/include/query/archivo/queryBusqueda_exp.php");
                                                    $rsr = $db->query($sql13); 

                                                    if (!$rsr->EOF)
                                                        $nam0 = $rsr->fields["SGD_EIT_SIGLA"];

                                                   $rsr = $db->query($sql2);  
                                                    if (!$rsr->EOF)
                                                        $nam1 = $rsr->fields["SGD_EIT_SIGLA"];

                                                    $rsr = $db->query($sql3);
                                                    if (!$rsr->EOF)
                                                        $nam2 = $rsr->fields["SGD_EIT_SIGLA"];

                                                    $rsr = $db->query($sql4);
                                                    if (!$rsr->EOF)
                                                        $nam3 = $rsr->fields["SGD_EIT_SIGLA"];

                                                    $rsr = $db->query($sql5);
                                                    if (!$rsr->EOF)
                                                        $nam4 = $rsr->fields["SGD_EIT_SIGLA"];

                                                    if ($ite5) {
                                                        $rsr = $db->query($sql10);
                                                        if (!$rsr->EOF)
                                                            $nam5 = $rsr->fields["SGD_EIT_SIGLA"];
                                                    }

                                                    if ($ite6) {
                                                        $rsr = $db->query($sql11);
                                                        if (!$rsr->EOF)
                                                            $nam6 = $rsr->fields["SGD_EIT_SIGLA"];
                                                    }

                                                    $rsr = $db->query($sql14);
                                                    if (!$rsr->EOF)
                                                        $nam7 = $rsr->fields["SGD_EIT_SIGLA"];

                                                    switch ($unicon) {
                                                        case '1': $unicon = "CAR";
                                                            break;
                                                        case '2': $unicon = "AZ";
                                                            break;
                                                        case '3': $unicon = "LB";
                                                            break;
                                                        case '4': $unicon = "AR";
                                                            break;
                                                    }
                                                    ?>

                                                <tr>

                                                    <?php if ($path != " " && $path != null) { ?> 
                                                        <td class=leidos2 align="center"><a href='../bodega/<?= $path ?>' > <?= $radi ?></b></td>
                                                    <?php } else { ?>
                                                        <td class=leidos2 align="center"><?= $radi ?></b></td>
                                                    <?php } ?>
                                                    <td class=leidos2 align="center"><a href='../verradicado.php?<?= $encabezado . "&num_expediente=$expnum&verrad=$radi&carpeta_per=0&carpeta=8&nombcarpeta=Expedientes" ?>' > <? echo $fechrad;?></a></td>
                                                    <td class=leidos2 align="center"><a href='datos_expediente.php?<?= $encabezado . "&num_expediente=$expnum&ent=1&nurad=$radi" ?>' class='vinculos'><?= $expnum ?></td>
                                                            <!--<td class=leidos2 align="center"><b><span class=leidos2><?= $referencia ?></b></td>-->
                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $srd ?></b></td>
                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $sbrd ?></b></td>
                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $folios ?></b></td><!-- OK -->
                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $anexos ?></b></td><!-- OK -->
                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $nam0 ?></b></td><!-- EDIFICIO --> 
                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $nam3 ?></b></td><!-- PISO-->
                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $nam2 ?></b></td><!-- ESTANTE -->
                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $nam1 ?></b></td><!-- ENTREPANO -->
                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $nam7 ?></b></td><!--CAJA--!>
                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $unicon . ' No. ' . $consecu ?></b></td><!-- UNI DOCUMENTAL-->
                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $fech ?></b></td><!-- FECH ARCHIVO -->
                                                    <td class=leidos2 align="center"><b><span class=leidos2><?= $fechfin ?></b></td> <!-- FECH FINAL -->
                                                </tr>

            <?php
            //$rsm->MoveNext();
            $cont++;
            /* }
              }
              } */
            $rs->MoveNext();
        }
    }
}
?>
                                </table>
                                <br>
                                <center><?= $cont ?> Archivos Encontrados</center>
