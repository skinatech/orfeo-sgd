<?php
$observa = " Almacenado en Fisico ";
$observa2 = " Almacenado en Fisico del radicado " . $nurad;
/* Modificado skinatech 231109 */
$sqlrad = "select RADI_NUME_RADI FROM SGD_EXP_EXPEDIENTE WHERE SGD_EXP_NUMERO LIKE '$num_expediente' AND cast(radi_nume_radi as char(15)) = '$nurad' order by RADI_NUME_RADI";
$rsrad = $db->query($sqlrad);
$j = 1;
//modificado skina conversion de variables 
$sqm = "select sgd_eit_sigla from sgd_eit_items where cast(sgd_eit_codigo as char(5)) like '$exp_piso2'";
$rs = $db->conn->Execute($sqm);
$exp_piso = $exp_piso2;

if ($exp_item12 != "") {
    //modificado skina conversion de variables 
    $ttp = "select sgd_eit_nombre from sgd_eit_items where cast(sgd_eit_codigo as char(5)) like '$exp_item12'";
    $rs = $db->conn->Execute($ttp);
    $tmp = $rs->fields['sgd_eit_nombre'];
    $tmp1 = explode(' ', $tmp);
    if ($tmp1[0] == "CAJA")
        $exp_caja = $exp_item12;
    if ($tmp1[0] == "ENTREPANO" or $tmp1[0] == "ENTREPAÑO")
        $exp_entrepa = $exp_item12;
}

if ($exp_item22 != "") {
    //modificado skina conversion de variables 
    $ttp = "select sgd_eit_nombre from sgd_eit_items where cast(sgd_eit_codigo as char(5)) like '$exp_item22' order by SGD_EIT_CODIGO";
    $rs = $db->conn->Execute($ttp);
    $tmp = $rs->fields['sgd_eit_nombre'];
    $tmp1 = explode(' ', $tmp);
    if ($tmp1[0] == "CAJA")
        $exp_caja = $exp_item22;
    if ($tmp1[0] == "ENTREPANO" or $tmp1[0] == "ENTREPAÑO")
        $exp_entrepa = $exp_item22;
}

if ($exp_item31 != "") {
    $ttp = "select sgd_eit_nombre from sgd_eit_items where sgd_eit_codigo = $exp_item31  order by SGD_EIT_CODIGO";
    $rs = $db->conn->Execute($ttp);
    $tmp = $rs->fields['sgd_eit_nombre'];
    $tmp1 = explode(' ', $tmp);
    if ($tmp1[0] == "CAJA")
        $exp_caja = $exp_item31;
    if ($tmp1[0] == "ENTREPANO" or $tmp1[0] == "ENTREPAÑO")
        $exp_entrepa = $exp_item31;
}

if ($exp_entre != "") {
    $ttp = "select sgd_eit_nombre from sgd_eit_items where sgd_eit_codigo = $exp_entre order by SGD_EIT_CODIGO";
    $rs = $db->conn->Execute($ttp);
    $tmp = $rs->fields['sgd_eit_nombre'];
    $tmp1 = explode(' ', $tmp);
    if ($tmp1[0] == "CAJA")
        $exp_caja = $exp_entre;
    if ($tmp1[0] == "ENTREPANO")
        $exp_entrepa = $exp_entre;
}

if ($exp_caja2 != "") {
    $ttp = "select sgd_eit_nombre from sgd_eit_items where sgd_eit_codigo like '$exp_caja2' order by SGD_EIT_CODIGO";
    $rs = $db->conn->Execute($ttp);
    $tmp = $rs->fields['sgd_eit_nombre'];
    $tmp1 = explode(' ', $tmp);
    if ($tmp1[0] == "CAJA")
        $exp_caja = $exp_caja2;
    if ($tmp1[0] == "ENTREPANO" or $tmp1[0] == "ENTREPAÑO")
        $exp_entrepa = $exp_caja2;
}

if ($GLOBALS['exp_caja3'] != "")
    $exp_caja = $GLOBALS['exp_caja3'];
//if($exp_caja=="")$exp_caja=0;
if ($exp_entrepa == "")
    $exp_entrepa = 0;
if ($exp_entrepa == "")
    $exp_entrepa = $exp_entre;
if ($exp_estante == "")
    $exp_estante = 0;
if ($exp_subexpediente == "")
    $exp_subexpediente = 0;
if ($CD_TOL == "")
    $CD_TOL = 0;
if ($NREF == "")
    $NREF = 0;

while (!$rsrad->EOF) {
    $arrayRad[$j] = $rsrad->fields['radi_nume_radi'];
    $j++;
    $rsrad->MoveNext();
}

$sqlrad3 = "select e.RADI_NUME_RADI,e.SGD_EXP_ESTADO,r.RADI_NUME_HOJA,r.MEDIO_M FROM SGD_EXP_EXPEDIENTE e, RADICADO r WHERE SGD_EXP_NUMERO LIKE '$num_expediente' and r.RADI_NUME_RADI=e.RADI_NUME_RADI";
if ($exp_carpeta2 != "")
    $sqlrad3 .= " and e.SGD_EXP_CARPETA LIKE '$exp_carpeta2'";
if ($exp_carpeta2 == "")
    $sqlrad3 .= " and e.SGD_EXP_CARPETA IS NULL";

/* Modificado skinatech 231109 */;
$sqlrad3 .= " and cast(r.radi_nume_radi as char(15)) = '$nurad' ORDER BY e.RADI_NUME_RADI";
$rsrad3 = $db->query($sqlrad3);
$cpt = $exp_carpeta;
$j = 1;
$p = 1;
$exp_folio = 0;

while (!$rsrad3->EOF) {
    $arrayRad2[$j] = $rsrad3->fields['RADI_NUME_RADI'];
    $foli[$j] = $rsrad3->fields['RADI_NUME_HOJA'];
    $CD1[$j] = $rsrad3->fields['MEDIO_M'];
    $esta[$j] = $rsrad3->fields['SGD_EXP_ESTADO'];

    if ($esta[$j] == 1) {
        $CD_TOL += $CD1[$j];
        $exp_folio += $foli[$j];
    } else {
        $arrayRad3[$p] = $arrayRad2[$j];
        $p++;
    }
    $rsrad3->MoveNext();
    $j++;
}

$fo = $fol[1];
$cont = count($arrayRad2);
$cont3 = count($arrayRad3);
if ($EST == 2) {
    $exp_rete = '1';
    $exp_fechaFin = date("Y-m-d");
    echo $exp_fechaFin;
} else
    $exp_rete = 0;

if ($EST == "")
    $EST = 1;

// Modificado skina 030909 Para Emdupar
$exp_estante = $exp_item31;
$exp_caja = $exp_item31;
//Modificación temporal ya que guarda un tipo de caracter no valido. 
//inci -12-dic-2013. 
$exp_entrepa = $exp_item22;

// By SkinaTech, Nov 23/09
if ($UN != '' and $exp_carpeta != '') {
    // By skinatech, noviembre 17 de 2009
    if ($cont >= 1) {
        //$db->conn->debug=true;
        if ($exp_fechaFin >= date("Y-m-d")) {
            //modificado skina mal ubicados los valores
            $fecha_finals = date("Y-m-d", strtotime('next year'));
            $res = $btt->modificar_expediente($arrayRad2[1], $num_expediente, $exp_titulo, $exp_asunto, $exp_item12, $exp_piso2, $exp_item31, $exp_estante, $exp_carpeta, $exp_subexpediente, $EST, $UN, $exp_fechaIni, $fecha_finals, $exp_folio, $exp_rete, $exp_entrepa, $exp_edificio2, $krd, $exp_item22);
	    
            //modificado skina conversion de variables
            $sqm = "update radicado set RADI_NUME_HOJA='$fo', MEDIO_M='$CD[1]' where radi_nume_radi like '$arrayRad2[1]'";
            $rst = $db->query($sqm);

            for ($po = $cont3; $po > 0; $po--) {
                if ($arrayRad3[$po] == $arrayRad2[1])
                    $arrayRad4[1] = $arrayRad3[1];
            }
        }
    }

    if ($exp_fechaFin <= date("Y-m-d")) {
        //echo("2");
        $i = 1;
        $k = 3;
        $tem = 1;
        while ($i <= $cont) {
            if ($inclu[$i] == $k) {
                //modificado skina valores en desorden
                $fecha_finals = date("Y-m-d", strtotime('next year'));
                $res = $btt->modificar_expediente($arrayRad2[1], $num_expediente, $exp_titulo, $exp_asunto, $exp_item12, $exp_piso2, $exp_item31, $exp_estante, $exp_carpeta, $exp_subexpediente, $EST, $UN, $exp_fechaIni, $fecha_finals, $exp_folio, $exp_rete, $exp_entrepa, $exp_edificio2, $krd, $exp_item22);
		$radnume = $arrayRad2[$i];
                $sqm = "update radicado set RADI_NUME_HOJA=$fol[$i], MEDIO_M='$CD[$i]' where radi_nume_radi like '$radnume'";
                $rst = $db->query($sqm);

                for ($po = $cont3; $po > 0; $po--) {
                    if ($arrayRad3[$po] == $arrayRad2[$i]) {
                        $arrayRad4[$tem] = $arrayRad3[$po];
                        $tem++;
                    }
                }
                $i++;
                $k++;
            }
        }
    }
}

// By SkinaTech, Nov 17 de 2009, mensaje de aviso para que ingrese unidad documental                                               
if ($UN == '' or $exp_carpeta == '') {
    echo "<br> Debe seleccionar Unidad Documental e ingresar el número a la que pertenece";
}
if ($res == false) {
    echo '<br>Lo siento no pudo Actualizar los datos del expediente<br>';
} else {
    echo "<br>Datos de expediente Grabados Correctamente<br>";
    $objHistorico->insertarHistorico($arrayRad4, $dep_sel, $codusuario, $dep_sel, $codusuario, $observa, 57);
}
?>
