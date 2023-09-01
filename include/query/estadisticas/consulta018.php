<?php

/** Estadistica de permisos por rol
 * 
 * @autor Jenny Gamez
 * @version ORFEO 5.5
 * 
 */
$coltp3Esp = '"' . $tip3Nombre[3][2] . '"';
if (!$orno)
    $orno = 2;
/**
 * $db-driver Variable que trae el driver seleccionado en la conexion
 * @var string
 * @access public
 */
/**
 * $fecha_ini Variable que trae la fecha de Inicio Seleccionada  viene en formato Y-m-d
 * @var string
 * @access public
 */
/**
 * $fecha_fin Variable que trae la fecha de Fin Seleccionada
 * @var string
 * @access public
 */
/**
 * $mrecCodi Variable que trae el medio de recepcion por el cual va a sacar el detalle de la Consulta.
 * @var string
 * @access public
 */
switch ($db->driver) {
    case 'postgres':
    case 'mssql': {
            if ($codrol != 0 && $codpermisos == 0 && $codus == 0) {
                $queryE = "select ro.nomb_rol, "
                        . "us.usua_nomb, "
                        . "CONCAT (de.depe_codi,'- ',de.depe_nomb) as depe  "
                        . "from roles as ro "
                        . "inner join usuario as us on us.cod_rol=ro.cod_rol "
                        . "inner join dependencia as de on us.depe_codi=de.depe_codi "
                        . " where ro.cod_rol= $codrol ";

                $titulos = array("#", "1#ROL", "2#NOMBRE USUARIO", "3#DEPENDENCIA");

                function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
                    global $ruta_raiz, $encabezado, $krd;
                    switch ($numColumna) {
                        case 0:
                            $salida = $indice;
                            break;
                        case 1:
                            $salida = $fila[0];
                            break;
                        case 2:
                            $salida = $fila[1];
                            break;
                        case 3:
                            $salida = $fila[2];
                            break;
                    }
                    return $salida;
                }

            } elseif ($codrol != 0 && $codpermisos == 1 && $codus == 0) {
                $queryE = "select pe.nomb_perfil,"
                            . "(CASE pe.usua_esta WHEN 1 THEN 'Activo' WHEN 0 THEN 'Inactivo' END) AS  'Activar usuario.' ,"
                            . "(CASE pe.perm_radi WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Digitalización de documentos.',"
                            . "(CASE pe.usua_admin WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS  'Administración al sistema.' , "
                            . "(CASE pe.usua_nuevo WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Solicitar cambio contraseña.',"
                            . "(CASE pe.usua_admin_archivo WHEN 1 THEN 'Si' WHEN 2 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Archivo.', "
                            . "(CASE pe.usua_masiva WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Radicación masiva.',"
                            . "(CASE pe.usua_perm_dev WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Devolución de correspondencia.',"
                            . "(CASE pe.sgd_panu_codi WHEN 1 THEN 'Si' WHEN 0 THEN 'No' WHEN 2 THEN 'Si' WHEN 3 THEN 'Si' END) AS 'Anulación de radicado.',"
                            . "(CASE pe.usua_perm_envios WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Envió de correspondencia.',"
                            . "(CASE pe.sgd_perm_estadistica WHEN 1 THEN 'Si' WHEN 2 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Estadísticas.',"
                            . "(CASE pe.usua_perm_trd WHEN 1 THEN 'Si' WHEN 2 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Tablas de retención documental.',"
                            . "(CASE pe.usua_perm_prestamo WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Prestamo de documentos.',"
                            . "(CASE pe.usuario_reasignar WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Puede reasignar radicado.',"
                            . "(CASE pe.usua_perm_expediente WHEN 1 THEN 'Si' WHEN 2 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Expedientes virtuales.',"
                            . "(CASE pe.usua_auth_ldap WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Ingresar por directorio activo.',"
                            . "(CASE pe.perm_archi WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Puede archivar radicado.',"
                            . "(CASE pe.perm_borrar_anexo WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Puede borrar anexos.',"
                            . "(CASE pe.perm_tipif_anexo WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Puede tipificar anexos.',"
                            . "(CASE pe.usua_perm_rademail WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Radicación e-mail.',"
                            . "(CASE pe.usua_perm_preradicado WHEN 1 THEN 'Si' WHEN 0 THEN 'No' END) AS 'Pre-radicación.' "
                        . "from roles as ro "
                            . "inner join perfiles as pe on pe.codi_perfil=ro.cod_rol "
                        . "where ro.cod_rol= $codrol";

                $titulos = array("#", "1#ROL","2#NOMBRES PERMISOS","3#PERMISOS ASIGNADOS","", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");

                function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
                    global $ruta_raiz, $encabezado, $krd;
//                    $salida .= '<tr class="listado2">';
                    switch ($numColumna) {
                        case 0:
                            $salida = $indice;
                            break;
                        case 1:
                            $salida = $fila[0];
                            break;
                        case 2:
                            $salida = '<tr class="listado2"><td>2</td><td>'.$fila[0].'</td><td>Activar usuario.</td><td colspan="18"><center>'.$fila[1].'</center></td></tr>';
                            break;
                        case 3:
                            $salida = '<tr class="listado1"><td>3</td><td>'.$fila[0].'</td><td>Digitalizaci&oacute;n de documentos.</td><td colspan="16"><center>'.$fila[2].'</center></td></tr>';
                            break;
                        case 4:
                            $salida = '<tr class="listado2"><td>4</td><td>'.$fila[0].'</td><td>Administraci&oacute;n al sistema.</td><td colspan="18"><center>'.$fila[3].'</center></td></tr>';
                            break;
                        case 5:
                            $salida = '<tr class="listado1"><td>5</td><td>'.$fila[0].'</td><td>Solicitar cambio contrase&ntilde;a.</td><td colspan="18"><center>'.$fila[4].'</center></td></tr>';
                            break;
                        case 6:
                            $salida = '<tr class="listado2"><td>6</td><td>'.$fila[0].'</td><td>Archivo</td><td colspan="18"><center>'.$fila[5].'</center></td></tr>';
                            break;
                        case 7:
                            $salida = '<tr class="listado1"><td>7</td><td>'.$fila[0].'</td><td>Radicaci&oacute;n masiva.</td><td colspan="18"><center>'.$fila[6].'</center></td></tr>';
                            break;
                        case 8:
                            $salida = '<tr class="listado2"><td>8</td><td>'.$fila[0].'</td><td>Devoluci&oacute;n de correspondencia.</td><td colspan="18"><center>'.$fila[7].'</center></td></tr>';
                            break;
                        case 9:
                            $salida = '<tr class="listado1"><td>9</td><td>'.$fila[0].'</td><td>Anulaci&oacute;n de radicado.</td><td colspan="18"><center>'.$fila[8].'</center></td></tr>';
                            break;
                        case 10:
                            $salida = '<tr class="listado2"><td>10</td><td>'.$fila[0].'</td><td>Envi&oacute; de correspondencia.</td><td colspan="18"><center>'.$fila[9].'</center></td></tr>';
                            break;
                        case 11:
                            $salida = '<tr class="listado1"><td>11</td><td>'.$fila[0].'</td><td>Estad&iacute;sticas.</td><td colspan="18"><center>'.$fila[10].'</center></td></tr>';
                            break;
                        case 12:
                            $salida = '<tr class="listado2"><td>12</td><td>'.$fila[0].'</td><td>Tablas de retenci&oacute;n documental.</td><td colspan="18"><center>'.$fila[11].'</center></td></tr>';
                            break;
                        case 13:
                            $salida = '<tr class="listado1"><td>13</td><td>'.$fila[0].'</td><td>Prestamo de documentos.</td><td colspan="18"><center>'.$fila[12].'</center></td></tr>';
                            break;
                        case 14:
                            $salida = '<tr class="listado2"><td>14</td><td>'.$fila[0].'</td><td>Puede reasignar radicado.</td><td colspan="18"><center>'.$fila[13].'</center></td></tr>';
                            break;
                        case 15:
                            $salida = '<tr class="listado1"><td>15</td><td>'.$fila[0].'</td><td>Expedientes virtuales.</td><td colspan="18"><center>'.$fila[14].'</center></td></tr>';
                            break;
                        case 16:
                            $salida = '<tr class="listado2"><td>16</td><td>'.$fila[0].'</td><td>Ingresar por directorio activo.</td><td colspan="18"><center>'.$fila[15].'</center></td></tr>';
                            break;
                        case 17:
                            $salida = '<tr class="listado1"><td>17</td><td>'.$fila[0].'</td><td>Puede archivar radicado.</td><td colspan="18"><center>'.$fila[16].'</center></td></tr>';
                            break;
                        case 18:
                            $salida = '<tr class="listado2"><td>18</td><td>'.$fila[0].'</td><td>Puede borrar anexos.</td><td colspan="18"><center>'.$fila[17].'</center></td></tr>';
                            break;
                        case 19:
                            $salida = '<tr class="listado1"><td>19</td><td>'.$fila[0].'</td><td>Puede tipificar anexos.</td><td colspan="18"><center>'.$fila[18].'</center></td></tr>';
                            break;
                        case 20:
                            $salida = '<tr class="listado2"><td>20</td><td>'.$fila[0].'</td><td>Radicaci&oacute;n e-mail.</td><td colspan="18"><center>'.$fila[19].'</center></td></tr>';
                            break;
                        case 21:
                            $salida = '<tr class="listado1"><td>21</td><td>'.$fila[0].'</td><td>Pre-radicaci&oacute;n.</td><td colspan="18"><center>'.$fila[20].'</center></td></tr>';
                            break;
                    }
//                    $salida .= '</tr>';
                    return $salida;
                }

            } elseif ($codrol != 0 && $codpermisos == 2 && $codus == 0) {
                $queryE = "select ro.nomb_rol, "
                        . "tpr.sgd_tpr_descrip "
                        . "from roles as ro "
                        . "inner join rol_tipos_doc as roltp on roltp.cod_rol=ro.cod_rol "
                        . "inner join sgd_tpr_tpdcumento as tpr on roltp.cod_tp_tpdcumento=tpr.sgd_tpr_codigo  "
                        . "where ro.cod_rol= $codrol";

                $titulos = array("#", "1#ROL", "2#TIPO DOCUMENTAL");

                function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
                    global $ruta_raiz, $encabezado, $krd;
                    switch ($numColumna) {
                        case 0:
                            $salida = $indice;
                            break;
                        case 1:
                            $salida = $fila[0];
                            break;
                        case 2:
                            $salida = $fila[1];
                            break;
                    }
                    return $salida;
                }

            }
        }break;
    case 'oci8': {
            if ($codrol != 0 && $codpermisos == 0 && $codus == 0) {
                $queryE = "select ro.nomb_rol, "
                        . "us.usua_nomb, "
                        . "de.depe_codi||'- '||de.depe_nomb as depe  "
                        . "from roles ro "
                        . "inner join usuario us on us.cod_rol=ro.cod_rol "
                        . "inner join dependencia de on us.depe_codi=de.depe_codi "
                        . " where ro.cod_rol= $codrol ";

                $titulos = array("#", "1#ROL", "2#NOMBRE USUARIO", "3#DEPENDENCIA");

                function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
                    global $ruta_raiz, $encabezado, $krd;
                    switch ($numColumna) {
                        case 0:
                            $salida = $indice;
                            break;
                        case 1:
                            $salida = $fila[0];
                            break;
                        case 2:
                            $salida = $fila[1];
                            break;
                        case 3:
                            $salida = $fila[2];
                            break;
                    }
                    return $salida;
                }

            } elseif ($codrol != 0 && $codpermisos == 1 && $codus == 0) {
                $queryE = "SELECT pe.nomb_perfil, "
                        ."(CASE pe.usua_esta WHEN '1' THEN 'Activo' ELSE 'Inactivo' END) AS activar_usuario, "
                        ."(CASE pe.perm_radi WHEN '1' THEN 'Si' ELSE 'No' END) AS digitalizacion_documentos, "
                        ."(CASE pe.usua_admin WHEN '1' THEN 'Si' ELSE 'No' END) AS aministracion_sistema, "
                        ."(CASE pe.usua_nuevo WHEN '1' THEN 'Si' ELSE 'No' END) AS soli_cambio_contraseña, "
                        ."(CASE pe.usua_admin_archivo WHEN 1 THEN 'Si' WHEN 2 THEN 'Si' ELSE 'No' END) AS archivo, "
                        ."(CASE pe.usua_masiva WHEN 1 THEN 'Si' ELSE 'No' END) AS radicacion_masiva, "
                        ."(CASE pe.usua_perm_dev WHEN 1 THEN 'Si' ELSE 'No' END) AS dev_correspondencia, "
                        ."(CASE pe.sgd_panu_codi WHEN 1 THEN 'Si' WHEN 2 THEN 'Si' WHEN 3 THEN 'Si' ELSE 'No' END) AS anulacion_radicado, "
                        ."(CASE pe.usua_perm_envios WHEN 1 THEN 'Si' ELSE 'No' END) AS envio_correspondencia, "
                        ."(CASE pe.sgd_perm_estadistica WHEN 1 THEN 'Si' WHEN 2 THEN 'Si' ELSE 'No' END) AS estadisticas, "
                        ."(CASE pe.usua_perm_trd WHEN 1 THEN 'Si' WHEN 2 THEN 'Si' ELSE 'No' END) AS tablas_retencion_doc, "
                        ."(CASE pe.usua_perm_prestamo WHEN 1 THEN 'Si' ELSE 'No' END) AS prestamo_documentos, "
                        ."(CASE pe.usuario_reasignar WHEN 1 THEN 'Si' ELSE 'No' END) AS reasignar_radicado, "
                        ."(CASE pe.usua_perm_expediente WHEN 1 THEN 'Si' WHEN 2 THEN 'Si' ELSE 'No' END) AS expedientes_virtuales, "
                        ."(CASE pe.usua_auth_ldap WHEN 1 THEN 'Si' ELSE 'No' END) AS directorio_activo, "
                        ."(CASE pe.perm_archi WHEN '1' THEN 'Si' ELSE 'No' END) AS archivar_radicado, "
                        ."(CASE pe.perm_borrar_anexo WHEN 1 THEN 'Si' ELSE 'No' END) AS borrar_anexos, "
                        ."(CASE pe.perm_tipif_anexo WHEN 1 THEN 'Si' ELSE 'No' END) AS tipificar_anexos, "
                        ."(CASE pe.usua_perm_rademail WHEN 1 THEN 'Si' ELSE 'No' END) AS radicacion_email, "
                        ."(CASE pe.usua_perm_preradicado WHEN 1 THEN 'Si' ELSE 'No' END) AS pre_radicacion "
                        ."from roles ro "
                        ."inner join perfiles pe on pe.codi_perfil=ro.cod_rol "
                        ." where ro.cod_rol= $codrol ";

                $titulos = array("#", "1#ROL","2#NOMBRES PERMISOS","3#PERMISOS ASIGNADOS","", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");

                function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
                    global $ruta_raiz, $encabezado, $krd;
//                    $salida .= '<tr class="listado2">';
                    switch ($numColumna) {
                        case 0:
                            $salida = $indice;
                            break;
                        case 1:
                            $salida = $fila[0];
                            break;
                        case 2:
                            $salida = '<tr class="listado2"><td>2</td><td>'.$fila[0].'</td><td>Activar usuario.</td><td colspan="18"><center>'.$fila[1].'</center></td></tr>';
                            break;
                        case 3:
                            $salida = '<tr class="listado1"><td>3</td><td>'.$fila[0].'</td><td>Digitalizaci&oacute;n de documentos.</td><td colspan="16"><center>'.$fila[2].'</center></td></tr>';
                            break;
                        case 4:
                            $salida = '<tr class="listado2"><td>4</td><td>'.$fila[0].'</td><td>Administraci&oacute;n al sistema.</td><td colspan="18"><center>'.$fila[3].'</center></td></tr>';
                            break;
                        case 5:
                            $salida = '<tr class="listado1"><td>5</td><td>'.$fila[0].'</td><td>Solicitar cambio contrase&ntilde;a.</td><td colspan="18"><center>'.$fila[4].'</center></td></tr>';
                            break;
                        case 6:
                            $salida = '<tr class="listado2"><td>6</td><td>'.$fila[0].'</td><td>Archivo</td><td colspan="18"><center>'.$fila[5].'</center></td></tr>';
                            break;
                        case 7:
                            $salida = '<tr class="listado1"><td>7</td><td>'.$fila[0].'</td><td>Radicaci&oacute;n masiva.</td><td colspan="18"><center>'.$fila[6].'</center></td></tr>';
                            break;
                        case 8:
                            $salida = '<tr class="listado2"><td>8</td><td>'.$fila[0].'</td><td>Devoluci&oacute;n de correspondencia.</td><td colspan="18"><center>'.$fila[7].'</center></td></tr>';
                            break;
                        case 9:
                            $salida = '<tr class="listado1"><td>9</td><td>'.$fila[0].'</td><td>Anulaci&oacute;n de radicado.</td><td colspan="18"><center>'.$fila[8].'</center></td></tr>';
                            break;
                        case 10:
                            $salida = '<tr class="listado2"><td>10</td><td>'.$fila[0].'</td><td>Envi&oacute; de correspondencia.</td><td colspan="18"><center>'.$fila[9].'</center></td></tr>';
                            break;
                        case 11:
                            $salida = '<tr class="listado1"><td>11</td><td>'.$fila[0].'</td><td>Estad&iacute;sticas.</td><td colspan="18"><center>'.$fila[10].'</center></td></tr>';
                            break;
                        case 12:
                            $salida = '<tr class="listado2"><td>12</td><td>'.$fila[0].'</td><td>Tablas de retenci&oacute;n documental.</td><td colspan="18"><center>'.$fila[11].'</center></td></tr>';
                            break;
                        case 13:
                            $salida = '<tr class="listado1"><td>13</td><td>'.$fila[0].'</td><td>Prestamo de documentos.</td><td colspan="18"><center>'.$fila[12].'</center></td></tr>';
                            break;
                        case 14:
                            $salida = '<tr class="listado2"><td>14</td><td>'.$fila[0].'</td><td>Puede reasignar radicado.</td><td colspan="18"><center>'.$fila[13].'</center></td></tr>';
                            break;
                        case 15:
                            $salida = '<tr class="listado1"><td>15</td><td>'.$fila[0].'</td><td>Expedientes virtuales.</td><td colspan="18"><center>'.$fila[14].'</center></td></tr>';
                            break;
                        case 16:
                            $salida = '<tr class="listado2"><td>16</td><td>'.$fila[0].'</td><td>Ingresar por directorio activo.</td><td colspan="18"><center>'.$fila[15].'</center></td></tr>';
                            break;
                        case 17:
                            $salida = '<tr class="listado1"><td>17</td><td>'.$fila[0].'</td><td>Puede archivar radicado.</td><td colspan="18"><center>'.$fila[16].'</center></td></tr>';
                            break;
                        case 18:
                            $salida = '<tr class="listado2"><td>18</td><td>'.$fila[0].'</td><td>Puede borrar anexos.</td><td colspan="18"><center>'.$fila[17].'</center></td></tr>';
                            break;
                        case 19:
                            $salida = '<tr class="listado1"><td>19</td><td>'.$fila[0].'</td><td>Puede tipificar anexos.</td><td colspan="18"><center>'.$fila[18].'</center></td></tr>';
                            break;
                        case 20:
                            $salida = '<tr class="listado2"><td>20</td><td>'.$fila[0].'</td><td>Radicaci&oacute;n e-mail.</td><td colspan="18"><center>'.$fila[19].'</center></td></tr>';
                            break;
                        case 21:
                            $salida = '<tr class="listado1"><td>21</td><td>'.$fila[0].'</td><td>Pre-radicaci&oacute;n.</td><td colspan="18"><center>'.$fila[20].'</center></td></tr>';
                            break;
                    }
//                    $salida .= '</tr>';
                    return $salida;
                }

            } elseif ($codrol != 0 && $codpermisos == 2 && $codus == 0) {
                $queryE = "select ro.nomb_rol, "
                        . "tpr.sgd_tpr_descrip "
                        . "from roles ro "
                        . "inner join rol_tipos_doc roltp on roltp.cod_rol=ro.cod_rol "
                        . "inner join sgd_tpr_tpdcumento tpr on roltp.cod_tp_tpdcumento=tpr.sgd_tpr_codigo  "
                        . "where ro.cod_rol= $codrol";

                $titulos = array("#", "1#ROL", "2#TIPO DOCUMENTAL");

                function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
                    global $ruta_raiz, $encabezado, $krd;
                    switch ($numColumna) {
                        case 0:
                            $salida = $indice;
                            break;
                        case 1:
                            $salida = $fila[0];
                            break;
                        case 2:
                            $salida = $fila[1];
                            break;
                    }
                    return $salida;
                }

            }
        }break;
}
?>
