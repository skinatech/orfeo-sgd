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
  |                     INCLUDES                             |
  +--------------------------------------------------------- */
session_start();
$url_raiz = ( isset($url_raiz) ? $url_raiz : ".." );
$dir_raiz = ( isset($dir_raiz) ? $dir_raiz : ".." );

include_once $dir_raiz."/include/db/ConnectionHandler.php";
include_once $dir_raiz."/config.php";

/* ---------------------------------------------------------+
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

$arr_rad = array();

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

$db = new ConnectionHandler($dir_raiz);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
// $db->conn->debug = true;
$sqlFechaHoy = $db->conn->OffsetDate(0, $db->conn->sysTimeStamp);

 /*
 * Asociacion de dias de termino con radicados
 * Ing. Luis Miguel Romero
 * SkinaTech
 * Fecha: 12-Septiembre-2019
 * Sistema de gestion Documental ORFEO.
 *
 * Permite realizar transferencias documentales de manera automatica
 */

 /*** Consulta en la tabla usuario con el usua_login = 'ORFEO' para traer el usuario del sistema  ***/
$sqlU = "select * from usuario where usua_login = 'ORFEO' ";

$rsU = $db->conn->query($sqlU);
if ( $rsU->fields["USUA_LOGIN"] == 'ORFEO'  ) {
    
    $_SESSION["depecodi"] = $rsU->fields["DEPE_CODI"];
	$_SESSION["codusuario"] = $rsU->fields["USUA_CODI"]; 
	$_SESSION['usua_nomb'] = $rsU->fields["USUA_NOMB"]; 
	$_SESSION['usua_doc'] = $rsU->fields["USUA_DOC"];
	$_SESSION['krd'] = $rsU->fields["USUA_LOGIN"];

	/*** Consulta para llamar el rol ***/
	$sqlRol = "select nomb_perfil from perfiles where codi_perfil = ".$rsU->fields["COD_ROL"]." ";
	$rsRol = $db->conn->query($sqlRol);
	$_SESSION['rol_usuario'] = $rsRol->fields['NOMB_PERFIL'];

}else{
	die('Error en la consulta de usuario. <br>');
}


 /*** En el include de queryProAuto se construye la consulta en la variable $sqlDR  ***/
include( $dir_raiz.'/include/query/transfeDocumentales/queryProAuto.php');

/*** Proceso para llamar los radicados que estan en Gestion para pasar a Central ***/
$rsDR = $db->conn->Execute($sqlDR);
// echo '<pre> SQL1: '.$sqlDR;
$arr_radi_depe = [];
while (!$rsDR->EOF) {

	$fecha_actual = date("Y-m-d");
	$fecha_rad = $rsDR->fields["FECHA_RADICADO"];
	$tiem_gestion = $rsDR->fields["TIEM_GESTION"];
	$num_rad = $rsDR->fields["RADI_NUME_RADI"];
	$num_depe = $rsDR->fields["DEPE_CODI"];
	$fecha_resta = date("Y-m-d",strtotime($fecha_actual."- ".$tiem_gestion." years"));

	// Divide las fechas con la misma estructura y posicion AAAA-MM-DD
	$arr_fecha_act = explode('-', $fecha_resta);
	$arr_fecha_rad = explode('-', $fecha_rad);

	//Valida la posicion cero [0] para confirmar el año 
	if( $arr_fecha_rad[0] < $arr_fecha_act[0] ){
		// array_push($arr_rad, $num_rad );
		/*** Agrega los radicados en un array por dependencia ***/
    	$arr_radi_depe[$rsDR->fields["DEPE_CODI"]][] = $rsDR->fields["RADI_NUME_RADI"] ;

	}else if( $arr_fecha_rad[0] == $arr_fecha_act[0] ){ //Valida el año actual
		
		//Valida la posicion cero [0] para confirmar el mes 
		if( $arr_fecha_rad[1] > $arr_fecha_act[1] ){
			// array_push($arr_rad, $num_rad );
			/*** Agrega los radicados en un array por dependencia ***/
    		$arr_radi_depe[$rsDR->fields["DEPE_CODI"]][] = $rsDR->fields["RADI_NUME_RADI"] ;

		}else if( $arr_fecha_rad[1] == $arr_fecha_act[1] ){ //Valida el mes actual
			
			if( $arr_fecha_act[2] > $arr_fecha_rad[2] ){
				// array_push($arr_rad, $num_rad );
				/*** Agrega los radicados en un array por dependencia ***/
    			$arr_radi_depe[$rsDR->fields["DEPE_CODI"]][] = $rsDR->fields["RADI_NUME_RADI"] ;
			}
		}
	}

    $rsDR->MoveNext();
}

/*** Recorre el arreglo para realizar el proceso de transferencias documentales ***/
foreach ($arr_radi_depe as $depe_codi => $arrRad) {
	realizarTransferencia( $depe_codi, $arrRad, 'Central'  );
}
echo ' *** Central *** <pre>';
print_r( $arr_radi_depe );

/*** Proceso para llamar los radicados que estan en Central para pasar a Histórico ***/
$rsRH = $db->conn->Execute($sqlRH);
$arr_radi_depe_hist = [];
while (!$rsRH->EOF) {

	$fecha_actual = date("Y-m-d");
	$fecha_rad = $rsRH->fields["FECHA_CENTRAL"];
	$tiem_central = $rsRH->fields["TIEM_CENTRAL"];
	$num_rad = $rsRH->fields["RADI_NUME_RADI"];
	$num_depe = $rsRH->fields["DEPE_CODI"];
	$fecha_resta = date("Y-m-d",strtotime($fecha_actual."- ".$tiem_central." years"));

	// Divide las fechas con la misma estructura y posicion AAAA-MM-DD
	$arr_fecha_act = explode('-', $fecha_resta);
	$arr_fecha_rad = explode('-', $fecha_rad);

	//Valida la posicion cero [0] para confirmar el año 
	if( $arr_fecha_rad[0] < $arr_fecha_act[0] ){
		// array_push($arr_rad, $num_rad );
		/*** Agrega los radicados en un array por dependencia ***/
    	$arr_radi_depe_hist[$rsRH->fields["DEPE_CODI"]][] = $rsRH->fields["RADI_NUME_RADI"] ;

	}else if( $arr_fecha_rad[0] == $arr_fecha_act[0] ){ //Valida el año actual
		
		//Valida la posicion cero [0] para confirmar el mes 
		if( $arr_fecha_rad[1] > $arr_fecha_act[1] ){
			// array_push($arr_rad, $num_rad );
			/*** Agrega los radicados en un array por dependencia ***/
    		$arr_radi_depe_hist[$rsRH->fields["DEPE_CODI"]][] = $rsRH->fields["RADI_NUME_RADI"] ;

		}else if( $arr_fecha_rad[1] == $arr_fecha_act[1] ){ //Valida el mes actual
			
			if( $arr_fecha_act[2] > $arr_fecha_rad[2] ){
				// array_push($arr_rad, $num_rad );
				/*** Agrega los radicados en un array por dependencia ***/
    			$arr_radi_depe_hist[$rsRH->fields["DEPE_CODI"]][] = $rsRH->fields["RADI_NUME_RADI"] ;
			}
		}
	}

    $rsRH->MoveNext();
}

/*** Recorre el arreglo para realizar el proceso de transferencias documentales ***/
foreach ($arr_radi_depe_hist as $depe_codi => $arrRad) {
	realizarTransferencia( $depe_codi, $arrRad, 'Historico'  );
}
echo '<br> *** Historico *** <br>';
print_r( $arr_radi_depe_hist );

die('<br> *** Fin Proceso automatico *** ');


/*
* Funcion realizarTransferencia que realiza toda la transferencia documental 
* @param $val_depe dependencia del los radicados
* @param $val_radi array con los numeros de radicados generados
*/
function realizarTransferencia( $val_depe, $val_radi, $proceso_ubi ){

	$dir_raiz = '..';
	$depe_codi = $_SESSION["depecodi"];
	$usua_codi = $_SESSION["codusuario"];
	$usua_nomb = $_SESSION['usua_nomb'];
	$usua_doc = $_SESSION['usua_doc'];

	switch($proceso_ubi){
		case 'Central':
			$_SESSION['tipo_transferencia'] = 'CENTRAL';
		break;
		case 'Historico':
			$_SESSION['tipo_transferencia'] = 'HISTÓRICO';
		break;
		default:
			$_SESSION['tipo_transferencia'] = 'OBSERVACIONES';
		break;
	}

	$sqlNotas = '';
	
	include_once $dir_raiz."/include/db/ConnectionHandler.php";
	// include_once($dir_raiz."/include/PHPMailer/class.phpmailer.php");
	include_once($dir_raiz."/include/PHPMailer5.2/PHPMailerAutoload.php");
	include_once ($dir_raiz."/include/tx/Expediente.php");
	include ($dir_raiz."/config.php");

	/*** rutas de los archivos ***/
	$nombreArchivo = 'archivos/'.$_SESSION['krd'].'_'.$val_depe.'.pdf';
	$nombrePDF = 'transferencia_'.$val_depe.'_'.date('YmdHis').'.pdf';
	$filename_bodega = $dir_raiz.'/bodega/'.date('Y').'/transDocumentales/'.$nombrePDF;

	$_SESSION['entidad'] = $entidad;
	$_SESSION['nit_entidad'] = $nit_entidad;

	/*** $mail para enviar correo a usuario que archivo el radicado ***/
	$mail = new PHPMailer();
	/*** $db Conexion a la base de datos ***/
	$db = new ConnectionHandler($dir_raiz);
	$sqlFechaHoy = $db->conn->OffsetDate(0, $db->conn->sysTimeStamp);

	$sqlDep = "select depe_nomb from dependencia where depe_codi = '".$val_depe."' order by depe_codi";
	$rsDep = $db->conn->Execute($sqlDep);

	$_SESSION['val_nombre_depe'] = ( isset($rsDep->fields['DEPE_NOMB']) ? $rsDep->fields['DEPE_NOMB'] : ' NMBRE' );

	/**** pdf_formato contiene el HEADER y el FOOTER del PDF ***/
	include 'pdf_formato.php';

	/*** Creación del objeto de la clase heredada ***/
	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	// $pdf->SetFont('Arial','',12);
	$pdf->SetY(60);
	$pdf->SetFont('Arial', 'B', 8);

	/*** En el include de queryExportPDF se construye la consulta en la variable $sqlC y $sqlNotas ***/
	include( $dir_raiz.'/include/query/transfeDocumentales/queryExportPDF.php');

	$radi = '';
	foreach ($val_radi as $key => $val) {
	    $radi .= "'".$val."',";
	}
	$radi = substr($radi, 0, -1);

	/*** la consulta se construye  en el archivo queryExportPDF.php ***/
	$notasEx = [];
	$sqlNotas .= " R.radi_nume_radi in (".$radi.") ORDER BY R.radi_nume_radi ";
	$rsN = $db->conn->Execute($sqlNotas);

	while (!$rsN->EOF) {
	    /*** Agrega los radicados en un array ***/
	    $notasEx[ $rsN->fields["NUM_EXPEDIENTE"] ][] = $rsN->fields["RADI_NUME_RADI"];
	    $rsN->MoveNext();
	}

	/*** la consulta se construye  en el archivo queryExportPDF.php ***/
	$sqlC .= " R.radi_nume_radi in (".$radi.") ".$group_by ;
	$rsC = $db->conn->Execute($sqlC);
	// print_r($sqlC);
	// die();

	$htmlTable = '<table>';
	while (!$rsC->EOF) {

	    $htmlTable .= '<TR>';
	    $htmlTable .= '<TD>'.$rsC->fields["NUM_EXPEDIENTE"].'</TD>';
	    $htmlTable .= '<TD>'.$rsC->fields["NOMBRE_EXPEDIENTE"].'</TD>';
	    $htmlTable .= '<TD>'.$rsC->fields["SERIE"].' - '.$rsC->fields["SUBSERIE"] .'</TD>';
	    $htmlTable .= '<TD>'.$rsC->fields["NIM_FECHA_ARCHIVADO"].'</TD>';
	    $htmlTable .= '<TD>'.$rsC->fields["MAX_FECHA_ARCHIVADO"].'</TD>';
	    $htmlTable .= '<TD> </TD>';
	    $htmlTable .= '<TD>'.$rsC->fields["CANT_NUME_RADI"].'</TD>';
	    $htmlTable .= '<TD>'.$rsC->fields["SOPORTE"].'</TD>';

	    // Construye los radicados 
	    $arr_radicados = '';
	    foreach ($notasEx as $key => $rad ) {
	        if( $key == $rsC->fields["NUM_EXPEDIENTE"] ){
	            foreach ($rad as $val ) {
	                $arr_radicados .= $val.', '; 
	            }
	        }
	    }
	    $htmlTable .= '<TD> </TD>';
	    $htmlTable .= '<TD> Radicados: '.$arr_radicados.'</TD>';
	    $htmlTable .= '</TR>';
	    $rsC->MoveNext();
	}
	$htmlTable .= '</table>';

	// print_r( $htmlTable );
	// die();

	$pdf->SetX(5);
	$pdf->WriteHTML($htmlTable);


	/*** Aquí escribimos la ruta donde quedará el archivo... ***/
	$pdf->Output('F', $nombreArchivo );

	if(is_file( $nombreArchivo )){
	    $estado = exec(' mv '.$nombreArchivo.' '.$filename_bodega );

	    if( is_file($filename_bodega) ){

	        $_SESSION['archivo_pdf'] = $nombrePDF;

	        /*** sqlTrans se construye en queryExportPDF.php  ***/
	        $sqlTrans .= " WHERE R.RADI_NUME_RADI IN (".$radi.")" ;
	        //print_r($sqlTrans);
	        // die();
	        
	        // Variable que guarda los radicados y los correos //
        	$correo_radi = []; 

	        $rsT = $db->conn->Execute($sqlTrans);
	        while (!$rsT->EOF) {
	            
	            /*** Consulta la el id_trans maximo de la tabla ***/
	            $conT = "SELECT max(ID_TRANS) AS MAXIMO FROM SGD_TRANSFE_DOCUMENTALES";
	            $rsMaxidT = $db->conn->Execute($conT);
	            $id_trans = $rsMaxidT->fields['MAXIMO'] + 1;

	            /*** Inserta la informacion de los radicados ***/
	            $sqlIT = "INSERT INTO SGD_TRANSFE_DOCUMENTALES ( id_trans, sgd_exp_numero, sgd_srd_codigo, sgd_sbrd_codigo, sgd_tpr_codigo, radi_nume_radi, fecha_archivado, depe_codi_arch, usua_codi_arch, fecha_transferencia, depe_codi_trans, usua_codi_trans, nombre_archivo ) VALUES (".$id_trans.", '".$rsT->fields['NUM_EXPEDIENTE']."', ".$rsT->fields['SERIE'].", ".$rsT->fields['SUBSERIE'].", ".$rsT->fields['TIPO_DOCUMENTAL'].", '".$rsT->fields['RADI_NUME_RADI']."', '".$rsT->fields['FECHA_ARCHIVADO']."', '".$rsT->fields['DEPE_CODI_ARCH']."', ".$rsT->fields['USUA_CODI_ARCH'].", ".$sqlFechaHoy.", '".$depe_codi."', ".$usua_codi.", '".$nombrePDF."' ) ";
	            $rsIT = $db->conn->query($sqlIT);

	            if(!$rsIT){
	                $db->conn->RollbackTrans();
	                echo 'No se pudo insertar en la tabla <br>';
	            }else{

	                /***
	                * Se actualiza el estado de la columna DOC_TRANSFERIDO = 2 para indicar que esta en central 
	                * Gestion = 1
	                * Central = 2
	                * Historico = 3
	                ***/
	                

	                switch ($proceso_ubi) {
	                	case 'Central':
	                		$cod_transfe = 2;
	                		break;
	                	case 'Historico':
	                		$cod_transfe = 3;
	                		break;
	                	default:
	                		$cod_transfe = 1;
	                		break;
	                }

	                $sqlUR="UPDATE RADICADO SET DOC_TRANSFERIDO = ".$cod_transfe." WHERE RADI_NUME_RADI = '".$rsT->fields['RADI_NUME_RADI']."' ";
	                $rsUR = $db->conn->query($sqlUR);

	                //SE VERIFICA SI ES EMAIL
	                $mail_correcto = 0;
	                $mail_usu = trim($rsT->fields['EMAIL_USUA_ARCH']);
	                // Inicio validar correo //
	                if ((strlen($mail_usu) >= 6) && (substr_count($mail_usu, "@") == 1) && (substr($mail_usu, 0, 1) != "@") && (substr($mail_usu, strlen($mail_usu) - 1, 1) != "@")) {
	                    if ((!strstr($mail_usu, "'")) && (!strstr($mail_usu, "\"")) && (!strstr($mail_usu, "\\")) && (!strstr($mail_usu, "\$")) && (!strstr($mail_usu, " "))) {
	                        //miro si tiene caracter .
	                        if (substr_count($mail_usu, ".") >= 1) {
	                            //obtengo la terminacion del dominio
	                            $term_dom = substr(strrchr($mail_usu, '.'), 1);
	                            //compruebo que la terminación del dominio sea correcta
	                            if (strlen($term_dom) > 1 && strlen($term_dom) < 5 && (!strstr($term_dom, "@"))) {
	                                //compruebo que lo de antes del dominio sea correcto
	                                $antes_dom = substr($mail_usu, 0, strlen($mail_usu) - strlen($term_dom) - 1);
	                                $caracter_ult = substr($antes_dom, strlen($antes_dom) - 1, 1);
	                                if ($caracter_ult != "@" && $caracter_ult != ".") {
	                                    $mail_correcto = 1;
	                                }
	                            }
	                        }
	                    }
	                }// Fin validar correo //

	                // Inicio - Envio de correo a dueños de los radicados //
	                if ( $mail_usu != ' ' or $mail_correcto == 1) {

	                    $encabezado = "" . session_name() . "=" . session_id() . "&depeBuscada=".$depe_codi."&busqRadicados=".$rsT->fields['RADI_NUME_RADI'];
	                    
	                    $correo_radi[$mail_usu][] = array( 'numero_radi' => $rsT->fields['RADI_NUME_RADI'], 'encabezado' => '<a href="'.$entidad_contacto.'/' . $ambiente . '/verradicado.php?verrad=' . trim($rsT->fields['RADI_NUME_RADI']) . '&'.$encabezado.'"> '.$rsT->fields['RADI_NUME_RADI'].' </a> , ' );
	                    

	                    $encabezados_radi[] = '<a href="'.$entidad_contacto.'/' . $ambiente . '/verradicado.php?verrad=' . trim($rsT->fields['RADI_NUME_RADI']) . '&'.$encabezado.'"> '.$rsT->fields['RADI_NUME_RADI'].' </a> , ';

	                } // Fin - Envio de correo //

	                // Se instancia la clase del expediente //
	                $histExp = new Expediente($db);
	                $histExp->insertHistoricoExpe($rsT->fields['NUM_EXPEDIENTE'], $rsT->fields['RADI_NUME_RADI'], $usua_doc, $usua_codi, $depe_codi, 68, 'Se transfiere el radicado '.$rsT->fields['RADI_NUME_RADI'].' al archivo '.$proceso_ubi.'.' );
	                
	            }

	            $rsT->MoveNext();
	        }

	        // Envio de correos a los dueños de los radicados
	        if( count($correo_radi) > 0 ){

	            foreach ($correo_radi as $correo_usu => $arr_val ) {
	                $arr_radi_enca = '';
	                foreach ($arr_val as $val ) {
	                    $arr_radi_enca .= $val['encabezado'];
	                }

	                // Inicio - Envio de correo a dueños de los radicados //
	                $fecha = date("F j, Y H:i:s");
	                $usMailSelect = $cuenta_mail;
	                list($a, $b) = explode("@", $usMailSelect);
	                $userName = $a;

	                $mail->IsSMTP(); // telling the class to use SMTP
	                $mail->SetFrom($usMailSelect, "SGD Orfeo");
	                $mail->Host = $servidor_mail_smtp;
	                $mail->Port = $puerto_mail_smtp;
	                $mail->SMTPDebug = "0"; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
	                $mail->SMTPAuth = "true";
	                $mail->SMTPSecure = $protocolo_smtp;
	                $mail->Username = $usMailSelect;   // SMTP account username
	                $mail->Password = $contrasena_mail; // SMTP account password
	                $mail->Subject = "Transferencia documental";
	                $mail->AltBody = "Para ver el mensaje, por favor use un visor de E-mail compatible!";
	                $mail->AddAddress($correo_usu);
	                
	                $mensaje = "<html>
	                    <head>
	                    <title>CORRESPONDENCIA EN ORFEO</title>
	                    </head>
	                    <body><p>
	                    " . $entidad . " , " . $fecha . " <br>
	                    <br></br>
	                    Se le informa que se le ha realizado una Transferencia documental a Central </b> en el Sistema de Gesti&oacute;n Documental Orfeo. Ingrese ";
	                
	                $mensaje .= 'a los radicados: '.$arr_radi_enca;

	                $mensaje .= "enviado por " . $usua_nomb . " <br></br>
	                    <br>Asunto: Transferencia documental </br>
	                    <br>
	                    <br><b>Por favor, NO responda a este mensaje, es un envío automático</b><br><br>Cordialmente, </br>
	                    <br>Sistema de Gesti&oacute;n Documental Orfeo
	                    </p>
	                    </body>
	                    </html>
	                    ";
	                $mail->MsgHTML(utf8_decode($mensaje));

	                $exito = $mail->Send();
	                if (!$exito) {
	                    echo ("No se pudo enviar correo de los radicados: ".$correo_usu );
	                }
	                // Fin - Envio de correo //
	            }

	        }

	        /*** Se incluye historico ***/
	        include_once $dir_raiz."/include/tx/Historico.php";

	        $codTx = 67;
	        $observa = 'Se realizó transferencia automatica.';
	        $hist = new Historico($db);
	        $hist->insertarHistorico($val_radi, $depe_codi, $usua_codi, $depe_codi, $usua_codi, $observa, $codTx );

	        /*** Se construye el correo a los usuarios que tienen permiso de transferencia ***/
	        $sqlUT = "SELECT USUA_EMAIL FROM USUARIO WHERE per_transferencias_documentales = 1 GROUP BY USUA_EMAIL " ;

	        $rsUT = $db->conn->Execute($sqlUT);
	        while (!$rsUT->EOF) {
	        	$mail->IsSMTP(); // telling the class to use SMTP
		        $mail->SetFrom($usMailSelect, "SGD Orfeo");
		        $mail->Host = $servidor_mail_smtp;
		        $mail->Port = $puerto_mail_smtp;
		        $mail->SMTPDebug = "0"; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
		        $mail->SMTPAuth = "true";
		        $mail->SMTPSecure = $protocolo_smtp;
		        $mail->Username = $usMailSelect;   // SMTP account username
		        $mail->Password = $contrasena_mail; // SMTP account password
		        $mail->Subject = "Transferencia documental";
		        $mail->AltBody = "Para ver el mensaje, por favor use un visor de E-mail compatible!";
		        $mail->AddAddress($rsUT->fields['USUA_EMAIL']);

		        $msjRad = '';
		        foreach ( $encabezados_radi as $val) {
		            $msjRad .= $val.' ';
		        }

		        $mensaje = "<html>
		            <head>
		            <title>CORRESPONDENCIA EN ORFEO</title>
		            </head>
		            <body><p>
		            " . $entidad . " , " . $fecha . " <br>
		            <br></br>
		            Se le informa que ha realizado una Transferencia documental a ".$proceso_ubi." </b> en el Sistema de Gesti&oacute;n Documental Orfeo. Ingrese ";
		        
		        $mensaje .= 'a los radicados '.$msjRad;

		        $mensaje .= "enviado por " . $usua_nomb . " <br></br>
		            <br>Asunto: Transferencia documental </br>
		            <br>
		            <br><b>Por favor, NO responda a este mensaje, es un envío automático</b><br><br>Cordialmente, </br>
		            <br>Sistema de Gesti&oacute;n Documental Orfeo
		            </p>
		            </body>
		            </html>
		            ";
		        $mail->MsgHTML(utf8_decode($mensaje));

		        $exito = $mail->Send();
		        if (!$exito) {
		            echo 'No se pudo enviar notificación de la transferencia al correo:'.$rsUT->fields['USUA_EMAIL'].'. <br>';
		        }else{
		            echo 'Se envió notificación de las transferencias documentales al correo:'.$rsUT->fields['USUA_EMAIL'].'. <br>';
		        }

	        	$rsUT->MoveNext();
	        }

	        /*** fin correo transferencia ***/

	        echo 'Fin proceso de transferencias documentales '.$proceso_ubi.'. <br>';

	    }else{
	        echo 'El archivo no se pudo mover <br>';
	    }

	}else{
	    echo 'El PDF no existe <br>';
	}

}
