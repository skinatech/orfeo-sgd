<?php

switch ($db->driver) {
    case "oracle" :
    case 'oci8':
    case 'postgres':
        $numero = "a.RADI_NUME_RADI as RADI_NUME_DERI1";
        $radi_nume_radi = " a.radi_nume_radi ";
        $radi_nume_deri = " a.radi_nume_deri ";
        break;
    case "mssql":
        $numero = "a.RADI_NUME_RADI as RADI_NUME_DERI1";
        $radi_nume_radi = "  a.radi_nume_radi ";
        $radi_nume_deri = "  a.radi_nume_deri ";
        break;
    case "mysql":
        $numero = " a.RADI_NUME_RADI as RADI_NUME_DERI1";
        $radi_nume_radi = " a.radi_nume_radi ";
        $radi_nume_deri = "  a.radi_nume_deri ";
        break;
}
?>
