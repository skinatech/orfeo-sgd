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
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
/**
 * Modulo de Formularios Web para atencion a Ciudadanos.
 * @autor Carlos Barrero   carlosabc81@gmail.com SuperSolidaria
 * @author Sebastian Ortiz Vasquez 2012
 * @fecha 2009/05
 * @Fundacion CorreLibre.org
 * @licencia GNU/GPL V2
 *
 * Se tiene que modificar el post_max_size, max_file_uploads, upload_max_filesize
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor; //iconv("ISO-8859-1","UTF-8",$valor);
foreach ($_POST as $key => $valor)
    ${$key} = $valor; //iconv("ISO-8859-1","UTF-8",$valor);
$pais_formulario = $pais;
define('ADODB_ASSOC_CASE', 2);


$ruta_raiz = "..";
$ADODB_COUNTRECS = false;

require_once("$ruta_raiz/include/db/ConnectionHandler.php");
require_once 'funciones.php';
include_once './adjuntarArchivos.php';
// include_once($ruta_raiz . "/include/PHPMailer/class.phpmailer.php");
include_once($ruta_raiz . "/include/PHPMailer5.2/PHPMailerAutoload.php");
include_once($ruta_raiz . "/config.php");
//require_once($ruta_raiz."/conf/configPHPMailer.php");

$db = new ConnectionHandler($ruta_raiz);
$mail = new PHPMailer();
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
//inserta en radicado
$tipoRadicado = 4;
$adjuntosSubidos = array();
$asuntosNom = array();
$tipoSolicitante = $_POST['tipoSolicitante'];
$errorFormulario = 0;
$db->conn->debug = true;

if ($errorFormulario == 0) {
    $uploader = new Uploader($_FILES);
    $uploader->FILES = $_FILES;
    $adjuntosSubidos = $_FILES['userfile']['tmp_name'];
    $asuntosNom = $_FILES['userfile']['name'];
    $uploader->subidos = $adjuntosSubidos;
    $uploader->adjuntarArchivos();
    $uploader->adjuntarYaSubidos();
}
if ($errorFormulario == 0) {
    $_SESSION['nom_ciu'] = $_POST['nom_ciu'];
    $_SESSION['apell1_ciu'] = $_POST['apell1_ciu'];
    $_SESSION['apell2_ciu'] = $_POST['apell2_ciu'];
    //campos para personas juriridicas o empresas
    $_SESSION['sigla'] = $_POST['sigla'];
    $_SESSION['razonSocial'] = $_POST['raz_social'];
    $_SESSION['repLegal'] = $_POST['rep_legal'];

    if ($tipoDocumento == '') {
        //No selecciono tipo de documento
        $_SESSION['documento'] = 0;
    } else if ($tipoDocumento == 4) {
        //Tipo de documento NIT
        $_SESSION['documento'] = $doc_ciu != "" ? $doc_ciu : 0;
    } else {
        //Tipo de documento diferente de NIT
        $_SESSION['documento'] = $doc_ciu;
    }

    if ($depto != 0 && ($muni < 1 || $muni > 999)) {
        $muni = 1;
    }

    $_SESSION['depto'] = $depto;
    $_SESSION['muni'] = $muni;
    $_SESSION['direccion'] = $direccion == '' ? "No registra" : $direccion;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['email'] = $email == '' ? "No registra" : $email;
    $_SESSION['mrec_codi'] = 3;
    if ($pqrsFacebook == "1") {
        $_SESSION['mrec_codi'] = 3;
    } else {
        $_SESSION['mrec_codi'] = 3;
    }

    $tipoSolicTerm = explode("-", $tipoSolicitud);
    $_SESSION['tipo'] = $tipoSolicTerm[0];
    $_SESSION['dtermino'] = $tipoSolicTerm[1];
    $_SESSION['asunto'] = $asunto;
    $_SESSION['desc'] = textoPDF($comentario);
    //TODO Imprimir el grupo de poblacional haciendo la consulta a sgd_tma_temas
    $_SESSION['desc'] .= textoPDF("\n\n" . $uploader->listadoImprimible);

    //Todos se responden a través del correo electrónico
    if ($mediorespuesta == 0) {
        $_SESSION['desc'] .= textoPDF("\nPor favor responder a través de mi correo electrónico: " . $_SESSION['email']);
    } else if ($mediorespuesta == 1) {
        $_SESSION['desc'] .= textoPDF("\nPor favor responder a través de mi dirección de correspondencia: " . $_SESSION['direccion_remitente']);
    }

    $_SESSION['codigo_orfeo'] = "0";
    $_SESSION['usuario'] = 1;
    $_SESSION['usuaRecibeWeb'] = 1;

    // Se cambia para usar la dependencias del eje tematico seleccionado
    if (!$_SESSION['dependencia'])
        $_SESSION['dependencia'] = $_SESSION['depeRadicaFormularioWeb'];
    $dependenciaRad = $_SESSION['dependencia'];

    if (isset($tipoEje))
        $_SESSION['depeRadicaFormularioWeb'] = $tipoEje;
    if (!$_SESSION['depeRadicaFormularioWeb'])
        $_SESSION['depeRadicaFormularioWeb'] = $depeRadicaFormularioWeb;
    $_SESSION['radicado'] = $radicado;
    if (!$_SESSION['usuaRecibeWeb'])
        $_SESSION['usuaRecibeWeb'] = $usuaRecibeWeb;
    $_SESSION['documento_destino'] = $_GET['documento_destino'];

    $numero_completado = "000000" . $db->conn->nextId($secRadicaFormularioWeb, $db->driver);
    $numero = substr($numero_completado, -6);
    $num_dir = $db->conn->nextId("sec_dir_direcciones", $db->driver);
    $dependenciaCompletada = "00000" . $_SESSION['depeRadicaFormularioWeb'];

    $depeRadicaFormularioWeb;  // Es radicado en la Dependencia 440 CALIDAD DE SERVICIO
    $usuaRecibeWeb; // Usuario que Recibe los Documentos Web
    $secRadicaFormularioWeb;

    //se multiplica por el numero de digitos de dependencia - Skina
    $numeroRadicado = date('Y') . substr($dependenciaCompletada, -1 * $longitud_codigo_dependencia) . $numero . $tipoRadicado;

    if ($tipoSolicitante == 1) {
        //inserta ciudadano
        $num_ciu = $db->conn->nextId("sec_ciu_ciudadano", $db->driver);
        $record["TDID_CODI"] = $tipoDocumento;
        $record["SGD_CIU_CODIGO"] = $num_ciu;
        $record["SGD_CIU_NOMBRE"] = "'" . mb_strtoupper($_POST['nom_ciu'], "utf-8") . "'";
        $record["SGD_CIU_DIRECCION"] = "'" . mb_strtoupper($_POST['direccion'], "utf-8") . "'";
        $record["SGD_CIU_APELL1"] = "'" . mb_strtoupper($_POST['apell1_ciu'], "utf-8") . "'";
        $record["SGD_CIU_APELL2"] = "'" . mb_strtoupper($_POST['apell2_ciu'], "utf-8") . "'";
        $record["SGD_CIU_TELEFONO"] = "'" . $_POST['telefono'] . "'";
        $record["SGD_CIU_EMAIL"] = "'" . $_POST['email'] . "'";
        $record["MUNI_CODI"] = $_POST['muni'];
        $record["DPTO_CODI"] = $_POST['depto'];
        $record["SGD_CIU_CEDULA"] = "'" . $_POST['doc_ciu'] . "'";
        $docCiu = $_POST['doc_ciu'];

        $sqlCiudadano = "select sgd_ciu_cedula from sgd_ciu_ciudadano where sgd_ciu_cedula='$docCiu'";
        $rsSqlCiudadano = $db->conn->Execute($sqlCiudadano);
        
        if(!$rsSqlCiudadano->fields["SGD_CIU_CEDULA"]){
            $ins_ciu = $db->conn->Replace("SGD_CIU_CIUDADANO", $record, array('SGD_CIU_CEDULA', 'SGD_CIU_CODIGO'), false);

            if ($ins_ciu == 0) {
                include "./pag_error.php";
            }
        }        

        //inserta en sgd_dir_direcciones
        $ins_dir = "insert into sgd_dir_drecciones(sgd_dir_codigo,sgd_dir_tipo,sgd_oem_codigo,sgd_ciu_codigo,radi_nume_radi,sgd_esp_codi,muni_codi,dpto_codi,sgd_dir_direccion,sgd_dir_telefono,sgd_sec_codigo,sgd_dir_nombre,sgd_dir_nomremdes,sgd_trd_codigo,sgd_dir_doc,sgd_dir_mail)
        values(" . $num_dir . ",1,0," . $num_ciu . ",'$numeroRadicado',0," . $_POST['muni'] . "," . $_POST['depto'] . ",'" . $_POST['direccion'] . "','" . $_POST['telefono'] . "',0,'" . mb_strtoupper($_POST['nom_ciu'], "utf-8") . " " . mb_strtoupper($_POST['apell1_ciu'], "utf-8") . " " . mb_strtoupper($_POST['apell2_ciu'], "utf-8") . "','" . mb_strtoupper($_POST['nom_ciu'], "utf-8") . " " . mb_strtoupper($_POST['apell1_ciu'], "utf-8") . " " . mb_strtoupper($_POST['apell2_ciu'], "utf-8") . "',1,'" . $_POST['documento'] . "','" . $_POST['email'] . "')";

    } else if ($tipoSolicitante == 2) {
        $num_oem = $db->conn->nextId("sec_oem_empresas", $db->driver);

        //insertar empresa en sgc_oem_empresas
        $record["SGD_OEM_CODIGO"] = $num_oem;
        $record["TDID_CODI"] = $tipoDocumento;
        $record["SGD_OEM_OEMPRESA"] = "'" . mb_strtoupper($raz_social, "utf-8") . "'";
        $record["SGD_OEM_REP_LEGAL"] = "'" . mb_strtoupper($rep_legal, "utf-8") . "'";
        $record["SGD_OEM_NIT"] = "'" . $documento . "'";
        $record["SGD_OEM_SIGLA"] = "'" . mb_strtoupper($sigla, "utf-8") . "'";
        $record["MUNI_CODI"] = $muni;
        $record["DPTO_CODI"] = $depto;
        $record["SGD_OEM_DIRECCION"] = "'" . mb_strtoupper($direccion, "utf-8") . "'";
        $record["SGD_OEM_TELEFONO"] = "'" . $telefono . "'";
        $record["ID_CONT"] = 1;
        $record["ID_PAIS"] = 170;
        $record["EMAIL"] = "'" . $email . "'";

        $sqlOempresas = "select sgd_oem_nit from sgd_ciu_ciudadano where sgd_oem_nit='$documento'";
        $rsSqlOempresas = $db->conn->Execute($sqlOempresas);
        
        if(!$rsSqlOempresas->fields["SGD_OEM_NIT"]){
            $ins_empresa = $db->conn->Replace("SGD_OEM_OEMPRESAS", $record, array('SGD_OEM_NIT', 'SGD_OEM_CODIGO'), false);

            if ($ins_empresa == 0) {
                include "./pag_error.php";
            }        
        }
        
        $_SESSION['radicado'] = $radicado;
        $_SESSION['documento_destino'] = $_GET['documento_destino'];
        if (!$_SESSION['dependencia'])
            $_SESSION['dependencia'] = $depeRadicaFormularioWeb;

        //inserta en sgd_dir_direcciones
        $ins_dir = "insert into sgd_dir_drecciones(sgd_dir_codigo,sgd_dir_tipo,sgd_oem_codigo,sgd_ciu_codigo,radi_nume_radi,sgd_esp_codi,muni_codi,dpto_codi,sgd_dir_direccion,sgd_dir_telefono,sgd_sec_codigo,sgd_dir_nombre,sgd_dir_nomremdes,sgd_trd_codigo,sgd_dir_doc,sgd_dir_mail)
        values(" . $num_dir . ",1," . $num_oem . ",0,'$numeroRadicado',0," . $_SESSION['muni'] . "," . $_SESSION['depto'] . ",'" . $_SESSION['direccion'] . "','" . $_SESSION['telefono'] . "',0,'" . mb_strtoupper($_SESSION['nom_ciu'], "utf-8") . " " . mb_strtoupper($_SESSION['apell1_ciu'], "utf-8") . "','" . mb_strtoupper($_SESSION['nom_ciu'], "utf-8") . " " . mb_strtoupper($_SESSION['apell1_ciu'], "utf-8") . " " . mb_strtoupper($_SESSION['apell2_ciu'], "utf-8") . "',1,'" . $_SESSION['documento'] . "','" . $_SESSION['email'] . "')";
    }

    $descripcionAnexos = $uploader->tieneArchivos ? count($uploader->subidos) : 0;
    $descripcionAnexos .= " Anexos";
    //variable de radi_tipo_deri para manejo de radicado asociado.
    $radi_tp_deri = 1;
    //inserta en radicado
    $ins_rad = "insert into radicado (radi_nume_radi,radi_fech_radi,tdoc_codi,mrec_codi,eesp_codi,radi_fech_ofic,radi_pais,muni_codi,carp_codi,dpto_codi,radi_nume_hoja,radi_desc_anex,";
    if ($_SESSION['radicado'] != NULL) {
        $ins_rad .= " radi_nume_deri,";
        $radi_tp_deri = $tipoRadicado;
    }

    /* Manejo de PQR como un radicado de entrada */
    if ($tipoRadicado == 2) {
        $carpeta = 0;
    } else {
        $carpeta = $tipoRadicado;
    }

    $ins_rad .= "radi_path,radi_usua_actu,radi_depe_actu,ra_asun,radi_depe_radi,radi_usua_radi,codi_nivel,flag_nivel,carp_per,radi_leido,radi_tipo_deri,sgd_fld_codigo,sgd_apli_codi,sgd_ttr_codigo,sgd_spub_codigo,sgd_trad_codigo, radi_nume_deri, tipo_usario_interes)
values ('$numeroRadicado', '" . date('d') . "/" . date('m') . "/" . date('Y') . "'," . $_SESSION['tipo'] . ",3," . $_SESSION['codigo_orfeo'] . ",to_date('" . date('d') . "/" . date('m') . "/" . date('Y') . "','dd/mm/yyyy'),'COLOMBIA'," . $_SESSION['muni'] . "," . $carpeta . "," . $_SESSION['depto'] . ",1,'" . $descripcionAnexos . "', ";

    if ($_SESSION['radicado'] != NULL) {
        $ins_rad .= "'" . $_SESSION['radicado'] . "', ";
    }

    $depeRadicaFormularioWeb = $_SESSION['depeRadicaFormularioWeb'];
    $anoRad = date("Y");

    $rutaPdf = "$anoRad/" . $depeRadicaFormularioWeb . "/$numeroRadicado" . ".pdf";
    $ins_rad .= "'$anoRad/" . $depeRadicaFormularioWeb . "/$numeroRadicado" . ".pdf'
	," . $_SESSION['usuaRecibeWeb'] . "
	,'" . $_SESSION['depeRadicaFormularioWeb'] . "'
	,'" . mb_strtoupper($_SESSION['asunto'], "utf-8") . "'
	,'" . $_SESSION['depeRadicaFormularioWeb'] . "'," . $_SESSION['usuaRecibeWeb'] . ",5,1,0,0," . $radi_tp_deri . ",0,0,0,0," . $tipoRadicado . ",0,$grupoInteres)";

    if ($rs_ins_rad = $db->conn->Execute($ins_rad)) {
        $rs_ins_dir = $db->conn->Execute($ins_dir);
    } else {
        die;
    }

    $ins_dtRad = "insert into sgd_dt_radicado values ('" . $numeroRadicado . "','" . $_SESSION['dtermino'] . "');";
    $rs_ins_dtRad = $db->conn->Execute($ins_dtRad);

    //Inserta historico
    $ins_his = "insert into hist_eventos (depe_codi,hist_fech,usua_codi,radi_nume_radi,hist_obse,usua_codi_dest,usua_doc,sgd_ttr_codigo,hist_doc_dest,depe_codi_dest)
values('" . $_SESSION['depeRadicaFormularioWeb'] . "',now(),1,'$numeroRadicado','Radicacion P.Q.R.S'," . $_SESSION['usuaRecibeWeb'] . ",'22222222',2,'" . $_SESSION['documento_destino'] . "','" . $_SESSION['depeRadicaFormularioWeb'] . "')";
    $rs_ins_his = $db->conn->Execute($ins_his);
    //num radicado completo
    $_SESSION['radcom'] = $numeroRadicado;

    $uploader->bodega_dir .= date('Y') . "/" . $depeRadicaFormularioWeb . "/docs";
    $uploader->moverArchivoCarpetaBodega($numeroRadicado);

    $sql_login = "select usua_login, usua_email from usuario where usua_codi=" . $_SESSION["usuaRecibeWeb"] . " and depe_codi='" . $_SESSION["depeRadicaFormularioWeb"] . "'";
    $rs_login = $db->conn->Execute($sql_login);

    //insertar anexos
    $fechaval = valida_fecha($db);
    $_SESSION['cantidad_adjuntos'] = 0;
    if ($uploader->tieneArchivos) {
        for ($i = 0; $i < count($uploader->subidos); $i++) {
            if (strlen($uploader->subidos[$i]) == 0) {
                continue;
            }
            $_SESSION['cantidad_adjuntos'] = $_SESSION['cantidad_adjuntos'] + 1;
            $extension = strtolower(end(explode('.', $asuntosNom[$i])));
            $sql_tipoAnex = "select anex_tipo_codi from anexos_tipo where anex_tipo_ext = '" . $extension . "'";
            $rs_tipoAnexo = $db->conn->Execute($sql_tipoAnex);
            $sql_tipo_doc_Anex = "select sgd_tpr_codigo from sgd_tpr_tpdcumento where sgd_tpr_descrip = 'Anexos'";
            $rs_tipo_doc_Anexo = $db->conn->Execute($sql_tipo_doc_Anex);
            $tipoCodigo = 24;
            if (!$rs_tipoAnexo->EOF) {
                $tipoCodigo = $rs_tipoAnexo->fields["anex_tipo_codi"];
            } else {
                $sql_tipoAnex = "select anex_tipo_codi from anexos_tipo where anex_tipo_ext = '*'";
                $rs_tipoAnexo = $db->conn->Execute($sql_tipoAnex);
                if (!$rs_tipoAnexo->EOF) {
                    $tipoCodigo = $rs_tipoAnexo->fields["anex_tipo_codi"];
                }
            }
            if(!$rs_tipo_doc_Anexo->EOF){
                $tipo_doc_Codigo = $rs_tipo_doc_Anexo->fields["sgd_tpr_codigo"];
            }
            
            $soporNo = $i + 1;
            $ins_anex = "insert into anexos(anex_radi_nume,anex_codigo,anex_tipo,anex_tamano,anex_solo_lect,anex_creador,anex_desc,anex_numero,anex_nomb_archivo,anex_borrado,anex_origen,anex_salida,anex_estado,sgd_rem_destino,sgd_dir_tipo,anex_depe_creador,anex_fech_anex,sgd_apli_codi, sgd_tpr_codigo)
values('" . $numeroRadicado . "','" . $numeroRadicado . sprintf("%05d", ($i + 1)) . "'," . $tipoCodigo . "," . $uploader->sizes[$i] . ",'S','" . $rs_login->fields['usua_login'] . "','" . $asuntosNom[$i] . " documento de soporte No. " . $soporNo . "',1,'" . $uploader->nombreOrfeo[$i] . "','N',0,0,0,1,1,'" . $_SESSION["depeRadicaFormularioWeb"] . "',now(),0, $tipo_doc_Codigo)";
            $rs_ins_anex = $db->conn->Execute($ins_anex);
        }
    }

    require('barcode.php');
    include_once "../config.php";

    $depeNomb = "";
    $muniNomb = "";
    $deptNomb = "";
    $paisNomb = "";
    $sql_depeNomb = "select depe_nomb from dependencia where depe_codi = '" . $_SESSION['depeRadicaFormularioWeb'] . "'";
    $rs_depeNomb = $db->conn->Execute($sql_depeNomb);
    if (!$rs_depeNomb->EOF) {
        $depeNomb = substr($rs_depeNomb->fields["depe_nomb"], 0, 40);
    }

    $sql_muniNomb = "select muni_nomb from municipio where muni_codi = " . $_SESSION['muni'] . " and dpto_codi = " . $_SESSION['depto'];
    $rs_muniNomb = $db->conn->Execute($sql_muniNomb);
    if (!$rs_muniNomb->EOF) {
        $muniNomb = $rs_muniNomb->fields["muni_nomb"];
    } else {
        $muniNomb = "";
    }

    $sql_deptoNomb = "select dpto_nomb from departamento where dpto_codi = " . $_SESSION['depto'] . " and id_pais = 170";
    $rs_deptoNomb = $db->conn->Execute($sql_deptoNomb);
    if (!$rs_deptoNomb->EOF) {
        $deptNomb = $rs_deptoNomb->fields["dpto_nomb"];
    } else {
        $deptNomb = "";
    }

    $sql_paisNomb = "select nombre_pais from sgd_def_paises where id_pais = " . $pais_formulario;
    $rs_paisNomb = $db->conn->Execute($sql_paisNomb);
    if (!$rs_paisNomb->EOF) {
        $paisNomb = $rs_paisNomb->fields["nombre_pais"];
    } else {
        $paisNomb = "No Registra";
    }

    $sql_fecha_rad = "select radi_fech_radi from radicado where radi_nume_radi= '" . $_SESSION['radcom'] . "'";
    $rs_fechrad = $db->conn->Execute($sql_fecha_rad);
    if (!$rs_fechrad->EOF) {
        $fechrad = date('Y-m-d H:i:s', strtotime($rs_fechrad->fields["radi_fech_radi"]));
    } else {
        $fechrad = date('d') . " - " . date('m') . " - " . date('Y');
    }
    //Genero compatiblidad de campos para la realización del pdf
    if (isset($_SESSION['razonSocial']) && $_SESSION['razonSocial'] != '' &&
            isset($_SESSION['repLegal']) && $_SESSION['repLegal'] != '') {

        $_SESSION['nom_ciu'] = $_SESSION['razonSocial'];
        $_SESSION['apell1_ciu'] = $_SESSION['sigla'];
        $_SESSION['apell2_ciu'] = $_SESSION['rep_legal'];
    }

    $pdf = new PDF_Code39();
    $pdf->AddPage();

    $pdf->Code39(100, 25, $_SESSION['radcom'], 1, 8);
    $pdf->Text(120, 37, textoPDF("Radicado N°. " . $_SESSION['radcom']));
    $pdf->Text(100, 41, textoPDF("Folios: N/A (WEB)  " . date('d') . " - " . date('m') . " - " . date('Y') . " " . date('h:i:s') . "  Anexos: " . $_SESSION['cantidad_adjuntos']));
    $pdf->SetFont('Arial', '', 8);
    $pdf->Text(100, 45, textoPDF("Destino: " . $depeRadicaFormularioWeb . " " . substr($depeNomb, 0, 10) . " - Rem/D: " . substr($_SESSION['nom_ciu'], 0, 10) . " " . substr($_SESSION['apell1_ciu'], 0, 10)));
    $pdf->SetFont('Arial', '', 8);
    $pdf->Text(100, 48, textoPDF("Consulte su trámite en:"));
    $pdf->SetFont('Arial', '', 8);
    $pdf->Text(100, 51, textoPDF("https://www.unicordoba.edu.co/index.php/sigec-inicio/sistema-pqrsyd/consultaWeb/"));
//    $pdf->SetFont('Arial', '', 8);
//    $pdf->Text(100, 54, textoPDF("sigec-inicio/sistema-pqrsyd/consultaWeb/"));
    $pdf->Text(20, 67, textoPDF("Monteria, " . date('d') . " de " . nombremes(date('m')) . " de " . date('Y')));
    $pdf->Text(20, 81, textoPDF("Señores"));
    $pdf->SetFont('Arial', '', 9);
    $pdf->Text(20, 85, textoPDF($entidad_largo));
    $pdf->SetFont('Arial', '', 9);
    $pdf->Text(20, 89, textoPDF("Ciudad"));
    $pdf->Text(20, 99, textoPDF("Asunto : " . mb_strtoupper($_SESSION['asunto'], "utf-8")));
    $pdf->SetXY(20, 105);
    $pdf->MultiCell(0, 4, $_SESSION['desc'], 0);
    $pdf->Text(20, 236, "Atentamente,");
    $pdf->SetFont('Arial', '', 9);
    $pdf->Text(20, 246, textoPDF(($_SESSION['nom_ciu']) . " " . $_SESSION['apell1_ciu'] . " " . $_SESSION['apell2_ciu']));
    $pdf->SetFont('Arial', '', 9);
    $pdf->Text(20, 250, $_SESSION['documento'] != '0' ? "C.C. " . $_SESSION['documento'] : "NIT. " . $_SESSION['documento']);
    $pdf->Text(20, 254, textoPDF($_SESSION['direccion'] . " " . $muniNomb . ", " . $deptNomb . "."));
    $pdf->Text(20, 258, textoPDF($paisNomb));
    $pdf->Text(20, 262, textoPDF("Tel. " . $_SESSION['telefono']));
    $pdf->Text(20, 266, textoPDF($_SESSION['email']));
    $pdf->Output("../bodega/$rutaPdf", 'F');

    //Realizar el conteo de hojas del radicado final//
    $conteoPaginas = getNumPagesPdf("../bodega/$rutaPdf");

    $sqlu = "UPDATE radicado SET radi_nume_hoja= $conteoPaginas where radi_nume_radi='" . $_SESSION['radcom'] . "'";
    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
    $db->conn->Execute($sqlu);
    $fehca = date('F j, Y');

    if ($_SESSION['email'] != "" && $_SESSION['email'] != "No registra") {
        $usMailSelect = 'orfeo@correo.unicordoba.edu.co';
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SetFrom($usMailSelect, utf8_decode("Sistema Gestión documental-PQR'S"));
        $mail->Host = "smtp.gmail.com";
        $mail->Port = "587";
        $mail->SMTPDebug = "0"; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = "";
        $mail->Username = $usMailSelect;   // SMTP account username
        $mail->Password = "u63R9y@G"; // SMTP account password
        $mail->Subject = utf8_decode("Notificación de PQR's No. " . $numeroRadicado . " " . $_SESSION['razonSocial']);
        $mail->AltBody = "Para ver el mensaje, por favor use un visor de E-mail compatible!";
        /* $url=true; */
        $mail->AddAttachment("../bodega/$rutaPdf");
        $mail->AddAddress($_SESSION['email']);

        $asu .= utf8_decode("<hr>Radicado de PQR " . $numeroRadicado . ".");
        $mensaje = "<html>
        <head>
        <title>Radicado de PQR en " . $_SESSION["entidad"] . "</title>
        </head>
        <body><p>
        Monteria, " . date('d') . " de " . nombremes(date('m')) . " de " . date('Y') . " <br>
        <br></br>
        <b>Información relacionada con su solicitud:</b><br><br> ";
        $mensaje .= "<b>Numero de Radicado:</b> " . $numeroRadicado . "<br> <b>Asunto: </b>" . mb_strtoupper($_SESSION["asunto"], 'utf-8');
        $mensaje .= "<br><br> Para consultar su solicitud <a href='https://186.43.32.121/orfeo/consultaWeb/' > aqu&iacute;</a>.<br><br>";
        $mensaje .= "<h5>Carrera 6 No.77-305 Montería-Córdoba,Colombia | Código Postal: 230002 | Línea Gratuita 018000 | Nit:891080031-3 | contacto@correo.unicordoba.edu.co<br>Horario de Atención: Lunes a Viernes 8:00am. A 12:00m. y 2:30pm. A 6:30pm.<br> Ley de protección de datos, Política de privacidad, Transparencia y acceso a la información, PQRSyD contacto@correo.unicordoba.edu.co - notificacionesjudiciales@correo.unicordoba.edu.co.</h5>";
        $mail->MsgHTML(utf8_decode($mensaje));

        while ((!$exito) && ($intentos < 5) && $_SESSION['email'] != "" && $_SESSION['email'] != "No registra") {
            $mail->ErrorInfo;
            $exito = $mail->Send();
            $intentos = $intentos + 1;
            sleep(7);
        }
    }
// Envio Correo de notificacion de radicacion a funcionario.
    $subject = "Ha recibido PQR's desde la pagina Oficial de " . $_SESSION["entidad"];
    $cuerpo = "
        <html>
        <head>
        <title>Gestion de PQR's Sistema de Gestion Documental</title>
        </head>
        <body><p>
        Bogota;  " . $fecha . " <br>
        <br></br>
        Ha recibido un documento en el Sistema de Gestion Documental Orfeo. Para verlo, ingrese al Sistema y revise el radicado  No  " . $numeroRadicado . "  enviado por " . $_SESSION['nom_ciu'] . " " . $_SESSION['apell1_ciu'] . " " . $_SESSION['apell2_ciu'] . " . Este documento fue radicado por la interfaz del formulario web. <br>
        <br>Asunto:  " . mb_strtoupper($_SESSION['asunto']) . "</br>
        <br></br>
        <br><b>Por favor, NO responda a este mensaje, es un envío automático</b><br><br>Cordialmente, </br>
        <br>Sistema de Gestion Documental Orfeo
        </p>
        </body>
        </html>
        ";
//     echo $cuerpo;
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "Content-Transfer-Encoding: base64\r\n";

    //direcci? del remitente
    $headers .= "From: Orfeo " . $_SESSION['entidad'] . " <" . $usMailSelect . ">\r\n";
    $cuerpo = chunk_split(base64_encode($cuerpo));

    $ok = mail($rs_login->fields['usua_email'], $subject, $cuerpo, $headers);
    $_SESSION["idFormulario"] = "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- Meta Tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!--Deshabilitar modo de compatiblidad de Internet Explorer-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title> <?= $entidad_largo ?> - Formulario PQRS</title>
        <link rel="stylesheet" href="css/structure2.css" type="text/css" />
        <link rel="stylesheet" href="css/form.css" type="text/css" />
        <script src="estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="estilos/js/bootstrap.min.js" type="text/javascript"></script>  
    </head>
    <body id="public">
        <div id="container" class="wufoo topLabel">
            <h1>&nbsp;</h1>
            <?php if ($errorFormulario == 0) { ?>
                <div class="info">
                    <center><img src="../logoEntidad.png" width="30%" height="30%" align="center"/></center>
                </div>
                <ul>
                    <div id="foli3">
                        <p>
                            <input type="hidden" name="numradicado" id="numradicado" value="<?= $numeroRadicado ?>" />
                            Su solicitud ha sido registrada de forma exitosa con el radicado No. <b><?= $numeroRadicado ?></b> , se envio notificaci&oacute;n de correo electronico a <b><?= $_SESSION['email'] ?></b>. 
                            Por favor tenga en cuenta estos datos para verificar el estado de su solicitud a trav&eacute;s de la p&aacute;gina web
                            de la Universidad.</br></br>

                            Pulse continuar para <b>finalizar la solicitud</b> y visualizar el documento en formato PDF. Si desea almacenelo
                            en su equipo o impr&iacute;malo.
                        </p>
                    </div>
                    <div class="buttons">
                        <input type="button" name="Submit" value="Continuar" calss="vinculoEXp" onclick="window.open('../bodega/<?= $rutaPdf ?>'); window.close();" />
                        <input type="button" name="Cerrar" value="Cerrar" onclick="window.location = 'https://186.43.32.121/orfeo/formularioWeb/'" />
                     </div>
                </ul>
                    <?php } elseif ($errorFormulario == 1) { ?>
                <div class=info>
                    <p>
                        <center><img src="../logoEntidad.png" width="30%" height="30%" align="center"/></center>
                    </p>
                </div>
                <ul>
                    <div id="foli3">
                        Existe un error en su petici&oactue; o est&aacute; intentando enviar una petici&oacute;n de nuevo.
                    </div>
                    <div class="buttons">
                        <form name=back action="javascript:history.go(-1)()" method=post>
                            <input type=submit value="Atr&aacute;s">
                        </form>
                    </div>
                </ul>
                <?php } else if ($errorFormulario == 2) { ?>
                <div class="info">
                    <p>
                        <center><img src="../logoEntidad.png" width="30%" height="30%" align="center"/></center>
                    </p>
                </div>
                <ul>
                    <div id="foli3">
                        Ocurrió un error al subir el archivo <?php echo implode($uploader->messages); ?>
                    </div>
                    <div class="buttons">
                        <form name=back action="javascript:history.go(-1)()" method=post>
                            <input type=submit value="Atr&aacute;s">
                        </form>
                    </div>
                </ul>
                <?php } ?>
        </div>
        <!--container-->
    </body>
    <script type="text/javascript">
        $('body').on('click', '.vinculoEXp', function() { 
            $('#loadFile').hide();
            $('.textMessageModalDoc').text('Cargando...');
            var radicadover = document.getElementById('numradicado').value;

            $.post('buscaRutaArchivoPrincipal.php', {
                tipo: 1, //Documentos clientes
                id: radicadover
            })
            .done(function (res) {
                if (res.status) {
                    if (res.mostrar) {
                        loadPdf(res.token);
                        $('#loadFile').show();
                        $('.alertDoc').hide();
                    } 
                    else {
                        var rawss = window.atob(res.extencion);
                        document.getElementById('the-frame-expe').setAttribute('src', rawss);
                    }
                } else {
                    $('.textMessageModalDoc').text(res.message);
                    $('.alertDoc').show();
                }
            });
            $("#myModalDocExp").modal();
        });

        function convertDataURIToBinary(base64) {
            var raw = window.atob(base64);
            var rawLength = raw.length;
            var array = new Uint8Array(new ArrayBuffer(rawLength));

            for (var i = 0; i < rawLength; i++) {
                array[i] = raw.charCodeAt(i);
            }
            return array;
        }

        function loadPdf(base64Document) {
            var pdfAsDataUri = base64Document;
            var pdfAsArray = convertDataURIToBinary(pdfAsDataUri);
            var url = 'pdfjs/web/viewer.php?file=';

            var binaryData = [];
            binaryData.push(pdfAsArray);
            var dataPdf = window.URL.createObjectURL(new Blob(binaryData, {type: "application/pdf"}))
            document.getElementById('the-frame-expe').setAttribute('src', url + encodeURIComponent(dataPdf));
        }
    </script>
<!--    <div id="myModalDocExp" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="padding-right: 13px; margin-top: -21px;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="width: 148%; margin-left: -23%; height: 100%;">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="padding: 5px; color: #FFFFFF; border-color: #1C4056; background-color: #1C4056;">Cerrar</button>
                <div class="modal-body">
                    <div class="alert alert-warning alertDoc" role="alert">
                        <span class="textMessageModalDoc">Cargando...</span>
                    </div>
                    <div id="loadFile" style="display: none;">
                        <iframe id="the-frame-expe" width="100%" height="100%" allowfullscreen webkitallowfullscreen ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
</html>
