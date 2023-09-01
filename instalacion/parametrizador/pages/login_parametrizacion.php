<?php
if (isset($_POST["krd"]))
    $krd = $_POST["krd"];

if (isset($_POST["drd"]))
    $drd = $_POST["drd"];
if (isset($_POST["autenticaPorLDAP"]))
    $autenticaPorLDAP = $_POST["autenticaPorLDAP"];
$fechah = date("dmy") . "_" . time();

$ruta_raiz = "../..";
error_reporting('E_ALL');
include_once("$ruta_raiz/config.php");
$serv = str_replace(".", ".", $_SERVER['REMOTE_ADDR']);

if ($krd) {
    include "$ruta_raiz/session_orfeo.php";
    require_once("$ruta_raiz/class_control/Mensaje.php");
    //$db->conn->debug = true;

    if ($usua_nuevo == 0) {
        include("$ruta_raiz/contraxx.php");
        $ValidacionKrd = "NOOOO";
        if ($j = 1)
            die("<center> -- </center>");
    }
}
$krd = strtoupper($krd);
$datosEnvio = "$fechah&" . session_name() . "=" . trim(session_id()) . "&krd=$krd&swLog=1";
?>
<html>
    <head>
       <!-- <link href="../../estilos/orfeo50/bootstrap.css" rel="stylesheet" type="text/css"/>-->
        <link rel="stylesheet" href="<?= $ruta_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <link href="../../estilos/orfeo50/estilos.css" rel="stylesheet" type="text/css"/>
        <script>
            function loginTrue() {
                document.formulario.submit();
            }
        </script>
    </head>
    <body>
<div class="container">
	<div class="login-container">
            <div class="form-box">
        <form name="formulario" action="http://192.168.8.74/conf-orfeo/instalacion/?p=menuParametrizcion" method="POST">
            <input type="hidden" name="orno" value="1">
            <?php
            if ($ValidacionKrd == "Si") {
                ?>
                <script>
                    loginTrue();
                </script>
                <?php
            }
            ?>
            <input type="hidden" name="ornot" value="1">
        </form>
        <form action="login_parametrizacion.php" method="POST">
           <!-- <div style="margin: 3px; height: 79%; margin-left: 27%;" >-->
                <center>
                    <div class="panel-default panel col-lg-6 col-md-6 col-sm-12 col-xs-12" ><br><br>
                        Usuario: <input type="text" name="krd" size="23" required="required"/><br><br>
                        Contraseña: <input type="password" name="drd" required="required"/><br><br>
                        <input type="submit" name="login" value="Ingresar"/><br><br><br>
                    </div>
                </center>
            <!--</div>-->
        </form>
</div>
        </div>  
</div>
    </body>
</html>
