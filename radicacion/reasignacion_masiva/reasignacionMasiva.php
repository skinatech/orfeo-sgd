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

<HTML>
    <head>
        <title>.:: Orfeo Modulo de Radicaci&acuoteo;n::.</title>
        <meta charset="utf-8">
        <meta http-equiv="expires" content="99999999999">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="./css/datatables.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $ESTILOS_PATH2 ?>header.css">
    </head>
    <body>

        <div class="container-fluid">

            <div id="reasignacionCargandoAlert" style="display: none;" class="alert alert-info" role="alert">Cargando...</div>
            <div id="reasignacionCorrectaAlert" style="display: none;" class="alert alert-success" role="alert">Radicados reasignados correctamente</div>

            <div id="contenidoPanelReasignacion" class="panel panel-default">
                <div class="panel-heading" style="background-color: #365c8a; color: #ffffff; border-color: #365c8a;">Reasignación masiva</div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
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
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            <br />
                            <div style="display: none;" class="loadingRadicados">Cargando...</div>
                            <div style="display: none;" id="tablaRadicados">
                                <table id='tablaRadicadosContenido' class='table table-striped' style='font-size: 12px;'>
                                    <thead>
                                        <tr>
                                            <th>Radicado</th>
                                            <th>Asunto</th>
                                            <th>Tipo radicado</th>
                                            <th>Usuario anterior</th>
                                            <th><input type="checkbox" name="selectAllRadicados" class="selectAllRadicados" id="selectAllRadicados" /></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbdoyLoadData">
                                        <tr>
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
                <div id="footerReasignar" style="display: none;" class="panel-footer">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            <div class="pull-right">
                                <button type="button" id="botonReasignar" style="font-size: 14px; text-align: center; background-color: #e18838; border-radius: 10px; width: 25px; width: 145px; color: #ffffff;">Reasignar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" value="<?= utf8_decode('&iquest;Est&aacute; seguro de reasignar los radicados?') ?>" name="confirmReasignaText" id="confirmReasignaText" />

        <script src="<?= $url_raiz; ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?= $url_raiz; ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./js/datatables.min.js" type="text/javascript"></script>
        <script src="./js/reasignacionMasiva.js" type="text/javascript"></script>

    </body>
</HTML>