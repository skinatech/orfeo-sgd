<?php

/** CONSUTLA 004
 * Estadiscas de Numero de Radicados digitalizados y Hojas Digitalizadas.
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

if ($dependencia_busq != '99999') {
    $condicionE = "	AND h.DEPE_CODI='$dependencia_busq' AND b.depe_codi = '$dependencia_busq'";
}


switch ($db->driver) {
    case 'mssql': {

            /* Cantidad de radicados por usuario */
            $queryE = "
	    	SELECT b.USUA_NOMB AS USUARIO
				, count(*) AS RADICADOS
				, SUM(a.RADI_NUME_HOJA) AS HOJAS_DIGITALIZADAS						
                , MIN(b.USUA_CODI) AS HID_COD_USUARIO
                , b.depe_codi AS HID_DEPENDENCIA
			FROM RADICADO a, USUARIO b, HIST_EVENTOS h
			WHERE 
				h.USUA_CODI=b.usua_CODI 
				AND b.depe_codi = h.depe_codi
				$condicionE
				AND h.RADI_NUME_RADI=a.RADI_NUME_RADI
				AND h.SGD_TTR_CODIGO IN(22,42)
				AND " . $db->conn->SQLDate('Y/m/d', 'a.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin' 
				$whereTipoRadicado 
			GROUP BY b.USUA_NOMB
            ORDER BY $orno $ascdesc";

            /** CONSULTA PARA VER DETALLES **/
            $queryEDetalle = "SELECT 
				$radi_nume_radi AS RADICADO
				, b.USUA_NOMB AS USUARIO_DIGITALIZADOR
				, h.HIST_OBSE AS OBSERVACIONES, " .
                    $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FECHA_RADICACION, " .
                    $db->conn->SQLDate('Y/m/d H:i:s', 'h.HIST_FECH') . " AS FECHA_DIGITALIZACION
				, mr.mrec_desc AS MEDIO_RECEPCION
				,r.RADI_PATH AS HID_RADI_PATH{$seguridad}
				FROM RADICADO r, USUARIO b, HIST_EVENTOS h, MEDIO_RECEPCION mr
			WHERE 
				h.USUA_CODI=b.usua_CODI 
				AND b.depe_codi = h.depe_codi
				$condicionE
				AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
				AND r.MREC_CODI=mr.MREC_CODI".
				" AND b.USUA_CODI=$codUs".
                " AND b.depe_codi= '$dependenciaUs'".
				" AND h.SGD_TTR_CODIGO IN(22,42)
				AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin' 
				$whereTipoRadicado 
            ORDER BY $orno $ascdesc";
        }
    break;
    case 'mysql': {

            /* Cantidad de radicados por usuario */
            $queryE = "
	    	    SELECT b.USUA_NOMB AS USUARIO
                    , count(*) AS RADICADOS
                    , SUM(r.RADI_NUME_HOJA) AS HOJAS_DIGITALIZADAS						
                    , MIN(b.USUA_CODI) AS HID_COD_USUARIO
                    , b.depe_codi AS HID_DEPENDENCIA
                FROM RADICADO r, USUARIO b, HIST_EVENTOS h
                WHERE 
                    h.USUA_CODI=b.usua_CODI 
                    AND b.depe_codi = h.depe_codi
                    $condicionE
                    AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
                    AND h.SGD_TTR_CODIGO IN(22,42)
                    AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin' 
                    $whereTipoRadicado 
                GROUP BY b.USUA_NOMB
                ORDER BY $orno $ascdesc";

            /** CONSULTA PARA VER DETALLES **/
            $queryEDetalle = "SELECT 
                    $radi_nume_radi AS RADICADO
                    , b.USUA_NOMB AS USUARIO_DIGITALIZADOR
                    , h.HIST_OBSE AS OBSERVACIONES, " .
                    $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FECHA_RADICACION, " .
                    $db->conn->SQLDate('Y/m/d H:i:s', 'h.HIST_FECH') . " AS FECHA_DIGITALIZACION
                    , mr.mrec_desc AS MEDIO_RECEPCION
                    ,r.RADI_PATH AS HID_RADI_PATH{$seguridad}
                FROM RADICADO r, USUARIO b, HIST_EVENTOS h, MEDIO_RECEPCION mr
                WHERE 
                    h.USUA_CODI=b.usua_CODI 
                    AND b.depe_codi = h.depe_codi
                    $condicionE
                    AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
                    AND r.MREC_CODI=mr.MREC_CODI".
                    " AND b.USUA_CODI=$codUs".
                    " AND b.depe_codi= '$dependenciaUs'".
                    " AND h.SGD_TTR_CODIGO IN(22,42)
                    AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin' 
                    $whereTipoRadicado 
                ORDER BY $orno $ascdesc";
        }
    break;
    case 'postgres': {

            /* Cantidad de radicados por usuario */
            $queryE = "
                SELECT b.USUA_NOMB AS USUARIO
                    , count(*) AS RADICADOS
                    , SUM(r.RADI_NUME_HOJA) AS HOJAS_DIGITALIZADAS						
                    , MIN(b.USUA_CODI) AS HID_COD_USUARIO
                    , b.depe_codi AS HID_DEPENDENCIA
                FROM RADICADO r, USUARIO b, HIST_EVENTOS h
                WHERE 
                    h.USUA_CODI=b.usua_CODI 
                    AND b.depe_codi = h.depe_codi                   
                    $condicionE
                    AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
                    AND h.SGD_TTR_CODIGO IN(22,42)
                    AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin' 
                    $whereTipoRadicado 
                GROUP BY b.USUA_NOMB, b.depe_codi
                ORDER BY $orno $ascdesc";


            /** CONSULTA PARA VER DETALLES*/
            $queryEDetalle = "SELECT 
				$radi_nume_radi AS RADICADO
				, b.USUA_NOMB AS USUARIO_DIGITALIZADOR
				, h.HIST_OBSE AS OBSERVACIONES, " .
                    $db->conn->SQLDate('Y/m/d H:i:s', 'r.radi_fech_radi') . " AS FECHA_RADICACION, " .
                    $db->conn->SQLDate('Y/m/d H:i:s', 'h.HIST_FECH') . " AS FECHA_DIGITALIZACION
				, mr.mrec_desc AS MEDIO_RECEPCION
				,r.RADI_PATH AS HID_RADI_PATH{$seguridad}
			FROM RADICADO r, USUARIO b, HIST_EVENTOS h, MEDIO_RECEPCION mr
			WHERE 
                h.USUA_CODI=b.usua_CODI 
				AND b.depe_codi = h.depe_codi
				$condicionE
				AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
				AND r.MREC_CODI=mr.MREC_CODI".
				" AND b.USUA_CODI=$codUs".
				" AND b.depe_codi= '$dependenciaUs'".
				" AND h.SGD_TTR_CODIGO IN(22,42)
				AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin' 
				$whereTipoRadicado 
            ORDER BY $orno $ascdesc";
        }
    break;
    case 'oracle':
    case 'oci8':
    case 'oci805':
    case 'ocipo': {

            /* Cantidad de radicados por usuario */
            $queryE = "
	    	SELECT b.USUA_NOMB USUARIO
				, count(*) RADICADOS
				, SUM(a.RADI_NUME_HOJA) HOJAS_DIGITALIZADAS						
                , MIN(b.USUA_CODI) HID_COD_USUARIO
                , b.depe_codi AS HID_DEPENDENCIA
			FROM RADICADO a, USUARIO b, HIST_EVENTOS h
			WHERE 
				h.USUA_CODI=b.usua_CODI 
				AND b.depe_codi = h.depe_codi
				$condicionE
				AND h.RADI_NUME_RADI=a.RADI_NUME_RADI
				AND h.SGD_TTR_CODIGO IN(22,42)
				AND TO_CHAR(a.radi_fech_radi,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin' 
				$whereTipoRadicado 
			GROUP BY b.USUA_NOMB
            ORDER BY $orno $ascdesc";
            
            /** CONSULTA PARA VER DETALLES **/
            $queryEDetalle = "SELECT 
				R.RADI_NUME_RADI RADICADO
				, b.USUA_NOMB USUARIO_DIGITALIZADOR
				, h.HIST_OBSE OBSERVACIONES
				, TO_CHAR(a.RADI_FECH_RADI, 'DD/MM/YYYY HH24:MI:SS') FECHA_RADICACION
				, TO_CHAR(h.HIST_FECH, 'DD/MM/YYYY HH24:MI:SS') FECHA_DIGITALIZACION
				, mr.mrec_desc MEDIO_RECEPCION
				,R.RADI_PATH HID_RADI_PATH{$seguridad}
				FROM RADICADO R, USUARIO b, HIST_EVENTOS h, MEDIO_RECEPCION mr
			WHERE 
				h.USUA_CODI=b.usua_CODI 
				AND b.depe_codi = h.depe_codi
				$condicionE
				AND h.RADI_NUME_RADI=a.RADI_NUME_RADI
				AND a.MREC_CODI=mr.MREC_CODI".
				" AND b.USUA_CODI=$codUs".
                " AND b.depe_codi= '$dependenciaUs'".
				" AND h.SGD_TTR_CODIGO IN(22,42)
				AND TO_CHAR(a.radi_fech_radi,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin' 
				$whereTipoRadicado 
            ORDER BY $orno $ascdesc";
        }
    break;
}

if (isset($_GET['genDetalle']) && $_GET['denDetalle'] = 1)
    $titulos = array("#", "1#RADICADO", "2#USUARIO DIGITALIZADOR", "3#OBSERVACIONESxxx", "4#FECHA RADICACION", "5#FECHA DIGITALIZACION", "6#MEDIO DE RECEPCION");
else
    $titulos = array("#", "1#Usuario", "2#Radicados", "3#HOJAS DIGITALIZADAS");

function pintarEstadistica($fila, $indice, $numColumna) {
    global $ruta_raiz, $_POST, $_GET, $krd, $ambiente;

    if (isset($fila['USUARIO'])) {
        $usuario = $fila['USUARIO'];
        $hidcod = $fila['HID_COD_USUARIO'];
        $hojasdigi = $fila['HOJAS_DIGITALIZADAS'];
        $radicados = $fila['RADICADOS'];
        $hidDepend = $fila['HID_DEPENDENCIA'];
    } else {
        $usuario = $fila[0];
        $hidcod = $fila[3];
        $hojasdigi = $fila[2];
        $radicados = $fila[1];
        $hidDepend = $fila[4];
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
            $datosEnvioDetalle = "tipoEstadistica=" . $_GET['tipoEstadistica'] . "&amp;genDetalle=1&amp;usua_doc=" . urlencode($fila['HID_USUA_DOC']) . "&amp;dependencia_busq=" . $_GET['dependencia_busq'] . "&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;tipoRadicado=" . $_GET['tipoRadicado'] . "&amp;tipoDocumento=" . $_GET['tipoDocumento'] . "&amp;codUs=" . $hidcod."&amp;dependenciaUs=".$hidDepend;
            $datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}&amp;krd={$krd}\"  target=\"detallesSec\" >" . $radicados . "</a>";
            break;
        case 3:
            $salida = $hojasdigi;
            break;
        default: $salida = false;
    }
    return $salida;
}

function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $ruta_raiz, $encabezado, $krd, $ambiente;
//    error_log('******** ' . print_r($fila));

    if (isset($fila['RADICADO'])) {
        $radicado = $fila['RADICADO'];
        $usuariodigi = $fila['USUARIO_DIGITALIZADOR'];
        $observa = $fila['OBSERVACIONESO'];
        $fecharad = $fila['FECHA_RADICACION'];
        $fechadigi = $fila['FECHA_DIGITALIZACION'];
        $mediorecp = $fila['MEDIO_RECEPCION'];
        $radipath = $fila['HID_RADI_PATH'];
    } else {
        $radicado = $fila[0];
        $usuariodigi = $fila[1];
        $observa = $fila[2];
        $fecharad = $fila[3];
        $fechadigi = $fila[4];
        $mediorecp = $fila[5];
        $radipath = $fila[6];
    }

    $verImg = ($fila['SGD_SPUB_CODIGO'] == 1) ? ($fila['USUARIO'] != $_SESSION['usua_nomb'] ? false : true) : ($fila['USUA_NIVEL'] > $_SESSION['nivelus'] ? false : true);
    //$numRadicado = $fila['RADICADOS'];
    $numRadicado = $fila['RADICADO'];

    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            if ($radipath)
                $salida = "<center><a href=\"$url_raiz/$ambiente/bodega/" . $radipath . "\">" . $radicado . "</a></center>";
            else
                $salida = "<center class=\"leidos\">{$numRadicado}</center>";
            break;
        case 2:
            $salida = "<center class=\"leidos\">" . $usuariodigi . "</center>";
            break;
        case 3:
            $salida = "<center class=\"leidos\">" . $observa . "</center>";
        case 4:
           /*  if ($radipath)
                $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $radicado . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" >" . $fecharad . "</a>";
            else
                $salida = "<a class=\"vinculos\" href=\"#\" onclick=\"alert(\"ud no tiene permisos para ver el radicado\");\">" . $fila['FECHA_RADICACION'] . "</a>"; */

            $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $radicado . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" >" . $fecharad . "</a>";
           
            break;
        case 5:
            $salida = "<center class=\"leidos\">" . $fechadigi . "</center>";
            break;
        case 6:
            $salida = "<center class=\"leidos\">" . $mediorecp . "</center>";
    }
    return $salida;
}

?>
