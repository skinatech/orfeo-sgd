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
class Asuntos {

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla Regional
     * @var string
     * @access public
     */
    var $asun_descrip;
    
    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla Regional
     * @var string
     * @access public
     */
    var $asun_codi;
    
    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla Regional
     * @var string
     * @access public
     */
    var $estado;

    /**
     * Constructor encargado de obtener la conexion
     * @return   void
     */
    function Asuntos($db) {
        $this->cursor = $db;
    }

    /**
     * Retorna el valor string correspondiente al atributo nombre de regional
     * @return	string
     */
    function getAsunt_descrip() {
        return $this->asun_descrip;
    }
    
    /**
     * Retorna el valor string correspondiente al atributo codigo de regional
     * @return	string
     */
    function getAsunt_codi() {
        return $this->asun_codi;
    }
    
    /**
     * Retorna el valor string correspondiente al atributo codigo de regional
     * @return	string
     */
    function getAsunt_estado() {
        return $this->estado;
    }

    /**
     * Retorna un arreglo con los datos del codigo de la dependencia que ha sido suministrada como par�metro
     * @param	$codigo	string es el codigo de la Dependencia
     * @return   boolean
     */
    function asuntosArr($codigo) {
        $q = "select * from asuntos where asun_codi =" . $codigo . "";
        $rs = $this->cursor->query($q);
        $retorno = array();

        if (!$rs->EOF) {
            $retorno['asun_descrip'] = $this->cursor->driver == "mysql" ? $rs->fields['asun_descrip'] : $rs->fields['ASUN_DESCRIP'];
            $retorno['estado'] = $this->cursor->driver == "mysql" ? $rs->fields['estado'] : $rs->fields['ESTADO'];
        }

        return ($retorno);
    }

    /**
     * Carga los datos de la instacia incluyendo la informacion de la territorial, con con  referencia a un codigo de Dependencia suministrado retorna falso si no lo encuentra, de lo contrario true
     * @param	$codigo	string es el codigo de la Dependencia
     * @return   boolean
     */
    function Asunto_codigo($codigo) {
        //almacena el query
        $q = "select * from asuntos where asun_codi ='" . $codigo . "'";
        $rs = $this->cursor->query($q);
        
        if (!$rs->EOF) {
            $this->asun_descrip = $this->cursor->driver == "mysql" ? $rs->fields['asun_descrip'] : $rs->fields['ASUN_DESCRIP'];
            $this->estado = $this->cursor->driver == "mysql" ? $rs->fields['estado'] : $rs->fields['ESTADO'];
            return true;
        } else
            return false;
        
    }

}

?>
