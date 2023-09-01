<?php

/*****
 * @autor Jenny Gamez
 * Orfeo 6.0
 * Estadistica que muestra los radicados de PQRS que se encuentran en cada uno de los estados segun como corresponde y adicional indica
 * si el mismo se encuentra vencido porque no se haya mandado a archivar
 * ACTUALMENTE SOLO ESTA EN POSTGRES
 ****/

 $coltp3Esp = '"' . $tip3Nombre[3][2] . '"';
if (!$orno)
    $orno = 2;

// Toma como criterio de busqueda la dependencia
if ($dependencia_busq == '99999' && ($tipoDocumento == '9999' or $tipoDocumento == '9998' or $tipoDocumento == '9997')) {
    $sWhere = " ";
}
// Toma como criterio de busqueda de la dependencia
elseif ($dependencia_busq != '99999' && ($tipoDocumento == '9999' or $tipoDocumento == '9998' or $tipoDocumento == '9997') && $codus == '0') {
    $sWhere = " and ra.radi_depe_actu = '" . $dependencia_busq. "' ";
}
// Toma como criterio de busqueda de usuario  y la dependencia
elseif ($dependencia_busq != '99999' && ($tipoDocumento == '9999' or $tipoDocumento == '9998' or $tipoDocumento == '9997') && $codus != '0') {
    $sWhere = " and ra.radi_usua_actu = $codus and ra.radi_depe_actu = '" . $dependencia_busq. "'";
}
// Toma como criterio de busqueda del tipo documental, el usuario y la dependencia
elseif ($dependencia_busq != '99999' && ($tipoDocumento != '9999' or $tipoDocumento != '9998' or $tipoDocumento != '9997') && $codus != '0') {
    $sWhere = " and ra.radi_usua_actu = $codus and ra.radi_depe_actu = '" . $dependencia_busq. "' and tp.sgd_tpr_codigo = $tipoDocumento";
}
// Toma como criterio de busqueda del tipo documental
elseif ($dependencia_busq == '99999' && ($tipoDocumento != '9999' or $tipoDocumento != '9998' or $tipoDocumento != '9997') && $codus == '0') {
    $sWhere = " and tp.sgd_tpr_codigo = $tipoDocumento";
}
else{
    $sWhere = " ";
}

switch ($db->driver) {
    case 'postgres': {
            $queryE = "select 
                        de.depe_nomb, 
                        us.usua_nomb, 
                        tp.sgd_tpr_descrip, 
                        count(radi_estado_pqrs) as cantidad, 
                        es.esta_desc,
                        us.usua_codi,
                        de.depe_codi,
                        ra.tdoc_codi,
                        ra.radi_estado_pqrs
                    from radicado ra 
                        inner join dependencia de on ra.radi_depe_actu=de.depe_codi 
                        inner join usuario us 
                            on ra.radi_usua_actu=us.usua_codi 
                            and ra.radi_depe_actu=us.depe_codi 
                        inner join sgd_tpr_tpdcumento tp 
                            on ra.tdoc_codi =tp.sgd_tpr_codigo 
                        inner join estado es 
                            on es.esta_codi=ra.radi_estado_pqrs";

            $queryE .= " where " .$db->conn->SQLDate('Y/m/d', 'ra.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' and radi_nume_radi like '%4' ". $sWhere;
            $queryE .= " group by de.depe_nomb, us.usua_nomb, tp.sgd_tpr_descrip, radi_estado_pqrs, es.esta_desc, us.usua_codi, de.depe_codi, ra.tdoc_codi, ra.radi_estado_pqrs";

            /** CONSULTA PARA VER DETALLES **/
            $queryEDetalle = "select 
                                ra.radi_nume_radi, 
                                ra.ra_asun, 
                                d.SGD_DIR_NOMREMDES, 
                                ra.radi_fech_radi, 
                                ra.fech_vcmto, 
                                es.esta_desc, 
                                tp.sgd_tpr_descrip,
                                de.depe_nomb, 
                                us.usua_nomb
                            from radicado ra 
                                inner join dependencia de on ra.radi_depe_actu=de.depe_codi 
                                inner join usuario us on ra.radi_usua_actu=us.usua_codi and ra.radi_depe_actu=us.depe_codi 
                                inner join sgd_tpr_tpdcumento tp on ra.tdoc_codi =tp.sgd_tpr_codigo 
                                inner join estado es on es.esta_codi=ra.radi_estado_pqrs 
                                inner join SGD_DIR_DRECCIONES d on ra.radi_nume_radi=d.radi_nume_radi";

            $sWhereDetalle = " and radi_estado_pqrs=".$_GET['estado']." and ra.radi_depe_actu='".$_GET['depe_codi']."' and ra.radi_usua_actu=".$_GET['usua_codi']." and tdoc_codi=".$_GET['tipoDocumento'];
            $queryEDetalle .= " where " .$db->conn->SQLDate('Y/m/d', 'ra.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' and ra.radi_nume_radi like '%".$tipoRadicadoPqr."' ". $sWhereDetalle;
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

if (isset($_GET['genDetalle']) && $_GET['denDetalle'] = 1) {
    $titulos = array("#", "1#Radicado", "2#Asunto", "3#Remitente/Destinatario", "4#Fecha Radicaci&oacute;n", "5#Fecha Vencimiento", "6#Estado", "8#Tipo Documental", "9#Dependencia Actual", "10#Usuario Actual");
} else {
    $titulos = array("#", "1#Dependencia Radic&oacute;", "2#Usuario Radic&oacute;", "3#Tipo Documental", "4#Cantidad", "5#Estado");
}

function pintarEstadistica($fila, $indice, $numColumna){
    global $ruta_raiz, $_POST, $_GET, $krd, $ambiente;

    $depe_nomb = $fila['DEPE_NOMB'];
    $usua_nomb = $fila['USUA_NOMB'];
    $tipo_documental = $fila['SGD_TPR_DESCRIP'];
    $cantidad = $fila['CANTIDAD'];
    $estado = $fila['ESTA_DESC'];
    $depe_codi = $fila['DEPE_CODI'];
    $usua_codi = $fila['USUA_CODI'];
    $tdoc_codi = $fila['TDOC_CODI'];
    $radi_estado_pqrs = $fila['RADI_ESTADO_PQRS'];

    $salida = "";
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $depe_nomb;
            break;
        case 2:
            $salida = $usua_nomb;
            break;
        case 3:
            $salida = $tipo_documental;
            break;
        case 4:
            $datosEnvioDetalle = "tipoEstadistica=" . $_GET['tipoEstadistica'] . "&amp;genDetalle=1&amp;usua_codi=" . $usua_codi . "&amp;depe_codi=" . $depe_codi . "&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;estado=" . $radi_estado_pqrs . "&amp;tipoDocumento=" . $tdoc_codi;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}&amp;krd={$krd}\"  target=\"detallesSec\" >" . $cantidad . "</a>";
            //$salida = $cantidad;
            break;
        case 5:
            $salida = $estado;
            break;
        default:$salida = false;
    }
    return $salida;
}

function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $ruta_raiz, $_POST, $_GET, $krd, $ambiente;

    $radi_nume_radi = $fila['RADI_NUME_RADI'];
    $ra_asunto = $fila['RA_ASUN'];
    $sgd_dir_nomremdes = $fila['SGD_DIR_NOMREMDES'];
    $radi_fech_radi = $fila['RADI_FECH_RADI'];
    $fech_vcmto = $fila['FECH_VCMTO'];
    $esta_desc = $fila['ESTA_DESC'];
    $sgd_tpr_descrip = $fila['SGD_TPR_DESCRIP'];
    $depe_nomb = $fila['DEPE_NOMB'];
    $usua_nomb = $fila['USUA_NOMB'];

    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $radi_nume_radi;
            break;
        case 2:
            $salida = $ra_asunto;
            break;
        case 3:
            $salida = $sgd_dir_nomremdes;
            break;
        case 4:
            $salida = $radi_fech_radi;
            break;
        case 5:
            $salida = $fech_vcmto;
            break;
        case 6:
            $salida = $esta_desc;
            break;
        case 7:
            $salida = $sgd_tpr_descrip;
            break;
        case 8:
            $salida = $depe_nomb;
            break;
        case 9:
            $salida = $usua_nomb;
            break;
    }
    return $salida;
}

?>
