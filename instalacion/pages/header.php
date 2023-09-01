<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Configurador Orfeo</title>
        <!--<meta name="viewport" content="width=device-width, initial-scale=1,  maximum-scale=1, user-scalable=si">-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <!-- Aqui cargo las opciones de validacion-->
        <script src="js/modernizr.js" type="text/javascript"></script>
        <!-- <link rel='stylesheet prefetch' href='../css/bootstrap.min.css'>-->
        <link rel='stylesheet prefetch' href="css/bootstrap-theme.css">
        <link rel='stylesheet prefetch' href="css/bootstrapValidator.css">
        <link rel="stylesheet" href="css/validate_style.css">
        <!--FORMULARIO-->
        <!-- Aqui finalizo el cargo de opciones... -->
        <style>body{padding-top:30px;}</style>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                          <!--<span class="sr-only">Toggle navigation</span>-->
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Skina Tech</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <!--<li class="<?php //echo $pagina == 'inicio'?'active':'';    ?>"><a href="?p=inicio">Inicio</a></li>-->
                           <!-- <li class="<?php //echo $pagina == 'vertical' ? 'active' : ''; ?>"><a href="?p=vertical">Config</a></li>-->
                            <li class="<?php echo $pagina == 'iniciaconfig' ? 'active' : ''; ?>"><a href="?p=iniciaconfig">Config</a></li>
                            <li class="<?php echo $pagina == 'subirarchivos' ? 'active' : ''; ?>"><a href="?p=subirarchivos">Subir Archivos</a></li>
                            <li class="<?php echo $pagina == 'parametrizar' ? 'active' : ''; ?>"><a href="?p=parametrizar">Parametrizar</a></li>
                            <li class="<?php echo $pagina == 'generatepdf' ? 'active' : ''; ?>"><a href="?p=generatepdf">Generar PDF</a></li>
                            <li class="<?php echo $pagina == 'menuParametrizcion' ? 'active' : ''; ?>"><a href="?p=menuParametrizcion">Parametrizar ORFEO</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
      <!--  </div>
    </body>
</html>-->
