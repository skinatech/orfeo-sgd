<?php

switch ($db->driver) {
    case 'mysql':
        $dependencia = $rs->fields["depe_codi"];
        $dependencianomb = $rs->fields["DEPE_NOMB"];
        $codusuario = $rs->fields["usua_codi"];
        $usua_doc = $rs->fields["usua_doc"];
        $usua_nomb = $rs->fields["usua_nomb"];
        $usua_piso = $rs->fields["usua_piso"];
        $usua_nacim = $rs->fields["usua_nacim"];
        $usua_ext = $rs->fields["usua_ext"];
        $usua_at = $rs->fields["usua_at"];
        $usua_nuevo = $rs->fields["usua_nuevo"];
        $usua_email = $rs->fields["usua_email"];
        $nombusuario = $rs->fields["usua_nomb"];
        $contraxx = $rs->fields["usua_pasw"];
        $depe_nomb = $rs->fields["DEPE_NOMB"];
        $crea_plantilla = $rs->fields["usua_adm_plantilla"];
        $usua_admin_archivo = $rs->fields["usua_admin_archivo"];
        $usua_perm_trd = $rs->fields["usua_perm_trd"];
        $usua_perm_estadistica = $rs->fields["sgd_perm_estadistica"];
        $usua_admin_sistema = $rs->fields["usua_admin_sistema"];
        $perm_radi = $rs->fields["perm_radi"];
        $usua_perm_impresion = $rs->fields["usua_perm_impresion"];
        $perm_tipif_anexo = $rs->fields["perm_tipif_anexo"];
        $perm_borrar_anexo = $rs->fields["perm_perm_borrar_anexo"];
        $usua_ver_docs = $rs->fields["usua_ver_docs"];


        if ($usua_perm_impresion == 1) {
            if ($perm_radi_salida_tp >= 1)
                $perm_radi_sal = 3;
            else
                $perm_radi_sal = 1;
        }else {
            if ($perm_radi_salida_tp >= 1)
                $perm_radi_sal = 1;
        }

        $usua_masiva = $rs->fields["usua_masiva"];
        $depe_codi_padre = $rs->fields["depe_codi_padre"];
        $usua_perm_numera_res = $rs->fields["usua_perm_numera_res"];
        $depe_codi_territorial = $rs->fields["depe_codi_territorial"];
        $usua_perm_dev = $rs->fields["usua_perm_dev"];
        $usua_perm_anu = $rs->fields["sgd_panu_codi"];
        $usua_perm_envios = $rs->fields["usua_perm_envios"];
        $usua_perm_modifica = $rs->fields["usua_perm_modifica"];
        $usuario_reasignacion = $rs->fields["usuario_reasignar"];
        $usua_perm_intergapps = $rs->fields["usua_perm_intergapps"];
        $usua_perm_firma = $rs->fields["usua_perm_firma"];
        $usua_perm_prestamo = $rs->fields["usua_perm_prestamo"];
        $usua_perm_lectpant = $rs->fields["usua_perm_accesi"];
        $usua_perm_agrcontacto = $rs->fields["usua_perm_agrcontacto"];
        $usua_perm_notifica = $rs->fields["usua_perm_notifica"];
        $usuaPermExpediente = $rs->fields["usua_perm_expediente"];
        $usuaPermRadEmail = $rs->fields["usua_perm_rademail"];
        $usua_perm_adminflujos = $rs->fields["usua_perm_adminflujos"];
        $usua_perm_avaz = $rs->fields["usua_perm_avaz"];
        $mostrar_opc_envio = 0;
        $nivelus = $rs->fields["codi_nivel"];
        $preRadica = $rs->fields["usua_perm_preradicado"];
        $firma_qr = $rs->fields["firma_qr"];
        $firma_mecanica = $rs->fields["firma_mecanica"];
        $per_consulta_inv_documental = $rs->fields["consulta_inv_documental"];
        $per_carga_inv_documental = $rs->fields["carga_inv_documental"];
        $usua_perm_expedientes = $rs->fields["usua_perm_expedientes"];

        /**
        * Autor: Luis Miguel Romero 
        * Fecga: 18-12-2019
        * Infor: Se agrega permiso para publicar documentos
        */
        $usua_perm_doc_publico = $rs->fields["usua_perm_doc_publico"];
        // by Skinatech - 11/09/2019
        // Se agrega un nuevo campo de permiso usua_nivel_consulta en la base de datos
        $usua_nivel_consulta = $rs->fields["usua_nivel_consulta"];
        $permReasignaMasiva = $rs->fields["usua_perm_reasigna_masiva"];
        $usua_perm_consulta_rad = $rs->fields["usua_perm_consulta_rad"];

        $isql = "select b.MUNI_NOMB from dependencia a,municipio b where a.muni_codi=b.muni_codi and a.dpto_codi=b.dpto_codi and a.muni_codi=b.muni_codi and a.depe_codi='$dependencia'";
        $rs = $db->query($isql);
        $depe_municipio = $rs->fields["muni_nomb"];

        /**  Consulta que a?ade los nombres y codigos de carpetas del Usuario */
        $isql = "select CARP_CODI, CARP_DESC from carpeta";
        $rs = $db->query($isql);
        $iC = 0;

        while (!$rs->EOF) {
            $iC = $rs->fields["carp_codi"];
            $descCarpetasGen[$iC] = $rs->fields["carp_desc"];
            $rs->MoveNext();
        }

        $isql = "select CODI_CARP, DESC_CARP from carpeta_per where usua_codi=$codusuario and depe_codi = '$dependencia'";
        $rs = $db->query($isql);
        $iC = 0;

        while (!$rs->EOF) {
            $iC = $rs->fields["codi_carp"];
            $descCarpetasPer[$iC] = $rs->fields["desc_carp"];
            $rs->MoveNext();
        }

        //Busca si el usuario puede integrar aplicativos
        $sqlIntegraApp = "SELECT a.SGD_APLI_DESCRIP, a.SGD_APLI_CODI, u.SGD_APLUS_PRIORIDAD  FROM SGD_APLI_APLINTEGRA a, SGD_APLUS_PLICUSUA  u
        WHERE u.USUA_DOC = '$usua_doc' AND a.SGD_APLI_CODI <> 0 AND a.SGD_APLI_CODI =  u.SGD_APLI_CODI";
        $rsIntegra = $db->conn->query($sqlIntegraApp);

        if ($rsIntegra && !$rsIntegra->EOF)
            $usua_perm_intergapps = 1;

        /*  Creada por HLP.                                         *
         *  Query para construir $cod_local. La cual contiene ID_CONTinente+ID_PAIS+id_dpto+id_mncpio.  *
         *  Si $cod_local=0, significa que NO hay un municipio como local. ORFEO DEBE TENER localidad.  *
         */
        $ADODB_COUNTRECS = true;

        $isql = "SELECT d.ID_CONT, d.ID_PAIS, d.DPTO_CODI, d.MUNI_CODI, m.MUNI_NOMB
        FROM dependencia d, municipio m
        WHERE d.ID_CONT = m.ID_CONT AND d.ID_PAIS = m.ID_PAIS AND d.DPTO_CODI = m.DPTO_CODI AND d.MUNI_CODI = m.MUNI_CODI AND d.DEPE_CODI = '$dependencia'";

        $rs_cod_local = $db->conn->query($isql);
        $ADODB_COUNTRECS = false;
        if ($rs_cod_local && !$rs_cod_local->EOF) {
            $cod_local = $rs_cod_local->fields['ID_CONT'] . "-" . str_pad($rs_cod_local->fields['ID_PAIS'], 3, 0, STR_PAD_LEFT) . "-" .
                    str_pad($rs_cod_local->fields['DPTO_CODI'], 3, 0, STR_PAD_LEFT) . "-" . str_pad($rs_cod_local->fields['MUNI_CODI'], 3, 0, STR_PAD_LEFT);
            $depe_municipio = $rs_cod_local->fields["MUNI_NOMB"];
            $codigo_municipio = $rs_cod_local->fields["MUNI_CODI"];
            $codigo_departamento = $rs_cod_local->fields["DPTO_CODI"];
            $rs_cod_local->Close();
        } else {
            $cod_local = 0;
            $depe_municipio = "CONFIGURAR EN SESSION_ORFEO.PHP";
        }
        break;
    default :
        $dependencia = $rs->fields["DEPE_CODI"];
        $dependencianomb = $rs->fields["DEPE_NOMB"];
        $codusuario = $rs->fields["USUA_CODI"];
        $usua_doc = $rs->fields["USUA_DOC"];
        $usua_nomb = $rs->fields["USUA_NOMB"];
        $usua_piso = $rs->fields["USUA_PISO"];
        $usua_nacim = $rs->fields["USUA_NACIM"];
        $usua_ext = $rs->fields["USUA_EXT"];
        $usua_at = $rs->fields["USUA_AT"];
        $usua_nuevo = $rs->fields["USUA_NUEVO"];
        $usua_email = $rs->fields["USUA_EMAIL"];
        $nombusuario = $rs->fields["USUA_NOMB"];
        $contraxx = $rs->fields["USUA_PASW"];
        $depe_nomb = $rs->fields["DEPE_NOMB"];
        $crea_plantilla = $rs->fields["USUA_ADM_PLANTILLA"];
        $usua_admin_archivo = $rs->fields["USUA_ADMIN_ARCHIVO"];
        $usua_perm_trd = $rs->fields["USUA_PERM_TRD"];
        $usua_perm_estadistica = $rs->fields["SGD_PERM_ESTADISTICA"];
        $usua_admin_sistema = $rs->fields["USUA_ADMIN_SISTEMA"];
        $perm_radi = $rs->fields["PERM_RADI"];
        $usua_perm_impresion = $rs->fields["USUA_PERM_IMPRESION"];
        $perm_tipif_anexo = $rs->fields["PERM_TIPIF_ANEXO"];
        $perm_borrar_anexo = $rs->fields["PERM_BORRAR_ANEXO"];
        $usua_ver_docs = $rs->fields["USUA_VER_DOCS"];
        if ($usua_perm_impresion == 1) {
            if ($perm_radi_salida_tp >= 1)
                $perm_radi_sal = 3;
            else
                $perm_radi_sal = 1;
        }else {
            if ($perm_radi_salida_tp >= 1)
                $perm_radi_sal = 1;
        }
        $usua_masiva = $rs->fields["USUA_MASIVA"];
        $depe_codi_padre = $rs->fields["DEPE_CODI_PADRE"];
        $usua_perm_numera_res = $rs->fields["USUA_PERM_NUMERA_RES"];
        $depe_codi_territorial = $rs->fields["DEPE_CODI_TERRITORIAL"];
        $usua_perm_dev = $rs->fields["USUA_PERM_DEV"];
        $usua_perm_anu = $rs->fields["SGD_PANU_CODI"];
        $usua_perm_envios = $rs->fields["USUA_PERM_ENVIOS"];
        $usua_perm_modifica = $rs->fields["USUA_PERM_MODIFICA"];
        $usuario_reasignacion = $rs->fields["USUARIO_REASIGNAR"];
        $usua_perm_sancionad = $rs->fields["USUA_PERM_SANCIONADOS"];
        $usua_perm_intergapps = $rs->fields["USUA_PERM_INTERGAPPS"];
        $usua_perm_firma = $rs->fields["USUA_PERM_FIRMA"];
        $usua_perm_prestamo = $rs->fields["USUA_PERM_PRESTAMO"];
        $usua_perm_lectpant = $rs->fields["USUA_PERM_ACCESI"];
        $usua_perm_agrcontacto = $rs->fields["USUA_PERM_AGRCONTACTO"];
        $usua_perm_notifica = $rs->fields["USUA_PERM_NOTIFICA"];
        $usuaPermExpediente = $rs->fields["USUA_PERM_EXPEDIENTE"];
        $usuaPermRadEmail = $rs->fields["USUA_PERM_RADEMAIL"];
        $usuaPermRadFax = $rs->fields["USUA_PERM_RADFAX"];
        $usua_perm_adminflujos = $rs->fields["USUA_PERM_ADMINFLUJOS"];
        $usua_perm_avaz = $rs->fields["USUA_PERM_AVAZ"];
        $mostrar_opc_envio = 0;
        $nivelus = $rs->fields["CODI_NIVEL"];
        $rol = $rs->fields["COD_ROL"];
        $preRadica = $rs->fields["USUA_PERM_PRERADICADO"];
        $permDescargaDocumentos = $rs->fields["DESCARGAR_DOCUMENTOS"];
        $firma_qr = $rs->fields["FIRMA_QR"];
        $firma_mecanica = $rs->fields["FIRMA_MECANICA"];
        $per_transferencias_documentales = $rs->fields["PER_TRANSFERENCIA_DOCUMENTAL"];
        $per_consulta_inv_documental = $rs->fields["CONSULTA_INV_DOCUMENTAL"];
        $per_carga_inv_documental = $rs->fields["CARGA_INV_DOCUMENTAL"];
        $usua_perm_expedientes = $rs->fields["USUA_PERM_EXPEDIENTES"];
        /**
        * Autor: Luis Miguel Romero 
        * Fecga: 18-12-2019
        * Infor: Se agrega permiso para publicar documentos
        */
        $usua_perm_doc_publico = $rs->fields["USUA_PERM_DOC_PUBLICO"];

        // by Skinatech - 11/09/2019
        // Se agrega un nuevo campo de permiso usua_nivel_consulta en la base de datos
        $usua_nivel_consulta = $rs->fields["USUA_NIVEL_CONSULTA"];
        $permReasignaMasiva = $rs->fields["USUA_PERM_REASIGNA_MASIVA"];
        $usua_perm_consulta_rad = $rs->fields["USUA_PERM_CONSULTA_RAD"];

        $isql = "select b.MUNI_NOMB from dependencia a,municipio b where a.muni_codi=b.muni_codi and a.dpto_codi=b.dpto_codi and a.muni_codi=b.muni_codi and a.depe_codi='$dependencia'";
        $rs = $db->query($isql);
        $depe_municipio = $rs->fields["MUNI_NOMB"];

        /**  Consulta que a?ade los nombres y codigos de carpetas del Usuario */
        $isql = "select CARP_CODI, CARP_DESC from carpeta";
        $rs = $db->query($isql);
        $iC = 0;

        while (!$rs->EOF) {
            $iC = $rs->fields["CARP_CODI"];
            $descCarpetasGen[$iC] = $rs->fields["CARP_DESC"];
            $rs->MoveNext();
        }

        $isql = "select CODI_CARP, DESC_CARP from carpeta_per where usua_codi=$codusuario and depe_codi = '$dependencia'";
        $rs = $db->query($isql);
        $iC = 0;

        while (!$rs->EOF) {
            $iC = $rs->fields["CODI_CARP"];
            $descCarpetasPer[$iC] = $rs->fields["DESC_CARP"];
            $rs->MoveNext();
        }

        //Busca si el usuario puede integrar aplicativos
        $sqlIntegraApp = "SELECT a.SGD_APLI_DESCRIP, a.SGD_APLI_CODI, u.SGD_APLUS_PRIORIDAD  FROM SGD_APLI_APLINTEGRA a, SGD_APLUS_PLICUSUA  u
        WHERE u.USUA_DOC = '$usua_doc' AND a.SGD_APLI_CODI <> 0 AND a.SGD_APLI_CODI =  u.SGD_APLI_CODI";
        $rsIntegra = $db->conn->query($sqlIntegraApp);

        if ($rsIntegra && !$rsIntegra->EOF)
            $usua_perm_intergapps = 1;

        /*  Creada por HLP.                                         *
         *  Query para construir $cod_local. La cual contiene ID_CONTinente+ID_PAIS+id_dpto+id_mncpio.  *
         *  Si $cod_local=0, significa que NO hay un municipio como local. ORFEO DEBE TENER localidad.  *
         */
        $ADODB_COUNTRECS = true;

        $isql = "SELECT d.ID_CONT, d.ID_PAIS, d.DPTO_CODI, d.MUNI_CODI, m.MUNI_NOMB
        FROM dependencia d, municipio m
        WHERE d.ID_CONT = m.ID_CONT AND d.ID_PAIS = m.ID_PAIS AND d.DPTO_CODI = m.DPTO_CODI AND d.MUNI_CODI = m.MUNI_CODI AND d.DEPE_CODI = '$dependencia'";

        $rs_cod_local = $db->conn->query($isql);
        $ADODB_COUNTRECS = false;
        if ($rs_cod_local && !$rs_cod_local->EOF) {
            $cod_local = $rs_cod_local->fields['ID_CONT'] . "-" . str_pad($rs_cod_local->fields['ID_PAIS'], 3, 0, STR_PAD_LEFT) . "-" .
                    str_pad($rs_cod_local->fields['DPTO_CODI'], 3, 0, STR_PAD_LEFT) . "-" . str_pad($rs_cod_local->fields['MUNI_CODI'], 3, 0, STR_PAD_LEFT);
            $depe_municipio = $rs_cod_local->fields["MUNI_NOMB"];
            $codigo_municipio = $rs_cod_local->fields["MUNI_CODI"];
            $codigo_departamento = $rs_cod_local->fields["DPTO_CODI"];
            $rs_cod_local->Close();
        } else {
            $cod_local = 0;
            $depe_municipio = "CONFIGURAR EN SESSION_ORFEO.PHP";
        }
        break;
}
?>