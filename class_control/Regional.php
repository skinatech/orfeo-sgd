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
$driver = $_SESSION['driver'];
$assoc = $_SESSION['assoc'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

require_once("$dir_raiz/include/db/ConnectionHandler.php");

/**
 * Esp es la clase encargada de gestionar las operaciones y los datos basicos referentes a una Dependencia
 * @author	Sixto Angel Pinzon
 * @version	1.0
 */
class Regional {

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla Regional
     * @var string
     * @access public
     */
    var $reg_nombre;
    
    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla Regional
     * @var string
     * @access public
     */
    var $reg_codi;

    /**
     * Constructor encargado de obtener la conexion
     * @return   void
     */
    function Regional($db) {
        $this->cursor = $db;
    }

    /**
     * Retorna el valor string correspondiente al atributo nombre de regional
     * @return	string
     */
    function getReg_nomb() {
        return $this->reg_nombre;
    }
    
    /**
     * Retorna el valor string correspondiente al atributo codigo de regional
     * @return	string
     */
    function getReg_codi() {
        return $this->reg_codi;
    }

    /**
     * Retorna un arreglo con los datos del codigo de la dependencia que ha sido suministrada como par�metro
     * @param	$codigo	string es el codigo de la Dependencia
     * @return   boolean
     */
    function regionalArr($codigo) {
        $q = "select * from regional where reg_codi =" . $codigo . "";
        $rs = $this->cursor->query($q);
        $retorno = array();

        if (!$rs->EOF) {
            $retorno['reg_nombre'] = $this->cursor->driver == "mysql" ? $rs->fields['reg_nombre'] : $rs->fields['REG_NOMBRE'];
        }

        return ($retorno);
    }

    /**
     * Carga los datos de la instacia incluyendo la informacion de la territorial, con con  referencia a un codigo de Dependencia suministrado retorna falso si no lo encuentra, de lo contrario true
     * @param	$codigo	string es el codigo de la Dependencia
     * @return   boolean
     */
    function Regional_codigo($codigo) {
        //almacena el query
        $q = "select * from regional where reg_codi ='" . $codigo . "'";
        $rs = $this->cursor->query($q);
        if (!$rs->EOF) {
            $this->reg_nombre = $this->cursor->driver == "mysql" ? $rs->fields['reg_nombre'] : $rs->fields['REG_NOMBRE'];
            return true;
        } else
            return false;
    }

}

?>
