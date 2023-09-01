<?php

session_start();
$dir_raiz = $_SESSION['dir_raiz'];
$longitud_codigo_dependencia = $_SESSION['longitud_codigo_dependencia'];
$estructuraRad = $_SESSION['estructuraRad'];
$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "." . DIRECTORY_SEPARATOR . "config.php";
include "./include/db/ConnectionHandler.php";
$db = new ConnectionHandler(".");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

//Incluido el archivo que tiene la clase historico
include("./include/tx/Historico.php");
$historiRecord = new Historico($db);

if (empty($_SESSION)) {
    reportarErrores("Error de permisos: No se encuentran datos del usuario");
}

// By Skinatech - 14/08/2018
// Para la construcción del número de radicado, esto indica la parte inicial del radicado.
if ($estructuraRad == 'ymd') {
    $num = 8;
} elseif ($estructuraRad == 'ym') {
    $num = 6;
} else {
    $num = 4;
}

$dataReturn = [];
$token = "";

switch ($_POST['tipo']) {
    case 1: //Busqueda para los clientes
        $idRadicado = $_POST['id'];
        $consultaRadicados = "SELECT radi_path FROM radicado where radi_nume_radi='$idRadicado'";
        $rsConsulRadi = $db->conn->execute($consultaRadicados);
        
        $rutaPath = isset($rsConsulRadi->fields['radi_path']) ? $rsConsulRadi->fields['radi_path'] : $rsConsulRadi->fields['RADI_PATH'];

        if ($rutaPath != '') {
            if (file_exists('./bodega/' . $rutaPath)) {
                $rutaArchivo = './bodega/' . $rutaPath;

                $token = base64_encode(file_get_contents($rutaArchivo));

                $explodeArchivo = explode('.', $rutaPath);
                $extencion = base64_encode($rutaArchivo);

                if ($explodeArchivo[1] != 'pdf' && $explodeArchivo[1] != 'PDF') {
                    $mostrarArchivo = false;
                } else {
                    $mostrarArchivo = true;
                }

                $dataReturn = array('status' => true, 'message' => 'Ok', 'token' => $token, 'extencion' => $extencion, 'mostrar' => $mostrarArchivo);
            } else {
                $dataReturn = array('status' => false, 'message' => 'No hay imagen principal', 'token' => $token);
            }
        } else {
            $dataReturn = array('status' => false, 'message' => 'No hay imagen principal para esté radicado', 'token' => $token);
        }

        header('Content-Type: application/json');
        echo json_encode($dataReturn, JSON_FORCE_OBJECT);
        break;
        
    case 2: //Busqueda en anexos
        $idRadicado = $_POST['id'];
        $anexoNo = $_POST['anexo'];
        $consultaRadicados = "SELECT anex_nomb_archivo, anex_codigo  FROM anexos where anex_numero=$anexoNo and anex_radi_nume ='$idRadicado'";
        $rsConsulRadi = $db->conn->execute($consultaRadicados);
        $coddocu = isset($rsConsulRadi->fields['anex_codigo']) ? $rsConsulRadi->fields['anex_codigo'] : $rsConsulRadi->fields['ANEX_CODIGO'];
        $nomAnexo = isset($rsConsulRadi->fields["anex_nomb_archivo"]) ? $rsConsulRadi->fields["anex_nomb_archivo"] : $rsConsulRadi->fields["ANEX_NOMB_ARCHIVO"];
        
        $linkarchivo_vista = "$dir_raiz/bodega/" . substr(trim($coddocu), 0, 4) . "/" . strtoupper(substr(trim($coddocu), $num, $longitud_codigo_dependencia)) . "/docs/" . trim(strtoupper(stristr($nomAnexo, ".", true))) . trim(stristr($nomAnexo, "."));
        
        if ($nomAnexo != '') {
            if (file_exists($linkarchivo_vista)) {
                $rutaArchivo = $linkarchivo_vista;
                $token = base64_encode(file_get_contents($rutaArchivo));

                $explodeArchivo = explode('.', $nomAnexo);
                $extencion = base64_encode($rutaArchivo);

                if ($explodeArchivo[1] != 'pdf' && $explodeArchivo[1] != 'PDF') {
                    $mostrarArchivo = false;
                } else {
                    $mostrarArchivo = true;
                }

                $dataReturn = array('status' => true, 'message' => 'Ok', 'token' => $token, 'extencion' => $extencion, 'mostrar' => $mostrarArchivo);
            } else {
                $dataReturn = array('status' => false, 'message' => 'No hay imagen principal', 'token' => $token);
            }
        } else {
            $dataReturn = array('status' => false, 'message' => 'No hay imagen principal para esté radicado', 'token' => $token);
        }

        header('Content-Type: application/json');
        echo json_encode($dataReturn, JSON_FORCE_OBJECT);
        break;
        
    case 3: //Busqueda en expedientes
        $idRadicado = $_POST['id'];
        $anexoNo = $_POST['anexo'];
        $consultaRadicados = "SELECT anex_nomb_archivo, anex_codigo  FROM anexos where anex_numero=$anexoNo and anex_radi_nume ='$idRadicado'";
        $rsConsulRadi = $db->conn->execute($consultaRadicados);
        
        $coddocu = isset($rsConsulRadi->fields['anex_codigo']) ? $rsConsulRadi->fields['anex_codigo'] : $rsConsulRadi->fields['ANEX_CODIGO'];
        $nomAnexo = isset($rsConsulRadi->fields["anex_nomb_archivo"]) ? $rsConsulRadi->fields["anex_nomb_archivo"] : $rsConsulRadi->fields["ANEX_NOMB_ARCHIVO"];
       
        $linkarchivo_vista = "$dir_raiz/bodega/" . substr(trim($coddocu), 0, 4) . "/" . strtoupper(substr(trim($coddocu), $num, $longitud_codigo_dependencia)) . "/docs/" . trim(strtoupper(stristr($nomAnexo, ".", true))) . trim(stristr($nomAnexo, "."));
        
        if ($nomAnexo != '') {
            if (file_exists($linkarchivo_vista)) {
                $rutaArchivo = $linkarchivo_vista;
                $token = base64_encode(file_get_contents($rutaArchivo));

                $explodeArchivo = explode('.', $nomAnexo);
                $extencion = base64_encode($rutaArchivo);

                if ($explodeArchivo[1] != 'pdf' && $explodeArchivo[1] != 'PDF') {
                    $mostrarArchivo = false;
                } else {
                    $mostrarArchivo = true;
                }

                $dataReturn = array('status' => true, 'message' => 'Ok', 'token' => $token, 'extencion' => $extencion, 'mostrar' => $mostrarArchivo);
            } else {
                $dataReturn = array('status' => false, 'message' => 'No hay imagen principal', 'token' => $token);
            }
        } else {
            $dataReturn = array('status' => false, 'message' => 'No hay imagen principal para esté radicado', 'token' => $token);
        }

        header('Content-Type: application/json');
        echo json_encode($dataReturn, JSON_FORCE_OBJECT);
        break;
        
        case 4: //Despliege de anexos desde listado de busquedaOCR
        $rutaAnexo = "/var/www/html/".$ambiente.$_POST['rutaAnexo'];
        if ($rutaAnexo != '') {
            if (file_exists($rutaAnexo)) {
                $rutaArchivo = $rutaAnexo;
                $token = base64_encode(file_get_contents($rutaArchivo));
                $explodeArchivo = explode('.', $rutaAnexo);
                $extencion = base64_encode($rutaArchivo);
                if ($explodeArchivo[1] != 'pdf' && $explodeArchivo[1] != 'PDF') {
                    $mostrarArchivo = false;
                } else {
                    $mostrarArchivo = true;
                }

                $dataReturn = array('status' => true, 'message' => 'Ok', 'token' => $token, 'extencion' => $extencion, 'mostrar' => $mostrarArchivo);
            } else {
                $dataReturn = array('status' => false, 'message' => 'No hay imagen principal', 'token' => $token);
            }
        } else {
            $dataReturn = array('status' => false, 'message' => 'Ruta de anexo no válida', 'token' => $token);
        }

        header('Content-Type: application/json');
        echo json_encode($dataReturn, JSON_FORCE_OBJECT);
        break;
    case 5: // Despliege de listado de transferencias documentales

        $nomb = $_POST['anexo'];
        if( $nomb ){
            $linkarchivo_vista = $dir_raiz."/bodega/".date('Y')."/transDocumentales/".$nomb;
        
            if (file_exists($linkarchivo_vista)) {
                $rutaArchivo = $linkarchivo_vista;
                $token = base64_encode(file_get_contents($rutaArchivo));

                $explodeArchivo = explode('.', $nomAnexo);
                $extencion = base64_encode($rutaArchivo);

                $mostrarArchivo = true;

                $dataReturn = array('status' => true, 'message' => 'Ok', 'token' => $token, 'extencion' => $extencion, 'mostrar' => $mostrarArchivo, 'prueba'=> $nomb );
            } else {
                $dataReturn = array('status' => false, 'message' => 'No hay imagen principal', 'token' => $token, 'prueba'=> $nomb );
            }

        }else {
            $dataReturn = array('status' => false, 'message' => 'No llegó nombre del archivo', 'token' => $token );
        }

        header('Content-Type: application/json');
        echo json_encode($dataReturn, JSON_FORCE_OBJECT);
        break;

    case 11: // Actualizar la retroalimentación del radicado
        $verrad = $_POST['verrad'];
        $valor = $_POST['valor'];
        
        $updateRadi = "update radicado set radi_retroalimentacion_pqrs=" . $valor . " where radi_nume_radi='" . $verrad . "'";
        $rsupdateRadi = $db->conn->execute($updateRadi);

        if($valor == 1){ $nameValor = 'Preventivo'; }
        elseif($valor == 2){ $nameValor = 'Correctivo'; }
        elseif($valor == 3){ $nameValor = 'Mejorar'; }
        elseif($valor == 4){ $nameValor = 'Tramite/Consulta'; }

        $observacion = 'Se marco el radicado con la retroalimentación <b>'.$nameValor.'</b>';
        $radicadosReasignadosHis[] = $verrad;
        $historicoExec = $historiRecord->insertarHistorico($radicadosReasignadosHis, $dependencia, $codusuario, $dependencia, $codusuario, $observacion, 73);

        break;
    case 15: //Consolidación de documentos
            $verrad = $_POST['verrad'];
            $radicados = $_POST['radicado'];
            $mostrar = '';
            $selectUsuarios = '';
            $mostrarOpcion = false;
    
                $queryAnexosConsolidado = "select anex_radi_nume, anex_desc, anex_nomb_archivo, anex_codigo from anexos where anex_radi_nume='" . $verrad . "'";
                $rsAnexos = $db->conn->execute($queryAnexosConsolidado);
        
     
                        $selectUsuarios .= "<tr><td colspan='3'><b>Radicado: " . $verrad . "</b></td></tr>";
        
                        while (!$rsAnexos->EOF) {
                            $anex_desc = isset($rsAnexos->fields['anex_desc']) ? $rsAnexos->fields['anex_desc'] : $rsAnexos->fields['ANEX_DESC'];
                            $anex_codigo = isset($rsAnexos->fields['anex_codigo']) ? $rsAnexos->fields['anex_codigo'] : $rsAnexos->fields['ANEX_CODIGO'];
                            $anex_radi_nume = isset($rsAnexos->fields['anex_radi_nume']) ? $rsAnexos->fields['anex_radi_nume'] : $rsAnexos->fields['ANEX_RADI_NUME'];
                            $anex_nomb_archivo = isset($rsAnexos->fields['anex_nomb_archivo']) ? $rsAnexos->fields['anex_nomb_archivo'] : $rsAnexos->fields['ANEX_NOMB_ARCHIVO'];
        
                            $selectUsuarios .= "<tr>
                                                    <td>" . $anex_codigo . "</td>
                                                    <td>" . $anex_desc . "</td>
                                                    <td><input type='checkbox' name='" . $anex_codigo . "' id='" . $anex_codigo . "' value='" . $anex_nomb_archivo . "' class='inputCheckboxRadi' onclick='inputcheckboxradi(" . $anex_codigo . ");'/></td>
                                                </tr>";
        
                            $rsAnexos->MoveNext();
                        }
            
    
            echo $selectUsuarios;
            break;
    
}
?>
