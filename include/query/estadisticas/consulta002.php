<?php

/** CONSUTLA 001 
 * Estadiscas por medio de recepcion Entrada
 * @autor JAIRO H LOSADA - SSPD
 * @version ORFEO 3.1
 * 
 */
$coltp3Esp = '"' . $tip3Nombre[3][2] . '"';
if (!$orno)
    $orno = 2;

$tmp_substr = $db->conn->substr;

//$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

# Validación del query con respecto a la dependencia
if ($dependencia_busq != 99999) {
    $condicionE = "	 AND r.radi_depe_actu=b.depe_codi AND b.depe_codi = '$dependencia_busq'";
} else {
    $condicionE = "	AND r.radi_depe_actu=b.depe_codi";
}

switch ($db->driver) {
    case 'mssql': {

            /* Consulta para el listado principal de Radicados por medio */
            $queryE = "SELECT c.mrec_desc AS MEDIO_RECEPCION, COUNT(*) AS RADICADOS, max(c.MREC_CODI) AS HID_MREC_CODI
                    FROM RADICADO r, MEDIO_RECEPCION c, USUARIO b
                    WHERE 
                        r.radi_usua_actu=b.usua_CODI 
                        AND r.mrec_codi=c.mrec_codi
                        $condicionE
                        AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin'
                        $whereTipoRadicado
                        $whereUsuario
                    GROUP BY c.mrec_desc
                    ORDER BY $orno $ascdesc";

            /** CONSULTA PARA VER DETALLES **/
            $condicionDep = " AND b.depe_codi = '$depeUs' ";

            $queryEDetalle = "SELECT $radi_nume_radi AS RADICADO, 
                                " . $db->conn->SQLDate('Y/m/d h:i:s', 'r.radi_fech_radi') . "  AS FECHA_RADICADO
                                ,c.MREC_DESC 	AS MEDIO_RECEPCION
                                ,r.RA_ASUN 	AS ASUNTO
                                ,b.usua_nomb 	AS USUARIO
                                ,dep.depe_nomb as DEPENDENCIA
                                ,r.radi_nume_hoja as N_HOJAS
                                ,r.radi_desc_anex as ANEXOS
                                ,r.RADI_PATH 	AS HID_RADI_PATH{$seguridad}
                            FROM RADICADO r, USUARIO b, MEDIO_RECEPCION c
                            WHERE 
                                r.radi_usua_actu=b.usua_CODI 
                                AND r.radi_depe_actu = dep.depe_codi
                                AND r.mrec_codi=c.mrec_codi
                                AND c.mrec_codi=$mrecCodi
                                $condicionE
                                AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin'
                                $whereTipoRadicado";

            $orderE = "	ORDER BY $orno $ascdesc";
            $queryETodosDetalle = $queryEDetalle . $condicionDep . $orderE;
            $queryEDetalle .= $orderE;

        }
    break;
    case 'mysql': {

            /* Consulta para el listado principal de Radicados por medio */
            $queryE = "SELECT c.mrec_desc AS MEDIO_RECEPCION, COUNT(*) AS RADICADOS, max(c.MREC_CODI) AS HID_MREC_CODI
                    FROM RADICADO r, MEDIO_RECEPCION c, USUARIO b
                    WHERE 
                        r.radi_usua_actu=b.usua_CODI 
                        AND r.mrec_codi=c.mrec_codi
                        $condicionE
                        AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin'
                        $whereTipoRadicado
                        $whereUsuario
                    GROUP BY c.mrec_desc
                    ORDER BY $orno $ascdesc";

            /** CONSULTA PARA VER DETALLES **/
            $condicionDep = " AND b.depe_codi = '$depeUs' ";

            $queryEDetalle = "SELECT $radi_nume_radi AS RADICADO, 
                                " . $db->conn->SQLDate('Y/m/d h:i:s', 'r.radi_fech_radi') . "  AS FECHA_RADICADO
                                ,c.MREC_DESC 	AS MEDIO_RECEPCION
                                ,r.RA_ASUN 	AS ASUNTO
                                ,b.usua_nomb 	AS USUARIO
                                ,dep.depe_nomb as DEPENDENCIA
                                ,r.radi_nume_hoja as N_HOJAS
                                ,r.radi_desc_anex as ANEXOS
                                ,r.RADI_PATH 	AS HID_RADI_PATH{$seguridad}
                            FROM RADICADO r, USUARIO b, MEDIO_RECEPCION c
                            WHERE 
                                r.radi_usua_actu=b.usua_CODI 
                                AND r.radi_depe_actu = dep.depe_codi 
                                AND r.mrec_codi=c.mrec_codi
                                AND c.mrec_codi=$mrecCodi
                                $condicionE
                                AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin'
                                $whereTipoRadicado";

            $orderE = "	ORDER BY $orno $ascdesc";
            $queryETodosDetalle = $queryEDetalle . $condicionDep . $orderE;
            $queryEDetalle .= $orderE;
        }
    break;
    case 'postgres': {

            if ($dependencia_busq != 99999) {
                $condicionE = "	 AND r.radi_depe_actu=b.depe_codi AND b.depe_codi = '$dependencia_busq'";
            } else {
                $condicionE = "	AND r.radi_depe_actu=b.depe_codi";
            }

            /* Consulta para el listado principal de Radicados por medio */
            $queryE = "SELECT c.mrec_desc AS MEDIO_RECEPCION, COUNT(*) AS RADICADOS, max(c.MREC_CODI) AS HID_MREC_CODI
					FROM RADICADO r
                        INNER JOIN USUARIO b ON r.radi_usua_actu=b.usua_CODI 
                        INNER JOIN MEDIO_RECEPCION c ON r.mrec_codi=c.mrec_codi 
					WHERE 					
                        " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin'
                        $condicionE
						$whereTipoRadicado
						$whereUsuario
					GROUP BY c.mrec_desc
                    ORDER BY $orno $ascdesc";
                    
            /** CONSULTA PARA VER DETALLES **/
            $condicionDep = " AND b.depe_codi = '$depeUs' ";

            $queryEDetalle = "SELECT $radi_nume_radi AS RADICADO, 
						" . $db->conn->SQLDate('Y/m/d h:i:s', 'r.radi_fech_radi') . "  AS FECHA_RADICADO
						,c.MREC_DESC 	AS MEDIO_RECEPCION
						,r.RA_ASUN 	AS ASUNTO
                        ,b.usua_nomb 	AS USUARIO
                        ,dep.depe_nomb as DEPENDENCIA
						,r.radi_nume_hoja as N_HOJAS
						,r.radi_desc_anex as ANEXOS
						,r.RADI_PATH 	AS HID_RADI_PATH{$seguridad}
                    FROM RADICADO r
                        INNER JOIN USUARIO b ON r.radi_usua_actu=b.usua_CODI 
                        INNER JOIN DEPENDENCIA dep ON r.radi_depe_actu = dep.depe_codi 
                        INNER JOIN MEDIO_RECEPCION c ON r.mrec_codi=c.mrec_codi 
					WHERE 
						c.mrec_codi=$mrecCodi
						$condicionE
						AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin'
						$whereTipoRadicado";

            $orderE = "	ORDER BY $orno $ascdesc";
            $queryETodosDetalle = $queryEDetalle . $condicionDep . $orderE;
            $queryEDetalle .= $orderE;
        }
    break;
    //case 'oracle':
    //case 'ocipo':
    case 'oci8':
    case 'oci805': {

            /* Consulta para el listado principal de Radicados por medio */
            $queryE = "SELECT c.mrec_desc MEDIO_RECEPCION, COUNT(*) RADICADOS, max(c.MREC_CODI) HID_MREC_CODI
					FROM RADICADO r, MEDIO_RECEPCION c, USUARIO b
					WHERE 
						r.radi_usua_actu=b.usua_CODI 
						AND r.mrec_codi=c.mrec_codi
						$condicionE
						AND TO_CHAR(r.radi_fech_radi,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin'
						$whereTipoRadicado
						$whereUsuario
					GROUP BY c.mrec_desc
                    ORDER BY $orno $ascdesc";

            /** CONSULTA PARA VER DETALLES **/
            $condicionDep = " AND b.depe_codi = '$depeUs' ";

            $queryEDetalle = "SELECT r.RADI_NUME_RADI RADICADO
						,TO_CHAR(r.radi_fech_radi,'yyyy/mm/dd hh:mi:ss') FECHA_RADICADO
						,c.MREC_DESC MEDIO_RECEPCION
						,r.RA_ASUN ASUNTO
						,b.usua_nomb USUARIO
                        ,dep.depe_nomb DEPENDENCIA
                        ,r.radi_nume_hoja N_HOJAS
						,r.radi_desc_anex ANEXOS
						,r.RADI_PATH HID_RADI_PATH{$seguridad}
					FROM RADICADO r, USUARIO b, MEDIO_RECEPCION c
					WHERE 
						r.radi_usua_actu=b.usua_CODI 
                        AND r.radi_depe_actu = dep.depe_codi 
						AND r.mrec_codi=c.mrec_codi
						AND c.mrec_codi=$mrecCodi
						$condicionE
						AND TO_CHAR(r.radi_fech_radi,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin'
						$whereTipoRadicado";

            $orderE = "	ORDER BY $orno $ascdesc";
            $queryETodosDetalle = $queryEDetalle . $condicionDep . $orderE;
            $queryEDetalle .= $orderE;
        }
    break;
}

if (isset($_GET['genDetalle']) && $_GET['denDetalle'] = 1)
    $titulos = array("#", "1#RADICADO", "2#FECHA RADICADO", "3#ASUNTO", "4#ANEXOS", "5#NO HOJAS", "6#MEDIO DE RECEPCION", "7#USUARIO", "8#DEPENDENCIA ACTUAL");
else
    $titulos = array("#", "1#MEDIO", "2#RADICADOS");

function pintarEstadistica($fila, $indice, $numColumna) {
    global $ruta_raiz, $_POST, $_GET, $krd, $ambiente;
    
//    echo "<pre>";
//    print_r($fila);
//    echo "</pre>";
    
    if (isset($fila['MEDIO_RECEPCION'])) {
        $mediorecepcion = $fila['MEDIO_RECEPCION'];
        $radicados = $fila['RADICADOS'];
        $codimedio = $fila['HID_MREC_CODI'];
    } else {
        $mediorecepcion = $fila[0];
        $radicados = $fila[1];
        $codimedio = $fila[2];
    }
    
    $salida = "";
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $mediorecepcion;
            break;
        case 2:
            $datosEnvioDetalle = "tipoEstadistica=" . $_GET['tipoEstadistica'] . "&amp;genDetalle=1&amp;codus=" . $_GET['codus']. "&amp;dependencia_busq=" . $_GET['dependencia_busq'] . "&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;tipoRadicado=" . $_GET['tipoRadicado'] . "&amp;tipoDocumento=" . $_GET['tipoDocumento'] . "&amp;mrecCodi=" . $codimedio;
            $datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}&amp;krd={$krd}\"  target=\"detallesSec\" >" . $radicados . "</a>";
            break;
        default: $salida = false;
    }
    return $salida;
}

function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $ruta_raiz, $encabezado, $krd, $ambiente;
    
//    echo "<pre>";
//    print_r($fila);
//    echo "</pre>";
     
    if (isset($fila['MEDIO_RECEPCION'])) {
        $hidradi = $fila['HID_RADI_PATH'];
        $radicado = $fila['RADICADO'];
        $radipath = $fila['HID_RADI_PATH'];
        $asunto = $fila['ASUNTO'];
        $anexos = $fila['ANEXOS'];
        $nhojas = $fila['N_HOJAS'];
        $mediorecp = $fila['MEDIO_RECEPCION'];
        $usuario = $fila['USUARIO'];
        $dependencia = $fila['DEPENDENCIA'];
        $fecharadi =  $fila['FECHA_RADICADO'];
    } else {
        $hidradi = $fila[7];
        $radicado = $fila[0];
        $fecharadi =  $fila[1];
        $radipath = $fila[8];
        $asunto = $fila[3];
        $anexos = $fila[7];
        $nhojas = $fila[6];
        $mediorecp = $fila[2];
        $usuario = $fila[4];
        $dependencia = $fila[5];
    }

    $verImg = ($fila['SGD_SPUB_CODIGO'] == 1) ? ($fila['USUARIO'] != $_SESSION['usua_nomb'] ? false : true) : ($fila['USUA_NIVEL'] > $_SESSION['nivelus'] ? false : true);
    $numRadicado = $fila['RADICADO'];
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            if ($hidradi && $verImg)
                $salida = "<center><a href=\"$url_raiz/$ambiente/bodega/" . $radipath . "\">" . $radicado. "</a></center>";
            else
                $salida = "<center class=\"leidos\">{$numRadicado}</center>";
            break;
        case 2:
            if ($verImg)
                $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $radicado . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" >" . $fecharadi . "</a>";
            else
                $salida = "<a class=\"vinculos\" href=\"#\" onclick=\"alert(\"ud no tiene permisos para ver el radicado\");\">" . $fecharadi . "</a>";
            break;
        case 3:
            $salida = "<center class=\"leidos\">" . $asunto . "</center>";
            break;
        case 4:
            $salida = "<center class=\"leidos\">" . $anexos . "</center>";
            break;
        case 5:
            $salida = "<center class=\"leidos\">" . $nhojas . "</center>";
            break;
        case 6:
            $salida = "<center class=\"leidos\">" . $mediorecp . "</center>";
            break;
        case 7:
            $salida = "<center class=\"leidos\">" . $usuario . "</center>";
            break;
        case 8:
            $salida = "<center class=\"leidos\">" . $dependencia . "</center>";
            break;
    }
    return $salida;
}

?>
