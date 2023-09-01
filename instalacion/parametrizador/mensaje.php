<?php
error_reporting(0);
session_start();
?>
<html>
    <head>
        <link href="../estilos/orfeo50/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $ruta_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <style>
            #text{
                border-radius: 17px 17px 17px 17px;
                -moz-border-radius: 17px 17px 17px 17px;
                -webkit-border-radius: 17px 17px 17px 17px;
                border: 1px solid #000000;
            }
        </style>
        <script>
            $("#menuPara").load("menuParametrizcion.php");
        </script>
    </head>
    <body>
        <?php
        if ($_GET['msn'] == 1) {
            $ms = "Desde este modulo se puede ingresar toda la parametrización relacionada con un cliente nuevo,
                el sistema no tiene habilitado todas las opciones de una vez al cargar el menú, a medida que se va 
                ingresando la información se iran habilitando las demas opciones.<br><br>

                De igual forma se puede cargar desde este mismo modulo, cada uno de los archivos .csv que son 
                recolectados en la fase 0 o entregados por el gestor documental.<br><br>

                Al terminar la parametrización debe hacer clic en la opción Destruir Sesion.";
        } elseif ($_GET['msn'] == 2) {
            $ms = "Se cargo la parametrización de forma correcta: <br>"
                    . "----> Dependencias <br>"
                    . "----> Series <br>"
                    . "----> Subseries <br>"
                    . "----> Tipos documentales";
        } elseif ($_GET['msn'] == 3) {
            $ms = "Se limpio la parametrización de forma correcta: <br>"
                    . "----> Dependencias <br>"
                    . "----> Series <br>"
                    . "----> Subseries <br>"
                    . "----> Tipos documentales";
        }
        ?>
        <div class="jumbotron" id="text">
            <p style="font-size: 18px; margin-left: 5%; margin-right: 5%; text-align: justify;">
                <?= $ms ?>
            </p>
        </div>
    </body>
</html>
