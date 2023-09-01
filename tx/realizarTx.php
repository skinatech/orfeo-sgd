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
$dependenciaSalida = $_SESSION["dependenciaSalida"];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$depe_nomb = $_SESSION["depe_nomb"];
$usua_nomb = $_SESSION["usua_nomb"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];


if (!isset($_SESSION['dependencia']) or ! isset($_SESSION['nivelus']))
    include "$dir_raiz/rec_session.php";
/*  REALIZAR TRANSACCIONES
 *  Este archivo realiza las transacciones de radicados en Orfeo.
 */
?>
<html>
    <head>
        <title>Realizar Transaccion - Orfeo </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>
    <?php
    /**
     * Inclusion de archivos para utiizar la libreria ADODB
     *
     */
    include_once "$dir_raiz/include/db/ConnectionHandler.php";
    $db = new ConnectionHandler("$dir_raiz");
    /*
     * Genreamos el encabezado que envia las variable a la paginas siguientes.
     * Por problemas en las sesiones enviamos el usuario.
     * @$encabezado  Incluye las variables que deben enviarse a la singuiente pagina.
     * @$linkPagina  Link en caso de recarga de esta pagina.
     */
    $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&depeBuscada=$depeBuscada&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion";

    /*  FILTRO DE DATOS
     *  @$setFiltroSelect  Contiene los valores digitados por el usuario separados por coma.
     *  @$filtroSelect Si SetfiltoSelect contiene algunvalor la siguiente rutina realiza el arreglo de la condici� para la consulta a la base de datos y lo almacena en whereFiltro.
     *  @$whereFiltro  Si filtroSelect trae valor la rutina del where para este filtro es almacenado aqui.
     *
     */
    if ($checkValue) {
        $num = count($checkValue);        
        $i = 0;
        while ($i < $num) {
            $record_id = key($checkValue);
            
            $setFiltroSelect .= "'" . $record_id . "'";
            $radicadosSel[] = "'" . $record_id . "'";
            
            if ($i <= ($num - 2)) {
                $setFiltroSelect .= ",";
            }
            next($checkValue);
            $i++;
        }
        if ($radicadosSel) {
            $whereFiltro = " and b.radi_nume_radi in($setFiltroSelect)";
        }
    }
    if ($setFiltroSelect) {
        $filtroSelect = $setFiltroSelect;
    }
    ?>
    <body>
        <?php
        $txSql = "";
        if ($chkNivel and $codusuario == 1) {
            $tomarNivel = "si";
        } else {
            $tomarNivel = "no";
        }
        include "$dir_raiz/include/tx/Tx.php";
	    // echo '<pre>';
        // $db->conn->debug=true;
        $rs = new Tx($db);

        // include("$dir_raiz/class_control/Param_admin.php");
        // $param = Param_admin::getObject($db, '%', 'ALERT_FUNCTION');

        switch ($codTx) {
            case 7:
                $nombTx = "Borrar Informados";
                $observa = "($krd) $observa";
                $radicadosSel = $rs->borrarInformado($radicadosSel, $krd, $depsel8, $_SESSION['dependencia'], $_SESSION['codusuario'], $codusuario, $observa);
                break;
            case 8: {
                    if (is_array($_GET['usCodSelect'])){ 
                        reset($_GET['usCodSelect']);
                        foreach ($_GET['usCodSelect'] as $var) {
                            $depsel8 = preg_split('/[\s-]+/', $var);
                            $usCodSelect = $depsel8[1];
                            $depsel8 = $depsel8[0];

                            $nombTx = "Informar Documentos";
                            $usCodDestino = $rs->informar($radicadosSel, $krd, $depsel8, $_SESSION['dependencia'], $usCodSelect, $_SESSION['codusuario'], $observa, $_SESSION['usua_doc']) . ", ";

                            $usCodDestino = substr($usCodDestino, 0, strlen(trim($usCodDestino)) - 1);
                            //Modificacion skina para enviar email de notificacion
                            $radicadosSel1 = $nurad;
                            if (!strpos($usCodDestino, ','))
                                $usCodDestino = $usCodDestino;
                            $usuariosInfromados .= ','.$usCodDestino;
                        }
                        echo "<script>window.open(\"../radicacion/mailInformar.php?dependencia=$depsel8&usunom=$usuariosInfromados&verrad=&radi_nume=$radicadosSel1&asunto=$observa&tx=Informado&codusu=$usCodSelect\", 'Modificacion_de_Datos', 'height=300,width=350,scrollbars=yes');</script>"; 
                    }
                }
                break;
            case 9:
                $depsel = preg_split('/[\s-]+/', $usCodSelect);
                $usCodSelect = $depsel[1];
                $depsel = $depsel[0];
                if ($EnviaraV == "VoBo") {
                    $codTx = 16;
                    $carp_codi = 11;

                } else {
                    $codTx = 9;
                    $carp_codi = 0;
                }
                $nombTx = "Reasignar Documentos ";
                $usCodDestino = $rs->reasignar($radicadosSel, $krd, $depsel, $dependencia, $usCodSelect, $codusuario, $tomarNivel, $observa, $codTx, $carp_codi);
                //Modificacion skina para enviar email de notificacion
                $radicadosSel1 = join(",", $radicadosSel);
                echo "<script>window.open(\"../radicacion/mail.php?dependencia=$dependencia&usunom=$usCodDestino&radi_nume=$radicadosSel1&asunto=$observa&tx=Reasignado\", 'Modificacion_de_Datos', 'height=300,width=350,scrollbars=yes');</script>";

                break;
            case 10:
                $nombTx = "Movimiento a Carpeta $carpetaNombre";
//                error_log('***************** realizarTx ' . $radicadosSel . ',' . $krd . ',' . $carpetaCodigo . ',' . $carpetaTipo . ',' . $tomarNivel . ',' . $observa);
                $okTx = $rs->cambioCarpeta($radicadosSel, $krd, $carpetaCodigo, $carpetaTipo, $tomarNivel, $observa);
                $depSel = $dependencia;
                $usCodSelect = $codusuario;
                $usCodDestino = $usua_nomb;
                break;
            case 12:
                $nombTx = "Devolucion de Documentos";
                $usCodDestino = $rs->devolver($radicadosSel, $krd, $dependencia, $codusuario, $tomarNivel, $observa);
                //Modificacion skina para enviar email de notificacion
                $radicadosSel1 = join(",", $radicadosSel);
                echo "<script>window.open(\"../radicacion/mail.php?dependencia=$dependencia&codusu=$codusuario&radi_nume=$radicadosSel1&asunto=$observa&tx=Devuelto&usunom=$usCodDestino\", 'Modificacion_de_Datos', 'height=300,width=350,scrollbars=yes');</script>";
                break;
            case 13:
                $nombTx = "Archivo de Documentos";
                $txSql = $rs->archivar($radicadosSel, $krd, $dependencia, $codusuario, $observa,$dependenciaSalida);
                break;
            case 14:
                $nombTx = "Agendar Documentos";
                //$usCodDestino = $usua_nomb;
                $txSql = $rs->agendar($radicadosSel, $krd, $dependencia, $codusuario, $observa, $fechaAgenda);
                break;
            case 15:
                $nombTx = "Sacar de Agendar Documentos'";
                $txSql = $rs->noAgendar($radicadosSel, $krd, $dependencia, $codusuario, $observa);
                //$usCodDestino = $usua_nomb;
                break;
            case 16:
                $nombTx = "Radicados NRR";
                $txSql = $rs->nrr($radicadosSel, $krd, $dependencia, $codusuario, $observa, $dependenciaSalida);
                //$usCodDestino = $txSql;
                break;
            // by skina para TRD y Expediente multiple
            case 61:
                $nombTx = "TRD Multiple";
                $txSql = $rs->trdm($radicadosSel, $krd, $dependencia, $codusuario, $observa);
                //$usCodDestino = $usua_nomb;
                break;
            case 62:
                $nombTx = "EXP Multiple";
                $txSql = $rs->expm($radicadosSel, $krd, $dependencia, $codusuario, $observa, $numExpHidden);
                
                //$usCodDestino = $usua_nomb;
                break;
        }
        if ($okTx == -1)
            $okTxDesc = " No ";
        ?>
        <form action='enviardatos.php?PHPSESSID=172o16o0o154oJH&krd=JH' method=post name=formulario>
            <br>
            <center>
                <div id="titulo" style="width: 40%;" align="center">Acci&oacute;n requerida <?= $accionCompletada ?>  <?= $okTxDesc ?> Completada <?= $causaAccion ?> </div>
                <table border=1 cellspace=2 cellpad=2 WIDTH=40%  class="t_bordeGris" id=tb_general>
<!--                    <tr>
                        <td colspan="2" class="titulos4">Accion requerida <?= $accionCompletada ?>  <?= $okTxDesc ?> Completada <?= $causaAccion ?> </td>
                    </tr>-->
                    <tr>
                        <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Acci&oacute;n requerida :
                        </td>
                        <td  width="65%" height="25" class="listado2">
                            &nbsp;<?= $nombTx ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Radicados involucrados :
                        </td>
                        <td  width="65%" height="25" class="listado2">
                            &nbsp;<?= join("<BR> ", $radicadosSel) ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Usuario destino :
                        </td>
                        <td  width="65%" height="25" class="listado2">
                            &nbsp;<?= $usCodDestino ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Fecha y hora :
                        </td>
                        <td  width="65%" height="25" class="listado2">
                            &nbsp;<?= date("m-d-Y  H:i:s") ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Usuario origen :
                        </td>
                        <td  width="65%" height="25" class="listado2">
                            &nbsp;<?= $usua_nomb ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" bgcolor="#CCCCCC" height="25" class="titulos2">Dependencia origen :
                        </td>
                        <td  width="65%" height="25" class="listado2">
                            &nbsp;<?= $depe_nomb ?>
                        </td>
                    </tr>
                </table>
            </center>
        </form>
    </body>
</html>
