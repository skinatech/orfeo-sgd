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


include_once "class_control/AplIntegrada.php";
$objApl = new AplIntegrada($db);
$lkGenerico = "&usuario=$krd&nsesion=" . trim(session_id()) . "&nro=$verradicado" . "$datos_envio";
?>
<script src="js/popcalendar.js"></script>
<script>
    function regresar()
    {	//window.history.go(0);
        window.location.reload();
    }
</script>
<div id="loadFile" class="panel panel-default" >
    <div class="alertDoc">
        <div class="textMessageModalDoc"></div>
    </div>
    <iframe class="iframeclasss" id='mainFrames' name="mainFrames" frameborder="0" style="width:100%; height:375px;" frameborder="0"></iframe>
</div>
<!--<iframe class="iframeclasss" id='mainFrames' name="mainFrames" src='<?= $pathradicados ?>' frameborder="0" onload="frameLoad(this)" style="width:100%; height:375px;" frameborder="0"></iframe>-->
<script type="text/javascript">

    $(function () {
        var variable_post = document.getElementById('verrad').value;
        $('.textMessageModalDoc').text('Cargando...');
        
        $.post('buscaRutaArchivoPrincipal.php', {
            tipo: 1, //Documentos clientes
            id: variable_post
        })
        .done(function (res) {
            if (res.status) {
                if (res.mostrar == true) {
                    loadPdf(res.token);
                    $('.alertDoc').hide();
                } else {
                    var rawss = window.atob(res.extencion);
                    document.getElementById('mainFrames').setAttribute('src', rawss);
                }
            } else {
                $('.textMessageModalDoc').text(res.message);
                $('.alertDoc').show();
            }
        });
    });

    function convertDataURIToBinary(base64) {
        var raw = window.atob(base64);
        var rawLength = raw.length;
        var array = new Uint8Array(new ArrayBuffer(rawLength));

        for (var i = 0; i < rawLength; i++) {
            array[i] = raw.charCodeAt(i);
        }
        return array;
    }

    function loadPdf(base64Document) {
        var pdfAsDataUri = base64Document;
        var pdfAsArray = convertDataURIToBinary(pdfAsDataUri);
        var url = 'pdfjs/web/viewer.php?file=';

        var binaryData = [];
        binaryData.push(pdfAsArray);
        var dataPdf = window.URL.createObjectURL(new Blob(binaryData, {type: "application/pdf"}))
        document.getElementById('mainFrames').setAttribute('src', url + encodeURIComponent(dataPdf));

    }
</script>