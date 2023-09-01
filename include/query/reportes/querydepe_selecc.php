<?php

/**
 * CONSULTA VERIFICACION PREVIA A LA RADICACION
 */
// By Skinatech - 14/08/2018
// Para la construcción del número de radicado, esto indica la parte inicial del radicado.
if ($estructuraRad == 'ymd'){
    $num = 9;
}elseif ($estructuraRad == 'ym') {
    $num = 7;
}else {
    $num = 5;
}

switch ($db->driver) {
    case 'mssql':
        $radi_nume_sal = "RADI_NUME_SAL ";
        $where_depe = " and " . $db->conn->substr . "(" . $radi_nume_sal . ", $num, " . $longitud_codigo_dependencia . ") in ($lista_depcod)";
        break;
    case 'oracle':
    case 'oci8':
    case 'oci805':
        $where_depe = "and " . $db->conn->substr . "(a.radi_nume_sal, $num, " . $longitud_codigo_dependencia . ") in ($lista_depcod)";
        break;

    //Modificado skina
    default:
        //$where_depe = "and cast(".$db->conn->substr."(a.radi_nume_sal, 5, ".$longitud_codigo_dependencia.") as integer) in ($lista_depcod)";
        $where_depe = "and " . $db->conn->substr . "(a.radi_nume_sal,$num, " . $longitud_codigo_dependencia . ") in ($lista_depcod)";
}
?>
