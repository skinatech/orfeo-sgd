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


require_once("$dir_raiz/include/db/ConnectionHandler.php");
require_once("$dir_raiz/class_control/Departamento.php");
require_once("$dir_raiz/class_control/Municipio.php");
require_once("$dir_raiz/class_control/Esp.php");

/**
 * Radicado es la clase encargada de gestionar la informacion referente a un radicado
 * @author      Sixto Angel Pinzon
 * @version     1.0
 */
class Radicado {

    /**
     * Gestor de las transacciones con la base de datos
     * @var ConnectionHandler
     * @access public
     */
    var $cursor;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla Radicado
     * @var numeric
     * @access public
     */
    var $tdoc_codi;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla Radicado
     * @var string
     * @access public
     */
    var $radi_fech_radi;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla Radicado
     * @var numeric
     * @access public
     */
    var $radi_nume_radi;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla Radicado
     * @var numeric
     * @access public
     */
    var $tdid_codi;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla Radicado
     * @var string
     * @access public
     */
    var $radi_path;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla Radicado
     * @var string
     * @access public
     */
    var $radi_usua_radi;

    /**
     * Constructor encargado de obtener la conexion
     * @param	$db	ConnectionHandler es el objeto conexion
     * @return   void
     */
    function Radicado($db) {
        $this->cursor = $db;
    }

    /**
     * Carga los atributos de la clase con los datos del radicado enviado como parametro, si existen datos retorna true, de lo contrario false
     * @param	$codigo	string	es el codigo del radicado 
     * @return   boolen
     */
    function radicado_codigo($codigo) {
//            error_log('****** '.$codigo);
        //almacena el query
        $sqlFecha = $this->cursor->conn->SQLDate("Y/m/d", "r.radi_fech_radi");
        $db = &$this->cursor;
        include ($this->cursor->rutaRaiz . "/include/query/class_control/queryRadicado.php");
        $rs = $this->cursor->query($qeryRadicado_codigo);

        //Si existen resultados
        if (!$rs->EOF) {
            $this->tdid_codi = $rs->fields['TDID_CODI'];
            $this->tdoc_codi = $rs->fields['TDOC_CODI'];
            $this->radi_fech_radi = $rs->fields['FECDOC'];
            $this->radi_nume_radi = $rs->fields['RADNUM'];
            $this->radi_path = $rs->fields['radi_path'];
            $this->radi_usua_radi = $rs->fields['RADI_USUA_RADI'];
            return true;
        } else {
            $this->tdid_codi = "";
            $this->tdoc_codi = "";
            $this->radi_fech_radi = "";
            $this->radi_nume_radi = "";
            $this->radi_path = "";
            $this->radi_usua_radi = "";
            return false;
        }
    }

    /**
     * Retorna un array con los datos del remitente de un radicado, este vector contiene los indices 'nombre','direccion','deptoNombre','muniNombre','deptoCodi','muniCodi'; antes de invocar esta funcion, se debe llamar a  radicado_codigo()
     * @return   array
     */
    function getDatosRemitente() {
        //almacena el query
        $q = "select *  from sgd_dir_drecciones where radi_nume_radi ='" . $this->radi_nume_radi . "'";
        $rs = $this->cursor->query($q);
        //Agregada por Johnny debido a solicitud de usuarios
        $direccion = isset($rs->fields['sgd_dir_direccion']) ? $rs->fields['sgd_dir_direccion'] : $rs->fields['SGD_DIR_DIRECCION'];
        $deptoCodi = isset($rs->fields['dpto_codi']) ? $rs->fields['dpto_codi'] : $rs->fields['DPTO_CODI'];
        $muniCodi = isset($rs->fields['muni_codi']) ? $rs->fields['muni_codi'] : $rs->fields['MUNI_CODI'];
        $paisCodi = isset($rs->fields['id_pais']) ? $rs->fields['id_pais'] : $rs->fields['ID_PAIS'];
        $contCodi = isset($rs->fields['id_cont']) ? $rs->fields['id_cont'] : $rs->fields['ID_CONT'];
        //Agregada por Johnny debido a solicitud de usuarios
        $nombre = isset($rs->fields['sgd_dir_nomremdes']) ? $rs->fields['sgd_dir_nomremdes'] : $rs->fields['SGD_DIR_NOMREMDES'];
        $dep = new Departamento($this->cursor);
        $mun = new Municipio($this->cursor);
        $dep->departamento_codigo($paisCodi . '-' . $deptoCodi);
        $mun->municipio_codigo($paisCodi . '-' . $deptoCodi, $paisCodi . '-' . $deptoCodi . '-' . $muniCodi);

        //Si se hallaron datos del remitente
        if ($dep) {
            $vecDatos["nombre"] = $nombre;
            $vecDatos["direccion"] = $direccion;
            $vecDatos["deptoNombre"] = $dep->get_dpto_nomb();
            $vecDatos["muniNombre"] = $mun->get_muni_nomb();
            $vecDatos["contCodi"] = $contCodi;
            $vecDatos["paisCodi"] = $paisCodi;
            $vecDatos["deptoCodi"] = $deptoCodi;
            $vecDatos["muniCodi"] = $muniCodi;
        }

        return ($vecDatos);
    }

    /**
     * Retorna un string  con el dato correspondiente a la fecha de radicacion;  antes de invocar esta funcion, se debe llamar a  radicado_codigo()
     * @return   string
     */
    function getRadi_fech_radi($formato = null) {
        if (!empty($formato)) {
            // en la pos0 es el ano, pos1 mes, pos2 dia
            $arregloFecha = explode("/", $this->radi_fech_radi);
            $arregloFecha[2] .
                    $arregloFecha[0] . "<hr>";
            return date($formato, mktime(0, 0, 0, $arregloFecha[1], $arregloFecha[2], $arregloFecha[0]));
        }
        return($this->radi_fech_radi);
    }

    /**
     *  Retorna un array de objetos Radicado donde se instancian sus propiedades principales 
     */
    function getObjects($conn, $RADI_NUME_RADI = "%") {
        $sql = "SELECT * FROM RADICADO WHERE RADI_NUME_RADI LIKE '$RADI_NUME_RADI'";
        $rs = $conn->query($sql);
        while (!$rs->EOF) {
            $rad = new Radicado();
            $rad->tdid_codi = $rs->fields['TDID_CODI'];
            $rad->tdoc_codi = $rs->fields['TDOC_CODI'];
            $rad->radi_fech_radi = $rs->fields['fecdoc'];
            $rad->radi_nume_radi = $rs->fields['radnum'];
            $rad->radi_path = $rs->fields['radi_path'];
            $rad->radi_usua_radi = $rs->fields['radi_usua_radi'];
            $xarray[] = $rad;
            $rs->moveNext();
        }
        return $xarray;
    }

    /**
     * Retorna un string  con el dato correspondiente al path de la imagen digitalizada del radicado
     * @return   string
     */
    function getRadi_path() {
        return($this->radi_path);
    }

    /**
     * Retorna un string  con el dato correspondiente al codigo del tipo de documento que es el radicado
     * @return   string
     */
    function getTdocCodi() {
        return($this->tdoc_codi);
    }

    /**
     * Retorna un string  con el dato correspondiente al codigo del usuario radicador
     * @return   string
     */
    function getUsuaRad() {
        return($this->radi_usua_radi);
    }

}

?>
