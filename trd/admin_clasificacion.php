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

include_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$dir_raiz");

define('ADODB_ASSOC_CASE', $assoc);
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

if (!isset($fecha_busq))
    $fecha_busq = Date('Y-m-d');
if (!isset($fecha_busq2))
    $fecha_busq2 = Date('Y-m-d');

$codserie = $_POST['codserie'];
//$db->conn->debug = true;
?>
<html>
    <head>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>
    <body bgcolor="#FFFFFF">
        <div id="spiffycalendar" class="text"></div>
        <link rel="stylesheet" type="text/css" href="../js/spiffyCal/spiffyCal_v2_1.css">
        <script language="JavaScript" src="../js/spiffyCal/spiffyCal_v2_1.js"></script>
        <?php
        if ($tsub != 0 && $codserie != 0 && !isset($_POST['modificar_subserie'])) {
            $queryClasificacion = "select * from cla_serie where cod_serie = $codserie and cod_claserie = $tsub";
            # Selecciona el registro a actualizar
            $rs = $db->query($queryClasificacion); # Executa la busqueda y obtiene el registro a actualizar.
            $consecutivo = $rs->fields["consecutivo"];
            $codClase = $rs->fields["cod_claserie"];
            $detasub = $rs->fields["nom_claserie"];
        }

        if (!isset($codserie))
            $codserie = "";
        if (!isset($tsub))
            $tsub = "";
        if (!isset($detasub))
            $detasub = "";
        ?>
        <br>
        <form name="adm_clasificacion" id='adm_clasificacion' method='POST'  action='admin_clasificacion.php?<?= session_name() . "=" . session_id() . "&krd=$krd&tiem_ac=$tiem_ac&tiem_ag=$tiem_ag&fecha_busq=$fecha_busq&fecha_busq2=$fecha_busq2&codserie=$codserie&tsub=$tsub&detasub=$detasub" ?>'>
            <center>
                <table  class="borde_tab" style="width: 77%;" border="1" cellspacing="5">
                    <tr>
                    <div id="titulo" style="width: 77%;" align="center">C&oacute;digo negocio por serie</div>
                    </tr>
                    <tr>
                        <TD class='titulos2'> <label for="codserie">C&oacute;digo Serie</label><br></td>
                        <td class="listado2" colspan="3" >
                            <?php
                            if (!$codserie)
                                $codserie = 0;

                            $fechah = date("dmy") . " " . time();
                            $fecha_hoy = Date("Y-m-d");
                            $sqlFechaHoy = $db->conn->DBDate($fecha_hoy);
                            $check = 1;
                            $fechaf = date("dmy") . "_" . time();
                            $num_car = 4;
                            $nomb_varc = "sgd_srd_codigo";
                            $nomb_varde = "sgd_srd_descrip";
                            include "$url_raiz/include/query/trd/queryCodiDetalle.php";
                            $querySerie = "select distinct ($sqlConcat) as detalle, sgd_srd_codigo 
                            from sgd_srd_seriesrd order by detalle ";
                            $rsD = $db->conn->query($querySerie);
                            $comentarioDev = "Muestra las Series Docuementales";
                            include "$url_raiz/include/tx/ComentarioTx.php";
                            print $rsD->GetMenu2("codserie", $codserie, "0:-- Seleccione --", false, "", "onChange='submit()' class='select form-control' id='codserie' title='Listado de las series existentes en el sistema'");
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <TD width="125" height="21"  class='titulos2'><label for="tsub">Lista c&oacute;digos negocios</label></td>
                        <td colspan="3"  class="listado2"> 
                            <?php
                            $nomb_varc = "cod_claserie";
                            $nomb_varde = "nom_claserie";
                            include "$url_raiz/include/query/trd/queryCodiDetalle.php";
                            $querySub = "select distinct ($sqlConcat) as detalle, cod_claserie from cla_serie where cod_serie = $codserie order by detalle";
                            $rsSub = $db->conn->query($querySub);
                            print $rsSub->GetMenu2("tsub", $tsub, "0:-- Seleccione --", false, "", "onChange='submit()' class='select form-control' id='tsub' title='Listado de las clasificaci&oacute;n existentes'");
                            ?> 
                        </td>
                    </tr>
                    <tr>
                        <td class='titulos2'><label for="detasub">c&oacute;digo SFC</label></td>
                        <td valign="top" align="left" class='listado2'>
                            <input id="codClase" name="codClase" type="text" size="10" class="tex_area" value="<?= $codClase ?>" title="Descripción de la clasificaci&oacute;n" required="">
                            <!--<input id="codsfc" name="codsfc" type="hidden" size="65" class="tex_area" value="<?= $consecutivo ?>" title="Consecutivo de la clasificaci&oacute;n">-->
                        </td>
                        <td class='titulos2'><label for="detasub">c&oacute;digo negocio</label></td>
                        <td valign="top" align="left" class='listado2'>
                            <input id="detasub" name="detasub" type="text" size="65" class="tex_area" value="<?= $detasub ?>" title="Descripción de la clasificaci&oacute;n" required="">
                            <input id="consecutivo" name="consecutivo" type="hidden" size="65" class="tex_area" value="<?= $consecutivo ?>" title="Consecutivo de la clasificaci&oacute;n">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" valign="top" class='listado1'> 
                    <center>
                        <input type=submit name=insertar_subserie Value='Insertar' class=botones aria-label="Guardar la subserie ingresada">
                        <input type=submit name=modificar_subserie Value='Modificar' class=botones aria-label="Guardar cambios de la subserie">
                    </center>
                    </td>
                    </tr>
                </table>
                <br><br>
                <?php
                $detasub = strtoupper(trim($detasub));

                if (isset($insertar_subserie)) {
                    if ($codserie != 0) {
//                        $isqlB = "select MAX(cod_claserie) as counts from cla_serie where cod_serie = $codserie";
//                        $rs = $db->query($isqlB); # Executa la busqueda y obtiene el registro a actualizar.
//                        $count = $rs->fields["counts"];
                          $count = $_POST['codClase'];
//                        $count != '' ? $count = $count : $count = $count+1;

                        $isqlconsulta = "select * from cla_serie where cod_serie = $codserie and nom_claserie = '$detasub'";
                        $rs = $db->query($isqlconsulta); # Executa la busqueda y obtiene el registro a actualizar.
                        $consecutivo = $rs->fields["consecutivo"];

                        if ($consecutivo != '') {
                            $mensaje_err = "<HR><center><B><FONT COLOR=RED>La serie <$detasub > ya existe. <BR> verifique la informaci&oacute;n e intente de nuevo</FONT></B></center><HR>";
                        } else {
                            $query = "insert into cla_serie (cod_claserie, nom_claserie, cod_serie) VALUES ($count,'$detasub',$codserie)";
                            $rsIN = $db->conn->query($query);
                            $tsub = '';
                            if (!$rsIN) {
                                $mensaje_err = " <HR><center><B><FONT COLOR=RED> Verifique todos los datos</FONT></B></center><HR>";
                            } else {
                                $mensaje_err = " <HR><center><B><FONT COLOR=RED>Se creo correctamente el c&oacute;digo negocio</FONT></B></center><HR>";
                            }
                            ?>
                            <script language="javascript">
                                document.adm_clasificacion.elements['detasub'].value = '';
                                document.adm_clasificacion.elements['tsub'].value = '';
                                document.adm_clasificacion.elements['codClase'].value = '';
                            </script>
                            <?php
                        }
                    } else {
                        echo "<script>alert('Los campos serie, c\u00F3digo sfc y c\u00F3digo negocio son obligatorios');</script>";
                    }
                }

                //Selecciono Grabar Cambios
                if (isset($_POST['modificar_subserie'])) {
                    if ($codserie != 0 && $tsub != 0 && $detasub != '') {
                        $sqlupdate = "update cla_serie set cod_claserie=$codClase, nom_claserie='$detasub' where consecutivo=$consecutivo";
                        $rs = $db->query($sqlupdate);
                        if ($rs) {
                            $mensaje_err = "<HR><center><B><FONT COLOR=RED>Se modific&oacute; el c&oacute;digo negocio</FONT></B></center><HR>";
                            ?>
                            <script language="javascript">
                                document.adm_clasificacion.elements['detasub'].value = "<?= $detasub ?>";
                                document.adm_clasificacion.elements['tsub'].value = "<?= $tsub ?>";
                                document.adm_clasificacion.elements['codClase'].value = '<?= $codClase ?>';
                            </script>
                            <?php
                        } else {
                            $mensaje_err = "<HR><center><B><FONT COLOR=RED>No se pudo realizar la actualizaci&oacute;n, verifique</FONT></B></center><HR>";
                        }
                    } else {
                        echo "<script>alert('Los campos serie, c\u00F3digo sfc y el c\u00F3digo negocio son obligatorios');</script>";
                    }
                }
                ?>
            </center>
        </form>
        <br><br>
        <div style="margin-top:-7%;">
            <?php echo $mensaje_err ?>
        </div>
        <br><br>
    </body>
</html>
