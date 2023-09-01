<?php

// include_once ("./PHPMailer/class.phpmailer.php");
include_once ("./PHPMailer5.2/PHPMailerAutoload.php");
include ("../config.php");
$mail = new PHPMailer();

$fecha = date("F j, Y H:i:s");
$info = "";
$intentos = 0;

try {

    if (!file_exists("../include/db/ConnectionHandler.php")) {
        throw new Exception('[ERROR consulta de secuencias] no se encuentra conector a base de datos');
    }

    include_once "../include/db/ConnectionHandler.php";
    $db = new ConnectionHandler("..");
    $sql = 'SELECT sequence_name FROM information_schema.sequences;';
    $secuenciasInfo = $db->conn->getAll($sql);

    $info .= "<style>
                table, th, td {
                border: 1px solid black;
                }
            </style>";
    
    $info .= "<table>
        <tr>
            <th>sequence_name</th>
            <th>LAST_VALUE</th>
            <th>START_VALUE</th>
            <th>INCREMENT_BY</th>
            <th>MAX_VALUE</th>
            <th>MIN_VALUE</th>
            <th>CACHE_VALUE</th>
            <th>LOG_CNT</th>
            <th>IS_CYCLED</th>
            <th>IS_CALLED</th>
       </tr>";

    echo "<pre>";

    foreach ($secuenciasInfo as $secuenciaNombre) {

        $sql = "SELECT * FROM $secuenciaNombre[0]";
        $secuenciaInfo = $db->conn->getAll($sql);

        $info .= "<tr>"
                . "<td>" . $secuenciaInfo[0][0] . "</td>"
                . "<td>" . $secuenciaInfo[0][1] . "</td>"
                . "<td>" . $secuenciaInfo[0][2] . "</td>"
                . "<td>" . $secuenciaInfo[0][3] . "</td>"
                . "<td>" . $secuenciaInfo[0][4] . "</td>"
                . "<td>" . $secuenciaInfo[0][5] . "</td>"
                . "<td>" . $secuenciaInfo[0][6] . "</td>"
                . "<td>" . $secuenciaInfo[0][7] . "</td>"
                . "<td>" . $secuenciaInfo[0][8] . "</td>"
                . "<td>" . $secuenciaInfo[0][9] . "</td>"
                . "</tr> \n";
    }


    $info .= "</table>";
} catch (Exception $exc) {
    error_log("[ERROR SECUENCIAS]" . $exc->getTraceAsString() . $exc->getMessage());
    $info .= "[ERROR consulta de secuencias] " . $exc->getTraceAsString() . $exc->getMessage();
}

try {
    $info .= "<br>";
    $info .= "Directorios bodega";
    $info .= "<br>";
    $info .= "<pre>" . shell_exec('ls -la ../bodega/') . "</pre>";
    $info .= "<br>";
    $info .= "<br>";
    $info .= "Bodega del año " . date("Y");
    $info .= "<br>";
    $info .= "<pre>" . shell_exec('ls -la ../bodega/' . date("Y")) . "</pre>";
} catch (Exception $exc) {
    error_log("[ERROR SECUENCIAS]" . $exc->getTraceAsString() . $exc->getMessage());
    $info .= "[ERROR consulta de directorios] " . $exc->getTraceAsString() . $exc->getMessage();
}


$mail->IsSMTP();
$mail->SetFrom($usMailSelect, "SGD Orfeo 6");
$mail->Host = $servidor_mail_smtp;
$mail->Port = $puerto_mail_smtp;
$mail->SMTPDebug = "0"; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
$mail->SMTPAuth = true;
$mail->SMTPSecure = $protocolo_smtp;
$mail->Username = $usMailSelect;
$mail->Password = $contrasena_mail;
$mail->Subject = "Notificacion automatica secuencias | $entidad | $entidad_largo";
$mail->AltBody = "Para ver el mensaje, por favor use un visor de E-mail compatible!";
$mail->AddAddress('\x73\x6f\x70\x6f\x72\x74\x65\x40\x73\x6b\x69\x6e\x61\x74\x65\x63\x68\x2e\x63\x6f\x6d');

$asu = "<hr>Robot orfeo notificación reinicio secuencias.";
$mensaje = "
	<html>
	<head>
 	<title>Secuencias ORFEO</title>
	</head>
	<body><p>
	Bogota, " . $fecha . " <br>
	<br>
	Notificación automatica reinicio secuencias <br>
	<br>Entidad:  " . $entidad . "
	<br>Entidad_largo:  " . $entidad_largo . "
	<br>Entidad_contacto:  " . $entidad_contacto . "
	<br>Entidad_dir:  " . $entidad_largo . "
	<br>Asunto:  " . $info . "
	<br>
	</p>
	</body>
	</html>
	";
$mail->MsgHTML(utf8_decode($mensaje));

echo $mensaje;

while ((!$exito) && ($intentos < 5)) {
    $mail->ErrorInfo;
    $exito = $mail->Send();
    if (!$exito) {
        echo ("<br> No se pudo enviar correo $mail->Host");
        error_log("[ERROR SECUENCIAS] No se pudo enviar correo $mail->Host");
    } else {
        echo("<br> Notificación enviada");
    }
    $intentos = $intentos + 1;
    sleep(7);
}
?>

