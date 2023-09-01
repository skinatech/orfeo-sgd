<?php

//Modificacion skina 23-10-08 para generar planilla
switch ($db->driver) {
    case 'mssql':
        $isql = 'select
                        c.radi_nume_radi        as "NUMERO_RADICADO"
                        ,c.radi_fech_radi       AS "FECHA_RADICADO"
                        ,c.radi_depe_actu       AS "RADI_DEPE_ACTU"
                        ,c.radi_depe_radi       AS "RADI_DEPE_RADI"
                        ,c.ra_asun              AS "ASUNTO"
                        ,tp.sgd_tpr_descrip     as "TIPO_DOCUMENTO"
                        ,d.sgd_dir_nomremdes    AS "REMITENTE"
                        ,c.radi_cuentai		as "NO_FACTURA"
			,d.sgd_dir_nombre	as "VALOR"
                        from radicado c
                        left outer join  sgd_dir_drecciones d
                                on c.radi_nume_radi=d.radi_nume_radi
                        left outer join  sgd_tpr_tpdcumento tp
                                on c.tdoc_codi=tp.sgd_tpr_codigo
                        left outer join hist_eventos h
                                on c.radi_nume_radi=h.radi_nume_radi
                        where c.radi_nume_radi is not null
                                and c.radi_nume_radi in(' . $setFiltroSelect . ')
                                and d.sgd_dir_tipo != 7
                                and h.sgd_ttr_codigo=2

                        ';

        break;
    case 'mysql':
        $isql = 'select
                        c.radi_nume_radi as "NUMERO_RADICADO" 
                        ,c.radi_fech_radi AS "FECHA_RADICADO" 
                        ,d.sgd_dir_nomremdes AS "EMPRESA"
                        ,d.sgd_dir_nombre AS "NOMBRE"
                        ,c.ra_asun AS "ASUNTO"
                        ,c.radi_depe_actu AS "RADI_DEPE_ACTU" 
                        ,c.radi_depe_radi AS "RADI_DEPE_RADI"  
                        ,c.radi_cuentai as "REFERENCIA" 
                        ,c.radi_fech_ofic as "FECH_OFIC"
                        ,u.usua_nomb as "USUARIO"
                        ,d.sgd_dir_direccion as "DIRECCION"
                        from radicado c
                        left outer join  usuario u
                                on c.radi_usua_actu=u.usua_codi
                        left outer join  sgd_dir_drecciones d
                                on c.radi_nume_radi=d.radi_nume_radi
                        left outer join  sgd_tpr_tpdcumento tp
                                on c.tdoc_codi=tp.sgd_tpr_codigo
                        where c.radi_nume_radi is not null ' .
                $dependencia_busq2 .
                $where_tipRadi .
                $where_fecha . '
                                and c.radi_nume_radi=d.radi_nume_radi
                                and d.sgd_dir_tipo != 7
                                and c.radi_depe_actu=u.depe_codi
                        ';
    case 'oracle':
    case 'oci8':// Se quita esta union ya que hace que se repintan los resultados de los radicados
        $isql = 'select
                        c.radi_nume_radi as "NUMERO_RADICADO" 
                        ,c.radi_fech_radi AS "FECHA_RADICADO" 
                        ,d.sgd_dir_nomremdes AS "EMPRESA"
                        ,d.sgd_dir_nombre AS "NOMBRE"
                        ,substr(c.ra_asun,1,300) AS "ASUNTO"
                        ,c.radi_depe_actu AS "RADI_DEPE_ACTU" 
                        ,c.radi_depe_radi AS "RADI_DEPE_RADI"  
                        ,c.radi_cuentai as "REFERENCIA" 
                        ,c.radi_fech_ofic as "FECH_OFIC"
                        ,u.usua_nomb as "USUARIO"
                        ,d.sgd_dir_direccion as "DIRECCION"
                        from radicado c
                        left outer join  usuario u
                                on c.radi_usua_actu=u.usua_codi
                        left outer join  sgd_dir_drecciones d
                                on c.radi_nume_radi=d.radi_nume_radi
                        left outer join  sgd_tpr_tpdcumento tp
                                on c.tdoc_codi=tp.sgd_tpr_codigo
                        where c.radi_nume_radi is not null ' .
                $dependencia_busq2 .
                $where_tipRadi .
                $where_fecha . '
                                and c.radi_nume_radi=d.radi_nume_radi
                                and d.sgd_dir_tipo != 7
                                and c.radi_depe_actu=u.depe_codi
                        ';
        break;
    default:
        // Se quita esta union ya que hace que se repintan los resultados de los radicados
        $isql = 'select
                        c.radi_nume_radi as "NUMERO_RADICADO" 
                        ,c.radi_fech_radi AS "FECHA_RADICADO" 
                        ,d.sgd_dir_nomremdes AS "EMPRESA"
                        ,d.sgd_dir_nombre AS "NOMBRE"
                        ,substring(c.ra_asun,1,300) AS "ASUNTO"
                        ,c.radi_depe_actu AS "RADI_DEPE_ACTU"
                        ,dg.depe_nomb AS "DEPENDENCIA"
                        ,c.radi_depe_radi AS "RADI_DEPE_RADI"  
                        ,c.radi_cuentai as "REFERENCIA" 
                        ,c.radi_fech_ofic as "FECH_OFIC"
                        ,u.usua_nomb as "USUARIO"
                        ,d.sgd_dir_direccion as "DIRECCION"
                from    dependencia dg 
                        inner join radicado c
                                on dg.depe_codi=c.radi_depe_actu
                        left outer join  usuario u
                                on c.radi_usua_actu=u.usua_codi
                        left outer join  sgd_dir_drecciones d
                                on c.radi_nume_radi=d.radi_nume_radi
                        left outer join  sgd_tpr_tpdcumento tp
                                on c.tdoc_codi=tp.sgd_tpr_codigo                                  
                where c.radi_nume_radi is not null ' .
                $dependencia_busq2 .
                $rutaRadicado_busq2 .
                $where_tipRadi .
                $where_fecha . 
                $whereFiltro . '
                                and c.radi_nume_radi=d.radi_nume_radi
                                and d.sgd_dir_tipo != 7
                                and c.radi_depe_actu=u.depe_codi
                        ';

        break;
}
?>
