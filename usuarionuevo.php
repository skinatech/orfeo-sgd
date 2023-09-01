<?php
session_start();

foreach ($_GET as $key => $valor) ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor;

$ruta_raiz = ".";
$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$imagenes = $_SESSION["imagenes"];
$fechah = date("Ymdhms");

error_reporting(7);
include_once "$ruta_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler($ruta_raiz);
//$db->conn->debug=true; 
?>
<html>
    <title>Adm - Contrase&ntilde;as - ORFEO </title>
    <HEAD>
        <link href="estilos/orfeo50/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="estilos/orfeo50/cambioContrasena.css" rel="stylesheet" type="text/css"/>
    </HEAD>
    <body>
        <br>
        <center>
        <div class="flotante" style="margin-left: 1%;">
            <br>
            <a href="<?= $ruta_raiz ?>/login.php">
                <img border="0" src="estilos/orfeo50/imagenes50/sgd.png" alt="Ir a la pagina de incio de sesion">
            </a>
                <?php
                if (!$depsel) $depsel = $dependencia;

                if ($aceptar == "Grabar cambio de contraseña") {

                    // Se consulta la contraseña actual del usuario
                    $select = "select usua_pasw from usuario where usua_login ='$usuarionew'";
                    $rsSelect = $db->conn->query($select);

                    // Se consulta la configuración de la contraseña para saber el tiempo de vencimiento de la contraseña.
                    $selecConfig = "select numero_periocidad, descripcion_periocidad from configuracion_contrasena where estado_configuracion_contrasena='t' and anio_creacion ='".date('Y')."'";
                    $rsConfig = $db->conn->query($selecConfig);

                    $numeroPeriocidad = $rsConfig->fields['NUMERO_PERIOCIDAD'];
                    $descripcionPeriocidad = $rsConfig->fields['DESCRIPCION_PERIOCIDAD'];
                    $contrasenaIngresada = substr(md5($contraver), 1, 26);
                    $contrasenaActual = $rsSelect->fields['USUA_PASW'];

                    $fecha = date('Y-m-d');
                    $nuevafecha = strtotime ('+'.$numeroPeriocidad.' '.$descripcionPeriocidad , strtotime ( $fecha ) ) ;
                    $nuevafecha = date ( 'Y-m-d' , $nuevafecha );

                    // Valida que la contraseña que llego por POST es la misma que la anterior guardada si es asi no lo permite cambiar.
                        if($contrasenaActual == $contrasenaIngresada){
                            echo "<h4>No se ha podido cambiar la contrase&ntilde;a, debe ingresar una contraseña diferente.</h4>";
                            ?>
                                <span class="e_texto1">
                                    <center>
                                        <a href='contraxx.php?<?= session_name() . "=" . session_id() . "&fechah=$fechah" ?>'>
                                            <input class="but" type=button name=Cancelar id=Cancelar Value=Regresar>
                                        </a>
                                    </center>
                                </span>
                                <?php
                        }else{

                            // Primero se inactivan todas las contraseñas del usuario que esta haciendo la petición
                            $sqlUpdateContrasena = "update contrasenas_guardadas set estado_contrasena_guardada='0' where usua_login_contrasena_guardada='$usuarionew'";
                            $rsUpdateContrasena = $db->conn->query($sqlUpdateContrasena);

                            // Segundo se inserta en la tabla de contraseñas por el usuario que esta haciendo la petición
                            $sqlInsert = "insert into contrasenas_guardadas (usua_login_contrasena_guardada, contrasena_anterior_contrasena_guardada, contrasena_nueva_contrasena_guardada, fecha_creacion_contrasena_guardada, fecha_vencimiento_contrasena_guardada, estado_contrasena_guardada) values ('$usuarionew', '$contrasenaActual','$contrasenaIngresada','$fecha','$nuevafecha','1')";
                            $rsInsert = $db->conn->query($sqlInsert);

                            // Tercero actualiza la contraseña del usuario en la tabla de usuarios
                            $isql = "update usuario set usua_nuevo='1',usua_pasw='" . $contrasenaIngresada . "',depe_codi='$depsel', USUA_SESION='CAMBIO PWD(" . date("Ymd") . "' where usua_login='$usuarionew'";
                            $rs = $db->conn->query($isql);

                            if ($rs == -1) {
                                echo "<h4>No se ha podido cambiar la contrase&ntilde;a, Verifique los datos e intente de nuevo</h4>";
                                ?>
                                <span class="e_texto1">
                                    <center>
                                        <a href='contraxx.php?<?= session_name() . "=" . session_id() . "&fechah=$fechah" ?>'>
                                            <input class="but" type=button name=Cancelar id=Cancelar Value=Regresar>
                                        </a>
                                    </center>
                                </span>
                                <?php
                            } else {
                                echo "<h4>Su contrase&ntilde;a ha sido cambiada correctamente</h4>";
                                session_destroy();
                            }
                        }  
       
                } else {

                    if ($contradrd == $contraver) {
                        ?>
                        <form action=usuarionuevo.php?krd=<?= $krd ?>&<?= session_name()?>=<?= session_id() ?>" method=post>
                            <table border="0">
                                <tr><td><center><h4><b>Confirmar datos</b></h4></center></td></tr>
                            </table>
                            <table>
                                <tr><td><h4>Usuario <?= $usuarionew ?></h4></td></tr>
                                <input type=hidden name=usuarionew value='<?= $usuarionew ?>'></td></tr>
                                <input type=hidden name=contraver value='<?= $contraver ?>'></td></tr>
                                <input type=hidden name=depsel value='<?= $depsel ?>'></td></tr>
                                <tr><td><h4>Dependencia <?= $depsel ?></h4></td></tr>
                                <tr><td><h4>Esta Seguro de estos datos ?></h4></td></tr>
                            </table>
                            <input type=submit value='Grabar cambio de contraseña' style="margin-left: -8%;" name=aceptar class=but> 
                        </form>    
                        <?php
                    }else{
                        ?>
                        <span>
                            <center>
                                <h4>
                                    Contrase&ntilde;as no coinciden<br>
                                    <b>Por favor devuelvase y repita la operacion</b><br>
                                            <a href='contraxx.php?<?= session_name() . "=" . session_id() . "&fechah=$fechah" ?>'>
                                                <input class="but" type=button name=Cancelar id=Cancelar Value=Regresar>
                                            </a><br>
                                    <b>Gracias</b>
                                </h4>
                            </center>
                        </span>        
                        <?php
                    }
                }
                ?>
                <br>
             </div>
        </center>
    </body>
</html>