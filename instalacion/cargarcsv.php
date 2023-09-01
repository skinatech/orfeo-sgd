<?php

session_start();

$ruta_raiz = "..";
include "$ruta_raiz/config.php";
include_once "$ruta_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$ruta_raiz");
define('ADODB_ASSOC_CASE', 1);

/* ------------ INSERTA DEPENDENCIAS ------------ */
$archivotmp = "/home/admin/2-dependencias.csv";
$lineas = file($archivotmp); //cargamos el archivo
$i = 0; //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera líne
foreach ($lineas as $linea_num => $linea) {
    if ($i != 0) {
        $datos = explode(",", $linea);
        $depe_codi = trim($datos[0]);
        $depe_codi = str_pad($depe_codi, $longitud_codigo_dependencia, '0', STR_PAD_LEFT);
        $depe_nomb = trim($datos[1]);
        $dep_sigla = trim($datos[2]);
        $depe_codi_padre = trim($datos[3]);
        $depe_codi_padre = str_pad($depe_codi_padre, $longitud_codigo_dependencia, '0', STR_PAD_LEFT);
        $depe_codi_territorial = trim($datos[4]);
        $depe_codi_territorial = str_pad($depe_codi_territorial, $longitud_codigo_dependencia, '0', STR_PAD_LEFT);

        // codigo del departamento
        $dpto_codi = trim($datos[5]);
        $sqldpto = "select DPTO_CODI from departamento where DPTO_NOMB='$dpto_codi'";
        $query = $db->query($sqldpto);
        $sqldpto = $query->fields["DPTO_CODI"];

        // codigo del municipio
        $muni_codi = trim($datos[6]);
        $muni_codi = "select MUNI_CODI from municipio where MUNI_NOMB='$muni_codi'";
        $querymuni = $db->query($muni_codi);
        $muni_codi = $querymuni->fields["MUNI_CODI"];

        $dep_direccion = trim($datos[7]);

        $depe_estado = trim($datos[8]);
        if ($depe_estado == 'ACTIVO' || $depe_estado == 'ACTIVA') {
            $depe_estado = 1;
        } else {
            $depe_estado = 0;
        }

        $depe_rad_tp1 = trim($datos[9]);
        $depe_rad_tp2 = trim($datos[10]);
        $depe_rad_tp4 = trim($datos[11]);

        $sql = "insert into dependencia (depe_codi,depe_nomb,dep_sigla,depe_codi_padre,depe_codi_territorial,dpto_codi,muni_codi,"
                . "dep_direccion,depe_estado,depe_rad_tp1,depe_rad_tp2,depe_rad_tp4) values('$depe_codi','$depe_nomb','$dep_sigla',"
                . "'$depe_codi_padre','$depe_codi_territorial','$sqldpto','$muni_codi','$dep_direccion',$depe_estado,'$depe_rad_tp1',"
                . "'$depe_rad_tp2','$depe_rad_tp4')";
        $rsSql = $db->query($sql);

        $tipo_documental = trim($datos[12]);
        $tipodocumental = explode('.', $tipo_documental);

        for ($e = 0; $e < count($tipodocumental); $e++) {
            $isql = "SELECT MAX(SGD_MRD_CODIGO) AS NUMERO FROM SGD_MRD_MATRIRD";
            $rsisql = $db->query($isql);
            $matriz_codi = $rsisql->fields["NUMERO"] + 1;

            $sqlMatriz = "insert into sgd_mrd_matrird (sgd_mrd_codigo,depe_codi,sgd_srd_codigo,"
                    . "sgd_sbrd_codigo,sgd_tpr_codigo,sgd_mrd_esta) values($matriz_codi,'$depe_codi',"
                    . "0,0,$tipodocumental[$e],'1')";
            $rsSqlMatriz = $db->query($sqlMatriz);
        }
    }
    $i++;
}

/* ------------- INSERTA LAS SERIES -------------- */
$archivoseries = "/home/admin/5-series.csv";
$lineasseries = file($archivoseries);
$s = 0;
foreach ($lineasseries as $linea_numseries => $lineaserie) {
    if ($s != 0) {
        $datosseries = explode(",", $lineaserie);
        $serie_codi = trim($datosseries[0]);
        $serie_nomb = trim($datosseries[1]);
        $date = date('Y-m-d');

        $sqlseries = "insert into sgd_srd_seriesrd (sgd_srd_codigo,sgd_srd_descrip,sgd_srd_fechini,sgd_srd_fechfin) "
                . "values($serie_codi,'$serie_nomb','$date','2050-12-31')";
        $rsSqlseries = $db->query($sqlseries);
//        echo '---> ' . $sqlseries;
    }
    $s++;
}

/* ------------- INSERTA LAS SUBSERIES -------------- */
$archivosubseries = "/home/admin/6-subseries.csv";
$lineassubseries = file($archivosubseries);
$sb = 0;
foreach ($lineassubseries as $linea_numsubseries => $lineasubserie) {
    if ($sb != 0) {
        $datossubseries = explode(",", $lineasubserie);
        $sbserie_codi = trim($datossubseries[1]);
        $sqlsbSerie = "select SGD_SRD_CODIGO from sgd_srd_seriesrd where sgd_srd_descrip='$sbserie_codi'";
        $querysbSerie = $db->query($sqlsbSerie);
        $sbserie_codi = $querysbSerie->fields["SGD_SRD_CODIGO"];

        $sb_codi = trim($datossubseries[2]);
        $sb_descripcion = trim($datossubseries[3]);
        $sb_fechaIni = trim($datossubseries[4]);
        $sb_fechaFin = trim($datossubseries[5]);
        $sb_tiempoAG = trim($datossubseries[6]);
        $sb_tiempoAC = trim($datossubseries[7]);
        $sb_dipoFinal = trim($datossubseries[8]);
        $sb_soporte = trim($datossubseries[9]);
        $sb_procedimiento = trim($datossubseries[10]);
        $date = date('Y-m-d');

        $isqlsubseries = "SELECT MAX(id_tabla) AS NUMERO FROM sgd_sbrd_subserierd";
        $rsisqlsubseries = $db->query($isqlsubseries);
        $Idsubseries = $rsisqlsubseries->fields["NUMERO"] + 1;

        $sqlSubseriess = "insert into sgd_sbrd_subserierd (sgd_srd_codigo,sgd_sbrd_codigo,sgd_sbrd_descrip,sgd_sbrd_fechini,sgd_sbrd_fechfin,"
                . "sgd_sbrd_tiemag,sgd_sbrd_tiemac,sgd_sbrd_dispfin,sgd_sbrd_soporte,sgd_sbrd_procedi,id_tabla) values($sbserie_codi,$sb_codi,"
                . "'$sb_descripcion','$date','$sb_fechaFin',$sb_tiempoAG,$sb_tiempoAC,'$sb_dipoFinal','$sb_soporte','$sb_procedimiento',$datossubseries[0])";
        $rsSqlSubseries = $db->query($sqlSubseriess);
//        echo '----> ' . $sqlSubseriess . '<br>';
    }
    $sb++;
}

/* ------------- INSERTA LOS TIPOS DOCUMENTALES -------------- */
$archivotipos = "/home/admin/4-tiposdocumentales.csv";
$lineastipos = file($archivotipos);
$t = 0;
foreach ($lineastipos as $linea_numtipos => $lineatipo) {
    if ($t != 0) {
        $datostipo = explode(",", $lineatipo);
        $tipo_codi = trim($datostipo[0]);
        $tipo_nomb = trim($datostipo[1]);
        $tipo_termino = trim($datostipo[2]);
        $tipo_radicacion = trim($datostipo[3]);
        $tipo_salida = trim($datostipo[4]);
        $tipo_entrada = trim($datostipo[5]);
        $tipo_estado = trim($datostipo[6]);

        if ($tipo_estado == 'ACTIVO') {
            $tipo_estado = 1;
        } else {
            $tipo_estado = 0;
        }
        $tipo_pqr = trim($datostipo[7]);
        $tipo_formulario = trim($datostipo[8]);

        $isqltipos = "SELECT MAX(SGD_TPR_CODIGO) AS NUMERO FROM SGD_TPR_TPDCUMENTO";
        $rsisqltipos = $db->query($isqltipos);
        $tipos_codi = $rsisqltipos->fields["NUMERO"] + 1;

        $sqltipos = "insert into sgd_tpr_tpdcumento (sgd_tpr_codigo,sgd_tpr_descrip,sgd_tpr_termino,sgd_tpr_radica,sgd_tpr_tp1,sgd_tpr_tp2,"
                . "sgd_tpr_estado,sgd_tpr_tp4,sgd_tpr_web) values($tipos_codi,'$tipo_nomb',$tipo_termino,'$tipo_radicacion',$tipo_salida,$tipo_entrada,"
                . "$tipo_estado,$tipo_pqr,$tipo_formulario)";
        $rsSqltpos = $db->query($sqltipos);

        $subseriess = trim($datostipo[9]);
        $subseriess = explode('.', $subseriess);

        $isqlMRD = "SELECT SGD_MRD_CODIGO AS NUMERO FROM SGD_MRD_MATRIRD WHERE SGD_TPR_CODIGO=" . $tipos_codi;
        $rsisqlMRD = $db->query($isqlMRD);
        $mrd_codi = $rsisqlMRD->fields["NUMERO"];

        if (count($subseriess) > 0) {
            for ($sb = 0; $sb < count($subseriess); $sb++) {
                $isqlSbr = "SELECT SGD_SRD_CODIGO, SGD_SBRD_CODIGO, SGD_SBRD_SOPORTE FROM sgd_sbrd_subserierd WHERE id_tabla=" . $subseriess[$sb];
                $rsisqlsbr = $db->query($isqlSbr);
                $sbrserie_codi = $rsisqlsbr->fields["SGD_SRD_CODIGO"];
                $sbrsubserie_codi = $rsisqlsbr->fields["SGD_SBRD_CODIGO"];
                $sbsoporte = $rsisqlsbr->fields["SGD_SBRD_SOPORTE"];
//                echo '---> ', $isqlSbr . '<br>';

                $sqlMatriz = "update SGD_MRD_MATRIRD set SGD_SBRD_CODIGO=" . $sbrsubserie_codi . ", sgd_srd_codigo=" . $sbrserie_codi . ", "
                        . "soporte='$sbsoporte' where SGD_MRD_CODIGO=" . $mrd_codi;
                $rsSqlMatriz = $db->query($sqlMatriz);
//                echo 'Multiple ---> ' . $sqlMatriz . '<br>';
            }
        } else {
            $subseriess = trim($datostipo[9]);
            $isqlSbr = "SELECT SGD_SRD_CODIGO, SGD_SBRD_CODIGO, SGD_SBRD_SOPORTE FROM sgd_sbrd_subserierd WHERE id_tabla=" . $subseriess;
            $rsisqlsbr = $db->query($isqlSbr);
            $sbrserie_codi = $rsisqlsbr->fields["SGD_SRD_CODIGO"];
            $sbrsubserie_codi = $rsisqlsbr->fields["SGD_SBRD_CODIGO"];
            $sbsoporte = $rsisqlsbr->fields["SGD_SBRD_SOPORTE"];

            $sqlMatriz = "update SGD_MRD_MATRIRD set sgd_srd_codigo=" . $sbrserie_codi . ", SGD_SBRD_CODIGO=" . $sbrsubserie_codi . ", "
                    . "soporte='$sbsoporte' where SGD_MRD_CODIGO=" . $mrd_codi;
            $rsSqlMatriz = $db->query($sqlMatriz);
//            echo 'Unico ---> ' . $sqlMatriz . '<br>';
        }
    }
    $t++;
}

header('Location: mensaje.php?msn=2');
?>

