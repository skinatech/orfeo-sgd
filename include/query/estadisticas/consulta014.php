<?php

/** RADICADOS DE ENTRADA RECIBIDOS DEL AREA DE CORRESPONDENCIA
 * 
 * @autor JAIRO H LOSADA - SSPD
 * @version ORFEO 3.1
 * 
 */
$coltp3Esp = '"' . $tip3Nombre[3][2] . '"';
if (!$orno)
    $orno = 1;

switch ($db->driver) {
    case 'mssql': {
            if ($dependencia_busq != '99999') {
                $condicionE = "	AND b.DEPE_CODI='$dependencia_busq' AND r.RADI_DEPE_ACTU='$dependencia_busq' ";
            }

            if ($tipoDocumento == '9999')
            {
                $queryE = "SELECT  b.USUA_NOMB USUARIO,
                          b.DEPE_CODI AS USUARIO_DEPE,
                          count($radi_nume_radi) RADICADOS
                          , MIN(b.USUA_CODI) HID_COD_USUARIO,
                          
                        FROM RADICADO r, USUARIO b
                        WHERE
                          r.RADI_USUA_ACTU=b.USUA_CODI
                        AND r.RADI_DEPE_ACTU=b.DEPE_CODI
                          $condicionE
                          $whereTipoRadicado
                        GROUP BY b.USUA_NOMB, b.DEPE_CODI";
            } else {

                $queryE = "SELECT b.USUA_NOMB USUARIO
                            b.DEPE_CODI AS USUARIO_DEPE
                            , t.SGD_TPR_DESCRIP TIPO_DOCUMENTO
                            , count($radi_nume_radi) RADICADOS
                            , MIN(b.USUA_CODI) HID_COD_USUARIO
                            , MIN(SGD_TPR_CODIGO) HID_TPR_CODIGO			
                    FROM RADICADO r 
                            INNER JOIN USUARIO b ON r.RADI_USUA_ACTU=b.USUA_CODI AND r.RADI_DEPE_ACTU=b.DEPE_CODI  
                            LEFT OUTER JOIN SGD_TPR_TPDCUMENTO t ON r.tdoc_codi=t.SGD_TPR_CODIGO
                    WHERE 1=1 $condicionE $whereTipoRadicado  
                    GROUP BY b.USUA_NOMB, t.SGD_TPR_DESCRIP, b.DEPE_CODI";
            }
            /** CONSULTA PARA VER DETALLES 
             */
            if (!is_null($codUs))
                $condicionE = " AND b.USUA_CODI= $codUs ";


            if (!is_null($tipoDOCumento)) {
                $condicionE .= " AND t.SGD_TPR_CODIGO = $tipoDOCumento ";
            }
            $queryEDetalle = "SELECT 
                    $radi_nume_radi RADICADO
                    ,t.SGD_TPR_DESCRIP TIPO_DE_DOCUMENTO
                    , b.USUA_NOMB USUARIO
                    , r.RA_ASUN ASUNTO
                    , " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " FECHA_RADICACION
                    , bod.NOMBRE_DE_LA_EMPRESA ESP
                    ,r.RADI_PATH HID_RADI_PATH
                FROM RADICADO r
                    INNER JOIN USUARIO b ON r.RADI_USUA_ACTU=b.USUA_CODI
                    LEFT OUTER JOIN SGD_TPR_TPDCUMENTO t ON r.tdoc_codi = t.SGD_TPR_CODIGO 
                    LEFT OUTER JOIN bodega_empresas bod ON r.eesp_codi = bod.identificador_empresa 
		WHERE 
                    r.RADI_DEPE_ACTU='$dependencia_busq' 			
                    AND b.DEPE_CODI='$dependencia_busq' 
                    $whereTipoRadicado ";
            $orderE = "	";

            /** CONSULTA PARA VER TODOS LOS DETALLES 
             */
            $queryETodosDetalle = $queryEDetalle . $condicionE . $orderE;
//            $queryEDetalle .= $condicionE . $orderE;
        }break;

    case 'mysql': {
            if ($dependencia_busq != '99999') {
                $condicionE = "	AND b.DEPE_CODI='$dependencia_busq' AND r.RADI_DEPE_ACTU='$dependencia_busq' ";
            }
            $queryE = "SELECT  b.USUA_NOMB 	AS USUARIO
                            , count($radi_nume_radi) 	AS  RADICADOS
                            , MIN(b.USUA_CODI) 	AS HID_COD_USUARIO
                            , MIN(b.USUA_DOC) 	AS HID_USUA_DOC
                            , MIN(b.DEPE_CODI) 	AS HID_DEPE_USUA
                    FROM RADICADO r, USUARIO b, SGD_DIR_DRECCIONES DIR, SGD_TPR_TPDCUMENTO t
                    WHERE
                            r.RADI_USUA_ACTU=b.USUA_CODI 
                            AND r.RADI_DEPE_ACTU=b.DEPE_CODI
                            AND DIR.SGD_DIR_TIPO=1
                            AND R.RADI_NUME_RADI=DIR.RADI_NUME_RADI
                            $condicionE $whereTipoRadicado 
                    GROUP BY b.USUA_NOMB";

            /** CONSULTA PARA VER DETALLES 	 */
            if (!is_null($codUs))
                $condicionE = " AND b.USUA_CODI= $codUs ";
            if (!is_null($tipoDOCumento)) {
                $condicionE .= " AND t.SGD_TPR_CODIGO = $tipoDOCumento ";
            }
            $queryEDetalle = "SELECT DISTINCT r.radi_nume_radi 		AS RADICADO,
                                " . $db->conn->SQLDate('Y/m/d', 'r.RADI_FECH_RADI') . "  	AS FECHA_RADICACION,
                                t.SGD_TPR_DESCRIP			AS TIPO_DE_DOCUMENTO,
                                car.nomb_carp 				AS CARPETA_PERSONAL,
                                r.carp_per				AS HID_CARP_PER,
                                c.carp_desc				AS CARP_DESC,
                                b.USUA_NOMB 				AS USUARIO_ACTUAL,
                                b.USUA_DOC 				AS HID_USUA_DOC,
                                r.RA_ASUN 				AS ASUNTO,
                                r.RADI_PATH 				AS HID_RADI_PATH,
                                dir.sgd_dir_nomremdes 			AS REMITENTE
                        FROM  radicado r 
                                LEFT OUTER JOIN  sgd_tpr_tpdcumento t on				r.tdoc_codi = t.SGD_TPR_CODIGO
                                LEFT OUTER JOIN  carpeta_per car on r.carp_codi = car.codi_carp AND r.radi_usua_actu=car.usua_codi AND r.radi_depe_actu=car.depe_codi
                                LEFT OUTER JOIN  sgd_dir_drecciones dir on r.radi_nume_radi = dir.radi_nume_radi
                                LEFT OUTER JOIN CARPETA C ON R.CARP_CODI=C.CARP_CODI,
                                 usuario b
                        WHERE 	r.RADI_USUA_ACTU = b.USUA_CODI AND 
                                r.radi_usua_actu=$codUs AND r.radi_depe_actu='$depeUs' AND
                                B.USUA_CODI=$codUs AND B.DEPE_CODI='$depeUs'
                                $whereCarpUsua AND 
                                dir.sgd_dir_tipo = 1
                                $whereTipoRadicado";
            //Modificado skina $orderE = "ORDER BY $orno $ascdesc";
            // Consulta para ver todos los detalles  
            $queryETodosDetalle = $queryEDetalle . $orderE;
            $queryEDetalle .= $condicionE . $orderE;
        }break;

    //modificado skina case postgres
    case 'postgres': {
            if ($dependencia_busq != '99999') {
                $condicionE = "	AND b.DEPE_CODI='$dependencia_busq' AND r.RADI_DEPE_ACTU='$dependencia_busq' ";
            }

            $queryE = "select  b.USUA_NOMB AS USUARIO
						, count($radi_nume_radi) 	AS  RADICADOS
						, MIN(b.USUA_CODI) 	AS HID_COD_USUARIO
						, MIN(b.USUA_DOC) 	AS HID_USUA_DOC
						, MIN(b.DEPE_CODI) 	AS HID_DEPE_USUA
                                                , d.DEPE_NOMB
					FROM RADICADO r, USUARIO b, SGD_DIR_DRECCIONES DIR, DEPENDENCIA d
					WHERE
						r.RADI_USUA_ACTU=b.USUA_CODI 
						AND r.RADI_DEPE_ACTU=b.DEPE_CODI
						AND DIR.SGD_DIR_TIPO=1
						AND R.RADI_NUME_RADI=DIR.RADI_NUME_RADI
                                                and r.RADI_DEPE_ACTU=d.depe_codi
						$condicionE $whereTipoRadicado 
					GROUP BY b.USUA_NOMB, d.DEPE_NOMB";
            //Modificado skina	ORDER BY $orno $ascdesc"; 

            /** CONSULTA PARA VER DETALLES 	 */
            if (!is_null($codUs))
                $condicionE = " AND b.USUA_CODI= $codUs ";
            //if ($tipoDocumento=='9998')
            if (!is_null($tipoDOCumento)) {
                $condicionE .= " AND t.SGD_TPR_CODIGO = $tipoDOCumento ";
            }

            $queryEDetalle = "select DISTINCT r.radi_nume_radi 		AS RADICADO,
						" . $db->conn->SQLDate('Y/m/d', 'r.RADI_FECH_RADI') . "  	AS FECHA_RADICACION,
						t.SGD_TPR_DESCRIP			AS TIPO_DE_DOCUMENTO,
						car.nomb_carp 				AS CARPETA_PERSONAL,
						r.carp_per				AS HID_CARP_PER,
						c.carp_desc				AS CARP_DESC,
						b.USUA_NOMB 				AS USUARIO_ACTUAL,
						b.USUA_DOC 				AS HID_USUA_DOC,
						r.RA_ASUN 				AS ASUNTO,
						r.RADI_PATH 				AS HID_RADI_PATH,
						dir.sgd_dir_nomremdes 			AS REMITENTE
					FROM  radicado r 
						LEFT OUTER JOIN  sgd_tpr_tpdcumento t on				r.tdoc_codi = t.SGD_TPR_CODIGO
						LEFT OUTER JOIN  carpeta_per car on r.carp_codi = car.codi_carp AND r.radi_usua_actu=car.usua_codi AND r.radi_depe_actu=car.depe_codi
						LEFT OUTER JOIN  sgd_dir_drecciones dir on r.radi_nume_radi = dir.radi_nume_radi
						LEFT OUTER JOIN CARPETA C ON R.CARP_CODI=C.CARP_CODI,
						 usuario b
					WHERE 	r.RADI_USUA_ACTU = b.USUA_CODI AND 
						r.radi_usua_actu=$codUs AND r.radi_depe_actu='$depeUs' AND
						B.USUA_CODI=$codUs AND B.DEPE_CODI='$depeUs'
						$whereCarpUsua AND 
						dir.sgd_dir_tipo = 1
						$whereTipoRadicado";
            //Modificado skina $orderE = "ORDER BY $orno $ascdesc";
            // Consulta para ver todos los detalles  
            $queryETodosDetalle = $queryEDetalle . $orderE;
            $queryEDetalle .= $condicionE . $orderE;
        }break;
    case 'oracle':
    case 'oci8':
    case 'oci805':
    case 'ocipo':
        if ($dependencia_busq != '99999') {
            $condicionE = "				AND b.DEPE_CODI='$dependencia_busq' 
			AND r.RADI_DEPE_ACTU='$dependencia_busq' ";
        }

        if ($tipoDocumento == '9999') {
            $queryE = "SELECT  b.USUA_NOMB USUARIO,
			count(r.RADI_NUME_RADI) RADICADOS,
			MIN(b.USUA_CODI) HID_COD_USUARIO
			FROM RADICADO r,
			USUARIO b,
			SGD_DIR_DRECCIONES dir
		WHERE	r.RADI_USUA_ACTU=b.USUA_CODI AND 
			r.RADI_DEPE_ACTU = b.DEPE_CODI AND
			r.radi_nume_radi = dir.radi_nume_radi (+) AND 
			dir.sgd_dir_tipo = 2 AND
			" . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin'
			$condicionE
			$whereTipoRadicado 
			GROUP BY b.USUA_NOMB
		ORDER BY $orno $ascdesc";
        } else {
            $queryE = "
	    SELECT  b.USUA_NOMB USUARIO
			, t.SGD_TPR_DESCRIP TIPO_DOCUMENTO
			, count(r.RADI_NUME_RADI) RADICADOS
			, MIN(b.USUA_CODI) HID_COD_USUARIO
			, MIN(SGD_TPR_CODIGO) HID_TPR_CODIGO			
			FROM RADICADO r, USUARIO b, SGD_TPR_TPDCUMENTO t, sgd_dir_drecciones dir
		WHERE 
			r.RADI_USUA_ACTU=b.USUA_CODI 
			AND r.tdoc_codi=t.SGD_TPR_CODIGO (+)
			AND r.RADI_DEPE_ACTU=b.DEPE_CODI
			AND r.radi_nume_radi = dir.radi_nume_radi (+)
                        AND dir.sgd_dir_tipo = 2
			$condicionE
			$whereTipoRadicado 
			GROUP BY b.USUA_NOMB, t.SGD_TPR_DESCRIP
		ORDER BY $orno $ascdesc";
        }
        /** CONSULTA PARA VER DETALLES 
         */
        $condicionE = " AND b.USUA_CODI= $codUs ";
        $whereCarpUsua = (!empty($codUs)) ? "car.usua_codi = $codUs AND" : "";

        if ($tipoDocumento == '9998') {
            $condicionE .= " AND t.SGD_TPR_CODIGO = $tipoDOCumento ";
        }
        $queryEDetalle = "SELECT DISTINCT r.radi_nume_radi RADICADO,
			TO_CHAR(r.RADI_FECH_RADI, 'DD/MM/YYYY HH24:MI:SS') FECHA_RADICACION,
			t.SGD_TPR_DESCRIP TIPO_DE_DOCUMENTO,
			r.radi_nume_deri RAD_PADRE,
			r.RADI_CUENTAI CTA_INTERNA,
			exp.sgd_exp_numero NUMERO_EXPEDIENTE,
			car.nomb_carp CARPETA_PERSONAL,
			b.USUA_NOMB USUARIO_ACTUAL,
			r.RA_ASUN ASUNTO,
			bod.NOMBRE_DE_LA_EMPRESA ESP,
			bod.DIRECCION DIR_ESP,
			r.RADI_PATH HID_RADI_PATH,
			dir1.sgd_dir_nomremdes NOMBRE_PREDIO,
			dir1.sgd_dir_direccion DIRECCION_PREDIO,
			dep1.dpto_nomb DPTO_PREDIO,
			muni1.muni_nomb MPIO_PREDIO
                         FROM  radicado r,
			usuario b,
			sgd_tpr_tpdcumento t,
			bodega_empresas bod,
			par_serv_servicios n,
			sgd_caux_causales o,
			carpeta_per car,
			sgd_exp_expediente exp,
			sgd_dir_drecciones dir1,
			sgd_dir_drecciones dir2,
			departamento dep1,
			departamento dep2,
			municipio muni1,
			municipio muni2
                         WHERE r.eesp_codi = bod.identificador_empresa (+) AND
			r.RADI_USUA_ACTU = b.USUA_CODI AND
			r.tdoc_codi = t.SGD_TPR_CODIGO (+) AND
			r.RADI_DEPE_ACTU = '$dependencia_busq' AND
			b.DEPE_CODI = '$dependencia_busq' AND
			car.depe_codi = '$dependencia_busq' AND
			$whereCarpUsua
			r.par_serv_secue = n.par_serv_codigo(+) AND
			r.radi_nume_radi = o.radi_nume_radi(+) AND
			car.codi_carp(+) = r.carp_codi AND
			r.radi_nume_radi = exp.radi_nume_radi(+) AND
			r.eesp_codi = bod.identificador_empresa (+) AND
			r.radi_nume_radi = dir1.radi_nume_radi (+) AND
			r.radi_nume_radi = dir2.radi_nume_radi (+) AND
			dir1.sgd_dir_tipo = 2 AND
			dir1.dpto_codi = dep1.dpto_codi AND
			dir2.dpto_codi = dep2.dpto_codi AND
                               dir1.muni_codi = muni1.muni_codi AND
			dir2.muni_codi = muni2.muni_codi AND
	                       dir1.dpto_codi = muni1.dpto_codi AND
			dir2.dpto_codi = muni2.dpto_codi
			$whereTipoRadicado";
        $orderE = "ORDER BY $orno $ascdesc";
        // Consulta para ver todos los detalles  
        $queryETodosDetalle = $queryEDetalle . $orderE;
        $queryEDetalle .= $condicionE . $orderE;
        break;
}

if (isset($_GET['genDetalle']) && $_GET['denDetalle'] = 1)
    $titulos = array("#", "1#RADICADO", "2#FECHA DE RADICACI&Oacute;N", "3#TIPO DE DOCUMENTO", "4#ASUNTO", "5#REMITENTE", "6#CARPETA PERSONAL", "7#USUARIO");
else
    $titulos = array("#", "1#USUARIO", "2#DEPENDENCIA","3#TOTAL RADICADOS");

function pintarEstadistica($fila, $indice, $numColumna) {
    global $ruta_raiz, $_POST, $_GET, $ambiente;

    if (isset($fila['USUARIO'])) {
        $usuario = $fila['USUARIO'];
        $usuarioDep = $fila['USUARIO_DEPE'];
        $radicado = $fila['RADICADOS'];
        $hidCodUsu = $fila['HID_COD_USUARIO'];
        $depeNomb = $fila['DEPE_NOMB'];
    } else {
        $usuario = $fila[0];
        $usuarioDep = $fila[1];
        $radicado = $fila[2];
        $hidCodUsu = $fila[3];
        $depeNomb = $fila[4];
    }

    $salida = "";
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $usuario;
            break;
        case 2:
            $salida = $depeNomb;
            break;
        case 3:
            $datosEnvioDetalle = "tipoEstadistica=" . $_GET['tipoEstadistica'] . "&amp;genDetalle=1&amp;usua_docs=" . urlencode($fila['HID_USUA_DOC']) . "&amp;dependencia_busq=" . $usuarioDep . "&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;tipoRadicado=" . $_GET['tipoRadicado'] . "&amp;tipoDocumento=" . $_GET['tipoDocumento'] . "&amp;codUs=" . $hidCodUsu . "&amp;depeUs=" . $fila['HID_DEPE_USUA'];
            $datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}\" target=\"detallesSec\" >" . $radicado . "</a>";
            break;
        default: $salida = false;
    }
    return $salida;
}

function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $ruta_raiz, $encabezado, $krd, $ambiente;


        $radicado = $fila['RADICADO'];
        $tipoDoc = $fila['TIPO_DE_DOCUMENTO'];
        $usuario = $fila['USUARIO'];
        $asunto = $fila['ASUNTO'];
        $fechaRadicacion = $fila['FECHA_RADICACION'];
        $esp = $fila['REMITENTE'];
        $hidRadiPath = $fila['HID_RADI_PATH'];

    $verImg = ($fila['SGD_SPUB_CODIGO'] == 1) ? ($usuario != $_SESSION['usua_nomb'] ? false : true) : ($fila['USUA_NIVEL'] > $_SESSION['nivelus'] ? false : true);
    $numRadicado = $fila['RADICADO'];
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            if ($hidRadiPath && $verImg)
                $salida = "<center><a href=\"$url_raiz/$ambiente/bodega/" . $hidRadiPath . "\">" . $radicado . "</a></center>";
            else
                $salida = "<center class=\"leidos\">". $radicado ."</center>";
            break;
        case 2:
            if ($verImg)
                $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $radicado . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_SESSION['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" >" . $fechaRadicacion . "</a>";
            else
                $salida = "<a class=\"vinculos\" href=\"#\" onclick=\"alert(\"ud no tiene permisos para ver el radicado\");\">" . $fechaRadicacion . "</a>";
            break;
        case 3:
            $salida = "<center class=\"leidos\">" . $tipoDoc . "</center>";
            break;
        case 4:
            if($asunto == null){
                $asunto = 'Sin asunto';
            }
            $salida = "<center class=\"leidos\">" . $asunto . "</center>";
            break;
        case 5:
            $salida = "<center class=\"leidos\">" . $esp . "</center>";
            break;
        case 6:
            $carp_per = $fila['HID_CARP_PER'];
            if ($carp_per == '1')
                $salida = "<center class=\"leidos\">" . $fila['CARPETA_PERSONAL'] . "</center>";
            else
                $salida = "<center class=\"leidos\">" . $fila['CARP_DESC'] . "</center>";
            break;
        case 7:
            $salida = "<center class=\"leidos\">" . $fila['USUARIO_ACTUAL'] . "</center>";
            break;
    }
    return $salida;
}

?>
