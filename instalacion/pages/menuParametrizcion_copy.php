<?php
error_reporting(0);
session_start();
echo 'si <br>';
$ruta_raiz = "../..";
include "$ruta_raiz/config.php";
echo 'si 2 <br>';
include_once "$ruta_raiz/include/db/ConnectionHandler.php";
echo 'si 3 <br>';
//$db = new ConnectionHandler("$ruta_raiz");
echo '-----> <br>';
if (isset($krd)) {
echo 'entro ';
    ?>
    <html>
        <head>
            <link href="../estilos/orfeo50/bootstrap.css" rel="stylesheet" type="text/css"/>
            <link rel="stylesheet" href="<?= $ruta_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    <!--        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
            <script type="text/javascript">
                function actualiza_contenido() {
                    var url = location.href;
                    $("#menuPara").load(url);
                }
                setInterval("actualiza_contenido()", 3000);
            </script>-->
        </head>
        <body>
            <?php
            $sqlRadicados = 'select count(*) from sgd_trad_tiporad';
            $rsRadicados = pg_query($sqlRadicados)or die('La consulta fallo: ' . pg_last_error());
            while ($row = pg_fetch_array($rsRadicados)) {
                $coun_tipo = $row["count"];
		echo '-----> '.$coun_tipo.'<br>';
            }

            $sqlDependencias = 'select count(*) from dependencia';
            $rsDependencias = pg_query($sqlDependencias);
            while ($rowdepe = pg_fetch_array($rsDependencias)) {
                $coun_depe = $rowdepe["count"];
            }

            $sqlUsuarios = 'select count(*) from usuario';
            $rsUsuarios = pg_query($sqlUsuarios);
            while ($rowusua = pg_fetch_array($rsUsuarios)) {
                $coun_usua = $rowusua["count"];
            }

            $sqlTipodocumental = 'select count(*) from sgd_tpr_tpdcumento';
            $rsTipodocumental = pg_query($sqlTipodocumental);
            while ($rowtipodoc = pg_fetch_array($rsTipodocumental)) {
                $coun_tipodoc = $rowtipodoc["count"];
            }

            $sqlSeries = 'select count(*) from sgd_srd_seriesrd';
            $rsSeries = pg_query($sqlSeries);
            while ($rowserie = pg_fetch_array($rsSeries)) {
                $coun_serie = $rowserie["count"];
            }

            $sqlSubserie = 'select count(*) from sgd_sbrd_subserierd';
            $rsSubserie = pg_query($sqlSubserie);
            while ($rowsubse = pg_fetch_array($rsSubserie)) {
                $coun_subse = $rowsubse["count"];
            }
	    ?>
            <div style="margin: 3px; height: 79%;" >
                <div class="panel-default panel col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12" id="menuPara">
                            <h3>Módulo de Parametrización</h3>
                            <a href="../Administracion/usuario/menuPerfil.php?krd=<?= $krd ?>" target='mainFrame'>Perfiles</a><br>
                            <a href="../Administracion/tbasicas/adm_trad.php?krd=<?= $krd ?>" target='mainFrame'>1. Tipos de radicaci&oacute;n</a>
                            <?php
			    echo '-----> '.$sqlRadicados.'<br>';
                            if ($coun_tipo > 1) {
                                echo '<br><a href="../Administracion/tbasicas/adm_dependencias.php?krd=<?= $krd ?>" target="mainFrame">2. Dependencias</a>';
                            }

                            if ($coun_depe > 2) {
                                echo "<br><a href='../Administracion/usuario/crear.php?usModo=1&parame=1' target='mainFrame'>3. Creación de Usuario</a>";
                                if ($coun_usua > 2) {
                                    echo "<br><a href='../Administracion/usuario/cuerpoEdicion.php?usModo=2' target='mainFrame'>3-1. Editar Usuario</a>";
                                }
                                echo "<br><a href='../trd/admin_tipodoc.php?" . $phpsession . "&krd=" . $krd . "&krd=" . $krd . "&fechah=" . $fechah . "' target='mainFrame'>4. Tipos documentales </a>";
                            }

                            if ($coun_tipodoc > 1) {
                                echo "<br><a href='../trd/admin_series.php?" . $phpsession . "&krd=" . $krd . "&krd=" . $krd . "&fechah=" . $fechah . "' target='mainFrame'>5. Series </a>";
                            }

                            if ($coun_serie > 0) {
                                echo "<br><a href='../trd/admin_subseries.php?" . $phpsession . "&krd=" . $krd . "&krd=" . $krd . "&fechah=" . $fechah . "' target='mainFrame'>6. Subseries </a>";
                            }

                            if ($coun_tipodoc > 0 && $coun_serie > 0 && $coun_subse > 0) {
                                echo "<br><a href='../trd/cuerpoMatriTRD.php?" . $phpsession . "&krd=" . $krd . "&krd=" . $krd . "&fechah=" . $fechah . "' target='mainFrame'>7. Matriz relaci&oacute;n </a>";
                                echo "<br><a href='../trd/procModTrdArea.php?" . $phpseloginssion . "&krd=" . $krd . "&krd=" . $krd . "&fechah=" . $fechah . "' target='mainFrame'>8. Asignación TRD Área </a>";
                                echo "<br><a href='../trd/informe_trd.php?" . $phpsession . "&krd=" . $krd . "&krd=" . $krd . "&fechah=" . $fechah . "' target='mainFrame'>Ver TRD's</a>";
                               // echo "<br><a href='borrarparametrizacion.php' target='mainFrame'>Borrar TRD's Masiva</a>";
                            }
                            ?>
                            <!--<br><a href="cargarcsv.php" target='mainFrame'>Parametrización Masiva</a>
                            <br><a href="tbasicas/adm_fenvios.php" target='mainFrame'>Generación de PDF</a> <br>-->
                            <a href="destruccion_session.php">Cerrar sesion</a>
                        </div><br>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <iframe  class="iframeclass" id='mainFrame' src="mensaje.php?msn=1" name="mainFrame" style="width: 170%; border: aliceblue;height: 120%;"></iframe>
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
