<?php
session_start();
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];
/* ---------------------------------------------------------+
|                       MAIN                               |
+--------------------------------------------------------- */
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";
foreach ($_GET as $key => $valor) {${$key} = $valor;}
foreach ($_POST as $key => $valor) {${$key} = $valor;}

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];

$numrad = $_POST['numeroradicado'];
$observa = $_POST['observa'];
$tdoc = $_POST['tdoc'];

$fechaHoy = Date("Y-m-d");

include_once "$dir_raiz/class_control/anexo.php";
include_once "$dir_raiz/class_control/anex_tipo.php";
if (!isset($_SESSION['dependencia'])) {
    include "./rec_session.php";
}

$db = new ConnectionHandler($dir_raiz);
$sqlFechaHoy = $db->conn->OffsetDate(0, $db->conn->sysTimeStamp);
$anex = new Anexo($db);
//$db->conn->debug = true;

/**
 * Retorna la cantidad de bytes de una expresion como 7M, 4G u 8K.
 * @param char $var
 * @return numeric
 */
function return_bytes($val)
{
    $val = trim($val);
    $ultimo = strtolower($val{strlen($val) - 1});
    switch ($ultimo) { // El modificador 'G' se encuentra disponible desde PHP 5.1.0
        case 'g':$val *= 1024;
        case 'm':$val *= 1024;
        case 'k':$val *= 1024;
    }
    return $val;
}

?>
<html>
    <head>
        <title>Realizar Transaccion - Orfeo </title>
        <link href="<?=$url_raiz . $ESTILOS_PATH2?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?=$url_raiz . $_SESSION['ESTILOS_PATH_ORFEO']?>">
    </head>
    <?php
    /* Genreamos el encabezado que envia las variable a la paginas siguientes.*/
    $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion";
    $causaAccion = "Asociar Anexo Radicado";
    ?>
    <body>
        <br>
        <?php
        $db->conn->BeginTrans();
        $auxnumero = $anex->obtenerMaximoNumeroAnexo($numrad);
        do {
            $auxnumero += 1;
            $codigo = trim($numrad) . trim(str_pad($auxnumero, 5, "0", STR_PAD_LEFT));
        } while ($anex->existeAnexo($codigo));

        $anex_salida = 0;
        $bien = "si";

        if ($bien) {
            error_reporting(7);
            $ext = end(explode(".", $_FILES['upload']['name']));
            $ext = strtolower($ext);
            $auxnumero = str_pad($auxnumero, 5, "0", STR_PAD_LEFT);
            $archivo = trim($numrad . "_" . $auxnumero . "." . $ext);
            $archivoconversion = trim("1") . trim(trim($numrad) . "_" . trim($auxnumero) . "." . trim($ext));
        }

        if (!$radicado_rem) { $radicado_rem = 7; }

        if ($_FILES['upload']['size']) {
            $tamano = ($_FILES['upload']['size'] / 1000);
        } else {
            $tamano = 0;
        }

        $sql = "select mrd.sgd_srd_codigo, mrd.sgd_sbrd_codigo, mrd.sgd_tpr_codigo, rdf.radi_nume_radi from sgd_rdf_retdocf rdf inner join sgd_mrd_matrird mrd on rdf.sgd_mrd_codigo=mrd.sgd_mrd_codigo where rdf.radi_nume_radi='$numrad'";
        $rs = $db->conn->query($sql);

        $tsub = null;
        $codserie = null;

        if (!$rs->EOF) {
            $tsub = $rs->fields['SGD_SBRD_CODIGO'];
            $codserie = $rs->fields['SGD_SRD_CODIGO'];
        }

        include "$dir_raiz/include/query/queryUpload2.php";
        if ($expIncluidoAnexo) {
            $expAnexo = $expIncluidoAnexo;
        } else {
            $expAnexo = null;
        }
        $isql = "insert into anexos(sgd_rem_destino,anex_radi_nume,anex_codigo,anex_tipo,anex_tamano ,anex_solo_lect,anex_creador,anex_desc,anex_numero,anex_nomb_archivo,anex_borrado,anex_salida ,sgd_dir_tipo,anex_depe_creador,sgd_tpr_codigo,anex_fech_anex,SGD_APLI_CODI,SGD_TRAD_CODIGO, SGD_EXP_NUMERO, sgd_srd_codigo,sgd_sbrd_codigo, radi_nume_salida) ";
        $isql .= "values ($radicado_rem ,'$numrad','$codigo',7,$tamano,'1','$krd','$observa',$auxnumero ,'$archivoconversion','N',$anex_salida,$radicado_rem,'$dependencia',$tdoc, $sqlFechaHoy, null, null,'$expAnexo','$codserie','$tsub',0) ";
         
        $subir_archivo = "si ...";

        $bien = $db->query($isql);

        // Cambio realizado para proelectrica, consta de enviar notificación de correo cuando se asocia una imagen firmada por el remitente cuando es entregado el documento
        $sql = 'SELECT RADI_DEPE_ACTU as "DEPENDENCIA", RADI_NUME_RADI as "RADICADO", RADI_USUA_ACTU AS "USUARIO" FROM RADICADO WHERE RADI_NUME_RADI=\'' . $numrad . "'";
        $rs = $db->conn->query($sql);

        if ($bien) { //Si actualizo BD correctamente
            $respUpdate = "OK";
            $bien2 = false;

            if ($subir_archivo) {

                /** Guardar en el historico del radicado el proceso de carga de anexo */
                $sgd_ttr_codigo = 29;
                $infoUsua = "select usua_doc, usua_codi from usuario where usua_login='$krd'";
                $rsInfoUsua = $db->conn->query($infoUsua);
                $usuaCodi = $rsInfoUsua->fields['USUA_CODI'];
                $usuaDoc = $rsInfoUsua->fields['USUA_DOC'];

                $insertHistorico = "insert into HIST_EVENTOS(RADI_NUME_RADI, DEPE_CODI, USUA_CODI, USUA_CODI_DEST, DEPE_CODI_DEST, USUA_DOC, HIST_DOC_DEST, HIST_FECH, SGD_TTR_CODIGO, HIST_OBSE)";
                $insertHistorico .= "values('$numrad','$dependencia',$usuaCodi, '$dependencia', $usuaCodi, $usuaDoc, $usuaDoc, ".$db->conn->OffsetDate(0, $db->conn->sysTimeStamp).", $sgd_ttr_codigo, '$observa')";
                $rsInsertarHistorico = $db->conn->query($insertHistorico);

                // By Skinatech - 14/08/2018
                // Para la construcción del número de radicado, esto indica la parte inicial del radicado.
                if ($estructuraRad == 'ymd') {
                    $num = 8;
                } elseif ($estructuraRad == 'ym') {
                    $num = 6;
                } else {
                    $num = 4;
                }

                $directorio = $dir_raiz."/bodega/" . substr(trim($archivo), 0, 4) . "/" . strtoupper(substr(trim($archivo), $num, $longitud_codigo_dependencia)) . "/docs/";
                $userfile1_Temp = $_FILES['upload']['tmp_name'];

                $bien2 = move_uploaded_file($userfile1_Temp, $directorio . trim($archivoconversion));
                if ($bien2) {

                    /** Se consulta la información del usuario actual del radicado  */
                    $usuaCodi = $rs->fields['USUARIO'];
                    $depeActu = $rs->fields['DEPENDENCIA'];

                    $consultaUsuario = "select usua_codi, depe_codi, usua_doc from usuario where usua_codi=$usuaCodi and depe_codi='$depeActu'";
                    $rsConsUsuario = $db->conn->query($consultaUsuario);
                    $usuaDoc = $rsConsUsuario->fields['USUA_DOC'];

                    /** Se inserta en el historico del radicado el proceso de carga de anexo al radicado por ventanilla de radicación */
                    $sgd_ttr_codigo = 29;
                    $hist_obse = 'Se adjunto el anexo al radicado, '.$observa;
        
                    $insertHistorico = "insert into HIST_EVENTOS(RADI_NUME_RADI, DEPE_CODI, USUA_CODI, USUA_CODI_DEST, DEPE_CODI_DEST, USUA_DOC, HIST_DOC_DEST, HIST_FECH, SGD_TTR_CODIGO, HIST_OBSE)";
                    $insertHistorico .= "values('$numrad','$dependencia',$codusuario, $usuaCodi, '$depeActu', $usua_doc, $usuaDoc, ".$db->conn->OffsetDate(0, $db->conn->sysTimeStamp).", $sgd_ttr_codigo, '$hist_obse')";
                    $rsInsertarHistorico = $db->conn->query($insertHistorico);

                    $sqlUsuarioRadicado = "select ra.radi_usua_actu, ra.radi_depe_actu, us.usua_login, us.usua_email from radicado ra inner join usuario us ON (ra.radi_usua_actu=us.usua_codi and ra.radi_depe_actu=us.depe_codi) where radi_nume_radi ='" . $numrad . "'";
                    $siNotifica = $db->conn->query($sqlUsuarioRadicado);

                    $resp1 = "OK";
                    $db->conn->CommitTrans();

                    try {
                        /* Se elimina el anexo en la tabla datos ocr y se agrega
                        * este al listado de documentos a eliminar
                        */
                        $existeIndice = $db->conn->query("select indice from datosocr where nume_radi='$codigo'");
                        if (!$existeIndice->EOF && $existeIndice->fields[0] != '') {
                            $queryEliminaIndice = "delete from datosocr where indice='" . $existeIndice->fields[0] . "' ";
                            $queryColaEliminaIndice = "insert into sphinx_index_remove "
                            . "(indice,estado,fecha_creacion,identificador) values "
                            . "(" . $existeIndice->fields[0] . ",1,'" . date('Y-m-d H:i:s') . "','" . $codigo . "')";

                            $db->conn->execute($queryEliminaIndice);
                            $db->conn->execute($queryColaEliminaIndice);
                        }
                    } catch (Exception $ex) {
                        //error_log("#### Error ejecutando supresión de indice". $ex );
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

        $radi = isset($rs->fields['radicado']) ? $rs->fields['radicado'] : $rs->fields['RADICADO'];
        $depe = isset($rs->fields['dependencia']) ? $rs->fields['dependencia'] : $rs->fields['DEPENDENCIA'];
        $usua = isset($rs->fields['usuario']) ? $rs->fields['usuario'] : $rs->fields['USUARIO'];
        ?>
        <center>
            <div id="titulo" style="width: 60%;" align="center">Acci&oacute;n requerida --> <?=$causaAccion?> </div>
            <table cellspace=2 WIDTH=60% id=tb_general border="1" class="borde_tab">
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">acci&oacute;n requerida:</td>
                    <td width="65%" height="25" class="listado2"> Asociaci&oacute;n de anexo a radicado </td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Confirmación :
                    </td>
                    <td  width="65%" height="25" class="listado2">Se envio notificación al usuario actual del radicado registrado con el correo <b> <?=$siNotifica->fields['USUA_EMAIL']?> </b> 
                    </td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Radicados involucrados:</td>
                    <td width="65%" height="25" class="listado2"><?=$numrad?></td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Fecha y hora:</td>
                    <td width="65%" height="25" class="listado2"><?=date("m-d-Y  H:i:s")?></td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Usuario origen:</td>
                    <td width="65%" height="25" class="listado2"><?=$_SESSION['usua_nomb']?></td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Dependencia origen:</td>
                    <td  width="65%" height="25" class="listado2"> <?=$_SESSION['depe_nomb']?></td>
                </tr>
            </table>
        </center>
        <?php
            if ($krd != $siNotifica->fields['USUA_LOGIN']) {
                $valRadio = $numrad;
                include 'mail.php';
            }
        ?>
    </body>
</html>