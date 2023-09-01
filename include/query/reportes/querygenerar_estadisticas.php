<?php

/**
 * CONSULTA VERIFICACION PREVIA A LA RADICACION
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
        $radi_nume_sal = "RADI_NUME_SAL";
        $query = "select  
		d.sgd_fenv_descrip,
		c.depe_nomb,
		$radi_nume_sal as radi_nume_sal,
		a.sgd_renv_nombre,
		a.sgd_renv_dir,
		a.sgd_renv_mpio,
		a.sgd_renv_depto,
		a.sgd_renv_fech,
		a.sgd_deve_fech,
		b.sgd_deve_desc,
		'-' firma,
		a.sgd_renv_planilla,
		a.sgd_renv_cantidad,
		a.sgd_renv_valor
		from SGD_RENV_REGENVIO a, 
			 sgd_deve_dev_envio  b,
			 dependencia c,
			 SGD_FENV_FRMENVIO d ";
        $fecha_mes = substr($fecha_ini, 0, 7);
        $where_isql = ' WHERE a.sgd_deve_fech BETWEEN
   	                  ' . $db->conn->DBTimeStamp($fecha_ini) . ' and ' . $db->conn->DBTimeStamp($fecha_fin) . '
	                  and a.sgd_deve_codigo=b.sgd_deve_codigo
	                  and a.sgd_fenv_codigo=d.sgd_fenv_codigo
	                  and ' . $db->conn->substr . '(' . $radi_nume_sal . ', ' . $num . ', ' . $longitud_codigo_dependencia . ')=c.depe_codi
	                  and a.sgd_deve_codigo is not null
	                  ';
        break;
    case 'oracle':
    case 'oci8':
    case 'oci805':

        $query = "select  
			d.sgd_fenv_descrip,
			c.depe_nomb,
			a.radi_nume_sal,
			a.sgd_renv_nombre,
			a.sgd_renv_dir,
			a.sgd_renv_mpio,
			a.sgd_renv_depto,
			a.sgd_renv_fech,
			a.sgd_deve_fech,
			b.sgd_deve_desc,
			'-' firma,
			a.sgd_renv_planilla,
			a.sgd_renv_cantidad,
			a.sgd_renv_valor
			from SGD_RENV_REGENVIO a, 
				sgd_deve_dev_envio  b,
				dependencia c,
				SGD_FENV_FRMENVIO d ";
        $fecha_mes = substr($fecha_ini, 0, 7);
        $where_isql = ' WHERE a.sgd_deve_fech BETWEEN
					' . $db->conn->DBTimeStamp($fecha_ini) . ' and ' . $db->conn->DBTimeStamp($fecha_fin) . '
					and a.sgd_deve_codigo=b.sgd_deve_codigo
					and a.sgd_fenv_codigo=d.sgd_fenv_codigo
					and ' . $db->conn->substr . '(a.radi_nume_sal, ' . $num . ', ' . $longitud_codigo_dependencia . ')=c.depe_codi
					and a.sgd_deve_codigo is not null
			';
        break;

    //Modificado skina
    default:
        $query = "select  
					d.sgd_fenv_descrip,
					c.depe_nomb,
					a.radi_nume_sal,
					a.sgd_renv_nombre,
					a.sgd_renv_dir,
					a.sgd_renv_mpio,
					a.sgd_renv_depto,
					a.sgd_renv_fech,
					a.sgd_deve_fech,
					b.sgd_deve_desc,
					'-'  as firma,
					a.sgd_renv_planilla,
					a.sgd_renv_cantidad,
					a.sgd_renv_valor
					from SGD_RENV_REGENVIO a, 
						sgd_deve_dev_envio  b,
						dependencia c,
						SGD_FENV_FRMENVIO d ";
        $fecha_mes = substr($fecha_ini, 0, 7);
        $where_isql = ' WHERE a.sgd_deve_fech BETWEEN
					' . $db->conn->DBTimeStamp($fecha_ini) . ' and ' . $db->conn->DBTimeStamp($fecha_fin) . '
					and a.sgd_deve_codigo=b.sgd_deve_codigo
					and a.sgd_fenv_codigo=d.sgd_fenv_codigo
					and ' . $db->conn->substr . '(a.radi_nume_sal, ' . $num . ', ' . $longitud_codigo_dependencia . ')=cast(c.depe_codi as varchar(' . $longitud_codigo_dependencia . '))
					and a.sgd_deve_codigo is not null
			';
}
?>
