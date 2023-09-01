<?php

/**
 * CONSULTA VERIFICACION PREVIA A LA RADICACION
 */
$sqlConcat = $db->conn->Concat("usua_doc", "'-'", "usua_login");
$boton == '' ? $dependencia_consulta = "u.depe_codi = '" . $dep_sel . "' AND " : $dependencia_consulta = '';

switch ($db->driver) {
    case 'mssql':
        $isql = "select u.usua_nomb      	AS NOMBRE
                        ,u.usua_login	     	AS USUARIO
                        ,d.depe_nomb		AS DEPENDENCIA
                        ,r.nomb_rol AS ROL
                        ," . $sqlConcat . " 	AS CHR_USUA_DOC
                from usuario u, dependencia d, roles r
                where " . $dependencia_consulta . " u.depe_codi = d.depe_codi " . $dependencia_busq2 . " AND u.cod_rol = r.cod_rol
                order by " . $order . " " . $orderTipo;
        break;
    case 'oracle':
    case 'oci8':
        $isql = "select 
			u.usua_nomb      	AS NOMBRE
			,u.usua_login	     	AS USUARIO
			,d.depe_nomb		AS DEPENDENCIA
			,u.usua_codi		AS JEFE_ES_1
			," . $sqlConcat . " 	AS CHR_USUA_DOC
		from usuario u, dependencia d 
		where " . $dependencia_consulta . " u.depe_codi = d.depe_codi " . $dependencia_busq2 . "
		order by " . $order . " " . $orderTipo;

        break;
    default:
        $isql = 'select 
			u.usua_nomb         AS "NOMBRE"
			,u.usua_login       AS "USUARIO"
			,d.depe_nomb        AS "DEPENDENCIA"
			,' . $sqlConcat . ' AS "CHR_USUA_DOC"
		from usuario u, dependencia d 
		where ' . $dependencia_consulta . ' u.depe_codi = d.depe_codi ' . $dependencia_busq2 . '
		order by ' . $order . ' ' . $orderTipo;

        break;
}
?>
