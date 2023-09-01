<?php

/** CONSUTLA 001 
 * Estadisticas por medio de envio -Salida *******
 * se tienen en cuenta los registros enviados por la dep xx contando la masiva ----
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
$seguridad = ",B.CODI_NIVEL USUA_NIVEL,R.SGD_SPUB_CODIGO";
switch ($db->driver) {
    case 'mysql': { // Este default trabaja con Mssql 2K, 2K5.
            if ($whereDependencia && $dependencia_busq != 99999)
                $wdepend = " AND b.depe_codi = '$dependencia_busq' ";
            $queryE = " SELECT	b.USUARIO, 
                                b.tot_reg AS TOTAL_ENVIADOS, 
                                c.sgd_fenv_descrip AS MEDIO_ENVIO, 
                                b.USUA_DOC AS HID_COD_USUARIO, HID_DEPE_USUA, 
                                b.sgd_fenv_codigo AS HID_CODIGO_ENVIO
                        FROM  (SELECT COUNT(c.SGD_RENV_CANTIDAD) AS tot_reg, 
                                    c.sgd_fenv_codigo, 
                                    b.USUA_NOMB AS USUARIO,
                                    MIN(b.depe_codi) AS HID_DEPE_USUA, 
                                    MIN(b.usua_doc) AS USUA_DOC
                            FROM  SGD_RENV_REGENVIO c, USUARIO b, radicado a
                            WHERE " . $db->conn->SQLDate('Y/m/d', 'a.radi_fech_radi') . " 
                                    BETWEEN '$fecha_ini'  AND '$fecha_fin' AND
                                    a.radi_nume_radi = c.radi_nume_sal 
                                    $wdepend 
                                    AND cast(c.usua_doc as char(10)) = b.usua_doc AND
                                    (c.sgd_renv_planilla != '00' or c.sgd_renv_planilla is null) and
                                    (c.sgd_renv_observa not like 'Masiva%' or  c.sgd_renv_observa is null)
                                    $whereTipoRadicado
                            GROUP BY b.USUA_NOMB, c.sgd_fenv_codigo
                                      ) b, SGD_FENV_FRMENVIO c
                        WHERE b.sgd_fenv_codigo=c.sgd_fenv_codigo
                        ORDER BY $orno $ascdesc";

            /** CONSULTA PARA VER DETALLES   */
            $condicionDep = ($dependencia_busq == 99999) ? '' : " and b.depe_codi = '" . $dependencia_busq . "'";
            //Modificado skina para postgres se reemplazo convert por cast
            $condicionE = " AND c.sgd_fenv_codigo = $fenvCodi AND b.USUA_doc = '$codUs' ";
            $queryEDetalle = "SELECT c.RADI_NUME_SAL AS RADICADO, 
                                d.sgd_fenv_descrip AS ENVIO_POR,
                                b.USUA_NOMB AS USUARIO_QUE_ENVIO, 
                                c.sgd_renv_fech AS FECHA_ENVIO, 
                                c.sgd_renv_planilla AS PLANILLA,
                                c.sgd_fenv_codigo AS HID_CODIGO_ENVIO	
                                
                           FROM SGD_RENV_REGENVIO c, 
                               SGD_FENV_FRMENVIO d, 
                               USUARIO b, radicado a
                           WHERE c.sgd_fenv_codigo=d.sgd_fenv_codigo AND 
                           " . $db->conn->SQLDate('Y/m/d', 'a.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin' AND 
                           a.radi_nume_radi = c.radi_nume_sal 
                                    and cast(c.usua_doc as char(14)) =  b.USUA_doc $wdepend AND
                           (c.sgd_renv_planilla != '00' or c.sgd_renv_planilla is null) and
                           (c.sgd_renv_observa not like 'Masiva%' or  c.sgd_renv_observa is null)
                               $whereTipoRadicado ";
            $orderE = "	ORDER BY $orno $ascdesc ";

            /** CONSULTA PARA VER TODOS LOS DETALLES */
            $queryETodosDetalle = $queryEDetalle . $orderE;
            $queryEDetalle .= $condicionE . $condicionDep . $orderE;
        }break;
    case 'oracle':
    case 'oci8':
    case 'oci805':
    case 'ocipo': {
            if ($whereDependencia && $dependencia_busq != 99999) {
                $wdepend = " AND b.depe_codi = '$dependencia_busq' ";
            }
            $queryE = "SELECT 
			b.USUA_DOC HID_COD_USUARIO
			, HID_DEPE_USUA
			,b.USUARIO
			,b.sgd_fenv_codigo CODIGO_ENVIO
			,c.sgd_fenv_descrip MEDIO_ENVIO
			,b.tot_reg TOTAL_ENVIADOS
			,b.sgd_fenv_codigo HID_CODIGO_ENVIO
		   FROM 
			(SELECT COUNT(c.SGD_RENV_CANTIDAD) tot_reg,c.sgd_fenv_codigo , b.USUA_NOMB USUARIO, MIN(b.depe_codi) HID_DEPE_USUA, MIN(b.usua_doc) USUA_DOC
				FROM SGD_RENV_REGENVIO c, USUARIO b, radicado a
				WHERE 
					TO_CHAR(c.SGD_RENV_FECH,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin'
					AND a.radi_nume_radi = c.radi_nume_sal
					$wdepend
					AND substr(c.usua_doc,1,15) = b.usua_doc
					AND (c.sgd_renv_planilla != '00' or c.sgd_renv_planilla is null)
					and (c.sgd_renv_observa not like 'Masiva%' or  c.sgd_renv_observa is null)
					$whereTipoRadicado
				GROUP BY b.USUA_NOMB, c.sgd_fenv_codigo) b, SGD_FENV_FRMENVIO c
    		WHERE b.sgd_fenv_codigo=c.sgd_fenv_codigo
			ORDER BY $orno $ascdesc";
            /** CONSULTA PARA VER DETALLES 
             */
            $condicionDep = " AND b.depe_codi = '$depeUs' ";
            $condicionE = " AND c.sgd_fenv_codigo = $fenvCodi AND b.USUA_doc = $codUs ";

            $queryEDetalle = "SELECT  c.RADI_NUME_SAL RADICADO
				,d.sgd_fenv_descrip ENVIO_POR
				,b.USUA_NOMB USUARIO_QUE_ENVIO
				,c.sgd_renv_fech FECHA_ENVIO
				,c.sgd_renv_planilla PLANILLA
				,c.sgd_fenv_codigo HID_CODIGO_ENVIO				
				FROM SGD_RENV_REGENVIO c, SGD_FENV_FRMENVIO d, USUARIO b, radicado a
				WHERE 
				    c.sgd_fenv_codigo=d.sgd_fenv_codigo
					AND TO_CHAR(c.SGD_RENV_FECH,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin'
					AND a.radi_nume_radi = c.radi_nume_sal
					and substr(c.usua_doc,1,15) =  b.USUA_doc
					$wdepend
					AND (c.sgd_renv_planilla != '00' or c.sgd_renv_planilla is null)
					and (c.sgd_renv_observa not like 'Masiva%' or  c.sgd_renv_observa is null)
					
					$whereTipoRadicado ";

            $orderE = "	ORDER BY $orno $ascdesc ";
            /** CONSULTA PARA VER TODOS LOS DETALLES 
             */
            $queryETodosDetalle = $queryEDetalle . $orderE;
            $queryEDetalle .= $condicionE . $condicionDep . $orderE;
        }break;
    default: { // Este default trabaja con Mssql 2K, 2K5.
            if ($whereDependencia && $dependencia_busq != 99999)
                $wdepend = " AND b.depe_codi = '$dependencia_busq' ";
            $queryE = " SELECT	b.USUARIO, 
						b.tot_reg AS TOTAL_ENVIADOS, 
						c.sgd_fenv_descrip AS MEDIO_ENVIO, 
						b.USUA_DOC AS HID_COD_USUARIO, HID_DEPE_USUA, 
						b.sgd_fenv_codigo AS HID_CODIGO_ENVIO
			    		FROM  (SELECT COUNT(c.SGD_RENV_CANTIDAD) AS tot_reg, 
							c.sgd_fenv_codigo, 
							b.USUA_NOMB AS USUARIO,
							MIN(b.depe_codi) AS HID_DEPE_USUA, 
							MIN(b.usua_doc) AS USUA_DOC
						FROM  SGD_RENV_REGENVIO c, USUARIO b, radicado a
						WHERE " . $db->conn->SQLDate('Y/m/d', 'a.radi_fech_radi') . " 
							BETWEEN '$fecha_ini'  AND '$fecha_fin' AND
							a.radi_nume_radi = c.radi_nume_sal 
							$wdepend 
							AND cast(c.usua_doc as varchar(10)) = b.usua_doc AND
							(c.sgd_renv_planilla != '00' or c.sgd_renv_planilla is null) and
							(c.sgd_renv_observa not like 'Masiva%' or  c.sgd_renv_observa is null)
							$whereTipoRadicado
						GROUP BY b.USUA_NOMB, c.sgd_fenv_codigo
							  ) b, SGD_FENV_FRMENVIO c
					WHERE b.sgd_fenv_codigo=c.sgd_fenv_codigo
					ORDER BY $orno $ascdesc";

            /** CONSULTA PARA VER DETALLES   */
            $condicionDep = ($dependencia_busq == 99999) ? '' : " and b.depe_codi = '" . $dependencia_busq . "'";
            //Modificado skina para postgres se reemplazo convert por cast
            $condicionE = " AND c.sgd_fenv_codigo = $fenvCodi AND b.USUA_doc = '$codUs' ";
            $queryEDetalle = "SELECT cast(c.RADI_NUME_SAL as varchar(15)) AS RADICADO, d.sgd_fenv_descrip AS ENVIO_POR,
	                        b.USUA_NOMB AS USUARIO_QUE_ENVIO, c.sgd_renv_fech AS FECHA_ENVIO, c.sgd_renv_planilla AS PLANILLA,
	                        c.sgd_fenv_codigo AS HID_CODIGO_ENVIO				
					       FROM SGD_RENV_REGENVIO c, SGD_FENV_FRMENVIO d, USUARIO b, radicado a
					       WHERE c.sgd_fenv_codigo=d.sgd_fenv_codigo AND 
					       " . $db->conn->SQLDate('Y/m/d', 'a.radi_fech_radi') . " BETWEEN '$fecha_ini'  AND '$fecha_fin' AND 
					       a.radi_nume_radi = c.radi_nume_sal 
							and cast(c.usua_doc as varchar(14)) =  b.USUA_doc $wdepend AND
					       (c.sgd_renv_planilla != '00' or c.sgd_renv_planilla is null) and
					       (c.sgd_renv_observa not like 'Masiva%' or  c.sgd_renv_observa is null)
						    ";

            $orderE = "	ORDER BY $orno $ascdesc ";

            /** CONSULTA PARA VER TODOS LOS DETALLES */
            $queryETodosDetalle = $queryEDetalle . $orderE;
            $queryEDetalle .= $condicionE . $condicionDep . $orderE;
        }break;
}

if (isset($_GET['genDetalle']) && $_GET['denDetalle'] = 1)
    $titulos = array("#", "1#RADICADO", "2#ENVIO POR", "3#USUARIO QUE ENVIO", "4#FECHA ENVIO", "5#PLANILLA");
else
    $titulos = array("#", "1#USUARIO", "2#TOTAL ENVIADOS", "3#MEDIO DE ENVIO");

function pintarEstadistica($fila, $indice, $numColumna) {
    global $ruta_raiz, $_POST, $_GET, $krd, $ambiente;
    
    if (isset($fila['USUARIO'])) {
        $usuario = $fila['USUARIO'];
        $mediosenvio = $fila['MEDIO_ENVIO'];
        $hidusua = $fila['HID_USUA_DOC'];
        $totalenvios = $fila['TOTAL_ENVIADOS'];
        $hiddcod = $fila['HID_COD_USUARIO'];
        $hiddepeusua = $fila['HID_DEPE_USUA'];
        $hidcodigo = $fila['HID_CODIGO_ENVIO'];
    } else {
        $usuario = $fila[0];
        $mediosenvio = $fila[2];
        $hidusua = $fila['HID_USUA_DOC'];
        $totalenvios = $fila[1];
        $hiddcod = $fila[3];
        $hiddepeusua = $fila[4];
        $hidcodigo = $fila[5];
    }
    $salida = "";
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $usuario;
            break;
        case 3:
            $salida = $mediosenvio;
            break;
        case 2:
            $datosEnvioDetalle = "tipoEstadistica=" . $_GET['tipoEstadistica'] . "&amp;genDetalle=1&amp;usua_doc=" . urlencode($fila['HID_USUA_DOC']) . "&amp;dependencia_busq=" . $_GET['dependencia_busq'] . "&amp;codUs=" . $hiddcod . "&amp;depeUs=" . $hiddepeusua . "&amp;fenvCodi=" . $hidcodigo . "&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;tipoRadicado=" . $_GET['tipoRadicado'] . "&amp;tipoDocumento=" . $_GET['tipoDocumento'];
            $datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}&amp;krd={$krd}\"  target=\"detallesSec\" >" . $totalenvios . "</a>";
            break;
        default: $salida = false;
    }
    return $salida;
}

function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $ruta_raiz, $encabezado, $krd, $ambiente;
    
    if (isset($fila['RADICADO'])) {
        $radicado = $fila['RADICADO'];
        $enviopor = $fila['ENVIO_POR'];
        $usuarque = $fila['USUARIO_QUE_ENVIO'];
        $fechaenvio = $fila['FECHA_ENVIO'];
        $planilla = $fila['PLANILLA'];
        $hidcodenvio = $fila['HID_CODIGO_ENVIO'];
    } else {
        $radicado = $fila[0];
        $enviopor = $fila[1];
        $usuarque = $fila[2];
        $fechaenvio = $fila[3];
        $planilla = $fila[4];
        $hidcodenvio = $fila[5];
    }
    
    //$verImg=($fila['SGD_SPUB_CODIGO']==1)?($fila['USUARIO']!=$_SESSION['usua_nomb']?false:true):($fila['USUA_NIVEL']>$_SESSION['nivelus']?false:true);
    $numRadicado = isset($fila['RADICADO']) ? $fila['RADICADO'] : $fila[0];
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            if ($fila['HID_RADI_PATH'] && $verImg)
                $salida = "<center><a href=\"$url_raiz/$ambiente/bodega/" . $radipath . "\">" . $radicado . "</a></center>";
            else
                $salida = "<center class=\"leidos\">{$numRadicado}</center>";
            break;
        case 2:
            $salida = $enviopor;
            break;
        case 3:
            $salida = "<center class=\"leidos\">" . $usuarque . "</center>";
            break;
        case 4:
            $salida = "<center class=\"leidos\">" . $fechaenvio . "</center>";
            break;
        case 5:
            $salida = "<center class=\"leidos\">" . $planilla . "</center>";
            break;
    }
    return $salida;
}

?>
