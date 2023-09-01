<?php

session_start();
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

foreach ($_GET as $key => $valor) ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor;

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$coddepe = $dependencia;


include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";
include_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$dir_raiz");
//$db->conn->debug = true;

include_once "$dir_raiz/include/tx/Historico.php";
include_once("$dir_raiz/class_control/TipoDocumental.php");
include_once "$dir_raiz/include/tx/Expediente.php";
include_once("$dir_raiz/include/tx/Radicacion.php");
include_once "$dir_raiz/include/tx/Historico.php";

$radicadoInfo = new Radicacion($db);
$trd = new TipoDocumental($db);
$Historico = new Historico($db);

?>
<html>

<head>
    <title>Crear Nuevo Expediente</title>
    <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">

</head>

<body bgcolor="#FFFFFF">
    <form>
        <center>
            <div id="titulo" style="width: 95%;" align="center">Aplicaci&oacute;n de la TRD para el nuevo expediente</div>
        </center>

        <table width="95%" border="1" cellspacing="1" cellpadding="0" align="center" class="borde_tab">
            <tr>
                <td width="62%" class="titulos5">Serie</td>
                <td width="38%" class=listado2>
                    <?php
                    $nomb_varc = "s.sgd_srd_codigo";
                    $nomb_varde = "s.sgd_srd_descrip";
                    include "$dir_raiz/include/query/trd/queryCodiDetalle.php";
                    $querySerie = "select distinct ($sqlConcat) as detalle, s.sgd_srd_codigo from sgd_mrd_matrird m, sgd_srd_seriesrd s where m.depe_codi = '$coddepe' and s.sgd_srd_codigo = m.sgd_srd_codigo and " . $sqlFechaHoy . " between s.sgd_srd_fechini and s.sgd_srd_fechfin order by detalle";
                    $rsD = $db->conn->Execute($querySerie);

                    print $rsD->GetMenu2("codserie", $codserie, "0:-- Seleccione --", false, "", "  id='codserie' class='select form-control' aria-label='Listado de series disponibles para asignar al expediente' $disabled");
                    ?>
                </td>
            </tr>
            <tr>
                <td class="titulos5">Subserie</td>
                <td class=listado2 id="loadusuariosReasigna"></td>
            </tr>
        </table>
        <br>
        <table border=1 width=95% align="center" class="borde_tab">
            <tr align="">
                <td width="13%" height="25" class="titulos5"> N&uacute;mero de Expediente</TD>
                <?php
                $digCheck = "E";
                $expediente = new Expediente($db);
                if (!$expManual) {
                    if (!$anoExp) $anoExp = date("Y");
                    $secExp = $expediente->secExpediente($dependencia, $codiSRD, $codiSBRD, $anoExp);
                } else {
                    $secExp = $consecutivoExp;
                }

                $seriessub = $codiSRD . $codiSBRD;
                $trdExp = str_pad($seriessub, 4, "0", STR_PAD_RIGHT);
                $consecutivoExp = str_pad($secExp, 6, "0", STR_PAD_LEFT);
                ?>
                <td width="33%" class="listado2" height="25">
                    <p>
                    <table border="1">
                        <tr>
                            <td>
                                <select name=anoExp id="anoExp" aria-label='Listado de años para conformar el numeor del expediente' class=select onChange="submit();">
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
                                <input type=text name=depExp id="depExp" value='<?= $dependencia ?>' aria-label="Codigo de dependencia quien genero el expediente, forma parte de nombre del expediente" class=select maxlength="<?= $longitud_codigo_dependencia ?>" size="2">
                            </td>
                            <td>
                                <input type=text name=trdExp id="trdExp" value='<?= $trdExp ?>' aria-label="Consecutivo de expedientes, forma parte del numero del expediente" class=select maxlength="4" size="3">
                            </td>
                            <td>
                                <input type=text name=consecutivoExp id="consecutivoExp" value='<?= $consecutivoExp ?>' class=select maxlength="5" size=4 aria-label="Consecutivo del expedeinte">
                            </td>
                            <td>
                                <input type=text name=digCheckExp id="digCheckExp" value='<?= $digCheck ?>' class=select maxlength="1" size="1">
                            </td>
                        </tr>
                        <tr style="font-weight: bold;" class="listado2">
                            <td style="padding-left: 16px;"> A&ntilde;o </td>
                            <td style="padding-left: 13px;"> Dependencia </td>
                            <td style="padding-left: 13px;"> Serie Subserie </td>
                            <td style="padding-left: 13px;"> Consecutivo </td>
                            <td style="padding-left: 13px;"> E </td>
                        </tr>
                    </table>
                    <br>
                    El consecutivo "<?= $consecutivoExp ?>" es temporal y puede cambiar en el momento de crear el expediente.
                    <label id="numexp"></label>
                    <input type="hidden" name="numeroExpediente" id="numeroExpediente"/>
                </TD>
            </tr>
            
            <tr>
                <TD class=titulos5>
                    Usuario Responsable del Proceso
                </TD>
                <td class=listado2>
                    <?php
                    $queryUs = "select usua_nomb, usua_doc from usuario where depe_codi='$dependencia' AND USUA_ESTA='1' order by usua_nomb";
                    $rsUs = $db->conn->Execute($queryUs);
                    print $rsUs->GetMenu2("usuaDocExp", "$usuaDocExp", "0:-- Seleccione --", false, "", " class='select' id='usuaDocExp' aria-label='Listado de responsable del proceso, seleccione uno' ");
                    ?>
                </td>
            </tr>
        </table>
        
        <br>
        <table border=1 width=95% align="center" class="borde_tab" id="test">
            <thead>
                <tr>
                    <td class="titulos5" align="left" colspan="2">
                        <label style="font-size:13px">Importante: tener presente que solo se permite agregar hasta 2 subcarpetas a parte de la del expediente y asi mismo solo se permite eliminar las subcarpetas que se esten creando</label>
                        <br><br>
                        <label>Nombre de la carpeta y las subcarpetas</label>
                        <input type="button" name="agregar" id="agregar"  value="Agregar"/>
                        <input type="button" name="delete-more" id="delete-more" value="Eliminar"/>
                    </td>
                </tr>
            </thead>
            <tbody>
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
                        <input type="text" name="parExp" id="parExp"  value="<?php print $_POST['parExp_' . $rsParExp->fields['SGD_PAREXP_ORDEN']]; ?>" size="40" <?php print $readonly; ?>  aria-label="Digite el nombre del expediente a crear" class="form-control"> 
                    </td>
                </tr>
            <?php
                $rsParExp->MoveNext();
            }
            ?>
            </tbody>
        </table>
        <!-- nueva funcionalidad en desarrollo -->
        <hr>
        <div style="width:95%;margin:0 auto;">
            <div class="container-fluid">
            <div id="contenedor-macro">
            <div class="carpeta-macro">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Nombre Carpeta Macro</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="carpeta_macro" class="form-control">
                    </div>
                    <div class="col-md-2">
                        
                    </div>
                    <div class="col md-2">
                        <button type="button" id="button-crear-subnivel-1">Crear Carpeta Subnivel 1</button>
                    </div>
                </div>
                <div class="row">
                    <div id="contenedor-subnivel-1"></div>
                </div>
                <div class="row">
                <div class="col-md-2">
                    <button type="button" id="crear-expediente">Crear Expediente</button>
                </div>
                </div>
            </div>
        </div>
            <div>
        </div>
        <hr>
        <style>
            .row{
                margin-top: 1rem;
                margin-bottom: 1rem;
            }
            .card{
                background-color: darkgrey;
            }
        </style>
        <!-- /nueva funcionalidad en desarrollo -->
        <table border=1 width=95% align="center" class="borde_tab" id="">
            <tr align="center">
                <td width="13%" height="25" class="listado2" align="left">
                    <button type="button" name="procesar" id="procesar" >Crear Expediente</button>
                    <button type="button" name="cerrar" onclick="window.close();" >Cerrar Ventana</button>
                </td>
            </tr>
        </table>
    </form>

    <script src="<?= $url_raiz; ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="<?= $url_raiz; ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./js/datatables.min.js" type="text/javascript"></script>
    <script src="./js/informacionexpediente.js" type="text/javascript"></script>

</body>

</html>