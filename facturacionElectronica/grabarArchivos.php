<?php
error_reporting(E_ALL);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
if (!$dir_raiz) $dir_raiz = "..";
require_once "../include/db/ConnectionHandler.php";
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$folder = 'orfeosgd';

$header = $emailInfo['headerInfo'];
$attachments = $emailInfo['emailAttachments'];
$body = $emailInfo['emailBody'];

function acentos($cadena) {
    $search = explode(",","á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ,Ã¡,Ã©,Ã­,Ã³,Ãº,Ã±,ÃÃ¡,ÃÃ©,ÃÃ­,ÃÃ³,ÃÃº,ÃÃ±,Ã“,Ã ,Ã‰,Ã ,Ãš,â€œ,â€ ,Â¿,ü,O?,o?");
    $replace = explode(",","á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ,á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ,Ó,Á,É,Í,Ú,\",\",¿,&uuml;,Ó,ó");
    $cadena= str_replace($search, $replace, $cadena);
 
    return $cadena;
}

function typeMime($typeMime){
    
    switch($typeMime){        
        case 'image/jpeg':
            $extension = 'jpeg';
        break;        
        case 'text/html':
            $extension = 'html';
        break;
        case 'application/pdf':
            $extension = 'pdf';
        break;
        case 'application/vnd.ms-powerpoint':
            $extension = 'ppt';
        break;
        case 'text/csv':
            $extension = 'csv';
        break;
        case 'application/vnd.ms-excel':
            $extension = 'xls';
        break;
        case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
            $extension = 'xlsx';
        break;
        case 'application/msword':
            $extension = 'doc';
        break;
        case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
            $extension = 'docx';
        break;        
        case 'application/vnd.oasis.opendocument.text':
            $extension = 'odt';
        break;
        case 'application/x-rar-compressed':
            $extension = 'rar';
        break;
        case 'application/zip':
            $extension = 'zip';
        case 'application/xml':
            $extension = 'xml';
        break;
    }
    return $extension;
}

$encabezado = session_name() . "=" . session_id() . "&krd=$krd&fechah=$fechah";

$iEmail = 0;

/* Consulta para obtener la fecha de creación */
$sqlFile = "SELECT radi_fech_radi, radi_depe_actu FROM radicado WHERE radi_nume_radi = '$nurad'";
$radicado = $db->conn->query($sqlFile);

setlocale(LC_TIME, 'es_ES.UTF-8');
$fechaCreacion = strftime('%a, %d %b %Y %H:%M:%S', strtotime($radicado->fields["RADI_FECH_RADI"]));

/* Dependencia responsable del radicado */
$idDependency = $radicado->fields["RADI_DEPE_ACTU"];
$sqlDependency = "SELECT depe_nomb FROM dependencia WHERE depe_codi='$idDependency'";
$dependency = $db->conn->query($sqlDependency);
$depResponsable =  $dependency->fields["DEPE_NOMB"];

if ($eMailMid != 0) {

    $eMailPid = $_SESSION['eMailPid'];
    $eMailRemitente = isset($_SESSION['eMailRemitente']) ? $_SESSION['eMailRemitente'] : '';
    $eMailNombreRemitente = isset($_SESSION['eMailNombreRemitente']) ? $_SESSION['eMailNombreRemitente'] : '';

    if ($body)
        $nl = "</br>";
    else
        $nl = "\n";

    /* Encabezado de la imagen principal .html */
    //debo adaptar aca con los nuevos elementos
    $remitente = imap_utf8($header->fromaddress) . " &lt;" . imap_utf8($header->from[0]->personal) . "&gt;";
    $head = "<u><b>De:</b></u>". acentos($remitente) ."</br>";
    $head .= "<u><b>Para:</b></u> " . imap_utf8(isset($header->toaddress)?$header->toaddress :'') . " &lt;" . imap_utf8(isset($header->to[0]->personal)? $header->to[0]->personal :'') . "&gt;  </br>";
    $head .= "<u><b>Asunto:</b></u> " . imap_utf8($header->subject) ?? imap_utf8($header->Subject) . "</br>";
    
    $iMailMid = 0;
    $iMail = 0;

        $headRadicado = "
        <TABLE width=\"80%\" cellspacing=\"0\" border=\"1\" cellpadding=\"4\" >
            <tr>
                <td width=60%>$head</td>
                <td border=1>
                    Radicado No. $nurad<br>
                    Fecha: " . $fechaCreacion /* $msg->header[$eMailMid]['Date'] */ . "<br>";
                    $headRadicado .= "Dependencia: ".$depResponsable . "<br>";
                    $headRadicado .= "<FONT SIZE=2>" . $_SESSION['entidad'] . "<br>";
                    $headRadicado .= "Consulte su Tramite " . $contact . "<br></FONT>
                </td>
            </tr>
        </TABLE> ";

        $aExtension = "pdf";
        $nl = "<br>";

        $tmpNameEmail = $nurad . "." . $aExtension;
        $anoBodega = substr($nurad, 0, 4) . "/";
        $depeBodega = substr($nurad, 4, $_SESSION['largoDependencia']) . "/";
        $directorio = $anoBodega . $depeBodega;

        // $fileRadicado = "../bodega/$directorio" . $tmpNameEmail;
        // $cuerpoMensaje = str_replace("\n", "<br>", $body ?? $body);
        // $archivoRadicado = $headRadicado . $head . " $nl " . $cuerpoMensaje;
        // $file1 = fopen($fileRadicado, 'w');
        
        // if ($file1 == NULL) { print ("Esto no abre el archivo"); }
        // fputs($file1, $body ?? $body);
        // fclose($file1);

        include '../email/generarImagenRadicado.php';
        
        $radicadoAttach = "______________________________________________________________________________________$nl";
        $iMail = 0;

        //traer los attachemts
        $dirExtract = '../bodega/tmp/unzip/'. $uzpFldr;
        $filesExtracted = scandir($dirExtract);
        foreach($filesExtracted as $key => $value){
            if(stristr($value, '.xml')){
                $attachments[$value] = file_get_contents( $dirExtract.'/'.$value);
                
            }elseif(stristr($value, '.pdf')){
                $attachments[$value] = file_get_contents( $dirExtract.'/'.$value);
                
            }
        }
        
        if($attachments){
            foreach($attachments as $key => $value){
                // cambiar al nombre del attachment
                // echo "Archivo -->" . imap_utf8($key);
                $Pid = $aid;
                
                // Nombre del archivo adjunto
                $fname =  imap_utf8($key) ;
    
                $aExtension = new SplFileInfo($fname); //Captura la extension
                
                $aExtension = $aExtension->getExtension();
                
                // Valida el tipo de extension
                $isqlaExtension = "select anex_tipo_codi as ANEX_TIPO_CODI from anexos_tipo where anex_tipo_ext ='$aExtension'";
                $rsaExtension = $db->conn->query($isqlaExtension);
                $tipoaExtension = $rsaExtension->fields["ANEX_TIPO_CODI"];
                
                $sqlTRDradicado ="select distinct mr.sgd_mrd_codigo as sgd_mrd_codigo, "
                            . "mr.sgd_srd_codigo as sgd_srd_codigo , "
                            . "mr.sgd_sbrd_codigo as sgd_sbrd_codigo "
                        . "from sgd_rdf_retdocf rd "
                        . "inner join sgd_mrd_matrird mr on mr.sgd_mrd_codigo=rd.sgd_mrd_codigo "
                        . "where rd.radi_nume_radi='$nurad'";
                $rsTRDradicado = $db->conn->Execute($sqlTRDradicado);
               
                $serieDocAnexo = !isset($rsTRDradicado->fields["sgd_srd_codigo"]) ? 'null' : $rsTRDradicado->fields["SGD_SRD_CODIGO"];
                $subserieDocuAnexo = !isset($rsTRDradicado->fields["sgd_sbrd_codigo"]) ? 'null' : $rsTRDradicado->fields["SGD_SBRD_CODIGO"];
                /** Se envía la serie y subserie en null ya que es un radicado nuevo y todavia no está clasificado */
                
    
                /** Se consulta el tipo documental "Anexo" el cual siempre debe existir en la BD */
                $tipoRadCod = "select sgd_tpr_descrip, sgd_tpr_codigo from sgd_tpr_tpdcumento where sgd_tpr_descrip = 'anexo' or sgd_tpr_descrip = 'anexos' or sgd_tpr_descrip = 'Anexos'";
                $rsTipoRadCod = $db->conn->Execute($tipoRadCod);
                $tipoDoocumental = isset($rsTipoRadCod->fields["sgd_tpr_codigo"]) ? $rsTipoRadCod->fields["sgd_tpr_codigo"] : $rsTipoRadCod->fields["SGD_TPR_CODIGO"];
                
                $numPartesi++;
                $fn = imap_utf8($key);
                //--Variable con la Cabecera en formato html---------------------//
                //---------------------------------------------------------------//
                $codigoAnexo = $nurad . "000$numPartesi";
    
                $tmpNameEmail = $nurad . "_000" . $numPartesi . "." . $aExtension;
                $directorio = substr($nurad, 0, 4) . "/" . substr($nurad, 4, $_SESSION['largoDependencia']) . "/docs/";
    
                $fileEmailMsg = "../bodega/$directorio" . $tmpNameEmail;
                $file1 = fopen($fileEmailMsg, 'w');
                $archivo = $value;
                fputs($file1, $archivo);
                fclose($file1);
                
                $anexoTamano = filesize($fileEmailMsg);
                // echo "<br>Grabado Archivo en ---> <a href='$fileEmailMsg'> $fn </a>";
                $radicadoAttach .= "< " . $fname . " Tama&ntilde;o :" . $anexoTamano . " >";
                $fileEmailMsg = str_replace("..", "", $fileEmailMsg);
                $fecha_hoy = Date("Y-m-d H:i:s");
    
                if (!$db->conn)
                    echo "No hay conexion";
                $sqlFechaHoy = $db->conn->DBDate($fecha_hoy);
                
                if ($tipoaExtension != '') {
                    $record["ANEX_RADI_NUME"] = $nurad;
                    $record["ANEX_CODIGO"] = $codigoAnexo;
                    $record["ANEX_TAMANO"] = "'" . $anexoTamano . "'" ;
                    $record["ANEX_SOLO_LECT"] = "'S'";
                    $record["ANEX_CREADOR"] = "'" . $krd . "'";
                    $record["ANEX_DESC"] = "' Archivo:." . $fname . "'";
                    $record["ANEX_NUMERO"] = $numPartesi;
                    $record["ANEX_NOMB_ARCHIVO"] = "'" . $tmpNameEmail . "'";
                    $record["ANEX_BORRADO"] = "'N'";
                    $record["ANEX_DEPE_CREADOR"] = $_SESSION['dependencia'];
                    $record["SGD_TPR_CODIGO"] = $tipoDoocumental;
                    $record["ANEX_TIPO"] = $tipoaExtension;
                    $record["ANEX_FECH_ANEX"] = $sqlFechaHoy;
                    $record["SGD_SBRD_CODIGO"] = $serieDocAnexo;
                    $record["SGD_SRD_CODIGO"] = $subserieDocuAnexo;
                    
                    $insert = $db->insert("anexos", $record, "true");
                    
                }
            }

            // echo "<br> <h4> Documento de Radicado ---> <a href='$fileRadicado' target='image'> $fileRadicado </a></h4>";
            // $file1 = fopen($fileRadicado, 'w');
            // fputs($file1, $archivoRadicado);
            // fclose($file1);
            // $routeFile = str_replace('../bodega', '', $fileRadicado);
            // $isqlRadicado = "update radicado set RADI_PATH = '$routeFile' where radi_nume_radi = '$nurad'";
            // $rs = $db->conn->query($isqlRadicado);
            
            $dependencia = $depResponsable;
            print("Se asoció al radicado los adjuntos del correo");
            if (!$rs) {  //Si actualizo BD correctamente
                echo "Fallo la Actualizacion del Path en radicado < $isqlRadicado >";
            }
        }else {
            print("No hay Correo disponible");
        }

}
if(!isset($folder)){
    $folder = 'orfeosgd';
}
$msg->moveEmailToOrfeosgd($folder, $eMailMid );
include_once 'emailRadicado.php';

?>
