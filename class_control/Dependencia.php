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
require_once("$dir_raiz/class_control/Municipio.php");

/**
 * Esp es la clase encargada de gestionar las operaciones y los datos basicos referentes a una Dependencia
 * @author	Sixto Angel Pinzon
 * @version	1.0
 */
class Dependencia {

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla dependencia
     * @var string
     * @access public
     */
    var $depe_nomb;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla dependencia
     * @var string
     * @access public
     */
    var $dep_sigla;

    /**
     * Variable que almacena el nombre de la territorial ala que pertenece la dependencia instanciada
     * @var string
     * @access public
     */
    var $terr_nomb;

    /**
     * Variable que almacena el nombre del municipio de la territorial ala que pertenece la dependencia instanciada
     * @var string
     * @access public
     */
    var $terr_muni_nomb;

    /**
     * Variable que almacena el codigo del municipio de la territorial ala que pertenece la dependencia instanciada
     * @var numeric
     * @access public
     */
    var $terr_muni;

    /**
     * Variable que almacena el codigo del departamento de la territorial ala que pertenece la dependencia instanciada
     * @var numeric
     * @access public
     */
    var $terr_depto;
    var $terr_ciu_nomb;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla dependencia
     * @var string
     * @access public
     */
//	var $dep_sigla;
    /**
     * Variable que almacena la direccion de la territorial ala que pertenece la dependencia instanciada
     * @var string
     * @access public
     */
    var $terr_direccion;

    /**
     * Variable que almacena la sigla de la territorial ala que pertenece la dependencia instanciada
     * @var string
     * @access public
     */
    var $terr_sigla;

    /**
     * Variable que almacena la sigla de la territorial ala que pertenece la dependencia instanciada
     * @var string
     * @access public
     */
    var $terr_pais;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla dependencia
     * @var numeric
     * @access public
     */
    var $dep_central;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla dependencia
     * @var string
     * @access public
     */
    var $pais_codi;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla dependencia
     * @var numeric
     * @access public
     */
    var $dpto_codi;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla dependencia
     * @var numeric
     * @access public
     */
    var $muni_codi;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla dependencia
     * @var numeric
     * @access public
     */
    var $depe_codi_territorial;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla dependencia
     * @var numeric
     * @access public
     */
    var $depe_rad_tp1;

    /**
     * Gestor de las transacciones con la base de datos
     * @var ConnectionHandler
     * @access public
     */
    var $depe_codi_padre;

    /**
     * Gestor de las transacciones con la base de datos
     * @var ConnectionHandler
     * @access public
     */
    var $cursor;
    var $depe_dir;

    /**
     * Constructor encargado de obtener la conexion
     * @return   void
     */
    function Dependencia($db) {
        $this->cursor = $db;
    }

    /**
     * Retorna el valor string correspondiente al atributo nombre del la Dependencia, debe invocarse antes Dependencia_codigo() 
     * @return	string
     */
    function getDepe_nomb() {
        return $this->depe_nomb;
    }

    /**
     * Retorna el valor string correspondiente al atributo sigla del la Dependencia, debe invocarse antes Dependencia_codigo() 
     * @return	string
     */
    function getDepeSigla() {
        return $this->dep_sigla;
    }

    /**
     * Retorna el valor string correspondiente al atributo direccion del la Dependencia, debe invocarse antes Dependencia_codigo() 
     * @return	string
     */
    function getDepeDir() {
        return $this->depe_dir;
    }

    /**
     * Retorna el valor string correspondiente al atributo nombre de la ciudad de la territorial, debe invocarse antes Dependencia_codigo() 
     * @return	string
     */
    function getTerrCiuNomb() {
        return $this->terr_ciu_nomb;
    }

    /**
     * Retorna el valor string correspondiente al atributo nombre corto de la territorial, debe invocarse antes Dependencia_codigo() 
     * @return	string
     */
    function getTerrSigla() {
        return $this->terr_sigla;
    }

    /**
     * Retorna el valor string correspondiente al atributo nombre largo de la territorial, debe invocarse antes Dependencia_codigo() 
     * @return	string
     */
    function getTerrNombre() {
        return $this->terr_nomb;
    }

    /**
     * Retorna el valor string correspondiente al atributo nombre corto de la territorial, debe invocarse antes Dependencia_codigo() 
     * @return	string
     */
    function getTerrDireccion() {
        return $this->terr_direccion;
    }

    /**
     * Retorna el valor string correspondiente al atributo depe_codi_padre, debe invocarse antes Dependencia_codigo() 
     * @return	string
     */
    function getDepe_codi_padre() {
        return $this->depe_codi_padre;
    }

    /**
     * Retorna el valor string correspondiente al atributo codigo del campo depe_codi_territorial, debe invocarse antes Dependencia_codigo() 
     * @return	string
     */
    function getDepe_codi_territorial() {
        return $this->depe_codi_territorial;
    }

    /**
     * Retorna un arreglo con los datos del codigo de la dependencia que ha sido suministrada como par�metro
     * @param	$codigo	string es el codigo de la Dependencia
     * @return   boolean
     */
    function dependenciaArr($codigo) {
        $q = "select * from dependencia where depe_codi ='" . $codigo . "'";
        $rs = $this->cursor->query($q);
//        error_log('!!!!!!!!!!!!!!!!!! '.$q);
        $retorno = array();

        if (!$rs->EOF) {
            $retorno['depe_nomb'] = $this->cursor->driver == "mysql" ? $rs->fields['depe_nomb'] : $rs->fields['DEPE_NOMB'];
            $retorno['dep_sigla'] = $this->cursor->driver == "mysql" ? $rs->fields['dep_sigla'] : $rs->fields['DEP_SIGLA'];
            $retorno['cont_codi'] = $this->cursor->driver == "mysql" ? $rs->fields['id_cont'] : $rs->fields['ID_CONT'];
            $retorno['pais_codi'] = $this->cursor->driver == "mysql" ? $rs->fields['id_pais'] : $rs->fields['ID_PAIS'];
            $retorno['dpto_codi'] = $this->cursor->driver == "mysql" ? $rs->fields['dpto_codi'] : $rs->fields['DPTO_CODI'];
            $retorno['muni_codi'] = $this->cursor->driver == "mysql" ? $rs->fields['muni_codi'] : $rs->fields['MUNI_CODI'];
            $retorno['dep_sigla'] = $this->cursor->driver == "mysql" ? $rs->fields['dep_sigla'] : $rs->fields['DEP_SIGLA'];
            $retorno['dep_direccion'] = $this->cursor->driver == "mysql" ? $rs->fields['dep_direccion'] : $rs->fields['DEP_DIRECCION'];
            $retorno['dep_central'] = $this->cursor->driver == "mysql" ? $rs->fields['dep_central'] : $rs->fields['DEP_CENTRAL'];
            $retorno['depe_rad_tp1'] = $this->cursor->driver == "mysql" ? $rs->fields['depe_rad_tp1'] : $rs->fields['DEPE_RAD_TP1'];
            $retorno['depe_estado'] = $this->cursor->driver == "mysql" ? $rs->fields['depe_estado'] : $rs->fields['DEPE_ESTADO'];
        }

        return ($retorno);
    }

    /**
     * Carga los datos de la instacia incluyendo la informacion de la territorial, con con  referencia a un codigo de Dependencia suministrado retorna falso si no lo encuentra, de lo contrario true
     * @param	$codigo	string es el codigo de la Dependencia
     * @return   boolean
     */
    function Dependencia_codigo($codigo) {
        //almacena el query
        //Retiro referencia
        //$muni = & new Municipio($this->cursor);
        $muni = new Municipio($this->cursor);
        $q = "select * from dependencia where depe_codi ='$codigo'";
        $rs = $this->cursor->query($q);
//        error_log('************** .'.$q);

        $terr = "";
        if (!$rs->EOF) {

            $this->depe_nomb = $this->cursor->driver == "mysql" ? $rs->fields['depe_nomb'] : $rs->fields['DEPE_NOMB'];
            $this->dep_sigla = $this->cursor->driver == "mysql" ? $rs->fields['dep_sigla'] : $rs->fields['DEP_SIGLA'];
            $this->muni_codi = $this->cursor->driver == "mysql" ? $rs->fields['muni_codi'] : $rs->fields['MUNI_CODI'];
            $this->dpto_codi = $this->cursor->driver == "mysql" ? $rs->fields['dpto_codi'] : $rs->fields['DPTO_CODI'];
            $this->pais_codi = $this->cursor->driver == "mysql" ? $rs->fields['id_pais'] : $rs->fields['ID_PAIS'];
            $this->dep_central = $this->cursor->driver == "mysql" ? $rs->fields['dep_central'] : $rs->fields['DEP_CENTRAL'];
            $this->depe_codi = $this->cursor->driver == "mysql" ? $rs->fields['depe_codi'] : $rs->fields['DEPE_CODI'];
            $this->dep_sigla = $this->cursor->driver == "mysql" ? $rs->fields['dep_sigla'] : $rs->fields['DEP_SIGLA'];
            $this->depe_dir = $this->cursor->driver == "mysql" ? $rs->fields['dep_direccion'] : $rs->fields['DEP_DIRECCION'];
            $this->dep_central = $this->cursor->driver == "mysql" ? $rs->fields['dep_central'] : $rs->fields['DEP_CENTRAL'];
            $this->depe_rad_tp1 = $this->cursor->driver == "mysql" ? $rs->fields['depe_rad_tp1'] : $rs->fields['DEPE_RAD_TP1'];
            $this->depe_codi_padre = $this->cursor->driver == "mysql" ? $rs->fields['depe_codi_padre'] : $rs->fields['DEPE_CODI_PADRE'];
            $this->depe_codi_territorial = $this->cursor->driver == "mysql" ? $rs->fields['depe_codi_territorial'] : $rs->fields['DEPE_CODI_TERRITORIAL'];
            $datosTerr = array();

            if ($this->dep_central == 1) {
                $terr = $this->cursor->driver == "mysql" ? $rs->fields['depe_codi_territorial'] : $rs->fields['DEPE_CODI_TERRITORIAL'];
                if (strlen($terr) > 1) {
                    $datosTerr = $this->dependenciaArr($terr);
                }
            } else {
                $terr = $this->cursor->driver == "mysql" ? $rs->fields['depe_codi_territorial'] : $rs->fields['DEPE_CODI_TERRITORIAL'];
                if (strlen($terr) > 1) {
                    $datosTerr = $this->dependenciaArr($terr);
                }
            }
            // print ("la central($codigo)($terr)".	$this->dep_central);
            $this->terr_pais = $this->cursor->driver == "mysql" ? $datosTerr['pais_codi'] : $datosTerr['PAIS_CODI'];
            $this->terr_depto = $this->cursor->driver == "mysql" ? $datosTerr['dpto_codi'] : $datosTerr['DPTO_CODI'];
            $this->terr_nomb = $this->cursor->driver == "mysql" ? $datosTerr['depe_nomb'] : $datosTerr['DEPE_NOMB'];
            $this->terr_muni = $this->cursor->driver == "mysql" ? $datosTerr['muni_codi'] : $datosTerr['MUNI_CODI'];
            $this->terr_sigla = $this->cursor->driver == "mysql" ? $datosTerr['dep_sigla'] : $datosTerr['DEP_SIGLA'];
            $this->terr_direccion = $this->cursor->driver == "mysql" ? $datosTerr['dep_direccion'] : $datosTerr['DEP_DIRECCION'];
            if ($this->cursor->driver == "mysql") {
                $muni->municipio_codigo($datosTerr['dpto_codi'], $datosTerr['pais_codi'] . '-' . $datosTerr['dpto_codi'] . '-' . $datosTerr['muni_codi']);
            } else {
                $muni->municipio_codigo($datosTerr['DPTO_CODI'], $datosTerr['PAIS_CODI'] . '-' . $datosTerr['DPTO_CODI'] . '-' . $datosTerr['MUNI_CODI']);
            }
            $this->terr_ciu_nomb = $muni->get_muni_nomb();
            return true;
        } else
            return false;
    }

    /**
     * Retorna el valor string correspondiente al codigo de la dependencia que permitiria generar la secuencia de radicacion de acuerdo al tipo de radicacion sea esta (-1,-2,-3,-4,-5) , debe invocarse antes Dependencia_codigo() 
     * @return	string
     */
    function getDepSecRadic($tipoRadicacion) {

        if ($tipoRadicacion == 1)
            return ($this->depe_rad_tp1);
    }

    /**
     * Retorna el valor string correspondiente al codigo de la dependencia que permitiria generar la secuencia de radicacion de acuerdo al tipo de radicacion sea esta (-1,-2,-3,-4,-5) , debe invocarse antes Dependencia_codigo() 
     *  @param	$codDepe	numeric es el codigo de la Dependencia
     *  @param	$tipoRadicacion	String es el tipo de radicacion a consultar
     *  @return	string
     */
    function getSecRadicTipDepe($codDepe, $tipoRadicacion) {

        $q = "select * from dependencia where depe_codi ='$codDepe'";
        $rs = $this->cursor->query($q);
//        error_log('--------------> '.$q);
        $retorno = "noDefinido";
        if (!$rs->EOF) {
            $retorno = $rs->fields["DEPE_RAD_TP$tipoRadicacion"];
        }
        return ($retorno);
    }

}

?>
