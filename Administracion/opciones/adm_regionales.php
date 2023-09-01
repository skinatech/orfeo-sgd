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
$url_raiz = "../..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

/**
 * Se añadio compatibilidad con variables globales en Off
 * @autor Jairo Losada 2009-05
 * @licencia GNU/GPL V 3
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];

define('ADODB_ASSOC_CASE', $assoc);

$ADODB_COUNTRECS = false;

include_once($dir_raiz . '/config.php'); // incluir configuracion.
if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";

if ($_SESSION['usua_admin_sistema'] != 1)
    die(include "$dir_raiz/sinacceso.php");

include_once($dir_raiz . "/include/db/ConnectionHandler.php");

$db = new ConnectionHandler("$dir_raiz");
//$db->conn->debug = true;
if ($db) {
    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
    $error = 0;
    include($dir_raiz . "/class_control/Regional.php");

    if (isset($_POST['btn_accion'])) {
        $record = array();
        $depObj = new Regional($db);
        switch ($_POST['btn_accion']) {
            case 'Agregar': {
                    //Agregamos en el vector $record los registros de código y secuencias.
                    if (isset($_POST['txtRegional']) && $_POST['txtRegional'] != "") {
                        $record['REG_NOMBRE'] = $_POST['txtRegional'];

                        $query = "select * from regional where reg_nombre='" . $_POST['txtRegional'] . "'";
                        $ok1 = $db->conn->query($query);
                        if ($ok1->RecordCount() < 0) {
                            $error = 7;
                        } else {
                            $tabla = 'REGIONAL';
                            $sql = $db->conn->GetInsertSQL($tabla, $record, true, null);
                            $ok2 = $db->conn->query($sql);
                            $ok2 ? $error = 6 : $error = 8;
                        }
                    }
                }break;
            case 'Modificar': {
                    $sqlupdate = "update regional set reg_nombre='" . $_POST['txtRegional'] . "'";
                    $sqlupdate .= " where reg_codi=" . $_POST['id'];
                    $ok1 = $db->conn->query($sqlupdate);
                    $ok1 ? $error = 10 : $error = 2;
                }
                break;
            case 'Eliminar': {
                    /* a. No debe tener histórico la actual dependencia(Consecuencia del punto b). */
                    $sql = "SELECT radi_regional from radicado where radi_regional=" . $_POST['id'];
                    $ADODB_COUNTRECS = true;
                    $rs_tmp = $db->conn->Execute($sql);
                    $ADODB_COUNTRECS = false;
                    if ($rs_tmp->RecordCount() == 0) {
                        $ok = $db->conn->Execute('delete from regional where reg_codi= ' . $_POST['id']);
                        $error = 8;
                    }
                    if (!$ok)
                        $error = 11;
                }
                break;
        }
    }

    $sql = "select reg_nombre, reg_codi from regional";
    $rs = $db->conn->Execute($sql); //utilizamos este recorset para los combos de las dependencias y para traer los datos generales de todas las dependencias.
    if ($rs) {
        //Buscamos los datos de una dependencia específica para generar los datos mostrados.
        if (isset($_POST['id']) && ($_POST['id'] > 0 || $_POST['id'] != "")) {
            $sql0 = "select reg_codi, reg_nombre from regional ";
            $sql2 = "WHERE reg_codi = " . $_POST['id'];
            $v_def = $db->conn->GetAll($sql0 . $sql2);

            $txtIdReg = $assoc == 0 ? $v_def[0]['reg_codi'] : $v_def[0]['REG_CODI'];
            $txtRegional = $assoc == 0 ? $v_def[0]['reg_nombre'] : $v_def[0]['REG_NOMBRE'];
        }

        $slc_dep1 = $rs->GetMenu2('id', $txtIdReg, ':&lt;&lt seleccione &gt;&gt;', false, false, 'Class="select" Onchange="ver_datos(this.value)" id="slc_id" title="Listado con todas las dependencias existentes, una vez seleccione alguna los campos del formulario se llenarán automáticamente"');
        $rs = $db->conn->Execute($sql);
    } else {
        $error = 2;
    }
}

// Implementado por si desean mostrar errores o mensajes personalizados.
$error_msg = '<table width="82%" border="0" align="center" class="t_bordeGris"><tr><td align="center" class="titulosError">';
switch ($error) {
    case 1: // No conexion a BD
        $error_msg .= "No hay conexi&oacute;n a la B.D.";
        break;
    case 2:
        $error_msg .= "!! Error al modificar regional !!";
        break;
    case 6: // Exito en la creacion de la dependencia
        $error_msg .= "<blink>Regional creada !!!!</bink>";
        break;
    case 7: // Error en la modificacion de la dependencia
        $error_msg .= "Regional ingresada ya existe !!!!";
        break;
    case 8: // Error en la modificacion de la dependencia
        $error_msg .= "Error al crear regional !!!!";
        break;
    case 8: // Error en la modificacion de la dependencia
        $error_msg .= "Regional eliminada !!!!";
        break;
    case 10:
        $error_msg .= "!!Regional modificada con exito!!";
        break;
    case 11: // Error en la modificacion de la dependencia
        $error_msg .= "No se pudo eliminar la Regional";
        break;
    default: $error_msg .= "&nbsp;";
        break;
}
$error_msg .= '</td></tr></table>';
?>
<html>
    <head>
        <title>SGD Orfeo 6- Admon de Regionales.</title>
        <?$url_raiz="../..";?>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo $url_raiz ?>/estilos/tabber.css" TYPE="text/css" MEDIA="screen">
        <script language="JavaScript" src="<?php echo $url_raiz ?>/js/formchek.js"></script>
        <script language="JavaScript" src="<?php echo $url_raiz ?>/js/crea_combos_2.js"></script>
        <script language="Javascript">
            function ver_datos(x) {
                var pos = false;
                if (x == '') {
                    document.getElementById('txtRegional').value = '';
                    act_pes2('');
                    borra_datos(document.formSeleccion);
                } else {
                    document.formSeleccion.submit();
                }
            }

            function act_pes2(vlr) {
<?php
echo $js_pes2;
?>
            }

            function rightTrim(sString) {
                while (sString.substring(sString.length - 1, sString.length) == ' ') {
                    sString = sString.substring(0, sString.length - 1);
                }
                return sString;
            }

            function addOpt(oCntrl, iPos, sTxt, sVal) {
                var selOpcion = new Option(sTxt, sVal);
                eval(oCntrl.options[iPos] = selOpcion);
            }

            function borra_datos(form1) {
                borra_combo(form1, 7);
                borra_combo(form1, 8);
                borra_combo(form1, 9);
            }

            function ValidarInformacion(accion) {
                if ((accion == 'Agregar') || (accion == 'Modificar')) {
                    if (stripWhitespace(document.formSeleccion.txtRegional.value) == '') {
                        alert('Digite el nombre de la Regional');
                        document.formSeleccion.txtModelo.focus();
                        return false;
                    }
                }
                if (accion == 'Eliminar') {
                    a = window.confirm('Est\xe1 seguro de eliminar el registro ?');
                    if (a == true) {
                    } else {
                        return false;
                    }
                }
            }

            function ver_listado() {
                window.open('listados.php?var=reg', '', 'scrollbars=yes,menubar=no,height=600,width=800,resizable=yes,toolbar=no,location=no,status=no');
            }
        </script>
    </head>
    <body>
        <br>
        <form name="formSeleccion" id="formSeleccion" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            <table width="82%" border="1" align="center" class="t_bordeGris">
                <tr bordercolor="#FFFFFF">
                <div id="titulo" style="width: 82%; margin-left: 9%" align="center" >Administrador de Regionales</div>
                </tr>
                <tr class=timparr>
                    <td width="25%" align="left" class="titulos2"><b>&nbsp;<label for="slc_id">Seleccione Regional</label></b></td>
                    <td width="75%" colspan="5" class="listado2">
                        <?php
                        echo $slc_dep1;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="titulos2"><b>&nbsp;<label for="txtRegional">Ingrese nombre.</label></b></td>
                    <td colspan="5" class="listado2"><input name="txtRegional" id="txtRegional" type="text" size="50" maxlength="70" minlength="10" value="<?= $txtRegional ?>" title="Ingrese/edite el nombre de la regional"></td>
                </tr>
                <tr>
                    <td width="10%" class="listado1" >&nbsp;</td>
                    <td width="20%" align="center" class="listado1"><input name="btn_accion" type="button" class="botones" id="btn_accion" value="Listado" onClick="ver_listado();" accesskey="L" alt="Alt + L"></td>
                    <td width="20%" align="center" class="listado1"><input name="btn_accion" type="submit" class="botones" id="btn_accion" value="Agregar" onClick="return ValidarInformacion(this.value);" accesskey="A"></td>
                    <td width="20%" align="center" class="listado1"><input name="btn_accion" type="submit" class="botones" id="btn_accion" value="Modificar" onClick="return ValidarInformacion(this.value);" accesskey="M"></td>
                    <!--<td width="20%" align="center" class="listado1"><input name="btn_accion" type="submit" class="botones" id="btn_accion" value="Eliminar" onClick="document.form1.hdBandera.value = 'E'; return ValidarInformacion();" accesskey="E"></td>-->
                    <td width="10%" class="listado1">&nbsp;</td>
                </tr>
            </table>
            <?php
            echo $error_msg;
            ?>
            <br>
            <script type="text/javascript">
                //tabberAutomatic(tabberOptions);
            </script>
        </form>
    </body>
</html>
