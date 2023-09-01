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
        $valor = "(cast(a.sgd_renv_cantidad as numeric) * cast(a.sgd_renv_valor as numeric))";
//        $sqlConcat = $db->conn->Concat("a.radi_nume_sal", "'-'", "cast(a.sgd_renv_codigo as varchar)");
        $sqlConcat = "a.radi_nume_sal";
        $isql = 'select 4 AS CHU_ESTADO
                    ,' . 0 . '              AS HID_DEVE_CODIGO
                    ,a.radi_nume_sal        AS "Radicado"
                    ,c.RADI_NUME_DERI       AS "Radicado Padre"
                    ,' . $sqlChar . '       AS "Fecha Envio"
                    ,a.sgd_renv_planilla    AS "Planilla"
                    ,a.sgd_renv_nombre      AS "Destinatario"
                    ,a.sgd_renv_dir         AS "Direccion"
                    ,a.sgd_renv_depto       AS "Departamento"
                    ,a.sgd_renv_mpio        AS "Municipio"
                    ,b.sgd_fenv_descrip     AS "Empresa de Envio"
                    ,d.USUA_LOGIN           AS "Usuario actual"
                    ,' . $valor . '         AS "Valor de envio"
                    , ' . $sqlConcat . '    AS "CHK_RADI_NUME_SAL"
                    ,a.sgd_dir_tipo         AS HID_sgd_dir_tipo
                    ,a.sgd_renv_cantidad    AS HID_sgd_renv_cantidad
                    ,a.sgd_renv_codigo      AS HID_sgd_renv_codigo
                    ,c.RADI_FECH_RADI       AS HID_RADI_FECH_RADI
                    ,c.RA_ASUN              AS HID_RA_ASUN
                    ,d.USUA_NOMB            AS HID_USUA_NOMB
                    ,c.radi_depe_actu       AS HID_radi_depe_actu
		from sgd_renv_regenvio a  left outer join SGD_FENV_FRMENVIO b on (a.sgd_fenv_codigo=b.sgd_fenv_codigo)
			,radicado c ,usuario d where sgd_deve_codigo is null and' .
                $dependencia_busq1 . ' ' .
                $db->conn->substr . "(a.radi_nume_sal, ".$num."," . $longitud_codigo_dependencia . ")='" . $dep_sel . "'" .
                $dependencia_busq2 . '
			and a.sgd_renv_estado < 8' .
                $sql_masiva . '
			and	c.radi_nume_radi= a.radi_nume_sal
  			and c.radi_depe_actu=d.depe_codi
			and c.radi_usua_actu=d.usua_codi
      order by ' . $order . $orderTipo;
        break;
    case 'mysql':
        $valor = "(cast(a.sgd_renv_cantidad as int) * cast(a.sgd_renv_valor as int))";
//        $sqlConcat = $db->conn->Concat("a.radi_nume_sal,0", "'-'", "cast(a.sgd_renv_codigo as char)");
        $sqlConcat = "a.radi_nume_sal";
        $isql = 'select "4" AS CHU_ESTADO
                        ,' . 0 . '              AS HID_DEVE_CODIGO
                        ,a.radi_nume_sal        AS "Radicado"
			,c.RADI_NUME_DERI       AS "Radicado Padre"
			,' . $sqlChar . '       AS "Fecha Envio"
			,a.sgd_renv_planilla    AS "Planilla"
			,a.sgd_renv_nombre      AS "Destinatario"
			,a.sgd_renv_dir         AS "Direccion"
			,a.sgd_renv_depto       AS "Departamento"
			,a.sgd_renv_mpio        AS "Municipio"
			,b.sgd_fenv_descrip     AS "Empresa de Envio"
			,d.USUA_LOGIN           AS "Usuario actual"
			,' . $valor . '         AS "Valor de envio"
			, ' . $sqlConcat . '    AS "CHK_RADI_NUME_SAL"
			,a.sgd_dir_tipo         AS HID_sgd_dir_tipo
			,a.sgd_renv_cantidad    AS HID_sgd_renv_cantidad
			,a.sgd_renv_codigo      AS HID_sgd_renv_codigo
			,c.RADI_FECH_RADI       AS HID_RADI_FECH_RADI
			,c.RA_ASUN              AS HID_RA_ASUN
			,d.USUA_NOMB            AS HID_USUA_NOMB
			,c.radi_depe_actu       AS HID_radi_depe_actu
			,a.sgd_deve_codigo
		from sgd_renv_regenvio a
			 left outer join SGD_FENV_FRMENVIO b
				on (a.sgd_fenv_codigo=b.sgd_fenv_codigo)
				,radicado c
			 ,usuario d
		where sgd_deve_codigo is null and' .
                $dependencia_busq1 . ' ' .
                $db->conn->substr . "(a.radi_nume_sal, $num," . $longitud_codigo_dependencia . ")='" . $dep_sel ."'" .
                $dependencia_busq2 . '
			and a.sgd_renv_estado < 8' .
                $sql_masiva . '
			and	c.radi_nume_radi= a.radi_nume_sal
  			and c.radi_depe_actu=d.depe_codi
			and c.radi_usua_actu=d.usua_codi
      order by ' . $order . $orderTipo;
        break;
    case 'oracle':
    case 'oci8':$valor = "(cast(a.sgd_renv_cantidad as numeric) * cast(a.sgd_renv_valor as numeric))";
//        $sqlConcat = $db->conn->Concat("a.radi_nume_sal", "'-'", "a.sgd_renv_codigo");
        $sqlConcat = "a.radi_nume_sal";

        $isql = 'select ' . "4" . '         	AS "CHU_ESTADO"
                    ,' . 0 . '              AS "HID_DEVE_CODIGO"
                    ,a.radi_nume_sal        AS "Radicado"
                    ,c.RADI_NUME_DERI       AS "Radicado Padre"
                    ,' . $sqlChar . '       AS "Fecha Envio"
                    ,a.sgd_renv_planilla    AS "Planilla"
                    ,a.sgd_renv_nombre      AS "Destinatario"
                    ,a.sgd_renv_dir         AS "Direccion"
                    ,a.sgd_renv_depto       AS "Departamento"
                    ,a.sgd_renv_mpio        AS "Municipio"
                    ,b.sgd_fenv_descrip     AS "Empresa de Envio"
                    ,d.USUA_LOGIN           AS "Usuario actual"
                    ,' . $valor . '             AS "Valor de envio"
                    , ' . $sqlConcat . '    AS "CHK_RADI_NUME_SAL"
                    ,a.sgd_dir_tipo         AS "HID_sgd_dir_tipo"
                    ,a.sgd_renv_cantidad    AS "HID_sgd_renv_cantidad"
                    ,a.sgd_renv_codigo      AS "HID_sgd_renv_codigo"
                    ,c.RADI_FECH_RADI       AS "HID_RADI_FECH_RADI"
                    ,c.RA_ASUN              AS "HID_RA_ASUN"
                    ,d.USUA_NOMB            AS "HID_USUA_NOMB"
                    ,c.radi_depe_actu       AS "HID_radi_depe_actu"
                from sgd_renv_regenvio a LEFT OUTER JOIN
                        sgd_fenv_frmenvio b
                        ON a.sgd_fenv_codigo = b.sgd_fenv_codigo,
                        radicado c, usuario d
                where sgd_deve_codigo is null and' .
                $dependencia_busq1 . ' ' .
                $db->conn->substr . '(a.radi_nume_sal, 5,' . $longitud_codigo_dependencia . ')=' . "'" . $dep_sel . "'" . ' ' .
                $dependencia_busq2 . 'and a.sgd_renv_estado < 8' . $sql_masiva . '
				and	c.radi_nume_radi= a.radi_nume_sal
				and c.radi_depe_actu=d.depe_codi
				and c.radi_usua_actu=d.usua_codi
			order by ' . $order . $orderTipo;
        break;

    //Modificacion skina
    default:
        $valor = "(cast(a.sgd_renv_cantidad as numeric) * cast(a.sgd_renv_valor as numeric))";
//        $sqlConcat = $db->conn->Concat("a.radi_nume_sal", "'-'", "a.sgd_renv_codigo");
        $sqlConcat = "a.radi_nume_sal";

        $isql = 'select ' . "4" . '         	AS "CHU_ESTADO"
                    ,' . 0 . '              AS "HID_DEVE_CODIGO"
                    ,a.radi_nume_sal        AS "Radicado"
                    ,c.RADI_NUME_DERI       AS "Radicado Padre"
                    ,' . $sqlChar . '       AS "Fecha Envio"
                    ,a.sgd_renv_planilla    AS "Planilla"
                    ,a.sgd_renv_nombre      AS "Destinatario"
                    ,a.sgd_renv_dir         AS "Direccion"
                    ,a.sgd_renv_depto       AS "Departamento"
                    ,a.sgd_renv_mpio        AS "Municipio"
                    ,b.sgd_fenv_descrip     AS "Empresa de Envio"
                    ,d.USUA_LOGIN           AS "Usuario actual"
                    ,' . $valor . '             AS "Valor de envio"
                    , ' . $sqlConcat . '    AS "CHK_RADI_NUME_SAL"
                    ,a.sgd_dir_tipo         AS "HID_sgd_dir_tipo"
                    ,a.sgd_renv_cantidad    AS "HID_sgd_renv_cantidad"
                    ,a.sgd_renv_codigo      AS "HID_sgd_renv_codigo"
                    ,c.RADI_FECH_RADI       AS "HID_RADI_FECH_RADI"
                    ,c.RA_ASUN              AS "HID_RA_ASUN"
                    ,d.USUA_NOMB            AS "HID_USUA_NOMB"
                    ,c.radi_depe_actu       AS "HID_radi_depe_actu"
                from sgd_renv_regenvio a LEFT OUTER JOIN
                        sgd_fenv_frmenvio b
                        ON a.sgd_fenv_codigo = b.sgd_fenv_codigo,
                        radicado c, usuario d
                where sgd_deve_codigo is null and' .
                $dependencia_busq1 . ' ' .
                $db->conn->substr . '(a.radi_nume_sal, 5,' . $longitud_codigo_dependencia . ')=' . "'" . $dep_sel . "'" . ' ' .
                $dependencia_busq2 . 'and a.sgd_renv_estado < 8' . $sql_masiva . '
				and	c.radi_nume_radi= a.radi_nume_sal
				and c.radi_depe_actu=d.depe_codi
				and c.radi_usua_actu=d.usua_codi
			order by ' . $order . $orderTipo;
}
?>
