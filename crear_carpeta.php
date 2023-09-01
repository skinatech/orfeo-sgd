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
$url_raiz = $_SESSION['url_raiz'];
$dir_raiz = $_SESSION['dir_raiz'];
$assoc = $_SESSION['assoc'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
define('ADODB_ASSOC_CASE', $assoc);
/**
 * Se añadio compatibilidad con variables globales en Off
 * @autor Infometrika 2009-05
 * @licencia GNU/GPl V3
 */
$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];

$nomcarpeta = $_GET["carpeta"];
$tipo_carpt = $_GET["tipo_carpt"];
$adodb_next_page = $_GET["adodb_next_page"];
if ($_GET["desccarp"])
    $desccarp = $_GET["desccarp"];
if ($_GET["nombcarp"])
    $nombcarp = $_GET["nombcarp"];
if ($_GET["crear"])
    $crear = $_GET["crear"];

//$ruta_raiz = ".";
if (!isset($_SESSION['dependencia']))
    include "./rec_session.php";
$verrad = "";
define('ADODB_ASSOC_CASE', $assoc);
include_once "$dir_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler($dir_raiz);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
//$db->conn->debug = true;
?>
<html>
    <head>
        <title>Crear Carpeta Personal</title>
        <link rel="stylesheet" href="estilos/orfeo.css">
    </head>
    <script language="javascript">
        //Esta funci�n de Javascript valida el texto introducido por el usuario y evita que este ingrese car�cteres especiales
        //Evitando de este modo el error que por esto se esta presentando
        //Realizado por: Brayan Gabriel Plazas Ria�o - DNP
        //Fecha: 13 de Julio de 2005
        function validar_nombre() {
            var iChars = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú_- 1234567890";
            for (var i = 0; i < document.form1.nombcarp.value.length; i++){
                if ((iChars.indexOf(document.form1.nombcarp.value.charAt(i)) == -1)) {
                    alert("El nombre de la carpeta tiene signos especiales. \n Por favor remueva estos signos especiales e intentelo de nuevo. Solamente puede contener Letras y Numeros.");
                    document.form1.nombcarp.focus();
                    return false;
                }
            }
        }
    </script>
    <body bgcolor="#FFFFFF">
        <form name='form1' method='GET' action='crear_carpeta.php?<?= session_name() . "=" . trim(session_id()) ?>' <? if(!$crear) echo "onSubmit='return validar_nombre()'" ?>>
              <table  width="98%" border="0" cellpadding="0" cellspacing="5" class="borde_tab">
                <tr>
                    <TD width='3%' class="listado2">
                        <A HREF='eliminar_carpeta.php?<?= session_name() . "=" . session_id() ?>'>
                            <img src='./iconos/carpeta_azul_eliminar.gif' border = 0 Alt='Eliminar Carpetas'>Borrar Carpeta</A>
                    </TD>
                    <TD width='97%' class="titulos4" align="center">
                        CREACION DE CARPETAS
                    </TD>
                </tr>
            </table>
            <br>
            <?php
            $nombcarp = trim($nombcarp);
            if (!$nombcarp and $crear) {
                echo "<center>DEBE ESCRIBIR UN NOMBRE DE CARPETA</CENTER>";
                $crear = "";
            }
            if (!$crear) {
                ?>
                <table width='98%' border='0' cellpadding='0' cellspacing='5' class='borde_tab'>
                    <tr> 
                        <td  class='titulos2' align='right'>
                            Nombre de carpeta</strong></td>
                        <td class='listado2' >
                            <input name='nombcarp' type='text' class='tex_area' size='25' maxlength='50' required=""></td>
                    </tr>
                    <tr>
                        <td class='titulos2' align='right'>Descripci&oacute;n</td>
                        <td class='listado2'><input name='desccarp' type='text' class='tex_area' size='25' maxlength='50' required=""></td>
                    </tr>
                    <tr> 
                        <td colspan='2'>
                            <div align='center'>
                                <input type='submit' class='botones' value='Crear Ahora!' name=crear>
                            </div></td>
                    </tr>
                </table>
                <?php
            } else {
                $isql = "SELECT MAX(codi_carp) AS codi_carp FROM carpeta_per WHERE depe_codi='$dependencia' AND usua_codi=$codusuario AND codi_carp!=99";
                error_reporting(7);
                $rs = $db->conn->query($isql);
                /*                 $isql = "select CODI_CARP from carpeta_per 
                  where depe_codi='$dependencia' and usua_codi=$codusuario and codi_carp!=99 and nomb_carp='$nombcarp' order by codi_carp desc ";
                  $rs1 = $db->conn->query($isql); */

                $codigocarpeta = (intval($rs->fields["CODI_CARP"]) + 1);
                IF ($codigocarpeta == 99) {
                    $codigocarpeta = 100;
                }
                $isql2 = "SELECT  nomb_carp FROM carpeta_per WHERE nomb_carp='$nombcarp' AND depe_codi='$dependencia' AND usua_codi=$codusuario AND codi_carp!=99 ";
                error_reporting(7);
                $rs2 = $db->conn->query($isql2);

                if ($rs->EOF = true && empty($rs2->fields)) {
                    $isql = "INSERT INTO CARPETA_PER(codi_carp,depe_codi,usua_codi,nomb_carp,desc_carp)
	                          values ($codigocarpeta,'$dependencia',$codusuario,'$nombcarp','$desccarp')";
                    $rs = $db->query($isql);
                    if ($rs == -1)
                        die("<center>No se ha podido crear la carpeta, Por favor intente mas tarde");
                    echo "<center></b><span class='info'>Creacion de la carpeta <b>$nombcarp</b> con exito</span> ";
                } else
                    echo "<center><span class='alarmas'>No se ha podido crear la carpeta por Nombres Duplicados</span>";
            }
            ?>
        </form> 

        <table width='98%' border='0' cellpadding='0' cellspacing='5' class='borde_tab'>
            <tr> 
                <td  class="listado2_center" height="25" >La descripci&oacute;n de la carpeta le recordara 
                    el destino final de la misma. Esto se puede ver pasando el mouse sobre cada 
                    una de las carpetas. </td>
            </tr>
        </table>

    </body>
</html>