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
$menuOrfeoExpress = $_SESSION["menuOrfeoExpress"];
$menuOrfeoExpress == false ? $display = '' : $display = 'disabled';
$mod_firma_qr = $_SESSION["mod_firma_qr"];
$mod_firma_qr == true ? $fqr_display = '' : $fqr_display = 'disabled';
$mod_firma_mecanica = $_SESSION["mod_firma_mecanica"];
$mod_firma_mecanica == true ? $fmecanica_display = '' : $fmecanica_display = 'disabled';
$transferencias = $_SESSION['transferencias'];
$transferencias == true ? $transferencia_display = '' : $transferencia_display = 'disabled';

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

define('ADODB_ASSOC_CASE', $assoc);

if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";
$errorValida = "";
include "$dir_raiz/config.php";
include_once "$dir_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$dir_raiz");
// $db->conn->debug = TRUE;

$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
?>
<html>
    <head>
        <SCRIPT language="Javascript">
            function envio_datos() {
                if (document.getElementById("codrol").value == 0) {
                    alert("Debe seleccionar un rol para asignar permisos");
                    document.getElementById("codrol").focus();
                    return false;
                }
                return true;
            }
            /***
            Autor: Jenny Gamez
            Fecha: 2019-09-21
            Info: Se modifica la notificación que se genera cuando la transacción es correcta ya que ahora
                  se muestra mediate una alerta
            ***/
            function recargar() {
                document.getElementById("codrol").value = 0;
                alert("Se actualizo correctamente el rol");
                submit();
            }
            /***
            Autor: Jenny Gamez
            Fecha: 2019-09-21
            Info: Fin
            ***/
        </SCRIPT>
        <title>Prmisos de acceso</title>
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
        <form name="frmPermisos" action='' method="POST">
<!--            <tr>
                <td>-->
            <table width="100%" border="0" cellpadding="0" cellspacing="5" >
                <tr> 
                    <td class="titulos2" colspan="6" ><b>Administraci&oacute;n de permisos</bl></td>
                </tr>
            </table>
            <table border=1 width=100% class=borde_tab>
                <tr class="timparr update" >          
                    <td width="13%" class="listado2" colspan="3">
                        <label for="email">Seleccione un Rol</label>                
                        <?php
                        $queryRoles = "select nomb_rol as NOMB_ROL, cod_rol as COD_ROL from roles order by nomb_rol ";
                        $rsD = $db->query($queryRoles);
                        print $rsD->GetMenu2("codrol", $codrol, "0:-- Seleccione --", false, "", "onChange='submit()' class='select form-control' id='codrol' style='width:98%' title='Listado de las series existentes en el sistema'");
                        ?>
                    </td>
                </tr>
            </table>
            <table border=1 width=100% class=borde_tab>
                <br><br><br>
                <?php
                if ($_POST['guardar'] == '') {
                    include 'traePermisos.php';
                }
                ?>
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
                        <?php
                        if ($usua_activo == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="usua_activo" checked> Activar usuario.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Establece si un usuario est&aacute; activo o no en el sistema, de tal forma que pueda hacer uso de todos los beneficios de la herramienta. Cuando un usuario se desactiva, no se permite el ingreso al sistema"></span>
                    </td>
                    <td width="30%" height="26" class="listado2">
                        <?php
                        if ($digitaliza == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="digitaliza" <?php echo $check ?>> Digitalizaci&oacute;n de documentos.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite relacionar cada radicado del sistema con la imagen digitalizada del documento f&iacute;sico y sus anexos, los cuales se obtienen a trav&eacute;s de un escaner en el sistema SkinaScan." style="margin-left: 38%;"></span>
                    </td>
                    <td width="30%" height="26" class="listado2"> 
                        Archivo. 
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
                              2 - Puede ingresar al m&oacute;dulo y administrar los edificios." style="margin-left: 61%;"></span>
                    </td>
                </tr>
                <tr>
                    <td width="30%" height="26" class="listado2"> 
                        <?php
                        if ($usua_nuevoM == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="usua_nuevoM" checked> Solicitar cambio contrase&ntilde;a.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Indica que el usuario es nuevo y se le solicitar&aacute; cambio de clave en el momento de ingresar por primera vez al sistema." style="margin-left: 40%;"></span>
                    </td>
                    <td width="30%" height="26" class="listado2">
                        <?php
                        if ($modificaciones == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input name="modificaciones" type="checkbox" <?php echo $check ?>> Modificaci&oacute;n de radicado.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite realizar modificaciones a la informaci&oacute;n general de los radicados, sin importar en qu&eacute; usuario y &aacute;rea se encuentre. Se asigna este permiso al administrador de gesti&oacute;n documental" style="margin-left: 45%;"></span>
                    </td>
                    <td width="30%" height="26" class="listado2"> Tablas de retenci&oacute;n documental.
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
                              2 - El usuario puede administrar y listar las TRD de todas las dependencias." style="margin-left: 18%;"></span>
                    </td>
                </tr>
                <tr>
                    <td height='26' width='30%' class='listado2'>
                        <?php
                        if ($usua_publico == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="usua_publico" <?php echo $check ?>> Usuario p&uacute;blico.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite que un usuario de una dependencia X, pueda ser visto por otros usuarios de una dependencia Y, y le puedan reasignar radicados. Con esta opci&oacute;n, el usuario p&uacute;blico recibe documentos sin pasar por la carpeta del jefe." style="margin-left: 62%;"></span>
                    </td>
                    <td width="30%" height="26" class="listado2"> 
                        <?php
                        if ($dev_correo == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="dev_correo"  <?php echo $check ?>> Devoluci&oacute;n de correspondencia.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite ver los radicados que han sido devueltos a cada &aacute;rea por la agencia de correo y que deben ser revisados en sus datos de env&iacute;o, para determinar si se realiza nuevamente el env&iacute;o o no." style="margin-left: 34%;"></span>
                    </td>
                    <td width="30%" height="26" class="listado2"> 
                        <?php
                        if ($anulaciones == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="anulaciones"  <?php echo $check ?>> Anulaci&oacute;n de radicado.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite generar el acta de anulaci&oacute;n de los radicados solicitados por cada &aacute;rea, con la justificaci&oacute;n realizada por cada usuario y el sustento legal para el proceso de anulaci&oacute;n." style="margin-left: 50%;"></span>
                    </td>
                </tr>
                <tr>
                    <td width="30%" height="26" class="listado2">
                        <?php
                        if ($masiva == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="masiva"  <?php echo $check ?>> Radicaci&oacute;n masiva.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite generar varias comunicaciones de salida, lo cual requiere de una plantilla previamente creada" style="margin-left: 57%;"></span>
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
                              2 - Puede marcar documentos de todas las dependencias" style="margin-left: 57%;"></span>
                    </td>
                    <td height='26' width='30%' class='listado2'>
                        <?php
                        if ($permArchivar == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="permArchivar" <?php echo $check ?>> Puede archivar radicado.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Este permiso indica cuales usuarios pueden archivar documentos de forma virtual, con la transacci&oacute;n archivar del sistema; significa que el tr&aacute;mite de un documento ha terminado." style="margin-left: 46%;"></span>
                    </td>
                </tr>
                <tr>
                    <td width="30%" height="26" class="listado2"> 
                        <?php
                        if ($reasigna == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="reasigna" <?php echo $check ?>> Puede reasignar radicado.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite que un usuario pueda reasignar radicados a usuarios de otras dependencias sin pasar por su jefe inmediato. Este permiso se asigna en casos especiales donde exista la autorizaci&oacute;n por parte de su jefe" style="margin-left: 44%;"></span>
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
                              2 - Puede generar reportes de todos los usuarios del sistema ORFEO." style="margin-left: 52%;"></span>
                    </td>
                    <td width="30%" height="26" class="listado2">
                        <?php
                        if ($s_anulaciones == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="s_anulaciones"  <?php echo $check ?>> Solicitar anulaci&oacute;n de radicado.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite solicitar la anulaci&oacute;n de un radicado cuando existan errores en la radicaci&oacute;n con la respectiva justificaci&oacute;n." style="margin-left: 35%;"></span>
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
                              Nivel 1 - Usuarios que pueden proyectar, radicar y enviar documentos a su misma dependencia." style="margin-left: 26%;"></span>
                    </td>
                    <td width="30%" height="26" class="listado2">
                        Agregar destinatarios/remitentes :
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
                              1 - Tiene el permiso para agregar terceros, clientes o proveedores nuevos." style="margin-left: 21%;"></span>
                    </td>
                    <td width="30%" height="26" class="listado2">
                        <?php
                        if ($prestamo == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="prestamo" <?=$display?> <?php echo $check ?>> Pr&eacute;stamo de documentos.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite el registro y control del pr&eacute;stamo de los documentos f&iacute;sicos, a cualquier usuario de la entidad o empresa para una consulta temporal." style="margin-left: 44%;"></span>
                    </td>
                </tr>
                <tr>
                    <?php
                    //Se valida si el usuario tiene ell permiso de opciones avanzadas para utilizar esta accion
                    if ($usua_perm_avaz == 1) {
                        ?>
                        <td height='26' width='30%' class='listado2'>
                            <?php
                            if ($autenticaLDAP == 'on') {
                                $check = "checked";
                            } else {
                                $check = "";
                            }
                            ?>
                            <input type="checkbox" name="autenticaLDAP" <?=$display?> <?php echo $check ?>> Ingresar por directorio activo.
                            <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                  title="Indica que el ingreso al sistema se realizar&aacute; con la clave del servidor de autenticaci&oacute;n de la red y/o dominio." style="margin-left: 39%;"></span>
                        </td>
                        <?php
                    }
                    ?>
                    <td height='26' width='30%' class='listado2'>
                        <?php
                        if ($preRadica == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="preRadica" <?php echo $check ?>> Pre-radicaci&oacute;n.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite asignar un n&uacute;mero de radicado sin, necesidad de ingresar un remitente." style="margin-left: 64%;"></span>
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
                              2 - Puede crear expedientes virtuales y cambiar el responsable de un expediente." style="margin-left: 36%;"></span>
                    </td>
                </tr>
                <tr>
                    <td height='26' width='30%' class='listado2'>
                        <?php
                        if ($permTipificaAnexos == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="permTipificaAnexos" <?php echo $check ?>> Puede modificar anexos.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite la tipificaci&oacute;n de los anexos digitalizados en la pesta&ntilde;a documentos del sistema. Por defecto, el sistema le asigna este permiso a los usuarios con permiso de digitalizaci&oacute;n." style="margin-left: 47%;"></span>
                    </td>
                    <td width="30%" height="26" class="listado2">                        
                        <?php
                        if ($usuaPermRadEmail == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="usuaPermRadEmail"  <?php echo $check ?>> Radicaci&oacute;n e-mail.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite que un usuario pueda radicar correos electr&oacute;nicos, es decir cuando se recibe una comunicaci&oacute;n mediante correo electr&oacute;nico y deba ser tramitado en el sistema.
                              0 - No tiene permiso asignado.
                              1 - Tiene el permiso para radicar comunicaciones por correo electr&oacute;nico." style="margin-left: 58%;"></span>
                    </td>
                    <td width="30%" height="26" class="listado2"> 
                        <?php
                        if ($env_correo == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="env_correo"  <?php echo $check ?>> Envi&oacute; de correspondencia.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite realizar el registro de env&iacute;o de los radicados, tanto para los documentos que se entregan a las diferentes agencias de correo para su reparto como para aquellos que se deben enviar internamente." style="margin-left: 44%;"></span>
                    </td>
                </tr>
                <tr>
                    <td height='26' width='30%' class='listado2'>
                        <?php
                        if ($permBorraAnexos == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="permBorraAnexos"  <?php echo $check ?>> Puede borrar anexos.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite que un usuario pueda borrar los documentos que han sido digitalizados y enviados como anexos a un radicado principal." style="margin-left: 52%;"></span>
                    </td>
                    <td height='26' width='30%' class='listado2'>
                        <?php
                        if ($adm_sistema == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="adm_sistema"  <?php echo $check ?>> Administraci&oacute;n al sistema.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite realizar la parametrizaci&oacute;n y administraci&oacute;n de: usuarios, dependencias, Municipios, Departamentos, Pa&iacute;ses, Medios de env&iacute;os, Contactos, Entidades o empresas, etc. y las dem&aacute;s tablas que permitan el correcto funcionamiento del aplicativo." style="margin-left: 45%;"></span>
                    </td>
                    <td height='26' width='30%' class='listado2'>
                        <?php
                        if ($permDescargaDocumentos == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="permDescargaDocumentos" <?php echo $check ?>> Descargar documentos.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite realizar la descarga de los archivo .pdf que se cargan en el sistema" style="margin-left: 48%;"></span>
                    </td>
                </tr>
                <tr>
                    <td height='26' width='30%' class='listado2'>
                        <?php
                            if ($firma_qr == 'on') {
                                $check = "checked";
                            } else {
                                $check = "";
                            }
                        ?>
                        <input type="checkbox"  name="firma_qr" <?= $check.' '.$fqr_display ?> >
                        Firma QR.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite que un usuario firme un documento por medio de un QR." style="margin-left: 73%;"></span>
                    </td>
                    <td width="30%" height="26" class="listado2">
                        <?php
                            if ($descarga_arc_original == 'on') {
                                $check = "checked";
                            } else {
                                $check = "";
                            }
                        ?>
                        <input type="checkbox" name="descarga_arc_original" <?= $check.' '.$fqr_display ?> <?=$display?>>
                        Descarga de archivos originales.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite que un usuario descargue un archivo despues de ser radicado." style="margin-left: 35%;"></span>
                    </td>
                    <td width="30%" height="26" class="listado2">
                        <?php
                            if ($per_transferencias_documentales == 'on') {
                                $check = "checked";
                            } else {
                                $check = "";
                            }
                        ?>
                        <input type="checkbox" name="per_transferencias_documentales" <?= $check.' '.$transferencia_display ?> <?=$display?>>
                        Transferencias documentales.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite que un usuario realice transferencias documentales." style="margin-left: 95%;"></span>
                    </td>
                </tr>
                <tr>
                    <td height='26' width='30%' class='listado2'>
                        <?php
                        if ($firma_mecanica )
                            $check = "checked";
                        else
                            $check = "";
                        ?>
                        <input type="checkbox" name="firma_mecanica"  value="$firma_mecanica" <?= $check.' '.$fmecanica_display ?>>
                        Firma Mecánica
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                                title="Permite que un usuario firme un documento por medio de una imagen de su firma." style="margin-left: 75%;"></span>
                    </td>
                </tr>  
                <tr>
                    <td height='26' width='30%' class='listado2'>
                        <?php
                        if ($permRadicadosNivel == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="permRadicadosNivel" <?php echo $check ?>> Consultar Radicados Confidenciales
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite consultar los radicados que estan marcados como Confidenciales" style="margin-left: 37%;"></span>
                    </td>
                    <!-- 
                        Autor: Luis Miguel Romero 
                        Fecga: 18-12-2019
                        Infor: Se agrega permiso para publicar documentos
                    -->
                    <td width="30%" height="26" class="listado2">
                        <?php
                            if ($usua_perm_doc_publico == 'on') {
                                $check = "checked";
                            } else {
                                $check = "";
                            }
                        ?>
                        <input type="checkbox" name="usua_perm_doc_publico" <?= $check ?> >
                        Publicar documentos.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite publicar documentos de radicados especificos." style="margin-left: 95%;"></span>
                    </td>
                    <td height='26' width='30%' class='listado2'>
                        <?php
                        if ($permReasignaMasiva == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="permReasignaMasiva" <?php echo $check ?>> Reasignaci&oacute;n Masiva.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite realizar una reasignaci&oacute;n masiva de radicados entre dependencias" style="margin-left: 45%;"></span>
                    </td>
                </tr>

                <!-- <tr>
                    <td height='26' width='30%' class='listado2'>
                        <?php
                        // if ($usua_perm_expedientes == 'on') {
                        //     $check = "checked";
                        // } else {
                        //     $check = "";
                        // }
                        ?>
                        <input type="checkbox" name="usua_perm_expedientes" <?php echo $check ?>> Gestión de Expedientes
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite habilitar el módulo de gestión de expedientes" style="margin-left: 37%;"></span>
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
                        if ($permConsultaInv == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="permConsultaInv" <?php echo $check ?>> Consultar en Inventario Documental.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                            title="Permite consultar los registros del inventario documental" style="margin-left: 27%;"></span>
                    </td>
                </tr>

                <tr>     
                    <td height='26' width='30%' class='listado2'>
                        <?php
                        if ($permCargaInv == 'on') {
                            $check = "checked";
                        } else {
                            $check = "";
                        }
                        ?>
                        <input type="checkbox" name="permCargaInv" <?php echo $check ?>> Carga de Documentos en Inventario Documental.
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                            title="Permite cargar documentos y crear un nuevo registro para el inventario documental" style="margin-left: 13%;"></span>
                    </td>
                </tr>

                    <?php  } ?>
                
            </table>
            <table border=1 width=100% class=t_bordeGris>
                <tr>
                    <td class="titulos2" colspan="6" >
                        <b>Tipos de radicados</b>
                        <span class="glyphicon glyphicon-question-sign tooltips" id="tooltips" data-toggle="tooltip" 
                              title="Permite ingresar al sistema la documentaci&oacute;n de correspondencia que se realice en la entidad. 0 - No tienen permiso y 3 - Tienen permiso" style="margin-left: 86%;"></span>
                    </td>
                </tr>
                <?php
                $sql = "SELECT SGD_TRAD_CODIGO,SGD_TRAD_DESCR FROM SGD_TRAD_TIPORAD where mostrar_como_tipo=1 ORDER BY SGD_TRAD_CODIGO";
                $ADODB_COUNTRECS = true;
                $rs_trad = $db->query($sql);
                if ($rs_trad->RecordCount() >= 0) {
                    $i = 1;
                    $cad = "perm_tp";
                    while ($arr = $rs_trad->FetchRow()) {
                        (is_int($i / 2)) ? print "" : print "<TR align='left'>";
                        echo "<td width='30%' height='26' class='listado2'>";
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
            <table border=0 width=100%; class=t_bordeGris>
                <tr class="cajaBotonesMedio">
                    <td height="30" colspan="2" class="listado1">  
                <center>
                    <input class="botones" type="submit" name="guardar" value="Guardar" onClick="return envio_datos();">
                </center>
                </td>
                <td height="30" colspan="2" class="listado1">
                <center>
                    <a href='../formAdministracion.php?<?= session_name() . "=" . session_id() . "&$encabezado" ?>'>
                        <input class="botones" type=button id=Submit4 name="Submit4" value="Regresar">
                    </a>
                </center>
                </td>
                </tr>
            </table>
            <!--                </td>
                        </tr>-->
            <?php
            if (isset($_POST['guardar'])) {
                $select = 'select nomb_perfil as NOMB_PERFIL from perfiles where codi_perfil=' . $_POST['codrol'];
                $rssqlselect = $db->query($select);
                $selectRol = 'select * from roles where cod_rol=' . $_POST['codrol'];
                $rssqlselectRol = $db->query($selectRol);

                if ($digitaliza == 'on' or isset($digitaliza)) {
                    $digitaliza = 1;
                } else {
                    $digitaliza = 0;
                }
                if ($modificaciones == 'on' or isset($modificaciones)) {
                    $modificaciones = 1;
                } else {
                    $modificaciones = 0;
                }
                if ($masiva == 'on' or isset($masiva)) {
                    $masiva = 1;
                } else {
                    $masiva = 0;
                }
                if ($prestamo == 'on' or isset($prestamo)) {
                    $prestamo = 1;
                } else {
                    $prestamo = 0;
                }
                if ($s_anulaciones == 'on' or isset($s_anulaciones)) {
                    $s_anulaciones = 1;
                } else {
                    $s_anulaciones = 0;
                }
                if ($anulaciones == 'on' or isset($anulaciones)) {
                    $anulaciones = 1;
                } else {
                    $anulaciones = 0;
                }
                if ($dev_correo == 'on' or isset($dev_correo)) {
                    $dev_correo = 1;
                } else {
                    $dev_correo = 0;
                }
                if ($adm_sistema == 'on' or isset($adm_sistema)) {
                    $adm_sistema = 1;
                } else {
                    $adm_sistema = 0;
                }
                if ($env_correo == 'on' or isset($env_correo)) {
                    $env_correo = 1;
                } else {
                    $env_correo = 0;
                }
                if ($reasigna == 'on' or isset($reasigna)) {
                    $reasigna = 1;
                } else {
                    $reasigna = 0;
                }
                if ($usua_activo == 'on' or isset($usua_activo)) {
                    $usua_activo = 1;
                } else {
                    $usua_activo = 0;
                }
                if ($usua_nuevoM == 'on' or isset($usua_nuevoM)) {
                    $usua_nuevoM = 1;
                } else {
                    $usua_nuevoM = 0;
                }
                if ($permArchivar == 'on' or isset($permArchivar)) {
                    $permArchivar = 1;
                } else {
                    $permArchivar = 0;
                }
                if ($usua_publico == 'on' or isset($usua_publico)) {
                    $usua_publico = 1;
                } else {
                    $usua_publico = 0;
                }
                if ($preRadica == 'on' or isset($preRadica)) {
                    $preRadica = 1;
                } else {
                    $preRadica = 0;
                }
                if ($autenticaLDAP == 'on' or isset($autenticaLDAP)) {
                    $autenticaLDAP = 1;
                } else {
                    $autenticaLDAP = 0;
                }
                if ($permBorraAnexos == 'on' or isset($permBorraAnexos)) {
                    $permBorraAnexos = 1;
                } else {
                    $permBorraAnexos = 0;
                }
                if ($permTipificaAnexos == 'on' or isset($permTipificaAnexos)) {
                    $permTipificaAnexos = 1;
                } else {
                    $permTipificaAnexos = 0;
                }
                
                if ($permDescargaDocumentos == 'on' or isset($permDescargaDocumentos)) {
                    $permDescargaDocumentos = 1;
                } else {
                    $permDescargaDocumentos = 0;
                }

                if ($firma_qr == 'on' or isset($firma_qr)) {
                    $firma_qr = 1;
                } else {
                    $firma_qr = 0;
                }

                if ($firma_mecanica == 'on' or isset($firma_mecanica)) {
                    $firma_mecanica = 1;
                } else {
                    $firma_mecanica = 0;
                }

                if ($descarga_arc_original == 'on' or isset($descarga_arc_original)) {
                    $descarga_arc_original = 1;
                } else {
                    $descarga_arc_original = 0;
                }

                if ($per_transferencias_documentales == 'on' or isset($per_transferencias_documentales)) {
                    $per_transferencias_documentales = 1;
                } else {
                    $per_transferencias_documentales = 0;
                }

                if ($usuaPermRadEmail == 'on' or isset($usuaPermRadEmail)) {
                    $usuaPermRadEmail = 1;
                } else {
                    $usuaPermRadEmail = 0;
                }

                if (($s_anulaciones) && !($anulaciones)) {
                    $anulacionVariable = 1;
                }
                if (($anulaciones) && !($s_anulaciones)) {
                    $anulacionVariable = 2;
                }
                if (($s_anulaciones) && ($anulaciones)) {
                    $anulacionVariable = 3;
                }
                if (!($s_anulaciones) && !($anulaciones)) {
                    $anulacionVariable = 0;
                }
                
                if(!isset($adm_archivo)){
                    $adm_archivo = 0;
                }
                
                if(!isset($impresion)){
                    $impresion = 0;
                }

                if ($usua_perm_expedientes == 'on' or isset($usua_perm_expedientes)) {
                    $usua_perm_expedientes = 1;
                } else {
                    $usua_perm_expedientes = 0;
                }

                /***
                Autor: Jenny Gamez
                Fecha: 2019-09-21
                Info: Se agrega un nuevo campo de permiso usua_nivel_consulta en la base de datos
                      SI el nivel de usuario es 1 o 2 solo el usuario va poder consultar lo de su usuario
                      Si el vivel de usuario es 3 solo el usuario va poder consultar lo de su dependencia
                      Si el nivel de usuario es 4 o 5 el usuario va a poder consultar todo
                ***/
                switch ($nivel){
                    case 1: 
                        $usua_nivel_consulta = 1;
                        break;
                    case 2:
                        $usua_nivel_consulta = 1;
                        break;
                    case 3: 
                        $usua_nivel_consulta = 2;
                        break;
                    case 4:
                        $usua_nivel_consulta = 3;
                        break;
                    case 5:
                        $usua_nivel_consulta = 5;
                        break;
                    default:
                        $usua_nivel_consulta = 3;
                        break;

                }                
                /***
                Autor: Jenny Gamez
                Fecha: 2019-09-21
                Info: Fin
                ***/     
                
                /***
                Autor: Jenny Gamez
                Fecha: 2019-10-22
                Info: Se agrega un nuevo campo de permiso $permReasignaMasiva, para reasignar masiva los radicados
                ***/
                if($permReasignaMasiva == 'on'){
                   $permReasignaMasiva = 1;
                } else {
                    $permReasignaMasiva = 0;
                }
                /***
                Autor: Jenny Gamez
                Fecha: 2019-10-22
                Info: Fin
                ***/

                if($permRadicadosNivel == 'on'){
                    $permRadicadosNivel = 1;
                }else{
                    $permRadicadosNivel = 0;
                }
                  
                /***
                Autor: Daniel Tautiva
                Fecha: 2019-10-22
                Info: Permisos para inventario Documental
                ***/

                if($permConsultaInv == 'on'){
                    $permConsultaInv = 1;
                }else{
                    $permConsultaInv = 0;
                }

                if($permCargaInv == 'on'){
                    $permCargaInv = 1;
                }else{
                    $permCargaInv = 0;
                }


                
                if ($rssqlselect->fields["NOMB_PERFIL"] == '') {
                    $isql_inicial = "INSERT INTO perfiles (codi_perfil
                       ,nomb_perfil
                       ,usua_esta
                       ,perm_radi
                       ,usua_admin
                       ,usua_nuevo
                       ,codi_nivel
                       ,perm_radi_sal
                       ,usua_admin_archivo
                       ,usua_masiva
                       ,usua_perm_dev
                       ,usua_perm_numera_res
                       ,usua_perm_numeradoc
                       ,sgd_panu_codi
                       ,usua_perm_envios
                       ,usua_perm_modifica
                       ,usua_perm_impresion
                       ,sgd_aper_codigo
                       ,sgd_perm_estadistica
                       ,usua_admin_sistema
                       ,usua_perm_trd
                       ,usua_perm_firma
                       ,usua_perm_prestamo
                       ,usuario_publico
                       ,usuario_reasignar
                       ,usua_perm_notifica
                       ,usua_perm_expediente
                       ,usua_auth_ldap
                       ,perm_archi
                       ,perm_vobo
                       ,perm_borrar_anexo
                       ,perm_tipif_anexo
                       ,usua_perm_adminflujos
                       ,usua_exp_trd
                       ,usua_perm_rademail
                       ,usua_perm_accesi
                       ,usua_perm_agrcontacto
                       ,descargar_documentos
                       ,firma_qr
                       ,descarga_arc_original
                       ,per_transferencia_documental
                       ,usua_nivel_consulta
                       ,usua_perm_reasigna_masiva
                       ,usua_perm_consulta_rad  
                       ,consulta_inv_documental
                       ,carga_inv_documental
                       ,firma_mecanica
                       ,";

                    $isql_final = " usua_perm_preradicado) VALUES
                       ($codrol
                       ,'" . $rssqlselectRol->fields["NOMB_ROL"] . "'
                       ,'$usua_activo'
                       ,'$digitaliza'
                       ,'$adm_sistema'
                       ,'$usua_nuevoM'
                       ,$usua_nivel_consulta
                       ,0
                       ,$adm_archivo
                       ,$masiva
                       ,$dev_correo
                       ,'0'
                       ,0
                       ,$anulacionVariable
                       ,$env_correo
                       ,$modificaciones
                       ,$impresion
                       ,0
                       ,$estadisticas
                       ,$adm_sistema
                       ,$tablas
                       ,0
                       ,$prestamo
                       ,$usua_publico
                       ,$reasigna
                       ,0
                       ,$usua_permexp
                       ,$autenticaLDAP
                       ,'$permArchivar'
                       ,'1'
                       ,$permBorraAnexos
                       ,$permTipificaAnexos
                       ,0
                       ,0
                       ,$usuaPermRadEmail
                       ,0
                       ,$usua_perm_agrcontacto
                       ,$permDescargaDocumentos
                       ,$firma_qr
                       ,$descarga_arc_original
                       ,$per_transferencias_documentales
                       ,$usua_nivel_consulta
                       ,$permReasignaMasiva 
                       ,$permRadicadosNivel   
                       ,$permConsultaInv
                       ,$permCargaInv
                       ,$firma_mecanica
                       ,";

                    $cad = "perm_tp";
                    $sql = "SELECT SGD_TRAD_CODIGO,SGD_TRAD_DESCR,SGD_TRAD_GENRADSAL FROM SGD_TRAD_TIPORAD where mostrar_como_tipo=1 ORDER BY SGD_TRAD_CODIGO";
                    $rs_trad = $db->query($sql);
                    while ($arr = $rs_trad->FetchRow()) {
                        $isql_inicial .= "USUA_PRAD_TP" . $arr['SGD_TRAD_CODIGO'] . ", ";
                        $isql_final .= ${$cad . $arr['SGD_TRAD_CODIGO']} . ", ";
                    }

                    $rssqlInsert = $db->query($isql_inicial . $isql_final . ' ' . $preRadica . ')');
                    if ($rssqlInsert) {

                        $usuarios = "select * from usuario where cod_rol=" . $_POST['codrol'];
                        $rsUsuario = $db->query($usuarios);

                        while (!$rsUsuario->EOF) {
                            $sqlUpdateUsuario = "update usuario set ";
                            $sqlUpdateUsuario .= " perm_radi =  '$digitaliza'
                               ,usua_admin = '$usua_activo'
                               ,usua_nuevo = '$usua_nuevoM'
                               ,codi_nivel = $usua_nivel_consulta
                               ,usua_admin_archivo = $adm_archivo
                               ,usua_masiva = $masiva
                               ,usua_perm_dev = $dev_correo
                               ,sgd_panu_codi = $anulacionVariable
                               ,usua_perm_envios = $env_correo
                               ,usua_perm_modifica = $modificaciones
                               ,usua_perm_impresion = $impresion
                               ,sgd_perm_estadistica = $estadisticas
                               ,usua_admin_sistema = $adm_sistema
                               ,usua_perm_trd = $tablas
                               ,usua_perm_prestamo = $prestamo
                               ,usuario_publico = $usua_publico
                               ,usuario_reasignar = $reasigna
                               ,usua_perm_expediente = $usua_permexp
                               ,usua_auth_ldap = $autenticaLDAP
                               ,perm_archi = '$permArchivar'
                               ,perm_borrar_anexo = $permBorraAnexos
                               ,perm_tipif_anexo = $permTipificaAnexos
                               ,usua_perm_rademail = $usuaPermRadEmail
                               ,usua_perm_agrcontacto  = $usua_perm_agrcontacto
                               ,descargar_documentos = $permDescargaDocumentos
                               ,firma_qr = $firma_qr
                               ,descarga_arc_original = $descarga_arc_original
                               ,per_transferencia_documental=$per_transferencias_documentales
                               ,usua_nivel_consulta = $usua_nivel_consulta 
                               ,usua_perm_reasigna_masiva = $permReasignaMasiva  
                               ,usua_perm_consulta_rad = $permRadicadosNivel
                               ,consulta_inv_documental = $permConsultaInv
                               ,carga_inv_documental = $permCargaInv 
                               ,firma_mecanica = $firma_mecanica
                               ,";

                            $cad = "perm_tp";
                            $sql = "SELECT SGD_TRAD_CODIGO,SGD_TRAD_DESCR,SGD_TRAD_GENRADSAL FROM SGD_TRAD_TIPORAD where mostrar_como_tipo=1  ORDER BY SGD_TRAD_CODIGO";
                            $rs_trad = $db->query($sql);

                            while ($arr = $rs_trad->FetchRow()) {
                                $sqlUpdateUsuario = $sqlUpdateUsuario . " USUA_PRAD_TP" . $arr['SGD_TRAD_CODIGO'] . " = " . ${$cad . $arr['SGD_TRAD_CODIGO']} . ", ";
                            }

                            isset($rsUsuario->fields["usua_login"]) ? $usuaLogin = $rsUsuario->fields["usua_login"] : $usuaLogin = $rsUsuario->fields["USUA_LOGIN"];

                            $isql_final = " usua_perm_preradicado  = $preRadica where usua_login ='" . $usuaLogin . "'";
                            $rssqlUpdate = $db->query($sqlUpdateUsuario . $isql_final);

                            $rsUsuario->MoveNext();
                        }


//                        $mensaje_err = 'Se asignaron correctamente los permisos al rol';
                        echo "<script>";
                        echo "recargar();";
                        echo "</script>";
                    }else{
                        $mensaje_err = 'Se generó error al actualizar la información del rol, por favor verifique';
                    }
                } else {
                    $isql_inicial = "UPDATE perfiles SET ";
                    $isql_inicial .= " perm_radi =  '$digitaliza'
                       ,usua_admin = '$usua_activo'
                       ,usua_nuevo = '$usua_nuevoM'
                       ,codi_nivel = $usua_nivel_consulta
                       ,usua_admin_archivo = $adm_archivo
                       ,usua_masiva = $masiva
                       ,usua_perm_dev = $dev_correo
                       ,sgd_panu_codi = $anulacionVariable
                       ,usua_perm_envios = $env_correo
                       ,usua_perm_modifica = $modificaciones
                       ,usua_perm_impresion = $impresion
                       ,sgd_perm_estadistica = $estadisticas
                       ,usua_admin_sistema = $adm_sistema
                       ,usua_perm_trd = $tablas
                       ,usua_perm_prestamo = $prestamo
                       ,usuario_publico = $usua_publico
                       ,usuario_reasignar = $reasigna
                       ,usua_perm_expediente = $usua_permexp
                       ,usua_auth_ldap = $autenticaLDAP
                       ,perm_archi = '$permArchivar'
                       ,perm_borrar_anexo = $permBorraAnexos
                       ,perm_tipif_anexo = $permTipificaAnexos
                       ,usua_perm_rademail = $usuaPermRadEmail
                       ,usua_perm_agrcontacto  = $usua_perm_agrcontacto
                       ,descargar_documentos = $permDescargaDocumentos
                       ,firma_qr = $firma_qr
                       ,descarga_arc_original = $descarga_arc_original
                       ,per_transferencia_documental=$per_transferencias_documentales
                       ,usua_nivel_consulta = $usua_nivel_consulta 
                       ,usua_perm_reasigna_masiva = $permReasignaMasiva 
                       ,usua_perm_consulta_rad = $permRadicadosNivel  
                       ,consulta_inv_documental = $permConsultaInv
                       ,carga_inv_documental = $permCargaInv 
                       ,firma_mecanica = $firma_mecanica
                       ,";

                    $cad = "perm_tp";
                    $sql = "SELECT SGD_TRAD_CODIGO,SGD_TRAD_DESCR,SGD_TRAD_GENRADSAL FROM SGD_TRAD_TIPORAD where mostrar_como_tipo=1 ORDER BY SGD_TRAD_CODIGO";
                    $rs_trad = $db->query($sql);

                    while ($arr = $rs_trad->FetchRow()) {
                        $isql_inicial = $isql_inicial . " USUA_PRAD_TP" . $arr['SGD_TRAD_CODIGO'] . " = " . ${$cad . $arr['SGD_TRAD_CODIGO']} . ", ";
                    }

                    $isql_final = " usua_perm_preradicado  = $preRadica where codi_perfil =" . $codrol;

                    $rssqlUpdate = $db->query($isql_inicial . $isql_final);

                    if ($rssqlUpdate) {

                        $usuarios = "select usua_login from usuario where cod_rol=" . $_POST['codrol'];
                        $rsUsuario = $db->query($usuarios);

                        while (!$rsUsuario->EOF) {
                            $sqlUpdateUsuario = "update usuario set ";
                            $sqlUpdateUsuario .= " perm_radi =  '$digitaliza'
                               ,usua_admin = '$usua_activo'
                               ,usua_nuevo = '$usua_nuevoM'
                               ,codi_nivel = $nivel
                               ,usua_admin_archivo = $adm_archivo
                               ,usua_masiva = $masiva
                               ,usua_perm_dev = $dev_correo
                               ,sgd_panu_codi = $anulacionVariable
                               ,usua_perm_envios = $env_correo
                               ,usua_perm_modifica = $modificaciones
                               ,usua_perm_impresion = $impresion
                               ,sgd_perm_estadistica = $estadisticas
                               ,usua_admin_sistema = $adm_sistema
                               ,usua_perm_trd = $tablas
                               ,usua_perm_prestamo = $prestamo
                               ,usuario_publico = $usua_publico
                               ,usuario_reasignar = $reasigna
                               ,usua_perm_expediente = $usua_permexp
                               ,usua_auth_ldap = $autenticaLDAP
                               ,perm_archi = '$permArchivar'
                               ,perm_borrar_anexo = $permBorraAnexos
                               ,perm_tipif_anexo = $permTipificaAnexos
                               ,usua_perm_rademail = $usuaPermRadEmail
                               ,usua_perm_agrcontacto  = $usua_perm_agrcontacto
                               ,descargar_documentos = $permDescargaDocumentos
                               ,firma_qr = $firma_qr
                               ,descarga_arc_original = $descarga_arc_original 
                               ,per_transferencia_documental=$per_transferencias_documentales
                               ,usua_nivel_consulta = $usua_nivel_consulta
                               ,usua_perm_reasigna_masiva = $permReasignaMasiva   
                               ,usua_perm_consulta_rad = $permRadicadosNivel 
                               ,consulta_inv_documental = $permConsultaInv
                               ,carga_inv_documental = $permCargaInv 
                               ,firma_mecanica = $firma_mecanica
                               ,";

                            $cad = "perm_tp";
                            $sql = "SELECT SGD_TRAD_CODIGO,SGD_TRAD_DESCR,SGD_TRAD_GENRADSAL FROM SGD_TRAD_TIPORAD where mostrar_como_tipo=1  ORDER BY SGD_TRAD_CODIGO";
                            $rs_trad = $db->query($sql);

                            while ($arr = $rs_trad->FetchRow()) {
                                $sqlUpdateUsuario = $sqlUpdateUsuario . " USUA_PRAD_TP" . $arr['SGD_TRAD_CODIGO'] . " = " . ${$cad . $arr['SGD_TRAD_CODIGO']} . ", ";
                            }

                            isset($rsUsuario->fields["usua_login"]) ? $usuaLogin = $rsUsuario->fields["usua_login"] : $usuaLogin = $rsUsuario->fields["USUA_LOGIN"];

                            $isql_final = " usua_perm_preradicado  = $preRadica where usua_login ='" . $usuaLogin . "'";
                            $rssqlUpdate = $db->query($sqlUpdateUsuario . $isql_final);

                            $rsUsuario->MoveNext();
                        }

//                        $mensaje_err = 'Se actualizar&oacuten correctamente los permisos al rol';
                        echo "<script>";
                        echo "recargar();";
                        echo "</script>";
                    }
                    else{
                        $mensaje_err = 'Se generó error al actualizar la información del rol, por favor verifique';
                    }
                }
                echo '<div style="margin-top: -50%; position: absolute; margin-left: 28%; font-weight: bold;">';
                echo $mensaje_err;
                echo '</div>';
            }
            ?>
        </form>
    </body>
</html>