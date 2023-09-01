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


/* ---------------------------------------------------------+
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
session_start();
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
//error_log("AQUI formUpload.php 1");

/*
 * Lista Subseries documentales
 * @autor Jairo Losada SuperSOlidaria 
 * @fecha 2009/06 Modificacion Variables Globales.
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;
$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];

require_once("$dir_raiz/class_control/Dependencia.php");

/**
 * Retorna la cantidad de bytes de una expresion como 7M, 4G u 8K.
 *
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

            function valMaxChars(maxchars)
            {
                if (document.realizarTx.observa.value.length > 0)
                {
                    if (document.realizarTx.observa.value.length > maxchars)
                    {
                        alert('Demasiados caracteres en el texto, solo se permiten ' + maxchars);
                        setSel(maxchars, document.realizarTx.observa.value.length);
                        document.realizarTx.observa.focus();
                        return false;
                    } else
                        return true;
                } else
                {
                    alert('Ingrese observaciones!!');
                    document.realizarTx.observa.focus();
                    return false;
                }
            }

            function validar()
            {
                if (valMaxChars(100))
                {
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
                    //return true;
                } else
                    return false;
            }

        </script>
        <?php
        /*  FILTRO DE DATOS
         *  @$setFiltroSelect  Contiene los valores digitados por el usuario separados por coma.
         *  @$filtroSelect Si SetfiltoSelect contiene algunvalor la siguiente rutina realiza el arreglo de la condici� para la consulta a la base de datos y lo almacena en whereFiltro.
         *  @$whereFiltro  Si filtroSelect trae valor la rutina del where para este filtro es almacenado aqui.
         *
         */


        if (!strlen(trim($valRadio))) {
            DIE("<TABLE><tr><td></td></tr></TABLE><center><table class='borde_tab' width=100% CELSPACING=5><tr class=titulosError><td><center>NO HAY REGISTROS SELECCIONADOS</CENTER></td></tr></table><center>");
        } else {
            
        }
        /*
         * OPERACIONES EN JAVASCRIPT
         * @marcados Esta variable almacena el numeo de chaeck seleccionados.
         * @document.realizarTx  Este subNombre de variable me indica el formulario principal del listado generado.
         * @tipoAnulacion Define si es una solicitud de anulacion  o la Anulacion Final del Radicado.
         *
         * Funciones o Metodos EN JAVA SCRIPT
         * Anular()  Anula o solicita esta dependiendo del tipo de anulacin.  Previamente verifica que este seleccionado algun  radicado.
         * markAll() Marca o desmarca los check de la pagina.
         *
         */
        ?>
        <script>

            function markAll(noRad)
            {
                if (document.realizarTx.elements.check_titulo.checked || noRad >= 1)
                {
                    for (i = 3; i < document.realizarTx.elements.length; i++)
                    {
                        document.realizarTx.elements[i].checked = 1;
                    }
                } else
                {
                    for (i = 3; i < document.realizarTx.elements.length; i++)
                    {
                        document.realizarTx.elements[i].checked = 0;
                    }
                }
            }

        </script>
        <?php
        /**
         * Inclusion de archivos para utiizar la libreria ADODB
         *
         */
        define('ADODB_ASSOC_CASE', $assoc);
        include_once "$dir_raiz/include/db/ConnectionHandler.php";
        $db = new ConnectionHandler("$dir_raiz");
//        $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
        $objDep = new Dependencia($db);
        //$db->conn->debug = true;

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
    <body bgcolor="#FFFFFF" topmargin="0" onLoad="markAll(1);">
        <form action="uploadTx.php?<?= $encabezado ?>" method="post" name="realizarTx" enctype="multipart/form-data">
            <table border=0 width=100% cellpadding="0" cellspacing="0">
                <tr>
                    <td width=100%>
                        <br>
                        <input type='hidden' name=depsel8 value='<?= $depsel8 ?>'>
                        <input type='hidden' name=codTx value='<?= $codTx ?>'>
                        <input type='hidden' name=EnviaraV value='<?= $EnviaraV ?>'>
                        <input type='hidden' name=fechaAgenda value='<?= $fechaAgenda ?>'>
                        <table width="98%" border="0" cellpadding="0" cellspacing="5" class="borde_tab">
                            <TR class="titulos4 tdTitulo">
                                <TD width=30% >
                                    Usuario:
                                </TD>
                                <TD width='30%'>
                                    Dependencia:
                                </TD>
                                <td rowspan="2">Asociacion de Imagen a Radicado</td>
                                <td width='5' rowspan="2">
                                    <input type="submit" value="Realizar" name="Realizar" align="bottom" class="botones" id="Realizar" onclick="return validar();">
                                </td>
                            </TR>
                            <tr class="titulos4 tdTitulo">
                                <td>
                                    <?= $_SESSION['usua_nomb'] ?>
                                </td>
                                <td>
                                    <?= $_SESSION['depe_nomb'] ?>
                                </td>
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
                            <center>
                                <table width="500"  border=0 align="center" bgcolor="White">
                                    <TR bgcolor="White">
                                        <TD width="100">
                                    <center>
                                        <img src="<?= $url_raiz ?>/iconos/tuxTx.gif" alt="Tux Transaccion" title="Tux Transaccion">
                                    </center>
                                    </td>
                                    <TD align="left">
                                        <label for="observa" class="leidos">Observaciones</label>
                                        <textarea name="observa" id="observa" cols=70 rows=3 class=tex_area></textarea>
                                    </TD>
                                    </TR>
                                </table>
                            </center>
                            <input type=hidden name=enviar value=enviarsi>
                            <input type=hidden name=enviara value='9'>
                            <input type=hidden name=carpeta value=12>
                            <input type=hidden name=carpper value=10001>
                            </td>
                            </tr>
                            <tr>
                                <td colspan=5 align="center">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo return_bytes(ini_get('upload_max_filesize')); ?>"><br>
                                    <span class="leidos"><label for="upload">Seleccione un Archivo (pdf Tama&ntilde;o Max. <?= ini_get('upload_max_filesize') ?>)</label><input type="file" id="upload" name="upload" size="50" class=tex_area accept="application/pdf" title="Permite abrir una ventana para buscar el archivo en el equipo para  asociarlo al radicado o radicados seleccionados"></span>
                                    <input type="hidden" name="replace" value="y">
                                    <input type="hidden" name="valRadio" value="<?= $valRadio ?>" title="Boton para seleccionar el radicado">
                                    <input name="check" type="hidden" value="y" checked>
                                </td>
                            </tr>
                        </TABLE>
                        <br>
                    </td>
                </tr>
            </table>
            <?php
            /*  GENERACION LISTADO DE RADICADOS
             *  Aqui utilizamos la clase adodb para generar el listado de los radicados
             *  Esta clase cuenta con una adaptacion a las clases utiilzadas de orfeo.
             *  el archivo original es adodb-pager.inc.php la modificada es adodb-paginacion.inc.php
             */
            if (!$orderNo)
                $orderNo = 0;
            $order = $orderNo + 1;
            $sqlFecha = $db->conn->SQLDate("d-m-Y H:i A", "b.RADI_FECH_RADI");
            $busq_radicados_tmp = "radi_nume_radi='$valRadio'";
            include_once "../include/query/uploadFile/queryUploadFileRad.php";
            if ($codTx == 12) {
                $isql = str_replace("Enviado Por", "Devolver a", $isql);
            }
            $pager = new ADODB_Pager($db, $query2, 'adodb', true, $orderNo, $orderTipo, "..");
            $pager->toRefLinks = $linkPagina;
            $pager->toRefVars = $encabezado;
            $pager->checkAll = true;
            $pager->checkTitulo = true;
            $pager->Render($rows_per_page = 15, $linkPagina, $checkbox = $chkAnulados);
            ?>
            <input type='hidden' name=depsel value='<?= $depsel ?>'>
        </form>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>
