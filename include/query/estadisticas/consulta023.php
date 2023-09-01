<?php

/*****
 * @autor Jenny Gamez
 * Orfeo 6.0
 * Estadistica que muestra los radicados de PQRS que se encuentran en cada uno de los estados segun como corresponde y adicional indica
 * si el mismo se encuentra vencido porque no se haya mandado a archivar
 * ACTUALMENTE SOLO ESTA EN POSTGRES
 ****/

if($conrespuesta == 1){
    $sWconRespuesta = " and an.radi_nume_salida is not null and an.radi_nume_salida <> '0' ";
}
//Radicados sin respuesta
elseif($conrespuesta == 2){
    $sWconRespuesta = " and an.radi_nume_salida = '0' or an.radi_nume_salida is null";
}
else{
    $sWconRespuesta = " ";
}

// Toma como criterio de busqueda la dependencia
if ($dependencia_busq == '99999' && ($tipoDocumento == '9999' or $tipoDocumento == '9998' or $tipoDocumento == '9997') && $medioRecepcion == '9999') {
    $sWhere = "  ";
}
// Toma como criterio de busqueda de la dependencia 
elseif ($dependencia_busq != '99999' && ($tipoDocumento == '9999' or $tipoDocumento == '9998' or $tipoDocumento == '9997')  && $medioRecepcion == '9999') {
    $sWhere = " and ra.radi_depe_actu = '" . $dependencia_busq. "' ";
}
// Toma como criterio de busqueda del tipo documental
elseif ($dependencia_busq == '99999' && ($tipoDocumento != '9999' or $tipoDocumento != '9998' or $tipoDocumento != '9997')  && $medioRecepcion == '9999') {
    $sWhere = " and tp.sgd_tpr_codigo = $tipoDocumento";
}
// Toma como criterio de busqueda el medio de recepción
elseif ($dependencia_busq == '99999' && ($tipoDocumento == '9999' or $tipoDocumento == '9998' or $tipoDocumento == '9997')  && $medioRecepcion != '9999') {
    $sWhere = " and  ra.mrec_codi= $medioRecepcion";
}
// Toma como criterio de busqueda del tipo documental, y la dependencia
elseif ($dependencia_busq != '99999' && ($tipoDocumento != '9999' or $tipoDocumento != '9998' or $tipoDocumento != '9997')  && $medioRecepcion == '9999') {
    $sWhere = " and ra.radi_depe_actu = '" . $dependencia_busq. "' and tp.sgd_tpr_codigo = $tipoDocumento";
}
// Toma como criterio de busqueda la dependencia y el medio de recepción
elseif ($dependencia_busq != '99999' && ($tipoDocumento == '9999' or $tipoDocumento == '9998' or $tipoDocumento == '9997')  && $medioRecepcion != '9999') {
    $sWhere = " and  ra.mrec_codi= $medioRecepcion  and ra.radi_depe_actu = '" . $dependencia_busq. "'";
}
// Toma como criterio de busqueda el medio de recepción y el tipo documental
elseif ($dependencia_busq == '99999' && ($tipoDocumento != '9999' or $tipoDocumento != '9998' or $tipoDocumento != '9997')  && $medioRecepcion != '9999') {
    $sWhere = " and  ra.mrec_codi= $medioRecepcion and tp.sgd_tpr_codigo = " . $tipoDocumento;
}
// Toma como criterio de busqueda del tipo documental, la dependencia y medio de recepción
elseif ($dependencia_busq != '99999' && ($tipoDocumento != '9999' or $tipoDocumento != '9998' or $tipoDocumento != '9997')  && $medioRecepcion != '9999') {
    $sWhere = " and ra.radi_depe_actu = '" . $dependencia_busq. "' and tp.sgd_tpr_codigo = $tipoDocumento and ra.mrec_codi= $medioRecepcion";
}
else{
    $sWhere = " ";
}

// Servicio
if($servicios != 'TODOS'){
    $sWhereservicios = " and sr.id_servicio_pqrs = ".$servicios." ";
}else{
    $sWhereservicios = "";
}

//Centros de atención
if($centro  != 'TODOS'){
    $sWherecentro = " and gi.id_grupo_interes = ".$centro." ";
}else{
    $sWherecentro = "";
}

switch ($db->driver) {
    // ra.ra_asun, de.depe_nomb as dependencia_creadora, 
    case 'postgres': {
            $queryE = "select 
                        ra.radi_nume_radi as \"NUMERO_RADICADO\", 
                        gi.nombre_grupo_interes as \"CENTRO_SALUD\",  
                        ra.radi_fech_radi as \"FECHA_RADICACION\", 
                        ra.fecha_queja as \"FECHA_QUEJA\", 
                        d.sgd_dir_nomremdes as \"REMITENTE/DESTINATARIO\", 
                        d.sgd_ciu_eps	 as \"EPS\", 
                        mr.mrec_desc as \"MEDIO_RECEPCION\", 
                        sr.nombre_servicio_pqrs as \"SERVICIO\", 
                        ra.ra_asun as \"DESCRIPCION_RADICADO\", 
                        tp.sgd_tpr_descrip as \"TIPO_DOCUMENTAL\", 
                        an.anex_radi_fech as \"FECHA_RESPUESTA\", 
                        an.radi_nume_salida as \"RESPUESTA\", 
                        deac.depe_nomb as \"DEPENDENCIA_ACTUAL\", 
                        ra.fech_vcmto as \"FECHA_VENCIMIENTO\" 
                    from radicado ra 
                        inner join sgd_tpr_tpdcumento tp on ra.tdoc_codi =tp.sgd_tpr_codigo 
                        inner join medio_recepcion mr on ra.mrec_codi=mr.mrec_codi 
                        inner join servicios_pqrs sr ON ra.servicio_pqr=sr.id_servicio_pqrs 
                        inner join grupo_interes gi ON ra.grupo_interes=gi.id_grupo_interes 
                        left join anexos an on ra.radi_nume_radi=an.anex_radi_nume 
                        inner join dependencia deac on ra.radi_depe_actu=deac.depe_codi 
                        left join sgd_dir_drecciones d on ra.radi_nume_radi=d.radi_nume_radi";

            $queryE .= " where " .$db->conn->SQLDate('Y/m/d', 'ra.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' and (ra.radi_nume_radi like '%".$tipoRadicadoPqr."' or ra.radi_nume_radi like '%2') ".$sWconRespuesta. $sWhereservicios.$sWherecentro .$sWhere;
            
        }break;
}

$titulos = array("#", "1#Radicado", "2#Centro de Salud", "3#Fecha Radicación", "4#Fecha Queja", "5#Remitente/destinatario", "6#Eps", "7#Medio Recepción", "8#Servicio", "9#Descripción Radicado", "10#Tipo Documental", "11#Fecha Respuesta", "12#Respuesta", "13#Dependencia Actual", "14#Fecha Vencimiento");

function pintarEstadistica($fila, $indice, $numColumna){
    global $ruta_raiz, $_POST, $_GET, $krd, $ambiente;

    $tipo_documental = $fila['TIPO_DOCUMENTAL'];
    $numero_radicado = $fila['NUMERO_RADICADO'];
    $respuesta = $fila['RESPUESTA'];
    $remi_des = $fila['REMITENTE/DESTINATARIO'];
    $dependencia_actual = $fila['DEPENDENCIA_ACTUAL'];
    $medio_recepcion = $fila['MEDIO_RECEPCION'];
    $fecha_radicacion =  $fila['FECHA_RADICACION'];  
    $fech_vcmto =  $fila['FECHA_VENCIMIENTO'];
    $centro_salud = $fila['CENTRO_SALUD'];
    $eps = $fila['EPS'];
    $servicio = $fila['SERVICIO'];
    $descripcion_radicado = $fila['DESCRIPCION_RADICADO'];
    $fecha_respuesta = $fila['FECHA_RESPUESTA'];
    $fecha_queja = $fila['FECHA_QUEJA'];

    $date = new DateTime($fecha_radicacion);
    $datequeja = new DateTime($fecha_queja);
    $datevencimiento = new DateTime($fech_vcmto);
    $daterespuesta = new DateTime($fecha_respuesta);
    //echo $date->format('Y-m-d H:i:s');

    $salida = "";
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $numero_radicado;
            break;
        case 2:
            $salida = $centro_salud;
            break;
        case 3:
            $salida = $date->format('Y-m-d H:i:s');
            break;
        case 4:
            if($fecha_queja != ''){
                $salida = $datequeja->format('Y-m-d H:i:s');
            }else{
                $salida = 'N/A';
            }
            //$salida = $fecha_queja;
            break;
        case 5:
            $salida = $remi_des;
            break;
        case 6:
            $salida = $eps;
            break;
        case 7:
            $salida = $medio_recepcion;
            break;
        case 8:
            $salida = $servicio;
            break;
        case 9:
            $salida = $descripcion_radicado;
            break;
        case 10:
            $salida = $tipo_documental;
            break;
        case 11:
            if($fecha_respuesta != ''){
                $salida = $daterespuesta->format('Y-m-d H:i:s');
            }else{
                $salida = 'Sin respuesta';
            }
            //$salida = $fecha_respuesta;
            break;
        case 12:
            if($respuesta != ''){
                $salida = $respuesta;
            }else{
                $salida = 'Sin respuesta';
            }
            //$salida = $respuesta;
            break;
        case 13:
            $salida = $dependencia_actual;
            break;
        case 14:
            $salida = $datevencimiento->format('Y-m-d H:i:s');
                break;
        default:$salida = false;
    }
    return $salida;
}
?>
