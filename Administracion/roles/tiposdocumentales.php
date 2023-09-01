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
$driver = $_SESSION['driver'];
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
//$db->conn->debug = true;

$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
?>
<html>
    <head>
        <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
        <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <style>
            .ui-autocomplete-loading { background: white  right center no-repeat; }
            .ui-autocomplete { height: 200px; width: 200px; overflow-y: scroll; overflow-x: hidden;}
        </style>
        <SCRIPT language="Javascript">
            var selected = [];

            $(function () {
                $("#tiposdocumentales").autocomplete({
                    source: "searchsGeneral.php",
                    minLength: 3,
                    select: function (event, ui) {
                        document.getElementById("botonIngresar").value = 1;
                        if (ui.item) {
                            $(event.target).val(ui.item.value);
                        }
                        //submit the form
                        $(event.target.form).submit();
                    }
                });
            });

            function envio_datos() {
                var numerico = 0;
                document.getElementById("botonIngresar").value = 0;
                if (document.getElementById("codrol").value == 0) {
                    alert("Debe seleccionar un rol para asignar permisos");
                    document.getElementById("codrol").focus();
                    return false;
                }

                if (document.getElementById("datosAguardar").value == '') {
                    alert("Debe seleccionar por lo menos un tipo documental");
                    return false;
                }
                return true;
            }

            function recargar() {
                document.getElementById("codrol").value = 0;
                document.getElementById("datosAguardar").value = '';
                $("input:checkbox:checked").each(function () {
                    $("input:checkbox:checked").attr('checked', false);
                });
                submit();
            }

            function agregarCheck() {
                var data = $('#datosAguardar').val();
                $("input:checkbox:checked").each(function () {
                    selected.push($(this).val());
                });

                var nuevoTexto = data + ',' + selected;
                $('#datosAguardar').val(nuevoTexto);
            }

            function totalCheck() {
                $("#checkTodos").change(function () {
                    $("input:checkbox").prop('checked', $(this).prop("checked"));
                    $('#totalTipoDoc').val(true);
                });
            }
        </SCRIPT>
        <title>Tipos documentales</title>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        $dato0 = 0;
        $botonIngresar = 1;
        if ($datosAguardar == '') {
            $datosAguardar = '';
        }

        if (isset($codrol) && $codrol != '' && !isset($_POST['guardar'])) {
            $codrol = $codrol;
            $datosTiposDocs = $_POST['datosAguardar'];
            $botonIngresar = 1;

            if ($datosAguardar == '') {
                $a = 0;
                $isql1s = "select cod_tp_tpdcumento as COD_TP_TPDCUMENTO from rol_tipos_doc where cod_rol=" . $codrol;
                $rsss = $db->query($isql1s);
                while (!$rsss->EOF) {
                    $a != 0 ? $coma = ',' : $coma = '';
                    $datosAguardar .= $coma . $rsss->fields["COD_TP_TPDCUMENTO"];
                    $rsss->MoveNext();
                    $a++;
                }
            }

            if ($_POST['datosAguardar'] != '') {
                $dato0 = 1;
            }
        }
        ?>
        <form name="frmTipos" id="frmTipos" action='' method="POST">
            <table width="100%" border="0" cellpadding="0" cellspacing="5" >
                <tr> 
                    <td class="titulos2" colspan="6" ><b>Administraci&oacute;n tipos documentales</bl></td>
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
            <br><br><br>
            <table border=1 width=100% class=borde_tab>
                <tr class="timparr update" >          
                    <td width="90%" class="listado2">
                        <br>
                        <div style="width: 56%; margin-left: 45%;">
                            <label >Buscar tipo documental:</label> 
                            <input type="text" id="tiposdocumentales" name="tiposdocumentales" size="40" style="margin-left: 13%;" placeholder="Ingrese criterio de b&uacute;squeda" title="" aria-autocomplete="list" aria-haspopup="true" aria-owns="ui-autocomplete-instance"><br><br>
                            <?php
                            $sqlCount = 'select count(*) as COUNT from sgd_tpr_tpdcumento where sgd_tpr_estado =1';
                            $rsCOUNTTipodDoc = $db->query($sqlCount);
                            ?>
                            <br><b> <label style="margin-left: 50%;">Hay un total de <?= $rsCOUNTTipodDoc->fields["COUNT"] ?> tipos documentales</label></b>
                        </div>
                        <br><br>
                        <input type='hidden' name='botonIngresar' id='botonIngresar' value='<?= $botonIngresar ?>'/>
                        <input type='hidden' name='datosAguardar' id='datosAguardar' value='<?= $datosAguardar ?>'/>
                        <input type='hidden' name='criterio' id='criterio' value='<?= $dato0 ?>'/>
                        <input type='hidden' name='totalTipoDoc' id='totalTipoDoc'/>
                        <?php
                        if (isset($_POST['tiposdocumentales']) && $_POST['tiposdocumentales'] != '') {
                            $nombreTipoDoc = $_POST['tiposdocumentales'];
                            $andLike = " and sgd_tpr_descrip like '%$nombreTipoDoc%'";
                            $and = " and sgd_tpr_descrip = '$nombreTipoDoc'";
                        } else {
                            $and = '';
                        }

                        $isqlTiposdocumentales = "select sgd_tpr_codigo as SGD_TPR_CODIGO, sgd_tpr_descrip as SGD_TPR_DESCRIP from sgd_tpr_tpdcumento where sgd_tpr_estado=1 $and order by sgd_tpr_descrip asc";
                        $rsTipodDoc = $db->query($isqlTiposdocumentales);

                        if ($rsTipodDoc->fields["SGD_TPR_DESCRIP"] == '') {
                            $isql = "select sgd_tpr_codigo as SGD_TPR_CODIGO, sgd_tpr_descrip as SGD_TPR_DESCRIP from sgd_tpr_tpdcumento where sgd_tpr_estado=1 $andLike order by sgd_tpr_descrip asc";
                            $rsTipodDoc = $db->query($isql);
                        }

                        $tiposDoc = array();
                        echo "<div class='row'>";
                        echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style='overflow-y: scroll; height:400px; font-size: 11.5px; width: 99%;' id='divTipoDoc'>";
                        if ($rsTipodDoc->fields["SGD_TPR_CODIGO"] == '') {
                            echo '<br><center><p><span class=etexto color="red"><B>No se encontraron resultados con el criterio ingresado</B></span></p></center>';
                        } else {
                            echo '<input type="checkbox" class="checkTodos" id="checkTodos"  name="checkTodos" value=""onclick="totalCheck();"><label > Listado completo de tipos documentales existentes: </label><br>';
                            if ($_POST['codrol']) {
                                $isql1 = "select cod_tp_tpdcumento as COD_TP_TPDCUMENTO from rol_tipos_doc where cod_rol=" . $_POST['codrol'];
                                $rs = $db->query($isql1);
                                while (!$rs->EOF) {
                                    $tiposDoc[] = $rs->fields["COD_TP_TPDCUMENTO"];
                                    $rs->MoveNext();
                                }
                            }

                            while (!$rsTipodDoc->EOF) {
                                $tpcodigo = $rsTipodDoc->fields["SGD_TPR_CODIGO"];
                                $tpdescri = $rsTipodDoc->fields["SGD_TPR_DESCRIP"];
                                if (in_array($tpcodigo, $tiposDoc)) {
                                    $check = "checked";
                                } else {
                                    $check = "";
                                }
                                ?>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">                                    
                                    <input type="checkbox" class="TipoDoc" id="TipoDoc"  name="TipoDoc[]" value="<?= $tpcodigo ?>" <?= $check ?> onclick="agregarCheck();"> <?= $tpdescri ?>
                                </div>
                                <?php
                                $rsTipodDoc->MoveNext();
                            }
                        }
                        echo "</div>";
                        echo "</div>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table border=0 width=100% class=t_bordeGris>
                            <tr class="cajaBotonesMedio">
                                <td height="30" colspan="" class="listado1">  
                            <center>
                                <input class="botones" type="submit" id="guardar" name="guardar" value="Guardar" onClick="return envio_datos();">
                            </center>
                    </td>
                    <td height="30" colspan="" class="listado1">
                <center>
                    <a href='../formAdministracion.php?<?= session_name() . "=" . session_id() . "&$encabezado" ?>'>
                        <input class="botones" type="button" name="Submit4" value="Regresar">
                    </a>
                </center>
                </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php
if ($_POST['guardar'] && $_POST['tiposdocumentales'] == '' && $_POST['botonIngresar'] == '0') {
    $mens = "";
    $codigoRol = $_POST['codrol'];
    $tipodocumental = $_POST['TipoDoc'];
    $datosTiposDocs = $_POST['datosAguardar'];
    $todosTipodocumentales = $_POST['totalTipoDoc'];

    $isql1Rol = "select * from rol_tipos_doc where cod_rol=" . $codigoRol;
    $rsRol = $db->query($isql1Rol);
    if ($rsRol) {
        $deleterol = "delete from rol_tipos_doc where cod_rol=" . $codigoRol;
        $rsdeleteRol = $db->query($deleterol);
    }

    // Si llega en true quiere decir que se van a asignar todo los tipos documentales al rol
    //$tiposTotal = '';
    if(isset($todosTipodocumentales) && $todosTipodocumentales == true){
        $isqlTiposdocumentales = "select sgd_tpr_codigo as SGD_TPR_CODIGO, sgd_tpr_descrip as SGD_TPR_DESCRIP from sgd_tpr_tpdcumento where sgd_tpr_estado=1";
        $rsTipodDoc = $db->query($isqlTiposdocumentales);

        while (!$rsTipodDoc->EOF) {
            $tpcodigo = $rsTipodDoc->fields["SGD_TPR_CODIGO"];
            $datosTiposDocs .= $tpcodigo.',';
            $rsTipodDoc->MoveNext();
        }
    }

    $datos = explode(',', $datosTiposDocs);
    $datos = array_unique($datos);

    foreach($datos as $key => $valor){
        $isql1Rolss = "select cod_tp_tpdcumento as COD_TP_TPDCUMENTO from rol_tipos_doc where cod_rol=" . $codigoRol . " and cod_tp_tpdcumento=" . $valor;
        $rsRolss = $db->query($isql1Rolss);
        if ($rsRolss->fields["COD_TP_TPDCUMENTO"] == '') {

            /* By Skinatech - Jenny Gamez
             * Se agrega esta condición ya que para postgres el campo auto_increment es igual a serial,
             * esto crea una secuencia por defecto, entonces en este caso se incrementa esta secuencia
             * para permitir ingresar la cantidad que se desee para el rol sin presentar duplicidad de ids
             */
            if ($driver == 'postgres') {
                $q = "select nextval('sec_rol_tipos_doc') as SEC";
                $rs = $db->query($q);
                $conteoTotaol = $rs->fields['SEC'];
                $insertrol = "insert into rol_tipos_doc values ($conteoTotaol,$codigoRol,$valor,1)";
                
            }elseif ($driver == 'oci8') {
                $conteoTotaol = $db->conn->nextId('ROL_TIPOS_DOC_COD_ROL_TIPO_SEQ', $driver);                
                $insertrol = "insert into rol_tipos_doc values ($conteoTotaol,$codigoRol,$valor,1)";
            }
            else {
                $insertrol = "insert into rol_tipos_doc values ($codigoRol,$valor,1)";
            }
            
            $rsdeleteRol = $db->query($insertrol);
            if ($rsdeleteRol) {
                $mens = 1;
            }
        }
    }

    if ($mens == 1) {
        $mensaje_err = 'Se asignaron correctamente los tipos documentales al rol';
        // echo "<script>";
        // echo "alert('".$mensaje_err."');";
        // echo "recargar();";
        // echo "</script>";
    } else {
        $mensaje_err = 'No se pudo asignar los tipos documentales al rol';
    }
    // echo '<div style="margin-top: -47%; position: absolute; margin-left: 24%; font-weight: bold;">';
    // echo $mensaje_err;
    // echo '</div>';
    echo "<script>";
    echo "alert('".$mensaje_err."');";
    echo "recargar();";
    echo "</script>";
}
?>
</form>
<!--</center>-->
</body>
</html>