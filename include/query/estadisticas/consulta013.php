<?php

$coltp3Esp = '"' . $tip3Nombre[3][2] . '"';
if (!$orno)
    $orno = 2;

if ($_GET['dependencia_busq'] != '99999')
    $subconsEs = " WHERE SE.DEPE_CODI='" . $_GET['dependencia_busq'] . "'";
else
    $subconsEs = "WHERE SE.DEPE_CODI <> '99999'";

//Skina se agrega validacion por usuario
if ($_GET['usua_doc'] != '')
    $subconsUs = "AND  SE.USUA_DOC='" . $_GET['usua_doc'] . "'";
else
    $subconsUs = "";

$queryE = "
select 
    B.USUA_NOMB,
    D.DEPE_NOMB,
    COUNT(*) AS EXPEDIENTES, 
    B.USUA_CODI as HID_COD_USUARIO, 
    SE.DEPE_CODI,
    B.USUA_DOC 
from 
    USUARIO B 
    INNER JOIN SGD_SEXP_SECEXPEDIENTES SE ON B.USUA_DOC=SE.USUA_DOC
    INNER JOIN DEPENDENCIA D ON SE.DEPE_CODI=D.DEPE_CODI
$subconsEs 
$subconsUs
group by SE.DEPE_CODI,B.USUA_DOC, B.USUA_NOMB, B.USUA_CODI, D.DEPE_NOMB ";

$queryEDetalle = "
select 
    distinct SE.SGD_EXP_NUMERO, 
    B.USUA_CODI as HID_COD_USUARIO, 
    SRD.SGD_SRD_DESCRIP, 
    SBRD.SGD_SBRD_DESCRIP, 
    D.DEPE_NOMB, 
    SE.SGD_SEXP_FECH, 
    SE.SGD_EXP_FECH_ARCH, 
    B.USUA_NOMB, 
    SE.SGD_EXP_PRIVADO,
    SE.sgd_sexp_parexp1
from 
    SGD_SEXP_SECEXPEDIENTES SE 
    JOIN USUARIO B ON B.USUA_DOC=SE.USUA_DOC 
    JOIN SGD_SRD_SERIESRD SRD ON SE.SGD_SRD_CODIGO=SRD.SGD_SRD_CODIGO 
    JOIN SGD_SBRD_SUBSERIERD SBRD ON SE.SGD_SBRD_CODIGO=SBRD.SGD_SBRD_CODIGO AND SE.SGD_SRD_CODIGO=SBRD.SGD_SRD_CODIGO 
    JOIN DEPENDENCIA D ON SE.DEPE_CODI=D.DEPE_CODI 
	$subconsEs 
    $subconsUs
";

if (isset($_GET['genDetalle']) && $_GET['genDetalle'] == 1) {
    $titulos = array("#", "1#EXPEDIENTE", "2#SERIE", "3#SUBSERIE ", "4#FECHA EXPEDIENTE", "5#NOMBRE EXPEDIENTE", "6#USUARIO CREADOR", "7#FECHA ARCHIVADO");
} else {
    $titulos = array("#", "1#USUARIO CREADOR", "2#DEPENDENCIA CREADORA", "3#NUMERO DE EXPEDIENTES");
}

function pintarEstadistica($fila, $indice, $numColumna) {
    global $ruta_raiz, $_GET, $_GET, $ambiente;

        $usuaNomb = $fila['USUA_NOMB'];
        $expedientes = $fila['EXPEDIENTES'];
        $hidCodUsua = $fila['HID_COD_USUARIO'];
        $depeCodi = $fila['DEPE_CODI'];
        $usuaDoc = $fila['USUA_DOC'];
        $nombDepe = $fila['DEPE_NOMB'];
    
    $salida = "";
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $usuaNomb;
            break;
        case 2:
            $salida = $nombDepe;
            break;
        case 3:
            //Modificado skina 090609 $genDetalle=(isset($fila['USUA_NOMB']))?1:0;
            $dependecia = isset($depeCodi) ? $depeCodi : $_GET['dependencia_busq'];
            $datosEnvioDetalle = "tipoEstadistica=" . $_REQUEST['tipoEstadistica'] . "&amp;genDetalle=1&amp;usua_doc=" . urlencode($usuaDoc) . "&amp;dependencia_busq=" . $dependecia . "&amp;fecha_ini=" . $_GET['fecha_ini'] . "&amp;fecha_fin=" . $_GET['fecha_fin'] . "&amp;tipoRadicado=" . $_GET['tipoRadicado'] . "&amp;tipoDocumento=" . $_GET['tipoDocumento'] . "&amp;codUs=" . $hidCodUsua . "&amp;depeUs=" . $fila['HID_DEPE_USUA'];
            $datosEnvioDetalle = (isset($_GET['usActivos'])) ? $datosEnvioDetalle . "&amp;usActivos=" . $_GET['usActivos'] : $datosEnvioDetalle;
            $salida = "<a href=\"genEstadistica.php?{$datosEnvioDetalle}&amp;krd={$krd}\" target=\"detallesSec\" >" . $expedientes . "</a>";
            break;
        default: $salida = false;
    }
    return $salida;
}

function pintarEstadisticaDetalle($fila, $indice, $numColumna) {
    global $ruta_raiz, $encabezado, $krd, $ambiente;

        $sgdExpNumero = $fila['SGD_EXP_NUMERO'];
        $hidCodUsuario = $fila['HID_COD_USUARIO'];
        $sgdSrdDescrip = $fila['SGD_SRD_DESCRIP'];
        $sgdSrdBdDescrip = $fila['SGD_SBRD_DESCRIP'];
        $depeNomb = $fila['DEPE_NOMB'];
        $sgdSexpFech = $fila['SGD_SEXP_FECH'];
        $sgdExpFechArch = $fila['SGD_EXP_FECH_ARCH'];
        $usuaNomb = $fila['USUA_NOMB'];
        $sgdPrivado = $fila['SGD_EXP_PRIVADO'];
        $sgd_sexp_parexp1 = $fila['SGD_SEXP_PAREXP1'];
    
    $verImg = ($fila['SGD_SPUB_CODIGO'] == 1) ? ($usuaNomb != $_SESSION['usua_nomb'] ? false : true) : ($fila['USUA_NIVEL'] > $_SESSION['nivelus'] ? false : true);
    $verImg = $verImg && ($sgdPrivado != 1);
    $numRadicado = $fila['RADI_NUME_RADI'];
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $salida = "<center class=\"leidos\">" . $sgdExpNumero . "</center>";
            break;
        case 2:
            $salida = $salida = "<center class=\"leidos\">" . $sgdSrdDescrip . "</center>";
            break;
        case 3:
            $salida = $salida = "<center class=\"leidos\">" . $sgdSrdBdDescrip . "</center>";
            break;
        case 4:
            $salida = "<center class=\"leidos\">" . $sgdSexpFech . "</center>";
            break;
        case 5:
            $salida = "<center class=\"leidos\">" . $sgd_sexp_parexp1 . "</center>";
            break;
        case 7:
            $salida = "<center class=\"leidos\">" . $sgdExpFechArch . "</center>";
            break;
        case 6:
            $salida = "<center class=\"leidos\">" . $usuaNomb . "</center>";
            break;
    }
    return $salida;
}

?>
