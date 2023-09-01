<?PHP

if (!$db->driver) {
    $db = $this->db;
} //Esto sirve para cuando se llama este archivo dentro de clases donde no se conoce $db.
$systemDate = $db->conn->sysTimeStamp;
$tmp_substr = $db->conn->substr;
switch ($db->driver) {
    case 'mssql':
        // Ejecuta la consulta por defecto si no es DNP
        $radi_nume_radi = " r.radi_nume_radi ";
        $radi_nume_deri = " c r.radi_nume_deri ";
        $usua_doc_c = "  c.USUA_DOC ";
        $radi_nume_salida = "  RADI_NUME_SALIDA ";
        $radi_nume_sal = " RADI_NUME_SAL";
        $anex_radi_nume = " r.anex_radi_nume ";
        //by skina $redondeo = $db->conn->round("(r.radi_fech_radi+(td.sgd_tpr_termino * 7/5))"."-".$systemDate.")+(select count(*) from sgd_noh_nohabiles where NOH_FECHA between r.radi_fech_radi and ".$db->conn->sysTimeStamp.")");
        $redondeo = "datepart(dd, r.radi_fech_radi-" . $db->conn->sysTimeStamp . ")+td.sgd_tpr_termino+(select count(*) from sgd_noh_nohabiles where NOH_FECHA between r.radi_fech_radi and " . $db->conn->sysTimeStamp . ")";
        $redondeo2 = $db->conn->round("(agen.SGD_AGEN_FECHPLAZO)-$systemDate");
        $diasf = " convert(int," . $systemDate . "-r.sgd_fech_impres)";
        break;
    case 'oracle':
    case 'oci8':
            $radi_nume_radi = " r.radi_nume_radi ";
            $usua_doc_c = " c.USUA_DOC ";
            $radi_nume_salida = " RADI_NUME_SALIDA ";
            $radi_nume_sal = " RADI_NUME_SAL ";
            $redondeo = "round(((r.RADI_FECH_RADI+td.SGD_TPR_TERMINO)-" . $systemDate . "))+(select count(*) from sgd_noh_nohabiles where NOH_FECHA between r.radi_fech_radi and " . $db->conn->sysTimeStamp . ")";
            break;
    case 'mysql':
        // Ejecuta la consulta por defecto si no es DNP
        $radi_nume_radi = " r.radi_nume_radi ";
        $radi_nume_deri = " r.radi_nume_deri ";
        $usua_doc_c = "  c.USUA_DOC ";
        $radi_nume_salida = "RADI_NUME_SALIDA ";
        $radi_nume_sal = "  RADI_NUME_SAL ";
        $anex_radi_nume = " r.anex_radi_nume ";
        //by skina 
        $redondeo = "DAYOFWEEK(r.radi_fech_radi-" . $db->conn->sysTimeStamp . ")+td.sgd_tpr_termino +(select count(*) from sgd_noh_nohabiles where NOH_FECHA between r.radi_fech_radi and " . $db->conn->sysTimeStamp . ")";
        break;
    case 'postgres':
    case 'postgres7': {
            $radi_nume_radi = "r.radi_nume_radi ";
            $usua_doc_c = "c.USUA_DOC ";
            $radi_nume_salida = "RADI_NUME_SALIDA ";
            $radi_nume_sal = "RADI_NUME_SAL";
            //$redondeo="date_part('days', r.radi_fech_radi-".$db->conn->sysTimeStamp.")+floor(td.sgd_tpr_termino * 7/5)+(select count(*) from sgd_noh_nohabiles where NOH_FECHA between r.radi_fech_radi and ".$db->conn->sysTimeStamp.")";
            //by skina para empopasto
            $redondeo = "date_part('days', r.radi_fech_radi-" . $db->conn->sysTimeStamp . ")+dt.dias_termino +(select count(*) from sgd_noh_nohabiles where NOH_FECHA between r.radi_fech_radi and " . $db->conn->sysTimeStamp . ")";
        }break;
    default: {
            $radi_nume_radi = " r.radi_nume_radi ";
            $usua_doc_c = " c.USUA_DOC ";
            $radi_nume_salida = " RADI_NUME_SALIDA ";
            $radi_nume_sal = " RADI_NUME_SAL ";
        }break;
}
?>
