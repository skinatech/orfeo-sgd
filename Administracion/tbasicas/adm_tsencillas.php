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
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

foreach ($_GET as $key => $valor) ${$key} = $valor;
foreach ($_POST as $key => $valor)  ${$key} = $valor;
/**
 * Se añadio compatibilidad con variables globales en Off
 * @autor Jairo Losada 2009-05
 * @licencia GNU/GPL V 3
 */
include($dir_raiz . '/config.php');    // incluir configuracion.
define('ADODB_ASSOC_CASE', 1);
include($ADODB_PATH . '/adodb.inc.php'); // $ADODB_PATH configurada en config.php
$error = 0;
$dsn = $driver . "://" . $usuario . ":" . $contrasena . "@" . $servidor . "/" . $db;
$conn = NewADOConnection($dsn);

if ($conn) {
    $conn->SetFetchMode(ADODB_FETCH_ASSOC);

    //Creamos un vector con las opciones
    $vec_ppal[0] = array("&lt; Seleccione &gt;", "", "", "");
    //by skina $vec_ppal[1]= array("Causales","SGD_CAU_CAUSAL","SGD_CAU_CODIGO","SGD_CAU_DESCRIP");
//by skina 	$vec_ppal[2]= array("Resoluciones","SGD_TRES_TPRESOLUCION","SGD_TRES_CODIGO","SGD_TRES_DESCRIP");
//by skina 	$vec_ppal[3]= array("Sector","PAR_SERV_SERVICIOS","PAR_SERV_SECUE","PAR_SERV_NOMBRE");
    $vec_ppal[4] = array("Motivo Devoluci&oacute;n", "SGD_DEVE_DEV_ENVIO", "SGD_DEVE_CODIGO", "SGD_DEVE_DESC");
    //POR IMPLEMENTAR
    //$vec_ppal[5] = array("Medio Recepcion", "MREC_DESC", "MREC_CODI", "MEDIO_RECEPCION");
    //$vec_ppal[6]= array("Notificacion","SGD_NOT_DESCRIP","SGD_NOT_CODI","SGD_NOT_NOTIFICACION");
    //Generamos el combo a mostrar
    foreach ($vec_ppal as $key => $vlr) {
        (isset($_POST['slc_ppal']) && $_POST['slc_ppal'] == $key) ? $slc = 'selected' : $slc = '';
        $opc_cmb .= "<option value='$key' $slc>" . $vlr[0] . "</option>";
    }
    if (isset($_POST['slc_ppal'])) {
        switch ($_POST['slc_ppal']) {
            case 1: {
                    include($dir_raiz . '/include/class/causales.class.php');
                    $obj_tmp = new Causales($conn);
                }break;
            case 2: {
                    include($dir_raiz . '/include/class/resoluciones.class.php');
                    $obj_tmp = new Resoluciones($conn);
                }break;
            case 3: {
                    include($dir_raiz . '/include/class/sectores.class.php');
                    $obj_tmp = new Sectores($conn);
                }break;
            case 4: {
                    include($dir_raiz . '/include/class/medioDevoluciones.class.php');
                    $obj_tmp = new MedDevolucion($conn);
                }break;
            default:break;
        }
    }
    if (isset($_POST['btn_accion'])) {
        switch ($_POST['btn_accion']) {
            Case 'Agregar': {
                    $sql = "insert into " . $vec_ppal[$_POST['slc_ppal']][1] . "(" . $vec_ppal[$_POST['slc_ppal']][2] . "," . $vec_ppal[$_POST['slc_ppal']][3] . ") ";
                    $sql .= "values (" . $_POST['txtId'] . ",'" . $_POST['txtModelo'] . "')";
                    $conn->Execute($sql) ? $error = 3 : $error = 2;
                }break;
            Case 'Modificar': {
//                    $conn->debug=true;
                    $sql = "update " . $vec_ppal[$_POST['slc_ppal']][1] . " set " . $vec_ppal[$_POST['slc_ppal']][3] . " = '" . $_POST['txtModelo'] . "' ";
                    $sql .= "where " . $vec_ppal[$_POST['slc_ppal']][2] . "=" . $_POST['txtId'];
                    $conn->Execute($sql) ? $error = 4 : $error = 2;
                }break;
            Case 'Eliminar': {
                    switch ($_POST['slc_ppal']) {
                        case 1: {
                                $ok = $obj_tmp->SetDelDatos($_POST['slc_cmb2']);
                                ($ok == 0) ? $error = 5 : (($ok) ? $error = null : $error = 2);
                            }break;
                        case 2: {
                                $ok = $obj_tmp->SetDelDatos($_POST['slc_cmb2']);
                                ($ok == 0) ? $error = 5 : (($ok) ? $error = null : $error = 2);
                            }break;
                        case 3: {
                                $ok = $obj_tmp->SetDelDatos($_POST['slc_cmb2']);
                                ($ok == 0) ? $error = 5 : (($ok) ? $error = null : $error = 2);
                            }break;
                        case 4: {
                                $ok = $obj_tmp->SetDelDatos($_POST['slc_cmb2']);
                                ($ok == 0) ? $error = 5 : (($ok) ? $error = null : $error = 2);
                            }break;
                        default: {
                                
                            }break;
                    }
                }break;
            Default: break;
        }
        unset($record);
    }
    if (isset($_POST['slc_ppal'])) {
        switch ($_POST['slc_ppal']) {
            case 1: {
                    $slc_tmp = $obj_tmp->Get_ComboOpc(true, true);
                    $vec_tmp = $obj_tmp->Get_ArrayDatos();
                    $ver = 'cau';
                }break;
            case 2: {
                    $slc_tmp = $obj_tmp->Get_ComboOpc(true, true);
                    $vec_tmp = $obj_tmp->Get_ArrayDatos();
                    $ver = 'lcd';
                }break;
            case 3: {
                    $slc_tmp = $obj_tmp->Get_ComboOpc(true, true);
                    $vec_tmp = $obj_tmp->Get_ArrayDatos();
                    $ver = 'sts';
                }break;
            case 4: {
                    $slc_tmp = $obj_tmp->Get_ComboOpc(true, true);
                    $vec_tmp = $obj_tmp->Get_ArrayDatos();
                    $ver = 'mdv';
                }break;
            default: {
                    $slc_tmp = "<select name='slc_cmb2' id='slc_cmb2' class='select'title='Listado de registros relacionados a la tabla seleccionada' ><option value='0' selected>&lt;&lt; Seleccione la Tabla &gt;&gt;</option></select>";
                    $ver = false;
                }break;
        }
    }
} else {
    $error = 1;
}

/*
 * 	Funcion que convierte un valor de PHP a un valor Javascript.
 */

function valueToJsValue($value, $encoding = false) {
    if (!is_numeric($value)) {
        $value = str_replace('\\', '\\\\', $value);
        $value = str_replace('"', '\"', $value);
        $value = '"' . $value . '"';
    }
    if ($encoding) {
        switch ($encoding) {
            case 'utf8' : return iconv("ISO-8859-2", "UTF-8", $value);
                break;
        }
    } else {
        return $value;
    }
    return;
}

/*
 * 	Funcion que convierte un vector de PHP a un vector Javascript.
 * 	Utiliza a su vez la funcion valueToJsValue.
 */

function arrayToJsArray($array, $name, $nl = "\n", $encoding = false) {
    if (is_array($array)) {
        $jsArray = $name . ' = new Array();' . $nl;
        foreach ($array as $key => $value) {
            switch (gettype($value)) {
                case 'unknown type':
                case 'resource':
                case 'object': break;
                case 'array': $jsArray .= arrayToJsArray($value, $name . '[' . valueToJsValue($key, $encoding) . ']', $nl);
                    break;
                case 'NULL': $jsArray .= $name . '[' . valueToJsValue($key, $encoding) . '] = null;' . $nl;
                    break;
                case 'boolean': $jsArray .= $name . '[' . valueToJsValue($key, $encoding) . '] = ' . ($value ? 'true' : 'false') . ';' . $nl;
                    break;
                case 'string': $jsArray .= $name . '[' . valueToJsValue($key, $encoding) . '] = ' . valueToJsValue($value, $encoding) . ';' . $nl;
                    break;
                case 'double':
                case 'integer': $jsArray .= $name . '[' . valueToJsValue($key, $encoding) . '] = ' . $value . ';' . $nl;
                    break;
                default: trigger_error('Hoppa, egy j ERROR a PHP-ben?' . __CLASS__ . '::' . __FUNCTION__ . '()!', E_USER_WARNING);
            }
        }
        return $jsArray;
    } else {
        return false;
    }
}

if ($error) {
    $msg = '<tr bordercolor="#FFFFFF">
			<td width="3%" align="center" class="titulosError" colspan="3" bgcolor="#FFFFFF">';
    switch ($error) {
        case 1: //NO CONECCION A BD
            $msg .= "Error al conectar a BD, comun&iacute;quese con el Administrador de sistema !!";
            break;
        case 2: //ERROR EJECUCCION SQL
            $msg .= "Error al gestionar datos, comun&iacute;quese con el Administrador de sistema !!";
            break;
        case 3: //INSERCION REALIZADA
            $msg .= "Creaci&oacute;n exitosa!";
            break;
        case 4: //MODIFICACION REALIZADA
            $msg .= "Registro actualizado satisfactoriamente!!";
            break;
        case 5: //IMPOSIBILIDAD DE ELIMINAR REGISTRO
            $msg .= "No se puede eliminar registro, tiene dependencias internas relacionadas.";
            break;
    }
    $msg .= '</td></tr>';
}
?>
<html>
    <head>
        <script language="JavaScript">
        <!--
            function Actual()
            {
                var Obj = document.getElementById('slc_cmb2');
                var i = Obj.selectedIndex;
                document.getElementById('txtModelo').value = Obj.options[i].text;
                document.getElementById('txtId').value = Obj.value;

                document.getElementById("txtId").readonly = true;

            }

            function rightTrim(sString)
            {
                while (sString.substring(sString.length - 1, sString.length) == ' ')
                {
                    sString = sString.substring(0, sString.length - 1);
                }
                return sString;
            }

            function ver_listado()
            {
<?php
if (isset($ver)) {
    ?>
                    window.open('listados.php?var=<?= $ver ?>', '', 'scrollbars=yes,menubar=no,height=600,width=800,resizable=yes,toolbar=no,location=no,status=no');
    <?php
} else {
    echo "alert('Debe seleccionar una Opcion.');";
}
?>
            }

<?php
if (isset($vec_tmp))
    echo arrayToJsArray($vec_tmp, 'vt');
?>
        //-->
        </script>

    <title>Orfeo - Admor de tablas sencillas.</title>
    <link href="<?= $url_raiz ?>/estilos/orfeo.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
</head>
<body>
    <br>
    <br>
    <form name="form1" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <input type="hidden" name="hdBandera" value="">
        <center>
            <div id="titulo" style="width: 59%;" align="center">Administraci&oacute;n de tablas sencillas</div>
            <table width="60%" border="1" align="center" cellspacing="0" class="border_tab">
                <tr>
                    <td width="3%" align="center" class="titulos2"><b>1.</b></td>
                    <td width="25%" align="left" class="titulos2"><b>&nbsp;<label for="slc_ppal">Seleccione la tabla</label></b></td>
                    <td width="72%" class="listado2">
                            <SELECT name="slc_ppal" id="slc_ppal" class="select" onchange="this.form.submit();" title="Listado de todas las tablas sencillas existentes">
<?php if (isset($opc_cmb)) print $opc_cmb; ?>
                            </SELECT>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="titulos2"><b>2.</b></td>
                    <td align="left" class="titulos2"><b>&nbsp;<label for="slc_cmb2">Seleccione Registro</label></b></td>
                    <td align="left" class="listado2">
<?php if (isset($slc_tmp)) print $slc_tmp; ?>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" valign="middle" class="titulos2">3.</td>
                    <td align="left" class="titulos2"><b>&nbsp;<label for="txtId">C&oacute;digo</label></b></td>
                    <td class="listado2"><input name="txtId" id="txtId" type="text" size="10" maxlength="2" title="Campo para ver,editar o ingresar el código de la tabla sencilla"></td>
                </tr>
                <tr>
                    <td align="left" class="titulos2"><b>&nbsp;<label for="txtModelo">Nombre</label></b></td>
                    <td class="listado2"><input name="txtModelo" id="txtModelo" type="text" size="50" maxlength="30" title="Campo para ver, editar o ingresar el nombre de la tabla sencilla"></td>
                </tr>
<?php
if (isset($msg))
    echo $msg;
?>
            </table>
            <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" class="tablas">
                <tr class="cajaBotonesMedio">
                    <td width="10%" class="listado1">&nbsp;</td>
                    <td width="20%"  class="listado1">
                        <span class="celdaGris"> <span class="e_texto1"><center>
                                    <input name="btn_accion" type="button" class="botones" id="btn_accion" value="Listado" onClick="ver_listado();" aria-label="Listar las tablas sencillas existentes em un                                a nueva ventana">
	                    </center></span>
	</td>
                    <td width="20%" class="listado1">
                        <span class="e_texto1"><center>
                                <input name="btn_accion" type="submit" class="botones" id="btn_accion" value="Agregar" onClick="document.form1.hdBandera.value = 'A'; return ValidarInformacion();" aria-label="Agregar nueva                            tabla sencilla">
	                    </center></span>
	</td>
                    <td width="20%" class="listado1">
                        <span class="e_texto1"><center>
                                <input name="btn_accion" type="submit" class="botones" id="btn_accion" value="Modificar" onClick="document.form1.hdBandera.value = 'M'; return ValidarInformacion();" aria-label="Guardar cambios de la tabla sencil                            la seleccionada">
	                    </center></span>
	</td>
                <td width="20%" class="listado1">
                        <span class="e_texto1"><center>
                                <input name="btn_accion" type="submit" class="botones" id="btn_accion" value="Eliminar" onClick="document.form1.hdBandera.value = 'E';
                        return ValidarInformacion();" aria-label="Borrar tabla sencilla sele                                       ccionada">
		</center></span>
	</td>
                                       <td width="10%" class="listado1">&nbsp;</td>
                                </tr>
                                </table>
                                </form>
                            </center>
                                <script ID="clientEventHandlersJS" LANGUAGE="JavaScript">
<!--
    function ValidarInformacion()
    {
        var strMensaje = "Por favor ingrese las datos.";

        if (document.form1.slc_ppal.value == "0")
        {
            alert("<?= utf8_decode("No existe información para agregar, verifique"); ?>");
            //document.form1.idcont.focus();
            return false;
        }
                                
        if (rightTrim(document.form1.txtId.value) <= "0")
        {
            alert("Debe ingresar el Codigo.\n" + strMensaje);
            //document.form1.txtIdPais.focus();
            return false;
                                        } else if (isNaN(document.form1.txtId.value))
        {
            alert("El Codigo debe ser numerico.\n" + strMensaje);
            document.form1.txtIdPais.select();
            //document.form1.txtIdPais.focus();
            return false;
        }
                                
        if (document.form1.hdBandera.value == "A")
        {
            if (rightTrim(document.form1.txtModelo.value) == "")
            {
                alert("Debe ingresar descripcion.\n" + strMensaje);
                //document.form1.txtModelo.focus();
                return false;
            } else
            {
                document.form1.submit();
            }
                                        } else if (document.form1.hdBandera.value == "M")
        {
            if (rightTrim(document.form1.txtModelo.value) == "")
            {
                alert("Primero debe seleccionar el registro a modificar.\n" + strMensaje);
                return false;
            } else if (document.form1.txtId.value != document.form1.slc_cmb2.value)
            {
                alert('No se puede modificar el codigo');
                //document.form1.txtId.focus();
                return false;
            } else
            {
                document.form1.submit();
            }
                                        } else if (document.form1.hdBandera.value == "E")
        {
            if (confirm("Esta seguro de borrar este registro ?\n"))
            {
                document.form1.submit();
            } else
            {
                return false;
            }
        }
    }
//-->
</script>
</body>
</html>
