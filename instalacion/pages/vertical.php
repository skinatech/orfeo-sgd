<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?
//include_once 'db/configRoot.php';
include_once '../config.php';
//include_once '/conexion.php';
include_once '../functions/funciones.php';
//CONFIGURAR config.php
function recConfigOrfeo() {
    //if data has been posted update config file
    //$archivo_configurador = (ROOT_PATH.'db/config.php');
    $fname = "/var/www/conf-orfeo/config.php"; //name/path of config file
    chmod($fname, 0777);
    $fhandle = fopen($fname, "r"); //Open for reading only place the file pointer at the beginning of the file.
    $content = fread($fhandle, filesize($fname)); //Read from file pointer onwards
    //Remove unwanted elements
    $find = array('<?php', '?>', ';', ' ', '"', '\n');
    $replace = array("");
    $data = str_replace($find, $replace, $content);

    //Creamos el arreglo con las variables que vamos a traer
    $array = preg_split("/[$=]/", $data);
    array_shift($array); //remove empty first array
    //use odd key value in array1 as key in array2
    foreach (array_chunk($array, 2) as $pair) {
        list($key, $value) = $pair;
        $assoc[$key] = $value;
    }
    //Cambiamos el arreglo con los nuevos valores
    $string = "<?php \n" .
            "/* \n" .
            "* webConfigurator Skina Technologies\n" .
            "* version: 0.0.1\n" .
            "* Author: Carlos A Martinez cmartinez@skinatech.com\n" .
            "* Revisado: Ing Jenny Gamez\n" .
            "*\n" .
            "* Copyright (c) 2017. Skina Technologies\n" .
            "* Bajo licencia MIT.\n" .
            "*/ \n";
    foreach ($assoc as $key => $value):

        if ($assoc[$key] != $_POST[$key]) {
            $string .= '$' . $key . ' = "' . trim($_POST[$key]) . '";' . "\n";
        } else {
            $string .= '$' . $key . ' = "' . trim($value) . '";' . "\n";
        }

    endforeach;
    $string .= "?>";

    //write to file
    $fhandle = fopen($fname, "w");
    fwrite($fhandle, $string);
    fclose($fhandle);
    //header("Location: " . $_SERVER['PHP_SELF']); //reload page to get new form values
}
if (isset($_POST['creaConfigOrfeo'])) {

    if (conexionInicial($_POST['servidor'], $_POST['userRoot'], $_POST['passRoot'], $_POST['port']) == true) {
        echo '<div class="alert alert-success" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Éxito!</strong> LOS DATOS SUMINISTRADOS SON CORRECTOS : Host = ' . $_POST['servidor'] . ', Usuario = ' . $_POST['userRoot'] . ', Contraseña = ' . $_POST['passRoot'] . ', Puerto = ' . $_POST['port'];
        echo '</div>';
        recConfigOrfeo();
        createDatabases();
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Precaucion!</strong> NO ME CONECTE, REVISE SUS DATOS DE CONEXION : Host = ' . $_POST['servidor'] . ', Usuario = ' . $_POST['userRoot'] . ', Contraseña = ' . $_POST['passRoot'] . ', Puerto = ' . $_POST['port'];
        echo '</div>';
        //echo '<script language="javascript">alert("NO SE CONECTO");</script>';
    }
}



?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>jQeury.steps Demos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/jquery.steps.css">
        <script src="lib/modernizr-2.6.2.min.js"></script>
        <script src="lib/jquery-1.9.1.min.js"></script>
        <script src="lib/jquery.cookie-1.3.1.js"></script>
        <script src="build/jquery.steps.js"></script>




    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="content">
            <h1>Datos configuración</h1>

            <script>
                $(function ()
                {
                    $("#wizard").steps({
                        headerTag: "h2",
                        bodyTag: "section",
                        transitionEffect: "slideLeft",
	                stepsOrientation: "vertical"
                    });
                });



            </script>

    <form class="form-horizontal" role="form" method="POST" name="configRoot" id="configRoot">
        <div class="container">
            <div class="col-lg-12">
                <br>

            <div id="wizard">
                <h2>Configurar Motor</h2>

                <section>
		<div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                        <label class="col-md-12 control-label">Motor base de datos :</label>
                        <div class="col-md-12 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <select name="driver" class="form-control" id="driver"  placeholder="Postgresql" value="<?php echo $driver; ?>">
                                    <option value="postgres">Postgresql</option>
                                    <option value="mysql">MySql</option>
                                    <option value="oci8">Oracle</option>

                                </select>
                            </div>
                        </div>
                    </div>

<div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-9 control-label">Puerto BD :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <input name="port"  type="number"  class="form-control" id="port" placeholder="5432"  value="<?php echo $port; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-10 control-label">Servidor Orfeo :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <input name="servidor" type="text" class="form-control" id="servidor" placeholder="Localhost"  value="<?php echo $servidor; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- Aqui configuramos el usuario que realiza la conexion, en distribucion skina se usa postgres o admin -->
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Usuario conexión :</label>
                        <div class="col-md-12 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <select name="userRoot" class="form-control" id="userRoot">
                                    <option value="postgres">Postgres</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Contraseña conexión :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <input name="passRoot" type="password" class="form-control" id="passRoot" placeholder="Contraseña"  value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Confirmar contraseña :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <input name="confirm" type="password" class="form-control" id="confirm" placeholder="Contraseña"  value="">
                            </div>
                        </div>
                    </div>


                </section>

                <h2>Configurar Compañia</h2>
                <section>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-6 control-label">Entidad :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                                <input name="entidad" type="text" class="form-control" id="entidad" placeholder="Skina Tech"  value="<?php echo $entidad; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-9 control-label">Entidad Largo :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                                <input name="entidad_largo" type="text" class="form-control" id="entidad_largo" placeholder="Skina Technologies"  value="<?php echo $entidad_largo; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-9 control-label">Nit Entidad :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                                <input name="nit_entidad" type="text" class="form-control" id="nit_entidad" placeholder="000000"  value="<?php echo $nit_entidad; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-9 control-label">Teléfono :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input name="entidad_tel" type="tel" class="form-control" id="entidad_tel" placeholder="226208"  value="<?php echo $entidad_tel; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-10 control-label">Entidad contacto :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input name="entidad_contacto" type="tel" class="form-control" id="entidad_contacto" placeholder="http://www.skinatech.com/contactenos"  value="<?php echo $entidad_contacto; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Administrador :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="administrador" type="email" class="form-control" id="administrador" placeholder="pruebas@skinatech.com"  value = "<?php echo $administrador; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-9 control-label">Dirección :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="entidad_dir" type="text" class="form-control" id="entidad_dir" placeholder="Cr 64 # 96 -17 Bogotá - Colombia"  value="<?php echo $entidad_dir; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-8 control-label">Pais :</label>
                        <div class="col-md-12 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <select name="pais" class="form-control" id="pais">
                                    <?php
                                    if ($pais == 'colombia') {
                                        $paisc = 'selected';
                                    } else {
                                        $paisv = 'selected';
                                    }
                                    ?>
                                    <option value="colombia" <?= $paisc ?>>Colombia</option>
                                    <option value="venezuela" <?= $paisv ?>>Venezuela</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </section>

                <h2>Configurar BD</h2>
                <section>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-8 control-label">Nombre BD:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <input name="servicio" type="text" class="form-control" id="servicio" placeholder="Orfeo"  value="<?php echo $servicio; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-8 control-label">Usuario:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="usuario" type="text" class="form-control" id="usuario" placeholder="Orfeo"  value="<?php echo $usuario; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-10 control-label">Contraseña:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input name="contrasena" type="password" class="form-control" id="contrasena" placeholder="Contraseña"  value="<?php echo $contrasena; ?>">
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Confirmar contraseña:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input name="contrasena" type="password" class="form-control" id="contrasena" placeholder="Contraseña"  value="<?php echo $contrasena; ?>">
                            </div>
                        </div>
                    </div>

                </section>

                <h2>Configurar Email</h2>
                <section>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-10 control-label">Servidor EMAIL:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="servidor_mail" type="text" class="form-control" id="servidor_mail" placeholder="localhost"  value="<?php echo $servidor_mail; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-10 control-label">Protocolo Email:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="protocolo_mail" type="text" class="form-control" id="protocolo_mail" placeholder="imaps"  value="<?php echo $protocolo_mail; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-10 control-label">Puerto Email:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="puerto_mail" type="number"   class="form-control" id="puerto_mail" placeholder="993"  value="<?php echo $puerto_mail; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Servidor EMAIL SMTP:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphiocon glyphicon-home"></i></span>
                                <input name="servidor_mail_smtp" type="text"  class="form-control" id="servidor_mail_smtp" placeholder="smtp.gmail.com"  value="<?php echo $servidor_mail_smtp; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Puerto EMAIL SMTP:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="puerto_mail_smtp" type="number" class="form-control" id="puerto_mail_smtp" placeholder="587"  value="<?php echo $puerto_mail_smtp; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-10 control-label">Cuenta Email:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="cuenta_mail" type="email" class="form-control" id="cuenta_mail" placeholder="skina@gmail.com"  value="<?php echo $cuenta_mail; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Contraseña Email:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="contrasena_mail" type="password" class="form-control" id="contrasena_mail" placeholder="contraseña"  value="<?php echo $contrasena_mail; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Confirmar contraseña:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="contrasena_mail" type="password" class="form-control" id="contrasena_mail" placeholder="contraseña"  value="<?php echo $contrasena_mail; ?>">
                            </div>
                        </div>
                    </div>



                </section>

		<h2>Configurar LDAP</h2>
		<section>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Servidor LDAP:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="ldapServer" type="text" class="form-control" id="ldapServer" placeholder="localhost"  value="<?php echo $ldapServer; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Cadena busq LDAP:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="cadenaBusqLDAP" type="text" class="form-control" id="cadenaBusqLDAP" placeholder="co=co, com=com"  value="<?php echo $cadenaBusqLDAP; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Campo busq LDAP:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="campoBusqLDAP" type="text" class="form-control" id="campoBusqLDAP" placeholder="co=co, com=com"  value="<?php echo $campoBusqLDAP; ?>">
                            </div>
                        </div>
                    </div>

		</section>


		<h2>Configurar ORFEO</h2>
		<section>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Ambiente:</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                                <input name="ambiente" type="text" class="form-control" id="ambiente" placeholder="pruebas"  value="<?php echo $ambiente; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Logo superior Orfeo :</label>
                        <div class="col-md-12 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <select name="logoSuperiorOrfeo" class="form-control" id="logoSuperiorOrfeo">
                                    <?php
                                    if ($logoSuperiorOrfeo == '0') {
                                        $logoSuperiorOrfeoN = 'selected';
                                    } else {
                                        $logoSuperiorOrfeoS;
                                    }
                                    ?>
                                    <option value="0" <?php $logoSuperiorOrfeoN ?>>No</option>
                                    <option value="1" <?php $logoSuperiorOrfeoS ?>>Si</option>
                                </select>
                            </div>
                        </div>
                    </div>

                   <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Largo dependencia :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="longitud_codigo_dependencia" type="text" class="form-control" id="longitud_codigo_dependencia" placeholder="4"  value = "<?php echo $longitud_codigo_dependencia; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Tipo radicado PQR :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="tipoRadicadoPqr" type="text" class="form-control" id="tipoRadicadoPqr" placeholder="4"  value = "<?php echo $tipoRadicadoPqr; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Dependencia salida :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="entidad_depsal" type="text" class="form-control" id="entidad_depsal" placeholder="999"  value="<?php echo $entidad_depsal; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Dependencia pruebas :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="dependenciaPruebas" type="text" class="form-control" id="dependenciaPruebas" placeholder="0998"  value = "<?php echo $dependenciaPruebas; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Dependencia WEB :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="depeRadicaFormularioWeb" type="text" class="form-control" id="depeRadicaFormularioWeb" placeholder="0998"  value = "<?php echo $depeRadicaFormularioWeb; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Usuario recibe WEB :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="usuaRecibeWeb" type="text" class="form-control" id="usuaRecibeWeb" placeholder="1"  value = "<?php echo $usuaRecibeWeb; ?>">
                            </div>
                        </div>
                    </div>




                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-10 control-label">Sec rad WEB :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="secRadicaFormularioWeb" type="text" class="form-control" id="secRadicaFormularioWeb" placeholder="secr_tp4_0998"  value = "<?php echo $secRadicaFormularioWeb; ?>">
                            </div>
                        </div>
                    </div>


		</section>


		<h2>Cosas ocultar</h2>
		<section>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">ADODB PATH :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="ADODB_PATH" type="text" class="form-control" id="ADODB_PATH" placeholder="/var/hmtl/orfeo/adodb"  value="<?php echo $ADODB_PATH; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">ADODB CACHE DIR :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="ADODB_CACHE_DIR" type="text" class="form-control" id="ADODB_CACHE_DIR" placeholder="/tmp"  value="<?php echo $ADODB_CACHE_DIR; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">PEAR PATH :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="PEAR_PATH" type="text" class="form-control" id="PEAR_PATH" placeholder="/var/html/orfeo"  value="<?php echo $PEAR_PATH; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Estilos Path :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="ESTILOS_PATH" type="text" class="form-control" id="ESTILOS_PATH" placeholder="/estilos/orfeo38/"  value = "<?php echo $ESTILOS_PATH; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Estilos Path 2 :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="ESTILOS_PATH2" type="text" class="form-control" id="ESTILOS_PATH2" placeholder="/estilos/orfeo50/"  value = "<?php echo $ESTILOS_PATH2; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Estilos Path Orfeo :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="ESTILOS_PATH_ORFEO" type="text" class="form-control" id="ESTILOS_PATH_ORFEO" placeholder="/estilos/orfeo.css"  value = "<?php echo $ESTILOS_PATH_ORFEO; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-8 control-label">Imagenes :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="imagenes" type="text" class="form-control" id="imagenes" placeholder="imagenes"  value = "<?php echo $imagenes; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-8 control-label">Imagenes2 :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="imagenes2" type="text" class="form-control" id="imagenes2" placeholder="/estilos/orfeo50/imagenes50/"  value = "<?php echo $imagenes2; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-8 control-label">Color fondo :</label>
                        <div class="col-md-12 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <select name="colorFondo" class="form-control" id="colorFondo">
                                    <?php
                                    if ($colorFondo = '8cacc1') {
                                        $colorFondo1 = 'selected';
                                    } else {
                                        $colorFondo2 = 'selected';
                                    }
                                    ?>
                                    <option value="8cacc1" <?php $colorFondo1 ?>>8cacc1</option>
                                    <option value="043c60" <?php $colorFondo2 ?>>043c60</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Serv documentos :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                                <input name="servProcDocs" type="text" class="form-control" id="servProcDocs" placeholder="127.0.0.1:8000"  value="<?php echo $servProcDocs; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Radica doc anexos :</label>
                        <div class="col-md-12 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <select name="MODULO_RADICACION_DOCS_ANEXOS" class="form-control" id="MODULO_RADICACION_DOCS_ANEXOS">
                                    <?php
                                    if ($MODULO_RADICACION_DOCS_ANEXOS == '0') {
                                        $MODULO_RADICACION_DOCS_ANEXOSN = 'selected';
                                    } else {
                                        $MODULO_RADICACION_DOCS_ANEXOSS = 'selected';
                                    }
                                    ?>
                                    <option value="0" <?php $MODULO_RADICACION_DOCS_ANEXOSN ?>>No</option>
                                    <option value="1" <?php $MODULO_RADICACION_DOCS_ANEXOSS ?>>Si</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Modulo envios :</label>
                        <div class="col-md-12 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <select name="MODULO_ENVIOS" class="form-control" id="MODULO_ENVIOS">
                                    <?php
                                    if ($MODULO_ENVIOS == '0') {
                                        $MODULO_ENVIOSN = 'selected';
                                    } else {
                                        $MODULO_ENVIOSS = 'selected';
                                    }
                                    ?>
                                    <option value="0" <?php $MODULO_ENVIOSN ?>>No</option>
                                    <option value="1" <?php $MODULO_ENVIOSS ?>>Si</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Menu adicional :</label>
                        <div class="col-md-12 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <select name="menuAdicional" class="form-control" id="menuAdcional">
                                    <?php
                                    if ($menuAdicional = '0') {
                                        $menuAdicionalNo = 'selected';
                                    } else {
                                        $menuAdicionalSi = 'selected';
                                    }
                                    ?>
                                    <option value="No" <?php $menuAdicionalNo ?>>No</option>
                                    <option value="Si" <?php $menuAdicionalSi ?>>Si</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-12 control-label">Permisos avanzados :</label>
                        <div class="col-md-12 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <select name="usua_perm_avaz" class="form-control" id="usua_perm_avaz">
                                    <?php
                                    if ($usua_perm_avaz = '0') {
                                        $usua_perm_avazNo = 'selected';
                                    } else {
                                        $usua_perm_avazSi = 'selected';
                                    }
                                    ?>
                                    <option value="No" <?php $usua_perm_avazNo ?>>No</option>
                                    <option value="Si" <?php $usua_perm_avazSi ?>>Si</option>
                                </select>
                            </div>
                        </div>
                    </div>





<!--BOTON GUARDAR-->
<div class="form-group col-xs-10 col-sm-12 col-md-12 col-lg-12">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-8">
                        <button type="submit" name="creaConfigOrfeo" class="btn btn-warning" >GUARDAR DATOS OREO<span class="glyphicon glyphicon-certificate"></span></button>
                    </div>

<!--FIN BOTON GUARDAR-->



		</section>

<!--FIN FORMULARIO-->
            </div>
        </div>
    </body>
</html>
