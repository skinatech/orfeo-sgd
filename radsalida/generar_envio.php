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

        /*---------------------------------------------------------+
        |                     INCLUDES                             |
        +---------------------------------------------------------*/


        /*---------------------------------------------------------+
        |                    DEFINICIONES                          |
        +---------------------------------------------------------*/
session_start();
error_reporting(7);
$url_raiz="..";
$dir_raiz=$_SESSION['dir_raiz'];
$ESTILOS_PATH2 =$_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];
        /*---------------------------------------------------------+
        |                       MAIN                               |
        +---------------------------------------------------------*/


if (!isset($_SESSION['dependencia']))
    include "../rec_session.php";
include("$dir_raiz/config.php");
include_once "../include/db/ConnectionHandler.php";
$db = new ConnectionHandler("..");
//$db->conn->debug = true;
define('ADODB_ASSOC_CASE', $assoc);
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$fecha_busq = $_POST['fecha_busq'];
$hora_ini = $_POST['hora_ini'];
$minutos_ini = $_POST['minutos_ini'];
$hora_fin = $_POST['hora_fin'];
$minutos_fin = $_POST['minutos_fin'];
$codigo_envio = $_POST['codigo_envio'];
$generar_listado = $_GET['generar_listado'];

if (!$fecha_busq)
    $fecha_busq = date("Y-m-d");

?>
<head>
    <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
</head>
<script>
    function validar(action){
        if (action != 2){
            document.new_product.action = "generar_envio.php?<?= session_name() . "=" . session_id() . "&krd=$krd&fecha_h=$fechah" ?>&generar_listado_existente= Generar Plantilla existente ";
        } else {

            document.new_product.action = "generar_envio.php?<?= session_name() . "=" . session_id() . "&krd=$krd&fecha_h=$fechah" ?>&generar_listado= Generar Nuevo Envio ";
        }
        document.new_product.submit();
    }

    function rightTrim(sString){
        while (sString.substring(sString.length - 1, sString.length) == ' '){
            sString = sString.substring(0, sString.length - 1);
        }
        return sString;
    }

    function solonumeros(){
        jh = document.getElementById('no_planilla');
        if (rightTrim(jh.value) == "" || isNaN(jh.value)){
            alert('Solo introduzca numeros.');
            jh.value = "";
            jh.focus();
            return false;
        } else {
            document.new_product.submit();
        }
    }
</script>
<BODY>
    <div id="spiffycalendar" class="text"></div>
    <link rel="stylesheet" type="text/css" href="../js/spiffyCal/spiffyCal_v2_1.css">
    <script language="JavaScript" src="../js/spiffyCal/spiffyCal_v2_1.js"></script>
    <script language="javascript">
        setRutaRaiz("..");
    var dateAvailable = new ctlSpiffyCalendarBox("dateAvailable", "new_product", "fecha_busq", "btnDate1", "<?= $fecha_busq ?>", scBTNMODE_CUSTOMBLUE);
    </script>
    <table class=borde_tab width='100%' cellspacing="5">
        <tr>
        <div id="titulo" style="width: 50%; margin-left: 25%;" align="center">Generaci&oacute;n de Plantillas y Gu&iacute;as de Correo</div>
    </tr>
</table>
<form name="new_product"  action='generar_envio.php?<?= session_name() . "=" . session_id() . "&krd=$krd&fecha_h=$fechah" ?>' method=post>
    <center>
        <TABLE width="50%" class="borde_tab" border="2" cellspacing="5">
            <!--DWLayoutTable-->
            <TR>
                <TD width="125" height="21"  class='titulos2'><label for="fecha_busq"> Fecha</label><br></TD>
                <TD width="225" align="right" valign="top" class='listado2'>
                    <script language="javascript">
                        dateAvailable.date = "2003-08-05";
                        dateAvailable.writeControl();
                        dateAvailable.dateFormat = "yyyy-MM-dd";
                    </script>
                </TD>
            </TR>
            <TR>
                <TD height="26" class='titulos2'><label for="hora_ini"> Hora de inicio</label></TD>
                <TD valign="top" class='listado2'>
                    <?php
                    if (!$hora_ini)
                        $hora_ini = 01;
                    if (!$hora_fin)
                        $hora_fin = date("H");
                    if (!$minutos_ini)
                        $minutos_ini = 01;
                    if (!$minutos_fin)
                        $minutos_fin = date("i");
                    if (!$segundos_ini)
                        $segundos_ini = 01;
                    if (!$segundos_fin)
                        $segundos_fin = date("s");
                    ?>

                    <select name=hora_ini class='select' id="hora_ini" title="Horas">
                        <?php
                        for ($i = 0; $i <= 23; $i++) {
                            if ($hora_ini == $i) {
                                $datoss = " selected ";
                            } else {
                                $datoss = " ";
                            }
                            ?>
                            <option value='<?= $i ?>' '<?= $datoss ?>'>
                                <?= $i ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>:<select name=minutos_ini class='select' title="minutos">
                        <?php
                        for ($i = 0; $i <= 59; $i++) {
                            if ($minutos_ini == $i) {
                                $datoss = " selected ";
                            } else {
                                $datoss = " ";
                            }
                            ?>
                            <option value='<?= $i ?>' '<?= $datoss ?>'>
                                <?= $i ?>
                            </option >
                            <?php
                        }
                        ?>
                    </select>
                </TD>
            </TR>
            <Tr>
                <TD height="26" class='titulos2'><label for="hora_fin">Hora de finalizaci&oacute;n</label></TD>
                <TD valign="top" class='listado2'><select id="hora_fin" name=hora_fin class=select title="horas">
                        <?php
                        for ($i = 0; $i <= 23; $i++) {
                            if ($hora_fin == $i) {
                                $datoss = " selected ";
                            } else {
                                $datoss = " ";
                            }
                            ?>
                            <option value='<?= $i ?>' '<?= $datoss ?>'>
                                <?= $i ?>
                            </option
                            >
                            <?php
                        }
                        ?>
                    </select>:<select name=minutos_fin class=select title="minutos">
                        <?php
                        for ($i = 0; $i <= 59; $i++) {
                            if ($minutos_fin == $i) {
                                $datoss = " selected ";
                            } else {
                                $datoss = " ";
                            }
                            ?>
                            <option value='<?= $i ?>' '<?= $datoss ?>'>
                                <?= $i ?>
                            </option
                            >
                            <?php
                        }
                        ?>
                    </select>
                </TD>
            </TR>
            <tr>
                <TD height="26" class='titulos2'><label for="tipo_envio">Tipo de Salida</label></TD>
                <TD valign="top" align="left" class='listado2'>
                    <?php
                    //Modificado skinatech 26-10-2008
                    $isql = "SELECT SGD_FENV_DESCRIP,SGD_FENV_CODIGO FROM SGD_FENV_FRMENVIO ORDER BY 1";
                    $rs = $db->conn->Execute($isql);
                    if (isset($_POST['codigo_envio']))
                        $codigo_envio = $_POST['codigo_envio'];
                    else
                        $codigo_envio = '';
                    print $rs->GetMenu2("codigo_envio", $codigo_envio, "0:--Seleccione--", false, "class='select' id='tipo_envio' onChange='submit();' title='Listado de tipos de medio de envío'");
                    ?>
            <tr>
                <td colspan=2 class='titulos2'>  
            <tr><td height="26" colspan="2" valign="top" class='listado1'> <center>
                <INPUT TYPE=button name=generar_listado Value=' Generar Nuevo Env&iacute;o ' class='botones_largo' onClick="validar(2);" aria-label="Guardar información del nuevo envío generado">
            </center></td>
            </tr>
        </TABLE>
</form>
<table><tr><td></td></tr></table>
<?php
//Modificado Idrd Julio-31-2008 Todas las planillas modificadas
if (!$fecha_busq)
    $fecha_busq = date("Y-m-d");

if ($generar_listado or $generar_listado_existente) {
    error_reporting(7);
    echo "<table class=borde_tab width='50%'><tr><td class=titulos2><CENTER>". utf8_decode('FECHA DE BÚSQUEDA ') ."$fecha_busq</cebter></td></tr></table>";
    if ($generar_listado_existente) {
        $generar_listado = "Genzzz";
        echo "<table class=borde_tab width='50%'><tr><td class=listado2><CENTER>Generar Listado Existente</td></tr></table>";
    }
    include "./generaplanilla.php";
}
?>
