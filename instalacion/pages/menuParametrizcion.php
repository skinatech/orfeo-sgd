<?php
error_reporting(0);
session_start();
$ruta_raiz = "..";
include "/var/www/conf-orfeo/config.php";
include_once "/var/www/conf-orfeo/include/db/ConnectionHandler.php";
$db = new ConnectionHandler($ruta_raiz);
if (isset($krd)) {
    ?>
    <html>
        <head>
            <link href="../estilos/orfeo50/bootstrap.css" rel="stylesheet" type="text/css"/>
            <link rel="stylesheet" href="<?= $ruta_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        </head>
        <body>
            <?php
            $sqlRadicados = 'select count(*) from sgd_trad_tiporad';
            $rsRadicados = $db->query($sqlRadicados);
            $sqlDependencias = 'select count(*) from dependencia';
            $rsDependencias = $db->query($sqlDependencias);
            $sqlUsuarios = 'select count(*) from usuario';
            $rsUsuarios = $db->query($sqlUsuarios);
            $sqlTipodocumental = 'select count(*) from sgd_tpr_tpdcumento';
            $rsTipodocumental = $db->query($sqlTipodocumental);
            $sqlSeries = 'select count(*) from sgd_srd_seriesrd';
            $rsSeries = $db->query($sqlSeries);
            $sqlSubserie = 'select count(*) from sgd_sbrd_subserierd';
            $rsSubserie = $db->query($sqlSubserie);
            ?>
            <div style="margin: 3px; height: 79%;" >
                <div class="panel-default panel col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="row" style="height: 331px;width: 97%;">
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12" id="menuPara">
                            <h3>Módulo de Parametrización</h3>
                            <a href="../Administracion/usuario/menuPerfil.php?krd=<?= $krd ?>" target='mainFrame'>Perfiles</a><br>
                            <a href="../Administracion/tbasicas/adm_trad.php?krd=<?= $krd ?>" target='mainFrame'>1. Tipos de radicaci&oacute;n</a>
                            <?php
                            if ($rsRadicados->fields["COUNT"] > 1) {
                                echo '<br><a href="../Administracion/tbasicas/adm_dependencias.php?krd=<?= $krd ?>" target="mainFrame">2. Dependencias</a>';
                            }

                            if ($rsDependencias->fields["COUNT"] > 2) {
                                echo "<br><a href='../Administracion/usuario/crear.php?usModo=1&parame=1' target='mainFrame'>3. Creación de Usuario</a>";
                                if ($rsUsuarios->fields["COUNT"] > 2) {
                                    echo "<br><a href='../Administracion/usuario/cuerpoEdicion.php?usModo=2' target='mainFrame'>3-1. Editar Usuario</a>";
                                }
                                echo "<br><a href='../trd/admin_tipodoc.php?" . $phpsession . "&krd=" . $krd . "&krd=" . $krd . "&fechah=" . $fechah . "' target='mainFrame'>4. Tipos documentales </a>";
                            }

                            if ($rsTipodocumental->fields["COUNT"] > 1) {
                                echo "<br><a href='../trd/admin_series.php?" . $phpsession . "&krd=" . $krd . "&krd=" . $krd . "&fechah=" . $fechah . "' target='mainFrame'>5. Series </a>";
                            }

                            if ($rsSeries->fields["COUNT"] > 0) {
                                echo "<br><a href='../trd/admin_subseries.php?" . $phpsession . "&krd=" . $krd . "&krd=" . $krd . "&fechah=" . $fechah . "' target='mainFrame'>6. Subseries </a>";
                            }

                            if ($rsTipodocumental->fields["COUNT"] > 0 && $rsSeries->fields["COUNT"] > 0 && $rsSubserie->fields["COUNT"] > 0) {
                                echo "<br><a href='../trd/cuerpoMatriTRD.php?" . $phpsession . "&krd=" . $krd . "&krd=" . $krd . "&fechah=" . $fechah . "' target='mainFrame'>7. Matriz relaci&oacute;n </a>";
                                echo "<br><a href='../trd/procModTrdArea.php?" . $phpseloginssion . "&krd=" . $krd . "&krd=" . $krd . "&fechah=" . $fechah . "' target='mainFrame'>8. Asignación TRD Área </a>";
                                echo "<br><a href='../trd/informe_trd.php?" . $phpsession . "&krd=" . $krd . "&krd=" . $krd . "&fechah=" . $fechah . "' target='mainFrame'>Ver TRD's</a>";
                               // echo "<br><a href='borrarparametrizacion.php' target='mainFrame'>Borrar TRD's Masiva</a>";
                            }
                            ?>
                            <!--<br><a href="cargarcsv.php" target='mainFrame'>Parametrización Masiva</a>
                            <br><a href="tbasicas/adm_fenvios.php" target='mainFrame'>Generación de PDF</a> <br>-->
                            <br><a href="destruccion_session.php">Cerrar sesion</a>
                        </div><br>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <iframe  class="iframeclass" id='mainFrame' src="mensaje.php?msn=1" name="mainFrame" style="width: 175%; border: aliceblue;height: 377px;margin-left: 8%;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
    <?php
} else {
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://192.168.8.74/conf-orfeo/instalacion/pages/login_parametrizacion.php">';
}
?>
