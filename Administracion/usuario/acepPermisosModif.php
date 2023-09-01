<?php
session_start();
/* * ********************************************************************************** */
/* ORFEO : Sistema de Gestion Documental        http://www.orfeogpl.org      */
/*  Idea Original de la SUPERINTENDENCIA DE SERVICIOS PUBLICOS DOMICILIARIOS     */
/*              COLOMBIA TEL. (57) (1) 6913005  yoapoyo@orfeogpl.org */
/* ===========================                                                       */
/*                                                                                   */
/* Este programa es software libre. ustted puede redistribuirlo y/o modificarlo      */
/* bajo los terminos de la licencia GNU General Public publicada por                 */
/* la "Free Software Foundation"; Licencia version 2.                        */
/*                                                                                   */
/* Copyright (c) 2005 por :                                              */
/* SSPS "Superintendencia de Servicios Publicos Domiciliarios"                       */
/*   Jairo Hernan Losada  jlosada@gmail.com                Desarrollador             */
/*   Sixto Angel Pinzon oppez --- angel.pinzon@gmail.com   Desarrollador             */
/* C.R.A.  "COMISION DE REGULACION DE AGUAS Y SANEAMIENTO AMBIENTAL"                 */
/*   Liliana Gomez        lgomezv@gmail.com                Desarrolladora            */
/*   Lucia Ojeda          lojedaster@gmail.com             Desarrolladora            */
/* D.N.P. "Departamento Nacional de Planeacion"                                      */
/*   Hollman Ladino       hollmanlp@gmail.com                Desarrollador           */
/*                                                                                   */
/* Colocar desde esta lInea las Modificaciones Realizadas Luego de la Version 3.5    */
/*  Nombre Desarrollador   Correo     Fecha   Modificacion                           */
/* * ********************************************************************************** */
?>
<?php
$ruta_raiz = "../..";

if (!$_SESSION['dependencia'] or ! $_SESSION['tpDepeRad'])
    include "$ruta_raiz/rec_session.php";
include_once "$ruta_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$ruta_raiz");
//$db->conn->debug=true;
error_reporting(0);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
if ($usuLogin) {
    $sqlFechaHoy = $db->conn->DBTimeStamp(time());

    $isql = "UPDATE USUARIO SET ";

    if ($prestamo)
        $isql = $isql . " USUA_PERM_PRESTAMO = 1, ";
    else
        $isql = $isql . " USUA_PERM_PRESTAMO = 0, ";

    if ($digitaliza)
        $isql = $isql . " PERM_RADI = 1, ";
    else
        $isql = $isql . " PERM_RADI = 0, ";

    if ($masiva)
        $isql = $isql . " USUA_MASIVA = 1, ";
    else
        $isql = $isql . " USUA_MASIVA = 0, ";

    if ($impresion)
        $isql = $isql . " USUA_PERM_IMPRESION = $impresion, ";
    else
        $isql = $isql . " USUA_PERM_IMPRESION = 0, ";

    if (!($s_anulaciones) && !($anulaciones))
        $isql = $isql . " SGD_PANU_CODI = 0, ";
    if (($s_anulaciones) && !($anulaciones))
        $isql = $isql . " SGD_PANU_CODI = 1, ";
    if (($anulaciones) && !($s_anulaciones))
        $isql = $isql . " SGD_PANU_CODI = 2, ";
    if (($s_anulaciones) && ($anulaciones))
        $isql = $isql . " SGD_PANU_CODI = 3, ";

    if ($adm_archivo)
        $isql = $isql . " USUA_ADMIN_ARCHIVO = '$adm_archivo', ";
    else
        $isql = $isql . " USUA_ADMIN_ARCHIVO = '0', ";

    if ($dev_correo)
        $isql = $isql . " USUA_PERM_DEV = '1', ";
    else
        $isql = $isql . " USUA_PERM_DEV = '0', ";

    if ($adm_sistema)
        $isql = $isql . " USUA_ADMIN_SISTEMA = '1', ";
    else
        $isql = $isql . " USUA_ADMIN_SISTEMA = '0', ";

    if ($usua_nuevoM)
        $isql = $isql . " USUA_NUEVO = '0', ";
    else
        $isql = $isql . " USUA_NUEVO = '1', ";

    if ($env_correo)
        $isql = $isql . " USUA_PERM_ENVIOS = 1, ";
    else
        $isql = $isql . " USUA_PERM_ENVIOS = 0, ";

    if ($estadisticas)
        $isql = $isql . " SGD_PERM_ESTADISTICA = $estadisticas, ";
    else
        $isql = $isql . " SGD_PERM_ESTADISTICA = 0, ";

    if ($firma)
        $isql = $isql . " USUA_PERM_FIRMA = $firma, ";
    else
        $isql = $isql . " USUA_PERM_FIRMA = 0, ";

    if ($reasigna) {
        $isql = $isql . " USUARIO_REASIGNAR = 1, ";
    } else
        $isql = $isql . " USUARIO_REASIGNAR = 0, ";

    if ($usua_publico) {
        $isql = $isql . " USUARIO_PUBLICO = 1, ";
    } else
        $isql = $isql . " USUARIO_PUBLICO = 0, ";

    if ($permBorraAnexos) {

        $isql = $isql . " PERM_BORRAR_ANEXO = 1, ";
    } else
        $isql = $isql . " PERM_BORRAR_ANEXO = 0, ";

    if ($permTipificaAnexos) {
        $isql = $isql . " PERM_TIPIF_ANEXO = 1, ";
    } else
        $isql = $isql . " PERM_TIPIF_ANEXO = 0, ";

    if ($usuaPermRadEmail) {
        $isql = $isql . " USUA_PERM_RADEMAIL = 1, ";
    } else
        $isql = $isql . " USUA_PERM_RADEMAIL = 0, ";

    if ($autenticaLDAP) {
        $isql = $isql . " USUA_AUTH_LDAP = 1, ";
    } else
        $isql = $isql . " USUA_AUTH_LDAP = 0, ";

    if ($perm_adminflujos) {
        $isql = $isql . " USUA_PERM_ADMINFLUJOS = 1, ";
    } else
        $isql = $isql . " USUA_PERM_ADMINFLUJOS = 0, ";

    if ($permArchivar) {
        $isql = $isql . " PERM_ARCHI = 1, ";
    } else
        $isql = $isql . " PERM_ARCHI = 0, ";

    if ($preRadica) {
        $isql = $isql . "USUA_PERM_PRERADICADO = 1, ";
    } else {
        $isql = $isql . "USUA_PERM_PRERADICADO = 0, ";
    }

    if ($permDescargaDocumentos) {
        $isql = $isql . "DESCARGAR_DOCUMENTOS = 1, ";
    } else {
        $isql = $isql . "DESCARGAR_DOCUMENTOS = 0, ";
    }
    /*** FRIMA_QR ***/
    if ($firma_qr) {
        $isql = $isql . "FIRMA_QR = 1, ";
    } else {
        $isql = $isql . "FIRMA_QR = 0, ";
    }
    /*** FRIMA_MECANICA ***/
    if ($firma_mecanica) {
        $isql = $isql . "FIRMA_MECANICA = 1, ";
    } else {
        $isql = $isql . "FIRMA_MECANICA = 0, ";
    }
    /*** DESCARGA_ARC_ORIGINAL ***/
    if ($descarga_arc_original) {
        $isql = $isql . "DESCARGA_ARC_ORIGINAL = 1, ";
    } else {
        $isql = $isql . "DESCARGA_ARC_ORIGINAL = 0, ";
    }
    /*** TRANSFERENCIAS DOCUMENTALES ***/
    if ($per_transferencias_documentales) {
        $isql = $isql . "PER_TRANSFERENCIA_DOCUMENTAL = 1, ";
    } else {
        $isql = $isql . "PER_TRANSFERENCIA_DOCUMENTAL = 0, ";
    }

    /**
    * Autor: Luis miguel Romero
    * Fecha: 18-12-2019
    * Info: Se agrega permiso para publicar documentos de los radicados: $usua_perm_doc_publico
    */
    /*** DOCUMENTOS PUBLICOS ***/
    if ($usua_perm_doc_publico) {
        $isql = $isql . "USUA_PERM_DOC_PUBLICO = 1, ";
    } else {
        $isql = $isql . "USUA_PERM_DOC_PUBLICO = 0, ";
    }

    
    /***
    Autor: Jenny Gamez
    Fecha: 2019-10-22
    Info: Se agrega un nuevo campo de permiso $permReasignaMasiva, para reasignar masiva los radicados
    ***/
    if ($permReasignaMasiva) {
        $isql = $isql . "usua_perm_reasigna_masiva = 1, ";
    } else {
        $isql = $isql . "usua_perm_reasigna_masiva = 0, ";
    }
    /***
    Autor: Jenny Gamez
    Fecha: 2019-10-22
    Info: Fin
    ***/ 

    if ($rol_sel)
        $isql = $isql . " cod_rol = $rol_sel, ";
    else
        $isql = $isql . " cod_rol = null, ";


    // if($usua_perm_expedientes){
    //     $isql = $isql . "usua_perm_expedientes = 1, ";
    // } else {
    //     $isql = $isql . "usua_perm_expedientes = 0, ";
    // }
    
    /////////////////////////  PERMISOS TIPOS DE RADICADOS /////////////////////
    $cad = "perm_tp";
    $sql = "SELECT SGD_TRAD_CODIGO,SGD_TRAD_DESCR,SGD_TRAD_GENRADSAL FROM SGD_TRAD_TIPORAD where mostrar_como_tipo=1 ORDER BY SGD_TRAD_CODIGO";
    $rs_trad = $db->query($sql);

    while ($arr = $rs_trad->FetchRow()) {
        $isql = $isql . " USUA_PRAD_TP" . $arr['SGD_TRAD_CODIGO'] . " = " . ${$cad . $arr['SGD_TRAD_CODIGO']} . ", ";
    }
    ////////////////////////////////////////////////////////////////////////////

    if ($modificaciones) {
        $isql = $isql . " USUA_PERM_MODIFICA = 1, ";
    } else
        $isql = $isql . " USUA_PERM_MODIFICA = 0, ";

    if ($notifica) {
        $isql = $isql . " USUA_PERM_NOTIFICA = 1, ";
    } else
        $isql = $isql . " USUA_PERM_NOTIFICA = 0, ";

    if ($usua_permexp)
        $isql = $isql . " USUA_PERM_EXPEDIENTE = $usua_permexp, ";
    else
        $isql = $isql . " USUA_PERM_EXPEDIENTE = 0, ";

    /* Modificacio SKina
      Permiso de uso de lector de pantallas
      20-NOV-2013 INCI */

    if ($lectpant) {
        $isql = $isql . " USUA_PERM_ACCESI = 1, ";
    } else
        $isql = $isql . " USUA_PERM_ACCESI = 0, ";

    /* Modificacio SKina
      Permiso para Agregar contactps
      31-JULIO-2014 EAAAE */

    if ($usua_perm_agrcontacto) {
        $isql = $isql . " USUA_PERM_AGRCONTACTO = 1, ";
    } else
        $isql = $isql . " USUA_PERM_AGRCONTACTO = 0, ";

    /* Permisos para consultar los radicados confidenciales*/
    if($permRadicadosNivel){
        $isql = $isql. " USUA_PERM_CONSULTA_RAD = 1,";
    } else
        $isql = $isql . " USUA_PERM_CONSULTA_RAD = 0, ";

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

    if ($usua_activo)
        $isql = $isql . " USUA_ESTA = '1', ";
    else {
        $isql = $isql . " USUA_ESTA = '0', ";
        if ($radicado) {
            ?>
            <table align="center" border="2" bordercolor="#000000">
                <form name="frmAbortar" action="../formAdministracion.php" method="post">
                    <tr bordercolor="#FFFFFF"> <td width="211" height="30" colspan="2" class="listado2"><p><span class=etexto>
                                    <center><B>El usuario <?= $usuLogin ?> tiene radicados a su cargo, NO PUEDE INACTIVARSE</B></center>
                                </span></p> </td> </tr>
                    <tr bordercolor="#FFFFFF">  <td height="30" colspan="2" class="listado2">
                    <center><input class="botones" type="submit" name="Submit" value="Aceptar"></center>
                    <input name="PHPSESSID" type="hidden" value='<?= session_id() ?>'>
                    <input name="krd" type="hidden" value='<?= $krd ?>'>
                    </td> </tr>
                </form>
            </table>
            <?php
            $swConRadicado = "SI";
            return;
        }
    }

    //by skina
    //Permiso 0,1 --> listado de trd ,2 --> todo
    if ($tablas)
        $isql = $isql . " USUA_PERM_TRD = '$tablas', ";
    else
        $isql = $isql . " USUA_PERM_TRD = '0', ";

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
    
    $isql = $isql . " USUA_NIVEL_CONSULTA= $usua_nivel_consulta , "; 
    /***
    Autor: Jenny Gamez
    Fecha: 2019-09-21
    Info: Fin
    ***/
    
    $isql = $isql . " CODI_NIVEL = $nivel ";
    $isql = $isql . " where USUA_LOGIN = '" . $usuLogin . "'";
    $isql1 = "select * from USUARIO WHERE USUA_LOGIN = '" . $usuLogin . "'";
//    $db->conn->debug = true;
    $rs1 = $db->query($isql1);
    $rs = $db->query($isql);
    $isqldesp = "select * from USUARIO WHERE USUA_LOGIN = '" . $usuLogin . "'";
    $rs = $db->query($isqldesp);
}
?>
<html>
    <head>
        <title></title>
    </head>
    <body style="background-color:#FFFFFF">
        <?php
        if ($db->conn->Execute($isql) == false) {
            echo "Existe un error en los datos diligenciados";
        } else {
            if ($rs->fields["usua_esta"] <> $rs1->fields["usua_esta"]) {
                $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ", '" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 9, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                $db->conn->Execute($isql);
            }

            if ($rs->fields["usua_prad_tp1"] <> $rs1->fields["usua_prad_tp1"]) {
                if ($rs->fields["usua_prad_tp1"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 19, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_prad_tp1"] == 2) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 20, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_prad_tp1"] == 3) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 35, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["usua_prad_tp2"] <> $rs1->fields["usua_prad_tp2"]) {
                if ($rs->fields["usua_prad_tp2"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ", '" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 41, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
                if ($rs->fields["usua_prad_tp2"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ", '" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 10, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_prad_tp2"] == 2) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 11, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["USUA_PRAD_TP3"] <> $rs1->fields["USUA_PRAD_TP3"]) {
                if ($rs->fields["USUA_PRAD_TP3"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 28, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["USUA_PRAD_TP3"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 29, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["USUA_PRAD_TP5"] <> $rs1->fields["USUA_PRAD_TP5"]) {
                if ($rs->fields["USUA_PRAD_TP5"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 30, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["USUA_PRAD_TP5"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 31, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["usua_perm_modifica"] <> $rs1->fields["usua_perm_modifica"]) {
                if ($rs->fields["usua_perm_modifica"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "',49, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_perm_modifica"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 48, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["perm_radi"] <> $rs1->fields["perm_radi"]) {
                if ($rs->fields["perm_radi"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "',46, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["perm_radi"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 45, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["usua_admin_sistema"] <> $rs1->fields["usua_admin_sistema"]) {
                if ($rs->fields["usua_admin_sistema"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 12, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_admin_sistema"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 13, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["usua_perm_prestamo"] <> $rs1->fields["usua_perm_prestamo"]) {
                if ($rs->fields["usua_perm_prestamo"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 44, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_perm_prestamo"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 43, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["usua_admin_archivo"] <> $rs1->fields["usua_admin_archivo"]) {
                if ($rs->fields["usua_admin_archivo"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 14, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_admin_archivo"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 15, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_admin_archivo"] == 2) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 76, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["usua_nuevo"] <> $rs1->fields["usua_nuevo"]) {
                if ($rs->fields["usua_nuevo"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 16, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_nuevo"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 17, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["codi_nivel"] <> $rs1->fields["codi_nivel"]) {
                $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 18, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                $db->conn->Execute($isql);
            }

            if ($rs->fields["usua_masiva"] <> $rs1->fields["usua_masiva"]) {
                if ($rs->fields["usua_masiva"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 22, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_masiva"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 21, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                    //by skina, modificamos el codigo de la carpeta masiva a 99
                    $isql = "SELECT CODI_CARP FROM CARPETA_PER WHERE USUA_CODI = " . $nusua_codi . " AND DEPE_CODI = " . $dep_sel . " AND CODI_CARP=99";
                    $rsCarp = $db->query($isql);
                    $carpMasiva = $rsCarp->fields["CODI_CARP"];
                    if (!$carpMasiva) {
                        $isql = "INSERT INTO CARPETA_PER (USUA_CODI, DEPE_CODI, NOMB_CARP, DESC_CARP, CODI_CARP) VALUES (" . $nusua_codi . ", " . $dep_sel . ", 'Masiva', 'Radicacion Masiva', 99 )";
                        $db->conn->Execute($isql);
                    }
                }
            }


            if ($rs->fields["usua_perm_dev"] <> $rs1->fields["usua_perm_dev"]) {
                if ($rs->fields["usua_perm_dev"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 23, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_perm_dev"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 24, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["sgd_panu_codi"] <> $rs1->fields["sgd_panu_codi"]) {
                if ($rs->fields["sgd_panu_codi"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 25, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["sgd_panu_codi"] == 2) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 26, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["sgd_panu_codi"] == 3) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 27, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["usua_perm_impresion"] <> $rs1->fields["usua_perm_impresion"]) {
                if ($rs->fields["usua_perm_impresion"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 47, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_perm_impresion"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 20, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_perm_impresion"] == 2) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 64, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["usua_perm_envios"] <> $rs1->fields["usua_perm_envios"]) {
                if ($rs->fields["usua_perm_envios"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 33, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_perm_envios"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 34, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["sgd_perm_estadistica"] <> $rs1->fields["sgd_perm_estadistica"]) {
                if ($rs->fields["sgd_perm_estadistica"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 53, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["sgd_perm_estadistica"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 54, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["sgd_perm_estadistica"] == 2) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 63, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }
// Inicio modificacion 25 sep 2006
            if ($rs->fields["usua_perm_expediente"] <> $rs1->fields["usua_perm_expediente"]) {
                if ($rs->fields["usua_perm_expediente"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 71, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_perm_expediente"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 70, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_perm_expediente"] == 2) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 75, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["usua_perm_firma"] <> $rs1->fields["usua_perm_firma"]) {
                if ($rs->fields["usua_perm_firma"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 59, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_perm_firma"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 60, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_perm_firma"] == 2) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 61, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_perm_firma"] == 3) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 62, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["usua_perm_trd"] <> $rs1->fields["usua_perm_trd"]) {
                if ($rs->fields["usua_perm_trd"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 52, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usua_perm_trd"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 51, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["usuario_publico"] <> $rs1->fields["usuario_publico"]) {
                if ($rs->fields["usuario_publico"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 56, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usuario_publico"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 55, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            if ($rs->fields["usuario_reasignar"] <> $rs1->fields["usuario_reasignar"]) {
                if ($rs->fields["usuario_reasignar"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 58, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs->fields["usuario_reasignar"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1->fields["usua_codi"] . ",'" . $rs1->fields["depe_codi"] . "', '" . $cedula . "', 57, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            /*** FRIMA_QR ***/
            if ( $rs_N->fields["firma_qr"] <> $rs1_N->fields["firma_qr"] ) {
                if ($rs_N->fields["firma_qr"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1_N->fields["usua_codi"] . ",'" . $rs1_N->fields["depe_codi"] . "', '" . $cedula . "', 81, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs_N->fields["firma_qr"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1_N->fields["usua_codi"] . ",'" . $rs1_N->fields["depe_codi"] . "', '" . $cedula . "', 80, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            /*** FRIMA_MECANICA ***/
            if ( $rs_N->fields["firma_mecanica"] <> $rs1_N->fields["firma_mecanica"] ) {
                if ($rs_N->fields["firma_mecanica"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1_N->fields["usua_codi"] . ",'" . $rs1_N->fields["depe_codi"] . "', '" . $cedula . "', 81, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs_N->fields["firma_mecanica"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1_N->fields["usua_codi"] . ",'" . $rs1_N->fields["depe_codi"] . "', '" . $cedula . "', 80, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            /*** DESCARGA_ARC_ORIGINAL ***/
            if ( $rs_N->fields["descarga_arc_original"] <> $rs1_N->fields["descarga_arc_original"] ) {
                if ($rs_N->fields["descarga_arc_original"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1_N->fields["usua_codi"] . ",'" . $rs1_N->fields["depe_codi"] . "', '" . $cedula . "', 84, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs_N->fields["descarga_arc_original"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1_N->fields["usua_codi"] . ",'" . $rs1_N->fields["depe_codi"] . "', '" . $cedula . "', 83, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            /*** TRANSFERENCIAS DOCUMENTALES ***/
            if ( $rs_N->fields["per_transferencias_documentales"] <> $rs1_N->fields["per_transferencias_documentales"] ) {
                if ($rs_N->fields["per_transferencias_documentales"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1_N->fields["usua_codi"] . ",'" . $rs1_N->fields["depe_codi"] . "', '" . $cedula . "', 86, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs_N->fields["per_transferencias_documentales"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1_N->fields["usua_codi"] . ",'" . $rs1_N->fields["depe_codi"] . "', '" . $cedula . "', 85, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }

            /**
            * Autor: Luis miguel Romero
            * Fecha: 18-12-2019
            * Info: Se agrega permiso para publicar documentos de los radicados: $usua_perm_doc_publico
            */
            /*** DOCUMENTOS PUBLICOS ***/
            if ( $rs_N->fields["usua_perm_doc_publico"] <> $rs1_N->fields["usua_perm_doc_publico"] ) {
                if ($rs_N->fields["usua_perm_doc_publico"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1_N->fields["usua_codi"] . ",'" . $rs1_N->fields["depe_codi"] . "', '" . $cedula . "', 88, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs_N->fields["usua_perm_doc_publico"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1_N->fields["usua_codi"] . ",'" . $rs1_N->fields["depe_codi"] . "', '" . $cedula . "', 87, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }   

             if ($rs_N->fields["usua_perm_consulta_rad"] <> $rs1_N->fields["usua_perm_consulta_rad"]) {
                if ($rs_N->fields["usua_perm_consulta_rad"] == 0) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1_N->fields["usua_codi"] . ",'" . $rs1_N->fields["depe_codi"] . "', '" . $cedula . "', 89, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } elseif ($rs_N->fields["usua_perm_consulta_rad"] == 1) {
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $rs1_N->fields["usua_codi"] . ",'" . $rs1_N->fields["depe_codi"] . "', '" . $cedula . "', 90, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                }
            }         
        }
        ?>
    </body>
</html
