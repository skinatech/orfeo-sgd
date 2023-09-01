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
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
session_start();
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

/* ---------------------------------------------------------+
  |                     INCLUDES                             |
  +--------------------------------------------------------- */
include_once($dir_raiz . "/include/tx/Historico.php");
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";

class Tx extends Historico {
    /** Aggregations: */
    /** Compositions: */
    /*     * * Attributes: ** */

    /**
     * Clase que maneja los Historicos de los documentos
     *
     * @param int     Dependencia Dependencia de Territorial que Anula
     * @param number  usuaDocB    Documento de Usuario
     * @param number  depeCodiB   Dependencia de Usuario Buscado
     * @param varchar usuaNombB   Nombre de Usuario Buscado
     * @param varcahr usuaLogin   Login de Usuario Buscado
     * @param number	usNivelB	Nivel de un Ususairo Buscado..
     * @db 	Objeto  conexion
     * @access public
     */
    var $db;

    function Tx($db) {
        /**
         * Constructor de la clase Historico
         * @db variable en la cual se recibe el cursor sobre el cual se esta trabajando.
         *
         */
        $this->db = $db;

    }

    /**
     * Metodo que trae los datos principales de un usuario a partir del codigo y la dependencia
     *
     * @param number $codUsuario
     * @param number $depeCodi
     *
     */
    function datosUs($codUsuario, $depeCodi) {
        if (strpos($depeCodi, "'") == FALSE)
            $depDestino = "'" . $depeCodi . "'";
        $sql = "SELECT
				USUA_DOC
				,USUA_LOGIN
				,CODI_NIVEL
				,USUA_NOMB
			FROM
				USUARIO
			WHERE
				DEPE_CODI='$depeCodi'
				AND USUA_CODI=$codUsuario";
        # Busca el usuairo Origen para luego traer sus datos.
//	$this->db->conn->debug=true;

        $rs = $this->db->query($sql);
        //$usNivel = $rs->fields["CODI_NIVEL"];
        //$nombreUsuario = $rs->fields["USUA_NOMB"];
        $this->usNivelB = $rs->fields['CODI_NIVEL'];
        $this->usuaNombB = $rs->fields['USUA_NOMB'];
        $this->usuaDocB = $rs->fields['USUA_DOC'];
    }

// MODIFICADO PARA GENERAR ALERTAS
// JUNIO DE 2009
    function getRadicados($tipo, $usua_cod) {
        $con = $this->db->driver;
        switch ($con) {
            case'oci8':
                $query = "SELECT $tipo FROM SGD_NOVEDAD_USUARIO WHERE USUA_DOC=$usua_cod";
                break;
            case 'postgres':

                $campo1 .= '"';
                $campo1 .= $tipo;
                $campo1 .= '"';
                $campo2 = '"USUA_DOC"';
                $query = "SELECT $campo1 FROM SGD_NOVEDAD_USUARIO WHERE $campo2='$usua_cod'";
                break;
        }
        $rs = $this->db->query($query);
        if ($rs) {
            return $rs->fields["$tipo"];
        }
    }

// MODIFICADO PARA GENERAR ALERTAS
// JUNIO  DE 2009 

    function registrarNovedad($tipo, $docUsuarioDest, $numRad, $dir_raiz) {
        // busco la información de radicados informados pendientes de alerta
        // Busco info del campo NOV_INFOR de la tabla SGD_NOVEDAD_USUARIO
        //include("$dir_raiz/class_control/Param_admin.php"); 
        $param = Param_admin::getObject($this->db, '%', 'ALERT_FUNCTION');

        if ($param->PARAM_VALOR == "1") {

            $rads = $this->getRadicados($tipo, $docUsuarioDest);

            if ($rads != "") {
                $rads .= ",";
            }
            $rads .= $numRad;

            $con = $this->db->driver;

            switch ($con) {
                case'oci8':
                    $xarray['USUA_DOC'] = $docUsuarioDest;
                    $xarray["$tipo"] = $rads;

                    $tipo1 = $tipo;
                    $valor = $xarray["$tipo"];

                    $qs = "Select count(*) as contador from SGD_NOVEDAD_USUARIO where USUA_DOC=$docUsuarioDest";
                    $rs = $this->db->conn->query($qs);

                    if ($rs->fields['CONTADOR'] == 0) {
                        $qu = "INSERT INTO SGD_NOVEDAD_USUARIO (USUA_DOC,$tipo1) values ($docUsuarioDest,$valor)";
                        $this->db->conn->query($qu);
                    } else {
                        $this->db->conn->query("UPDATE SGD_NOVEDAD_USUARIO SET $tipo1 = $valor where USUA_DOC'$docUsuarioDest'");
                    }

                    break;

                case 'postgres':

                    $xarray['USUA_DOC'] .= '"';
                    $xarray['USUA_DOC'] .= $docUsuarioDest;
                    $xarray['USUA_DOC'] .= '"';

                    $tipo1 = '"';
                    $tipo1 .= $tipo;
                    $tipo1 .= '"';

                    $xarray["$tipo"] .= "'";
                    $xarray["$tipo"] .= $rads;
                    $xarray["$tipo"] .= "'";

                    $valor = $xarray["$tipo"];

                    $campo = '"USUA_DOC"';
                    $qs = "Select count(*) as contador from SGD_NOVEDAD_USUARIO where $campo='$docUsuarioDest'";
                    $rs = $this->db->conn->query($qs);

                    if ($rs->fields['CONTADOR'] == 0) {
                        $qu = "INSERT INTO SGD_NOVEDAD_USUARIO ($campo,$tipo1) values ('$docUsuarioDest',$valor)";
                        $this->db->conn->query($qu);
                    } else {
                        $this->db->conn->query("UPDATE SGD_NOVEDAD_USUARIO SET $tipo1 = $valor where $campo='$docUsuarioDest'");
                    }

                    break;
            }
        }
    }

    function informar($radicados, $loginOrigen, $depDestino, $depOrigen, $codUsDestino, $codUsOrigen, $observa, $idenviador = null, $dir_raiz = "") {
        $whereNivel = "";
        if (substr_count($depDestino, "'") == 0)
            $depDestino = "'" . $depDestino . "'";

        elseif (substr_count($depDestino, "'") > 2)
            $depDestino = trim($depDestino, "'");
        
        //$this->db->conn->debug=true;
        $sql = "SELECT USUA_DOC ,USUA_LOGIN ,CODI_NIVEL ,USUA_NOMB FROM USUARIO WHERE DEPE_CODI=$depDestino AND USUA_CODI=$codUsDestino";
        $this->db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
        # Busca el usuairo Origen para luego traer sus datos.
        $rs = $this->db->query($sql); # Ejecuta la busqueda

        $usNivel = $rs->fields["CODI_NIVEL"];
        $usLoginDestino = $rs->fields["USUA_LOGIN"];
        $nombreUsuario = $rs->fields["USUA_NOMB"];
        $docUsuarioDest = $rs->fields["USUA_DOC"];

        if ($tomarNivel == "si") {
            $whereNivel = ",CODI_NIVEL=$usNivel";
        }
        
        $codTx = 8;
        $observa = "A: $usLoginDestino - $observa";
        
        if (!$observacion)
            $observacion = $observa;

        $tmp_rad = array();
        $informaSql = true;
        //$this->db->conn->debug=true;

        if (is_array($radicados)) {
            while ((list(, $noRadicado) = each($radicados)) and $informaSql) {
                if (strstr($noRadicado, '-'))
                    $tmp = explode('-', $noRadicado);
                else
                    $tmp = $noRadicado;

                if (is_array($tmp)) {
                    $record["RADI_NUME_RADI"] = $tmp[1];
                } else {
                    $record["RADI_NUME_RADI"] = $noRadicado;
                }

                # Asignar el valor de los campos en el registro
                # Observa que el nombre de los campos pueden ser mayusculas o minusculas
                $record["DEPE_CODI"] = $depDestino;
                $record["USUA_CODI"] = $codUsDestino;
                $record["INFO_CODI"] = $idenviador;
                $record["INFO_DESC"] = "'$observacion '";
                $record["USUA_DOC"] = "'$docUsuarioDest'";
                $record["INFO_FECH"] = $this->db->conn->OffsetDate(0, $this->db->conn->sysTimeStamp);

                # Mandar como parametro el recordset vacio y el arreglo conteniendo los datos a insertar
                # a la funcion GetInsertSQL. Esta procesara los datos y regresara un enunciado SQL
                # para procesar el INSERT.
                if (strpos($record['RADI_NUME_RADI'], "'") === false)
                    $record['RADI_NUME_RADI'] = "'" . $record['RADI_NUME_RADI'] . "'";
                if (substr_count($record['RADI_NUME_RADI'], "'") < 2)
                    $record['RADI_NUME_RADI'] = "'" . str_replace("'", "", $record['RADI_NUME_RADI']) . "'";
                $informaSql = $this->db->conn->Replace("INFORMADOS", $record, array('RADI_NUME_RADI', 'INFO_CODI', 'USUA_DOC'), false);

                // MODIFICADO PARA GENERAR ALERTAS
                // JUNIO DE 2009
                //Modificado idrd 
                if ($informaSql)
                    $tmp_rad[] = trim($record["RADI_NUME_RADI"], "'");
            }
        }else {
            
            # Asignar el valor de los campos en el registro
            # Observa que el nombre de los campos pueden ser mayusculas o minusculas
            $record["RADI_NUME_RADI"] = $radicados;
            $record["DEPE_CODI"] = $depDestino;
            $record["USUA_CODI"] = $codUsDestino;
            $record["INFO_CODI"] = $idenviador;
            $record["INFO_DESC"] = "'$observacion '";
            $record["USUA_DOC"] = "'$docUsuarioDest'";
            $record["INFO_FECH"] = $this->db->conn->OffsetDate(0, $this->db->conn->sysTimeStamp);

            # Mandar como parametro el recordset vacio y el arreglo conteniendo los datos a insertar
            # a la funcion GetInsertSQL. Esta procesara los datos y regresara un enunciado SQL
            # para procesar el INSERT.
            if (strpos($record['RADI_NUME_RADI'], "'") === false)
                $record['RADI_NUME_RADI'] = "'" . $record['RADI_NUME_RADI'] . "'";
            
            if (substr_count($record['RADI_NUME_RADI'], "'") < 2)
                $record['RADI_NUME_RADI'] = "'" . str_replace("'", "", $record['RADI_NUME_RADI']) . "'";
            
            $informaSql = $this->db->conn->Replace("INFORMADOS", $record, array('RADI_NUME_RADI', 'INFO_CODI', 'USUA_DOC'), false);

            // MODIFICADO PARA GENERAR ALERTAS
            // JUNIO DE 2009
            //Modificado idrd 
            if ($informaSql)
                $tmp_rad[] = trim($record["RADI_NUME_RADI"], "'");                
        }

        $depDestino = trim($depDestino, "'");
        $depOrigen = trim($depOrigen, "'");
        $this->insertarHistorico($tmp_rad, $depOrigen, $codUsOrigen, $depDestino, $codUsDestino, $observa, $codTx);
        
        return $nombreUsuario;
    }

    function borrarInformado($radicados, $loginOrigen, $depDestino, $depOrigen, $codUsDestino, $codUsOrigen, $observa) {
        $tmp_rad = array();
        $deleteSQL = true;
        //$this->db->conn->debug=true;
        while ((list(, $noRadicado) = each($radicados)) and $deleteSQL) { //foreach($radicados as $noRadicado)
            # Borrar el informado seleccionado
            $tmp = explode('-', $noRadicado);
            ($tmp[0]) ? $wtmp = ' and INFO_CODI = ' . $tmp[0] : $wtmp = ' and INFO_CODI IS NULL ';
            $record["RADI_NUME_RADI"] = "'" . $tmp[1] . "'";
            $record["USUA_CODI"] = $codUsOrigen;
            $record["DEPE_CODI"] = $depOrigen;
            $deleteSQL = $this->db->conn->Execute("DELETE FROM INFORMADOS WHERE RADI_NUME_RADI='" . $tmp[1] . " and USUA_CODI=" . $codUsOrigen . " and DEPE_CODI='" . $depOrigen . "'" . str_replace("'", "", $wtmp));
            if ($deleteSQL) {
                $record["RADI_NUME_RADI"] = str_replace("'", "", $record["RADI_NUME_RADI"]);
                $tmp_rad[] = $record["RADI_NUME_RADI"];
            }
        }
        $codTx = 7;
        if ($deleteSQL) {
            $this->insertarHistorico($tmp_rad, $depOrigen, $codUsOrigen, $depOrigen, $codUsOrigen, $observa, $codTx, $observa);
            return $tmp_rad;
        } else
            return $deleteSQL;
    }

    function cambioCarpeta($radicados, $usuaLogin, $carpetaDestino, $carpetaTipo, $tomarNivel, $observa) {
        $whereNivel = "";
        $sql = "SELECT b.USUA_DOC ,b.USUA_LOGIN ,b.CODI_NIVEL ,b.DEPE_CODI ,b.USUA_CODI ,b.USUA_NOMB FROM  USUARIO b
		WHERE b.USUA_LOGIN = '$usuaLogin'";
        # Busca el usuairo Origen para luego traer sus datos.
        $rs = $this->db->query($sql); # Ejecuta la busqueda

        $usNivel = $rs->fields[2];
        $depOrigen = $rs->fields[3];
        $codUsOrigen = $rs->fields[4];
        $nombOringen = $rs->fields[5];
        if ($tomarNivel == "si") {
            $whereNivel = ",CODI_NIVEL=$usNivel";
        }
        $codTx = "10";

        $radicadosIn = join(",", $radicados);
        $sql = "update radicado set CARP_CODI=$carpetaDestino, CARP_PER=$carpetaTipo, radi_fech_agend=null, radi_agend=null  $whereNivel where RADI_NUME_RADI in($radicadosIn)";

        //$this->conn->Execute($isql);
        $rs = $this->db->query($sql); # Ejecuta la busqueda
        $retorna = 1;
        if (!$rs) {
            echo "<center><font color=red>Error en el Movimiento ... A ocurrido un error y no se ha podido realizar la Transaccion</font> <!-- $sql -->";
            $retorna = -1;
        }
        if ($retorna != -1) {
            $radicados = str_replace("'", "", $radicados);
            $this->insertarHistorico($radicados, $depOrigen, $codUsOrigen, $depOrigen, $codUsOrigen, $observa, $codTx);
        }
        return $retorna;
    }

    function reasignar($radicados, $loginOrigen, $depDestino, $depOrigen, $codUsDestino, $codUsOrigen, $tomarNivel, $observa, $codTx, $carp_codi) {
        //AQUI PIERDE DIR RAIZ
        $dir_raiz = $_SESSION['dir_raiz'];
        $whereNivel = "";
        if (strpos($depDestino, "'") == FALSE)
            $depDestino = "'" . $depDestino . "'";
        $this->db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

        $sql = "SELECT USUA_DOC,USUA_LOGIN,CODI_NIVEL,USUA_NOMB FROM USUARIO WHERE DEPE_CODI=$depDestino AND USUA_CODI=$codUsDestino";
        $rs = $this->db->query($sql);

        $sqlUsuAnte = "SELECT depe_codi FROM USUARIO WHERE usua_login='$loginOrigen'";
        $rsUsuAnte = $this->db->query($sqlUsuAnte);
        
        $usNivel = $rs->fields['CODI_NIVEL'];
        $nombreUsuario = $rs->fields['USUA_NOMB'];
        $docUsuaDest = $rs->fields['USUA_DOC'];
        if ($tomarNivel == "si") {
            $whereNivel = ",CODI_NIVEL=$usNivel";
        }
        
        $num = count($radicados);        
        $i = 0;
        while ($i < $num) {
            $record_id = $radicados[$i];
     
            $isqlTRDA = "select  RADI_NUME_RADI from radicado where radi_nume_radi = $record_id or radi_nume_deri = $record_id";
            $rsTRDA2 = $this->db->conn->Execute($isqlTRDA); //edd2
            
            while (!$rsTRDA2->EOF) {
                $record_id = $rsTRDA2->fields['RADI_NUME_RADI'];
                $radicadosSel[] = "'" . $record_id . "'";                
		          
    	    	/**
                 * By- Skinatech / 28/02/2020
    	    	 * Se extrae el ultimo digito del radicado para identificar el tipo de radicado que se esta recibiendo y
                 * asi en que carpeta queda se agrega validación para que en caso de que el tipo de radicado sea 2 guarde
                 * en la carpeta 0
                 **/
        	    $carp_codi = substr($record_id, -1, 1);
           	   	
        		if($carp_codi == 2){
        		   $carp_codi = 0;
        		}

                // SI la transacción es Vo.Bo se debe guardar en la carpeta de Vo.Bo
                if($codTx == 16){
                    $carp_codi = 11;
                }
        		
        		$updateRadiResig = "UPDATE radicado set carp_codi = $carp_codi where radi_nume_radi = '$record_id' or radi_nume_deri = '$record_id'";
        	   	$rdUpdateRadoResig = $this->db->conn->Execute($updateRadiResig);   

	           $rsTRDA2->MoveNext();
            }
	
	    next($radicados);
            $i++;
        }
        
        $radicadosIn = join(",", $radicadosSel);
        $proccarp = "Reasignar";
        $carp_per = 0;
        $depeUsuaAnte = isset($rsUsuAnte->fields['DEPE_CODI']) ? $rsUsuAnte->fields['DEPE_CODI']:$rsUsuAnte->fields['depe_codi'];
	
        $isql = "update radicado set
                          RADI_USU_ANTE='$loginOrigen'
                          ,radi_depe_ante= '$depeUsuaAnte'
                          ,RADI_DEPE_ACTU=$depDestino
                          ,RADI_USUA_ACTU=$codUsDestino
                          ,CARP_PER=$carp_per
                          ,RADI_LEIDO=0
                          ,radi_fech_agend=null
                          ,radi_agend=null
                          $whereNivel
                 where radi_depe_actu='$depOrigen'
                           AND radi_usua_actu=$codUsOrigen
                           AND RADI_NUME_RADI in($radicadosIn)";
        // MODIFICADO PARA GENERAR ALERTAS
        // JUNIO DE 2009
        // foreach ($radicados as $rad) {
        //     $this->registrarNovedad('NOV_REASIG', $docUsuaDest, $rad, ".");
        //     //AQUI ENVIO DIR RAIZ
        // }
        //////////////////////////////////
        $this->db->conn->Execute($isql); # Ejecuta la busqueda
        
        $radicados = str_replace("'", "", $radicados);
        $depOrigen = str_replace("'", "", $depOrigen);
        $depDestino = str_replace("'", "", $depDestino);
        $this->insertarHistorico($radicados, $depOrigen, $codUsOrigen, $depDestino, $codUsDestino, $observa, $codTx);
        return $nombreUsuario;
    }

//Modificado por Fabian Mauricio Losada
    function archivar($radicados, $loginOrigen, $depOrigen, $codUsOrigen, $observa,$dependenciaSalida) {
        $whereNivel = "";
        $radicadosIn = join(",", $radicados);
        $carp_codi = substr($depOrigen, 0, 2);
        $carp_per = 0;
        $carp_codi = 0;

        $sqlUsuAnte = "SELECT depe_codi FROM USUARIO WHERE usua_login='$loginOrigen'";
        $rsUsuAnte = $this->db->query($sqlUsuAnte);
        $depeUsuaAnte = isset($rsUsuAnte->fields['DEPE_CODI']) ? $rsUsuAnte->fields['DEPE_CODI']:$rsUsuAnte->fields['depe_codi'];

        /** 
         * Se utiliza para identificar la carpeta de la que viene para asi mismo asignarlo en esa carpeta
         * cuando se manda a archivar o a no requiere respuesta
         */
        $num = count($radicados);        
        $i = 0;
        while ($i < $num) {
            $record_id = $radicados[$i];
     
            $isqlTRDA = "select  RADI_NUME_RADI from radicado where radi_nume_radi = $record_id or radi_nume_deri = $record_id";
            $rsTRDA2 = $this->db->conn->Execute($isqlTRDA); //edd2
            
            while (!$rsTRDA2->EOF) {
                $record_id = $rsTRDA2->fields['RADI_NUME_RADI'];
                $radicadosSel[] = "'" . $record_id . "'";                
		          
    	    	/**
                 * By- Skinatech / 28/02/2020
    	    	 * Se extrae el ultimo digito del radicado para identificar el tipo de radicado que se esta recibiendo y
                 * asi en que carpeta queda se agrega validación para que en caso de que el tipo de radicado sea 2 guarde
                 * en la carpeta 0
                 **/
        	    $carp_codi = substr($record_id, -1, 1);
           	   	
        		if($carp_codi == 2){
        		   $carp_codi = 0;
        		}

                // SI la transacción es Vo.Bo se debe guardar en la carpeta de Vo.Bo
                if($codTx == 16){
                    $carp_codi = 11;
                }
        		
        		$updateRadiResig = "UPDATE radicado set carp_codi = $carp_codi where radi_nume_radi = '$record_id' or radi_nume_deri = '$record_id'";
        	   	$rdUpdateRadoResig = $this->db->conn->Execute($updateRadiResig);   

	           $rsTRDA2->MoveNext();
            }
	
	        next($radicados);
            $i++;
        }

        //$this->db->conn->debug=true;
        $isql = "update radicado
					set
                      RADI_USU_ANTE='$loginOrigen'
                      ,radi_depe_ante= '$depeUsuaAnte'
					  ,RADI_DEPE_ACTU='$dependenciaSalida'
					  ,RADI_USUA_ACTU=1
					  ,CARP_PER=$carp_per
					  ,RADI_LEIDO=0
					  ,radi_fech_agend=null
					  ,radi_agend=null
					  ,CODI_NIVEL=1
                      ,SGD_SPUB_CODIGO=0
                      ,radi_estado_pqrs=4
				 where radi_depe_actu='$depOrigen'
				 	   AND radi_usua_actu=$codUsOrigen
					   AND RADI_NUME_RADI in($radicadosIn)";
        $this->db->conn->Execute($isql); # Ejecuta la busqueda
        $this->insertarHistorico(str_replace("'", "", $radicados), $depOrigen, $codUsOrigen, $dependenciaSalida, 1, $observa, 13);
        
        $isqlAgenda = "update sgd_agen_agendados set SGD_AGEN_ACTIVO=0 where RADI_NUME_RADI in($radicadosIn)";
        $this->db->conn->Execute($isqlAgenda); # Ejecuta la busqueda

        //Actualiza los radicados creados como respuesta o radicados generados automaticamente dentro de otros radicados
        $isqlInternos = "update radicado
                            set
                                RADI_USU_ANTE='$loginOrigen'
                                ,radi_depe_ante= '$depeUsuaAnte'
                                ,RADI_DEPE_ACTU='$dependenciaSalida'
                                ,RADI_USUA_ACTU=1
                                ,CARP_CODI=$carp_codi
                                ,CARP_PER=$carp_per
                                ,RADI_LEIDO=0
                                ,radi_fech_agend=null
                                ,radi_agend=null
                                ,CODI_NIVEL=1
                                ,SGD_SPUB_CODIGO=0
                                ,radi_estado_pqrs=4
                        where radi_nume_deri in($radicadosIn)";
        $this->db->conn->Execute($isqlInternos); # Ejecuta la busqueda

        return $isql;
    }

    // Hecho por Fabian Mauricio Losada
    function nrr($radicados, $loginOrigen, $depOrigen, $codUsOrigen, $observa, $dependenciaSalida, $anulacion = false) {
        //$this->db->conn->debug=true;
        $whereNivel = "";
        $radicadosIn = join(",", $radicados);
        $carp_codi = substr($depOrigen, 0, 2);
        $carp_per = 0;
        $carp_codi = 0;

        $sqlUsuAnte = "SELECT depe_codi FROM USUARIO WHERE usua_login='$loginOrigen'";
        $rsUsuAnte = $this->db->query($sqlUsuAnte);
        $depeUsuaAnte = isset($rsUsuAnte->fields['DEPE_CODI']) ? $rsUsuAnte->fields['DEPE_CODI']:$rsUsuAnte->fields['depe_codi'];

        /** 
         * Se utiliza para identificar la carpeta de la que viene para asi mismo asignarlo en esa carpeta
         * cuando se manda a archivar o a no requiere respuesta
         */
        $num = count($radicados);     
        
        $i = 0;
        while ($i < $num) {
            $record_id = $radicados[$i];
            
            /** Si llega anulación en true, quiere decir que viene desde el módulo de anulación de lo contrario viene desde la transacción */
            if($anulacion){
                $isqlTRDA = "select  RADI_NUME_RADI from radicado where radi_nume_radi = '$record_id' or radi_nume_deri = '$record_id'";
            }else{
                $isqlTRDA = "select  RADI_NUME_RADI from radicado where radi_nume_radi = $record_id or radi_nume_deri = $record_id";
            }            
            $rsTRDA2 = $this->db->conn->Execute($isqlTRDA); //edd2
            
            while (!$rsTRDA2->EOF) {
                $record_id = $rsTRDA2->fields['RADI_NUME_RADI'];
                $radicadosSel[] = "'" . $record_id . "'";                
		          

    	    	/**
                 * By- Skinatech / 28/02/2020
    	    	 * Se extrae el ultimo digito del radicado para identificar el tipo de radicado que se esta recibiendo y
                 * asi en que carpeta queda se agrega validación para que en caso de que el tipo de radicado sea 2 guarde
                 * en la carpeta 0
                 **/
        	    $carp_codi = substr($record_id, -1, 1);
           	   	
        		if($carp_codi == 2){
        		   $carp_codi = 0;
        		}

                // SI la transacción es Vo.Bo se debe guardar en la carpeta de Vo.Bo
                if($codTx == 16){
                    $carp_codi = 11;
                }
        		
        		$updateRadiResig = "UPDATE radicado set carp_codi = $carp_codi where radi_nume_radi = '$record_id' or radi_nume_deri = '$record_id'";
        	   	$rdUpdateRadoResig = $this->db->conn->Execute($updateRadiResig);   
	            $rsTRDA2->MoveNext();
            }
	
	        next($radicados);
            $i++;
        }

        $explodeRadicados = explode(',', $radicadosIn);
        $radicadosAprocesar = array();

        for($i = 0; $i < count($explodeRadicados); $i++){
            if (substr($explodeRadicados[$i], -1) == "'") {
                $radicadosAprocesar[] = $explodeRadicados[$i];
            } else {
                $radicadosAprocesar[] = "'".$explodeRadicados[$i]."'";
            }
        }

        $unionRadicados = join(",", $radicadosAprocesar);

        $isql = "update radicado
					set
                      RADI_USU_ANTE='$loginOrigen'
                      ,radi_depe_ante= '$depeUsuaAnte'
					  ,RADI_DEPE_ACTU='$dependenciaSalida'
					  ,RADI_USUA_ACTU=1
					  ,CARP_CODI=$carp_codi
					  ,CARP_PER=$carp_per
					  ,RADI_LEIDO=0
					  ,radi_fech_agend=null
					  ,radi_agend=null
					  ,CODI_NIVEL=1
					  ,SGD_SPUB_CODIGO=0
					  ,RADI_NRR=1
        where RADI_NUME_RADI in ($unionRadicados)";
        $this->db->conn->Execute($isql); # Ejecuta la busqueda
        
        $radicados = str_replace("'", "", $radicados);
        $this->insertarHistorico($radicados, $depOrigen, $codUsOrigen, $dependenciaSalida, 1, $observa, 65);

        $isqlAgenda = "update sgd_agen_agendados set SGD_AGEN_ACTIVO=0 where RADI_NUME_RADI in($radicadosIn)";
        $this->db->conn->Execute($isqlAgenda); # Ejecuta la busqueda

        //Actualiza los radicados creados como respuesta o radicados generados automaticamente dentro de otros radicados
        $isqlInternos = "update radicado
                            set
                                RADI_USU_ANTE='$loginOrigen'
                                ,radi_depe_ante= '$depeUsuaAnte'
                                ,RADI_DEPE_ACTU='$dependenciaSalida'
                                ,RADI_USUA_ACTU=1
                                ,CARP_CODI=$carp_codi
                                ,CARP_PER=$carp_per
                                ,RADI_LEIDO=0
                                ,radi_fech_agend=null
                                ,radi_agend=null
                                ,CODI_NIVEL=1
                                ,SGD_SPUB_CODIGO=0
                                ,RADI_NRR=1
                        where radi_nume_deri in($unionRadicados)";
        $this->db->conn->Execute($isqlInternos); # Ejecuta la busqueda

        return $isql;
    }

    //creada by skina
    function trdm($radicados, $loginOrigen, $depOrigen, $codUsOrigen, $observa) {
        $whereNivel = "";
        $radicadosIn = join(",", $radicados);
        // $this->db->conn->debug=true;
        $this->insertarHistorico($radicados, $depOrigen, $codUsOrigen, $depOrigen, $codUsOrigen, $observa, 61);
        return $isql;
    }

    function expm($radicados, $loginOrigen, $depOrigen, $codUsOrigen, $observa, $numExpHidden) {

        $whereNivel = "";
        $radicadosIn = join(",", $radicados);
        // Modificado por SkinaTech, se agrego la query y la variable $rad1 para q me tome el primer valor del arreglo.
        $rad1 = $radicados[0];
        //$this->db->conn->debug=true;
        $esql = "SELECT SGD_EXP_NUMERO, SGD_EXP_ESTADO FROM SGD_EXP_EXPEDIENTE WHERE RADI_NUME_RADI=$rad1";
        $rs = $this->db->query($esql);
        
        $esqlUsuario = "SELECT usua_doc FROM usuario WHERE usua_login='$loginOrigen'";
        $rsUsuario = $this->db->query($esqlUsuario);
        $usDoc = $rsUsuario->fields["USUA_DOC"];
        
        // Si el radicado ya existe en la tabla del expediente pero se encuentra en estado 2, se
        // debe actualizar el estado a 1, para que quede incluido en el expediente nuevamente
        if($rs->fields["SGD_EXP_NUMERO"] != ''){
            $expmult = $rs->fields["SGD_EXP_NUMERO"];

            if($rs->fields["SGD_EXP_ESTADO"] == 2){

                foreach ($radicados as $noRadicado) {
                    /* Inserta en el expediente antes de craear el historico */
                    $queryInserta = "update SGD_EXP_EXPEDIENTE set SGD_EXP_ESTADO =0 where SGD_EXP_NUMERO='$expmult'";
                    $rsInserta = $this->db->query($queryInserta);
                }
            }

        }
        // SI el radicado no existe en la tabla del expediente, se procede a insertar.
        else{
            $expmult = $numExpHidden;

            // Información del expediente (detalle)
            $esqlTrd = "SELECT sgd_srd_codigo,sgd_sbrd_codigo FROM sgd_sexp_secexpedientes WHERE  SGD_EXP_NUMERO='$expmult'";
            $rsTrd = $this->db->query($esqlTrd);

            $codiSrExp = $rsTrd->fields["SGD_SRD_CODIGO"];
            $codiSrbrExp = $rsTrd->fields["SGD_SBRD_CODIGO"];
            $observaTrd = 'Asignaci&oacute;n de TRD ';

            foreach ($radicados as $noRadicado) {
                /* Inserta en el expediente antes de craear el historico */
                $queryInserta = "insert into SGD_EXP_EXPEDIENTE(SGD_EXP_NUMERO, RADI_NUME_RADI,SGD_EXP_FECH,DEPE_CODI, USUA_CODI,USUA_DOC, SGD_EXP_ESTADO )
                    VALUES ('$expmult', "
                        . "$noRadicado,"
                        . "" . $this->db->conn->OffsetDate(0, $this->db->sysTimeStamp) . ","
                        . "'$depOrigen' ,"
                        . "'$codUsOrigen' ,"
                        . "'$usDoc',"
                        . "'0'"
                        . ")";
                $rsInserta = $this->db->query($queryInserta);
                $this->trdRadicado($noRadicado, $codiSrExp, $codiSrbrExp, $depOrigen, $codUsOrigen, $usDoc);
                $this->insertarHistorico($noRadicado, $depOrigen, $codUsOrigen, $depOrigen, $codUsOrigen, $observaTrd, 32);
            }
        }   
                      
        $this->insertarHistoricoExp($expmult, $radicados, $depOrigen, $codUsOrigen, $observa, 62, 0);
        
        return $isql;
    }

    /**
     * Nueva Funcion para agendar.
     * Este metodo permite programar un radicado para una fecha especifica, el arreglo con la version anterior
     * , es que no se borra el agendado cuando el radicado sale del usuario actual.
     *
     * @author JAIRO LOSADA JUNIO 2006
     * @version 3.5.1
     *
     * @param array int $radicados
     * @param varchar $loginOrigen
     * @param numeric $depOrigen
     * @param numeric $codUsOrigen
     * @param varchar $observa
     * @param date $fechaAgend
     * @return boolean
     */
    function agendar($radicados, $loginOrigen, $depOrigen, $codUsOrigen, $observa, $fechaAgend) {
        $whereNivel = "";
        $radicadosIn = join(",", $radicados);
        $carp_codi = substr($depOrigen, 0, 2);
        $carp_per = 1;
        $sqlFechaAgenda = $this->db->conn->DBDate($fechaAgend);
        //	$this->db->conn->debug=true;
        $this->datosUs($codUsOrigen, $depOrigen);
        $usuaDocAgen = $this->usuaDocB;
        foreach ($radicados as $noRadicado) {
            # Busca el usuairo Origen para luego traer sus datos.
            $rad = array();
            $observa = "Agendado para el $fechaAgend - " . $observa;
            if ($usuaDocAgen) {
                $record["RADI_NUME_RADI"] = $noRadicado;
                $record["DEPE_CODI"] = "'" . $depOrigen . "'";
                $record["SGD_AGEN_OBSERVACION"] = "'$observa '";
                $record["USUA_DOC"] = "'$usuaDocAgen'";
                $record["SGD_AGEN_FECH"] = $this->db->conn->OffsetDate(0, $this->db->conn->sysTimeStamp);
                $record["SGD_AGEN_FECHPLAZO"] = $sqlFechaAgenda;
                $record["SGD_AGEN_ACTIVO"] = 1;
                $insertSQL = $this->db->insert("SGD_AGEN_AGENDADOS", $record, "true");
                $radicados = str_replace("'", "", $radicados);
                $this->insertarHistorico($radicados, $depOrigen, $codUsOrigen, $depOrigen, $codUsOrigen, $observa, 14);
            }
        }
        //$this->conn->Execute($isql);
        return $isql;
    }

    /**
     * Metodo que sirve para sacar uno o varios radicados de agendado
     *
     * @param array $radicados
     * @param unknown_type $loginOrigen
     * @param unknown_type $depOrigen
     * @param unknown_type $codUsOrigen
     * @param unknown_type $observa
     * @return unknown
     */
    function noAgendar($radicados, $loginOrigen, $depOrigen, $codUsOrigen, $observa) {
        $this->datosUs($codUsOrigen, $depOrigen);
        $usuaDocAgen = $this->usuaDocB;
        $whereNivel = "";
        $radicadosIn = join(",", $radicados);
        $carp_codi = substr($depOrigen, 0, 2);
        $isql = "update sgd_agen_agendados set SGD_AGEN_ACTIVO=0 where RADI_NUME_RADI in($radicadosIn) AND USUA_DOC='$usuaDocAgen'";
        //$this->conn->Execute($isql);
        $this->db->conn->Execute($isql); # Ejecuta la busqueda
        $radicados = str_replace("'", "", $radicados);
        $this->insertarHistorico($radicados, $depOrigen, $codUsOrigen, $depOrigen, $codUsOrigen, $observa, 15);
        return $isql;
    }

    function devolver($radicados, $loginOrigen, $depOrigen, $codUsOrigen, $tomarNivel, $observa) {
        $whereNivel = "";
        $retorno = "";

        $sqlUsuAnte = "SELECT depe_codi FROM USUARIO WHERE usua_login='$loginOrigen'";
        $rsUsuAnte = $this->db->query($sqlUsuAnte);
        $depeUsuaAnte = isset($rsUsuAnte->fields['DEPE_CODI']) ? $rsUsuAnte->fields['DEPE_CODI']:$rsUsuAnte->fields['depe_codi'];


        //$this->db->conn->debug=true;
        $this->db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
        foreach ($radicados as $noRadicado) {
            $sql = "SELECT
					b.USUA_DOC
					,b.USUA_LOGIN
					,b.CODI_NIVEL
					,b.DEPE_CODI
					,b.USUA_CODI
					,b.USUA_NOMB
					,b.USUA_DOC
				FROM
					RADICADO a, USUARIO b
				WHERE
					a.RADI_USU_ANTE=b.USUA_LOGIN
					AND a.RADI_NUME_RADI = $noRadicado";
            # Busca el usuairo Origen para luego traer sus datos.
            $rs = $this->db->conn->Execute($sql); # Ejecuta la busqueda
            if ($rs->fields['DEPE_CODI'] == '') {
                $sqlradica = "SELECT
			  b.USUA_DOC
			  ,b.USUA_LOGIN
			  ,b.CODI_NIVEL
			  ,b.DEPE_CODI 
			  ,b.USUA_CODI
			  ,b.USUA_NOMB
			  ,b.USUA_DOC
	  FROM
			RADICADO a, USUARIO b
	  WHERE
			  a.RADI_DEPE_RADI=b.DEPE_CODI AND a.RADI_USUA_RADI=b.USUA_CODI
			  AND a.RADI_NUME_RADI = $noRadicado";
 
                # Busca el usuairo Origen para luego traer sus datos.
                $rsradica = $this->db->conn->Execute($sqlradica); # Ejecuta la busqueda
                $usNivel = $rsradica->fields['CODI_NIVEL'];
                $depDestino = $rsradica->fields['DEPE_CODI'];
                $codUsDestino = $rsradica->fields['USUA_CODI'];
                $nombDestino = $rsradica->fields['USUA_NOMB'];
                $docUsuaDest = $rsradica->fields['USUA_DOC'];
            } else {
                $usNivel = $rs->fields['CODI_NIVEL'];
                $depDestino = $rs->fields['DEPE_CODI'];
                $codUsDestino = $rs->fields['USUA_CODI'];
                $nombDestino = $rs->fields['USUA_NOMB'];
                $docUsuaDest = $rs->fields['USUA_DOC'];
            }
            $rad = array();
            if ($codUsDestino) {
                if ($tomarNivel == "si") {
                    $whereNivel = ",CODI_NIVEL=$usNivel";
                }
                $radicadosIn = join(",", $radicados);
                $proccarp = "Dev. ";
                $carp_codi = 12;
                $carp_per = 0;
                $isql = "update radicado
						set
                          RADI_USU_ANTE='$loginOrigen'
                          ,radi_depe_ante= '$depeUsuaAnte'
						  ,RADI_DEPE_ACTU='$depDestino'
						  ,RADI_USUA_ACTU=$codUsDestino
						  ,CARP_CODI=$carp_codi
						  ,CARP_PER=$carp_per
						  ,RADI_LEIDO=0
						  , radi_fech_agend=null
						  ,radi_agend=null
						  $whereNivel
					 where radi_depe_actu='$depOrigen'
						   AND radi_usua_actu=$codUsOrigen
						   AND RADI_NUME_RADI = $noRadicado";
                $this->db->conn->Execute($isql); # Ejecuta la busqueda
                $rad[] = $noRadicado;
                $rad = str_replace("'", "", $rad);
                $this->insertarHistorico($rad, $depOrigen, $codUsOrigen, $depDestino, $codUsDestino, $observa, 12);
                array_splice($rad, 0);
                $retorno = $nombDestino; //modificado  skina 27/01/2012  para notificaciones devueltos
                //$retorno=$retorno."$noRadicado ------> $nombDestino <br>";
                // MODIFICADO PARA GENERAR ALERTAS
                //JUNIO DE 2009
                // $this->registrarNovedad('NOV_DEV', $docUsuaDest, $noRadicado, $dir_raiz);
                //////////////////////////////////
            } else {
                $retorno = $retorno . "<font color=red>$noRadicado ------> Usuario Anterior no se encuentra o esta inactivo</font><br>";
            }
        }
        return $retorno;
    }

    // aplica trd al radcado
    public function trdRadicado($radicado, $serie, $subserie, $dependencia, $usuaCodi, $usuaDoc){
        /* La información del tipo documental que se le aplico al radicado */
        $sql_radicado = "SELECT tdoc_codi FROM radicado WHERE RADI_NUME_RADI=$radicado";
        $rs_radicado = $this->db->conn->query($sql_radicado);

        $tdoc = isset($rs_radicado->fields["TDOC_CODI"])?$rs_radicado->fields["TDOC_CODI"]:$rs_radicado->fields["tdoc_codi"];

        /* Se busca que el radicado exista o no en la tabla que relaciona radicado con Trd */
        $sql_rdf = "SELECT RADI_NUME_RADI FROM SGD_RDF_RETDOCF WHERE RADI_NUME_RADI=$radicado AND DEPE_CODI='$dependencia'";
        $rs_rdf = $this->db->conn->query($sql_rdf);
        $radiNumero = isset($rs_rdf->fields["RADI_NUME_RADI"])?$rs_rdf->fields["RADI_NUME_RADI"]:$rs_rdf->fields["radi_nume_radi"];

        /* Se busca en la matriz de relación si existe la combinación de serie, subserie, tipo documental de radicado */
        $isqlTRD = "select SGD_MRD_CODIGO "
            . " from SGD_MRD_MATRIRD "
            . " where DEPE_CODI = '$dependencia' "
            . " and SGD_SRD_CODIGO = '$serie' "
            . " and SGD_SBRD_CODIGO = '$subserie' "
            . " and SGD_TPR_CODIGO = '$tdoc'";
        $rs_mrd = $this->db->conn->query($isqlTRD);

        if ($rs_mrd->fields["SGD_MRD_CODIGO"] != '') {
            $mrdCodigo = $rs_mrd->fields["SGD_MRD_CODIGO"];
        } else {
            $conteoTRd = "select max(SGD_MRD_CODIGO) as maximo from SGD_MRD_MATRIRD";
            $rsconteoTRd = $this->db->conn->Execute($conteoTRd);
            $idMrd = $rsconteoTRd->fields['MAXIMO'] + 1;
            /***
             * Inserta en la tabla de retención documental la combinación de serie/subserie/tipo documental
             * en caso que el tipo documental asignado al radicado no se encuentre la TRD
             ***/
            $inserTRD = "insert into SGD_MRD_MATRIRD values ($idMrd,'$dependencia',$serie,$subserie,$tdoc,'Electronico','" . date('Y-m-d') . "','2050-12-31','1')";
            $rsInsertTRD = $this->db->conn->Execute($inserTRD);

            if ($rsInsertTRD) {
                $mrdCodigo = $idMrd;
            }
        }

        $nombreSerie = "select sgd_srd_descrip from sgd_srd_seriesrd where sgd_srd_codigo=$serie";
        $rsNombreSerie = $this->db->conn->Execute($nombreSerie);
        $nomSerie = $rsNombreSerie->fields['SGD_SRD_DESCRIP'];

        $nombreSubSerie = "select sgd_sbrd_descrip from sgd_sbrd_subserierd where sgd_sbrd_codigo=$serie and sgd_srd_codigo=$subserie";
        $rsNombreSubSerie = $this->db->conn->Execute($nombreSubSerie);
        $nomSubSerie = $rsNombreSubSerie->fields['SGD_SBRD_DESCRIP'];

        $nombreTipoDoc = "select sgd_tpr_descrip from sgd_tpr_tpdcumento where sgd_tpr_codigo=$tdoc";
        $rsNombreTipoDoc = $this->db->conn->Execute($nombreTipoDoc);
        $nomTipoDoc = $rsNombreTipoDoc->fields['SGD_TPR_DESCRIP'];

        // Se valida si al radicado se le debe asignar o actualizar la TRD
        if ($radiNumero == '') {
            $insert_rdf = "insert into sgd_rdf_retdocf values ($mrdCodigo,$radicado,'$dependencia',$usuaCodi,'$usuaDoc','" . date('Y-m-d') . "')";
            $rsinsert_rdf = $this->db->conn->Execute($insert_rdf);

            /** 
             * Se agrega la transacción y la observación que aplica para cuando se cambia la trd de un radicado desde la inclusión del radicado en el expediente
             **/
            $sgd_ttr_codigo = 32;
            $hist_obse = "Asignación de TRD";

        } else {
            $update_rdf = "update sgd_rdf_retdocf set sgd_mrd_codigo='$mrdCodigo' where radi_nume_radi=$radicado";
            $rsupdate_rdf = $this->db->conn->Execute($update_rdf);

            /** 
             * Se agrega la transacción y la observación que aplica para cuando se cambia la trd de un radicado desde la inclusión del radicado en el expediente
             **/
            $sgd_ttr_codigo = 32;
            $hist_obse = "*Modificado TRD* " . $nomSerie . "/" . $nomSubSerie . "/" . $nomTipoDoc;
        }
        

        if ($rsinsert_rdf or $rsupdate_rdf) {

            /** 
             * Se inserta en el historico del radicado la inserción de la TRD con base a la del expediente
             **/
            $insertHistorico = "insert into HIST_EVENTOS(RADI_NUME_RADI, DEPE_CODI, USUA_CODI, USUA_CODI_DEST, DEPE_CODI_DEST, USUA_DOC, HIST_DOC_DEST, HIST_FECH, SGD_TTR_CODIGO, HIST_OBSE)";
            $insertHistorico .= "values($radicado,'$dependencia',$usuaCodi, '$dependencia', $usuaCodi, $usuaDoc, $usuaDoc, ".$this->db->conn->OffsetDate(0, $this->db->conn->sysTimeStamp).", $sgd_ttr_codigo, '$hist_obse')";
            $rsInsertarHistorico = $this->db->conn->Execute($insertHistorico);
            
            $anexosRadicado = "select * from anexos where anex_radi_nume=$radicado";
            $rsanexos = $this->db->conn->Execute($anexosRadicado);
            while (!$rsanexos->EOF) {
                $anexCodi = $rsanexos->fields['ANEX_CODIGO'];
                $updateAnexo = "update anexos set sgd_srd_codigo='$serie', sgd_sbrd_codigo='$subserie' where anex_codigo='$anexCodi'";
                $this->db->conn->Execute($updateAnexo);
                $rsanexos->MoveNext();
            }

        }
    }

}

?>
