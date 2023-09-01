<?php

if (isset($_POST['codrol'])) {
    $select = 'select * from perfiles where codi_perfil=' . $_POST['codrol'];
    $rssqlselect = $db->query($select);

    if ($rssqlselect) {
        $usua_activo = $assoc == 0 ? $rssqlselect->fields["usua_esta"] : $rssqlselect->fields["USUA_ESTA"];
        $prestamo = $assoc == 0 ? $rssqlselect->fields["usua_perm_prestamo"] : $rssqlselect->fields["USUA_PERM_PRESTAMO"];
        $digitaliza = $assoc == 0 ? $rssqlselect->fields["perm_radi"] : $rssqlselect->fields["PERM_RADI"];
        $modificaciones = $assoc == 0 ? $rssqlselect->fields["usua_perm_modifica"] : $rssqlselect->fields["USUA_PERM_MODIFICA"];
        $env_correo = $assoc == 0 ? $rssqlselect->fields["usua_perm_envios"] : $rssqlselect->fields["USUA_PERM_ENVIOS"];
        $estadisticas = $assoc == 0 ? $rssqlselect->fields["sgd_perm_estadistica"] : $rssqlselect->fields["SGD_PERM_ESTADISTICA"];
        $adm_sistema = $assoc == 0 ? $rssqlselect->fields["usua_admin_sistema"] : $rssqlselect->fields["USUA_ADMIN_SISTEMA"];
        $adm_archivo = $assoc == 0 ? $rssqlselect->fields["usua_admin_archivo"] : $rssqlselect->fields["USUA_ADMIN_ARCHIVO"];
        $usua_nuevoM = $assoc == 0 ? $rssqlselect->fields["usua_nuevo"] : $rssqlselect->fields["USUA_NUEVO"];
        $nivel = $assoc == 0 ? $rssqlselect->fields["codi_nivel"] : $rssqlselect->fields["CODI_NIVEL"];
        $impresion = $assoc == 0 ? $rssqlselect->fields["usua_perm_impresion"] : $rssqlselect->fields["USUA_PERM_IMPRESION"];
        $masiva = $assoc == 0 ? $rssqlselect->fields["usua_masiva"] : $rssqlselect->fields["USUA_MASIVA"];
        $dev_correo = $assoc == 0 ? $rssqlselect->fields["usua_perm_dev"] : $rssqlselect->fields["USUA_PERM_DEV"];
        $sgd_panu_codi = $assoc == 0 ? $rssqlselect->fields["sgd_panu_codi"] : $rssqlselect->fields["SGD_PANU_CODI"];
        
        if ($sgd_panu_codi == 1)
            $s_anulaciones = 1;
        if ($sgd_panu_codi == 2)
            $anulaciones = 1;
        if ($sgd_panu_codi == 3) {
            $s_anulaciones = 1;
            $anulaciones = 1;
        }
        $tablas = $assoc == 0 ? $rssqlselect->fields["usua_perm_trd"] : $rssqlselect->fields["USUA_PERM_TRD"];
        $usua_publico = $assoc == 0 ? $rssqlselect->fields["usuario_publico"] : $rssqlselect->fields["USUARIO_PUBLICO"];
        $reasigna = $assoc == 0 ? $rssqlselect->fields["usuario_reasignar"] : $rssqlselect->fields["USUARIO_REASIGNAR"];
        $firma = $assoc == 0 ? $rssqlselect->fields["usua_perm_firma"] : $rssqlselect->fields["USUA_PERM_FIRMA"];
        $notifica = $assoc == 0 ? $rssqlselect->fields["usua_perm_notifica"] : $rssqlselect->fields["USUA_PERM_NOTIFICA"];
        $usua_permexp = $assoc == 0 ? $rssqlselect->fields["usua_perm_expediente"] : $rssqlselect->fields["USUA_PERM_EXPEDIENTE"];
        $permBorraAnexos = $assoc == 0 ? $rssqlselect->fields["perm_borrar_anexo"] : $rssqlselect->fields["PERM_BORRAR_ANEXO"];
        $permTipificaAnexos = $assoc == 0 ? $rssqlselect->fields["perm_tipif_anexo"] : $rssqlselect->fields["PERM_TIPIF_ANEXO"];
        $autenticaLDAP = $assoc == 0 ? $rssqlselect->fields["usua_auth_ldap"] : $rssqlselect->fields["USUA_AUTH_LDAP"];
        $perm_adminflujos = $assoc == 0 ? $rssqlselect->fields["usua_perm_adminflujos"] : $rssqlselect->fields["USUA_PERM_ADMINFLUJOS"];
        $permArchivar = $assoc == 0 ? $rssqlselect->fields["perm_archi"] : $rssqlselect->fields["PERM_ARCHI"];
        $lectpant = $assoc == 0 ? $rssqlselect->fields["usua_perm_accesi"] : $rssqlselect->fields["USUA_PERM_ACCESI"];
        $usua_perm_agrcontacto = $assoc == 0 ? $rssqlselect->fields["usua_perm_agrcontacto"] : $rssqlselect->fields["USUA_PERM_AGRCONTACTO"];
        $preRadica = $assoc == 0 ? $rssqlselect->fields["usua_perm_preradicado"] : $rssqlselect->fields["USUA_PERM_PRERADICADO"];
        $permDescargaDocumentos = $assoc == 0 ? $rssqlselect->fields["descargar_documentos"] : $rssqlselect->fields["DESCARGAR_DOCUMENTOS"];
        $firma_qr = $assoc == 0 ? $rssqlselect->fields["firma_qr"] : $rssqlselect->fields["FIRMA_QR"];
        $firma_mecanica = $assoc == 0 ? $rssqlselect->fields["firma_mecanica"] : $rssqlselect->fields["FIRMA_MECANICA"];
        $descarga_arc_original = $assoc == 0 ? $rssqlselect->fields["descarga_arc_original"] : $rssqlselect->fields["DESCARGA_ARC_ORIGINAL"];
        $per_transferencias_documentales = $assoc == 0 ? $rssqlselect->fields["per_transferencia_documental"] : $rssqlselect->fields["PER_TRANSFERENCIA_DOCUMENTAL"];
        $usuaPermRadEmail = $assoc == 0 ? $rssqlselect->fields["usua_perm_rademail"] : $rssqlselect->fields["USUA_PERM_RADEMAIL"];
        /**
        * Autor: Luis Miguel Romero 
        * Fecga: 18-12-2019
        * Infor: Se agrega permiso para publicar documentos
        */
        $usua_perm_doc_publico = $assoc == 0 ? $rssqlselect->fields["usua_perm_doc_publico"] : $rssqlselect->fields["USUA_PERM_DOC_PUBLICO"];
        
        /***
        Autor: Jenny Gamez
        Fecha: 2019-09-21
        Info: Se agrega un nuevo campo de permiso usua_nivel_consulta en la base de datos
        ***/
        $usua_nivel_consulta = $assoc == 0 ? $rssqlselect->fields["usua_nivel_consulta"] : $rssqlselect->fields["USUA_NIVEL_CONSULTA"];
        /***
        Autor: Jenny Gamez
        Fecha: 2019-09-21
        Info: Fin
        ***/
        
        /***
        Autor: Jenny Gamez
        Fecha: 2019-10-22
        Info: Se agrega un nuevo campo de permiso $permReasignaMasiva, para reasignar masiva los radicados
        ***/
        $permReasignaMasiva = $assoc == 0 ? $rssqlselect->fields["usua_perm_reasigna_masiva"] : $rssqlselect->fields["USUA_PERM_REASIGNA_MASIVA"];

        /* Permisos para consultar los radicados confidenciales */
        $permRadicadosNivel = $assoc == 0 ? $rssqlselect->fields["usua_perm_consulta_rad"] : $rssqlselect->fields["USUA_PERM_CONSULTA_RAD"];

        /* Permisos para consultar de inventario*/
        $permConsultaInv = $assoc == 0 ? $rssqlselect->fields["consulta_inv_documental"] : $rssqlselect->fields["CONSULTA_INV_DOCUMENTAL"];
        /* Permisos para consultar de inventario*/
        $permCargaInv = $assoc == 0 ? $rssqlselect->fields["carga_inv_documental"] : $rssqlselect->fields["CARGA_INV_DOCUMENTAL"];
        /* Permisos para acceder o no al módulo de expedientes*/
        // $usua_perm_expedientes = $assoc == 0 ? $rssqlselect->fields["usua_perm_expedientes"] : $rssqlselect->fields["USUA_PERM_EXPEDIENTES"];

        $cad = "perm_tp";
        $sql = "SELECT SGD_TRAD_CODIGO,SGD_TRAD_DESCR FROM SGD_TRAD_TIPORAD where mostrar_como_tipo=1 ORDER BY SGD_TRAD_CODIGO";
        $rs_trad = $db->query($sql);
        while ($arr = $rs_trad->FetchRow()) {
            if ($rssqlselect->fields["USUA_PRAD_TP" . $arr['SGD_TRAD_CODIGO']] >= 0) {

                if ($rssqlselect->fields["USUA_PRAD_TP" . $arr['SGD_TRAD_CODIGO']] == '') {
                    ${$cad . $arr['SGD_TRAD_CODIGO']} = 0;
                } else {
                    ${$cad . $arr['SGD_TRAD_CODIGO']} = $rssqlselect->fields["USUA_PRAD_TP" . $arr['SGD_TRAD_CODIGO']];
                }
            } else {
                ${$cad . $arr['SGD_TRAD_CODIGO']} = 0;
            }
        }

        if($digitaliza == 1){ $digitaliza = 'on'; } else { $digitaliza = ''; }
        if($modificaciones == 1){ $modificaciones = 'on'; } else { $modificaciones = ''; }
        if($masiva == 1){ $masiva = 'on'; } else { $masiva = ''; }
        if($prestamo == 1){ $prestamo = 'on'; } else { $prestamo = ''; }
        if($s_anulaciones == 1){ $s_anulaciones = 'on'; } else { $s_anulaciones = ''; }
        if($anulaciones == 1){ $anulaciones = 'on'; } else { $anulaciones = ''; }
        if($dev_correo == 1){ $dev_correo = 'on'; } else { $dev_correo = ''; }
        if($adm_sistema == 1){ $adm_sistema = 'on'; } else { $adm_sistema = ''; }
        if($env_correo == 1){ $env_correo = 'on'; } else { $env_correo = ''; }
        if($reasigna == 1){ $reasigna = 'on'; } else { $reasigna = ''; }
        if($usua_activo == 1){ $usua_activo = 'on'; } else { $usua_activo = ''; }
        if($usua_nuevoM == 1){ $usua_nuevoM = 'on'; } else { $usua_nuevoM = ''; }
        if($permArchivar == 1){ $permArchivar = 'on'; } else { $permArchivar = ''; }
        if($usua_publico == 1){ $usua_publico = 'on'; } else { $usua_publico = ''; }
        if($preRadica == 1){ $preRadica = 'on'; } else { $preRadica = ''; }
        if($autenticaLDAP== 1){ $autenticaLDAP = 'on'; } else { $autenticaLDAP = ''; }
        if($permBorraAnexos == 1){ $permBorraAnexos = 'on'; } else { $permBorraAnexos = ''; }
        if($permTipificaAnexos == 1) {$permTipificaAnexos = 'on'; }else { $permTipificaAnexos = '';}
        if($permDescargaDocumentos == 1) {$permDescargaDocumentos = 'on'; }else { $permDescargaDocumentos = '';}
        if($firma_qr == 1) {$firma_qr = 'on'; }else{ $firma_qr = '';}
        if($firma_mecanica == 1) {$firma_mecanica = 'on'; }else{ $firma_mecanica = '';}
        if($descarga_arc_original == 1) {$descarga_arc_original = 'on'; }else { $descarga_arc_original = '';}
        if($per_transferencias_documentales == 1) {$per_transferencias_documentales = 'on'; }else{ $per_transferencias_documentales = '';}        
        if($usuaPermRadEmail == 1) {$usuaPermRadEmail = 'on'; }else { $usuaPermRadEmail = '';}
        if($permReasignaMasiva == 1) {$permReasignaMasiva = 'on'; }else { $permReasignaMasiva = '';}
        if($permRadicadosNivel == 1) {$permRadicadosNivel = 'on'; }else { $permRadicadosNivel = '';}
        if($permConsultaInv == 1) {$permConsultaInv = 'on'; }else { $permConsultaInv = '';}
        if($permCargaInv == 1) {$permCargaInv = 'on'; }else { $permCargaInv = '';}
        // if($usua_perm_expedientes == 1 ){ $usua_perm_expedientes = 'on'; }else { $usua_perm_expedientes = '';}
        
        /**
        * Autor: Luis Miguel Romero 
        * Fecga: 18-12-2019
        * Infor: Se agrega permiso para publicar documentos $usua_perm_doc_publico
        */
        if($usua_perm_doc_publico == 1) {$usua_perm_doc_publico = 'on'; }else{ $usua_perm_doc_publico = '';}

    }
}
?>
