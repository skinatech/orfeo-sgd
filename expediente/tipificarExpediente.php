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
  |                     INCLUDESBoton para desplegar el calendario
  Usuario Responsable del Proceso

  |
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


/** Modulo de Expedientes o Carpetas Virtuales
 * Modificacion Variables 
 * @autor Jairo Losada 2009/06
 * Licencia GNU/GPL 
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];
$tpNumRad = $_SESSION["tpNumRad"];
$tpPerRad = $_SESSION["tpPerRad"];
$tpDescRad = $_SESSION["tpDescRad"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tpDepeRad = $_SESSION["tpDepeRad"];
$nurad = $_GET['nurad'];
$coddepe = $_GET['coddepe'];
$fechaExp = $_POST['fechaExp'];

$usuaPermExpediente = $_SESSION["usuaPermExpediente"];
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";

if (!$nurad)
    $nurad = $rad;
if ($nurad) {
    $ent = substr($nurad, -1);
}
include_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$dir_raiz");
//$db->conn->debug = true;

include_once "$dir_raiz/include/tx/Historico.php";
include_once ("$dir_raiz/class_control/TipoDocumental.php");
include_once "$dir_raiz/include/tx/Expediente.php";
include_once( "$dir_raiz/include/tx/Radicacion.php" );
include_once "$dir_raiz/include/tx/Historico.php";

$radicadoInfo = new Radicacion($db);
$trd = new TipoDocumental($db);
$Historico = new Historico($db);

$encabezadol = "$PHP_SELF?" . session_name() . "=" . session_id() . "&opcionExp=$opcionExp&numeroExpediente=$numeroExpediente&nurad=$nurad&coddepe=$coddepe&codusua=$codusua&depende=$depende&ent=$ent&tdoc=$tdoc&codiTRDModi=$codiTRDModi&codiTRDEli=$codiTRDEli&codserie=$codserie&tsub=$tsub&ind_ProcAnex=$ind_ProcAnex";
?>
<html>
    <head>
        <title>Crear Nuevo Expediente</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script>
            function regresar() {
                document.TipoDocu.submit();
            }

            function comprobar() {
                alert("entro a comprobar");
                if (document.TipoDocu.parExp_1.value != "" && document.TipoDocu.codserie.value != 0 && document.TipoDocu.tsub.value != 0) {
                    document.TipoDocu.submit();
                } else {
                    alert("Por favor seleccion serie, subserie y digite el nombre del expediente");
                }
            }
            function Start(URL, WIDTH, HEIGHT)
            {
                windowprops = "top=0,left=0,location=no,status=no, menubar=no,scrollbars=yes, resizable=yes,width=" + WIDTH + ",height=" + HEIGHT;
                preview = window.open(URL, "preview", windowprops);
            }
        </script><style type="text/css">
        </style>
    </head>
    <body bgcolor="#FFFFFF">
        <div id="spiffycalendar" class="text"></div>
        <link rel="stylesheet" type="text/css" href="../js/spiffyCal/spiffyCal_v2_1.css">
        <script language="JavaScript" src="../js/spiffyCal/spiffyCal_v2_1.js"></script>
        <form method="post" action="<?= $encabezadol ?>" name="TipoDocu">
            <?php
            /*
             * Adicion nuevo Registro
             */
            if ($Actualizar && $tsub != 0 && $codserie != 0) {
                if (!$digCheck) {
                    $digCheck = "E";
                }
                $codiSRD = $codserie;
                $codiSBRD = $tsub;
                //$trdExp = $codiSRD.$codiSBRD;
                $seriessub = $codiSRD.$codiSBRD;
                $trdExp = str_pad($seriessub, 4, "0", STR_PAD_RIGHT);
                $expediente = new Expediente($db);
                if (!$expManual) {
                    $secExp = $expediente->secExpediente($dependencia, $codiSRD, $codiSBRD, $anoExp);
                } else {
                    $secExp = $consecutivoExp;
                }
                $consecutivoExp = str_pad($secExp, 6, "0", STR_PAD_LEFT);
                $numeroExpediente = $anoExp . $dependencia . $trdExp . $consecutivoExp . $digCheck;

                /*
                 *  Modificado: 09-Junio-2006 Supersolidaria
                 *  Arreglo con los parametros del expediente.
                 */
                foreach ($_POST as $elementos => $valor) {
                    if (strncmp($elementos, 'parExp_', 7) == 0) {
                        $indice = (int) substr($elementos, 7);
                        $arrParametro[$indice] = $valor;
                    }
                }
                /**  Procedimiento que Crea el Numero de  Expediente
                 *  @param $numeroExpediente String  Numero Tentativo del expediente, Hya que recordar que en la creacion busca la ultima secuencia creada.
                 *  @param $nurad  Numeric Numero de radicado que se insertara en un expediente.
                 *  Modificado: 09-Junio-2006 Supersolidaria
                 *  La funcion crearExpediente() recibe los parametros $codiPROC y $arrParametro
                 */
                $numeroExpedienteE = $expediente->crearExpediente($numeroExpediente, $nurad, $dependencia, $codusuario, $usua_doc, $usuaDocExp, $codiSRD, $codiSBRD, 'false', $fechaExp, $_POST['codProc'], $arrParametro);
                if ($numeroExpedienteE == 0) {
                    echo "<CENTER><table class=borde_tab><tr><td class=titulosError>EL EXPEDIENTE QUE INTENTO CREAR YA EXISTE.</td></tr></table>";
                } else {
                    $observaTrd = "Asignación de *TRD*" . $codserie . "/" . $codiSBRD;
                    /**  Procedimiento que Inserta el Radicado en el Expediente
                     *  @param $insercionExp Numeric  Devuelve 1 si inserto el expediente correctamente 0 si Fallo.
                     */
                    $insercsionExp = $expediente->insertar_expediente($numeroExpediente, $nurad, $dependencia, $codusuario, $usua_doc);
                    $Historico->insertarHistorico($nurad, $dependencia, $codusuario, $dependencia, $codusuario, $observaTrd, 32);

                    $radicadoInfo->trdRadicado($nurad, $codiSRD, $codiSBRD, $dependencia, $codusuario, $usua_doc);
                    $codiTRDS = $codiTRD;

                    $i++;
                    $TRD = $codiTRD;

                    if( $codserie != '0' ){
                        $sqlOb = "select sgd_srd_descrip from sgd_srd_seriesrd where sgd_srd_codigo = '".$codserie."'";
                        $rsOS = $db->conn->Execute($sqlOb);
                        $obs_serie = $rsOS->fields['SGD_SRD_DESCRIP'];

                    }else{
                        $obs_serie = '';
                    }

                    if( $codiSBRD != '0' ){
                        $sqlOb = "select sgd_sbrd_descrip from sgd_sbrd_subserierd where sgd_srd_codigo = '".$codserie."' and sgd_sbrd_codigo = '".$codiSBRD."'";
                        $rsOSB = $db->conn->Execute($sqlOb);
                        $obs_subserie = $rsOSB->fields['SGD_SBRD_DESCRIP'];
                        
                    }else{
                        $obs_subserie = '';
                    }

                    $observa = "TRD " .$obs_serie. "/" . $obs_subserie . " (Creación de Expediente.)";
                    
                    $radicados[] = $nurad;
                    $tipoTx = 51;
                    
                    $Historico->insertarHistoricoExp($numeroExpediente, $radicados, $dependencia, $codusuario, $observa, $tipoTx, 0);

                }
                
            }
            ?>

            <center>
                <div id="titulo" style="width: 95%;" align="center">Aplicaci&oacute;n de la TRD para el nuevo expediente</div>
            </center>
            <table border=1 width=95% align="center" class="borde_tab" cellspacing="1" cellpadding="0">

                <?php
                if ($numeroExpedienteE != 0) {
                    ?>
                    <tr align="center" class="listado2">
                        <td width="33%" height="25" align="center" colspan="2">
                            <font color="#CC0000" face="arial" size="2">
                            Se ha creado el Expediente No.
                            </font>
                            <b>
                                <font color="#000000" face="arial" size="2">
                                <?php print $numeroExpedienteE; ?>
                            </b>
                            <font color="#CC0000" face="arial" size="2">
                            con la siguiente informaci&oacute;n:
                            </font>
                            </center>
                        </td>
                    </tr>
                    <?php
                }

                if ($numeroExpedienteE != 0) {
                    $arrTRDExp = $expediente->getTRDExp($numeroExpediente, $codserie, $tsub, $codProc);
                    ?>
                    <tr>
                        <td class="titulos5">Serie</td>
                        <td class="listado2">
                            <?php print $arrTRDExp['serie']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="titulos5">Subserie</td>
                        <td class="listado2">
                            <?php print $arrTRDExp['subserie']; ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
            if (!isset($Actualizar)) { //Inicio if( $Actualizar )
                ?>
                <table width="95%" border="1" cellspacing="1" cellpadding="0" align="center" class="borde_tab">
                    <tr >
                        <td width="62%" class="titulos5" >Serie</td>
                        <td width="38%" class=listado2 >
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
                            $querySerie = "select distinct ($sqlConcat) as detalle, s.sgd_srd_codigo from sgd_mrd_matrird m, sgd_srd_seriesrd s where m.depe_codi = '$coddepe' and s.sgd_srd_codigo = m.sgd_srd_codigo and " . $sqlFechaHoy . " between s.sgd_srd_fechini and s.sgd_srd_fechfin order by detalle";
                            $rsD = $db->conn->Execute($querySerie);

                            $comentarioDev = "Muestra las Series Docuementales";
                            include "$dir_raiz/include/tx/ComentarioTx.php";
                            print $rsD->GetMenu2("codserie", $codserie, "0:-- Seleccione --", false, "", "onChange='submit()' class='select' aria-label='Listado de series disponibles para asignar al expediente'");
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="titulos5" >Subserie</td>
                        <td class=listado2 >
                            <?php
                            $nomb_varc = "su.sgd_sbrd_codigo";
                            $nomb_varde = "su.sgd_sbrd_descrip";
                            include "$dir_raiz/include/query/trd/queryCodiDetalle.php";
                            $querySub = "select distinct ($sqlConcat) as detalle, su.sgd_sbrd_codigo
                            from sgd_mrd_matrird m, sgd_sbrd_subserierd su where m.depe_codi = '$coddepe' and m.sgd_srd_codigo = '$codserie' and su.sgd_srd_codigo = '$codserie' and su.sgd_sbrd_codigo = m.sgd_sbrd_codigo and " . $sqlFechaHoy . " between su.sgd_sbrd_fechini and su.sgd_sbrd_fechfin order by detalle";
                            $rsSub = $db->conn->Execute($querySub);

                            include "$dir_raiz/include/tx/ComentarioTx.php";
                            print $rsSub->GetMenu2("tsub", $tsub, "0:-- Seleccione --", false, "", "onChange='submit()' class='select' aria-label='Listado de subseries diposnibles de la serie para asignar al expediente'");
                            if (!$codiSRD) {
                                $codiSRD = $codserie;
                                $codiSBRD = $tsub;
                            }
                            /******************************************** */
                            // Modificacion: 22-Mayo-2006
                            // Selecciona el proceso y el codigo correspondiente segun la combinacion
                            $queryPEXP = "select SGD_PEXP_DESCRIP,SGD_PEXP_CODIGO FROM SGD_PEXP_PROCEXPEDIENTES WHERE SGD_SRD_CODIGO=$codiSRD  AND SGD_SBRD_CODIGO=$codiSBRD";
                            $rs = $db->conn->Execute($queryPEXP);
                            $texp = $rs->fields["SGD_PEXP_CODIGO"];
                            ?>
                        </td>
                    </tr>
                </table>
                <br>
                <table border=1 width=95% align="center" class="borde_tab">
                    <tr align="center">
                        <td width="13%" height="25" class="titulos5">
                            N&uacute;mero de Expediente</TD>
                        <?php
                        if (!$digCheck) {
                            $digCheck = "E";
                        }
                        $expediente = new Expediente($db);
                        if (!$expManual) {
                            if (!$anoExp)
                                $anoExp = date("Y");
                            $secExp = $expediente->secExpediente($dependencia, $codiSRD, $codiSBRD, $anoExp);
                        }else {
                            $secExp = $consecutivoExp;
                        }
                        
                        $seriessub = $codiSRD.$codiSBRD;
                        $trdExp = str_pad($seriessub, 4, "0", STR_PAD_RIGHT);
                        $consecutivoExp = str_pad($secExp, 6, "0", STR_PAD_LEFT);

                        ?>
                        <td width="33%" class="listado2" height="25">
                            <p>
                            <table border="1">
                                <tr>
                                    <td>         
                                        <select name=anoExp  aria-label='Listado de años para conformar el numeor del expediente' class=select onChange="submit();">
                                            <?php
                                            if ($anoExp == (date('Y')))
                                                $datoss = " selected ";
                                            else
                                                $datoss = "";
                                            ?>
                                            <option value='<?= (date('Y')) ?>' <?= $datoss ?>>
                                                <?= date('Y') ?>
                                            </option>
                                            <?php
                                            if ($anoExp == (date('Y') - 1))
                                                $datoss = " selected ";
                                            else
                                                $datoss = "";
                                            ?>
                                            <option value='<?= (date('Y') - 1) ?>' <?= $datoss ?>>
                                                <?= (date('Y') - 1) ?>
                                            </option>
                                            <?php
                                            if ($anoExp == (date('Y') - 2))
                                                $datoss = " selected ";
                                            else
                                                $datoss = "";
                                            ?>
                                            <option value='<?= (date('Y') - 2) ?>' <?= $datoss ?>>
                                                <?= (date('Y') - 2) ?>
                                            </option>
                                            <?php
                                            if ($anoExp == (date('Y') - 3))
                                                $datoss = " selected ";
                                            else
                                                $datoss = "";
                                            ?>
                                            <option value='<?= (date('Y') - 3) ?>' <?= $datoss ?>>
                                                <?= (date('Y') - 3) ?>
                                                <?php
                                                if ($anoExp == (date('Y') - 4))
                                                    $datoss = " selected ";
                                                else
                                                    $datoss = "";
                                                ?>
                                            <option value='<?= (date('Y') - 4) ?>' <?= $datoss ?>>
                                                <?= (date('Y') - 4) ?>
                                            </option>

                                            </option>

                                        </select>
                                    </td>
                                    <td>
                                        <input type=text name=depExp value='<?= $dependencia ?>' aria-label="Codigo de dependencia quien genero el expediente, forma parte de nombre del expediente" class=select maxlength="<?= $longitud_codigo_dependencia ?>" size="2">
                                    </td>
                                    <td>
                                        <input type=text name=depExp value='<?= $trdExp ?>' aria-label="Consecutivo de expedientes, forma parte del numero del expediente" class=select maxlength="4" size="3">
                                    </td>
                                    <td>
                                        <input type=text name=consecutivoExp value='<?= $consecutivoExp ?>'  class=select maxlength="5" size=4 aria-label="Consecutivo del expedeinte">
                                    </td>    
                                    <td>
                                        <input type=text name=digCheckExp value='<?= $digCheck ?>' class=select maxlength="1" size="1">
                                    </td>
                                    <?php
                                    $numeroExpediente = $anoExp . $dependencia . $trdExp . $consecutivoExp . $digCheck;
                                    ?>
                                </tr>
                                <tr style="font-weight: bold;" class="listado2">
                                    <td style="padding-left: 16px;">
                                        A&ntilde;o
                                    </td>
                                    <td style="padding-left: 13px;">
                                        Dependencia
                                    </td>
                                    <td style="padding-left: 13px;">
                                        Serie Subserie
                                    </td>
                                    <td style="padding-left: 13px;">
                                        Consecutivo
                                    </td>
                                    <td style="padding-left: 13px;">
                                        E
                                    </td>
                                </tr>
                            </table>
                            <br>
                            El consecutivo "<?= $consecutivoExp ?>" es temporal y puede cambiar en el momento de crear el expediente.
                            <?= $numeroExpediente ?></b>
                        </TD>
                    </tr>
                    <?php
                    $sqlParExp = "SELECT SGD_PAREXP_ETIQUETA, SGD_PAREXP_ORDEN,";
                    $sqlParExp .= " SGD_PAREXP_EDITABLE";
                    $sqlParExp .= " FROM SGD_PAREXP_PARAMEXPEDIENTE PE";
                    $sqlParExp .= " WHERE PE.DEPE_CODI = '" . $dependencia . "'";
                    $sqlParExp .= " ORDER BY SGD_PAREXP_ORDEN";
                    // print $sqlParExp;
                    $rsParExp = $db->conn->Execute($sqlParExp);
                    while (!$rsParExp->EOF) {
                        ?>
                        <tr align="center">
                            <td width="13%" height="25" class="titulos5" align="left">
                                <?php
                                print $rsParExp->fields['SGD_PAREXP_ETIQUETA'];
                                if ($rsParExp->fields['SGD_PAREXP_EDITABLE'] == 1) {
                                    $readonly = "";
                                } else {
                                    $readonly = "readonly";
                                }
                                ?>
                            </td>
                            <td width="13%" height="25" class="listado2" align="left">
                                <input type="text" name="parExp_<?php print $rsParExp->fields['SGD_PAREXP_ORDEN']; ?>" value="<?php print $_POST['parExp_' . $rsParExp->fields['SGD_PAREXP_ORDEN']]; ?>" size="40" <?php print $readonly; ?>  onblur='submit();' aria-label="Digite el nombre del expediente a crear" >
                            </td>
                        </tr>
                        <?php
                        $rsParExp->MoveNext();
                    }
                    ?>
                    <tr>
                        <TD class=titulos5>
                            Fecha de Inicio del Proceso.
                        </TD>
                        <td class=listado2>
                            <script language="javascript">
                                <?if(!$fechaExp) $fechaExp = date("d/m/Y");?>
                                    setRutaRaiz("..");
                                var dateAvailable1 = new ctlSpiffyCalendarBox("dateAvailable1", "TipoDocu", "fechaExp","btnDate1","<?=$fechaExp?>",scBTNMODE_CUSTOMBLUE);
                            </script>
                            <script language="javascript">
                                dateAvailable1.date = "<?=date('Y-m-d');?>";
                                dateAvailable1.writeControl();
                                dateAvailable1.dateFormat="dd-MM-yyyy";
                            </script>

                        </td>
                    </tr>
                    <TD class=titulos5>
                        Usuario Responsable del Proceso
                    </TD>
                    <td class=listado2>
                        <?php
                        $queryUs = "select usua_nomb, usua_doc from usuario where depe_codi='$dependencia' AND USUA_ESTA='1' order by usua_nomb";
                        $rsUs = $db->conn->Execute($queryUs);
                        print $rsUs->GetMenu2("usuaDocExp", "$usuaDocExp", "0:-- Seleccione --", false, "", " class='select' onChange='submit()' aria-label='Listado de responsable del proceso, seleccione uno'");
                        ?>
                    </td>
                    </tr>
                </table>
                <?php
                if ($crearExpediente) {
                    ?>
                    <table border=1 width=95% align="center" class="borde_tab">
                        <tr align="center">
                            <td width="33%" height="25" class="listado2" align="center">
                                <center class="titulosError2">
                                    ESTA SEGURO DE CREAR EL EXPEDIENTE ? <BR> EL EXPEDIENTE QUE VA HA CREAR ES EL:<B><?= $numeroExpediente ?></B>
                                </center>
                        
                                <div align="justify"><br>
                                    <strong><b>Recuerde:</b>No podr&aacute; modificar el n&uacute;mero de expediente si hay un error en el expediente, mas adelante tendr&aacute; que excluir este radicado del expediente y si es el caso solicitar la anulaci&oacute;n del mismo. Ademas debe tener en cuenta que apenas coloca un nombre de expediente, en Archivo crean una carpeta f&iacute;sica en el cual empezaran a incluir los documentos pertenecientes al mismo. </strong>
                                </div>
                            </TD>
                        </tr>
                    </table>
                    <?php
                }
            }// Fin if( $Actualizar )
            ?>
            <table border=0 width=95% align="center" class="borde_tab">
                <tr class="listado1">
                    <td width="33%" height="25" align="center">
                <center>
                    <?php
                    /*
                     *  Modificado: 11-Agosto-2006 Supersolidaria
                     *  No se tiene en cuenta la seleccion de algun proceso para crear un expediente.
                     */
                    if ($tsub and $codserie && !$Actualizar and $usuaDocExp) {
                        if (!$crearExpediente) {
                            /*
                             *  Modificado: 17-Agosto-2006 Supersolidaria
                             *  Si hay procesos asociados, muestra un mensaje indicando que se debe seleccionar alguno.
                             */
                            if (is_array($arrProceso) && $codProc == 0) {
                                ?>
                                <input name="crearExpediente" type="button" class="botones_largo" value=" Crear Expediente " aria-label="Boton crear Expediente" onClick="alert('Por favor seleccione un proceso.'); document.TipoDocu.codProc.focus();">
                                <?php
                            } else {
                                //by skina
                                foreach ($_POST as $elementos => $valor) {
                                    if (strncmp($elementos, 'parExp_', 7) == 0) {
                                        $indice = (int) substr($elementos, 7);
                                        $arrParametro[$indice] = $valor;
                                    }
                                }
                                $primero = $arrParametro[1];
                                // echo "primero $primero";
                                // by skina 2012-09-19 Comprobacion de que el expediente no existe
                                // Se compara valor ingresado con lo existente en la tabla
                                $sql_exp = "SELECT sgd_sexp_parexp1 as LABEL from sgd_sexp_secexpedientes where UPPER(sgd_sexp_parexp1) like UPPER('%$primero%')";
                                $rs = $db->conn->Execute($sql_exp);

                                $primeroExp = $rs->fields["LABEL"];

                                // echo $primeroExp;
                                if ($primeroExp == "") {
                                    if (strlen($primero) > 5) {
                                        ?>
                                        <input name="crearExpediente" type=submit class="botones" value=" Crear Expediente " aria-label="Boton para crear Expediente">
                                        <?php
                                    } else {
                                        echo "El nombre del expediente debe ser mayor a 5 caracteres";
                                    }
                                } else {
                                    echo "<b><font-color=red>El expediente '$primero' ya existe!, por favor digite un nombre de carpeta distinto</font></b>";
                                }
                            }
                        } else {
                            ?>
                            <input name="Actualizar" type=submit class="botones_largo" value=" Confirmacion Creacion de Expediente " aria-label="Boton confirmacio&oacute;n de que desea crear el expediente">
                            <?php
                        }
                    }
                    ?>
                </center>
                </TD>
                <td width="33%" height="25">
                <center><input name="cerrar" type="button" class="botones_mediano" id="envia22" onClick="opener.regresar(); window.close();" aria-label="Cerrar ventana" value=" Cerrar "></center></TD>
                    </tr>
                    </table>
                    <script>
                        function borrarArchivo(anexo, linkarch) {
                            if (confirm('Esta seguro de borrar este Registro ?')) {
                                nombreventana = "ventanaBorrarR1";
                                url = "tipificar_documentos_transacciones.php?borrar=1&usua=<?= $krd ?>&codusua=<?= $codusua ?>&coddepe=<?= $coddepe ?>&nurad=<?= $nurad ?>&codiTRDEli=" + anexo + "&linkarchivo=" + linkarch;
                                window.open(url, nombreventana, 'height=250,width=300');
                            }
                            return;
                        }

                        function procModificar() {
                            if (document.TipoDocu.tdoc.value != 0 && document.TipoDocu.codserie.value != 0 && document.TipoDocu.tsub.value != 0) {
                                <?php
                                $sql = "SELECT RADI_NUME_RADI FROM SGD_RDF_RETDOCF WHERE RADI_NUME_RADI = '$nurad' AND  DEPE_CODI =  '$coddepe'";
                                $rs = $db->conn->Execute($sql);
                                $radiNumero = $rs->fields["RADI_NUME_RADI"];
                                if ($radiNumero != '') {
                                    ?>
                                    if (confirm('Esta Seguro de Modificar el Registro de su Dependencia ?')) {
                                        nombreventana = "ventanaModiR1";
                                        url = "tipificar_documentos_transacciones.php?modificar=1&usua=<?= $krd ?>&codusua=<?= $codusua ?>&tdoc=<?= $tdoc ?>&tsub=<?= $tsub ?>&codserie=<?= $codserie ?>&coddepe=<?= $coddepe ?>&nurad=<?= $nurad ?>";
                                        window.open(url, nombreventana, 'height=200,width=300');
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
