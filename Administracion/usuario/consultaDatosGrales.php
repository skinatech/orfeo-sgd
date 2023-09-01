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
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

$krdOld = $krd;
$carpetaOld = $carpeta;
$tipoCarpOld = $tipo_carp;
if (!$tipoCarpOld)
    $tipoCarpOld = $tipo_carpt;
if (!$krd)
    $krd = $krdOld;
if (!$_SESSION['dependencia'])
    include "../../rec_session.php";
$entrada = 0;
$modificaciones = 0;
$salida = 0;
$valRadio = $_POST['valRadio'];
$usModo = $_GET['usModo'];
?>
<html>
    <head>
        <title>Untitled Document</title>
        <?$url_raiz="../.."?>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <script language="javascript">
        function envio_datos()
        {
            if (document.forms[0].perfil.value == "Jefe")
            {
                if (document.forms[0].nombreJefe.value == "") {
                } else {
                    alert("En la dependencia " + document.forms[0].dep_sel.value + ", ya existe un usuario jefe, " + document.forms[0].nombreJefe.value + ", por favor verifique o realice los cambios necesarios para poder continuar con este proceso");
                    document.forms[0].perfil.focus();
                    return false;
                }
            }

            if ((document.forms[0].cedula.value == "") || (isNaN(document.forms[0].cedula.value)))
            {
                alert("No se ha diligenciado el Numero de la Cedula del Usuario, o a diligenciado un valor no n�merico.");
                document.forms[0].cedula.focus();
                return false;
            }

            if (document.forms[0].usuLogin.value == "")
            {
                alert("El campo Login del Usuario no ha sido diligenciado.");
                document.forms[0].usuLogin.focus();
                return false;
            }

            if (document.forms[0].nombre.value == "")
            {
                alert("El campo de Nombres y Apellidos no ha sido diligenciado.");
                document.forms[0].nombre.focus();
                return false;
            } else
            {
                document.forms[0].submit();
                return true;
            }
        }

    </script>

    <body>
        <?php
        include "../../config.php";
        include_once "$dir_raiz/include/db/ConnectionHandler.php";
        $db = new ConnectionHandler("$dir_raiz");
        define('ADODB_FETCH_ASSOC', 0);
        $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
//  $db->conn->debug = false;
        $encabezado = "&krd=$krd&dep_sel=$dep_sel&usModo=$usModo&perfil=$perfil&cedula=$cedula&dia=$dia&mes=$mes&ano=$ano&ubicacion=$ubicacion&piso=$piso&extension=$extension&email=$email";
        ?>
    <center>
        <form name='frmCrear' action='consultaPermisos.php?<?= session_name() . "=" . session_id() . "&$encabezado" ?>' method="post">
            <table width="93%"  border="1" align="center">
                <tr bordercolor="#FFFFFF">
                <div id="titulo" style="width: 93%; " align="center" >
                    Consulta de usuario
                </div>
                </tr>
            </table>

            <table border=1 width=93% class=t_bordeGris>
                <?php
                if ($usModo == 2) {    //modo editar
                    if ($valRadio) {
                        $usuSelec = $valRadio;
                        $usuario_mat = preg_split("/[\s-]+/", $usuSelec, 2);
                        $usuDocSel = $usuario_mat[0];
                        $usuLoginSel = $usuario_mat[1];
//      }
//      if ($usuLoginSel) {
                        $isql = "SELECT *
                 FROM USUARIO
                 WHERE USUA_LOGIN = '$usuLoginSel'";
                        $rsCrea = $db->query($isql);
                        if ($rsCrea->fields["usua_codi"] == 1)
                            $perfil = "Jefe";
                        else
                            $perfil = "Normal";
                        $cedula = $assoc == 0 ? $rsCrea->fields["usua_doc"] : $rsCrea->fields["USUA_DOC"];
                        $usuLogin = $assoc == 0 ? $rsCrea->fields["usua_login"] : $rsCrea->fields["USUA_LOGIN"];
                        $nombre = $assoc == 0 ? $rsCrea->fields["usua_nomb"] : $rsCrea->fields["USUA_NOMB"];
                        $dep_sel = $assoc == 0 ? $rsCrea->fields["depe_codi"] : $rsCrea->fields["DEPE_CODI"];
                        $fecha_nacim = $assoc == 0 ? substr($rsCrea->fields["usua_nacim"], 0, 11) : substr($rsCrea->fields["USUA_NACIM"], 0, 11);
                        $dia = substr($fecha_nacim, 8, 2);
                        $mes = substr($fecha_nacim, 5, 2);
                        $ano = substr($fecha_nacim, 0, 4);
                        $ubicacion = $assoc == 0 ? $rsCrea->fields["usua_at"] : $rsCrea->fields["USUA_AT"];
                        $piso = $assoc == 0 ? $rsCrea->fields["usua_piso"] : $rsCrea->fields["USUA_PISO"];
                        $extension = $assoc == 0 ? $rsCrea->fields["usua_ext"] : $rsCrea->fields["USUA_EXT"];
                        $email = $assoc == 0 ? $rsCrea->fields["usua_email"] : $rsCrea->fields["USUA_EMAIL"];
                        $usua_activo = $assoc == 0 ? $rsCrea->fields["usua_esta"] : $rsCrea->fields["USUA_ESTA"];
                        $env_correo = $assoc == 0 ? $rsCrea->fields["usua_perm_envios"] : $rsCrea->fields["USUA_PERM_ENVIOS"];
                        $adm_sistema = $assoc == 0 ? $rsCrea->fields["usua_admin_sistema"] : $rsCrea->fields["USUA_ADMIN_SISTEMA"];
                        $adm_archivo = $assoc == 0 ? $rsCrea->fields["usua_admin_archivo"] : $rsCrea->fields["USUA_ADMIN_ARCHIVO"];
                        $usua_nuevoM = $assoc == 0 ? $rsCrea->fields["usua_nuevo"] : $rsCrea->fields["USUA_NUEVO"];
                        $nivel = $assoc == 0 ? $rsCrea->fields["codi_nivel"] : $rsCrea->fields["CODI_NIVEL"];
                        $codRol = $assoc == 0 ? $rsCrea->fields['cod_rol'] : $rsCrea->fields['COD_ROL'];
                        
                        if ($rsCrea->fields["usua_prad_tp1"] == 1)
                            $salida = 1;
                        if ($rsCrea->fields["usua_prad_tp1"] == 2)
                            $impresion = 1;
                        if ($rsCrea->fields["usua_prad_tp1"] == 3) {
                            $salida = 1;
                            $impresion = 1;
                        }
                        $masiva = $assoc == 0 ? $rsCrea->fields["usua_masiva"] : $rsCrea->fields["USUA_MASIVA"];
                        $dev_correo = $assoc == 0 ? $rsCrea->fields["usua_perm_dev"] : $rsCrea->fields["USUA_PERM_DEV"];
                        $sgd_panu_codi = $assoc == 0 ? $rssqlselect->fields["sgd_panu_codi"] : $rssqlselect->fields["SGD_PANU_CODI"];

                        if ($sgd_panu_codi == 1)
                            $s_anulaciones = 1;
                        if ($sgd_panu_codi == 2)
                            $anulaciones = 1;
                        if ($sgd_panu_codi == 3) {
                            $s_anulaciones = 1;
                            $anulaciones = 1;
                        }
                    }
                }
                ?>
                <tr class=timparr>
                    <td class="listado2" width="13%"><label for="perfil">Rol <font color="red">*</font></label></td>
                    <td class="listado2" width="22%" height="1">
                        <?php
                        $sqlrol = "select nomb_rol ,cod_rol from roles where estado=1 and cod_rol = ". $codRol ." order by cod_rol";
                        $rsRol = $db->conn->Execute($sqlrol);

                        print $rsRol->GetMenu2("rol_sel", "$rol_sel", false, false, 0, " disabled title='Rol acorde a permisos de activos de informaci&oacute;n' class='select form-control' id='rol_sel' style='width: 96%;'");
                        ?>
                    </td>
                    <td class="listado2" width="13%"><label for="perfil">Perfil <font color="red">*</font></label></td>
                    <td class="listado2" width="10%">
                        <?php
                        $perf_1 = "Normal";
                        $perf_2 = "Jefe";
                        if ($perfil == "Jefe") {
                            $perf_1 = "Jefe";
                            $perf_2 = "Normal";
                        }
                        ?>
                        <select name=perfil class='select form-control' disabled id="perfil" style='width: 96%;' title='Identifica si el usuario es jefe o funcionario'>
                            <option value='<?= $perf_1 ?>' > <?= $perf_1 ?> </option>
                            <option value='<?= $perf_2 ?>' > <?= $perf_2 ?> </option>
                        </select>
                    </td>
                    <td class="listado2" width="13%"><label for="dep_sel">Dependencia <font color="red">*</font></label></td>
                    <td class="listado2" width="25%">
                        <?php
                        include_once "$dir_raiz/include/query/envios/queryPaencabeza.php";
                        $sqlConcat = $db->conn->Concat($db->conn->substr . "($conversion,1,5) ", "'-'", $db->conn->substr . "(depe_nomb,1,30) ");
                        $sql = "select $sqlConcat ,depe_codi from dependencia where depe_estado=1 order by depe_codi";
                        $rsDep = $db->conn->Execute($sql);
                        if (!isset($depeBuscada))
                            $depeBuscada = $dependencia;if (!isset($dep_sel))
                            $dep_sel = "";
                        print $rsDep->GetMenu2("dep_sel", "$dep_sel", false, false, 0, " disabled class='select form-control' title='Dependencia a la que pertenece el usuario que se esta creando' id='dep_sel' style='width: 96%;'");
                        ?>
                    </td>
                </tr>
                <tr class=timparr>
                    <?php
                    if (!isset($nombreJefe))
                        $nombreJefe = "";
                    if (!isset($cedulaYa))
                        $cedulaYa = "";
                    if (!isset($cedula))
                        $cedula = "";
                    if (!isset($usuLogin))
                        $usuLogin = "";
                    if (!isset($nombre))
                        $nombre = "";if (!isset($ronly_log))
                        $ronly_log = "";
                    ?>
                <input name="nombreJefe" type="hidden" value='<?= $nombreJefe ?>'>
                <input name="cedulaYa" type="hidden" value='<?= $cedulaYa ?>'>
                <?php if ($usModo == 1) { ?>
                    <td class="listado2" width="13%"><label for="cedula">N&uacute;mero C&eacute;dula <font color="red">*</font></label> </td>
                    <td class="listado2" width="22%" height="1">
                        <input type=text name=cedula disabled="" id=cedula value='<?= $cedula ?>' style='width: 96%;' maxlenght="12" onKeyPress="return acceptNum(event)" required="">
                    </td>
                    <td class="listado2" width="13%"><label for="usuLogin">Usuario <font color="red">*</font></label> </td>
                    <td class="listado2" width="15%" height="1">
                        <input type=text name=usuLogin disabled="" id=usuLogin value='<?= $usuLogin ?>' title='Login con el que se va a ingresar al sistema' maxlength="20" style='width: 96%;' required="">
                    </td>
                <?php } else { ?>
                    <td class="listado2" width="13%"><label for="cedula">N&uacute;mero C&eacute;dula <font color="red">*</font></label> </td>
                    <td class="listado2" width="22%" height="1">
                        <input  type="text" name="cedula" disabled="" id="cedula" value='<?= $cedula ?>'<?= $ronly_doc ?> style='width: 96%;' title='Login con el que se va a ingresar al sistema' maxlenght="12" onKeyPress="return acceptNum(event)" required="">
                    </td>
                    <td class="listado2" width="13%"><label for="usuLogin">Usuario <font color="red">*</font></label> </td>
                    <td class="listado2" width="15%" height="1">
                        <input  type="text" name="usuLogin" disabled="" id="usuLogin"  value='<?= $usuLogin ?>' <?= $ronly_log ?>  maxlength="20" style='width: 96%;' required="">
                    </td>
                <?php }
                ?>
                <td width="13%" class="listado2">
                    <label for="email">Correo Electronico&nbsp; <font color="red">*</font></label>
                </td>
                <td class="listado2" width="25%" height="1">
                    <input type=email name=email disabled="" id=email value='<?= $email ?>' style='width: 96%;' placeholder="xxx@xxxx.com" required="" title='Correo electronico institucional'>
                </td>
                </tr>
                <tr class=timparr>
                    <td class="listado2" width="13%"><label for="nombre">Nombre y Apellido <font color="red">*</font></label>  </td>
                    <td class="listado2" width="22%" height="1" colspan="1">
                        <!--
                        Skinatech
                        Autor: Andrés Mosquera
                        Fecha: 08-11-2018
                        Información: Input sin disabled para que el valor sea enviado por POST
                        -->
                        <input type=text name="nombre" readonly="readonly" id="nombre" style='width: 96%;' value='<?= $nombre ?>' maxlength="45" required="" onKeyPress="return check(event)">
                    </td>
                    <td class="listado2" width="13%"><label for="select2">Fecha de Nacimiento</label></td>
                    <td width="10%" class="listado2">
                        <!--<label for="select">D&iacute;a</label>-->
                        <select name="dia" disabled="" id="select" class="select form-control" style="width: 96%;">
                            <?php
                            for ($i = 0; $i <= 31; $i++) {
                                if ($i == 0) {
                                    echo "<option value=''>" . "-D&iacute;a-" . "</option>";
                                } else {
                                    if ($i < 10)
                                        $datos = "0" . $i;
                                    else
                                        $datos = $i;
                                    if (isset($dia) && $i == $dia) {
                                        echo "<option value=$datos selected>$datos</option>";
                                    } else
                                        echo "<option value=$datos>$datos</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td width="10%" class="listado2">
                        <!--<label for="select2">Mes</label>-->
                        <select name="mes" disabled="" id="select2" class="select form-control" style="width: 94%;">
                            <?php
                            $meses = array(
                                0 => "",
                                1 => "Enero",
                                2 => "Febrero",
                                3 => "Marzo",
                                4 => "Abril",
                                5 => "Mayo",
                                6 => "Junio",
                                7 => "Julio",
                                8 => "Agosto",
                                9 => "Septiembre",
                                10 => "Octubre",
                                11 => "Noviembre",
                                12 => "Diciembre");
                            for ($i = 0; $i <= 12; $i++) {
                                if ($i == 0) {
                                    echo "<option value=" . "" . ">" . "-Mes-" . "</option>";
                                } else {
                                    if ($i < 10)
                                        $datos = "0" . $i;
                                    else
                                        $datos = $i;
                                    if (isset($mes) && $datos == $mes) {
                                        echo "<option value=$datos selected>" . $meses[$i] . "</option>";
                                    } else
                                        echo "<option value=$datos>" . $meses[$i] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td width="10%" class="listado2">
                        <!--<label for="ano">A&ntilde;o</label>-->
                        <?php if (!isset($ano)) $ano = ""; ?>
                        <input name="ano" type="text" disabled="" id="ano" maxlength="4" class="" placeholder="A&ntilde;o" onkeypress="return acceptNum(event)" style="width: 96%;" value='<?= $ano ?>'>&nbsp;
                    </td>
                </tr>
                <tr class=timparr>
                    <?php
                    if (!isset($ubicacion))
                        $ubicacion = "";
                    if (!isset($piso))
                        $piso = "";
                    if (!isset($extension))
                        $extension = "";if (!isset($email))
                        $email = "";
                    if (!isset($entrada))
                        $entrada = "";if (!isset($modificaciones))
                        $modificaciones = "";if (!isset($masiva))
                        $masiva = "";
                    if (!isset($impresion))
                        $impresion = "";if (!isset($s_anulaciones))
                        $s_anulaciones = "";if (!isset($anulaciones))
                        $anulaciones = "";
                    if (!isset($adm_archivo))
                        $adm_archivo = "";if (!isset($dev_correo))
                        $dev_correo = "";
                    if (!isset($adm_sistema))
                        $adm_sistema = "";if (!isset($env_correo))
                        $env_correo = "";if (!isset($reasigna))
                        $reasigna = "";if (!isset($estadisticas))
                        $estadisticas = "";if (!isset($usua_activo))
                        $usua_activo = "";if (!isset($usua_nuevoM))
                        $usua_nuevoM = "";if (!isset($nivel))
                        $nivel = "";if (!isset($usuDocSel))
                        $usuDocSel = "";if (!isset($usuLoginSel))
                        $usuLoginSel = "";if (!isset($perfilOrig))
                        $perfilOrig = "";if (!isset($nusua_codi))
                        $nusua_codi = "";
                    ?>
                    <td class="listado2" width="13%"><label for="ubicacion">Ubicaci&oacute;n</label> </td>
                    <td class="listado2" width="22%" height="1">
                        <input type=text name=ubicacion id=ubicacion disabled="" value='<?= $ubicacion ?>' style='width: 96%;' maxlength="50">
                    </td>
                    <td width="13%" class="listado2"><label for="piso">Piso</label> </td>
                    <td class="listado2" width="10%" height="1">
                        <input type=text name=piso id=piso disabled="" value='<?= $piso ?>' style='width: 96%;' onkeypress="return acceptNum(event)" maxlength="2">
                    </td>
                    <td width="13%" class="listado2"><label for="extension">Extensi&oacute;n</label> </td>
                    <td class="listado2" width="25%" height="1">
                        <input type=text name=extension disabled="" id=extension value='<?= $extension ?>' style='width: 96%;' onkeypress="return acceptNum(event)" maxlength="6">
                    </td>
                </tr>
                <input type=hidden name=entrada id=entrada value='<?= $entrada ?>'>
                <input type=hidden name=modificaciones id=modificaciones value='<?= $modificaciones ?>'>
                <input type=hidden name=masiva id=masiva value='<?= $masiva ?>'>
                <input type=hidden name=impresion id=impresion value='<?= $impresion ?>'>
                <input type=hidden name=s_anulaciones id=s_anulaciones value='<?= $s_anulaciones ?>'>
                <input type=hidden name=anulaciones id=anulaciones value='<?= $anulaciones ?>'>
                <input type=hidden name=adm_archivo id=adm_archivo value='<?= $adm_archivo ?>'>
                <input type=hidden name=dev_correo id=dev_correo value='<?= $dev_correo ?>'>
                <input type=hidden name=adm_sistema id=adm_sistema value='<?= $adm_sistema ?>'>
                <input type=hidden name=env_correo id=env_correo value='<?= $env_correo ?>'>
                <input type=hidden name=reasigna id=reasigna value='<?= $reasigna ?>'>
                <input type=hidden name=estadisticas id=estadisticas value='<?= $estadisticas ?>'>
                <input type=hidden name=usua_activo id=usua_activo value='<?= $usua_activo ?>'>
                <input type=hidden name=usua_nuevoM id=usua_nuevoM value='<?= $usua_nuevoM ?>'>
                <input type=hidden name=nivel id=nivel value='<?= $nivel ?>'>
                <input type=hidden name=usuDocSel id=usuDocSel value='<?= $usuDocSel ?>'>
                <input type=hidden name=usuLoginSel id=usuLoginSel value='<?= $usuLoginSel ?>'>
                <input type=hidden name=perfilOrig id=perfilOrig value='<?= $perfilOrig ?>'>
                <input type=hidden name=nusua_codi id=nusua_codi value='<?= $nusua_codi ?>'>
                <input type="hidden" name="rolactual" id="rolactual" value="<?=$rolactual?>" />
            </table>

            <div align="center">
                <table border=0 width=93% class=t_bordeGris>
                    <tr class="cajaBotonesMedio">
                        <td height="30" colspan="2" class="listado1"><center><input class="botones" type=button name=reg_crear id=Continuar_button Value="Continuar" onClick="envio_datos();"></center>  </td>
                    <td height="30" colspan="2" class="listado1"><center>
                        <a href='../formAdministracion.php?<?= session_name() . "=" . session_id() . "&$encabezado" ?>'><input class="botones" type=button name=Cancelar id=Cancelar Value=Cancelar></a></center>  </td>
                    </tr>
                </table>
            </div>
            <?php
            $encabezado = "&krd=$krd&dep_sel=$dep_sel&usModo=$usModo&perfil=$perfil&cedula=$cedula";
            ?>
        </form>
        <span class=etexto><center>
                <?php
                $encabezado = "&krd=$krd&dep_sel=$dep_sel&usModo=$usModo&perfil=$perfil&cedula=$cedula&dia=$dia&mes=$mes&ano=$ano&ubicacion=$ubicacion&piso=$piso&extension=$extension&email=$email";
                ?>
            </center></span>
    </body>
</html>