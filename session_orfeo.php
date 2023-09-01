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
error_reporting(7);
$url_raiz = dirname($_SERVER['HTTP_HOST']);
$dir_raiz = dirname(__FILE__);
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
include_once "$dir_raiz/include/db/ConnectionHandler.php";
include "$dir_raiz/config.php";

if (!$krd)
    $krd = $_REQUEST["krd"];
$db = new ConnectionHandler("$dir_raiz");
//$db->conn->debug = true;
$correo = 'pruebas@skinatech.com';
if (!defined('ADODB_ASSOC_CASE'))
    define('ADODB_ASSOC_CASE', 1);
$krd = strtoupper($krd);
$fechah = date("Ymd") . "_" . time();
$check = 1;
$numeroa = 0;
$numero = 0;
$numeros = 0;
$numerot = 0;
$numerop = 0;
$numeroh = 0;
$ValidacionKrd = "";
$queryDep = "SELECT DEPE_CODI AS \"DEPE_CODI\" from usuario where USUA_LOGIN ='$krd'";
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$rs = $db->query($queryDep);
$dependencia = $rs->fields['DEPE_CODI'];

//Busca todos los tipos de Radicado Existentes
$query = "select a.SGD_TRAD_CODIGO AS \"SGD_TRAD_CODIGO\",a.SGD_TRAD_DESCR,a.SGD_TRAD_ICONO from SGD_TRAD_TIPORAD a order by a.SGD_TRAD_CODIGO";
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$rs = $db->query($query);
$varQuery = $query;
$comentarioDev = ' Busca todos los tipos de Radicado Existentes ';
//include "$ruta_raiz/include/tx/ComentarioTx.php";

$iTpRad = 0;
$queryTip3 = "";
$tpNumRad = array();
$tpDescRad = array();
$tpImgRad = array();

while (!$rs->EOF) {
    $numTp = $rs->fields["SGD_TRAD_CODIGO"];
    $sqlCarpDep = "select SGD_CARP_DESCR from SGD_CARP_DESCRIPCION where SGD_CARP_DEPECODI = '" . $dependencia . "' and SGD_CARP_TIPORAD = $numTp";
    $rsCarpDesc = $db->query($sqlCarpDep);
    
    $descripcionCarpeta = $rsCarpDesc->fields["SGD_CARP_DESCR"];

    if ($descripcionCarpeta) {
        $descTp = $descripcionCarpeta;
    } else {
        $descTp = $rs->fields["SGD_TRAD_DESCR"];
    }

    $imgTp = $rs->fields["SGD_TRAD_ICONO"];
    $queryTRad .= ",a.USUA_PRAD_TP$numTp";
    $queryDepeRad .= ",b.DEPE_RAD_TP$numTp";
    $queryTip3 .= ",a.SGD_TPR_TP$numTp";
    $tpNumRad[$iTpRad] = $numTp;
    $tpDescRad[$iTpRad] = $descTp;
    $tpImgRad[$iTpRad] = $imgTp;
    $iTpRad++;
    $rs->MoveNext();
}
/**
 * BUSQUEDA DE ICONOS Y NOMBRES PARA LOS TERCEROS (Remitentes/Destinarios) AL RADICAR
 * @param $tip3[][][]  Array  Contiene los tipos de radicacion existentes.  
 * En la primera dimencion indica la posicion dependiendo del tipo de rad. (ej. salida -> 1, ...). 
 * En la segunda dimencion almacenara los datos de nombre del tipo de rad. inidicado, 
 * Para la tercera dimencion indicara la descripcion del tercero y en la cuarta dim. 
 * contiene el nombre del archio imagen del tipo de tercero.
 */
$query = "select a.SGD_DIR_TIPO, a.SGD_TIP3_CODIGO, a.SGD_TIP3_NOMBRE, a.SGD_TIP3_DESC, a.SGD_TIP3_IMGPESTANA $queryTip3
    from SGD_TIP3_TIPOTERCERO a";
$rs = $db->query($query);
while (!$rs->EOF) {
    $dirTipo = $rs->fields["SGD_DIR_TIPO"];
    $nombTip3 = $rs->fields["SGD_TIP3_NOMBRE"];
    $descTip3 = $rs->fields["SGD_TIP3_DESC"];
    $imgTip3 = $rs->fields["SGD_TIP3_IMGPESTANA"];
    for ($iTp = 0; $iTp < $iTpRad; $iTp++) {
        $numTp = $tpNumRad[$iTp];
        $campoTip3 = "SGD_TPR_TP$numTp";
        $numTpExiste = $rs->fields[$campoTip3];
        if ($numTpExiste >= 1) {
            $tip3Nombre[$dirTipo][$numTp] = $nombTip3;
            $tip3desc[$dirTipo][$numTp] = $descTip3;
            $tip3img[$dirTipo][$numTp] = $imgTip3;
        }
    }
    $rs->MoveNext();
}

if ($recOrfeo == "Seguridad") {
    $queryRec = "AND USUA_SESION='" . date("amdhIs") . "o" . str_replace(".", "", $REMOTE_ADDR) . "$krd' ";
} else {
    //Consulta rapida para saber si el usuario se autentica por LDAP o por DB
    $myQuery = "SELECT USUA_AUTH_LDAP from usuario where USUA_LOGIN ='$krd'";
    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
    $rs = $db->query($myQuery);
    $autenticaPorLDAP = $rs->fields['USUA_AUTH_LDAP'];

    if ($autenticaPorLDAP == 0 or ! $autenticaPorLDAP) {
        $queryRec = "AND (USUA_PASW ='" . SUBSTR(md5($drd), 1, 26) . "' or USUA_NUEVO='0')";
    } else {
        $queryRec = '';
    }
}
//Analiza la opcion de que se trate de un requerimieento de sesion desde una mÃ¡quina segura
if ($_SERVER["REMOTE_ADDR"] == $host_log_seguro) {
    $REMOTE_ADDR = $ipseguro;
    $queryRec = "";
    $swSessSegura = 1;
}

//Modificado idrd para tomar los valores de permisos de empresas y parques
//No añadir parques que ya esta incluido en el a.*  jlosada
$query = "select a.*,  
                b.DEPE_NOMB, 
                a.USUA_ESTA,  
                a.USUA_CODI,  
                a.USUA_LOGIN,  
                b.DEPE_CODI_TERRITORIAL,
                b.DEPE_CODI_PADRE,  
                a.USUA_PERM_ENVIOS,  
                a.USUA_PERM_MODIFICA,  
                a.USUA_PERM_EXPEDIENTE,
                a.USUA_EMAIL,  
                a.USUA_AUTH_LDAP $queryTRad  $queryDepeRad
            from usuario a, 
                 DEPENDENCIA b
            where USUA_LOGIN ='$krd' and  "
        . "a.depe_codi=b.depe_codi $queryRec";

/** Procedimiento forech que encuentra los numeros de secuencia para las radiciones
 * @param tpDepeRad[] array Muestra las dependencias que contienen las secuencias para radicion. */
$varQuery = $query;
$comentarioDev = ' Busca Permisos de Usuarios ...';
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
// $db->conn->debug = true;
$rs = $db->query($query);

// Si no se autentica por LDAP según los permisos de DB
// Verificamos que la consulta en DB haya sido exitosa con el password digitado
// Password no concuerda con el de la DB, luego no puede ingresar
if (!$autenticaPorLDAP) {
    if (trim($rs->fields["USUA_LOGIN"]) == $krd) {
        $validacionUsuario = '';
    } else {
        $mensajeError = "USUARIO O CONTRASE&Ntilde;A INCORRECTOS";
        $validacionUsuario = 'No Pasa Validacion Base de Datos';
    }
} else {

    // by skina 
    // El usuario tiene Validación por LDAP
    // Verificamos que tenga correo en la DB, si no tiene no se puede validar por LDAP
    $correoUsuario = $rs->fields['USUA_LOGIN'];

    if ($correoUsuario == '' or $drd == '') {
        $validacionUsuario = 'No existe el usuario en ORFEO';
        $mensajeError = "EL USUARIO NO ESTA REGISTRADO";
    } else {
        $username = $correoUsuario;
        $password = $drd;
        include("$dir_raiz/autenticaLDAP.php");
        $validacionUsuario = $mensajeError;
//        exit();
        if (!isset($validacionUsuario)) {
//            if (!isset($noexit)) {
            echo "<center><h3>Redireccionando....</h3></center>";
        }
    }
}

/* Busca si ya se mostro la alerta de manejo de información una primera vez */
$selectusuario = "select count(*) as count from usuario where usua_doc_suip = '1'";
$resultusuario = $db->conn->query($selectusuario);
$countusuario = $db->conn->driver == "mysql" ? $resultusuario->fields['count'] : $resultusuario->fields['COUNT'];

if ($countusuario == 0) {
    $resultusuario = '1';
} else {
    $resultusuario = '';
}

if (!$validacionUsuario) {
    $perm_radi_salida_tp = 0;
    foreach ($tpNumRad as $key => $valueTp) {
        $campo = "DEPE_RAD_TP$valueTp";
        $campoPer = "USUA_PRAD_TP$valueTp";
        $tpDepeRad[$valueTp] = $rs->fields[$campo];
        $tpPerRad[$valueTp] = $rs->fields[$campoPer];
        if ($tpPerRad[$valueTp] >= 1) {
            $perm_radi_salida_tp = 1;
        }
        $tpDependencias .= "<" . $rs->fields[$campo] . ">";
    }

    if ($krd) {
        if (trim($rs->fields["USUA_ESTA"]) == 1) {
            include('./variables.php');
            error_reporting(0);
            $recOrfeoOld = $recOrfeo;
            $nombSession = substr(date("ymdhis") . "o" . str_replace(".", "", $_SERVER['REMOTE_ADDR']) . str_replace(".", "", $krd), 0, 29);
            session_id($nombSession);
            session_start();
            $recOrfeo = $recOrfeoOld;
            $fechah = date("Ymd") . "_" . time();
            $carpeta = 0;
            $dirOrfeo = str_replace("login.php", "", $PHP_SELF);
            $_SESSION["entidad"] = $entidad;
            $_SESSION["nit_entidad"] = $nit_entidad; // Se crea variable de sesion para el nit de la entidad
            $_SESSION["entidad_tel"] = $entidad_tel; // se crea variable de session para el telefono de la entidad
            $_SESSION["longitud_codigo_dependencia"] = $longitud_codigo_dependencia;
            $_SESSION["entidad_contacto"] = $entidad_contacto;

            if ($archivado_requiere_exp)
                $_SESSION["archivado_requiere_exp"] = true;

//            require './session_variables.php';
            $_SESSION["dirOrfeo"] = $dirOrfeo;
            $_SESSION["drde"] = $contraxx;
            $_SESSION["usua_doc"] = trim($usua_doc);
            $_SESSION["dependencia"] = $dependencia;
            $_SESSION["codusuario"] = $codusuario;
            $_SESSION["depe_nomb"] = $depe_nomb;
            $_SESSION["cod_local"] = $cod_local;
            $_SESSION["depe_municipio"] = $depe_municipio;
            $_SESSION["codigo_municipio"] = $codigo_municipio;
            $_SESSION["codigo_departamento"] = $codigo_departamento;
            $_SESSION["usua_doc"] = $usua_doc;
            $_SESSION["usua_email"] = $usua_email;
            $_SESSION["usua_at"] = $usua_at;
            $_SESSION["usua_ext"] = $usua_ext;
            $_SESSION["usua_piso"] = $usua_piso;
            $_SESSION["usua_nacim"] = $usua_nacim;
            $_SESSION["usua_nomb"] = $usua_nomb;
            $_SESSION["usua_nuevo"] = $usua_nuevo;
            $_SESSION["usua_admin_archivo"] = $usua_admin_archivo;
            $_SESSION["usua_masiva"] = $usua_masiva;
            $_SESSION["usua_perm_dev"] = $usua_perm_dev;
            $_SESSION["usua_perm_anu"] = $usua_perm_anu;
            $_SESSION["usua_perm_numera_res"] = $usua_perm_numera_res;
            $_SESSION["perm_radi_sal"] = $perm_radi_sal;
            $_SESSION["depecodi"] = $dependencia;
            $_SESSION["fechah"] = $fechah;
            $_SESSION["crea_plantilla"] = $crea_plantilla;
            $_SESSION["verrad"] = 0;
            $_SESSION["menu_ver"] = 3;
            $_SESSION["depe_codi_padre"] = $depe_codi_padre;
            $_SESSION["depe_codi_territorial"] = $depe_codi_territorial;
            $_SESSION["nivelus"] = $nivelus;
            $_SESSION["tpNumRad"] = $tpNumRad;
            $_SESSION["tpDescRad"] = $tpDescRad;
            $_SESSION["tpImgRad"] = $tpImgRad;
            $_SESSION["tpDepeRad"] = $tpDepeRad;
            $_SESSION["tpPerRad"] = $tpPerRad;
            $_SESSION["usua_perm_envios"] = $usua_perm_envios;
            $_SESSION["usua_perm_modifica"] = $usua_perm_modifica;
            $_SESSION["usuario_reasignacion"] = $usuario_reasignacion;
            $_SESSION["descCarpetasGen"] = $descCarpetasGen;
            $_SESSION["tip3Nombre"] = $tip3Nombre;
            $_SESSION["tip3desc"] = $tip3desc;
            $_SESSION["tip3img"] = $tip3img;
            $_SESSION["usua_admin_sistema"] = $usua_admin_sistema;
            $_SESSION["perm_radi"] = $perm_radi;
            $_SESSION["usua_perm_sancionad"] = $usua_perm_sancionad;
            $_SESSION["usua_perm_impresion"] = $usua_perm_impresion;
            $_SESSION["usua_perm_intergapps"] = $usua_perm_intergapps;
            $_SESSION["usua_perm_estadistica"] = $usua_perm_estadistica;
            $_SESSION["usua_perm_trd"] = $usua_perm_trd;
            $_SESSION["usua_perm_firma"] = $usua_perm_firma;
            $_SESSION["usua_perm_prestamo"] = $usua_perm_prestamo;
            $_SESSION["usua_perm_notifica"] = $usua_perm_notifica;
            $_SESSION["usua_perm_lectpant"] = $usua_perm_lectpant;
            $_SESSION["usua_perm_agrcontacto"] = $usua_perm_agrcontacto;
            $_SESSION["usuaPermExpediente"] = $usuaPermExpediente;
            $_SESSION["perm_tipif_anexo"] = $perm_tipif_anexo;
            $_SESSION["perm_borrar_anexo"] = $perm_borrar_anexo;
            $_SESSION["autentica_por_LDAP"] = $autenticaPorLDAP;
            $_SESSION["usuaPermRadFax"] = $usuaPermRadFax;
            $_SESSION["usuaPermRadEmail"] = $usuaPermRadEmail;
            $_SESSION["usua_perm_avaz"] = $usua_perm_avaz;
            $_SESSION["XAJAX_PATH"] = $XAJAX_PATH;
            $_SESSION["logoSuperiorOrfeo"] = $logoSuperiorOrfeo;
            $_SESSION["dependenciaPruebas"] = $dependenciaPruebas;
            $_SESSION["tipoRadicadoPqr"] = $tipoRadicadoPqr;
            $_SESSION["secRadicaFormularioWeb"] = $secRadicaFormularioWeb;
            $_SESSION["dependenciaSalida"] = $dependenciaSalida;
            $_SESSION["driver"] = $driver;
            $_SESSION["largoDependencia"] = $longitud_codigo_dependencia;
            $_SESSION["correo"] = 'pruebas@skinatech.com';
            $_SESSION["countusuario"] = $resultusuario;
            $_SESSION["assoc"] = $assoc;
            $_SESSION["estructuraRad"] = $estructuraRad;
            $_SESSION["rol"] = $rol;
            $_SESSION["preRadica"] = $preRadica;
            $_SESSION["permDescargaDocumentos"] = $permDescargaDocumentos;
            $_SESSION["firma_qr"] = $firma_qr;
            $_SESSION["firma_mecanica"] = $firma_mecanica;
            $_SESSION["per_transferencia_documental"] = $per_transferencias_documentales;
            /**
            * Autor: Luis Miguel Romero 
            * Fecga: 18-12-2019
            * Infor: Se agrega permiso para publicar documentos
            */
            $_SESSION["usua_perm_doc_publico"] = $usua_perm_doc_publico;
            $_SESSION["usua_perm_consulta_rad"] = $usua_perm_consulta_rad;
            $_SESSION["fonodoacumulado"] = $fonodoacumulado;
            $_SESSION["mod_firma_qr"] = $mod_firma_qr;
            $_SESSION["mod_firma_mecanica"] = $mod_firma_mecanica;
            $_SESSION["menuOrfeoExpress"] = $menuOrfeoExpress;
            $_SESSION["conteo"] = 1;
            $_SESSION["usua_nivel_consulta"] = $usua_nivel_consulta;
            $_SESSION["permReasignaMasiva"] = $permReasignaMasiva; 
            $_SESSION["transferencias"] = $transferencias;
            $_SESSION["mostrarListados"] = $mostrarListados;
            $_SESSION["unificacionRadicados"] = $unificacionRadicados;
            $_SESSION["facturaElectronica"] = $facturaElectronica;
            // $_SESSION["usua_perm_expedientes"] = $usua_perm_expedientes;

            $_SESSION["flagConsultaOrfeoOld"] = $flagConsultaOrfeoOld;
            $_SESSION["usuaRecibeWebPruebas"] = $usuaRecibeWebPruebas;
            $_SESSION['estructuraOrfeo'] = $estructuraOrfeo;
            
            //by skina
            $_SESSION["url_raiz"] = dirname($_SERVER['HTTP_HOST']); // En el navegador como se ve
            $_SESSION["dir_raiz"] = dirname(__FILE__); // Ruta absoluta en el sistema de archivos
            $_SESSION["ambiente"] = $ambiente;
            $_SESSION["abreviatura"] = $abreviatura;
            $_SESSION['saveInformation'] = $saveInformation;
            $_SESSION["menuAdicional"] = $menuAdicional;
            $_SESSION["logoEtiqueta"] = $logoEtiqueta;
            $_SESSION["dependenciaSecuencia"] = $dependenciaSecuencia;

            /**
            * Autor: Daniel Tautiva
            * Fecga: 14-12-2020
            * Infor: Se agrega permiso para inventario documental
            */
            $_SESSION['per_consulta_inv_documental'] = $per_consulta_inv_documental;
            $_SESSION['per_carga_inv_documental'] = $per_carga_inv_documental;
            $_SESSION['entidad_depsal'] = $entidad_depsal;

            if (!$imagenes)
                $imagenes = "/imagenes1/";

            $_SESSION["imagenes"] = $imagenes;
            $_SESSION["imagenes2"] = $imagenes2;

            if (!$ESTILOS_PATH)
                $ESTILOS_PATH = "/estilos/";

            $_SESSION["ESTILOS_PATH"] = $ESTILOS_PATH;
            $_SESSION["ESTILOS_PATH2"] = $ESTILOS_PATH2;
            $_SESSION["ESTILOS_PATH_ORFEO"] = $ESTILOS_PATH_ORFEO;

            if ($colorFondo) {
                $_SESSION["colorFondo"] = $colorFondo;
            } else {
                $_SESSION["colorFondo"] = "8cacc1";
            }

            /**  Variables para Correo IMAP */
            $_SESSION["PEAR_PATH"] = $PEAR_PATH;
            $_SESSION["servidor_mail"] = $servidor_mail_imap;
            $_SESSION["puerto_mail"] = $puerto_mail_imap;
            $_SESSION["protocolo_mail"] = $protocolo_mail;
            $_SESSION["protocolo_smtp"] = $protocolo_smtp;

            if ($archivado_requiere_exp) {
                $_SESSION["archivado_requiere_exp"] = $archivado_requiere_exp;
            }

            //Se pone el permiso de administración de flujos en la sesion para su posterior consulta
            $_SESSION["usua_perm_adminflujos"] = $usua_perm_adminflujos;
            $_SESSION["krd"] = $krd;

            $nomcarpera = "ENTRADA";

            if (!$orno)
                $orno = 0;

            $query = "update usuario set usua_sesion='" . session_id() . "',usua_fech_sesion=sysdate , usua_doc_suip='" . $countusuario . "' where  USUA_LOGIN ='$krd'  ";
            $recordSet["USUA_SESION"] = " '" . session_id() . "' ";
            error_reporting(7);
            $recordSet["USUA_FECH_SESION"] = $db->conn->OffsetDate(0, $db->conn->sysTimeStamp);

            if ($countusuario == 0) {
                $db->conn->driver == "mysql" ? $recordSet["usua_doc_suip"] = "'" . $resultusuario . "'" : $recordSet["USUA_DOC_SUIP"] = "'" . $resultusuario . "'";
            }

            $recordWhere["USUA_LOGIN"] = "'$krd'";
            $db->update("USUARIO", $recordSet, $recordWhere);
            $ValidacionKrd = "Si";
        } else {
            $ValidacionKrd = "Errado .... ";
            if ($recOrfeo == "loginWeb") {
                ?>
                <script language="JavaScript" type="text/JavaScript">
                    alert("Usuario <?= $krd ?> esta inactivo \n por favor consulte con el administrador del sistema");
                </script>
                <?php
            } else
                
                ?>
                <script language="JavaScript" type="text/JavaScript">
                    alert("Usuario <?= $krd ?> esta inactivo \n por favor consulte con el administrador del sistema");
            </script>
            <?php
        }
    }
}elseif ($krd == '' && $drd == '') {
    ?>
    <script language="JavaScript" type="text/JavaScript">
        alert("Usuario y contrase&ntilde;a son datos obligatorios");
    </script>
    <?php
} else {
    if ($recOrfeo == "loginWeb") {
        ?>
        <script language="JavaScript" type="text/JavaScript">
            alert("Usuario o contrase&ntilde;a son incorrectos \n intente de nuevo");
        </script>
        <?php
    } else {
        $ValidacionKrd = "Errado ....";
        if ($recOrfeo == "Seguridad")
            die(include "$dir_raiz/paginaError.php");
        if (!$autenticaPorLDAP) {
            echo '<script language="JavaScript" type="text/JavaScript">';
            echo 'alert("Falla de verificaci\363n con el usuario '.$krd.' en la base de datos, \n Intente Nuevamente o verifique el estado de su usuario.")';
//            header("Location: login.php");
            echo '</script>';
        } else {
            echo '<script language="JavaScript" type="text/JavaScript">';
            echo 'alert("Falla de verificaci\363n con el usuario '.$krd.' en el LDAP, \n '.$mensajeError.',  Intente Nuevamente.")'; 
//            header("Location: login.php");
            echo '</script>';
        }
    }
}
?>
