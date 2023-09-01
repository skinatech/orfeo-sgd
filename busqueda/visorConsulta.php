<?php
session_start();
$estructuraOrfeo = $_SESSION["estructuraOrfeo"];

if($estructuraOrfeo == false){
    include 'busquedaVisor.php';
}
else{
    include 'busquedaDocs.php';
}
?>