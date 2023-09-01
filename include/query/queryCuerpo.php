<?php
//                        b.tdoc_codi, b.radi_confidencial
$coltp3Esp = '"' . $tip3Nombre[3][2] . '"';
switch ($db->driver) {
    case 'mssql':
        $whereFiltro = str_replace("b.radi_nume_radi", "b.radi_nume_radi", $whereFiltro);
        // Los dias de termino que se deben validar es de la tabla sgd_dt_radicado dt en la condicon floor(dt.dias_termino * 7/5)
        $redondeo = "(DATEDIFF (d," . $db->conn->sysTimeStamp . ",b.RADI_FECH_RADI)+floor(dt.dias_termino * 7/5)+(select count(*) from sgd_noh_nohabiles where NOH_FECHA between b.RADI_FECH_RADI and " . $db->conn->sysTimeStamp . "))";
        $isql = 'select b.RADI_NUME_RADI as "IDT_Numero Radicado" ,b.RADI_PATH as "HID_RADI_PATH",' . $sqlFecha . ' as "DAT_Fecha Radicado",
                        b.RADI_NUME_RADI as "HID_RADI_NUME_RADI",b.RA_ASUN  as "Asunto"' . $colAgendado . ',d.SGD_DIR_NOMREMDES as "Remitente/Destinatario",
                        d.SGD_DIR_NOMBRE as "Dignatario",c.SGD_TPR_DESCRIP as "Tipo Documento"  ,' . $redondeo . ' as "Dias Restantes",b.RADI_USU_ANTE as "Enviado Por",
                        b.RADI_NUME_RADI as "CHK_CHKANULAR",b.RADI_LEIDO as "HID_RADI_LEIDO",b.RADI_NUME_HOJA as "HID_RADI_NUME_HOJA",b.CARP_PER as "HID_CARP_PER",
                        b.CARP_CODI as "HID_CARP_CODI",b.SGD_EANU_CODIGO as "HID_EANU_CODIGO",b.RADI_NUME_DERI as "HID_RADI_NUME_DERI",
                        b.RADI_TIPO_DERI as "HID_RADI_TIPO_DERI"
                 from sgd_dt_radicado dt, radicado b
                 left outer join SGD_TPR_TPDCUMENTO c on b.tdoc_codi=c.sgd_tpr_codigo
                 left outer join SGD_DIR_DRECCIONES d on b.radi_nume_radi=d.radi_nume_radi
                 where b.radi_nume_radi is not null
                 and b.radi_nume_radi=dt.radi_nume_radi
                 and b.radi_depe_actu=\'' . $dependencia . '\'' .
                $whereUsuario . $whereFiltro . "
                 " . $whereCarpeta . " and b.RADI_NUME_DERI='0'
                 " . $sqlAgendado . '
                 order by ' . $order . ' ' . $orderTipo;
        break;
    case 'mysql':
        $whereFiltro = str_replace("b.radi_nume_radi", "b.radi_nume_radi", $whereFiltro);
        // Los dias de termino que se deben validar es de la tabla sgd_dt_radicado dt en la condicon floor(dt.dias_termino * 7/5)
        $redondeo = "((DAY(radi_fech_radi)-DAY(" . $db->conn->sysTimeStamp . "))+floor(dt.dias_termino * 7/5)+(select count(*) from sgd_noh_nohabiles where NOH_FECHA between b.RADI_FECH_RADI and " . $db->conn->sysTimeStamp . "))";
        $isql = 'select distinct(b.RADI_NUME_RADI) as "IDT_Numero Radicado" '
                . ',b.RADI_PATH as "HID_RADI_PATH"'
                . ',' . $sqlFecha . ' as "DAT_Fecha Radicado"'
                . ',b.RADI_NUME_RADI as "HID_RADI_NUME_RADI"'
                . ',b.RA_ASUN  as "Asunto"' . $colAgendado . ''
                . ',d.SGD_DIR_NOMREMDES as "Remitente/Destinatario"'
                . ', d.SGD_DIR_NOMBRE as "Dignatario"'
                . ',c.SGD_TPR_DESCRIP as "Tipo Documento"  '
                . ',' . $redondeo . ' as "Dias Restantes"
                    ,b.RADI_USU_ANTE as "Enviado Por"
                    ,b.RADI_NUME_RADI as "CHK_CHKANULAR"
                    ,b.RADI_LEIDO as "HID_RADI_LEIDO"
                    ,b.RADI_NUME_HOJA as "HID_RADI_NUME_HOJA"
                    ,b.CARP_PER as "HID_CARP_PER"
                    ,b.CARP_CODI as "HID_CARP_CODI"
                    ,b.SGD_EANU_CODIGO as "HID_EANU_CODIGO"
                    ,b.RADI_NUME_DERI as "HID_RADI_NUME_DERI"
                    ,b.RADI_TIPO_DERI as "HID_RADI_TIPO_DERI"
                 from sgd_dt_radicado dt, radicado b
                 left outer join SGD_TPR_TPDCUMENTO c on b.tdoc_codi=c.sgd_tpr_codigo
                 left outer join SGD_DIR_DRECCIONES d on b.radi_nume_radi=d.radi_nume_radi
                 where b.radi_nume_radi is not null
                 and b.radi_nume_radi=dt.radi_nume_radi
                 and b.radi_depe_actu=\'' . $dependencia . '\'' .
                $whereUsuario . $whereFiltro . '
                 ' . $whereCarpeta . '
                 ' . $sqlAgendado . '
                 order by ' . $order . ' ' . $orderTipo;
        break;
    case 'oracle':
    case 'oci8':
        $whereFiltro = str_replace("b.radi_nume_radi", "b.radi_nume_radi", $whereFiltro);
        //by skina $redondeo="date_part('days', radi_fech_radi-".$db->conn->sysTimeStamp.")+floor(c.sgd_tpr_termino * 7/5)+(select count(*) from sgd_noh_nohabiles where NOH_FECHA between radi_fech_radi and ".$db->conn->sysTimeStamp.")";
        $redondeo = "(to_number(to_char(radi_fech_radi,'DD'))-(to_number(to_char(".$db->conn->sysTimeStamp.",'DD')))+floor(c.sgd_tpr_termino * 7/5)+(select count(*) from sgd_noh_nohabiles where NOH_FECHA between radi_fech_radi and " . $db->conn->sysTimeStamp . "))";
        $isql = 'select b.RADI_NUME_RADI as "IDT_Numero Radicado" ,b.RADI_PATH as "HID_RADI_PATH",' . $sqlFecha . ' as "DAT_Fecha Radicado",
		 	b.RADI_NUME_RADI as "HID_RADI_NUME_RADI", SUBSTR(b.RA_ASUN,1,300) as "Asunto"' . $colAgendado . ',d.SGD_DIR_NOMREMDES as "Remitente/Destinatario",
		 	d.SGD_DIR_NOMBRE as "Dignatario",c.SGD_TPR_DESCRIP as "documento"	,' . $redondeo . ' as "Dias Restantes",b.RADI_USU_ANTE as "Enviado Por",
		 	b.RADI_NUME_RADI as "CHK_CHKANULAR",b.RADI_LEIDO as "HID_RADI_LEIDO",b.RADI_NUME_HOJA as "HID_RADI_NUME_HOJA",b.CARP_PER as "HID_CARP_PER",
		 	b.CARP_CODI as "HID_CARP_CODI",b.SGD_EANU_CODIGO as "HID_EANU_CODIGO",b.RADI_NUME_DERI as "HID_RADI_NUME_DERI",
			b.RADI_TIPO_DERI as "HID_RADI_TIPO_DERI"
		 from sgd_dt_radicado dt, radicado b
		 left outer join SGD_TPR_TPDCUMENTO c on b.tdoc_codi=c.sgd_tpr_codigo
		 left outer join SGD_DIR_DRECCIONES d on b.radi_nume_radi=d.radi_nume_radi
    		 where b.radi_nume_radi is not null
		 and b.radi_nume_radi=dt.radi_nume_radi
		 and b.radi_depe_actu=\'' . $dependencia . '\'' .
                $whereUsuario . $whereFiltro . '
		 ' . $whereCarpeta . " and b.RADI_NUME_DERI='0'
 		 " . $sqlAgendado . '
	  	 order by ' . $order . ' ' . $orderTipo;
        break;
    case 'ocipo':
        $whereFiltro = str_replace("b.radi_nume_radi", "cast(b.radi_nume_radi as varchar(15))", $whereFiltro);
        //by skina $redondeo="date_part('days', radi_fech_radi-".$db->conn->sysTimeStamp.")+floor(c.sgd_tpr_termino * 7/5)+(select count(*) from sgd_noh_nohabiles where NOH_FECHA between radi_fech_radi and ".$db->conn->sysTimeStamp.")";
        $redondeo = "(to_number(to_char(radi_fech_radi,'DD'))-(to_number(to_char(sysdate,'DD')))+floor(c.sgd_tpr_termino * 7/5)+(select count(*) from sgd_noh_nohabiles where NOH_FECHA between radi_fech_radi and SYSDATE))";
        $isql = 'select b.RADI_NUME_RADI as "IDT_Numero Radicado" ,b.RADI_PATH as "HID_RADI_PATH",' . $sqlFecha . ' as "DAT_Fecha Radicado",
		 	b.RADI_NUME_RADI as "HID_RADI_NUME_RADI",b.RA_ASUN  as "Asunto"' . $colAgendado . ',d.SGD_DIR_NOMREMDES as "Remitente/Destinatario",
		 	d.SGD_DIR_NOMBRE as "Dignatario",c.SGD_TPR_DESCRIP as "Tipo Documento"	,' . $redondeo . ' as "Dias Restantes",b.RADI_USU_ANTE as "Enviado Por",
		 	b.RADI_NUME_RADI as "CHK_CHKANULAR",b.RADI_LEIDO as "HID_RADI_LEIDO",b.RADI_NUME_HOJA as "HID_RADI_NUME_HOJA",b.CARP_PER as "HID_CARP_PER",
		 	b.CARP_CODI as "HID_CARP_CODI",b.SGD_EANU_CODIGO as "HID_EANU_CODIGO",b.RADI_NUME_DERI as "HID_RADI_NUME_DERI",
			b.RADI_TIPO_DERI as "HID_RADI_TIPO_DERI"
		 from sgd_dt_radicado dt, radicado b
		 left outer join SGD_TPR_TPDCUMENTO c on b.tdoc_codi=c.sgd_tpr_codigo
		 left outer join SGD_DIR_DRECCIONES d on b.radi_nume_radi=d.radi_nume_radi
    		 where b.radi_nume_radi is not null
		 and b.radi_nume_radi=dt.radi_nume_radi
		 and b.radi_depe_actu=\'' . $dependencia . '\'' .
                $whereUsuario . $whereFiltro . '
		 ' . $whereCarpeta . '
 		 ' . $sqlAgendado . '
	  	 order by ' . $order . ' ' . $orderTipo;
        break;
    case 'postgres':
        $whereFiltro = str_replace("b.radi_nume_radi", "b.radi_nume_radi", $whereFiltro);
        //by skina 
        // Los dias de termino que se deben validar es de la tabla sgd_dt_radicado dt en la condicon floor(dt.dias_termino * 7/5)
        $redondeo = "(date_part('days', radi_fech_radi-" . $db->conn->sysTimeStamp . ")+ dt.dias_termino +(select count(*) from sgd_noh_nohabiles where NOH_FECHA between radi_fech_radi and " . $db->conn->sysTimeStamp . "))";
        $isql = 'select b.RADI_NUME_RADI as "IDT_Numero Radicado" ,b.RADI_PATH as "HID_RADI_PATH",' . $sqlFecha . ' as "DAT_Fecha Radicado",
		 	b.RADI_NUME_RADI as "HID_RADI_NUME_RADI", substring(b.RA_ASUN,1,300) as "Asunto"' . $colAgendado . ',d.SGD_DIR_NOMREMDES as "Remitente/Destinatario",
		 	d.SGD_DIR_NOMBRE as "Dignatario",c.SGD_TPR_DESCRIP as "Tipo Documento"	,' . $redondeo . ' as "Dias Restantes",b.RADI_USU_ANTE as "Enviado Por",
		 	b.RADI_NUME_RADI as "CHK_CHKANULAR",b.RADI_LEIDO as "HID_RADI_LEIDO",b.RADI_NUME_HOJA as "HID_RADI_NUME_HOJA",b.CARP_PER as "HID_CARP_PER",
		 	b.CARP_CODI as "HID_CARP_CODI",b.SGD_EANU_CODIGO as "HID_EANU_CODIGO",b.RADI_NUME_DERI as "HID_RADI_NUME_DERI",
			b.RADI_TIPO_DERI as "HID_RADI_TIPO_DERI"
		 from sgd_dt_radicado dt, radicado b
		 left outer join SGD_TPR_TPDCUMENTO c on b.tdoc_codi=c.sgd_tpr_codigo
		 left outer join SGD_DIR_DRECCIONES d on b.radi_nume_radi=d.radi_nume_radi
    		 where b.radi_nume_radi is not null
		 and b.radi_nume_radi=dt.radi_nume_radi
		 and b.radi_depe_actu=\'' . $dependencia . '\'' .
                $whereUsuario . $whereFiltro . '
		 ' . $whereCarpeta . " and b.RADI_NUME_DERI='0'
 		 " . $sqlAgendado . '
	  	 order by ' . $order . ' ' . $orderTipo;
        break;
}
?>
