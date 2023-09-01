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
$assoc = $_SESSION['assoc'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

$usua_nomb = $_SESSION['usua_nomb'];
$anoActual = date("Y");
$devolver_rad = $_POST['devolver_rad'];
$fecha_busq = $_POST['fecha_busq'];
$devolver_dependencias = $_POST['devolver_dependencias'];
$dep_sel = $_POST['dep_sel'];
$$dependencia = $_SESSION['dependencia'];
$codusuario = $_SESSION['codusuario'];
$usua_doc = $_SESSION['usua_doc'];
$estructuraRad = $_SESSION['estructuraRad'];

foreach ($_GET as $key => $valor)   ${$key} = $valor;
foreach ($_POST as $key => $valor)   ${$key} = $valor;

//echo '----------> '.$$dependencia;
if (!$_SESSION['dependencia'] and ! $_SESSION['depe_codi_territorial'])
    include "../rec_session.php";
include_once "$dir_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$dir_raiz");
//$db->conn->debug=true;

define('ADODB_ASSOC_CASE', $assoc);
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
?>
<head>
    <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    <script src="../estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="../estilos/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<BODY>
    <br>
    <div id="spiffycalendar" class="text"></div>
    <link rel="stylesheet" type="text/css" href="../js/spiffyCal/spiffyCal_v2_1.css">
    <?php
    if (!$fecha_busq) {
        $fecha_busq = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") - 1, date("Y")));
        $hora_ini = date("H");
        $minutos_ini = date("i");
    } else {
        if (mktime($hora_ini, $minutos_ini, 0, substr($fecha_busq, 5, 2), substr($fecha_busq, 8, 2), substr($fecha_busq, 0, 4)) > mktime(date("H"), date("i"), 0, date("m"), date("d") - 1, date("Y"))) {
            echo "
		 <script>
		 alert('Los datos de Fecha y Hora no pueden ser superiores a 24 Horas.');
		 </script>
		 ";
            $fecha_busq = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") - 1, date("Y")));
            $hora_ini = date("H");
            $minutos_ini = date("i");
        }
    }
    ?>
    <script language="JavaScript" src="../js/spiffyCal/spiffyCal_v2_1.js"></script><script language="javascript">
        setRutaRaiz("..");
        var dateAvailable = new ctlSpiffyCalendarBox("dateAvailable", "new_product", "fecha_busq", "btnDate1", "<?= $fecha_busq ?>", scBTNMODE_CUSTOMBLUE);
    </script>
    <table><tr><td></td></tr></table>
    <form name="new_product"  action='dev_corresp.php?<?= session_name() . "=" . session_id() . "&krd=$krd&fecha_h=$fechah&fecha_busq=$fecha_busq" ?>' method=post><center>
            <TABLE width="650" class='borde_tab' border="2" cellspacing="5">
                <tr>
                <div id="titulo" style="width: 650px; margin-left: 0%;" align="center">Devoluci&oacute;n de Documento por Tiempo</div>
                </tr>
                <TR>
                    <TD width="125" height="21"  class='titulos2'><label for="fecha_busq"> Fecha</label><br>
                    </TD>
                    <TD width="415" align="right" valign="top" class='listado2'>
                        <script language="javascript">
                            dateAvailable.dateFormat = "yyyy-MM-dd";
                            dateAvailable.date = "<?= $fecha_busq ?>";
                            dateAvailable.writeControl();
                        </script>
                    </TD>
                </TR>
                <TR>
                    <TD height="26" class='titulos2'> <label for="hora_ini">Hora de inicio</label></TD>
                    <TD valign="top" class='listado2'>
                        <?php
                        if (!$hora_ini)
                            $hora_ini = 01;
                        if (!$hora_fin)
                            $hora_fin = date("H");
                        if (!$minutos_ini)
                            $minutos_ini = 01;
                        if (!$minutos_fin)
                            $minutos_fin = date("i");
                        if (!$segundos_ini)
                            $segundos_ini = 01;
                        if (!$segundos_fin)
                            $segundos_fin = date("s");
                        ?>

                        <select name=hora_ini class=select id="hora_ini" title="horas">
                            <?php
                            for ($i = 0; $i <= 23; $i++) {
                                if ($hora_ini == $i) {
                                    $datoss = " selected ";
                                } else {
                                    $datoss = " ";
                                }
                                ?>
                                <option value='<?= $i ?>' '<?= $datoss ?>'>
                                    <?= $i ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>:<select name=minutos_ini class=select title="minutos">
                            <?php
                            for ($i = 0; $i <= 59; $i++) {
                                if ($minutos_ini == $i) {
                                    $datoss = " selected ";
                                } else {
                                    $datoss = " ";
                                }
                                ?>
                                <option value='<?= $i ?>' '<?= $datoss ?>'>
                                    <?= $i ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </TD>
                </TR>
                <TR>
                    <TD height="26" class='titulos2'><label for="dep_sel">Dependencia</label></TD>
                    <TD valign="top" class='listado2'>
                        <?php
                        $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&fecha_busq=$fecha_busq&estado_sal=$estado_sal&estado_sal_max=$estado_sal_max&dep_sel=$dep_sel&filtroSelect=$filtroSelect&nomcarpeta=$nomcarpeta&orderTipo=$orderTipo&orderNo=";
                        $linkPagina = "$PHP_SELF?$encabezado&orderTipo=$orderTipo";
                        include "$dir_raiz/include/query/devolucion/querydependencia.php";
                        error_reporting(7);
                        $ss_RADI_DEPE_ACTUDisplayValue = "--- TODAS LAS DEPENDENCIAS ---";
                        $valor = 0;
                        /* by skina, devoluciones para todas las dependencias, sin importar la territorial */
                        $sqlD = "select $sqlConcat ,depe_codi from dependencia	order by depe_codi";
                        $rsDep = $db->conn->Execute($sqlD);
                        print $rsDep->GetMenu2("dep_sel", "$dep_sel", $blank1stItem = "$valor:$ss_RADI_DEPE_ACTUDisplayValue", false, 0, " onChange='submit();' class='select' id='dep_sel' title='Listado con todas las dependencias existentes'");
                        ?>

                </TR><tr>
                </tr><tr><td height="26" colspan="2" valign="top" class='listado1'> <center>		
                    <INPUT TYPE=SUBMIT name=devolver_rad Value='Vista preliminar' class=botones_largo aria-label="Mostrar los radicados por los criterios seleccionados">      </center></td>
                </tr>
            </TABLE>
            <?php
            error_reporting(7);
            // By Skinatech - 14/08/2018
            // Para la construcción del número de radicado, esto indica la parte inicial del radicado.
            if ($estructuraRad == 'ymd') {
                $num = 9;
            } elseif ($estructuraRad == 'ym') {
                $num = 7;
            } else {
                $num = 5;
            }
            if (($devolver_rad or $devolver_dependencias) and $fecha_busq) {
                if ($dep_sel == "0") {
                    include "$ruta_raiz/include/query/devolucion/querydependencia.php";
                    $sqlD = "select $sqlConcat ,depe_codi from dependencia 
       	            where depe_codi_territorial = '$depe_codi_territorial' order by depe_codi";

                    define('ADODB_ASSOC_CASE', $assoc);
                    $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

                    $rsDep = $db->conn->Execute($sqlD);
                    $where_depe = "";
                } else {
                    $where_depe = " and " . $db->conn->substr . "(radi_nume_salida, $num, " . $_SESSION['largoDependencia'] . ") like '%" . $dep_sel . "%'";
                }

                $fecha_busqt = $fecha_busq;
                $fecha_fin = mktime($hora_ini, $hora_fin, 00, substr($fecha_busqt, 5, 2), substr($fecha_busqt, 8, 2), substr($fecha_busqt, 0, 4));
                //$where_like = " and radi_nume_salida like '$anoActual%'";
                $where_like = "";
                $fecha_busqt = $fecha_busq;
                $fecha_fin = mktime($hora_ini, $hora_fin, 00, substr($fecha_busqt, 5, 2), substr($fecha_busqt, 8, 2), substr($fecha_busqt, 0, 4));
                $where_like = "";
                $fech_devol = "'" . date("Y-m-d H:i:s") . "'";
                $usua_devol = "'" . $usua_nomb . "'";

                include "$dir_raiz/include/query/devolucion/querydev_corresp.php";
                $rsCount = $db->conn->Execute($isqlCs);
                $rsSqlF = $db->conn->Execute($isqlF);
                $rs = $db->conn->Execute($isql);
                
//                echo '***** '.$isqlC.' ****** '.print_r($rsCount->fields);

                $num_reg = $assoc == 0 ? $rsSqlF->fields["anex_radi_nume"] : $rsSqlF->fields["ANEX_RADI_NUME"];
                if ($num_reg == 0) {
                    echo "<script>alert('No existen radicados para devolver de esta Seleccion');</script>";
                }
                echo "</p> <table border='0' class=borde_tab width=99%><tr></tr><td class=titulos2>Registros Encontrados : " . $rsCount->fields["NUMERO"] . "</td></tr></table>";
                
                $fech_tot = $fecha_busqt . "  " . $hora_ini . ":" . $minutos_ini;
                echo "<p><table class=borde_tab width='99%'><tr><td class=titulos2>Radicados enviados a correspondencia antes de: $fech_tot </p></td></tr></table>";
                /* Listado Resultado de la seleccion */
                if ($rs->EOF) {
                    echo "<hr><center><strong><span class='alarmas'>No se encuentra ningun radicado con el criterio de busqueda</span></center></strong></hr>";
                } else {
                    $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&fecha_busq=$fecha_busq&devolver_rad=$devolver_rad&estado_sal=$estado_sal&estado_sal_max=$estado_sal_max&dep_sel=$dep_sel&filtroSelect=$filtroSelect&nomcarpeta=$nomcarpeta&orderTipo=     $orderTipo&orderNo=";
                    $linkPagina = "$PHP_SELF?$encabezado&orderTipo=$orderTipo&orderNo=$orderNo";
                    $pager = new ADODB_Pager($db, $isql, 'adodb', true, $orderNo, $orderTipo, '..');
                    $pager->toRefLinks = $linkPagina;
                    $pager->toRefVars = $encabezado;
                    $pager->checkAll = true;
                    $pager->checkTitulo = false;
                    $pager->Render($rows_per_page = 15, $linkPagina, $checkbox = chkEnviar);
                }
                if (!$devolver_dependencias and $num_reg > 0) {
                    ?>
                    <span class=etexto></span>
                    <br>
                    <input type=SUBMIT name='devolver_dependencias'  value = 'Confirmar Devoluci&oacute;n' class=botones_largo>
                    <?php
                } else {

                    $fecha_busqt = $fecha_busq;
                    $fecha_fin = mktime($hora_ini, $hora_fin, 00, substr($fecha_busqt, 5, 2), substr($fecha_busqt, 8, 2), substr($fecha_busqt, 0, 4));

                    //$where_like = " and radi_nume_salida like '$anoActual%'";

                    $where_like = "";
                    //$where_fecha = "sgd_fech_impres <= TO_DATE('$fecha_busqt','yyyy-mm-dd HH24:MI:ss')";
                    include "$dir_raiz/include/query/devolucion/querydev_corresp.php";

                    define('ADODB_ASSOC_CASE', $assoc);
                    $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

                    $rsSel = $db->query($isqlF);
                    while (!$rsSel->EOF) {
                        $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

                        $radicado_dev = $assoc == 0 ? $rsSel->fields["radi_nume_salida"] : $rsSel->fields["RADI_NUME_SALIDA"];
                        $anex_radi_nume = $assoc == 0 ? $rsSel->fields["anex_radi_nume"] : $rsSel->fields["ANEX_RADI_NUME"];
                        $sgd_dir_tipo = $assoc == 0 ? $rsSel->fields["sgd_dir_tipo"] : $rsSel->fields["SGD_DIR_TIPO"];
                        $t_espera = $assoc == 0 ? $rsSel->fields["t_espera"] : $rsSel->fields["T_ESPERA"];

                        $msg_copia = "";
                        if ($sgd_dir_tipo >= "7")
                            $msg_copia = "(" . (substr($sgd_dir_tipo, 1, 2) - 1) . ")";
                        include "$dir_raiz/include/query/devolucion/querydev_corresp.php";
                        $rsUpdate = $db->query($isqlU);
                        //* Para Incluir cambio en el historico
                        $observa = "<table class=titulosError ><tr><td>Devolucion de rad No $radicado_dev $msg_copia por sobrepasar tiempo de espera para envio ($t_espera Dias)</td></tr></table>";
                        $systemDate = $db->conn->OffsetDate(0, $db->conn->sysTimeStamp);

                        $isql_hl = "insert into hist_eventos(DEPE_CODI,HIST_FECH,USUA_CODI,RADI_NUME_RADI,HIST_OBSE,USUA_CODI_DEST,USUA_DOC)
			       values ('$dependencia',$systemDate  ,$codusuario,'$anex_radi_nume' ,'$observa',$codusuario,'$usua_doc')";
                        $rsInsert = $db->conn->Execute($isql_hl);
                        $rsSel->MoveNext();
                        //$anexos_act = ora_numrows($cursor1);
                    }
                }
            }
            ?>
            </form>
            <script>
                $(document).ready(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
            </script>
            </html>
