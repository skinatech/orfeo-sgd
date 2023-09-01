<?php

session_start();
error_reporting(7);
$url_raiz = "../..";
$dir_raiz = $_SESSION['dir_raiz'];

include "$dir_raiz/config.php";
include_once "$dir_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$dir_raiz");

//$db->conn->debug = TRUE;

function cargar_usuarios($ambiente) {
    $directorio = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/' . $ambiente . '/bodega/tmp/usuarios/';
    $archivo = 'usuarios_masiva.csv';
    $path = $directorio . $archivo;
    $lineas = file($path); //cargamos el archivo
    $i = 0; //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera líne
    $er = 0;
    $contador = 0;

    if (file_exists($path)) {
        foreach ($lineas as $linea_num => $linea) {
            if ($i != 0) {
                $datosUsuario = explode(";", $linea);

                if (count($datosUsuario) < 6) {
                    $er = 1;
                    $mensaje = 'Falta una columa, verifique :' . $archivo;
                } elseif ($datosUsuario[0] == '' || $datosUsuario[1] == '' || $datosUsuario[2] == '' || $datosUsuario[3] == '' || $datosUsuario[4] == '' || $datosUsuario[5] == '') {
                    $er = 1;
                    $mensaje = 'Alguna Columna estan en blanco, verifique :' . $archivo;
                }

                if ($er == 0) {
                    $depe_codi = iconv("ISO-8859-1", "UTF-8",trim($datosUsuario[0]));
                    $usua_nomb = iconv("ISO-8859-1", "UTF-8",trim($datosUsuario[1]));
                    $usua_perfil = iconv("ISO-8859-1", "UTF-8",trim($datosUsuario[2]));
                    $usua_login = iconv("ISO-8859-1", "UTF-8",trim($datosUsuario[3]));
                    $usua_doc = iconv("ISO-8859-1", "UTF-8",trim($datosUsuario[4]));
                    $usua_email = iconv("ISO-8859-1", "UTF-8",trim($datosUsuario[5]));

                    $sqldepe_codi = "select distinct depe_codi from dependencia where depe_nomb = '$depe_codi'";
                    $rssqldepe_codi = pg_query($sqldepe_codi);

                    while ($rowsqldepe_codi = pg_fetch_array($rssqldepe_codi)) {
                        $depe_codi = $rowsqldepe_codi['depe_codi'];
                    }

                    // Consulta el total de usuarios por dependencia y le suma 1, para el codi_usua
                    $sqlConsultaDepe = "select max(usua_codi) as codiusu from usuario where depe_codi='$depe_codi'";
                    $rsSqlConsultaDepe = pg_query($sqlConsultaDepe);

                    while ($rowsqlUsua = pg_fetch_array($rsSqlConsultaDepe)) {
                        $usua_codi = $rowsqlUsua["codiusu"] + 1;
                    }

                    // Consulta si el usuario que se está cargando existe. Se valida por usua_login, documento o correo
                    $sqlConsultaUsuario = "select usua_login, usua_nomb from usuario where usua_doc='$usua_doc' or usua_login='$usua_login' or usua_email='$usua_email'";
                    $rsSqlConsultaUsuario = pg_query($sqlConsultaUsuario);

                    if (pg_num_rows($rsSqlConsultaUsuario) == 0) {

                        $sql = "insert into usuario (usua_codi,depe_codi,usua_nomb,usua_login,usua_pasw,usua_doc,usua_email,usua_esta, "
                                . "usua_nuevo,usua_fech_crea) values($usua_codi,'$depe_codi','$usua_nomb','$usua_login','123','$usua_doc','$usua_email','1','0','" . date('Y-m-d') . "')";
                        $rsSql = pg_query($sql);
                        
                        if ($rsSql) {
                            $contador = $contador + 1;
                        }

                        $insertCarpetaPer = "insert into carpeta_per (usua_codi,depe_codi,nomb_carp,desc_carp,codi_carp) values($usua_codi,'$depe_codi','Masiva','Radicacion Masiva',99)";
                        $rsinsertCarpetaPer = pg_query($insertCarpetaPer);

                        $sqlPerfil = "select * from perfiles where nomb_perfil='$usua_perfil'";
                        $rssqlPerfil = pg_query($sqlPerfil);

                        while ($rowsqlPerfil = pg_fetch_array($rssqlPerfil)) {
                            $perm_radi = $rowsqlPerfil['perm_radi'];
                            $usua_admin = $rowsqlPerfil['usua_admin'];
                            $codi_nivel = $rowsqlPerfil['codi_nivel'];
                            $perm_radi_sal = $rowsqlPerfil['perm_radi_sal'];
                            $usua_admin_archivo = $rowsqlPerfil['usua_admin_archivo'];
                            $usua_masiva = $rowsqlPerfil['usua_masiva'];
                            $usua_perm_dev = $rowsqlPerfil['usua_perm_dev'];
                            $sgd_panu_codi = $rowsqlPerfil['sgd_panu_codi'];
                            $usua_prad_tp1 = $rowsqlPerfil['usua_prad_tp1'];
                            $usua_prad_tp2 = $rowsqlPerfil['usua_prad_tp2'];
                            $usua_prad_tp4 = $rowsqlPerfil['usua_prad_tp4'];
                            $usua_perm_envios = $rowsqlPerfil['usua_perm_envios'];
                            $usua_perm_modifica = $rowsqlPerfil['usua_perm_modifica'];
                            $usua_perm_impresion = $rowsqlPerfil['usua_perm_impresion'];
                            $sgd_aper_codigo = $rowsqlPerfil['sgd_aper_codigo'];
                            $sgd_perm_estadistica = $rowsqlPerfil['sgd_perm_estadistica'];
                            $usua_admin_sistema = $rowsqlPerfil['usua_admin_sistema'];
                            $usua_perm_trd = $rowsqlPerfil['usua_perm_trd'];
                            $usua_perm_firma = $rowsqlPerfil['usua_perm_firma'];
                            $usua_perm_prestamo = $rowsqlPerfil['usua_perm_prestamo'];
                            $usuario_publico = $rowsqlPerfil['usuario_publico'];
                            $usuario_reasignar = $rowsqlPerfil['usuario_reasignar'];
                            $usua_perm_notifica = $rowsqlPerfil['usua_perm_notifica'];
                            $usua_perm_expediente = $rowsqlPerfil['usua_perm_expediente'];
                            $usua_auth_ldap = $rowsqlPerfil['usua_auth_ldap'];
                            $usua_perm_numera_res = $rowsqlPerfil['usua_perm_numera_res'];
                            $usua_perm_numeradoc = $rowsqlPerfil['usua_perm_numeradoc'];
                            $perm_archi = $rowsqlPerfil['perm_archi'];
                            $perm_vobo = $rowsqlPerfil['perm_vobo'];
                            $perm_borrar_anexo = $rowsqlPerfil['perm_borrar_anexo'];
                            $perm_tipif_anexo = $rowsqlPerfil['perm_tipif_anexo'];
                            $usua_perm_adminflujos = $rowsqlPerfil['usua_perm_adminflujos'];
                            $usua_exp_trd = $rowsqlPerfil['usua_exp_trd'];
                            $usua_perm_rademail = $rowsqlPerfil['usua_perm_rademail'];
                            $usua_perm_accesi = $rowsqlPerfil['usua_perm_accesi'];
                            $usua_perm_agrcontacto = $rowsqlPerfil['usua_perm_agrcontacto'];
                            $usua_perm_preradicado = $rowsqlPerfil['usua_perm_preradicado'];
                            $cod_rol = $rowsqlPerfil['codi_perfil'];
                        }

                        $sqlupdate = "update usuario set perm_radi='$perm_radi', usua_admin='$usua_admin', codi_nivel=$codi_nivel,"
                                . "perm_radi_sal=$perm_radi_sal, usua_admin_archivo=$usua_admin_archivo, usua_masiva=$usua_masiva, "
                                . "usua_perm_dev=$usua_perm_dev, usua_perm_numera_res='$usua_perm_numera_res', "
                                . "usua_perm_numeradoc=$usua_perm_numeradoc, sgd_panu_codi=$sgd_panu_codi, usua_prad_tp1=$usua_prad_tp1, "
                                . "usua_prad_tp2=$usua_prad_tp2, usua_prad_tp4=$usua_prad_tp4, usua_perm_envios=$usua_perm_envios, "
                                . "usua_perm_modifica=$usua_perm_modifica, usua_perm_impresion=$usua_perm_impresion, "
                                . "sgd_aper_codigo=$sgd_aper_codigo, sgd_perm_estadistica=$sgd_perm_estadistica, "
                                . "usua_admin_sistema=$usua_admin_sistema, usua_perm_trd=$usua_perm_trd, usua_perm_firma=$usua_perm_firma,"
                                . "usua_perm_prestamo=$usua_perm_prestamo, usuario_publico=$usuario_publico, "
                                . "usuario_reasignar=$usuario_reasignar, usua_perm_notifica=$usua_perm_notifica, "
                                . "usua_perm_expediente=$usua_perm_expediente, usua_auth_ldap=$usua_auth_ldap,"
                                . "perm_archi='$perm_archi', perm_vobo='$perm_vobo', perm_borrar_anexo=$perm_borrar_anexo, "
                                . "perm_tipif_anexo=$perm_tipif_anexo, usua_perm_adminflujos=$usua_perm_adminflujos, "
                                . "usua_exp_trd=$usua_exp_trd, usua_perm_rademail=$usua_perm_rademail,"
                                . "usua_perm_accesi=$usua_perm_accesi, usua_perm_agrcontacto=$usua_perm_agrcontacto,"
                                . "usua_perm_preradicado=$usua_perm_preradicado, cod_rol=$cod_rol "
                                . "where usua_login='$usua_login'";
                        $rssqlupdate = pg_query($sqlupdate);
                    } else {
                        while ($rowSqlConsUsua = pg_fetch_array($rsSqlConsultaUsuario)) {
                            $usua_codi = $rowSqlConsUsua["usua_login"];
                            $usua_nomb = $rowSqlConsUsua["usua_nomb"] . '<br>';
                        }
                        $datosUsaurios[] = $usua_nomb;
                    }
                }
            }
            $i++;
        }
        if ($er == 0) {
            echo '<div class="alert alert-success" role="alert"><br>';
            echo '<strong>¡Éxito!</strong> Se ejecutó el archivo de forma correcta: Usuarios creados ' . $contador . '.<br><br>';
            if (count($datosUsaurios) > 0) {
                echo 'Los siguientes usuarios existen en el sistema: <br>';
                for ($e = 0; $e < count($datosUsaurios); $e++) {
                    echo '&nbsp;&nbsp; -> ' . $datosUsaurios[$e];
                }
            }
            echo '</div>';
            unlink($path);
        } elseif ($er == 1) {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>¡Precaucion!</strong> ' . $mensaje;
            echo '</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Error!</strong> No esta cargado el archivo : ' . $archivo;
        echo '</div>';
    }
}

function inactivar_usuarios($ambiente) {
    $directorio = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/' . $ambiente . '/bodega/tmp/usuarios/';
    $archivo = 'usuarios_masiva_inactivar.csv';
    $path = $directorio . $archivo;
    $lineas = file($path); //cargamos el archivo
    $i = 0; //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera líne
    $er = 0;
    $contador = 0;

    if (file_exists($path)) {
        foreach ($lineas as $linea_num => $linea) {
            if ($i != 0) {
                $datosUsuario = explode(";", $linea);

                if (count($datosUsuario) < 1) {
                    $er = 1;
                    $mensaje = 'Falta una columa, verifique :' . $archivo;
                } elseif ($datosUsuario[0] == '') {
                    $er = 1;
                    $mensaje = 'Alguna Columna estan en blanco, verifique :' . $archivo;
                }

                if ($er == 0) {
                    $usua_email = trim($datosUsuario[0]);

                    // Consulta el código del usuario y la dependencia del usuario con el dato de un correo electronico
                    $sqlConsultaUsuario = "select depe_codi, usua_codi, usua_nomb from usuario where usua_email='$usua_email'";
                    $rsSqlConsultaUsuario = pg_query($sqlConsultaUsuario);

                    if (pg_num_rows($rsSqlConsultaUsuario) == 0) {
                        echo ' el correo electronico ingresado no existe';
                    } else {
                        while ($rowSqlConsUsua = pg_fetch_array($rsSqlConsultaUsuario)) {
                            $usua_codi = $rowSqlConsUsua["usua_codi"];
                            $depe_codi = $rowSqlConsUsua["depe_codi"];
                            $usua_nomb = $rowSqlConsUsua["usua_nomb"];
                        }

                        $selectRadicados = "select count(radi_nume_radi) as radicados from radicado where radi_depe_actu='$depe_codi' and radi_usua_actu=$usua_codi";
                        $rsSqlselectRadicados = pg_query($selectRadicados);

                        while ($rowSqlRadicados = pg_fetch_array($rsSqlselectRadicados)) {

                            if ($rowSqlRadicados["radicados"] == 0) {
                                $updateUsuario = "update usuario set usua_esta = '0' where depe_codi = '$depe_codi' and usua_codi = $usua_codi and usua_email='$usua_email'";
                                $rsSqlUpdateUsuario = pg_query($updateUsuario);

                                $mensajeCorrectoOk = '<strong>Se inactivo de forma correcta a: <br></strong>';
                                $usuarioUpdateOk[] = $usua_nomb . '<br>';
                            } else {
                                $usuarioUpdate[] = $usua_nomb;

                                $radicados = ', tiene en total ' . $rowSqlRadicados["radicados"] . ' radicados<br>';

                                $mensajeCorrecto = '<strong>No se pudo inactivar a: <br></strong>';
                                $usuarioRadicados[] = $radicados;
                            }
                        }
                    }
                }
            }
            $i++;
        }
        if ($er == 0) {
            echo '<div class="alert alert-success" role="alert"><br>';
            if (count($usuarioUpdateOk) > 0) {
                echo $mensajeCorrectoOk;
                for ($e = 0; $e < count($usuarioUpdateOk); $e++) {
                    echo '&nbsp;&nbsp; -> ' . $usuarioUpdateOk[$e];
                }
            }
            echo '<br>';
            if (count($usuarioUpdate) > 0) {
                echo $mensajeCorrecto;
                for ($e = 0; $e < count($usuarioUpdate); $e++) {
                    echo '&nbsp;&nbsp; -> ' . $usuarioUpdate[$e] . $usuarioRadicados[$e];
                }
            }
            echo '</div>';
            unlink($path);
        } elseif ($er == 1) {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>¡Precaucion!</strong> ' . $mensaje;
            echo '</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Error!</strong> No esta cargado el archivo : ' . $archivo;
        echo '</div>';
    }
}

?>