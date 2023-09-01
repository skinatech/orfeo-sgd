<?php

session_start();
$ruta_raiz = "..";
if ($_SESSION["colorFondo"])
    $_SESSION["colorFondo"] = "8cacc1";
$imagenes = $_SESSION["imagenes"];
include_once "$ruta_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler($ruta_raiz);
error_reporting(7);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$fecha = "'FIN  " . date("Y:m:d H:mi:s") . "'";
//$db->conn->debug=true;
$isql = "update usuario 
		set usua_sesion=" . $fecha . " 
		where USUA_SESION like '%" . session_id() . "%'";
//echo "Fecha $fecha "; // --- Session ->".substr(session_id(),0,29);
if (!$db->conn->Execute($isql)) {
    echo "<p><center>No pude actualizar<p><br>";
}
////  fin cierre session
session_destroy();
$PHPSESSID = "";

session_id("CorreLibre".date("YMDIS"));
session_start("dasdfadf");
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://192.168.8.74/conf-orfeo/instalacion/pages/login_parametrizacion.php">
