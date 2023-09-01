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
$dependencia = $_SESSION['dependencia'];
$codusuario = $_SESSION['codusuario'];
$usua_doc = $_SESSION['usua_doc'];
$assoc = $_SESSION['assoc'];

$krd = $_GET['krd'];
$whereFiltro2 = $_GET['whereFiltro2'];
$whereFiltro = $_GET['whereFiltro'];
$funExpediente = $_POST['funExpediente'];
$numExpHidden = $_POST['numExpHidden'];
$confirmaIncluirExp = $_POST['confirmaIncluirExp'];

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

$krdold = $krd;

if (!$krd) {
    $krd = $krdold;
}

if (!$nurad)
    $nurad = $record_id;

if ($record_id) {
    $record_id = $rad;
}

if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";
include_once( "$dir_raiz/include/db/ConnectionHandler.php" );
$db = new ConnectionHandler("$dir_raiz");
include_once( "$dir_raiz/include/tx/Historico.php" );
include_once( "$dir_raiz/include/tx/ExpedienteMultiple.php" );
include( "$dir_raiz/include/tx/Flujo.php" ); // Se agrega este include para que tome en cuenta la funcion de cambiar de etapa en el flujo de trabajo
include_once( "$dir_raiz/include/tx/ConsultaRad.php" );
include_once( "$dir_raiz/include/tx/Radicacion.php" );

$record_id = $whereFiltro;
$whereFiltro2 = substr($whereFiltro2, 0, (strlen($whereFiltro2) - 1));
$expediente = new Expediente($db);
$consultaRadicado = new ConsultaRad($db);
$radicadoInfo = new Radicacion($db);

// Inserta el radicado en el expediente
if ($funExpediente == "INSERT_EXP") {
    // Paso de variable de js a php
    $_POST['numeroExpediente'] = $numExpHidden;

    // Consulta si el radicado est� incluido en el expediente.
    $arrExpedientes = $expediente->expedientesRadicado($whereFiltro2);
    // Valida el estado del expediente si se encuentra cerrado o abierto
    $exp_estado = $db->conn->Execute("Select sgd_exp_archivo AS EXP_ARCHIVO from sgd_exp_expediente where sgd_exp_numero='" . $_POST["numeroExpediente"] . "';");

    /***
    Autor: Jenny Gamez
    Fecha: 2019-09-05
    Info: (mejora) Se modifca este foreach en las validaciones internas, por mejoras en los mensajes de confirmación y criterios de bsuquedas
    ***/
    foreach ($arrExpedientes as $line_num => $line) {
        if ($line == $_POST['numeroExpediente'] && $_POST['numeroExpediente'] != '') {
            ?>
            <script language="JavaScript">
                alert("El radicado ya est\u00E1 incluido en el expediente <?echo $line;?> en el que desea incluir este radicado \n\r ");
                document.getElementById('nombreExpediente').focus();
            </script>
            <?php
            print '<center><h4><hr><font color="red">El radicado ya est&aacute; incluido en el expediente.</font><hr></h4></center>';
        } elseif ($exp_estado->fields["EXP_ARCHIVO"] == 2) {
            ?>
            <script language="JavaScript">
                alert("No se anexo este radicado al expediente. El expediente <?php echo $_POST['numeroExpediente']; ?> se encuentra cerrado. ");
                document.getElementById('nombreExpediente').focus();
            </script>
            <?php
            print "<center><h4><hr><font color=red>No se anexo este radicado al expediente. El expediente " . $_POST['numeroExpediente'] . " se encuentra cerrado.</font><hr></h4></center>";
        } elseif ($_POST['numeroExpediente'] == '' && $_POST['nombreExpediente'] != '') {
            // Se agrega una validación adicional para que el campo del número de expediente lo deje en blanco
            // ya que al no estar correcto el nombre el sistema permitia continuar con el proceso de inclusión
            // razón por la cual generaba error.
            ?>
            <script language="JavaScript">
                alert("El expediente ingresado no existe, por favor verifique el nombre e intente nuevamente \n\r ");
                document.getElementById('numeroExpediente').value = '';
                document.getElementById('nombreExpediente').focus();
            </script>
            <?php
            print '<center><h4><hr><font color="red">El expediente ingresado no existe, por favor verifique el nombre e intente nuevamente.</font><hr></h4></center>';
        } elseif ($_POST['numeroExpediente'] == '' && $_POST['nombreExpediente'] == '') {
            ?>
            <script language="JavaScript">
                alert("No ha ingresado ning\u00FAn expediente, por favor intente nuevamente \n\r ");
                document.getElementById('numeroExpediente').value = '';
                document.getElementById('nombreExpediente').focus();

            </script>
            <?php
            print '<center><h4><hr><font color="red">No ha ingresado ning&uacute;n expediente, por favor intente nuevamente.</font><hr></h4></center>';
        } else {
            //$db->conn->debug=true;
            $resultadoExp = $expediente->insertar_expediente($_POST['numeroExpediente'], $whereFiltro2, $dependencia, $codusuario, $usua_doc);

            /* APARTIR DE AQUI SE VALIDA SI EL EXPEDIENTE TIENE ALGUN PROCESO ASIGNADO PARA EFECTUAR EL FLUJO DE TRABAJO.  */
            $numeroExpediente = $_POST['numeroExpediente'];
            $numExpediente = $expediente->consulta_exp("$whereFiltro2");
            $mrdCodigo = $expediente->consultaTipoExpediente("$numeroExpediente");            
            $trdExpedienteInfo = $expediente->trdExpediente($numeroExpediente);

            /* Serie y subserie del expediente que sera aplicado a los radicados */
            $codiSrExp = $trdExpedienteInfo['serie'];
            $codiSrbrExp = $trdExpedienteInfo['subserie'];
            $ent = substr($whereFiltro2, -1);

            if ($resultadoExp == '1') {
                $observa = "Incluir radicado en Expediente " . $numExpHidden;
                // Se agrega una nueva observación al momento de incluir un varios radicados en un mismo expediente de forma multiple
                $observacionExpMul = "Se incluyo el radicado al Expediente " . $numExpHidden . ' - ' . $_POST['nombreExpediente'];
                $observaTrd = 'Asignaci&oacute;n de TRD ';

                $radicados[] = $whereFiltro2;
                $tipoTx = 62;
                $Historico = new Historico($db);

                if (strpos($radicados[0], ',')) {
                    //Si trae coma, trae varios radicados 
                    $tmp = explode(',', $radicados[0]);
                    $counter = count($tmp);
                    $i = 0;
                    $rad_array = array();
                    while ($i < $counter) {
                        $rad_array[0] = $tmp[$i];
                        $Historico->insertarHistoricoExp($_POST['numeroExpediente'], $rad_array, $dependencia, $codusuario, $observa, $tipoTx, "0");

                        $radicadoInfo->trdRadicado($rad_array[0], $codiSrExp, $codiSrbrExp, $dependencia, $codusuario, $usua_doc);
                        
                        $Historico->insertarHistorico($rad_array, $dependencia, $codusuario, $dependencia, $codusuario, $observaTrd, 32);
                        $i++;
                    }
                } else {
                    $rad_array = array();
                    $rad_array[0] = $whereFiltro2;
                    $Historico->insertarHistoricoExp($_POST['numeroExpediente'], $rad_array, $dependencia, $codusuario, $observa, $tipoTx, "0");

                    $radicadoInfo->trdRadicado($rad_array[0], $codiSrExp, $codiSrbrExp, $dependencia, $codusuario, $usua_doc);

                    $Historico->insertarHistorico($rad_array[0], $dependencia, $codusuario, $dependencia, $codusuario, $observaTrd, 32);
                }
                ?>
                <script language="JavaScript">
                    alert("Radicado(s) insertado correctamente, la ventana se cerrara automaticamente, No olvide anexar su observacion y dar click en realizar!");
                    window.opener.location.reload();
                    window.close();
                </script>  
                <?php
            } else {
                print '<center><h4><hr><font color=red>No se anexo este radicado al expediente. Verifique que el numero del expediente exista e intente de nuevo.</font><hr></h4></center>';
            }
        }
    }
    /***
    Autor: Jenny Gamez
    Fecha: 2019-09-05
    Info: fin
    ***/
}
?>
<html>
    <head>
        <title>Incluir en Expediente</title>
        <?php $url_raiz = ".." ?>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">

        <!-- Autocompletar para el nombre de expediente -->
        <link rel="stylesheet" href="../js/jquery-ui/development-bundle/themes/base/jquery.ui.all.css">
        <script src="../js/jquery-ui/development-bundle/jquery-1.7.1.js"></script>
        <script src="../js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
        <script src="../js/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
        <script src="../js/jquery-ui/development-bundle/ui/jquery.ui.position.js"></script>
        <script src="../js/jquery-ui/development-bundle/ui/jquery.ui.autocomplete.js"></script>
        <script type="text/javascript" src="../ajax/js/ajax.js"></script> 
        <link rel="stylesheet" href="../js/jquery-ui/development-bundle/demos/demos.css">
        <style>
            .ui-autocomplete-loading { background: white url('../js/jquery-ui/development-bundle/demos/autocomplete/images/ui-anim_basic_16x16.gif') right center no-repeat; }
        </style>

        <script language="JavaScript">
            var nomExp = "xyz ";
            $(function () {
                var cache = {},
                        lastXhr;
                $("#nombreExpediente").autocomplete({
                    minLength: 3,
                    select: seleccion,
                    source: function (request, response) {
                        var term = request.term;
                        if (term in cache) {
                            response(cache[ term ]);
                            return;
                        }

                        lastXhr = $.getJSON("search.php", request, function (data, status, xhr) {
                            cache[ term ] = data;
                            if (xhr === lastXhr) {
                                response(data);
                            }
                        });
                    }
                });
            });
            /***
            Autor: Jenny Gamez
            Fecha: 2019-09-05
            Info: (mejora) se modifica la función ya que se estaba generando una consulta adicional de forma de redundante que de  por si estaba generando error cuando el nombre del expediente tenia caracteres de acentuación y no mostraba el resultado correcto. Al realizar la modificación se elimina la función results(data).
            ***/
            function seleccion(event, ui) {
                var nomExp;

                // Capta informacion del expediente seleccionado  
                nomExp = ui.item.value;
                document.insExp.nombreExpediente.value = nomExp;
                document.insExp.submit();
            }
            /***
            Autor: Jenny Gamez
            Fecha: 2019-09-05
            Info: Fin
            ***/
        </script>

        <script language="JavaScript">
            function validarNumExpediente() {
                // document.insExp.numeroExpediente.value ='<?= $numeroExpediente ?>';
                numExpediente = document.getElementById('numeroExpediente').value;
                nomExpediente = document.getElementById('nombreExpediente').value;              

                // Valida que se haya digitado el nombre del expediente
                // anho dependencia serie subserie consecutivo E
                if ((numExpediente.length != 0 && numExpediente != "") || (nomExpediente.length != 0 && nomExpediente != "")) {
                    insertarExpedienteVal = true;
                    document.getElementById('numeroExpediente').value = numExpediente;

                } else if ((numExpediente.length == 0 || numExpediente == "") || (nomExpediente.length != 0 && nomExpediente != "")) {
                    alert("Error. Debe especificar el nombre de un expediente.");
                    document.getElementById('nombreExpediente').focus();
                    insertarExpedienteVal = false;
                }

                if (insertarExpedienteVal == true) {
                    document.insExp.submit();
                }
            }

            function confirmaExpedeinteIncluir() {
                document.getElementById('funExpediente').value = "INSERT_EXP";
                document.getElementById('numExpHidden').value = document.getElementById('numeroExpediente').value;

                nombreExpediente = document.getElementById('nombreExpediente').value;
                numeroExpediente = document.getElementById('numExpHidden').value;

                if (nombreExpediente && eval(opener.document.realizarTx)) {
                    opener.document.realizarTx.observa.value = 'Se incluyo el radicado al expediente No.' + numeroExpediente + ' - ' + nombreExpediente;
                    opener.document.realizarTx.numExpHidden.value = numeroExpediente;
                    opener.document.realizarTx.observa.focus();
                    document.insExp.submit();
                    opener.focus();
                    window.close();
                } else {
                    document.insExp.submit();
                }
            }
        </script>
    </head>

    <body bgcolor="#FFFFFF" onLoad="document.insExp.nombreExpediente.focus();">
        <form method="post" action="<?php print $encabezado; ?>" name="insExp">
            <input type="hidden" name='funExpediente' id='funExpediente' value="" >
            <input type="hidden" name='confirmaIncluirExp' id='confirmaIncluirExp' value="" >
            <input type="hidden" name='numExpHidden' id='numExpHidden' value="" >
            <br>
            <center>
                <div id="titulo" style="width: 70%;" align="center">Incluir en el expediente</div>
                <table width="70%" border="1" cellspacing="1" cellpadding="0" align="center" class="borde_tab"></table>
                <?php
                    // $db->conn->debug=true;
                    if (isset($_POST['nombreExpediente']) && $_POST['nombreExpediente'] != '') {
                        $nombreExp = $_POST['nombreExpediente'];
                        $sql_nomExp = "select sgd_exp_numero as EXP_NUMERO, sgd_sexp_parexp1 as EXP_NOMBRE from sgd_sexp_secexpedientes where sgd_sexp_parexp1 like '%$nombreExp%'";
                        $rs = $db->conn->query($sql_nomExp);
                        $disabled = '';
                    }else{
                        $numeroExpediente = $_POST['numeroExpediente'];
                        $sql_numExp = "select sgd_exp_numero as EXP_NUMERO, sgd_sexp_parexp1 as EXP_NOMBRE from sgd_sexp_secexpedientes where sgd_exp_numero='$numeroExpediente'";
                        $rs = $db->conn->query($sql_numExp);
                        $disabled = '';

                        if(!$rs){
                            $disabled = 'disabled=true';
                        }
                    }
                    ?>
                <table border=1 width=70% align="center" class="borde_tab">
                    <tr align="center">
                        <td width="33%" height="25" class="listado2" align="center">
                            <div align="justify"><br>
                                <strong>
                                    <b>Recuerde:&nbsp;</b>Solo se puede buscar un expediente por el nombre o el numero, siempre y cuando este se encuentre abierto y pertenezca a la misma de dependencia que la suya.
                                </strong>
                            </div>
                            <br>
                        </td>
                    </tr>
                </table>
                <table border=1 width=70% align="center" class="borde_tab">
                    <tr align="center">
                        <td class="titulos5" align="left" nowrap>
                            <label for="nombreExpediente">Nombre del Expediente</label>
                        </td>
                        <td class="titulos5" align="left">
                            <input type="text" name="nombreExpediente" id="nombreExpediente" value="<?= isset($rs->fields['EXP_NOMBRE']) ? $rs->fields['EXP_NOMBRE'] : $_POST['nombreExpediente']  ?>" title="Digite numero del expediente, para navegar entre los resultados use las flechas arriba y abajo" size="30">
                        </td>
                    </tr>
                    <tr align="center">
                        <td class="titulos5" align="left" nowrap>N&uacute;mero del Expediente</td>
                        <td class="titulos5" align="left">
                            <input type="text" name="numeroExpediente" id="numeroExpediente" value="<?= isset($rs->fields['EXP_NUMERO']) ? $rs->fields['EXP_NUMERO'] : $_POST['numeroExpediente']  ?>" title="Digite numero del expediente, para navegar entre los resultados use las flechas arriba y abajo" size="30">
                        </td>
                    </tr>
                </table>

                <table border=1 width=70% align="center" class="borde_tab">
                    <td width="33%" height="25" class="listado2" align="center">
                        <center>
                            <!-- <input name=btnIncluirExp" type=button class=botones_largo id=btnIncluirExp onClick="validarNumExpediente();" value="Busqueda por número Expediente" aria-label="Incluir radicados en expediente"> -->
                        </center>
                    </td>

                    <?php
                    if (($expediente->existeExpediente($_POST['numeroExpediente']) !== '0')) {
                        ?>

                        <table border=1 width=70% align="center" class="borde_tab">
                            <tr align="center">
                                <td width="33%" height="25" class="listado2" align="center">
                                    <center class="titulosError2">Esta seguro de incluir estos radicados en el expediente?</center>
                                    <center class="style1"><b><?php print $numeroExpediente; ?></b></center>
                                    <div align="justify"><br>
                                        <strong>
                                            <b>Recuerde:&nbsp;</b>No podr&aacute; modificar el n&uacute;mero de expediente si hay un error en el expediente, m&aacute;s adelante tendr&aacute; que excluir este radicado del expediente y si es el caso solicitar la anulaci&oacute;n del mismo. Adem&aacute;s debe tener en cuenta que tan pronto coloca un nombre de expediente, en Archivo crean una carpeta f&iacute;sica en el cual empezar&aacute;n a incluir los documentos pertenecientes al mismo.
                                        </strong>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <table border=0 width=70% align="center" class="borde_tab">
                            <tr class="listado1">
                                <td width="33%" height="25" align="center">
                                    <center>
                                        <input name="btnConfirmar" id="btnConfirmar" type="button" onClick="confirmaExpedeinteIncluir();" class="botones_mediano" <?=$disabled?> value="Confirmar" aria-label="Confirmar inclusion en el expediente">
                                    </center>
                                </td>
                                <td width="33%" height="25">
                                    <center>
                                        <input name="cerrar" type="button" class="botones_mediano" id="envia22" onClick="opener.regresar();window.close();" value=" Cerrar " aria-label="Cerrar ventana">
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <?php
                    } else if ($_POST['numeroExpediente'] != "" && ( $expediente->existeExpediente($_POST['numeroExpediente']) === '0' )) {
                        ?>
                        <script language="JavaScript">
                            alert("Error. El nombre del Expediente en el que desea incluir este radicado \n\r no \xE9xiste en el sistema. Por favor verifique e intente de nuevo.");
                            document.getElementById('numeroExpediente').focus();
                        </script>
                        <?php
                    }
                    ?>
            </center>
        </form>
    </body>
</html>