<?php

switch ($db->driver) {
    case "oracle" :
    case 'oci8':
        $nombre = "RADI_NUME_SALIDA";
        break;
    case "mssql":
        $nombre = " RADI_NUME_SALIDA";
        break;
}
?>
