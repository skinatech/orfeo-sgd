<?php

$coltp3Esp = '"' . $tip3Nombre[3][2] . '"';
if (!$orno) {
    $orno = 2;
}

$whereTipoRadicado = str_replace("A.", "r.", $whereTipoRadicado);
$whereTipoRadicado = str_replace("a.", "r.", $whereTipoRadicado);
$rangoFechas = $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin'";

switch ($db->driver) {
    case 'oracle':
    case 'oci8':
    case 'oci805':
    case 'ocipo':{
            if ($dependencia_busq != '99999') {
                $condicionE = " AND h.DEPE_CODI_DEST='$dependencia_busq' AND b.DEPE_CODI='$dependencia_busq' ";
            }
            $queryE = "select MIN(b.USUA_NOMB) USUARIO, count(r.RADI_NUME_RADI) RADICADOS , MIN(b.USUA_CODI) HID_COD_USUARIO , MIN(b.depe_codi) HID_DEPE_USUA FROM RADICADO r, USUARIO b, HIST_EVENTOS h, SGD_TPR_TPDCUMENTO t WHERE h.HIST_DOC_DEST=b.usua_doc AND r.tdoc_codi=t.sgd_tpr_codigo $condicionE AND h.RADI_NUME_RADI=r.RADI_NUME_RADI AND h.SGD_TTR_CODIGO in(2,9,12,16) AND TO_CHAR(r.radi_fech_radi,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin' $whereTipoRadicado ";

            if ($codEsp) {
                $queryE .= " and r.EESP_CODI = $codEsp ";
            }

            $queryE .= " GROUP BY b.USUA_LOGIN  ORDER BY $orno $ascdesc ";
            /** CONSULTA PARA VER DETALLES*/
            $dias_rad = "to_number(to_char(" . $db->conn->sysTimeStamp . ", 'DD')) - to_number(to_char(r.radi_fech_radi, 'DD'))";
            $queryEDetalle = "SELECT
        r.RADI_NUME_RADI RADICADO
        , b.USUA_NOMB USUARIO_ACTUAL
        , r.RA_ASUN ASUNTO
        , TO_CHAR(r.RADI_FECH_RADI, 'DD/MM/YYYY HH24:MM:SS') AS FECHA_RADICACION
        , TO_CHAR(h1.HIST_FECH, 'DD/MM/YYYY HH24:MM:SS') AS FECHA_DIGITALIZACION
        , r.RADI_PATH HID_RADI_PATH{$seguridad}
        , an.RADI_NUME_SALIDA
        , TO_CHAR(an.ANEX_RADI_FECH, 'DD/MM/YYYY HH24:MM:SS') AS ANEX_RADI_FECH
        , TO_CHAR(an.ANEX_FECH_ENVIO, 'DD/MM/YYYY HH24:MM:SS') AS ANEX_FECH_ENVIO
        , TO_CHAR(an.FECHA_REC_REMI, 'DD/MM/YYYY HH24:MM:SS') AS FECHA_REC_REMI
        , t.SGD_TPR_TERMINO
        , t.SGD_TPR_DESCRIP
        , an.anex_radi_fech-r.RADI_FECH_RADI AS DIAS_TRAMITE
        , an.anex_fech_envio-r.RADI_FECH_RADI AS DIAS_TRAMITE_ENVIO
        , $dias_rad DIAS_RAD
        , (Select bod.nombre_de_la_empresa from BODEGA_EMPRESAS bod where bod.identificador_empresa=r.eesp_codi) Entidad
        , (Select bod1.nit_de_la_empresa from BODEGA_EMPRESAS bod1 where bod1.identificador_empresa=r.eesp_codi) NITENTIDAD
        FROM USUARIO b, HIST_EVENTOS h, SGD_TPR_TPDCUMENTO t
        , RADICADO r left outer join anexos an
        ON (R.RADI_NUME_RADI=an.ANEX_RADI_NUME ANd an.anex_estado>=3)
        left join HIST_EVENTOS h1 on r.RADI_NUME_RADI=h1.RADI_NUME_RADI and h1.SGD_TTR_CODIGO IN (22,42)
        WHERE
        r.tdoc_codi=t.sgd_tpr_codigo
        AND h.HIST_DOC_DEST=b.usua_doc
        $condicionE
        AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
        AND h.SGD_TTR_CODIGO in(2,9,12,16)
        AND TO_CHAR(r.radi_fech_radi,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin'
        $whereTipoRadicado ";
            if ($codEsp) {
                $queryEDetalle .= " AND r.EESP_CODI = $codEsp ";
            }

            $condicionUS = " AND b.USUA_CODI=$codUs
         AND b.depe_codi = '$depeUs' ";
            $orderE = " ORDER BY $orno $ascdesc";
            /** CONSULTA PARA VER TODOS LOS DETALLES
             */
            $queryETodosDetalle = $queryEDetalle . $orderE;
            $queryEDetalle .= $condicionUS . $orderE;
            break;
        }
    case 'postgres':{
        
        // Busca por dependencia
        if ($dependencia_busq != '99999') {
            $condicionE = " and r.radi_depe_actu='$dependencia_busq' ";
        }

        // Busca por usuario
        if($codus != 0){
            $condicionUsua = " and r.radi_usua_actu=$codus ";
        }

        // Busca por tipo de radicado
        if ($tipoRadicado != '') {
            $condicionTipoRad = " and r.radi_nume_radi like '%$tipoRadicado' ";
        }

        // Busca por tipo documental
        if($tipoDocumento != '9999' and $tipoDocumento != '9998' and $tipoDocumento != '9997'){
            $condicionTipoDoc = " and r.tdoc_codi = $tipoDocumento ";
        }

            $queryE = " 
                select 
                    d.depe_nomb as DEPENDENCIA_ACTUAL, 
                    B.usua_nomb as USUA_ACTUAL, 
                    count(DISTINCT(r.RADI_NUME_RADI)) RADICADOS,
                    B.usua_codi as USUA_CODI,
                    d.depe_codi as DEPE_CODI
                FROM radicado r 
                    inner join anexos a on r.radi_nume_radi=a.anex_radi_nume 
                    inner join dependencia d on r.radi_depe_actu=d.depe_codi 
                    inner join usuario B on r.radi_usua_actu=B.usua_codi and r.radi_depe_actu=B.depe_codi 
                    inner join sgd_tpr_tpdcumento tp on r.tdoc_codi=tp.sgd_tpr_codigo
                WHERE 
                    TO_CHAR(r.radi_fech_radi,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin' 
                    and a.radi_nume_salida is not null and a.radi_nume_salida <> '0' 
                    $condicionTipoDoc 
                    $condicionTipoRad 
                    $condicionE $condicionUsua ";

            $queryE .= " GROUP BY d.DEPE_NOMB, B.USUA_NOMB, B.usua_codi, d.depe_codi ORDER BY $orno $ascdesc ";
            // var_dump($queryE);
            
            /** CONSULTA PARA VER DETALLES **/
            //by skina
            $dias_rad = "date_part('days'," . $db->conn->sysTimeStamp . " -r.radi_fech_radi)";
            $queryEDetalle = "select 
                  r.RADI_NUME_RADI RADICADO
                , r.RA_ASUN ASUNTO
                , TO_CHAR(r.RADI_FECH_RADI, 'DD/MM/YYYY HH24:MM:SS') FECHA_RADICACION
                , r.RADI_PATH HID_RADI_PATH{$seguridad}
                , a.RADI_NUME_SALIDA
                , a.ANEX_RADI_FECH
                , a.ANEX_FECH_ENVIO
                , tp.SGD_TPR_TERMINO
                , tp.SGD_TPR_DESCRIP
                , a.anex_radi_fech-r.RADI_FECH_RADI DIAS_TRAMITE
                , a.anex_fech_envio-r.RADI_FECH_RADI DIAS_TRAMITE_ENVIO
                , $dias_rad DIAS_RAD
                , d.depe_nomb as DEPENDENCIA_ACTUAL
                , B.USUA_NOMB USUARIO_ACTUAL
                , (Select bod.nombre_de_la_empresa from BODEGA_EMPRESAS bod where bod.identificador_empresa=r.eesp_codi) Entidad
                , (Select bod1.nit_de_la_empresa from BODEGA_EMPRESAS bod1 where bod1.identificador_empresa=r.eesp_codi) NITENTIDAD   
            FROM radicado r 
                inner join anexos a on r.radi_nume_radi=a.anex_radi_nume 
                inner join dependencia d on r.radi_depe_actu=d.depe_codi 
                inner join usuario B on r.radi_usua_actu=B.usua_codi and r.radi_depe_actu=B.depe_codi 
                inner join sgd_tpr_tpdcumento tp on r.tdoc_codi=tp.sgd_tpr_codigo
            WHERE
                TO_CHAR(r.radi_fech_radi,'yyyy/mm/dd') BETWEEN '$fecha_ini'  AND '$fecha_fin' 
                and a.radi_nume_salida is not null and a.radi_nume_salida <> '0' 
                $condicionTipoDoc 
                $condicionTipoRad 
                $condicionE $condicionUsua ";
            
            $groupE = " GROUP BY r.radi_nume_radi, r.ra_asun, r.radi_fech_radi, R.SGD_SPUB_CODIGO, B.CODI_NIVEL, r.RADI_PATH, a.RADI_NUME_SALIDA, a.ANEX_RADI_FECH ,a.ANEX_FECH_ENVIO, tp.SGD_TPR_TERMINO, tp.SGD_TPR_DESCRIP, d.DEPE_NOMB, B.USUA_NOMB, B.usua_codi, d.depe_codi ORDER BY $orno $ascdesc ";
            $queryEDetalle .= $groupE;
            # var_dump($queryEDetalle); die();
        }break;
    case 'mssql':
    case 'mysql':{
            if ($dependencia_busq != '99999') {
                $condicionE = " AND h.DEPE_CODI_DEST='$dependencia_busq' AND b.DEPE_CODI='$dependencia_busq' ";
            }
            $queryE = "SELECT 
                  de.DEPE_NOMB as DEPENDENCIA_ACTUAL
                  , MIN(b.USUA_NOMB) USUARIO
                  , count(r.RADI_NUME_RADI) RADICADOS
                  , MIN(b.USUA_CODI) HID_COD_USUARIO
                  , MIN(b.depe_codi) HID_DEPE_USUA
            FROM RADICADO r, USUARIO b, HIST_EVENTOS h, SGD_TPR_TPDCUMENTO t
                left join dependencia de on r.radi_depe_actu=de.depe_codi
            WHERE
              h.HIST_DOC_DEST=b.usua_doc
              AND r.tdoc_codi=t.sgd_tpr_codigo
              $condicionE
              AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
              AND h.SGD_TTR_CODIGO in(2,9,12,16)
              AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin'
        $whereTipoRadicado  ";

            if ($codEsp) {
                $queryE .= " AND r.EESP_CODI = $codEsp ";
            }

            $queryE .= " GROUP BY de.DEPE_NOMB, b.USUA_LOGIN  ORDER BY $orno $ascdesc ";
            /** CONSULTA PARA VER DETALLES   */
            //by skina

            $dias_rad = "DATENAME(dw," . $db->conn->sysTimeStamp . " -r.radi_fech_radi)";
            $queryEDetalle = "SELECT
                      r.RADI_NUME_RADI RADICADO
                      , b.USUA_NOMB USUARIO_ACTUAL
                      , r.RA_ASUN ASUNTO
                      , " . $db->conn->SQLDate('Y/m/d H:i:s', 'r.RADI_FECH_RADI') . " FECHA_RADICACION
                      , " . $db->conn->SQLDate('Y/m/d H:i:s', 'h1.HIST_FECH') . " FECHA_DIGITALIZACION
                      , r.RADI_PATH HID_RADI_PATH{$seguridad}
                      , an.RADI_NUME_SALIDA
                      , an.ANEX_RADI_FECH
                      , an.ANEX_FECH_ENVIO
                      , an.FECHA_REC_REMI
                      , t.SGD_TPR_TERMINO
                      , t.SGD_TPR_DESCRIP
                      , an.anex_radi_fech-r.RADI_FECH_RADI DIAS_TRAMITE
                      , an.anex_fech_envio-r.RADI_FECH_RADI DIAS_TRAMITE_ENVIO
                      , $dias_rad DIAS_RAD
                      , (Select bod.nombre_de_la_empresa from BODEGA_EMPRESAS bod where bod.identificador_empresa=r.eesp_codi) Entidad
                      , (Select bod1.nit_de_la_empresa from BODEGA_EMPRESAS bod1 where bod1.identificador_empresa=r.eesp_codi) NITENTIDAD
                      , de.depe_nomb as DEPENDENCIA_ACTUAL
                FROM USUARIO b, HIST_EVENTOS h, SGD_TPR_TPDCUMENTO t
                      , RADICADO r left outer join anexos an
                      ON (R.RADI_NUME_RADI=an.ANEX_RADI_NUME ANd an.anex_estado>=3)
                       left join HIST_EVENTOS h1 on r.RADI_NUME_RADI=h1.RADI_NUME_RADI and h1.SGD_TTR_CODIGO IN (22,42)
                       left join dependencia de on r.radi_depe_actu=de.depe_codi
                WHERE
                      r.tdoc_codi=t.sgd_tpr_codigo
                      AND h.HIST_DOC_DEST=b.usua_doc
                      $condicionE
                      AND h.RADI_NUME_RADI=r.RADI_NUME_RADI
                      AND h.SGD_TTR_CODIGO in(2,9,12,16)
                      AND " . $db->conn->SQLDate('Y/m/d', 'r.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin'
                $whereTipoRadicado ";

            if ($codEsp) {
                $queryEDetalle .= " AND r.EESP_CODI = $codEsp ";
            }

            $condicionUS = " AND b.depe_codi = '$depeUs' ";
            $orderE = " ORDER BY $orno $ascdesc";
            /** CONSULTA PARA VER TODOS LOS DETALLES
             */
            $queryETodosDetalle = $queryEDetalle . $orderE;
            $queryEDetalle .= $condicionUS . $orderE;
        }break;
}
if (isset($_GET['genDetalle']) && $_GET['denDetalle'] = 1) {
    $titulos = array("#", "1#RADICADO", "2#ASUNTO", "3#FECHA RADICACI&Oacute;N", "4#RADICADO_SALIDA" ,"5#FECHA ENV&Iacute;O" ,"6#TIPO DOCUMENTO", "7#TERMINO", "8#DIAS DE RESPUESTA", "9#DIAS A ENVIO", "10#DEPENDENCIA ACTUAL", "11#USUARIO ACTUAL");
} else {
    $titulos = array("#", "1#Dependencia Actual", "2#Usuario Actual", "3#Radicados");
}

function pintarEstadistica($fila, $indice, $numColumna)
{
    global $ruta_raiz, $_POST, $_GET, $krd, $ambiente;

    if (isset($fila['USUARIO'])) {
        $dependencia = $fila['DEPENDENCIA_ACTUAL'];
        $usuario = $fila['USUA_ACTUAL'];
        $radicados = $fila['RADICADOS'];
        $hidCodUs = $fila['USUA_CODI'];
        $hidDepUsua = $fila['DEPE_CODI'];
    } else {
        $dependencia = $fila[0];
        $usuario = $fila[1];
        $radicados = $fila[2];
        $hidCodUs = $fila[3];
        $hidDepUsua = $fila[4];
    }

    $salida = "";
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $dependencia;
            break;
        case 2:
            $salida = $usuario;
            break;
        case 3:
            $datosEnvioDetalle = "tipoEstadistica=" . $_GET['tipoEstadistica'] . "&amp;genDetalle=1&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;tipoRadicado=" . $_GET['tipoRadicado'] . "&amp;tipoDocumento=" . $_GET['tipoDocumento'] . "&amp;codUs=" . $hidCodUs . "&amp;dependencia_busq=" . $hidDepUsua;
            //$datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&codExp=$codExp&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}&amp;krd={$krd}\"  target=\"detallesSec\" >" . $radicados . "</a>";
            break;
//        case 3:
        //            $salida = $fila['HOJAS_DIGITALIZADAS'];
        //            break;
        default:$salida = false;
    }
    return $salida;
}

//$db->conn->debug = true;
function pintarEstadisticaDetalle($fila, $indice, $numColumna)
{
    global $ruta_raiz, $encabezado, $krd, $ambiente;

    # print_r("<pre>");
    # print_r($fila);die();

    if (isset($fila['RADICADO'])) {
        $numRadicado = $fila['RADICADO'];
        $asnto = $fila['ASUNTO'];
        $fechRadica = $fila['FECHA_RADICACION'];
        $radiNumSal = $fila['RADI_NUME_SALIDA'];
        $anxRadiFech = $fila['ANEX_RADI_FECH'];
        $anxFechEnvi = $fila['ANEX_FECH_ENVIO']; 
        $sgdTprTerm = $fila['SGD_TPR_TERMINO'];
        $sgdTprDesc = $fila['SGD_TPR_DESCRIP'];
        $diasTerm = $fila['DIAS_TRAMITE'];
        $diasTraENvi = $fila['DIAS_TRAMITE_ENVIO'];
        $diasRad = $fila['DIAS_RAD'];
        $entidad = $fila['Entidad'];
        $nitEntidad = $fila['NITENTIDAD'];
        $dependencia_actual = $fila['DEPENDENCIA_ACTUAL'];
        $usuaActual = $fila['USUARIO_ACTUAL'];
    } else {

        $numRadicado = $fila[0];
        $usuario = $fila[1];
        $asnto = $fila[2];
        $fechRadica = $fila[3];
        $fechDigita = $fila[4];
        $radiPath = $fila[5];
        $radiNumSal = $fila[6];
        $anxRadiFech = $fila[7];
        $anxFechEnvi = $fila[8];
        $sgdTprTerm = $fila[9];
        $sgdTprDesc = $fila[10];
        $diasTerm = $fila[11];
        $diasTraENvi = $fila[12];
        $diasRad = $fila[13];
        $entidad = $fila[14];
        $nitEntidad = $fila[15];
        $dependencia_actual = $fila[16];
        $usuaActual = $fila[17];
    }

    $verImg = ($fila['SGD_SPUB_CODIGO'] == 1) ? ($usuaActual != $_SESSION['usua_nomb'] ? false : true) : ($fila['USUA_NIVEL'] > $_SESSION['nivelus'] ? false : true);
//    $numRadicado = $fila['RADICADO'];
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            if ($radiPath && $verImg)
            //$salida="<center><a href=\"{$ruta_raiz}bodega".$fila['HID_RADI_PATH']."\">".$fila['RADICADO']."</a>aaaa".$fila['HID_RADI_PATH']."vvvv</center>";
            {
                $salida = "<center><a href=\"$url_raiz/$ambiente/bodega/" . $radiPath . "\">" . $numRadicado . "</a></center>";
            } else {
                $salida = "<center class=\"leidos\">{$numRadicado}</center>";
            }

            break;
        case 2:
            $salida = "<center class=\"leidos\">" . $asnto . "</center>";
            break;
        case 3:
            if ($verImg) {
                $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $numRadicado . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" >" . $fechRadica . "</a>";
            } else {
                $salida = "<a class=\"vinculos\" href=\"#\" onclick=\"alert(\"ud no tiene permisos para ver el radicado\");\">" . $fechRadica . "</a>";
            }

            break;
        case 4:
            $salida = "<center class=\"leidos\">" . $radiNumSal . "</center>";
            break;
        case 5:
            $salida = "<center class=\"leidos\">" . $anxFechEnvi . "</center>";
            break;
        case 6:
            $salida = "<center class=\"leidos\">" . $sgdTprDesc . "</center>";
            break;
        case 7:
            $salida = "<center class=\"leidos\">" . $sgdTprTerm . "</center>";
            break;
        case 8:
            $salida = "<center class=\"leidos\">" . $diasTerm . "</center>";
            break;
        case 9:
            $salida = "<center class=\"leidos\">" . $diasTraENvi . "</center>";
            break;
        case 10:
            $salida = "<center class=\"leidos\">" . $dependencia_actual . "</center>";
            break;
        case 11:
            $salida = "<center class=\"leidos\">" . $usuaActual . "</center>";
            break;
    }
    return $salida;
}

//echo $queryEDetalle;
