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
$dependencia = $_GET['dependencia'];
$usuLogin = $_GET['usuLogin'];
$nombre = $_GET['nombre'];
$usuDocSel = $_GET['usuDocSel'];
$usuLoginSel = $_GET['usuDocSel'];
$dep_sel = $_GET['dep_sel'];

if (!$_SESSION['dependencia'])
    include "../../rec_session.php";
?>

<html>
    <head>
        <?$url_raiz="../.."?>      
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    </head>
    <body bgcolor="#FFFFFF" topmargin="0" onLoad="window_onload();">

        <?php
        $dir_raiz = "../..";
        include_once "$dir_raiz/include/db/ConnectionHandler.php";
        $db = new ConnectionHandler("$dir_raiz");
        $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

        $nomcarpeta = "Consulta Historico";

        if ($orden_cambio == 1) {
            if (!$orderTipo) {
                $orderTipo = "desc";
            } else {
                $orderTipo = "";
            }
        }

        $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&pagina_sig=$pagina_sig&usuLogin=$usuLogin&nombre=$nombre&dependencia=$dependencia&dep_sel=$dep_sel&selecdoc=$selecdoc&nomcarpeta=$nomcarpeta&orderTipo=$orderTipo&orderNo=";
        $linkPagina = "$PHP_SELF?$encabezado&usuLogin=$usuLogin&nomcarpeta=$nomcarpeta&orderTipo=$orderTipo&orderNo=$orderNo";
        error_reporting(0);
        ?>
        <br>
    <center>
        <div id="titulo" style="width: 99%;" align="center"> Historial de actualizaciones al usuario
        </div>
    </center>
    <table align="center" border=1 width=99% class='borde_tab'>
        <tr class="listado1">
            <td align="left"  width="20%">
                <b>Datos Historicos</b>
            </td>
            <td align="left" width="40%">
                <b>Usuario:</b> <?= $usuLogin ?>
            </td>
            <td align="left" width="40%">
                <b>Nombre:</b> <?= $_POST['nombre']; ?>
            </td>
        </tr>
    </table>
    <form name=formHistorico action='consultaHistorico.php?<?= $encabezado ?>' method=POST>
        <?php
        if ($orderNo == 98 or $orderNo == 99) {
            $order = 1;
            if ($orderNo == 98)
                $orderTipo = "desc";

            if ($orderNo == 99)
                $orderTipo = "";
        }
        else {
            if (!$orderNo) {
                $orderNo = 0;
            }
            $order = $orderNo + 1;
        }
        //  $sqlChar = $db->conn->SQLDate("d-m-Y H:i A","SGD_RENV_FECH");
        include "../../include/query/administracion/queryConsultaHistorico.php";

        //  $db->conn->debug = true;
        //      problemas con la organizacion de las tablas es probable que sea por la forma en la que se envia la consulta
        $rs = $db->conn->Execute($isql);
        $nregis = $rs->fields["ADMINISTRADOR"];

        if (!$nregis) {
            echo "<hr><center><b>NO se encontro nada con el criterio de busqueda</center></b></hr>";
        } else {
            $pager = new ADODB_Pager($db, $isql, 'adodb', true, $orderNo, $orderTipo, '../..');
            $pager->toRefLinks = $linkPagina;
            $pager->toRefVars = $encabezado;
            $pager->Render($rows_per_page = 15, $linkPagina, $checkbox = $chkEnviar);
        }
        $encabezado = "" . session_name() . "=" . session_id() . "&krd=$krd&pagina_sig=$pagina_sig&usuLogin=$usuLogin&dependencia=$dependencia&dep_sel=$dep_sel&selecdoc=$selecdoc&nomcarpeta=$nomcarpeta&orderTipo=$orderTipo&orderNo=";
        ?>

    </form>
</body>

</html>