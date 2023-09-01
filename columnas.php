<?php

// By Skinatech - 14/08/2018
// Para la construcción del número de radicado, esto indica la parte inicial del radicado.
if ($estructuraRad == 'ymd') {
    $num = 8;
} elseif ($estructuraRad == 'ym') {
    $num = 6;
} else {
    $num = 4;
}

if ($assoc == 0) {
    $radi_nume_iden = $rs->fields["radi_nume_iden"];
    $radi_fech_radi = $rs->fields["radi_fech_radi"];
    $mrec_codi = $rs->fields["mrec_codi"];
    $ra_asun = stripslashes($rs->fields["ra_asun"]);
    $radi_desc_anex = stripslashes($rs->fields["radi_desc_anex"]);
    $radi_rem = $rs->fields["radi_rem"];
    $radi_nume_hoja = TRIM($rs->fields["radi_nume_hoja"]);
    $cuentai = $rs->fields["radi_cuentai"];
    $radi_usua_ante = $rs->fields["radi_usu_ante"];
    $radi_usua_actu = $rs->fields["radi_usua_actu"];
    $radi_depe_actu = $rs->fields["radi_depe_actu"];
    $radi_depe_radicacion = substr($verradicado, $num, $longitud_codigo_dependencia);
    $radi_depe_radi = $rs->fields["radi_depe_radi"];
    $radi_usua_radi = $rs->fields["radi_usua_radi"];
    $preRadica = $rs->fields["usua_perm_preradicado"];
    $tipoUsuarioGrupo = $rs->fields["tipo_usario_interes"];

    $motivosPqrs = $rs->fields["motivo_pqrs"];
    $atributosPqrs = $rs->fields["atributo_pqrs"];
    $fecha_apertura_buzon = $rs->fields["fecha_apertura_buzon"];
    $fechaQueja = $rs->fields["fecha_queja"];
    /***
        Autor: Jenny Gamez
        Fecha: 2019-09-11
        Info: (mejora) Se agrega un nuevo campo de permiso usua_nivel_consulta en la base de datos
     ***/
    $usua_nivel_consulta = $rs->fields["usua_nivel_consulta"];
    $radi_path = $rs->fields["radi_path"];
    /***
        Skinatech
        Autor: Jenny Gamez
        Fecha: 03-11-2019
        Info: Estas variables guarda la información relacionada a si autoriza o no el envio de notificaciones
        por correo electronico y si el documento o radicado es publico
     ***/
    $fechavencimientorad = $rs->fields["fech_vcmto"];
    $ejetematico = $rs->fields["radi_eje_tematico"];
    $enviocorreo = $rs->fields["radi_envio_correo"];
    $radEstadoPqr = $rs->fields["radi_estado_pqrs"];
    //$recordR["RADICADO_REFERENCIA_CLIENTE"] = "$this->radicadoReferenciaCliente";
    $radi_docu_publico = $rs->fields["radi_docu_publico"];
    $nivel_seguridad = $rs->fields["nivel_seguridad"];

} else {

    $radi_nume_iden = $rs->fields["RADI_NUME_IDEN"];
    $radi_fech_radi = $rs->fields["RADI_FECH_RADI"];
    $mrec_codi = $rs->fields["MREC_CODI"];
    $ra_asun = stripslashes($rs->fields["RA_ASUN"]);
    $radi_desc_anex = stripslashes($rs->fields["RADI_DESC_ANEX"]);
    $radi_rem = $rs->fields["RADI_REM"];
    $radi_nume_hoja = TRIM($rs->fields["RADI_NUME_HOJA"]);
    $cuentai = $rs->fields["RADI_CUENTAI"];
    $radi_usua_ante = $rs->fields["RADI_USU_ANTE"];
    $radi_usua_actu = $rs->fields["RADI_USUA_ACTU"];
    $radi_depe_actu = $rs->fields["RADI_DEPE_ACTU"];
    $radi_depe_radicacion = substr($verradicado, $num, $longitud_codigo_dependencia);
    $radi_depe_radi = $rs->fields["RADI_DEPE_RADI"];
    $radi_usua_radi = $rs->fields["RADI_USUA_RADI"];
    $preRadica = $rs->fields["USUA_PERM_PRERADICADO"];
    $tipoUsuarioGrupo = $rs->fields["TIPO_USARIO_INTERES"];

    $motivosPqrs = $rs->fields["MOTIVO_PQRS"];
    $atributosPqrs = $rs->fields["ATRIBUTO_PQRS"];
    $fecha_apertura_buzon = $rs->fields["FECHA_APERTURA_BUZON"];
    $fechaQueja = $rs->fields["FECHA_QUEJA"];
    /***
        Autor: Jenny Gamez
        Fecha: 2019-09-11
        Info: (mejora) Se agrega un nuevo campo de permiso usua_nivel_consulta en la base de datos
     ***/
    $usua_nivel_consulta = $rs->fields["USUA_NIVEL_CONSULTA"];
    $radi_path = $rs->fields["RADI_PATH"];
    /***
        Skinatech
        Autor: Jenny Gamez
        Fecha: 03-11-2019
        Info: Estas variables guarda la información relacionada a si autoriza o no el envio de notificaciones
        por correo electronico y si el documento o radicado es publico
     ***/
    $fechavencimientorad = $rs->fields["FECH_VCMTO"];
    $ejetematico = $rs->fields["RADI_EJE_TEMATICO"];
    $enviocorreo = $rs->fields["RADI_ENVIO_CORREO"];
    $radEstadoPqr = $rs->fields["RADI_ESTADO_PQRS"];
    //$recordR["RADICADO_REFERENCIA_CLIENTE"] = "$this->radicadoReferenciaCliente";
    $radi_docu_publico = $rs->fields["RADI_DOCU_PUBLICO"];
    $nivel_seguridad = $rs->fields["NIVEL_SEGURIDAD"];

}