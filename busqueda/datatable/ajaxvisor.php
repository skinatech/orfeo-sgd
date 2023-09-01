<?php


    session_start();
    $dir_raiz = $_SESSION['dir_raiz'];
    include "../../config.php";
    // $dbProcess = new ConnectionHandler("$dir_raiz");
    include_once "$dir_raiz/include/db/ConnectionDB.php";
    $dbProcess = new ConnectionDB("$dir_raiz");
    $dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);

    switch($_POST['type']){
       
        # Busqueda de Documentos
        case '1':

            $request = $_POST;

            # hist4derechopet
            $queryHist4derechopet = "select numdp as num_rad, fecharadica as fecha_rad, nombrespet as remitente, numdocpet as doc_remitente, asuntopet as asunto, anexos as anexos, codependasignada as dependencia_resp, cofuncasignado as funcionario, respuesta as respuesta, 1 as peticion from hist4derechopet hist4";

            # hist3notainterna
            $queryHist3notainterna = " select ni_numero as num_rad, ni_fecha as fecha_rad, ni_dep_orig as remitente, ni_fun_orig as doc_remitente, ni_asunto as asunto, anexos as anexos, ni_para_dep as dependencia_resp, usuario as funcionario, 0 as respuesta, 2 as interna from hist3notainterna hist3 ";
            
            // # hist2envía 
            $queryHist2envía = " select n_envio as num_rad, f_envio as fecha_rad, nom_destin as remitente, '' as doc_remitente, asunto as asunto, anexo as anexos, cod_depend as dependencia_resp, nom_func_remite as funcionario, respuesta as respuesta, 3 as envios from hist2envia hist2";
            
            // # hist1recibe  
            $queryHist1recibe = " select n_radica as num_rad, f_radica as fecha_rad, nom_remite as remitente, '' as doc_remitente, asunto as asunto, anexos	as anexos, cod_depend as dependencia_resp, rec_archivo as funcionario, respuesta as respuesta, 4 as envios from hist1recibe hist1";

            # a_recibe  
            $queryA_recibe = " select n_radica as num_rad, f_radica as fecha_rad, nom_remite as remitente, cod_remite as doc_remitente, asunto as asunto, anexos as anexos, cod_depend as dependencia_resp, rec_archivo as funcionario, respuesta as respuesta, 5 as recibe_actual from a_recibe";

            # a_envia  
            $queryA_envia = " select n_envio as num_rad, f_radica as fecha_rad, nom_destin as remitente, cod_destin as doc_remitente, asunto as asunto, anexo as anexos, cod_depend as dependencia_resp, rec_archivo_nom as funcionario, respuesta as respuesta, 6 as envios_actual from a_envia";

            if(isset($request['form']) && !empty($request['form'])){

                $queryHist4derechopet .= " WHERE 1 = 1";
                $queryHist3notainterna .= " WHERE 1 = 1";
                $queryHist2envía .= " WHERE 1 = 1";
                $queryHist1recibe .= " WHERE 1 = 1";
                $queryA_recibe .= " WHERE 1 = 1";
                $queryA_envia .= " WHERE 1 = 1";

                foreach ($request['form'] as $key => $value) {
                    if(isset($request['form'][$key]) && !empty($request['form'][$key])){
                       
                        $valorBuscado = trim($value);

                        switch ($key) {
                            case 'radi_nume_radi':
                                $queryHist4derechopet .= " and hist4.numdp = ".$valorBuscado."";
                                $queryHist3notainterna .= " and hist3.ni_numero = ".$valorBuscado."";
                                $queryHist2envía .= " and hist2.n_envio = ".$valorBuscado."";
                                $queryHist1recibe .= " and hist1.n_radica = ".$valorBuscado."";
                                $queryA_recibe .= " and a_recibe.n_radica = ".$valorBuscado."";
                                $queryA_envia .= " and a_envia.n_envio = ".$valorBuscado."";
                            break;
                            case 'sgd_dir_nomremdes':
                                $queryHist4derechopet .= " and hist4.nombrespet LIKE '%".$valorBuscado."%'";
                                $queryHist3notainterna .= " and hist3.ni_dep_orig LIKE '%".$valorBuscado."%'";
                                $queryHist2envía .= " and hist2.nom_destin LIKE '%".$valorBuscado."%'";
                                $queryHist1recibe .= " and hist1.nom_remite LIKE '%".$valorBuscado."%'";
                                $queryA_recibe .= " and a_recibe.nom_remite LIKE '%".$valorBuscado."%'";
                                $queryA_envia .= " and a_envia.nom_destin LIKE '%".$valorBuscado."%'";
                            break;
                            case 'sgd_dir_doc':
                                $queryHist4derechopet .= " and hist4.numdocpet LIKE '%".$valorBuscado."%'";
                                $queryHist3notainterna .= " and hist3.ni_fun_orig LIKE '%".$valorBuscado."%'";
                                $queryA_recibe .= " and a_recibe.cod_remite LIKE '%".$valorBuscado."%'";
                                $queryA_envia .= " and a_envia.cod_destin LIKE '%".$valorBuscado."%'";
                            break;
                            case 'ra_asun':
                                $queryHist4derechopet .= " and hist4.asuntopet LIKE '%".$valorBuscado."%'";
                                $queryHist3notainterna .= " and hist3.ni_asunto LIKE '%".$valorBuscado."%'";
                                $queryHist2envía .= " and hist2.asunto LIKE '%".$valorBuscado."%'";
                                $queryHist1recibe .= " and hist1.asunto LIKE '%".$valorBuscado."%'";
                                $queryA_recibe .= " and a_recibe.asunto LIKE '%".$valorBuscado."%'";
                                $queryA_envia .= " and a_envia.asunto LIKE '%".$valorBuscado."%'";
                            break;
                            case 'radi_depe_radi':
                                $queryHist4derechopet .= " and hist4.codependasignada LIKE '%".$valorBuscado."%'";
                                $queryHist3notainterna .= " and hist3.ni_para_dep LIKE '%".$valorBuscado."%'";
                                $queryHist2envía .= " and hist2.cod_depend LIKE '%".$valorBuscado."%'";
                                $queryHist1recibe .= " and hist1.cod_depend LIKE '%".$valorBuscado."%'";
                                $queryA_recibe .= " and a_recibe.cod_depend LIKE '%".$valorBuscado."%'";
                                $queryA_envia .= " and a_envia.cod_depend LIKE '%".$valorBuscado."%'";
                            break;
                            case 'usuario_depe':
                                $queryHist4derechopet .= " and hist4.cofuncasignado LIKE '%".$valorBuscado."%'";
                                $queryHist3notainterna .= " and hist3.usuario LIKE '%".$valorBuscado."%'";
                                $queryHist2envía .= " and hist2.nom_func_remite LIKE '%".$valorBuscado."%'";
                                $queryHist1recibe .= " and hist1.rec_archivo LIKE '%".$valorBuscado."%'";
                                $queryA_recibe .= " and a_recibe.rec_archivo LIKE '%".$valorBuscado."%'";
                                $queryA_envia .= " and a_envia.rec_archivo_nom LIKE '%".$valorBuscado."%'";
                            break;
                            case 'radi_fech_radi_ini': 
                                $ini = $request['form']['radi_fech_radi_ini'] ?? date('Y-m-d'); 
                                $queryHist4derechopet .=" and (hist4.fecharadica >= '".trim($ini)." 00:00:00'";
                                $queryHist3notainterna .=" and (hist3.ni_fecha >= '".trim($ini)." 00:00:00'";
                                $queryHist2envía .=" and (hist2.f_envio >= '".trim($ini)." 00:00:00'";
                                $queryHist1recibe .=" and (hist1.f_radica >= '".trim($ini)." 00:00:00'";
                                $queryA_recibe .= " and (a_recibe.f_radica >= '".trim($ini)." 00:00:00'";
                                $queryA_envia .= " and (a_envia.f_radica >= '".trim($ini)." 00:00:00'";
                            break;
                            case 'radi_fech_radi_end': 
                                $end = $request['form']['radi_fech_radi_end'] ?? date('Y-m-d'); 
                                $queryHist4derechopet .=" and hist4.fecharadica <= '".trim($end)." 23:59:59')";
                                $queryHist3notainterna .=" and hist3.ni_fecha <= '".trim($end)." 23:59:59')";
                                $queryHist2envía .=" and hist2.f_envio <= '".trim($end)." 23:59:59')";
                                $queryHist1recibe .=" and hist1.f_radica <= '".trim($end)." 23:59:59')";
                                $queryA_recibe .= " and a_recibe.f_radica <= '".trim($end)." 23:59:59')";
                                $queryA_envia .= " and a_envia.f_radica <= '".trim($end)." 23:59:59')";
                            break;
                        }
                    }
                }
            }

            $queryHist4derechopet .= " ORDER BY fecha_rad DESC LIMIT 1000";
            $queryHist3notainterna .= " ORDER BY fecha_rad DESC LIMIT 1000";
            $queryHist2envía .= " ORDER BY fecha_rad DESC LIMIT 1000";
            $queryHist1recibe .= " ORDER BY fecha_rad DESC LIMIT 1000";
            $queryA_recibe .= " ORDER BY fecha_rad DESC LIMIT 1000";
            $queryA_envia .= " ORDER BY fecha_rad DESC LIMIT 1000";
            //print_r($queryRadicados);die(); # SQL

            // print_r($usua_session->fields);die();
            $rsRadicadosHist2envía = $dbProcess->conn->query($queryHist2envía);
            $rsRadicadosHist1recibe = $dbProcess->conn->query($queryHist1recibe);
            $rsRadicadosHist4derechopet = $dbProcess->conn->query($queryHist4derechopet);
            $rsRadicadosHist3notainterna = $dbProcess->conn->query($queryHist3notainterna);  
            $rsRadicadosA_recibe = $dbProcess->conn->query($queryA_recibe);  
            $rsRadicadosA_envia = $dbProcess->conn->query($queryA_envia);
            // print_r($usua_session->fields);die();

            $tableRadicados = "";

            if(isset($rsRadicadosHist4derechopet)){
                while (!$rsRadicadosHist4derechopet->EOF) {
    
                    $result[] = [
                        'radi_nume_radi' => trim($rsRadicadosHist4derechopet->fields['num_rad']) ?? 'Sin información',
                        'radi_fech_radi' => date('Y-m-d H:i', strtotime($rsRadicadosHist4derechopet->fields['fecha_rad'])),
                        'ra_asun'        => trim($rsRadicadosHist4derechopet->fields['asunto']) ?? 'Sin información',
                        'nombre'         => trim($rsRadicadosHist4derechopet->fields['remitente']) ?? 'Sin información',
                        'documento'      => trim($rsRadicadosHist4derechopet->fields['doc_remitente']) ?? 'Sin información',
                        'radi_depe_actu' => $rsRadicadosHist4derechopet->fields['dependencia_resp'] ?? 'Sin información',
                        'funcionario' => $rsRadicadosHist4derechopet->fields['funcionario'] ?? 'Sin información',
                        'respuesta' => $rsRadicadosHist4derechopet->fields['respuesta'] ?? 'Sin información',
                        'anexos' => $rsRadicadosHist4derechopet->fields['anexos'] ?? 'Sin información',
                    ];
                    
                    $rsRadicadosHist4derechopet->MoveNext();
                }
            }
            if(isset($rsRadicadosHist3notainterna)){
                while (!$rsRadicadosHist3notainterna->EOF) {
    
                    $result[] = [
                        'radi_nume_radi' => trim($rsRadicadosHist3notainterna->fields['num_rad']) ?? 'Sin información',
                        'radi_fech_radi' => date('Y-m-d H:i', strtotime($rsRadicadosHist3notainterna->fields['fecha_rad'])),
                        'ra_asun'        => trim($rsRadicadosHist3notainterna->fields['asunto']) ?? 'Sin información',
                        'nombre'         => trim($rsRadicadosHist3notainterna->fields['remitente']) ?? 'Sin información',
                        'documento'      => trim($rsRadicadosHist3notainterna->fields['doc_remitente']) ?? 'Sin información',
                        'radi_depe_actu' => $rsRadicadosHist3notainterna->fields['dependencia_resp'] ?? 'Sin información',
                        'funcionario' => $rsRadicadosHist3notainterna->fields['funcionario'] ?? 'Sin información',
                        'respuesta' => $rsRadicadosHist3notainterna->fields['respuesta'] ?? 'Sin información',
                        'anexos' => $rsRadicadosHist3notainterna->fields['anexos'] ?? 'Sin información',
                    ];
                    
                    $rsRadicadosHist3notainterna->MoveNext();
                }
            }
            if(isset($rsRadicadosHist2envía)){
                while (!$rsRadicadosHist2envía->EOF) {
    
                    $result[] = [
                        'radi_nume_radi' => trim($rsRadicadosHist2envía->fields['num_rad']) ?? 'Sin información',
                        'radi_fech_radi' => date('Y-m-d H:i', strtotime($rsRadicadosHist2envía->fields['fecha_rad'])),
                        'ra_asun'        => trim($rsRadicadosHist2envía->fields['asunto']) ?? 'Sin información',
                        'nombre'         => trim($rsRadicadosHist2envía->fields['remitente']) ?? 'Sin información',
                        'documento'      => trim($rsRadicadosHist2envía->fields['doc_remitente']) ?? 'Sin información',
                        'radi_depe_actu' => $rsRadicadosHist2envía->fields['dependencia_resp'] ?? 'Sin información',
                        'funcionario' => $rsRadicadosHist2envía->fields['funcionario'] ?? 'Sin información',
                        'respuesta' => $rsRadicadosHist2envía->fields['respuesta'] ?? 'Sin información',
                        'anexos' => $rsRadicadosHist2envía->fields['anexos'] ?? 'Sin información',
                    ];
                    
                    $rsRadicadosHist2envía->MoveNext();
                }
            }
            if(isset($rsRadicadosHist1recibe)){
                while (!$rsRadicadosHist1recibe->EOF) {
    
                    $result[] = [
                        'radi_nume_radi' => trim($rsRadicadosHist1recibe->fields['num_rad']) ?? 'Sin información',
                        'radi_fech_radi' => date('Y-m-d H:i', strtotime($rsRadicadosHist1recibe->fields['fecha_rad'])),
                        'ra_asun'        => trim($rsRadicadosHist1recibe->fields['asunto']) ?? 'Sin información',
                        'nombre'         => trim($rsRadicadosHist1recibe->fields['remitente']) ?? 'Sin información',
                        'documento'      => trim($rsRadicadosHist1recibe->fields['doc_remitente']) ?? 'Sin información',
                        'radi_depe_actu' => $rsRadicadosHist1recibe->fields['dependencia_resp'] ?? 'Sin información',
                        'funcionario' => $rsRadicadosHist1recibe->fields['funcionario'] ?? 'Sin información',
                        'respuesta' => $rsRadicadosHist1recibe->fields['respuesta'] ?? 'Sin información',
                        'anexos' => $rsRadicadosHist1recibe->fields['anexos'] ?? 'Sin información',
                    ];
                    
                    $rsRadicadosHist1recibe->MoveNext();
                }
            }
            if(isset($rsRadicadosA_recibe)){
                while (!$rsRadicadosA_recibe->EOF) {
    
                    $result[] = [
                        'radi_nume_radi' => trim($rsRadicadosA_recibe->fields['num_rad']) ?? 'Sin información',
                        'radi_fech_radi' => date('Y-m-d H:i', strtotime($rsRadicadosA_recibe->fields['fecha_rad'])),
                        'ra_asun'        => trim($rsRadicadosA_recibe->fields['asunto']) ?? 'Sin información',
                        'nombre'         => trim($rsRadicadosA_recibe->fields['remitente']) ?? 'Sin información',
                        'documento'      => trim($rsRadicadosA_recibe->fields['doc_remitente']) ?? 'Sin información',
                        'radi_depe_actu' => $rsRadicadosA_recibe->fields['dependencia_resp'] ?? 'Sin información',
                        'funcionario' => $rsRadicadosA_recibe->fields['funcionario'] ?? 'Sin información',
                        'respuesta' => $rsRadicadosA_recibe->fields['respuesta'] ?? 'Sin información',
                        'anexos' => $rsRadicadosA_recibe->fields['anexos'] ?? 'Sin información',
                    ];
                    
                    $rsRadicadosA_recibe->MoveNext();
                }
            }
            if(isset($rsRadicadosA_envia)){
                while (!$rsRadicadosA_envia->EOF) {
    
                    $result[] = [
                        'radi_nume_radi' => trim($rsRadicadosA_envia->fields['num_rad']) ?? 'Sin información',
                        'radi_fech_radi' => date('Y-m-d H:i', strtotime($rsRadicadosA_envia->fields['fecha_rad'])),
                        'ra_asun'        => trim($rsRadicadosA_envia->fields['asunto']) ?? 'Sin información',
                        'nombre'         => trim($rsRadicadosA_envia->fields['remitente']) ?? 'Sin información',
                        'documento'      => trim($rsRadicadosA_envia->fields['doc_remitente']) ?? 'Sin información',
                        'radi_depe_actu' => $rsRadicadosA_envia->fields['dependencia_resp'] ?? 'Sin información',
                        'funcionario' => $rsRadicadosA_envia->fields['funcionario'] ?? 'Sin información',
                        'respuesta' => $rsRadicadosA_envia->fields['respuesta'] ?? 'Sin información',
                        'anexos' => $rsRadicadosA_envia->fields['anexos'] ?? 'Sin información',
                    ];
                    
                    $rsRadicadosA_envia->MoveNext();
                }
            }

            foreach($result as $value){

                $tableRadicados .= "<tr>";
                    # datos del radicado
                    $tableRadicados .= "<td>".$value['radi_nume_radi']."</td>";   // <th>Número de Radicado</th>
                    $tableRadicados .= "<td>".$value['radi_fech_radi']."</td>";   // <th>Fecha de Radicación</th>
                    $tableRadicados .= "<td width=170>".$value['ra_asun']."</td>";          // <th>Asunto del Radicado</th> 
                    $tableRadicados .= "<td>".$value['anexos']."</td>";          // <th>Asunto del Radicado</th>    
                    $tableRadicados .= "<td>".$value['respuesta']."</td>";          // <th>Asunto del Radicado</th> 
                    # datos del remitente
                    $tableRadicados .= "<td>".$value['nombre']."</td>";      // <th>Remitente/Destinatario</th>
                    $tableRadicados .= "<td>".$value['documento']."</td>";      // <th>Nit o Documento </th>
                    # dependencia
                    $tableRadicados .= "<td>".$value['radi_depe_actu']."</td>";   // <th>Dependencia Radicadora</th>
                    $tableRadicados .= "<td>".$value['funcionario']."</td>";   // <th>Dependencia Radicadora</th>
                    # action
                    $tableRadicados .= 
                    
                    "<td class='btn-action-content'>"
                        // .'<span style="color: #1c4056;" class="glyphicon glyphicon-paperclip btn-action" data-toggle="tooltip" title="Ver Documentos." aria-hidden="true" onclick="documet(\''.$value['radi_nume_radi'].'\')"></span>'   // Ver Documentos,     
                        .'<span style="color: #8f0000;" class="glyphicon glyphicon-time btn-action"  data-toggle="tooltip" title="Ver Historico."  aria-hidden="true" onclick="history(\''.$value['radi_nume_radi'].'\')"></span>'   // Ver historico</th>
                    ."</td>";  

                $tableRadicados .= "</tr>";

            }

            echo $tableRadicados; 

        break;
    }

    function TRD($cod_radi, $coddocu){

        $dir_raiz = $_SESSION['dir_raiz'];
        include_once "$dir_raiz/include/db/ConnectionDB.php";
        $dbProcess = new ConnectionDB("$dir_raiz");
        $dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);

        // print_r($cod_radi); print_r(" - "); print_r($coddocu); die();
    
        /** Indica si el Radicado Ya tiene asociado algun TRD */
        $isql_TRDA = "SELECT * FROM SGD_RDF_RETDOCF WHERE RADI_NUME_RADI = '$cod_radi'";
        $rs_TRA = $dbProcess->conn->query($isql_TRDA);
        $radiNumero = $assoc == 0 ? $rs_TRA->fields["radi_nume_radi"] : $rs_TRA->fields["RADI_NUME_RADI"];
        $mrdTRD = $assoc == 0 ? $rs_TRA->fields["sgd_mrd_codigo"] : $rs_TRA->fields["SGD_MRD_CODIGO"];

        $selectTRD = "select distinct tp.sgd_tpr_descrip, sr.sgd_srd_descrip, srb.sgd_sbrd_descrip from sgd_mrd_matrird mrd";

        if ($radiNumero == '') {
            /* Para extraer la información que tiene asignado el anexo cargado, serie, subserie, tipodocumental */
            $trdAnex = "select sgd_sbrd_codigo, sgd_srd_codigo, sgd_tpr_codigo from anexos where anex_codigo='$coddocu'";
            $rsselect_TRA_anex = $dbProcess->conn->query($trdAnex);

            $codserieanex = $assoc == 0 ? $rsselect_TRA_anex->fields["sgd_srd_codigo"] : $rsselect_TRA_anex->fields["SGD_SRD_CODIGO"];
            $tsubanex = $assoc == 0 ? $rsselect_TRA_anex->fields["sgd_sbrd_codigo"] : $rsselect_TRA_anex->fields["SGD_SBRD_CODIGO"];
            $tdocanex = $assoc == 0 ? $rsselect_TRA_anex->fields["sgd_tpr_codigo"] : $rsselect_TRA_anex->fields["SGD_TPR_CODIGO"];

            $selectTRD .= " inner join sgd_tpr_tpdcumento tp on mrd.sgd_tpr_codigo=tp.sgd_tpr_codigo
                    inner join sgd_sbrd_subserierd srb on mrd.sgd_sbrd_codigo=srb.sgd_sbrd_codigo 
                    inner join sgd_srd_seriesrd sr on mrd.sgd_srd_codigo=sr.sgd_srd_codigo 
                where srb.sgd_srd_codigo=sr.sgd_srd_codigo and mrd.sgd_tpr_codigo = $tdocanex "
                    . "and mrd.sgd_srd_codigo = $codserieanex and mrd.sgd_sbrd_codigo = $tsubanex";
        } else {
            $selectTRD .= " inner join sgd_rdf_retdocf rdf on mrd.sgd_mrd_codigo=rdf.sgd_mrd_codigo 
                    inner join sgd_tpr_tpdcumento tp on mrd.sgd_tpr_codigo=tp.sgd_tpr_codigo
                    inner join sgd_sbrd_subserierd srb on mrd.sgd_sbrd_codigo=srb.sgd_sbrd_codigo 
                    inner join sgd_srd_seriesrd sr on mrd.sgd_srd_codigo=sr.sgd_srd_codigo 
                where  srb.sgd_srd_codigo=sr.sgd_srd_codigo and mrd.sgd_mrd_codigo = $mrdTRD and rdf.radi_nume_radi='$radiNumero'";
        }
        $rsselect_TRA = $dbProcess->conn->query($selectTRD);
        
        /* Se agrega esta*/
        $datoSgd_tpr_descrip = $assoc == 0 ? $rsselect_TRA->fields["sgd_tpr_descrip"] : $rsselect_TRA_anex->fields["SGD_TPR_DESCRIP"];
        $datoSgd_srd_descrip = $assoc == 0 ? $rsselect_TRA->fields["sgd_srd_descrip"] : $rsselect_TRA_anex->fields["SGD_SRD_DESCRIP"];
        $datoSgd_sbrd_descrip = $assoc == 0 ? $rsselect_TRA->fields["sgd_sbrd_descrip"] : $rsselect_TRA_anex->fields["SGD_SBRD_DESCRIP"];

        if ($datoSgd_tpr_descrip != '') {
            $msg_TRD = $datoSgd_srd_descrip . ' /  <br>' . $datoSgd_sbrd_descrip . ' /  <br>' . $datoSgd_tpr_descrip;
        } else {
            $trdAnex = "select sgd_sbrd_codigo as SGD_SBRD_CODIGO, sgd_srd_codigo, sgd_tpr_codigo from anexos where anex_codigo='$coddocu'";
            $rsselect_TRA_anex = $dbProcess->conn->query($trdAnex);

            if ($rsselect_TRA_anex->fields["SGD_SBRD_CODIGO"] != '') {
                $srserie = $assoc == 0 ? $rsselect_TRA_anex->fields["sgd_srd_codigo"] : $rsselect_TRA_anex->fields["SGD_SRD_CODIGO"];
                $srbserie = $assoc == 0 ? $rsselect_TRA_anex->fields["sgd_sbrd_codigo"] : $rsselect_TRA_anex->fields["SGD_SBRD_CODIGO"];
                $srtipodoc = $assoc == 0 ? $rsselect_TRA_anex->fields["sgd_tpr_codigo"] : $rsselect_TRA_anex->fields["SGD_TPR_CODIGO"];
                /************************************************************************************** 
                 * Se consulta tabla por tabla la información correspondiente a la trd desde Skinascan *
                 * ************************************************************************************* */
                $infoserie = "select sgd_srd_descrip as SGD_SRD_DESCRIP from sgd_srd_seriesrd where sgd_srd_codigo=" . $srserie;
                $rsinfoserie = $dbProcess->conn->query($infoserie);
                $infosubserie = "select sgd_sbrd_descrip as SGD_SBRD_DESCRIP from sgd_sbrd_subserierd where sgd_srd_codigo=" . $srserie . " and sgd_sbrd_codigo=" . $srbserie;
                $rsinfosubserie = $dbProcess->conn->query($infosubserie);
                $infotipodoc = "select sgd_tpr_descrip as SGD_TPR_DESCRIP from sgd_tpr_tpdcumento where sgd_tpr_codigo=" . $srtipodoc;
                $rsinfotipodoc = $dbProcess->conn->query($infotipodoc);

                $msg_TRD = $rsinfoserie->fields["SGD_SRD_DESCRIP"] . ' / <br> ' . $rsinfosubserie->fields["SGD_SBRD_DESCRIP"] . ' / <br>' . $rsinfotipodoc->fields["SGD_TPR_DESCRIP"];
            } else {
                $msg_TRD = "No";
            }
        }

        return $msg_TRD;
      
    }

    function TRD_RADICADO($cod_radi) {

        $dir_raiz = $_SESSION['dir_raiz'];
        include_once "$dir_raiz/include/db/ConnectionDB.php";
        $dbProcess = new ConnectionDB("$dir_raiz");
        $dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);

        // print_r($cod_radi); die();
    
        /** Indica si el Radicado Ya tiene asociado algun TRD */
        $isql_TRDA = "SELECT * FROM SGD_RDF_RETDOCF WHERE RADI_NUME_RADI = '$cod_radi'";
        $rs_TRA = $dbProcess->conn->query($isql_TRDA);
        $radiNumero = $assoc == 0 ? $rs_TRA->fields["radi_nume_radi"] : $rs_TRA->fields["RADI_NUME_RADI"];
        $mrdTRD = $assoc == 0 ? $rs_TRA->fields["sgd_mrd_codigo"] : $rs_TRA->fields["SGD_MRD_CODIGO"];

        if ($radiNumero != null && $radiNumero != '') {

            $selectTRD = "select distinct tp.sgd_tpr_descrip, sr.sgd_srd_descrip, srb.sgd_sbrd_descrip from sgd_mrd_matrird mrd
                    inner join sgd_rdf_retdocf rdf on mrd.sgd_mrd_codigo=rdf.sgd_mrd_codigo 
                    inner join sgd_tpr_tpdcumento tp on mrd.sgd_tpr_codigo=tp.sgd_tpr_codigo
                    inner join sgd_sbrd_subserierd srb on mrd.sgd_sbrd_codigo=srb.sgd_sbrd_codigo 
                    inner join sgd_srd_seriesrd sr on mrd.sgd_srd_codigo=sr.sgd_srd_codigo 
                where  srb.sgd_srd_codigo=sr.sgd_srd_codigo and mrd.sgd_mrd_codigo = $mrdTRD and rdf.radi_nume_radi='$radiNumero'";
            $rsselect_TRA = $dbProcess->conn->query($selectTRD);

            $datoSgd_tpr_descrip = $assoc == 0 ? $rsselect_TRA->fields["sgd_tpr_descrip"] : $rsselect_TRA_anex->fields["SGD_TPR_DESCRIP"];
            $datoSgd_srd_descrip = $assoc == 0 ? $rsselect_TRA->fields["sgd_srd_descrip"] : $rsselect_TRA_anex->fields["SGD_SRD_DESCRIP"];
            $datoSgd_sbrd_descrip = $assoc == 0 ? $rsselect_TRA->fields["sgd_sbrd_descrip"] : $rsselect_TRA_anex->fields["SGD_SBRD_DESCRIP"];

            if ($datoSgd_tpr_descrip != null  && $datoSgd_tpr_descrip != '') {
                $msg_TRD = $datoSgd_srd_descrip . ' /  <br>' . $datoSgd_sbrd_descrip . ' /  <br>' . $datoSgd_tpr_descrip;
            } else {
                $msg_TRD = "No";
            }

        } else {
            $msg_TRD = "No";
        }

        return $msg_TRD;
    }

?>
