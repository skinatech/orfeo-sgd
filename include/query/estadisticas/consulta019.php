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

// Toma como criterio de busqueda la dependencia
if ($dependencia_busq == '99999' && ($tipoDocumento == '9999' or $tipoDocumento == '9998' or $tipoDocumento == '9997') && $codus == '0' && $tipoUsuario == '') {
    $sWhere = " ";
}
// Toma como criterio de busqueda de la dependencia siempre y cuando los otros datos no esten seleccionados
elseif ($dependencia_busq != '99999' && ($tipoDocumento == '9999' or $tipoDocumento == '9998' or $tipoDocumento == '9997') && $codus == '0' && $tipoUsuario == '') {
    $sWhere = " and ra.radi_depe_radi = '" . $dependencia_busq. "' ";
}
// Toma como criterio de busqueda el codigo del usuario seleccionado y la dependencia
elseif ($dependencia_busq != '99999' && $codus != '0' && ($tipoDocumento == '9999' or $tipoDocumento == '9998' or $tipoDocumento == '9997') && $tipoUsuario == '') {
    $sWhere = " and ra.radi_usua_radi = $codus and ra.radi_depe_radi = '" . $dependencia_busq. "'";
}
// Toma como criterio de busqueda el codigo del usuario seleccionado, la dependencia y el tipo de usuario
elseif ($dependencia_busq != '99999' && $codus != '0' && $tipoUsuario != '' && ($tipoDocumento == '9999' or $tipoDocumento == '9998' or $tipoDocumento == '9997')) {
    $sWhere = " and ra.radi_usua_radi = $codus and ra.radi_depe_radi = '" . $dependencia_busq. "' and ra.tipo_usario_interes = $tipoUsuario";
}
// Toma como criterio de busqueda del tipo documental, el codigo del usuario seleccionado, la dependencia y el tipo de usuario
elseif ($dependencia_busq != '99999' && ($tipoDocumento != '9999' or $tipoDocumento != '9998' or $tipoDocumento != '9997')  && $codus != '0' && $tipoUsuario != '') {
    $sWhere = " and ra.radi_usua_radi = $codus and ra.radi_depe_radi = '" . $dependencia_busq. "' and ra.tipo_usario_interes = $tipoUsuario and tp.sgd_tpr_codigo = $tipoDocumento";
}
// Toma como criterio de busqueda del tipo documental, el codigo del usuario seleccionado, la dependencia y todos los tipos de usuario
elseif ($dependencia_busq != '99999' && ($tipoDocumento != '9999' or $tipoDocumento != '9998' or $tipoDocumento != '9997')  && $codus != '0' && $tipoUsuario == '') {
    $sWhere = " and ra.radi_usua_radi = $codus and ra.radi_depe_radi = '" . $dependencia_busq. "' and tp.sgd_tpr_codigo = $tipoDocumento";
}
// Toma como criterio de busqueda del tipo documental, la dependencia y todos los tipos de usuario
elseif ($dependencia_busq != '99999' && ($tipoDocumento != '9999' or $tipoDocumento != '9998' or $tipoDocumento != '9997')  && $codus == '0' && $tipoUsuario == '') {
    $sWhere = " and ra.radi_depe_radi = '" . $dependencia_busq. "' and tp.sgd_tpr_codigo = $tipoDocumento";
}
// Toma como criterio de busqueda del tipo documental
elseif ($dependencia_busq == '99999' && ($tipoDocumento != '9999' or $tipoDocumento != '9998' or $tipoDocumento != '9997') && $codus == '0' && $tipoUsuario == '') {
    $sWhere = " and tp.sgd_tpr_codigo = $tipoDocumento";
}
// Toma como criterio de busqueda del tipo de usuario
elseif ($dependencia_busq == '99999' && ($tipoDocumento == '9999' or $tipoDocumento == '9998' or $tipoDocumento == '9997') && $codus == '0' && $tipoUsuario != '') {
    $sWhere = " and ra.tipo_usario_interes = $tipoUsuario";
}
else{
    $sWhere = " ";
}

switch ($db->driver) {
    case 'postgres': {
            $queryE = 'select '
                        . 'radi_nume_radi, '
                        . 'ra_asun, '
                        . 'radi_fech_radi, '
                        . 'de.depe_nomb, '
                        . 'us.usua_nomb, '
                        . 'tu.nombre_tipo_usuario, '
                        . 'tp.sgd_tpr_descrip '
                    . 'from radicado ra '
                    . 'inner join dependencia de on ra.radi_depe_radi=de.depe_codi '
                    . 'inner join usuario us '
                        . 'on ra.radi_usua_radi=us.usua_codi '
                        . 'and ra.radi_depe_radi=us.depe_codi '
                    . 'inner join tipo_usuario_grupo tu '
                        . 'on ra.tipo_usario_interes = tu.id_grupo_tipo_usuario '
                    . 'inner join sgd_tpr_tpdcumento tp '
                        . 'on ra.tdoc_codi =tp.sgd_tpr_codigo';
            $queryE .= " where " .$db->conn->SQLDate('Y/m/d', 'ra.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' and (ra.radi_nume_deri = '0' or ra.radi_nume_deri is null ) ". $sWhere;
        }break;

    case 'oci8': {
            $queryE = 'select '
                        . 'radi_nume_radi, '
                        . 'ra_asun, '
                        . 'radi_fech_radi, '
                        . 'de.depe_nomb, '
                        . 'us.usua_nomb, '
                        . 'tu.nombre_tipo_usuario, '
                        . 'tp.sgd_tpr_descrip '
                    . 'from radicado ra '
                    . 'inner join dependencia de on ra.radi_depe_radi=de.depe_codi '
                    . 'inner join usuario us '
                        . 'on ra.radi_usua_radi=us.usua_codi '
                        . 'and ra.radi_depe_radi=us.depe_codi '
                    . 'inner join tipo_usuario_grupo tu '
                        . 'on ra.tipo_usario_interes = tu.id_grupo_tipo_usuario '
                    . 'inner join sgd_tpr_tpdcumento tp '
                        . 'on ra.tdoc_codi =tp.sgd_tpr_codigo';
            $queryE .= " where " .$db->conn->SQLDate('Y/m/d', 'ra.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' ". $sWhere;
        }break;
}

$titulos = array("#", "1#N&uacute;mero Radicado", "2#Asunto", "3#Fecha Radicaci&oacute;n", "4#Dependencia Radic&oacute;", "5#Usuario Radic&oacute;", "6#Tipo Usuario", "7#Tipo Documental");

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
        case 4:
            $salida = $fila[3];
            break;
        case 5:
            $salida = $fila[4];
            break;
        case 6:
            $salida = $fila[5];
            break;
        case 7:
            $salida = $fila[6];
            break;
    }
    return $salida;
}

?>
