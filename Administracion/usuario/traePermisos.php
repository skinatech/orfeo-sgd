<?php

/*********************************************************************************** */
/* ORFEO :Sistema de Gestion Documental     http://www.orfeogpl.org              */
/*  Idea Original de la SUPERINTENDENCIA DE SERVICIOS PUBLICOS DOMICILIARIOS     */
/*      COLOMBIA TEL. (57) (1) 6913005  yoapoyo@orfeogpl.org                 */
/* ===========================                                                       */
/*                                                                                   */
/* Este programa es software libre. usted puede redistribuirlo y/o modificarlo       */
/* bajo los terminos de la licencia GNU General Public publicada por                 */
/* la "Free Software Foundation"; Licencia version 2.                        */
/*                                                                                   */
/* Copyright (c) 2005 por :                                              */
/* SSPS "Superintendencia de Servicios Publicos Domiciliarios"                       */
/*   Jairo Hernan Losada  jlosada@gmail.com                Desarrollador             */
/*   Sixto Angel Pinzon Lopez --- angel.pinzon@gmail.com   Desarrollador             */
/* C.R.A.  "COMISION DE REGULACION DE AGUAS Y SANEAMIENTO AMBIENTAL"                 */
/*   Liliana Gomez        lgomezv@gmail.com                Desarrolladora            */
/*   Lucia Ojeda          lojedaster@gmail.com             Desarrolladora            */
/* D.N.P. "Departamento Nacional de Planeacion"                                      */
/*   Hollman Ladino       hollmanlp@gmail.com                Desarrollador           */
/*                                                                                   */
/* Colocar desde esta lInea las Modificaciones Realizadas Luego de la Version 3.5    */
/*  Nombre Desarrollador   Correo     Fecha   Modificacion                           */
/************************************************************************************ */
if ($reg_crear == 'Personalizar Permisos') {
    $isql = "SELECT * FROM USUARIO WHERE USUA_LOGIN = '$usuLoginSel'";
} else {
    $isql = "SELECT * FROM perfiles WHERE codi_perfil = $rol_sel";
}

//$db->conn->debug = true;
$rsCrea = $db->conn->query($isql);

$usua_activo = $assoc == 0 ? $rsCrea->fields["usua_esta"] : $rsCrea->fields["USUA_ESTA"];
$prestamo = $assoc == 0 ? $rsCrea->fields["usua_perm_prestamo"] : $rsCrea->fields["USUA_PERM_PRESTAMO"];
$digitaliza = $assoc == 0 ? $rsCrea->fields["perm_radi"] : $rsCrea->fields["PERM_RADI"];
$modificaciones = $assoc == 0 ? $rsCrea->fields["usua_perm_modifica"] : $rsCrea->fields["USUA_PERM_MODIFICA"];
$env_correo = $assoc == 0 ? $rsCrea->fields["usua_perm_envios"] : $rsCrea->fields["USUA_PERM_ENVIOS"];
$estadisticas = $assoc == 0 ? $rsCrea->fields["sgd_perm_estadistica"] : $rsCrea->fields["SGD_PERM_ESTADISTICA"];
$adm_sistema = $assoc == 0 ? $rsCrea->fields["usua_admin_sistema"] : $rsCrea->fields["USUA_ADMIN_SISTEMA"];
$adm_archivo = $assoc == 0 ? $rsCrea->fields["usua_admin_archivo"] : $rsCrea->fields["USUA_ADMIN_ARCHIVO"];
$usua_nuevoM = $assoc == 0 ? $rsCrea->fields["usua_nuevo"] : $rsCrea->fields["USUA_NUEVO"];
//echo "<hr>ppppp $usua_nuevoM<hr>";
$nivel = $assoc == 0 ? $rsCrea->fields["codi_nivel"] : $rsCrea->fields["CODI_NIVEL"];
$impresion = $assoc == 0 ? $rsCrea->fields["usua_perm_impresion"] : $rsCrea->fields["USUA_PERM_IMPRESION"];
$masiva = $assoc == 0 ? $rsCrea->fields["usua_masiva"] : $rsCrea->fields["USUA_MASIVA"];
$dev_correo = $assoc == 0 ? $rsCrea->fields["usua_perm_dev"] : $rsCrea->fields["USUA_PERM_DEV"];
$sgd_panu_codi = $assoc == 0 ? $rsCrea->fields["sgd_panu_codi"] : $rsCrea->fields["SGD_PANU_CODI"];

if ($sgd_panu_codi == 1)
    $s_anulaciones = 1;
if ($sgd_panu_codi == 2)
    $anulaciones = 1;
if ($sgd_panu_codi == 3) {
    $s_anulaciones = 1;
    $anulaciones = 1;
}
$tablas = $assoc == 0 ? $rsCrea->fields["usua_perm_trd"] : $rsCrea->fields["USUA_PERM_TRD"];
$usua_publico = $assoc == 0 ? $rsCrea->fields["usuario_publico"] : $rsCrea->fields["USUARIO_PUBLICO"];
$reasigna = $assoc == 0 ? $rsCrea->fields["usuario_reasignar"] : $rsCrea->fields["USUARIO_REASIGNAR"];
$firma = $assoc == 0 ? $rsCrea->fields["usua_perm_firma"] : $rsCrea->fields["USUA_PERM_FIRMA"];
$notifica = $assoc == 0 ? $rsCrea->fields["usua_perm_notifica"] : $rsCrea->fields["USUA_PERM_NOTIFICA"];
$usua_permexp = $assoc == 0 ? $rsCrea->fields["usua_perm_expediente"] : $rsCrea->fields["USUA_PERM_EXPEDIENTE"];
$permBorraAnexos = $assoc == 0 ? $rsCrea->fields["perm_borrar_anexo"] : $rsCrea->fields["PERM_BORRAR_ANEXO"];
$permTipificaAnexos = $assoc == 0 ? $rsCrea->fields["perm_tipif_anexo"] : $rsCrea->fields["PERM_TIPIF_ANEXO"];
$autenticaLDAP = $assoc == 0 ? $rsCrea->fields["usua_auth_ldap"] : $rsCrea->fields["USUA_AUTH_LDAP"];
$perm_adminflujos = $assoc == 0 ? $rsCrea->fields["usua_perm_adminflujos"] : $rsCrea->fields["USUA_PERM_ADMINFLUJOS"];
$permArchivar = $assoc == 0 ? $rsCrea->fields["perm_archi"] : $rsCrea->fields["PERM_ARCHI"];
$lectpant = $assoc == 0 ? $rsCrea->fields["usua_perm_accesi"] : $rsCrea->fields["USUA_PERM_ACCESI"];
$usua_perm_agrcontacto = $assoc == 0 ? $rsCrea->fields["usua_perm_agrcontacto"] : $rsCrea->fields["USUA_PERM_AGRCONTACTO"];
$preRadica = $assoc == 0 ? $rsCrea->fields["usua_perm_preradicado"] : $rsCrea->fields["USUA_PERM_PRERADICADO"];
$permDescargaDocumentos = $assoc == 0 ? $rsCrea->fields["descargar_documentos"] : $rsCrea->fields["DESCARGAR_DOCUMENTOS"];
$firma_qr = $assoc == 0 ? $rsCrea->fields["firma_qr"] : $rsCrea->fields["FIRMA_QR"];
$descarga_arc_original = $assoc == 0 ? $rsCrea->fields["descarga_arc_original"] : $rsCrea->fields["DESCARGA_ARC_ORIGINAL"];
$per_transferencias_documentales = $assoc == 0 ? $rsCrea->fields["per_transferencia_documental"] : $rsCrea->fields["PER_TRANSFERENCIA_DOCUMENTAL"];
$firma_mecanica = $assoc == 0 ? $rsCrea->fields["firma_mecanica"] : $rsCrea->fields["FIRMA_MECANICA"];

/**
* Autor: Luis miguel Romero
* Fecha: 18-12-2019
* Info: Se agrega permiso para publicar documentos de los radicados: $usua_perm_doc_publico
*/
$usua_perm_doc_publico = $assoc == 0 ? $rsCrea->fields["usua_perm_doc_publico"] : $rsCrea->fields["USUA_PERM_DOC_PUBLICO"];
$usuaPermRadEmail = $assoc == 0 ? $rsCrea->fields["usua_perm_rademail"] : $rsCrea->fields["USUA_PERM_RADEMAIL"];
/***
Autor: Jenny Gamez
Fecha: 2019-09-21
Info: Se agrega un nuevo campo de permiso usua_nivel_consulta en la base de datos
***/
$usua_nivel_consulta = $assoc == 0 ? $rsCrea->fields["usua_nivel_consulta"] : $rsCrea->fields["USUA_NIVEL_CONSULTA"];

/***
Autor: Jenny Gamez
Fecha: 2019-10-22
Info: Se agrega un nuevo campo de permiso $permReasignaMasiva, para reasignar masiva los radicados
***/
$permReasignaMasiva = $assoc == 0 ? $rsCrea->fields["usua_perm_reasigna_masiva"] : $rsCrea->fields["USUA_PERM_REASIGNA_MASIVA"];

/* Permisos para consultar los radicados confidenciales */
$permRadicadosNivel = $assoc == 0 ? $rsCrea->fields["usua_perm_consulta_rad"] : $rsCrea->fields["USUA_PERM_CONSULTA_RAD"];

/* Permisos para consultar de inventario*/
$consulta_inv_documental = $assoc == 0 ? $rsCrea->fields["consulta_inv_documental"] : $rsCrea->fields["CONSULTA_INV_DOCUMENTAL"];
/* Permisos para consultar de inventario*/
$carga_inv_documental = $assoc == 0 ? $rsCrea->fields["carga_inv_documental"] : $rsCrea->fields["CARGA_INV_DOCUMENTAL"];
// $usua_perm_expedientes = $assoc == 0 ? $rsCrea->fields["usua_perm_expedientes"] : $rsCrea->fields["USUA_PERM_EXPEDIENTES"];

if($consulta_inv_documental == 1) {$consulta_inv_documental = 'on'; }else { $consulta_inv_documental = '';}
if($carga_inv_documental == 1) {$carga_inv_documental = 'on'; }else { $carga_inv_documental = '';}

$cad = "perm_tp";
$sql = "SELECT SGD_TRAD_CODIGO,SGD_TRAD_DESCR FROM SGD_TRAD_TIPORAD ORDER BY SGD_TRAD_CODIGO";
$rs_trad = $db->query($sql);
while ($arr = $rs_trad->FetchRow()) {
    if ($rsCrea->fields["USUA_PRAD_TP" . $arr['SGD_TRAD_CODIGO']] >= 0) {

        if ($rsCrea->fields["USUA_PRAD_TP" . $arr['SGD_TRAD_CODIGO']] == '') {
            ${$cad . $arr['SGD_TRAD_CODIGO']} = 0;
        } else {
            ${$cad . $arr['SGD_TRAD_CODIGO']} = $rsCrea->fields["USUA_PRAD_TP" . $arr['SGD_TRAD_CODIGO']];
        }
    } else {
        ${$cad . $arr['SGD_TRAD_CODIGO']} = 0;
    }
}
?>