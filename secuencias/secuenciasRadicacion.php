<?php

// Ruta del directorio que contiene los scripts de Orfeo/GPL
$ruta_raiz = "..";

if ($_GET['modoConexionBD'] === '0') {
    include_once ( $ruta_raiz . '/config.php' );
    include_once ( $ruta_raiz . '/include/db/ConnectionHandler.php' );

    // Conexi�n a la BD utilizando los datos del archivo config.php
    $conexion = new ConnectionHandler($ruta_raiz);
    $db = & $conexion->conn;
} else if ($_GET['modoConexionBD'] === '1') {

    include( $ruta_raiz . '/adodb/adodb.inc.php' );
    // Nombre de la base de datos de Orfeo.
    $bd = $_GET['bd'];
    // Usuario de conexi�n con permisos de modificaci�n y creaci�n de objetos en la base de datos.
    $usuario = $_GET['usuario'];
    // Contrase�a del usuario de conexi�n a la BD.
    $contrasena = $_GET['contrasena'];
    // Nombre o IP del servidor de BD.
    $servidor = $_GET['servidor'];
    // Puerto de conexi�n a la BD.
    $puerto = $_GET['puerto'];

    // Conexi�n a la BD utilizando la informaci�n ingresada en el formulario.
    $db = NewADOConnection($_GET['driver']);

    if ($db->Connect($servidor . ':' . $puerto, $usuario, $contrasena, $bd) == false) {
        die('Error de conexi&oacute;n a la BD.');
    }
}

$db->debug = true;

// Arreglo con los nombre de las columnas que conforman la tabla DEPENDENCIA.
$arrColumnas = $db->MetaColumnNames('dependencia');

$arrSQLColumnas = array();

foreach ($arrColumnas as $arrColumnasClave => $arrColumnasValor) {

    if (strlen($arrColumnasClave) > strlen('DEPE_RAD_TP') &&
            ( substr_compare($arrColumnasClave, 'DEPE_RAD_TP', 0, strlen('DEPE_RAD_TP')) === 0 ||
            substr_compare($arrColumnasValor, 'depe_rad_tp', 0, strlen('depe_rad_tp')) === 0 )) {

        /**
         * Arreglo que contiene los nombres de las columnas de la tabla DEPENDENCIA que coinciden con 
         * la cadena DEPE_RAD_TP o depe_rad_tp, asociadas a un tipo de radicado espec�fico, p.e. depe_rad_tp1, 
         * depe_rad_tp2, depe_rad_tp3 o DEPE_RAD_TP1, DEPE_RAD_TP2, DEPE_RAD_TP3.
         * El �ndice del arreglo corresponde al c�digo asociado al tipo de radicado, p.e. 1, 2, 3.
         */
        $arrSQLColumnas[substr($arrColumnasClave, strlen('DEPE_RAD_TP'), 1)] = $arrColumnasValor;

        /**
         * Arreglo que contiene los c�digos asociados a un tipo de radicado, p.e. 1,2,3.
         * El �ndice del arreglo corresponde al nombre de la columna de la tabla DEPENDENCIA
         * que coincide con la cadena DEPE_RAD_TP, asociadas a un tipo de radicado espec�fico, p.e. DEPE_RAD_TP1, 
         * DEPE_RAD_TP2, DEPE_RAD_TP3.
         */
        $arrTpRad[$arrColumnasClave] = substr($arrColumnasClave, strlen('DEPE_RAD_TP'), 1);
    }
}

/**
 * Sentencia SQL para consultar los valores almacenados en las columnas de la tabla DEPENDENCIA asociadas a un 
 * tipo de radicado espec�fico (depe_rad_tp1, depe_rad_tp2, depe_rad_tp3). Los valores corresponden al c�digo de 
 * la dependencia de la cual toma la secuencia para generar el consecutivo de un tipo de radicado. p.e. depe_rad_tp1 = 100, 
 * depe_rad_tp2 = 100, depe_rad_tp3 = 900.
 */
$sqlCodDepeSecuencia = 'SELECT ' . implode(',', $arrSQLColumnas) . ' FROM dependencia';
$rsCodDepeSecuencia = $db->Execute($sqlCodDepeSecuencia);

$arrCodDepeSecuenciaTpRad = array();
$arrSQLEliminarSecuencia = array();
$arrSQLCrearSecuencia = array();

while (!$rsCodDepeSecuencia->EOF) {

    /**
     * Arreglo que contiene los valores almacenados en las columnas de la tabla DEPENDENCIA asociadas a un 
     * tipo de radicado espec�fico (depe_rad_tp1, depe_rad_tp2, depe_rad_tp3). El �ndice del arreglo corresponde
     * al nombre de la columna de la tabla DEPENDENCIA asociada a un tipo de radicado espec�fico, p.e. DEPE_RAD_TP1, 
     * DEPE_RAD_TP2, DEPE_RAD_TP3.
     */
    $arrCodDepeSecuenciaTpRad = $rsCodDepeSecuencia->GetRowAssoc();
    foreach ($arrCodDepeSecuenciaTpRad as $claveArrCodDepeSecuenciaTpRad => $valorArrCodDepeSecuenciaTpRad) {

        if ($valorArrCodDepeSecuenciaTpRad != NULL) {

            if (isset($_GET['sqlReiniciarSecuencias']) || isset($_GET['reiniciarSecuencias'])) {

                /**
                 * Arreglo que contiene las sentencias SQL para eliminar secuencias.
                 * El �ndice del arreglo es el nombre de la secuencia, p.e. secr_tp1_900, secr_tp2_900, secr_tp3_900
                 */
                $arrSQLEliminarSecuencia['secr_tp' . $arrTpRad[$claveArrCodDepeSecuenciaTpRad] . '_' . $valorArrCodDepeSecuenciaTpRad] = 'DROP SEQUENCE secr_tp' . $arrTpRad[$claveArrCodDepeSecuenciaTpRad] . '_' . $valorArrCodDepeSecuenciaTpRad . ';';

                print $sqlEliminarSecuencia . '<br>';
            }

            /**
             * Arreglo que contiene las sentencias SQL para crear secuencias.
             * El �ndice del arreglo es el nombre de la secuencia, p.e. secr_tp1_900, secr_tp2_900, secr_tp3_900
             */
            $arrSQLCrearSecuencia['secr_tp' . $arrTpRad[$claveArrCodDepeSecuenciaTpRad] . '_' . $valorArrCodDepeSecuenciaTpRad] = 'CREATE SEQUENCE secr_tp' . $arrTpRad[$claveArrCodDepeSecuenciaTpRad] . '_' . $valorArrCodDepeSecuenciaTpRad . '
                                INCREMENT 1
                                MINVALUE 1
                                MAXVALUE 9999999999999999
                                START 1
                                CACHE 1;
                                ALTER TABLE secr_tp' . $arrTpRad[$claveArrCodDepeSecuenciaTpRad] . '_' . $valorArrCodDepeSecuenciaTpRad . ' OWNER TO ' . $usuario . ';';

            print $sqlCrearSecuencia . '<br>';
        }
    }

    $rsCodDepeSecuencia->MoveNext();
}

if (is_array($arrSQLEliminarSecuencia)) {
    foreach ($arrSQLEliminarSecuencia as $claveSQLEliminarSecuencia => $valorSQLEliminarSecuencia) {
        print $valorSQLEliminarSecuencia . '<br>';

        if (isset($_GET['reiniciarSecuencias'])) {
            // Ejecuta las sentencias SQL para eliminar secuencias.
            if ($db->Execute($valorSQLEliminarSecuencia) === false) {
                die('Error al eliminar la secuencia ' . $claveSQLEliminarSecuencia . ' ' . $db->ErrorMsg());
            } else {
                print 'Secuencia ' . $claveSQLEliminarSecuencia . ' eliminada.</br>';
            }
        }
    }
}

if (is_array($arrSQLCrearSecuencia)) {
    foreach ($arrSQLCrearSecuencia as $claveSQLCrearSecuencia => $valorSQLCrearSecuencia) {
        print $valorSQLCrearSecuencia . '<br>';
        // Ejecuta las sentencias SQL para crear secuencias.
        if (isset($_GET['crearSecuencias']) || isset($_GET['reiniciarSecuencias'])) {
            if ($db->Execute($valorSQLCrearSecuencia) === false) {
                die('Error al crear la secuencia ' . $claveSQLCrearSecuencia . ' ' . $db->ErrorMsg());
            } else {
                print 'Secuencia ' . $claveSQLCrearSecuencia . ' creada.</br>';
            }
        }
    }
}
?>
