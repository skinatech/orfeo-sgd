<?php
/**
 * En este frame se van cargado cada una de las funcionalidades del sistema
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
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
session_start();
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];
$tipoRadicadoPqr = $_SESSION["tipoRadicadoPqr"];

if (!$tipoEstadistica)
    $tipoEstadistica = 1;
if (!$dependencia_busq)
    $dependencia_busq = $dependencia;

$krd = $_SESSION["krd"];
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

$nomcarpeta = $_GET["carpeta"];
$tipo_carpt = $_GET["tipo_carpt"];
if ($_GET["orderNo"])
    $orderNo = $_GET["orderNo"];
if ($_GET["orderTipo"])
    $orderTipo = $_GET["orderTipo"];
if ($_GET["tipoEstadistica"])
    $tipoEstadistica = $_GET["tipoEstadistica"];
else if (!$tipoEstadistica)
    $tipoEstadistica = $_POST["tipoEstadistica"];

if ($_GET["genDetalle"])
    $genDetalle = $_GET["genDetalle"];
if ($_GET["dependencia_busq"])
    $dependencia_busq = $_GET["dependencia_busq"];
if ($_GET["fecha_ini"])
    $fecha_ini = $_GET["fecha_ini"];
if ($_GET["fecha_fin"])
    $fecha_fin = $_GET["fecha_fin"];
if ($_GET["codus"])
    $codus = $_GET["codus"];
if ($_GET["tipoRadicado"])
    $tipoRadicado = $_GET["tipoRadicado"];
if ($_GET["codUs"])
    $codUs = $_GET["codUs"];
if ($_GET["fecSel"])
    $fecSel = $_GET["fecSel"];
if ($_GET["genDetalle"])
    $genDetalle = $_GET["genDetalle"];
if ($_GET["generarOrfeo"])
    $generarOrfeo = $_GET["generarOrfeo"];

if (!$tipoEstadistica)
    $tipoEstadistica = 1;
if (!$dependencia_busq)
    $dependencia_busq = $dependencia;

$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];
$usua_perm_estadistica = $_SESSION["usua_perm_estadistica"];
$rol = $_SESSION["rol"];

/***** 
 * DEFINICION DE VARIABLES ESTADISTICA
 * var $tituloE String array  Almacena el titulo de la Estadistica Actual
 * var $subtituloE String array  Contiene el subtitulo de la estadistica
 * var $helpE String Almacena array Almacena la descripcion de la Estadistica.
 ******/
$tituloE[1] = "1 - Reporte de Radicados por Usuarios";
$tituloE[2] = "2 - Reporte por Medio de Recepción";
$tituloE[3] = "3 - Reporte por Medios de Envio de Radicados";
$tituloE[4] = "4 - Reporte de Radicados con Carga de Imagen Principal por Correspondencia";
$tituloE[5] = "5 - Reporte de Radicados de Entrada y PQRSyD Recibidos por Correspondencia";
$tituloE[6] = "6 - Reporte de Radicados Actuales en la Dependencia";
//$tituloE[7] = utf8_decode("7 - ESTADÍSTICAS DE NUMERO DE DOCUMENTOS ENVIADOS");
$tituloE[8] = "8 - Reporte de Radicados Vencidos";
$tituloE[9] = "9 - Reporte del Proceso Realizado en Radicados de Entrada y PQRSyD";
$tituloE[10] = "10 - Resporte de Radicados Reasignados";
//$tituloE[11] = "10 - ESTAD&Iacute;STICA DE DIGITALIZACI&Oacute;N";
$tituloE[12] = "12 - Reporte de Radicados con TRD Modificada";
$tituloE[13] = "13 - Reporte de Expedientes por Dependencia";
$tituloE[14] = "14 - Reporte de Radicados Asignados en Carpetas Personales";
$tituloE[15] = "15 - Reporte de Radicados con Carga de Anexos por Correspondencia";
$tituloE[16] = "16 - Reporte de Radicados con Tramites Terminados";
$tituloE[17] = "17 - Reporte de Radicados con sus Correspondientes Respuestas";
$tituloE[18] = "18 - Reporte de Permisos Asignados a Roles";
$tituloE[19] = "19 - Reporte de Radicados de Entrada y PQRSyD por Tipo de Usuario";
$tituloE[20] = "20 - Reporte General de Radicados de Entrada y PQRSyD por Tiempos Transcurridos";
$tituloE[21] = "21 - Reporte de Radicados de Entrada y PQRSyD por Estados";
$tituloE[22] = "22 - Reporte de Radicados de Entrada y PQRSyD por Tiempos de Respuestas en cada Dependencia";
// $tituloE[23] = "23 - Reporte de Radicados (Seguimiento de Entrada y PQRSyD)";

$subtituloE[1] = "ORFEO - Generada el: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
$subtituloE[2] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
$subtituloE[3] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
$subtituloE[4] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
$subtituloE[5] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
$subtituloE[6] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
$subtituloE[8] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
$subtituloE[17] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
$subtituloE[19] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
$subtituloE[18] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
$subtituloE[20] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
$subtituloE[21] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
$subtituloE[22] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
// $subtituloE[23] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";


$helpE[1] = "Este reporte muestra los radicados creados por usuario. Se puede discriminar por tipo de radicación.";
$helpE[2] = "Este reporte muestra los radicados de acuerdo al medio de recepción o envio realizado al momento de la radicación.";
$helpE[3] = "Este reporte muestra los radicados enviados a su destino final por el área.";
$helpE[4] = "Este reporte muestra los radicados digitalizados por usuario y el total de hojas digitalizadas. Se puede seleccionar el tipo de radicación y la fecha de digitalización.";
$helpE[5] = "Este reporte muestra la cantidad de documentos de entrada radicados del área de correspondencia a una dependencia.";
$helpE[6] = "Esta reporte muestra los radicados actuales por usuario en la correspondiente dependencia.";
$helpE[8] = "Este reporte muestra los radicados cuya fecha de vencimiento esta dentro del rango de fechas seleccionadas. Recordar que para dejar de contar tiempos de vencimientos se debe archivar el radicado.";
$helpE[9] = "Este reporte muestra el proceso que han tenido los radicados de Entrada que ingresaron durante las fechas seleccionadas.";
$helpE[10] = "Este reporte muestra los radicados que han sido reasignados a los usuarios, donde el rango de fechas seleccionadas corresponden a la fecha de radicación.";
//$helpE[11] = "Este reporte muestra la cantidad de radicados digitalizados por usuario y el total de hojas digitalizadas. Se puede seleccionar el tipo de radicaci&oacute;n y la fecha de digitalizaci&oacute;n.";
$helpE[12] = "Este reporte muestra los radicados que tenían asignados un tipo documental(TRD) y han sido modificados.";
$helpE[13] = "Este reporte muestra todos los expedientes agrupados por dependencia que con el número de radicados totales.";
$helpE[14] = "Este reporte muestra los radicados que tiene un usuario por cada carpeta personal.";
$helpE[15] = "Este reporte muestra los anexos cargados por el usuario de correspondencia desde la opción (Asociar Anexo Radicado). Se puede filtrar por tipo de radicado y por rango de fecha realizado el proceso.";
$helpE[16] = "Este reporte muestra los radicados que se encuentran archivados por la dependencia seleccionada, donde la fecha de radicación sea entre el rango de fechas ingresadas en el reporte. Los resultados arrojados van a mostrar la cantidad de radicados por dependencia, y cuando se ingrese al detalle se veran las especificaciones";
$helpE[17] = "Este reporte muestra los radicados que tienen respuesta cargada con relación al usuario y dependencia actual, en este reporte se agrupa por número de radicado asi que se debe tener presente que puede haber varias respuestas para un mismo radicado cuando se entre al detalle.";
$helpE[19] = "Este reporte muestra los radicados de PQRs segun el tipo de usuario seleccionado.";
$helpE[18] = "Este reporte muestra las siguientes consultas: <br> a). Si selecciona solo el rol, muestra como resultado todos los usuarios pertenecientes al rol. "
        . "<br>b). Se selecciona rol y tipo permiso (Accesos al sistema) muestra los permisos que tiene el rol. <br> c). Si selecciona rol y tipo permiso (Tipos documentales) muestra todos los tipos documentales a los que tiene permiso el rol."; 
$helpE[20] = "Este reporte muestra los tiempos transcurridos para las PQRSD y ENTRADA en relación con las fechas (fecha de radicado, fecha de respuesta, fecha de vencimiento, dias transcurridos entre las fechas). Este reporte permite, filtrar los radicados por diferentes criterios como lo son estado, medio de recepción tipo de PQRS. --> Con este reporte sale el formato de CONSOLIDACIÓN DE PQRS EN EL AÑO";
$helpE[21] = "Este reporte muestra los radicados de PQRSyD que se encuentran en cada uno de los estados (Asignadas, En tramite, Con Respuesta, Vencidas, Archivadas).". "<br>Para consultar las Archivadas se debe consultar por la dependencia 999-Dependencia Administración de Archivo";
$helpE[22] = "Este reporte muestra los tiempos de respuesta asociados a las PQRSD por cada dependencia. Este reporte es con base a la fecha de respuesta del radicado. SOLO TIENE EN CUENTA LOS RADICADOS LOS QUE TIENEN RESPUESTA";
// $helpE[23] = "Este reporte muestra todos los radicados de PQRS a los cuales se les hacce un seguimiento, ente reporte se listan los servicios, centro de salud";

?>	  
<html>
    <head>
        <title>principal</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <link rel="stylesheet" type="text/css" href="../js/spiffyCal/spiffyCal_v2_1.css">
        <script language="JavaScript" src="../js/spiffyCal/spiffyCal_v2_1.js"></script>
        <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
        <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <style>
            .ui-autocomplete { height: 200px; width: 200px; overflow-y: scroll; overflow-x: hidden;}
        </style>
        <script>
            setRutaRaiz("..");
            function adicionarOp(forma, combo, desc, val, posicion) {
            o = new Array;
            o[0] = new Option(desc, val);
            eval(forma.elements[combo].options[posicion] = o[0]);
            //alert ("Adiciona " +val+"-"+desc );
            }
            
            $(function () {
                $("#s_clasificacion").autocomplete({
                    source: "searchsGeneral.php",
                    minLength: 3,
                    select: function (event, ui) {}
                });
            });
        </script>

        <script language="javascript">
           <?php
            $ano_ini = date("Y");
            $mes_ini = substr("00" . (date("m") - 1), -2);
            if ($mes_ini == 0) {
                $ano_ini == $ano_ini - 1;
                $mes_ini = "12";
            }
            $dia_ini = date("d");
            if (!$fecha_ini)
            $fecha_ini = "$ano_ini/$mes_ini/$dia_ini";
            $fecha_busq = date("Y/m/d");
            if (!$fecha_fin)
            $fecha_fin = $fecha_busq;
            ?>
            var dateAvailable = new ctlSpiffyCalendarBox("dateAvailable", "formulario", "fecha_ini", "btnDate1", "<?= $fecha_ini ?>", scBTNMODE_CUSTOMBLUE);
            var dateAvailable2 = new ctlSpiffyCalendarBox("dateAvailable2", "formulario", "fecha_fin", "btnDate2", "<?= $fecha_fin ?>", scBTNMODE_CUSTOMBLUE);
        </script>
    </head>
    <?php
    include "$dir_raiz/envios/paEncabeza.php";
    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";
    include_once "$dir_raiz/include/db/ConnectionHandler.php";
    include("$dir_raiz/class_control/usuario.php");
    $db = new ConnectionHandler($dir_raiz);
    // $db->conn->debug=true;
    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
    $objUsuario = new Usuario($db);
    ?>
    <br>
    <!--
    Skinatech
    Autor: Andrés Mosquera
    Fecha: 08-11-2018
    Información: Eliminado del body: (onLoad="comboUsuarioDependencia(document.formulario, document.formulario.elements['dependencia_busq'].value, 'codus');") ya que no existe la función
    -->
    <body bgcolor="#ffffff" topmargin="0">
        <div id="spiffycalendar" class="text"></div>
            <form name="formulario"  method=GET action='./vistaFormConsulta.php?<?=  session_name() . "=" . trim(session_id()) . "&krd=$krd&fechah=$fechah"?>'>
                <center>
                    <div id="titulo" style="width: 95%;" align="center">Por Radicados</div>
                    <table width="95%"  border="1" cellpadding="0" cellspacing="5" class="borde_tab">
                        <tr><td colspan="4" class="listado1"><span class="alarmas"><?= $helpE[$tipoEstadistica] ?></span></td></tr>
                        <tr>
                            <td width="20%" class="titulos2"><label for="tipoEstadistica">Reporte a generar</label></td>
                            <td class="listado2" align="left" colspan="3">
                                <select id="tipoEstadistica" name=tipoEstadistica  aria-label='Listado de tipos de estadisticas del aplicativo' class="select form-control" onChange="formulario.submit();">
                                    <?php
                                    foreach ($tituloE as $key => $value) {
                                        if ($tipoEstadistica == $key)
                                            $selectE = " selected ";
                                        else
                                            $selectE = "";
                                        ?>
                                        <option  value=<?= $key ?> <?= $selectE ?>><?= $tituloE[$key] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <?php
                        // Dependencias
                        if ($tipoEstadistica != 18) {
                            ?>
                            <tr >
                                <?php  
                                    if ($tipoEstadistica == 20 or $tipoEstadistica == 21 or $tipoEstadistica == 22) {
                                        echo '<td width="20%" class="titulos2"><label for="dependencia_busq">Dependencia Actual</label></td>';
                                    }elseif($tipoEstadistica == 10){
                                        echo '<td width="20%" class="titulos2"><label for="dependencia_busq">Dependencia Destino</label></td>';
                                    }
                                    else{
                                        echo '<td width="20%" class="titulos2"><label for="dependencia_busq">Dependencia</label></td>';
                                    }
                                ?>
                                
                                <td class="listado2" colspan="3">
                                    <select id="dependencia_busq" name=dependencia_busq  aria-label='Listado de dependecias disponibles para la generación de estadísticas' class="select form-control"  onChange="formulario.submit();">
                                        <?php
                                        if ($usua_perm_estadistica > 1) {
                                            if ($dependencia_busq == '99999') {
                                                $datoss = " selected ";
                                            }
                                            if ($tipoEstadistica != 13) {
                                                ?>
                                                <option value=99999  <?= $datoss ?>>-- Todas las Dependencias --</option>
                                            <?php } else {
                                                ?>
                                                <option value=99999  <?= $datoss ?>>-- Seleccione una Dependencia --</option>
                                                <?php
                                            }
                                        }
                                        $whereDepSelect = " DEPE_CODI = '$dependencia' ";
                                        if ($usua_perm_estadistica == 1) {
                                            $whereDepSelect = " $whereDepSelect or depe_codi_padre = '$dependencia' ";
                                        }
                                        if ($usua_perm_estadistica == 2) {
                                            $isqlus = "select a.DEPE_CODI,a.DEPE_NOMB,a.DEPE_CODI_PADRE from DEPENDENCIA a ORDER BY a.DEPE_NOMB";
                                        } else {
                                            //$whereDepSelect=
                                            $isqlus = "select a.DEPE_CODI,a.DEPE_NOMB,a.DEPE_CODI_PADRE from DEPENDENCIA a 
                                        where $whereDepSelect ";
                                        }
                                        //if($codusuario!=1) $isqlus .= " and a.usua_codi=$codusuario "; 
                                        //echo "--->".$isqlus;
                                        $rs1 = $db->query($isqlus);

                                        do {
                                            $codigo = $rs1->fields["DEPE_CODI"];
                                            $vecDeps[] = $codigo;
                                            $depnombre = $rs1->fields["DEPE_NOMB"];
                                            $datoss = "";
                                            if ($dependencia_busq == $codigo) {
                                                $datoss = " selected ";
                                            }
                                            echo "<option value=$codigo  $datoss>$codigo - $depnombre</option>";
                                            $rs1->MoveNext();
                                        } while (!$rs1->EOF);
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <?php
                            if ($dependencia_busq != 99999) {
                                $whereDependencia = " AND DEPE_CODI='$dependencia_busq'";
                            }
                            $encabezado .= '&dependencia_busq='.$codigo;
                        }

                        if ($tipoEstadistica == 18) {
                            ?>
                            <tr id="cUsuario">
                                <td width="20%" class="titulos2">
                                    <label for="codus">Rol</label>
                                </td>
                                <td class="listado2">
                                    <select id="codrol" name="codrol"  aria-label='Listado de roles del sistema' class="select form-control"  onChange="formulario.submit();">
                                        <?php if ($usua_perm_estadistica > 0) {
                                            ?>			
                                            <option value=0> -- Seleccionar rol --</option>
                                            <?php
                                        }
                                        $queryRoles = "select nomb_rol as NOMB_ROL, cod_rol as COD_ROL from roles where estado =1 order by nomb_rol ";
                                        $rsD = $db->query($queryRoles);

                                        while (!$rsD->EOF) {
                                            $codigo = $rsD->fields["COD_ROL"];
                                            $vecDeps[] = $codigo;
                                            $usNombre = $rsD->fields["NOMB_ROL"];
                                            $datoss = ($codrol == $codigo) ? $datoss = " selected " : "";
                                            echo "<option value=$codigo  $datoss>$usNombre</option>";
                                            $rsD->MoveNext();
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td width="20%" class="titulos2">
                                    <label for="codus">Tipo permiso</label>
                                </td>
                                <td class="listado2">
                                    <select id="codpermisos" name="codpermisos"  aria-label='Listado de roles del sistema' class="select form-control"  onChange="formulario.submit();">
                                        <?php if ($usua_perm_estadistica > 0) {
                                            ?>			
                                            <option value=0> -- Agrupar por tipos de permisos --</option>
                                            <option value=1 <?= $codpermisos == 1 ? $datoss = " selected " : "" ?>> ACCESOS AL SISTEMA </option>
                                            <option value=2 <?= $codpermisos == 2 ? $datoss = " selected " : "" ?>> TIPOS DOCUMENTALES </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <?php
                            $encabezado .= '&codrol='.$codrol.'&codpermisos='.$codpermisos.'&tipoDocumento='.$tipoDocumento;
                        }

                        // Usuarios estadistica 10
                        if ($tipoEstadistica == 10) {
                            ?> 
                            <tr id="cUsuario">
                                <td width="20%" class="titulos2">
                                    <label for="codus">Usuario Destino</label>
                                    <br>
                                    <label for="usActivos" style="margin-left: 12px;">Incluir Usuarios Inactivos</label> 
                                    <? $datoss = isset($usActivos) && ($usActivos) ? " checked " : ""; ?>
                                    <input id="usActivos" name="usActivos" type="checkbox" title="Seleccione para incluir usuarios inactivos en el aplicativo en la consulta" class="select" <?= $datoss ?> onChange="formulario.submit();">
                                </td>

                                <td class="listado2" colspan="3">
                                    <select id="codus" name="codus"  aria-label='Listado de usuarios disponibles para genera la estadistica seleccionada' class="select form-control"  onChange="formulario.submit();">
                                        <?php if ($usua_perm_estadistica > 0) {
                                            ?>			
                                            <option value=0> -- AGRUPAR POR TODOS LOS USUARIOS --</option>
                                            <?php
                                        }
                                        $whereUsSelect = (!isset($_POST['usActivos']) ) ? " u.USUA_ESTA = '1' " : "";
                                        $whereUsSelect = ($usua_perm_estadistica < 1) ?
                                                (($whereUsSelect != "") ? $whereUsSelect . " AND u.USUA_LOGIN='$krd' " : " u.USUA_LOGIN='$krd' ") : $whereUsSelect;

                                        if ($dependencia_busq != 99999) {
                                            $whereUsSelect = ($whereUsSelect == "") ? substr($whereDependencia, 4) : $whereUsSelect . $whereDependencia;
                                            $isqlus = "select u.USUA_NOMB,u.USUA_DOC,u.USUA_ESTA, u.DEPE_CODI from USUARIO u where  $whereUsSelect order by u.USUA_NOMB";
                                            //if($codusuario!=1) $isqlus .= " and a.usua_codi=$codusuario "; 
                                            //echo "--->".$isqlus;
                                            $rs1 = $db->query($isqlus);
                                            while (!$rs1->EOF) {
                                                $codigo = $rs1->fields["USUA_DOC"];
                                                $dependenciaPer = $rs1->fields["DEPE_CODI"];
                                                $vecDeps[] = $codigo;
                                                $usNombre = $rs1->fields["USUA_NOMB"];
                                                $datoss = ($codus == $codigo) ? $datoss = " selected " : "";
                                                echo "<option value=$codigo  $datoss>$dependenciaPer - $usNombre</option>";
                                                $rs1->MoveNext();
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <?php
                            $encabezado .= '&usActivos='.$usActivos;
                        }

                        // Usuarios estadistica el resto
                        if ($tipoEstadistica == 1 or $tipoEstadistica == 2 or $tipoEstadistica == 3 or
                                $tipoEstadistica == 4 or $tipoEstadistica == 5 or $tipoEstadistica == 6 or
                                $tipoEstadistica == 7 or $tipoEstadistica == 11 or $tipoEstadistica == 12 or 
                                $tipoEstadistica == 15 or $tipoEstadistica == 17 or 
                                $tipoEstadistica == 19  or $tipoEstadistica == 21) {
                            ?> 
                            <tr id="cUsuario">
                                <td width="20%" class="titulos2">
                                    <label for="codus">Usuario</label>
                                    <br>
                                    <label for="usActivos" style="margin-left: 12px;">Incluir Usuarios Inactivos</label> 
                                    <? $datoss = isset($usActivos) && ($usActivos) ? " checked " : ""; ?>
                                    <input id="usActivos" name="usActivos" type="checkbox" title="Seleccione para incluir usuarios inactivos en el aplicativo en la consulta" class="select" <?= $datoss ?> onChange="formulario.submit();">
                                </td>

                                <td class="listado2" colspan="3">
                                    <select id="codus" name="codus"  aria-label='Listado de usuarios disponibles para genera la estadistica seleccionada' class="select form-control"  onChange="formulario.submit();">
                                        <?php if ($usua_perm_estadistica > 0) {
                                            ?>			
                                            <option value=0> -- AGRUPAR POR TODOS LOS USUARIOS --</option>
                                            <?php
                                        }
                                        $whereUsSelect = (!isset($_POST['usActivos']) ) ? " u.USUA_ESTA = '1' " : "";
                                        $whereUsSelect = ($usua_perm_estadistica < 1) ?
                                                (($whereUsSelect != "") ? $whereUsSelect . " AND u.USUA_LOGIN='$krd' " : " u.USUA_LOGIN='$krd' ") : $whereUsSelect;

                                        if ($dependencia_busq != 99999) {
                                            $whereUsSelect = ($whereUsSelect == "") ? substr($whereDependencia, 4) : $whereUsSelect . $whereDependencia;
                                            $isqlus = "select u.USUA_NOMB,u.USUA_CODI,u.USUA_ESTA, u.DEPE_CODI from USUARIO u where  $whereUsSelect order by u.USUA_NOMB";
                                            //if($codusuario!=1) $isqlus .= " and a.usua_codi=$codusuario "; 
                                            //echo "--->".$isqlus;
                                            $rs1 = $db->query($isqlus);
                                            while (!$rs1->EOF) {
                                                $codigo = $rs1->fields["USUA_CODI"];
                                                $dependenciaPer = $rs1->fields["DEPE_CODI"];
                                                $vecDeps[] = $codigo;
                                                $usNombre = $rs1->fields["USUA_NOMB"];
                                                $datoss = ($codus == $codigo) ? $datoss = " selected " : "";
                                                echo "<option value=$codigo  $datoss>$dependenciaPer - $usNombre</option>";
                                                $rs1->MoveNext();
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <?php
                            $encabezado .= '&usActivos='.$usActivos;
                        } 

                        if($tipoEstadistica == 8 or $tipoEstadistica == 10 or $tipoEstadistica == 15 
                            or $tipoEstadistica == 16  or $tipoEstadistica == 21 
                            or $tipoEstadistica == 23 or $tipoEstadistica == 2 or $tipoEstadistica == 4 ){
                            $colspan = '3';
                            $width = '';
                        }else{
                            $colspan = '0';
                            $width = 'width="30%"';
                        }

                        // Tipos de radicados
                        if ($tipoEstadistica == 1 or $tipoEstadistica == 2 or $tipoEstadistica == 4 or $tipoEstadistica == 6 
                                or $tipoEstadistica == 11 or $tipoEstadistica == 12 or $tipoEstadistica == 15 
                                or $tipoEstadistica == 16 or $tipoEstadistica == 17 or $tipoEstadistica == 8) {
                            ?>
                            <tr>
                                <td width="20%" class="titulos2"><label for="nmenu">Tipo de Radicado</label> </td>
                                <td class="listado2" <?=$width?> colspan="<?=$colspan?>" >
                                    <?php 
                                    //** Fin de modificacion                                   **//    
                                    $rs = $db->conn->Execute("select SGD_TRAD_DESCR, SGD_TRAD_CODIGO  from SGD_TRAD_TIPORAD where mostrar_como_tipo=1 $wheretprad order by 2");
                                    $nmenu = "tipoRadicado";
                                    $valor = "";
                                    $default_str = $tipoRadicado;
                                    $itemBlanco = " -- Agrupar por Todos los Tipos de Radicado -- ";
                                    print $rs->GetMenu2($nmenu, $default_str, $blank1stItem = "$valor:$itemBlanco", false, 0, "class='select form-control' id='nmenu' aria-label='Listado de tipos de radicados para incluir en la estadistica'");
                                    ?>&nbsp;
                                </td>
                            
                            <?php
                            $encabezado .= '&tipoRadicado='.$tipoRadicado;
                        }

                        // Tipos de radicados especial para estadística 20 (SOLO Entrada o PQRS)
                        if ($tipoEstadistica == 20) {
                            ?>
                            <tr>
                                <td width="20%" class="titulos2"><label for="nmenu">Tipo de Radicado</label> </td>
                                <td class="listado2" <?=$width?> colspan="<?=$colspan?>">
                                    <?php 

                                    if (trim($wheretprad) != '') {
                                        $wheretprad2 = $wheretprad . ' AND ' . 'SGD_TRAD_CODIGO IN('.$tipoRadicadoPqr.',2) ';
                                    } else {
                                        $wheretprad2 = 'WHERE SGD_TRAD_CODIGO IN('.$tipoRadicadoPqr.',2) ';
                                    }

                                    $rs = $db->conn->Execute("select SGD_TRAD_DESCR, SGD_TRAD_CODIGO  from SGD_TRAD_TIPORAD $wheretprad2 order by 2");
                                    $nmenu = "tipoRadicado";
                                    $valor = "";
                                    $default_str = $tipoRadicado;
                                    $itemBlanco = " -- Agrupar por los Tipos de Radicado (Entrada y Pqrsd) -- ";
                                    print $rs->GetMenu2($nmenu, $default_str, $blank1stItem = "$valor:$itemBlanco", false, 0, "class='select form-control' id='nmenu' aria-label='Listado de tipos de radicados para incluir en la estadistica'");
                                    ?>
                                </td>
                            <?php
                            $encabezado .= '&tipoRadicado='.$tipoRadicado;
                        }

                        // Tipo de usuario
                        if ($tipoEstadistica == 19) {
                            ?>
                            <tr>
                                <td width="20%" class="titulos2"><label for="nmenu">Tipo de usuario</label> </td>
                                <td class="listado2" <?=$width?> colspan="<?=$colspan?>">
                                    <?php 
                                    $rs = $db->conn->Execute("select nombre_tipo_usuario, id_grupo_tipo_usuario from tipo_usuario_grupo");
                                    $nmenu = "tipoUsuario";
                                    $valor = "";
                                    $default_str = $tipoUsuario;
                                    $itemBlanco = " -- Agrupar por Todos los Tipos de Usuarios -- ";
                                    print $rs->GetMenu2($nmenu, $default_str , $blank1stItem = "$valor:$itemBlanco", false, 0, "class='select form-control' id='nmenu' aria-label='Listado de tipos de radicados para incluir en la estadistica'");
                                    ?>
                                </td>
                            <?php
                            $encabezado .= '&tipoUsuario='.$tipoUsuario;
                        }

                        // Tipos documentales
                        if ($tipoEstadistica == 1 or $tipoEstadistica == 6 or $tipoEstadistica == 10 or
                                $tipoEstadistica == 12 or $tipoEstadistica == 14 or $tipoEstadistica == 17 or 
                                $tipoEstadistica == 19  or $tipoEstadistica == 20 or $tipoEstadistica == 21 or $tipoEstadistica == 23) {
                            ?>
                            
                                <td width="20%" class="titulos2"><label for="tipoDocumento">Tipo de Documento</label> </td>
                                <td class="listado2" colspan="<?=$colspan?>">
                                    <select id="tipoDocumento" name=tipoDocumento  class="select form-control" aria-label='Listado con los tipos documentales para seleccionar en la estadistica' >
                                        <?php
                                        
                                        if($tipoEstadistica == 19  or $tipoEstadistica == 20 or $tipoEstadistica == 21){
                                            $tipoDocRadi = " and sgd_tpr_tp4 = 1";
                                        }else{
                                            $tipoDocRadi = "";
                                        }
                                        
                                        $isqlTD = "select SGD_TPR_DESCRIP, SGD_TPR_CODIGO from SGD_TPR_TPDCUMENTO WHERE SGD_TPR_CODIGO<>0 $tipoDocRadi order by SGD_TPR_DESCRIP";

                                        $rs1 = $db->query($isqlTD);
                                        $datoss = "";

                                        if ($tipoDocumento != '9998') {
                                            $datoss = " selected ";
                                            $selecUs = " b.USUA_NOMB USUARIO, ";
                                            $groupUs = " b.USUA_NOMB, ";
                                        }

                                        if ($tipoDocumento == '9999') {
                                            $datoss = " selected ";
                                        }
                                        ?>
                                        <option value='9999'  <?= $datoss ?>>-- No Agrupar Por Tipo de Documento</option>
                                        <?php
                                        $datoss = "";



                                        if ($tipoDocumento == '9998') {
                                            $datoss = " selected ";
                                        }
                                        ?>
                                        <option value='9998'  <?= $datoss ?>>-- Agrupar Por Tipo de Documento</option>
                                        <?php
                                        $datoss = "";


                                        if ($tipoDocumento == '9997') {
                                            $datoss = " selected ";
                                        }
                                        ?>
                                        <option value='9997'  <?= $datoss ?>>-- Tipos Documentales No Definidos</option>
                                        <?php
                                        do {
                                            $codigo = $rs1->fields["SGD_TPR_CODIGO"];
                                            $vecDeps[] = $codigo;
                                            $selNombre = $rs1->fields["SGD_TPR_DESCRIP"];
                                            $datoss = "";
                                            if ($tipoDocumento == $codigo) {
                                                $datoss = " selected ";
                                            }
                                            echo "<option value=$codigo  $datoss>$selNombre</option>";
                                            $rs1->MoveNext();
                                        } while (!$rs1->EOF);
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <?php
                            $encabezado .= '&tipoDocumento='.$tipoDocumento;
                        }

                        // Medios Recepción
                        if($tipoEstadistica == 20  or $tipoEstadistica == 23){
                            ?>
                            <tr>
                                <td width="20%" class="titulos2"><label for="medioRecepcion">Medio de Recepción</label> </td>
                                <td class="listado2" colspan="<?=$colspan?>" >
                                    <select id="medioRecepcion" name="medioRecepcion"  class="select form-control" aria-label='Listado con los medios de recepción para seleccionar en la estadistica' >
                                        <?php
                                        $isqlMedios = "select * from medio_recepcion";
                                        $rs1Medios = $db->query($isqlMedios);
                                        $datoss = "";

                                        if ($medioRecepcion == '9999') {
                                            $datoss = " selected ";
                                        }
                                        ?>
                                        <option value='9999'  <?= $datoss ?>>-- Todos los medios de recepción</option>
                                        <?php
                                        do {
                                            $codigo = $rs1Medios->fields["MREC_CODI"];
                                            $vecDeps[] = $codigo;
                                            $selNombre = $rs1Medios->fields["MREC_DESC"];
                                            $datoss = "";
                                            if ($medioRecepcion == $codigo) {
                                                $datoss = " selected ";
                                            }
                                            echo "<option value=$codigo $datoss>$selNombre</option>";
                                            $rs1Medios->MoveNext();
                                        } while (!$rs1Medios->EOF);
                                        ?>
                                    </select>
                                </td>
                            <?php
                            $encabezado .= '&medioRecepcion='.$medioRecepcion;   
                        }
                        // Estados de radicado pqrs
                        if($tipoEstadistica == 20){
                            ?>
                            
                                <td width="20%" class="titulos2"><label for="estadoRadicado">Estado</label> </td>
                                <td class="listado2">
                                    <select id="estadoRadicado" name="estadoRadicado"  class="select form-control" aria-label='Listado con los medios de recepción para seleccionar en la estadistica' >
                                        <?php
                                        $isqlEstadosRadicado = "select * from estado order by esta_codi";
                                        $rs1EstadosRadicado = $db->query($isqlEstadosRadicado);
                                        $datoss = "";

                                        if ($estadoRadicado == 'TODOS') {
                                            $datoss = " selected ";
                                        }
                                         
                                        ?>
                                        <option value='TODOS'  <?= $datoss ?>>-- Todos los Estados</option>
                                        <?php
                                        do {
                                            $codigo = $rs1EstadosRadicado->fields["ESTA_CODI"];
                                            $vecDeps[] = $codigo;
                                            $selNombre = $rs1EstadosRadicado->fields["ESTA_DESC"];
                                            $datoss = "";
                                            if ($estadoRadicado == $codigo) {
                                                $datoss = " selected ";
                                            }
                                            echo "<option value=$codigo $datoss>$selNombre</option>";
                                            $rs1EstadosRadicado->MoveNext();
                                        } while (!$rs1EstadosRadicado->EOF);

                                        if ($estadoRadicado == 'oportuna') {
                                            $datoss = " selected ";
                                        }
                                        if ($estadoRadicado == 'fuera') {
                                            $datoss = " selected ";
                                        }
                                        
                                        ?>
                                        <option value='oportuna' <?= $datoss ?>>Atendidas oportunamente </option>
                                        <option value='fuera' <?= $datoss ?>>Atendidas fuera de términos</option>
                                    </select>
                                </td>
                            </tr>
                            <?php
                            $encabezado .= '&estadoRadicado='.$estadoRadicado;
                        }
                        
                        // Por servicio y centro de antención
                        // if($tipoEstadistica == 23 or $tipoEstadistica == 20){
                        //     ?>
                        <!-- //     <tr id="cUsuario">
                        //         <td width="20%" class="titulos2">
                        //             <label for="codus">Servicios</label>
                        //         </td>
                        //         <td class="listado2">
                        //             <select id="servicios" name="servicios"  aria-label='Filtra radicados con o sin respuesta' class="select form-control"  onChange="formulario.submit();"> -->
                                     <?php
                        //                 $isqlServicioRadicado = "select * from servicios_pqrs order by id_servicio_pqrs	";
                        //                 $rs1ServicioRadicado = $db->query($isqlServicioRadicado);
                        //                 $datoss = "";

                        //                 if ($servicios == 'TODOS') {
                        //                     $datoss = " selected ";
                        //                 }
                        //                 ?>
                        <!-- //                 <option value='TODOS'  <?= $datoss ?>>-- Todos los servicios</option> -->
                                         <?php
                        //                 do {
                        //                     $codigoServ = $rs1ServicioRadicado->fields["ID_SERVICIO_PQRS"];
                        //                     $vecDeps[] = $codigoServ;
                        //                     $selNombreSer = $rs1ServicioRadicado->fields["NOMBRE_SERVICIO_PQRS"];
                        //                     $datoss = "";
                        //                     if ($servicios == $codigoServ) {
                        //                         $datoss = " selected ";
                        //                     }
                        //                     echo "<option value=$codigoServ $datoss>$selNombreSer</option>";
                        //                     $rs1ServicioRadicado->MoveNext();
                        //                 } while (!$rs1ServicioRadicado->EOF);
                        //                 ?>
                        <!-- //             </select>
                        //         </td>
                        //         <td width="30%" class="titulos2">
                        //             <label for="codus">Centro de Salud</label>
                        //         </td>
                        //         <td class="listado2">
                        //             <select id="centro" name="centro"  aria-label='Filtra radicados con o sin respuesta' class="select form-control"  onChange="formulario.submit();"> -->
                                     <?php
                        //                 $isqlCentroRadicado = "select * from grupo_interes order by id_grupo_interes	";
                        //                 $rs1CentroRadicado = $db->query($isqlCentroRadicado);
                        //                 $datoss = "";

                        //                 if ($centro == 'TODOS') {
                        //                     $datoss = " selected ";
                        //                 }
                        //                 ?>
                        <!-- //                 <option value='TODOS'  <?= $datoss ?>>-- Todos los Centro de salud</option> -->
                                         <?php
                        //                 do {
                        //                     $codigoCentro = $rs1CentroRadicado->fields["ID_GRUPO_INTERES"];
                        //                     $vecDeps[] = $codigoCentro;
                        //                     $selNombreCentro = $rs1CentroRadicado->fields["NOMBRE_GRUPO_INTERES"];
                        //                     $datoss = "";
                        //                     if ($centro == $codigoCentro) {
                        //                         $datoss = " selected ";
                        //                     }
                        //                     echo "<option value=$codigoCentro $datoss>$selNombreCentro</option>";
                        //                     $rs1CentroRadicado->MoveNext();
                        //                 } while (!$rs1CentroRadicado->EOF);
                        //                 ?>
                        <!-- //             </select>
                        //         </td>
                        //     </tr> -->
                             <?php
                        // }

                        // Otras opciones
                        // if($tipoEstadistica == 20){
                            ?>
                        <!-- //     <tr id="cUsuario">
                        //         <td width="20%" class="titulos2">
                        //             <label for="codus">Retroalimentación</label>
                        //         </td>
                        //         <td class="listado2" colspan="3">
                        //             <select id="listadoRetroalimentacion" name="listadoRetroalimentacion"  aria-label='Filtra radicados que tienen retroalimentación' class="select form-control"  onChange="formulario.submit();">
                        //                 <option value='TODOS' <?= $datoss ?>>-- Todas las opciones -</option>
                        //                 <option value='Preventivo' <?= $datoss ?>>Preventivo</option>
                        //                 <option value='Correctivo' <?= $datoss ?>>Correctivo</option>
                        //                 <option value='Mejorar' <?= $datoss ?>>Mejorar</option>
                        //                 <option value='Tramite' <?= $datoss ?>>Tramite/Consulta</option>
                        //             </select>
                        //         </td>
                        //     </tr> -->
                            <?php
                        // }

                        // Rangos de fechas
                        if ($tipoEstadistica == 1 or $tipoEstadistica == 2 or $tipoEstadistica == 3 or
                                $tipoEstadistica == 4 or $tipoEstadistica == 5 or $tipoEstadistica == 7 or
                                $tipoEstadistica == 8 or $tipoEstadistica == 9 or $tipoEstadistica == 10 or
                                $tipoEstadistica == 11 or $tipoEstadistica == 12 or $tipoEstadistica == 15 or 
                                $tipoEstadistica == 16 or $tipoEstadistica == 17 or $tipoEstadistica == 19  or 
                                $tipoEstadistica == 20 or $tipoEstadistica == 21 or $tipoEstadistica == 22  or $tipoEstadistica == 23) {
                            ?>  
                            <tr>
                                <td width="20%" class="titulos2"><label>Fecha inicial (a&ntilde;o/mes/dia)</label> </td>
                                <td class="listado2">
                                    <script language="javascript">
                                        dateAvailable.writeControl();
                                        dateAvailable.dateFormat = "yyyy/MM/dd";
                                    </script>
                                    &nbsp;
                                </td>
                                <td width="20%" class="titulos2"><label>Fecha final (a&ntilde;o/mes/dia) </label></td>
                                <td class="listado2">
                                    <script language="javascript">
                                        dateAvailable2.writeControl();
                                        dateAvailable2.dateFormat = "yyyy/MM/dd";
                                    </script>&nbsp;</td>
                            </tr>
                            <?php
                            $encabezado .= '&fecha_fin='.$fecha_fin.'&fecha_ini='.$fecha_ini;
                        }
                        ?>
                        <tr >
                            <td colspan="4" class="listado1">
                                <center>
                                    <input name="Submit" type="reset" class="botones" value="Limpiar" aria-label='Restablecer valores del formulario a los por defecto'> 
                                    <input type="submit" class="botones" value="Generar" name="generarOrfeo" aria-label='Generar reporte estadistico con los parametros antes selecccionados'>
                                </center>
                            </td>
                        </tr>
                    </table>
                    <br>
                </center>    
            </form>
            <?php
                //Modificado idrd para enviar documento del usuario
                $datosaenviar = "fechaf=$fechaf&tipoEstadistica=$tipoEstadistica&codus=$codus&krd=$krd&dependencia_busq=$dependencia_busq&dir_raiz=$dir_raiz&fecha_ini=$fecha_ini&fecha_fin=$fecha_fin&tipoRadicado=$tipoRadicado&tipoDocumento=$tipoDocumento&usua_doc=$usuadocs";

                if (isset($generarOrfeo) && $tipoEstadistica == 12) {
                    global $orderby;
                    $orderby = 'ORDER BY NOMBRE';
                    $whereDep = ($dependencia_busq != 99999) ? "AND h.DEPE_CODI = '" . $dependencia_busq . "'" : '';

                    switch ($db->driver) {
                        case 'mssql':
                            $fecha = "AND " . $db->conn->SQLDate('Y/m/d', 'r.RADI_FECH_RADI') . " BETWEEN '$fecha_ini'  AND '$fecha_fin'";
                            break;
                        case 'mysql':
                            $fecha = "AND " . $db->conn->SQLDate('Y/m/d', 'r.RADI_FECH_RADI') . " BETWEEN '$fecha_ini'  AND '$fecha_fin'";
                            break;
                        case 'postgres':
                            $fecha = " AND TO_CHAR(r.RADI_FECH_RADI,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin'";
                            break;
                        case 'ocipo':
                        case 'oci8':
                            $fecha = "AND " . $db->conn->SQLDate('Y/m/d', 'r.RADI_FECH_RADI') . " BETWEEN '$fecha_ini'  AND '$fecha_fin'";
                            break;
                    }
                    
                    //modificado idrd para postgres	
                    $isqlus = "select u.USUA_NOMB AS NOMBRE
                                    , u.USUA_DOC, d.DEPE_CODI
                                    , COUNT(r.RADI_NUME_RADI) as TOTAL_MODIFICADOS 
                               FROM USUARIO u
                                    , RADICADO r
                                    , HIST_EVENTOS h
                                    , DEPENDENCIA d
                                    , SGD_TPR_TPDCUMENTO s 
                               WHERE u.USUA_DOC = h.USUA_DOC 
                                    AND h.SGD_TTR_CODIGO = 32 
                                    AND h.HIST_OBSE LIKE '*Modificado TRD*%' 
                                    AND h.DEPE_CODI = d.DEPE_CODI $whereDep 
                                    AND s.SGD_TPR_CODIGO = r.TDOC_CODI 
                                    AND r.RADI_NUME_RADI = h.RADI_NUME_RADI $fecha 
                               GROUP BY u.USUA_NOMB
                                    , u.USUA_DOC
                                    , d.DEPE_CODI $orderby";
                    $rs1 = $db->query($isqlus);
                    //echo '------------------> ' . $isqlus;
                        
                    while (!$rs1->EOF) {
                        $usuadoc[] = $rs1->fields["USUA_DOC"];
                        $dependencias[] = $rs1->fields["DEPE_CODI"];
                        $rs1->MoveNext();
                    }
                }

                if ($generarOrfeo) { include "genEstadistica.php"; }
            ?>
        </div>        
    </body>
</html>

<form name=jh >
    <input type=hidDEN name=jj value=0>
    <input type=hidDEN name=dS value=0>
</form>
