<html>
    <head>
        <title>:: Confirmaci&oacute;n de Carga de Correo Al radicado ::</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <link href="../estilos/orfeo50/logout.css" rel="stylesheet" type="text/css"/>
    </head>

    <body bgcolor="#FFFFFF" text="#000000" topmargin="0">
        <?php
        $var_envio = session_name() . "=" . trim(session_id()) . "&faxPath=$faxPath&leido=no&krd=$krd&ent=$ent&carp_per=$carp_per&carp_codi=$carp_codi&nurad=$nurad&depende=$dependencia&radi_usua_actu=radi_usua_actu";
        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";
        if ((strlen($nurad) - strlen($longitud_codigo_dependencia)) == 11)
            $consecutivo = 6;
        else
            $consecutivo = 5;
        $x1 = substr($nurad, 0, 4);
        $x2 = substr($nurad, 4, $longitud_codigo_dependencia);
        $x3 = substr($nurad, (4 + $longitud_codigo_dependencia), $consecutivo);
        $x4 = substr($nurad, -1);

        if($facElect == 1){
            $var_envio .= '&facElect=1&uzpFldr='.$uzpFldr.'&nadj='.$nadj;
        }
        
        ?> 
        <form action="uploadMail.php?eMailMid=<?= $eMailMid ?>&nurad=<?= $nurad ?>&faxPath=<?= $faxPath ?>&faxRemitente=<?= $faxRemitente ?>&<?= $var_envio ?>" method="POST">
            <br>
            <div class="flotanteMail" style="display: none">
                <table width="100%" border="0" cellspacing="0" cellpadding="4" bordercolor="#CCCCCC" height="50%" class="t_bordeGris">
                    <tr>
                        <td valign="middle" align="center">      <div align="center">
                            <table width="98%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                    <td width="52%" align="center"><br>
                                        <img src="../email/imagenes/upload-media.png" style="width: 19%;margin-top: -12px;"><br>
                                        <font face="Arial, Helvetica, sans-serif" size="5" color="#003366">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <center>
            <?php
            $destinatario = $_SESSION['usua_email'];
            $hostname = exec('hostname -f');
            $pagina_web = "https://www.skinatech.com/inicio/";
            //para el envío en formato HTML
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

            //dirección del remitente
            $headers .= "From: Orfeo SGD\r\n";

            //dirección de respuesta, si queremos que sea distinta que la del remitente
            $headers .= "Reply-To: noreplay@$hostname\r\n";

            //ruta del mensaje desde origen a destino
            $headers .= "Return-path: noreplay@$hostname\r\n";

            $motivo = "Mensaje y/o Documento Recibido. Rad. No $nurad";
            $texto = " <br>
                    Su mensaje ha sido recibido y se radic&oacute; en " . $_SESSION['entidad'] .
                                                    "con n&uacute;mero de radicaci&oacute;n $nurad.
                    <br><br>
                    A continuaci&oacute;n encontrar&aacute; el documento recibido, consulte su tramite accediendo a la p&aacute;gina
                    <a href='" . $pagina_web . "'>" . $pagina_web . "</a><br>
                    $archivoRadicado 
                    <br>
                    <TABLE BORDER=0 width=100%>
                    <TR><TD ALIGN=RIGHT>
                    <FONT SIZE=1>Sistema de Gesti&oacute;n <a href='http://www.orfeolibre.org'>Orfeo GPL</a></FONT>
                    </TD></TR></TABLE>
            ";

            // Envio la alerta
            $envioMail = mail("$destinatario", $motivo, $texto, $headers);

            if (!$envioMail) {
                echo "<h4>Fall&oacute; el env&iacute;o de correo respuesta $destinatario " . "</h4>";
            } else {
                //echo "Se envi&oacute; el correo a $destinatario ";
                // echo "<h4>Se envi&oacute; el correo a $destinatario ->" . $envioMail . "</h4>";
            }
            ?>
        </center>
    </body>
</html>
