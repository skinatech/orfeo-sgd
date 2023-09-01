<?php
$mensajes = " Se ha descargado la versión de ORFEO5 desde orfeolibre y realizaron la siguiente configuración </br></br> " .
            " <b> Fecha de ejecucion:</b> " . date("Y-m-d H:i:s") . '</br>' .
            " <b>Razón Social:</b> " . $entidad_largo . '</br>' .
            " <b>Nit:</b> " . $nit_entidad . '</br>' .
            " <b>Telefono:</b> " . $entidad_tel . '</br>' .
            " <b>Contacto:</b> " . $entidad_contacto . '</br>' .
            " <b>Dirección:</b> " . $entidad_dir . '</br>' .
            " <b>Pais:/<b> " . $pais;


$to      = $cuentaDestino;
$subject = utf8_decode("Instalación nueva");
$headers = 'From: root@orfeo.kuine.local' . "\r\n" .
    'X-Mailer: PHP/' . phpversion(). "\r\n" .
    'Content-type: text/html';

mail($to, $subject, $mensajes, $headers);
?>
