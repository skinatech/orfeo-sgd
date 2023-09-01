<?php

/* * *******************************************************************************
 *       Filename: Reporte Proceso Radicados de Entrada
 * 		 @autor LUCIA OJEDA ACOSTA - CRA
 * 		 @version ORFEO 3.5
 *       PHP 4.0 build 22-Feb-2006
 * ******************************************************************************* */

$coltp3Esp = '"' . $tip3Nombre[3][2] . '"';
if (!$orno)
    $orno = 1;
$orderE = "	 ";

$desde = $fecha_ini . " " . "00:00:00";
$hasta = $fecha_fin . " " . "23:59:59";

$sWhereFec = " and " . $db->conn->SQLDate('Y/m/d H:i:s', 'R.RADI_FECH_RADI') . " >= '$desde'
            and " . $db->conn->SQLDate('Y/m/d H:i:s', 'R.RADI_FECH_RADI') . " <= '$hasta'";
$sqlFecha = $db->conn->SQLDate("Y-m-d H:i A", "b.RADI_FECH_RADI");


if ($dependencia_busq != '99999')
    $condicionE = "	AND r.radi_depe_radi='$dependencia_busq' ";

switch ($db->driver) {
    case 'mssql': {
            $redondeo = "(datepart(D, radi_fech_radi-" . $db->conn->sysTimeStamp . ")+floor(dt.dias_termino * 7/5)+(select count(*) from sgd_noh_nohabiles where NOH_FECHA between b.RADI_FECH_RADI and " . $db->conn->sysTimeStamp . "))";
            $queryE = 'select
                            b.RADI_FECH_RADI as "Fecha_Radicado",
                            b.RADI_NUME_RADI as "IDT_Numero_Radicado",
                            b.RADI_PATH as "HID_RADI_PATH",' .
                            $sqlFecha . ' as "DAT_Fecha Transaccion",
                            b.RADI_NUME_RADI as "HID_RADI_NUME_RADI",
                            h.HIST_OBSE AS "Observacion",
                            UPPER(b.RA_ASUN)  as "Asunto",
                            c.SGD_TPR_DESCRIP as "Tipo Documento",
                            (select usActu.usua_login from usuario usActu where usActu.usua_codi=b.radi_usua_actu and usActu.depe_codi=b.radi_depe_actu) AS "Usuario_Actual",
                            ttr.SGD_TTR_DESCRIP AS "Tipo Transaccion",
                            b.RADI_NUME_RADI AS "CHK_CHKANULAR",
                            b.RADI_LEIDO AS "HID_RADI_LEIDO",
                            b.RADI_NUME_HOJA AS "HID_RADI_NUME_HOJA",
                            b.CARP_PER AS "HID_CARP_PER",
                            b.CARP_CODI AS "HID_CARP_CODI",
                            b.SGD_EANU_CODIGO AS "HID_EANU_CODIGO",
                            b.RADI_NUME_DERI AS "HID_RADI_NUME_DERI",
                            b.RADI_TIPO_DERI AS "HID_RADI_TIPO_DERI"
			 from			 
                             HIST_EVENTOS h,
                             USUARIO us,
                             SGD_TTR_TRANSACCION ttr,
                             radicado b LEFT JOIN SGD_TPR_TPDCUMENTO c ON b.tdoc_codi=c.sgd_tpr_codigo
                         where
                                h.USUA_DOC=us.USUA_DOC
                                AND h.SGD_TTR_CODIGO=ttr.SGD_TTR_CODIGO
                                AND b.RADI_NUME_RADI=h.RADI_NUME_RADI
                                AND h.USUA_DOC=\'' . $usua_doc . '\'
                                AND b.radi_nume_radi is not null
                                AND ttr.SGD_TTR_CODIGO in (9,8,13,12,16,65) 
                                ' . $whereUsuario . $whereFiltro;
        }break;
    case 'mysql': {
            $sSQL_1 = "select $radi_nume_radi 			AS RAD_ENTRADA,  
                        " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FEC_RAD_E , 
                        substring($radi_nume_salida,1,15) 	AS RAD_SALIDA, 
                        " . $db->conn->SQLDate('Y/m/d H:i:s', 'a.anex_radi_fech') . " AS FEC_RAD_S,
                        " . $db->conn->SQLDate('Y/m/d', 'a.fecha_rec_remi') . " AS FECHA_REC_REMI,
                        " . $db->conn->SQLDate('Y/m/d H:i:s', 'a.anex_fech_envio') . " AS FEC_ENVIO,
                        td.sgd_tpr_descrip 			AS TIPO, 
                        r.ra_asun 				AS ASUNTO, 
                        d1.depe_nomb 				AS DEP_ACTUAL, 
                        b.usua_nomb 				AS USU_ACTUAL, 
                        r.radi_usu_ante 			AS USU_ANT, 
                        $redondeo 				AS DIAS_RESTAN
                        {$seguridad}
                from radicado r, anexos a, sgd_tpr_tpdcumento td, usuario b, dependencia d1, sgd_dt_radicado dt
                where r.radi_nume_radi = a.anex_radi_nume 
                        AND a.radi_nume_salida != '0'
                        AND cast(r.radi_nume_radi as char(15)) like '%2' 
                        AND r.tdoc_codi=td.sgd_tpr_codigo 
                        AND r.codi_nivel <=5 
                        AND r.radi_usua_actu=b.usua_codi 
                        AND r.radi_depe_actu=b.depe_codi 
                        AND b.depe_codi=d1.depe_codi 
                        AND a.radi_nume_salida NOT IN(SELECT radi_nume_radi FROM SGD_ANU_ANULADOS AN)
                        AND r.radi_nume_radi = dt.radi_nume_radi";
            //$sSQL_2 = "select top 300 $radi_nume_radi AS RAD_ENTRADA,
            $sSQL_2 = "select $radi_nume_radi 			AS RAD_ENTRADA,  
                            " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FEC_RAD_E, 
                            '0' AS RAD_SALIDA,
                            '' AS FEC_RAD_S, 
                            '' AS FECHA_REC_REMI,
                            '' AS FEC_ENVIO,
                            td.sgd_tpr_descrip AS TIPO, 
                            r.ra_asun AS ASUNTO, 
                            d1.depe_nomb AS DEP_ACTUAL, 
                            b.usua_nomb AS USU_ACTUAL, 
                            r.radi_usu_ante AS USU_ANT,
                            $redondeo AS DIAS_RESTAN
                            {$seguridad}
                    FROM radicado r, sgd_tpr_tpdcumento td, usuario b, dependencia d1, sgd_dt_radicado dt
                    WHERE  r.tdoc_codi=td.sgd_tpr_codigo 
                            AND r.codi_nivel <=5 
                            AND r.radi_usua_actu=b.usua_codi AND r.radi_depe_actu=b.depe_codi 
                            AND b.depe_codi=d1.depe_codi 
                            AND substring($radi_nume_radi," . (11 + $longitud_codigo_dependencia) . ",1) = '2'
                            AND  R.RADI_NUME_RADI NOT IN(SELECT ANEX_RADI_NUME FROM ANEXOS)
                            AND r.radi_nume_radi = dt.radi_nume_radi";
            //$sSQL_3 = "select top 300 $radi_nume_radi AS RAD_ENTRADA,
            $sSQL_3 = "select $radi_nume_radi 			AS RAD_ENTRADA,  
                                " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FEC_RAD_E,
                                'ANEXO SIN RADICAR' AS RAD_SALIDA, 
                                " . $db->conn->SQLDate('Y/m/d H:i:s', 'a.anex_radi_fech') . " AS FEC_RAD_S,
                                " . $db->conn->SQLDate('Y/m/d', 'a.fecha_rec_remi') . " AS FECHA_REC_REMI,
                                " . $db->conn->SQLDate('Y/m/d H:i:s', 'a.anex_fech_envio') . " AS FEC_ENVIO,
                                td.sgd_tpr_descrip AS TIPO, 
                                r.ra_asun AS ASUNTO, 
                                d1.depe_nomb AS DEP_ACTUAL, 
                                b.usua_nomb AS USU_ACTUAL, 
                                r.radi_usu_ante AS USU_ANT, 
                                $redondeo AS DIAS_RESTAN
                                {$seguridad}
                        from radicado r, anexos a, sgd_tpr_tpdcumento td, usuario b, dependencia d1, sgd_dt_radicado dt
                        where r.radi_nume_radi = a.anex_radi_nume 
                                AND a.radi_nume_salida is null AND a.anex_borrado = 'N'
                                AND cast(r.radi_nume_radi as char(15)) like '%2' 
                                AND r.tdoc_codi=td.sgd_tpr_codigo 
                                AND r.codi_nivel <=5 
                                AND r.radi_usua_actu=b.usua_codi 
                                AND r.radi_depe_actu=b.depe_codi 
                                AND b.depe_codi=d1.depe_codi
                                AND r.radi_nume_radi = dt.radi_nume_radi";
            $queryE = "SELECT " .
                    $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . "  	AS FECH_RADI, 
					count($radi_nume_radi) 					AS RADICADOS, 
					MIN(" . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . ") AS HID_FECH_SELEC
				from radicado r
				WHERE cast(radi_nume_radi as char(15)) LIKE '%2'
				$condicionE $sWhereFec
			GROUP BY " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . "  ORDER BY $orno $ascdesc";
            //-------------------------------
            // Assemble full SQL statement
            //-------------------------------

            if (!is_null($fecSel))
                $sWhereFecE = " $condicionE AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " = '" . $fecSel . "'";

            $sWhereC = $sWhereFecE;
            $sSQL = $sSQL_1 . $sWhereC . $sWhereFec . " UNION " . $sSQL_2 . $sWhereC . $sWhereFec . " UNION " . $sSQL_3 . $sWhereC . $sWhereFec . $sOrder;
            /** CONSULTA PARA VER DETALLES 
             */
            $sSQL = $sSQL_1 . $sWhereFecE . " UNION " . $sSQL_2 . $sWhereFecE . " UNION " . $sSQL_3 . $sWhereFecE . $sOrder;
            $queryEDetalle = $sSQL . $orderE;
        }break;
    //modificado skina consulta en postgres
    case 'postgres': {

            /* Consulta de cantidad de radicados por fecha */
            $queryE = "SELECT " .
                    $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi')." AS FECH_RADI, 
                    count($radi_nume_radi) AS RADICADOS, 
                    MIN(" . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . ") AS HID_FECH_SELEC
                FROM radicado r
                WHERE  (radi_nume_radi  LIKE '%2' or radi_nume_radi  LIKE '%4')
                    $condicionE $sWhereFec
                GROUP BY " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . "  
                ORDER BY $orno $ascdesc";

            
            $sSQL_1 = "SELECT $radi_nume_radi AS RAD_ENTRADA,  
                        " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FEC_RAD_E , 
                        $radi_nume_salida                                      	      AS RAD_SALIDA, 
                        " . $db->conn->SQLDate('Y/m/d H:i:s', 'a.anex_radi_fech') . " AS FEC_RAD_S,
                        " . $db->conn->SQLDate('Y/m/d', 'a.fecha_rec_remi') . " AS FECHA_REC_REMI,
                        " . $db->conn->SQLDate('Y/m/d H:i:s', 'a.anex_fech_envio') . " AS FEC_ENVIO,
                        td.sgd_tpr_descrip  AS TIPO, 
                        r.ra_asun   AS ASUNTO, 
                        d1.depe_nomb  AS DEP_ACTUAL, 
                        b.usua_nomb  AS USU_ACTUAL, 
                        r.radi_usu_ante  AS USU_ANT, 
                        $redondeo  AS DIAS_RESTAN
                        {$seguridad}
                FROM radicado r, anexos a, sgd_tpr_tpdcumento td, usuario b, dependencia d1, sgd_dt_radicado dt
                WHERE r.radi_nume_radi = a.anex_radi_nume 
                        AND a.radi_nume_salida != '0'
                        AND (r.radi_nume_radi like '%2'  or r.radi_nume_radi like '%4' )
                        AND r.tdoc_codi=td.sgd_tpr_codigo 
                        AND r.codi_nivel <=5 
                        AND r.radi_usua_actu=b.usua_codi 
                        AND r.radi_depe_actu=b.depe_codi 
                        AND b.depe_codi=d1.depe_codi 
                        AND a.radi_nume_salida NOT IN(SELECT radi_nume_radi FROM SGD_ANU_ANULADOS AN)
                        AND r.radi_nume_radi = dt.radi_nume_radi";

            //$sSQL_2 = "select top 300 $radi_nume_radi AS RAD_ENTRADA,
            $sSQL_2 = "SELECT $radi_nume_radi AS RAD_ENTRADA,  
                            " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FEC_RAD_E, 
                            '0' AS RAD_SALIDA,
                            '' AS FEC_RAD_S, 
                            '' AS FECHA_REC_REMI,
                            '' AS FEC_ENVIO,
                            td.sgd_tpr_descrip AS TIPO, 
                            r.ra_asun AS ASUNTO, 
                            d1.depe_nomb AS DEP_ACTUAL, 
                            b.usua_nomb AS USU_ACTUAL, 
                            r.radi_usu_ante AS USU_ANT,
                            $redondeo AS DIAS_RESTAN
                            {$seguridad}
                    FROM radicado r, sgd_tpr_tpdcumento td, usuario b, dependencia d1, sgd_dt_radicado dt
                    WHERE  r.tdoc_codi=td.sgd_tpr_codigo 
                            AND r.codi_nivel <=5 
                            AND r.radi_usua_actu=b.usua_codi AND r.radi_depe_actu=b.depe_codi 
                            AND b.depe_codi=d1.depe_codi 
                            AND substring($radi_nume_radi," . (11 + $longitud_codigo_dependencia) . ",1) = '2'
                            AND  R.RADI_NUME_RADI NOT IN(SELECT ANEX_RADI_NUME FROM ANEXOS)
                            AND r.radi_nume_radi = dt.radi_nume_radi";

            //$sSQL_3 = "select top 300 $radi_nume_radi AS RAD_ENTRADA,
            $sSQL_3 = "SELECT $radi_nume_radi AS RAD_ENTRADA,  
                            " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FEC_RAD_E,
                            'ANEXO SIN RADICAR' AS RAD_SALIDA, 
                            " . $db->conn->SQLDate('Y/m/d H:i:s', 'a.anex_radi_fech') . " AS FEC_RAD_S,
                            " . $db->conn->SQLDate('Y/m/d', 'a.fecha_rec_remi') . " AS FECHA_REC_REMI,
                            " . $db->conn->SQLDate('Y/m/d H:i:s', 'a.anex_fech_envio') . " AS FEC_ENVIO,
                            td.sgd_tpr_descrip AS TIPO, 
                            r.ra_asun AS ASUNTO, 
                            d1.depe_nomb AS DEP_ACTUAL, 
                            b.usua_nomb AS USU_ACTUAL, 
                            r.radi_usu_ante AS USU_ANT, 
                            $redondeo AS DIAS_RESTAN
                            {$seguridad}
                        FROM radicado r, anexos a, sgd_tpr_tpdcumento td, usuario b, dependencia d1, sgd_dt_radicado dt
                        WHERE r.radi_nume_radi = a.anex_radi_nume 
                            AND a.radi_nume_salida is null AND a.anex_borrado = 'N'
                            AND (r.radi_nume_radi like '%2' or r.radi_nume_radi like '%4' )
                            AND r.tdoc_codi=td.sgd_tpr_codigo 
                            AND r.codi_nivel <=5 
                            AND r.radi_usua_actu=b.usua_codi 
                            AND r.radi_depe_actu=b.depe_codi 
                            AND b.depe_codi=d1.depe_codi
                            AND r.radi_nume_radi = dt.radi_nume_radi";
            
            //-------------------------------
            // Assemble full SQL statement
            //-------------------------------

            if (!is_null($fecSel))
                $sWhereFecE = " $condicionE AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " = '" . $fecSel . "'";

            $sWhereC = $sWhereFecE;
            $sSQL = $sSQL_1 . $sWhereC . $sWhereFec . " UNION " . $sSQL_2 . $sWhereC . $sWhereFec . " UNION " . $sSQL_3 . $sWhereC . $sWhereFec . $sOrder;
            /** CONSULTA PARA VER DETALLES 
             */
            $sSQL = $sSQL_1 . $sWhereFecE . " UNION " . $sSQL_2 . $sWhereFecE . " UNION " . $sSQL_3 . $sWhereFecE . $sOrder;
            $queryEDetalle = $sSQL . $orderE;
        }
    break;
    case 'oracle':
    case 'oci8':
    case 'oci805':
    case 'ocipo': {
            $sSQL_1 = "select r.radi_nume_radi 										AS RAD_ENTRADA, 
					to_char(r.radi_fech_radi,'yyyy/mm/dd hh24:mi:ss') 				AS FEC_RAD_E , 
					substr(a.radi_nume_salida,1," . (11 + $longitud_codigo_dependencia) . ")		AS RAD_SALIDA, 
					to_char(a.anex_radi_fech,'yyyy/mm/dd hh24:mi:ss') 				AS FEC_RAD_S,
				    to_char(a.fecha_rec_remi,'yyyy/mm/dd') 				AS FECHA_REC_REMI,
				    to_char(a.anex_fech_envio,'yyyy/mm/dd hh24:mi:ss')				AS FEC_ENVIO,
					td.sgd_tpr_descrip 												AS TIPO, 
					r.ra_asun 														AS ASUNTO, 
					d1.depe_nomb 													AS DEP_ACTUAL, 
					b.usua_nomb 													AS USU_ACTUAL, 
					r.radi_usu_ante 												AS USU_ANT, 
					round(((r.radi_fech_radi+(td.sgd_tpr_termino * 7/5))-sysdate)) 	AS DIAS_RESTAN
					{$seguridad}
				from radicado r, anexos a, sgd_tpr_tpdcumento td, usuario b, dependencia d1
				where r.radi_nume_radi = a.anex_radi_nume 
					AND a.radi_nume_salida != '0'
					AND (r.radi_nume_radi like '%2' or r.radi_nume_radi like '%4')
					AND r.tdoc_codi=td.sgd_tpr_codigo 
					AND r.codi_nivel <=5 
					AND r.radi_usua_actu=b.usua_codi 
					AND r.radi_depe_actu=b.depe_codi 
					AND b.depe_codi=d1.depe_codi 
					AND a.radi_nume_salida NOT IN(SELECT radi_nume_radi FROM SGD_ANU_ANULADOS AN)
					AND rownum <= 300";
            $sSQL_2 = "SELECT 
					r.radi_nume_radi 												AS RAD_ENTRADA, 
					to_char(r.radi_fech_radi,'yyyy/mm/dd hh24:mi:ss') 				AS FEC_RAD_E, 
					'0' 															AS RAD_SALIDA,
					to_char('','yyyy/mm/dd hh24:mi:ss') 							AS FEC_RAD_S, 
					to_char('','yyyy/mm/dd') 							AS FECHA_REC_REMI,
			        to_char('','yyyy/mm/dd hh24:mi:ss') 							AS FEC_ENVIO,
					td.sgd_tpr_descrip 												AS TIPO, 
					r.ra_asun 														AS ASUNTO, 
					d1.depe_nomb 													AS DEP_ACTUAL, 
					b.usua_nomb 													AS USU_ACTUAL, 
					r.radi_usu_ante 												AS USU_ANT,
					round(((r.radi_fech_radi+(td.sgd_tpr_termino * 7/5))-sysdate)) 	AS DIAS_RESTAN
					{$seguridad}
				FROM 
					radicado r, 
					sgd_tpr_tpdcumento td, 
					usuario b, 
					dependencia d1
				WHERE  r.tdoc_codi=td.sgd_tpr_codigo 
					AND r.codi_nivel <=5 
					AND r.radi_usua_actu=b.usua_codi AND r.radi_depe_actu=b.depe_codi 
					AND b.depe_codi=d1.depe_codi 
					AND substr(r.radi_nume_radi," . (11 + $longitud_codigo_dependencia) . ",1) = '2'
					AND  R.RADI_NUME_RADI NOT IN(SELECT ANEX_RADI_NUME FROM ANEXOS)
					AND rownum <= 300";
            $sSQL_3 = "
				select r.radi_nume_radi 												AS RAD_ENTRADA, 
					to_char(r.radi_fech_radi,'yyyy/mm/dd hh24:mi:ss') 					AS FEC_RAD_E,
					'ANEXO SIN RADICAR' 												AS RAD_SALIDA, 
					to_char(a.anex_radi_fech,'yyyy/mm/dd hh24:mi:ss') 					AS FEC_RAD_S, 
				    to_char(a.sgd_fech_impres,'yyyy/mm/dd') 					AS FECHA_REC_REMI,
				    to_char(a.anex_fech_envio,'yyyy/mm/dd hh24:mi:ss') 					AS FEC_ENVIO,
					td.sgd_tpr_descrip 													AS TIPO, 
					r.ra_asun 															AS ASUNTO, 
					d1.depe_nomb 														AS DEP_ACTUAL, 
					b.usua_nomb 														AS USU_ACTUAL, 
					r.radi_usu_ante 													AS USU_ANT, 
					round(((r.radi_fech_radi+(td.sgd_tpr_termino * 7/5))-sysdate)) 		AS DIAS_RESTAN
					{$seguridad}
				from radicado r, anexos a, sgd_tpr_tpdcumento td, usuario b, dependencia d1
				where r.radi_nume_radi = a.anex_radi_nume 
					AND a.radi_nume_salida is null AND a.anex_borrado = 'N'
					AND (r.radi_nume_radi like '%2' or r.radi_nume_radi like '%4')
					AND r.tdoc_codi=td.sgd_tpr_codigo 
					AND r.codi_nivel <=5 
					AND r.radi_usua_actu=b.usua_codi 
					AND r.radi_depe_actu=b.depe_codi 
					AND b.depe_codi=d1.depe_codi 
					AND rownum <= 300";
            $queryE = "
				SELECT substr(to_char(r.radi_fech_radi,'yyyy/mm/dd hh24:mi:ss'),1,10 ) FECH_RADI, 
					count(r.RADI_NUME_RADI) RADICADOS, 
					MIN(radi_fech_radi) HID_FECH_SELEC
				from radicado r
				WHERE (radi_nume_radi LIKE '%2' or radi_nume_radi LIKE '%4')
				$condicionE $sWhereFec
			GROUP BY substr(to_char(r.radi_fech_radi,'yyyy/mm/dd hh24:mi:ss'),1,10 ) 
			ORDER BY $orno $ascdesc";
            //-------------------------------
            // Assemble full SQL statement
            //-------------------------------

            $sWhereFecE = " $condicionE AND substr(r.radi_fech_radi,1,10) = to_date('" . $fecSel . "', 'yyyy/mm/dd HH24:MI:ss')";

            $sWhereC = $sWhereFecE;
        //            $sSQL = $sSQL_1 . $sWhereC . $sWhereFec . " UNION " . $sSQL_2 . $sWhereC . $sWhereFec . " UNION " . $sSQL_3 . $sWhereC . $sWhereFec . $sOrder;
            $sSQL = $sSQL_1 . $sWhereC . $sWhereFec . $sOrder;

            /** CONSULTA PARA VER DETALLES 
             */
        //            $sSQL = $sSQL_1 . $sWhereFecE . " UNION " . $sSQL_2 . $sWhereFecE . " UNION " . $sSQL_3 . $sWhereFecE . $sOrder;
        //            $queryEDetalle = $sSQL . $orderE;
            $sSQL = $sSQL_1 . $sWhereFecE . $sOrder;
            $queryEDetalle = $sSQL;
        }
    break;
}

if (isset($_GET['genDetalle']) && $_GET['denDetalle'] = 1) {
    $titulos = array("#", "1#RADICADODE ENTRADA", "2#FECHA RADICACION DE ENTRADA", "3#RADICACION DE SALIDA", "4#FECHA DE RADICACION DE SALIDA", "5#FECHA RECIBIDO REMITENTE", "6#FECHA DE ENVIO", "7#TIPO", "8#ASUNTO", "8#DEPENDENCIA ACTUAL", "9#USUARIO ACTUAL", "10#USUARIO ANTERIOR", "11#DIAS RESTANTES");
} else {
    $titulos = array("#", "1#FECHA DE RADICACION", "2#RADICADOS");
}

function pintarEstadistica($fila, $indice, $numColumna) {
    global $ruta_raiz, $_POST, $_GET, $krd, $ambiente;
    $salida = "";

    if (isset($fila['RAD_ENTRADA'])) {
        $fecharadi = $fila['FEC_RAD_E'];
        $radicados = $fila['RAD_SALIDA'];
        $hid_fech_select = $fila['FEC_RAD_S'];
    } else {
        $fecharadi = $fila[0];
        $radicados = $fila[1];
        $hid_fech_select = $fila[2];
    }
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $fecharadi;
            break;
        case 2:
            $datosEnvioDetalle = "tipoEstadistica=" . $_GET['tipoEstadistica'] . "&amp;genDetalle=1&amp;usua_doc=" . urlencode($fila['HID_USUA_DOC']) . "&amp;dependencia_busq=" . $_GET['dependencia_busq'] . "&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;tipoRadicado=" . $_GET['tipoRadicado'] . "&amp;tipoDocumento=" . $_GET['tipoDocumento'] . "&amp;codUs=" . $fila['HID_COD_USUARIO'] . "&amp;fecSel=" . $hid_fech_select;
            $datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}&amp;krd={$krd}\"  target=\"detallesSec\" >" . $radicados . "</a>";
            break;
    }
    return $salida;
}

function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $ruta_raiz, $encabezado, $krd, $ambiente;
    
//    echo "<pre>";
//    print_r($fila);
//    echo "</pre>";
    
    if (isset($fila['RAD_ENTRADA'])) {
        $fecharadiE = $fila['FEC_RAD_E'];
        $radSalida = $fila['RAD_SALIDA'];
        $fecharadiS = $fila['FEC_RAD_S'];
        $fechaImpre = $fila['FECHA_REC_REMI'];
        $fechaEnvio = $fila['FEC_ENVIO'];
        $tipo = $fila['TIPO'];
        $asunto = $fila['ASUNTO'];
        $depeActu = $fila['DEP_ACTUAL'];
        $usuaActu = $fila['USU_ACTUAL'];
        $usuaAnterior = $fila['USU_ANT'];
        $diasRestantes = $fila['DIAS_RESTAN'];
        $radentrada = $fila['RAD_ENTRADA'];
    } else {
        $radentrada = $fila[0];
        $fecharadiE = $fila[1];
        $radSalida = $fila[2];
        $fecharadiS = $fila[3];
        $fechaImpre = $fila[4];
        $fechaEnvio = $fila[5];
        $tipo = $fila[6];
        $asunto = $fila[7];
        $depeActu = $fila[8];
        $usuaActu = $fila[9];
        $usuaAnterior = $fila[10];
        $diasRestantes = $fila[11];
    }

    $verImg = ($fila['SGD_SPUB_CODIGO'] == 1) ? ($fila['USUARIO'] != $_SESSION['usua_nomb'] ? false : true) : ($fila['USUA_NIVEL'] > $_SESSION['nivelus'] ? false : true);
//    $numRadicado = $fila['RAD_ENTRADA'];

    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = "<center class=\"leidos\">{$radentrada}</center>";
            break;
        case 2:
            if ($verImg)
                $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $radentrada . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" >" . $fecharadiE . "</a>";
            else
                $salida = "<a class=\"vinculos\" href=\"#\" onclick=\"alert(\"ud no tiene permisos para ver el radicado\");\">" . $fecharadiE . "</a>";
            break;
        case 3:
            $salida = "<center class=\"leidos\">" . $radSalida . "</center>";
            break;
        case 4:
            $salida = "<center class=\"leidos\">" . $fecharadiS . "</center>";
            break;
        case 5:
            $salida = "<center class=\"leidos\">" . $fechaImpre . " </center>";
            break;
        case 6:
            $salida = "<center class=\"leidos\">" . $fechaEnvio . "</center>";
            break;
        case 7:
            $salida = "<center class=\"leidos\">" . $tipo . "</center>";
            break;
        case 8:
            $salida = "<center class=\"leidos\">" . $asunto . "</center>";
            break;
        case 9:
            $salida = "<center class=\"leidos\">" . $depeActu . "</center>";
            break;
        case 10:
            $salida = "<center class=\"leidos\">" . $usuaActu . "</center>";
            break;
        case 11:
            $salida = "<center class=\"leidos\">" . $usuaAnterior . "</center>";
            break;
        case 12:
            $salida = "<center class=\"leidos\">" . $diasRestantes . "</center>";
            break;
    }
    return $salida;
}

?>
