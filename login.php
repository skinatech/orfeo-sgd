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
//by skina
$url_raiz = dirname($_SERVER['HTTP_HOST']);
$dir_raiz = dirname(__FILE__);

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

/** FORMULARIO DE LOGIN A ORFEO
 * Aqui se inicia session 
 * @PHPSESID	String	Guarda la session del usuario
 * @db 		Objeto  Objeto que guarda la conexion Abierta.
 * @iTpRad	int	Numero de tipos de Radicacion
 * @$tpNumRad   array 	Arreglo que almacena los numeros de tipos de radicacion Existentes
 * @$tpDescRad	array 	Arreglo que almacena la descripcion de tipos de radicacion Existentes
 * @$tpImgRad	array 	Arreglo que almacena los iconos de tipos de radicacion Existentes
 * @query	String	Consulta SQL a ejecutar
 * @rs		Objeto	Almacena Cursor con Consulta realizada.
 * @numRegs	int	Numero de registros de una consulta
 */
if (isset($_POST["krd"]))
    $krd = $_POST["krd"];

if (isset($_POST["drd"]))
    $drd = $_POST["drd"];

if (isset($_POST["autenticaPorLDAP"]))
    $autenticaPorLDAP = $_POST["autenticaPorLDAP"];

$fechah = date("dmy") . "_" . time  ();

$usua_nuevo = 3;
$logo = "$url_raiz/logoEntidad.png";
error_reporting(7);
include_once("config.php");
$serv = str_replace(".", ".", $_SERVER['REMOTE_ADDR']);
if ($krd) {
    include "$dir_raiz/session_orfeo.php";
    
    require_once("$dir_raiz/class_control/Mensaje.php");
//$db->conn->debug = true;
    if ($usua_nuevo == 0 && !$autenticaPorLDAP) {
        include($dir_raiz . "/contraxx.php");
        $ValidacionKrd = "NOOOO";
        if ($j = 1)
            die("<center> -- </center>");
    }
}
$krd = strtoupper($krd);
$datosEnvio = "$fechah&" . session_name() . "=" . trim(session_id()) . "&krd=$krd&swLog=1";
?>
<head>
    <title>.:: SGD Orfeo 6 ::.</title>
    <link rel="stylesheet" href=".<?= $ESTILOS_PATH2 ?>login.css">
    <link href=".<?= $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
    <!--By skinatech-->
    <link rel="shortcut icon" href="<?= $imagenes ?>/orfeolibre.ico">
    <script language="JavaScript">
        function nuevoAjax() {
            /* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
             lo que se puede copiar tal como esta aqui */
            var xmlhttp = false;
            try {
                // Creacion del objeto AJAX para navegadores no IE
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    // Creacion del objet AJAX para IE 
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                    xmlhttp = false;
                }
            }
            if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
                xmlhttp = new XMLHttpRequest();
            }

            return xmlhttp;
        }

        function getautoUser() {
            peticion = nuevoAjax();
            var url = "ingresoAutomatico.php";
            peticion.open("GET", url, true);
            peticion.onreadystatechange = function () {
                if (peticion.readyState == 4) {
                    var user = peticion.responseText;
//                    alert(user);
                    document.getElementById('krd').value = user;
                    if (user == "Error" || user == "") {
                        document.location.href = "login.php";
                    } else {
                        document.getElementById('noPass').value = 1;
                        document.form33.submit();
                    }
                }
            }
            peticion.send(null);
        }
    </script>
    <script>
        isIE = document.all;
        isNN = !document.all && document.getElementById;
        isN4 = document.layers;
        isHot = false;
        var tempX = 0;
        var tempY = 0;
        //alert(isN4);
        function ddInit(e) {
            hotDog = isIE ? event.srcElement : e.target;
            topDog = isIE ? "BODY" : "HTML";
            while (hotDog.id.indexOf("Mensaje") == -1 && hotDog.tagName != topDog) {
                hotDog = isIE ? hotDog.parentElement : hotDog.parentNode;
            }
            size = hotDog.id.length;
            capa = (hotDog.id.substring(size - 1, size)); //returns "exce"
            whichDog = isIE ? document.all.theLayer : document.getElementById("capa" + capa);
            if (hotDog.id.indexOf("Mensaje") != -1) {
                offsetx = isIE ? event.clientX : e.clientX;
                offsety = isIE ? event.clientY : e.clientY;
                nowX = parseInt(whichDog.style.left);
                nowY = parseInt(whichDog.style.top);
                ddEnabled = true;
                document.onmousemove = dd;
            }
        }

        function dd(e) {
            if (!ddEnabled)
                return;
            whichDog.style.left = isIE ? nowX + event.clientX - offsetx : nowX + e.clientX - offsetx;
            whichDog.style.top = isIE ? nowY + event.clientY - offsety : nowY + e.clientY - offsety;
            return false;
        }

        function ddN4(layer) {
            isHot = true;
            if (document.layers)
                isN4 = document.layers
            else if (document.all)
                isN4 = document.all[layer];
            else if (document.getElementById)
                isN4 = document.getElementById(layer);

            N4 = document.getElementById(layer);

            //alert (document.all);		
            if (document.all)
                alert("hay documento ");
            window.captureEvents(Event.MOUSEDOWN | Event.MOUSEUP);

            N4.onmousedown = function (e) {
                tempX = e.pageX;
                tempY = e.pageY;
            }

            isN4.onmousemove = function (e) {
                if (isHot) {
                    if (document.layers) {
                        document.layers[layer].left = e.pageX - tempX;
                    } else if (document.all) {
                        document.all[layer].style.left = e.pageX - tempX;
                    } else if (document.getElementById) {
                        document.getElementById(layer).style.left = e.pageX - tempX;
                    }
                    // Set ver 
                    if (document.layers) {
                        document.layers[layer].top = e.pageY - tempY;
                    } else if (document.all) {
                        document.all[layer].style.top = e.pageY - tempY;
                    } else if (document.getElementById) {
                        document.getElementById(layer).style.top = e.pageY - tempY
                    }

                    return false;
                }
            }
            N4.onmouseup = function () {
                // N4.releaseEvents(Event.MOUSEMOVE);
            }
        }

        function hideMe(layer) {
            if (document.layers)
                document.layers[layer].visibility = 'hide';
            else if (document.all)
                document.all[layer].style.visibility = 'hidden';
            else if (document.getElementById)
                document.getElementById(layer).style.visibility = 'hidden';
        }

        function showMe(layer) {
            if (document.layers)
                document.layers[layer].visibility = 'show';
            else if (document.all)
                document.all[layer].style.visibility = 'visible';
            else if (document.getElementById)
                document.getElementById(layer).style.visibility = 'visible';
        }

        document.onmousedown = ddInit;
        document.onmouseup = Function("ddEnabled=false");

    </script>
    <script>
        function loginTrue() {
            document.formulario.submit();
        }
        function loginCorreLibre() {
            document.CorreLibre.submit();
        }
    </script>
</head>
<body align=center onLoad='document.getElementById("krd").focus();'>	
    <form name=formulario action='./index_frames.php?fechah=<?= $datosEnvio ?>'  method=post >
        <input type="hidden" name="orno" value="1">
        <?php
        if ($ValidacionKrd == "Si") {
            ?>
            <script>
                loginTrue();
            </script>
            <?php
        }
        ?>
        <input type="hidden" name="ornot" value="1">
    </form>
    <div class="pop">
        <section id="top">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 blanco"> </div>
                <div class="col-xs-6 col-sm-6 col-md-6 rojo">
                    <img id="logoEntidad"  src="<?= $logo ?>">
                </div>
            </div>
            <div class="row">
                <div class=" col-md-6 rojo">
                    <img  src=".<?= $imagenes2 ?>sgd_negro.png" alt="">
                </div>
                <div class=" col-md-6 blanco"> </div>
            </div>
        </section>
        <section id="bot">
            <div class="cuerpo">
                <form action="login.php?fechah=<?= $fechah ?>" method="post" onSubmit="MM_validateForm('krd', '', 'R', 'drd', '', 'R'); return document.MM_returnValue" name="form33" >
                    <div class="row col-md-pull-2">
                        <div class="col-xs-5 col-sm-5 col-md-5 ">
                            <p class="boton">Usuario</p>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5">
                            <input type="text" id='krd' name="krd" size="13" maxlength="50" class="tex_area"title="Digite su usuario para ingresar" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5 col-sm-5 col-md-5">
                            <p class="boton">Contrase&ntilde;a</p>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5">
                            <input type=password id="drd" name="drd" size="13" maxlength="20" class="tex_area" title="Digite la contraseña del usuario">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 col-sm-8 col-md-8" style="text-align:center;">
                            <input type=hidden name=tipo_carp value=0>
                            <input type=hidden name=carpeta value=0>
                            <input type=hidden name=order value='radi_nume_radi'>
                            <!--<input type="hidden" name="noPass" id="noPass">--> 
                            <br>
                            <input id="btn_frmlog_sub" name="Submit" type="submit" class="botones" value="Ingresar" data-toggle="modal" data-target="#myModal" >
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
