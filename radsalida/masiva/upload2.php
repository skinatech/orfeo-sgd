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
$driver = $_SESSION['driver'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";

define('ADODB_ASSOC_CASE', $assoc);

include_once "$dir_raiz/include/db/ConnectionHandler.php";
include_once("$dir_raiz/include/combos.php");

if (!$db)
    $db = new ConnectionHandler($dir_raiz);
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$db->conn->debug = false;
$archivoPlantilla = $_POST['archivoPlantilla'];
$archivoCsv = $_POST['archivoCsv'];
$tipoRad = $_POST['tipoRad'];

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

$isql = "select ANEX_TIPO_CODI, ANEX_TIPO_DESC, ANEX_TIPO_EXT from anexos_tipo order by ANEX_TIPO_DESC desc";
$rs = $db->conn->Execute($isql);
//error_log("ERROR LOG " . $url_raiz);
?>
<html>
    <head>
        <?$url_raiz = '../..'?>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>
    <body bgcolor="#FFFFFF" topmargin="0">
        <script language="JavaScript">

            /**
             * Valida que el formulario desplegado se encuentre adecuadamente diligenciado
             */
            function validar() {
                var valor;
                archivo_up = document.getElementById('archivoPlantilla').value;
                valor = 0;
                extension = (archivo_up.substring(archivo_up.lastIndexOf(".") + 1)).toLowerCase();

                <?php
                while (!$rs->EOF) {
                    if ($assoc == 0) {
                        $anextipoext = $rs->fields["ANEX_TIPO_EXT"];
                        $anextipocodi = $rs->fields["ANEX_TIPO_CODI"];
                    } else {
                        $anextipoext = $rs->fields["ANEX_TIPO_EXT"];
                        $anextipocodi = $rs->fields["ANEX_TIPO_CODI"];
                    }
                    $anex_tipo_ext = $anextipoext;
                    echo " if (extension==" . '"' . $anex_tipo_ext . '"' . ") {
                                                        valor=" . $anextipocodi . ";
                                                    }\n";
                    $rs->MoveNext();
                }
                $anexos_isql = $isql;
                ?>

                if (valor != 14 && valor != 16 && valor != 24) {
                    alert("Atenci\363n. Si el archivo no es ODT o DOCX no podr\341 realizar combinaci\363n de correspondencia. \n\n Otros tipo de archivos no facilitan su acceso");
                    return false;
                } else {
                }
                archCSV = document.formAdjuntarArchivos.archivoCsv.value;

                if ((archCSV.substring(archCSV.length - 1 - 3, archCSV.length)).indexOf(".csv") == -1) {
                    alert("El archivo de datos debe ser .csv");
                    return false;
                }

                if (document.formAdjuntarArchivos.archivoPlantilla.value.length < 1) {
                    alert("Debe ingresar el archivo de plantilla");
                    return false;
                }

                if (document.formAdjuntarArchivos.archivoCsv.value.length < 1) {
                    alert("Debe ingresar el archivo CSV");
                    return false;
                }

                if (document.formaTRD.tipo.value == 0) {
                    alert("Debe seleccionar el tipo de documento");
                    return false;
                }

                return true;
            }

            function enviar() {
                if (!validar())
                    return;

                document.formAdjuntarArchivos.accion.value = "PRUEBA";
                document.formAdjuntarArchivos.submit();
            }

        </script>

        <?php
        $phpsession = session_name() . "=" . session_id();
        if (!$tipoRad)
            $tipoRad = 1;

//TRD
        include "tipificar_masiva.php";

        $params = $phpsession . "&krd=$krd&dependencia=$dependencia&codiTRD=$codiTRD&depe_codi_territorial=$depe_codi_territorial&usua_nomb=$usua_nomb&depe_nomb=$depe_nomb&usua_doc=$usua_doc&tipo=$tipo&codusuario=$codusuario";
        ?>
        <form action="adjuntar_masiva.php?<?= $params ?>" method="post" enctype="multipart/form-data" name="formAdjuntarArchivos">
            <input type=hidden name=pNodo value='<?= $pNodo ?>'>
            <input type=hidden name=codProceso value='<?= $codProceso ?>'>
            <input type=hidden name=tipoRad value='<?= $tipoRad ?>'>
            <center>
                <div id="titulo" style="width:45%;" align="center">Adjuntar archivos</div>
                <table width="45%" align="center" border="1" cellpadding="0" cellspacing="5" class="borde_tab">
                    <tr align="center">
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo return_bytes(ini_get('upload_max_filesize')); ?>">
                    <input name="accion" type="hidden" id="accion">
                    <td width="16%" class="titulos2"><label for="archivoPlantilla">Plantilla</label></td>
                    <td width="84%" height="30" class="listado2">
                        <input name="archivoPlantilla" type="file" title="Presione espacio para  abrir ventana y adjuntar la plantilla" value='<?= $archivoPlantilla ?>' class="tex_area"  id="archivoPlantilla">
                    </td>
                    </tr>
                    <tr align="center">
                        <td class="titulos2"><label for="archivoCsv">CSV</label></td>
                        <td height="30" class="listado2">
                            <input name="archivoCsv" type="file" class="tex_area" id="archivoCsv" title="Presione espacio para abrir ventana y adjuntar el archivo CSV" value='<?= $archivoCsv ?>'>
                        </td>
                    </tr>
                    <tr align="center">
                        <td height="30" colspan="2" class="listado1">
                            <span class="celdaGris"> <span class="e_texto1">
                                    <input name="enviaPrueba" type="button" class="botones" id="envia22" onClick="enviar();" value="Enviar Prueba">
                                </span></span>
                        </td>
                    </tr>
                </table>
            </center>
        </form>
        <div class="alertaFlotante" style="width:70%">
            <h5><strong>Nota.</strong>Esta operaci&oacute;n generar&aacute; un radicado por cada registro del
                archivo CSV de origen. Por favor tenga cuidado con esta opci&oacute;n ya
                que se realizar&aacute; cambios irreversibles en la base de datos.</h5>
        </div>        
        <p>&nbsp;</p>
        <!--</blockquote>-->
    </body>
</html>
