<?php

/**
 * En este frame se van cargado cada una de las funcionalidades del sistema
 *
 * Descripcion Larga
 *
 * @category
 * @package      SGD Orfeo
 * @subpackage   Main
 * @author       Community
 * @author       Skina Technologies SAS (http://www.skinatech.com)
 * @license      GNU/GPL <http://www.gnu.org/licenses/gpl-2.0.html>
 * @link         http://www.orfeolibre.org
 * @version      SVN: $Id$
 * @since
 */
/* ---------------------------------------------------------+
  |                     INCLUDES                             |
  +--------------------------------------------------------- */


/* ---------------------------------------------------------+
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
session_start();
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


/*
 * 	Al cargar este c�igo, si hay un municipio por defecto se cargan los combos con la respectiva informaci�, sino se
 * 	cargan los combos vacios y a traves de javascript vamos cambiando el contenido de los combos jerarquicamente.
 *
 * 	Creamos un recordset (y respectivo vector) para cada componente de direccion (Continentes, Paises, Dptos y Mnpios),
 * 	usamos de "entrada" la opci� getmenu2 de ADODB para generar combos con las opciones por defecto.
 * 	El vector es para crearlos en javascript y cambiar las opciones a medida que cambien lo seleccionado en los combos. 
 */

$ADODB_CACHE_DIR = session_save_path();
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

//$ADODB_ANSI_PADDING_OFF = true;

/*
 * 	Funcion que convierte un valor de PHP a un valor Javascript.
 */
function valueToJsValue($value, $encoding = false) {
    if (!is_numeric($value)) {
        $value = str_replace('\\', '\\\\', $value);
        $value = str_replace('"', '\"', $value);
        $value = '"' . $value . '"';
    }
    if ($encoding) {
        switch ($encoding) {
            case 'utf8' : return iconv("ISO-8859-2", "UTF-8", $value);
                break;
        }
    } else {
        return $value;
    }
    return;
}

/*
 * 	Funcion que convierte un vector de PHP a un vector Javascript.
 * 	Utiliza a su vez la funcion valueToJsValue.
 */

function arrayToJsArray($array, $name, $nl = "\n", $encoding = false) {
    if (is_array($array)) {
        $jsArray = $name . ' = new Array();' . $nl;
        foreach ($array as $key => $value) {
            switch (gettype($value)) {
                case 'unknown type':
                case 'resource':
                case 'object': break;
                case 'array': $jsArray .= arrayToJsArray($value, $name . '[' . valueToJsValue($key, $encoding) . ']', $nl);
                    break;
                case 'NULL': $jsArray .= $name . '[' . valueToJsValue($key, $encoding) . '] = null;' . $nl;
                    break;
                case 'boolean': $jsArray .= $name . '[' . valueToJsValue($key, $encoding) . '] = ' . ($value ? 'true' : 'false') . ';' . $nl;
                    break;
                case 'string': $jsArray .= $name . '[' . valueToJsValue($key, $encoding) . '] = ' . valueToJsValue($value, $encoding) . ';' . $nl;
                    break;
                case 'double':
                case 'integer': $jsArray .= $name . '[' . valueToJsValue($key, $encoding) . '] = ' . $value . ';' . $nl;
                    break;
                default: trigger_error('Hoppa, egy j t�us a PHP-ben?' . __CLASS__ . '::' . __FUNCTION__ . '()!', E_USER_WARNING);
            }
        }
        return $jsArray;
    } else {
        return false;
    }
}

$sql_continentes = "SELECT NOMBRE_CONT, ID_CONT FROM SGD_DEF_CONTINENTES";
//$Rs_Cont = $db->conn->query($sql_continentes);
$Rs_Cont = $db->conn->CacheExecute(15, $sql_continentes);
unset($sql_continentes);

$sql_pais = "SELECT ID_PAIS AS ID1, NOMBRE_PAIS AS NOMBRE, ID_CONT AS ID0 FROM SGD_DEF_PAISES ORDER BY SGD_DEF_PAISES.NOMBRE_PAIS";
$Rs_pais = $db->conn->CacheExecute(15, $sql_pais);
//$Rs_pais = $db->conn->query($sql_pais);
if ($Rs_pais) {
    $vpaisesv = array();
    $idx = 0;
    while (!$Rs_pais->EOF) {

        /* Se evalua el driver que llega del archivo de configuración, los resultados obtenidos se muestra de forma diferentes     *
         * debido a que en postgres las columnas toca pasarlas en minusculas, y en oracle si toca tal cual se llaman en la consulta */
        switch ($db->driver) {
            case 'mssql':
                $idRs_pais = $Rs_pais->fields['ID1'];
                $nombreRs_pais = $Rs_pais->fields['NOMBRE'];
                $id0Rs_pais = $Rs_pais->fields['ID0'];
                break;
            case 'mysql':
                $idRs_pais = $Rs_pais->fields['ID1'];
                $nombreRs_pais = $Rs_pais->fields['NOMBRE'];
                $id0Rs_pais = $Rs_pais->fields['ID0'];
                break;
            case 'oci8':
                $idRs_pais = $Rs_pais->fields['ID1'];
                $nombreRs_pais = $Rs_pais->fields['NOMBRE'];
                $id0Rs_pais = $Rs_pais->fields['ID0'];
                break;
                break;
            case 'postgres':
                $idRs_pais = $Rs_pais->fields['ID1'];
                $nombreRs_pais = $Rs_pais->fields['NOMBRE'];
                $id0Rs_pais = $Rs_pais->fields['ID0'];
                break;
        }

        $vpaisesv[$idx]['ID1'] = $idRs_pais;
        $vpaisesv[$idx]['NOMBRE'] = $nombreRs_pais;
        $vpaisesv[$idx]['ID0'] = $id0Rs_pais;
        $idx += 1;
        $Rs_pais->MoveNext();
    }
}
unset($sql_pais);
$Rs_pais->Move(0);

//Modificado skina 14-02-18
//By skina Segun el drive se realiza la consulta
switch ($db->driver) {
    case 'mssql':
        $cad = $db->conn->Concat("cast((DEPARTAMENTO.ID_PAIS) as varchar(19))", "'-'", "cast((DEPARTAMENTO.DPTO_CODI) as varchar(19))");
        break;
    case 'mysql':
        $cad = $db->conn->Concat("(DEPARTAMENTO.ID_PAIS)", "'-'", "(DEPARTAMENTO.DPTO_CODI)");
        break;
    case 'oci8':
        $cad = $db->conn->Concat("(DEPARTAMENTO.ID_PAIS)", "'-'", "(DEPARTAMENTO.DPTO_CODI)");
        break;
        break;
    case 'postgres':
        $cad = $db->conn->Concat("(DEPARTAMENTO.ID_PAIS)", "'-'", "(DEPARTAMENTO.DPTO_CODI)");
        break;
}

$sql_dpto = "SELECT $cad AS ID1, DEPARTAMENTO.DPTO_NOMB AS NOMBRE, DEPARTAMENTO.ID_PAIS AS ID0
	    FROM DEPARTAMENTO, SGD_DEF_PAISES
            WHERE DEPARTAMENTO.ID_PAIS = SGD_DEF_PAISES.ID_PAIS
            GROUP BY $cad, DEPARTAMENTO.DPTO_NOMB, DEPARTAMENTO.ID_PAIS
            ORDER BY DEPARTAMENTO.DPTO_NOMB";
$Rs_dpto = $db->conn->CacheExecute(15, $sql_dpto);

if ($Rs_dpto) {
    $it = 0;
    $vdptosv = array();
    while (!$Rs_dpto->EOF) {

        /* Se evalua el driver que llega del archivo de configuración, los resultados obtenidos se muestra de forma diferentes      *
         * debido a que en postgres las columnas toca pasarlas en minusculas, y en oracle si toca tal cual se llaman en la consulta */
        switch ($db->driver) {
            case 'mssql':
                $idRs_dpto = $Rs_dpto->fields['ID1'];
                $nombreRs_dpto = $Rs_dpto->fields['NOMBRE'];
                $id0Rs_dpto = $Rs_dpto->fields['ID0'];
                break;
            case 'mysql':
                $idRs_dpto = $Rs_dpto->fields['ID1'];
                $nombreRs_dpto = $Rs_dpto->fields['NOMBRE'];
                $id0Rs_dpto = $Rs_dpto->fields['ID0'];
                break;
            case 'oci8':
                $idRs_dpto = $Rs_dpto->fields['ID1'];
                $nombreRs_dpto = $Rs_dpto->fields['NOMBRE'];
                $id0Rs_dpto = $Rs_dpto->fields['ID0'];
                break;
            case 'postgres':
                $idRs_dpto = $Rs_dpto->fields['ID1'];
                $nombreRs_dpto = $Rs_dpto->fields['NOMBRE'];
                $id0Rs_dpto = $Rs_dpto->fields['ID0'];
                break;
        }

        $vdptosv[$it]['ID1'] = $idRs_dpto;
        $vdptosv[$it]['NOMBRE'] = $nombreRs_dpto;
        $vdptosv[$it]['ID0'] = $id0Rs_dpto;

        $it += 1;
        $Rs_dpto->MoveNext();
    }
}
unset($sql_dpto);
$Rs_dpto->Move(0);

//By skina Segun el drive se realiza la consulta
switch ($db->driver) {
    case 'mssql':
        $cad = $db->conn->Concat("cast((MUNICIPIO.ID_PAIS) as varchar(19))", "'-'", "cast((MUNICIPIO.DPTO_CODI) as varchar(19))", "'-'", "cast((MUNICIPIO.MUNI_CODI)as varchar(19))");
        break;
    case 'mysql':
        $cad = $db->conn->Concat("(MUNICIPIO.ID_PAIS)", "'-'", "(MUNICIPIO.DPTO_CODI)", "'-'", "(MUNICIPIO.MUNI_CODI)");
        break;
    case 'oci8':
        $cad = $db->conn->Concat("(MUNICIPIO.ID_PAIS)", "'-'", "(MUNICIPIO.DPTO_CODI)", "'-'", "(MUNICIPIO.MUNI_CODI)");
        break;
    case 'postgres':
        $cad = $db->conn->Concat("(MUNICIPIO.ID_PAIS)", "'-'", "(MUNICIPIO.DPTO_CODI)", "'-'", "(MUNICIPIO.MUNI_CODI)");
        break;
}

$sql_mcpo = "SELECT $cad as ID1, MUNICIPIO.MUNI_NOMB as NOMBRE, MUNICIPIO.DPTO_CODI as ID0, 
			MUNICIPIO.ID_PAIS as ID, MUNICIPIO.HOMOLOGA_MUNI, MUNICIPIO.HOMOLOGA_IDMUNI 
			FROM MUNICIPIO, DEPARTAMENTO, SGD_DEF_PAISES, SGD_DEF_CONTINENTES 
			WHERE MUNICIPIO.ID_PAIS = SGD_DEF_PAISES.ID_PAIS AND 
			MUNICIPIO.ID_CONT = SGD_DEF_CONTINENTES.ID_CONT AND 
			MUNICIPIO.DPTO_CODI = DEPARTAMENTO.DPTO_CODI 
			GROUP BY $cad, MUNICIPIO.MUNI_NOMB, MUNICIPIO.DPTO_CODI, MUNICIPIO.ID_PAIS, MUNICIPIO.HOMOLOGA_MUNI, MUNICIPIO.HOMOLOGA_IDMUNI 
			ORDER BY MUNICIPIO.MUNI_NOMB";
$Rs_mcpo = $db->conn->CacheExecute(15, $sql_mcpo);

if ($Rs_mcpo) {
    $it = 0;
    $vmcposv = array();
    while (!$Rs_mcpo->EOF) {

        /* Se evalua el driver que llega del archivo de configuración, los resultados obtenidos se muestra de forma diferentes      *
         * debido a que en postgres las columnas toca pasarlas en minusculas, y en oracle si toca tal cual se llaman en la consulta */
        switch ($db->driver) {
            case 'mssql':
                $idRs_mcpo = $Rs_mcpo->fields['ID1'];
                $nombreRs_mcpo = trim($Rs_mcpo->fields['NOMBRE']);
                $id0Rs_mcpo = $Rs_mcpo->fields['ID0'];
                $idmpcRs_mcpo = $Rs_mcpo->fields['ID'];
                $homologaRs_mcpo = $Rs_mcpo->fields['HOMO_MCPIO'];
                $homologaMuniRs_mcpo = trim($Rs_mcpo->fields['HOMO_IDMCPIO']);
                break;
            case 'mysql':
                $idRs_mcpo = $Rs_mcpo->fields['ID1'];
                $nombreRs_mcpo = trim($Rs_mcpo->fields['NOMBRE']);
                $id0Rs_mcpo = $Rs_mcpo->fields['ID0'];
                $idmpcRs_mcpo = $Rs_mcpo->fields['ID'];
                $homologaRs_mcpo = $Rs_mcpo->fields['HOMO_MCPIO'];
                $homologaMuniRs_mcpo = trim($Rs_mcpo->fields['HOMO_IDMCPIO']);
                break;
            case 'oci8':
                $idRs_mcpo = $Rs_mcpo->fields['ID1'];
                $nombreRs_mcpo = trim($Rs_mcpo->fields['NOMBRE']);
                $id0Rs_mcpo = $Rs_mcpo->fields['ID0'];
                $idmpcRs_mcpo = $Rs_mcpo->fields['ID'];
                $homologaRs_mcpo = $Rs_mcpo->fields['HOMOLOGA_MUNI'];
                $homologaMuniRs_mcpo = trim($Rs_mcpo->fields['HOMOLOGA_IDMUNI']);
                break;
            case 'postgres':
                $idRs_mcpo = $Rs_mcpo->fields['ID1'];
                $nombreRs_mcpo = trim($Rs_mcpo->fields['NOMBRE']);
                $id0Rs_mcpo = $Rs_mcpo->fields['ID0'];
                $idmpcRs_mcpo = $Rs_mcpo->fields['ID'];
                $homologaRs_mcpo = $Rs_mcpo->fields['HOMOLOGA_MUNI'];
                $homologaMuniRs_mcpo = trim($Rs_mcpo->fields['HOMOLOGA_IDMUNI']);
                break;
        }

        $vmcposv[$it]['ID1'] = $idRs_mcpo;
        $vmcposv[$it]['NOMBRE'] = $nombreRs_mcpo;
        $vmcposv[$it]['ID0'] = $id0Rs_mcpo;
        $vmcposv[$it]['ID'] = $idmpcRs_mcpo;
        $vmcposv[$it]['HOMOLOGA_MUNI'] = $homologaRs_mcpo;
        $vmcposv[$it]['HOMOLOGA_IDMUNI'] = $homologaMuniRs_mcpo;
        $it += 1;
        $Rs_mcpo->MoveNext();
    }
}
unset($sql_mcpo);
unset($cad);
$Rs_mcpo->Move(0);
?>
