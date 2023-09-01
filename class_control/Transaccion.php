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


/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


error_reporting(7);

/**
 * Esp es la clase encargada de gestionar las operaciones y los datos b�sicos referentes a una Transacci�n Orfeo
 * @author	Sixto Angel Pinz�n
 * @version	1.0
 */
class Transaccion {

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla sgd_ttr_transaccion
     * @var numeric
     * @access public
     */
    var $sgd_ttr_codigo;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla sgd_ttr_transaccion
     * @var string
     * @access public
     */
    var $sgd_ttr_descrip;

    /**
     * Gestor de las transacciones con la base de datos
     * @var ConnectionHandler
     * @access public
     */
    var $cursor;

    /**
     * Constructor encargado de obtener la conexion
     * @param	$db	ConnectionHandler es el objeto conexion
     * @return   void
     */
    function Transaccion($db) {
        $this->cursor = $db;
    }

    /**
     * Retorna el valor string correspondiente al atributo descripcion de la transaccion, debe invocarse antes Transaccion_codigo()
     * @return	string
     */
    function getDescripcion() {
        return $this->sgd_ttr_descrip;
    }

    /**
     * Retorna el valor entero correspondiente al atributo indentificados de la transaccion, debe invocarse antes Transaccion_codigo() 
     * @return	int
     */
    function getIdentificador() {
        return $this->sgd_ttr_codigo;
    }

    /**
     * Carga los datos de la instacia con con  referencia a un c�digo de ESP suministrado retorna falso si no lo encuentra, de lo contrario true
     * @param	$codigo	string es el c�digo del departamento
     * @return   boolean
     */
    function Transaccion_codigo($codigo) {
        //almacena el query
        $q = "select *  from sgd_ttr_transaccion where sgd_ttr_codigo =$codigo";
        $rs = $this->cursor->query($q);

        if ($rs && !$rs->EOF) {

            $this->sgd_ttr_codigo = $this->cursor->driver == "mysql" ? $rs->fields['sgd_ttr_codigo'] : $rs->fields['SGD_TTR_CODIGO'];
            $this->sgd_ttr_descrip = $this->cursor->driver == 'mysql' ? $rs->fields['sgd_ttr_descrip'] : $rs->fields['SGD_TTR_DESCRIP'];
            //error_log('------------------> ' . $codigo);
            return true;
        } else {
            $this->sgd_ttr_codigo = "";
            $this->sgd_ttr_descrip = "";
        }
        return false;
    }

}

?>
