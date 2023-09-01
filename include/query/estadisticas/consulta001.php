<?php

/**
 * En este frame se van cargado cada una de las funcionalidades del sistema
 *
 * Descripcion Larga
 *
 * @category
 * @package      SGD Orfeo
 * @subpackage   Main
 * @author       Community
 * @author       Skina Technologies SAS (http://www.skinatech.com)
 * @license      GNU/GPL <http://www.gnu.org/licenses/gpl-2.0.html>
 * @link         http://www.orfeolibre.org
 * @version      SVN: $Id$
 * @since
 */
/* ---------------------------------------------------------+
  |                     INCLUDES                             |
  +--------------------------------------------------------- */


/* ---------------------------------------------------------+
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
session_start();
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];
$ambiente = $_SESSION['ambiente'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

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

# Validación del query con respecto a la dependencia
//$condicionDep = ($dependencia_busq == 99999) ? " AND dep.depe_codi is not null " : "AND dep.depe_codi = '$dependencia_busq' ";
$condicionDep = ($dependencia_busq == 99999) ? " AND dep.depe_codi = '$depeUs' " : "AND dep.depe_codi = '$dependencia_busq' ";

switch ($db->driver) {
    case 'mssql': {
            /* Consulta para el listado principal de Radicados por usuario */
            if ($tipoDocumento == '9999') {
                $queryE = "SELECT b.USUA_NOMB as USUARIO, 
                        count(*) as RADICADOS, 
                        MIN(USUA_CODI) as HID_COD_USUARIO, 
                        MIN(USUA_DOC) as HID_DOC_USUARIO, 
                        MIN(depe_codi) as HID_DEPE_USUA
					FROM RADICADO r 
						INNER JOIN USUARIO b ON r.radi_usua_radi=b.usua_CODI AND r.radi_depe_radi = b.depe_codi
					WHERE " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' 
						$whereDependencia $whereActivos $whereTipoRadicado 
                    GROUP BY b.USUA_NOMB ORDER BY $orno $ascdesc";

            } else {
                $queryE = "SELECT b.USUA_NOMB as USUARIO, 
						count(*) as RADICADOS,
						t.SGD_TPR_DESCRIP as TIPO_DOCUMENTO, 
						MIN(USUA_CODI) as HID_COD_USUARIO, 
						MIN(USUA_DOC) as HID_DOC_USUARIO, 
						MIN(SGD_TPR_CODIGO) as HID_TPR_CODIGO, 
						MIN(depe_codi) as HID_DEPE_USUA
					FROM RADICADO r 
						INNER JOIN USUARIO b ON r.radi_usua_radi = b.USUA_CODI AND r.radi_depe_radi = b.depe_codi
						LEFT OUTER JOIN SGD_TPR_TPDCUMENTO t ON r.TDOC_CODI = t.SGD_TPR_CODIGO
					WHERE " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' 
						$whereDependencia $whereActivos $whereTipoRadicado 
                    GROUP BY b.USUA_NOMB,t.SGD_TPR_DESCRIP ORDER BY $orno $ascdesc";
            }

            /** CONSULTA PARA VER DETALLES */
            //$condicionDep = " AND depe_codi = $dependencia_busq ";
            $condicionE = " AND b.USUA_CODI=$codUs $condicionDep ";
            $queryEDetalle = "SELECT $radi_nume_radi as RADICADO
					,r.RADI_FECH_RADI as FECHA_RADICADO
					,t.SGD_TPR_DESCRIP as TIPO_DE_DOCUMENTO
					,r.RA_ASUN as ASUNTO 
					,r.RADI_DESC_ANEX AS ANEXOS 
					,r.RADI_NUME_HOJA AS N_HOJAS
					,m.MREC_DESC as MEDIO_RECEPCION
					,b.usua_nomb as USUARIO
                    ,dep.depe_nomb as DEPENDENCIA
					,r.RADI_PATH as HID_RADI_PATH {$seguridad}
					, dir.SGD_DIR_NOMREMDES as REMITENTE
				FROM RADICADO r
					INNER JOIN USUARIO b ON r.radi_usua_radi=b.usua_CODI AND r.radi_depe_radi = b.depe_codi
                    INNER JOIN DEPENDENCIA dep ON r.radi_depe_radi = dep.depe_codi 
					LEFT OUTER JOIN SGD_TPR_TPDCUMENTO t ON r.tdoc_codi=t.SGD_TPR_CODIGO 
					LEFT OUTER JOIN MEDIO_RECEPCION m ON r.MREC_CODI = m.MREC_CODI
				 	LEFT OUTER JOIN SGD_DIR_DRECCIONES dir ON r.radi_nume_radi = dir.radi_nume_radi	
				WHERE " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " 
						BETWEEN '$fecha_ini' AND '$fecha_fin' 
						$whereTipoRadicado 
						";
            $orderE = "	ORDER BY $orno $ascdesc";
            /** CONSULTA PARA VER TODOS LOS DETALLES 
             */
            $queryETodosDetalle = $queryEDetalle . $condicionDep . $orderE;
            $queryEDetalle .= $condicionDep . $orderE;
        }
    break;
    case 'mysql': {
            /* Consulta para el listado principal de Radicados por usuario */
            if ($tipoDocumento == '9999') {
                $queryE = "SELECT b.USUA_NOMB as USUARIO, 
                        count(*) as RADICADOS, 
                        MIN(USUA_CODI) as HID_COD_USUARIO, 
                        MIN(USUA_DOC) as HID_DOC_USUARIO, 
                        MIN(depe_codi) as HID_DEPE_USUA
                    FROM RADICADO r 
                        INNER JOIN USUARIO b ON r.radi_usua_radi=b.usua_CODI AND r.radi_depe_radi = b.depe_codi
                    WHERE " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' 
                        $whereDependencia $whereActivos $whereTipoRadicado 
                    GROUP BY b.USUA_NOMB ORDER BY $orno $ascdesc";
            } else {
                $queryE = "SELECT b.USUA_NOMB as USUARIO, 
                        count(*) as RADICADOS,
                        t.SGD_TPR_DESCRIP as TIPO_DOCUMENTO, 
                        MIN(USUA_CODI) as HID_COD_USUARIO, 
                        MIN(USUA_DOC) as HID_DOC_USUARIO, 
                        MIN(SGD_TPR_CODIGO) as HID_TPR_CODIGO, 
                        MIN(depe_codi) as HID_DEPE_USUA                        
                    FROM RADICADO r 
                        INNER JOIN USUARIO b ON r.radi_usua_radi = b.USUA_CODI AND r.radi_depe_radi = b.depe_codi
                        LEFT OUTER JOIN SGD_TPR_TPDCUMENTO t ON r.TDOC_CODI = t.SGD_TPR_CODIGO
                    WHERE " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' 
                        $whereDependencia $whereActivos $whereTipoRadicado 
                    GROUP BY b.USUA_NOMB,t.SGD_TPR_DESCRIP ORDER BY $orno $ascdesc";
            }
            
            /** CONSULTA PARA VER DETALLES */
            $condicionE = " AND b.USUA_CODI=$codUs $condicionDep ";
            $queryEDetalle = "SELECT $radi_nume_radi as RADICADO
                            ,r.RADI_FECH_RADI as FECHA_RADICADO
                            ,t.SGD_TPR_DESCRIP as TIPO_DE_DOCUMENTO
                            ,r.RA_ASUN as ASUNTO 
                            ,r.RADI_DESC_ANEX AS ANEXOS 
                            ,r.RADI_NUME_HOJA AS N_HOJAS
                            ,m.MREC_DESC as MEDIO_RECEPCION
                            ,b.usua_nomb as Usuario
                            ,dep.depe_nomb as DEPENDENCIA
                            ,r.RADI_PATH as HID_RADI_PATH {$seguridad}
                            , dir.SGD_DIR_NOMREMDES as REMITENTE
                    FROM RADICADO r
                            INNER JOIN USUARIO b ON r.radi_usua_radi=b.usua_CODI AND r.radi_depe_radi = b.depe_codi
                            INNER JOIN DEPENDENCIA dep ON r.radi_depe_radi = dep.depe_codi 
                            LEFT OUTER JOIN SGD_TPR_TPDCUMENTO t ON r.tdoc_codi=t.SGD_TPR_CODIGO 
                            LEFT OUTER JOIN MEDIO_RECEPCION m ON r.MREC_CODI = m.MREC_CODI
                            LEFT OUTER JOIN SGD_DIR_DRECCIONES dir ON r.radi_nume_radi = dir.radi_nume_radi	
                    WHERE " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " 
                            BETWEEN '$fecha_ini' AND '$fecha_fin' 
                            $whereTipoRadicado 
                            AND b.USUA_CODI=$codUs"; // AND b.DEPE_CODI='$depeUs'
            $orderE = "	ORDER BY $orno $ascdesc";
            /** CONSULTA PARA VER TODOS LOS DETALLES  */
            $queryETodosDetalle = $queryEDetalle . $condicionDep . $orderE;
            $queryEDetalle .= $condicionE . $orderE;
        }
    break;
    case 'postgresql':
    case 'postgres': {
        
            /* Consulta para el listado principal de Radicados por usuario */
            if ($tipoDocumento == '9999') {
                $queryE = "SELECT b.USUA_NOMB as USUARIO, 
					count(*) as RADICADOS, 
					MIN(USUA_CODI) as HID_COD_USUARIO, 
					MIN(USUA_DOC) as HID_DOC_USUARIO, 
					MIN(depe_codi) as HID_DEPE_USUA 					
					FROM RADICADO r 
						INNER JOIN USUARIO b ON r.radi_usua_radi=b.usua_CODI AND r.radi_depe_radi = b.depe_codi
					WHERE " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' 
						$whereDependencia $whereActivos $whereTipoRadicado 
                    GROUP BY b.USUA_NOMB ORDER BY $orno $ascdesc";
            } else {
                $queryE = "SELECT b.USUA_NOMB as USUARIO, 
						count(*) as RADICADOS,
						t.SGD_TPR_DESCRIP as TIPO_DOCUMENTO, 
						MIN(USUA_CODI) as HID_COD_USUARIO, 
						MIN(USUA_DOC) as HID_DOC_USUARIO, 
						MIN(SGD_TPR_CODIGO) as HID_TPR_CODIGO, 
                        MIN(depe_codi) as HID_DEPE_USUA
					FROM RADICADO r 
						INNER JOIN USUARIO b ON r.radi_usua_radi = b.USUA_CODI AND r.radi_depe_radi = b.depe_codi
						LEFT OUTER JOIN SGD_TPR_TPDCUMENTO t ON r.TDOC_CODI = t.SGD_TPR_CODIGO
					WHERE " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' 
						$whereDependencia $whereActivos $whereTipoRadicado 
                    GROUP BY b.USUA_NOMB,t.SGD_TPR_DESCRIP ORDER BY $orno $ascdesc";
            }

            /** CONSULTA PARA VER DETALLES */
            //$condicionDep = " AND depe_codi = $depeUs ";            
            //$condicionDep = " AND depe_codi = $dependencia_busq ";
            $condicionE = " AND b.USUA_CODI=$codUs $condicionDep ";
            $queryEDetalle = "SELECT $radi_nume_radi as RADICADO
					,r.RADI_FECH_RADI as FECHA_RADICADO
					,t.SGD_TPR_DESCRIP as TIPO_DE_DOCUMENTO
					,r.RA_ASUN as ASUNTO 
					,r.RADI_DESC_ANEX AS ANEXOS 
					,r.RADI_NUME_HOJA AS N_HOJAS
					,m.MREC_DESC as MEDIO_RECEPCION
					,b.usua_nomb as USUARIO
                    ,dep.depe_nomb as DEPENDENCIA
					,r.RADI_PATH as HID_RADI_PATH {$seguridad}
					, dir.SGD_DIR_NOMREMDES as REMITENTE
				FROM RADICADO r
					INNER JOIN USUARIO b ON r.radi_usua_radi=b.usua_CODI AND r.radi_depe_radi = b.depe_codi
                    INNER JOIN DEPENDENCIA dep ON r.radi_depe_radi = dep.depe_codi 
					LEFT OUTER JOIN SGD_TPR_TPDCUMENTO t ON r.tdoc_codi=t.SGD_TPR_CODIGO 
					LEFT OUTER JOIN MEDIO_RECEPCION m ON r.MREC_CODI = m.MREC_CODI
				 	LEFT OUTER JOIN SGD_DIR_DRECCIONES dir ON r.radi_nume_radi = dir.radi_nume_radi	
				WHERE " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " 
                    BETWEEN '$fecha_ini' AND '$fecha_fin' 
                    $whereTipoRadicado
                    ";
                $orderE = "	ORDER BY $orno $ascdesc";
            /** CONSULTA PARA VER TODOS LOS DETALLES */
            $queryETodosDetalle = $queryEDetalle . $condicionDep . $orderE;
            $queryEDetalle .= $condicionDep . $orderE;
        }
    break;
    case 'oracle':
    case 'oci8':
    case 'oci805':
    case 'ocipo': {

            /* Consulta para el listado principal de Radicados por usuario */
            if ($tipoDocumento == '9999') {
                $queryE = "SELECT b.USUA_NOMB as USUARIO, 
					count(*) as RADICADOS, 
					MIN(USUA_CODI) as HID_COD_USUARIO, 
					MIN(USUA_DOC) as HID_DOC_USUARIO, 
					MIN(depe_codi) as HID_DEPE_USUA
					FROM RADICADO r 
						INNER JOIN USUARIO b ON r.radi_usua_radi=b.usua_CODI AND r.radi_depe_radi = b.depe_codi
					WHERE " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' 
						$whereDependencia $whereActivos $whereTipoRadicado 
                    GROUP BY b.USUA_NOMB ORDER BY $orno $ascdesc";
            } else {
                $queryE = "SELECT b.USUA_NOMB as USUARIO, 
						count(*) as RADICADOS,
						t.SGD_TPR_DESCRIP as TIPO_DOCUMENTO, 
						MIN(USUA_CODI) as HID_COD_USUARIO, 
						MIN(USUA_DOC) as HID_DOC_USUARIO, 
						MIN(SGD_TPR_CODIGO) as HID_TPR_CODIGO, 
						MIN(depe_codi) as HID_DEPE_USUA
					FROM RADICADO r 
						INNER JOIN USUARIO b ON r.radi_usua_radi = b.USUA_CODI AND r.radi_depe_radi = b.depe_codi
						LEFT OUTER JOIN SGD_TPR_TPDCUMENTO t ON r.TDOC_CODI = t.SGD_TPR_CODIGO
					WHERE " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' 
						$whereDependencia $whereActivos $whereTipoRadicado 
                    GROUP BY b.USUA_NOMB,t.SGD_TPR_DESCRIP ORDER BY $orno $ascdesc";
            }

            /** CONSULTA PARA VER DETALLES **/
            //$condicionDep = " AND depe_codi = $depeUs ";
            //$condicionDep = " AND depe_codi = $dependencia_busq ";
            $condicionE = " AND b.USUA_CODI=$codUs $condicionDep ";
            $queryEDetalle = "SELECT $radi_nume_radi as RADICADO
					,r.RADI_FECH_RADI as FECHA_RADICADO
					,t.SGD_TPR_DESCRIP as TIPO_DE_DOCUMENTO
					,r.RA_ASUN as ASUNTO 
					,r.RADI_DESC_ANEX AS ANEXOS 
					,r.RADI_NUME_HOJA AS N_HOJAS
					,m.MREC_DESC as MEDIO_RECEPCION
					,b.usua_nomb as USUARIO
                    ,dep.depe_nomb as DEPENDENCIA
					,r.RADI_PATH as HID_RADI_PATH {$seguridad}
					, dir.SGD_DIR_NOMREMDES as REMITENTE
				FROM RADICADO r
					INNER JOIN USUARIO b ON r.radi_usua_radi=b.usua_CODI AND r.radi_depe_radi = b.depe_codi
                    INNER JOIN DEPENDENCIA dep ON r.radi_depe_radi = dep.depe_codi 
					LEFT OUTER JOIN SGD_TPR_TPDCUMENTO t ON r.tdoc_codi=t.SGD_TPR_CODIGO 
					LEFT OUTER JOIN MEDIO_RECEPCION m ON r.MREC_CODI = m.MREC_CODI
				 	LEFT OUTER JOIN SGD_DIR_DRECCIONES dir ON r.radi_nume_radi = dir.radi_nume_radi	
				WHERE " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " 
						BETWEEN '$fecha_ini' AND '$fecha_fin' 
						$whereTipoRadicado 
						AND b.USUA_CODI=$codUs "; //AND b.DEPE_CODI='$depeUs'
            $orderE = "	ORDER BY $orno $ascdesc";
            /** CONSULTA PARA VER TODOS LOS DETALLES */
            $queryETodosDetalle = $queryEDetalle . $condicionDep . $orderE;
            $queryEDetalle .= $condicionE . $orderE;
        }
    break;
}

# Encabezado para el detalle y sino para la pagina principal
if (isset($_GET['genDetalle']) && $_GET['denDetalle'] = 1)
    $titulos = array("#", "1#RADICADO", "2#FECHA RADICADO", "3#TIPO DOCUMENTO", "4#ASUNTO", "5#ANEXOS", "6#NO HOJAS", "7#MEDIO  DE RECEPCION", "8#USUARIO","9#DEPENDENCIA", "10#REMITENTE/DESTINATARIO");
else
    $titulos = array("#", "1#USUARIO", "2#RADICADOS");


function pintarEstadistica($fila, $indice, $numColumna) {

    global $dir_raiz, $_POST, $_GET, $krd, $ambiente;
    $salida = "";
    if (isset($fila['USUARIO'])) {
        $usaurio = $fila['USUARIO'];
        $radicados = $fila['RADICADOS'];
        $hid_doc_usuario = $fila['HID_DOC_USUARIO'];
    } else {
        $usaurio = $fila[0];
        $radicados = $fila[1];
        $hid_doc_usuario = $fila[3];
    }
    //error_log('--------> ' . $numColumna.' ***** '.$fila['USUARIO'].' ****** '.$fila['RADICADOS'].' **** '.print_r($fila));
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $usaurio;
            break;
        case 2:
            $datosEnvioDetalle = "tipoEstadistica=" . $_GET['tipoEstadistica'] . "&amp;genDetalle=1&amp;usua_doc=" . urlencode($hid_doc_usuario) . "&amp;dependencia_busq=" . $_GET['dependencia_busq'] . "&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;tipoRadicado=" . $_GET['tipoRadicado'] . "&amp;tipoDocumento=" . $_GET['tipoDocumento'] . "&amp;codUs=" . $fila['HID_COD_USUARIO'] . "&amp;depeUs=" . $fila['HID_DEPE_USUA'];
            $datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}&amp;krd={$krd}\"  target=\"detallesSec\" >" . $radicados . "</a>";
            break;
        default: $salida = false;
            break;
    }
    return $salida;
}


function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $dir_raiz, $encabezado, $krd, $ambiente;

    if (isset($fila['USUARIO'])) {
        $usaurio = $fila['USUARIO'];
        $radicado = $fila['RADICADO'];
        $tipodocumental = $fila['TIPO_DE_DOCUMENTO'];
        $asunto = $fila['ASUNTO'];
        $anexos = $fila['ANEXOS'];
        $nhojas = $fila['N_HOJAS'];
        $mediorecp = $fila['MEDIO_RECEPCION'];
        $remitente =  $fila['REMITENTE'];
        $dependency =  $fila['DEPENDENCIA'];
        $sector = $fila['SECTOR'];
        $causal = $fila['CAUSAL'];
        $detallecausal = $fila['DETALLE_CAUSAL'];
        $fecharadi = $fila['FECHA_RADICADO'];
        $radipath = $fila['HID_RADI_PATH'];
    } else {
        $usaurio = $fila[7];
        $fecharadi = $fila[1];
        $radicado = $fila[0];
        $tipodocumental = $fila[2];
        $asunto = $fila[3];
        $anexos = $fila[4];
        $nhojas = $fila[5];
        $mediorecp = $fila[6];
        $dependency =  $fila[8];
        $remitente =  $fila[12];
        $sector = $fila[10];
        $causal = $fila[11];
//        $detallecausal = $fila[11];
        $radipath = $fila[9];
    }
    //error_log('--------> ' . $numColumna . ' ***** ' . $fila['USUARIO'] . ' ****** ' . $fila['RADICADOS'] . ' **** ' . print_r($fila));
    $verImg = ($fila['SGD_SPUB_CODIGO'] == 1) ? ($fila['USUARIO'] != $_SESSION['usua_nomb'] ? false : true) : ($fila['USUA_NIVEL'] > $_SESSION['nivelus'] ? false : true);
    $numRadicado = $fila['RADICADO'];
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            if ($radipath && $verImg) {
                $rutaBodega = (substr($radipath, 0, 1) == '/') ? $radipath : "/" . $radipath;
                // Verifico si tiene / al inicio, los registros .pdf no lo tienen y la ruta se crea mal, los docx si lo tienen, por eso no solo se concatena
                //$salida="<center><a href=\"{$dir_raiz}bodega".$fila['HID_RADI_PATH']."\">".$fila['RADICADO']."</a></center>";
                $salida = "<center><a href=\"$url_raiz/$ambiente/bodega" . $rutaBodega . "\">" . $radicado . "</a></center>";
            } else {
                $salida = "<center class=\"leidos\">{$numRadicado}</center>";
            }
            break;
        case 2:
            if ($verImg)
                $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $radicado . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" >" . $fecharadi . "</a>";
            else
                $salida = "<a class=\"vinculos\" href=\"#\" onclick=\"alert(\"ud no tiene permisos para ver el radicado\");\">" . $fecharadi . "</a>";
            break;
        case 3:
            $salida = "<center class=\"leidos\">" . $tipodocumental . "</center>";
            break;
        case 4:
            $salida = "<center class=\"leidos\">" . $asunto . "</center>";
            break;
        case 5:
            $salida = "<center class=\"leidos\">" . $anexos . "</center>";
            break;
        case 6:
            $salida = "<center class=\"leidos\">" . $nhojas . "</center>";
            break;
        case 7:
            $salida = "<center class=\"leidos\">" . $mediorecp. "</center>";
            break;
        case 8:
            $salida = "<center class=\"leidos\">" . $usaurio . "</center>";
            break;
        case 9:
            $salida = "<center class=\"leidos\">" . $dependency . "</center>";
            break;
        case 10:
            $salida = "<center class=\"leidos\">" . $remitente . "</center>";
            break;
        case 11:
            $salida = "<center class=\"leidos\">" . $sector . "</center>";
            break;
        case 12:
            $salida = "<center class=\"leidos\">" . $causal . "</center>";
            break;
        case 13:
            $salida = "<center class=\"leidos\">" . $fila['DETALLE_CAUSAL'] . "</center>";
            break;
    }
    return $salida;
}

?>
