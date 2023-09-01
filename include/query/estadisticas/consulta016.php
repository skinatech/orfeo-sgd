<?php
$dir_raiz = $_SESSION['dir_raiz'];
/* * *******************************************************************************
 *       Filename: Reporte Proceso Radicados de Entrada
 * 		 @autor LUCIA OJEDA ACOSTA - CRA
 * 		 @version ORFEO 3.5
 *       PHP 4.0 build 22-Feb-2006
 * ******************************************************************************* */

$coltp3Esp = '"' . $tip3Nombre[3][2] . '"';
if (!$orno)
    $orno = 1;
$orderE = "	ORDER BY $orno $ascdesc ";

$desde = $fecha_ini . " " . "00:00:00";
$hasta = $fecha_fin . " " . "23:59:59";

switch ($db->driver) {
    case 'mssql': {
            $a = "datepart(dd," . $db->conn->sysTimeStamp . " -r.radi_fech_radi)"; //sql server
            $b = "datepart(dd,h.hist_fech - r.radi_fech_radi)";
        }break;
    case 'mysql': {
            $a = "DAYOFWEEK(r.radi_fech_radi-" . $db->conn->sysTimeStamp . ")";
            $b = "DAYOFWEEK(h.hist_fech - r.radi_fech_radi)";
        }break;
    case 'postgres': {
            $a = "date_part('days'," . $db->conn->sysTimeStamp . " -r.radi_fech_radi)";
            $b = "date_part('days',h.hist_fech - r.radi_fech_radi)";
        }break;
    case 'ocipo': {
            $a = "date_part('days'," . $db->conn->sysTimeStamp . " -r.radi_fech_radi)";
            $b = "date_part('days',h.hist_fech - r.radi_fech_radi)";
        }break;
}

$c = "h.hist_fech";
$d = "r.radi_fech_radi";

$redondeo = "CASE WHEN (select count(*) from radicado where radi_depe_actu='0999')=1  THEN " . $b . "  ELSE " . $a . " END ";
$fech_arch = "CASE WHEN (select count(*) from hist_eventos h where r.radi_nume_radi=h.radi_nume_radi and h.sgd_ttr_codigo=13)>=1  THEN " . $c . "  ELSE " . $d . " END ";
$condicion2 = "";

$sWhereFec = " and " . $db->conn->SQLDate('Y/m/d H:i:s', 'R.RADI_FECH_RADI') . " >= '$desde'
               and " . $db->conn->SQLDate('Y/m/d H:i:s', 'R.RADI_FECH_RADI') . " <= '$hasta'";

if ($dependencia_busq != '99999')
    $condicionE = "	AND r.radi_depe_ante='$dependencia_busq' ";
switch ($db->driver) {
    case 'mssql': {
        $sSQL_1 = "select distinct($radi_nume_radi) 			AS RAD_ENTRADA,  
                        " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FEC_RAD_E ,
                        td.sgd_tpr_descrip 			AS TIPO, 
                        r.ra_asun 				AS ASUNTO, 
                        d1.depe_nomb 				AS DEP_ACTUAL, 
                        b.usua_nomb 				AS USU_ACTUAL, 
                        r.radi_usu_ante 			AS USU_ANT, 
                        a.radi_nume_salida                      AS RAD_SALIDA,
                        ra.radi_fech_radi                       AS FEC_RAD_S,
                        a.fecha_rec_remi                       AS FECHA_REC_REMI,
                        ren.sgd_renv_fech                       AS FEC_ENVIO,
                         $redondeo 				AS DIAS_TRAMITE
                        {$seguridad}
                    from radicado r left outer join hist_eventos h on (r.radi_nume_radi=h.radi_nume_radi) 
                         left outer join sgd_tpr_tpdcumento td on (r.tdoc_codi=td.sgd_tpr_codigo) 
                        left outer join usuario b on (r.radi_usua_actu=b.usua_codi and r.radi_depe_actu=b.depe_codi) 
                        left outer join dependencia d1 on (r.radi_depe_actu=d1.depe_codi)
                        inner join anexos a on (r.radi_nume_radi=a.anex_radi_nume)
                        inner join radicado ra on (ra.radi_nume_radi=a.radi_nume_salida)
                        left outer join sgd_renv_regenvio ren on (ren.radi_nume_sal=a.radi_nume_salida)
                        where 1=1  $whereTipoRadicado  $condicionE  ";

            $queryE = "SELECT   "  .$db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . "   AS FECH_RADI, 
                                count(" . "distinct " . $radi_nume_radi . ")      AS RADICADOS,
                                count(distinct a.radi_nume_salida)                AS RAD_SALIDAs
                        from radicado r 
                            left outer join hist_eventos h on r.radi_nume_radi=h.radi_nume_radi 
                            JOIN usuario u ON u.usua_codi=r.radi_usua_actu 
                            inner join anexos a on (r.radi_nume_radi=a.anex_radi_nume) 
                            inner join radicado ra on (ra.radi_nume_radi=a.radi_nume_salida)
                        WHERE 1=1 
                        $whereTipoRadicado 
                        $condicionE 
                        $sWhereFec
			GROUP BY " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " ";

            if (!is_null($fecSel))
                $sWhereFecE = " $condicionE AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " = '" . $fecSel . "'";

            $sSQL = $sSQL_1 . $sWhereFecE . $sOrder;
            $queryEDetalle = $sSQL ;

        }break;
    case 'mysql': {
            $sSQL_1 = "select distinct($radi_nume_radi) 			AS RAD_ENTRADA,  
                    " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FEC_RAD_E ,
                    td.sgd_tpr_descrip 			AS TIPO, 
                    r.ra_asun 				AS ASUNTO, 
                    d1.depe_nomb 				AS DEP_ACTUAL, 
                    b.usua_nomb 				AS USU_ACTUAL, 
                    r.radi_usu_ante 			AS USU_ANT, 
                    a.radi_nume_salida                      AS RAD_SALIDA,
                    ra.radi_fech_radi                       AS FEC_RAD_S,
                    a.fecha_rec_remi                       AS FECHA_REC_REMI,
                    ren.sgd_renv_fech                       AS FEC_ENVIO,
                     $redondeo 				AS DIAS_TRAMITE
                    {$seguridad}
		from radicado r left outer join hist_eventos h on (r.radi_nume_radi=h.radi_nume_radi) 
                    left outer join sgd_tpr_tpdcumento td on (r.tdoc_codi=td.sgd_tpr_codigo) 
                    left outer join usuario b on (r.radi_usua_actu=b.usua_codi and r.radi_depe_actu=b.depe_codi) 
                    left outer join dependencia d1 on (r.radi_depe_actu=d1.depe_codi)
                    inner join anexos a on (r.radi_nume_radi=a.anex_radi_nume)
                    inner join radicado ra on (ra.radi_nume_radi=a.radi_nume_salida)
                    left outer join sgd_renv_regenvio ren on (ren.radi_nume_sal=a.radi_nume_salida)
                    where 1=1 $whereTipoRadicado $condicionE ";

            $sSQL_2 = "select $radi_nume_radi 			AS RAD_ENTRADA,  
                            " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FEC_RAD_E, 
                            td.sgd_tpr_descrip AS TIPO, 
                            r.ra_asun AS ASUNTO, 
                            d1.depe_nomb AS DEP_ACTUAL, 
                            b.usua_nomb AS USU_ACTUAL, 
                            r.radi_usu_ante AS USU_ANT,
                            $redondeo AS DIAS_TRAMITE
                            {$seguridad}
		FROM radicado r left outer join hist_eventos h on r.radi_nume_radi=h.radi_nume_radi , sgd_tpr_tpdcumento td, usuario b, dependencia d1
                WHERE  r.tdoc_codi=td.sgd_tpr_codigo 
                        $condicion2
                        $whereTipoRadicado
                        AND r.radi_usua_actu=b.usua_codi AND r.radi_depe_actu=b.depe_codi 
                        AND b.depe_codi=d1.depe_codi 
                        AND  R.RADI_NUME_RADI NOT IN(SELECT ANEX_RADI_NUME FROM ANEXOS)";
            $sSQL_3 = "select $radi_nume_radi 			AS RAD_ENTRADA,  
                        " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FEC_RAD_E,
                        td.sgd_tpr_descrip AS TIPO, 
                        r.ra_asun AS ASUNTO, 
                        d1.depe_nomb AS DEP_ACTUAL, 
                        b.usua_nomb AS USU_ACTUAL, 
                        r.radi_usu_ante AS USU_ANT, 
                        $redondeo AS DIAS_TRAMITE
                        {$seguridad}
                from radicado r left outer join hist_eventos h on r.radi_nume_radi=h.radi_nume_radi , sgd_tpr_tpdcumento td, usuario b, dependencia d1
                where 
                        r.tdoc_codi=td.sgd_tpr_codigo 
                        $whereTipoRadicado
                        AND r.radi_usua_actu=b.usua_codi 
                        AND r.radi_depe_actu=b.depe_codi 
                        AND b.depe_codi=d1.depe_codi";
            $queryE = "SELECT   " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . "  	AS FECH_RADI, 
                            count(" . "distinct " . $radi_nume_radi . ") 					AS RADICADOS,
                            MIN(" . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . ") AS HID_FECH_SELEC
                    from radicado r left outer join hist_eventos h on r.radi_nume_radi=h.radi_nume_radi JOIN usuario u ON u.usua_codi=r.radi_usua_actu inner join anexos a on (r.radi_nume_radi=a.anex_radi_nume) inner join radicado ra on (ra.radi_nume_radi=a.radi_nume_salida)
                    WHERE 1=1   $whereTipoRadicado  $condicionE   $sWhereFec
                    GROUP BY " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " ORDER BY $orno $ascdesc";
            //-------------------------------
            // Assemble full SQL statement
            //-------------------------------

            if (!is_null($fecSel))
                $sWhereFecE = " $condicionE AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " = '" . $fecSel . "'";
            $sWhereC = $sWhereFecE;
            $sSQL = $sSQL_1 . $sWhereC . $sWhereFec . " UNION " . $sSQL_2 . $sWhereC . $sWhereFec . " UNION " . $sSQL_3 . $sWhereC . $sWhereFec . $sOrder;
            /** CONSULTA PARA VER DETALLES */
            $sSQL = $sSQL_1 . $sWhereFecE . $sOrder;
            $queryEDetalle = $sSQL . $orderE;
        }break;
    //modificado skina consulta en postgres
    case 'postgres': {
            $sSQL_1 = "
            select 
                r.RADI_NUME_RADI RADICADO , 
                r.RA_ASUN ASUNTO ,   
				" . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FEC_RAD_E ,
                r.RADI_PATH HID_RADI_PATH,
                a.RADI_NUME_SALIDA , 
                a.ANEX_RADI_FECH , 
                a.ANEX_FECH_ENVIO , 
                a.FECHA_REC_REMI , 
                tp.SGD_TPR_TERMINO , 
                tp.SGD_TPR_DESCRIP , 
                a.anex_radi_fech-r.RADI_FECH_RADI DIAS_TRAMITE , 
                a.anex_fech_envio-r.RADI_FECH_RADI DIAS_TRAMITE_ENVIO , 
                date_part('days',CURRENT_TIMESTAMP -r.radi_fech_radi) DIAS_RAD , 
                d.depe_nomb,
                r.radi_usu_ante
            from     
                radicado r 
                inner join anexos a on r.radi_nume_radi=a.anex_radi_nume 
                inner join dependencia d on r.radi_depe_ante=d.depe_codi 
                inner join usuario B on r.radi_usua_actu=B.usua_codi and r.radi_depe_actu=B.depe_codi 
                inner join sgd_tpr_tpdcumento tp on r.tdoc_codi=tp.sgd_tpr_codigo 
            where
                r.radi_depe_actu='0999' 
                and r.radi_usua_actu=1 
					$whereTipoRadicado
                    $condicionE 
					";
                    
            $queryE = "select 
                            de.depe_nomb as DEPENDENCIA_ANTERIOR, 
                            count(r.radi_nume_radi) AS RADICADOS 
                        from 
                            radicado r 
                            inner join dependencia de ON r.radi_depe_ante=de.depe_codi
                        WHERE
                            r.radi_depe_actu='0999' 
                            and (r.radi_nume_deri = '0' or r.radi_nume_deri is null) 
                            $whereTipoRadicado 
                            $condicionE 
                            $sWhereFec
			GROUP BY de.depe_nomb ORDER BY $orno $ascdesc";

            if (!is_null($fecSel))
                $sWhereFecE = " $condicionE AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " = '" . $fecSel . "'";

            $sWhereC = $sWhereFecE;
            /** CONSULTA PARA VER DETALLES */
            $sSQL = $sSQL_1 . $sWhereFec . $sOrder;
            $queryEDetalle = $sSQL . $orderE;
        }break;
    case 'oracle':
    case 'oci8':
    case 'oci805':
    case 'ocipo': {
            $sSQL_1 = "select r.radi_nume_radi 										AS RAD_ENTRADA, 
					to_char(r.radi_fech_radi,'yyyy/mm/dd hh24:mi:ss') 				AS FEC_RAD_E , 
					substr(a.radi_nume_salida,1,11+" . $longitud_codigo_dependencia . ") 								AS RAD_SALIDA, 
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
					AND cast(r.radi_nume_radi as varchar(15))  like '%2' 
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
					AND substr(r.radi_nume_radi,11+" . $longitud_codigo_dependencia . ",1) = '2'
					AND  R.RADI_NUME_RADI NOT IN(SELECT ANEX_RADI_NUME FROM ANEXOS)
					AND rownum <= 300";
            $sSQL_3 = "
				select r.radi_nume_radi 												AS RAD_ENTRADA, 
					to_char(r.radi_fech_radi,'yyyy/mm/dd hh24:mi:ss') 					AS FEC_RAD_E,
					'ANEXO SIN RADICAR' 												AS RAD_SALIDA, 
					to_char(a.anex_radi_fech,'yyyy/mm/dd hh24:mi:ss') 					AS FEC_RAD_S, 
				    to_char(a.fecha_rec_remi,'yyyy/mm/dd') 					AS FECHA_REC_REMI,
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
					AND cast(r.radi_nume_radi as varchar(15)) like '%2' 
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
				WHERE cast(radi_nume_radi as varchar(15)) LIKE '%2'
				$condicionE $sWhereFec
			GROUP BY substr(to_char(r.radi_fech_radi,'yyyy/mm/dd hh24:mi:ss'),1,10 ) 
			ORDER BY $orno $ascdesc";
            //-------------------------------
            // Assemble full SQL statement
            //-------------------------------

            $sWhereFecE = " $condicionE AND substr(r.radi_fech_radi,1,10) = to_date('" . $fecSel . "', 'yyyy/mm/dd HH24:MI:ss')";

            $sWhereC = $sWhereFecE;
            $sSQL = $sSQL_1 . $sWhereC . $sWhereFec . " UNION " . $sSQL_2 . $sWhereC . $sWhereFec . " UNION " . $sSQL_3 . $sWhereC . $sWhereFec . $sOrder;
            /** CONSULTA PARA VER DETALLES 
             */
            $sSQL = $sSQL_1 . $sWhereFecE . " UNION " . $sSQL_2 . $sWhereFecE . " UNION " . $sSQL_3 . $sWhereFecE . $sOrder;
            $queryEDetalle = $sSQL . $orderE;
        }break;
}

if (isset($_GET['genDetalle']) && $_GET['denDetalle'] = 1) {
    $titulos = array("#", "1#RADICADODE ENTRADA", "2#FECHA RADICACION DE ENTRADA", "3#RADICACION DE SALIDA", "4#FECHA DE RADICACION DE SALIDA", "5#FECHA RECIBIDO REMITENTE", "6#FECHA DE ENVIO", "7#TIPO", "8#ASUNTO", "8#DEPENDENCIA ACTUAL", "9#USUARIO ACTUAL", "10#USUARIO ANTERIOR", "11#DIAS TRAMITE", "12#TRAMITE TERMINADO");
} else {
    $titulos = array("#", "1#DEPENDENCIA_ANTERIOR", "2#RADICADOS");
}

function pintarEstadistica($fila, $indice, $numColumna) {
    global $ruta_raiz, $_GET, $_GET, $krd, $ambiente;
    
        $depeAnterior = $fila['DEPENDENCIA_ANTERIOR'];
        $radicado = $fila['RADICADOS'];
    
    
    $salida = "";
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $depeAnterior;
            break;
        case 2:
            $datosEnvioDetalle = "tipoEstadistica=" . $_GET['tipoEstadistica'] . "&amp;genDetalle=1&amp;usua_doc=" . urlencode($fila['HID_USUA_DOC']) . "&amp;dependencia_busq=" . $_GET['dependencia_busq'] . "&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;tipoRadicado=" . $_GET['tipoRadicado'] . "&amp;tipoDocumento=" . $_GET['tipoDocumento'] . "&amp;codUs=" . $fila['HID_COD_USUARIO'] . "&amp;fecSel=" . $fechRadi;
            $datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}&amp;krd={$krd}\"  target=\"detallesSec\" >" . $radicado . "</a>";
            break;
        case 3:
            $salida = $totalRespuesta;
            break;
    }
    return $salida;
}

function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $ruta_raiz, $encabezado, $krd, $ambiente;
    
    if (isset($fila['FECH_RADI'])) {
        $radEntrada = $fila['RAD_ENTRADA'];
        $fechRadiE = $fila['FEC_RAD_E'];
        $tipoRad = $fila['TIPO'];
        $asunto = $fila['ASUNTO'];
        $depeActual = $fila['DEP_ACTUAL'];
        $usuaActual = $fila['USU_ACTUAL'];
        $usuaAnt = $fila['USU_ANT'];
        $radSalida = $fila['RAD_SALIDA'];
        $fechRadS = $fila['FEC_RAD_S'];
        $fechImpre = $fila['FECHA_REC_REMI'];
        $fechEnvio = $fila['FEC_ENVIO'];
        $diasTramite = $fila['DIAS_TRAMITE'];
    } else {
        $radEntrada = $fila[0];
        $fechRadiE = $fila[1];
        $tipoRad = $fila[2];
        $asunto = $fila[3];
        $depeActual = $fila[4];
        $usuaActual = $fila[5];
        $usuaAnt = $fila[6];
        $radSalida = $fila[7];
        $fechRadS = $fila[8];
        $fechImpre = $fila[9];
        $fechEnvio = $fila[10];
        $diasTramite = $fila[11];
    }
    
    $verImg = ($fila['SGD_SPUB_CODIGO'] == 1) ? ($fila['USUARIO'] != $_SESSION['usua_nomb'] ? false : true) : ($fila['USUA_NIVEL'] > $_SESSION['nivelus'] ? false : true);
//    $numRadicado = $fila['RAD_ENTRADA'];
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = "<center class=\"leidos\">{$radEntrada}</center>";
            break;
        case 2:
            if ($verImg)
                $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $radEntrada . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" >" . $fechRadiE. "</a>";
            else
                $salida = "<a class=\"vinculos\" href=\"#\" onclick=\"alert(\"ud no tiene permisos para ver el radicado\");\">" . $fechRadiE . "</a>";
            break;
        case 3:
            $salida = "<center class=\"leidos\">" . $radSalida . "</center>";
            break;
        case 4:
            $salida = "<center class=\"leidos\">" . $fechRadS . "</center>";
            break;
        case 5:
            $salida = "<center class=\"leidos\">" . $fechImpre . "</center>";
            break;
        case 6:
            $salida = "<center class=\"leidos\">" . $fechEnvio . "</center>";
            break;
        case 7:
            $salida = "<center class=\"leidos\">" . $tipoRad . "</center>";
            break;
        case 8:
            $salida = "<center class=\"leidos\">" . $asunto . "</center>";
            break;
        case 9:
            $salida = "<center class=\"leidos\">" . $depeActual . "</center>";
            break;
        case 10:
            $salida = "<center class=\"leidos\">" . $usuaActual . "</center>";
            break;
        case 11:
            $salida = "<center class=\"leidos\">" . $usuaAnt . "</center>";
            break;
        case 12:
            $salida = "<center class=\"leidos\">" . $diasTramite . "</center>";
            break;
        case 13:

            if ($depeActual == "Dependencia de Salida")
                $archivo = "si";
            else
                $archivo = "no";
            $salida = "<center class=\"leidos\">" . $archivo . "</center>";
            break;
    }
    return $salida;
}

?>
