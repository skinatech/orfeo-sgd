<?php

$longitud_codigo_dependencia = $_SESSION['largoDependencia'];
/**
 * CONSULTA VERIFICACION PREVIA A LA RADICACION
 * , (' . $fecha_hoy . ' - a.sgd_fech_impres) as "Tiempo de Espera (Dias)"
 * ,(' . $fecha_hoy . ' - a.sgd_fech_impres) as "T_ESPERA"
 */
// By Skinatech - 14/08/2018
// Para la construcción del número de radicado, esto indica la parte inicial del radicado.
if ($estructuraRad == 'ymd') {
    $num = 9;
} elseif ($estructuraRad == 'ym') {
    $num = 7;
} else {
    $num = 5;
}

switch ($db->driver) {
    case 'mssql':
        $sqlConcat = $db->conn->Concat("depe_codi", "'-'", "depe_nomb");
        $fecha_hoy = $db->conn->sysTimeStamp;

        $isqlCs = 'select  count(*) as "Numero"
			from ANEXOS
			where 
			sgd_fech_impres <= ' . $db->conn->DBTimeStamp($fecha_fin) . '
			and  ANEX_ESTADO=3
			' . $where_like . '
			' . $where_depe . '
			and sgd_deve_codigo is null';
        $isql = 'select  
	        	a.radi_nume_salida as "Numero Radicacion"
			,a.anex_radi_nume  as "HID_anex_radi_nume"
			,' . $db->conn->substr . '(radi_nume_salida, ' . $num . ', ' . $longitud_codigo_dependencia . ') as "Dependencia"
			,' . $fech_devol . ' as "Fecha Devolucion"
			,' . $usua_devol . ' as "Usuario Realiza Devolucion"
			
			from ANEXOS a
			where
			sgd_fech_impres <= ' . $db->conn->DBTimeStamp($fecha_fin) . '
			and a.ANEX_ESTADO=3
			' . $where_like . '
			' . $where_depe . '
			and a.sgd_deve_codigo is null';
        $isqlF = 'select  
	        	a.radi_nume_salida 
			,a.anex_radi_nume 
			, a.sgd_dir_tipo
			,' . $db->conn->substr . '(radi_nume_salida, ' . $num . ', ' . $longitud_codigo_dependencia . ') as "Dependencia"
			,(' . $fecha_hoy . ' - a.sgd_fech_impres) as "T_ESPERA"
			from ANEXOS a
			where 
			sgd_fech_impres <= ' . $db->conn->DBTimeStamp($fecha_fin) . '
			and  ANEX_ESTADO=3 
			' . $where_like . '
			' . $where_depe . '
			and sgd_deve_codigo is null';

        $isqlU = 'update ANEXOS
			set anex_estado=2,
			sgd_deve_codigo=99
			where ANEX_ESTADO=3 AND anex_radi_nume=\'' . $anex_radi_nume . '\'
			' . $where_depe . '
			 and sgd_deve_codigo is null ';
        break;
    case 'mysql':
        $sqlConcat = $db->conn->Concat("depe_codi", "'-'", "depe_nomb");
        $fecha_hoy = $db->conn->sysTimeStamp;

        $isqlC = 'select  count(*) as "Numero"
			from ANEXOS
			where 
			sgd_fech_impres <= ' . $db->conn->DBTimeStamp($fecha_fin) . '
			and  ANEX_ESTADO=3
			' . $where_like . '
			' . $where_depe . '
			and sgd_deve_codigo is null';
        $isql = 'select  
	        	a.radi_nume_salida as "Numero Radicacion"
			,a.anex_radi_nume  as "HID_anex_radi_nume"
			,' . $db->conn->substr . '(radi_nume_salida, ' . $num . ', ' . $longitud_codigo_dependencia . ') as "Dependencia"
			,' . $fech_devol . ' as "Fecha Devolucion"
			,' . $usua_devol . ' as "Usuario Realiza Devolucion"
			, (' . $fecha_hoy . ' - a.sgd_fech_impres) as "Tiempo de Espera (Dias)"
			from ANEXOS a
			where
			sgd_fech_impres <= ' . $db->conn->DBTimeStamp($fecha_fin) . '
			and a.ANEX_ESTADO=3
			' . $where_like . '
			' . $where_depe . '
			and a.sgd_deve_codigo is null';
        $isqlF = 'select  
	        	a.radi_nume_salida 
			,a.anex_radi_nume 
			, a.sgd_dir_tipo
			,' . $db->conn->substr . '(radi_nume_salida, ' . $num . ', ' . $longitud_codigo_dependencia . ') as "Dependencia"
			,(' . $fecha_hoy . ' - a.sgd_fech_impres) as "T_ESPERA"
			from ANEXOS a
			where 
			sgd_fech_impres <= ' . $db->conn->DBTimeStamp($fecha_fin) . '
			and  ANEX_ESTADO=3 
			' . $where_like . '
			' . $where_depe . '
			and sgd_deve_codigo is null';

        $isqlU = 'update ANEXOS
			set anex_estado=2,
			sgd_deve_codigo=99
			where ANEX_ESTADO=3 AND anex_radi_nume=\'' . $anex_radi_nume . '\'
			' . $where_depe . '
			 and sgd_deve_codigo is null ';
        break;
    case 'oracle':
    case 'oci8':
$sqlConcat = $db->conn->Concat("depe_codi", "'-'", "depe_nomb");
        $fecha_hoy = $db->conn->sysTimeStamp;

        $isqlC = 'select  count(*) as "Numero"
			from ANEXOS
			where 
			sgd_fech_impres <= ' . $db->conn->DBTimeStamp($fecha_fin) . '
			and  ANEX_ESTADO=3
			' . $where_like . '
			' . $where_depe . '
			and sgd_deve_codigo is null';
        $isql = 'select  
	        	a.radi_nume_salida as "Numero Radicacion"
			,a.anex_radi_nume  as "HID_anex_radi_nume"
			,' . $db->conn->substr . '(radi_nume_salida, ' . $num . ', ' . $longitud_codigo_dependencia . ') as "Dependencia"
			,' . $fech_devol . ' as "Fecha Devolucion"
			,' . $usua_devol . ' as "Usuario Realiza Devolucion"
			, (' . $fecha_hoy . ' - a.sgd_fech_impres) as "Tiempo de Espera (Dias)"
			from ANEXOS a
			where
			sgd_fech_impres <= ' . $db->conn->DBTimeStamp($fecha_fin) . '
			and a.ANEX_ESTADO=3
			' . $where_like . '
			' . $where_depe . '
			and a.sgd_deve_codigo is null';
        $isqlF = 'select  
	        	a.radi_nume_salida 
			,a.anex_radi_nume 
			, a.sgd_dir_tipo
			,' . $db->conn->substr . '(radi_nume_salida, ' . $num . ', ' . $longitud_codigo_dependencia . ') as "Dependencia"
			,(' . $fecha_hoy . ' - a.sgd_fech_impres) as "T_ESPERA"
			from ANEXOS a
			where 
			sgd_fech_impres <= ' . $db->conn->DBTimeStamp($fecha_fin) . '
			and  ANEX_ESTADO=3 
			' . $where_like . '
			' . $where_depe . '
			and sgd_deve_codigo is null';

        $isqlU = 'update ANEXOS
			set anex_estado=2,
			sgd_deve_codigo=99
			where ANEX_ESTADO=3 AND anex_radi_nume=\'' . $anex_radi_nume . '\'
			' . $where_depe . '
			 and sgd_deve_codigo is null ';
        break;
    default:
        $sqlConcat = $db->conn->Concat("depe_codi", "'-'", "depe_nomb");
        $fecha_hoy = $db->conn->sysTimeStamp;

        $isqlC = 'select  count(*) as "Numero"
			from ANEXOS
			where 
			sgd_fech_impres <= ' . $db->conn->DBTimeStamp($fecha_fin) . '
			and  ANEX_ESTADO=3
			' . $where_like . '
			' . $where_depe . '
			and sgd_deve_codigo is null';
        $isql = 'select  
	        	a.radi_nume_salida as "Numero Radicacion"
			,a.anex_radi_nume  as "HID_anex_radi_nume"
			,' . $db->conn->substr . '(radi_nume_salida, ' . $num . ', ' . $longitud_codigo_dependencia . ') as "Dependencia"
			,' . $fech_devol . ' as "Fecha Devolucion"
			,' . $usua_devol . ' as "Usuario Realiza Devolucion"
			, (' . $fecha_hoy . ' - a.sgd_fech_impres) as "Tiempo de Espera (Dias)"
			from ANEXOS a
			where
			sgd_fech_impres <= ' . $db->conn->DBTimeStamp($fecha_fin) . '
			and a.ANEX_ESTADO=3
			' . $where_like . '
			' . $where_depe . '
			and a.sgd_deve_codigo is null';
        $isqlF = 'select  
	        	a.radi_nume_salida 
			,a.anex_radi_nume 
			, a.sgd_dir_tipo
			,' . $db->conn->substr . '(radi_nume_salida, ' . $num . ', ' . $longitud_codigo_dependencia . ') as "Dependencia"
			,(' . $fecha_hoy . ' - a.sgd_fech_impres) as "T_ESPERA"
			from ANEXOS a
			where 
			sgd_fech_impres <= ' . $db->conn->DBTimeStamp($fecha_fin) . '
			and  ANEX_ESTADO=3 
			' . $where_like . '
			' . $where_depe . '
			and sgd_deve_codigo is null';

        $isqlU = 'update ANEXOS
			set anex_estado=2,
			sgd_deve_codigo=99
			where ANEX_ESTADO=3 AND anex_radi_nume=\'' . $anex_radi_nume . '\'
			' . $where_depe . '
			 and sgd_deve_codigo is null ';
}
?>
