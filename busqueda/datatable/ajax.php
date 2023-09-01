<?php

    session_start();
    $url_raiz = "../..";
    $dir_raiz = $_SESSION['dir_raiz'];
    $ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
    $ambiente = $_SESSION['ambiente'];
    $usua_perm_consulta_rad = $_SESSION["usua_perm_consulta_rad"];

    include "../../config.php";
    include_once "$dir_raiz/include/db/ConnectionHandler.php";
    $dbProcess = new ConnectionHandler("$dir_raiz");
    include_once "$dir_raiz/include/db/ConnectionDB.php";
    $dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);

    $dbProcessNew = new ConnectionDB("$dir_raiz", false);
    $dbProcessNew->conn->SetFetchMode(ADODB_FETCH_ASSOC);

    //Incluido el archivo que tiene la clase historico
    include("../../include/tx/Historico.php");
    $historiRecord = new Historico($dbProcess);

    switch($_POST['type']){
       
        # Busqueda de Documentos
        case '1':

            $request = $_POST;
            /* print_r($_POST);
            exit; */

            $queryRadicados = "SELECT radicado.*, sgd_exp_expediente.*, sgd_sexp_secexpedientes.*, sgd_dir_drecciones.* FROM radicado";
            # join a expedientes - radicado 
            $queryRadicados .= " LEFT JOIN sgd_exp_expediente ON radicado.radi_nume_radi = sgd_exp_expediente.radi_nume_radi";
            # join a detalles expedientes 
            $queryRadicados .= " LEFT JOIN sgd_sexp_secexpedientes ON sgd_exp_expediente.sgd_exp_numero = sgd_sexp_secexpedientes.sgd_exp_numero";
            # join a dir direcciones  
            $queryRadicados .= " INNER JOIN sgd_dir_drecciones ON radicado.radi_nume_radi = sgd_dir_drecciones.radi_nume_radi";


            if(isset($request['form']) && !empty($request['form'])){

                $queryRadicados .= " WHERE 1 = 1";
                foreach ($request['form'] as $key => $value) {
                    if(isset($request['form'][$key]) && !empty($request['form'][$key])){
                       
                        $valorBuscado = trim($value);

                        switch ($key) {
                            case 'radi_nume_radi':
                                $queryRadicados .= " and  radicado.radi_nume_radi LIKE '%".$valorBuscado."%'";
                            break;
                            case 'sgd_sexp_parexp1':
                                $queryRadicados .= " and  sgd_sexp_secexpedientes.sgd_sexp_parexp1 LIKE '%".$valorBuscado."%'";
                            break;
                            case 'sgd_exp_numero':
                                $queryRadicados .= " and  sgd_sexp_secexpedientes.sgd_exp_numero LIKE '%".$valorBuscado."%'";
                            break;
                            case 'ra_asun':
                                $queryRadicados .= " and  radicado.ra_asun LIKE '%".$valorBuscado."%'";
                            break;
                            case 'sgd_dir_nomremdes':
                                $queryRadicados .= " AND  sgd_dir_drecciones.sgd_dir_nomremdes LIKE '%".$valorBuscado."%'";
                            break;
                            case 'sgd_dir_doc':
                                $queryRadicados .= " AND  sgd_dir_drecciones.sgd_dir_doc LIKE '%".$valorBuscado."%'";
                            break;
                            case 'radi_depe_radi':
                                $queryRadicados .= " AND  radicado.radi_depe_radi = '".$valorBuscado."'";
                            break;
                            case 'radi_depe_actu':
                                $queryRadicados .= " AND  radicado.radi_depe_actu = '".$valorBuscado."'";
                            break;
                            case 'sgd_trad_codigo':
                                $queryRadicados .= " AND  RIGHT(radicado.radi_nume_radi,1) = '".$valorBuscado."'";
                            break;
                            case 'tdoc_codi':
                                $queryRadicados .= " AND  radicado.tdoc_codi = ".$valorBuscado;
                            break;
                            case 'radi_fech_radi_ini': 
                                $ini = $request['form']['radi_fech_radi_ini'] ?? date('Y-m-d'); 
                                $queryRadicados .=" AND  radicado.radi_fech_radi >= '".trim($ini)." 00:00:00'";
                            break;
                            case 'radi_fech_radi_end': 
                                $end = $request['form']['radi_fech_radi_end'] ?? date('Y-m-d'); 
                                $queryRadicados .=" AND  radicado.radi_fech_radi <= '".trim($end)." 23:59:59'";
                            break;
                        }
                    }
                }
            }

            # niveles de busqueda -> usua_nivel_consulta
            # print_r($_SESSION);die();

            # consultar usuario
            $sql = "SELECT * FROM usuario WHERE usua_doc = '".$_SESSION['usua_doc']."'";
            $usua_session = $dbProcessNew->conn->query($sql); // false: para NO consultar la BD historico (consultar la principal porque son permisos de usuario)

            $queryRadicados .= " ORDER BY radi_fech_radi DESC  LIMIT 1000";
            //print_r($queryRadicados);die(); # SQL

            // print_r($usua_session->fields);die();
            $rsRadicados = $dbProcess->conn->query($queryRadicados);

            $tableRadicados = "";

            if(isset($rsRadicados)){
                while (!$rsRadicados->EOF) {

                    $continuar = TRUE;
                    # usuario
                    $radi_usua_actu = $dbProcess->conn->query("SELECT * FROM usuario WHERE usua_codi =".$rsRadicados->fields['radi_usua_actu']." AND depe_codi = '".$rsRadicados->fields["radi_depe_actu"]."'"); 
                    $radi_usua_radi = $dbProcess->conn->query("SELECT usua_nomb FROM usuario WHERE usua_codi =".$rsRadicados->fields['radi_usua_radi']." AND depe_codi = '".$rsRadicados->fields["radi_depe_radi"]."'"); 
                    if(!empty($request['form']['radi_usua_actu'])) {
                        $buscaUsuaActu = stripos($radi_usua_actu->fields['usua_nomb'], $request['form']['radi_usua_actu']);
                        if($buscaUsuaActu === FALSE) {
                            $continuar = FALSE;
                        }
                    }
                    if(!empty($request['form']['radi_usua_radi'])) {
                        $buscaUsuaRadi = stripos($radi_usua_radi->fields['usua_nomb'], $request['form']['radi_usua_radi']);
                        if($buscaUsuaRadi === FALSE) {
                            $continuar = FALSE;
                        }
                    }
                    if($continuar) {
                        # dependencias
                        $radi_depe_radi = $dbProcess->conn->query("SELECT depe_nomb FROM dependencia WHERE depe_codi = '".$rsRadicados->fields['radi_depe_radi']."'"); 
                        $radi_depe_actu  = $dbProcess->conn->query("SELECT depe_nomb FROM dependencia WHERE depe_codi = '".$rsRadicados->fields['radi_depe_actu']."'"); 
                        # tipo documental
                        $cod_tp_tpdcumento = $dbProcess->query("SELECT sgd_tpr_descrip FROM sgd_tpr_tpdcumento WHERE sgd_tpr_codigo = ".$rsRadicados->fields['tdoc_codi']);

                        # consultar remitente en sgd_ciu_ciudadano
                        $remitente = $dbProcess->conn->query("SELECT sgd_ciu_nombre AS nombre ,sgd_ciu_cedula AS documento  FROM sgd_ciu_ciudadano WHERE sgd_ciu_codigo =".$rsRadicados->fields['sgd_ciu_codigo']); 

                        if(empty($remitente)){
                            # consultar remitente en bodega_empresas
                            $remitente = $dbProcess->conn->query("SELECT nombre_de_la_empresa AS nombre ,nit_de_la_empresa AS documento  FROM bodega_empresas WHERE identificador_empresa =".$rsRadicados->fields['sgd_esp_codi']);
                            if(empty($remitente)){
                                # consultar remitente en sgd_oem_oempresas
                                $remitente = $dbProcess->conn->query("SELECT sgd_oem_oempresa AS nombre ,sgd_oem_nit AS documento  FROM sgd_oem_oempresas WHERE sgd_oem_codigo =".$rsRadicados->fields['sgd_oem_codigo']);
                            }
                        }

                        if(empty($remitente)){
                            $remitenteNombre = 'Sin información';
                            $remitenteDocume = 'Sin información';
                        }else{
                            $remitenteNombre = $remitente->fields['nombre'];
                            $remitenteDocume = $remitente->fields['documento'];
                        }

                        if(isset($rsRadicados->fields['radi_desc_anex'])){
                            $radi_desc_anex = trim($rsRadicados->fields['radi_desc_anex']);
                        }else{
                            $radi_desc_anex = 'Sin especificar';
                        }

                        $result[] = [
                            'radi_nume_radi' => $rsRadicados->fields['radi_nume_radi'],
                            'radi_fech_radi' => date('Y-m-d H:i', strtotime($rsRadicados->fields['radi_fech_radi'])),
                            'ra_asun'        => trim($rsRadicados->fields['ra_asun']) ?? 'Sin especificar asunto',
                            // 'radi_desc_anex' => $radi_desc_anex,
                            'sgd_exp_numero' => $rsRadicados->fields['sgd_exp_numero'] ?? 'Sin Expediente',
                            'sgd_exp_nomb'   => $rsRadicados->fields['sgd_sexp_parexp1'] ?? 'Sin Expediente',
                            'nombre'         => $remitenteNombre,
                            'documento'      => $remitenteDocume,
                            'radi_usua_actu' => $radi_usua_actu->fields['usua_nomb'] ?? 'No encontrado',
                            'radi_usua_radi' => $radi_usua_radi->fields['usua_nomb'] ?? 'No encontrado',
                            'radi_depe_radi' => $radi_depe_radi->fields['depe_nomb'] ?? 'No encontrado',
                            'radi_depe_actu' => $radi_depe_actu->fields['depe_nomb'] ?? 'No encontrado',
                            'sgd_tpr_descri' => $cod_tp_tpdcumento->fields['sgd_tpr_descrip'] ?? 'No encontrado',
                        ];
                        
                    }
                    $rsRadicados->MoveNext();
                }
            }

            foreach($result as $value){

                $tableRadicados .= "<tr>";
                    # datos del radicado
                    $tableRadicados .= "<td>".$value['radi_nume_radi']."</td>";   // <th>Número de Radicado</th>
                    $tableRadicados .= "<td>".$value['radi_fech_radi']."</td>";   // <th>Fecha de Radicación</th>
                    $tableRadicados .= "<td width=200>".$value['ra_asun']."</td>";          // <th>Asunto del Radicado</th>
                    // $tableRadicados .= "<td>".$value['radi_desc_anex']."</td>";          // <th>Asunto del Radicado</th>   
                    # datos del expediente      
                    $tableRadicados .= "<td>".$value['sgd_exp_numero']."</td>";   // <th>Número Expediente</th>
                    $tableRadicados .= "<td>".$value['sgd_exp_nomb']."</td>";     // <th>Nombre expediente</th>
                    # datos del remitente
                    $tableRadicados .= "<td>".$value['nombre']."</td>";      // <th>Remitente/Destinatario</th>
                    $tableRadicados .= "<td>".$value['documento']."</td>";      // <th>Nit o Documento </th>
                    # dependencia
                    $tableRadicados .= "<td>".$value['radi_depe_radi']."</td>";   // <th>Dependencia Radicadora</th>
                    # tramitador
                    $tableRadicados .= "<td>".$value['radi_usua_radi']."</td>";   // <th>Usuario Radicador</th>
                    # Dependencia Actual
                    $tableRadicados .= "<td>".$value['radi_depe_actu']."</td>";   // <th>Dependencia Actual</th>
                    $tableRadicados .= "<td>".$value['radi_usua_actu']."</td>";   // <th>Usuario Actual</th>
                    # tipo documental   
                    $tableRadicados .= "<td>".$value['sgd_tpr_descri']."</td>";   // <th>Tipo Documental</th>
                    # action
                    $tableRadicados .= 
                    
                    "<td class='btn-action-content'>"
                        .'<span style="color: #1c4056;" class="glyphicon glyphicon-paperclip btn-action" data-toggle="tooltip" title="Ver Documentos." aria-hidden="true" onclick="documet(\''.$value['radi_nume_radi'].'\')"></span>'   // Ver Documentos,     
                        .'<span style="color: #8f0000;" class="glyphicon glyphicon-time btn-action"  data-toggle="tooltip" title="Ver Historico."  aria-hidden="true" onclick="history(\''.$value['radi_nume_radi'].'\')"></span>'   // Ver historico</th>
                    ."</td>";  

                $tableRadicados .= "</tr>";

            }

            echo $tableRadicados; 

        break;

        # Historico de Radicados
        case '2':

            $request = $_POST;

            $queryRadicados = "SELECT * FROM radicado WHERE radi_nume_radi = '".$request['radi_nume_radi']."'";
            $rsRadicados = $dbProcess->conn->query($queryRadicados);

            while (!$rsRadicados->EOF) {

                # usuario
                $radi_usua_actu = $dbProcess->conn->query("SELECT * FROM usuario WHERE usua_codi =".$rsRadicados->fields['radi_usua_actu']." AND depe_codi = '".$rsRadicados->fields["radi_depe_actu"]."'"); 
                $radi_usua_radi = $dbProcess->conn->query("SELECT usua_nomb FROM usuario WHERE usua_codi =".$rsRadicados->fields['radi_usua_radi']." AND depe_codi = '".$rsRadicados->fields["radi_depe_radi"]."'"); 
                # dependencias
                $radi_depe_radi = $dbProcess->conn->query("SELECT depe_nomb FROM dependencia WHERE depe_codi = '".$rsRadicados->fields['radi_depe_radi']."'"); 
                $radi_depe_actu  = $dbProcess->conn->query("SELECT depe_nomb FROM dependencia WHERE depe_codi = '".$rsRadicados->fields['radi_depe_actu']."'"); 

                $details = [
                    'radi_usua_actu' => $radi_usua_actu->fields['usua_nomb'] ?? 'x',
                    'radi_usua_radi' => $radi_usua_radi->fields['usua_nomb'] ?? 'x',
                    'radi_depe_radi' => $radi_depe_radi->fields['depe_nomb'] ?? 'x',
                    'radi_depe_actu' => $radi_depe_actu->fields['depe_nomb'] ?? 'x',
                ];
                
                $rsRadicados->MoveNext();
            }

            # historial && eventos
            $hist_eventos = "SELECT * FROM hist_eventos WHERE radi_nume_radi ='".$request['radi_nume_radi']."'";
            $hist_eventos .= " ORDER BY hist_fech DESC";
            $rsHistEvents= $dbProcess->conn->query($hist_eventos);

            while (!$rsHistEvents->EOF) {

                # dependencia
                $depe_codi  = $dbProcess->conn->query("SELECT depe_nomb FROM dependencia WHERE depe_codi = '".$rsHistEvents->fields['depe_codi']."'"); 
                # transaccion
                $sgd_ttr_codigo = $dbProcess->conn->query("SELECT sgd_ttr_descrip FROM sgd_ttr_transaccion WHERE sgd_ttr_codigo = ".$rsHistEvents->fields['sgd_ttr_codigo']); 
                # usuario
                $usua_doc = $dbProcess->conn->query("SELECT usua_nomb FROM usuario WHERE usua_doc = '".$rsHistEvents->fields['usua_doc']."'"); 

                $result[] = [
                    'depe_nomb' => $depe_codi->fields['depe_nomb'],
                    'hist_fech' => date('Y-m-d H:i', strtotime($rsHistEvents->fields['hist_fech'])),
                    'sgd_ttr_codigo' => $sgd_ttr_codigo->fields['sgd_ttr_descrip'],
                    'usua_nomb' => $usua_doc->fields['usua_nomb'],
                    'hist_obse' => $rsHistEvents->fields['hist_obse']
                ];

                $rsHistEvents->MoveNext();
            }

            ob_start();
            include './views/history.php';
            echo ob_get_clean(); 

        break;

        # Documentos del Radicado
        case '3':

            $request = $_POST;

            $queryRadicados = "SELECT * FROM radicado WHERE radi_nume_radi = '".$request['radi_nume_radi']."'";
            $rsRadicados = $dbProcess->conn->query($queryRadicados);

            while (!$rsRadicados->EOF) {

                # usuario
                $radi_usua_actu = $dbProcess->conn->query("SELECT * FROM usuario WHERE usua_codi =".$rsRadicados->fields['radi_usua_actu']." AND depe_codi = '".$rsRadicados->fields["radi_depe_actu"]."'"); 
                $radi_usua_radi = $dbProcess->conn->query("SELECT usua_nomb FROM usuario WHERE usua_codi =".$rsRadicados->fields['radi_usua_radi']." AND depe_codi = '".$rsRadicados->fields["radi_depe_radi"]."'"); 
                # dependencias
                $radi_depe_radi = $dbProcess->conn->query("SELECT depe_nomb FROM dependencia WHERE depe_codi = '".$rsRadicados->fields['radi_depe_radi']."'"); 
                $radi_depe_actu  = $dbProcess->conn->query("SELECT depe_nomb FROM dependencia WHERE depe_codi = '".$rsRadicados->fields['radi_depe_actu']."'"); 

                $details = [
                    'radi_usua_actu' => $radi_usua_actu->fields['usua_nomb'] ?? 'x',
                    'radi_usua_radi' => $radi_usua_radi->fields['usua_nomb'] ?? 'x',
                    'radi_depe_radi' => $radi_depe_radi->fields['depe_nomb'] ?? 'x',
                    'radi_depe_actu' => $radi_depe_actu->fields['depe_nomb'] ?? 'x',
                ];

                /** Procesar imagen principal del radicado */
                if ($rsRadicados->fields['radi_path'] != null && $rsRadicados->fields['radi_path'] != '') {

                    # TRD
                    $trd = TRD_RADICADO($request['radi_nume_radi']);
                    // var_dump($trd); die();
                    # link
                    $link = $rutaBodegaOLD.''.$rsRadicados->fields['radi_path'];
                    $doc2_b64 = base64_encode(file_get_contents($link, FILE_USE_INCLUDE_PATH));

                    $result[] = [
                        'radi_nume_salida' => $rsRadicados->fields['radi_nume_radi'],
                        'anex_codigo' => '',
                        'anex_tipo_desc' => 'Acrobat Reader(pdf)',
                        'trd_desc' => $trd,
                        'usua_nomb' => $details['radi_usua_radi'],
                        'anex_desc' => $rsRadicados->fields['radi_desc_anex'],
                        'anex_radi_fech' => date('Y-m-d H:i', strtotime($rsRadicados->fields['radi_fech_radi'])),
                        'anex_nomb_archivo' => $rsRadicados->fields['radi_nume_radi'],
                        'documento' => 'Imagen Principal',
                        'link' => $link,
                        'link_document' => $doc2_b64
                    ];
                }
                /** Fin Procesar imagen principal del radicado */
                
                $rsRadicados->MoveNext();
            }

            # historial && eventos
            $anexos = "SELECT * FROM anexos WHERE anex_radi_nume ='".$request['radi_nume_radi']."'";
            $anexos .= " ORDER BY anex_radi_fech DESC";
            $rsAnexos= $dbProcess->conn->query($anexos);

            while (!$rsAnexos->EOF) {

                # anex_tipo
                $anex_tipo  = $dbProcess->conn->query("SELECT anex_tipo_desc, anex_tipo_ext FROM anexos_tipo WHERE anex_tipo_codi = ".$rsAnexos->fields['anex_tipo']); 
                # TRD
                $trd = TRD($request['radi_nume_radi'], $rsAnexos->fields['anex_codigo']);
                # link
                $link = $rutaBodegaOLD . substr(trim($rsAnexos->fields['anex_codigo']), 0, 4) . "/" . $rsAnexos->fields['anex_depe_creador'] . "/docs" . "/".trim(strtoupper(stristr($rsAnexos->fields["anex_nomb_archivo"], ".", true))) . trim(stristr($rsAnexos->fields['anex_nomb_archivo'], "."));   
                $doc2_b64 = base64_encode(file_get_contents($link, FILE_USE_INCLUDE_PATH));

                $result[] = [
                    'radi_nume_salida' =>  $rsAnexos->fields['radi_nume_salida'] ??  $rsAnexos->fields['anex_codigo'],
                    'anex_codigo' => $rsAnexos->fields['anex_codigo'],
                    'anex_tipo_desc' => $anex_tipo->fields['anex_tipo_desc'].'('.$anex_tipo->fields['anex_tipo_ext'].')',
                    'trd_desc' => $trd,
                    'usua_nomb' => $rsAnexos->fields['anex_creador'],
                    'anex_desc' => $rsAnexos->fields['anex_desc'],
                    'anex_radi_fech' => date('Y-m-d H:i', strtotime($rsAnexos->fields['anex_radi_fech'])),
                    'anex_nomb_archivo' =>  $rsAnexos->fields['anex_nomb_archivo'],
                    'documento' => 'Anexo',
                    'link' => $link,
                    'link_document' => $doc2_b64
                ];

                $rsAnexos->MoveNext();
            }

            ob_start();
            include './views/documents.php';
            echo ob_get_clean(); 

        break;

        ###
        # Inventario Documental

        # Inventario Documental --- Cargar Documentos ---
        case '4':

            include "$dir_raiz/config.php";
            require_once("../../include/db/ConnectionHandler.php");

            $db = new ConnectionHandler("$dir_raiz");
            $dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);
            $request = $_POST;  $files = $_FILES;

            # por defecto ajax sube repetido un archivo -> 
            unset($files['upload']);

            # validacion de archivos
            if(isset($files) && !empty($files) && $files['error'] == 0){

                $formatos_permitidos =  array('pdf');

                foreach($files as $key => $file){

                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

                    if(!in_array($extension, $formatos_permitidos) ) {
                        echo '<div class="alert alert-danger" role="alert"> Error el formato del archivo es invalido </div>'; die();
                    }
                }

            }else{
                echo '<div class="alert alert-danger" role="alert"> El archivo es obligatorio </div>'; die();
            }

            $exceptions = ['upload','type'];
            foreach($request as $key => $value){
                if(!in_array($key,$exceptions)){
                    $campos[] = $key;
                    $values[] = "'".$value."'";
                }
            }

            $sql = "INSERT INTO inventario_documental (".implode(',', $campos).") VALUES (".implode(',',$values).")";
            #print_r($sql);die();       
            $rs = $dbProcess->conn->query($sql);

            $id = $dbProcess->conn->query("SELECT nextval('inventario_documental_id_inv_documental_seq')");
            $id_inv_documental = $id->fields['nextval'] - 1;

            if ($rs == -1){
                echo '<div class="alert alert-danger" role="alert"> Error al guardar, Intentelo mas tarde  </div>'; die();
            }

            foreach($files as $key => $value){

                $tmp = $value;  $campos_file = [];  $values_file = [];

                /****   
                 * inventario_documentos
                 * 
                 * id_inv_documento
                 * original_inv_doc
                 * nombre_inv_doc
                 * ruta_inv_doc
                 * tipo_inv_doc
                 * tamano_inv_doc
                 * user_inv_doc
                 * creacion_inv_doc
                 */

                $year = date('Y');

                $ruta = "$dir_raiz/bodega/" . $year . "/inventario";

                if(!file_exists($ruta)){
                    mkdir($ruta, 0775);
                }

                //print_r($value);die();

                $id_inv_documento = $dbProcess->conn->query("SELECT nextval('inventario_documentos_id_inv_documento_seq')");
                $id_inv_documento = $id_inv_documento->fields['nextval'] + 1;

                $value['type'] = pathinfo($value['name'], PATHINFO_EXTENSION);
                $nombre_inv_doc = $year.str_pad('0',6,'0', STR_PAD_LEFT). $id_inv_documento.'.'.$value['type']; 

                $file_name =  $ruta."/".$nombre_inv_doc;

                $data = [
                    'original_inv_doc' => $value['name'],
                    'nombre_inv_doc' => $nombre_inv_doc,
                    'ruta_inv_doc' => $file_name,
                    'tipo_inv_doc' => $value['type'],
                    'tamano_inv_doc' => $value['size'],
                    'user_inv_doc' => $_SESSION['usua_doc'],
                    'creacion_inv_doc' => date("Y-m-d H:i:s"),
                    'id_inv_documental' => $id_inv_documental
                    
                ]; 

                foreach($data as $key => $value){
                    $campos_file[] = $key;
                    $values_file[] = "'".$value."'";
                }

                $sql = "INSERT INTO inventario_documentos (".implode(',', $campos_file).") VALUES (".implode(',',$values_file).")";
                $rs = $dbProcess->conn->query($sql);

                if ($rs == -1){
                    echo '<div class="alert alert-danger" role="alert"> Error al guardar los archivos subidos, Intentelo mas tarde </div>'; die();
                }

                # guardar archivo
                move_uploaded_file($tmp['tmp_name'], $file_name);

            }

            echo ' <div class="alert alert-success" role="alert">Registros Guardados con Exito</div>';
            
        break;

        # Inventario Documental --- Index ---
        case '5':

            include "$dir_raiz/config.php";
            require_once("../../include/db/ConnectionHandler.php");

            $db = new ConnectionHandler("$dir_raiz");
            $dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);

            $request = $_POST; 

            $queryInventario = "SELECT * FROM inventario_documental";
        
            if(isset($request['form']) && !empty($request['form'])){

                $queryInventario .= " WHERE 1 = 1";

                foreach ($request['form'] as $key => $value) {
                    if(isset($request['form'][$key]) && !empty($request['form'][$key])){
                       

                        switch ($key) {
                            case 'uni_administrativa':
                                $queryInventario .= " AND  uni_administrativa = '".$value."'";
                            break;
                            case 'ofi_productora':
                                $queryInventario .= " AND  ofi_productora = '".$value."'";
                            break;
                            case 'objeto':
                                $queryInventario .= " AND  objeto LIKE '%".$value."%'";
                            break;
                            case 'codigo':
                                $queryInventario .= " AND  codigo LIKE '%".$value."%'";
                            break;
                            case 'nombre':
                                $queryInventario .= " AND  nombre = '".$value."'";
                            break;
                            case 'sub_serie':
                                $queryInventario .= " AND  sub_serie = '".$value."'";
                            break;
                            case 'modulo':
                                $queryInventario .= " AND  modulo::TEXT LIKE '%".$value."%'";
                            break;
                            case 'estante':
                                $queryInventario .= " AND  estante::TEXT  LIKE '%".$value."%'";
                            break;
                            case 'caja':
                                $queryInventario .= " AND  caja::TEXT LIKE '%".$value."%'";
                            break;
                            case 'carpeta':
                                $queryInventario .= " AND  carpeta::TEXT LIKE '%".$value."%'";
                            break;
                            case 'tomo':
                                $queryInventario .= " AND  tomo::TEXT LIKE '%".$value."%'";
                            break;
                            case 'otro':
                                $queryInventario .= " AND  otro LIKE '%".$value."%'";
                            break;
                            case 'soporte':
                                $queryInventario .= " AND  soporte = '".$value."'";
                            break;
                            case 'fr_consulta':
                                $queryInventario .= " AND  fr_consulta = '".$value."'";
                            break;
                            case 'fecha_ext_ini': 
                                $ini = $value ?? date('Y-m-d'); 
                                $queryInventario .=" AND  fecha_ext_ini >= '".trim($ini)." 00:00:00'";
                            break;
                            case 'fecha_ext_end': 
                                $end = $value ?? date('Y-m-d'); 
                                $queryInventario .=" AND  fecha_ext_end <= '".trim($end)." 23:59:59'";
                            break;
                        }
                    }
                }
            }
            
            $queryInventario .= " ORDER BY id_inv_documental DESC  LIMIT 100";
            # print_r($queryInventario);die(); # SQL

            $rsInventario = $dbProcess->conn->query($queryInventario);

            # print_r($queryInventario);
            # print_r($rsInventario);die(); # SQL

            $tableInventario = "";

            if(!empty($rsInventario)){
                while (!$rsInventario->EOF) {

                    /**  
                     * 
                     *   Inventario_Documental
                     * 
                     * id_inv_documental
                     * uni_administrativa
                     * ofi_productora
                     * no_orden
                     * objeto
                     * codigo
                     * nombre
                     * sub_serie
                     * fecha_ext_ini
                     * fecha_ext_end
                     * caja
                     * carpeta
                     * tomo
                     * otro
                     * modulo
                     * estante
                     * no_folios
                     * fr_consulta
                     * notas
                     * soporte
                     */

                    if($rsInventario->fields['fr_consulta'] == '1'){
                         $fr_consulta_txt = "Baja";   
                    }

                    if($rsInventario->fields['fr_consulta'] == '2'){
                        $fr_consulta_txt = "Media";   
                    }

                    if($rsInventario->fields['fr_consulta'] == '3'){
                        $fr_consulta_txt = "Alta";   
                    }
                    

                    $result[] = [
                        'id_inv_documental' => $rsInventario->fields['id_inv_documental'],
                        'uni_administrativa' => $rsInventario->fields['uni_administrativa'],
                        'ofi_productora' => $rsInventario->fields['ofi_productora'],
                        'no_orden' => $rsInventario->fields['no_orden'],
                        'objeto' => $rsInventario->fields['objeto'],
                        'codigo' => $rsInventario->fields['codigo'],
                        'nombre' => $rsInventario->fields['nombre'],
                        'sub_serie' => $rsInventario->fields['sub_serie'],
                        'fecha_ext_ini' => date('Y-m-d', strtotime($rsInventario->fields['fecha_ext_ini'])),
                        'fecha_ext_end' => date('Y-m-d', strtotime($rsInventario->fields['fecha_ext_end'])),
                        'modulo' => $rsInventario->fields['modulo'],
                        'estante' => $rsInventario->fields['estante'],
                        'no_folios' => $rsInventario->fields['no_folios'],
                        'soporte' => $rsInventario->fields['soporte'],
                        'fr_consulta' => $fr_consulta_txt,
                        'notas' => $rsInventario->fields['notas'],
                    ];
                    
                    $rsInventario->MoveNext();
                }
            }

            foreach($result as $value){



                /***
                 * 
                 *  <th>Unidad Administradora</th>
                    <th>Oficina Productora</th>

                    <th>Objetivo</th>
                    <th>Codigo</th>
                    <th>Nombre Serie</th>
                    <th>Nombre SubSerie </th>
                    <th>Fechas Extremas </th>

                    <th>Modulo</th>
                    <th>Estante</th>
                    <th>No Folios</th>
                    <th>Soporte</th>
                    <th>Frecuencia</th>

                    <th>Accion</th> <!-- unidad de conservacion / documentos -->
                 * 
                 * 
                 */

                $tableInventario .= "<tr>";
                    # datos del radicado
                    $tableInventario .= "<td>".$value['uni_administrativa']."</td>";  
                    $tableInventario .= "<td>".$value['ofi_productora']."</td>";  
                    $tableInventario .= "<td>".$value['objeto']."</td>";                
                    $tableInventario .= "<td>".$value['codigo']."</td>";  
                    $tableInventario .= "<td>".$value['nombre']."</td>";    
                    $tableInventario .= "<td>".$value['sub_serie']."</td>";   
                    $tableInventario .= "<td>".$value['fecha_ext_ini'].'@'.$value['fecha_ext_end']."</td>";  
                    $tableInventario .= "<td>".$value['no_folios']."</td>"; 
                    $tableInventario .= "<td>".$value['soporte']."</td>";  
                    $tableInventario .= "<td>".$value['fr_consulta']."</td>"; 
                    # action
                    $tableInventario .= 
                    
                    "<td class='btn-action-content'>"
                        .'<span style="color: #7a7a7a;" class="glyphicon glyphicon-folder-open btn-action" data-toggle="tooltip" title="Ver Documentos." aria-hidden="true" onclick="documet(\''.$value['id_inv_documental'].'\')"></span>'   // Ver Documentos,     
                        .'<span style="color: #7a7a7a;" class="glyphicon glyphicon-eye-open btn-action"  data-toggle="tooltip" title="Ver Detalles."  aria-hidden="true" onclick="view(\''.$value['id_inv_documental'].'\')"></span>'   // Ver historico</th>
                    ."</td>";  # glyphicon glyphicon-save-file

                $tableInventario .= "</tr>";

            }

            echo $tableInventario; 

        break;

        # Inventraio Documnetal -- Documentos -- 
        case '6':
            
            include "$dir_raiz/config.php";
            require_once("../../include/db/ConnectionHandler.php");

            $db = new ConnectionHandler("$dir_raiz");
            $dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);

            $request = $_POST; 

            $queryInventario = "SELECT * FROM inventario_documentos WHERE id_inv_documental =".$request['id_inv_documental'];
            
            $queryInventario .= " ORDER BY id_inv_documental DESC";

            # print_r($queryInventario);die(); # SQL
            $rsInventario = $dbProcess->conn->query($queryInventario);

            if(isset($rsInventario)){
                while (!$rsInventario->EOF) {

                    /****   inventario_documentos
                     * 
                     * id_inv_documento
                     * original_inv_doc
                     * nombre_inv_doc
                     * ruta_inv_doc
                     * tipo_inv_doc
                     * tamano_inv_doc
                     * user_inv_doc
                     * creacion_inv_doc
                     */
    
                    # usuario
                    $usuario = $dbProcess->conn->query("SELECT * FROM usuario WHERE usua_doc = '".$rsInventario->fields["user_inv_doc"]."'"); 
       
                    # link
                    $link = $rsInventario->fields['ruta_inv_doc']; # "http://10.11.12.1/orfeo-6.0/bodega/" . 
                    $doc2_b64 = base64_encode(file_get_contents($link));
    
                    $result[] = [
                        'id_inv_documento' => $rsInventario->fields['id_inv_documento'],
                        'original_inv_doc' => $rsInventario->fields['original_inv_doc'],
                        'nombre_inv_doc' => $rsInventario->fields['nombre_inv_doc'],
                        'tipo_inv_doc' => $rsInventario->fields['tipo_inv_doc'],
                        'tamano_inv_doc' => $rsInventario->fields['tamano_inv_doc'],
                        'usua_nomb' => $usuario->fields['usua_nomb'],
                        'creacion_inv_doc' => $rsInventario->fields['creacion_inv_doc'],
                        'link' => $link,
                        'link_document' => $doc2_b64
                    ];
    
                    $rsInventario->MoveNext();
                }
            }

            ob_start();
            include './views/documents-inv.php';
            echo ob_get_clean(); 

        break;

        # Inventario Documental -- Detalles -- 
        case '7':
            
            include "$dir_raiz/config.php";
            require_once("../../include/db/ConnectionHandler.php");

            $db = new ConnectionHandler("$dir_raiz");
            $dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);


            $request = $_POST; 

            $queryInventario = "SELECT * FROM inventario_documental WHERE id_inv_documental =".$request['id_inv_documental'];
   
            $queryInventario .= " ORDER BY id_inv_documental DESC  LIMIT 100";
            # print_r($queryInventario);die(); # SQL
            $rsInventario = $dbProcess->conn->query($queryInventario);

            $tableInventario = "";

            if(isset($rsInventario)){
                while (!$rsInventario->EOF) {

                    /**  
                     * Inventario_Documental
                     * 
                     * id_inv_documental
                     * uni_administrativa
                     * ofi_productora
                     * no_orden
                     * objeto
                     * codigo
                     * nombre
                     * sub_serie
                     * fecha_ext_ini
                     * fecha_ext_end
                     * caja
                     * carpeta
                     * tomo
                     * otro
                     * modulo
                     * estante
                     * no_folios
                     * fr_consulta
                     * notas
                     * soporte
                     */

                    if($rsInventario->fields['fr_consulta'] == '1'){
                        $fr_consulta_txt = "Baja";   
                    }

                    if($rsInventario->fields['fr_consulta'] == '2'){
                        $fr_consulta_txt = "Media";   
                    }

                    if($rsInventario->fields['fr_consulta'] == '3'){
                        $fr_consulta_txt = "Alta";   
                    }

                    $details = [
                        'id_inv_documental' => $rsInventario->fields['id_inv_documental'],
                        'uni_administrativa' => $rsInventario->fields['uni_administrativa'],
                        'ofi_productora' => $rsInventario->fields['ofi_productora'],
                        'no_orden' => $rsInventario->fields['no_orden'],
                        'objeto' => $rsInventario->fields['objeto'],
                        'codigo' => $rsInventario->fields['codigo'],
                        'nombre' => $rsInventario->fields['nombre'],
                        'sub_serie' => $rsInventario->fields['sub_serie'],
                        'fecha_ext_ini' => date('Y-m-d', strtotime($rsInventario->fields['fecha_ext_ini'])),
                        'fecha_ext_end' => date('Y-m-d', strtotime($rsInventario->fields['fecha_ext_end'])),
                        'caja' => $rsInventario->fields['caja'],
                        'carpeta' => $rsInventario->fields['carpeta'],
                        'tomo' => $rsInventario->fields['tomo'],
                        'otro' => $rsInventario->fields['otro'],
                        'modulo' => $rsInventario->fields['modulo'],
                        'estante' => $rsInventario->fields['estante'],
                        'no_folios' => $rsInventario->fields['no_folios'],
                        'soporte' => $rsInventario->fields['soporte'],
                        'fr_consulta' => $fr_consulta_txt,
                        'notas' => $rsInventario->fields['notas'],
                    ];
                    
                    $rsInventario->MoveNext();
                }
            }

            ob_start();
            include './views/view-inv.php';
            echo ob_get_clean(); 

        break;

        # Muestra radicados buscados
        case '8':
            $sWhere = '';
            $ps_RADI_NUME_RADI = $_POST["s_RADI_NUME_RADI"];
            $ps_DOCTO = $_POST["s_DOCTO"];
            $ps_RADI_DEPE_ACTU = $_POST["s_RADI_DEPE_ACTU"];
            $ps_SGD_EXP_SUBEXPEDIENTE = $_POST["s_SGD_EXP_SUBEXPEDIENTE"];
            $ps_entrada = $_POST["s_entrada"];
            $ps_TDOC_CODI = $_POST["s_TDOC_CODI"];
            $ps_RADI_NOMB = $_POST["s_RADI_NOMB"];

            // Se crea la $ps_desde_RADI_FECH_RADI con los datos ingresados.
            $ps_desde_RADI_FECH_RADI = mktime(0, 0, 0, $_POST["s_desde_mes"], $_POST["s_desde_dia"], $_POST["s_desde_ano"]);
            $ps_hasta_RADI_FECH_RADI = mktime(23, 59, 59, $_POST["s_hasta_mes"], $_POST["s_hasta_dia"], $_POST["s_hasta_ano"]);

            if (strlen($ps_desde_RADI_FECH_RADI) && strlen($ps_hasta_RADI_FECH_RADI)) {
                $HasParam = true;
                $sWhere = $sWhere . $dbProcess->conn->SQLDate('Y-m-d', 'r.radi_fech_radi') . " >= " . $dbProcess->conn->DBDate($ps_desde_RADI_FECH_RADI);
               
                $sWhere .= " and ";
                $sWhere = $sWhere . $dbProcess->conn->SQLDate('Y-m-d', 'r.radi_fech_radi') . " <= " . $dbProcess->conn->DBDate($ps_hasta_RADI_FECH_RADI);
            }

            /* Se recibe la dependencia actual para bsqueda */
            if (strlen($ps_RADI_DEPE_ACTU)) {
                if ($sWhere != "") $sWhere .= " and ";
                $HasParam = true;
                $sWhere = $sWhere . "r.radi_depe_actu='" . $ps_RADI_DEPE_ACTU . "'";
            }

            if (!$ps_RADI_NUME_RADI) $ps_RADI_NUME_RADI = "2";
            
            if (strlen($ps_RADI_NUME_RADI)) {
                if ($sWhere != "")
                    $sWhere .= " and ";
                $HasParam = true;
                $sWhere = $sWhere . "r.radi_nume_radi like '%" . trim($ps_RADI_NUME_RADI) . "%'";
            }

            if (strlen($ps_DOCTO)) {
                if ($sWhere != "")
                    $sWhere .= " and ";
                $HasParam = true;
                $sWhere = $sWhere . " dir.SGD_DIR_DOC = '$ps_DOCTO' ";
            }

            /** Se recibe el numero del expediente para busqueda **/
            
            if (strlen($ps_SGD_EXP_SUBEXPEDIENTE) != 0) {
                if ($sWhere != "") {
                    $sWhere .= " and ";
                }
                $HasParam = true;
                $sWhere = $sWhere . " R.RADI_NUME_RADI = EXP.RADI_NUME_RADI";
                $sWhere = $sWhere . " AND EXP.SGD_EXP_NUMERO = SEXP.SGD_EXP_NUMERO";

                /**No se tienen en cuenta los radicados que han sido excluidos de un expediente. **/
                $sWhere = $sWhere . " AND EXP.SGD_EXP_ESTADO <> 2";
                $sWhere = $sWhere . " AND ( EXP.SGD_EXP_NUMERO LIKE '%" . str_replace('\'', '', trim($ps_SGD_EXP_SUBEXPEDIENTE)) . "%'";
                //by skina para ciac 140711
                //puedo buscar subexpedientes en el campo de expediente
                $sWhere = $sWhere . " OR UPPER(EXP.SGD_EXP_SUBEXPEDIENTE) LIKE UPPER('%" . str_replace('\'', '', trim($ps_SGD_EXP_SUBEXPEDIENTE)) . "%')";
                $sWhere = $sWhere . " OR UPPER(SEXP.SGD_SEXP_PAREXP1) LIKE UPPER( '%" . str_replace('\'', '', trim($ps_SGD_EXP_SUBEXPEDIENTE)) . "%' )";
                $sWhere = $sWhere . " OR SEXP.SGD_SEXP_PAREXP2 LIKE UPPER( '%" . str_replace('\'', '', trim($ps_SGD_EXP_SUBEXPEDIENTE)) . "%' )";
                $sWhere = $sWhere . " OR SEXP.SGD_SEXP_PAREXP3 LIKE UPPER( '%" . str_replace('\'', '', trim($ps_SGD_EXP_SUBEXPEDIENTE)) . "%' )";
                $sWhere = $sWhere . " OR SEXP.SGD_SEXP_PAREXP4 LIKE UPPER( '%" . str_replace('\'', '', trim($ps_SGD_EXP_SUBEXPEDIENTE)) . "%' )";
                $sWhere = $sWhere . " OR SEXP.SGD_SEXP_PAREXP5 LIKE UPPER( '%" . str_replace('\'', '', trim($ps_SGD_EXP_SUBEXPEDIENTE)) . "%' )";
                $sWhere = $sWhere . " )";
            }

            /* Se decide si busca en radicado de entrada o de salida o ambos */
            $eLen = strlen($ps_entrada);
            // $sLen = strlen($ps_salida);

            if ($ps_entrada != "9999") {
                if ($sWhere != "")
                    $sWhere .= " and ";
                $HasParam = true;
                $sWhere = $sWhere . "r.radi_nume_radi like '%" . trim($ps_entrada) . "'";
                
            }

            /* Se recibe el tipo de documento para la bsqueda */            
            if (strlen($ps_TDOC_CODI) && $ps_TDOC_CODI != "9999")
                $ps_TDOC_CODI = $ps_TDOC_CODI;
            else
                $ps_TDOC_CODI = "";
            if (strlen($ps_TDOC_CODI)) {
                if ($sWhere != "")
                    $sWhere .= " and ";

                $HasParam = true;
                $sWhere = $sWhere . "r.tdoc_codi=" . $ps_TDOC_CODI;
            }
            /***
            Autor: Jenny Gamez
            Fecha: 2019-09-21
            Info: Se evalua el nivel de consulta del usuario, si es 1 se valida el usuario actual unicamente,
                  si el nivel es 2 se consulta solo lo de su dependencia
            ***/
            if(isset($_SESSION["usua_nivel_consulta"]) && $_SESSION["usua_nivel_consulta"] == 1){
                if($sWhere != "")
                    $sWhere .= " and ";

                $HasParam = true;
                $sWhere = $sWhere . "r.radi_usua_actu=" . $_SESSION['codusuario'];
            }

            /* Se recibe la caadena a buscar y el tipo de busqueda (All) (Any) */
            $yaentro = false;
            if (strlen($ps_RADI_NOMB)) { //&& $ps_solo_nomb == "Any")
                if ($sWhere != "")
                    $sWhere .= " and (";
                $HasParam = true;
                $sWhere .= " ";

                $ps_RADI_NOMB = strtoupper($ps_RADI_NOMB);
                $tok = strtok($ps_RADI_NOMB, " ");
                $sWhere .= "(";
                while ($tok) {
                    $sWhere .= "";
                    if ($yaentro == true) {
                        $sWhere .= " and ";
                    }
                    $sWhere .= "UPPER(dir.sgd_dir_nomremdes) LIKE '%" . $tok . "%' ";
                    $tok = strtok(" ");
                    $yaentro = true;
                }
                $sWhere .= ") or (";
                $tok = strtok($ps_RADI_NOMB, " ");
                $yaentro = false;
                while ($tok) {
                    $sWhere .= "";
                    if ($yaentro == true) {
                        $sWhere .= " and ";
                    }
                    $sWhere .= "UPPER(dir.sgd_dir_nombre) LIKE '%" . $tok . "%' ";
                    $tok = strtok(" ");
                    $yaentro = true;
                }
                $sWhere .= ") or (";
                $tok = strtok($ps_RADI_NOMB, " ");
                $yaentro = false;
                while ($tok) {
                    $sWhere .= "";
                    if ($yaentro == true) {
                        $sWhere .= " and ";
                    }
                    $sWhere .= "UPPER(dir.sgd_dir_direccion) LIKE '%" . $tok . "%' ";
                    $tok = strtok(" ");
                    $yaentro = true;
                }
                $sWhere .= ") or (";
                $yaentro = false;
                $tok = strtok($ps_RADI_NOMB, " ");
                if ($yaentro == true)
                    $sWhere .= " and (";
                
                $sWhere .= "UPPER(" . $dbProcess->conn->Concat("r.ra_asun", "r.radi_cuentai", "dir.sgd_dir_telefono") . ") LIKE '%" . $ps_RADI_NOMB . "%' ";
                $sWhere .= " or UPPER(dir.sgd_dir_mail)  LIKE '%" . $ps_RADI_NOMB . "%' ";
               
                $tok = strtok(" ");
                if ($yaentro == true)
                    $sWhere .= ")";

                $yaentro = true;
                $sWhere .= "))";
            }

            if (strlen($ps_RADI_NOMB)) {
                if ($sWhere != "")
                    $sWhere .= " AND (";
                $HasParam = true;
                $sWhere .= " ";

                $ps_RADI_NOMB = strtoupper($ps_RADI_NOMB);
                $tok = strtok($ps_RADI_NOMB, " ");
                $sWhere .= "(";
                $sWhere .= "";
                if ($yaentro == true) {
                    $sWhere .= "  ";
                }
                $sWhere .= "UPPER(dir.sgd_dir_nomremdes) LIKE '%" . $ps_RADI_NOMB . "%' ";
                $tok = strtok(" ");
                $yaentro = true;
                $sWhere .= ") OR (";
                $tok = strtok($ps_RADI_NOMB, " ");
                $yaentro = false;
                $sWhere .= "";
                if ($yaentro == true) {
                    $sWhere .= "  ";
                }
                $sWhere .= "UPPER(dir.sgd_dir_nombre) LIKE '%" . $ps_RADI_NOMB . "%' ";
                $tok = strtok(" ");
                $yaentro = true;
                $sWhere .= ") OR (";
                $yaentro = false;
                $tok = strtok($ps_RADI_NOMB, " ");
                if ($yaentro == true)
                    $sWhere .= " AND (";
                $sWhere .= "UPPER(" . $dbProcess->conn->Concat("r.ra_asun", "r.radi_cuentai", "dir.sgd_dir_telefono", "dir.sgd_dir_direccion") . ") LIKE '%" . $ps_RADI_NOMB . "%' ";
                $tok = strtok(" ");
                if ($yaentro == true)
                    $sWhere .= ")";
                $yaentro = true;
                $sWhere .= "))";
            }
            if ($HasParam)
                $sWhere = " AND (" . $sWhere . ") ";

            $redondeo = "date_part('days', r.radi_fech_radi-" . $dbProcess->conn->sysTimeStamp . ")+dt.dias_termino +(select count(*) from sgd_noh_nohabiles where NOH_FECHA between r.radi_fech_radi and " . $dbProcess->conn->sysTimeStamp . ")";
                                      
            $sSQL = "SELECT 
                        r.radi_nume_radi AS RADI_NUME_RADI," .
                        $dbProcess->conn->SQLDate('Y-m-d H:i:s', 'R.RADI_FECH_RADI') . " AS RADI_FECH_RADI,
                        r.RA_ASUN as RA_ASUN, 
                        td.sgd_tpr_descrip, " .
                        $redondeo . " as diasr,
                        r.RADI_NUME_HOJA, 
                        r.RADI_PATH, 
                        dir.SGD_DIR_DIRECCION, 
                        dir.SGD_DIR_MAIL,
                        dir.SGD_DIR_NOMREMDES, 
                        dir.SGD_DIR_TELEFONO, 
                        dir.SGD_DIR_DIRECCION,
                        dir.SGD_DIR_DOC, 
                        r.RADI_USU_ANTE, 
                        r.RADI_PAIS, 
                        dir.SGD_DIR_NOMBRE,
                        dir.SGD_TRD_CODIGO, 
                        r.RADI_DEPE_ACTU, 
                        r.RADI_DEPE_RADI,
                        r.RADI_USUA_ACTU, 
                        r.CODI_NIVEL, 
                        r.SGD_SPUB_CODIGO,
                        td.sgd_tpr_codigo";

            /** Busqueda por parameto del expediente **/
            if (strlen($ps_SGD_EXP_SUBEXPEDIENTE) != 0)
                $sSQL .= " ,EXP.SGD_EXP_NUMERO";

            $sSQL .= " FROM sgd_dir_drecciones dir, radicado r, sgd_tpr_tpdcumento td, sgd_dt_radicado dt";

            /** Busqueda por expediente **/
            if (strlen($ps_SGD_EXP_SUBEXPEDIENTE) != 0) {
                $sSQL .= ", SGD_EXP_EXPEDIENTE EXP, SGD_SEXP_SECEXPEDIENTES SEXP";
            }
            $sSQL .= " WHERE dir.sgd_dir_tipo = 1 AND dir.RADI_NUME_RADI=r.RADI_NUME_RADI AND r.TDOC_CODI=td.SGD_TPR_CODIGO AND R.RADI_NUME_RADI=DT.RADI_NUME_RADI";
            $sOrder = " order by r.radi_fech_radi ";

            $sSQL .= $sWhere . $sOrder;
            $rs = $dbProcess->conn->query($sSQL);

            // echo ' --->'. $sSQL;

            while (!$rs->EOF) {
                // Create field variables based on database fields
                $fldRADI_NUME_RADI = $rs->fields['RADI_NUME_RADI'];
                $fldRADI_FECH_RADI = $rs->fields['RADI_FECH_RADI'];

                /** Busqueda por expediente **/
                $fldsSGD_EXP_SUBEXPEDIENTE = isset($rs->fields['SGD_EXP_NUMERO']) ? $rs->fields['SGD_EXP_NUMERO'] : '';

                $fldASUNTO = $rs->fields['RA_ASUN'];
                $fldTIPO_DOC = $rs->fields['SGD_TPR_DESCRIP'];
                $fldNUME_HOJAS = $rs->fields['RADI_NUME_HOJA'];
                $fldRADI_PATH = $rs->fields['RADI_PATH'];
                $fldDIRECCION_C = $rs->fields['SGD_DIR_DIRECCION'];
                $fldDIGNATARIO = $rs->fields['SGD_DIR_NOMBRE'];
                $fldTELEFONO_C = $rs->fields['SGD_DIR_TELEFONO'];
                $fldMAIL_C = $rs->fields['SGD_DIR_MAIL'];
                $fldNOMBRE = $rs->fields['SGD_DIR_NOMREMDES'];
                $fldCEDULA = $rs->fields['SGD_DIR_DOC'];
                $aRADI_DEPE_ACTU = $rs->fields['RADI_DEPE_ACTU'];
                $aRADI_DEPE_RADI = $rs->fields['RADI_DEPE_RADI']; //SKINA seguridad1
                $aRADI_USUA_ACTU = $rs->fields['RADI_USUA_ACTU'];
                $fldUSUA_ANTE = $rs->fields['RADI_USU_ANTE'];
                $fldPAIS = $rs->fields['RADI_PAIS'];
                $fldDIASR = $rs->fields['DIASR'];
                $tipoReg = $rs->fields['SGD_TRD_CODIGO'];
                $nivelRadicado = $rs->fields['CODI_NIVEL'];
                $seguridadRadicado = $rs->fields['SGD_SPUB_CODIGO'];
                $tdocper = $rs->fields['SGD_TPR_CODIGO'];

                $fldNOMBRE = str_replace($ps_RADI_NOMB, "<font color=>$ps_RADI_NOMB", $fldNOMBRE);
                $fldASUNTO = str_replace($ps_RADI_NOMB, "<font color=>$ps_RADI_NOMB", $fldASUNTO);

                // Busquedas Anidadas
                $queryDep = "select DEPE_NOMB from dependencia where DEPE_CODI='$aRADI_DEPE_ACTU'";

                $dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);
                $rs2 = $dbProcess->conn->query($queryDep);
                $fldDEPE_ACTU = $rs2->fields['DEPE_NOMB'];
                $queryUs = "select USUA_NOMB from USUARIO where DEPE_CODI='$aRADI_DEPE_ACTU' and USUA_CODI=$aRADI_USUA_ACTU ";
                $rs3 = $dbProcess->conn->query($queryUs);
                $fldUSUA_ACTU = $rs3->fields['USUA_NOMB'];
                $dbProcess->conn->SetFetchMode(ADODB_FETCH_NUM);

                $dependencia = $_SESSION["dependencia"];
                //permite restriccion por dependencias, configurable en la administracion
                $sql = "SELECT  DEPE_CODI  FROM DEPENDENCIA WHERE DEPE_SEGU=1";
                $dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);
                $rss = $dbProcess->conn->Execute($sql);

                $restriccion = false;
                while (!$rss->EOF) {
                    $ff = $rss->fields['DEPE_CODI'];

                    if ($aRADI_DEPE_ACTU == $ff)
                        $paso = false;

                    $rss->MoveNext();
                }

                //Se modifica para traer el expediente si lo ahi para los radicados
                if (strlen($ps_SGD_EXP_SUBEXPEDIENTE) == 0 || strlen($ps_SGD_EXP_SUBEXPEDIENTE) == '') {
                    //Se agrega la validación de que muestre todos los expedientes menos el expediente excluido
                    $consultaExpediente = "SELECT SGD_EXP_NUMERO  
                        FROM SGD_EXP_EXPEDIENTE 
                        WHERE radi_nume_radi= '$fldRADI_NUME_RADI' AND sgd_exp_fech=(SELECT MIN(SGD_EXP_FECH) as minFech from sgd_exp_expediente where radi_nume_radi= '$fldRADI_NUME_RADI')
                        AND sgd_exp_estado <> 2";

                    $rsE = $dbProcess->conn->query($consultaExpediente);
                    $fldsSGD_EXP_SUBEXPEDIENTE = $rsE->fields["SGD_EXP_NUMERO"];
                }

                

                $consultaTipo = "select cod_tp_tpdcumento from rol_tipos_doc where cod_rol=" . $_SESSION['rol'];
                $dbProcess->conn->SetFetchMode(ADODB_FETCH_ASSOC);
                $resultTipo = $dbProcess->conn->query($consultaTipo);

                while (!$resultTipo->EOF) {
                    $tiposdocumentales[] = $resultTipo->fields["COD_TP_TPDCUMENTO"];
                    $resultTipo->MoveNext();
                }

                ?>
                <tr class="">
                    <td class="leidos">
                        <? 
                        if($aRADI_DEPE_ACTU == $entidad_depsal){

                            $v = "<b>Archivado</b>";
                            echo '<center>'.$v.' </center>';

                        }else{
                            // Si es menor a 0 días el radicado esta vencido
                            if($fldDIASR < 0){
                                $v = "<img src='../iconos/semaforo_rojo.png' style='width: 20px;' alt='Radicados Vencidos' title='Radicados Vencidos'>";
                            }
                            // Si es mayor a 0 días y es menor a 2 días
                            elseif($fldDIASR >= 0 && $fldDIASR <= 2){
                                $v = "<img src='../iconos/semaforo_amarillo.png' style='width: 20px;' alt='Radicados Pronto Vencer' title='Radicados Pronto Vencer'>";
                            }
                            // Si es mayor 3 días
                            else{
                                $v = "<img src='../iconos/semaforo_verde.png' style='width: 20px;' alt='Radicados al Dia' title='Radicados al Dia'>";
                            }

                            echo $v.' &nbsp; '.$fldDIASR;
                        }
                        ?>&nbsp;
                    </td>

                    <!-- Consulta de los radicados que se arrojan con base al criterio buscado -->
                    <?php
                        $permisos_sql = "SELECT radicado.codi_nivel AS nivel_radicado, usuario.codi_nivel AS nivel_usuario, radicado.radi_usua_actu, radicado.radi_depe_actu, radicado.sgd_spub_codigo AS permiso FROM radicado INNER JOIN usuario ON (radicado.radi_usua_actu=usuario.usua_codi AND radicado.radi_depe_actu=usuario.depe_codi) WHERE radicado.radi_nume_radi = '$fldRADI_NUME_RADI'";
                        $resultados = $dbProcess->conn->Execute($permisos_sql);
                        $nivel_radicado = isset($resultados->fields['nivel_radicado']) ? $resultados->fields['nivel_radicado'] : $resultados->fields['NIVEL_RADICADO'];
                        $nivel_usuario = isset($resultados->fields['nivel_usuario']) ? $resultados->fields['nivel_usuario'] : $resultados->fields['NIVEL_USUARIO'];
                        $usuario_actual = isset($resultados->fields['radi_usua_actu']) ? $resultados->fields['radi_usua_actu'] : $resultados->fields['RADI_USUA_ACTU'];
                        $dependencia_actual = isset($resultados->fields['radi_depe_actu']) ? $resultados->fields['radi_depe_actu'] : $resultados->fields['RADI_DEPE_ACTU'];
                        $permission = $resultados->fields['PERMISO']; // 1 = es confidencial, 0 = NO es confidencial
                        
                        if ((($_SESSION['codusuario'] != $usuario_actual) && ($_SESSION['depecodi'] != $dependencia_actual) && $permission == 1 && $usua_perm_consulta_rad == 0)
                        ) {               
                            $linkDocto = "<a class='vinculos' style='color: #43a22e;' href='#' onclick='noPermiso()'>";
                            $linkInfGeneral = "<a class='vinculos' style='color: #43a22e;' href='#' onclick='noPermiso()'>";
                        } else {
                            if (in_array($tdocper, $tiposdocumentales)) {
                                $linkDocto = "<a class='vinculos' style='color: #43a22e;' href='../verradicado.php?verrad=$fldRADI_NUME_RADI&" . session_name() . "=" . session_id() . "&carpeta=8&nomcarpeta=Busquedas&tipo_carp=0'>";
                                $linkInfGeneral = "<a class='vinculos' style='color: #43a22e;' href='../verradicado.php?verrad=$fldRADI_NUME_RADI&" . session_name() . "=" . session_id() . "&carpeta=8&nomcarpeta=Busquedas&tipo_carp=0'>";
                            } else {
                                $linkDocto = "<a class=vinculos href='#' style='color: #43a22e;' onclick=\"alert('Usted no tiene acceso a este tipo documental')\">";
                                $linkInfGeneral = "<a class='vinculos' style='color: #43a22e;' href='#' onclick=\"alert('Usted no tiene acceso a este tipo documental')\">";
                            }
                        }
                    ?>
                    <td class="leidos"><?= $linkDocto ?><?= $fldRADI_NUME_RADI ?>&nbsp;</a></td>
                    <td class="leidos"><?= $linkInfGeneral ?><?= $fldRADI_FECH_RADI ?>&nbsp;</a></td>
                    <td class="leidos"><?= $fldsSGD_EXP_SUBEXPEDIENTE ?>&nbsp;</td>
                    <td class="leidos"><?= $fldASUNTO ?>&nbsp;</td>
                    <td class="leidos"><?= $fldTIPO_DOC ?>&nbsp;</td>
                    <td class="leidos"><?= $fldDIRECCION_C ?>&nbsp;</td>
                    <td class="leidos"><?= $fldNOMBRE ?>&nbsp;</td>
                    <td class="leidos"><?= $fldCEDULA ?>&nbsp;</td>
                    <td class="leidos"><?= $fldUSUA_ACTU ?>&nbsp;</td>
                    <td class="leidos"><?= $fldDEPE_ACTU ?>&nbsp;</td>
                    <td class="leidos"><?= $fldUSUA_ANTE ?>&nbsp;</td>
                    
                </tr>
                <?
                $rs->MoveNext();
            }

            
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
