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
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
session_start();
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];
$longitud_codigo_dependencia = $_SESSION['largoDependencia'];

/***
Skinatech
Autor: Andrés Mosquera
Fecha: 06-11-2018
Información: Se traslada la variable a esta línea de codigo para que sea tomada por todos los archivos que la requieren
***/
$varBuscada = "radi_nume_salida";
/***
Skinatech
Autor: Andrés Mosquera
Fecha: 06-11-2018
Información: Fin Se traslada la variable a esta línea de codigo para que sea tomada por todos los archivos que la requieren
***/

/* ---------------------------------------------------------+
  |                     INCLUDES                             |
  +--------------------------------------------------------- */
include "$url_raiz/envios/paBuscar.php";
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
/**
 * Modificacion para aceptar Variables GLobales
 * @autor Jairo Losada 
 * @fecha 2009/05
 */
$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];

/*
 * Lista Envios normales 
 * @autor Jairo Losada
 * @fecha 2009/06 Modificacion Variables Globales. Arreglo cambio de los request Gracias a recomendacion de Hollman Ladino
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;
if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";

//if (!$dependencia)   include "$ruta_raiz/rec_session.php";
if (!$dep_sel)
    $dep_sel = $dependencia;

define('ADODB_ASSOC_CASE', $assoc);

// By Skinatech - 14/08/2018
// Para la construcción del número de radicado, esto indica la parte inicial del radicado.
if ($estructuraRad == 'ymd') {
    $num = 8;
} elseif ($estructuraRad == 'ym') {
    $num = 6;
} else {
    $num = 4;
}
?>
<html>
    <head>
        <title>Envio de Documentos. Orfeo...</title>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="<?= $url_raiz ?>/estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?= $url_raiz ?>/estilos/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body bgcolor="#FFFFFF" topmargin="0">
        <div id="spiffycalendar" class="text"></div>
        <link rel="stylesheet" type="text/css" href="../js/spiffyCal/spiffyCal_v2_1.css">
        <?php
// Modificado SGD 14-Septiembre-2007
        include_once "$dir_raiz/include/db/ConnectionHandler.php";
        $db = new ConnectionHandler("$dir_raiz");
//        $db->conn->debug = true;
        if (!$carpeta)
            $carpeta = 0;
        if (!$estado_sal) {
            $estado_sal = 2;
        }
        if (!$estado_sal_max)
            $estado_sal_max = 3;
        /***
        Autor: Jenny Gamez
        Fecha: 2019-09-05
        Info: Actualización del estado del radicado ya que cuando se hacia la busqueda de un radicado directamente
              en envios/normal mediante la validación se quitaba el boton de realizar el envio final
        ***/
        $accion_sal = "Env&iacute;o de Documentos";
        $pagina_sig = "cuerpoEnvioNormal.php";
        $nomcarpeta = "Radicados Para Envio";

        if ($estado_sal == 3) {    
            if (!$dep_sel)
                $dep_sel = $dependencia;

            $dependencia_busq1 = " and c.radi_depe_radi = '$dep_sel' ";
            $dependencia_busq2 = " and c.radi_depe_radi = '$dep_sel'";
        }
        /***
        Autor: Jenny Gamez
        Fecha: 2019-09-05
        Info: Fin
        ***/

        if ($orden_cambio == 1) {
            if (!$orderTipo) {
                $orderTipo = "desc";
            } else {
                $orderTipo = "";
            }
        }
        $encabezado = "" . session_name() . "=" . session_id() . "&estado_sal=$estado_sal&estado_sal_max=$estado_sal_max&accion_sal=$accion_sal&dependencia_busq2=$dependencia_busq2&dep_sel=$dep_sel&filtroSelect=$filtroSelect&tpAnulacion=$tpAnulacion&nomcarpeta=$nomcarpeta&orderTipo=$orderTipo&orderNo=";
        $linkPagina = "$PHP_SELF?$encabezado&orderNo=$orderNo";
        $swBusqDep = "si";
        $carpeta = "nada";
        $swListar = "Si";

        include "$url_raiz/envios/paEncabeza.php";
        $pagina_actual = "../envios/cuerpoEnvioNormal.php";

        $pagina_sig = "../envios/envia.php";
        include "$dir_raiz/envios/paOpciones.php";
//        $db->conn->debug =true;
        /*  GENERACION LISTADO DE RADICADOS
         *  Aqui utilizamos la clase adodb para generar el listado de los radicados
         *  Esta clase cuenta con una adaptacion a las clases utiilzadas de orfeo.
         *  el archivo original es adodb-pager.inc.php la modificada es adodb-paginacion.inc.php
         */
        ?>
        <form name=formEnviar action='../envios/envia.php?<?= $encabezado ?>' method=GET>
            <!--
            Skinatech
            Autor: Andrés Mosquera
            Fecha: 17-10-2018
            Información: Inputs creados para no perder el valor de las variables y funcione el devolver a listado
            -->
            <input type="hidden" value="<?= $_GET['estado_sal'] ?>" name="estado_sal" />
            <input type="hidden" value="<?= $_GET['estado_sal_max'] ?>" name="estado_sal_max" />
            <input type="hidden" value="<?= $_GET['krd'] ?>" name="krd" />
            <input type="hidden" value="<?= $_GET['nomcarpeta'] ?>" name="nomcarpeta" />
            <!--
            Skinatech
            Autor: Andrés Mosquera
            Fecha: 17-10-2018
            Información: Fin Inputs creados para no perder el valor de las variables y funcione el devolver a listado
            -->

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
                    $orderNo = 3;
                    $orderTipo = "desc";
                }
                $order = $orderNo + 1;
            }
            $radiPath = $db->conn->Concat($db->conn->substr . "(a.anex_codigo,1,4) ", "'/'", $db->conn->substr . "(a.anex_codigo,".$num.",".$longitud_codigo_dependencia.") ", "'/docs/'", "a.anex_nomb_archivo");

            include "$dir_raiz/include/query/envios/queryCuerpoEnvioNormal.php";
            $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
//            $db->conn->debug=true;
//            $rs = $db->conn->Execute($isql);
//            echo '************************ ' . $isql;            
            if ($rs->EOF) {
                echo "<table class=borde_tab width='100%'><tr><td class=titulosError><center>NO se encontro nada con el criterio de busqueda</center></td></tr></table>";
            } else {
                $pager = new ADODB_Pager($db, $isql, 'adodb', true, $orderNo, $orderTipo, "..");
                $pager->checkAll = false;
                $pager->checkTitulo = true;
                $pager->toRefLinks = $linkPagina;
                $pager->toRefVars = $encabezado;
                $pager->Render($rows_per_page = 15, $linkPagina, $checkbox = chkEnviar);
            }

            ?>
        </form>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>
