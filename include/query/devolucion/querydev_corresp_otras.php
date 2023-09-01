<?php

/**
 * CONSULTA VERIFICACION PREVIA A LA RADICACION
 */
$sqlConcatC = $tmp_hlp;
$condicion = $tmp_hlp;
switch ($db->driver) {
    case 'mssql': {
            $nombre = "(a.radi_nume_sal)";
            $nombre2 = $db->conn->Concat("radi_nume_sal");
        }break;
    case 'oracle':
    case 'oci8':{
            $nombre = "(a.radi_nume_sal)";
            $nombre2 = $db->conn->Concat("radi_nume_sal");
        }break;
    case 'mysql': {
            $nombre = "(a.radi_nume_sal)";
            $nombre2 = $db->conn->Concat("radi_nume_sal");
        }break;
    default: {
            $nombre = "(a.radi_nume_sal)";
            $nombre2 = $db->conn->Concat("radi_nume_sal");
        }break;
}
?>
