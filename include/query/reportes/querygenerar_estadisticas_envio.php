<?php

/**
 * CONSULTA VERIFICACION PREVIA A LA RADICACION
 */
// By Skinatech - 14/08/2018
// Para la construcción del número de radicado, esto indica la parte inicial del radicado.
if ($estructuraRad == 'ymd'){
    $num = 9;
}elseif ($estructuraRad == 'ym') {
    $num = 7;
}else {
    $num = 5;
}
                        
switch ($db->driver) {
    case 'mssql':
        $query = 'select c.depe_nomb,
                        a.radi_nume_sal,
                        a.sgd_renv_nombre,
                        a.sgd_renv_dir ,
                        a.sgd_renv_mpio,
                        a.sgd_renv_depto,
                        a.sgd_renv_fech,
                        a.sgd_renv_planilla,
                        a.sgd_renv_cantidad,
                        a.sgd_renv_valor,
                        a.sgd_deve_fech,
                        d.sgd_fenv_descrip
                from SGD_RENV_REGENVIO a, dependencia c, SGD_FENV_FRMENVIO d  ';

        $fecha_mes = substr($fecha_ini, 0, 7);
        // Si la variable $generar_listado_existente viene entonces este if genera la planilla existente
        $where_isql = ' WHERE a.sgd_renv_fech BETWEEN
                            ' . $db->conn->DBTimeStamp($fecha_ini) . ' and ' . $db->conn->DBTimeStamp($fecha_fin) . '
                            and ' . $db->conn->substr . '(a.radi_nume_sal, '.$num.',' . $longitud_codigo_dependencia . ')=c.depe_codi
                            and a.sgd_fenv_codigo=d.sgd_fenv_codigo';
        $order_isql = '  ORDER BY  ' . $db->conn->substr . '(a.radi_nume_sal, '.$num.',' . $longitud_codigo_dependencia . '), a.SGD_RENV_FECH DESC,a.SGD_RENV_PLANILLA DESC';
        break;
    case 'oracle':
    case 'oci8':
    case 'oci805':
        $query = 'select  
			c.depe_nomb,
			a.radi_nume_sal,
			a.sgd_renv_nombre,
			a.sgd_renv_dir ,
			a.sgd_renv_mpio,
			a.sgd_renv_depto,
			a.sgd_renv_fech,
			a.sgd_renv_planilla,
			a.sgd_renv_cantidad,
			a.sgd_renv_valor,
			a.sgd_deve_fech,
			d.sgd_fenv_descrip
			from SGD_RENV_REGENVIO a, dependencia c, SGD_FENV_FRMENVIO d  ';
        $fecha_mes = substr($fecha_ini, 0, 7);
        // Si la variable $generar_listado_existente viene entonces este if genera la planilla existente
        $where_isql = ' WHERE a.sgd_renv_fech BETWEEN
			' . $db->conn->DBTimeStamp($fecha_ini) . ' and ' . $db->conn->DBTimeStamp($fecha_fin) . '
			and ' . $db->conn->substr . '(a.radi_nume_sal, 5,' . $longitud_codigo_dependencia . ')=c.depe_codi
			and a.sgd_fenv_codigo=d.sgd_fenv_codigo';
        $order_isql = '  ORDER BY  ' . $db->conn->substr . '(a.radi_nume_sal, 5,' . $longitud_codigo_dependencia . '), a.SGD_RENV_FECH DESC,a.SGD_RENV_PLANILLA DESC';
        break;

    //Modificado skina
    default:
        $query = 'select  
				c.depe_nomb,
				a.radi_nume_sal,
				a.sgd_renv_nombre,
				a.sgd_renv_dir ,
				a.sgd_renv_mpio,
				a.sgd_renv_depto,
				a.sgd_renv_fech,
				a.sgd_renv_planilla,
				a.sgd_renv_cantidad,
				a.sgd_renv_valor,
				a.sgd_deve_fech,
				d.sgd_fenv_descrip
			from SGD_RENV_REGENVIO a, dependencia c, SGD_FENV_FRMENVIO d  ';

        $fecha_mes = substr($fecha_ini, 0, 7);
        // Si la variable $generar_listado_existente viene entonces este if genera la planilla existente
        $where_isql = ' WHERE a.sgd_renv_fech BETWEEN
					' . $db->conn->DBTimeStamp($fecha_ini) . ' and ' . $db->conn->DBTimeStamp($fecha_fin) . '
					and ' . $db->conn->substr . '(cast(a.radi_nume_sal as varchar(15)), 5,' . $longitud_codigo_dependencia . ')=cast(c.depe_codi as varchar(' . $longitud_codigo_dependencia . '))
					and a.sgd_fenv_codigo=d.sgd_fenv_codigo';
        $order_isql = '  ORDER BY  ' . $db->conn->substr . '(cast(a.radi_nume_sal as varchar(15)), 5,' . $longitud_codigo_dependencia . '), a.SGD_RENV_FECH DESC,a.SGD_RENV_PLANILLA DESC';
}
?>
