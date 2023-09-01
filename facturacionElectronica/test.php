<?php
require_once 'facturacionElectronica.php';
$data['nombre'] = 'KUSHKI COLOMBIA SAS';
$data['identificacion'] = '901000330';
$fe = new facturacionElectronica();
$answer = $fe->setRadicado($data);
var_dump($answer);