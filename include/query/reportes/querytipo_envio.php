<?php

/**
 * CONSULTA VERIFICACION PREVIA A LA RADICACION
 */
switch ($db->driver) {
    case 'mssql':
        $sqlConcat = $db->conn->Concat("cast(SGD_FENV_CODIGO as varchar)", "'-'", "SGD_FENV_DESCRIP");
        break;
    case 'oracle':
    case 'oci8':
    case 'oci805':
        $sqlConcat = $db->conn->Concat("SGD_FENV_CODIGO", "'-'", "SGD_FENV_DESCRIP");
        break;

    //Modificado skina
    default:
        $sqlConcat = $db->conn->Concat("SGD_FENV_CODIGO", "'-'", "SGD_FENV_DESCRIP");
}
?>