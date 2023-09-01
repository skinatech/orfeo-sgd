<?php

/***
  Autor: Andrés Mosquera
  Fecha: 2019-09-10
  Info: Se creó el archivo para realizar procesos de llamados ajax en el archivo crear.php
***/
session_start();
$dir_raiz = $_SESSION['dir_raiz'];
require_once("../../include/db/ConnectionHandler.php");
include "../../config.php";
$dbProcess = new ConnectionHandler("$dir_raiz");
$dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$dbProcess->conn->debug = false;

switch ($_POST['type']) {
    case '1':
        $contadorRadicados = 0;
        $queryRadicados = "SELECT radi_nume_radi, ra_asun, radi_depe_actu, radi_usua_actu FROM radicado WHERE radi_depe_actu = '" . $_POST['depeCodi'] . "' AND radi_usua_actu = '" . $_POST['usuaCodi'] . "'";
        $rsRadicados = $dbProcess->conn->query($queryRadicados);

        while (!$rsRadicados->EOF) {
            $contadorRadicados++;
            $rsRadicados->MoveNext();
        }
        echo $contadorRadicados;
    break;
}
?>