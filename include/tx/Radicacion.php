<?php

class Radicacion{
    /**
     *  VARIABLES DE DATOS PARA LOS RADICADOS
     */
    public $db;
    public $tipRad;
    public $radiTipoDeri;
    public $radiCuentai;
    public $eespCodi;
    public $mrecCodi;
    public $radiFechOfic;
    public $radiNumeDeri;
    public $tdidCodi;
    public $descAnex;
    public $radiNumeHoja;
    public $radiPais;
    public $raAsun;
    public $radiDepeRadi;
    public $radiUsuaActu;
    public $radiDepeActu;
    public $carpCodi;
    public $radiNumeRadi;
    public $trteCodi;
    public $radiNumeIden;
    public $radiFechRadi;
    public $sgd_apli_codi;
    public $tdocCodi;
    public $estaCodi;
    public $radiPath;
    public $nguia;
    public $tsopt;
    public $urgnt;
    public $dptcn;

    /**
     *  VARIABLES DEL USUARIO ACTUAL
     */
    public $dependencia;
    public $usuaDoc;
    public $usuaLogin;
    public $usuaCodi;
    public $codiNivel;
    public $noDigitosRad;
    public $estructuraRad;
    public $tipoUsuarioGrupo;
    //   var $radicadoReferenciaCliente;

    /**
     * Skinatech
     * Autor: Jenny Gamez
     * Fecha: 03-11-2019
     * Info: Estas variables guarda la información relacionada a si autoriza o no el envio de notificaciones
     *       por correo electronico y si el documento o radicado es publico
     **/
    public $radiEnvioCorreo;
    public $radiDocuPublico;
    public $fechVcmto; // Fecha de vencimiento del radicado
    public $radi_estado_pqrs;
    public $sgd_spub_codigo;

    public $tipoServicioPqrs;
    public $tipoGrupoInteres;

    /** Variables para el proceso de saber que secuencia se debe aplicar para el tipo de radicado de pqrs**/
    public $tipoRadicadoPqrs;
    public $secuenciaPqrs;
    // public $motivo_pqrs;
    // public $atributo_pqrs;
    // public $fecha_apertura_buzon;
    // public $fecha_queja;

    public function Radicacion($db){
        /**
         * Constructor de la clase Historico
         * @db variable en la cual se recibe el cursor sobre el cual se esta trabajando.
         */
        global $HTTP_SERVER_VARS, $PHP_SELF, $HTTP_SESSION_VARS, $HTTP_GET_VARS, $krd;
        $this->db = $db;
        $this->noDigitosRad = 6;
        $curr_page = $id . '_curr_page';
        $this->dependencia = $_SESSION['dependencia'];
        $this->usuaDoc = $_SESSION['usua_doc'];
        $this->estructuraRad = $_SESSION['estructuraRad'];
        $this->usuaLogin = $krd;
        $this->usuaCodi = $_SESSION['codusuario'];
        $this->tipoRadicadoPqrs = $_SESSION["tipoRadicadoPqr"];
        $this->secuenciaPqrs = $_SESSION["secRadicaFormularioWeb"];
        isset($_GET['nivelus']) ? $this->codiNivel = $_GET['nivelus'] : $this->codiNivel = $_SESSION['nivelus'];
    }

    public function newRadicado($tpRad, $tpDepeRad, $driver, $numero){
        /** 
         * Busca el Nivel de Base de datos. 
         * Busca el usuairo Origen para luego traer sus datos.
         **/
        $whereNivel = "";
        $sql = "SELECT CODI_NIVEL FROM USUARIO WHERE USUA_CODI = " . $this->radiUsuaActu . " AND DEPE_CODI=" . $this->radiDepeActu . "";
        $rs = $this->db->conn->query($sql);
        $usNivel = $rs->fields["CODI_NIVEL"];

        // Si existe el tipo de radicado de PQRS se valida que sea igual al que se esta generando desde el 
        // formulario para asi sacar la secuencia que se afecta.
        if(isset($this->tipoRadicadoPqrs) && $tpRad == $this->tipoRadicadoPqrs){
            $SecName = $this->secuenciaPqrs;
        }else{
            $SecName = "SECR_TP$tpRad" . "_" . $tpDepeRad;
        }
        
        $numero == '' ? $secNew = $this->db->conn->nextId($SecName, $driver) : '';

        if ($secNew == 0 && $numero == '') {
            $this->db->conn->RollbackTrans();
            $secNew = $this->db->conn->nextId($SecName, $driver);
            if ($secNew == 0) {
                die("<hr><b><font color=red><center>Error no genero un Numero de Secuencia<br>SQL: $secNew</center></font></b><hr>");
            }
        }
        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";
        if (strlen($this->dependencia) < $longitud_codigo_dependencia) {
            $this->dependencia = str_pad($this->dependencia, $longitud_codigo_dependencia, '0', STR_PAD_LEFT);
        }

        // By skina - 14/08/2018
        // Para la construcción del número de radicado, esto indica la parte inicial del radicado.
        if ($this->estructuraRad == 'ymd') {
            $valano = date("Ymd");
        } elseif ($this->estructuraRad == 'ym') {
            $valano = date("Ym");
        } else {
            $valano = date("Y");
        }

        if ($numero == '') {
            $newRadicado = $valano . $this->dependencia . str_pad($secNew, $this->noDigitosRad, "0", STR_PAD_LEFT) . $tpRad;
        } else {
            $newRadicado = $numero;
        }

        if (!$this->radiTipoDeri) {
            $recordR["radi_tipo_deri"] = "0";
        } else {
            $recordR["radi_tipo_deri"] = $this->radiTipoDeri;
        }
        if (!$this->carpCodi) {
            $this->carpCodi = 0;
        }

        if (!$this->radiNumeDeri) {
            $this->radiNumeDeri = 0;
        }

        $recordR["RADI_CUENTAI"] = $this->radiCuentai;
        $recordR["EESP_CODI"] = $this->eespCodi ? $this->eespCodi : 0;
        $recordR["MREC_CODI"] = $this->mrecCodi;
        // Modificado SGD 06-Septiembre-2007
        switch ($GLOBALS['driver']) {
            case 'postgres':
                $recordR["radi_fech_ofic"] = $this->db->conn->DBDate($this->radiFechOfic);
                break;
            default:
                $recordR["radi_fech_ofic"] = $this->db->conn->DBDate($this->radiFechOfic);
        }
        $recordR["RADI_NUME_DERI"] = $this->db->conn->qstr($this->radiNumeDeri);
        $recordR["RADI_USUA_RADI"] = $this->usuaCodi;
        $recordR["RADI_PAIS"] = "'" . $this->radiPais . "'";

        $recordR["RA_ASUN"] = $this->db->conn->qstr($this->raAsun);
        $recordR["radi_desc_anex"] = $this->db->conn->qstr($this->descAnex);
        $recordR["RADI_DEPE_RADI"] = $this->radiDepeRadi;
        $recordR["RADI_USUA_ACTU"] = $this->radiUsuaActu;
        $recordR["carp_codi"] = $this->carpCodi;
        $recordR["CARP_PER"] = 0;
        $recordR["RADI_NUME_RADI"] = $this->db->conn->qstr($newRadicado);
        $recordR["TRTE_CODI"] = $this->trteCodi;
        $recordR["RADI_FECH_RADI"] = $numero == '' ? $this->db->conn->OffsetDate(0, $this->db->conn->sysTimeStamp) : "'" . $this->radiFechOfic . "'";
        $recordR["RADI_DEPE_ACTU"] = $this->radiDepeActu;
        $recordR["TDOC_CODI"] = $this->tdocCodi;
        $recordR["TDID_CODI"] = $this->tdidCodi;
        if ($usNivel == '') { $usNivel = 1; }
        $recordR["CODI_NIVEL"] = $usNivel;
        $recordR["SGD_APLI_CODI"] = $this->sgd_apli_codi;
        $recordR["RADI_PATH"] = "$this->radiPath";
        $recordR["TIPO_USARIO_INTERES"] = $this->tipoUsuarioGrupo;
        /**
         * Skinatech
         * Autor: Jenny Gamez
         * Fecha: 03-11-2019
         * Info: Estas variables guarda la información relacionada a si autoriza o no el envio de notificaciones por correo electronico y si el documento o radicado es publico
         **/
        $recordR["FECH_VCMTO"] = $this->fechVcmto;
        $recordR["RADI_ENVIO_CORREO"] = $this->radiEnvioCorreo;
        $recordR["RADI_DOCU_PUBLICO"] = $this->radiDocuPublico;
        $recordR["RADI_ESTADO_PQRS"] = $this->radi_estado_pqrs;
        //$recordR["RADICADO_REFERENCIA_CLIENTE"] = "$this->radicadoReferenciaCliente";
        $recordR["SGD_SPUB_CODIGO"] = $this->sgd_spub_codigo;

        /** Información nueva para cuando se solicite servicios, y grupos de interes **/
        $recordR["GRUPO_INTERES"] = $this->tipoGrupoInteres;
        $recordR["SERVICIO_PQR"] = $this->tipoServicioPqrs;
        $recordR["RADI_NUME_HOJA"] = $this->radiNumeHoja;
        // $recordR["MOTIVO_PQRS"] = $this->motivo_pqrs;
        // $recordR["ATRIBUTO_PQRS"] = $this->atributo_pqrs;
        // $recordR["FECHA_APERTURA_BUZON"] = $this->fecha_apertura_buzon;
        // $recordR["FECHA_QUEJA"] = $this->fecha_queja;

        $edd = strlen($newRadicado); //edd  skina para  CIAC
        if ($edd < 14 || $edd > 20) {
            die("se genero un numero de radicado  de $edd Numeros ");
        }

        $whereNivel = "";
        $insertSQL = $this->db->insert("RADICADO", $recordR, "true");
        $insertSQL = $this->db->conn->Replace("RADICADO", $recordR, "RADI_NUME_RADI", false);
        if (!$insertSQL) {
            echo "<hr><b><font color=red>Error no se inserto sobre radicado al insertar<br>SQL: " . $this->db->querySql . "</font></b><hr>";
        }
        //$this->db->conn->CommitTrans();
        return $newRadicado;
    }

    public function updateRadicado($radicado, $radPathUpdate = null){
        $recordR["radi_cuentai"] = $this->radiCuentai;
        $recordR["eesp_codi"] = $this->eespCodi;
        $recordR["mrec_codi"] = $this->mrecCodi;
        $recordR["radi_fech_ofic"] = $this->db->conn->DBDate($this->radiFechOfic);
        $recordR["radi_pais"] = "'" . $this->radiPais . "'";

        $recordR["RA_ASUN"] = $this->db->conn->qstr($this->raAsun);
        $recordR["radi_desc_anex"] = $this->db->conn->qstr($this->descAnex);
        $recordR["trte_codi"] = $this->trteCodi;
        $recordR["tdid_codi"] = $this->tdidCodi;
        $recordR["radi_nume_radi"] = $this->db->conn->qstr($radicado);
        $recordR["SGD_APLI_CODI"] = $this->sgd_apli_codi;
        $recordR["radi_depe_actu"] = $this->db->conn->qstr($this->radiDepeActu);
        $recordR["RADI_USUA_ACTU"] = $this->radiUsuaActu;
        $recordR["TDOC_CODI"] = $this->tdocCodi;
        $recordR["TIPO_USARIO_INTERES"] = $this->tipoUsuarioGrupo;
        /**
         * Skinatech
         * Autor: Jenny Gamez
         * Fecha: 03-11-2019
         * Info: Estas variables guarda la información relacionada a si autoriza o no el envio de notificaciones
         *       por correo electronico y si el documento o radicado es publico
         **/
        $recordR["FECH_VCMTO"] = $this->fechVcmto;
        $recordR["RADI_ENVIO_CORREO"] = $this->radiEnvioCorreo;
        $recordR["RADI_DOCU_PUBLICO"] = $this->radiDocuPublico;
        $recordR["RADI_ESTADO_PQRS"] = $this->radi_estado_pqrs;
        //$recordR["RADICADO_REFERENCIA_CLIENTE"] = "$this->radicadoReferenciaCliente"; 
        $recordR["SGD_SPUB_CODIGO"] = $this->sgd_spub_codigo;

        /** Información nueva para cuando se solicite servicios, y grupos de interes **/
        $recordR["GRUPO_INTERES"] = $this->tipoGrupoInteres;
        $recordR["SERVICIO_PQR"] = $this->tipoServicioPqrs;
        $recordR["RADI_NUME_HOJA"] = $this->radiNumeHoja;
        // $recordR["MOTIVO_PQRS"] = $this->motivo_pqrs;
        // $recordR["ATRIBUTO_PQRS"] = $this->atributo_pqrs;
        // $recordR["FECHA_APERTURA_BUZON"] = $this->fecha_apertura_buzon;
        // $recordR["FECHA_QUEJA"] = $this->fecha_queja;

        // Linea para realizar radicacion Web de archivos pdf
        if (!empty($radPathUpdate) && $radPathUpdate != "") {
            $archivoPath = explode(".", $radPathUpdate);
            $extension = array_pop($archivoPath);
            if ($extension == "pdf") {
                $recordR["radi_path"] = "'" . $radPathUpdate . "'";
            }
        }
        $insertSQL = $this->db->conn->Replace("RADICADO", $recordR, "radi_nume_radi", false);
        return $insertSQL;
    }

    /** 
     * Busca los datos de un radicado.
     * @param $radicado int Contiene el numero de radicado a Buscar
     * @return Arreglo con los datos del radicado
     **/
    public function getDatosRad($radicado) {
        $query = 'SELECT RAD.RADI_FECH_RADI, RAD.RADI_PATH, TPR.SGD_TPR_DESCRIP,';
        $query .= ' RAD.RA_ASUN';
        $query .= ' FROM RADICADO RAD';
        $query .= ' LEFT JOIN SGD_TPR_TPDCUMENTO TPR ON TPR.SGD_TPR_CODIGO = RAD.TDOC_CODI';
        $query .= ' WHERE RAD.RADI_NUME_RADI = \'' . $radicado . "'";

        $rs = $this->db->conn->query($query);

        $arrDatosRad['fechaRadicacion'] = $rs->fields['RADI_FECH_RADI'];
        $arrDatosRad['ruta'] = $rs->fields['radi_path'];
        $arrDatosRad['tipoDocumento'] = $rs->fields['SGD_TPR_DESCRIP'];
        $arrDatosRad['asunto'] = $rs->fields['RA_ASUN'];

        return $arrDatosRad;
    }

    public function newPreradicado($tpRad, $tpDepeRad, $driver){
        /** FUNCION QUE INSERTA UN RADICADO NUEVO * */
        $whereNivel = "";
        $sql = "SELECT CODI_NIVEL FROM USUARIO WHERE USUA_CODI = " . $this->radiUsuaActu . " AND DEPE_CODI=" . $this->radiDepeActu . "";
        $rs = $this->db->conn->query($sql); # Ejecuta la busqueda
        $usNivel = $rs->fields["CODI_NIVEL"];
        $SecName = "SECR_TP$tpRad" . "_" . $tpDepeRad;
        $secNew = $this->db->conn->nextId($SecName, $driver);

        if ($secNew == 0) {
            $this->db->conn->RollbackTrans();
            $secNew = $this->db->conn->nextId($SecName, $driver);
            if ($secNew == 0) {
                die("<hr><b><font color=red><center>Error no genero un Numero de Secuencia<br>SQL: $secNew</center></font></b><hr>");
            }
        }

        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";
        if (strlen($this->dependencia) < $longitud_codigo_dependencia) {
            $this->dependencia = str_pad($this->dependencia, $longitud_codigo_dependencia, '0', STR_PAD_LEFT);
        }

        // By skina - 14/08/2018
        // Para la construcción del número de radicado, esto indica la parte inicial del radicado.
        if ($this->estructuraRad == 'ymd') {
            $valano = date("Ymd");
        } elseif ($this->estructuraRad == 'ym') {
            $valano = date("Ym");
        } else {
            $valano = date("Y");
        }

        $newRadicado = $valano . $this->dependencia . str_pad($secNew, $this->noDigitosRad, "0", STR_PAD_LEFT) . $tpRad;

        return $newRadicado;
    }

    // aplica trd al radcado
    public function trdRadicado($radicado, $serie, $subserie, $dependencia, $usuaCodi, $usuaDoc){
        /* La información del tipo documental que se le aplico al radicado */
        $sql_radicado = "SELECT tdoc_codi FROM radicado WHERE RADI_NUME_RADI='$radicado'";
        $rs_radicado = $this->db->conn->query($sql_radicado);
        $tdoc = isset($rs_radicado->fields["TDOC_CODI"])?$rs_radicado->fields["TDOC_CODI"]:$rs_radicado->fields["tdoc_codi"];

        /* Se busca que el radicado exista o no en la tabla que relaciona radicado con Trd */
        $sql_rdf = "SELECT RADI_NUME_RADI FROM SGD_RDF_RETDOCF WHERE RADI_NUME_RADI='$radicado' AND DEPE_CODI='$dependencia'";
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
            $insert_rdf = "insert into sgd_rdf_retdocf values ($mrdCodigo,'$radicado','$dependencia',$usuaCodi,'$usuaDoc','" . date('Y-m-d') . "')";
            $rsinsert_rdf = $this->db->conn->Execute($insert_rdf);

            /** 
             * Se agrega la transacción y la observación que aplica para cuando se cambia la trd de un radicado desde la inclusión del radicado en el expediente
             **/
            $sgd_ttr_codigo = 32;
            $hist_obse = "Asignación de TRD";

        } else {
            $update_rdf = "update sgd_rdf_retdocf set sgd_mrd_codigo='$mrdCodigo' where radi_nume_radi='$radicado'";
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
            $insertHistorico .= "values('$radicado','$dependencia',$usuaCodi, '$dependencia', $usuaCodi, $usuaDoc, $usuaDoc, ".$this->db->conn->OffsetDate(0, $this->db->conn->sysTimeStamp).", $sgd_ttr_codigo, '$hist_obse')";
            $rsInsertarHistorico = $this->db->conn->Execute($insertHistorico);
            
            $anexosRadicado = "select * from anexos where anex_radi_nume='$radicado'";
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

// Fin de Class Radicacion
