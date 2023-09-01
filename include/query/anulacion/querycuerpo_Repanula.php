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
        $isql = 'select  b.RADI_NUME_RADI AS "IMG_Numero Radicado"
                    ,b.RADI_PATH "HID_RADI_PATH"
                    , b.RADI_NUME_DERI AS "Radicado Padre"
                    ,b.RADI_FECH_RADI "HOR_RAD_FECH_RADI"
                    ,' . $sqlFecha . ' "Fecha Radicado"
                    ,b.RA_ASUN "Descripcion"
                    ,c.SGD_TPR_DESCRIP "Tipo Documento"
                    ,d.usua_anu_acta "IMG_No Acta"
                    ,d.sgd_anu_path_acta "HID_PATH_ACTA"
                 from
                     radicado b,
                     SGD_TPR_TPDCUMENTO c,
                     sgd_anu_anulados d
                 where 
                        b.radi_nume_radi is not null
                        and b.radi_nume_radi=d.radi_nume_radi
                        and ' . $db->conn->substr . '(b.radi_nume_radi, '.$num.', ' . $longitud_codigo_dependencia . ")='" . $dep_sel . "'
                        and b.tdoc_codi=c.sgd_tpr_codigo
                        " . $whereTpAnulacion . '
                        ' . $whereFiltro . '
                  order by ' . $order . ' ' . $orderTipo;
        break;
    case 'oracle':
    case 'oci8':
    case 'oci805':
    case 'mysql':
        $isql = 'select
                    b.RADI_NUME_RADI	 as "IMG_Numero Radicado"
                    ,b.RADI_PATH 	       	as "HID_RADI_PATH"
                    ,b.RADI_NUME_DERI 	as "Radicado Padre"
                    ,b.RADI_FECH_RADI 	as "HOR_RAD_FECH_RADI"
                    ,b.RADI_FECH_RADI 	as "Fecha Radicado"
                    ,b.RA_ASUN 		as "Descripcion"
                    ,c.SGD_TPR_DESCRIP 	as "Tipo Documento"
                    ,d.usua_anu_acta 	as "IMG_No Acta"
                    ,d.sgd_anu_path_acta 	as "HID_PATH_ACTA"
         from  radicado b,   SGD_TPR_TPDCUMENTO c, sgd_anu_anulados d
         where 
                b.radi_nume_radi is not null
                and b.radi_nume_radi=d.radi_nume_radi
                and ' . $db->conn->substr . '(b.radi_nume_radi, '.$num.', ' . $longitud_codigo_dependencia . ')=' . "'$dep_sel'" . '
                and b.tdoc_codi=c.sgd_tpr_codigo
                ' . $whereTpAnulacion . '
                ' . $whereFiltro . '
          order by ' . $order . ' ' . $orderTipo;
        break;
    //Modificacion skina
    case 'postgres':
        $isql = 'select
                    b.RADI_NUME_RADI	 as "IMG_Numero Radicado"
                    ,b.RADI_PATH 	       	as "HID_RADI_PATH"
                    ,b.RADI_NUME_DERI 	as "Radicado Padre"
                    ,b.RADI_FECH_RADI 	as "HOR_RAD_FECH_RADI"
                    ,b.RADI_FECH_RADI 	as "Fecha Radicado"
                    ,b.RA_ASUN 		as "Descripcion"
                    ,c.SGD_TPR_DESCRIP 	as "Tipo Documento"
                    ,d.usua_anu_acta 	as "No_Acta"
                    ,d.sgd_anu_path_acta 	as "HID_PATH_ACTA" 
                from
                     radicado b,
                     SGD_TPR_TPDCUMENTO c,
                     sgd_anu_anulados d
                where 
                    b.radi_nume_radi is not null
                    and b.radi_nume_radi=d.radi_nume_radi
                    and ' . $db->conn->substr . '(b.radi_nume_radi,'.$num.', ' . $longitud_codigo_dependencia . ')=' . "'$dep_sel'" . '
                    and b.tdoc_codi=c.sgd_tpr_codigo
                    ' . $whereTpAnulacion . '
                    ' . $whereFiltro . '
                order by ' . $order . ' ' . $orderTipo;
        break;
}
?>
