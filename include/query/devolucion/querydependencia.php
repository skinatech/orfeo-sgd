<?php

/**
 * CONSULTA VERIFICACION PREVIA A LA RADICACION
 */
switch ($db->driver) {
    case 'mssql':
        $sqlConcat = $db->conn->Concat("depe_codi", "'-'", "depe_nomb");
        break;
    case 'mysql':
        $sqlConcat = $db->conn->Concat("depe_codi", "'-'", "depe_nomb");
        break;
    case 'oci8':
        $sqlConcat = $db->conn->Concat("depe_codi", "'-'", "depe_nomb");
        break;
    default:
        $sqlConcat = $db->conn->Concat("depe_codi", "'-'", "depe_nomb");
}
?>
