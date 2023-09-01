<?php

/**
 * CONSULTA VERIFICACION PREVIA A LA RADICACION
 */
$sqlConcat = $db->conn->Concat("rtrim(a.radi_nume_sal)", "'-'", "rtrim(cast(a.sgd_renv_codigo as char(5)))", "'-'", "rtrim(cast(a.sgd_fenv_codigo as char(5)))", "'-'", "rtrim(a.sgd_renv_peso)");

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
    case 'mssql': {
            $isql = 'select ' . "'4'" . ' AS CHU_ESTADO
                        ,' . 0 . '              AS HID_DEVE_CODIGO
                        ,a.radi_nume_sal        as "IDT_Numero Radicado"
			,c.RADI_NUME_DERI       AS "Radicado Padre"
			,' . $sqlChar . '       AS "Fecha Envio"
			,a.sgd_renv_planilla    AS "Planilla"
			,a.sgd_renv_nombre      AS "Destinatario"
			,a.sgd_renv_dir         AS "Direccion"
			,a.SGD_RENV_PAIS	AS "Pais"
			,a.sgd_renv_depto       AS "Departamento"
			,a.sgd_renv_mpio        AS "Municipio"
			,b.sgd_fenv_descrip     AS "Empresa de Envio"
			,d.USUA_LOGIN           AS "Usuario actual"
			,a.sgd_renv_valor       AS "Valor de envio"
			, ' . $sqlConcat . '    AS "CHR_RADI_NUME_SAL" 
			,a.sgd_dir_tipo         AS HID_sgd_dir_tipo
			,a.sgd_renv_cantidad    AS HID_sgd_renv_cantidad
			,a.sgd_renv_codigo      AS HID_sgd_renv_codigo
			,c.RADI_FECH_RADI       AS HID_RADI_FECH_RADI
			,c.RA_ASUN              AS HID_RA_ASUN
			,d.USUA_NOMB            AS HID_USUA_NOMB
                        ,c.radi_depe_actu       AS HID_radi_depe_actu
		from sgd_renv_regenvio a
			 LEFT OUTER JOIN sgd_fenv_frmenvio b
			 ON (a.sgd_fenv_codigo = b.sgd_fenv_codigo)
             ,radicado c
             , usuario d
		where ' .
                    $dependencia_busq1 . ' ' .
                    $db->conn->substr . "(a.radi_nume_sal, ".$num.", " . $longitud_codigo_dependencia . ")='" . $dep_sel . "'" .
                    $dependencia_busq2 . '
			and a.sgd_renv_estado < 8
			' .
                    $sql_masiva . '		
			and	c.radi_nume_radi= a.radi_nume_sal
  			    and c.radi_depe_actu=d.depe_codi
			    and a.usua_doc=d.usua_doc
      		order by SGD_RENV_FECH desc ';
        }break;
    case 'mysql': {
            $isql = 'select ' . "4" . '     AS "CHU_ESTADO"
                        ,' . 0 . '              AS "HID_DEVE_CODIGO"
                        ,a.radi_nume_sal        as "IDT_Numero Radicado"
                        ,c.RADI_NUME_DERI       AS "Radicado Padre"
                        ,' . $sqlChar . '       AS "Fecha Envio"
                        ,a.sgd_renv_planilla    AS "Planilla"
                        ,a.sgd_renv_nombre      AS "Destinatario"
                        ,a.sgd_renv_dir         AS "Direccion"
                        ,a.SGD_RENV_PAIS        AS "Pais"
                        ,a.sgd_renv_depto       AS "Departamento"
                        ,a.sgd_renv_mpio        AS "Municipio"
                        ,b.sgd_fenv_descrip     AS "Empresa de Envio"
                        ,d.USUA_LOGIN           AS "Usuario actual"
                        ,a.sgd_renv_valor       AS "Valor de envio"
                        ,' . $sqlConcat . '     AS "CHR_RADI_NUME_SAL" 
                        ,a.sgd_dir_tipo         AS "HID_sgd_dir_tipo"
                        ,a.sgd_renv_cantidad    AS "HID_sgd_renv_cantidad"
                        ,a.sgd_renv_codigo      AS "HID_sgd_renv_codigo"
                        ,c.RADI_FECH_RADI       AS "HID_RADI_FECH_RADI"
                        ,c.RA_ASUN              AS "HID_RA_ASUN"
                        ,d.USUA_NOMB            AS "HID_USUA_NOMB"
                        ,c.radi_depe_actu       AS "HID_radi_depe_actu"
                        from sgd_renv_regenvio a
                         LEFT OUTER JOIN sgd_fenv_frmenvio b ON a.sgd_fenv_codigo=b.sgd_fenv_codigo,
                          radicado c, usuario d
                        where ' .
                    $dependencia_busq1 . ' ' .
                    $db->conn->substr . "(a.radi_nume_sal, 5, " . $longitud_codigo_dependencia . ")='$dep_sel' " .
                    $dependencia_busq2 . '
                        and a.sgd_renv_estado < 8
                        ' . $sql_masiva . '                
                        and     c.radi_nume_radi= a.radi_nume_sal
                            and c.radi_depe_actu=d.depe_codi
                            and a.usua_doc=d.usua_doc
                          order by SGD_RENV_FECH desc ';
        }break;
    default: {
            $isql = 'select ' . "4" . '     AS "CHU_ESTADO"
	            	,' . 0 . '              AS "HID_DEVE_CODIGO"
        		,a.radi_nume_sal    as "IDT_Numero Radicado"
			,c.RADI_NUME_DERI       AS "Radicado Padre"
			,' . $sqlChar . '       AS "Fecha Envio"
			,a.sgd_renv_planilla    AS "Planilla"
			,a.sgd_renv_nombre      AS "Destinatario"
			,a.sgd_renv_dir         AS "Direccion"
			,a.SGD_RENV_PAIS	AS "Pais"
			,a.sgd_renv_depto       AS "Departamento"
			,a.sgd_renv_mpio        AS "Municipio"
			,b.sgd_fenv_descrip     AS "Empresa de Envio"
			,d.USUA_LOGIN           AS "Usuario actual"
			,a.sgd_renv_valor       AS "Valor de envio"
			,' . $sqlConcat . '     AS "CHR_RADI_NUME_SAL" 
			,a.sgd_dir_tipo         AS "HID_sgd_dir_tipo"
			,a.sgd_renv_cantidad    AS "HID_sgd_renv_cantidad"
			,a.sgd_renv_codigo      AS "HID_sgd_renv_codigo"
			,c.RADI_FECH_RADI       AS "HID_RADI_FECH_RADI"
			,c.RA_ASUN              AS "HID_RA_ASUN"
			,d.USUA_NOMB            AS "HID_USUA_NOMB"
		    ,c.radi_depe_actu       AS "HID_radi_depe_actu"
			
			from sgd_renv_regenvio a
			 LEFT OUTER JOIN sgd_fenv_frmenvio b ON a.sgd_fenv_codigo=b.sgd_fenv_codigo,
        		  radicado c, usuario d
			where ' .
                    $dependencia_busq1 . ' ' .
                    $db->conn->substr . "(a.radi_nume_sal, 5, " . $longitud_codigo_dependencia . ")='$dep_sel' " .
                    $dependencia_busq2 . '
			and a.sgd_renv_estado < 8
			' . $sql_masiva . '		
			and	c.radi_nume_radi= a.radi_nume_sal
  			    and c.radi_depe_actu=d.depe_codi
			    and TRIM(cast(a.usua_doc as char(15))) = TRIM(d.usua_doc) 
			  order by SGD_RENV_FECH desc ';
        }break;
}
?>
