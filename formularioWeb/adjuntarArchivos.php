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
/*
 * @ Multiple File upload script.
 * @ Can do any number of file uploads
 * @ Just set the variables below and away you go
 * @ Author: Kevin Waterson
 * @ Modified: Sebastian Ortiz V. 2012
 * @copywrite 2008 PHPRO.ORG
 */

/* * * an array to hold messages ** */
include_once "../config.php";

class Uploader {

    public $messages = array();
    public $FILES = array();
    public $subidos = array();
    public $sha1sums = array();
    public $sizes = array();
    public $fileName = array();
    public $nombreOrfeo = array();
    public $upload_dir = "../bodega/tmp/";
    public $bodega_dir = "../bodega/";
    public $bodega_temp = "../bodega";
    public $listadoImprimible = "";
    public $tieneArchivos = false;
    public $error = 0;

    public function Uploader($FilesList) {
        $this->FILES = $FileList;
    }

    public function adjuntarYaSubidos() {
        if (count($this->subidos) > 0) {
            foreach ($this->subidos as $archivosSubidos) {
                if (is_file($this->bodega_temp . $archivosSubidos)) {
                    continue;
                } else {
                    $error = 1;
                }
            }
            if ($error > 0 || sizeof($this->subidos) == 0) {
                $this->tieneArchivos = false;
                //return false;
                $notiene = 'No tiene anexos<br>';
                return $notiene;
            } else {
                $this->tieneArchivos = true;
                $this->listadoAdjuntosConHashesYaSubidos();
                //$this->adjuntarArchivos();
                $tiene = 'Tiene anexos<br>';
                return $tiene . ' -------> ';
                //return $error;
            }
        }
    }

    //Deprecated Ya no se usa por que se suben con FineUploader
    public function adjuntarArchivos() {
        $error = 0;
        error_reporting(E_ALL);
        /*         * * the upload directory ** */

        /*         * * the maximum filesize from php.ini ** */
        $ini_max = str_replace('M', '', ini_get('upload_max_filesize'));
        $upload_max = $ini_max * 1024 * 1024;
        $max_file_size = 5242880;
        /* Added to support a maximun upload size adding all individual file sizes */
        $uploaded_size = 0;
        /*         * * check if a file has been submitted ** */
        if (isset($this->FILES['userfile']['tmp_name']) && $this->FILES['userfile']['tmp_name'] == "") {
            return true;
            //return 'valido --------> <br>';
        }
        if (isset($this->FILES['userfile']['tmp_name'])) {
            if (count($this->FILES['userfile']['tmp_name']) > 0) {
                /** loop through the array of files ** */
                for ($i = 0; $i < count($this->FILES['userfile']['tmp_name']); $i++) {
                    if ($this->FILES['userfile']['tmp_name'][$i] != '') {
                        // Verifica si hay algun archivo en el arreglo
                        if (!is_uploaded_file($this->FILES['userfile']['tmp_name'][$i])) {
                            if (strlen($this->FILES['userfile']['tmp_name'][$i]) == 0) {
                                continue;
                            }

                            $this->messages[] = 'No se adjunto ningun archivo, o se alcanzo el tama&ntilde;o m&aacute;ximo.';
                            $error += 1;
                        }
                        /* Compruebe si el archivo es menor que el tamaño máximo de php.ini */ elseif ($this->FILES['userfile']['size'][$i] + $uploaded_size > $upload_max) {
                            $this->messages[] = "Los archivos superan el m&aacute;ximo permitido $upload_max php.ini limit (20M)";
                            $error += 1;
                        }
                        // Compruebe que el archivo es menor que el tamaño máximo del archivo
                        elseif ($this->FILES['userfile']['size'][$i] > $max_file_size) {
                            $this->messages[] = "El archivo supera el m&aacute;ximo permitido $max_file_size limit (5M)";
                            $error += 1;
                        } else {
                            // Copiar los archivos a un directorio temporal mientras se obtiene un numero de radicado para asociarlos.
                            if (@copy($this->FILES['userfile']['tmp_name'][$i], $this->upload_dir . basename($this->FILES['userfile']['tmp_name'][$i]))) {
                                /*                                 * * give praise and thanks to the php gods ** */
                                $this->messages[] = $this->FILES['userfile']['name'][$i] . ' uploaded';
                                $uploaded_size += $this->FILES['userfile']['size'][$i];
                                $this->calcularSHA1SumAnexos(basename($this->FILES['userfile']['tmp_name'][$i]));
                            } else {
                                /*                                 * * an error message ** */
                                $this->messages[] = 'Uploading ' . $this->FILES['userfile']['name'][$i] . ' Failed';
                                $error += 1;
                            }
                        }
                    }
                }
                if ($error > 0) {
                    //return false;
                    //return false;
                    return 'salio errores al cargar archivo<br>' . print_r($this->messages);
                } else {
                    $this->tieneArchivos = true;
                    $this->listadoAdjuntosConHashes();
                    //return true;
                    return 'paso ------> ya cargo<br>';
                }
            }
        }
    }

    public function calcularSHA1SumAnexos($fileName) {
        $this->sha1sums[] = sha1_file($this->upload_dir . $fileName);
        $this->sizes[] = intval(filesize($this->upload_dir . $fileName) / 1024);
        $this->fileName[] = $fileName;
    }

    public function listadoAdjuntosConHashes() {
        if (!$this->tieneArchivos) {
            $this->listadoImprimible = "No se adjunta ningún archivo\n";
            return;
        }
        $this->listadoImprimible = "Se adjuntan los siguientes archivos:\n";
        for ($i = 0; $i < count($this->FILES['userfile']['name']); $i++) {
            if (strlen($this->FILES['userfile']['tmp_name'][$i]) == 0) {
                continue;
            }
            $this->listadoImprimible .= ($i + 1) . ". " . $this->FILES['userfile']['name'][$i] . " \tsha1sum: " . $this->sha1sums[$i] . "\n";
        }
        return $this->listadoImprimible;
    }

    public function listadoAdjuntosConHashesYaSubidos() {
        if (isset($this->subidos) and count($this->subidos) == 0) {
            $this->listadoImprimible = "No se adjunta ningún archivo\n";
            return $this->listadoImprimible;
        }

        $this->listadoImprimible = "Se adjuntan los siguientes archivos:\n";

        for ($i = 0; $i < count($this->subidos); $i++) {
            if (strlen($this->subidos[$i]) == 0) {
                continue;
            }
            $this->calcularSHA1SumAnexos($this->subidos[$i]);
            $this->listadoImprimible .= ($i + 1) . ". " . $this->FILES['userfile']['name'][$i] . " \n";
        }
        return $this->listadoImprimible;
    }

    public function moverArchivoCarpetaBodega($numrad) {
        if (!$this->tieneArchivos) {
            return;
        }
        //Si todo fue bien entonces mover los archivos de la carpeta temporal a  bodega.
        for ($i = 0; $i < count($this->FILES['userfile']['tmp_name']); $i++) {
            if (strlen($this->FILES['userfile']['tmp_name'][$i]) == 0) {
                continue;
            }
            $extension = end(explode('.', $this->FILES['userfile']['name'][$i]));
            //Bug fix si el archivo no tiene extensión.
            $extension = $extension ? '.' . $extension : '';
            $this->nombreOrfeo[] = $numrad . '_' . substr('00000' . ($i + 1), -5) . $extension;
            if (@rename($this->upload_dir . basename($this->FILES['userfile']['tmp_name'][$i]), $this->bodega_dir . '/' . $this->nombreOrfeo[$i])) {
                return "Archivo movido exitoso <br>";
            } else {
                return "Error moviendo a destino final <br>";
            }
        }
    }

    public function moverArchivoCarpetaBodegaYaSubidos($numrad) {
        if (!$this->tieneArchivos) {
            $mensaje = 'no tiene ningun anexo metodo morverarchivos';
            return $mensaje;
        }
        //Si todo fue bien entonces mover los archivos de la carpeta temporal a  bodega.
        for ($i = 0; $i < count($this->subidos); $i++) {

            if (strlen($this->subidos[$i]) == 0) {
                continue;
            }
            $extension = end(explode('.', $this->subidos[$i]));
            //Bug fix si el archivo no tiene extensión.
            $extension = $extension ? '.' . $extension : '';
            $this->nombreOrfeo[] = $numrad . '_' . substr('00000' . ($i + 1), -5) . $extension;
            if (@rename($this->upload_dir . '/' . basename($this->subidos[$i]), $this->bodega_dir . '/' . $this->nombreOrfeo[$i])) {
                $subio = "Archivo movido exitoso <br>";
                return $subio;
            } else {
                $subio = "Error moviendo a destino final <br>";
                return $subio;
            }
        }
    }

}

?>
