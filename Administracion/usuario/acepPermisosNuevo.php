<?php

/* * ********************************************************************************** */
/* ORFEO GPL:Sistema de Gestion Documental      http://www.orfeogpl.org      */
/*  Idea Original de la SUPERINTENDENCIA DE SERVICIOS PUBLICOS DOMICILIARIOS     */
/*              COLOMBIA TEL. (57) (1) 6913005  yoapoyo@orfeogpl.org   */
/* ===========================                                                       */
/*                                                                                   */
/* Este programa es software libre. usted puede redistribuirlo y/o modificarlo       */
/* bajo los terminos de la licencia GNU General Public publicada por                 */
/* la "Free Software Foundation"; Licencia version 2.                        */
/*                                                                                   */
/* Copyright (c) 2005 por :                                              */
/* SSPS "Superintendencia de Servicios Publicos Domiciliarios"                       */
/*   Sixto Angel Pinzon Lopez --- angel.pinzon@gmail.com   Desarrollador             */
/* C.R.A.  "COMISION DE REGULACION DE AGUAS Y SANEAMIENTO AMBIENTAL"                 */
/*   Lucia Ojeda          lojedaster@gmail.com             Desarrolladora            */
/* D.N.P. "Departamento Nacional de Planeacion"                                      */
/*   Hollman Ladino       hollmanlp@gmail.com                Desarrollador           */
/*                                                                                   */
/* Colocar desde esta linea las Modificaciones Realizadas Luego de la Version 3.5    */
/*  Nombre Desarrollador   Correo     Fecha   Modificacion                           */
/* * ********************************************************************************** */
include "traePermisos.php";

if ($usuLogin) {
    if ($prestamo) {
        $isql_inicial = $isql_inicial . " USUA_PERM_PRESTAMO, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_PERM_PRESTAMO, ";
        $isql_final = $isql_final . "0, ";
    }

    if ($digitaliza) {
        $isql_inicial = $isql_inicial . " PERM_RADI, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " PERM_RADI, ";
        $isql_final = $isql_final . "0, ";
    }

    if ($masiva) {
        $isql_inicial = $isql_inicial . " USUA_MASIVA, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_MASIVA, ";
        $isql_final = $isql_final . "0, ";
    }

    /////////////////////////  PERMISOS TIPOS DE RADICADOS /////////////////////
    $cad = "perm_tp";
    $sql = "SELECT SGD_TRAD_CODIGO,SGD_TRAD_DESCR,SGD_TRAD_GENRADSAL FROM SGD_TRAD_TIPORAD where mostrar_como_tipo=1 ORDER BY SGD_TRAD_CODIGO";
    $rs_trad = $db->query($sql);
    while ($arr = $rs_trad->FetchRow()) {
        $isql_inicial .= "USUA_PRAD_TP" . $arr['SGD_TRAD_CODIGO'] . ", ";
        $isql_final .= ${$cad . $arr['SGD_TRAD_CODIGO']} . ", ";
    }
    ////////////////////////////////////////////////////////////////////////////

    if ($modificaciones) {
        $isql_inicial = $isql_inicial . "USUA_PERM_MODIFICA, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . "USUA_PERM_MODIFICA, ";
        $isql_final = $isql_final . "0, ";
    }

    if ($impresion) {
        $isql_inicial = $isql_inicial . " USUA_PERM_IMPRESION, ";
        $isql_final = $isql_final . $impresion . ", ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_PERM_IMPRESION, ";
        $isql_final = $isql_final . "0, ";
    }

    if (($s_anulaciones) && !($anulaciones)) {
        $isql_inicial = $isql_inicial . " SGD_PANU_CODI, ";
        $isql_final = $isql_final . "1, ";
    }
    if (($anulaciones) && !($s_anulaciones)) {
        $isql_inicial = $isql_inicial . " SGD_PANU_CODI, ";
        $isql_final = $isql_final . "2, ";
    }
    if (($s_anulaciones) && ($anulaciones)) {
        $isql_inicial = $isql_inicial . " SGD_PANU_CODI, ";
        $isql_final = $isql_final . "3, ";
    }
    if ($adm_archivo) {
        $isql_inicial = $isql_inicial . " USUA_ADMIN_ARCHIVO, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_ADMIN_ARCHIVO, ";
        $isql_final = $isql_final . "0, ";
    }
    if ($dev_correo) {
        $isql_inicial = $isql_inicial . " USUA_PERM_DEV, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_PERM_DEV, ";
        $isql_final = $isql_final . "0, ";
    }
    if ($adm_sistema) {
        $isql_inicial = $isql_inicial . " USUA_ADMIN_SISTEMA, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_ADMIN_SISTEMA, ";
        $isql_final = $isql_final . "0, ";
    }
    if ($usua_nuevoM) {
        $isql_inicial = $isql_inicial . " USUA_NUEVO, ";
        $isql_final = $isql_final . "0, ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_NUEVO, ";
        $isql_final = $isql_final . "1, ";
    }
    if ($env_correo) {
        $isql_inicial = $isql_inicial . " USUA_PERM_ENVIOS, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_PERM_ENVIOS, ";
        $isql_final = $isql_final . "0, ";
    }
    if ($estadisticas) {
        $isql_inicial = $isql_inicial . " SGD_PERM_ESTADISTICA, ";
        $isql_final = $isql_final . $estadisticas . ", ";
    } else {
        $isql_inicial = $isql_inicial . " SGD_PERM_ESTADISTICA, ";
        $isql_final = $isql_final . "0, ";
    }

    if ($usua_activo) {
        $isql_inicial = $isql_inicial . " USUA_ESTA, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_ESTA, ";
        $isql_final = $isql_final . "0, ";
    }
    if ($tablas) {
        $isql_inicial = $isql_inicial . " USUA_PERM_TRD, ";
        //by skina 
        //permiso 0, 1-->listado trd, 2-->todo
        $isql_final = $isql_final . $tablas . ", ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_PERM_TRD, ";
        $isql_final = $isql_final . "0, ";
    }

    if ($usua_publico) {
        $isql_inicial = $isql_inicial . " USUARIO_PUBLICO, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUARIO_PUBLICO, ";
        $isql_final = $isql_final . "0, ";
    }

    if ($reasigna) {
        $isql_inicial = $isql_inicial . " USUARIO_REASIGNAR, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUARIO_REASIGNAR, ";
        $isql_final = $isql_final . "0, ";
    }

    if ($firma) {
        $isql_inicial = $isql_inicial . " USUA_PERM_FIRMA, ";
        $isql_final = $isql_final . $firma . ", ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_PERM_FIRMA, ";
        $isql_final = $isql_final . "0, ";
    }

    if ($notifica) {
        $isql_inicial = $isql_inicial . " USUA_PERM_NOTIFICA, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_PERM_NOTIFICA, ";
        $isql_final = $isql_final . "0, ";
    }
    /* Modificacio SKina
      Permiso de uso de lector de pantallas
      20-NOV-2013 INCI */

    if ($lectpant) {
        $isql_inicial = $isql_inicial . " USUA_PERM_ACCESI, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_PERM_ACCESI, ";
        $isql_final = $isql_final . "0, ";
    }

    /* Modificacio SKina
      Permiso Agregar contactos
      31-JULIO-2014 EAAAE */

    if ($usua_perm_agrcontacto) {
        $isql_inicial = $isql_inicial . " USUA_PERM_AGRCONTACTO, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_PERM_AGRCONTACTO, ";
        $isql_final = $isql_final . "0, ";
    }
    if ($usuaPermRadEmail) {
        $isql_inicial = $isql_inicial . " USUA_PERM_RADEMAIL, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_PERM_RADEMAIL, ";
        $isql_final = $isql_final . "0, ";
    }
    if ($preRadica) {
        $isql_inicial = $isql_inicial . "USUA_PERM_PRERADICADO, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . "USUA_PERM_PRERADICADO, ";
        $isql_final = $isql_final . "0, ";
    }

    if ($permDescargaDocumentos) {
        $isql_inicial = $isql_inicial . "DESCARGAR_DOCUMENTOS, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . "DESCARGAR_DOCUMENTOS, ";
        $isql_final = $isql_final . "0, ";
    } 
 
    /***
    Autor: Jenny Gamez
    Fecha: 2019-10-22
    Info: Se agrega un nuevo campo de permiso $permReasignaMasiva, para reasignar masiva los radicados
    ***/    
    if ($permReasignaMasiva) {
        $isql_inicial = $isql_inicial . "usua_perm_reasigna_masiva, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . "usua_perm_reasigna_masiva, ";
        $isql_final = $isql_final . "0, ";
    }
    /***
    Autor: Jenny Gamezvim 
    Fecha: 2019-10-22
    Info: Fin
    ***/
    
    if ($autenticaLDAP) {
        $isql_inicial = $isql_inicial . " USUA_AUTH_LDAP, ";
        $isql_final = $isql_final . "1, ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_AUTH_LDAP, ";
        $isql_final = $isql_final . "0, ";
    }
    if ($usua_permexp) {
        $isql_inicial = $isql_inicial . " USUA_PERM_EXPEDIENTE, ";
        $isql_final = $isql_final . $usua_permexp . ", ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_PERM_EXPEDIENTE, ";
        $isql_final = $isql_final . "0, ";
    }
    /*** FRIMA_QR ***/
    if ($firma_qr) {
        $isql_inicial = $isql_inicial . " FIRMA_QR, ";
        $isql_final = $isql_final . $firma_qr . ", ";
    } else {
        $isql_inicial = $isql_inicial . " FIRMA_QR, ";
        $isql_final = $isql_final . "0, ";
    }
    /*** FRIMA_MECANICA ***/
    if ($firma_mecanica) {
        $isql_inicial = $isql_inicial . " FIRMA_MECANICA, ";
        $isql_final = $isql_final . $firma_mecanica . ", ";
    } else {
        $isql_inicial = $isql_inicial . " FIRMA_MECANICA, ";
        $isql_final = $isql_final . "0, ";
    }
    /*** DESCARGA_ARC_ORIGINAL ***/
    if ($descarga_arc_original) {
        $isql_inicial = $isql_inicial . " DESCARGA_ARC_ORIGINAL, ";
        $isql_final = $isql_final . $descarga_arc_original . ", ";
    } else {
        $isql_inicial = $isql_inicial . " DESCARGA_ARC_ORIGINAL, ";
        $isql_final = $isql_final . "0, ";
    }
    /*** TRANSFERENCIAS DOCUMENTALES ***/
    if ($per_transferencias_documentales) {
        $isql_inicial = $isql_inicial . " PER_TRANSFERENCIA_DOCUMENTAL, ";
        $isql_final = $isql_final . $per_transferencias_documentales . ", ";
    } else {
        $isql_inicial = $isql_inicial . " PER_TRANSFERENCIA_DOCUMENTAL, ";
        $isql_final = $isql_final . "0, ";
    }
    /**
    * Autor: Luis miguel Romero
    * Fecha: 18-12-2019
    * Info: Se agrega permiso para publicar documentos de los radicados: $usua_perm_doc_publico
    */
    /*** DOCUMENTOS PUBLICOS ***/
    if ($usua_perm_doc_publico) {
        $isql_inicial = $isql_inicial . " USUA_PERM_DOC_PUBLICO, ";
        $isql_final = $isql_final . $usua_perm_doc_publico . ", ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_PERM_DOC_PUBLICO, ";
        $isql_final = $isql_final . "0, ";
    }


    /* Permisos para consultar los radicados confidenciales */
    if($permRadicadosNivel){
        $isql_inicial = $isql_inicial . " USUA_PERM_CONSULTA_RAD, ";
        $isql_final = $isql_final . $permRadicadosNivel . ", ";
    } else {
        $isql_inicial = $isql_inicial . " USUA_PERM_CONSULTA_RAD, ";
        $isql_final = $isql_final . "0, ";
    }

    /* Permisos para consultar de inventario*/
    if($consulta_inv_documental){
        $isql = $isql. " CONSULTA_INV_DOCUMENTAL = 1,";
    } else
        $isql = $isql . " CONSULTA_INV_DOCUMENTAL = 0, ";

    /* Permisos para carga de inventario    */
    if($carga_inv_documental){
        $isql = $isql. " CARGA_INV_DOCUMENTAL = 1,";
    } else
        $isql = $isql . " CARGA_INV_DOCUMENTAL = 0, ";

    /* Permisos para usua_perm_expedientes */
    // if($usua_perm_expedientes){
    //     $isql = $isql. " usua_perm_expedientes = 1,";
    // } else
    //     $isql = $isql . " usua_perm_expedientes = 0, ";

    //Nivel de Seguridad
    if (!$nivel)
        $nivel = 1;
    
    /***
    Autor: Jenny Gamez
    Fecha: 2019-09-21
    Info: Se agrega un nuevo campo de permiso usua_nivel_consulta en la base de datos
          SI el nivel de usuario es 1 o 2 solo el usuario va poder consultar lo de su usuario
          Si el vivel de usuario es 3 solo el usuario va poder consultar lo de su dependencia
          Si el nivel de usuario es 4 o 5 el usuario va a poder consultar todo
    ***/
    switch ($nivel){
        case 1: 
            $usua_nivel_consulta = 1;
            break;
        case 2:
            $usua_nivel_consulta = 1;
            break;
        case 3: 
            $usua_nivel_consulta = 2;
            break;
        case 4:
            $usua_nivel_consulta = 3;
            break;
        case 5:
            $usua_nivel_consulta = 3;
            break;
    }

    $isql_inicial = $isql_inicial . " USUA_NIVEL_CONSULTA, ";
    $isql_final = $isql_final . $usua_nivel_consulta . ", ";
    /***
    Autor: Jenny Gamez
    Fecha: 2019-09-21
    Info: Fin
    ***/
    
    $isql_inicial = $isql_inicial . " CODI_NIVEL) ";
    $isql_final = $isql_final . $nivel . ") ";
}
?>