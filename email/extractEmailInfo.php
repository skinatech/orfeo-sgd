<?php

include '../config.php' ;   // configuracion general
include 'email.inc.php' ;
include 'connectIMAP.php';           // Conecta a servidor correo
require_once("../include/db/ConnectionHandler.php");

$db = new ConnectionHandler('..');

foreach ($_GET as $key => $valor)  ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor;

if (!$ruta_raiz) $ruta_raiz = "..";

set_include_path(".:/usr/share/php:/usr/share/pear");

$msgno = $eMailMid;
$emailInfo = $msg->getEmailInfo($msgno, $folder);
$emailAttachments = $emailInfo['emailAttachments'];

$data['asunto'] = trim(imap_utf8($emailInfo['headerInfo']->subject)) ?? trim(imap_utf8($emailInfo['headerInfo']->Subject));
$data['email'] = trim(imap_utf8($emailInfo['headerInfo']->toaddress));
$email = $data['email'];

$explodeInicial = explode('<', $email);
$explodeFinal = explode('>', $explodeInicial[1]);
$email = $explodeFinal[0];

//buscar remitente por correo
$sqls = [
    'usuarios' => "select * from usuario where usua_email = '$email'",
    'empresas' => "select * from sgd_oem_oempresas where email = '$email'",
    'terceros' => "select * from bodega_empresas where email = '$email'",
];

$remitente = [];

foreach($sqls as $key => $value){
    $encontrado = $db->conn->query($value);

    if(is_array($encontrado->fields) && count($encontrado->fields) > 0){
        if($key == 'usuarios'){

            $sqlDepe = "select depe_nomb,dpto_codi,muni_codi from dependencia where depe_codi = '".$encontrado->fields['DEPE_CODI']."'";
            $resulDepe = $db->conn->query($sqlDepe);

            $remitente['email'] = $encontrado->fields['USUA_EMAIL'] ?? $email;
            $remitente['nombre'] = $encontrado->fields['USUA_NOMB'];
            $remitente['identificacion'] = $encontrado->fields['USUA_DOC'];
            $remitente['tipo'] = '6';
            $remitente['direccion'] = $resulDepe->fields['DEPE_NOMB'];
            $remitente['telefono'] = null;
            $remitente['funcionario'] = '--';
            $remitente['continente'] = '1';
            $remitente['pais'] = '170';
            $remitente['departamento'] = $resulDepe->fields['DPTO_CODI'];
            $remitente['municipio'] = $resulDepe->fields['MUNI_CODI'];
            $remitente['asunto'] = $data['asunto'];
        }
        elseif($key == 'empresas'){
            $remitente['email'] = $encontrado->fields['EMAIL'] ?? $email;
            $remitente['nombre'] = $encontrado->fields['SGD_OEM_OEMPRESA'];
            $remitente['identificacion'] = $encontrado->fields['SGD_OEM_NIT'];
            $remitente['representante'] = $encontrado->fields['SGD_REP_LEGAL'];
            $remitente['tipo'] = '2';
            $remitente['direccion'] = $encontrado->fields['SGD_OEM_DIRECCION'];
            $remitente['telefono'] = $encontrado->fields['SGD_OEM_TELEFONO'];
            $remitente['funcionario'] = $encontrado->fields['SGD_OEM_REP_LEGAL'];
            $remitente['continente'] = $encontrado->fields['ID_CONT'];
            $remitente['pais'] = $encontrado->fields['ID_PAIS'];
            $remitente['departamento'] = $encontrado->fields['DPTO_CODI'];
            $remitente['municipio'] = $encontrado->fields['MUNI_CODI'];
            $remitente['asunto'] = $data['asunto'];
        }
        elseif($key == 'terceros'){
            $remitente['email'] = $encontrado->fields['EMAIL'] ?? $email;
            $remitente['nombre'] = $encontrado->fields['NOMBRE_DE_LA_EMPRESA'];
            $remitente['identificacion'] = $encontrado->fields['NIT_DE_LA_EMPRESA'];
            $remitente['representante'] = $encontrado->fields['NOMBRE_REP_LEGAL'];
            $remitente['tipo'] = '1';
            $remitente['direccion'] = $encontrado->fields['DIRECCION'];
            $remitente['telefono'] = $encontrado->fields['TELEFONO_1'];
            $remitente['funcionario'] = $encontrado->fields['NOMBRE_REP_LEGAL'];
            $remitente['continente'] = $encontrado->fields['ID_CONT'];
            $remitente['pais'] = $encontrado->fields['ID_PAIS'];
            $remitente['departamento'] = $encontrado->fields['CODIGO_DEL_DEPARTAMENTO'];
            $remitente['municipio'] = $encontrado->fields['CODIGO_DEL_MUNICIPIO'];
            $remitente['asunto'] = $data['asunto'];
        }
        break;
    }
}

if(isset($encontrado) && !$encontrado->fields){
    // echo '<div style="color:red;text-align:center">el remitente no se encuentra creado.</div>';
}

