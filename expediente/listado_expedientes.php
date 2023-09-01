<?php
session_start();

$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

require_once("../include/db/ConnectionHandler.php");
include "../config.php";
$db = new ConnectionHandler($dir_raiz);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$db->conn->debug = false;
?>
<HTML>

<head>
    <title>.:: Orfeo Modulo de Expedientes</title>
    <meta charset="utf-8">
    <meta http-equiv="expires" content="99999999999">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="./css/datatables.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= $url_raiz . $ESTILOS_PATH2 ?>header.css">
    <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    <style>
        .input-form {
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

        .input-form-textarea {
            margin: 0 auto;
            width: 98%;
        }

        .container-principal {
            width: 100%;
        }

        .container-titulo {
            width: 100%;
            text-align: center;
            height: 40px;
            margin-top: 5px;
        }

        .consulta-titulo {
            /* padding-top: 10px; */
            font-size: 21px;
            color: #FFF;
            font-family: "Source Sans Pro", sans-serif;
        }

        #titulo2 {
            padding: 0.5%;
            font-size: 21px;
            background-color: #ffffff;
            color: #FFF;
            font-family: "Source Sans Pro", sans-serif;
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

        .borde_tabConsultas {
            color: #FFF;
            font-family: "Source Sans Pro", sans-serif;
            border-style: solid;
            border-width: 1px;
            border-color: #808080;
            border-bottom-color: rgba(128, 128, 128, 0);
        }

        .campoTextoBusqueda {
            height: 39px;
            padding-top: 3px;
        }

        .labelBusuqueda {
            padding-top: 5px;
        }

        .btn-filtros {
            background-color: #1c4056;
            border-color: #1c4056;
            border: none;
            color: #fff;
            border-radius: 5px;
            padding: 4px 20px;
        }

        .container-filter {
            width: 99%;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }

        .btn-filter {
            padding: 4px 32px;
            background-color: #1c4056;
            margin: 3px;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">

        <div id="contenidoPanelReasignacion" class="panel panel-default">
            <div class="panel-heading" style="background-color: #8f0000; color: #ffffff; border-color: #8f0000;">
                Gestión de Expedientes
                <span>
                    <!-- <button class="btn-filtros" id="filtros" onclick="ocultar()"> Mostrar Filtros </button> -->
                    <button class="btn-filtros" id="filtros" onclick="crearexpediente()" style="margin-left: 76%;"> Crear Expediente </button>
                </span>
            </div>

            <div class="panel-body">
                <input type="hidden" name="dependencia" id="dependencia" value="<?= $_SESSION['dependencia'] ?>" />
                <input type="hidden" name="usuario" id="usuario" value="<?= $_SESSION['codusuario'] ?>" />
                <input type="hidden" name="infoUsuario" id="infoUsuario" value="<?= $_SESSION['nivelus'] . "|" . $_SESSION['dependencia'] ?>" />
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <br />
                        <div style="display: none;" class="loadingRadicados">Cargando...</div>
                        <div style="display: none;" id="tablaRadicados">
                            <table id='tablaRadicadosContenido' class='table table-striped' style='font-size: 12px; '>
                                <thead>
                                    <tr>
                                        <th>Número Expediente</th>
                                        <th>Nombre Expediente</th>
                                        <th>Serie Documental</th>
                                        <th>Subserie Documental</th>
                                        <th>Dependencia Responsable</th>
                                        <th>Usuario Responsable</th>
                                        <th>Acciones</th>
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
                                    </tr>
                                </tbody>
                            </table>
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
    <script src="./js/informacionexpediente.js" type="text/javascript"></script>

</body>

<div id="myModalExpediente" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="padding-right: 13px; margin-top: -21px; overflow: scroll">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="width: 148%; margin-left: -23%; height: 100%;">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="padding: 5px; color: #FFFFFF; border-color: #1C4056; background-color: #1C4056;">Cerrar</button>
            <div class="modal-body">
                <div class="row" id="tableRadicados"></div>
            </div>
        </div>
    </div>
</div>

<div id="myModalExpedienteHistorico" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="padding-right: 13px; margin-top: -21px; overflow: scroll;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="width: 148%; margin-left: -23%; height: 100%;">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="padding: 5px; color: #FFFFFF; border-color: #1C4056; background-color: #1C4056;">Cerrar</button>
            <div class="modal-body">
                <div class="row" id="tableHistorico"></div>
            </div>
        </div>
    </div>
</div>


</HTML>