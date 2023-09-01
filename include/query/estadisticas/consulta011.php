<?php

/* * ********************************************************************************** */
/* ORFEO GPL:Sistema de Gestion Documental		http://www.orfeogpl.org	     */
/* 	Idea Original de la SUPERINTENDENCIA DE SERVICIOS PUBLICOS DOMICILIARIOS     */
/* 				COLOMBIA TEL. (57) (1) 6913005  orfeogpl@gmail.com   */
/* ===========================                                                       */
/*                                                                                   */
/* Este programa es software libre. usted puede redistribuirlo y/o modificarlo       */
/* bajo los terminos de la licencia GNU General Public publicada por                 */
/* la "Free Software Foundation"; Licencia version 2. 			             */
/*                                                                                   */
/* Copyright (c) 2005 por :	  	  	                                     */
/* SSPD "Superintendencia de Servicios Publicos Domiciliarios"                       */
/*   Jairo Hernan Losada  jlosada@gmail.com                Desarrollador             */
/*   Sixto Angel Pinzón López --- angel.pinzon@gmail.com   Desarrollador             */
/* C.R.A.  "COMISION DE REGULACION DE AGUAS Y SANEAMIENTO AMBIENTAL"                 */
/*   Liliana Gomez        lgomezv@gmail.com                Desarrolladora            */
/*   Lucia Ojeda          lojedaster@gmail.com             Desarrolladora            */
/* D.N.P. "Departamento Nacional de Planeación"                                      */
/*   Hollman Ladino       hladino@gmail.com                Desarrollador             */
/*                                                                                   */
/* Colocar desde esta lInea las Modificaciones Realizadas Luego de la Version 3.5    */
/*  Nombre Desarrollador   Correo     Fecha   Modificacion                           */
/* * ********************************************************************************** */

/** CONSULTA 011
 * Estadiscas de Numero de Radicados digitalizados y Hojas Digitalizadas.
 * @autor JAIRO H LOSADA - SSPD
 * @version ORFEO 3.1
 *
 */
/* include_once "$ruta_raiz/include/db/ConnectionHandler.php";
  $db2 = new ConnectionHandler($ruta_raiz);

  $db2->conn->SetFetchMode(ADODB_FETCH_ASSOC);
  $db2->conn->debug = true;
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
if ($dependencia_busq != '99999')
    $condicionE = " AND h.DEPE_CODI='$dependencia_busq' ";

switch ($db->driver) {
    case 'mssql':
    case 'mysql': {
            $queryE = "SELECT b.USUA_NOMB AS USUARIO
                    , count(*) AS RADICADOS
                    , SUM(r.RADI_NUME_HOJA) AS HOJAS_DIGITALIZADAS
                    , MIN(b.USUA_DOC) AS HID_COD_USUARIO
                FROM RADICADO r, USUARIO b, HIST_EVENTOS h
                WHERE
                    h.USUA_DOC=b.usua_DOC
                    $condicionE
                    AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
                    AND h.SGD_TTR_CODIGO in (22,23) and "
                                    . $db->conn->SQLDate('Y/m/d', 'h.hist_fech') . " BETWEEN '$fecha_ini' AND '$fecha_fin' $whereTipoRadicado
                GROUP BY b.USUA_NOMB
                ORDER BY $orno $ascdesc";
            
                /** CONSULTA PARA VER DETALLES */
                $queryEDetalle = "SELECT
                    r.RADI_NUME_RADI AS RADICADO
                    , k.SGD_TPR_DESCRIP AS TIPO_DOCUMENTO
                    , b.USUA_NOMB AS USUARIO_DIGITALIZADOR
                    , h.HIST_OBSE AS OBSERVACIONES
                    , CAST(r.RADI_FECH_RADI AS CHAR) AS FECHA_RADICACION
                    , CAST(h.HIST_FECH AS CHAR) AS FECHA_DIGITALIZACION
                    , mr.mrec_desc AS MEDIO_RECEPCION_ENVIO
                    , r.RADI_PATH AS HID_RADI_PATH{$seguridad}
                FROM RADICADO r, USUARIO b, HIST_EVENTOS h, MEDIO_RECEPCION mr, SGD_TPR_TPDCUMENTO k
                WHERE
                    h.USUA_DOC=b.usua_DOC
                    $condicionE
                    AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
                    and r.tdoc_codi=k.sgd_tpr_codigo
                    AND r.MREC_CODI=mr.MREC_CODI
                    AND b.USUA_DOC= '$codUs'
                    AND h.SGD_TTR_CODIGO in (22,23)  and "
                    . $db->conn->SQLDate('Y/m/d', 'h.hist_fech') . " BETWEEN '$fecha_ini' AND '$fecha_fin' $whereTipoRadicado
                ORDER BY $orno $ascdesc";
        }break;
    case 'postgres': {
            $queryE = "
                    SELECT b.USUA_NOMB AS USUARIO
                        , count(*) AS RADICADOS
                        , SUM(r.RADI_NUME_HOJA ) AS HOJAS_DIGITALIZADAS
                        , MIN(b.USUA_DOC) AS HID_COD_USUARIO
                        FROM RADICADO r, USUARIO b, HIST_EVENTOS h
                        WHERE
                        h.USUA_DOC=b.usua_DOC
                        $condicionE
                        AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
                        AND h.SGD_TTR_CODIGO in (22,23) and "
                                        . $db->conn->SQLDate('Y/m/d', 'h.hist_fech') . " BETWEEN '$fecha_ini' AND '$fecha_fin'
                    $whereTipoRadicado
                    GROUP BY b.USUA_NOMB
                    ORDER BY $orno $ascdesc";


            /** CONSULTA PARA VER DETALLES
             */
            $queryEDetalle = "SELECT
                r.RADI_NUME_RADI AS RADICADO
                , k.SGD_TPR_DESCRIP AS TIPO_DOCUMENTO
                , b.USUA_NOMB AS USUARIO_DIGITALIZADOR
                , h.HIST_OBSE AS OBSERVACIONES
                , CAST(r.RADI_FECH_RADI AS VARCHAR) AS FECHA_RADICACION
                , CAST(h.HIST_FECH AS VARCHAR) AS FECHA_DIGITALIZACION
                , mr.mrec_desc AS MEDIO_RECEPCION_ENVIO
                , r.RADI_PATH AS HID_RADI_PATH{$seguridad}
                FROM RADICADO r, USUARIO b, HIST_EVENTOS h, MEDIO_RECEPCION mr, SGD_TPR_TPDCUMENTO k
                WHERE
                h.USUA_DOC=b.usua_DOC
                $condicionE
                AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
                and r.tdoc_codi=k.sgd_tpr_codigo
                AND r.MREC_CODI=mr.MREC_CODI
                AND h.SGD_TTR_CODIGO in (22,23)  and "
                    . $db->conn->SQLDate('Y/m/d', 'h.hist_fech') . " BETWEEN '$fecha_ini' AND '$fecha_fin'
            $whereTipoRadicado
            ORDER BY $orno $ascdesc";
        }break;
    case 'oracle':
    case 'oci8':
    case 'oci805':
    case 'ocipo': {
            $queryE = "
SELECT b.USUA_NOMB USUARIO
, count(*) RADICADOS
, SUM(r.RADI_NUME_HOJA) 	HOJAS_DIGITALIZADAS
, MIN(b.USUA_DOC) HID_COD_USUARIO
FROM RADICADO r, USUARIO b, HIST_EVENTOS h
WHERE
h.USUA_DOC=b.usua_DOC
$condicionE
AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
AND h.SGD_TTR_CODIGO in (22,23)
AND TO_CHAR(h.hist_fech,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin'
$whereTipoRadicado
GROUP BY b.USUA_NOMB
ORDER BY $orno $ascdesc";

            /** CONSULTA PARA VER DETALLES
             */
            $queryEDetalle = "SELECT
r.RADI_NUME_RADI RADICADO
, k.SGD_TPR_DESCRIP TIPO_DOCUMENTO
, b.USUA_NOMB USUARIO_DIGITALIZADOR
, h.HIST_OBSE OBSERVACIONES
, TO_CHAR(r.RADI_FECH_RADI, 'DD/MM/YYYY HH24:MI:SS') FECHA_RADICACION
, TO_CHAR(h.HIST_FECH, 'DD/MM/YYYY HH24:MI:SS') FECHA_DIGITALIZACION
, mr.mrec_desc MEDIO_RECEPCION_ENVIO
, r.RADI_PATH HID_RADI_PATH{$seguridad}
FROM RADICADO r, USUARIO b, HIST_EVENTOS h, MEDIO_RECEPCION mr, SGD_TPR_TPDCUMENTO k
WHERE
h.USUA_DOC=b.usua_DOC
$condicionE
AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
and r.tdoc_codi=k.sgd_tpr_codigo
AND r.MREC_CODI=mr.MREC_CODI(+)
AND b.USUA_DOC= '$codUs'
AND h.SGD_TTR_CODIGO in (22,23)
AND TO_CHAR(h.hist_fech,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin'
$whereTipoRadicado
ORDER BY $orno $ascdesc";
        }break;
}
//  skina 13-10-2011
if (isset($_GET['genDetalle']) && $_GET['denDetalle'] = 1)
    $titulos = array("#", "1#RADICADO", "2#TIPO DE DOCUMENTO", "3#USUARIO DIGITALIZADOR", "4#OBSERVACIONES", "5#FECHA RADICACION", "6#FECHA  DE DIGITALIZACION", "7#MEDIO DE RECEPCION",);
else
    $titulos = array("#", "1#Usuario", "2#TOTAL RADICADOS", "3#HOJAS DIGITALIZADAS");

function pintarEstadistica($fila, $indice, $numColumna) {
    global $ruta_raiz, $_POST, $_GET, $krd, $ambiente;
    $salida = "";
    
    if (isset($fila['USUARIO'])) {
        $radicado = $fila['RADICADOS'];
        $usuario = $fila['USUARIO'];
        $hojasDigitalizadas = $fila['HOJAS_DIGITALIZADAS'];
        $codUsuario = $fila['HID_COD_USUARIO'];
    } else {
        $radicado = $fila[1];
        $usuario = $fila[0];
        $hojasDigitalizadas = $fila[2];
        $codUsuario = $fila[3];
    }
    
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $usuario;
            break;
        case 2:
            $datosEnvioDetalle = "tipoEstadistica=" . $_GET['tipoEstadistica'] . "&amp;genDetalle=1&amp;usua_doc=" . urlencode($codUsuario) . "&amp;dependencia_busq=" . $_GET['dependencia_busq'] . "&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;tipoRadicado=" . $_GET['tipoRadicado'] . "&amp;tipoDocumento=" . $_GET['tipoDocumento'] . "&amp;codUs=" . $codUsuario . "&amp;depeUs=" . $fila['HID_DEPE_USUA'];
            $datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}&amp;krd={$krd}\" target=\"detallesSec\" >" . $radicado . "</a>";
            break;
        case 3:
            $salida = $hojasDigitalizadas + $hojas_anexos;
            break;
        default: $salida = false;
    }
    return $salida;
}

function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $ruta_raiz, $encabezado, $krd, $ambiente;

    /***
    Skinatech
    Autor: Andrés Mosquera
    Fecha: 08-11-2018
    Información: Se agregan variables donde se cargan los datos, funcionamiento tomado de la consulta004.php
    ***/

    if (isset($fila['RADICADOS'])) {
        $radicado = $fila['RADICADO'];
        $tipoDocumento = $fila['TIPO_DOCUMENTO'];
        $usuariodigi = $fila['USUARIO_DIGITALIZADOR'];
        $observa = $fila['OBSERVACIONES'];
        $fecharad = $fila['FECHA_RADICACION'];
        $fechadigi = $fila['FECHA_DIGITALIZACION'];
        $mediorecp = $fila['MEDIO_RECEPCION_ENVIO'];
        $radipath = $fila['HID_RADI_PATH'];
    } else {
        $radicado = $fila[0];
        $tipoDocumento = $fila[1];
        $usuariodigi = $fila[2];
        $observa = $fila[3];
        $fecharad = $fila[4];
        $fechadigi = $fila[5];
        $mediorecp = $fila[6];
        $radipath = $fila[7];
    }

    $verImg = ($fila['SGD_SPUB_CODIGO'] == 1) ? ($fila['USUARIO'] != $_SESSION['usua_nomb'] ? false : true) : ($fila['USUA_NIVEL'] > $_SESSION['nivelus'] ? false : true);
    $numRadicado = $fila['RADICADOS'];
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            if ($radipath && $verImg)
                $salida = "<center><a href=\"$url_raiz/$ambiente/bodega/" . $radipath . "\">" . $radicado . "</a></center>";
            else
                $salida = "<center class=\"leidos\">{$numRadicado}</center>";
            break;
        /* 	case 2:  //   fila   codigo  anexo
          $salida="<center class=\"leidos\">".$fila['ANEX_CODIGO']."</center>";
          break; */
        case 2:
            $salida = "<center class=\"leidos\">" . $tipoDocumento . "</center>";
            break;
        case 3:
            $salida = "<center class=\"leidos\">" . $usuariodigi . "</center>";
            break;
        case 4:
            $salida = "<center class=\"leidos\">" . $observa . "</center>";
            break;
        case 5:
            if ($verImg)
                $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $radicado . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" >" . $fecharad . "</a>";
            else
                $salida = "<a class=\"vinculos\" href=\"#\" onclick=\"alert(\"ud no tiene permisos para ver el radicado\");\">" . $fecharad . "</a>";
            break;
        case 6:
            $salida = "<center class=\"leidos\">" . $fechadigi . "</center>";
            break;
        case 7:
            $salida = "<center class=\"leidos\">" . $mediorecp . "</center>";
            break;
    }
    return $salida;
}
?>
