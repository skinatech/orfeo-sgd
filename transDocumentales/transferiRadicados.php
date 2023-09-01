<?php

session_start();
$dir_raiz = $_SESSION['dir_raiz'];
$ruta_raiz = $_SESSION['dir_raiz'];
$depe_codi = $_SESSION["depecodi"];
$usua_codi = $_SESSION["codusuario"];
$usua_nomb = $_SESSION['usua_nomb'];
$usua_doc = $_SESSION['usua_doc'];
$_SESSION['tipo_transferencia'] = 'CENTRAL';
$rol = $_SESSION['rol'];
$sqlNotas = '';

$val_depe = ( isset($_POST['val_depe']) ? $_POST['val_depe']: 0 );
$val_radi = ( isset($_POST['val_radi']) ? $_POST['val_radi']: 0 ); 
$encabezados_radi = [];

/*** rutas de los archivos ***/
$nombreArchivo = 'archivos/'.$_SESSION['krd'].'_'.$val_depe.'.pdf';
$nombrePDF = 'transferencia_'.$val_depe.'_'.date('YmdHis').'.pdf';
$filename_bodega = $dir_raiz.'/bodega/'.date('Y').'/transDocumentales/'.$nombrePDF;

if (empty($_SESSION)) {
    $dataReturn = array('status' => false, 'text'=> 'Error de permisos: No se encuentran datos del usuario' );
    header('Content-Type: application/json');
    echo json_encode($dataReturn, JSON_FORCE_OBJECT);
}

include_once "../include/db/ConnectionHandler.php";
include_once($ruta_raiz . "/include/PHPMailer5.2/PHPMailerAutoload.php");
include_once($ruta_raiz."/config.php");
include_once ($ruta_raiz."/include/tx/Expediente.php");

/*** $mail para enviar correo a usuario que archivo el radicado ***/
$mail = new PHPMailer();
$db = new ConnectionHandler("$dir_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$sqlFechaHoy = $db->conn->OffsetDate(0, $db->conn->sysTimeStamp);

/*** 
 * Consulto en la tabla usuario para confirmar si este usuario tiene permisos de transferencias documentales
 ****/
$consPermiso = "select per_transferencia_documental from usuario where usua_login = '" . $_SESSION['krd']."' ";
$rsPer = $db->conn->query($consPermiso);

if ( $rsPer->fields['PER_TRANSFERENCIA_DOCUMENTAL'] == 0) {
    die("Error de permisos: El usuario no tiene permisos para realizar transferencias documentales");
}

/*** Consulta para llamar el rol ***/
$sqlRol = "select nomb_perfil from perfiles where codi_perfil = ". $rol." ";
$rsRol = $db->conn->query($sqlRol);
$_SESSION['rol_usuario'] = $rsRol->fields['NOMB_PERFIL'];

/*** Consulta para llamar la dependencia ***/
$sqlDep = "select depe_nomb from dependencia where depe_codi = '".$val_depe."' order by depe_codi";
$rsDep = $db->conn->Execute($sqlDep);

$_SESSION['val_nombre_depe'] = ( isset($rsDep->fields['DEPE_NOMB']) ? $rsDep->fields['DEPE_NOMB'] : ' NMBRE' );

/**** pdf_formato contiene el HEADER y el FOOTER del PDF ***/
include 'pdf_formato.php';

$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetY(60);
$pdf->SetFont('Arial', 'B', 8);

include( $dir_raiz.'/include/query/transfeDocumentales/queryExportPDF.php');

$radi = '';
foreach ($val_radi as $key => $val) { $radi .= "'".$val."',"; }
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

$htmlTable = '<table>';
$num_orden = 1;
while (!$rsC->EOF) {

    $htmlTable .= '<TR>';
    $htmlTable .= '<TD>'.$num_orden.'</TD>';
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

    $num_orden++;
    
    $rsC->MoveNext();
}
$htmlTable .= '</table>';

$pdf->SetX(5);
$pdf->WriteHTML($htmlTable);

/*** Aquí escribimos la ruta donde quedará el archivo... ***/
$pdf->Output('F', $filename_bodega );

    if( is_file($filename_bodega) ){

        $_SESSION['archivo_pdf'] = $nombrePDF;

        /*** sqlTrans se construye en queryExportPDF.php  ***/
        $sqlTrans .= " WHERE R.RADI_NUME_RADI IN (".$radi.")" ;

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
                echo 'No se pudo insertar en la tabla';
            }else{

                // Se actualiza el estado de la columna DOC_TRANSFERIDO = 2 para indicar que esta en central  //
                $sqlUR="UPDATE RADICADO SET DOC_TRANSFERIDO = 2 WHERE RADI_NUME_RADI = '".$rsT->fields['RADI_NUME_RADI']."' ";
                $rsUR = $db->conn->query($sqlUR);

                //SE VERIFICA SI ES EMAIL
                $mail_usu = trim($rsT->fields['EMAIL_USUA_ARCH']);               

                // Inicio - Envio de correo a dueños de los radicados //
                if ( filter_var($mail_usu, FILTER_VALIDATE_EMAIL)) {

                    $encabezado = "" . session_name() . "=" . session_id() . "&depeBuscada=".$depe_codi."&busqRadicados=".$rsT->fields['RADI_NUME_RADI'];
                    $correo_radi[$mail_usu][] = array( 'numero_radi' => $rsT->fields['RADI_NUME_RADI'], 'encabezado' => '<a href="'.$entidad_contacto.'/' . $ambiente . '/verradicado.php?verrad=' . trim($rsT->fields['RADI_NUME_RADI']) . '&'.$encabezado.'"> '.$rsT->fields['RADI_NUME_RADI'].' </a> , ' );
                    $encabezados_radi[] = '<a href="'.$entidad_contacto.'/' . $ambiente . '/verradicado.php?verrad=' . trim($rsT->fields['RADI_NUME_RADI']) . '&'.$encabezado.'">'.$rsT->fields['RADI_NUME_RADI'].' </a>, ';
                }

                // Se instancia la clase del expediente //
                $histExp = new Expediente($db);
                $histExp->insertHistoricoExpe($rsT->fields['NUM_EXPEDIENTE'], $rsT->fields['RADI_NUME_RADI'], $usua_doc, $usua_codi, $depe_codi, 68, 'Se transfiere el radicado '.$rsT->fields['RADI_NUME_RADI'].' al archivo central.' );

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
        $observa = 'Se realizó transferencia manual.';
        $hist = new Historico($db);
        $hist->insertarHistorico($val_radi, $depe_codi, $usua_codi, $depe_codi, $usua_codi, $observa, $codTx );

        /*** Se construye el correo al usuario que genera la transferencia ***/
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
        $mail->AddAddress($_SESSION['usua_email']);

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
            Se le informa que ha realizado una Transferencia documental a Central </b> en el Sistema de Gesti&oacute;n Documental Orfeo. Ingrese ";
        
        $mensaje .= 'a los radicados '.$msjRad;

        $mensaje .= "enviado por " . $usua_nomb . " <br></br>
            <br>Asunto: Transferencia documental </br>
            <br>
            <br>Cordialmente, </br>
            <br>Sistema de Gesti&oacute;n Documental Orfeo
            </p>
            </body>
            </html>
            ";
        $mail->MsgHTML(utf8_decode($mensaje));

        $exito = $mail->Send();
        if (!$exito) {
            $dataReturn = array('status' => true, 'text'=> 'No se pudo enviar notificaci\xf3n de la transferencia. Se realizaron las transferencias documentales', 'archivo'=> $filename_bodega );
        }else{
            $dataReturn = array('status' => true, 'text'=> 'Se realizaron las transferencias documentales', 'archivo'=> $filename_bodega );
        }
        /*** fin correo transferencia ***/

    }else{
        $dataReturn = array('status' => false, 'text'=> 'El PDF no existe' );
    }

header('Content-Type: application/json');
echo json_encode($dataReturn, JSON_FORCE_OBJECT);
