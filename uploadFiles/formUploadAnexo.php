<?php
session_start();
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];

foreach ($_GET as $key => $valor) ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor;
$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];

require_once("$dir_raiz/class_control/Dependencia.php");

/** Inclusion de archivos para utiizar la libreria ADODB **/
define('ADODB_ASSOC_CASE', $assoc);
include_once "$dir_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$dir_raiz");
$objDep = new Dependencia($db);
//$db->conn->debug = true;

/**
 * Retorna la cantidad de bytes de una expresion como 7M, 4G u 8K.
 * @param char $var
 * @return numeric
 */
function return_bytes($val) {
    $val = trim($val);
    $ultimo = strtolower($val{strlen($val) - 1});
    switch ($ultimo) { // El modificador 'G' se encuentra disponible desde PHP 5.1.0
        case 'g': $val *= 1024;
        case 'm': $val *= 1024;
        case 'k': $val *= 1024;
    }
    return $val;
}
?>
<html>
    <head>
        <title>Enviar Datos</title>
        <?$url_raiz=".."?>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script src="<?= $url_raiz ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?= $url_raiz ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
        <script>
            function notSupported() {
                alert('Su browser no soporta las funciones Javascript de esta pagina.');
            }

            function setSel(start, end) {
                document.realizarTx.observa.focus();
                var t = document.realizarTx.observa;
                if (t.setSelectionRange) {
                    t.setSelectionRange(start, end);
                    t.focus();
                    //f.t.value = t.value.substr(t.selectionStart,t.selectionEnd-t.selectionStart);
                } else
                    notSupported();
            }

            function validar(){

                    if (document.realizarTx.upload.value.length == 0)
                    {
                        alert('Seleccione la imagen a adjutar...');
                        document.realizarTx.upload.focus();
                        return false;
                    } else
                        extension = (document.realizarTx.upload.value.substring(document.realizarTx.upload.value.lastIndexOf("."))).toLowerCase();
                    //alert (extension);
                    if (extension == '.pdf') {
                        return true;
                    } else {
                        alert('Solo se permite cargar documentos con extención .pdf, usted cargo documento con extención ' + extension);
                        return false;
                    }
            }

            function varlidarpeso(){
                console.log(' peso ');
                $('.input-file').change(function (){
                    var sizeByte = this.files[0].size;
                    var siezekiloByte = parseInt(sizeByte / 1024);

                    if(siezekiloByte > $(this).attr('size')){
                        alert('El tamaño supera el limite permitido');
                        $(this).val('');
                    }
               });
            }
        </script>
        <?php
        /*
         * Genreamos el encabezado que envia las variable a la paginas siguientes.
         * Por problemas en las sesiones enviamos el usuario.
         * @$encabezado  Incluye las variables que deben enviarse a la singuiente pagina.
         * @$linkPagina  Link en caso de recarga de esta pagina.
         */
        $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion";
        $linkPagina = "$PHP_SELF?$encabezado&orderTipo=$orderTipo&orderNo=";
        ?>
    </head>
    <body bgcolor="#FFFFFF" topmargin="0">
        <form action="uploadArchivoRadicado.php?<?= $encabezado ?>" method="post" name="realizarTx" enctype="multipart/form-data">
            <table border=0 width=100% cellpadding="0" cellspacing="0">
                <tr>
                    <td width=100%>
                        <br>
                        <table width="98%" border="0" cellpadding="0" cellspacing="5" class="borde_tab">
                            <TR class="titulos4 tdTitulo">
                                <td width=30% > Usuario: </td>
                                <td width='30%'> Dependencia: </td>
                                <td rowspan="2">Asociar Anexo Radicado</td>
                                <td width='5' rowspan="2">
                                    <input type="submit" value="Realizar" name="Realizar" align="bottom" class="botones" id="Realizar" onclick="return validar();">
                                </td>
                            </TR>
                            <tr class="titulos4 tdTitulo">
                                <td> <?= $_SESSION['usua_nomb'] ?> </td>
                                <td> <?= $_SESSION['depe_nomb'] ?> </td>
                            </tr>
                            <tr align="center">
                                <td colspan="4" class="celdaGris" align=center><br>
                                    <?php
                                    if (($codusuario == 1) || ($usuario_reasignacion == 1)) {
                                        ?>
                                        <input type=checkbox name=chkNivel id="chkNivel" checked class=ebutton>
                                        <span class="info"><label for="chkNivel">El documento tomara el nivel del usuario destino.</label></span><br>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <center>
                                <table width="500"  border=0 align="center" bgcolor="White">
                                    <tr bgcolor="White">
                                        <td width="100"><center></center></td>
                                        <td align="left">
                                            <label for="observa" class="info">Número Radicado:</label>
                                            <input type="text" name="numeroradicado" required="true" id="numeroradicado" class="form-control" />
                                        </td>
                                    </tr>
                                </table>
                            </center><br>
                            <center>
                                <table width="500"  border=0 align="center" bgcolor="White">
                                    <tr bgcolor="White">
                                        <td width="100"> <center></center></td>
                                        <td align="left">
                                            <label for="observa" class="info">Tipo Documental</label>
                                            <?php
                                                $query = "select SGD_TPR_DESCRIP,SGD_TPR_CODIGO from SGD_TPR_TPDCUMENTO WHERE SGD_TPR_TP$ent='1' and SGD_TPR_RADICA='1' ORDER BY SGD_TPR_DESCRIP ";
                                                $opcMenu = "0:-- Seleccione un tipo --";
                                                $fechaHoy = date("Y-m-d");
                                                $fechaHoy = $fechaHoy . "";
                                                $ADODB_COUNTRECS = true;
                                                $rs = $db->conn->query($query);
                                                if ($rs && !$rs->EOF) {
                                                    $numRegs = "!" . $rs->RecordCount();
                                                    $varQuery = $query;
                                                                                              
                                                    print $rs->GetMenu2("tdoc", $tdoc, "$opcMenu", false, "", "class='selectReducido form-control' style='width: 99%' id='tdoc' id='tdoc' title='Lista con tipos de dpcumentos'");
                                                } else {
                                                    $tdoc = 0;
                                                }
                                                $ADODB_COUNTRECS = false;
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                            <center>
                                <table width="500"  border=0 align="center" bgcolor="White">
                                    <tr bgcolor="White">
                                        <td width="100">
                                            <center>
                                                <img src="<?= $url_raiz ?>/iconos/tuxTx.gif" alt="Tux Transaccion" title="Tux Transaccion">
                                            </center>
                                        </td>
                                        <td align="left">
                                            <label for="observa" class="info">Observaciones</label>
                                            <textarea name="observa" id="observa" min="6" cols=70 rows=3 required="true" class="tex_area form-control"></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </center>                            
                            <tr>
                                <td colspan=5 align="center">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo return_bytes(ini_get('upload_max_filesize')); ?>"><br>
                                    <span class="info">
                                        <label for="upload">Seleccione un Archivo (pdf Tama&ntilde;o Max. <?= ini_get('upload_max_filesize') ?>)</label>
                                        <input type="file" id="upload" name="upload" size="50" class=tex_area onchange="varlidarpeso();" accept="application/pdf" />
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <br>
                    </td>
                </tr>
            </table>
            <input type='hidden' name=depsel value='<?= $depsel ?>'>
        </form>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>