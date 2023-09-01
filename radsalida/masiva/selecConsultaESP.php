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

//Si no llega la dependencia recupera la sesi�n
if (!$_SESSION['dependencia'])
    include "$dir_raiz/rec_session.php";

$check_value = $_POST['check_value'];
$slc_ctt = $_POST['slc_ctt'];
$seleccNueva = $_POST['seleccNueva'];
$seleccNuevacct = $_POST['seleccNuevacct'];
$selectedForm = $_POST['selectedForm'];

//variable que almacena la cantidad de empresas seleccionadas en el formulario
$num = count($check_value);
$i = 0;
//almacena todos los elementos seleccionados desde el formulario
$seleccTodos = "";
//almacena todos los contactos de los elementos seleccionados desde el formulario
$seleccTodos_idcct = "";
//Recorre el arreglo de elementos seleccionados desde el formulario
$tmp_cad1 = "selected" . $_POST['slc_tb'];
$tmp_cad2 = "selectedctt" . $_POST['slc_tb'];

$selected = ${$tmp_cad1};
$selectedctt = ${$tmp_cad2};

while ($i < $num) {
    $record_id = key($check_value);
    //si el elemento ha sido seleccionado
    if ($check_value[$record_id] == "selec") {
        (strlen($seleccTodos) > 0) ? $seleccTodos = $seleccTodos . "," . $record_id : $seleccTodos = $record_id;
        //se pregunta si el elemento analizado es de los nuevos a seleccionar
        if (in_array($record_id, explode(",", $selected)) == false) {
            // se llena la variable de los nuevos a incluir
            (strlen($seleccNueva) > 0) ? $seleccNueva = $seleccNueva . "," . $record_id : $seleccNueva = $record_id;
            if ($_POST['slc_tb'] == 0 or $_POST['slc_tb'] == 1)
                (array_key_exists($record_id, $slc_ctt)) ? $seleccNuevacct .= $slc_ctt[$record_id] . ',' : $seleccNuevacct .= '0,';
        }
    }
    next($check_value);
    $i++;
}

if (strlen($seleccNuevacct) > 1)
    $seleccNuevacct = substr($seleccNuevacct, 0, strlen($seleccNuevacct) - 1);

//En caso de que hayan seleccionados previos......
if ($selectedForm) {
    //genera un arreglo con los elementos del formulario previamente seleccionados al cargarlo
    $arrselctedForm = explode(",", $selectedForm);
    //variable que almacena la cantidad de empresas del formulario previamente seleccionadas al cargarlo
    $num = count($arrselctedForm);
    $i = 0;
    //Se recorre el arreglo de los que ya estaban seleccionados a la hora de cargar el formulario
    while ($i < $num) {
        $nuir = $arrselctedForm[$i];
        if (strlen($nuir) > 0) { // si el nuir a analizar no esta en la selecci�n que lleg� finalmente
            //if (strpos($seleccTodos, trim($nuir).",")==false)
            if (in_array($nuir, explode(",", $seleccTodos)) == false) { //almacena los elementos excluidos de la selecci�n
                (strlen($excluir) > 0) ? $excluir .= "," . $nuir : $excluir = $nuir;
            }
        }
        $i++;
    }
}

$selected = $seleccNueva;

if ($selected) {
//genera un arreglo con la selecci�n global
    $arrSelGlobal = explode(",", $selected);

    //variable que almacena la cantidad de empresas de la selecci�n global
    $num = count($arrSelGlobal);
    $i = 0;
    //Se recorre el arreglo de la seclecci�n global para tomar los que no han sido excluidos
    while ($i < $num) {
        $nuir = $arrSelGlobal[$i];
        if (strlen($nuir) > 0) { // si el niur a analizar no esta dentro de los excluidos
            if (in_array($nuir, explode(",", $excluir)) == false) {
                //se llena la variable con la selecci�n de los que no fueron excluidos
                if (strlen($selectedFinal)) {
                    $selectedFinal .= "," . $nuir;
                } else {
                    $selectedFinal = $nuir;
                }
                (array_key_exists($nuir, $slc_ctt)) ? $selectedFinalcct .= $slc_ctt[$nuir] . ',' : $selectedFinalcct .= '0,';
            }
        }
        $i++;
    }
}
if (strlen($selectedFinalcct) > 1)
    $selectedFinalcct = substr($selectedFinalcct, 0, strlen($selectedFinalcct) - 1);

//se actualiza la variable que almacena la la selecci�n global
if (is_null($selectedFinal)) {
    ${$tmp_cad1} = $seleccNueva;
    ${$tmp_cad2} = $seleccNuevacct;
} else {
    ${$tmp_cad1} = $seleccNueva;
    ${$tmp_cad2} = $seleccNuevacct;
}


unset($tmp_cad1);
unset($tmp_cad2);
require_once("consultaESP.php");
?>
