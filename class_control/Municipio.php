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
$url_raiz = "../..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


require_once("$dir_raiz/include/db/ConnectionHandler.php");

/**
 * Municipio es la clase encargada de gestionar las operaciones y los datos b�sicos referentes a un Municipio 
 * @author      Sixto Angel Pinz�n
 * @version     1.0
 */
class Municipio {

    /**
     * Variables que se corresponde con su par, uno de los campos de la tabla municipio
     * @var numeric
     * @access public
     */
    var $muni_codi;
    var $muni_nomb;
    var $dpto_codi;
    var $cont_codi;
    var $pais_codi;

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
    function Municipio($db) {
        $this->cursor = $db;
    }

    /**
     * Retorna el valor string correspondiente al atributo nombre del Municipio, debe invocarse antes municipio_codigo()
     * @return   string
     */
    function get_muni_nomb() {
        return $this->muni_nomb;
    }

    /**
     * Retorna el valor entero correspondiente al atributo codigo del Municipio, debe invocarse antes municipio_codigo()
     * @return   int
     */
    function get_dpto_codi() {
        return $this->dpto_codi;
    }

    /**
     * Retorna el valor entero correspondiente al atributo codigo del Municipio, debe invocarse antes municipio_codigo()
     * @return   int
     */
    function get_cont_codi() {
        return $this->cont_codi;
    }

    /**
     * Retorna el valor entero correspondiente al atributo codigo del Municipio, debe invocarse antes municipio_codigo()
     * @return   int
     */
    function get_pais_codi() {
        return $this->pais_codi;
    }

    /**
     * Carga los datos de la instancia con
     * un c�digo de Municipio suministrado
     * @param $codigoDep	int es el c�digo del Departamento
     * @param $codigoMun	int	es el c�digo del Municipio
     */
    function municipio_codigo($codigoDep, $codigoMun) {

// Si ingresan par�metros v�lidos
        if (strlen(trim($codigoDep)) > 0 && strlen(trim($codigoMun)) > 0) {
            if (strpos($codigoMun, '-')) {
//                error_log('funcion municipio ' . $codigoMun);

                $codigoMun = explode('-', $codigoMun);
                if (count($codigoMun) == 3) {
                    $codigo_pai = $codigoMun[0];
                    $codigo_dep = $codigoMun[1];
                    $codigo_mun = $codigoMun[2];
                }else{
                    $codigo_pai = $codigoMun[1];
                    $codigo_dep = $codigoMun[2];
                    $codigo_mun = $codigoMun[3];
                }
                $q = "SELECT MUNI_CODI,MUNI_NOMB,DPTO_CODI,ID_PAIS,ID_CONT FROM MUNICIPIO where id_pais=$codigo_pai AND DPTO_CODI=$codigo_dep AND MUNI_CODI=$codigo_mun";
            } else {
                $q = "select *  from municipio where muni_codi =$codigoMun and dpto_codi = $codigoDep";
            }
//            $this->cursor->conn->SetFetchMode(ADODB_FETCH_ASSOC);
//            $rs =  $this->cursor->Execute($q);
            $rs = $this->cursor->conn->query($q);
            if (!$rs->EOF) {
                $this->muni_codi = $this->cursor->conn->driver == "mysql" ? $rs->fields['muni_codi'] : $rs->fields['MUNI_CODI'];
                $this->dpto_codi = $this->cursor->conn->driver == "mysql" ? $rs->fields['dpto_codi'] : $rs->fields['DPTO_CODI'];
                $this->pais_codi = $this->cursor->conn->driver == "mysql" ? $rs->fields['id_pais'] : $rs->fields['ID_PAIS'];
                $this->cont_codi = $this->cursor->conn->driver == "mysql" ? $rs->fields['id_cont'] : $rs->fields['ID_CONT'];
                $this->muni_nomb = $this->cursor->conn->driver == "mysql" ? rtrim($rs->fields['muni_nomb']) : rtrim($rs->fields['MUNI_NOMB']);
            }
        } else {
            $this->cont_codi = "";
            $this->pais_codi = "";
            $this->muni_codi = "";
            $this->dpto_codi = "";
            $this->muni_nomb = "";
        }
    }

}

?>
