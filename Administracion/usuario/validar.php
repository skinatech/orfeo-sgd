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
$unificacionRadicados = $_SESSION["unificacionRadicados"];
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
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];
$menuOrfeoExpress = $_SESSION["menuOrfeoExpress"];
$menuOrfeoExpress == false ? $display = '' : $display = 'disabled';
$mod_firma_qr = $_SESSION["mod_firma_qr"];
$mod_firma_qr == true ? $fqr_display = '' : $fqr_display = 'disabled';
$mod_firma_mecanica = $_SESSION["mod_firma_mecanica"];
$mod_firma_mecanica == true ? $fmecanica_display = '' : $fmecanica_display = 'disabled';
$transferencias = $_SESSION["transferencias"];
$transferencias == true ? $transferencia_display = '' : $transferencia_display = 'disabled';

define('ADODB_ASSOC_CASE', $assoc);

if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";
$errorValida = "";
include "$dir_raiz/config.php";
include_once "$dir_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$dir_raiz");
//$db->conn->debug = true;

$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$rs_dep = $db->conn->Execute("SELECT DEPE_NOMB, DEPE_CODI FROM DEPENDENCIA ORDER BY DEPE_NOMB");
// CREAMOS LA VARIABLE $ARRDEPSEL QUE CONTINE LAS DEPENDECIAS QUE PUEDEN VER A LA DEPENDENCIA DEL USUARIO ACTUAL.
$rs_depvis = $db->conn->Execute("SELECT DEPENDENCIA_OBSERVA FROM DEPENDENCIA_VISIBILIDAD WHERE DEPENDENCIA_VISIBLE='$dep_sel'");
$arrDepSel = array();
$i = 0;
while ($tmp = $rs_depvis->FetchRow()) {
    $arrDepSel[$i] = $tmp['DEPENDENCIA_OBSERVA'];
    $i += 1;
}
($usModo == 1) ? $tPermis = "Asignar Permisos" : $tPermis = "Editar Permisos";
?>
<html>
    <head>
        <SCRIPT language="Javascript">
            function mensaje(vari) {
                alert("evento lanzado: " + vari);
            }
        </SCRIPT>
        <title>Untitled Document</title>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <style>
            .tooltips {
                text-decoration: underline; 
                cursor:pointer; 
                margin-left: 63%;
            }
        </style>
    </head>
    <body>
        <?php
        /** Valida que la dependencia no tenga ya JEFE * */
        $isql = "SELECT USUA_NOMB, USUA_LOGIN FROM USUARIO WHERE DEPE_CODI='$dep_sel' AND USUA_CODI = 1";
        $rs = $db->query($isql);
        $nombreJefe = $assoc == 0 ? $rs->fields["usua_nomb"] : $rs->fields["USUA_NOMB"];

        if ($nombreJefe && $perfil == "Jefe") {
            $loginusua = $assoc == 0 ? $rs->fields["usua_login"] : $rs->fields["USUA_LOGIN"];
            if ($usuLogin != $loginusua) {
                $errorValida = "SI";
                ?> 
                <center><p><span class=etexto><B><?= "En la dependencia " . $dep_sel . ", ya existe un usuario jefe, " . $nombreJefe . ", por favor verifique o realice los cambios necesarios para poder continuar con este proceso" ?></B></span></p></center>
                <?php
            }
        }

        /** Valida que el correo NO EXISTA ya en la base de usuario * */
        if (($usuDocSel != $cedula && $usModo == 2) || $usModo == 1) {
            $isql = "SELECT usua_email FROM USUARIO WHERE usua_email = " . "'" . $email . "'";
            $rsCedula = $db->query($isql);
            $cedulaEncon = $assoc == 0 ? $rsCedula->fields["usua_email"] : $rsCedula->fields["USUA_EMAIL"];
            if ($cedulaEncon) {
                $errorValida = "SI";
                ?> 
                <center><p><span class=etexto><B>El correo ya existe en la tabla de usuario, por favor verifique</B></span></p></center>
                <?php
            }
        }

        /** Valida que la cedula NO EXISTA ya en la base de usuario * */
        if (($usuDocSel != $cedula && $usModo == 2) || $usModo == 1) {
            $isql = "SELECT USUA_DOC FROM USUARIO WHERE USUA_DOC = " . "'" . $cedula . "'";
            $rsCedula = $db->query($isql);
            $cedulaEncon = $assoc == 0 ? $rsCedula->fields["usua_doc"] : $rsCedula->fields["USUA_DOC"];
            if ($cedulaEncon) {
                $errorValida = "SI";
                ?> 
                <center><p><span class=etexto><B>El n&uacute;mero de c&eacute;dula ya existe en la tabla de usuario, por favor verifique</B></span></p></center>
                <?php
            }
        }

        /** Valida que el LOGIN NO EXISTA ya en la base de usuario * */
        if (($usuLoginSel != $usuLogin && $usModo == 2) || $usModo == 1) {
            $isql = "SELECT usua_login FROM USUARIO WHERE usua_login = " . "'" . strtoupper($usuLogin) . "'";
            $rsLogin = $db->query($isql);
            $LoginEncon = $assoc == 0 ? $rsLogin->fields["usua_login"] : $rsLogin->fields["USUA_LOGIN"];
            if ($LoginEncon) {
                $errorValida = "SI";
                ?> 
                <center><p><span class=etexto><B>El Login que desea asignar ya existe, por favor verifique.</B></span></p></center>
                <?php
            }
        }

        /** Valida que la cedula NO EXISTA ya en la base de usuario * */
        if ($rol_sel) {
            $isql = "select nomb_perfil as NOMB_PERFIL from perfiles where codi_perfil=$rol_sel";
            $rsRol = $db->query($isql);
            $ROlEncon = $rsRol->fields["NOMB_PERFIL"];

            $isqlRolTiposdos = "select cod_rol as COD_ROL from rol_tipos_doc where cod_rol=$rol_sel";
            $rsRolTipos = $db->query($isqlRolTiposdos);
            
            $ROlEnconTipos = $rsRolTipos->fields["COD_ROL"];
            if ($ROlEncon == '') {
                $errorValida = "SI";
                ?> 
                <center><p><span class=etexto><B>El rol que intenta asignar no cuenta con ning&uacute;n permiso de acceso, por favor verifique</B></span></p></center>
                <?php
            } elseif ($ROlEnconTipos == '') {
                $errorValida = "SI";
                echo '<center><p><span class=etexto><B>El rol que intenta asignar no cuenta con ning&uacute;n permiso de tipos documentales, por favor verifique</B></span></p></center>';
            }
        }
        
        /** Valida que el usuario no tenga radicados en sus bandejas **/
        $sqlSelect = "select usua_codi, depe_codi from usuario where usua_login='$usuLogin'";
        $rsInfonUsu = $db->query($sqlSelect);
        
        if ($rsInfonUsu->fields["USUA_CODI"] && $rsInfonUsu->fields["DEPE_CODI"]) {
            $usuaCodigo = $rsInfonUsu->fields["USUA_CODI"];
            $depeCodigo = $rsInfonUsu->fields["DEPE_CODI"];
            
            if($dep_sel != $depeCodigo){
                $isqlRad = "select count (radi_nume_radi) as CONTEORAD from radicado where radi_usua_actu=$usuaCodigo and radi_depe_actu='$depeCodigo'";
                $rsIsqlRad = $db->query($isqlRad);

                $conteoRadicados = $rsIsqlRad->fields["CONTEORAD"];

                if ($conteoRadicados > 0) {
                    $errorValida = "SI";
                    ?> 
                    <center><p><span class=etexto><B>El usuario <?=$usuLogin?> tiene <?=$conteoRadicados?> radicados en sus bandejas no se puede cambiar de dependencia</B></span></p></center>
                    <?php
                }
            }
        }

    $encabezado = "krd=$krd&usModo=$usModo&perfil=$perfil&dep_sel=$dep_sel&cedula=$cedula&usuLogin=$usuLogin&nombre=$nombre&dia=$dia&mes=$mes&ano=$ano&ubicacion=$ubicacion&piso=$piso&extension=$extension&email=$email&usuDocSel=$usuDocSel&usuLoginSel=$usuLoginSel";
    if ($errorValida == "SI") {
                    ?>
        <span class=etexto><center>
            <a href='crear.php?<?= session_name() . "=" . session_id() . "&$encabezado" ?>'>Volver a Formulario Anterior</a>
        </center></span>
    <?php
    } else {
        if ($reg_crear == 'Personalizar Permisos') {
            $encabezado = "krd=$krd&usModo=$usModo&perfil=$perfil&perfilOrig=$perfilOrig&dep_sel=$dep_sel&cedula=$cedula&usuLogin=$usuLogin&nombre=$nombre&dia=$dia&mes=$mes&ano=$ano&ubicacion=$ubicacion&piso=$piso&extension=$extension&email=$email&usuDocSel=$usuDocSel&usuLoginSel=$usuLoginSel&rol_sel=$rol_sel&boton=$reg_crear";
            ?>
            <center>
                <form name="frmPermisos" action='grabar.php?<?= session_name() . "=" . session_id() . "&$encabezado" ?>' method="post">
                    <table width="90%"  border="1" align="center">
                        <tr bordercolor="#FFFFFF">
                        <div id="titulo" style="width: 90%; " align="center" >Administraci&oacute;n permisos 
                        </div>
                        </tr>
                    </table>
                    <?php
                    if ($usModo == 2 && ($rol_sel != '' or $reg_crear == 'Personalizar Permisos')) {
                        include "traePermisos.php";
                    } else {
                        $usua_activo = 1;
                        $usua_nuevoM = 0;
                    }
                    ?>
                    <br>
                    <table width="90%" border="1" cellpadding="0" cellspacing="5" >
                        <tr>
                            <td width="30%" height="26" class="titulos2">
                                <b>Permisos de usuarios</b>
                            </td>
                            <td width="30%" height="26" class="titulos2">
                                <b>Permisos de accesos</b>
                            </td>
                            <td width="30%" height="26" class="titulos2">
                                <b>Permisos de m&oacute;dulos</b>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" height="26" class="listado2"> 
                                <input type="checkbox" name="usua_activo" value="$usua_activo" <?php
                                if ($usua_activo == 1)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Activar usuario. 
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                  title="Establece si un usuario est&aacute; activo o no en el sistema, de tal forma que pueda hacer uso de todos los beneficios de la herramienta. Cuando un usuario se desactiva, no se permite el ingreso al sistema" style="margin-left: 65%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2"> 
                                <input type="checkbox" name="digitaliza" value="$digitaliza" <?php
                                if ($digitaliza)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Digitalizaci&oacute;n de Documentos
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite relacionar cada radicado del sistema con la imagen digitalizada del documento f&iacute;sico y sus anexos, los cuales se obtienen a trav&eacute;s de un escaner en el sistema SkinaScan." style="margin-left: 43%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2"> <!--input type="checkbox" name="adm_archivo" value="$adm_archivo" <?php
                                if ($adm_archivo)
                                    echo "checked";
                                else
                                    echo "";
                                ?>-->
                                Administrador de Archivo. 
                                <?php
                                $contador = 0;
                                while ($contador <= 2) {
                                    echo "<input name='adm_archivo' type='radio' $display value=$contador ";
                                    if ($adm_archivo == $contador)
                                        echo "checked";
                                    else
                                        echo "";
                                    echo " >" . $contador;
                                    $contador = $contador + 1;
                                }
                                ?>
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite ingresar al sistema la ubicaci&oacute;n f&iacute;sica de los documentos que se encuentran custodiados en el archivo de la entidad o empresa, de acuerdo a las instrucciones dadas por cada &aacute;rea en el proceso de expedientes y asignaci&oacute;n de TRD (Tablas de Retenci&oacute;n Documental). El permiso es asignado a personas en el &aacute;rea de archivo.
                              0 - No tiene permiso asignado.
                              1 - Puede ingresar al m&oacute;dulo pero NO puede administrar edificios.
                              2 - Puede ingresar al m&oacute;dulo y administrar los edificios." style="margin-left: 36%;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" height="26" class="listado2"> 
                                <input type="checkbox" name="usua_nuevoM" value="$usua_nuevoM" <?php
                                if ($usua_nuevoM == '0')
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Solicitar cambio contrase&ntilde;a.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                    title="Indica que el usuario es nuevo y se le solicitar&aacute; cambio de clave en el momento de ingresar por primera vez al sistema." style="margin-left: 45%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2">
                                <input name="modificaciones" type="checkbox" value="$modificaciones" <?php
                                if ($modificaciones)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Modificaci&oacute;n de radicado.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                    title="Permite realizar modificaciones a la informaci&oacute;n general de los radicados, sin importar en qu&eacute; usuario y &aacute;rea se encuentre. Se asigna este permiso al administrador de gesti&oacute;n documental" style="margin-left: 49%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2"> Tablas de Retenci&oacute;n Documental
                                <?php
                                $contador = 0;
                                while ($contador <= 2) {
                                    echo "<input name='tablas' type='radio' value=$contador ";
                                    if ($tablas == $contador)
                                        echo "checked";
                                    else
                                        echo "";
                                    echo " >" . $contador;
                                    $contador = $contador + 1;
                                }
                                ?>
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite la administraci&oacute;n de las Tablas de Retenci&oacute;n Documental, donde se incluye la parametrizaci&oacute;n y actualizaci&oacute;n de las series, subseries y tipos documentales asign&aacute;ndoles el tiempo de permanencia en cada etapa del ciclo vital de los documentos, as&iacute; como la asignaci&oacute;n de las TRD para cada &aacute;rea de la entidad.
                                      0 - No tiene permiso asignado.
                                      1 - El usuario s&oacute;lo puede listar la TRD de su dependencia.
                                      2 - El usuario puede administrar y listar las TRD de todas las dependencias." style="margin-left: 25%;"></span>
                            </td>    
                        </tr>
                        <tr>
                            <td height='26' width='30%' class='listado2'>
                                <input type="checkbox" name="usua_publico" value="$usua_publico" <?php
                                if ($usua_publico)
                                    echo "checked";
                                else
                                    echo "";
                                ?> >
                                Usuario P&uacute;blico.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                    title="Permite que un usuario de una dependencia X, pueda ser visto por otros usuarios de una dependencia Y, y le puedan reasignar radicados. Con esta opci&oacute;n, el usuario p&uacute;blico recibe documentos sin pasar por la carpeta del jefe." style="margin-left: 64%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2"> 
                                <input type="checkbox" name="dev_correo" value="$dev_correo"  <?php 
                                if ($dev_correo)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Devoluci&oacute;n de correspondencia.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                    title="Permite ver los radicados que han sido devueltos a cada &aacute;rea por la agencia de correo y que deben ser revisados en sus datos de env&iacute;o, para determinar si se realiza nuevamente el env&iacute;o o no." style="margin-left: 39%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2"> <input type="checkbox" name="anulaciones" value="$anulaciones"  <?php
                                if ($anulaciones)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Anulaci&oacute;n de radicado. 
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite generar el acta de anulaci&oacute;n de los radicados solicitados por cada &aacute;rea, con la justificaci&oacute;n realizada por cada usuario y el sustento legal para el proceso de anulaci&oacute;n." style="margin-left: 54%;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" height="26" class="listado2">
                                <input type="checkbox" name="masiva" value="$masiva"  <?php
                                if ($masiva)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Radicaci&oacute;n Masiva
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite generar varias comunicaciones de salida, lo cual requiere de una plantilla previamente creada" style="margin-left: 61%;"></span>
                            </td>                    
                            <td width="30%" height="26" class="listado2"> Impresi&oacute;n
                                <?php
                                $contador = 0;
                                while ($contador <= 2) {
                                    echo "<input name='impresion' type='radio' $display value=$contador ";
                                    if ($impresion == $contador)
                                        echo "checked";
                                    else
                                        echo "";
                                    echo " >" . $contador;
                                    $contador = $contador + 1;
                                }
                                ?>
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite indicar al sistema que los documentos producidos en cada &aacute;rea est&aacute;n listos para ser entregados a su respectivo destinatario.  
                                      0 - No tiene permiso, 
                                      1 - Puede marcar documentos de su dependencia 
                                      2 - Puede marcar documentos de todas las dependencias" style="margin-left: 61%;"></span>
                            </td>
                            <td height='26' width='30%' class='listado2'>
                                <input type="checkbox" name="permArchivar" value="$permArchivar" <?php
                                if ($permArchivar)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Puede Archivar Documentos.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                    title="Este permiso indica cuales usuarios pueden archivar documentos de forma virtual, con la transacci&oacute;n archivar del sistema; significa que el tr&aacute;mite de un documento ha terminado." style="margin-left: 44%;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" height="26" class="listado2"> 
                                <input type="checkbox" name="reasigna" value="$reasigna" <?php
                                if ($reasigna)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Puede reasignar radicado.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite que un usuario pueda reasignar radicados a usuarios de otras dependencias sin pasar por su jefe inmediato. Este permiso se asigna en casos especiales donde exista la autorizaci&oacute;n por parte de su jefe" style="margin-left: 48%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2"> Estad&iacute;sticas.
                                <?php
                                $contador = 0;
                                while ($contador <= 2) {
                                    echo "<input name='estadisticas' type='radio' value=$contador ";
                                    if ($estadisticas == $contador)
                                        echo "checked";
                                    else
                                        echo "";
                                    echo " >" . $contador;
                                    $contador = $contador + 1;
                                }
                                ?>
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite generar varios reportes de gesti&oacute;n para los documentos radicados, actuales o digitalizados en un &aacute;rea determinada
                                      0 - El usuario puede consultar los reportes que &eacute;l mismo haya realizado.
                                      1 - El usuario puede consultar los reportes de todas las personas que pertenecen a la misma &aacute;rea.
                                      2 - Puede generar reportes de todos los usuarios del sistema ORFEO." style="margin-left: 56%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2"> 
                                <input type="checkbox" name="s_anulaciones" value="$s_anulaciones" <?php
                                if ($s_anulaciones)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Solicitar anulaci&oacute;n de radicado.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite solicitar la anulaci&oacute;n de un radicado cuando existan errores en la radicaci&oacute;n con la respectiva justificaci&oacute;n." style="margin-left: 40%;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" height="26" class="listado2">Acceso a consultas.
                                <?php
                                $contador = 1;
                                while ($contador <= 5) {
                                    echo "<input name='nivel' type='radio' value=$contador ";
                                    if ($nivel == $contador)
                                        echo "checked";
                                    else
                                        echo "";
                                    echo " >" . $contador;
                                    $contador = $contador + 1;
                                }
                                ?>
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Este permiso aplica para el m&oacute;dulo de consultas, el cual permite la visualizaci&oacute;n de los documentos escaneados y de toda la informaci&oacute;n consignada en el sistema para los radicados registrados.
                                      Nivel 4 y 5 - Se asigna a los usuarios que por cumplir funciones de control general en la entidad, deban tener acceso al m&oacute;dulo de consultas.
                                      Nivel 3 - Jefes de &aacute;rea de segundo nivel jer&aacute;rquico como: Directores, Gerentes, Subgerentes o Subdirectores. Pueden proyectar, radicar y enviar documentos a otras y a su misma dependencia.
                                      Nivel 2 - Usuarios normales que pueden proyectar, radicar y enviar documentos a su misma dependencia.
                                      Nivel 1 - Usuarios que pueden proyectar, radicar y enviar documentos a su misma dependencia." style="margin-left: 32%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2">
                                Agregar destinatarios/remitentes:
                                <?php
                                $contador = 0;
                                while ($contador <= 1) {
                                    echo "<input name='usua_perm_agrcontacto' type='radio' value=$contador ";
                                    if ($usua_perm_agrcontacto == $contador)
                                        echo "checked";
                                    else
                                        echo "";
                                    echo " >" . $contador;
                                    $contador = $contador + 1;
                                }
                                ?>
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite que un usuario pueda agregar nuevos terceros, clientes o proveedores en el sistema de gesti&oacute;n documental ORFEO, esta opci&oacute;n habilita un bot&oacute;n en el formulario de radicaci&oacute;n de entrada &uacute;nicamente a los usuarios que tengan este permiso.
                                      0 - No tiene permiso asignado.
                                      1 - Tiene el permiso para agregar terceros, clientes o proveedores nuevos." style="margin-left: 28%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2">
                                <input type="checkbox" name="prestamo" value="$prestamo" <?=$display?> <?php
                                if ($prestamo)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Prestamo de Documentos.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite el registro y control del pr&eacute;stamo de los documentos f&iacute;sicos, a cualquier usuario de la entidad o empresa para una consulta temporal." style="margin-left: 48%;"></span>
                            </td>
                        </tr>
                        <tr>
                            <?php
                            //Se valida si el usuario tiene ell permiso de opciones avanzadas para utilizar esta accion
                            if ($usua_perm_avaz == 1) {
                                ?>
                                <td height='26' width='30%' class='listado2'>
                                    <input type="checkbox" name="autenticaLDAP" value="$autenticaLDAP" <?=$display?> <?php
                                    if ($autenticaLDAP)
                                        echo "checked";
                                    else
                                        echo "";
                                    ?>>
                                    Ingresar por directorio activo. 
                                    <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                          title="Indica que el ingreso al sistema se realizar&aacute; con la clave del servidor de autenticaci&oacute;n de la red y/o dominio." style="margin-left: 43%;"></span>
                                </td>
                                <?php
                            }
                            ?>
                            <td height='26' width='30%' class='listado2'>
                                <input type="checkbox" name="preRadica" value="$preRadica" <?php
                                if ($preRadica)
                                    echo "checked";
                                else
                                    echo "";
                                ?> >
                                Pre-radicaci&oacute;n.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite asignar un n&uacute;mero de radicado sin, necesidad de ingresar un remitente, este permiso aplica inicialmente para la sede de la 85." style="margin-left: 66%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2">
                                Expedientes virtuales.
                                <?php
                                $contador = 0;
                                while ($contador <= 2) {
                                    echo "<input name='usua_permexp' type='radio' value=$contador ";
                                    if ($usua_permexp == $contador)
                                        echo "checked";
                                    else
                                        echo "";
                                    echo " >" . $contador;
                                    $contador = $contador + 1;
                                }
                                ?>
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite que un usuario pueda crear expedientes virtuales en ORFEO.
                                      0 - No puede crear expedientes.
                                      1 - Permiso para crear expedientes virtuales.
                                      2 - Puede crear expedientes virtuales y cambiar el responsable de un expediente." style="margin-left: 41%;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td height='26' width='30%' class='listado2'>
                                <input type="checkbox" name="permTipificaAnexos" value="$permTipificaAnexos"  <?php
                                if ($permTipificaAnexos)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Puede modificar Anexos
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                  title="Permite la tipificaci&oacute;n de los anexos digitalizados en la pesta&ntilde;a documentos del sistema. Por defecto, el sistema le asigna este permiso a los usuarios con permiso de digitalizaci&oacute;n." style="margin-left: 52%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2">
                                <input type="checkbox" name="usuaPermRadEmail" value="$usuaPermRadEmail"  <?php
                                if ($usuaPermRadEmail)
                                    echo "checked";
                                else
                                    echo "";
                                ?> >
                                Radicaci&oacute;n e-mail.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite que un usuario pueda radicar correos electr&oacute;nicos, es decir cuando se recibe una comunicaci&oacute;n mediante correo electr&oacute;nico y deba ser tramitado en el sistema.
                                      0 - No tiene permiso asignado.
                                      1 - Tiene el permiso para radicar comunicaciones por correo electr&oacute;nico." style="margin-left: 61%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2"> <input type="checkbox" name="env_correo" value="$env_correo"  <?php
                                if ($env_correo)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Envi&oacute; de correspondencia.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite realizar el registro de env&iacute;o de los radicados, tanto para los documentos que se entregan a las diferentes agencias de correo para su reparto como para aquellos que se deben enviar internamente." style="margin-left: 48%;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td height='26' width='30%' class='listado2'>
                                <input type="checkbox" name="permBorraAnexos" value="$permBorraAnexos"  <?php
                                if ($permBorraAnexos)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Puede borrar Anexos.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite que un usuario pueda borrar los documentos que han sido digitalizados y enviados como anexos a un radicado principal." style="margin-left: 55%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2"> <input type="checkbox" name="adm_sistema" value="$adm_sistema" <?php
                                if ($adm_sistema)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Administrador del Sistema.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                  title="Permite realizar la parametrizaci&oacute;n y administraci&oacute;n de: usuarios, dependencias, Municipios, Departamentos, Paises, Medios de env&iacute;os, Contactos, Entidades o empresas, etc. y las dem&aacute;s tablas que permitan el correcto funcionamiento del aplicativo." style="margin-left: 47%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2"> <input type="checkbox" name="permDescargaDocumentos" value="$permDescargaDocumentos" <?php
                                if ($permDescargaDocumentos)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Descargar documentos.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite realizar la descarga de los archivo .pdf que se cargan en el sistema" style="margin-left: 52%;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td height='26' width='30%' class='listado2'>
                                <input type="checkbox" name="firma_qr" value="$firma_qr" <?= ' '.$fqr_display ?> <?php
                                if ($firma_qr )
                                    echo "checked";
                                else
                                    echo "";
                                ?> >
                                Firma QR.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite que un usuario firme un documento por medio de un QR." style="margin-left: 75%;"></span>
                            </td>
                            <td height="26" width="30%" class="listado2">
                                <input type="checkbox" name="descarga_arc_original" value="$descarga_arc_original" <?= $display. ' '.$fqr_display ?> <?php
                                if ($descarga_arc_original)
                                    echo "checked";
                                else
                                    echo "";
                                ?> >
                                Descarga de archivos originales.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite que un usuario descargue un archivo despues de ser radicado." style="margin-left: 40%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2">
                                <input type="checkbox" name="per_transferencias_documentales" value="$per_transferencias_documentales" <?=$display.' '.$transferencia_display?> <?php
                                if ($per_transferencias_documentales)
                                    echo "checked";
                                else
                                    echo "";
                                ?> >
                                Transferencias documentales.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite que un usuario realice transferencias documentales." style="margin-left: 42%;"></span>
                            </td>
                        </tr>
                        <?php if(isset($mod_firma_mecanica) && $mod_firma_mecanica == 1): ?>
                        <tr>
                                <td height='26' width='30%' class='listado2'>
                                <input type="checkbox" name="firma_mecanica" value="$firma_mecanica" <?= ' '.$fmecanica_display ?> <?php
                                if ($firma_mecanica )
                                    echo "checked";
                                else
                                    echo "";
                                ?> >
                                Firma Mecánica.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite que un usuario firme un documento por medio de una imagen de su firma." style="margin-left: 75%;"></span>
                                </td>
                            </tr>   
                        <tr>
                        <?php endif ?>
                        <tr>
                            <!-- 
                                Autor: Jenny Gamez 
                                Fecga: 05-08-2020
                                Infor: Se agrega permiso para consultar radicados confidenciales
                            -->
                            <td width="30%" height="26" class="listado2"> <input type="checkbox" name="permRadicadosNivel" value="$permRadicadosNivel" <?php
                                if ($permRadicadosNivel)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Consultar Radicados Confidenciales
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite consultar los radicados que estan marcados como Confidenciales" style="margin-left: 42%;"></span>
                            </td>
                            <!-- 
                                Autor: Luis Miguel Romero 
                                Fecga: 18-12-2019
                                Infor: Se agrega permiso para publicar documentos
                            -->
                            <td width="30%" height="26" class="listado2">
                                <input type="checkbox" name="usua_perm_doc_publico" value="$usua_perm_doc_publico"  <?php
                                if ($usua_perm_doc_publico)
                                    echo "checked";
                                else
                                    echo "";
                                ?> >
                                Publicar documentos.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite publicar documentos de radicados especificos." style="margin-left: 55%;"></span>
                            </td>
                            <td width="30%" height="26" class="listado2"> <input type="checkbox" name="permReasignaMasiva" value="$permReasignaMasiva" <?php
                                if ($permReasignaMasiva)
                                    echo "checked";
                                else
                                    echo "";
                                ?>>
                                Reasignaci&oacute;n Masiva.
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite realizar una reasignaci&oacute;n masiva de radicados entre dependencias" style="margin-left: 47%;"></span>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td height='26' width='30%' class='listado2'>
                                <input type="checkbox" name="usua_perm_expedientes" value="$usua_perm_expedientes" <?php
                                // if ($usua_perm_expedientes)
                                //     echo "checked";
                                // else
                                //     echo "";
                                ?> >
                                Gestión de Expedientes
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite habilitar el módulo de gestión de expedientes" style="margin-left: 66%;"></span>
                            </td>
                        </tr> -->

                        <!-- 
                            Autor: Daniel tautiva 
                            Fecga: 14-12-2020
                            Infor: Se agrega permiso para inventario documental :: flagInventarioDocumental -> config.php
                        -->
                        <?php  if($flagInventarioDocumental){  ?>
                            <tr>
                                <td height='26' width='30%' class='listado2'>
                                    <?php
                                    if ($consulta_inv_documental == 'on') {
                                        $check = "checked";
                                    } else {
                                        $check = "";
                                    }
                                    ?>
                                    <input type="checkbox" name="consulta_inv_documental" <?php echo $check ?>> Consultar en Inventario Documental.
                                    <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                        title="Permite consultar los registros del inventario documental" style="margin-left: 27%;"></span>
                                </td>
                            </tr>

                            <tr>     
                                <td height='26' width='30%' class='listado2'>
                                    <?php
                                    if ($carga_inv_documental == 'on') {
                                        $check = "checked";
                                    } else {
                                        $check = "";
                                    }
                                    ?>
                                    <input type="checkbox" name="carga_inv_documental" <?php echo $check ?>> Carga de Documentos en Inventario Documental.
                                    <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                        title="Permite cargar documentos y crear un nuevo registro para el inventario documental" style="margin-left: 13%;"></span>
                                </td>
                            </tr>   
                        <?php  }  ?>  

                        <tr>
                            <td class="titulos2" colspan="6" >
                                <b>Tipos de radicados</b>
                                <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                      title="Permite ingresar al sistema la documentaci&oacute;n de correspondencia que se realice en la entidad. 0 - No tienen permiso y 3 - Tienen permiso" style="margin-left: 86%;"></span>
                            </td>
                        </tr>
                    </table>
                    <table width="90%"  border="1" align="center">
                        <?php
                        $sql = "SELECT SGD_TRAD_CODIGO,SGD_TRAD_DESCR FROM SGD_TRAD_TIPORAD where mostrar_como_tipo=1 ORDER BY SGD_TRAD_CODIGO";
                        $ADODB_COUNTRECS = true;
                        $rs_trad = $db->query($sql);
                        if ($rs_trad->RecordCount() >= 0) {
                            $i = 1;
                            $cad = "perm_tp";
                            while ($arr = $rs_trad->FetchRow()) {
                                (is_int($i / 2)) ? print "" : print "<TR align='left'>";
                                echo "<td height='26' width='50%' class='listado2'>";
                                $x = 0;
                                echo "&nbsp;" . "(" . $arr['SGD_TRAD_CODIGO'] . ")&nbsp;" . $arr['SGD_TRAD_DESCR'] . "&nbsp;&nbsp;";
                            
                                while ($x < 4) {
                                    ($x == ${$cad . $arr['SGD_TRAD_CODIGO']}) ? $chk = "checked" : $chk = "";
                                    echo "<input type='radio' name='" . $cad . $arr['SGD_TRAD_CODIGO'] . "' id='" . $cad . $arr['SGD_TRAD_CODIGO'] . "' value='$x' $chk>" . $x;                                   
                                    $x ++;
                                }
                                echo "</td>";
                                (is_int($i / 2)) ? print "</TR>" : print "";
                                $i += 1;
                            }
                        } else
                            echo "<tr><td align='center'> NO SE HAN GESTIONADO TIPOS DE RADICADOS</td></tr>";
                        $ADODB_COUNTRECS = false;
                        ?>
                    </table>
                    <br>
                    <table border=0 width=90% class=t_bordeGris>
                        <tr class="cajaBotonesMedio">
                            <td height="30" colspan="2" class="listado1">
                                <input name="login" type="hidden" value='<?= $usuLogin ?>'>
                                <input name="PHPSESSID" type="hidden" value='<?= session_id() ?>'>
                                <input name="krd" type="hidden" value='<?= $krd ?>'>
                                <input name="nusua_codi" type="hidden" value='<?= $nusua_codi ?>'>
                                <input name="cedula" type="hidden" value='<?= $cedula ?>'>
                                <center><input class="botones" type="submit" name="Submit3" value="Grabar"></center>
                            </td>
                            <td height="30" colspan="2" class="listado1">
                                <center>
                                    <a href='../formAdministracion.php?<?= session_name() . "=" . session_id() . "&$encabezado" ?>'>
                                        <input class="botones" type="button" name="Submit4" value="Cancelar"></a>
                                </center>
                            </td>
                        </tr>
                    </table>
                    <?php
                    $encabezado = "&krd=$krd&dep_sel=$dep_sel&usModo=$usModo&perfil=$perfil&cedula=$cedula&dia=$dia&mes=$mes&ano=$ano&ubicacion=$ubicacion&piso=$piso&extension=$extension&email=$email";
                    ?>
                </form>
            </center>
            <?php
        }
        else {
            include 'grabar.php';
        }
    }
    ?>
</body>
</html>