<?php

$coltp3Esp = '"' . $tip3Nombre[3][2] . '"';
if (!$orno)
    $orno = 1;

$groupByE = "";
$orderE = "	ORDER BY $orno $ascdesc ";

$desde = $fecha_ini . " " . "00:00:00";
$hasta = $fecha_fin . " " . "23:59:59";

$sWhereFec = " AND ".$db->conn->SQLDate('Y/m/d H:i:s', 'r.RADI_FECH_RADI') . " BETWEEN '$desde' AND '$hasta' ";

if ($dependencia_busq != '99999')
    $condicionE = " AND hi.depe_codi_dest ='$dependencia_busq' ";

if ($codus != 0) {
    $condicionE .= " and hi.hist_doc_dest='$codus'";
}

if ($tipoDocumento != '9998' and $tipoDocumento != '9999' and $tipoDocumento != '9997'){
    $condicionE .= " AND t.SGD_TPR_CODIGO = $tipoDocumento ";
}
elseif($tipoDocumento == '9998'){
    $groupByE = " t.sgd_tpr_codigo, ";
}else{
    $groupByE = "";
}

$queryE = " 
    select 
        usu.usua_nomb            as USUARIO_DESTINO, 
        des.depe_nomb            as DEPENDENCIA_DESTINO,
        count(hi.radi_nume_radi) as CANTIDAD,
        MIN(t.sgd_tpr_descrip)   as TIPO_DOCUMENTAL,
        usu.usua_doc             as HID_USUA_DOC
    FROM 
        hist_eventos hi
        inner join usuario usu ON hi.hist_doc_dest=usu.usua_doc 
        inner join dependencia des ON hi.depe_codi_dest=des.depe_codi 
        inner join radicado r ON hi.radi_nume_radi=r.radi_nume_radi
        inner join sgd_tpr_tpdcumento t ON r.tdoc_codi = t.sgd_tpr_codigo
    WHERE 
        hi.sgd_ttr_codigo=9
        $condicionE $sWhereFec 
    GROUP BY $groupByE usu.usua_nomb, des.depe_nomb, usu.usua_doc";

/** CONSULTA PARA VER DETALLES */

$queryEDetalle = "
    SELECT 
        r.radi_nume_radi   as RADICADO, 
        r.radi_fech_radi   as FECH_RAD, 
        r.ra_asun	       as ASUN_RADI,
        t.sgd_tpr_descrip  as TIPO_DOCUMENTAL,
        de.depe_nomb       as DEPDENCIA_ORIGEN,
        us.usua_nomb       as USUARIO_ORIGEN,
        des.depe_nomb      as DEPENDENCIA_DESTINO,
        usu.usua_nomb      as USUARIO_DESTINO,
        r.RADI_PATH        as HID_RADI_PATH ,
        R.SGD_SPUB_CODIGO  as SGD_SPUB_CODIGO
    FROM 
        hist_eventos hi
        inner join usuario us ON hi.usua_doc=us.usua_doc
        inner join dependencia de ON hi.depe_codi=de.depe_codi
        inner join usuario usu ON hi.hist_doc_dest=usu.usua_doc 
        inner join dependencia des ON hi.depe_codi_dest=des.depe_codi 
        inner join radicado r ON hi.radi_nume_radi=r.radi_nume_radi
        inner join sgd_tpr_tpdcumento t ON r.tdoc_codi = t.sgd_tpr_codigo
    WHERE 
        hi.sgd_ttr_codigo=9 
		and hi.hist_doc_dest='$usua_docs'
		$sWhereFec ";

if (isset($_GET['genDetalle']) && $_GET['denDetalle'] = 1) {
    $titulos = array("#", "1#RADICADO", "2#FECHA RADICACION", "3#ASUNTO", "4#TIPO DOCUMENTAL", "5#DEPENDENCIA ORIGEN", "6#USUARIO ORIGEN", "7#DEPENDENCIA DESTINO", "8#USUARIO DESTINO");
} else {
    $titulos = array("#", "1#USUARIO DESTINO", "2#DEPENDENCIA DESTINO", "3#CANTIDAD RADICADOS", "4#ULTIMO TIPO DOCUMENTAL");
}

function pintarEstadistica($fila, $indice, $numColumna) {
    global $ruta_raiz, $_POST, $_GET, $ambiente;

    $salida = "";

    $usuarioDestino = $fila['USUARIO_DESTINO'];
    $dependenciaDestino = $fila['DEPENDENCIA_DESTINO'];
    $asignados = $fila['CANTIDAD'];
    $tipoDocumental = $fila['TIPO_DOCUMENTAL'];
    $hid_usua_doc = $fila['HID_USUA_DOC'];
    
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $usuarioDestino;
            break;
        case 2:
            $salida = $dependenciaDestino;
            break;
        case 3:
            $datosEnvioDetalle = "tipoEstadistica=" . $_GET['tipoEstadistica'] . "&amp;genDetalle=1&amp;usua_docs=" . urlencode($hid_usua_doc) . "&amp;dependencia_busq=" . $_GET['dependencia_busq'] . "&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;tipoRadicado=" . $_GET['tipoRadicado'] . "&amp;tipoDocumento=" . $_GET['tipoDocumento'] . "&amp;codUs=" . $hid_usua_doc . "&amp;&tipoDOCumento=" . $fila['HID_TPR_CODIGO'];
            $datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}\"  target=\"detallesSec\" >" . $asignados . "</a>";
            break;
        case 4:
            $salida = $tipoDocumental;
            break;
    }
    return $salida;
}

function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $ruta_raiz, $encabezado, $krd, $ambiente;
    
    $radicado = $fila['RADICADO'];
    $fechRad = $fila['FECH_RAD'];
    $asuntoRadicado = $fila['ASUN_RADI'];
    $tipoDocumental = $fila['TIPO_DOCUMENTAL'];
    $dependenciaOrigen = $fila['DEPDENCIA_ORIGEN'];
    $usuarioOrigen = $fila['USUARIO_ORIGEN'];
    $dependenciaDestino = $fila['DEPENDENCIA_DESTINO'];
    $usuarioDestino = $fila['USUARIO_DESTINO'];
    $radiPath = $fila['HID_RADI_PATH'];
    $spub = $fila['SGD_SPUB_CODIGO'];
    
    $numRadicado = $radicado;
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            if ($radiPath)
                $salida = "<center><a href=\"$url_raiz/$ambiente/bodega/" . $radiPath . "\">" . $radicado . "</a></center>";
            else
                $salida = "<center class=\"leidos\">{$numRadicado}</center>";
            break;
        case 2:
                $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $radicado . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" >" . $fechRad . "</a>";
            break;
        case 3:
            $salida = "<center class=\"leidos\">" . $asuntoRadicado . "</center>";
            break;
        case 4:
            $salida = "<center class=\"leidos\">" . $tipoDocumental . "</center>";
            break;
        case 5:
            $salida = "<center class=\"leidos\">" . $dependenciaOrigen . "</center>";
            break;
        case 6:
            $salida = "<center class=\"leidos\">" . $usuarioOrigen . "</center>";
            break;
        case 7:
            $salida = "<center class=\"leidos\">" . $dependenciaDestino . "</center>";
            break;
        case 8:
            $salida = "<center class=\"leidos\">" . $usuarioDestino . "</center>";
            break;
    }
    return $salida;
}
?>
