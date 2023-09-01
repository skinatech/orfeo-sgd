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
//error_reporting(0);

define('ADODB_ASSOC_CASE', $assoc);

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];
$entrada = 0;
$modificaciones = 0;
$salida = 0;
if (!isset($fecha_busq))
    $fecha_busq = date("Y-m-d");

include "$dir_raiz/config.php";
include_once "$dir_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$dir_raiz");
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
//$db->conn->debug = true;
?>
<html>
    <head>
        <title>Roles del sistema</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script language="javascript">
            function envio_datos() {
                if (document.getElementById("codrol").value == 0) {
                    alert("Debe seleccionar un rol para ser actualizado");
                    document.getElementById("codrol").focus();
                    return false;
                }
                if (document.getElementById("estadorol").value == '') {
                    alert("Debe seleccionar por lo menos un estado");
                    document.getElementById("estadorol").focus();
                    return false;
                }
                return true;
            }

            function recargar() {
	        document.getElementById("codrol").value = 0;
                document.getElementById("rol").value = '';
                document.getElementById("estadorol").value = 0;
                document.getElementById("frmCrear").submit();
            }

            function desbloqueo() {
                if (document.getElementById("codrol").value != 0 && document.getElementById("rol").value != ''
                        && document.getElementById("estadorol").value != '') {
                    $('#reg_update').removeAttr("disabled");
                }
                if (document.getElementById("codrol").value == 0 && document.getElementById("rol").value != ''
                        && document.getElementById("estadorol").value != '') {
                    $('#reg_crear').removeAttr("disabled");
                }
            }
        </script>
    </head>
    <body>
        <?php
        $encabezado = "&krd=$krd&dep_sel=$dep_sel&usModo=$usModo&perfil=$perfil&perfilOrig=$perfilOrig&cedula=$cedula&dia=$dia&mes=$mes&ano=$ano&ubicacion=$ubicacion&piso=$piso&extension=$extension&email=$email";
        ?>
        <form name='frmCrear' id='frmCrear' action='' method="POST">
            <?php
            if (isset($_POST['codrol'])) {
                $codRol = $_POST['codrol'];
                $isql1Rols = "select nomb_rol as NOMB_ROL, estado AS ESTADO from roles where nomb_rol='$codRol'";
                $rss = $db->query($isql1Rols);
                $rol = $rss->fields["NOMB_ROL"];
                $estado = $rss->fields["ESTADO"];
                if ($estado == 0) {
                    $off = 'selected';
                    $on = '';
                } else {
                    $off = '';
                    $on = 'selected';
                }
            }
            ?>
            <table width="100%" border="0" cellpadding="0" cellspacing="5" >
                <tr> 
                    <td class="titulos2" colspan="6" ><b>Informaci&oacute;n del rol</bl></td>
                </tr>
            </table>
            <table border=1 width=100% class=t_bordeGris align="center">
                <tr class="timparr update" >          
                    <td width="13%" class="listado2">
                        <label for="email">Seleccione un Rol</label>
                    </td>
                    <td width="25%" class="listado2" height="1" colspan="4">
                        <?php
                        $queryRoles = "select nomb_rol as NOMB_ROL from roles order by nomb_rol ";
                        $rsD = $db->query($queryRoles);
                        print $rsD->GetMenu2("codrol", $codrol, "0:-- Seleccione --", false, "", "onchange='submit();' class='select form-control' id='codrol' style='width:98%' title='Listado de las series existentes en el sistema'");
                        ?>
                    </td>
                </tr>
                <tr class=timparr>          
                    <td width="13%" class="listado2">
                        <label for="email">Nombre del Rol<font color="red">*</font></label>
                    </td>
                    <td class="listado2" width="25%" height="1" colspan="2">
                        <input type=text name=rol id=rol value='<?= $rol ?>' style='width: 96%;' required="" onchange='desbloqueo();' title='rol a asignar' maxlength="150">
                    </td>
                    <td width="13%" class="listado2">
                        <label for="email">Estado<font color="red">*</font></label>
                    </td>
                    <td class="listado2" width="25%" height="1" colspan="2">
                        <select name="estadorol" id="estadorol" class="select form-control" style='width: 95%' equired="" onchange='desbloqueo();' title="Seleccione/cambie el estado de la dependencia">
                            <option value="" selected>&lt; seleccione &gt;</option>
                            <option value="0" <?= $off ?>>Inactiva</option>
                            <option value="1" <?= $on ?>>Activa</option>
                        </select>
                    </td>
                </tr>
                <?php
                if (isset($_POST['reg_crear'])) {
                    $selectrol = "select nomb_rol as NOMB_ROL from roles where nomb_rol='" . strtoupper($_POST['rol']) . "'";
                    $rsrol = $db->query($selectrol);
                    if ($rsrol->fields["NOMB_ROL"]) {
                        $mensaje = "El rol ingresado ya existe";
                    } else {
                        $esta = $_POST['estadorol'];
                        $isertrol = "insert into roles (nomb_rol, fecha, estado) values('" . strtoupper($_POST['rol']) . "','" . date('Y-m-d') . "','1')";
                        $rs = $db->query($isertrol);
                        if ($rs) {
                            $mensaje = "Se cre&oacute; el rol de forma correcta";
                            echo "<script>";
                            echo "alert('".$mensaje."');";
                            echo "recargar();";
                            echo "</script>";
                        }
                    }
                }

                if (isset($_POST['reg_update'])) {
                    $esta = $_POST['estadorol'];                   
                    
                    if ($esta == 0) {
                        $queryRolesss = "select cod_rol AS COD_ROL from roles  where nomb_rol='" . $_POST['codrol'] . "'";
                        $rsDcod_rol = $db->query($queryRolesss);
                        
                        $selectRoles = "select count(usua_nomb) as COUNT from usuario where cod_rol=" . $rsDcod_rol->fields["COD_ROL"];
                        $rsselectRoles = $db->query($selectRoles);
                        
//                        echo '******************** '.$selectRoles;
                        if ($rsselectRoles->fields["COUNT"] > 0) {
                            $updaterol = "update roles set nomb_rol='" . strtoupper($_POST['rol']) . "' where nomb_rol='" . $_POST['codrol'] . "'";
                            $rs = $db->query($updaterol);
                            if ($rs) {
                                $mensaje = 'No se puede inactivar el rol, tiene usuarios asignados';
                            }
                        } else {
                            $updaterol = "update roles set nomb_rol='" . strtoupper($_POST['rol']) . "', estado= '$esta' where nomb_rol='" . $_POST['codrol'] . "'";
                            $rs = $db->query($updaterol);
                            if ($rs) {
                                $mensaje = 'Se actualizo el rol de forma correcta';
                            }
                        }
                    } else {
                        $updaterol = "update roles set nomb_rol='" . strtoupper($_POST['rol']) . "', estado= '$esta' where nomb_rol='" . $_POST['codrol'] . "'";
                        $rs = $db->query($updaterol);
                        if ($rs) {
                            $mensaje = 'Se actualizo el rol de forma correcta';
                        }
                    }
                    
//                    echo '******************** $updaterol '.$updaterol.'<br>'; 

                    // if ($rs) {
                    //     echo "<tr><td align='center' colspan='6'><center><p><span class=etexto color='red'><B><br>".$mensaje."<br></B></span></p></center></td></tr>";
                    // }
                    echo "<script>";
                    echo "alert('".$mensaje."');";
                    echo "recargar();";
                    echo "</script>";
                }
                ?>
                <!--<tr class="cajaBotonesMedio">-->
                <td height="50" colspan="2" class="listado1">
                    <span class="celdaGris"> 
                        <span class="e_texto1">
                            <center><input class="botones" type="submit" name=reg_crear id="reg_crear" Value=Guardar disabled > </center> 
                        </span> 
                    </span>
                </td>
                <td height="50" colspan="2" class="listado1">
                    <span class="celdaGris"> 
                        <span class="e_texto1">
                            <center><input class="botones" type="submit" name=reg_update id="reg_update" Value=Actualizar onClick="return envio_datos();" disabled> </center> 
                        </span> 
                    </span>
                </td>
                <td height="50" colspan="2" class="listado1">
                    <span class="celdaGris"> 
                        <span class="e_texto1">
                            <center><a href='../formAdministracion.php?<?= session_name() . "=" . session_id() . "&$encabezado" ?>'>
                                    <input class="botones" type=button name=Cancelar id=Cancelar Value=Regresar></a>
                            </center> 
                        </span> 
                    </span>
                </td>
                <!--</tr>-->
            </table>
        </form>        
    </body>
</html>