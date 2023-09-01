<?php

session_start();
$dir_raiz = $_SESSION['dir_raiz'];
require_once("../../include/db/ConnectionHandler.php");
include "../../config.php";
$dbProcess = new ConnectionHandler("$dir_raiz");
$dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$dbProcess->conn->debug = false;

//Type 2 = Consulta de los radicados de acuerdo a la dependencia
if (isset($_POST['type']) && $_POST['type'] == 2) {

    $tableRadicados = "";

    $queryRadicados = "SELECT * FROM configuracion_contrasena where anio_creacion ='".date('Y')."'";
    $rsRadicados = $dbProcess->conn->query($queryRadicados);

    while (!$rsRadicados->EOF) {
        $tableRadicados .= "<tr>";
        $tableRadicados .= "<td>" . $rsRadicados->fields['NUMERO_PERIOCIDAD'] . "</td>";
        $tableRadicados .= "<td>" . $rsRadicados->fields['DESCRIPCION_PERIOCIDAD'] . "</td>";
        $tableRadicados .= "<td>" . $rsRadicados->fields['DIAS_NOTIFICACION'] . "</td>";
        $tableRadicados .= "<td>" . $rsRadicados->fields['ESTADO_CONFIGURACION_CONTRASENA'] . "</td>";
        $tableRadicados .= "</tr>";

        $rsRadicados->MoveNext();
    }
    echo $tableRadicados;
}

//Type 1 = Inserta la información
if (isset($_POST['type']) && $_POST['type'] == 1) {

    $tableRadicados = "";

    $sqlInactivar = "update configuracion_contrasena set estado_configuracion_contrasena='0'";
    $rsInactivar = $dbProcess->conn->query($sqlInactivar);
                    
    $isertrol = "insert into configuracion_contrasena (numero_periocidad, descripcion_periocidad, dias_notificacion, estado_configuracion_contrasena, anio_creacion) values(".$_POST['numeroPeriocidad'].",'".$_POST['listPeriocidad']."', ".$_POST['numeroAntesVencimiento']." ,'1','".date('Y')."')";
    $rs = $dbProcess->conn->query($isertrol);

    //error_log('---------------- '.$isertrol);

    if($rs){
        echo 'Se guardo la información de forma correcta.';    
    }else{
        echo 'No se pudo guardar la información.';
    }
    
}

?>
