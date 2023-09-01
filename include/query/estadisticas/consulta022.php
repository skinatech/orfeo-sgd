<?php

/*****
 * @autor Jenny Gamez
 * Orfeo 6.0
 * Estadistica que muestra los radicados de PQRS que se encuentran en cada uno de los estados segun como corresponde y adicional indica
 * si el mismo se encuentra vencido porque no se haya mandado a archivar
 * ACTUALMENTE SOLO ESTA EN POSTGRES
 ****/

 $coltp3Esp = '"' . $tip3Nombre[3][2] . '"';
if (!$orno)
    $orno = 2;


// Toma como criterio de busqueda la dependencia
$sWhere = ($dependencia_busq == '99999') ? " " : "AND ra.radi_depe_actu = '$dependencia_busq' ";

switch ($db->driver) {
    case 'postgres': {
            $queryE = "SELECT 
                        deac.depe_nomb as DEPENDENCIA_ACTUAL,
                        COUNT (case WHEN DATE_PART('day', ra.radi_fech_radi::date)-DATE_PART('day', an.fecha_rec_remi::date) <= 0 and DATE_PART('day', ra.radi_fech_radi::date)-DATE_PART('day', an.fecha_rec_remi::date) <=7 THEN '1' END ) as CERO_SIETE, 
                        COUNT (case WHEN DATE_PART('day', ra.radi_fech_radi::date)-DATE_PART('day', an.fecha_rec_remi::date) > 7 and DATE_PART('day', ra.radi_fech_radi::date)-DATE_PART('day', an.fecha_rec_remi::date) <=15 THEN '1' END) as OCHO_QUINCE, 
                        COUNT (case WHEN DATE_PART('day', ra.radi_fech_radi::date)-DATE_PART('day', an.fecha_rec_remi::date) > 15 and DATE_PART('day', ra.radi_fech_radi::date)-DATE_PART('day', an.fecha_rec_remi::date) <=30 THEN '1' END) as DIECISEIS_TREINTA,
                        COUNT (case WHEN DATE_PART('day', ra.radi_fech_radi::date)-DATE_PART('day', an.fecha_rec_remi::date) > 15 and DATE_PART('day', ra.radi_fech_radi::date)-DATE_PART('day', an.fecha_rec_remi::date) > 30 THEN '1' END) as TREINTA  
                    FROM radicado ra ".
                        " INNER JOIN dependencia deac on ra.radi_depe_actu=deac.depe_codi ".
                        " LEFT JOIN anexos an on ra.radi_nume_radi=an.anex_radi_nume";

            $queryE .= " WHERE " .$db->conn->SQLDate('Y/m/d', 'ra.radi_fech_radi') . " BETWEEN '$fecha_ini' AND '$fecha_fin' ".
                "AND (radi_nume_radi like '%4' or radi_nume_radi like '%2') AND an.radi_nume_salida is not null ".
                "AND an.radi_nume_salida <> '0' ". $sWhere;
            $queryE .= " GROUP BY DEPENDENCIA_ACTUAL";
        }

    break;
}

$titulos = array("#", "1#Dependencia Actual", "2#0-7 Días", "3#8-15 Días","4#16-30 Días","5#Más de 30 Días","6#Total");

function pintarEstadistica($fila, $indice, $numColumna){

    global $ruta_raiz, $_POST, $_GET, $krd, $ambiente;

    $dependencia_actual = $fila['DEPENDENCIA_ACTUAL'];
    $cero_siete = $fila['CERO_SIETE'];
    $ocho_quince = $fila['OCHO_QUINCE'];
    $dieciseis_treinta = $fila['DIECISEIS_TREINTA'];
    $treinta = $fila['TREINTA'];

    $total = $cero_siete + $ocho_quince + $dieciseis_treinta + $treinta;

    $salida = "";
    switch ($numColumna) {
        case 0:
            $salida = $indice;
            break;
        case 1:
            $salida = $dependencia_actual;
            break;
        case 2:
            $salida = $cero_siete;
            break;
        case 3:
            $salida = $ocho_quince;
            break;
        case 4:
            $salida = $dieciseis_treinta;
            break;
        case 5:
            $salida = $treinta;
            break; 
        case 6:
            $salida = $total;
            break;    
        default:$salida = false;
    }
    return $salida;
}


?>
