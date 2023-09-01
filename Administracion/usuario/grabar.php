<?php
session_start();
$assoc = $_SESSION['assoc'];

$ruta_raiz = "../..";
if (!$_SESSION['dependencia'])
    include "$ruta_raiz/rec_session.php";

$driver = $_SESSION['driver'];
$codusuario = $_SESSION['codusuario'];
$dependencia = $_SESSION['dependencia'];
$usua_doc = $_SESSION['usua_doc'];
$rol_sel = $_POST['rol_sel'];

include_once "$ruta_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$ruta_raiz");

foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

//$db->conn->debug = true;
error_reporting(0);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$sqlFechaHoy = $db->conn->sysTimeStamp;
$usuLogin = strtoupper($usuLogin);
?>
<html>
    <head>
        <title>Untitled Document</title>
        <link rel="stylesheet" href="../../estilos/orfeo.css">
    </head>
    <body>
        <?php
        if ($usModo == 2) {
            if ($_GET["ano"] && $_GET["mes"] && $_GET["dia"])
                $fenac = $_GET["ano"] . "-" . $_GET["mes"] . "-" . $_GET["dia"];
            else $fenac = "null";

            $isqlUsuario = "SELECT USUA_DOC, USUA_NOMB, DEPE_CODI, USUA_LOGIN, USUA_NACIM, USUA_AT, USUA_PISO, USUA_EXT,
            USUA_EMAIL, USUA_CODI FROM USUARIO WHERE USUARIO.USUA_LOGIN = '" . $usuLoginSel . "'";
            $rsUsuario = $db->conn->Execute($isqlUsuario);

            $depecodiOrig = isset($rsUsuario->fields["depe_codi"]) ? $rsUsuario->fields["depe_codi"] : $rsUsuario->fields["DEPE_CODI"];
            $usuacodiOrig = isset($rsUsuario->fields["usua_codi"]) ? $rsUsuario->fields["usua_codi"] : $rsUsuario->fields["USUA_CODI"];
            
            /***
            SkinaTech
            Autor: Andrés Mosquera
            Fecha: 2019-09-19
            Info: Se agrega consulta para validar si el usuario tiene radicados padres asignados para poder o no inactivarlo
            ***/
            $queryValidarRadicados = "SELECT RADI_NUME_RADI FROM RADICADO WHERE RADI_DEPE_ACTU = '" . $depecodiOrig . "' AND RADI_USUA_ACTU = " . $usuacodiOrig . " AND RADI_NUME_DERI = '0'";
            $rsValidarRadicados = $db->query($queryValidarRadicados);

            $radicadoValidarRadicados = $assoc == 0 ? $rsValidarRadicados->fields["radi_nume_radi"] : $rsValidarRadicados->fields["RADI_NUME_RADI"];
            /***
            SkinaTech
            Autor: Andrés Mosquera
            Fecha: 2019-09-19
            Info: Fin se agrega consulta para validar si el usuario tiene radicados padres asignados para poder o no inactivarlo
            ***/            
            
            if ($perfilOrig != $perfil) {
                if ($perfilOrig == "Jefe" && $perfil == "Normal") {
                    $isqlCod = "SELECT MAX(USUA_CODI) AS NUMERO FROM USUARIO WHERE DEPE_CODI = '" . $dep_sel . "'";
                    $rs7 = $db->conn->query($isqlCod);
                    $nusua_codi = isset($rs7->fields["numero"]) ? $rs7->fields["numero"] + 1 : $rs7->fields["NUMERO"] + 1;
                }
                if ($perfilOrig == "Normal" && $perfil == "Jefe") {
                    $nusua_codi = 1;
                }

                $isql1 = $isql1 . " DEPE_CODI = '" . $dep_sel . "', ";
                $isql1 = $isql1 . " USUA_CODI = " . $nusua_codi . ", ";
                $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (" . $codusuario . ",'" . $dependencia . "', '" . $usua_doc . "', " . $nusua_codi . ", '$dep_sel', '" . $cedula . "', 50, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                $db->conn->Execute($isql);
            }

            if ($usuDocSel <> $cedula) {

                $isql1 = "USUA_DOC = " . $cedula . ", ";
                $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (" . $codusuario . ", '" . $dependencia . "', '" . $usua_doc . "', " . $nusua_codi . ", '$dep_sel', '" . $cedula . "', 4, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                $db->conn->Execute($isql);
            }

            if ($usuLoginSel <> $usuLogin) {
                $isql1 = $isql1 . "USUA_LOGIN = '" . $usuLogin . "', ";
                $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (" . $codusuario . ",'" . $dependencia . "', '" . $usua_doc . "', " . $nusua_codi . ", '$dep_sel', '" . $cedula . "', 6, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                $db->conn->Execute($isql);
            }

            $usua_nombgr = isset($rsUsuario->fields["usua_nomb"]) ? $rsUsuario->fields["usua_nomb"] : $rsUsuario->fields["USUA_NOMB"];
            if ($usua_nombgr <> $nombre) {
                $isql1 = $isql1 . " USUA_NOMB = '" . $nombre . "', ";
                $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (" . $codusuario . ",'" . $dependencia . "', '" . $usua_doc . "', " . $nusua_codi . ", '$dep_sel', '" . $cedula . "', 5, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                $db->conn->Execute($isql);
            }

            $usua_nacimgr = isset($rsUsuario->fields["usua_nacim"]) ? $rsUsuario->fields["usua_nacim"] : $rsUsuario->fields["USUA_NACIM"];
            if ($usua_nacimgr <> $fenac and ( isset($rsUsuario->fields["usua_nacim"]) or $fenac != "null")) {
                $isql1 = $isql1 . " USUA_NACIM =" . $db->conn->DBTimeStamp($fenac) . ", ";
                $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (" . $codusuario . ", '" . $dependencia . "', '" . $usua_doc . "', " . $nusua_codi . ", '$dep_sel', '" . $cedula . "', 53, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                $db->conn->Execute($isql);
            }

            $depe_codigr = isset($rsUsuario->fields["depe_codi"]) ? $rsUsuario->fields["depe_codi"] : $rsUsuario->fields["DEPE_CODI"];

            if ($depe_codigr <> $dep_sel) {
                if (!$radicado) {
                    $isqlCod = "SELECT MAX(USUA_CODI) AS NUMERO FROM USUARIO WHERE DEPE_CODI = '" . $dep_sel . "'";
                    $rs7 = $db->conn->query($isqlCod);
                    $nusua_codi = isset($rs7->fields["numero"]) ? $rs7->fields["numero"] + 1 : $rs7->fields["NUMERO"] + 1;
                    $isql1 = $isql1 . " DEPE_CODI = '" . $dep_sel . "', ";
                    $isql1 = $isql1 . " USUA_CODI = " . $nusua_codi . ", ";
                    $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (" . $codusuario . ", '" . $dependencia . "', '" . $usua_doc . "', " . $nusua_codi . ", '$dep_sel', '" . $cedula . "', 3, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                    $db->conn->Execute($isql);
                } else {
                    ?>
                    <table align="center" border="2" bordercolor="#000000">
                        <form name="frmAbortar" action="../formAdministracion.php" method="post">
                            <tr bordercolor="#FFFFFF"> <td width="211" height="30" colspan="2" class="listado2"><p><span class=etexto>
                                            <center><B>El usuario <?= $usuLogin ?> tiene radicados a su cargo, NO PUEDE CAMBIAR DE DEPENDENCIA</B></center>
                                        </span></p> </td> </tr>
                            <tr bordercolor="#FFFFFF">  <td height="30" colspan="2" class="listado2">
                            <center><input class="botones" type="submit" name="Submit" value="Aceptar"></center>
                            <input name="PHPSESSID" type="hidden" value='<?= session_id() ?>'>
                            <input name="krd" type="hidden" value='<?= $krd ?>'>
                            </td>
                            </tr>
                        </form>
                    </table>
                    <?php
                    return;
                }
            }

            $usua_atgr = isset($rs->fields["usua_at"]) ? $rs->fields["usua_at"] : $rs->fields["USUA_AT"];
            if ($usua_atgr <> $ubicacion) {
                $isql1 = $isql1 . " USUA_AT = '" . $ubicacion . "', ";
                $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (" . $codusuario . ", '" . $dependencia . "', '" . $usua_doc . "', " . $nusua_codi . ", '$dep_sel', '" . $cedula . "', 7, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                $db->conn->Execute($isql);
            }

            $usua_extgr = isset($rs->fields["usua_ext"]) ? $rs->fields["usua_ext"] : $rs->fields["USUA_EXT"];
            if ($usua_extgr <> $extension) {
                $isql1 = $isql1 . " USUA_EXT = " . $extension . ", ";
                $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (" . $codusuario . ", '" . $dependencia . "', '" . $usua_doc . "', " . $nusua_codi . ",'$dep_sel', '" . $cedula . "', 39, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                $db->conn->Execute($isql);
            }

            $usua_pisogr = isset($rs->fields["usua_piso"]) ? $rs->fields["usua_piso"] : $rs->fields["USUA_PISO"];
            if ($usua_pisogr <> $piso) {
                $isql1 = $isql1 . " USUA_PISO = " . $piso . ", ";
                $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (" . $codusuario . ", '" . $dependencia . "', '" . $usua_doc . "', " . $nusua_codi . ", '$dep_sel', '" . $cedula . "',8, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                $db->conn->Execute($isql);
            }

            $usua_emailgr = isset($rs->fields["usua_email"]) ? $rs->fields["usua_email"] : $rs->fields["USUA_EMAIL"];
            if ($usua_emailgr <> $email) {
                $isql1 = $isql1 . " USUA_EMAIL = '" . $email . "'";
                $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (" . $codusuario . ", '" . $dependencia . "','" . $usua_doc . "', " . $nusua_codi . ", '$dep_sel', '" . $cedula . "', 40, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                $db->conn->Execute($isql);
            } else
                $isql1 = substr($isql1, 0, strlen($isql1) - 2);
            
            $usua_rol_sel = $assoc == 0 ? $rs->fields["cod_rol"] : $rs->fields["COD_ROL"];
            if ($usua_rol_sel <> $rol_sel) {
                $isql1 = $isql1 . " ,cod_rol = " . $rol_sel . "";
                $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (" . $codusuario . ", '" . $dependencia . "', '" . $usua_doc . "', " . $nusua_codi . ", '$dep_sel', '" . $cedula . "',53, " . $sqlFechaHoy . ", '" . $usuLogin . "')";
                $db->conn->Execute($isql);
            }            
            
            if ($isql1 != "") {
                $isql1 = "UPDATE USUARIO SET " . $isql1 . " WHERE USUA_LOGIN = '" . $usuLogin . "'";
                $db->conn->Execute($isql1);
                
                /** se hace modificacion de radicados y carpetas personales en caso de cambio de perfil * */
                if ($perfilOrig != $perfil) {
                    $isqlRadiSelect = "SELECT RADI_NUME_RADI FROM RADICADO WHERE RADI_USUA_ACTU = $usuacodiOrig AND RADI_DEPE_ACTU = '$depecodiOrig'";
                    $ADODB_COUNTRECS = true;
                    $rsRad = $db->conn->Execute($isqlRadiSelect);
                    
                    $ADODB_COUNTRECS = false;
                    if ($rsRad->RecordCount() > 0) {                        
                        while (!$rsRad->EOF) {
                            $radicadogr = isset($rsRad->fields["radi_nume_radi"]) ? $rsRad->fields["radi_nume_radi"] : $rsRad->fields["RADI_NUME_RADI"];
                            $radMov = $radicadogr . ',' . $radMov;
                            $rsRad->MoveNext();
                        }
                        $isqlRadiUpdate = "UPDATE RADICADO SET RADI_USUA_ACTU = $nusua_codi, RADI_DEPE_ACTU = '$dep_sel' WHERE RADI_USUA_ACTU = $usuacodiOrig AND RADI_DEPE_ACTU = '$depecodiOrig'";
                        $rsUpRad = $db->conn->Execute($isqlRadiUpdate);
                    }
                    $isqlCaperSelect = "SELECT NOMB_CARP FROM CARPETA_PER WHERE USUA_CODI = $usuacodiOrig AND  DEPE_CODI = '$depecodiOrig'";
                    $ADODB_COUNTRECS = true;
                    $rsCarp = $db->conn->Execute($isqlCaperSelect);
                    $ADODB_COUNTRECS = false;
                    if ($rsCarp->RecordCount() > 0) {
                        while (!$rsCarp->EOF) {
                            $nomb_carpgr = isset($rsCarp->fields["nomb_carp"]) ? $rsCarp->fields["nomb_carp"] : $rsCarp->fields["NOMB_CARP"];
                            $CarpMov = $nomb_carpgr . ',' . $CarpMov;
                            $rsCarp->MoveNext();
                        }
                        $isqlCaperUpdate = "UPDATE CARPETA_PER SET USUA_CODI = $nusua_codi, DEPE_CODI = '" . $dep_sel . "' WHERE USUA_CODI = $usuacodiOrig AND  DEPE_CODI = '$depecodiOrig' ";
                        $rsUpCarp = $db->conn->Execute($isqlCaperUpdate);
                    }
                }
                // error_log($_FILES['firmaUsuario']['name']);
                if ($_FILES['firmaUsuario']['name'] != "") {
                    include_once 'grabarFirmaMecanica.php';
                    if($file_uploaded){
                        $isqlUploadFirmaMecanica = "UPDATE USUARIO SET USUA_FIRMA = '$filenameFinal' WHERE USUA_LOGIN = '$usuLogin'";
                        $rsUploadFirmaMecanica = $db->conn->Execute($isqlUploadFirmaMecanica);
                        
                    }

                }
            }
            if ($boton != 'Personalizar Permisos' && $rolactual != $rol_sel) {
                include "traePermisos.php";
            }
            
            if($rolactual != $rol_sel){
                include "acepPermisosModif.php";
            }
            // VALIDACION E INSERCION DE DEPENDENCIAS SELECCIONADAS VISIBLES
            if (is_array($_POST['dep_vis'])) {
                $db->conn->Execute("DELETE FROM DEPENDENCIA_VISIBILIDAD WHERE DEPENDENCIA_VISIBLE='$dep_sel'");
                $rs_sec_dep_vis = $db->conn->Execute("SELECT MAX(CODIGO_VISIBILIDAD) AS IDMAX FROM DEPENDENCIA_VISIBILIDAD");
                $id_CodVis = $rs_sec_dep_vis->Fields('IDMAX');
                while (list($key, $val) = each($_POST['dep_vis'])) {
                    $id_CodVis += 1;
                    $db->conn->Execute("INSERT INTO DEPENDENCIA_VISIBILIDAD VALUES ($id_CodVis,'$dep_sel',$val)");
                }
                unset($id_CodVis);
                $rs_sec_dep_vis->Close();
                unset($rs_sec_dep_vis);
            }

            if (!$swConRadicado) {
                ?>
                <table align="center" border="2" bordercolor="#000000">
                    <form name="frmConfirmaCreacion" action="../formAdministracion.php" method="post">
                        <tr bordercolor="#FFFFFF"> <td width="211" height="30" colspan="2" class="listado2"><p><span class=etexto>
                                        <center><B>El usuario <?= $usuLogin ?> ha sido Modificado con Exito</B></center>
                                    </span></p> </td> </tr>
                        <tr bordercolor="#FFFFFF">  <td height="30" colspan="2" class="listado2">
                        <center><input class="botones" type="submit" name="Submit" value="Aceptar"></center>
                        <input name="PHPSESSID" type="hidden" value='<?= session_id() ?>'>
                        <input name="krd" type="hidden" value='<?= $krd ?>'>
                        </td> </tr>
                    </form>
                </table>
            <center>
                <table  align="center" cellspacing="2" cellpadding="2">
                    <tr>
                        <?php
                        if ($rsUpRad) {
                            $radMov = explode(',', $radMov);
                            $html = "<td valign='top'><table align='center' border='2' bordercolor='#000000' class='listado2'>";
                            $html .= "<tr bordercolor='#FFFFFF'> <td width='211' height='30' colspan='2' class='listado2'><p><span class=etexto>";
                            $html .= "<center><B>Se movieron los siguientes Radicados:</B></center></span></p> </td> </tr>";
                            foreach ($radMov as $ra) {
                                $html .= "<tr><td>$ra</td></tr>";
                            }
                            $html .= "</table></td>";
                            echo $html;
                        }
                        if ($rsUpCarp) {
                            $CarpMov = explode(',', $CarpMov);
                            $html1 = "<td valign='top'><table  border='2' bordercolor='#000000' class='listado2'>";
                            $html1 .= "<tr bordercolor='#FFFFFF'> <td width='211' height='30' colspan='2' class='listado2'><p><span class=etexto>";
                            $html1 .= "<center><B>Se movieron las siguientes Carpetas:</B></center></span></p> </td> </tr>";
                            foreach ($CarpMov as $ca) {
                                $html1 .= "<tr><td>$ca</td></tr>";
                            }
                            $html1 .= "</table></td>";
                            echo $html1;
                        }
                        ?>
                    </tr></table></center>


            <?php
        } else
            return;
    }
    else {
        if ($perfil == "Normal") {
            $isql = "SELECT MAX(USUA_CODI) AS NUMERO FROM USUARIO WHERE DEPE_CODI = '" . $dep_sel . "'";
            $rs7 = $db->conn->query($isql);
            $nusua_codi = isset($rs7->fields["numero"]) ? $rs7->fields["numero"] + 1 : $rs7->fields["NUMERO"] + 1;
        } elseif ($perfil == "Jefe")
            $nusua_codi = 1;

        $isql_inicial = "INSERT INTO USUARIO (USUA_CODI, DEPE_CODI,USUA_LOGIN,USUA_FECH_CREA,USUA_NOMB, USUA_DOC, USUA_NACIM, ";
        $isql_final = " VALUES ($nusua_codi, '$dep_sel', '" . strtoupper($usuLogin) . "', $sqlFechaHoy, '" . $nombre . "', $cedula, ";


        if (($dia == "") && ($mes == "") && ($ano == ""))
        //Modificado idrd   
            $isql_final = $isql_final . "null, ";
        else {
            switch ($driver) {
                case 'mssql':
                    $fenac = " CONVERT(DATETIME, '" . $ano . "-" . $mes . "-" . $dia . "', 102) ,";
                    break;
                case 'mysql':
                    $fenac = " DATE_FORMAT('" . $ano . "-" . $mes . "-" . $dia . "  01:01:01','%H:%i:%s') ,";
                    break;
                case 'oci8':
                    $fenac = " TO_DATE('" . $ano . "-" . $mes . "-" . $dia . ",  01:01:01 AM','YYYY-MM-DD, HH:MI:SS AM') ,";
                    break;
                default :
                    $fenac = " TO_DATE('" . $ano . "-" . $mes . "-" . $dia . ",  01:01:01 AM','YYYY-MM-DD, HH:MI:SS AM') ,";
                    break;
            }

            $isql_final = $isql_final . $fenac;
        }
        if ($piso <> "") {
            $isql_inicial = $isql_inicial . " USUA_PISO, ";
            $isql_final = $isql_final . $piso . ", ";
        }
        if ($ubicacion) {
            $isql_inicial = $isql_inicial . " USUA_AT, ";
            $isql_final = $isql_final . "'" . $ubicacion . "', ";
        }
        if ($email) {
            $isql_inicial = $isql_inicial . " USUA_EMAIL, ";
            $isql_final = $isql_final . "'" . $email . "', ";
        }
        if ($extension) {
            $isql_inicial = $isql_inicial . " USUA_EXT, ";
            $isql_final = $isql_final . $extension . ", ";
        }
        $isql_inicial = $isql_inicial . " USUA_PASW, PERM_RADI_SAL, ";
        $isql_final = $isql_final . "123, 2,";
        
        if ($rol_sel) {
            $isql_inicial = $isql_inicial . " cod_rol, ";
            $isql_final = $isql_final . $rol_sel . ", ";
        }

        include "acepPermisosNuevo.php";
        $isql = $isql_inicial . $isql_final;
        $db->conn->Execute($isql); //Tabla USUARIOS        

        if (is_array($_POST['dep_vis'])) {
            $db->conn->Execute("DELETE FROM DEPENDENCIA_VISIBILIDAD WHERE DEPENDENCIA_VISIBLE='$dep_sel'");
            $rs_sec_dep_vis = $db->conn->Execute("SELECT MAX(CODIGO_VISIBILIDAD) AS IDMAX FROM DEPENDENCIA_VISIBILIDAD");
            $id_CodVis = $rs_sec_dep_vis->Fields('IDMAX');
            $ok = true;
            while ((list($key, $val) = each($_POST['dep_vis'])) && $ok) {
                $id_CodVis += 1;
                $ok = $db->conn->Execute("INSERT INTO DEPENDENCIA_VISIBILIDAD VALUES ($id_CodVis,'$dep_sel',$val)"); //Tabla Dependencia_Visibilidad
            }
            unset($id_CodVis);
            $rs_sec_dep_vis->Close();
            unset($rs_sec_dep_vis);
        }

        $isql = "select USUA_CODI from USUARIO WHERE USUA_LOGIN = '" . $usuLogin . "'";
        $rs = $db->conn->query($isql);
        $usuacodi = isset($rs->fields["usua_codi"]) ? $rs->fields["usua_codi"] : $rs->fields["USUA_CODI"];
        
        if ($masiva) {            
            $isql = "INSERT INTO CARPETA_PER (USUA_CODI, DEPE_CODI, NOMB_CARP, DESC_CARP, CODI_CARP) VALUES (" . $usuacodi . ", " . $dep_sel . ", 'Masiva', 'Radicacion Masiva', 99 )";
            $db->conn->Execute($isql);
        }
        $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO,SGD_USH_USULOGIN) VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $usuacodi . ", '" . $dep_sel . "', '" . $cedula . "', 1 , " . $sqlFechaHoy . ", '" . $usuLogin . "')";
        $db->conn->Execute($isql);
        
        if ($rol_sel) {
            $isql = "INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO,SGD_USH_USULOGIN) VALUES ($codusuario, '$dependencia', '" . $usua_doc . "', " . $usuacodi . ", '" . $dep_sel . "', '" . $cedula . "', 53 , " . $sqlFechaHoy . ", '" . $usuLogin . "')";
            $db->conn->Execute($isql);
        }
        
        $isql = "select USUA_ESTA, USUA_PRAD_TP2, USUA_PERM_ENVIOS, USUA_ADMIN, USUA_ADMIN_ARCHIVO, USUA_NUEVO, CODI_NIVEL, USUA_PRAD_TP1, USUA_MASIVA, USUA_PERM_DEV, SGD_PANU_CODI from USUARIO WHERE USUA_LOGIN = '" . $usuLogin . "'";
        $rs = $db->conn->query($isql);

        //Confirmamos las inserciones de datos
        //$ok = $db->conn->CompleteTrans();
        if (!$ok) {
            ?>
            <form name="frmConfirmaCreacion" action="../formAdministracion.php" method="post">
                <table align="center" border="2" bordercolor="#000000">
                    <tr bordercolor="#FFFFFF">
                        <td width="211" height="30" colspan="2" class="listado2">
                            <p><span class=etexto>
                                    <center><B>El usuario <?= $usuLogin ?> ha sido creado con &Eacute;xito</B></center>
                                </span></p>
                        </td>
                    </tr>
                    <tr bordercolor="#FFFFFF">
                        <td height="30" colspan="2" class="listado2">
                    <center><input class="botones" type="submit" name="Submit" value="Aceptar"></center>
                    <input name="PHPSESSID" type="hidden" value='<?= session_id() ?>'>
                    <input name="krd" type="hidden" value='<?= $krd ?>'>
                    </td>
                    </tr>
                </table>
            </form>
            <?php
        } else {
            echo "Existe un error en los datos diligenciados";
        }
    }
    ?>
</body>
</html>