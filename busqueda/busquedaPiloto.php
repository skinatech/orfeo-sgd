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
$url_raiz = "../..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$ambiente = $_SESSION['ambiente'];
$dependenciaSalida = $_SESSION["dependenciaSalida"];
$entidad_depsal = $_SESSION['entidad_depsal'];
$usua_perm_consulta_rad = $_SESSION["usua_perm_consulta_rad"];

/**
 * Modificacion para aceptar Variables GLobales
 * @autor Infometrika 2009/05 
 * @fecha 2009/05
 */
if (isset($_SESSION["krd"]))
    $krd = $_SESSION["krd"];
if (isset($_SESSION["dependencia"]))
    $dependencia = $_SESSION["dependencia"];
if (isset($_SESSION["usua_doc"]))
    $usua_doc = $_SESSION["usua_doc"];
if (isset($_SESSION["cod_usuario"]))
    $codusuario = $_SESSION["codusuario"];
if (isset($_SESSION["nivelus"]))
    $nivelus = $_SESSION["nivelus"];

if (isset($_REQUEST["flds_TDOC_CODI"]))
    $flds_TDOC_CODI = $_REQUEST["flds_TDOC_CODI"];
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

// busqueda CustomIncludes begin
include ("common.php");
$fechah = date("ymd") . "_" . time();
// busqueda CustomIncludes end
// Save Page and File Name available into variables
$sFileName = "busquedaPiloto.php";

// busqueda PageSecurity begin
$usu = $krd;
//$niv = $_GET["niv");
$niv = $nivelus;
if (strlen($niv)) {
    //t_session("UserID",$usu);
    //t_session("krd",$krd);
    //t_session("Nivel",$niv);
}

//Save the name of the form and type of action into the variables
//-------------------------------
$sAction = $_REQUEST["FormAction"];
$sForm = $_REQUEST["FormName"];
$flds_ciudadano = $_REQUEST["s_ciudadano"];
$flds_empresaESP = $_REQUEST["s_empresaESP"];
$flds_oEmpresa = $_REQUEST["s_oEmpresa"];
$flds_FUNCIONARIO = $_REQUEST["s_FUNCIONARIO"];
//Proceso de vinculacion al vuelo
$indiVinculo = $_GET["indiVinculo"];
$verrad = $_GET["verrad"];
$carpAnt = $_GET["carpAnt"];
$nomcarpeta = $_GET["nomcarpeta"];

?>
<html>
    <head>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script src="../estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../estilos/js/bootstrap.js" type="text/javascript"></script>
        <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
        <link href="./datatable/css/datatables.min.css" rel="stylesheet" type="text/css"/> 
        <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap4.min.css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $ESTILOS_PATH2 ?>header.css">
        <style>
            .ui-autocomplete { height: 200px; width: 200px; overflow-y: scroll; overflow-x: hidden;}

            .borde_tabConsultas{
                color: #FFF;
                font-family: "Source Sans Pro",sans-serif;
                border-style: solid;
                border-width: 1px;
                border-color: #808080;
                border-bottom-color: rgba(128, 128, 128, 0);
            }

            .campoTextoBusqueda{
                height: 39px;
                padding-top: 3px;
            }

            .labelBusuqueda{
                padding-top: 5px;
            }
        </style>
    </head>
    <script>
        /**
         * Adapta el tamaño del PopUp "Busqueda OCR"
         * @date: 2017/03
         * @autor: Skinatech
         */
        function resizeOcrForm() {
            x = document.getElementById('formularioOCR').contentWindow.document.body.offsetHeight;
            if (x > 100){
            document.getElementById('formularioOCR').style.height = x + "px";
            }
        }

        function limpiar(){
            document.Search.elements['s_RADI_NUME_RADI'].value = "";
            document.Search.elements['s_RADI_NOMB'].value = "";
            document.Search.elements['s_RADI_DEPE_ACTU'].value = "";
            document.Search.elements['s_TDOC_CODI'].value = "9999";
            /** Limpia el campo expediente */
            document.Search.elements['s_SGD_EXP_SUBEXPEDIENTE'].value = "";
            <?
            $dia = intval(date("d")    );
            $mes = intval(date("m")    );
            $ano = intval(date("Y")    );
            ?>
            document.Search.elements['s_desde_dia'].value= "<?= $dia ?>    ";
            document.Search.elements['s_hasta_dia'].value= "<?= $dia ?>    ";
            document.Search.elements['s_desde_mes'].value= "<?= ($mes - 1) ?>    ";
            document.Search.elements['s_hasta_mes'].value= "<?= $mes ?>    ";
            document.Search.elements['s_desde_ano'].value= "<?= $ano ?>    ";
            document.Search.elements['s_hasta_ano'].value= "<?= $ano ?>    ";
            for(i=4;i<document.Search.elements.length;i++) document.Search.elements[i].checked=1;    
        }   

        function selTodas(){
            if (document.Search.elements['s_Listado'].checked == true){
                document.Search.elements['s_ciudadano'].checked = false;
                document.Search.elements['s_empresaESP'].checked = false;
                document.Search.elements['s_oEmpresa'].checked = false;
                document.Search.elements['s_FUNCIONARIO'].checked = false;
            }else{
                document.Search.elements['s_ciudadano'].checked = true;
                document.Search.elements['s_empresaESP'].checked = false;
                document.Search.elements['s_oEmpresa'].checked = false;
                document.Search.elements['s_FUNCIONARIO'].checked = false;
            }
        }

        function delTodas(){
            document.Search.elements['s_Listado'].checked = false;
            document.Search.elements['s_ciudadano'].checked = false;
            document.Search.elements['s_empresaESP'].checked = false;
            document.Search.elements['s_oEmpresa'].checked = false;
            document.Search.elements['s_FUNCIONARIO'].checked = false;
        }

        function selListado(){
            if (document.Search.elements['s_ciudadano'].checked == true || document.Search.elements['s_empresaESP'].checked == true || document.Search.elements['s_oEmpresa'].checked == true || document.Search.elements['s_FUNCIONARIO'].checked == true){
                document.Search.elements['s_Listado'].checked = false;
            }
        }

        function noPermiso(){
            alert ("No tiene permiso para acceder");
        }

        function pasar_datos(fecha,num){
            <?php
            echo "if(num==1){";
                echo "opener.document.VincDocu.numRadi.value = fecha\n";
                echo "opener.focus(); window.close();\n }";
                echo "if(num==2){";
                echo "opener.document.insExp.numeroExpediente.value = fecha\n";
            echo "opener.focus(); window.close();}\n";
            ?>
        }
    </script>

    <body class="PageBODY" onLoad='document.getElementById("s_RADI_NUME_RADI").focus();'>
        <br>
        <center>
            <table>
                <tr>
                    <td valign="top" width="80%">
                        <?php Search_show() ?>
                    </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td valign="top">
                        <?php
                        if ($Busqueda or $s_entrada) {
                            if ($s_Listado == "VerListado") {
                                ?>
                                <tr>
                                    <td valign="top">
                                        <?php
                                        if ($flds_ciudadano == "CIU")
                                            $whereFlds .= "1,";
                                        if ($flds_empresaESP == "ESP")
                                            $whereFlds .= "2,";
                                        if ($flds_oEmpresa == "OEM")
                                            $whereFlds .= "3,";
                                        if ($flds_FUNCIONARIO == "FUN")
                                            $whereFlds .= "4,";
                                        $whereFlds .= "0";
                                        Ciudadano_show($nivelus, 9, $whereFlds)
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            else {
                                if (!$etapa)
                                    if ($flds_ciudadano == "CIU" || (!strlen($flds_ciudadano) && !strlen($flds_empresaESP) && !strlen($flds_oEmpresa) && !strlen($flds_FUNCIONARIO) )) {
                                        Ciudadano_show($nivelus, 1, 1);
                                    }
                                ?>
                                </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <?php if ($flds_empresaESP == "ESP") Ciudadano_show($nivelus, 3, 3); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <?php if ($flds_oEmpresa == "OEM") Ciudadano_show($nivelus, 2, 2); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <?php if ($flds_FUNCIONARIO == "FUN") Ciudadano_show($nivelus, 4, 4); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </center>

        <script src="<?= $url_raiz; ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?= $url_raiz; ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./datatable/js/datatables.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
        <script src="./datatable/js/radicados.js" type="text/javascript"></script>
    </body>
</html>
<?php

            // Display Search Form
            function Search_show() {
                global $db;
                global $styles;
                global $db2;
                global $db3;
                global $sForm;
                $sFormTitle = "B&uacute;squeda Cl&aacute;sica";
                $sActionFileName = "busquedaPiloto.php";
                $ss_desde_RADI_FECH_RADIDisplayValue = "";
                $ss_hasta_RADI_FECH_RADIDisplayValue = "";
                $ss_TDOC_CODIDisplayValue = "Todos los Tipos";
                $ss_TRAD_CODIDisplayValue = "Todos los Tipos (-1,-2,-3,-5, . . .)";
                $ss_RADI_DEPE_ACTUDisplayValue = "Todas las Dependencias";
                //Con esta variable se determina si la busqueda corresponde a vinculacion documentos
                $indiVinculo = $_GET["indiVinculo"];
                $verrad = $_GET["verrad"];
                $carpeAnt = $_GET["carpeAnt"];
                $nomcarpeta = $_GET["nomcarpeta"];
                $krd = $_SESSION["krd"];
                $usua_perm_consulta_rad = $_SESSION["usua_perm_consulta_rad"];

                $dependencia = $_SESSION["dependencia"];
                $ambiente = $_SESSION['ambiente'];
                $url_raiz = $_SESSION['url_raiz'];

                $usua_doc = $_SESSION["usua_doc"];
                $codusuario = $_SESSION["codusuario"];
                $nivelus = $_SESSION["nivelus"];                

                if ($_REQUEST["flds_TDOC_CODI"])
                    $flds_TDOC_CODI = $_REQUEST["flds_TDOC_CODI"];
                foreach ($_GET as $key => $valor)
                    ${$key} = $valor;
                foreach ($_POST as $key => $valor)
                    ${$key} = $valor;

                if ($indiVinculo == 1) {
                    $sFormTitle = $sFormTitle . "  Anexo  al Vuelo ";
                }
                if ($indiVinculo == 2) {
                    $sFormTitle = $sFormTitle . "  Incluir Expediente ";
                }
                //-------------------------------
                // Search Open Event begin
                // Search Open Event end
                //-------------------------------
                //-------------------------------
                // Set variables with search parameters
                //-------------------------------
                $flds_RADI_NUME_RADI = $_GET["s_RADI_NUME_RADI"];
                $flds_DOCTO = $_GET["s_DOCTO"];
                $flds_RADI_NOMB = $_GET["s_RADI_NOMB"];
               
                $flds_ciudadano = $_GET["s_ciudadano"];
                if ($flds_ciudadano)
                    $checkCIU = "checked";
                $flds_empresaESP = $_GET["s_empresaESP"];
                if ($flds_empresaESP)
                    $checkESP = "checked";
                $flds_oEmpresa = $_GET["s_oEmpresa"];
                if ($flds_oEmpresa)
                    $checkOEM = "checked";
                $flds_FUNCIONARIO = $_GET["s_FUNCIONARIO"];
                if ($flds_FUNCIONARIO)
                    $checkFUN = "checked";

                $flds_entrada = $_GET["s_entrada"];
                
                $flds_salida = $_GET["s_salida"];
                $flds_solo_nomb = $_GET["s_solo_nomb"];
                $Busqueda = $_GET["Busqueda"];
                $flds_desde_dia = $_GET["s_desde_dia"];
                $flds_hasta_dia = $_GET["s_hasta_dia"];
                $flds_desde_mes = $_GET["s_desde_mes"];
                $flds_hasta_mes = $_GET["s_hasta_mes"];
                $flds_desde_ano = $_GET["s_desde_ano"];
                $flds_hasta_ano = $_GET["s_hasta_ano"];
                $flds_TDOC_CODI = $_GET["s_TDOC_CODI"];
                $s_Listado = $_GET["s_Listado"];
                $flds_RADI_DEPE_ACTU = $_GET["s_RADI_DEPE_ACTU"];

                /**
                 * Busqueda por expediente
                 * Fecha de modificacion: 30-Junio-2006
                 * Modificador: Supersolidaria
                 */
                $flds_SGD_EXP_SUBEXPEDIENTE = $_GET["s_SGD_EXP_SUBEXPEDIENTE"];

                if (strlen($flds_desde_dia) && strlen($flds_hasta_dia) && strlen($flds_desde_mes) && strlen($flds_hasta_mes) && strlen($flds_desde_ano) && strlen($flds_hasta_ano)) {
                        $desdeTimestamp = mktime(0, 0, 0, $flds_desde_mes, $flds_desde_dia, $flds_desde_ano);
                        $hastaTimestamp = mktime(0, 0, 0, $flds_hasta_mes, $flds_hasta_dia, $flds_hasta_ano);
                        $flds_desde_dia = Date('d', $desdeTimestamp);
                        $flds_hasta_dia = Date('d', $hastaTimestamp);
                        $flds_desde_mes = Date('m', $desdeTimestamp);
                        $flds_hasta_mes = Date('m', $hastaTimestamp);
                        $flds_desde_ano = Date('Y', $desdeTimestamp);
                        $flds_hasta_ano = Date('Y', $hastaTimestamp);
                } else { /* DESDE HACE UN MES HASTA HOY */
                    $desdeTimestamp = mktime(0, 0, 0, Date('m') - 1, Date('d'), Date('Y'));
                    $flds_desde_dia = Date('d', $desdeTimestamp);
                    $flds_hasta_dia = Date('d');
                    $flds_desde_mes = Date('m', $desdeTimestamp);
                    $flds_hasta_mes = Date('m');
                    $flds_desde_ano = Date('Y', $desdeTimestamp);
                    $flds_hasta_ano = Date('Y');
                }
                // Search Show begin
                ?>
                <form method="get" action="<?= $sActionFileName ?>?<?= session_name() . "=" . session_id() ?>&indiVinculo=<?= $indiVinculo ?>&verrad=<?= $verrad ?>&carpeAnt=<?= $carpeAnt ?>&nomcarpeta=<?= $nomcarpeta ?>" name="Search">
                    <input type="hidden" name=<?= session_name() ?> value=<?= session_id() ?>>
                    <input type="hidden" name="FormName" value="Search"><input type="hidden" name="FormAction" value="search">

                    <div id="titulo" style="width: 97.3%;margin-left: 1.4%;">
                        <div>
                            <label style="margin-left: 42%;"><?= $sFormTitle ?></label>
                            <!-- <button type="button" style="margin-left: 10%;" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Full Text Search
                            </button> -->
                            <a type="button" class="btn btn-primary2" style="margin-left: 1%;" href="../busqueda/busquedaExp.php?<?= $phpsession ?>&<? echo "&fechah=$fechah&primera=1&ent=2"; ?>">B&uacute;squeda&nbsp;Expediente</a>
                        </div>
                    </div>

                    <div class="modal fade" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" style="width:97%;margin: 10px auto;" role="document">
                            <div class="modal-content" style="height: 93%;">
                                <div class="modal-body" style="padding: 5px;">
                                    <iframe src="../busquedaOCR/formularioBusqueda.php" id="formularioOCR" frameborder="0" style="width: 100%;height: 87%;" onchange="" ></iframe>
                                </div>
                                <div class="modal-footer" style="padding: 5px;">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="width: 95%; margin-left: 2.5%;" >
                        <div class="row borde_tabConsultas" >
                            <!-- Número del Radicado -->
                            <div class="titulos2 col-lg-2 col-md-2 col-xs-2 col-sm-2 campoTextoBusqueda">
                                <label for="s_RADI_NUME_RADI" class="labelBusuqueda">Radicado</label>
                            </div>
                            <div class="listado2 col-lg-2 col-md-2 col-xs-2 col-sm-2 campoTextoBusqueda">
                                <input class="tex_area form-control" id="s_RADI_NUME_RADI" type="text" name="s_RADI_NUME_RADI" maxlength="" value="<?= tohtml($flds_RADI_NUME_RADI) ?>" size="55%" id="cajarad" title="Campo para ingresar el numero del radicado a consultar">
                            </div>
                            
                            <!-- Identificador -->
                            <div class="titulos2 col-lg-2 col-md-2 col-xs-2 col-sm-2 campoTextoBusqueda">
                                <label for="s_DOCTO" class="labelBusuqueda">Identificacion<br>(T.I,C.C,Nit) </label>
                            </div>
                            <div class="listado2 col-lg-2 col-md-2 col-xs-2 col-sm-2 campoTextoBusqueda">
                                <input class="tex_area form-control" id="s_DOCTO" type="text" name="s_DOCTO" maxlength="" value="<?= tohtml($flds_DOCTO) ?>" size="55%" title="Campo para consultar por identificacion de usuario, nit de empresa o numero de suscriptor">
                            </div>
                            
                            <!-- Expediente -->
                            <div class="titulos2 col-lg-2 col-md-2 col-xs-2 col-sm-2 campoTextoBusqueda">
                                <label for="s_SGD_EXP_SUBEXPEDIENTE" class="labelBusuqueda">Expediente</label>
                            </div>
                            <div class="listado2 col-lg-2 col-md-2 col-xs-2 col-sm-2 campoTextoBusqueda">
                                <input class="tex_area form-control" id="s_SGD_EXP_SUBEXPEDIENTE" type="text" name="s_SGD_EXP_SUBEXPEDIENTE" maxlength="" value="<?= tohtml($flds_SGD_EXP_SUBEXPEDIENTE) ?>" size="55%" title="Consultar por expediente">
                            </div>
                        </div>

                        <div class="row borde_tabConsultas" >
                            <div class="titulos2 col-lg-2 col-md-2 col-xs-2 col-sm-2 campoTextoBusqueda">
                                <label for="s_solo_nomb" class="labelBusuqueda"> Filtrar por</label>
                            </div>
                            <div class="FieldCaptionTD listado2 col-lg-10 col-md-10 col-xs-10 col-sm-10 campoTextoBusqueda">
                                <?php if ($s_Listado == "VerListado") { $listadoView = " checked=checked"; } ?>
                                <INPUT type="checkbox" id="s_Listado" NAME="s_Listado" value="VerListado" <?= $listadoView ?> onClick="delTodas(); document.Search.elements['s_Listado'].checked = true;">
                                <label for="s_Listado" class="labelBusuqueda"> Ver en Listado</label> 
                                
                                <INPUT type="checkbox" id="s_ciudadano" NAME="s_ciudadano" value="CIU" onClick="delTodas(); document.Search.elements['s_ciudadano'].checked = true;" <?= $checkCIU ?> >
                                <label for="s_ciudadano" class="labelBusuqueda">Buscar Ciudadanos</label>
                               
                                <INPUT type="checkbox" id="s_empresaESP" NAME="s_empresaESP" value="ESP" onClick="delTodas(); document.Search.elements['s_empresaESP'].checked = true;" <?= $checkESP ?> >
                                <label for="s_empresaESP" class="labelBusuqueda"> Buscar en Terceros</label>
                                
                                <INPUT type="checkbox" id="s_oEmpresa" NAME="s_oEmpresa" value="OEM" onClick="delTodas(); document.Search.elements['s_oEmpresa'].checked = true;" <?= $checkOEM ?> >
                                <label for="s_oEmpresa" class="labelBusuqueda">Buscar en Empresas</label>
                               
                                <INPUT type="checkbox" id="s_FUNCIONARIO" NAME="s_FUNCIONARIO" value="FUN" onClick="delTodas(); document.Search.elements['s_FUNCIONARIO'].checked = true;" <?= $checkFUN ?> >
                                <label for="s_FUNCIONARIO" class="labelBusuqueda">Buscar Funcionarios</label>
                            </div>
                        </div>

                        <div class="row borde_tabConsultas" >
                            <div class="titulos2 col-lg-2 col-md-2 col-xs-2 col-sm-2 campoTextoBusqueda">
                                <INPUT id="s_solo_nomb" type="radio" NAME="s_solo_nomb" value="All" CHECKED
                                <?php if ($flds_solo_nomb == "All") { echo ("CHECKED"); } ?>>
                                <label for="s_solo_nomb" class="labelBusuqueda"> Buscar por</label>
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Este campo permite buscar por el asunto, nombre, direcci&oacute;n del remitente"></span>
                            </div>
                            <div class="listado2 col-lg-10 col-md-10 col-xs-10 col-sm-10 campoTextoBusqueda">
                                <input class="tex_area form-control" type="text" id="s_RADI_NOMB" name="s_RADI_NOMB" maxlength="70" value="<?= tohtml($flds_RADI_NOMB) ?>" size="132%" title="Campo para buscar radicados por cualquier palabra">
                            </div>
                        </div>

                        <div class="row borde_tabConsultas" >
                            <div class="titulos2 col-lg-2 col-md-2 col-xs-2 col-sm-2 campoTextoBusqueda">
                                <label for="s_entrada" class="labelBusuqueda">Buscar en Radicados</label>
                            </div>
                            <div class="listado2 col-lg-10 col-md-10 col-xs-10 col-sm-10 campoTextoBusqueda">
                                <select class="select form-control" name="s_entrada" id="s_entrada" title="Seleccione el tipo o tipos de radicado para filtrar la busqueda">
                                    <?php
                                    if (!$s_Listado)
                                        $s_Listado = "VerListado";
                                    if ($flds_entrada == 0)
                                        $flds_entrada = "9999";
                                    echo "<option value=\"9999\">" . $ss_TRAD_CODIDisplayValue . "</option>";
                                    $lookup_s_entrada = db_fill_array("select SGD_TRAD_CODIGO, SGD_TRAD_DESCR from SGD_TRAD_TIPORAD order by 2");

                                    if (is_array($lookup_s_entrada)) {
                                        reset($lookup_s_entrada);
                                        while (list($key, $value) = each($lookup_s_entrada)) {
                                            if ($key == $flds_entrada)
                                                $option = "<option SELECTED value=\"$key\">$value</option>";
                                            else
                                                $option = "<option value=\"$key\">$value</option>";
                                            echo $option;
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row borde_tabConsultas" >
                            <div class="titulos2 col-lg-2 col-md-2 col-xs-2 col-sm-2 campoTextoBusqueda">
                                <label class="labelBusuqueda">Desde la fecha</label>
                            </div>
                            <div class="listado2 col-lg-4 col-md-4 col-xs-4 col-sm-4 campoTextoBusqueda">
                                <br>
                                <label for="s_desde_dia">D&iacute;a</label>
                                <select class="select" name="s_desde_dia" id="s_desde_dia" title="seleccione el dia de la fecha inicial">
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) {
                                        if ($i == $flds_desde_dia)
                                            $option = "<option SELECTED value=\"" . $i . "\">" . $i . "</option>";
                                        else
                                            $option = "<option value=\"" . $i . "\">" . $i . "</option>";
                                        echo $option;
                                    }
                                    ?>
                                </select>
                                
                                <label for="s_desde_mes">Mes</label>
                                <select class="select" name="s_desde_mes" id="s_desde_mes" title="seleccione el mes de la fecha inicial">
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        if ($i == $flds_desde_mes)
                                            $option = "<option SELECTED value=\"" . $i . "\">" . $i . "</option>";
                                        else
                                            $option = "<option value=\"" . $i . "\">" . $i . "</option>";
                                        echo $option;
                                    }
                                    ?>
                                </select>
                                
                                <label for="s_desde_ano">A&ntilde;o</label>
                                <select class="select" name="s_desde_ano" id="s_desde_ano" title="seleccione el año de la fecha inicial">
                                    <?php
                                    $agnoactual = Date('Y');
                                    for ($i = 1990; $i <= $agnoactual; $i++) {
                                        if ($i == $flds_desde_ano)
                                            $option = "<option SELECTED value=\"" . $i . "\">" . $i . "</option>";
                                        else
                                            $option = "<option value=\"" . $i . "\">" . $i . "</option>";
                                        echo $option;
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="titulos2 col-lg-2 col-md-2 col-xs-2 col-sm-2 campoTextoBusqueda">
                                <label class="labelBusuqueda">Hasta la fecha</label>
                            </div>
                            <div class="listado2 col-lg-4 col-md-4 col-xs-4 col-sm-4 campoTextoBusqueda">
                                <br>
                                <label for="s_hasta_dia">D&iacute;a</label>
                                <select class="select" id="s_hasta_dia" name="s_hasta_dia" title="seleccione el dia de la fecha final">
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) {
                                        if ($i == $flds_hasta_dia)
                                            $option = "<option SELECTED value=\"" . $i . "\">" . $i . "</option>";
                                        else
                                            $option = "<option value=\"" . $i . "\">" . $i . "</option>";
                                        echo $option;
                                    }
                                    ?>
                                </select>
                                
                                <label for="s_hasta_mes">Mes</label>
                                <select class="select" id="s_hasta_mes" name="s_hasta_mes" title="seleccione el mes de la fecha final">
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        if ($i == $flds_hasta_mes)
                                            $option = "<option SELECTED value=\"" . $i . "\">" . $i . "</option>";
                                        else
                                            $option = "<option value=\"" . $i . "\">" . $i . "</option>";
                                        echo $option;
                                    }
                                    ?>
                                </select>
                                
                                <label for="s_hasta_ano">A&ntilde;o</label>
                                <select class="select" id="s_hasta_ano" name="s_hasta_ano" title="seleccione el año de la fecha final">
                                    <?php
                                    for ($i = 1990; $i <= $agnoactual; $i++) {
                                        if ($i == $flds_hasta_ano)
                                            $option = "<option SELECTED value=\"" . $i . "\">" . $i . "</option>";
                                        else
                                            $option = "<option value=\"" . $i . "\">" . $i . "</option>";
                                        echo $option;
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row borde_tabConsultas" >
                            <div class="titulos2 col-lg-2 col-md-2 col-xs-2 col-sm-2 campoTextoBusqueda">
                                <label for="s_TDOC_CODI" class="labelBusuqueda">Tipo de Documento</label>
                            </div>
                            <div class="listado2 col-lg-10 col-md-10 col-xs-10 col-sm-10 campoTextoBusqueda">
                                <select class="select form-control" name="s_TDOC_CODI" id="s_TDOC_CODI" title="lista de tipos de documento">
                                    <?php
                                    if ($flds_TDOC_CODI == 0)
                                        $flds_TDOC_CODI = "9999";
                                    echo "<option value=\"9999\">" . $ss_TDOC_CODIDisplayValue . "</option>";
                                    $lookup_s_TDOC_CODI = db_fill_array("select SGD_TPR_CODIGO, SGD_TPR_DESCRIP from SGD_TPR_TPDCUMENTO order by 2");

                                    if (is_array($lookup_s_TDOC_CODI)) {
                                        reset($lookup_s_TDOC_CODI);
                                        while (list($key, $value) = each($lookup_s_TDOC_CODI)) {
                                            if ($key == $flds_TDOC_CODI)
                                                $option = "<option SELECTED value=\"$key\">$value</option>";
                                            else
                                                $option = "<option value=\"$key\">$value</option>";
                                            echo $option;
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row borde_tabConsultas" >
                            <div class="titulos2 col-lg-2 col-md-2 col-xs-2 col-sm-2 campoTextoBusqueda">
                                <label for="s_RADI_DEPE_ACTU" class="labelBusuqueda">Dependencia Actual</label>
                            </div>
                            <div class="listado2 col-lg-10 col-md-10 col-xs-10 col-sm-10 campoTextoBusqueda">
                                <select class="select form-control" name="s_RADI_DEPE_ACTU" id="s_RADI_DEPE_ACTU" title="listado con todas las dependencias existentes">
                                    <?php
                                    $l = strlen($flds_RADI_DEPE_ACTU);
                                    /***
                                    Autor: Jenny Gamez
                                    Fecha: 2019-09-21
                                    Info: Se agrega un nuevo campo de permiso usua_nivel_consulta en la base de datos
                                          SI el nivel de usuario es 1 o 2 en el listado de dependencias solo se muestra a la que pertenece el usuario
                                          Si el vivel de usuario es 3 o para defecto en el listado de dependencias se muestran todas
                                    ***/
                                    if($_SESSION["usua_nivel_consulta"] == 1 or $_SESSION["usua_nivel_consulta"] == 2){
                                        $codDepeUsuaActu = " and depe_codi='".$_SESSION["dependencia"]."'";
                                    }elseif($_SESSION["usua_nivel_consulta"] == 3){
                                        $codDepeUsuaActu = '';
                                        if ($l==0){
                                            echo "<option value=\"\" SELECTED>" . $ss_RADI_DEPE_ACTUDisplayValue . "</option>";
                                        }else{
                                            echo "<option value=\"\">" . $ss_RADI_DEPE_ACTUDisplayValue . "</option>";
                                        }
                                    }else{
                                        $codDepeUsuaActu = " and depe_codi='".$_SESSION["dependencia"]."'";
                                    }
                                    
                                    $lookup_s_RADI_DEPE_ACTU = db_fill_array("select DEPE_CODI, DEPE_NOMB from DEPENDENCIA where depe_estado=1 $codDepeUsuaActu order by DEPE_CODI");
                                    /***
                                    Autor: Jenny Gamez
                                    Fecha: 2019-09-21
                                    Info: Fin
                                    ***/
                                    if (is_array($lookup_s_RADI_DEPE_ACTU)) {
                                        reset($lookup_s_RADI_DEPE_ACTU);
                                        while (list($key, $value) = each($lookup_s_RADI_DEPE_ACTU)) {
                                            if ($l > 0 && $key == $flds_RADI_DEPE_ACTU)
                                                $option = "<option SELECTED value=\"$key\">$key -$value</option>";
                                            else
                                                $option = "<option value=\"$key\">$key -$value</option>";
                                            echo $option;
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row borde_tabConsultas">
                            <div class="listado1"  style="width: 100%; text-align: right; campoTextoBusqueda" >
                                <input class="botones" type="button" value="Limpiar" onclick="limpiar();">
                                <input class="botones" type="submit" name=Busqueda id="Busqueda" value="B&uacute;squeda">
                            </div>    
                        </div>
                    </div>
                    
                </form>

                <?php
            }

            // Display Grid Form
            function Ciudadano_show($nivelus, $tpRemDes, $whereFlds) {
                global $db2;
                global $db3;
                global $sRADICADOErr;
                global $sFileName;
                global $styles;
                global $dir_raiz;
                global $ambiente;
                global $url_raiz;
                $usua_perm_consulta_rad = $_SESSION["usua_perm_consulta_rad"];

                $sWhere = "";
                $sOrder = "";
                $sSQL = "";
                $db = new ConnectionHandler($dir_raiz);
                if ($tpRemDes == 1) {
                    $tpRemDesNombre = "Por Ciudadano";
                }
                if ($tpRemDes == 2) {
                    $tpRemDesNombre = "Por Otras Empresas";
                }
                if ($tpRemDes == 3) {
                    $tpRemDesNombre = "Por Tercero";
                }
                if ($tpRemDes == 4) {
                    $tpRemDesNombre = "Por Funcionario";
                }
                if ($tpRemDes == 9) {
                    $tpRemDesNombre = "";
                    $whereTrd = "   ";
                } else {
                    $whereTrd = " and dir.sgd_trd_codigo = $whereFlds  ";
                }
                
                $sFormTitle = "Radicados encontrados $tpRemDesNombre ";
                $iSort = "";
                $iSorted = "";
                $sDirection = "";

                //Proceso de Vinculacion documentos
                $indiVinculo = $_GET["indiVinculo"];
                $verrad = $_GET["verrad"];
                $carpeAnt = $_GET["carpeAnt"];
                $nomcarpeta = $_GET["nomcarpeta"];

                // Build ORDER BY statement
                $iSort = $_GET["FormCIUDADANO_Sorting"];
                $iSorted = $_GET["FormCIUDADANO_Sorted"];
                $form_params = trim(session_name()) . "=" . trim(session_id()) . "&verrad=$verrad&indiVinculo=$indiVinculo&carpeAnt=$carpeAnt&nomcarpeta=$nomcarpeta&s_RADI_DEPE_ACTU=" . tourl($_GET["s_RADI_DEPE_ACTU"]) . "&s_RADI_NOMB=" . tourl($_GET["s_RADI_NOMB"]). "&s_RADI_NOMB_ENCARGO=" . tourl($_GET["s_RADI_NOMB_ENCARGO"]) . "&s_RADI_NUME_RADI=" . tourl($_GET["s_RADI_NUME_RADI"]) . "&s_TDOC_CODI=" . tourl($_GET["s_TDOC_CODI"]) . "&s_desde_dia=" . tourl($_GET["s_desde_dia"]) . "&s_desde_mes=" . tourl($_GET["s_desde_mes"]) . "&s_desde_ano=" . tourl($_GET["s_desde_ano"]) . "&s_hasta_dia=" . tourl($_GET["s_hasta_dia"]) . "&s_hasta_mes=" . tourl($_GET["s_hasta_mes"]) . "&s_hasta_ano=" . tourl($_GET["s_hasta_ano"]) . "&s_solo_nomb=" . tourl($_GET["s_solo_nomb"]) . "&s_ciudadano=" . tourl($_GET["s_ciudadano"]) . "&s_empresaESP=" . tourl($_GET["s_empresaESP"]) . "&s_oEmpresa=" . tourl($_GET["s_oEmpresa"]) . "&s_FUNCIONARIO=" . tourl($_GET["s_FUNCIONARIO"]) . "&s_entrada=" . tourl($_GET["s_entrada"]) . "&s_regional=" . tourl($_GET["s_regional"]) . "&s_clasificacion=" . tourl($_GET["s_clasificacion"]) . "&s_salida=" . tourl($_GET["s_salida"]) . "&nivelus=$nivelus&s_Listado=" . $_GET["s_Listado"] . "&s_SGD_EXP_SUBEXPEDIENTE=" . $_GET["s_SGD_EXP_SUBEXPEDIENTE"] . "&";
                // s_Listado s_ciudadano s_empresaESP s_FUNCIONARIO
                if (!$iSort) {
                    $form_sorting = "";
                } else {
                    if ($iSort == $iSorted) {
                        $form_sorting = "";
                        $sDirection = " DESC ";
                        $sSortParams = "FormCIUDADANO_Sorting=" . $iSort . "&FormCIUDADANO_Sorted=" . $iSort . "&";
                    } else {
                        $form_sorting = $iSort;
                        $sDirection = "  ";
                        $sSortParams = "FormCIUDADANO_Sorting=" . $iSort . "&FormCIUDADANO_Sorted=" . "&";
                    }
                    switch ($iSort) {
                        case 1: $sOrder = " order by r.radi_nume_radi" . $sDirection;
                            break;
                        case 2: $sOrder = " order by r.radi_fech_radi" . $sDirection;
                            break;
                        case 3: $sOrder = " order by r.ra_asun" . $sDirection;
                            break;
                        case 4: $sOrder = " order by td.sgd_tpr_descrip" . $sDirection;
                            break;
                        case 5: $sOrder = " order by r.radi_nume_hoja" . $sDirection;
                            break;
                        case 6: $sOrder = " order by dir.sgd_dir_direccion" . $sDirection;
                            break;
                        case 7: $sOrder = " order by dir.sgd_dir_telefono" . $sDirection;
                            break;
                        case 8: $sOrder = " order by dir.sgd_dir_mail" . $sDirection;
                            break;
                        case 9: $sOrder = " order by dir.sgd_dir_nombre" . $sDirection;
                            break;
                        case 12: $sOrder = " order by dir.sgd_dir_telefono" . $sDirection;
                            break;
                        case 13: $sOrder = " order by dir.sgd_dir_direccion" . $sDirection;
                            break;
                        case 14: $sOrder = " order by dir.sgd_dir_doc" . $sDirection;
                            break;
                        case 17: $sOrder = " order by r.radi_usu_ante" . $sDirection;
                            break;
                        case 20: $sOrder = " order by r.radi_pais" . $sDirection;
                            break;
                        case 21: $sOrder = " order by diasr" . $sDirection;
                            break;
                        case 22: $sOrder = " order by dir.sgd_dir_nombre" . $sDirection;
                            break;
                        case 23: $sOrder = " order by dir.sgd_dir_nombre" . $sDirection;
                            break;
                        case 24: $sOrder = " order by dir.sgd_dir_nombre" . $sDirection;
                            break;
                    }
                }

                // Encabezados HTML de las Columnas
                ?>
                </br>
                
                <div id="tablaRadicados" class="panel panel-default" style="width: 95%; margin-left: 2%;">
                    <div class="panel-heading" style="background-color: #365c8a; color: #ffffff; border-color: #365c8a;"><?= $sFormTitle ?></div>
                    <div class="panel-body">
                        <table id='tablaRadicadosContenido'  border="1" cellspacing="0" cellpadding="3" width="100%" class='table table-striped' style="font-size: 12px;">
                            <thead>
                                <tr>
                                <?php
                                    if ($indiVinculo >= 1) {
                                        echo '<th class="titulos5"><font class="ColumnFONT"> </th>';
                                    }
                                    if ($indiVinculo != 2) {
                                        ?>
                                        <th class="titulos5"><a class="vinculos" href="<?= $sFileName ?>?<?= $form_params ?>FormCIUDADANO_Sorting=21&FormCIUDADANO_Sorted=<?= $form_sorting ?>&">D&iacute;as Restantes</a></th>
                                        <th class="titulos5"><a class="vinculos" href="<?= $sFileName ?>?<?= $form_params ?>FormCIUDADANO_Sorting=1&FormCIUDADANO_Sorted=<?= $form_sorting ?>&">Radicado</a></th>
                                        <th class="titulos5"><a class="vinculos" href="<?= $sFileName ?>?<?= $form_params ?>FormCIUDADANO_Sorting=2&FormCIUDADANO_Sorted=<?= $form_sorting ?>&">Fecha Radicacion</a></th>
                                        <th class="titulos5"><font class="ColumnFONT"><a href="" class="vinculos">Expediente</a></th>
                                    <?php } else { ?>
                                        <th class="titulos5"><font class="ColumnFONT"><a href="" class="vinculos">Expediente</a></th>
                                        <th class="titulos5"><a class="vinculos" href="<?= $sFileName ?>?<?= $form_params ?>FormCIUDADANO_Sorting=1&FormCIUDADANO_Sorted=<?= $form_sorting ?>&">Radicado vinculado al expediente</a></th>
                                        <th class="titulos5"><a class="vinculos" href="<?= $sFileName ?>?<?= $form_params ?>FormCIUDADANO_Sorting=2&FormCIUDADANO_Sorted=<?= $form_sorting ?>&">Fecha Radicaci&oacute;n</a></th>
                                    <?php } ?>
                                    <th class="titulos5"><a class="vinculos" href="<?= $sFileName ?>?<?= $form_params ?>FormCIUDADANO_Sorting=3&FormCIUDADANO_Sorted=<?= $form_sorting ?>&">Asunto</a></th>
                                    <th class="titulos5"><a class="vinculos" href="<?= $sFileName ?>?<?= $form_params ?>FormCIUDADANO_Sorting=4&FormCIUDADANO_Sorted=<?= $form_sorting ?>&">Tipo Documental</a></th>
                                    <th class="titulos5"><a class="vinculos" href="<?= $sFileName ?>?<?= $form_params ?>FormCIUDADANO_Sorting=6&FormCIUDADANO_Sorted=<?= $form_sorting ?>&">Direcci&oacute;n contacto</a></th>
                                    <th class="titulos5"><a class="vinculos" href="<?= $sFileName ?>?<?= $form_params ?>FormCIUDADANO_Sorting=9&FormCIUDADANO_Sorted=<?= $form_sorting ?>&">Nombre </a></th>
                                    <th class="titulos5"><a class="vinculos" href="<?= $sFileName ?>?<?= $form_params ?>FormCIUDADANO_Sorting=14&FormCIUDADANO_Sorted=<?= $form_sorting ?>&">N&uacute;mero Identificaci&oacute;n</a></th> 
                                    <th class="titulos5"><a class="vinculos" href="<?= $sFileName ?>?<?= $form_params ?>FormCIUDADANO_Sorting=15&FormCIUDADANO_Sorted=<?= $form_sorting ?>&">Usuario Actual</a></th>
                                    <th class="titulos5"><font class="ColumnFONT"><a href="" class="vinculos">Dependencia Actual</a></th>
                                    <th class="titulos5"><font class="ColumnFONT"><a href="" class="vinculos">Usuario Anterior</a></th>
                                </tr>
                            </thead>
                            <tbody id="tbdoyLoadData">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
            }

            // Display Grid Form
            function EmpresaESP_show($nivelus) {}
            function OtrasEmpresas_show($nivelus) {}
            function FUNCIONARIO_show($nivelus) {}

            function resolverTipoCodigo($tipo) {
                switch ($tipo) {
                    case 1:
                        $salida = "Ciudadano";
                        break;
                    case 2:
                        $salida = "Empresa";
                        break;
                    case 3:
                        $salida = "Tercero";
                        break;
                    case 4:
                        $salida = "Funcionario";
                        break;
                }
                return $salida;
            }

            function buscar($nivelus, $tpRemDes, $whereFlds) {
                Ciudadano_show($nivelus, $tpRemDes, $whereFlds);
            }
    
?>