<?php
session_start();

$url_raiz = "../..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

require_once("../../include/db/ConnectionHandler.php");
include "../../config.php";
$db = new ConnectionHandler($dir_raiz);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$db->conn->debug = false;
?>
<html>
    <head>
        <title>.:: Orfeo Configuración Contraseña::.</title>
        <meta charset="utf-8">
        <meta http-equiv="expires" content="99999999999">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="./css/datatables.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $ESTILOS_PATH2 ?>header.css">
    </head>
    <body>
        <div class="container-fluid" style="width: 80%;">
            <div id="contenidoPanelReasignacion" class="panel panel-default">
                <div class="panel-heading" style="background-color: #8f0000; color: #ffffff; border-color: #8f0000;">Configuración de Contraseña
                </div>
                <div class="panel-body">
                    <div id="reasignacionCargandoAlert" style="display: none;" class="alert alert-info" role="alert">   Cargando... </div>
                    <div id="reasignacionCorrectaAlert" style="display: none;" class="alert alert-success" role="alert"> Configuración guardada de forma correcta </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-6 col-sm-12">
                            <label for="email">Número de periocidad</label>
                            <input type="numeric" class="form-control" name="numeroPeriocidad" id="numeroPeriocidad" required="true" />
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-6 col-sm-12">
                            <label for="email">Seleccione periocidad<font color="red">*</font></label>
                            <select class="select form-control" name="listPeriocidad" id="listPeriocidad">
                                <option value="0">Seleccione periocidad</option>
                                <option value="day">Dias</option>
                                <option value="week">Semanas</option>
                                <option value="month">Meses</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-6 col-sm-12">
                            <label for="email">Días antes de vencimiento</label>
                            <input type="numeric" class="form-control" name="numeroAntesVencimiento" id="numeroAntesVencimiento" required="tru" /> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            <br />
                            <div style="display: none;" class="loadingRadicados">Cargando...</div>
                            <div style="display: none;" id="tablaRadicados">
                                <table id='tablaConfiguracion' class='table table-striped' style='font-size: 12px;'>
                                    <thead>
                                        <tr>
                                            <th>Número de periocidad</th>
                                            <th>Descripción de periocidad</th>
                                            <th>Días antes de vencimiento</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbdoyLoadData">
                                        <tr>
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

                <div id="footerReasignar" style="display: block;" class="panel-footer">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            <div class="pull-right">
                                <button type="button" id="botonReasignar" style="font-size: 14px; text-align: center; background-color: #1c4056; border-radius: 10px; width: 25px; width: 145px; color: #ffffff;">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?= $url_raiz; ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?= $url_raiz; ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./js/datatables.min.js" type="text/javascript"></script>
        <script src="./js/configuracionContrasena.js" type="text/javascript"></script>
    </body>
</html>