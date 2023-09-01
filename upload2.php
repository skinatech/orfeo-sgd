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


/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


session_start();
/**
 * Modificacion Variables Globales Infometrika 2009-05
 * Licencia GNU/GPL 
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;


$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tpNumRad = $_SESSION["tpNumRad"];
$tpPerRad = $_SESSION["tpPerRad"];
$tpDescRad = $_SESSION["tpDescRad"];
$tipoRadicadoPqr = $_SESSION["tipoRadicadoPqr"];

$ruta_raiz = ".";

echo "<script>
    function f_close(){
   	window.opener.location.reload();
    	window.close();
    }
    </script>
";

/**
 * Retorna la cantidad de bytes de una expresion como 7M, 4G u 8K.
 *
 * @param char $var
 * @return numeric
 */
function return_bytes($val) {
    $val = trim($val);
    $ultimo = strtolower($val{strlen($val) - 1});
    switch ($ultimo) { // El modificador 'G' se encuentra disponible desde PHP 5.1.0
        case 'g': $val = floatval($val) * 1024;
        case 'm': $val = floatval($val) * 1024;
        case 'k': $val = floatval($val) * 1024;
    }
    return $val;
}

//$userfile1_Size = $_FILES['userfile1']['size'];
$userfile1 = $_FILES['userfile1']['name'];

if ((!$codigo && $_FILES['userfile1']['size'] == 0) || ($codigo && $_FILES['userfile1']['size'] >= return_bytes(ini_get('upload_max_filesize')))) {
    die("<table><tr><td>El tama&ntilde;o del archivo no es correcto.</td></tr><tr><td><li>se permiten archivos de " . ini_get('upload_max_filesize') . " m&aacute;ximo.</td></tr><tr><td><input type='button' value='cerrar' onclick='opener.regresar();window.close();'></td></tr></table>");
}
$fechaHoy = Date("Y-m-d");
if (!$ruta_raiz)
    $ruta_raiz = ".";
include_once("$ruta_raiz/class_control/anexo.php");
include_once("$ruta_raiz/class_control/anex_tipo.php");
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";
include("$ruta_raiz/include/tx/Historico.php");

session_start();
if (!isset($_SESSION['dependencia']))
    include "./rec_session.php";

$db = new ConnectionHandler($ruta_raiz);
//$db->conn->debug = true;

$sqlFechaHoy = $db->conn->OffsetDate(0, $db->conn->sysTimeStamp);
$anex = new Anexo($db);
$anexTip = new Anex_tipo($db);
$hist = new Historico($db);

if (!$aplinteg)
    $aplinteg = 'null';
if (!$tpradic)
    $tpradic = 'null';
if (!$cc) {
    error_reporting(7);
    session_start();
    if ($codigo)
        $nuevo = "no";
    else
        $nuevo = "si";

    /* Esto identifica si el documento que se esta cargando es confidencial */
    if ($sololect) {
        $auxsololect = "S";
        $auxrestringido = "1";
    } else {
        $auxsololect = "N";
        $auxrestringido = "0";
    }

    $db->conn->BeginTrans();
    if ($nuevo == "si") {
        $auxnumero = $anex->obtenerMaximoNumeroAnexo($numrad);
        do {
            $auxnumero += 1;
            $codigo = trim($numrad) . trim(str_pad($auxnumero, 5, "0", STR_PAD_LEFT));
        } while ($anex->existeAnexo($codigo));
    } else {
        $bien = true;
        $auxnumero = substr($codigo, -4);
        $codigo = trim($numrad) . trim(str_pad($auxnumero, 5, "0", STR_PAD_LEFT));
    }

    if ($radicado_salida) {
        $anex_salida = 1;
        $anex_radicado = 1;
    } else {
        $anex_salida = 0;
        $anex_radicado = 0;
    }

    $bien = "si";

    if ($bien and $tipo) {
        error_reporting(7);
        $ext = end(explode(".", $_FILES['userfile1']['name']));
        $ext = strtolower($ext);
        $auxnumero = str_pad($auxnumero, 5, "0", STR_PAD_LEFT);
        $archivo = trim($numrad . "_" . $auxnumero . "." . $ext);
        $archivoconversion = trim("1") . trim(trim($numrad) . "_" . trim($auxnumero) . "." . trim($ext));
    }

    if (!$radicado_rem)
        $radicado_rem = 7;
    if ($_FILES['userfile1']['size']) {
        $tamano = ($_FILES['userfile1']['size'] / 1000);
    } else {
        $tamano = 0;
    }

    $sql = "select "
            . "mrd.sgd_srd_codigo, "
            . "mrd.sgd_sbrd_codigo, "
            . "mrd.sgd_tpr_codigo, "
            . "rdf.radi_nume_radi "
            . "from sgd_rdf_retdocf rdf "
            . "inner join "
            . "sgd_mrd_matrird mrd on rdf.sgd_mrd_codigo=mrd.sgd_mrd_codigo "
            . "where "
            . "rdf.radi_nume_radi='$numrad'";

    $rs = $db->conn->query($sql);
    
    $tsub = null;
    $codserie = null;

    if (!$rs->EOF) {
        $tsub = $rs->fields['SGD_SBRD_CODIGO'];
        $codserie = $rs->fields['SGD_SRD_CODIGO'];
    }

    // fecha_rec_remi 

    if(!empty($_POST['fecha_rec_remi'])){
        $fecha_rec_remi = $_POST['fecha_rec_remi'];
    }

    // Indica si se cambio el estado del radicado de PQRS
    $cambiaEstado = false;

    if ($nuevo == "si") {

        include "$ruta_raiz/include/query/queryUpload2.php";

        if ($expIncluidoAnexo) {
            $expAnexo = $expIncluidoAnexo;
        } else {
            $expAnexo = null;
        }

        if(!empty($fecha_rec_remi)){

            $isql = "insert into anexos(sgd_rem_destino,anex_radi_nume,anex_codigo,anex_tipo,anex_tamano ,anex_solo_lect,anex_creador,anex_desc,anex_numero,anex_nomb_archivo,anex_borrado,anex_salida ,sgd_dir_tipo,anex_depe_creador,sgd_tpr_codigo,anex_fech_anex,SGD_APLI_CODI,SGD_TRAD_CODIGO, SGD_EXP_NUMERO, sgd_srd_codigo,sgd_sbrd_codigo,fecha_rec_remi, anex_radicado)
            values ($radicado_rem ,'$numrad','$codigo',$tipo,$tamano,'$auxsololect','$krd','$descr',$auxnumero ,'$archivoconversion','N',$anex_salida,$radicado_rem,'$dependencia',$tdoc,$sqlFechaHoy, $aplinteg,$tpradic,'$expAnexo','$codserie','$tsub', '$fecha_rec_remi', $anex_radicado) ";
       
        }else{

            $isql = "insert into anexos(sgd_rem_destino,anex_radi_nume,anex_codigo,anex_tipo,anex_tamano ,anex_solo_lect,anex_creador,anex_desc,anex_numero,anex_nomb_archivo,anex_borrado,anex_salida ,sgd_dir_tipo,anex_depe_creador,sgd_tpr_codigo,anex_fech_anex,SGD_APLI_CODI,SGD_TRAD_CODIGO, SGD_EXP_NUMERO, sgd_srd_codigo,sgd_sbrd_codigo, anex_radicado, anexo_combinar_correspondencia)
            values ($radicado_rem ,'$numrad','$codigo',$tipo,$tamano,'$auxsololect','$krd','$descr',$auxnumero ,'$archivoconversion','N',$anex_salida,$radicado_rem,'$dependencia',$tdoc,$sqlFechaHoy, $aplinteg,$tpradic,'$expAnexo','$codserie','$tsub', $anex_radicado, $radicado_rem) ";
       
        }
     
        $subir_archivo = "si ...";

        $anexRadi = "select count(anex_codigo) as cantidad from anexos where anex_radi_nume='$numrad'";
        $consulta = $db->query($anexRadi);
       
        /**  
         * Si el tipo de radicado es de PQRS y el radicado no tiene ningun anexo se procede a cambiar $cambiaEstado = true
         * para indicar que si va a actualizar el estado del radicado
        **/
        $tipoRadi = substr($numrad, -1, 1);
        if($consulta->fields['CANTIDAD'] == '0' && ($tipoRadi == $tipoRadicadoPqr or $tipoRadi == 2)){
            $cambiaEstado = true;
        }else{
            $cambiaEstado = false;
        }

    } else {
        if ($userfile1)
            $subir_archivo = " anex_nomb_archivo='1$archivo',anex_tamano = $tamano,anex_tipo=$tipo, ";
        else {
            $subir_archivo = "";
        }

        if(!empty($fecha_rec_remi)) {
            $isql = "update anexos set $subir_archivo anex_salida=$anex_salida,sgd_rem_destino=$radicado_rem,sgd_dir_tipo=$radicado_rem,anex_desc='$descr', SGD_TRAD_CODIGO = $tpradic, SGD_APLI_CODI = $aplinteg ,sgd_srd_codigo='$codserie', sgd_sbrd_codigo='$tsub',sgd_tpr_codigo=$tdoc, fecha_rec_remi='$fecha_rec_remi'  where anex_codigo='$codigo'";
        } else {
            $isql = "update anexos set $subir_archivo anex_salida=$anex_salida,sgd_rem_destino=$radicado_rem,sgd_dir_tipo=$radicado_rem,anex_desc='$descr', SGD_TRAD_CODIGO = $tpradic, SGD_APLI_CODI = $aplinteg ,sgd_srd_codigo='$codserie', sgd_sbrd_codigo='$tsub',sgd_tpr_codigo=$tdoc where anex_codigo='$codigo'";
        }
       
        $subir_archivo = "si ...";
        $cambiaEstado = false;
    }

    //$db->conn->debug=true;
    $bien = $db->query($isql);

    if ($bien) { //Si actualizo BD correctamente

        // Si el cambio de estado es true se procede a cambiar el estado del radicado, se inserta en el historico
        if($cambiaEstado == true){
            $updateRad  = "update radicado set radi_estado_pqrs=3 where radi_nume_radi='$numrad'";
            $bienUpdate = $db->query($updateRad);
            $radicadosSel[0] = $numrad;
            $codTx = 69;
            $observacionRad = 'Se actualizó el estado del radicado a <b>"En tramite"</b>, ya se cargó el formato de respuesta.';

            $hist->insertarHistorico($radicadosSel, $dependencia, $codusuario, $dependencia, $codusuario, $observacionRad, $codTx);
        }

        $respUpdate = "OK";
        $bien2 = false;
        if ($subir_archivo) {

            // By Skinatech - 14/08/2018
            // Para la construcción del número de radicado, esto indica la parte inicial del radicado.
            if ($estructuraRad == 'ymd') {
                $num = 8;
            } elseif ($estructuraRad == 'ym') {
                $num = 6;
            } else {
                $num = 4;
            }

            $directorio = "./bodega/" . substr(trim($archivo), 0, 4) . "/" . strtoupper(substr(trim($archivo), $num, $longitud_codigo_dependencia)) . "/docs/";
            $userfile1_Temp = $_FILES['userfile1']['tmp_name'];

            $bien2 = move_uploaded_file($userfile1_Temp, $directorio . trim($archivoconversion));
            if ($bien2) { //Si intento anexar archivo y Subio correctamente

                $sqlUsuarioRadicado = "select ra.radi_usua_actu, ra.radi_depe_actu, us.usua_login, us.usua_email from radicado ra inner join usuario us ON (ra.radi_usua_actu=us.usua_codi and ra.radi_depe_actu=us.depe_codi) where radi_nume_radi ='".$numrad."'";
                $siNotifica = $db->conn->query($sqlUsuarioRadicado);

                if($krd != $siNotifica->fields['USUA_LOGIN']){
                    include $dir_raiz.'/mailGeneral.php';
                }

                $resp1 = "OK";
                $db->conn->CommitTrans();

                try {
                    /* Se elimina el anexo en la tabla datos ocr y se agrega
                     * este al listado de documentos a eliminar
                     */
                    $existeIndice = $db->conn->query("select indice from datosocr where nume_radi='$codigo'");
                    if (!$existeIndice->EOF && $existeIndice->fields[0] != '') {
//                            error_log("#### Supresion indice anexo  -> ". $codigo );  
//                            error_log("#### Indice a suprimir ". $existeIndice->fields[0] );
                        $queryEliminaIndice = "delete from datosocr where indice='" . $existeIndice->fields[0] . "' ";
                        $queryColaEliminaIndice = "insert into sphinx_index_remove "
                                . "(indice,estado,fecha_creacion,identificador) values "
                                . "(" . $existeIndice->fields[0] . ",1,'" . date('Y-m-d H:i:s') . "','" . $codigo . "')";

                        $db->conn->execute($queryEliminaIndice);
                        $db->conn->execute($queryColaEliminaIndice);
                    }
                } catch (Exception $ex) {
//                        error_log("#### Error ejecutando supresión de indice". $ex );
                }
            } else {
                $resp1 = "ERROR";
                $db->conn->RollbackTrans();
            }
        } else {
            $db->conn->CommitTrans();
        }
    } else {
        $db->conn->RollbackTrans();
    }
//    }    
}
include "nuevo_archivo.php";
?>
