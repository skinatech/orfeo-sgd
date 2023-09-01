<?php
$ambiente ='orfeo-6.0';
include_once dirname(__DIR__) . '/db/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/'.$ambiente.'/config.php';
include_once (dirname(__DIR__) . '/functions/funciones.php');

//CONFIGURAR config.php
function recConfigOrfeo() {
    //$archivo_configurador = (ROOT_PATH.'db/config.php');
    $fname = $_SERVER['DOCUMENT_ROOT']."/".$ambiente."/config.php"; //name/path of config file
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
    }
}
?>
<head>
</head>
<body>
    <!--FORM CONFIG Y ROOT, LO USO PARA CARGAR LOS DATOS AL ARCHIVO CONFIGURACION CONEXION Y ORFEO-->
    <form class="form-horizontal" role="form" method="POST" name="configRoot" id="configRoot">
        <div class="container">
            <fieldset>
                <legend>Datos requeridos para conectarnos al motor de BD.</legend>
                <div class="row">
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" >
                        <label class="col-md-9 control-label">Motor base de datos :</label>
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
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-9 control-label">Puerto Base de Datos  :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <input name="port"  type="number"  class="form-control" id="port" placeholder="5432"  value="<?php echo $port; ?>" onkeypress="return isNumberKey2(event)">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-8 control-label">Servidor Orfeo :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <input name="servidor" type="text" class="form-control" id="servidor" placeholder="Localhost"  value="localhost">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Aqui configuramos el usuario que realiza la conexion, en distribucion skina se usa postgres o admin -->
                <div class="row"> 
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-9 control-label">Usuario conexión :</label>
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
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-9 control-label">Contraseña conexión :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <input name="passRoot" type="password" class="form-control" id="passRoot" placeholder="Contraseña"  value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-9 control-label">Confirmar Contraseña :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <input name="passRootconfir" type="password" class="form-control" id="passRootconfir" placeholder="Contraseña" required  value="">
                            </div>
                            <span id='mensaje' style="display:none; color:red;">Las contraseñas no coinciden</span>
                        </div>
                    </div>
                </div>
                <legend>Datos de la empresa intalada.</legend>
                <div class="row">
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-6 control-label">Sigla :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                                <input name="entidad" type="text" class="form-control" id="entidad" placeholder="Skina Tech"  value="<?php echo $entidad; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-9 control-label">Razón Social :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                                <input name="entidad_largo" type="text" class="form-control" id="entidad_largo" placeholder="Skina Technologies"  value="<?php echo $entidad_largo; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-9 control-label">Número de Nit :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                                <input name="nit_entidad" type="text" class="form-control" id="nit_entidad" placeholder="000000"  value="<?php echo $nit_entidad; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-6 control-label">Teléfono :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input name="entidad_tel" type="tel" class="form-control" id="entidad_tel" placeholder="226208"  value="<?php echo $entidad_tel; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-10 control-label">Entidad contactó :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input name="entidad_contacto" type="tel" class="form-control" id="entidad_contacto" placeholder="http://www.skinatech.com/contactenos"  value="<?php echo $entidad_contacto; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                        <label class="col-md-6 control-label">Dirección :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="entidad_dir" type="text" class="form-control" id="entidad_dir" placeholder="Cr 64 # 96 -17 Bogotá - Colombia"  value="<?php echo $entidad_dir; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-8 control-label">País :</label>
                    <div class="col-md-12 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                            <select name="pais" class="form-control" id="pais">
                                <?php
                                if ($pais == 'colombia') {
                                    $paisc = 'selected';
                                } else if ($pais == 'venezuela') {
                                    $paisv = 'selected';
                                } else {
                                    $paisc = 'selected';
                                }
                                ?>
                                <option value="colombia" <?= $paisc ?>>Colombia</option>
                                <option value="venezuela" <?= $paisv ?>>Venezuela</option>
                            </select>
                        </div>
                    </div>
                </div>
                <legend>Creación base de datos.</legend>
                <div class="row">
                    <div class="form-group col-xs-10 col-sm-3 col-md-4 col-lg-3">
                        <label class="col-md-8 control-label">Servicio :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                <input name="servicio" type="text" class="form-control" id="servicio" placeholder="Orfeo"  value="<?php echo $servicio; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-3 col-md-4 col-lg-3">
                        <label class="col-md-8 control-label">Usuario :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="usuario" type="text" class="form-control" id="usuario" placeholder="Orfeo"  value="<?php echo $usuario; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
                        <label class="col-md-6 control-label">Contraseña :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input name="contrasena" type="password" class="form-control" id="contrasena" placeholder="Contraseña"  value="<?php echo $contrasena; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
                        <label class="col-md-10 control-label">Confirmar Contraseña :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input name="contrasenaConfir" type="password" class="form-control" id="contrasenaConfir" placeholder="Contraseña" required value="<?php echo $contrasena; ?>">
                            </div>
                            <span id='mensaje1' style="display:none; color:red;">Las contraseñas no coinciden</span>
                        </div>
                    </div>
                </div><br>
                <legend>Servidor de correo electrónico.</legend>
                <input type="radio" name="Radiocorreo" class="Radiocorreo" value="Si"><b> Si</b><br>
                <input type="radio" name="Radiocorreo" class="Radiocorreo" value="No"><b> No</b><br><br>
                <div class="row2" id="row">    
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4 correo" style="display:none;">
                        <label class="col-md-8 control-label">Servidor EMAIL :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="servidor_mail" type="text" class="form-control" id="servidor_mail" placeholder="localhost"  value="<?php echo $servidor_mail; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4 correo" style="display:none;">
                        <label class="col-md-8 control-label">Protocolo Email :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="protocolo_mail" type="text" class="form-control" id="protocolo_mail" placeholder="imaps"  value="<?php echo $protocolo_mail; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4 correo" style="display:none;">
                        <label class="col-md-8 control-label">Puerto Email :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="puerto_mail" type="number"   class="form-control" id="puerto_mail" placeholder="993"  value="<?php echo $puerto_mail; ?>" onkeypress="return isNumberKey2(event)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row2">
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4 correo" style="display:none;">
                        <label class="col-md-10 control-label">Servidor EMAIL SMTP :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="servidor_mail_smtp" type="text"  class="form-control" id="servidor_mail_smtp" placeholder="smtp.gmail.com"  value="<?php echo $servidor_mail_smtp; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4 correo" style="display:none;">
                        <label class="col-md-8 control-label">Puerto SMTP :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="puerto_mail_smtp" type="number" class="form-control" id="puerto_mail_smtp" placeholder="587"  value="<?php echo $puerto_mail_smtp; ?>" onkeypress="return isNumberKey2(event)">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4 correo" style="display:none;">
                        <label class="col-md-8 control-label">Cuenta Email :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="cuenta_mail" type="email" class="form-control" id="cuenta_mail" placeholder="skina@gmail.com"  value="<?php echo $cuenta_mail; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row2">
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4 correo" style="display:none;">
                        <label class="col-md-8 control-label">Contraseña Email :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="contrasena_mail" type="password" class="form-control" id="contrasena_mail" placeholder="contraseña"  value="<?php echo $contrasena_mail; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <legend>Servidor de autenticación LDAP.</legend>
                <input type="radio" name="Radioldap" class="Radioldap" value="Si"><b> Si</b><br>
                <input type="radio" name="Radioldap" class="Radioldap" value="No"><b> No</b><br><br>
                <div class="row2">
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4 ldap" style='display:none'>
                        <label class="col-md-10 control-label">Servidor LDAP :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="ldapServer" type="text" class="form-control" id="ldapServer" placeholder="localhost"  value="<?php echo $ldapServer; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4 ldap" style='display:none'>
                        <label class="col-md-10 control-label">Cadena busq LDAP :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="cadenaBusqLDAP" type="text" class="form-control" id="cadenaBusqLDAP" placeholder="co=co, com=com"  value="<?php echo $cadenaBusqLDAP; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4 ldap" style='display:none'>
                        <label class="col-md-10 control-label">Campo busqueda LDAP :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="campoBusqLDAP" type="text" class="form-control" id="campoBusqLDAP" placeholder="co=co, com=com"  value="<?php echo $campoBusqLDAP; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <legend style='display:none'>Librerias externas.</legend>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-9 control-label">ADODB PATH :</label>
                    <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="ADODB_PATH" type="text" class="form-control" id="ADODB_PATH" placeholder="/var/hmtl/orfeo/adodb"  value="/var/www/conf-orfeo/adodb">
                        </div>
                    </div>
                </div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-9 control-label">ADODB CACHE DIR :</label>
                    <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="ADODB_CACHE_DIR" type="text" class="form-control" id="ADODB_CACHE_DIR" placeholder="/tmp"  value="/tmp">
                        </div>
                    </div>i
                </div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-8 control-label">PEAR PATH :</label>
                    <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="PEAR_PATH" type="text" class="form-control" id="PEAR_PATH" placeholder="/var/html/orfeo"  value="/var/www/conf-orfeo/pear">
                        </div>
                    </div>
                </div>
                <legend>Configuración / Personalización Orfeo.</legend>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-8 control-label">Menu Adicional :</label>
                    <div class="col-md-12 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                            <select name="menuAdicional" class="form-control" id="menuAdicional"  placeholder="Postgresql">
                                <?php
                                if ($menuAdicional == '0') {
                                    $menuAdicionalN = 'selected';
                                } else {
                                    $menuAdicionalS = 'selected';
                                }
                                ?>
                                <option value"0" <?= $menuAdicionalN ?>>No</option>
                                <option value"1" <?= $menuAdicionalS ?>>Si</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-10 control-label">Usua perm avanzados :</label>
                    <div class="col-md-12 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                            <select name="usua_perm_avaz" class="form-control" id="usua_perm_avaz">
                                <?php
                                if ($usua_perm_avaz == '0') {
                                    $usua_perm_avazN = 'selected';
                                } else {
                                    $usua_perm_avazS = 'selected';
                                }
                                ?>
                                <option value="0" <?php $usua_perm_avazN ?>>No</option>
                                <option value="1" <?php $usua_perm_avazS ?>>Si</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-6 control-label">Ambiente :</label>
                    <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                            <input name="ambiente" type="text" class="form-control" id="ambiente" placeholder="pruebas"  value="conf-orfeo">
                        </div>
                    </div>
                </div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-9 control-label">Servidor de documentos :</label>
                    <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                            <input name="servProcDocs" type="text" class="form-control" id="servProcDocs" placeholder="127.0.0.1:8000"  value="localhost">
                        </div>
                    </div>
                </div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-10 control-label">Modulo rad doc anexos :</label>
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
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-10 control-label">Modulo envios :</label>
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
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
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
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-8 control-label">Estilos Path :</label>
                    <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="ESTILOS_PATH" type="text" class="form-control" id="ESTILOS_PATH" placeholder="/estilos/orfeo38/"  value = "/estilos/orfeo38/">
                        </div>
                    </div>
                </div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-8 control-label">Estilos Path 2 :</label>
                    <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="ESTILOS_PATH2" type="text" class="form-control" id="ESTILOS_PATH2" placeholder="/estilos/orfeo50/"  value = "/estilos/orfeo50/">
                        </div>
                    </div>
                </div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-8 control-label">Estilos Path Orfeo :</label>
                    <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="ESTILOS_PATH_ORFEO" type="text" class="form-control" id="ESTILOS_PATH_ORFEO" placeholder="/estilos/orfeo.css"  value = "/estilos/orfeo.css">
                        </div>
                    </div>
                </div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-8 control-label">Logo de Orfeo :</label>
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
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-8 control-label">Imagenes :</label>
                    <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="imagenes" type="text" class="form-control" id="imagenes" placeholder="imagenes"  value = "imagenes">
                        </div>
                    </div>
                </div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" style='display:none'>
                    <label class="col-md-8 control-label">Imagenes2 :</label>
                    <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="imagenes2" type="text" class="form-control" id="imagenes2" placeholder="/estilos/orfeo50/imagenes50/"  value = "/estilos/orfeo50/imagenes50/">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
                        <label class="col-md-8 control-label">Administrador :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="administrador" type="email" class="form-control" id="administrador" placeholder="pruebas@skinatech.com"  value = "<?php echo $administrador; ?>">
                            </div>
                        </div>
                    </div>                    
                    <div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
                        <label class="col-md-12 control-label">Largo código dependencia :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <!--<input name="longitud_codigo_dependencia" type="text" class="form-control" id="longitud_codigo_dependencia" placeholder="4"  value = "<?php //echo $longitud_codigo_dependencia;          ?>">-->
                                <select name="longitud_codigo_dependencia" class="form-control" id="longitud_codigo_dependencia">
                                    <?php
                                    if ($longitud_codigo_dependencia == 3) {
                                        $longitud3 = 'selected';
                                    } else {
                                        $longitud4 = 'selected';
                                    }
                                    ?>
                                    <option value="3" <?php $longitud3 ?>>3 Dígitos</option>
                                    <option value="4" <?php $longitud4 ?>>4 Dígitos</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
                        <label class="col-md-9 control-label">Dependencia salida :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="entidad_depsal" type="text" class="form-control" id="entidad_depsal" placeholder="999"  value="<?php echo $entidad_depsal; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
                        <label class="col-md-8 control-label">Tipo radicado PQR :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                           <!-- <input name="tipoRadicadoPqr" type="text" class="form-control" id="tipoRadicadoPqr" placeholder="4"  value = "<?php //echo $tipoRadicadoPqr;          ?>">-->
                                <select name="tipoRadicadoPqr" class="form-control" id="tipoRadicadoPqr">
                                    <?php
                                    if ($tipoRadicadoPqr == 2) {
                                        $longitud2 = 'selected';
                                    } else {
                                        $longitud4 = 'selected';
                                    }
                                    ?>
                                    <option value="2" <?php $longitud2 ?>>2</option>
                                    <option value="4" <?php $longitud4 ?>>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
                        <label class="col-md-10 control-label">Dependencia de pruebas :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="dependenciaPruebas" type="text" class="form-control" id="dependenciaPruebas" placeholder="0998"  value = "<?php echo $dependenciaPruebas; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
                        <label class="col-md-12 control-label">Dependencia Responsable PQR :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="depeRadicaFormularioWeb" type="text" class="form-control" id="depeRadicaFormularioWeb" placeholder="0998"  value = "<?php echo $depeRadicaFormularioWeb; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
                        <label class="col-md-12 control-label">Usuario Responsable PQR :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="usuaRecibeWeb" type="text" class="form-control" id="usuaRecibeWeb" placeholder="1"  value = "<?php echo $usuaRecibeWeb; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3" >
                        <label class="col-md-10 control-label">Numeración PQR :</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input name="secRadicaFormularioWeb" type="text" class="form-control" id="secRadicaFormularioWeb" disabled  placeholder="secr_tp4_0998"  value = "<?php echo $secRadicaFormularioWeb; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <!--BOTONERIA-->
            <div class="form-group col-xs-10 col-sm-12 col-md-12 col-lg-12">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-8">
                    <button type="submit" name="creaConfigOrfeo" class="btn btn-warning" >GUARDAR DATOS ORFEO<span class="glyphicon glyphicon-certificate"></span></button><br><br>
                </div>
                <!--FIN BOTONERIA-->
            </div>
        </div>
    </div>
</form>
<!--FIN FORMULARIO CONFIGROOT-->

<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script src='js/bootstrapValidator.js'></script>

<!--<script src="js/index.js"></script>-->

<!--VALIDACION DE CONFIG ROOT-->
<script type="text/javascript">
                                    $(document).ready(function () {

                                        $('#configRoot').bootstrapValidator({
                                            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                                            feedbackIcons: {
                                                valid: 'glyphicon glyphicon-ok',
                                                invalid: 'glyphicon glyphicon-remove',
                                                validating: 'glyphicon glyphicon-refresh'
                                            },

                                            submitHandler: function (validator, form, submitButton) {
                                                $('#success_message').slideDown({opacity: "show"}, "slow") // Do something ...

                                                $('#configRoot').data('bootstrapValidator').resetForm();

                                                var bv = form.data('bootstrapValidator');
                                                // Use Ajax to submit form data
                                                $.post(form.attr('action'), form.serialize(), function (result) {
                                                    console.log(result);
                                                }, 'json');
                                            },
                                            fields: {
                                                hostRoot: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Ip o nombre de servidor.'}
                                                    }
                                                },
                                                portRoot: {
                                                    validators: {
                                                        stringLength: {min: 2, max: 4, message: 'Mínimo 2 caracteres, Máximo 4'},
                                                        notEmpty: {message: 'Puerto BD.'}
                                                    }
                                                },
                                                userRoot: {
                                                    validators: {
                                                        stringLength: {min: 2, max: 12, },
                                                        notEmpty: {message: 'Usuario de la BD.'}
                                                    }
                                                },
                                                passRoot: {
                                                    validators: {
                                                        stringLength: {min: 2, max: 12, },
                                                        notEmpty: {message: 'Contraseña de la BD.'}
                                                    }
                                                },
                                                entidad: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Sigla de la entidad.'}
                                                    }
                                                },
                                                entidad_largo: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Nombre de la entidad.'}
                                                    }
                                                },
                                                nit_entidad: {
                                                    validators: {
                                                        stringLength: {min: 10, max: 13, },
                                                        notEmpty: {message: 'Nit de la entidad.'}
                                                    }
                                                },
                                                entidad_tel: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Telefono de la entidad.'}
                                                    }
                                                },
                                                entidad_contacto: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Email del contacto.'}
                                                    }
                                                },
                                                entidad_dir: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Dirección de la entidad.'}
                                                    }
                                                },
                                                pais: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Pais?.'}
                                                    }
                                                },
                                                driver: {
                                                    validators: {stringLength: {min: 4, },
                                                        notEmpty: {message: 'Motor de BD.'}
                                                    }
                                                },
                                                port: {
                                                    validators: {
                                                        stringLength: {min: 2, max: 4, message: 'Mínimo 2 caracteres, Máximo 4'},
                                                        notEmpty: {message: 'Puerto de la BD.'}
                                                    }
                                                },
                                                host: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Ip o nombre de servidor.'}
                                                    }
                                                },
                                                servicio: {
                                                    validators: {
                                                        stringLength: {min: 4, max: 12, },
                                                        notEmpty: {message: 'Nombre de la BD.'}
                                                    }
                                                },
                                                usuario: {
                                                    validators: {
                                                        stringLength: {min: 4, max: 12, },
                                                        notEmpty: {message: 'Usuario de la BD.'}
                                                    }
                                                },
                                                contrasena: {
                                                    validators: {
                                                        stringLength: {min: 2, max: 20, message: 'Mínimo 2 caracteres, Máximo 20'},
                                                        notEmpty: {message: 'Contraseña del usuario de BD.'}
                                                    }
                                                },
                                                servidor_mail: {
                                                    validators: {
                                                        stringLength: {min: 2, },
                                                    }
                                                },

                                                protocolo_mail: {
                                                    validators: {
                                                        stringLength: {min: 2, },
                                                    }
                                                },

                                                puerto_mail: {
                                                    validators: {
                                                        stringLength: {min: 2, max: 4, message: 'Mínimo 2 caracteres, Máximo 4'},
                                                    }
                                                },

                                                servidor_mail_smtp: {
                                                    validators: {
                                                        stringLength: {min: 2, max: 30, message: 'Mínimo 2 caracteres, Máximo 30'},
                                                    }
                                                },
                                                puerto_mail_smtp: {
                                                    validators: {
                                                        stringLength: {min: 2, max: 4, message: 'Mínimo 2 caracteres, Máximo 4'},
                                                    }
                                                },
                                                cuenta_mail: {
                                                    validators: {
                                                        stringLength: {min: 2, max: 30, message: 'Mínimo 2 caracteres, Máximo 30'},
                                                    }
                                                },
                                                contrasena_mail: {
                                                    validators: {
                                                        stringLength: {min: 2, max: 30, message: 'Mínimo 2 caracteres, Máximo 30'},
                                                        notEmpty: {message: 'Contraseña de BD.'}
                                                    }
                                                },
                                                ldapServer: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                    }
                                                },
                                                cadenaBusqLDAP: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                    }
                                                },
                                                campoBusqLDAP: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                    }
                                                },
                                                ADODB_PATH: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Ruta ADODB_PATH.'}
                                                    }
                                                },
                                                ADODB_CACHE_DIR: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Ruta ADODB_CACHE.'}
                                                    }
                                                },
                                                PEAR_PATH: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Ruta PEAR.'}
                                                    }
                                                },
                                                menuAdicional: {
                                                    validators: {
                                                        stringLength: {min: 1, max: 2, },
                                                        notEmpty: {message: 'Menu adicional.'}
                                                    }
                                                },
                                                usua_perm_avaz: {
                                                    validators: {
                                                        stringLength: {min: 1, max: 2, },
                                                        notEmpty: {message: 'Usuario avanzado.'}
                                                    }
                                                },
                                                ambiente: {
                                                    validators: {
                                                        stringLength: {min: 4, max: 12, },
                                                        notEmpty: {message: 'Ambiente trabajo.'}
                                                    }
                                                },
                                                servProcDocs: {
                                                    validators: {
                                                        stringLength: {min: 4, max: 20, message: 'Mínimo 4 caracteres, Máximo 20'},
                                                    }
                                                },
                                                MODULO_RADICACION_DOCS_ANEXOS: {
                                                    validators: {
                                                        stringLength: {min: 1, max: 1, message: 'Mínimo 1 caracteres, Máximo 1'},
                                                        notEmpty: {message: 'Ruta modulo rad anexos.'}
                                                    }
                                                },
                                                MODULO_ENVIOS: {
                                                    validators: {
                                                        stringLength: {min: 1, max: 1, message: 'Mínimo 1 caracteres, Máximo 1'},
                                                        notEmpty: {message: 'Modulo envios.'}
                                                    }
                                                },
                                                colorFondo: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Color de fondo?.'}
                                                    }
                                                },
                                                administrador: {
                                                    validators: {
                                                        stringLength: {min: 2, max: 50, message: 'Mínimo 1 caracteres, Máximo 1'},
                                                        notEmpty: {message: 'Correo administrador.'}
                                                    }
                                                },
                                                ESTILOS_PATH: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Ruta de los estilos ORFEO.'}
                                                    }
                                                },

                                                ESTILOS_PATH2: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Ruta de los estilos ORFEO.'}
                                                    }
                                                },

                                                ESTILOS_PATH_ORFEO: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Ruta de los estilos ORFEO.'}
                                                    }
                                                },

                                                logoSuperiorOrfeo: {
                                                    validators: {
                                                        stringLength: {min: 1, max: 5, },
                                                        notEmpty: {message: 'Tendra logo de ORFEO.'}
                                                    }
                                                },

                                                imagenes: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Ruta de las imagenes.'}
                                                    }
                                                },

                                                imagenes2: {
                                                    validators: {
                                                        stringLength: {min: 4, },
                                                        notEmpty: {message: 'Ruta de las imagenes 2.'}
                                                    }
                                                },

                                                dependenciaPruebas: {
                                                    validators: {
                                                        stringLength: {min: 3, max: 4, },
                                                        notEmpty: {message: 'Codigo dependencia Pruebas.'}
                                                    }
                                                },

                                                tipoRadicadoPqr: {
                                                    validators: {
                                                        stringLength: {min: 1, max: 2, },
                                                        notEmpty: {message: 'Codigo del tipo radicado.'}
                                                    }
                                                },

                                                longitud_codigo_dependencia: {
                                                    validators: {
                                                        stringLength: {min: 1, max: 1, },
                                                        notEmpty: {message: 'Largo codigo dependencia.'}
                                                    }
                                                },

                                                depeRadicaFormularioWeb: {
                                                    validators: {
                                                        stringLength: {min: 3, max: 4, },
                                                        notEmpty: {message: 'Dep recibe radicado.'}
                                                    }
                                                },

                                                entidad_depsal: {
                                                    validators: {
                                                        stringLength: {min: 1, max: 4, },
                                                        notEmpty: {message: 'Dep genera salida.'}
                                                    }
                                                },

                                                usuaRecibeWeb: {
                                                    validators: {
                                                        stringLength: {min: 1, max: 4, },
                                                        notEmpty: {message: 'Usua que recibe.'}
                                                    }
                                                },

                                                secRadicaFormularioWeb: {
                                                    validators: {
                                                        stringLength: {min: 1, },
                                                        notEmpty: {message: 'Sequencia de rad web'}
                                                    }
                                                },
                                            }
                                        })

                                    });

                                    $('#passRoot').keyup(function () {
                                        var _this = $('#passRoot');
                                        var pass_1 = $('#passRoot').val();
                                        _this.attr('style', 'background:white');
                                        if (pass_1.charAt(0) == ' ') {
                                            _this.attr('style', 'background:#FF4A4A');
                                        }

                                        if (_this.val() == '') {
                                            _this.attr('style', 'background:#FF4A4A');
                                        }
                                    });

                                    $('#passRootconfir').keyup(function () {
                                        var pass_1 = $('#passRoot').val();
                                        var pass_2 = $('#passRootconfir').val();
                                        var _this = $('#passRootconfir');
                                        _this.attr('style', 'background:white');
                                        if (pass_1 != pass_2 && pass_2 != '') {
                                            _this.attr('style', 'background:#FF4A4A');
                                            $('#mensaje').attr('style', 'display:block; color:red');
                                        } else if (pass_2 == '') {
                                            _this.attr('style', 'background:#FF4A4A');
                                            $('#mensaje').attr('style', 'display:block; color:red');
                                        } else {
                                            $('#mensaje').attr('style', 'display:none;');
                                            _this.attr('style', 'background:#03c13a');
                                            pass_1.attr('style', 'background:#03c13a');
                                        }
                                    });

                                    $('#contrasena').keyup(function () {
                                        var _this = $('#contrasena');
                                        var pass_1 = $('#contrasena').val();
                                        _this.attr('style', 'background:white');
                                        if (pass_1.charAt(0) == ' ') {
                                            _this.attr('style', 'background:#FF4A4A');
                                        }

                                        if (_this.val() == '') {
                                            _this.attr('style', 'background:#FF4A4A');
                                        }
                                    });

                                    $('#contrasenaConfir').keyup(function () {
                                        var pass_1 = $('#contrasena').val();
                                        var pass_2 = $('#contrasenaConfir').val();
                                        var _this = $('#contrasenaConfir');
                                        _this.attr('style', 'background:white');
                                        if (pass_1 != pass_2 && pass_2 != '') {
                                            _this.attr('style', 'background:#FF4A4A');
                                            $('#mensaje1').attr('style', 'display:block; color:red');
                                        } else if (pass_2 == '') {
                                            _this.attr('style', 'background:#FF4A4A');
                                            $('#mensaje1').attr('style', 'display:block; color:red');
                                        } else {
                                            $('#mensaje1').attr('style', 'display:none;');
                                            _this.attr('style', 'background:#03c13a');
                                            pass_1.attr('style', 'background:#03c13a');
                                        }
                                    });

                                    /*  Evalua si, se desea mostar la información del servidor LDAP */
                                    $(".Radioldap").click(function () {
                                        if ($('input:radio[name=Radioldap]:checked').val() == "Si") {
                                            $('.ldap').attr('style', 'display:block;');
                                        } else if ($('input:radio[name=Radioldap]:checked').val() == "No") {
                                            $('.ldap').attr('style', 'display:none;');
                                        }
                                    });

                                    /*  Evalua si, se desea mostar la información del servidor de Correo */
                                    $(".Radiocorreo").click(function () {
                                        if ($('input:radio[name=Radiocorreo]:checked').val() == "Si") {
                                            $('.correo').attr('style', 'display:block;');
                                            //$('.row2').attr('class','row');
                                        } else if ($('input:radio[name=Radiocorreo]:checked').val() == "No") {
                                            $('.correo').attr('style', 'display:none;');
                                            //$('.row2').attr('class','row2');
                                        }
                                    });

                                    $("#depeRadicaFormularioWeb").change(function () {
                                        $('#secRadicaFormularioWeb').val('secr_tp' + $('#tipoRadicadoPqr').val() + '_' + $(this).val());
                                    });

                                    $("#tipoRadicadoPqr").change(function () {
                                        $('#secRadicaFormularioWeb').val('secr_tp' + $(this).val() + '_' + $("#depeRadicaFormularioWeb").val());
                                    });

                                    $("#longitud_codigo_dependencia").change(function () {
                                        $('#entidad_depsal').attr('maxlength', $("#longitud_codigo_dependencia").val());
                                        $('#dependenciaPruebas').attr('maxlength', $("#longitud_codigo_dependencia").val());
                                        $('#depeRadicaFormularioWeb').attr('maxlength', $("#longitud_codigo_dependencia").val());
                                        $('#entidad_depsal').val('');
                                        $('#dependenciaPruebas').val('');
                                        $('#depeRadicaFormularioWeb').val('');
                                    });

                                    function isNumberKey2(evt) {
                                        var charCode = (evt.which) ? evt.which : event.keyCode

                                        if (charCode > 31 && (charCode < 48 || charCode > 57))
                                            return false;

                                        return true;
                                    }
</script>
<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(15500, 0).slideUp(15500, function () {
            $(this).remove();
        });
    }, 164000);
</script>
<!--FIN-->
</body>


