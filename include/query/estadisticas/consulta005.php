<?php

/** RADICADOS DE ENTRADA RECIBIDOS DEL AREA DE CORRESPONDENCIA
 * 
 * @autor JAIRO H LOSADA - SSPD
 * @version ORFEO 3.1
 * 
 */
$coltp3Esp = '"' . $tip3Nombre[3][2] . '"';
if (!$orno)
    $orno = 2;
/**
 * $db-driver Variable que trae el driver seleccionado en la conexion
 * @var string
 * @access public
 */
/**
 * $fecha_ini Variable que trae la fecha de Inicio Seleccionada  viene en formato Y-m-d
 * @var string
 * @access public
 */
/**
 * $fecha_fin Variable que trae la fecha de Fin Seleccionada
 * @var string
 * @access public
 */
/**
 * $mrecCodi Variable que trae el medio de recepcion por el cual va a sacar el detalle de la Consulta.
 * @var string
 * @access public
 */
switch ($db->driver) {
    case 'mssql': {
            if ($dependencia_busq != '99999') {
                $condicionE = "	AND h.DEPE_CODI_DEST='$dependencia_busq' AND b.DEPE_CODI='$dependencia_busq' ";
            }
            $queryE = "
	    		SELECT b.USUA_NOMB AS USUARIO
                            , count($radi_nume_radi) AS RADICADOS
                            , MIN(b.USUA_CODI) AS HID_COD_USUARIO
                            , MIN(b.depe_codi) AS HID_DEPE_USUA
                        FROM RADICADO r, USUARIO b, HIST_EVENTOS h, medio_recepcion m
                        WHERE 
                            h.HIST_DOC_DEST=b.usua_doc
                            $condicionE
                            AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
                            AND h.SGD_TTR_CODIGO=2
                            AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' 
                            AND (r.RADI_NUME_RADI like '%2' or r.RADI_NUME_RADI like '%4')
                            and r.mrec_codi=m.mrec_codi
                        $whereTipoRadicado 
                        GROUP BY b.USUA_NOMB
                        ORDER BY $orno $ascdesc";
            /** CONSULTA PARA VER DETALLES */
            $queryEDetalle = "SELECT 
                                $radi_nume_radi AS RADICADO
                                , b.USUA_NOMB AS USUARIO_ACTUAL
                                , r.RA_ASUN  AS ASUNTO 
                                , " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FECHA_RADICACION, 
                                " . $db->conn->SQLDate('Y/m/d H:i:s', 'h1.HIST_FECH') . " AS FECHA_DIGITALIZACION
                                ,m.mrec_desc AS MEDIO_RECEPCION
                                ,r.RADI_PATH AS HID_RADI_PATH{$seguridad}
                            FROM USUARIO b, HIST_EVENTOS h, MEDIO_RECEPCION m, RADICADO r
                                    left join HIST_EVENTOS h1 on r.RADI_NUME_RADI=h1.RADI_NUME_RADI and h1.SGD_TTR_CODIGO IN (42,22)
                            WHERE 
                                h.HIST_DOC_DEST=b.usua_doc
                                $condicionE
                                AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
                                AND h.SGD_TTR_CODIGO=2
                                AND b.USUA_CODI=$codUs
                                AND b.depe_codi = '$depeUs'
                                AND ($radi_nume_radi like '%2' or $radi_nume_radi like '%4')
                                AND r.mrec_codi=m.mrec_codi
                                AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin' 
                            $whereTipoRadicado 
                            ORDER BY $orno $ascdesc";
        }break;
    case 'mysql': {
            if ($dependencia_busq != '99999') {
                $condicionE = "	AND h.DEPE_CODI_DEST='$dependencia_busq' AND b.DEPE_CODI='$dependencia_busq' ";
            }
            $queryE = "
	    		SELECT b.USUA_NOMB AS USUARIO
                            , count($radi_nume_radi) AS RADICADOS
                            , MIN(b.USUA_CODI) AS HID_COD_USUARIO
                            , MIN(b.depe_codi) AS HID_DEPE_USUA
                        FROM RADICADO r, USUARIO b, HIST_EVENTOS h, medio_recepcion m
                        WHERE 
                            h.HIST_DOC_DEST=b.usua_doc
                            $condicionE
                            AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
                            AND h.SGD_TTR_CODIGO=2
                            AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' 
                            AND cast(r.RADI_NUME_RADI as char(30)) like '%2'
                            and r.mrec_codi=m.mrec_codi
                        $whereTipoRadicado 
                        GROUP BY b.USUA_NOMB
                        ORDER BY $orno $ascdesc";
            /** CONSULTA PARA VER DETALLES */
            $queryEDetalle = "SELECT 
                                $radi_nume_radi AS RADICADO
                                , b.USUA_NOMB AS USUARIO_ACTUAL
                                , r.RA_ASUN  AS ASUNTO 
                                , " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FECHA_RADICACION, 
                                " . $db->conn->SQLDate('Y/m/d H:i:s', 'h1.HIST_FECH') . " AS FECHA_DIGITALIZACION
                                ,m.mrec_desc AS MEDIO_RECEPCION
                                ,r.RADI_PATH AS HID_RADI_PATH{$seguridad}
                            FROM USUARIO b, HIST_EVENTOS h, MEDIO_RECEPCION m, RADICADO r
                                    left join HIST_EVENTOS h1 on r.RADI_NUME_RADI=h1.RADI_NUME_RADI and h1.SGD_TTR_CODIGO IN (42,22)
                            WHERE 
                                h.HIST_DOC_DEST=b.usua_doc
                                $condicionE
                                AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
                                AND h.SGD_TTR_CODIGO=2
                                AND b.USUA_CODI=$codUs
                                AND b.depe_codi = '$depeUs'
                                AND $radi_nume_radi like '%2'
                                AND r.mrec_codi=m.mrec_codi
                                AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin' 
                            $whereTipoRadicado 
                            ORDER BY $orno $ascdesc";
        }break;
    case 'postgres': {
            if ($dependencia_busq != '99999') {
                $condicionE = "	AND h.DEPE_CODI_DEST='$dependencia_busq' AND b.DEPE_CODI='$dependencia_busq' ";
            }
            $queryE = "
	    		SELECT b.USUA_NOMB AS USUARIO
					, count($radi_nume_radi) AS RADICADOS
					, MIN(b.USUA_CODI) AS HID_COD_USUARIO
					, MIN(b.depe_codi) AS HID_DEPE_USUA
				FROM RADICADO r, USUARIO b, HIST_EVENTOS h, medio_recepcion m
				WHERE 
					h.HIST_DOC_DEST=b.usua_doc
					$condicionE
					AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
					AND h.SGD_TTR_CODIGO=2
					AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' 
					AND (r.RADI_NUME_RADI like '%2' or r.RADI_NUME_RADI like '%4') 
					and r.mrec_codi=m.mrec_codi
				$whereTipoRadicado 
				GROUP BY b.USUA_NOMB
				ORDER BY $orno $ascdesc";
            /** CONSULTA PARA VER DETALLES 
             */
            $queryEDetalle = "SELECT 
					$radi_nume_radi AS RADICADO
					, b.USUA_NOMB AS USUARIO_ACTUAL
					, r.RA_ASUN  AS ASUNTO 
					, " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FECHA_RADICACION, 
					" . $db->conn->SQLDate('Y/m/d H:i:s', 'h1.HIST_FECH') . " AS FECHA_DIGITALIZACION
					,m.mrec_desc AS MEDIO_RECEPCION
					,r.RADI_PATH AS HID_RADI_PATH{$seguridad}
				FROM USUARIO b, HIST_EVENTOS h, MEDIO_RECEPCION m, RADICADO r
					left join HIST_EVENTOS h1 on r.RADI_NUME_RADI=h1.RADI_NUME_RADI and h1.SGD_TTR_CODIGO IN (42,22)
				WHERE 
					h.HIST_DOC_DEST=b.usua_doc
					$condicionE
					AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
					AND h.SGD_TTR_CODIGO=2
					AND b.USUA_CODI=$codUs
					AND b.depe_codi = '$depeUs'
					AND ($radi_nume_radi like '%2' or $radi_nume_radi like '%4') 
					AND r.mrec_codi=m.mrec_codi
					AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin' 
				$whereTipoRadicado 
				ORDER BY $orno $ascdesc";
        }break;
    case 'oracle':
    case 'oci8':
    case 'oci805':
    case 'ocipo': {
            if ($dependencia_busq != '99999') {
                $condicionE = "	AND h.DEPE_CODI_DEST='$dependencia_busq' AND b.DEPE_CODI='$dependencia_busq' ";
            }
            $queryE = "
	    		SELECT b.USUA_NOMB USUARIO
					, count(r.RADI_NUME_RADI) RADICADOS
					, MIN(b.USUA_CODI) HID_COD_USUARIO
					, MIN(b.depe_codi) HID_DEPE_USUA
				FROM RADICADO r, USUARIO b, HIST_EVENTOS h
				WHERE 
					h.HIST_DOC_DEST=b.usua_doc
					$condicionE
					AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
					AND h.SGD_TTR_CODIGO=2
					AND TO_CHAR(r.radi_fech_radi,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin' 
					AND (r.RADI_NUME_RADI like '%2' or r.RADI_NUME_RADI like '%4') 
				$whereTipoRadicado 
				GROUP BY b.USUA_NOMB
				ORDER BY $orno $ascdesc";
            /** CONSULTA PARA VER DETALLES 
             */
            $queryEDetalle = "SELECT 
					r.RADI_NUME_RADI RADICADO
					, b.USUA_NOMB USUARIO_ACTUAL
					, r.RA_ASUN ASUNTO 
					, TO_CHAR(r.RADI_FECH_RADI, 'DD/MM/YYYY HH24:MM:SS') AS FECHA_RADICACION
					, TO_CHAR(h.HIST_FECH, 'DD/MM/YYYY HH24:MM:SS') AS FECHA_DIGITALIZACION
					,r.RADI_PATH HID_RADI_PATH{$seguridad}
				FROM RADICADO r, USUARIO b, HIST_EVENTOS h
				WHERE 
					h.HIST_DOC_DEST=b.usua_doc
					$condicionE
					AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
					AND h.SGD_TTR_CODIGO=2
					AND b.USUA_CODI=$codUs
					AND (r.RADI_NUME_RADI like '%2' or r.RADI_NUME_RADI like '%4')
					AND TO_CHAR(r.radi_fech_radi,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin' 
				$whereTipoRadicado 
				ORDER BY $orno $ascdesc";
        }break;
}
if (isset($_GET['genDetalle']) && $_GET['denDetalle'] = 1)
    $titulos = array("#", "1#RADICADO", "2#USUARIO DIGITALIZADOR", "3#ASUNTO", "4#FECHA RADICACION", "5#FECHA DIGITALIZACION", "6#MEDIO DE RECEPCION",);
else
    $titulos = array("#", "1#Usuario", "2#Radicados");

function pintarEstadistica($fila, $indice, $numColumna) {
    global $ruta_raiz, $_POST, $_GET, $krd, $ambiente;

    if (isset($fila['USUARIO'])) {
        $usaurio = $fila['USUARIO'];
        $radicados = $fila['RADICADOS'];
        $hidcodusu = $fila['HID_COD_USUARIO'];
        $hiddepeusua = $fila['HID_DEPE_USUA'];
    } else {
        $usaurio = $fila[0];
        $radicados = $fila[1];
        $hidcodusu = $fila[2];
        $hiddepeusua = $fila[3];
    }

    $salida = "";
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $usaurio;
            break;
        case 2:
            $datosEnvioDetalle = "tipoEstadistica=" . $_GET['tipoEstadistica'] . "&amp;genDetalle=1&amp;usua_doc=" . urlencode($fila['HID_USUA_DOC']) . "&amp;dependencia_busq=" . $_GET['dependencia_busq'] . "&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;tipoRadicado=" . $_GET['tipoRadicado'] . "&amp;tipoDocumento=" . $_GET['tipoDocumento'] . "&amp;codUs=" . $hidcodusu . "&amp;depeUs=" . $hiddepeusua;
            $datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}&amp;krd={$krd}\"  target=\"detallesSec\" >" . $radicados . "</a>";
            break;
        default: $salida = false;
    }
    return $salida;
}

function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $ruta_raiz, $encabezado, $krd, $ambiente;

    if (isset($fila['USUARIO'])) {
        $radicado = $fila['RADICADO'];
        $usuarioactual = $fila['USUARIO_ACTUAL'];
        $asunto = $fila['ASUNTO'];
        $fecharadica = $fila['FECHA_RADICACION'];
        $fechadigita = $fila['FECHA_DIGITALIZACION'];
        $mediorecep = $fila['MEDIO_RECEPCION'];
        $hidradipat = $fila['HID_RADI_PATH'];
    } else {
        $radicado = $fila[0];
        $usuarioactual = $fila[1];
        $asunto = $fila[2];
        $fecharadica = $fila[3];
        $fechadigita = $fila[4];
        $mediorecep = $fila[5];
        $hidradipat = $fila[6];
    }

    $verImg = ($fila['SGD_SPUB_CODIGO'] == 1) ? ($fila['USUARIO'] != $_SESSION['usua_nomb'] ? false : true) : ($fila['USUA_NIVEL'] > $_SESSION['nivelus'] ? false : true);
    $numRadicado = $fila['RADICADO'];
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            if ($hidradipat && $verImg)
                $salida = "<center><a href=\"$url_raiz/$ambiente/bodega/" . $hidradipat . "\">" . $radicado . "</a></center>";
            else
                $salida = "<center class=\"leidos\">{$numRadicado}</center>";
            break;
        case 2:
            $salida = "<center class=\"leidos\">" . $usuarioactual . "</center>";
            break;
        case 3:
            $salida = "<center class=\"leidos\">" . $asunto. "</center>";
            break;
        case 4:
            if ($verImg)
                $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $radicado . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" >" . $fecharadica . "</a>";
            else
                $salida = "<a class=\"vinculos\" href=\"#\" onclick=\"alert(\"ud no tiene permisos para ver el radicado\");\">" . $fecharadica. "</a>";
            break;
        case 5:
            $salida = "<center class=\"leidos\">" . $fechadigita . "</center>";
            break;
        case 6:
            $salida = "<center class=\"leidos\">" . $mediorecep . "</center>";
            break;
    }
    return $salida;
}

?>
