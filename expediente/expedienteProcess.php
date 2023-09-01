<?php

session_start();
$dir_raiz = $_SESSION['dir_raiz'];
require_once("../include/db/ConnectionHandler.php");
require_once("../include/PHPMailer5.2/PHPMailerAutoload.php");
include "../config.php";
require_once("../class_control/Transaccion.php");
require_once("../class_control/Dependencia.php");
require_once("../class_control/usuario.php");
include_once "../class_control/anexo.php";
include_once "../class_control/TipoDocumento.php";              
                                    
$dbProcess = new ConnectionHandler("$dir_raiz");
$trans = new Transaccion($dbProcess);
$objDep = new Dependencia($dbProcess);
$objUs = new Usuario($dbProcess);
$a = new Anexo($dbProcess);
$tp_doc = new TipoDocumento($dbProcess);

$dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$dbProcess->conn->debug = false;
$usuaDoc = $_SESSION["usua_doc"];
$codDepe = $_SESSION["dependencia"];

include_once("../include/PHPMailer/class.phpmailer.php");

//Instancia de mail para realizar las notificaciones a los usuarios
$mail = new PHPMailer();

//Incluido el archivo que tiene la clase historico
include("../include/tx/Historico.php");
include("../include/tx/Expediente.php");
$historiRecord = new Historico($dbProcess);
$expediente    = new Expediente($dbProcess);

// //Type 2 = Consulta las subseries asociadas a la serie
if (isset($_POST['type']) && $_POST['type'] == 2) {

    $codserie = $_POST['codserie'];
    $dependencia = $_SESSION['dependencia'];

    $querySub = "select distinct(sb.sgd_sbrd_descrip), sb.sgd_sbrd_codigo from sgd_sbrd_subserierd sb inner join sgd_mrd_matrird mr ON mr.sgd_sbrd_codigo=sb.sgd_sbrd_codigo and mr.sgd_srd_codigo=sb.sgd_srd_codigo where mr.sgd_srd_codigo = $codserie and mr.depe_codi ='$dependencia' ";
    $rsSub = $dbProcess->conn->query($querySub);

    $selectUsuarios = "<select name='tsub' id ='tsub' class='select form-control'>";
    $selectUsuarios .= "<option value='0'>-- Seleccione una subserie --</option>";
    while (!$rsSub->EOF) {
        $count++;
        $selectUsuarios .= "<option value='" . $rsSub->fields['SGD_SBRD_CODIGO']."'>" . $rsSub->fields['SGD_SBRD_CODIGO'].'-'.$rsSub->fields['SGD_SBRD_DESCRIP'] . "</option>";

        $rsSub->MoveNext();
    }
    $selectUsuarios .= "</select>";
    echo $selectUsuarios;
}

//Type 100 = todos los expedientes existentes
if (isset($_POST['type']) && $_POST['type'] == 100) {

    $infoExpediente = $_POST['infoExpediente'];
    $explodeInfo = explode('|', $infoExpediente);
    $nivelUsuario = $explodeInfo[0];
    $dependencia = $explodeInfo[1];

    if($nivelUsuario != 4 or $nivelUsuario != 5){
        $andWhere = " where depe_codi='".$dependencia."'";
    }else{
        $andWhere = " ";
    }

    $queryInfoExpediente = "select * from sgd_sexp_secexpedientes $andWhere";
    $rsInfoExpediente = $dbProcess->conn->query($queryInfoExpediente);

    while (!$rsInfoExpediente->EOF) {

        // Información de la serie
        $serie = "select * from sgd_srd_seriesrd where sgd_srd_codigo=".$rsInfoExpediente->fields['SGD_SRD_CODIGO'];
        $rsSerie = $dbProcess->conn->query($serie);

        // Información de la subserie
        $subserie = "select * from sgd_sbrd_subserierd where sgd_srd_codigo=".$rsInfoExpediente->fields['SGD_SRD_CODIGO']." and sgd_sbrd_codigo=".$rsInfoExpediente->fields['SGD_SBRD_CODIGO'];
        $rsSubserie = $dbProcess->conn->query($subserie);

        // Información de la dependencia
        $infodependencia = "select * from dependencia where depe_codi='".$rsInfoExpediente->fields['DEPE_CODI']."'";
        $rsInfodependencia = $dbProcess->conn->query($infodependencia);

        // Información de Usuario
        $infousuario = "select * from usuario where usua_doc='".$rsInfoExpediente->fields['USUA_DOC_RESPONSABLE']."'";
        $rsInfoUsuario = $dbProcess->conn->query($infousuario);
        $numeroExpediente = $rsInfoExpediente->fields['SGD_EXP_NUMERO'];

        $tableRadicados .= "<tr>";
        $tableRadicados .= "<td>" . $rsInfoExpediente->fields['SGD_EXP_NUMERO']    . "</td>";
        $tableRadicados .= "<td>" . $rsInfoExpediente->fields['SGD_SEXP_PAREXP1']  . "</td>";
        $tableRadicados .= "<td>" . $rsSerie->fields['SGD_SRD_DESCRIP']            . "</td>";
        $tableRadicados .= "<td>" . $rsSubserie->fields['SGD_SBRD_DESCRIP']        . "</td>";
        $tableRadicados .= "<td>" . $rsInfodependencia->fields['DEPE_NOMB']        . "</td>";
        $tableRadicados .= "<td>" . $rsInfoUsuario->fields['USUA_NOMB']            . "</td>";
        $tableRadicados .= "<td> <center>
                                    <button name='ver' id='ver' type='button' data-toggle='modal' data-target='#' onclick='visualizarexpediente(`".$numeroExpediente."`);' >Visualizar</button> 
                                    <button name='historico' id='historico' type='button' data-toggle='modal' data-target='#' onclick='visualizarhistorico(`".$numeroExpediente."`);'>Historico</button>
                            </center></td>";
        $tableRadicados .= "</tr>";

        $rsInfoExpediente->MoveNext();
    }
    echo $tableRadicados;
}

//Type 3 = Guarda informació de la carpeta del expediente
if (isset($_POST['type']) && $_POST['type'] == 3) {

    $numExpediente = $_POST['numExpediente'];
    $codSerie = $_POST['codSerie'];
    $codSubserie = $_POST['codSubserie'];
    $usuaResposanble = $_POST['usuaResposanble'];
    $nombExpediente = trim($_POST['nombExpediente']);
    $subCarpetas2 = trim($_POST['subCarpetas2']);
    $subCarpetas3 = trim($_POST['subCarpetas3']);
    $sqlFechaHoy = $dbProcess->conn->OffsetDate(0, $dbProcess->conn->sysTimeStamp);
    $nombExpediente = trim($nombExpediente .' ('.$codDepe.')');
    $status = false;
    $mensaje = '';

    $dbProcess->conn->beginTrans();

    $query = "select SGD_EXP_NUMERO, DEPE_CODI from SGD_SEXP_SECEXPEDIENTES WHERE SGD_EXP_NUMERO='$numExpediente' or sgd_sexp_parexp1 = '$nombExpediente'";
    $rsSGD_EXP_NUMERO = $dbProcess->conn->query($query);    

    if($rsSGD_EXP_NUMERO->fields['SGD_EXP_NUMERO'] == ''){

        $anioExp = date('Y');
        $secExp = $expediente->secExpediente($explodeExp[1], $codSerie, $codSubserie, $explodeExp[0]);

        # Inserta la información del expediente con base a la información
        $queryInsert = "insert into SGD_SEXP_SECEXPEDIENTES(SGD_EXP_NUMERO,SGD_SEXP_FECH,DEPE_CODI,USUA_DOC,SGD_FEXP_CODIGO,SGD_SRD_CODIGO,SGD_SBRD_CODIGO,SGD_SEXP_SECUENCIA, SGD_SEXP_ANO, USUA_DOC_RESPONSABLE, sgd_sexp_parexp1, sgd_sexp_estado, sgd_pexp_codigo)";
        $queryInsert .= " values ('$numExpediente', $sqlFechaHoy, '$codDepe', '$usuaDoc', 0, $codSerie, $codSubserie, $secExp, $anioExp, '$usuaResposanble', '$nombExpediente', 0, 0)";
        $rsQueryExp = $dbProcess->conn->query($queryInsert);

        # Luego de isertar se valida que si exita la inserción anterior
        $expedienteInfo = "select SGD_EXP_NUMERO from SGD_SEXP_SECEXPEDIENTES WHERE SGD_EXP_NUMERO='$numExpediente'";
        $rsExpedienteInfo = $dbProcess->conn->query($expedienteInfo);    

        if(!$rsExpedienteInfo->EOF){

            // SI existe un subnivel lo inserta
            if(isset($subCarpetas2) && $subCarpetas2 != ''){

                # Inserta la información de los subniveles asociados al expediente con base a la información
                $queryExpeNivel = "insert into sgd_sec_exp_subniveles (sgd_sexp_secuencia, sgd_id_subnivel, sgd_nombre_subnivel) ";
                $queryExpeNivel .= " values ($secExp, $secExp, '$subCarpetas2')";
                $rsQueryExpeNivel = $dbProcess->conn->query($queryExpeNivel);

                # Luego de isertar se valida que si exita la inserción anterior y poder insertar el siguiente nivel
                $expedienteInfo = "select sgd_id_tabla from sgd_sec_exp_subniveles WHERE sgd_sexp_secuencia	=$secExp and sgd_id_subnivel=$secExp";
                $rsExpedienteSubInfo = $dbProcess->conn->query($expedienteInfo);    
                $sgd_id_tabla = isset($rsExpedienteSubInfo->fields['sgd_id_tabla']) ? $rsExpedienteSubInfo->fields['sgd_id_tabla']:$rsExpedienteSubInfo->fields['SGD_ID_TABLA'];

                if(!$rsExpedienteSubInfo->EOF){

                    if(isset($subCarpetas3) && $subCarpetas3 != ''){

                        # Si ya existe el nombre de la subcarpeta no se inserte.
                        $expedienteInfo = "select sgd_id_tabla from sgd_sec_exp_subniveles WHERE sgd_sexp_secuencia	=$secExp and sgd_nombre_subnivel='$subCarpetas3'";
                        $rsExpedienteSubInfo = $dbProcess->conn->query($expedienteInfo);   

                        if(!$rsExpedienteSubInfo->EOF){
                            $dbProcess->conn->rollbackTrans();
                            $mensaje = 'La subcarpeta ingresada ya se encuentra creada para el mismo expediente.';
                            $status = false;
                        }
                        else{

                            # Inserta la información de los subniveles asociados al expediente con base a la información
                            $queryExpeNivel2 = "insert into sgd_sec_exp_subniveles (sgd_sexp_secuencia, sgd_id_subnivel, sgd_nombre_subnivel) ";
                            $queryExpeNivel2 .= " values ($secExp, $sgd_id_tabla, '$subCarpetas3')";
                            $rsQueryExpeNivel2 = $dbProcess->conn->query($queryExpeNivel2);

                            # Luego de isertar se valida que si exita la inserción anterior y poder insertar el siguiente nivel
                            $expediente2Info = "select sgd_id_tabla from sgd_sec_exp_subniveles WHERE sgd_sexp_secuencia=$secExp and sgd_id_subnivel=$sgd_id_tabla";
                            $rsExpedienteSub2Info = $dbProcess->conn->query($expediente2Info);

                            if(!$rsExpedienteSub2Info->EOF){
                                # Guarda en el historico del expediente
                                // $observaTrd = "Asignación de *TRD*" . $codSerie . "/" . $codSubserie;
                                // $Historico->insertarHistorico($nurad, $dependencia, $codusuario, $dependencia, $codusuario, $observaTrd, 32);

                                $dbProcess->conn->commitTrans();
                                $mensaje = 'Se creo correctamente el expediente con los subniveles correspondientes.';
                                $status = true;
                            }else{
                                $dbProcess->conn->rollbackTrans();
                                $mensaje = 'No se pudo crear el expediente con los subniveles.';
                                $status = false;
                            }

                        }                        

                    }
                    // SI solo llega un nivel de subcarpetas entonces hacer commit para guardar la información
                    else{   
                        $dbProcess->conn->commitTrans();
                        $mensaje = 'Se creo correctamente el expediente con los subniveles correspondientes.';
                        $status = true;
                    }

                }else{
                    $dbProcess->conn->rollbackTrans();
                    $mensaje = 'No se pudo crear el expediente con los subniveles.';
                    $status = false;
                }    
            }
            // SI solo llega el nombre del expediente entonces hacer commit para guardar la información.
            else{
                $dbProcess->conn->commitTrans();
                $mensaje = 'Se creo correctamente el expediente.';
                $status = true;
            }     
        }else{
            $dbProcess->conn->rollbackTrans();
            $mensaje = 'No se pudo crear el expediente.';
            $status = false;
        } 
    }else{
        $mensaje = 'El expediente que intenta crear ya existe.';
        $status = false;
    }
    
    echo $status.' | '.$mensaje;
}

//Type 4 = Consulta el detalle del expediente para saber todo lo que esta incluido en el expediente
if (isset($_POST['type']) && $_POST['type'] == 4) {
    $expediente = $_POST['expediente'];
    $html = '';
    
    // Información del expediente
    $query = "select * from SGD_SEXP_SECEXPEDIENTES WHERE SGD_EXP_NUMERO='$expediente'";
    $rsExpediente = $dbProcess->conn->query($query);
    $sgd_exp_numero	  = isset($rsExpediente->fields['sgd_exp_numero']) ? $rsExpediente->fields['sgd_exp_numero'] : $rsExpediente->fields['SGD_EXP_NUMERO'];
    $sgd_srd_codigo	  = isset($rsExpediente->fields['sgd_srd_codigo']) ? $rsExpediente->fields['sgd_srd_codigo'] : $rsExpediente->fields['SGD_SRD_CODIGO'];
    $sgd_sbrd_codigo  = isset($rsExpediente->fields['sgd_sbrd_codigo']) ? $rsExpediente->fields['sgd_sbrd_codigo'] : $rsExpediente->fields['SGD_SBRD_CODIGO'];
    $sgd_sexp_parexp1 = isset($rsExpediente->fields['sgd_sexp_parexp1']) ? $rsExpediente->fields['sgd_sexp_parexp1'] : $rsExpediente->fields['SGD_SEXP_PAREXP1'];
    $sgd_sexp_fech    = isset($rsExpediente->fields['sgd_sexp_fech']) ? $rsExpediente->fields['sgd_sexp_fech'] : $rsExpediente->fields['SGD_SEXP_FECH'];
    $usua_doc         = isset($rsExpediente->fields['usua_doc']) ? $rsExpediente->fields['usua_doc'] : $rsExpediente->fields['USUA_DOC'];
    $secExpediente    = isset($rsExpediente->fields['sgd_sexp_secuencia	']) ? $rsExpediente->fields['sgd_sexp_secuencia	'] : $rsExpediente->fields['SGD_SEXP_SECUENCIA'];

    // Información del usuario dueño del expediente
    $selectUsuario = "select usua_nomb from usuario where usua_doc='$usua_doc'";
    $rsUsuario = $dbProcess->conn->query($selectUsuario);
    $usuaNomb = isset($rsUsuario->fields['usua_nomb']) ? $rsUsuario->fields['usua_nomb'] : $rsUsuario->fields['USUA_NOMB'];

    // Información de la TRD que se aplica al expediente SERIE
    $selectSerie= "select sgd_srd_descrip from sgd_srd_seriesrd where sgd_srd_codigo=$sgd_srd_codigo";
    $rsSerie = $dbProcess->conn->query($selectSerie);
    $sgd_srd_descrip = isset($rsSerie->fields['sgd_srd_descrip']) ? $rsSerie->fields['sgd_srd_descrip'] : $rsSerie->fields['SGD_SRD_DESCRIP'];

    // Información de la TRD que se aplica al expediente SUBSERIE
    $selectSubSerie= "select sgd_sbrd_descrip from sgd_sbrd_subserierd where sgd_sbrd_codigo=$sgd_sbrd_codigo and sgd_srd_codigo=$sgd_srd_codigo";
    $rsSubSerie = $dbProcess->conn->query($selectSubSerie);
    $sgd_sbrd_descrip = isset($rsSubSerie->fields['sgd_sbrd_descrip']) ? $rsSubSerie->fields['sgd_sbrd_descrip'] : $rsSubSerie->fields['SGD_SBRD_DESCRIP'];

    $html .= '<table cellspacing="5" width=100% align="center" border="1" class="borde_tab" style="margin-left: 10px; font-family: revert; size:small">';
    $html .= '    <tr>';
    $html .= '        <td class="listado2" colspan="4">';
    $html .= '            &nbsp;&nbsp;&nbsp;<label for="nomb_expediente">Nombre de Expediente: </label> '.$sgd_sexp_parexp1.'&nbsp;&nbsp;&nbsp;<br>';
    $html .= '            &nbsp;&nbsp;&nbsp;<label for="resp_expediente">Responsable: </label> '.$usuaNomb.'&nbsp;&nbsp;&nbsp;<br>';
    $html .= '            &nbsp;&nbsp;&nbsp;<label for="trds_expediente">TRD: </label> '.$sgd_srd_descrip.'/'.$sgd_sbrd_descrip.'&nbsp;&nbsp;&nbsp;<br>';
    $html .= '            &nbsp;&nbsp;&nbsp;<label for="fech_expediente">Fecha Expediente: </label> '.$sgd_sexp_fech.'&nbsp;&nbsp;&nbsp;<br>';
    $html .= '        </td>';
    $html .= '    </tr>';
    $html .= '    <tr class="timparr">';
    $html .= '        <td colspan="4" class="titulos5"><br>';
    $html .= '            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Documentos Pertenecientes al expediente &nbsp;</p>';
    $html .= '            <a name="t1"></a>';
    $html .= '            <div class="accordion" id="accordionExample">';


    // Información de las subcarpetas asociadas al expediente
    $selectSubcarpeta= "select * from sgd_sec_exp_subniveles where sgd_sexp_secuencia=$secExpediente";
    $rsSubCarpeta= $dbProcess->conn->query($selectSubcarpeta);
    $valor = 1;

    while(!$rsSubCarpeta->EOF){

        $sgd_id_tabla = isset($rsSubCarpeta->fields['sgd_id_tabla']) ? $rsSubCarpeta->fields['sgd_id_tabla'] : $rsSubCarpeta->fields['SGD_ID_TABLA'];
        $sunivelInterno = isset($rsSubCarpeta->fields['sgd_id_subnivel']) ? $rsSubCarpeta->fields['sgd_id_subnivel'] : $rsSubCarpeta->fields['SGD_ID_SUBNIVEL'];
        $subcarpeta = isset($rsSubCarpeta->fields['sgd_nombre_subnivel']) ? $rsSubCarpeta->fields['sgd_nombre_subnivel'] : $rsSubCarpeta->fields['SGD_NOMBRE_SUBNIVEL'];

        $infoRadicados = "select * from sgd_exp_expediente where sgd_exp_numero	='$sgd_exp_numero' and sgd_id_subniveles=$sgd_id_tabla";
        $rsInfoRadicados = $dbProcess->conn->query($infoRadicados);

        $html .= '                <div class="accordion-item">';
        $html .= '                    <h2 class="accordion-header" id="heading'.$valor.'">';
        $html .= '                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$valor.'" aria-expanded="true" aria-controls="collapse'.$valor.'">';
        $html .= '                            '.$subcarpeta.'';
        $html .= '                        </button>';
        $html .= '                    </h2>';
        $html .= '                 </div>';
        $html .= '                 <div id="collapse'.$valor.'" class="accordion-collapse collapse show" aria-labelledby="heading'.$valor.'" data-bs-parent="#accordionExample">';
        $html .= '                     <div class="accordion-body">';
        $html .= '                        <table border=1 width=98% class="borde_tab" align="center" cellpadding="0" cellspacing="0" >';
        $html .= '                           <tr class="titulos3" >';
        $html .= '                               <td>&nbsp;</td>';
        $html .= '                               <td align="center">';
        $html .= '                                   <a href="#" aria-label="Ordenar por numero de radicado"> Radicado</a>';
        $html .= '                               </td>';
        $html .= '                               <td align="center">';
        $html .= '                                   <a aria-label="Ordenar por fecha de radicación" href="#">Fecha Radicaci&oacute;n</a>';
        $html .= '                               </td>';
        $html .= '                               <TD align="center">';
        $html .= '                                   <a href="#" aria-label="Ordenar por tipo de documento">Tipo<br> Documento</a>';
        $html .= '                               </TD>';
        $html .= '                               <TD align="center">';
        $html .= '                                    <a href="#" aria-label="Ordenar por asunto">Asunto</a>';
        $html .= '                               </TD>';
        $html .= '                               <TD align="center">';
        $html .= '                                   Acciones';
        $html .= '                               </TD>';
        $html .= '                            </tr>';
        
        while (!$rsInfoRadicados->EOF){

            $radi_nume_radi	 = isset($rsInfoRadicados->fields['radi_nume_radi']) ? $rsInfoRadicados->fields['radi_nume_radi'] : $rsInfoRadicados->fields['RADI_NUME_RADI'];
            $selectRadi = "select ra.*, tp.sgd_tpr_descrip from radicado ra inner join sgd_tpr_tpdcumento tp ON tp.sgd_tpr_codigo	= ra.tdoc_codi where radi_nume_radi='$radi_nume_radi'";
            $rsselectRadi = $dbProcess->conn->query($selectRadi);

            $dependencia = isset($rsselectRadi->fields['radi_depe_rad'])?$rsselectRadi->fields['radi_fech_radi']:$rsselectRadi->fields['RADI_FECH_RADI'];
            $radi_fech_radi = isset($rsselectRadi->fields['radi_fech_radi'])?$rsselectRadi->fields['radi_fech_radi']:$rsselectRadi->fields['RADI_FECH_RADI'];
            $sgd_tpr_descrip = isset($rsselectRadi->fields['sgd_tpr_descrip'])?$rsselectRadi->fields['sgd_tpr_descrip']:$rsselectRadi->fields['SGD_TPR_DESCRIP'];
            $ra_asun = isset($rsselectRadi->fields['ra_asun'])?$rsselectRadi->fields['ra_asun']:$rsselectRadi->fields['RA_ASUN'];
            
            $html .= '                           <tr class="listado2" >';
            $html .= '                               <td>&nbsp;</td>';
            $html .= '                               <td align="center">';
            $html .= '                                   '.$radi_nume_radi.'';
            $html .= '                               </td>';
            $html .= '                               <td align="center">';
            $html .= '                                   '.$radi_fech_radi.'';
            $html .= '                               </td>';
            $html .= '                               <TD align="center">';
            $html .= '                                   '.$sgd_tpr_descrip.'';
            $html .= '                               </TD>';
            $html .= '                               <TD align="center">';
            $html .= '                                    '.$ra_asun.'';
            $html .= '                               </TD>';
            $html .= '                               <TD align="center">';
            $html .= '                                   Excluir';
            $html .= '                               </TD>';
            $html .= '                            </tr>';


            $num_anexos = $a->anexosRadicado($radi_nume_radi);
            $anexos_radicado = $a->anexos;

            if ($num_anexos >= 1) {
                for ($iia = 0; $iia <= $num_anexos; $iia++) {

                    $codigo_anexo = $a->codi_anexos[$iia];
                    $sgd_tpr_tpdcumento = $a->sgd_tpr_codigo[$iia];
                    if ($codigo_anexo and substr($anexDirTipo, 0, 1) != '7') {
                        $select = "select sgd_tpr_descrip from sgd_tpr_tpdcumento where sgd_tpr_codigo =" . $sgd_tpr_tpdcumento;
                        $rsselect = $dbProcess->conn->query($select);
                        $tdocpers = $sgd_tpr_tpdcumento;
                        
                        $tipo_documento_desc = $assoc == 0 ? $rsselect->fields["sgd_tpr_descrip"] : $rsselect->fields["SGD_TPR_DESCRIP"];
                       
                        $fechaDocumento = "";
                        $anex_desc = "";
                        
                        $a->anexoRadicado($radi_nume_radi, $codigo_anexo);
                        $secuenciaDocto = $a->get_doc_secuencia_formato($dependencia);
                        $fechaDocumento = $a->get_sgd_fech_doc();
                        $anex_nomb_archivo = $a->get_anex_nomb_archivo();
                        $anex_desc = $a->get_anex_desc();

                        // By Skinatech - 14/08/2018
                        // Para la construcción del número de radicado, esto indica la parte inicial del radicado.
                        if ($estructuraRad == 'ymd') {
                            $num = 8;
                        } elseif ($estructuraRad == 'ym') {
                            $num = 6;
                        } else {
                            $num = 4;
                        }

                        $dependencia_creadora = substr($codigo_anexo, $num, $longitud_codigo_dependencia);
                        $ano_creado = substr($codigo_anexo, 0, 4);
                        $sgd_tpr_codigo = $a->get_sgd_tpr_codigo();
                        $sgd_srd_codigo = $a->get_sgd_srd_codigo();
                        $sgd_sbrd_codigo = $a->get_sgd_sbrd_codigo();
                        $anex_codigo = $a->get_anex_codigo();
                        $anexSalida = $a->get_radi_anex_salida();
                        $docAnexPublico = $a->get_radi_docu_publico();
                        $ext = substr($anex_nomb_archivo, -3);
                        $anexBorrado = $a->anex_borrado;                        

                        if (trim($anex_nomb_archivo) or $anexSalida != 1 or $ii) {
                            
                            $html .= '<tr>';
                            $html .= '    <td valign="baseline" class="listado2">&nbsp;</td>';
                            $html .= '    <td valign="baseline"  class="listado2">';
                            
                                    if ($anexBorrado == "S") {
                                        $html .= '<img src="iconos/docs_tree_del.gif">';
                                    } else if ($anexBorrado == "N") {
                                        $html .= '<img alt="Icono de anexo" src="iconos/docs_tree.gif">';
                                    }

                                    $sqlcount = "select count(anex_codigo) as conteo from anexos where anex_radi_nume='$radi_nume_radi'";
                                    $rsConteoAnexos = $dbProcess->conn->query($sqlcount);
                                    $contadorAnexos = $rsConteoAnexos->fields['conteo'];
                                    $tipoRadicado = substr($radi_nume_radi, -1);
                                    $anexNumeroLis = substr($codigo_anexo, -1);

                                    $html .= "<input type='hidden' name='radicadover' id='radicadover$anexNumeroLis' value='" . $radi_nume_radi . "'  >";
                                    $html .= '<input type="hidden" name="expanex_numero" id="expanex_numero' . $anexNumeroLis . '" value="' . $anexNumeroLis . '" size="2">';

                                    if (in_array($tdocpers, $tiposdocumentales)) {
                                        if ($ext != 'pdf' && $ext != 'png' && $ext != 'jpg' && $ext != 'tiff') {

                                            $html .= '<a href="bodega/'.$ano_creado.'/'.$dependencia_creadora.'\/docs/'.$anex_nomb_archivo.'" aria-label="Abrir documento de anexo de radicado '.$radi_nume_radi.', anexo numero '.substr($codigo_anexo, -4).'" >';
                                            $html .= substr($codigo_anexo, -4);
                                            $html .= '</a>';

                                        } else {
                                            $html .=  "<b><a class='vinculos vinculoEXp' id=$anexNumeroLis href='#myModalDocExp' aria-label='Abrir docuemnto cargado al anexo'>" . substr($codigo_anexo, -4) . "</a>";
                                        }
                                    } else {
                                        $html .= "<a href='#' onclick=\"alert('Usted no tiene acceso a este tipo documental " . $tipo_documento_desc . "')\"><span class=''>" . substr($codigo_anexo, -4) . "</span></a>";
                                    }
                                $html .= '</td>';
                                $html .= '<td valign="baseline" class="listado2">'.$fechaDocumento.'</td>';
                                $html .= '<TD valign="baseline" class="listado2">'.$tipo_documento_desc.'</TD>';
                                $html .= '<TD valign="baseline" class="listado2">'.$anex_desc.'</TD>';

                            $html .= '</tr>';
                        } // Fin del if que busca si hay link de archivo para mostrar o no el doc anexo
                    }
                }  // Fin del For que recorre la matriz de los anexos de cada radicado perteneciente al expediente
            }


            $rsInfoRadicados->MoveNext();
        }

        $html .= '                         </table>';
        $html .= '                      </div>';
        $html .= '                  </div>';

        $valor++;
        $rsSubCarpeta->MoveNext();

    }   

    $html .= '            </div>';
    $html .= '        </td>';
    $html .= '    </tr>';
    $html .= '</table>';

    echo $html;


}

//Type 5 = Muestra subcarpetas del expediente
if (isset($_POST['type']) && $_POST['type'] == 5) {
    $numeroExpediente = $_POST['numeroExpediente'];
    $nombreExpediente = $_POST['nombreExpediente'];

    //$dbProcess->conn->beginTrans();

    $query = "select sgd_sexp_secuencia from SGD_SEXP_SECEXPEDIENTES WHERE SGD_EXP_NUMERO='$numExpediente' or sgd_sexp_parexp1 = '$nombreExpediente'";
    $rsSGD_EXP_NUMERO = $dbProcess->conn->query($query);  
    $sgd_sexp_secuencia = isset($rsSGD_EXP_NUMERO->fields['sgd_sexp_secuencia']) ? $rsSGD_EXP_NUMERO->fields['sgd_sexp_secuencia']: $rsSGD_EXP_NUMERO->fields['SGD_SEXP_SECUENCIA'];

    if($sgd_sexp_secuencia != ''){

        $querySubnivel = "select * from sgd_sec_exp_subniveles WHERE sgd_sexp_secuencia=$sgd_sexp_secuencia";
        $rsSubnivel = $dbProcess->conn->query($querySubnivel);
        $sgd_nombre_subnivel = isset($rsSubnivel->fields['sgd_nombre_subnivel']) ? $rsSubnivel->fields['sgd_nombre_subnivel']: $rsSubnivel->fields['SGD_NOMBRE_SUBNIVEL'];
        $sgd_id_tabla = isset($rsSubnivel->fields['	sgd_id_tabla']) ? $rsSubnivel->fields['	sgd_id_tabla']: $rsSubnivel->fields['SGD_ID_TABLA'];
        $sgd_id_subnivel = isset($rsSubnivel->fields['sgd_id_subnivel']) ? $rsSubnivel->fields['sgd_id_subnivel']: $rsSubnivel->fields['SGD_ID_SUBNIVEL'];

        $html = "<select name='subnivel' id='sibnivel'>";

        while (!$rsSubnivel->EOF){
            $html .= "<option value='".$sgd_id_tabla."-".$sgd_id_subnivel."'>".$sgd_nombre_subnivel."</option>";
            $rsSubnivel->MoveNext();
        }
        $html .= "</select>";

        echo $html;
    }

}

//Type 6 = Muestra el historico del expediente
if (isset($_POST['type']) && $_POST['type'] == 6) {
    $expediente = $_POST['expediente'];
    $sqlFecha = $dbProcess->conn->SQLDate("d-m-Y H:i A", "he.SGD_HFLD_FECH");
    $sqlFecha = $dbProcess->conn->SQLDate("Y-m-d", "he.SGD_HFLD_FECH");
    $html = '';

    $isql = "select $sqlFecha as HIST_FECH
                , he.DEPE_CODI
                , he.USUA_CODI
                , he.RADI_NUME_RADI
                , he.SGD_HFLD_OBSERVA as HIST_OBSERVA 
                , he.USUA_DOC
                , he.SGD_TTR_CODIGO
                , he.RADI_NUME_RADI
                , he.SGD_FEXP_CODIGO
                , $sqlFecha as FECHA
            from SGD_HFLD_HISTFLUJODOC he
     where 
                he.SGD_EXP_NUMERO ='$expediente'
                order by he.SGD_HFLD_FECH desc ";
    $rs = $dbProcess->query($isql);

    if($rs){

        $html .= '<table width="95%" border="1" cellspacing="0" cellpadding="0" align="center" style="margin-left: 10px; font-family: revert;">';
        $html .= '<tr>';
        $html .= '<td height="25" class="titulos4">Hist&oacute;rico del expediente ---- Fecha de inicio'.$expFechaCrea.'</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<table  width="95%" align="center" border="1" cellpadding="0" cellspacing="1" class="borde_tab" style="margin-left: 10px; font-family: revert;">';
        $html .= '<tr align="center">';
        $html .= '<th width=100 class="listado1" height="24"><center>Dependencia</center></th>';
        $html .= '<th width=100 class="listado1" height="24"><center>Fecha</center></th>';
        $html .= '<th width=100 class="listado1" height="24"><center>Transacci&oacute;n</center></th> ';
        $html .= '<th width=100 class="listado1" height="24" ><center>Usuario</center></th>';
        $html .= '<th width=100 class="listado1" height="24" ><center>Radicado</center></th>';
        $html .= '<th width=200 height="24" class="listado1"><center>Comentario</center></th>';
        $html .= '</tr>';
    
        while (!$rs->EOF) {

            $numerot = $rs->fields["NUM"];
            $usua_doc_hist = $rs->fields["USUA_DOC"];
            $usua_codi = $rs->fields["USUA_CODI"];
            $depe_codi = $rs->fields["DEPE_CODI"];
            $codTransac = $rs->fields["SGD_TTR_CODIGO"];
            $descTransaccion = $rs->fields["SGD_TTR_DESCRIP"];
            if (!$codTransac)$codTransac = "0";
            $trans->Transaccion_codigo($codTransac);
            $objUs->usuarioDocto($usua_doc_hist);
            $objDep->Dependencia_codigo($depe_codi);
    
            $html .= '<tr>';
            $html .= '<td class="listado2" >'.$objDep->getDepe_nomb().'</td>';
            $html .= '<td class="listado2">'.$expFechaHist = $rs->fields["HIST_FECH"].'</td>';
            $html .= '<td class="listado2">'.$trans->getDescripcion().'</td>';
            $html .= '<td class="listado2">'.$objUs->get_usua_nomb().'</td>';
            $html .= '<td class="listado2">'.$rs->fields["RADI_NUME_RADI"].'</td>';
            $html .= '<td class="listado2" width="200">'.$rs->fields["HIST_OBSERVA"].'</td>';
            $html .= '</tr>';
            
            $rs->MoveNext();
        }
    
        $html .= '</table>';
    }else{
        $html .= 'No se han encontrado resultados';
    }
    
    echo $html;
}
?>