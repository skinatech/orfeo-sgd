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
$url_raiz = $_SESSION['url_raiz'];
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


/* require_once("$ruta_raiz/include/db/ConnectionHandler.php");
  require_once("$ruta_raiz/class_control/TipoDocumento.php"); */

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . "/include/db/ConnectionHandler.php";
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . "/class_control/TipoDocumento.php";

/**
 * Anexo es la clase encargada de gestionar las operaciones y los datos basicos referentes a un anexo que haya sido adicionado a un radicado
 * @author      Sixto Angel Pinzon
 * @version     1.0
 */
class Anexo {
// Bloque de atributos que corresponden a los campos de la tabla anexos

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var numeric
     * @access public
     */
    var $sgd_rem_destino;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var numeric
     * @access public
     */
    var $anex_radi_nume;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var string
     * @access public
     */
    var $anex_codigo;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var numeric
     * @access public
     */
    var $anex_tipo;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var numeric
     * @access public
     */
    var $anex_tamano;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var string
     * @access public
     */
    var $anex_solo_lect;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var string
     * @access public
     */
    var $anex_creador;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var string
     * @access public
     */
    var $anex_desc;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var numeric
     * @access public
     */
    var $anex_numero;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var string
     * @access public
     */
    var $anex_nomb_archivo;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var string
     * @access public
     */
    var $anex_borrado;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var numeric
     * @access public
     */
    var $anex_salida;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var numeric
     * @access public
     */
    var $sgd_dir_tipo;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var numeric
     * @access public
     */
    var $sgd_tpr_codigo;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var string
     * @access public
     */
    var $sgd_doc_padre;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var numeric
     * @access public
     */
    var $sgd_doc_secuencia;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var string
     * @access public
     */
    var $sgd_fech_doc;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var numeric
     * @access public
     */
    var $anex_depe_creador;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var numeric
     * @access public
     */
    var $sgd_pnufe_codi;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var numeric
     * @access public
     */
    var $radi_nume_salida;

    /**
     * Variable que se corresponde con su par, uno de los campos de la tabla anexos
     * @var numeric
     * @access public
     */
    var $sgd_apli_codi;
    var $codi_anexos;

    /**
     * Gestor de las transacciones con la base de datos
     * @var ConnectionHandler
     * @access public
     */
    var $cursor;
    var $sgd_srd_codigo;  //skina 18-10-2011
    var $sgd_sbrd_codigo;
    var $radi_docu_publico; // Indica e estado del documento anexo

    /**
     * Constructor encargado de obtener la conexion
     * @param	$db	ConnectionHandler es el objeto conexion
     * @return   void
     */
    function Anexo($db) {
        $this->cursor = $db;
    }

    /**
     * Actualiza los atributos de la clase con los datos
     * del anexo correspondiente al radicado y al codigo de anexo
     * que recibe como parametros
     * @param $radicado   es el codigo del radica que contien el anexo
     * @param $codigo     es el codigo del anexo
     */
    function anexoRadicado($radicado, $codigo) {
        $q = "select DISTINCT a.*,a.anex_fech_anex as FECHA_ANEX from anexos a where ANEX_CODIGO='$codigo' AND ANEX_RADI_NUME='$radicado'";
        $rs = $this->cursor->query($q);
//        error_log('******************' .$q);
//       echo $q;
        if (!$rs->EOF) {
            $this->sgd_rem_destino =  $this->cursor->driver == 'mysql' ? $rs->fields["sgd_rem_destino"] : $rs->fields["SGD_REM_DESTINO"];
            $this->anex_radi_nume = $this->cursor->driver == 'mysql' ?  $rs->fields["anex_radi_nume"] : $rs->fields["ANEX_RADI_NUME"];
            $this->anex_codigo = $this->cursor->driver == 'mysql' ?  $rs->fields["anex_codigo"] : $rs->fields["ANEX_CODIGO"];
            $this->anex_tipo = $this->cursor->driver == 'mysql' ? $rs->fields["anex_tipo"] : $rs->fields["ANEX_TIPO"];
            $this->anex_tamano = $this->cursor->driver == 'mysql' ?$rs->fields["anex_tamano"] : $rs->fields["ANEX_TAMANO"];
            $this->anex_solo_lect = $this->cursor->driver == 'mysql' ? $rs->fields["anex_solo_lect"] : $rs->fields["ANEX_SOLO_LECT"];
            $this->anex_creador = $this->cursor->driver == 'mysql' ? $rs->fields["anex_creador"] : $rs->fields["ANEX_CREADOR"];
            $this->anex_desc = $this->cursor->driver == 'mysql' ? $rs->fields["anex_desc"] : $rs->fields["ANEX_DESC"];
            $this->anex_numero = $this->cursor->driver == 'mysql' ? $rs->fields["anex_numero"] : $rs->fields["ANEX_NUMERO"];
            $this->anex_nomb_archivo = $this->cursor->driver == 'mysql' ? $rs->fields["anex_nomb_archivo"] : $rs->fields["ANEX_NOMB_ARCHIVO"];
            $this->anex_borrado = $this->cursor->driver == 'mysql' ? $rs->fields["anex_borrado"] : $rs->fields["ANEX_BORRADO"];
            $this->anex_salida = $this->cursor->driver == 'mysql' ? $rs->fields["anex_salida"] : $rs->fields["ANEX_SALIDA"];
            $this->sgd_dir_tipo = $this->cursor->driver == 'mysql' ? $rs->fields["sgd_dir_tipo"] : $rs->fields["SGD_DIR_TIPO"];
            $this->sgd_tpr_codigo = $this->cursor->driver == 'mysql' ? $rs->fields["sgd_tpr_codigo"] : $rs->fields["SGD_TPR_CODIGO"];
            $this->sgd_doc_padre = $this->cursor->driver == 'mysql' ? $rs->fields["sgd_doc_padre"] : $rs->fields["SGD_DOC_PADRE"];
            $this->sgd_doc_secuencia = $this->cursor->driver == 'mysql' ? $rs->fields["sgd_doc_secuencia"] : $rs->fields["SGD_DOC_SECUENCIA"];
            $this->sgd_fech_doc = $this->cursor->driver == 'mysql' ? $rs->fields["fecha_anex"] : $rs->fields["FECHA_ANEX"];
            $this->anex_depe_creador = $this->cursor->driver == 'mysql' ? $rs->fields["anex_depe_creador"] : $rs->fields["ANEX_DEPE_CREADOR"];
            $this->sgd_pnufe_codi = $this->cursor->driver == 'mysql' ? $rs->fields["sgd_pnufe_codi"] : $rs->fields["SGD_PNUFE_CODI"];
            $this->radi_nume_salida = $this->cursor->driver == 'mysql' ? $rs->fields["radi_nume_salida"] : $rs->fields["RADI_NUME_SALIDA"];
            $this->sgd_apli_codi = $this->cursor->driver == 'mysql' ? $rs->fields["sgd_apli_codi"] : $rs->fields["SGD_APLI_CODI"];
            $this->sgd_srd_codigo = $this->cursor->driver == 'mysql' ? $rs->fields["sgd_srd_codigo"] : $rs->fields["SGD_SRD_CODIGO"];
            $this->sgd_sbrd_codigo = $this->cursor->driver == 'mysql' ? $rs->fields["sgd_sbrd_codigo"] : $rs->fields["SGD_SBRD_CODI"];
             $this->radi_docu_publico = $this->cursor->driver == 'mysql' ? $rs->fields["radi_docu_publico"] : $rs->fields["RADI_DOCU_PUBLICO"];
        }
    }

    //  serie  y subserie  skina 18-10-2011
    function get_sgd_srd_codigo() {
        return $this->sgd_srd_codigo;
    }

    function get_sgd_sbrd_codigo() {
        return $this->sgd_sbrd_codigo;
    }

    function get_radi_docu_publico() {
        return $this->radi_docu_publico;
    }

    /**
     * Retorna el valor string correspondiente al radicado de salida generado al radicar el anexo
     * @return   string
     */
    function get_radi_nume_salida() {
        return $this->radi_nume_salida;
    }

    /**
     * Retorna el valor string correspondiente al anexo de salida generado al radicar el anexo
     * @return   string
     */
    function get_radi_anex_salida() {
        return $this->anex_salida;
    }

    /**
     * Retorna el valor string correspondiente al atributo nombre del archivo
     * @return   string
     */
    function get_anex_codigo() {
        return $this->anex_codigo;
    }

    function get_anex_nomb_archivo() {
        return $this->anex_nomb_archivo;
    }

    /**
     * Retorna el valor string correspondiente ala descripcion del archivo anexado
     * Descripcion del anexo
     * @return   string
     */
    function get_anex_desc() {
        return $this->anex_desc;
    }

    /**
     * Retorna el valor entero correspondiente al tributo tipo de destinatario
     * @return   entero
     */
    function get_sgd_dir_tipo() {
        return $this->sgd_dir_tipo;
    }

    /**
     * Retorna el valor entero correspondiente al atributo codigo del paquete de numeracion y fechado del que hace parte el anexo
     * @return   entero
     */
    function get_sgd_pnufe_codi() {
        return $this->sgd_pnufe_codi;
    }

    /**
     * Retorna el valor entero correspondiente al tributo codigo del tipo de documento
     * @return   entero
     */
    function get_sgd_tpr_codigo() {
        return $this->sgd_tpr_codigo;
    }

    /**
     * Retorna el valor string correspondiente al tributo fecha de numeracion del documento
     * @return   entero
     */
    function get_sgd_fech_doc() {
        return $this->sgd_fech_doc;
    }

    /**
     * Retorna el valor string correspondiente al tributo códido del aplicativo con que integra
     * @return   string
     */
    function get_sgd_apli_codi() {
        return $this->sgd_apli_codi;
    }

    /**
     * Retorna el valor string correspondiente al tributo secuencia de numeracion del documento, en caso de no tener valor aun
     * retorna "XXXXXXXXX"
     * @return   string
     */
    function sgd_doc_secuencia() {
        if ($this->sgd_doc_secuencia)
            return $this->sgd_doc_secuencia;
        else
            return ("XXXXXXXXX");
    }

    /**
     * Retorna el valor string correspondiente al tributo
     * secuencia de numeracion del documento, en caso de no tener valor aun
     * retorna "null"
     * @return   string
     */
    function sgd_doc_secuencia2() {

        if ($this->sgd_doc_secuencia)
            return $this->sgd_doc_secuencia;
        else
            return ("null");
    }

    /**
     * Retorna el valor string correspondiente al tributo
     * secuencia de numeraci�n del documento, con un prefijo tal y como
     * qued� parametrizado en la tabla sgd_pnun_procenum
     * @param $dependencia   es el codigo de la dependencia que genera el documento
     * @return   string
     */
    function get_doc_secuencia_formato($dependencia) {

//$dependencia=$this->anex_depe_creador;
//$dependencia="500";
        if ($this->sgd_pnufe_codi) {
            $sql = "select * from sgd_pnun_procenum where depe_codi='$dependencia' and sgd_pnufe_codi=$this->sgd_pnufe_codi ";
            $preposicion = "";
            $rs = $this->cursor->query($sql);

            if (!$rs->EOF)
                $preposicion = $rs->fields['SGD_PNUN_PREPONE'];

            $sec_formato = str_pad($this->sgd_doc_secuencia, 6, "0", STR_PAD_left);
            $sec_formato = $preposicion . " - " . $sec_formato;
            return ($sec_formato);
        } else
            return ("###########");
    }

    /**
     * Busca el numero de secuencia de documento generado
     * para un paquete de documentos del proceso de numeraqcion y fechado.
     * Si el documento aun no ha sido numerado, entonces se genera la secuencia
     * de acuerdo a la dependencia usando el mombre de secuencia parametrizado en la tabla
     * "sgd_pnufe_procnumfe" que define los paquetes de numeracion y fechado
     * @param $dependencia   es el codigo de la dependencia a analizar
     * @return   string
     */
    function get_secuenciaDocto($dependencia) {

        $q = "select * from anexos where ANEX_CODIGO='" . $this->sgd_doc_padre. "' AND ANEX_RADI_NUME='" . $this->anex_radi_nume . "'";
        $rs = $this->cursor->query($q);

        if (!$rs->EOF)
            $this->sgd_doc_secuencia = $rs->fields['SGD_DOC_SECUENCIA'];

        if ($this->sgd_doc_secuencia)
            return ($this->sgd_doc_secuencia);
        else {
            // EL DOCUMENTO PADRE NO TIENE LA SECUENCIA
            //OBTIENE EL NOMBRE DE LA SECUENCIA

            $sql = "select SGD_SENUF_SEC  as SEC from SGD_SENUF_SECNUMFE where SGD_PNUFE_CODI=" . $this->sgd_pnufe_codi
                    . " and DEPE_CODI= '" . $dependencia . "'";
            $rs2 = $this->cursor->query($sql);

            if ($rs2 && !$rs2->EOF)
                $nombreSecuencia = $this->sgd_doc_secuencia = $rs2->fields["SEC"];
            $this->sgd_doc_secuencia = $this->cursor->nextId($nombreSecuencia);

            if (!$this->sgd_doc_secuencia)
                $this->sgd_doc_secuencia = 0;
        }
        return ($this->sgd_doc_secuencia);
    }

    /**
     * Actualiza en campo de secuencia en todos los documentos que hacen parte del paquete
     * de numeracion y fechado, con el numero que haya sido generado
     */
    function guardarSecuencia() {
        $fecha_hoy = date("Y-m-d");
        $sqlFechaHoy = $this->cursor->conn->DBDate($fecha_hoy);
        $record["SGD_FECH_DOC"] = $sqlFechaHoy;
        $record["SGD_DOC_SECUENCIA"] = $this->sgd_doc_secuencia;
        $recordWhere["ANEX_RADI_NUME"] = $this->anex_radi_nume;
        $recordWhere["SGD_DOC_PADRE"] = "'" . $this->sgd_doc_padre . "'";
        $rs = $this->cursor->update("anexos", $record, $recordWhere);

        if (!$rs)
            return false;
        else
            return true;
    }

    /**
     * Busca el ultimo numero de secuencia de documento generado
     * para un paquete de documentos del proceso de numeracion y fechado
     * de acuerdo a la dependencia enviada como parametro.
     * @param $procesoNumeracionFechado   es el codigo del proceso de numeracion y fechado
     * @param $dependencia                es el codigo de la dependencia a analizar
     * @return   string
     */
    function obtenerNumeroActualSecuencia($procesoNumeracionFechado, $dependencia) {
        $numeroActual = 0;
        $nombreSecuencia = $prefijo . $procesoNumeracionFechado . $dependencia;
        $q = "select max(sgd_doc_secuencia) as SEC  from anexos where anex_depe_creador='$dependencia' and sgd_pnufe_codi = $procesoNumeracionFechado ";
        $rs = $this->cursor->query($q);
        $retorno = "";

        if (!$rs->EOF) {
            $numeroActual = $rs->fields['SEC'];
            if ($numeroActual > 0) {
                $q = "select SGD_FECH_DOC from anexos where anex_depe_creador='$dependencia' and sgd_pnufe_codi = $procesoNumeracionFechado and sgd_doc_secuencia = $numeroActual";
                $rs = $this->cursor->query($q);
                $rs->MoveNext();
                $fechaNumero = $rs->fields["sgd_fech_doc"];
                $retorno = "$numeroActual de $fechaNumero";
            } else {
                $retorno = "Aun no generada";
            }
        } else {
            $retorno = "Aun no generada";
        }

        return ($retorno);
    }

    /**
     * Busca el maximo numero de anexo adicionado a un radicado, entre los radicados base, no las copias
     * @param $radicacion  es el codigo del radicado a analizar
     * @return   string
     */
    function obtenerMaximoNumeroAnexo($radicacion) {
        $isql = "select max(anex_codigo) as NUM from anexos where anex_radi_nume='$radicacion' ";
        $this->cursor->conn->SetFetchMode(ADODB_FETCH_ASSOC);
        $sw = 0;
        $rs = $this->cursor->query($isql);

        if (!$rs->EOF)
            $auxnumero = $rs->fields["NUM"];
        else
            $auxnumero = 0;
        $auxnumero = substr($auxnumero, strlen($auxnumero) - 4, 4);


        while ($sw == 0) {
            $uxnumeroSig = $auxnumero + 1;
            $isql = "select anex_codigo as NUM from anexos where anex_radi_nume='$radicacion' and anex_codigo like '%$uxnumeroSig' ";
            $rs = $this->cursor->query($isql);

            if (!$rs || $rs->EOF)
                $sw = 1;
            else
                $auxnumero++;
        }

        //print("SACA.........$auxnumero---");
        return($auxnumero);
    }

    /**
     * Busca los argumentos de contestacion de un paquete de documentos de numeracion y fechado
     * parametrizados, y los adiciona a los arreglos que ha de procesar luego la funcion de
     * combinacion de correspondencia
     * @param $campos  arreglo de etiquetas a combinar
     * @param $datos   arreglo de valores de las etiquetas a combinar
     */
    function obtenerArgumentos(&$campos, &$datos) {
        if ($this->sgd_pnufe_codi) {
            $sql = "select a.*,b.SGD_ANAR_ARGCOD from sgd_argd_argdoc a,sgd_anar_anexarg b where a.sgd_argd_codi=b.sgd_argd_codi "
                    . "and a.sgd_pnufe_codi=$this->sgd_pnufe_codi and b.anex_codigo='$this->sgd_doc_padre'";
            $rs = $this->cursor->query($sql);

            // itera por todo el grupo de argumentos
            while (!$rs->EOF) {
                $tablaArgumento = $rs->fields["SGD_ARGD_TABL"];
                $campoTablaArgumento = $rs->fields["sgd_argd_tcodi"];
                $descripcionTablaArgumento = $rs->fields["sgd_argd_tdes"];
                $valorLlaveTablaArgumento = $rs->fields["sgd_anar_argcod"];
                $sqlArgumento = "select * from $tablaArgumento where $campoTablaArgumento=$valorLlaveTablaArgumento ---- $descripcionTablaArgumento ";
                $rs1 = $this->cursor->query($sqlArgumento);

                if (!$rs1->EOF) {
                    $campos[] = "*" . trim($rs1->fields["sgd_argd_campo"]) . "*";
                    $datos[] = $rs1->fields[trim($descripcionTablaArgumento)];
                }
                $rs->MoveNext();
            }
        }
    }

    /**
     * Busca los anexos radicables que hacen parte del paquete de numeracion y fechado
     * al que pertenece el anexo
     * @return  arreglo de string con el codigo de los anexos radicables
     */
    function obtenerAnexosRadicablesPaquete() {
        $sql = "select * from anexos where sgd_doc_padre='$this->sgd_doc_padre'";
        $rs = $this->cursor->query($sql);
        $i = 0;
        //Retiro referencia
        //$tipoDocumento= & new TipoDocumento($this->cursor);
        $tipoDocumento = new TipoDocumento($this->cursor);

        //itera por todo el grupo de anexos
        while (!$rs->EOF) {
            $documento = $this->cursor->driver == 'mysql' ? $rs->fields["sgd_tpr_codigo"] : $rs->fields["SGD_TPR_CODIGO"];
            $tipoDocumento->TipoDocumento_codigo($documento);

            if ($tipoDocumento->get_sgd_tpr_radica() == "1") {
                $documentos[$i] = $this->cursor->driver == 'mysql' ? $rs->fields["anex_codigo"] : $rs->fields["ANEX_CODIGO"];
                $i++;
            }
            $rs->MoveNext();
        }
        return($documentos);
    }

    /**
     * Busca los anexos no radicables que hacen parte del paquete de numeracion y fechado
     * al que pertenece el anexo
     * @return  arreglo de string con el codigo de los anexos no radicables
     */
    function obtenerAnexosNoRadicablesPaquete() {
        $sql = "select * from anexos where sgd_doc_padre='$this->sgd_doc_padre'";
        $rs = $this->cursor->query($sql);
        $i = 0;
//Retiro referencia
//$tipoDocumento= & new TipoDocumento($this->cursor);
        $tipoDocumento = new TipoDocumento($this->cursor);

//itera por todo el grupo de anexos
        while (!$rs->EOF) {
            $documento = $this->cursor->driver == 'mysql' ? $rs->fields["sgd_tpr_codigo"] : $rs->fields["SGD_TPR_CODIGO"];
            $tipoDocumento->TipoDocumento_codigo($documento);

            if ($tipoDocumento->get_sgd_tpr_radica() != "1") {
                $documentos[$i] = $this->cursor->driver == 'mysql' ? $rs->fields["anex_codigo"] : $rs->fields["ANEX_CODIGO"];
                $i++;
            }
            $rs->MoveNext();
        }
        return($documentos);
    }

    /**
     * Busca si un grupo de anexos que hacen parte de un paquete de numeracion y fechado
     * ha sido radicado
     * @return  true y se han radicado, false de lo contrario
     */
    function seHaRadicadoUnPaquete($docPadre) {
        $sql = "select max(radi_nume_salida) as SALIDA from anexos where sgd_doc_padre='$docPadre' ";
        $rs = $this->cursor->query($sql);

        if (!$rs->EOF)
            if ($rs->fields["SALIDA"])
                return true;
            else
                return false;
    }

    /**
     * Fecha de modificaci�: 28-Junio-2006
     * Modificador: Supersolidaria
     * @param $verBorrados booleano Par�etro para mostrar todos los anexos o solo los anexos que no han sido borrados.
     */
    function anexosRadicado($radicado, $verBorrados = false) {
        $q = "select * from anexos where ANEX_RADI_NUME='$radicado'";
        if ($verBorrados === false) {
            $q .= " and anex_borrado <> 'S'";
        }
        $q .= " order by anex_numero";
        // print $q;
        $rs = $this->cursor->query($q);
        $i = 0;
        while (!$rs->EOF) {
            $this->codi_anexos[$i] = $this->sgd_rem_destino = $this->cursor->driver == 'mysql' ? $rs->fields["anex_codigo"] : $rs->fields["ANEX_CODIGO"];
            $this->sgd_tpr_codigo[$i] = $rs->fields["SGD_TPR_CODIGO"];
            $i++;
            $rs->MoveNext();
        }
        return $i;
    }

    /**
     * Busca los anexos que hacen parte del paquete de numeraci� y fechado
     * al que pertenece el anexo
     * @return  arreglo de string con el codigo de los anexos radicables
     */
    function obtenerAnexosPaquete() {
        $sql = "select * from anexos where sgd_doc_padre='$this->sgd_doc_padre'";
        $rs = $this->cursor->query($sql);
//        error_log('----------> linea 663 ' . $sql);
        $i = 0;

//itera por todo el grupo de anexos
        while (!$rs->EOF) {
            $documentos[$i] = $this->cursor->driver == 'mysql' ? $rs->fields["anex_codigo"] : $rs->fields["ANEX_CODIGO"];
            $i++;
            $rs->MoveNext();
        }

        return($documentos);
    }

    /**
     * Retorna el padre de un anexo
     * @return  arreglo de string con el codigo de los anexos radicables
     */
    function get_sgd_doc_padre() {
        return $this->sgd_doc_padre;
    }

    /**
     * Pregunta si un radicado ha sido generao desde un anexo
     * @param $radicado  es el c�digo del radicado a analizar
     * @return	Booleano con valor de true en caso de que un nradicado hauya sido generado desde un anexo false de lo contrario
     */
    function radGeneradoDesdeAnexo($radicacion) {
        $sql = "select anex_codigo as NUM from anexos where radi_nume_salida = '$radicacion'";
        $rs = $this->cursor->query($sql);

        while ($rs && !$rs->EOF) {
            return true;
        }
        return false;
    }

    /**
     * Pregunta si un anexo existe
     * @param $anex  es el c�digo del anexo a analizar
     * @return	Booleano con valor de true en caso de que el anexo exista, falso de lo contrario
     */
    function existeAnexo($cod) {
        $sql = "select anex_codigo as NUM from anexos where anex_codigo = '$cod'";
        $rs = $this->cursor->query($sql);
        while ($rs && !$rs->EOF) {
            return true;
        }
        return false;
    }

    /**
     * Pregunta si un anexo ha sido radicado
     * @param $anex  es el c�digo del anexo a analizar
     * @return	Booleano con valor de true en caso de que el anexo haya sido radicado , falso de lo contrario
     */
    function seHaRadicadoAnexo($cod) {
        $sql = "select RADI_NUME_SALIDA as NUM from anexos where anex_codigo = '$cod'  ";
        $rs = $this->cursor->query($sql);
        if ($rs && !$rs->EOF) {
            $aux = $rs->fields["NUM"];
            if (strlen(trim($aux)) > 0)
                return true;
        }
        return false;
    }

}

?>
