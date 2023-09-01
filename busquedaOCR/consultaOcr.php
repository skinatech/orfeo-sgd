<?php

/**
 * Vista busquedas OCR
 * @autor Skinatech 
 * @fecha 2017/03
 */
session_start();
$dir_raiz = $_SESSION['dir_raiz'];
$tiposDocumentos = array();

if (empty($_SESSION)) {
    reportarErrores("Error de permisos: No se encuentran datos del usuario");
}

include('sphinxapi.php');
//include_once "$dir_raiz/include/db/ConnectionHandler.php";
include_once "../include/db/ConnectionHandler.php";

$cl = new SphinxClient();
$cl->SetServer("localhost", 9312);
$cl->SetMatchMode(SPH_MATCH_ANY);
$cl->SetMaxQueryTime(5000);
$cl->SetLimits(0, 200);

/* Consulto id's de tipos documentales prmitidos para este usuario */
$db = new ConnectionHandler("$dir_raiz");
$consultaTipo = "select cod_tp_tpdcumento from rol_tipos_doc where cod_rol=" . $_SESSION['rol'];
$resultTipo = $db->conn->execute($consultaTipo)->getRows();

if (count($resultTipo) == 0) {
    reportarErrores("Error de permisos: No se detectaron tipos de documentos habilitados para este usuario");
}

/* Formateo los id's de los tipos documentales como arreglo que servirá de filtro
 * para las busquedas que realiza sphinx
 */
foreach ($resultTipo as $tipoDoc) {
    $tiposDocumentos[] = $tipoDoc[0];
}

//error_log("OCR filtros user ".$_SESSION['rol']." : " . implode(' or tdoc_codi = ', $tiposDocumentos));

//Se establece como filtro de aceptación, solo los registros que esten dentro de los id's de tipos documentales aceptados
$cl->SetFilter("tipo_doc", $tiposDocumentos);
//$result = $cl->Query($_POST['word'], 'orfeo_ocr'); //Primer campo (parametro a buscar) Segundo campo (indice creado).

if ($result === false) {
    reportarErrores("Fallo en Query: " . $cl->GetLastError());
} else {
    /* Mensajes de alertas afectar formato de respuesta ajax
     *    if ($cl->GetLastWarning()) {
     *        echo "WARNING: " . $cl->GetLastWarning();
     *      }
     */

    $resultados = array('data' => array());

    foreach ($result["matches"] as $i => $match) {

        $padreRadi = (empty($match['attrs']['radi_nume_deri'])) ? $match['attrs']['numero_radicado'] : $match['attrs']['radi_nume_deri'];
        $dataTexto = $match['attrs']['ocr'];
        $texto = str_replace(array("\r\n", "\r", "\n", "\\r", "\\n", "\\r\\n"), "<br>", htmlspecialchars($dataTexto));
        $asunto = $match['attrs']['anex_desc'];

        $resultados['data'][] = array(
            "data2" => array(
                'num' => $match['attrs']['numero_radicado'], 'pNum' => $padreRadi,
                "tipoDoc" => (string) $match['attrs']['tipo'],
                "texto" => $texto, "padreRad" => $padreRadi,
                "fechaRad" => $match['attrs']['fecha_radi'],
                "depeRadi" => $match['attrs']['radi_depe_radi'],
                "tipoRadi" => (string) $match['attrs']['tipo_radi'],
                "asunto" => $asunto
            )
        );
    }
    echo json_encode($resultados);
}

function reportarErrores($error) {
    header('HTTP/1.0 500 Internal Server Error');
    error_log("Búsqueda OCR error: " . $error);
    die(json_encode($error));
}
