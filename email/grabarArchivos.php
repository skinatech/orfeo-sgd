<?php

/**
 * En este frame se van cargado cada una de las funcionalidades del sistema
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
error_reporting(E_ALL);
$url_raiz = "..";
require_once $url_raiz."/config.php";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];

$facElect = $_GET['facElect'];
$uzpFldr = $_GET['uzpFldr'];
$nadj = $_GET['nadj'];


/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
if (!$dir_raiz) $dir_raiz = "..";

/* * ******************************************************
 *          Encabezados de librerias estandares          *
 * ****************************************************** */
require_once "connectIMAP.php";
require_once "email.inc.php";
//include $dir_raiz ."/config.php";
//include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";

/* * ******************************************************
 *                   Programa Principal                  *
 * ****************************************************** */

/* Funcion que reemplaza algunos acentos */
function acentos($cadena) {
    $search = explode(",","á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ,Ã¡,Ã©,Ã­,Ã³,Ãº,Ã±,ÃÃ¡,ÃÃ©,ÃÃ­,ÃÃ³,ÃÃº,ÃÃ±,Ã“,Ã ,Ã‰,Ã ,Ãš,â€œ,â€ ,Â¿,ü,O?,o?");
    $replace = explode(",","á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ,á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ,Ó,Á,É,Í,Ú,\",\",¿,&uuml;,Ó,ó");
    $cadena= str_replace($search, $replace, $cadena);
 
    return $cadena;
}

/* Función que valida el tipo de MIME para retornar la extension  */
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

//$db->conn->debug =true;
$encabezado = session_name() . "=" . session_id() . "&krd=$krd&fechah=$fechah";

$iEmail = 0;
$eMailMid = $_GET['eMailMid']; //Estructura del email


//Ruta de pagina publica
$ambientePqrs = $ambientePqrs;

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

/* Se valida el tipo de radicado para mostrar el mensaje de donde consulta el tramite */
if($x4 == '4' || $x4 == '2' ) {
    $contact = 'a través de: '.$entidad_contacto.$ambientePqrs;
} 

if ($eMailMid != 0) {

    $eMailPid = $_SESSION['eMailPid'];
    
    //$body = $msg->getBody($eMailMid, $eMailPid);
    ////////////////////////////////////////////////////////////////////////////////
    $folder = $_GET['folder'];
    $body = $msg->getBody($eMailMid, $folder);
    $newbody = $msg->getEmailInfo($eMailMid, $folder);
    $header = $newbody['headerInfo'];
    $attachments = $body['attachments'];
    //var_dump($attachments);die('attachments');
    //var_dump($header);
    /////////////////////////////////////////////////////////////////////////////////

    //lectura cabeceras----
    // echo 'body '.$body;
    //$msg->getHeaders($eMailMid); // deberia remover esto ya tengo el header
    $eMailRemitente = $_SESSION['eMailRemitente'];
    $eMailNombreRemitente = $_SESSION['eMailNombreRemitente'];
    /*
    if ($body['ftype'] == "text/html")
        $nl = "</br>";
    else
        $nl = "\n";
    */
    if ($body['html_message'])
        $nl = "</br>";
    else
        $nl = "\n";
    /* Encabezado de la imagen principal .html */
    //debo adaptar aca con los nuevos elementos
    $remitente = imap_utf8($header->fromaddress) . " &lt;" . imap_utf8($header->from[0]) . "&gt;";
    $head = "<u><b>De:</b></u>". acentos($remitente) ."</br>";
    $head .= "<u><b>Para:</b></u> " . imap_utf8($header->toaddress) . " &lt;" . imap_utf8($header->to[0]->personal) . "&gt;  </br>";
    $head .= "<u><b>Asunto:</b></u> " . imap_utf8($header->subject) ?? imap_utf8($header->Subject) . "</br>";

    $remitente = imap_utf8($header->fromaddress) . " &lt;" . imap_utf8($header->from[0]->personal) . "&gt;";
    $head = "<u><b>De:</b></u> ". $remitente ."<br>";
    $head .= "<u><b>Para:</b></u> " . imap_utf8($header->toaddress) . " &lt;" . imap_utf8($header->to[0]->personal) . "&gt;";
    $head .= "<u><b>Asunto:</b></u> " . imap_utf8($header->subject) ?? imap_utf8($header->Subject) . "<br>";
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

        // Graba el Radicado 
        //$body =$msg->getBody($eMailMid,1.2);
        //debo remover esto ya tengo los headers
        //$msg->getHeaders($eMailMid);
        //aqui debo mirar si requiero traer el tipo aunque todo lo convierten a html
        //todo se vuelve html
        /*
        if ($body['ftype'] == "text/html") {
            $aExtension = "html";
            $nl = "<br>";
        } else {
            $aExtension = "html";
            $nl = "<br>";
        }*/
        $aExtension = "html";
        $nl = "<br>";

        $tmpNameEmail = $nurad . "." . $aExtension;
        $anoBodega = substr($nurad, 0, 4) . "/";
        $depeBodega = substr($nurad, 4, $_SESSION['largoDependencia']) . "/";
        $directorio = $anoBodega . $depeBodega;
        $fileRadicado = "../bodega/$directorio" . $tmpNameEmail;
        $cuerpoMensaje = str_replace("\n", "<br>", $body['html_message'] ?? $body['plain_message']);
        $archivoRadicado = $headRadicado . $head . " $nl " . $cuerpoMensaje;
        $file1 = fopen($fileRadicado, 'w');
        //var_dump($fileRadicado);
        //var_dump($file1);
        if ($file1 == NULL) { print ("Esto no abre el archivo"); }
        fputs($file1, $body['html_message'] ?? $body['plain_message']);
        fclose($file1);
        //$msg->getParts($eMailMid);

        // Finalizacion Grabacion de Radicado e inicio Grabacion de Attachment
        //debo cambiar a contar los attachments
        //$numPartes = count($msg->structure[$eMailMid]['obj']->parts);
        $radicadoAttach = "______________________________________________________________________________________$nl";
        $iMail = 0;

        /* Sección donde valida los archivos adjuntos */

        //$attachments = $body['attachments'];

        // if(isset($facElect) && $facElect !== ''){
                      
        //     //traer los attachemts
        //     $dirExtract = '../bodega/tmp/unzip/'. $uzpFldr;
        //     $filesExtracted = scandir($dirExtract);
        //     foreach($filesExtracted as $key => $value){
        //         //var_dump($value);
        //         if(stristr($value, '.xml')){
        //             $attachments[$value] = file_get_contents( $dirExtract.'/'.$value);
                    
        //         }elseif(stristr($value, '.pdf')){
        //             $attachments[$value] = file_get_contents( $dirExtract.'/'.$value);
                    
        //         }
        //     }
        // }
        
        //var_dump($attachments);die();
        if($attachments){
            foreach($attachments as $key => $value){
                // cambiar al nombre del attachment
                echo "Archivo -->" . imap_utf8($key);
                $Pid = $aid;
                //$body = $msg->getBody($eMailMid, $Pid);
            
                //$msg->getHeaders($eMailMid);               
                //$msg->getMailinboxes;
    
                // Nombre del archivo adjunto
                $fname =  imap_utf8($key) ;
    
                $aExtension = new SplFileInfo($fname); //Captura la extension
                $aExtension = $aExtension->getExtension();
                
                /* Se valida que tipo de MIME es el archivo adjunto del correo  */
                /*
                if(is_null($aExtension) || $aExtension !== ''){
                    $aExtension = typeMime($key);
                } 
                */
                //var_dump($aExtension);
    
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
                //$serieDocAnexo = 'null';
                //$subserieDocuAnexo = 'null';
    
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
                //var_dump($tmpNameEmail); die();
                $directorio = substr($nurad, 0, 4) . "/" . substr($nurad, 4, $_SESSION['largoDependencia']) . "/docs/";
    
                $fileEmailMsg = "../bodega/$directorio" . $tmpNameEmail;
                $file1 = fopen($fileEmailMsg, 'w');
                $archivo = $value;
                fputs($file1, $archivo);
                fclose($file1);
                //$anexoTamano = $msg->msg[$eMailMid]['at']['fsize'][$i];
                $anexoTamano = filesize($fileEmailMsg);
                echo "<br>Grabado Archivo en ---> <a href='$fileEmailMsg'> $fn </a>";
                $radicadoAttach .= "< " . $fname . " Tama&ntilde;o :" . $anexoTamano . " >";
                $fileEmailMsg = str_replace("..", "", $fileEmailMsg);
                $fecha_hoy = Date("Y-m-d H:i:s");
    
                if (!$db->conn)
                    echo "No hay conexion";
                $sqlFechaHoy = $db->conn->DBDate($fecha_hoy);
                //var_dump($tipoaExtension);
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
                    //var_dump($record);
                    $insert = $db->insert("anexos", $record, "true");
                    //$db->insert("anexos", $record); //<-- falla la inserción en anexos
                    //var_dump($db->insert("anexos", $record, "true"));
                    //die();
                }
            }
            echo "<br> <h4> Documento de Radicado ---> <a href='$fileRadicado' target='image'> $fileRadicado </a></h4>";
            $file1 = fopen($fileRadicado, 'w');
            fputs($file1, $archivoRadicado);
            fclose($file1);
            $routeFile = str_replace('../bodega', '', $fileRadicado);
            $isqlRadicado = "update radicado set RADI_PATH = '$routeFile' where radi_nume_radi = '$nurad'";
            $rs = $db->conn->query($isqlRadicado);
            //var_dump($rs);
            //var_dump($isql);
            //var_dump($dependencia);
            $dependencia = $depResponsable;
            print("Ha efectuado la transaccion");
            if (!$rs) {  //Si actualizo BD correctamente
                echo "Fallo la Actualizacion del Path en radicado < $isqlRadicado >";
            }
        }else {
            print("No hay Correo disponible");
        }
        
        /*
        if (count($msg->msg[$eMailMid]['at']['pid']) >= 0) {
            // Forr para colocar los remitentes en el Texto 0, o del correo.
            if (count($msg->msg[$eMailMid]['at']['pid']) > 0) {
                $numPartesi = 0;
                // cambiar a iterar sobre los attachments
                foreach ($msg->msg[$eMailMid]['at']['pid'] as $i => $aid) {
                    // cambiar al nombre del attachment
                    echo "Archivo -->" . $msg->structure[$eMailMid]['obj']->parts[$numPartesi]->dparameters[0]->value;
                    $Pid = $aid;
                    $body = $msg->getBody($eMailMid, $Pid);
                
                    //$msg->getHeaders($eMailMid);               
                    //$msg->getMailinboxes;

                    // Nombre del archivo adjunto
                    $fname =  imap_utf8($msg->msg[$eMailMid]['at']['fname'][$i]) ;

                    $aExtension = new SplFileInfo($fname); //Captura la extension
                    $aExtension = $aExtension->getExtension();

                    /* Se valida que tipo de MIME es el archivo adjunto del correo  */
            /*        if(is_null($aExtension) || $aExtension !== ''){
                        $aExtension = typeMime($msg->msg[$eMailMid]['at']['ftype'][$i]);
                    } 
                    //var_dump($aExtension);

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
                    //$serieDocAnexo = 'null';
                    //$subserieDocuAnexo = 'null';

                    /** Se consulta el tipo documental "Anexo" el cual siempre debe existir en la BD */
            /*        $tipoRadCod = "select sgd_tpr_descrip, sgd_tpr_codigo from sgd_tpr_tpdcumento where sgd_tpr_descrip = 'anexo' or sgd_tpr_descrip = 'anexos'";
                    $rsTipoRadCod = $db->conn->Execute($tipoRadCod);
                    $tipoDoocumental = isset($rsTipoRadCod->fields["sgd_tpr_codigo"]) ? $rsTipoRadCod->fields["sgd_tpr_codigo"] : $rsTipoRadCod->fields["SGD_TPR_CODIGO"];
                    
                    $numPartesi++;
                    $fn = $body['fname'];
                    //--Variable con la Cabecera en formato html---------------------//
                    //---------------------------------------------------------------//
                    $codigoAnexo = $nurad . "000$numPartesi";

                    $tmpNameEmail = $nurad . "_000" . $numPartesi . "." . $aExtension;
                    $directorio = substr($nurad, 0, 4) . "/" . substr($nurad, 4, $_SESSION['largoDependencia']) . "/docs/";

                    $fileEmailMsg = "../bodega/$directorio" . $tmpNameEmail;
                    $file1 = fopen($fileEmailMsg, 'w');
                    $archivo = $body['message'];
                    fputs($file1, $body['message']);
                    fclose($file1);
                    $anexoTamano = $msg->msg[$eMailMid]['at']['fsize'][$i];
                    echo "<br>Grabado Archivo en ---> <a href='$fileEmailMsg'> $fn </a>";
                    $radicadoAttach .= "< " . $fname . " Tama&ntilde;o :" . $anexoTamano . " >";
                    $fileEmailMsg = str_replace("..", "", $fileEmailMsg);
                    $fecha_hoy = Date("Y-m-d H:i:s");

                    if (!$db->conn)
                        echo "No hay conexion";
                    $sqlFechaHoy = $db->conn->DBDate($fecha_hoy);

                    if ($tipoaExtension != '') {
                        $record["ANEX_RADI_NUME"] = $nurad;
                        $record["ANEX_CODIGO"] = $codigoAnexo;
                        $record["ANEX_TAMANO"] = "'" . $anexoTamano . "'";
                        $record["ANEX_SOLO_LECT"] = "'S'";
                        $record["ANEX_CREADOR"] = "'" . $krd . "'";
                        $record["ANEX_DESC"] = "' Archivo:." . $fname . "'";
                        $record["ANEX_NUMERO"] = $numPartesi;
                        $record["ANEX_NOMB_ARCHIVO"] = "'" . $tmpNameEmail . "'";
                        $record["ANEX_BORRADO"] = "'N'";
                        $record["ANEX_DEPE_CREADOR"] = $_SESSION['dependencia'];
                        $record["SGD_TPR_CODIGO"] = $tipoDoocumental; //$rsTipoRadCod->fields["tdoc_codi"];
                        $record["ANEX_TIPO"] = $tipoaExtension;
                        $record["ANEX_FECH_ANEX"] = $sqlFechaHoy;
                        $record["SGD_SBRD_CODIGO"] = $serieDocAnexo;
                        $record["SGD_SRD_CODIGO"] = $subserieDocuAnexo;
                        $db->insert("anexos", $record, "true");
                    }
                }
                $radicadoAttach = $radicadoAttach . "$nl ______________________________________________________________________________________";
                $archivoRadicado = $archivoRadicado . " $nl 
                                                                                        Documentos Adjuntos : 
                                                                                        $nl $radicadoAttach";
            }
            echo "<br> <h4> Documento de Radicado ---> <a href='$fileRadicado' target='image'> $fileRadicado </a></h4>";
            $file1 = fopen($fileRadicado, 'w');
            fputs($file1, $archivoRadicado);
            fclose($file1);
            $routeFile = str_replace('../bodega', '', $fileRadicado);
            $isqlRadicado = "update radicado set RADI_PATH = '$routeFile' where radi_nume_radi = '$nurad'";
            $rs = $db->conn->query($isqlRadicado);
            print("Ha efectuado la transaccion($isql)($dependencia)");
            if (!$rs) {  //Si actualizo BD correctamente
                echo "Fallo la Actualizacion del Path en radicado < $isqlRadicado >";
            }
        } else {
            print("No hay Correo disponible");
        }*/
}
?>
