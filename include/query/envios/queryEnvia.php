<?php

/**
 * CONSULTA VERIFICACION PREVIA A LA RADICACION
 */
switch ($db->driver) {
    case 'mssql': {
            $sql = "select " . $db->conn->Concat("RTRIM(SGD_FENV_CODIGO)", "' '", "SGD_FENV_DESCRIP") .
                    ",SGD_FENV_CODIGO from SGD_FENV_FRMENVIO WHERE SGD_FENV_ESTADO=1 order by SGD_FENV_CODIGO";
            $RADI_NUME_SALIDA = " a.RADI_NUME_SALIDA";
            $radi_nume_deri = " b.RADI_NUME_DERI";
        }break;
    case 'mysql': {
            $sql = "select " . $db->conn->Concat("RTRIM(cast(SGD_FENV_CODIGO as char))", "' '", "SGD_FENV_DESCRIP") .
                    ",SGD_FENV_CODIGO from SGD_FENV_FRMENVIO WHERE SGD_FENV_ESTADO=1 order by SGD_FENV_CODIGO";
            $RADI_NUME_SALIDA = "a.radi_nume_salida";
            $radi_nume_deri = "b.radi_nume_deri";
        }break;
    case 'oracle':
    case 'oci8': {
            $sql = "select concat(concat(SGD_FENV_CODIGO,' '), SGD_FENV_DESCRIP) 
			    ,SGD_FENV_CODIGO from SGD_FENV_FRMENVIO WHERE SGD_FENV_ESTADO=1 order by SGD_FENV_CODIGO";
            $RADI_NUME_SALIDA = "a.RADI_NUME_SALIDA";
            $radi_nume_deri = "b.RADI_NUME_DERI";
        }break;
    default: {
            $sql = "select " . $db->conn->Concat("RTRIM(cast(SGD_FENV_CODIGO as varchar))", "' '", "SGD_FENV_DESCRIP") .
                    ",SGD_FENV_CODIGO from SGD_FENV_FRMENVIO WHERE SGD_FENV_ESTADO=1 order by SGD_FENV_CODIGO";
            $RADI_NUME_SALIDA = "a.RADI_NUME_SALIDA";
            $radi_nume_deri = "b.RADI_NUME_DERI";
        }break;
}
?>
