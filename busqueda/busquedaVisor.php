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
$url_raiz = "../..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
/* ---------------------------------

  /*---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

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

//-------------------------------
// busqueda CustomIncludes begin

include ("common.php");
// busqueda CustomIncludes end
//-------------------------------
//===============================
// Save Page and File Name available into variables
//-------------------------------
$sFileName = "busquedaVisor.php";
//===============================
//===============================
// busqueda PageSecurity begin
$usu = $krd;
//$niv = $_GET["niv");
$niv = $nivelus;
if (strlen($niv)) {
    //t_session("UserID",$usu);
    //t_session("krd",$krd);
    //t_session("Nivel",$niv);
}

    /***
     * Cuando se consulte por alguno de los campos o por todos juntos según como el usuario lo quiera hacer se debe mostrar o retornar las siguientes columnas 
     * 
     * Número de Radicado, 
     * Fecha de Radicación, 
     * Asunto del Radicado, 
     * Número Expediente, 
     * Nombre expediente, 
     * Nombre Remitente/Destinatario, 
     * Nit o Documento Remitente/Destinatario,  
     * Dependencia Radicadora, 
     * Usuario Radicador, 
     * Dependencia Actual, 
     * Usuario Actual, 
     * Tipo Documental 
     * 
     * y una ultima columna que se llama accione (Ver documentos, Ver histórico).
     * 
     * 
     */

    include_once "$dir_raiz/include/db/ConnectionDB.php";
    $db = new ConnectionDB("$dir_raiz");
    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

    # Lista de dependencias 
    $result = $db->query("SELECT cod_depend, nom_depend FROM a_dependencias");
    while (!$result->EOF) {
        $tiposdependencias[] = $result->fields;
        $result->MoveNext();
    }
 
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
    </head>

    <style>

        .grid-container{
            width: 100%;
            display: grid;
            grid-template-columns: 1fr;
        }
            .grid-container div{
                width:100%;
                height:auto;
                margin-bottom: 1px;
            }
                .seccion1{
                    display:grid;
                    grid-gap: 5px;
                    grid-template-rows: 1fr;
                    grid-template-columns: 1fr 2fr;
                }
                    .seccion1-col1 div{
                        display:grid;  grid-gap: 15px;
                        grid-template-rows: repeat(3, 1fr);
                        grid-template-columns: 1fr;
                    }
                    
                    .seccion1-col1 div{
                        display:grid;  grid-gap: 15px;
                        grid-template-rows: 1fr 6fr;
                        grid-template-columns: 1fr;
                    }

                        .seccion1 div section{
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                            background-color: #ffffff;
                            padding-bottom: 15px;
                        }
                            .seccion1 section label{
                                padding: 5px;
                            }

                            .input-form{
                                margin-left: 10px;
                                display: block;
                                width: 95%;
                                height: 34px;
                                padding: 6px 12px;
                                font-size: 14px;
                                line-height: 1.42857143;
                                color: #555;
                                background-color: #fff;
                                background-image: none;
                                border: 1px solid #ccc;
                                border-radius: 2px;
                                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
                                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
                                -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
                                -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
                                transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
                            }
                            .input-form-textarea{
                                margin: 0 auto;
                                width: 98%;
                            }


                .seccion1-col2-div{
                    display: grid;
                    grid-gap: 0px 5px;
                    grid-template-columns: 1fr 1fr;
                    grid-template-rows: 1fr 1fr;
                }

                .seccion3{
                    display:grid;
                    grid-gap: 0px 5px;
                    grid-template-rows: 1fr;
                    grid-template-columns: repeat(4, 1fr);
                }

                        .seccion3 div section{
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                            background-color: #ffffff;
                            padding-bottom: 5px;
                        }
                            .seccion3 section label{
                                padding: 5px;
                            }

        .container-principal{
            width: 100%; 
        }

            .container-titulo{
                width: 100%;
                text-align: center;
                height: 40px;
                margin-top: 5px;
            }


        .consulta-titulo{
            /* padding-top: 10px; */
            font-size: 21px;
            color: #FFF;
            font-family: "Source Sans Pro",sans-serif;
        }

            #titulo2{
                padding: 0.5%;
                font-size: 21px;
                background-color: #ffffff;
                color: #FFF;
                font-family: "Source Sans Pro",sans-serif;
                border-style: solid;
                border-width: 1px;
                border-bottom-color: rgba(128, 128, 128, 0);
            }


        .label-filter {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 12px;
            font-weight: 500;
            color: #333;
        }

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

        .btn-filtros{
            background-color: #1c4056;
            border-color: #1c4056;
            border: none;
            color: #fff;
            border-radius: 5px;
            padding: 4px 20px;
        }

        .container-filter{
            width: 99%;
            display:flex;
            flex-direction: row;
            justify-content: flex-end;
        }
            .btn-filter {
                padding: 4px 32px;
                background-color: #1c4056;
                margin: 3px;
                margin-top: 10px;
            }

        .divLoading{
            height: 170px;
            text-align: center;
            display: flex;
            justify-content: center;
        }
        .imgLoading{
            padding: 25px;     
        }
            .btn-action{
                border-radius: 5px;
                font-size: 20px;
                padding: 3px 5px;
                cursor: pointer;
                color: #fff;
            }
                .btn-action-content{
                    display: flex;
                    flex-direction: row;
                    align-items: flex-end;
                    height: 35px;
                    justify-content: center;
                }
 

    </style>

    <div class="container-fluid">

        <div id="reasignacionCargandoAlert" style="display: none;" class="alert alert-info" role="alert">Cargando...</div>
        <!--<div id="reasignacionCorrectaAlert" style="display: none;" class="alert alert-success" role="alert">Radicados reasignados correctamente</div>-->

        <div id="contenidoPanelReasignacion" class="panel panel-default">
            <div class="panel-heading" style="background-color: #8f0000;color: #ffffff;border-color: #8f0000;display: flex;justify-content: space-between;align-items: center;"> 
                <span style="font-size: 16px;"> Consulta de Documentos </span> 
                <div>
                    <button class="btn-filtros" id="filtros" onclick="ocultar()"> Mostrar Filtros </button> 
                </div>
            </div> 

            <!--//////////////////////////////////////////// FILTROS ////////////////////////////////////////////-->
            <div id="contenedor-form" style="display:none; margin-top: 10px; border-bottom: 1px solid rgb(221, 221, 221);">
                <form id="form-filter-visor" name="Search">

                    <input type="hidden" name="FormAction" id="Session"  name=<?= session_name() ?> value=<?= session_id() ?>>
                    <input type="hidden" name="FormAction" id="FormAction" value=""> 

                    <div id="titulo2" class="container-principal">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="label-filter"> Numero de Radicado </label>
                                <input class="ml-2 input-form" type="text" id="radi_nume_radi" value="" placeholder="Ingrese el numero de radicado" name="radi_nume_radi">
                            </div>
                            <div class="col-lg-3">
                                <label class="label-filter"> Asunto del Radicado </label>
                                <input class="input-form-textarea form-control" type="textarea" id="ra_asun" value="" placeholder="Ingrese el asunto del radicado" name="ra_asun">
                            </div>
                            <div class="col-lg-3">
                                <label class="label-filter"> Fecha de Inicio </label>
                                <input style="margin: 5px;" class="input-form" type="date" id="radi_fech_radi_ini" value="" name="radi_fech_radi_ini" placeholder="Ingrese la fecha de Inicio">
                            </div>
                            <div class="col-lg-3">
                                <label class="label-filter"> Fecha Final  </label>
                                <input style="margin: 5px;" class="input-form" type="date" id="radi_fech_radi_end" value="" name="radi_fech_radi_end" placeholder="Ingrese la fecha Final">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="label-filter"> Nombre de Remitente </label> 
                                <input  class="input-form" type="text" id="sgd_dir_nomremdes" value="" placeholder="Ingrese el nombre del remitente" name="sgd_dir_nomremdes"> <!-- PREGUNTAR -->
                            </div>
                            <div class="col-lg-3">
                                <label class="label-filter"> Documento de Identidad </label>
                                <input class="input-form" type="text" id="sgd_dir_doc" value="" placeholder="Ingrese el numero de documento de identidad" name="sgd_dir_doc">
                            </div>
                            <div class="col-lg-3">
                                <label class="label-filter"> Dependencia Radicadora </label>
                                <select class="input-form select form-control" name="radi_depe_radi" id="radi_depe_radi">
                                    <option selected disabled>Seleccione un dependencia</option>
                                    <?php  foreach($tiposdependencias as $key => $value){ ?>
                                        <option value="<?= $value['cod_depend'] ?>"><?= $value['nom_depend'] ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="label-filter"> Funcionario Radicador </label>
                                <input class="input-form-textarea form-control" type="textarea" id="usuario_depe" value="" placeholder="Ingrese el asunto del radicado" name="usuario_depe">                                
                            </div>
                        </div>
                        <div class="container-filter">
                            <button type="button" class="btn btn-filter" onclick="clearFormulario()"> Limpiar </button>
                            <button type="submit" class="btn btn-filter"> Consultar </button>
                        </div>

                    </div>

                </form>
            </div> 
            <!--//////////////////////////////////////////// FILTROS ////////////////////////////////////////////-->

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <br />
                        <div style="display: none;" class="loadingRadicados">Cargando...</div>
                        <div style="display: none;" id="tablaRadicados">
                            <table id='tablaRadicadosContenido' class='table table-striped' style='font-size: 12px; overflow-wrap:anywhere;'>
                                <thead>
                                    <tr>

                                        <th>Número de Radicado</th>
                                        <th>Fecha de Radicación</th>
                                        <th>Asunto de Radicado</th>
                                        <th>Anexos</th>
                                        <th>Respuesta</th>
                                        <th>Remitente / Destinatario</th>
                                        <th>Identificación</th>
                                        <th>Dependencia Radicadora</th>
                                        <th>Funcionario Radicador</th>
                                        <th>Accion</th>

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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        function history(radi_nume_radi){

            $('#events_docusign').hide();
            $('#modal_events').modal('show');
            $('#loading_events').html('<div class="divLoading"><div><img class="imgLoading" src="./datatable/img/loader.gif"/><br/> Cargando Historial </div> </div>');

            var data = {
                radi_nume_radi: radi_nume_radi,
                type: 2    
            };

            $.ajax({
                url: './datatable/ajaxvisor.php',
                type: 'POST',
                data: data,
                success: function (response)
                {
                    //response = JSON.strin(response);

                    console.log(response);
                    $("#events_docusign").html(response);

                    setTimeout(function(){ 

                        $('#loading_events').html('');
                        $('#events_docusign').show();
                      

                    },1000);

                },
                error: function (err)
                {
                    console.log('internal server error '+err);
                }
            });
        }

        function documet(radi_nume_radi){
            
            $('#events_docusign').hide();
            $('#modal_events').modal('show');
            $('#loading_events').html('<div class="divLoading"><div><img class="imgLoading" src="./datatable/img/loader.gif"/><br/> Cargando Documentos </div> </div>');

            var data = {
                radi_nume_radi: radi_nume_radi,
                type: 3    
            };

            $.ajax({
                url: './datatable/ajaxvisor.php',
                type: 'POST',
                data: data,
                success: function (response)
                {

                    $("#events_docusign").html(response);

                    setTimeout(function(){ 

                        $('#loading_events').html('');
                        $('#events_docusign').show();
                      

                    },1000);

                },
                error: function (err)
                {
                    console.log('internal server error '+err);
                }
            });




        }

        function download(doc_name,doc_base64){

            $('#events_docusign').hide();
            $('#loading_events').html('<div class="divLoading"><div><img class="imgLoading" src="./datatable/img/loader.gif"/><br/> Generando Descarga . . . </div> </div>');


            setTimeout(function(){

                var downloadLink = document.createElement("a");
                // document.body.appendChild(response['file']);
                downloadLink.setAttribute("type", "hidden");
                downloadLink.href = "data:application/octet-stream;base64," + doc_base64;
                downloadLink.download = doc_name;
                downloadLink.click();

                $('#loading_events').html('');
                $('#events_docusign').show();

            },2000);
        }

        function ocultar(){
            if($('#contenedor-form').css('display') != 'none'){
                $('#contenedor-form').hide();
                $('#filtros').html('Mostrar filtros');
            }else{
                $('#contenedor-form').show();
                $('#filtros').html('Ocultar filtros');
            }
        }

        function clearFormulario(){
            document.getElementById("form-filter").reset();
        }

    </script>

    <!-- Modal Historico/Documentos -->
    <div id="modal_events" class="modal_wrap modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal_header"></div>    
        <div class="modal-dialog modal-lg" style="background-color: #fff!important;">
            <div class="modal-content">
                <div id="loading_events" class="col-12">Cargando . . .</div>
                <br>
                <div id="events_docusign" style="display:none; padding-left: 19px; padding-right: 19px;" class="col-12"></div>
            </div>
        </div>
    </div>


    <script src="<?= $url_raiz; ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="<?= $url_raiz; ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./datatable/js/datatables.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="./datatable/js/documentosvisor.js" type="text/javascript"></script>
