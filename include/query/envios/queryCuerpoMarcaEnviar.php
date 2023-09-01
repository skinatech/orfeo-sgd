<?php

/**
 * CONSULTA VERIFICACION PREVIA A LA RADICACION
 */
switch ($db->driver) {
    case 'mssql':
        $isql = 'select distinct
			a.anex_estado AS "CHU_ESTADO"
                        ,a.sgd_deve_codigo AS "HID_DEVE_CODIGO"
                        ,a.sgd_deve_fech AS "HID_SGD_DEVE_FECH" 
                        ,a.radi_nume_salida AS "IMG_RADICADO_SALIDA"
                        ,c.RADI_PATH  as "HID_RADI_PATH"
                        ,' . $db->conn->substr . '(convert(char(1),a.sgd_dir_tipo),2,3) AS "COPIA"
                        ,a.anex_radi_nume AS "RADICADO_PADRE"
                        ,c.radi_fech_radi AS "FECHA_RADICADO"
                        ,a.anex_desc AS "DESCRIPCION"
                        ,a.sgd_fech_impres AS "FECHA_IMPRESION"
                        ,a.anex_creador AS "GENERADO_POR"
                        ,a.anex_codigo AS "CHK_RADI_NUME_SALIDA" 
                        ,a.sgd_deve_codigo as "HID_DEVE_CODIGO1"
                        ,a.anex_estado as "HID_ANEX_ESTADO1"
                        ,a.anex_nomb_archivo AS "HID_ANEX_NOMB_ARCHIVO" 
                        ,a.anex_tamano AS "HID_ANEX_TAMANO"
                        ,a.ANEX_RADI_FECH AS "HID_ANEX_RADI_FECH" 
                        ,' . "'WWW'" . ' AS "HID_WWW" 
                        ,' . "'9999'" . ' AS "HID_9999"     
                        ,a.anex_tipo AS "HID_ANEX_TIPO" 
                        ,a.anex_radi_nume AS "HID_ANEX_RADI_NUME" 
                        ,a.sgd_dir_tipo AS "HID_SGD_DIR_TIPO"
                        ,a.sgd_deve_codigo AS "HID_SGD_DEVE_CODIGO" 
		FROM anexos a,usuario b, radicado c
		WHERE  ANEX_ESTADO>=' . $estado_sal . ' ' .
                $dependencia_busq2 . '
                    and a.ANEX_ESTADO <= ' . $estado_sal_max . '
                    and a.radi_nume_salida=c.radi_nume_radi
                    and a.anex_creador=b.usua_login
                    and a.anex_borrado= ' . "'N'" . '
                    and a.sgd_dir_tipo != 7
                    and ((a.SGD_DEVE_CODIGO <=0 
                    and a.SGD_DEVE_CODIGO <=99)
                    OR a.SGD_DEVE_CODIGO IS NULL)
                    AND
                    ((c.SGD_EANU_CODIGO <> 2
                    AND c.SGD_EANU_CODIGO <> 1) 
                    or c.SGD_EANU_CODIGO IS NULL)
                    order by ' . $order ;
        break;
    case 'mysql':
        $isql = 'select 
                        a.anex_estado AS "CHU_ESTADO"
                        ,a.sgd_deve_codigo AS "HID_DEVE_CODIGO"
                        ,a.sgd_deve_fech AS "HID_SGD_DEVE_FECH"
                        ,a.radi_nume_salida AS "IMG_RADICADO_SALIDA"
                        ,c.RADI_PATH AS "HID_RADI_PATH"                                         
                        ,substr(trim( CAST( a.sgd_dir_tipo AS CHAR(4) ) ),2,3) AS COPIA
                        ,a.anex_radi_nume AS RADICADO_PADRE
                        ,c.radi_fech_radi AS FECHA_RADICADO
                        ,a.anex_desc AS DESCRIPCION
                        ,a.sgd_fech_impres AS FECHA_IMPRESION
                        ,a.anex_creador AS GENERADO_POR
                ,a.radi_nume_salida AS "CHK_RADI_NUME_SALIDA" 
                        ,a.sgd_deve_codigo AS HID_DEVE_CODIGO1
                        ,a.anex_estado  AS HID_ANEX_ESTADO1
                    ,a.anex_nomb_archivo AS "HID_ANEX_NOMB_ARCHIVO" 
                    ,a.anex_tamano AS "HID_ANEX_TAMANO"
                        ,a.ANEX_RADI_FECH AS "HID_ANEX_RADI_FECH" 
                        ,' . "'WWW'" . ' AS "HID_WWW" 
                        ,' . "'9999'" . ' AS "HID_9999"     
                        ,a.anex_tipo AS "HID_ANEX_TIPO" 
                        ,a.anex_radi_nume AS "HID_ANEX_RADI_NUME" 
                        ,a.sgd_dir_tipo AS "HID_SGD_DIR_TIPO"
                        ,a.sgd_deve_codigo AS "HID_SGD_DEVE_CODIGO"
                from anexos a,usuario b, radicado c
            where a.ANEX_ESTADO>=' . $estado_sal . ' ' .
                $dependencia_busq2 . '
                                and a.ANEX_ESTADO <= ' . $estado_sal_max . '
                                and a.radi_nume_salida=c.radi_nume_radi
                                and a.anex_creador=b.usua_login
                                and a.anex_borrado= ' . "'N'" . '
                                and a.sgd_dir_tipo != 7
                                and (a.sgd_deve_codigo >= 90 or a.sgd_deve_codigo =0 or a.sgd_deve_codigo is null)
                                AND
                                ((c.SGD_EANU_CODIGO != 2
                                AND c.SGD_EANU_CODIGO != 1) 
                                or c.SGD_EANU_CODIGO IS NULL)
                order by ' . $order . ' ';

        break;
    //Modficiacion skina
    default:
        $isql = 'select 
			a.anex_estado AS "CHU_ESTADO"
		 	,a.sgd_deve_codigo AS "HID_DEVE_CODIGO"
			,a.sgd_deve_fech AS "HID_SGD_DEVE_FECH"
		    	,a.radi_nume_salida AS "IMG_RADICADO_SALIDA"
			,c.RADI_PATH AS "HID_RADI_PATH"						
            		,substr(trim( CAST( a.sgd_dir_tipo AS VARCHAR(4) ) ),2,3) AS COPIA
			,a.anex_radi_nume AS RADICADO_PADRE
			,c.radi_fech_radi AS FECHA_RADICADO
			,a.anex_desc AS DESCRIPCION
			,a.sgd_fech_impres AS FECHA_IMPRESION
			,a.anex_creador AS GENERADO_POR
	        ,a.radi_nume_salida AS "CHK_RADI_NUME_SALIDA" 
			,a.sgd_deve_codigo AS HID_DEVE_CODIGO1
			,a.anex_estado  AS HID_ANEX_ESTADO1
		    ,a.anex_nomb_archivo AS "HID_ANEX_NOMB_ARCHIVO" 
		    ,a.anex_tamano AS "HID_ANEX_TAMANO"
			,a.ANEX_RADI_FECH AS "HID_ANEX_RADI_FECH" 
			,' . "'WWW'" . ' AS "HID_WWW" 
			,' . "'9999'" . ' AS "HID_9999"     
			,a.anex_tipo AS "HID_ANEX_TIPO" 
			,a.anex_radi_nume AS "HID_ANEX_RADI_NUME" 
			,a.sgd_dir_tipo AS "HID_SGD_DIR_TIPO"
			,a.sgd_deve_codigo AS "HID_SGD_DEVE_CODIGO"
		from anexos a,usuario b, radicado c
	    where a.ANEX_ESTADO>=' . $estado_sal . ' ' .
                $dependencia_busq2 . '
				and a.ANEX_ESTADO <= ' . $estado_sal_max . '
				and a.radi_nume_salida=c.radi_nume_radi
				and a.anex_creador=b.usua_login
				and a.anex_borrado= ' . "'N'" . '
				and a.sgd_dir_tipo != 7
				and (a.sgd_deve_codigo >= 90 or a.sgd_deve_codigo =0 or a.sgd_deve_codigo is null)
				AND
				((c.SGD_EANU_CODIGO != 2
				AND c.SGD_EANU_CODIGO != 1) 
 				or c.SGD_EANU_CODIGO IS NULL)
		order by ' . $order . ' ';
}
?>
