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

$db->debug = true;

/**
 * Sentencia SQL para consultar los valores almacenados en las columnas de la tabla DEPENDENCIA asociadas a un 
 * tipo de radicado espec�fico (depe_rad_tp1, depe_rad_tp2, depe_rad_tp3). Los valores corresponden al c�digo de 
 * la dependencia de la cual toma la secuencia para generar el consecutivo de un tipo de radicado. p.e. depe_rad_tp1 = 100, 
 * depe_rad_tp2 = 100, depe_rad_tp3 = 900.
 */
$sqlCodDepeSecuencia = 'select distinct ' . implode(',', $arrSQLColumnas) . ' from dependencia';
$rsCodDepeSecuencia = $db->Execute($sqlCodDepeSecuencia);

$arrCodDepeSecuenciaTpRad = array();
$arrSQLEliminarSecuencia = array();
$arrSQLCrearSecuencia = array();

while (!$rsCodDepeSecuencia->EOF) {

    /**
     * Arreglo que contiene los valores almacenados en las columnas de la tabla DEPENDENCIA asociadas a un 
     * tipo de radicado especifico (depe_rad_tp1, depe_rad_tp2, depe_rad_tp3). El �ndice del arreglo corresponde
     * al nombre de la columna de la tabla DEPENDENCIA asociada a un tipo de radicado espec�fico, p.e. DEPE_RAD_TP1, 
     * DEPE_RAD_TP2, DEPE_RAD_TP3.
     */
    $arrCodDepeSecuenciaTpRad = $rsCodDepeSecuencia->GetRowAssoc();
    foreach ($arrCodDepeSecuenciaTpRad as $claveArrCodDepeSecuenciaTpRad => $valorArrCodDepeSecuenciaTpRad) {

        if ($valorArrCodDepeSecuenciaTpRad != NULL) {

            $querySecu = "select 0 as existe FROM pg_class where relname = 'secr_tp" . $arrTpRad[$claveArrCodDepeSecuenciaTpRad] . "_" . $valorArrCodDepeSecuenciaTpRad."'";
            $rsQuerySecu = $db->Execute($querySecu);
            $existe = isset($rsQuerySecu->fields['EXISTE'])? $rsQuerySecu->fields['EXISTE'] : $rsQuerySecu->fields['existe'];
            
                if(count($existe) < 0){

                        /**
                         * Sentencia para crear la secuencia en caso de no existir, acorde a lo consultado en las dependencia
                         * existentes en la base de datos
                         */
                        $crearsecuencia = 'create SEQUENCE secr_tp' . $arrTpRad[$claveArrCodDepeSecuenciaTpRad] . '_' . $valorArrCodDepeSecuenciaTpRad . '
                                                INCREMENT 1  MINVALUE 1 MAXVALUE 9999999999999999 START 1 CACHE 1;
                                        ALTER TABLE secr_tp' . $arrTpRad[$claveArrCodDepeSecuenciaTpRad] . '_' . $valorArrCodDepeSecuenciaTpRad . ' OWNER TO ' . $usuario . ';';                        
                        $db->Execute($crearsecuencia);
                        print 'Se creo la secuencia --> '.$crearsecuencia . '<br>';

                }

                if(count($existe) > 0){

                        if (isset($_GET['sqlReiniciarSecuencias']) || isset($_GET['reiniciarSecuencias'])) {

                                /**
                                 * Sentencia para actualizar la secuencia en la que inician los diferentes tipos de radicados
                                 * asociados a las dependencias existentes en la base de datos. EJ:secr_tp1_900, secr_tp3_900
                                 */
                                $actualizasecuencia = 'alter SEQUENCE secr_tp' . $arrTpRad[$claveArrCodDepeSecuenciaTpRad] . '_' . $valorArrCodDepeSecuenciaTpRad . ' RESTART WITH 1;';
                                $db->Execute($actualizasecuencia);
                                print 'Se actualizo la secuencia --> '.$actualizasecuencia . '<br>';
                        }

                }
            
        }
    }

    $rsCodDepeSecuencia->MoveNext();
}