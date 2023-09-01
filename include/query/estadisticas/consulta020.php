<?php

/*****
 * @autor Jenny Gamez
 * Orfeo 6.0
 * Estadistica que muestra los radicados de PQRS que se encuentran en cada uno de los estados segun como corresponde y adicional indica
 * si el mismo se encuentra vencido porque no se haya mandado a archivar
 * ACTUALMENTE SOLO ESTA EN POSTGRES
 ****/

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

if ($estadoRadicado != 'TODOS' and $estadoRadicado != 'oportuna' and $estadoRadicado != 'fuera') {
    $sWhere .= " and es.esta_codi = $estadoRadicado";
} 

// Radicados que fueron respondidos a tiempo
if ($estadoRadicado == 'oportuna') {
    $sWhere .= " and an.fecha_rec_remi <= ra.fech_vcmto";
}

// Radicados que fueron respondidos luego de la fecha limite
if ($estadoRadicado == 'fuera') {
    $sWhere .= " and an.fecha_rec_remi > ra.fech_vcmto";
}

// // Servicio
// if($servicios != 'TODOS'){
//     $sWhereservicios = " and sr.id_servicio_pqrs = ".$servicios." ";
// }else{
//     $sWhereservicios = "";
// }
// $queryEServicios = " left join servicios_pqrs sr ON ra.servicio_pqr=sr.id_servicio_pqrs ";

// //Centros de atención
// if($centro  != 'TODOS'){
//     $sWherecentro = " and gi.id_grupo_interes = ".$centro." ";
// }else{
//     $sWherecentro = "";
// }
// $queryECentro = " left join grupo_interes gi ON ra.grupo_interes=gi.id_grupo_interes ";

if (trim($tipoRadicado) != '') {
    $sWhere .= " and ra.radi_nume_radi like '%".$tipoRadicado."' and (anex_radicado=1 or an.anex_radi_nume is null or an.radi_nume_salida is null) ";
} else {
    $sWhere .= " and ( ra.radi_nume_radi like '%2' or ra.radi_nume_radi like '%4' ) and (anex_radicado=1 or an.anex_radi_nume is null or an.radi_nume_salida is null) "; // Entrada o PQRS
}

switch ($db->driver) {
    // ra.ra_asun, de.depe_nomb as dependencia_creadora, 
    case 'postgres': {
            $queryE = "select distinct
                        tp.sgd_tpr_descrip      as \"TIPO_DOCUMENTAL\",
                        ra.radi_fech_radi       as \"FECHA_RADICACION\",
                        ra.fech_vcmto           as \"FECHA_VENCIMIENTO\",
                        ra.radi_nume_radi       as \"NUMERO_RADICADO\",
                        ra.ra_asun              as \"ASUNTO\",
                        d.sgd_dir_nomremdes     as \"REMITENTE/DESTINATARIO\",
                        deac.depe_nomb          as \"DEPENDENCIA_ACTUAL\", 
                        an.fecha_rec_remi	    as \"FECHA_RESPUESTA\",
                        mr.mrec_desc            as \"MEDIO_RECEPCION\",
                        CASE 
                            WHEN an.anex_tipo_envio = 1 THEN 'Físico'
                            WHEN an.anex_tipo_envio = 0 THEN 'Sin envio'
                            WHEN an.anex_tipo_envio = 2 THEN 'Correo Electrónico'
                        END                     as \"FORMA_ENVIO\",
                        CASE 
                            WHEN deac.depe_codi = '0999' 
                                THEN deperes.depe_nomb 
                                ELSE deac.depe_nomb 
                        END                     as \"DEPENDENCIA_RESPONSABLE\",
                        CASE 
                            WHEN an.radi_nume_salida is null 
                                THEN 'Sin respuesta' 
                                ELSE an.radi_nume_salida 
                        END                     as \"RESPUESTA\", 
                        CASE 
                            WHEN ra.radi_estado_pqrs is null
                                THEN 'No aplica'
                                ELSE es.esta_desc
                        END                     as \"ESTADO\",
                        ra.sgd_spub_codigo      as \"HID_SGD_SPUB_CODIGO\",
                        u.usua_login            as \"HID_USUA_LOGIN\",
                        u.usua_nivel_consulta   as \"HID_USUA_NIVEL_CONSULTA\"
                    from radicado ra 
                        inner join dependencia de on ra.radi_depe_radi=de.depe_codi 
                        inner join dependencia deac on ra.radi_depe_actu=deac.depe_codi 
                        inner join sgd_tpr_tpdcumento tp on ra.tdoc_codi =tp.sgd_tpr_codigo 
                        inner join medio_recepcion mr on ra.mrec_codi=mr.mrec_codi 
                        inner join usuario as u on ra.radi_usua_actu = u.usua_codi and ra.radi_depe_actu = u.depe_codi
                        left join estado es on es.esta_codi=ra.radi_estado_pqrs
                        left join sgd_dir_drecciones d on ra.radi_nume_radi=d.radi_nume_radi
                        left join anexos an on ra.radi_nume_radi=an.anex_radi_nume 
                        inner join sgd_dt_radicado dt on ra.radi_nume_radi=dt.radi_nume_radi 
                        left join dependencia deperes on deperes.depe_codi=ra.radi_depe_ante 
                        ";

            $queryE .= " where " .$db->conn->SQLDate('Y/m/d', 'ra.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' ". $sWhere. $sWherecentro. $sWhereservicios;

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

$titulos = array("#", "1#Tipo Documental", "2#Fecha Radicación", "3#Radicado", "4#Medio Recepción", "5#Asunto", "6#Remitente/Destinatario", "7#Dependencia Actual", "8#Dependencia Responsable", "9#Respuesta",  "10#Fecha Respuesta", "11#Fecha Vencimiento", "12#Forma Envío", "13#Estado");

function pintarEstadistica($fila, $indice, $numColumna){
    global $ruta_raiz, $_POST, $_GET, $krd, $ambiente;

    $tipo_documental = $fila['TIPO_DOCUMENTAL'];
    $numero_radicado = $fila['NUMERO_RADICADO'];
    $respuesta = $fila['RESPUESTA'];
    $remi_des = $fila['REMITENTE/DESTINATARIO'];
    $dependencia_responsable = $fila['DEPENDENCIA_RESPONSABLE'];
    $dependencia_actual = $fila['DEPENDENCIA_ACTUAL'];
    $asunto = $fila['ASUNTO'];
    $fecha_radicacion =  date("Y-m-d", strtotime($fila['FECHA_RADICACION']));  
    $fecha_rec_remi = $fila['FECHA_RESPUESTA'];
    $fech_vcmto =  date("Y-m-d", strtotime($fila['FECHA_VENCIMIENTO']));
    $estado = $fila['ESTADO'];
    $medioRecepcion = $fila['MEDIO_RECEPCION'];
    $formaEnvio = isset($fila['FORMA_ENVIO']) ? $fila['FORMA_ENVIO'] : 'Sin envio';
    $servicio = $fila['SERVICIO'];
    $centro_salud = $fila['CENTRO_SALUD'];
    $retroalimentacion = $fila['RETROALIMENTACION'];

    $fecha1 = new DateTime($fecha_radicacion);
    $fecha2 = new DateTime($fecha_rec_remi);

    if(!empty($fecha_rec_remi)){
        $promedio_respuesta = $fecha1->diff($fecha2);
        $tiempo_promedio = $promedio_respuesta->format('%R%a días');
    }else{
        $tiempo_promedio = "";
    }

    $verImg = ($fila['HID_SGD_SPUB_CODIGO'] == 1) ? ($fila['HID_USUA_LOGIN'] != $_SESSION['usua_nomb'] ? false : true) : ($fila['HID_USUA_NIVEL_CONSULTA'] > $_SESSION['nivelus'] ? false : true);


    $salida = "";
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $tipo_documental;
            break;
        case 3:
            $salida = $numero_radicado;
            break;
        case 4:
            $salida = $medioRecepcion;
            break;    
        case 5:
            $salida = $asunto;
            break;
        case 6:
            $salida = $remi_des;
            break;
        case 7:
            $salida = $dependencia_actual;
            break;
        case 8:
            $salida = $dependencia_responsable;
            break;
        case 2:
            if ($verImg) {
                $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $numero_radicado . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" >" . $fecha_radicacion . "</a>";
            } else {
                $salida = $fecha_radicacion;
            }
            break;
        case 11:
            $salida = $fech_vcmto;
            break;
        case 9:
            $salida = '<b>'.$respuesta.'</b>';
            break;
        case 10:
            if($fecha_rec_remi != null){
                $salida = '<b>'.$fecha_rec_remi.'</b>';
            }else{
                $salida = 'sin respuesta';
            }
            break;
        case 13:
            $salida = $estado;
            break;
        case 12:
            if($formaEnvio == 'Sin envio'){
                $salida = $formaEnvio;
            }else{
                $salida = '<b>'.$formaEnvio.'</b>';
            }
            
            break; 
        // case 14:
        //     $salida = $servicio;
        //     break;
        // case 15:
        //     $salida = $centro_salud;
        //     break;  
        // case 16:
        //     if($retroalimentacion == 1){ $nameValor = 'Preventivo'; }
        //     elseif($retroalimentacion == 2){ $nameValor = 'Correctivo'; }
        //     elseif($retroalimentacion == 3){ $nameValor = 'Mejorar'; }
        //     elseif($retroalimentacion == 4){ $nameValor = 'Tramite/Consulta'; }
        //     else{ $nameValor = 'Sin retroalimentación'; }

        //     $salida = $nameValor;
        //     break;  
        default:$salida = false;
    }
    return $salida;
}
?>
