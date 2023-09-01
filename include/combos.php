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


//los comentarios son superfluos!!1  ;-)
require_once("$dir_raiz/include/db/ConnectionHandler.php");

class combo {

    var $row;
    var $respuesta;
    var $cursor;

    function combo($cur) {
        $this->cursor = $cur;
    }

    function conectar($dbsql, $valu, $tex, $verific, $muestreo, $simple) {
        //print("PREVIO A LA CONEXION ****************");
        $this->cursor->conn->SetFetchMode(ADODB_FETCH_ASSOC);
        //$this->cursor->conn->debug=true;
        $rs = $this->cursor->query($dbsql);
        //esta opcion permite cargar en un select de html una consulta... tambien
        //se selecciona el campo ke va a actuar como valor y cual desplegado haci como el de verificacion

        if ($simple == 0) {
            while (!$rs->EOF) {
                if (strcmp(trim($verific), trim($rs->fields[$valu])) == 0) {
                    $sel = "selected";
                } else
                    $sel = "";

                echo "<option value='" . $rs->fields[strtoupper($valu)] . "' $sel>" . $rs->fields[strtoupper($tex)] . "</option>";
                $rs->MoveNext();
            }
        }
    }

}

?>
