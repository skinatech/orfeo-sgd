<?php

session_start();

$ruta_raiz = "..";
include "$ruta_raiz/config.php";
include_once "$ruta_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$ruta_raiz");
define('ADODB_ASSOC_CASE', 1);

$qldelete = "delete from dependencia where depe_codi !='0998' || depe_codi !='0999' ";
$db->query($qldelete);

$qldeleteserie = "delete from sgd_srd_seriesrd";
$db->query($qldeleteserie);

$qldeleteSubserie = "delete from sgd_srd_seriesrd";
$db->query($qldeleteSubserie);

$qldeleteTipo = "delete from sgd_tpr_tpdcumento where sgd_tpr_codigo != 0";
$db->query($qldeleteTipo);

$qldeleteMatriz = "delete from SGD_MRD_MATRIRD";
$db->query($qldeleteMatriz);

header('Location: mensaje.php?msn=3');