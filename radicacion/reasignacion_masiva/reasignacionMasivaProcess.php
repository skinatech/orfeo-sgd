<?php

session_start();
$dir_raiz = $_SESSION['dir_raiz'];
require_once("../../include/db/ConnectionHandler.php");
require_once("../../include/PHPMailer5.2/PHPMailerAutoload.php");
include "../../config.php";
$dbProcess = new ConnectionHandler("$dir_raiz");
$dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$dbProcess->conn->debug = false;

include_once("../../include/PHPMailer/class.phpmailer.php");

//Instancia de mail para realizar las notificaciones a los usuarios
$mail = new PHPMailer();

//Incluido el archivo que tiene la clase historico
include("../../include/tx/Historico.php");
$historiRecord = new Historico($dbProcess);

//Lanzamiento auto
if (isset($_POST['type']) && $_POST['type'] == 100) {
    $selectDependencias = "";

    $queryDependencias = "SELECT DEPE_CODI, DEPE_NOMB, DEPE_CODI FROM dependencia";
    $rsDependencias = $dbProcess->conn->query($queryDependencias);

    $selectDependencias = "<select name='dependenciaReasignaMasiva' id ='dependenciaReasignaMasiva' class='select form-control'>";
    $selectDependencias .= "<option value='0'>-- Seleccione una dependencia --</option>";
    while (!$rsDependencias->EOF) {
        $selectDependencias .= "<option value='" . $rsDependencias->fields['DEPE_CODI'] . "'>" . $rsDependencias->fields['DEPE_CODI'] . " - " . $rsDependencias->fields['DEPE_NOMB'] . "</option>";

        $rsDependencias->MoveNext();
    }
    $selectDependencias .= "</select>";
    echo $selectDependencias;
}

//Type 1 = Consulta de los usuarios de acuerdo a la dependencia
if (isset($_POST['type']) && $_POST['type'] == 1) {
    $selectUsuarios = "";
    $count = 0;
    $queryUsuarios = "SELECT usua_login, usua_codi, depe_codi, usua_nomb, usua_doc FROM usuario WHERE depe_codi = '" . $_POST['dependencia'] . "'";
    $rsUsuarios = $dbProcess->conn->query($queryUsuarios);

    $selectUsuarios = "<select name='usuarios' id ='usuarios' class='select form-control'>";
    $selectUsuarios .= "<option value='0'>-- Seleccione un usuario --</option>";
    while (!$rsUsuarios->EOF) {
        $count++;
        $selectUsuarios .= "<option value='" . $rsUsuarios->fields['USUA_LOGIN'] . "|" . $rsUsuarios->fields['USUA_CODI'] . "|" . $rsUsuarios->fields['USUA_DOC'] . "'>" . $rsUsuarios->fields['USUA_NOMB'] . "</option>";

        $rsUsuarios->MoveNext();
    }
    $selectUsuarios .= "</select>";

    if ($count > 0) {
        echo $selectUsuarios;
    } else {
        echo "No hay usuarios para la dependencia";
    }
}

//Type 2 = Consulta de los radicados de acuerdo a la dependencia
if (isset($_POST['type']) && $_POST['type'] == 2) {
    $tiposRadi = [];
    $tableRadicados = "";

    $queryTipoRadi = "SELECT sgd_trad_codigo, sgd_trad_descr FROM sgd_trad_tiporad";
    $rsTipoRadi = $dbProcess->conn->query($queryTipoRadi);
    while (!$rsTipoRadi->EOF) {
        $tiposRadi[$rsTipoRadi->fields['SGD_TRAD_CODIGO']] = $rsTipoRadi->fields['SGD_TRAD_DESCR'];

        $rsTipoRadi->MoveNext();
    }

    $queryUsuariosConsultarUsuaAnte = "SELECT usua_codi, usua_login, usua_nomb FROM usuario";
    $rsUsuariosConsultarUsuaAnte = $dbProcess->conn->query($queryUsuariosConsultarUsuaAnte);

    while (!$rsUsuariosConsultarUsuaAnte->EOF) {
        $usuaLogin[$rsUsuariosConsultarUsuaAnte->fields['USUA_LOGIN']] = $rsUsuariosConsultarUsuaAnte->fields['USUA_NOMB'];

        $rsUsuariosConsultarUsuaAnte->MoveNext();
    }

    $usuarioPostExplode = explode('|', $_POST['usuario']);

    $queryRadicados = "SELECT radi_nume_radi, ra_asun, radi_depe_actu, radi_usua_actu, radi_usu_ante FROM radicado WHERE radi_depe_actu = '" . $_POST['dependencia'] . "' AND radi_usua_actu = '" . $usuarioPostExplode[1] . "' AND radi_nume_deri = '0'";
    $rsRadicados = $dbProcess->conn->query($queryRadicados);

    while (!$rsRadicados->EOF) {
        $tableRadicados .= "<tr>";
        $tableRadicados .= "<td>" . $rsRadicados->fields['RADI_NUME_RADI'] . "</td>";
        $tableRadicados .= "<td>" . $rsRadicados->fields['RA_ASUN'] . "</td>";
        $tableRadicados .= "<td>" . $tiposRadi[substr($rsRadicados->fields['RADI_NUME_RADI'], -1)] . "</td>";
        $tableRadicados .= "<td>" . $usuaLogin[$rsRadicados->fields['RADI_USU_ANTE']] . "</td>";
        $tableRadicados .= "<td><input type='checkbox' name='" . $rsRadicados->fields['RADI_NUME_RADI'] . "' id='" . $rsRadicados->fields['RADI_NUME_RADI'] . "' class='inputCheckboxRadi' /></td>";
        $tableRadicados .= "</tr>";

        $rsRadicados->MoveNext();
    }
    echo $tableRadicados;
}

//Type 3 = Consulta de las dependencias para reasignar sin listar la dependencia consultada en el type 1
if (isset($_POST['type']) && $_POST['type'] == 3) {
    $selectDependenciasReasignar = "";

    //$queryDependenciasReasignar = "SELECT DEPE_NOMB, DEPE_CODI FROM dependencia WHERE DEPE_CODI != '". $_POST['dependencia'] ."'";
    $queryDependenciasReasignar = "SELECT DEPE_NOMB, DEPE_CODI FROM dependencia";
    $rsDependenciasReasignar = $dbProcess->conn->query($queryDependenciasReasignar);

    $selectDependenciasReasignar = "<select name='selectDependenciaReasignar' id ='selectDependenciaReasignar' class='select form-control'>";
    $selectDependenciasReasignar .= "<option value='0'>-- Seleccione una dependencia --</option>";
    while (!$rsDependenciasReasignar->EOF) {
        $selectDependenciasReasignar .= "<option value='" . $rsDependenciasReasignar->fields['DEPE_CODI'] . "'>" . $rsDependenciasReasignar->fields['DEPE_CODI'] . " - " . $rsDependenciasReasignar->fields['DEPE_NOMB'] . "</option>";

        $rsDependenciasReasignar->MoveNext();
    }
    $selectDependenciasReasignar .= "</select>";

    echo $selectDependenciasReasignar;
}

//Type 4 = Consulta de los usuarios de acuerdo a la dependencia a reasignar basado en la consulta del type 3
if (isset($_POST['type']) && $_POST['type'] == 4) {
    $countUsuariosReasignar = 0;
    $selectUsuariosReasignar = "";

    $usuarioPostExplode = explode('|', $_POST['usuario']);

    $queryUsuariosReasignar = "SELECT usua_codi, depe_codi, usua_nomb, usua_doc, usua_email FROM usuario WHERE usua_codi != '" . $usuarioPostExplode[1] . "' AND depe_codi = '" . $_POST['dependenciaReasignar'] . "'";
    $rsUsuariosReasignar = $dbProcess->conn->query($queryUsuariosReasignar);
    
    $selectUsuariosReasignar = "<select name='selectUsuariosReasignar' id ='selectUsuariosReasignar' class='select form-control'>";
    $selectUsuariosReasignar .= "<option value='0'>-- Seleccione un usuario --</option>";
    while (!$rsUsuariosReasignar->EOF) {
        $countUsuariosReasignar++;
        $selectUsuariosReasignar .= "<option value='" . $rsUsuariosReasignar->fields['USUA_CODI'] . "|" . $rsUsuariosReasignar->fields['USUA_DOC'] . "|" . $rsUsuariosReasignar->fields['USUA_EMAIL'] . "'>" . $rsUsuariosReasignar->fields['USUA_NOMB'] . "</option>";

        $rsUsuariosReasignar->MoveNext();
    }
    $selectUsuariosReasignar .= "</select>";
    if ($countUsuariosReasignar > 0) {
        echo $selectUsuariosReasignar;
    } else {
        echo "No hay usuarios para la dependencia";
    }
}

//Type 5 = Update en la base de datos tabla radicado
if (isset($_POST['type']) && $_POST['type'] == 5) {
    $okTotalUpdate = true;
    $radicadosNoUpdate = "";
    $observacionHistorico = utf8_decode("Reasigacion masiva del radicado");
    $radicadosReasignados = [];
    $sendMail = "";

    $usuarioOrigen = explode('|', $_POST['usuarioOrigen']);
    $usuarioReasignar = explode('|', $_POST['usuarioReasignar']);

    // Busca los radicados hijos de los números de radicados seleccionados
    for ($i = 0; $i < count($_POST['radicadosAreasignar']); $i++) {
        $queryValidateHijos = "SELECT radi_nume_radi, radi_nume_deri FROM radicado WHERE radi_nume_deri = '" . $_POST['radicadosAreasignar'][$i] . "'";
        $rsValidateHijos = $dbProcess->conn->Execute($queryValidateHijos);
        
        $radicadosReasignados[] = $_POST['radicadosAreasignar'][$i];
        while (!$rsValidateHijos->EOF) {
            $radicadosReasignados[] = $rsValidateHijos->fields['RADI_NUME_RADI'];

            $rsValidateHijos->MoveNext();
        }
    }
    for ($i = 0; $i < count($radicadosReasignados); $i++) {

        /** Se optiene el codigo de la dependencia anterior con base al usuario anterior que llega */
        $queryDepe = "select depe_codi FROM usuario WHERE usua_login = '" . $usuarioOrigen[0] . "'";
        $rsValidateDepe = $dbProcess->conn->Execute($queryDepe);

        $queryUpdateRadicado = "update radicado SET radi_depe_actu = '" . $_POST['dependenciaReasignar'] . "', radi_usua_actu = '" . $usuarioReasignar[0] . "', radi_usu_ante = '" . $usuarioOrigen[0] . "', radi_fech_reasignado = '" . date('Y-m-d') . "', carp_codi = '14', radi_depe_ante='".$rsValidateDepe->fields['DEPE_CODI']."' WHERE radi_nume_radi = '" . $radicadosReasignados[$i] . "'";
        $moverRadicado = $dbProcess->conn->Execute($queryUpdateRadicado);

        if ($dbProcess->conn->Execute($queryUpdateRadicado) == "") {
            $okTotalUpdate = false;
            $radicadosNoUpdate = $radicadosReasignados[$i] . ", ";
            
        } else {
            $radicadosReasignadosHis[] = $radicadosReasignados[$i];
        }
    }

    $historicoExec = $historiRecord->insertarHistorico($radicadosReasignadosHis, $_POST['dependenciaOrigen'], $usuarioOrigen[1], $_POST['dependenciaReasignar'], $usuarioReasignar[0], $observacionHistorico, 66);

    if ($okTotalUpdate) {
        foreach ($radicadosReasignadosHis as $noRadicado) {
            $radicadosMail .= $noRadicado . ", ";
        }

        $fecha = date("F j, Y H:i:s");
        $usMailSelect = $cuenta_mail;

        $textReasignaMasivaMayus = "REASIGNACI&OacuteN MASVIA";
        $textReasignaMasivaMinus = "Reasignaci&oacuten masiva";
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SetFrom($usMailSelect, "SGD Orfeo");
        $mail->Host = $servidor_mail_smtp;
        $mail->Port = $puerto_mail_smtp;
        $mail->SMTPDebug = "0"; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = "";
        $mail->Username = $usMailSelect;   // SMTP account username
        $mail->Password = $contrasena_mail; // SMTP account password
        $mail->Subject = "Reasignaciones masiva de radicados";
        $mail->AltBody = "Para ver el mensaje, por favor use un visor de E-mail compatible!";
        $mail->AddAddress($usuarioReasignar[2]);

        $imageLogo = $entidad_contacto . $ambiente . '/logoEntidad.png';
        // titulo del correo
        $headMailText = utf8_decode('Reasignaci&oacuten de Radicados');
        // Imagen del header se repite
        $imageHeader = $dir_raiz . '/logoHeaderEmail.jpg';

        // Contenido del correo tambíen puede viajar en html
        $messageContent = 'Se ha reasignado de forma masiva los siguientes radicados ';
        $messageContent .= " ".$radicadosMail." en la fecha " . $fecha ." , estos pueden ser consultados desde la carpeta de 'Reasignaci&oacuten Masiva'";
        $messageContent .= '<br>Cordialmente,</br><br>Sistema de Gestion Documental Orfeo';

        // Se incluye el template 
        include('../../email/emailTemplate.php');
        if($emailHtml){
            $mail->MsgHTML($emailHtml);
        }else{
            $mail->MsgHTML(utf8_decode($messageContent));
        }

        $mail->ErrorInfo;
        $exito = $mail->Send();

        if (!$exito) {
            $mensajeErrorCorreo = "No se pudo enviar notificaci&oacute;n de la reasignaci&oacute;n masiva";
            $envioOk = '';
        } else {
            $mensajeErrorCorreo = 'Se envio notificación al remitente/destinatario con el correo <b>' . $mail_usu . "</b> <br><br>";
            $envioOk = 'ok';
        }
        $mail->ClearAddresses();
    }

    if (!$okTotalUpdate) {
        echo 'Los Radicados '.$radicadosMail.' fueron reasignados correctamente, ' . $sendMail;
    } else {
        echo 'Los Radicados '.$radicadosMail.' fueron reasignados correctamente.'. PHP_EOL;
            if($radicadosNoUpdate){
                echo 'Los radicados ' . $radicadosNoUpdate . ' no fueron procesados, ' . $sendMail;
            }else{
                echo 'La totalidad de los radicados fueron procesados.';
            }
        
    }
}
?>