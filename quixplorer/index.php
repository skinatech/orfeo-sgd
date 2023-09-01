<?php
session_start();

$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

function return_bytes($val) {
// retorna el valor en bytes de $val
// ingresa un valor en numeros con extension (g,m o k)
    $valu = trim($val,"mMgGkK");
    $last = strtolower($val[strlen($val)-1]);
    switch($last) {
        // El modificador 'G' está disponble desde PHP 5.1.0
        case 'g':
            $valu *= 1024;
        case 'm':
            $valu *= 1024;
        case 'k':
            $valu *= 1024;
    }

    return $valu;
}

$upload_max_filesize = return_bytes(ini_get('upload_max_filesize'));


?>

<HTML>
    <head>
        <title>.:: Orfeo Modulo de ayuda::.</title>
        <meta charset="utf-8">
        <meta http-equiv="expires" content="99999999999">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="./css/datatables.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $ESTILOS_PATH2 ?>header.css">
    </head>
    <body>

        <div class="container-fluid">

            <?php 
                if ( isset($_GET['errorUploadFile']) && $_GET['errorUploadFile'] == 'false' ) {
                    echo '<div id="topMessage" class="alert alert-success" role="alert">Archivo subido correctamente</div>';
                } elseif (isset($_GET['errorUploadFile']) && $_GET['errorUploadFile'] == 'true') {
                    echo '<div id="topMessage" class="alert alert-danger" role="alert">Error en la subida del archivo</div>';
                }
            ?>

            <div id="contenidoPanelReasignacion" class="panel panel-default">
                <div class="panel-heading" style="background-color: #365c8a; color: #ffffff; border-color: #365c8a;">Módulo de ayuda</div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <div style="display: none;" class="loadingModulosAyuda">Cargando...</div>
                                    <div style="display: none;" class="contenidoModulosAyuda">
                                        <label for="moduloAyuda">Seleccione el módulo de ayuda</label>
                                        <div id="loadModulosAyuda"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if($_SESSION["rol"] == 2){ 
                            ?>
                            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                                <div class="row">
                                    
                                    <div style="display: none;" class="fileManagementForm">
                                        <form id="fileForm" enctype="multipart/form-data" action="fileManagementProcess.php" method="POST">
                                            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                                <label for="archivoSubir">Selecione un archivo a subir</label>
                                                <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="<?php echo $upload_max_filesize ?>" />
                                                <input type="hidden" name="type" value="300" />
                                                <input type="hidden" name="carpeta" id="carpeta" />
                                                <input type="file" name="subirArchivo" id="subirArchivo" required="required" />
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12">
                                                <!-- <label>&nbsp;</label> -->
                                                <div class="pull-right">
                                                    <button type="button" id="botonSubirArchivo" style="font-size: 14px; text-align: center; background-color: #e18838; border-radius: 10px; width: 25px; width: 145px; color: #ffffff;">Enviar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div style="display: none;" class="divDeleteFile">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label><?= utf8_decode('&iquest;Est&aacute; seguro que desea eliminar el archivo seleccionado?') ?></label>
                                            <button type="button" id="confirmDeleteFile" style="font-size: 14px; text-align: center; background-color: #1c4056; border-radius: 10px; width: 25px; width: 145px; color: #ffffff;">Eliminar</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php
                        }?>
                        

                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            <br />
                            <div style="display: none;" class="loadingFilesContent">Cargando...</div>
                            <div style="display: none;" id="tablaFilesContent">
                                <table id='tableFilesContent' class='table table-striped' style='font-size: 12px;'>
                                    <thead>
                                        <tr>
                                            <!-- <th><input type="checkbox" name="selectAllFiles" class="selectAllFiles" id="selectAllFiles" /></th> -->
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Tamaño</th>
                                            <th>Tipo</th>
                                            <th>Modificado</th>
                                            <th>Permisos</th>
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

        <script src="<?= $url_raiz; ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?= $url_raiz; ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./js/datatables.min.js" type="text/javascript"></script>
        <script src="./js/fileManagement.js" type="text/javascript"></script>

    </body>
</HTML>
