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

/* * ***************************************************************************** */
/* DESCRIPCION: Funciones para visualizar los registros correpondientes a los         */
/* 					  archivados.																 */
/* FECHA: 17 de Agosto de 2007																 */
/* AUTOR: Secretar�a de Gobierno Distrital												 */
/* * ****************************************************************************** */


function pintarEstadistica($fila, $indice, $numColumna) {
    global $dir_raiz, $_POST, $_GET, $krd, $ambiente;
    if (isset($fila['USUARIO'])) {
        $usuario = $fila['USUARIO'];
        $numfolios = $fila['NUMERO_FOLIOS'];
        $hidusadoc = $fila['HID_USUA_DOC'];
        $radicados = $fila['RADICADOS'];
    } else {
        $usuario = $fila[0];
        $numfolios = $fila[4];
        $hidusadoc = $fila[2];
        $radicados = $fila[1];
    }

    $salida = "";
    switch ($numColumna) {
        case 0:
        $salida = $usuario;
            break;
        case 1:
            $salida = $numfolios;
            break;
        case 2:
            $datosEnvioDetalle = "tipoReporte=1&amp;genDetalle=1&amp;usua_doc=" . urlencode($hidusadoc) . "&amp;dependencia_busq=" . $_POST['dependencia_busq'] . "&amp;fechaIni=" . $_POST['fechaIni'] . "&amp;fechaInif=" . $_POST['fechaInif'] . "&amp;trad=" . $_POST['trad'] . "&amp;tipoDocumento=" . $_POST['tipoDocumento'] . "&amp;codUs=" . $hidusadoc . "&amp;arch=" . $_POST['arch'];
            $datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"../estadisticas/genEstadistica.php?{$datosEnvioDetalle}&amp;krd={$krd}\"  target=\"detallesSec\" aria-label=\"Abrir el reporte detallado de los radicados encontrados para este usuario\" >" . $radicados . "</a>";
           break;
        default: $salida = false;
    }
    return $salida;
}

function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $dir_raiz, $_POST, $_GET, $krd, $ambiente, $encabezado;
    $verImg = ($fila['SGD_SPUB_CODIGO'] == 1) ? ($fila['USUARIO'] != $_SESSION['usua_nomb'] ? false : true) : ($fila['USUA_NIVEL'] > $_SESSION['nivelus'] ? false : true);
    
    if (isset($fila['USUARIO'])) {
        $usuario = $fila['USUARIO'];
        $numfolios = $fila['NUMERO_FOLIOS'];
        $radicados = $fila['RADICADOS'];
        $hidradipath = $fila['HID_RADI_PATH'];
        $fecharadica = $fila['FECHA_RADICACION'];
        $fechaarchivo = $fila['FECHA_ARCHIVO'];
        $dependencia = $fila['DEPENDENCIA'];
        $expediente = $fila['EXPEDIENTE'];
    } else {
        $radicados = $fila[0];
        $hidradipath = $fila[1];
        $fecharadica = $fila[2];
        $fechaarchivo = $fila[3];
        $usuario = $fila[4];
        $dependencia = $fila[5];
        $numfolios = $fila[6];
        $expediente = $fila[7];
    }
    
    $numRadicado = $fila['RADICADO'];
    switch ($numColumna) {
        case 0:
        //$salida=$indice;
        if ($hidradipath && $verImg)
        $salida = "<center><a href=\"{$url_raiz}bodega" . $hidradipath . "\" aria-label=\"Abrir Documentos del radicado\">" . $radicados . "</a></center>";
        else
        $salida = "<center class=\"leidos\">{$numRadicado}</center>";
        break;
        case 1:
            if ($_GET['arch'] != 1) {
                if ($verImg) {
                    $salida = "<a class=\"vinculos\" href=\"$url_raiz/$ambiente/verradicado.php?verrad=" . $radicados . "&amp;" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;carpeta=8&amp;nomcarpeta=Busquedas&amp;tipo_carp=0 \" aria-label=\"Abrir informaci�n del radicado\" >" . $fecharadica . "</a>";
                } else {
                    $salida = "<a class=\"vinculos\" href=\"#\" onclick=\"alert(\"ud no tiene permisos para ver el radicado\");\" aria-label=\"Abrir informacion del radicado\">" . $fecharadica . "</a>";
                }
            } else {
                $salida = "<center class=\"leidos\">" . $fecharadica . "</center>";
            }
            break;
        case 2:
            if ($_GET['arch'] != 1) {
                $salida = "<a class=\"vinculos\" href=\"{$dir_raiz}archivo/datos_expediente.php?" . session_name() . "=" . session_id() . "&amp;krd=" . $_GET['krd'] . "&amp;nomcarpeta=Expedientes&amp;num_expediente=" . $expediente . "&amp;ent=1&amp;nurad=" . $radicados . "\">" . $fechaarchivo . "</a>";
            } else {
                $salida = "<center class=\"leidos\">" .$fechaarchivo . "</center>";
                ;
            }
            break;
        case 3:
            $salida = "<center class=\"leidos\">" . $usuario . "</center>";
            break;
        case 4:
            $salida = "<center class=\"leidos\">" . $dependencia . "</center>";
            break;
        case 5:
            $salida = "<center class=\"leidos\">" . $numfolios . "</center>";
            break;
    }
    return $salida;
}

?>
