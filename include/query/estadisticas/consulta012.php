<?php

$coltp3Esp = '"' . $tip3Nombre[3][2] . '"';
if (!$orno)
    $orno = 2;

switch ($db->driver) {
    case 'postgres':

        $whereDependencia = ($dependencia_busq != '99999') ? "AND h.DEPE_CODI = '" . $dependencia_busq . "'" : '';
        $whereUsua = ($codus != 0) ? "AND b.USUA_CODI = " . $codus : '';
        $whereTipoRadicado = ($tipoRadicado != '') ? "AND r.RADI_NUME_RADI LIKE '%" . $tipoRadicado . "'" : '';
        $whereTipoRadicado .= ($tipoDocumento && ($tipoDocumento != '9999' and $tipoDocumento != '9998')) ? "AND s.SGD_TPR_CODIGO = $tipoDocumento " : '';

        $queryE = "
            select 
                b.USUA_NOMB AS RESPONSABLE_MODIFICAR , 
                COUNT(r.RADI_NUME_RADI) AS VECES_MODIFICADAS ,
                b.USUA_DOC AS HID_COD_USUARIO ,". 
                $db->conn->SQLDate('Y/m/d H:i:s', 'r.RADI_FECH_RADI'). " AS FECHA_RADICACION,
                r.radi_nume_radi AS NUMERO_RADICADO
            from 
                HIST_EVENTOS h
                inner join RADICADO r ON r.RADI_NUME_RADI = h.RADI_NUME_RADI
                inner join USUARIO b ON b.USUA_DOC = h.USUA_DOC
                inner join SGD_TPR_TPDCUMENTO s ON s.SGD_TPR_CODIGO = r.TDOC_CODI
                inner join DEPENDENCIA d ON h.DEPE_CODI = d.DEPE_CODI
            where 
                h.SGD_TTR_CODIGO = 32 
                AND h.HIST_OBSE LIKE '*Modificado TRD*%'
                $whereDependencia
                $whereUsua
                $whereTipoRadicado
                AND " . $db->conn->SQLDate('Y/m/d', 'h.HIST_FECH') . " BETWEEN '$fecha_ini'  AND '$fecha_fin'
            group by b.USUA_NOMB,b.USUA_DOC, r.RADI_FECH_RADI, r.radi_nume_radi 
        ";
        
        /** CONSULTA PARA VER DETALLES */
        $whereDependencia = (isset($dependencia_busq) && ($dependencia_busq != '99999')) ? 'and h.DEPE_CODI =\'' . $dependencia_busq . "'" : '';
        $whereUsua = ($codUs != 0) ? "and b.USUA_DOC = '" . $codUs . "'" : '';
        $whereTipoRadicado = ($tipoDocumento && ($tipoDocumento != '9999' and $tipoDocumento != '9998')) ? "and s.SGD_TPR_CODIGO = $tipoDocumento " : '';
        $whereRadicado =  isset($radicado) ? " and r.radi_nume_radi='$radicado' " : " ";  

        $queryEDetalle = "
            select 
                r.RADI_NUME_RADI AS RADICADO , ". 
                $db->conn->SQLDate('Y/m/d H:i:s', 'r.RADI_FECH_RADI')." AS FECHA_RADICACION , 
                s.SGD_TPR_DESCRIP AS TIPO_DOCUMENTO , ".
                $db->conn->SQLDate('Y/m/d H:i:s', 'h.HIST_FECH'). " AS FECHA_HISTORICO , 
                h.HIST_OBSE AS OBSERVACION , 
                b.USUA_NOMB AS USUARIO , 
                d.DEPE_NOMB AS DEPENDENCIA , 
                r.radi_path AS HID_RADI_PATH,
                r.ra_asun	AS ASUNTO_RADICADO
            from 
                HIST_EVENTOS h
                inner join RADICADO r ON r.RADI_NUME_RADI = h.RADI_NUME_RADI
                inner join USUARIO b ON b.USUA_DOC = h.USUA_DOC
                inner join SGD_TPR_TPDCUMENTO s ON s.SGD_TPR_CODIGO = r.TDOC_CODI
                inner join DEPENDENCIA d ON h.DEPE_CODI = d.DEPE_CODI
            WHERE 
                h.SGD_TTR_CODIGO = 32
                $whereDependencia
                $whereUsua
                $whereTipoRadicado
                $whereRadicado
                AND h.HIST_OBSE LIKE '*Modificado TRD*%'
                AND " . $db->conn->SQLDate('Y/m/d', 'h.HIST_FECH') . " BETWEEN '$fecha_ini'  AND '$fecha_fin'
        ";

        $queryETodosDetalle = $queryEDetalle;
        break;
    case 'mysql':
        global $orderby;
        $whereDependencia = ($dependencia_busq != '99999') ? "AND h.DEPE_CODI = '" . $dependencia_busq . "'" : '';
        $whereUsua = ($codus != 0) ? "AND b.USUA_CODI = " . $codus : '';
        $whereTipoRadicado = ($tipoRadicado != '') ? "AND r.RADI_NUME_RADI LIKE '%" . $tipoRadicado . "'" : '';
        $whereTipoRadicado .= ($tipoDocumento &&
                ($tipoDocumento != '9999' and $tipoDocumento != '9998')) ? "AND s.SGD_TPR_CODIGO = $tipoDocumento " : '';

        $queryE = "SELECT b.USUA_NOMB 			AS NOMBRE
                        , COUNT(r.RADI_NUME_RADI) 	AS TOTAL_MODIFICADOS
                        ,b.USUA_DOC 			AS HID_COD_USUARIO
                  FROM USUARIO b, RADICADO r
                        LEFT OUTER JOIN  SGD_TPR_TPDCUMENTO s ON s.SGD_TPR_CODIGO = r.TDOC_CODI,
                        HIST_EVENTOS h, DEPENDENCIA d
                  WHERE b.USUA_DOC = h.USUA_DOC
                    AND h.SGD_TTR_CODIGO = 32
                    AND h.HIST_OBSE LIKE '*Modificado TRD*%'
                    AND h.DEPE_CODI = d.DEPE_CODI
                    AND r.RADI_NUME_RADI = h.RADI_NUME_RADI
                    $whereDependencia
                        $whereUsua
                        $whereTipoRadicado
                        AND " . $db->conn->SQLDate('Y/m/d', 'h.HIST_FECH') . " BETWEEN '$fecha_ini'  AND '$fecha_fin'
                  GROUP BY b.USUA_NOMB,b.USUA_DOC";
        //Modificado skina 	 $orderby";

        /** CONSULTA PARA VER DETALLES */
        $whereDependencia = (isset($dependencia_busq) && ($dependencia_busq != '99999')) ?
                'AND h.DEPE_CODI =\'' . $dependencia_busq . "'" : '';
        $whereUsua = ($codUs != 0) ? "AND b.USUA_DOC = '" . $codUs . "'" : '';
        $whereTipoRadicado = ($tipoDocumento &&
                ($tipoDocumento != '9999' and $tipoDocumento != '9998')) ? "AND s.SGD_TPR_CODIGO = $tipoDocumento " : '';
        $queryEDetalle = "SELECT r.RADI_NUME_RADI  AS RADICADO
                            , r.RADI_FECH_RADI 	   AS FECHA_RADICACION
                            , s.SGD_TPR_DESCRIP    AS TIPO_DOCUMENTO
                            , h.HIST_FECH 	   AS FECHA_HISTORICO
                            , h.HIST_OBSE 	   AS OBSERVACION
                            , b.USUA_NOMB 	   AS USUARIO
                            , d.DEPE_NOMB 	   AS DEPENDENCIA
                            , r.radi_path 	   AS HID_RADI_PATH{$seguridad}
                        FROM RADICADO r
                        LEFT OUTER JOIN  SGD_TPR_TPDCUMENTO s ON s.SGD_TPR_CODIGO = r.TDOC_CODI, HIST_EVENTOS h, DEPENDENCIA d, USUARIO b
                        WHERE 
                        r.RADI_NUME_RADI = h.RADI_NUME_RADI
                        AND h.SGD_TTR_CODIGO = 32
                        $whereDependencia
                        $whereUsua
                        $whereTipoRadicado
                        AND h.USUA_DOC = b.USUA_DOC
                        AND h.HIST_OBSE LIKE '*Modificado TRD*%'
                        AND h.DEPE_CODI = d.DEPE_CODI
                        AND " . $db->conn->SQLDate('Y/m/d', 'h.HIST_FECH') . " BETWEEN '$fecha_ini'  AND '$fecha_fin'
                        AND s.SGD_TPR_CODIGO = r.TDOC_CODI";
        $queryETodosDetalle = $queryEDetalle;
        break;
    case 'oracle':
    case 'oci8':
    case 'oci805':
    case 'ocipo':
        global $orderby;
        $whereDependencia = ($dependencia_busq != '99999') ? "AND h.DEPE_CODI = '" . $dependencia_busq . "'" : '';
        $whereUsua = ($codus != 0) ? "AND b.USUA_CODI = " . $codus : '';
        $whereTipoRadicado = ($tipoRadicado != '') ? "AND r.RADI_NUME_RADI LIKE '%" . $tipoRadicado . "'" : '';
        $whereTipoRadicado .= ($tipoDocumento &&
                ($tipoDocumento != '9999' and $tipoDocumento != '9998')) ? "AND s.SGD_TPR_CODIGO = $tipoDocumento " : '';

        $queryE = "SELECT b.USUA_NOMB NOMBRE, COUNT(r.RADI_NUME_RADI) TOTAL_MODIFICADOS
				  FROM USUARIO b, RADICADO r, HIST_EVENTOS h, DEPENDENCIA d, SGD_TPR_TPDCUMENTO s
				  WHERE b.USUA_DOC = h.USUA_DOC
				    AND h.SGD_TTR_CODIGO = 32
				    AND h.HIST_OBSE LIKE '*Modificado TRD*%'
				    AND h.DEPE_CODI = d.DEPE_CODI
				    AND s.SGD_TPR_CODIGO = r.TDOC_CODI (+)
				    AND r.RADI_NUME_RADI = h.RADI_NUME_RADI
				    $whereDependencia
					$whereUsua
					$whereTipoRadicado
					AND TO_CHAR(r.RADI_FECH_RADI,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin'
				  GROUP BY b.USUA_NOMB $orderby";

        /** CONSULTA PARA VER DETALLES 
         */
        /* $whereDependencia = (isset($depCodigo)) ? "AND h.DEPE_CODI = " . $depCodigo : '';
          $whereDependencia = (empty($depCodigo) && isset($HTTP_GET_VARS["genTodosDetalle"]) &&
          $tipoDocumento && ($tipoDocumento!='9999' && $tipoDocumento!='9998'))
          ? "AND h.DEPE_CODI = " . $dependencia_busq : ''; */

        $whereDependencia = (isset($dependencia_busq) && ($dependencia_busq != '99999')) ?
                'AND h.DEPE_CODI =\'' . $dependencia_busq . "'" : '';
        $whereUsua = ($codUs != 0) ? "AND b.USUA_DOC = '" . $codUs . "'" : '';
        $whereTipoRadicado = ($tipoDocumento &&
                ($tipoDocumento != '9999' and $tipoDocumento != '9998')) ? "AND r.TDOC_CODI = s.SGD_TPR_CODIGO (+) AND s.SGD_TPR_CODIGO = $tipoDocumento " : '';

        $queryEDetalle = "SELECT r.RADI_NUME_RADI RADICADO, r.RADI_FECH_RADI FECHA_RADICACION,
		s.SGD_TPR_DESCRIP TIPO_DOCUMENTO, 
		h.HIST_FECH FECHA_HISTORICO, h.HIST_OBSE OBSERVACION,
		 b.USUA_NOMB USUARIO, d.DEPE_NOMB DEPENDENCIA,r.radi_path HID_RADI_PATH{$seguridad}
		FROM RADICADO r, HIST_EVENTOS h, DEPENDENCIA d, USUARIO b, 
		SGD_TPR_TPDCUMENTO s
		WHERE 
			r.RADI_NUME_RADI = h.RADI_NUME_RADI
			AND h.SGD_TTR_CODIGO = 32
			$whereDependencia
			$whereUsua
			$whereTipoRadicado
			AND h.USUA_DOC = b.USUA_DOC
			AND h.HIST_OBSE LIKE '*Modificado TRD*%'
			AND h.DEPE_CODI = d.DEPE_CODI
			AND TO_CHAR(r.RADI_FECH_RADI,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin'
			AND s.SGD_TPR_CODIGO = r.TDOC_CODI";

        $queryETodosDetalle = $queryEDetalle;

        break;
}

if (isset($_GET['genDetalle']) && $_GET['denDetalle'] = 1)
    $titulos = array("#", "1#RADICADO", "2#FECHA DE RADICAI&Oacute;N", "3#ASUNTO RADICADO", "4#TIPO DE DOCUMENTO", "5#FECHA H&Iacute;STORICO", "6#OBSERVACIONES", "7#RESPONSABLE MODIFICAR", "8#DEPENDENCIA");
else
    $titulos = array("#", "1#RESPONSABLE MODIFICAR", "2#RADICADO","3#FECHA DE RADICAI&Oacute;N", "4#VECES MODIFICADO");

function pintarEstadistica($fila, $indice, $numColumna) {
    global $ruta_raiz, $_POST, $_GET, $krd, $ambiente;

    $nombre = $fila['RESPONSABLE_MODIFICAR'];
    $radiFech = $fila['FECHA_RADICACION'];
    $numeroRad = $fila['NUMERO_RADICADO'];
    $codUsuario = $fila['HID_COD_USUARIO'];
    $totalModificacion = $fila['VECES_MODIFICADAS'];
    
    $salida = "";
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $nombre;
            break;
        case 4:
            $datosEnvioDetalle = "tipoEstadistica=" . $_GET['tipoEstadistica'] . "&amp;genDetalle=1&amp;usua_doc=" . urlencode($codUsuario) . "&amp;dependencia_busq=" . $_GET['dependencia_busq'] . "&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;tipoRadicado=" . $_GET['tipoRadicado'] . "&amp;tipoDocumento=" . $_GET['tipoDocumento'] . "&amp;codUs=" . $codUsuario . "&amp;depeUs=" . $fila['HID_DEPE_USUA']."&amp;radicado=" . $numeroRad;
            $datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}&amp;krd={$krd}\" target=\"detallesSec\" >" . $totalModificacion . "</a>";
            break;
        case 2:
            $salida = $numeroRad;
            break;
        case 3:
            $salida = $radiFech;
            break;
        default: $salida = false;
    }
    return $salida;
}

function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $ruta_raiz, $encabezado, $krd, $ambiente;
    
    $radicado = $fila['RADICADO'];
    $fechaRadicacion = $fila['FECHA_RADICACION'];
    $tipoDoc = $fila['TIPO_DOCUMENTO'];
    $fechaHistorico = $fila['FECHA_HISTORICO'];
    $observaciones = $fila['OBSERVACION'];
    $usuario = $fila['USUARIO'];
    $dependencias = $fila['DEPENDENCIA'];
    $hidRadiPath = $fila['HID_RADI_PATH'];
    $radiAsunto = $fila['ASUNTO_RADICADO'];
    
    $numRadicado = $radicado;
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            if ($hidRadiPath)
                $salida = "<center><a href=\"$url_raiz/$ambiente/bodega/" . $hidRadiPath . "\">" . $radicado . "</a></center>";
            else
                $salida = "<center class=\"leidos\">{$numRadicado}</center>";
            break;
        case 3:
            $salida = "<center class=\"leidos\">" . $radiAsunto. "</center>";
            break;
        case 4:
            $salida = "<center class=\"leidos\">" . $tipoDoc . "</center>";
            break;
        case 5:
            $salida = "<center class=\"leidos\">" . $fechaHistorico . "</center>";
            break;
        case 2:
            $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $radicado . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" >" . $fechaRadicacion . "</a>";
            break;
        case 6:
            $salida = "<center class=\"leidos\">" .$observaciones . "</center>";
            break;
        case 7:
            $salida = "<center class=\"leidos\">" . $usuario. "</center>";
            break;
        case 8:
            $salida = "<center class=\"leidos\">" . $dependencias. "</center>";
            break;
    }
    return $salida;
}

?>
