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


/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


session_start();
/**
 * Se añadio compatibilidad con variables globales en Off
 * @autor Jairo Losada 2009-05
 * @Fundacion CorreLibre.org
 * @licencia GNU/GPL V 3
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;
include "formularioUpload.php";
?>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title> <?= $entidad_largo ?> Peticiones, Quejas, Reclamos y Felicitaciones</title>
         Meta Tags 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> CSS 
            <link rel="stylesheet" href="css/structure2.css" type="text/css" />
            <link rel="stylesheet" href="css/form.css" type="text/css" />
    </head>
    <body id="public">
        <div id="container">
            <div class="info">
                <img src="banner.jpg"  height="270px" align="center"/>
                <fieldset>
                    <h4>
                        Artículo 23 CN. "Toda persona tiene derecho a presentar peticiones respetuosas a las autoridades por motivos
                        de interés general o particular y a obtener pronta resolución"
                    </h4>
                    <div id="soliDatos" class="info" style="margin-top: 2%; margin-left: 2%;">
                        <b>FELICITACIONES: </b>Esta opción le permitirá reconocer el buen servicio recibido y/o ofrecido por parte de un 
                        funcionario o una dependencia de la Unidad Central del Valle del Cauca, Uceva. Contados 30 días hábiles después 
                        de la recepción daremos respuesta o información sobre la misma.
                        </br><a href="formularioUpload.php" target="_blank">Click aqui</a></br></br>

                        <b>SUGERENCIA: </b>Si Usted desea darnos su opinión, idea o propuesta sobre la forma como podemos mejorar un proceso
                        interno o la prestación de un servicio ingrese por esta opción. Contados 15 días hábiles después de la recepción 
                        daremos respuesta o información sobre la misma.
                        </br><a href="formularioUpload.php" target="_blank">Click aqui</a></br></br>

                        <b>SOLICITUD DE INFORMACIÓN: </b>Si Usted requiere realizar una solicitud ante un funcionario de la Unidad Central 
                        del Valle del Cauca, Uceva, con el fin de ser orientado e informado acerca de un asunto concreto o sobre las 
                        actuaciones derivadas del cumplimiento de las funciones de la misma y sus distintas dependencias, ingrese por esta 
                        opción. Contados 15 días hábiles después de la recepción daremos respuesta o información sobre la misma.
                        </br><a href="formularioUpload.php" target="_blank">Click aqui</a></br></br>

                        <b>CONSULTA: </b>Seleccione esta opción si Usted requiere realizar un requerimiento sobre temas específicos de la 
                        Unidad Central del Valle del cauca, Uceva, y que la respuesta requiera un estudio más profundo y detallado. Contados 
                        30 días hábiles después de la recepción daremos respuesta o información sobre la misma.
                        </br><a href="formularioUpload.php" target="_blank">Click aqui</a></br></br>

                        <b>RECLAMO: </b>Seleccione esta opción si Usted requiere exigir, reivindicar o demandar una solución o respuesta 
                        relacionada con la prestación indebida de un servicio propio de la Unidad Central del Valle del Cauca, Uceva o a la 
                        falta de atención de una solicitud. Contados 15 días hábiles después de la recepción daremos respuesta o información 
                        sobre la misma.
                        </br><a href="formularioUpload.php" target="_blank">Click aqui</a></br></br>

                        <b>QUEJA: </b>Seleccione esta opción si Usted requiere manifestar una protesta, censura, descontento e inconformidad 
                        por la insatisfacción que le causó la prestación del servicio de uno o varios de los funcionarios en desarrollo de sus 
                        funciones. Contados 15 días hábiles después de la recepción daremos respuesta o información sobre la misma.
                        </br><a href="formularioUpload.php" target="_blank">Click aqui</a></br></br>

                        <b>PETICIÓN DE DOCUMENTOS: </b>Si Usted necesita realizar un requerimiento con el fin de obtener copias de documentos 
                        ingrese por esta opción. Contados 10 días hábiles después de la recepción daremos respuesta o información sobre la 
                        misma.
                        </br><a href="formularioUpload.php" target="_blank">Click aqui</a></br>
                    </div>
                </fieldset>
            </div>            
        </div>
    </body>
</html>    -->
