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


    //print_r($_SESSION);die();

  /*---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


include ("common.php");

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

    include_once "$dir_raiz/include/db/ConnectionHandler.php";
    $db = new ConnectionHandler("$dir_raiz");
    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

    # consulta inventario_documental
    $result = $db->query("SELECT DISTINCT uni_administrativa FROM inventario_documental");
    
    if(!empty($result)){
        while (!$result->EOF) {
    
            # Lista de unidad administrativa 
            $uniadministrativa[] = [
                'uni_administrativa' => $result->fields['UNI_ADMINISTRATIVA']
            ];
            $result->MoveNext();
        }
    }

    # consulta inventario_documental
    $result = $db->query("SELECT DISTINCT ofi_productora FROM inventario_documental");

    if(!empty($result)){
        while (!$result->EOF) {

            # Lista oficina productora 
            $ofiproductora[] = [
                'ofi_productora' => $result->fields['OFI_PRODUCTORA']
            ];
            $result->MoveNext();
        }
    }

    # consulta inventario_documental
    $result = $db->query("SELECT DISTINCT nombre FROM inventario_documental");

    if(!empty($result)){
        while (!$result->EOF) {

            # Lista nombre de la serie
            $nombreserie[] = [
                'nombre' => $result->fields['NOMBRE']
            ];
            $result->MoveNext();
        }
    }

    # consulta inventario_documental
    $result = $db->query("SELECT DISTINCT sub_serie FROM inventario_documental");

    if(!empty($result)){
        while (!$result->EOF) {

            # Lista nombre sub-serie
            $nombresubserie[] = [
                'sub_serie' => $result->fields['SUB_SERIE']
            ];
            $result->MoveNext();
        }
    }

    # consulta inventario_documental
    $result = $db->query("SELECT DISTINCT soporte FROM inventario_documental");

    if(!empty($result)){
        while (!$result->EOF) {

            # Lista soporte
            $soporte[] = [
                'soporte' => $result->fields['SOPORTE']
            ];
            $result->MoveNext();
        }
    }

    # consulta inventario_documental
    $result = $db->query("SELECT DISTINCT fr_consulta FROM inventario_documental");

    if(!empty($result)){
        while (!$result->EOF) {

            if($result->fields['FR_CONSULTA'] == '1'){
                $fr_consulta_txt = "Baja";   
            }

            if($result->fields['FR_CONSULTA'] == '2'){
                $fr_consulta_txt = "Media";   
            }

            if($result->fields['FR_CONSULTA'] == '3'){
                $fr_consulta_txt = "Alta";   
            }

            # Lista frecuencia de consulta
            $freconsulta[] = [
                'fr_consulta' => $result->fields['FR_CONSULTA'],
                'fr_consulta_text' => $fr_consulta_txt
            ];

            $result->MoveNext();

        }
    }

    // print_r($uniadministrativa);
    // print_r($ofiproductora);
    // print_r($nombreserie);
    // print_r($nombresubserie);
    // print_r($soporte);
    // print_r($freconsulta);

    // die();

   
?>

<html>

    <head>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script src="../estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../estilos/js/bootstrap.js" type="text/javascript"></script>
        <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
        <link href="./datatable/css/datatables.min.css" rel="stylesheet" type="text/css"/>
        <link href="./datatable/css/filemultiple.css" rel="stylesheet" type="text/css"/> 
        <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    </head>

    <?php 

        /***
         *
         * 
         *  Cuando se de clic en la opción, se debe mostrar un modal donde muestren los campos de busqueda: 
         * 
         *  Unidad Administrativa (lista desplegable), 
         *  Oficina Productora (lista desplegable), 
         *  Objeto (campo texto), 
         *  Codigo, 
         *  Nombre de la Serie (lista desplegable), 
         *  subserie (lista desplegable), 
         *  Fechas Extremas inicial - final (campo de fecha),
         *  Unidad de Conservacion (campo de texto) , 
         *  Caja (campo de texto), 
         *  Carpeta (campo de texto), 
         *  Tomo (campo de texto), 
         *  Otro (campo de texto),  
         * 
         *  Modulo (campo de texto), 
         *  Estante (campo de texto), 
         *  Soporte (lista desplegable), 
         *  Frecuencia de consulta (lista desplegable) 
         *  
         * *Esto debe ser igual a como se hizo la consulta de documentos
         */

    ?>  

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
                font-size: 16px;
                padding: 0px 6px;
                cursor: pointer;
                color: #fff;
            }
                .btn-action-content{
                    display: flex;
                    flex-direction: row;
                    align-items: flex-end;
                    height: 20px;
                    justify-content: center;
                }
                                
        .events_content{
            padding: 25px;
            height: 300px;
            overflow-x: hidden;
            overflow-y: scroll;
        }

            .events_content_plus{
                padding: 15px;
                height: auto;
                overflow-x: hidden;
                overflow-y: scroll;
            }

            .alert{
                padding: 8px!important;
            }

    </style>

    <div class="container-fluid">

        <div id="reasignacionCargandoAlert" style="display: none;" class="alert alert-info" role="alert">Cargano...</div>
        <div id="reasignacionCorrectaAlert" style="display: none;" class="alert alert-success" role="alert">Radicados reasignados correctamente</div>

        <div id="contenidoPanelReasignacion" class="panel panel-default">

            <div class="panel-heading" style="background-color: #8f0000;color: #ffffff;border-color: #8f0000;display: flex;justify-content: space-between;align-items: center;"> 
                <span style="font-size: 16px;"> Inventario Documental </span> 
                <div>
                    <?php   if ($_SESSION["per_consulta_inv_documental"] == 1) { ?>
                    <button class="btn-filtros" id="filtros" onclick="ocultar()"> Mostrar Filtros </button>
                    <?php   }   ?> 
                    <?php   if ($_SESSION["per_carga_inv_documental"] == 1) { ?>
                    <button class="btn-filtros" id="filtros" onclick="openModal()"> Cargar Documento </button>
                    <?php   }   ?> 
                </div> 
                 
            </div>
            <!--//////////////////////////////////////////// FILTROS ////////////////////////////////////////////-->
            <div id="contenedor-form" style="display:none; margin-top: 10px; border-bottom: 1px solid rgb(221, 221, 221);">
                <form id="form-filter" name="Search">

                    <input type="hidden" name="FormAction" id="Session"  name=<?= session_name() ?> value=<?= session_id() ?>>
                    <input type="hidden" name="FormAction" id="FormAction" value=""> 

                    <div id="titulo2" class="container-principal">
                        <div class="grid-container">

                            <div class="seccion3">

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">Unidad Administrativa </label>
                                        <select style="margin: 5px;" class="input-form select form-control" name="uni_administrativa" id="uni_administrativa">
                                            <option selected disabled>selecciona una unidad administrativa</option>
                                            <?php  foreach($uniadministrativa as $key => $value){ ?>
                                                <option  value="<?= $value['uni_administrativa'] ?>"><?= $value['uni_administrativa'] ?></option>
                                            <?php  } ?>
                                        </select>
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Oficina productora  </label>
                                        <select style="margin: 5px;" class="input-form select form-control" name="ofi_productora" id="ofi_productora">
                                            <option selected disabled>Selecciona una oficina productora</option>
                                            <?php  foreach($ofiproductora as $key => $value){ ?>
                                                <option  value="<?= $value['ofi_productora'] ?>"><?= $value['ofi_productora'] ?></option>
                                            <?php  } ?>
                                        </select>
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Objeto </label>
                                        <input style="margin: 5px;" class="input-form" type="text" id="objeto" value="" name="objeto" placeholder="Ingrese el objeto">
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Codigo  </label>
                                        <input style="margin: 5px;" class="input-form" type="text" id="codigo" value="" name="codigo" placeholder="Ingrese el codigo">
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Nombre de la serie </label>
                                        <select style="margin: 5px;" class="input-form select form-control" name="nombre" id="nombre">
                                            <option selected disabled>Seleccione una serie</option>
                                            <?php  foreach($nombreserie as $key => $value){ ?>
                                                <option  value="<?= $value['nombre'] ?>"><?= $value['nombre'] ?></option>
                                            <?php  } ?>
                                        </select>
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Nombre de la subserie  </label>
                                        <select style="margin: 5px;" class="input-form select form-control" name="sub_serie" id="sub_serie">
                                            <option selected disabled>Seleccion un a subserie</option>
                                            <?php  foreach($nombresubserie as $key => $value){ ?>

                                                <option  value="<?= $value['sub_serie'] ?>"><?= $value['sub_serie'] ?></option>

                                            <?php  } ?>
                                        </select>
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Modulo  </label>
                                        <input style="margin: 5px;" class="input-form" type="number" id="modulo" value="" name="modulo" placeholder="Ingrese un numero de modulo">
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Estante  </label>
                                        <input style="margin: 5px;" class="input-form" type="number" id="estante" value="" name="estante" placeholder="Ingrese un numero de estante">
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Caja </label>
                                        <input style="margin: 5px;" class="input-form" type="number" id="caja" value="" name="caja" placeholder="Ingrese un numero de caja">
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Carpeta </label>
                                        <input style="margin: 5px;" class="input-form" type="number" id="carpeta" value="" name="carpeta" placeholder="Ingrese un numero de carpeta">
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Tomo </label>
                                        <input style="margin: 5px;" class="input-form" type="number" id="tomo" value="" name="tomo" placeholder="Ingrese un numero de tomo">
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                    <label class="label-filter">  Otro </label>
                                        <input style="margin: 5px;" class="input-form" type="text" id="otro" value="" name="otro" placeholder="Ingrese otra unidad de conservacion">
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Soporte </label>
                                        <select style="margin: 5px;" class="input-form select form-control" name="soporte" id="soporte">
                                            <option selected disabled>Selecciona un soporte</option>
                                            <?php  foreach($soporte as $key => $value){ ?>

                                                <option  value="<?= $value['soporte'] ?>"><?= $value['soporte'] ?></option>

                                            <?php  } ?>
                                        </select>
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Frecuencia de Consulta  </label>
                                        <select style="margin: 5px;" class="input-form select form-control" name="fr_consulta" id="fr_consulta">
                                            <option selected disabled>Seleccione una frecuencia de consulta</option>
                                            <?php  foreach($freconsulta as $key => $value){ ?>

                                                <option  value="<?= $value['fr_consulta'] ?>"><?= $value['fr_consulta_text'] ?></option>

                                            <?php  } ?>
                                        </select>
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Fecha Extrema inicial </label>
                                        <input style="margin: 5px;" class="input-form" type="date" id="fecha_ext_ini" value="" name="fecha_ext_ini" placeholder="Ingrese la fecha de Inicio">
                                    </section>
                                </div>

                                <div class="seccion3-col2">
                                    <section>
                                        <label class="label-filter">  Fecha Extrema final  </label>
                                        <input style="margin: 5px;" class="input-form" type="date" id="fecha_ext_end" value="" name="fecha_ext_end" placeholder="Ingrese la fecha Final">
                                    </section>
                                </div>

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

            <?php   if ($_SESSION["per_consulta_inv_documental"] == 1) { ?>
            <!--//////////////////////////////////////////// TABLA ////////////////////////////////////////////-->
            <div class="panel-body">

                <div class="row">

                    <!-- <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div style="display: none;" class="loadingDependencias">Cargando...</div>
                                <div style="display: none;" class="contenidoDependencias">
                                    <label for="dependenciaReasignaMasiva">Dependencia</label>
                                    <div id="loadDependencias"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <br />
                                <div style="display: none;" class="loadingUsuarios">Cargando...</div>
                                <div style="display: none;" class="contenidoUsuarios">
                                    <label for="usuarios">Usuarios</label>
                                    <div id="loadUsuarios"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div style="display: none;" class="loadingDependenciaReasigna">Cargando...</div>
                                <div style="display: none;" class="contenidoDependenciaReasigna">
                                    <label for="dependenciaReasigna">Dependencia a reasignar</label>
                                    <div id="loadDependenciaReasigna"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <br />
                                <div style="display: none;" class="loadingusuariosReasigna">Cargando...</div>
                                <div style="display: none;" class="contenidousuariosReasigna">
                                    <label for="usuariosReasigna">Usuario a reasignar</label>
                                    <div id="loadusuariosReasigna"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <br />
                        <div style="display: none;" class="loadingRadicados">Cargando...</div>
                        <div style="display: none;" id="tablaRadicados">
                            <table id='tablaRadicadosContenido' class='table table-striped' style='font-size: 12px;'>
                                <thead>
                                    <tr>

                                        <th>Unidad Administradora</th>
                                        <th>Oficina Productora</th>
                                        <th>Objetivo</th>
                                        <th>Codigo</th>
                                        <th>Serie</th>
                                        <th>Subserie </th>
                                        <th>Fechas Extremas </th>
                                        <th>N°Folios</th>
                                        <th>Soporte</th>
                                        <th>Frecuencia</th>
                                        <th>Accion</th> <!-- unidad de conservacion / documentos -->

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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <?php   }   ?> 
            <!--//////////////////////////////////////////// TABLA ////////////////////////////////////////////-->
        </div>
    </div>

    <script>
        
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
            document.getElementById("formuploadajax").reset();
        }

        /***
         *  Se debe mostrar en el titulo o en la cabecera una opción que se llame "Carga Documento"
         *  cuando se de clic en esa opción se debe mostrar un formulario solicitando los siguientes campos: 
         * 
         *  Unidad Administrativa (campo de texto), 
         *  Oficina Productora (campo de texto), 
         *  No.Orden (campo texto), 
         *  Objeto (campo texto), 
         *  Codigo (campo texto), 
         *  Nombre de la Serie (campo texto), 
         *  subserie (campo texto), 
         *  Fechas Extremas inicial(campo de fecha) - final (campo de fecha), 
         *  Unidad de Conservacion (campo texto) , 
            *  Caja (campo de texto), 
            *  Carpeta (campo de texto), 
            *  Tomo (campo de texto), 
            *  Otro (campo de texto),  
         *  Modulo (campo de texto), 
         *  Estante (campo de texto), 
         *  Número de folios, 
         *  Soporte (campo texto), 
         *  Frecuencia de consulta (campo texto), 
         *  notas (campo texto), 
         * 
         *  se debe agregar un campo file(para cargar documento)  ** *los campos de texto que dicen número deben tener la validación para que solo se permita numeros* **
         * 
         * 
         */

        function openModal(){
 
            $('#modal_events').modal('show'); $('#events_forms').hide(); $('#events_docusign').hide();
            $('#loading_events').html('<div class="divLoading"><div><img class="imgLoading" src="./datatable/img/loader.gif"/><br/> Cargando . . . </div> </div>');

            $('#header-form').show();       $('#btn-action-form').show();

            setTimeout(function(){
                $('#events_forms').show();
                $('#loading_events').html('');
            }, 1000);   
        }

        function documet(id){
            
            $('#events_docusign').hide();   $('#events_docusign').hide();  $('#events_forms').hide();
            $('#modal_events').modal('show');
            $('#loading_events').html('<div class="divLoading"><div><img class="imgLoading" src="./datatable/img/loader.gif"/><br/> Cargando Documentos </div> </div>');

            $('#header-form').hide();       $('#btn-action-form').hide();

            var data = {
                id_inv_documental: id,
                type: 6    
            };

            $.ajax({
                url: './datatable/ajax.php',
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

        function view(id){

            $('#events_docusign').hide();   $('#events_docusign').hide(); $('#events_forms').hide();
            $('#modal_events').modal('show');
            $('#loading_events').html('<div class="divLoading"><div><img class="imgLoading" src="./datatable/img/loader.gif"/><br/> Cargando Detalles </div> </div>');

            $('#header-form').hide();       $('#btn-action-form').hide();

            var data = {
                id_inv_documental: id,
                type: 7 
            };

            $.ajax({
                url: './datatable/ajax.php',
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

    </script>

    <!-- Modal Eventos  -->
    <div  id="modal_events" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_solicit" aria-hidden="true" data-dismiss="modal-close">
        <div class="modal-dialog modal-lg" style="background-color: #fff!important;">
            <div class="modal-content">
                
                <form enctype="multipart/form-data" id="formuploadajax" method="post">

                    <div id="header-form"  class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cargar Documentos</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button> -->
                    </div>  

                    <div id="loading_events" class="col-12">Cargando . . .</div>

                    <div id="events_docusign" style="display:none;" class="events_content_plus col-12"> </div>

                    <div id="events_forms" style="display:none;" class="events_content col-12">
                        <div class="row col-12">
                            <!-- Unidad Administrativa --> 
                            <div class="form-modal form-group col-sm-3 col-6">
                                <label class="label-filter"> Unidad Administrativa<span>* </span> </label>
                                <input class="form-control" type="text" id="uni_administrativa" value="" placeholder="Unidad administrativa" name="uni_administrativa" required>
                            </div>
                            <!-- Oficina Productora -->
                            <div class="form-modal form-group col-sm-3 col-6">
                                <label class="label-filter"> Oficina Productora<span>* </span> </label>
                                <input class="form-control" type="text" id="ofi_productora" value="" placeholder="Oficina productora" name="ofi_productora" required>
                            </div>
                            <!-- No.Orden -->
                            <div class="form-modal form-group col-sm-3 col-6">  
                                <label class="label-filter"> No.Orden<span>* </span> </label>
                                <input class="form-control" type="text" id="no_orden" value="" placeholder="No. Orden" name="no_orden" required>
                            </div>
                            <!-- Objeto -->
                            <div class="form-modal form-group col-sm-3 col-6">
                                <label class="label-filter"> Objeto<span>* </span> </label>
                                <input class="form-control" type="text" id="objeto" value="" placeholder="Objeto" name="objeto" required>
                            </div>
                        </div>

                        <div class="row col-12">
                            <!-- Codigo -->
                            <div class="form-modal form-group col-sm-3 col-6">  
                                <label class="label-filter"> Codigo<span>* </span> </label>
                                <input class="form-control" type="text" id="codigo" value="" placeholder="Codigo" name="codigo" required>
                            </div>
                            <!-- Nombre -->
                            <div class="form-modal form-group col-sm-3 col-6">
                                <label class="label-filter"> Nombre<span>* </span> </label>
                                <input class="form-control" type="text" id="nombre" value="" placeholder="Nombre" name="nombre" required>
                            </div>
                            <!-- Subserie -->
                            <div class="form-modal form-group col-sm-3 col-6">
                                <label class="label-filter"> Subserie<span>* </span> </label>
                                <input class="form-control" type="text" id="sub_serie" value="" placeholder="SubSerie" name="sub_serie" required>
                            </div>
                        </div>

                        <div class="row col-12">
                            <!-- Fechas Extremas (inicial) -->
                            <div class="form-modal form-group col-sm-6 col-6">  
                                <label class="label-filter"> Fechas Extremas (inicial)<span>* </span> </label>
                                <input class="form-control" type="date" id="fecha_ext_ini" value="" placeholder="Ingrese la fecha de inicio" name="fecha_ext_ini" required>
                            </div>
                            <!-- Fechas Extremas (final) -->
                            <div class="form-modal form-group col-sm-6 col-6">
                                <label class="label-filter"> Fechas Extremas (final)<span>* </span>  </label>
                                <input class="form-control" type="date" id="fecha_ext_end" value="" placeholder="Ingrese la fecha de finalazacion" name="fecha_ext_end" required>
                            </div>
                        </div>

                        <!-- Unidad de Conservacion -->
                        <div class="row col-12">
                            <div class="form-modal form-group col-sm-12 col-12">
                                <label class="label-filter"> Unidad de Conservacion<span>* </span> </label>
                            </div>
                        </div>

                        <div class="row col-12">
                            <!-- Caja -->
                            <div class="form-modal form-group col-sm-3 col-6">  
                                <label class="label-filter"> Caja<span>* </span> </label>
                                <input class="form-control" type="text" id="caja" value="" placeholder="Ingrese el numero de la caja" name="caja" required>
                            </div>
                            <!-- Carpeta -->
                            <div class="form-modal form-group col-sm-3 col-6">
                                <label class="label-filter"> Carpeta<span>* </span> </label>
                                <input class="form-control" type="text" id="carpeta" value="" placeholder="Ingrese el numero de carpeta" name="carpeta" required>
                            </div>
                            <!-- Tomo -->
                            <div class="form-modal form-group col-sm-3 col-6">  
                                <label class="label-filter"> Tomo<span>* </span> </label>
                                <input class="form-control" type="text" id="tomo" value="" placeholder="Ingrese el numero de tomo" name="tomo" required>
                            </div>
                            <!-- Otro -->
                            <div class="form-modal form-group col-sm-3 col-6">
                                <label class="label-filter"> Otro </label>
                                <input class="form-control" type="text" id="otro" value="" placeholder="Otro" name="otro">
                            </div>
                        </div>

                        <div class="row col-12">
                            <!-- Modulo -->
                            <div class="form-modal form-group col-sm-3 col-6">
                                <label class="label-filter"> Modulo<span>* </span> </label>
                                <input class="form-control" type="text" id="modulo" value="" placeholder="Ingrese el modulo" name="modulo" required>
                            </div>
                            <!-- Estante -->
                            <div class="form-modal form-group col-sm-3 col-6">
                                <label class="label-filter"> Estante<span>* </span> </label>
                                <input class="form-control" type="text" id="estante" value="" placeholder="Ingrese el estante" name="estante" required>
                            </div>
                            <!-- Número de folios -->
                            <div class="form-modal form-group col-sm-3 col-6">  
                                <label class="label-filter"> Número de folios<span>* </span> </label>
                                <input class="form-control" type="text" id="no_folios" value="" placeholder="Ingrese el numero de folios" name="no_folios" required>
                            </div>
                            <!-- Frecuencia de consulta -->
                            <div class="form-modal form-group col-sm-3 col-6">
                                <label class="label-filter"> Frecuencia de consulta<span>* </span> </label>

                                <select class="input-form select form-control" name="fr_consulta" id="fr_consulta" required>
                                    <option selected disabled>Seleccione un frencuencia</option>
                            
                                    <option value="1">Baja</option>
                                    <option value="2">Media</option>
                                    <option value="3">Alta</option>

                                </select>
                            </div>

                            <!-- soporte -->
                            <div class="form-modal form-group col-sm-3 col-12">
                                <label class="label-filter"> Soporte<span>* </span> </label>
                                <input class="form-control" type="text" id="soporte" value="" placeholder="Ingrese soporte" name="soporte" required>
                            </div>

                            <!-- notas -->
                            <div class="form-modal form-group col-sm-9 col-12">
                                <label class="label-filter"> Notas<span>* </span> </label>
                                <input class="form-control" type="text" id="notas" value="" placeholder="Ingrese la notas" name="notas" required>
                            </div>

                            <!-- file -->
                            <div class="form-modal form-group col-sm-12"  id="selector-files">
                                <label class="label-filter"> Carga de Documentos<span>* </span> </label>
                                <label class="selector-files label-div-file" for="upload">
                                    <input multiple class="input-file glyphicon glyphicon-paperclip" type="file" id="upload" name="upload"  accept="application/pdf" onchange="files_selected()"> 
                                    <label id="placeholderfile" for="upload" class="label-file" style="margin: 0 0 0 5px;"> Presione aqui para subir los documentos en formato PDF </label>   
                                    <label for="upload" class="glyphicon glyphicon glyphicon-paperclip icon-file" title="Subir Archivo"></label>
                                </label>
                            </div>
                        </div>

                        <div class="row col-12">
                            <div class="form-modal form-group col-10" style="margin:0 auto;">
                                <div class="files" id="files">
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="btn-action-form" class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submit-action-form">Guardar</button>
                        <button type="button" class="btn btn-secondary" onclick="clearFormulario()">Limpiar</button>
                    </div>
                    
                </form> 

            </div>
        </div>
    </div>

    <script>

        // no react or anything
        let state = {};

        $("#formuploadajax").on("submit", function(e){

            e.preventDefault();

            $('#events_forms').hide();
            $('#loading_events').html('<div class="divLoading"><div><img class="imgLoading" src="./datatable/img/loader.gif"/><br/> Cargando . . . </div> </div>');   

            var formData = new FormData(document.getElementById("formuploadajax"));

            $.each(state.filesArr, function(i, file) {
                formData.append(i, file);
            });

            formData.append("type", "4");

            $.ajax({
                url: './datatable/ajax.php',
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(res){
            
                $("#events_docusign").html(res);

                setTimeout(function(){ 

                    $('#loading_events').html('');
                    $('#events_docusign').show();
                    $('#events_forms').show();
                    // document.getElementById("formuploadajax").reset();
                    // files_selected();

                    setTimeout(function(){ 
                        $('#events_docusign').hide();
                    },3000);

                },1000);

            });
            
 
        });
     
        // state management
        function updateState(newState) {
            state = { ...state, ...newState };
        }

        function files_selected(){

            let files = document.getElementById("upload").files;

            let filesArr = Array.from(files);
            updateState({ files: files, filesArr: filesArr });

            renderFileList();
        }

        // delete
        $(".files").on("click", "li > i", function (e) {
            let key = $(this).
            parent().
            attr("key");
            let curArr = state.filesArr;
            curArr.splice(key, 1);
            updateState({ filesArr: curArr });
            renderFileList();
        });

        // render functions
        function renderFileList() {

            var bad = 0;

            if(state.filesArr.length == 0){
                $('#upload').val("");
            }

            let fileMap = state.filesArr.map((file, index) => {
                let suffix = "bytes";
                let size = file.size;

                if (size >= 1024 && size < 1024000) {
                    suffix = "KB";
                    size = Math.round(size / 1024 * 100) / 100;
                } else if (size >= 1024000) {
                    suffix = "MB";
                    size = Math.round(size / 1024000 * 100) / 100;
                }


                if(file.type != "application/pdf"){

                    $('#submit-action-form').attr("disabled", true); bad++;
                    return `<ul style="background:#f2b9b9;"> <li key="${index}">${file.name}<span class="file-size">${size} ${suffix}</span> <i style="right: 25px;">Formato Invalido<label></label></i><i><span class="glyphicon glyphicon-trash"></span></i></li> </ul>`;
                    
                }else{

                    return `<ul> <li key="${index}">${file.name}<span class="file-size">${size} ${suffix}</span><i><span class="glyphicon glyphicon-trash"></span></i></li> </ul>`;

                }


            });

            if(bad == 0){
                $('#submit-action-form').attr("disabled", false);
            }

            $("#files").html(fileMap); 
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
    
    </script>

    <script src="<?= $url_raiz; ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="<?= $url_raiz; ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./datatable/js/datatables.min.js" type="text/javascript"></script>
    <script src="./datatable/js/inventario.js" type="text/javascript"></script> 