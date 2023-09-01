<?php
/**
 * Autor: Luis Miguel Romero
 * Fecha: 18-12-2019
 * Info: Se genera  accion publicar un anexo con extension PDF
 */
/* ---------------------------------------------------------+
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
session_start();
$url_raiz = $_SESSION['url_raiz'];
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$depeNomb = $_SESSION["depe_nomb"];
$abreviatura = $_SESSION["abreviatura"];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

$assoc = $_SESSION['assoc'];
define('ADODB_ASSOC_CASE', $assoc);

$krd = $_SESSION["krd"];
$depe_codi = $_SESSION["depecodi"];
$usua_codi = $_SESSION["codusuario"];
$usua_doc = $_SESSION["usua_doc"];
$usua_nomb = $_SESSION["usua_nomb"];

// Variables a utilizar
$msj = '';
$numeroExpediente = $_GET['numeroExpediente'];

if (!$dir_raiz)
    $dir_raiz = ".";
include("$dir_raiz/config.php");
if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";
if (isset($db))
    unset($db);
include_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$dir_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$sqlFechaHoy = $db->conn->OffsetDate(0, $db->conn->sysTimeStamp);
//$db->conn->debug=true;
include_once "$dir_raiz/include/tx/Historico.php";

$sqlPer = "SELECT USUA_PERM_DOC_PUBLICO FROM USUARIO WHERE USUA_LOGIN ='" . $_SESSION['krd'] . "' ";
$rsP = $db->conn->Execute($sqlPer);

// Se consulta primero todos los radicados que se encuentran en el expediente y que hallan sido incluidos
// con los resultados se busca todos los radicados que no sean publicos por el momento.
$SQLradiAnex = "SELECT radi_nume_radi FROM sgd_exp_expediente where sgd_exp_numero='$numeroExpediente' and sgd_exp_estado=0";
$rsSQLradiAnex = $db->conn->Execute($SQLradiAnex);



// Verifica que tenga permisos 
if ($rsP->fields["USUA_PERM_DOC_PUBLICO"] == 1) {

    while (!$rsSQLradiAnex->EOF) {

        $numRadicado = $rsSQLradiAnex->fields['RADI_NUME_RADI'];

        // (RADICADO) Se consulta el estado de cada uno de los radicados incluidos en el expediente
        $radicadosNoPublicos = "select RADI_DOCU_PUBLICO, radi_path from radicado where radi_nume_radi='$numRadicado'";
        $rsConsulEstado = $db->query($radicadosNoPublicos);

        // Si el radicado no esta como publico ya, se procede a actualizar el estado y gurdar en el historico
        $extRadi = substr($rsConsulEstado->fields['RADI_PATH'], -3); 
        if ($rsConsulEstado->fields['RADI_DOCU_PUBLICO'] != 't' and ($extRadi == 'PDF' or $extRadi =='pdf')) {

            $sqlUpRadicado = "UPDATE radicado SET RADI_DOCU_PUBLICO = 't' WHERE radi_nume_radi='$numRadicado'";
            $rsUpRadicado = $db->query($sqlUpRadicado);

            if ($rsUpRadicado) {
                // Se asigna el radicado a un arreglo
                $radicados[] = $numRadicado;

                $codTx = 72;
                $observacion = 'Se ha marcado como publico el documento principal del radicado número ' . $numrad . '.';
                $hist = new Historico($db);
                $hist->insertarHistorico($radicados, $depe_codi, $usua_codi, $depe_codi, $usua_codi, $observacion, $codTx);
            }
        }

        // (ANEXOS) Se consulta el estado de cada uno de los anexos pertenecientes a  los radicados incluidos en el expediente
        $anexosNoPublicos = "select RADI_DOCU_PUBLICO, anex_codigo, ANEX_TIPO from anexos where anex_radi_nume='$numRadicado'";
        $rsConsulAnexEstado = $db->query($anexosNoPublicos);

        while (!$rsConsulAnexEstado->EOF) {

            $codanexo = $rsConsulAnexEstado->fields['ANEX_CODIGO'];
            $extRadi = $rsConsulAnexEstado->fields['ANEX_TIPO'];
            // Si el radicado no esta como publico ya, se procede a actualizar el estado y gurdar en el historico
            if ($rsConsulAnexEstado->fields['RADI_DOCU_PUBLICO'] != 't'  and $extRadi == 7) {

                $sqlUp = "UPDATE ANEXOS SET RADI_DOCU_PUBLICO = 't' WHERE ANEX_CODIGO = '" . $codanexo . "' ";
                $rsUp = $db->query($sqlUp);

                if ($rsUp) {
                    // Se asigna el radicado a un arreglo
                    $radicados[] = $numRadicado;

                    $codTx = 72;
                    $observacion = 'Se ha marcado como publico el documento anexado con el número ' . $codanexo . '.';
                    $hist = new Historico($db);
                    $hist->insertarHistorico($radicados, $depe_codi, $usua_codi, $depe_codi, $usua_codi, $observacion, $codTx);
                }
            }
            $rsConsulAnexEstado->MoveNext();
        }

        $rsSQLradiAnex->MoveNext();
    }
    $msj .= 'Todos los radicados incluidos en el expediente se publicaron de forma correcta.<br>';
} else {
    $msj .= 'No tiene permisos para actualizar el estado.<br>';
}
?>

<head>
    <title>SGD Orfeo</title>
    <link rel="stylesheet" href="../estilos_totales.css">
</head>

<body>
    <center>
        <br>
        <br>
        <font size='3' color='#000000'>
            <span class='etextomenu'><b><?= $msj ?><BR></span>
            <input type='button' value='Cerrar' class='botones_largo' onclick='opener.regresar();window.close();'>   
        </font>
    </center>
</body>