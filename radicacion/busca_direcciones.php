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
$url_raiz = $_SESSION['url_raiz'];
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

$assoc = $_SESSION['assoc'];
define('ADODB_ASSOC_CASE', $assoc);

if ($radicadopadre) {
    $buscar_d = $radicadopadre;
}
if ($nurad) {
    $buscar_d = $nurad;
}

if ($espcodi) {
    $isql = "select NIT_DE_LA_EMPRESA as SGD_CIU_CEDULA
               ,NOMBRE_DE_LA_EMPRESA
			   ,SIGLA_DE_LA_EMPRESA as SGD_CIU_APELL1
			   ,IDENTIFICADOR_EMPRESA
			   ,EMAIL
			   ,DIRECCION
			   ,TELEFONO_1 AS SGD_CIU_TELEFONO 
               ,CODIGO_DEL_DEPARTAMENTO as DPTO_CODI,CODIGO_DEL_MUNICIPIO as MUNI_CODI,NOMBRE_REP_LEGAL
               ,ID_PAIS
               ,ID_CONT
               ,codigo_suscriptor as PROVEDOR
	    from BODEGA_EMPRESAS 
	    where IDENTIFICADOR_EMPRESA = $espcodi ";
    $rs = $db->query($isql);
    if ($rs) {
        $dir_codigo_us3 = $assoc = 0 ? $rs->fields["identificador_empresa"] : $rs->fields["IDENTIFICADOR_EMPRESA"];
        $nombre = $assoc = 0 ? trim($rs->fields["nombre_de_la_empresa"]) : trim($rs->fields["NOMBRE_DE_LA_EMPRESA"]);
        $documento = $assoc = 0 ? $rs->fields["identificador_empresa"] : $rs->fields["IDENTIFICADOR_EMPRESA"];
        $papel = $assoc = 0 ? trim($rs->fields["sigla_de_la_empresa"]) : trim($rs->fields["SIGLA_DE_LA_EMPRESA"]);
        $sapel = $assoc = 0 ? trim($rs->fields["nombre_rep_legal"]) : trim($rs->fields["NOMBRE_REP_LEGAL"]);
        $tel = $assoc = 0 ? $rs->fields["sgd_ciu_telefono"] : $rs->fields["SGD_CIU_TELEFONO"];
        $dir = $assoc = 0 ? trim($rs->fields["direccion"]) : trim($rs->fields["DIRECCION"]);
        $mail = $assoc = 0 ? $rs->fields["email"] : $rs->fields["EMAIL"];
        $cc_documento = $assoc = 0 ? $rs->fields["sgd_ciu_cedula"] : $rs->fields["SGD_CIU_CEDULA"];
        $cont = $assoc = 0 ? $rs->fields["id_comt"] : $rs->fields["ID_COMT"];
        $pais = $assoc = 0 ? $rs->fields["id_pais"] : $rs->fields["id_PAIS"];
        $dpto = $assoc = 0 ? $pais . "-" . $rs->fields["dpto_codi"] : $rs->fields["DPTO_CODI"];
        $muni = $assoc = 0 ? $dpto . "-" . $rs->fields["muni_codi"] : $rs->fields["MUNI_CODI"];
        $tipo = $assoc = 0 ? $rs->fields["sgd_ciu_tipo"] : $rs->fields["SGD_CIU_TIPO"];
        $proveedor = $assoc = 0 ? $rs->fields["provedor"] : $rs->fields["PROVEDOR"];
        $dir_tipo_us3 = 3;
        $tipo_emp_us3 = 1;
        $nombre_us3 = $nombre;
        $documento_us3 = $documento;
        $cc_documento_us3 = $cc_documento;
        $prim_apel_us3 = $papel;
        $seg_apel_us3 = $sapel;
        $telefono_us3 = $tel;
        $direccion_us3 = $dir;
        $mail_us3 = $mail;
        $muni_us3 = $muni;
        $codep_us3 = $dpto;

        $tipo_us3 = $tipo;
    }
}

if (!$oem_codigo_us1) {
    $oem_codigo_us1 = 0;
}
if (!$document_us1) {
    $documento_us1 = 0;
}

if (substr($rem_destino, 0, 1) == 7) {
    $rem_isql = " and sgd_dir_tipo=$sgd_dir_tipo ";
} else {
    $rem_isql = "";
}
if (!$radi_nume_radi)
    $radi_nume_radi = "RADI_NUME_RADI";
if (!$buscar_d)
    $buscar_d = '0';
$isql = "select a.* from sgd_dir_drecciones a where a.RADI_NUME_RADI='$buscar_d' $rem_isql ";
$rs = $db->query($isql);

while (!$rs->EOF && $rs != false) {  
    if ($assoc == 0) {
        $codiesp = $rs->fields["sgd_esp_codi"];
    } else {
        $codiesp = $rs->fields["SGD_ESP_CODI"];
    }

    $ciu = $assoc = 0 ? $rs->fields["sgd_ciu_codigo"] : $rs->fields["SGD_CIU_CODIGO"];
    $oem = $assoc = 0 ? $rs->fields["sgd_oem_codigo"] : $rs->fields["SGD_OEM_CODIGO"];
    $esp = $codiesp;
    $fun = $assoc = 0 ? trim($rs->fields["sgd_doc_fun"]) : trim($rs->fields["SGD_DOC_FUN"]);
    $cont = $assoc = 0 ? $rs->fields["id_cont"] : $rs->fields["ID_CONT"];
    $pais = $assoc = 0 ? $rs->fields["id_pais"] : $rs->fields["ID_PAIS"];
    $dpto = $assoc = 0 ? $pais . "-" . $rs->fields["dpto_codi"] : $pais . "-" . $rs->fields["DPTO_CODI"];
    $muni = $assoc = 0 ? $dpto . "-" . $rs->fields["muni_codi"] : $dpto . "-" . $rs->fields["MUNI_CODI"];
    $otro = $assoc = 0 ? trim($rs->fields["sgd_dir_nombre"]) : trim($rs->fields["SGD_DIR_NOMBRE"]);
    $telUsX = $assoc = 0 ? trim($rs->fields["sgd_dir_telefono"]) : trim($rs->fields["SGD_DIR_TELEFONO"]);
    $emailUsX = $assoc = 0 ? trim($rs->fields["sgd_dir_mail"]) : trim($rs->fields["SGD_DIR_MAIL"]);
    //by skina, dignatario
    $digna = $assoc = 0 ? $rs->fields['sgd_dir_nombre'] : $rs->fields['SGD_DIR_NOMBRE'];
    $nombreremdes = $assoc = 0 ? trim($rs->fields["sgd_dir_nomremdes"]) : trim($rs->fields["SGD_DIR_NOMREMDES"]);
    $doc = $assoc = 0 ? trim($rs->fields["sgd_dir_doc"]) : trim($rs->fields["SGD_DIR_DOC"]);
    $ik = $assoc = 0 ? $rs->fields["sgd_dir_tipo"] : $rs->fields["SGD_DIR_TIPO"];
    //	 print("IK VALE($ik) ");

    if ($ik == 1) {
        $dir_codigo_us1 = $assoc = 0 ? $rs->fields["sgd_dir_codigo"] : $rs->fields["SGD_DIR_CODIGO"];
        $telefono_us1 = $telUsX;
        $mail_us1 = $emailUsX;
    }
    if ($ik == 2) {
        $dir_codigo_us2 = $assoc = 0 ? $rs->fields["sgd_dir_codigo"] : $rs->fields["SGD_DIR_CODIGO"];
        $telefono_us2 = $telUsX;
        $mail_us2 = $emailUsX;
    }

    if ($rem_isql)
        $dir_codigo_us7 = $assoc = 0 ? $rs->fields["sgd_dir_codigo"] : $rs->fields["SGD_DIR_CODIGO"];


    if ($ciu != 0) {
        $isql = "select * from sgd_ciu_ciudadano where sgd_ciu_codigo=$ciu";
        $rs1 = $db->query($isql);
        $tipo_emp = 0;
    }
    if ($oem != 0) { 
        $isql = "select SGD_OEM_NIT as SGD_OEM_CEDULA,
                        SGD_OEM_OEMPRESA as SGD_CIU_NOMBRE,
                        SGD_OEM_REP_LEGAL as SGD_CIU_APELL1,
                        SGD_OEM_CODIGO AS SGD_CIU_CODIGO,
                        SGD_OEM_DIRECCION as SGD_CIU_DIRECCION,
                        SGD_OEM_TELEFONO AS SGD_CIU_TELEFONO,
                        '' as PROVEDOR
                from SGD_OEM_OEMPRESAS 
                WHERE SGD_OEM_CODIGO = $oem";
        $rs1 = $db->query($isql);
        $tipo_emp = 2;
    }

    if ($esp != 0) {
        $isql = "select NOMBRE_DE_LA_EMPRESA || ' ' || NOMBRE_REP_LEGAL  as SGD_CIU_NOMBRE,
                        SIGLA_DE_LA_EMPRESA as SGD_CIU_APELL1,
                        IDENTIFICADOR_EMPRESA AS SGD_CIU_CODIGO,
                        DIRECCION as SGD_CIU_DIRECCION,
                        TELEFONO_1 AS SGD_CIU_TELEFONO, 
                        ID_CONT,
                        codigo_suscriptor as PROVEDOR
                 from BODEGA_EMPRESAS 
                 where IDENTIFICADOR_EMPRESA = $esp";
        $rs1 = $db->query($isql);
        $tipo_emp = 1;
    }
    if ($fun != 0) {
        $codiATexto = $db->conn->numToString("a.USUA_EXT");
        $concatTel = $db->conn->Concat("'Ext'", "$codiATexto");
        $isql = "select a.USUA_NOMB as SGD_CIU_NOMBRE,
                        b.DEPE_NOMB  as SGD_CIU_APELL1,
                        a.USUA_DOC AS SGD_CIU_CODIGO,
                        b.DEPE_NOMB as SGD_CIU_DIRECCION,
                        $concatTel AS SGD_CIU_TELEFONO,
                        '' as PROVEDOR
             from USUARIO a, dependencia b
             where a.depe_codi=b.depe_codi and usua_doc = '$doc'";
        //Modificacion skinatech
        //busco el documento del funcionario, no por codigo
        $rs1 = $db->query($isql);
        $tipo_emp = 6;
        $dir = trim($rs1->fields["SGD_CIU_DIRECCION"]);
    }

//    error_log('********** '.$isql);
    
    
    if ($rs1) {
        $nombre = $assoc == 0 ? trim($rs1->fields["sgd_dir_nombre"]) : trim($rs1->fields["SGD_CIU_NOMBRE"]);
        $documento = $assoc == 0 ? trim($rs1->fields["sgd_ciu_codigo"]) : $rs1->fields["SGD_CIU_CODIGO"];
        $papel = $assoc == 0 ? trim($rs1->fields["sgd_ciu_apell1"]) : trim($rs1->fields["SGD_CIU_APELL1"]);
        $sapel = $assoc == 0 ? trim($rs1->fields["sgd_ciu_apell2"]) : trim($rs1->fields["SGD_CIU_APELL2"]);
        $tel = $assoc == 0 ? trim($rs1->fields["sgd_dir_telefono"]) : trim($rs1->fields["SGD_DIR_TELEFONO"]);
        $dir = $assoc == 0 ? trim($rs->fields["sgd_dir_direccion"]) : trim($rs->fields["SGD_DIR_DIRECCION"]);
        $mail = $assoc == 0 ? $rs1->fields["sgd_dir_mail"] : trim($rs1->fields["SGD_DIR_MAIL"]);
        $cc_documento = $assoc == 0 ? $rs1->fields["sgd_ciu_cedula"] : $rs1->fields["SGD_CIU_CEDULA"];
        $proveedor = $assoc == 0 ? $rs1->fields["provedor"] : $rs1->fields["PROVEDOR"];
        if ($ik == 1) {
            $tipo_emp_us1 = $tipo_emp;
            $nombre_us1 = $nombre;
            $documento_us1 = $documento;
            $prim_apel_us1 = $papel;
            $seg_apel_us1 = $sapel;
            if (!$telefono_us1)
                $telefono_us1 = $tel;
            $direccion_us1 = trim($dir);
            if (!$mail_us1)
                $mail_us1 = $mail;
            $muni_us1 = $muni;
            $codep_us1 = $dpto;

            $idpais1 = $pais;
            $idcont1 = $cont;
            $tipo_us1 = $tipo;
            $cc_documento_us1 = $cc_documento;
            $otro_us1 = $otro;
            $proveedor = $proveedor;
        }
        if ($ik == 2) {
            $tipo_emp_us2 = $tipo_emp;
            $nombre_us2 = $nombre;
            $documento_us2 = $documento;
            $prim_apel_us2 = $papel;
            $seg_apel_us2 = $sapel;
            if (!$telefono_us2)
                $telefono_us2 = $tel;
            $direccion_us2 = $dir;
            if (!$mail_us2)
                $mail_us2 = $mail;
            $muni_us2 = $muni;
            $codep_us2 = $dpto;
            $idpais2 = $pais;
            $idcont2 = $cont;
            $tipo_us2 = $tipo;
            $cc_documento_us2 = $cc_documento;
            $otro_us2 = $otro;
            $proveedor = $proveedor;
        }
        if ($rem_isql) {
            $tipo_emp_us7 = $tipo_emp;
            $nombre_us7 = $nombre;
            $documento_us7 = $documento;
            $prim_apel_us7 = $papel;
            $seg_apel_us7 = $sapel;
            $telefono_us7 = $tel;
            $direccion_us7 = $dir;
            $mail_us7 = $mail;
            $muni_us7 = $muni;
            $idpais7 = $pais;
            $idcont7 = $cont;
            $codep_us7 = $dpto;
            $tipo_us7 = $tipo;
            $cc_documento_us7 = $cc_documento;
            $otro_us7 = $otro;
            $proveedor = $proveedor;
        }
    }
    $rs->MoveNext();
}
//error_log('_________________________________________ '.$direccion_us1);
//print ("($codep_us1)($codep_us3)");
?>
