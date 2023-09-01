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

/*---------------------------------------------------------+
|                     INCLUDES                             |
+---------------------------------------------------------*/

/*---------------------------------------------------------+
|                    DEFINICIONES                          |
+---------------------------------------------------------*/
session_start();
error_reporting(7);
$url_raiz="..";
$dir_raiz=$_SESSION['dir_raiz'];
$ESTILOS_PATH2 =$_SESSION['ESTILOS_PATH2'];
$dependenciaSalida = $_SESSION["dependenciaSalida"];
$mostrarListados = $_SESSION["mostrarListados"];
/*---------------------------------------------------------+
|                       MAIN                               |
+---------------------------------------------------------*/

if (!$dir_raiz)$dir_raiz="..";
require_once("$dir_raiz/include/db/ConnectionHandler.php");
include_once "../class_control/AplIntegrada.php";
if (!$db) $db = new ConnectionHandler("$dir_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_NUM);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

foreach ($_GET as $key => $valor)   ${$key} = $valor;
foreach ($_POST as $key => $valor)   ${$key} = $valor;

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tpNumRad = $_SESSION["tpNumRad"];
$tpPerRad = $_SESSION["tpPerRad"];
$tpDescRad = $_SESSION["tpDescRad"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3img = $_SESSION["tip3img"];
$tpDepeRad = $_SESSION["tpDepeRad"];
$tip3desc = $_SESSION["tip3desc"];
$tipoRadicadoPqr = $_SESSION["tipoRadicadoPqr"];
$estructuraRad = $_SESSION['estructuraRad'];
$longitud_codigo_dependencia = $_SESSION["largoDependencia"];
$rol = $_SESSION['rol'];
$usua_nomb = $_SESSION["usua_nomb"];
$usua_select = $_POST['usua_select'];

//by skinatech
//if(!$birds22) $birds22=0;

/*
 * Variables de Session de Radicacion de Mails
 * Estas son variables que traen los valores con radicacoin de un correo Electronico
 *
 * @autor Orlando Burgos
 * @version Orfeo 3.7
 * @año 2008
 */

$tipoMedio = $_GET['tipoMedio'];

/**  Fin variables de session de Radicacion de Mail. **/
if(!isset($_SESSION['dependencia']) and !isset($_SESSION['cod_local'])) include "../rec_session.php";
// Modificado SGD 21-Septiembre-2007
//$db->conn->debug = false;
include "crea_combos_universales.php";
$objApl = new AplIntegrada($db);
if($nurad){
    $nurad=trim($nurad);
    $ent = substr($nurad,-1);
}

$no_tipo = "true";
$imgTp1 = str_replace(".jpg", "",$tip3img[1][$ent]);
$imgTp2 = str_replace(".jpg", "",$tip3img[2][$ent]);
$imgTp3 = str_replace(".jpg", "",$tip3img[3][$ent]);
$descTp1 = "alt='".$tip3desc[1][$ent]."' title='".$tip3desc[1][$ent]."'";
$descTp2 = "alt='".$tip3desc[2][$ent]."' title='".$tip3desc[2][$ent]."'";
$descTp3 = "alt='".$tip3desc[3][$ent]."' title='".$tip3desc[3][$ent]."'";
$nombreTp1 = $tip3Nombre[1][$ent];
$nombreTp2 = $tip3Nombre[2][$ent];
$nombreTp3 = $tip3Nombre[3][$ent];

?>

<HTML>
    <head>
        <title>.:: Orfeo Modulo de Radicaci&acuoteo;n::.</title>
        <meta charset="utf-8">
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
            .ui-autocomplete { height: 200px; width: 200px; overflow-y: scroll; overflow-x: hidden;}
        </style>

        <meta http-equiv="expires" content="99999999999">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" href="../estilos/tabber.css" TYPE="text/css" MEDIA="screen">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">

        <script Language="JavaScript" src="../js/crea_combos_2.js"></script>
        <script type="text/javascript" src="../js/tabber.js"></script>

        <script type="text/javascript"> 
            //by skinatech
            $(function() {
                var cache = {},
                lastXhr;
                $( "#birds" ).autocomplete({
                    minLength: 3, 
                    select: seleccion,
                    source: function( request, response ) {
                        var term = request.term;
                        if ( term in cache ) {
                            response( cache[ term ] );
                            return;
                        }

                        lastXhr = $.getJSON( "search.php", request, function( data, status, xhr ) {
                            cache[ term ] = data;
                            if ( xhr === lastXhr ) {
                                // console.log(data);
                                // console.log("search");
                            response( data );
                            }
                        });
                    }
                });

                /***
                 * Autor: Jenny Gamez
                 * Fecha: 02-12-2020
                 * Info: Esta función permite cambiar la fecha de vencimiento si los días de termino se cambian manualmente, ya que por defecto se muestran los días del eje tematico.
                 *****/
                $('#birds2').on('change', function() {
                    type = document.formulario.birds2.value;
                    // Dias de termino defecto
                    $.ajax({
                        data: "dias="+type+"&option=2",
                        type: "GET",
                        dataType: "json",  
                        url: "search4.php",
                        success: function(data){
                            document.formulario.fechavencimientorad.value = data.FECHA_VENCIMIENTO;                
                        }
                    });
                });
            });

            function seleccion(event, ui) {
                var  producto;  
                // recupera la informacion del producto seleccionado  
                producto = ui.item.value;
            
                //  funcion en ajax  para traer  los datos  del  ciudadano seleccionado
                $.ajax({
                    data: "producto="+encodeURIComponent(producto)+"", //parametro a enviar para obtenerlo en search2.php
                    type: "GET",
                    dataType: "json",  
                    url: "search2.php",
                    success: function(data){
                    restults(data);
                    }
                }); 
            }

            function restults(data){

                document.formulario.nombre_us1.value      = data.NOM;
                document.formulario.documento_us1.value   = data.DOCUMENTO;
                document.formulario.prim_apel_us1.value   = data.APELL1;
                // document.formulario.seg_apel_us1.value    = data.APELL2;
                document.formulario.telefono_us1.value    = data.TELEFONO;      
                document.formulario.mail_us1.value        = data.MAIL;  
                document.formulario.direccion_us1.value   = data.DIRECCION;
                document.formulario.tipo_emp_us1.value    = data.TIPO_EMPRESA;
                document.formulario.cc_documento_us1.value= data.CC_DOCUMENTO;
                document.formulario.idcont1.value         = data.CONT;
                //document.formulario.sgd_ciu_eps.value     = data.SGD_CIU_EPS;
                //Modificacion skina - Asignacion correcta de valores a combos de un¿bicacion geografica
                //Ing Camilo Pintor - cpintor@skinatech.com
                //Julio 2015
                cambia(formulario, 'idpais1', 'idcont1');
                document.formulario.idpais1.value         =data.PAIS;
                cambia(formulario, 'codep_us1', 'idpais1');
                document.formulario.codep_us1.value       =data.DPTO;
                cambia(formulario, 'muni_us1', 'codep_us1');
                document.formulario.muni_us1.value        =data.MUNI;
                //Fin Modificacion skina - Asignacion correcta de valores a combos de un¿bicacion geografica 
            }

            function recargar2(){
                var variable_post=document.formulario.coddepe.value;
                //console.log(variable_post);
                //var variable_post="Mi texto recargado";
                $.post("miscript.php", { variable: variable_post }, function(data){
                    $("#recargado").html(data);
                });
            }

            /* Carga el listado de usuarioa a copiar, mientras se seleccionen dependencias*/
            function cargarusuariocopiar(){
                var str = "";
                $( "#coddepeinf option:selected" ).each(function() {
                    str += $(this).val() + "','";
                });

                $.ajax({
                    data: "dependencias="+str+"",
                    type: "POST",
                    url: "searchsGeneral.php",
                    success: function(data){
                    $("#usCodSelect").html(data);
                    }
                });
            }

            /* Habilita el campo para ingresar el numero de radicado que ya se habia generado desde el pre-radicado*/
            function checkradicado(){
                if( $('#radicadoexiste').prop('checked') ) {
                    $("#divradicado").css("display", "block");
                }else{
                    $("#divradicado").css("display", "none");
                }
            }

            /* Valida si el radicado ya existe en el pre-radicado, y si esta disponible para ser utilizado */
            function validaRadicado(){
                type = document.formulario.radinume.value;
                $.ajax({
                    data: "radinume="+type+"",
                    type: "POST",
                    dataType: "json",  
                    url: "searchsGeneral.php",
                    success: function(data){
                    if (data.REMITENTE != ""){
                            alert("El numero de radicado "+type +" ya esta asociado a "+data.REMITENTE);
                            document.formulario.radinume.value = '';
                            document.formulario.radinume.focus();
                    }
                    }
                });
            }
        </script>

        <!--Script desarrollado para halar suscriptores ESP (Empopasto) -->
        <script languaje="JavaScript">

            function findSubscr(subscriber){
                $.ajax({
                    data: "subscriber="+subscriber+"", //parametro enviado a search3.php
                    type: "GET",
                    dataType: "json",  
                    url: "search3.php",
                    success: function(data){
                        if (data.NOM != " "){
                    results(data);
                    }else{
                            alert("Codigo de identificación no encontrado");
                            //Limpieza del formulario para evitar confusion
                            results(data);
                    }
                    }
                });
            }

            function findSubscr2(subscriber) {
                $.ajax({
                    data: "subscriber="+subscriber+"", //parametro enviado a search3.php
                    type: "GET",
                    dataType: "json",  
                    url: "search5.php",
                    success: function(data){
                    if (data.NOM != " "){
                        results(data);
                    }else{
                        alert("Codigo de suscriptor no encontrado");
                        //Limpieza del formulario para evitar confusion
                        results(data);
                    }
                    }
                });
            }

            function results(data){
                document.formulario.nombre_us1.value      = data.NOM;
                document.formulario.documento_us1.value   = data.DOCUMENTO;
                document.formulario.prim_apel_us1.value   = data.APELL1;
                document.formulario.seg_apel_us1.value    = data.APELL2;
                document.formulario.telefono_us1.value    = data.TELEFONO;      
                document.formulario.mail_us1.value        = data.MAIL;  
                document.formulario.direccion_us1.value   = data.DIRECCION;
                document.formulario.tipo_emp_us1.value    = data.TIPO_EMPRESA;
                document.formulario.cc_documento_us1.value= data.CC_DOCUMENTO;
                //document.formulario.sgd_ciu_eps.value         = data.SGD_CIU_EPS;

                //Modificacion skina - Asignacion correcta de valores a combos de un¿bicacion geografica
                //Ing Camilo Pintor - cpintor@skinatech.com
                //Julio 2015
                document.formulario.idcont1.value         =data.CONT;
                cambia(formulario, 'idpais1', 'idcont1');
                document.formulario.idpais1.value         =data.PAIS;
                cambia(formulario, 'codep_us1', 'idpais1');
                document.formulario.codep_us1.value       =data.DPTO;
                cambia(formulario, 'muni_us1', 'codep_us1');
                document.formulario.muni_us1.value        =data.MUNI;
                //Fin Modificacion skina - Asignacion correcta de valores a combos de un¿bicacion geografica
            }
        </script>

        <!--Script desarrollado para modificar dias de termino defecto (Empopasto) -->
        <script languaje="JavaScript">

            function typeDoc(){
                type = document.formulario.tdoc.value;
                // Dias de termino defecto
                $.ajax({
                    data: "tipoDoc="+type+"", //parametro enviado a search4.php
                    type: "GET",
                    dataType: "json",  
                    url: "search4.php",
                    success: function(data){
                    if (data.DIAS != ""){
                        document.formulario.birds2.value = data.DIAS;
                        document.formulario.fechavencimientorad.value = data.FECHA_VENCIMIENTO;
                    }else{
                        alert("Tipo documental mal parametrizado");
                        //Limpieza del formulario para evitar confusion
                    }
                    }
                });
            }

            function isNumberKey2(evt){
                var charCode = (evt.which) ? evt.which : event.keyCode

                if (charCode == 13) alert("El campo dias de termino no puede estar vacio");
                        
                if (charCode > 31 && (charCode < 48 || charCode > 57))  return false;

                return true;
            } 
            
            function isTextKeyradicado(evt){
                var charCode = (evt.which) ? evt.which : event.keyCode;                       
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
            return true;
            }
            
            function isTextKey3(evt){
                var charCode = (evt.which) ? evt.which : event.keyCode;                       
                if (charCode > 32 && (charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90) && (charCode < 48 || charCode > 57) && charCode != 31){
                    return false;
                }
            return true;
            }

        </script>

        <script language="JavaScript">
            document.write('<style type="text/css">.tabber{display:none;}<\/style>');
            <?php
            // Convertimos los vectores de los paises, dptos y municipios creados en crea_combos_universales.php a vectores en JavaScript.
            echo arrayToJsArray($vpaisesv, 'vp');
            echo arrayToJsArray($vdptosv, 'vd');
            echo arrayToJsArray($vmcposv, 'vm');
            ?>

            function cambIntgAp(valor){
                fecha_hoy =  '<?=date('d')."-".date('m')."-".date('Y')?>';

                if (valor!=0){
                    if  (document.formulario.fecha_gen_doc.value.length==0)
                        document.formulario.fecha_gen_doc.value=fecha_hoy;
                } else
                    document.formulario.fecha_gen_doc.value="";
            }

            function fechf(formulario,n){
                var fechaActual = new Date();
                fecha_doc = document.formulario.fecha_gen_doc.value;
                dias_doc=fecha_doc.substring(0,2);
                mes_doc=fecha_doc.substring(3,5);
                ano_doc=fecha_doc.substring(6,10);
                var fecha = new Date(ano_doc,mes_doc-1, dias_doc);
                var tiempoRestante = fechaActual.getTime() - fecha.getTime();
                var dias = Math.floor(tiempoRestante / (1000 * 60 * 60 * 24));
                
                if (dias >60 && dias < 1500){
                    alert("El documento tiene fecha anterior a 60 dias!!");
                }
                else {
                if (dias > 1500){
                            alert("Verifique la fecha del documento!!");
                            fecha_doc = "";
                    }else {
                        fecha_doc = "ok";
                        if (dias < 0) {
                            alert("Verifique la fecha del documento !!, es Una fecha Superior a la Del dia de Hoy");
                            fecha_doc = "asdfa";
                        }
                    }
                }
                return fecha_doc;
            }

            function radicar_doc(){
            //if(fechf ("formulario",16)=="ok"){

                if( document.formulario.documento_us1.value == 0 || document.formulario.documento_us1.value == '' ){
                alert("El n\u00FAmero de identificaci\u00F3n es obligatorio.");
                document.formulario.cc_documento_us1.focus();
                return false;
                }

                if( document.formulario.direccion_us1.value == 0 || document.formulario.direccion_us1.value == '' ){
                alert("La direcci\u00F3n es obligatoria.");
                document.formulario.direccion_us1.focus();
                return false;
                }

                if( document.formulario.asu.value == '' ){
                alert("El asunto es obligatorio.");
                document.formulario.asu.focus();
                return false;
                }

                if( document.formulario.muni_us1.value == 0 || document.formulario.muni_us1.value == '' ){
                alert("El municipio es obligatorio.");
                document.formulario.muni_us1.focus();
                return false;
                }

                if( document.formulario.tdoc.value == 0 || document.formulario.tdoc.value == '' ){
                alert("El tipo documental es obligatorio.");
                document.formulario.tdoc.focus();
                return false;
                }

                if( document.formulario.coddepe.value == 0 || document.formulario.coddepe.value == '' ){
                alert("La dependencia responsable es obligatoria.");
                document.formulario.coddepe.focus();
                return false;
                }

                if(document.formulario.birds2.value == ''){
                    alert("Los dias de termino son obligatorios");
                    document.formulario.birds2.focus();
                    return false;
                }

                if(document.formulario.birds2.value == 0){
                    alert("Ingreso 0 en dias de termino lo que indica que para el dia de mañana ya estaria vencido el radicado");
                }


                if(document.formulario.ent.value == 2 || document.formulario.ent.value == 4){
                    
                    // if(document.formulario.sgd_ciu_eps.value == ''){
                    //     alert("El campo eps es obligatorio.");
                    //     document.formulario.sgd_ciu_eps.focus();
                    //     return false;
                    // }       
                    if( document.formulario.radi_nume_hoja.value == 0 || document.formulario.radi_nume_hoja.value == '' ){
                        alert("La cantidad de folios es obligatorio.");
                        document.formulario.radi_nume_hoja.focus();
                        return false;
                    }  
                }

                if(document.formulario.ent.value == 4){
                    if( document.formulario.tipoUsuarioGrupo.value == 0){
                        alert("El tipo de usuario es obligatorio, no puede ser vacio.");
                        document.formulario.tipoUsuarioGrupo.focus();
                        return false;
                    }

                    // if( document.formulario.tipoServicioPqrs.value == 0){
                    //     alert("El servicio es obligatorio, no puede ser vacio.");
                    //     document.formulario.tipoServicioPqrs.focus();
                    //     return false;
                    // }

                    // if( document.formulario.tipoGrupoInteres.value == 0){
                    //     alert("EL centro de atención es obligatorio, no puede ser vacio.");
                    //     document.formulario.tipoGrupoInteres.focus();
                    //     return false;
                    // }
                }

                if ( 
                document.formulario.tdoc.value != 0 &&
                        document.formulario.documento_us1.value != 0 &&
                        document.formulario.muni_us1.value != 0 &&
                        document.formulario.direccion_us1.value != 0 &&
                        document.formulario.coddepe.value != 0 &&
                document.formulario.asu.value != '' ) 
                {
                    document.getElementById( 'birds22' ).value = document.getElementById( 'birds2' ).value;
                    if($('#radicadoexiste').prop('checked') && $("#radinume").val() == ''){
                    alert("Tiene marcada la opcion (Ya tiene radicado), por favor ingrese el numero");
                    }else{
                    document.formulario.Submit33.disabled=true;
                    document.formulario.submit();
                    }
                    }else{
                    alert("El Remitente/Destinatario, Direcci\u00F3n, Asunto, Tipo de Documento y Dependencia son obligatorios ");    
                }

                //}
            }

            function modificar_doc(){
                if (document.formulario.documento_us1.value && document.formulario.asu.value != '' && document.formulario.tdoc.value != 0) {
                    document.getElementById( 'birds22' ).value = document.getElementById( 'birds2' ).value;
                    document.formulario.submit();
                }else{
                    alert("El Remitente/Destinatario, Direcci&oacute;n Asunto, Tipo de Documento y Dependencia son obligatorios ");       
                }
            }

            function pestanas(pestana){
            <?
            if($ent==1) $ver_pestana=""; else $ver_pestana="";
            ?>
                document.getElementById('remitente').style.display = "";
            document.getElementById('predio').style.display = "<?=$ver_pestana?>";
            document.getElementById('empresa').style.display = "<?=$ver_pestana?>";
            if(pestana==1) {
            document.getElementById('pes1').style.display = "";
            
            }else
            {
                document.getElementById('pes1').style.display = "none";
            }
            if(pestana==2)
            {
            document.getElementById('pes2').style.display = "";
            }else{document.getElementById('pes2').style.display = "none";}
            if(pestana==3) {
            document.getElementById('pes3').style.display = "";
            }
            else
            {document.getElementById('pes3').style.display = "none";}
            }

            function pb1(){
            dato1 = document.forma.no_documento.value;
            }

            function Start(URL, WIDTH, HEIGHT) {
                windowprops = "top=0,left=0,location=no,status=no, menubar=no,scrollbars=yes, resizable=yes,width=1366,height=670";
                preview = window.open(URL , "preview", windowprops);
            }

            function doPopup() {
                url = "popup.htm";
                width = 800; // ancho en pixels
                height = 320; // alto en pixels
                delay = 2; // tiempo de delay en segundos
                timer = setTimeout("Start(url, width, height)", delay*1000);
            }

            function buscar_usuario(){
            document.write('<form target=Buscar_Usuario name=formb action=buscar_usuario.php?envio_salida=true&ent=<?=$ent?> method=POST>');
            document.write("<input type='hidden' name=no_documento value='" + documento +"'>");
            document.write("</form> ");
            }

            function regresar(){
                i=1;
            }

        </script>
    </head>            
    <!--Fin  del  encabezado  -->

<body bgcolor="#FFFFFF" >

<div id="spiffycalendar" class="text"></div>
<link rel="stylesheet" type="text/css" href="../js/spiffyCal/spiffyCal_v2_1.css">
<script language="JavaScript" src="../js/spiffyCal/spiffyCal_v2_1.js"></script>
<link rel="stylesheet" href="../estilos/tabber.css" TYPE="text/css" MEDIA="screen">
<script type="text/javascript" src="../js/tabber.js"></script>

<?php
    if(isset($facturacionElectronica) && $facturacionElectronica == 1){
        require_once('../email/facturacionElectronica.php');
        //var_dump($unzipFolder);
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById('birds').value = '<?= $remitente["SGD_OEM_OEMPRESA"] ?>';
                document.getElementById('cc_documento_us1').value = '<?= $remitente["SGD_OEM_NIT"] ?>';
                document.getElementById('documento_us1').value = '<?= $remitente["SGD_OEM_CODIGO"] ?>';
                document.getElementById('direccion_us1').value = '<?= $remitente["SGD_OEM_DIRECCION"] ?>';
                document.getElementById('nombre_us1').value = '<?= $remitente["SGD_OEM_OEMPRESA"] ?>';
                document.getElementById('mail_us1').value = '<?= $remitente["EMAIL"] ?>';
                document.getElementById('otro_us1').value = '<?= $remitente["SGD_OEM_REP_LEGAL"] ?>';
                document.getElementById('prim_apel_us1').value = '<?= $remitente["SGD_OEM_REP_LEGAL"] ?>';
                document.getElementById('seg_apel_us1').value = '<?= $remitente["SGD_OEM_REP_LEGAL"] ?>';
                document.getElementById('idcont1').value = '<?= $remitente["ID_CONT"] ?>';
                document.getElementById('idpais1').value = '<?= $remitente["ID_PAIS"] ?>';
                document.getElementById('codep_us1').value = '<?= $remitente["ID_PAIS"] ."-". $remitente["DPTO_CODI"] ?>';
                document.getElementById('muni_us1').value = '<?= $remitente["ID_PAIS"] ."-". $remitente["DPTO_CODI"] . "-" .$remitente["MUNI_CODI"] ?>';
                //document.getElementById('muni_us1').value = '2';
                document.getElementById('asu').value = 'Factura electrónica <?= imap_utf8($emailInfo['headerInfo']->subject) ?? imap_utf8($emailInfo['headerInfo']->Subject)  ?>';
                document.getElementById('ane').value = '<?= $cantidadAnexos ?? "" ?>';
                document.getElementById('radi_nume_hoja').value = '<?= $cantidadAnexos ?? "" ?>';
                document.getElementById('tdoc').value = '248';
                document.getElementById('tipo_emp_us1').value = '2';
                //lanzamiento de eventos
                document.getElementById('tdoc').dispatchEvent(new Event('change'));

            });
            
        </script>

    <?php
    }elseif($eMailMid){
        require_once('../email/extractEmailInfo.php');
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById('birds').value = '<?= $remitente["nombre"] ?>';
                document.getElementById('cc_documento_us1').value = '<?= $remitente["identificacion"] ?>';
                document.getElementById('documento_us1').value = '<?= $remitente["identificacion"] ?>';
                document.getElementById('direccion_us1').value = '<?= $remitente["direccion"] ?>';
                document.getElementById('nombre_us1').value = '<?= $remitente["nombre"] ?>';
                document.getElementById('mail_us1').value = '<?= $remitente["email"] ?>';
                document.getElementById('otro_us1').value = '<?= $remitente["representante"] ?? '' ?>';
                document.getElementById('prim_apel_us1').value = '<?= $remitente["representante"] ?? '' ?>';
                document.getElementById('seg_apel_us1').value = '<?= $remitente["representante"] ?? '' ?>';
                document.getElementById('idcont1').value = '<?= $remitente["continente"] ?>';
                document.getElementById('idpais1').value = '<?= $remitente["pais"] ?>';
                document.getElementById('codep_us1').value = '<?= $remitente["pais"] ."-". $remitente["departamento"] ?>';
                document.getElementById('muni_us1').value = '<?= $remitente["pais"] ."-". $remitente["departamento"] . "-" .$remitente["municipio"] ?>';
                //document.getElementById('muni_us1').value = '2';
                document.getElementById('asu').value = '<?= imap_utf8($emailInfo['headerInfo']->subject) ?? imap_utf8($emailInfo['headerInfo']->Subject)  ?>';
                // document.getElementById('ane').value = '<?= $cantidadAnexos ?? "" ?>';
                // document.getElementById('radi_nume_hoja').value = '<?= $cantidadAnexos ?? "" ?>';
                //document.getElementById('tdoc').value = '248';
                document.getElementById('tipo_emp_us1').value = '<?= $remitente["tipo"] ?>';
                //lanzamiento de eventos
                //document.getElementById('tdoc').dispatchEvent(new Event('change'));

            });
            
        </script>

        <?php
    }
    error_reporting(7);
  $ddate=date('d');
  $mdate=date('m');
  $adate=date('Y');
  $nurad = trim($nurad);
  $hora=date('H:i:s');
  $fechaf =$date.$mdate.$adate.$hora;
  // aqui se busca el radicado para editar si viene la variable $Buscar
  if($Buscar){
        $docDia = $db->conn->SQLDate('d','a.RADI_FECH_OFIC');
        $docMes = $db->conn->SQLDate('m','a.RADI_FECH_OFIC');
        $docAno = $db->conn->SQLDate('Y','a.RADI_FECH_OFIC');
        $fRad = $db->conn->SQLDate('Y-m-d','a.RADI_FECH_RADI');
        if (!$nurad || strlen(trim($nurad))==0)
            $nurad="NULL";

       /** Trae la información del radicado se que esta buscando */
        $query = "select a.* ,$docDia AS DOCDIA, $docMes AS DOCMES, $docAno AS DOCANO,a.EESP_CODI,a.RA_ASUN AS RA_ASUN,$fRad AS FECHA_RADICADO, dt.DIAS_TERMINO as DIAS_TERMINO from radicado a inner join sgd_dt_radicado dt on dt.radi_nume_radi=a.radi_nume_radi where a.radi_nume_radi='$nurad'";
        $rs = $db->conn->query($query);
        $varQuery = $query;        
        $busqueda=$nurad;
        
        $querySgdDirDrecciones = "SELECT sgd_dir_doc FROM sgd_dir_drecciones WHERE radi_nume_radi = '". $nurad ."'";
        $rsSgdDirDrecciones = $db->conn->query($querySgdDirDrecciones);
        $cc_documento_temp = $rsSgdDirDrecciones->fields["SGD_DIR_DOC"];
    
    if (!$rs->EOF and (isset($busqueda) || is_numeric($busqueda))) {
        if ($cursor) {
            $Submit4 = "Modificar";
        }
        $fechaQueja = isset($rs->fields["FECHA_QUEJA"]) ? $rs->fields["FECHA_QUEJA"] : $rs->fields['RADI_FECH_RADI'];
        $asu = $rs->fields["RA_ASUN"];
        $tip_doc = $rs->fields["TDID_CODI"];
        $radicadopadre = $rs->fields["RADI_NUME_DERI"];
        $ane = $rs->fields["RADI_DESC_ANEX"];
        $codep = $rs->fields["DEPTO_CODI"];
        $pais = $rs->fields["RADI_PAIS"];
        $carp_codi = $rs->fields["CARP_CODI"];
        $cuentai = $rs->fields["RADI_CUENTAI"];
        $carp_per = $rs->fields["CARP_PER"];
        $depende = $rs->fields["RADI_DEPE_ACTU"];
        $tip_rem = $rs->fields["TRTE_CODI"] + 1;
        $tdoc = isset($rs->fields["tdoc_codi"]) ? $rs->fields["tdoc_codi"] : $rs->fields["TDOC_CODI"];
        $med = $rs->fields["MREC_CODI"];
        $cod = $rs->fields["MUNI_CODI"];
        $codusuarioActu = $rs->fields["RADI_USUA_ACTU"];
        $coddepe = $rs->fields["RADI_DEPE_ACTU"];
        $fechproc12 = $rs->fields["DOCDIA"];
        $fechproc22 = $rs->fields["DOCMES"];
        $fechproc32 = $rs->fields["DOCANO"];
        $fechaRadicacion = $rs->fields["FECHA_RADICADO"];
        $espcodi = $rs->fields["EESP_CODI"];
        $fechaVencRad = $rs->fields["FECH_VCMTO"];
        $fechavencimientorad = date("Y-m-d", strtotime($fechaVencRad));
        $birds22 = isset($rs->fields["dias_termino"]) ? $rs->fields["dias_termino"] : $rs->fields["DIAS_TERMINO"];
        $radiEnvioCorreo = isset($rs->fields["radi_envio_correo"]) ? $rs->fields["radi_envio_correo"] : $rs->fields["RADI_ENVIO_CORREO"];
        $fecha_gen_doc = "$fechproc12/$fechproc22/$fechproc32";
        $tipoUsuarioGrupo = isset($rs->fields["TIPO_USARIO_INTERES"]) ? $rs->fields["TIPO_USARIO_INTERES"] : $rs->fields["tipo_usario_interes"];
        $tipoServicioPqrs = isset($rs->fields["servicio_pqr"]) ? $rs->fields["servicio_pqr"] : $rs->fields["SERVICIO_PQR"];
        $tipoGrupoInteres = isset($rs->fields["grupo_interes"]) ? $rs->fields["grupo_interes"] : $rs->fields["GRUPO_INTERES"];    
        $radi_nume_hoja = isset($rs->fields["radi_nume_hoja"]) ? $rs->fields["radi_nume_hoja"] : $rs->fields["RADI_NUME_HOJA"];
      
        include "busca_direcciones.php";
        //include "busca_tabla_retencion_documental.php";

        $datoAnteAsun = $asu;
        $datoAnteDocR = $documento;
        $datoAnteTrds = $codserie;
        $datoAnteDesA = $ane;

    } else {
        echo "<br>"
            . "<p>"
                . "<center>"
                . "<table width='90%' class=borde_tab celspacing=5>"
                    . "<tr>"
                        . "<td class=alarmas>"
                            . "<center>"
                                . utf8_decode("No se han encontrado registros con n&uacute;mero de radicado ")
                                . "<font class='vinculos'>$nurad</font> "
                                . "<br>"
                                . utf8_decode("Revise el radicado escrito, solo pueden ser N&uacute;meros de ".strlen($nurad)." d&iacute;gitos")
                                . "<br>"
                                . "<p>"
                                . "<a href='edtradicado.php?fechaf=$fechaf&krd=$krd&drde=$drde'>Intente de Nuevo</a>"
                            . "</center>"
                        . "</td>"
                    . "</tr>"
                . "</table>"
            . "</center>";
            if(!$rsJHLC) die("<hr>");
    }   
  }
     // Fin de Busqueda del Radicado para editar

?>
  <script language="javascript">
  <?

if(!$fecha_gen_doc || $fecha_gen_doc=='//')
{   $fecha_busq = date("d-m-Y");
    $fecha_gen_doc = $fecha_busq;
}
  ?>
   var dateAvailable1 = new ctlSpiffyCalendarBox("dateAvailable1", "formulario", "fecha_gen_doc","btnDate1","<?=$fecha_gen_doc?>",scBTNMODE_CUSTOMBLUE);
  </script>
   <?php

    if($rad1 or $rad0 or $rad2)
    {
    if($rad1) $tpRadicado = "1";
    if($rad2) $tpRadicado = "2";
    if($rad0) $tpRadicado = "0";
  echo "<input type=hidden name=tpRadicado value=$tpRadicado>";
    $docDia = $db->conn->SQLDate('D','a.RADI_FECH_OFIC');
    $docMes = $db->conn->SQLDate('M','a.RADI_FECH_OFIC');
    $docAno = $db->conn->SQLDate('Y','a.RADI_FECH_OFIC');
    if (!$radicadopadre || strlen(trim($radicadopadre))==0)
            $radicadopadre="NULL";
  $query = "select a.*
                            ,$docDia AS DOCDIA
                            ,$docMes AS DOCMES
                            ,$docAno AS DOCANO
                            ,a.EESP_CODI from radicado a
                        where a.radi_nume_radi='$radicadopadre'";
  $varQuery = $query;
    $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
    $rs=$db->conn->query($query);
    
    if(!$rs->EOF)
    {
        echo "<!-- No hay datos: $query -->";
    }
   if(!$Buscar and !$Submit4)
     {
        $varQuery = $query;
        $comentarioDev = 'Entro a Anexar un radicado ';
        $cuentaii =$rs->fields["RADI_CUENTAI"];
        if($cuentaii){$cuentai=$cuentaii;}
        $pnom=$rs->fields["RADI_NOMB"];
        $papl=$rs->fields["RADI_PRIM_APEL"];
        $sapl=$rs->fields["RADI_SEGU_APEL"];
        $numdoc=$rs->fields["RADI_NUME_IDEN"];
        $fechaQueja=$rs->fields["FECHA_QUEJA"];
        $asu=$rs->fields["RA_ASUN"];
        $tel=$rs->fields["RADI_TELE_CONT"];
        $rem2=$rs->fields["RADI_REM"];
        $adress=$rs->fields["RADI_DIRE_CORR"];
    }
     $depende=$rs->fields["RADI_DEPE_ACTU"];
     $radi_usua_actu_padre=$rs->fields["RADI_USUA_ACTU"];
     $radi_depe_actu_padre=$rs->fields["RADI_DEPE_ACTU"];
     $tip_doc =$rs->fields["TDID_CODI"];
     $ane= $rs->fields["RADI_DESC_ANEX"];
     $cod=$rs->fields["MUNI_CODI"];
     $codep=$rs->fields["DPTO_CODI"];
     $pais=$rs->fields["RADI_PAIS"];
     $espcodi=$rs->fields["EESP_CODI"];
     $radiNivelSeguridad = isset($rs->fields["SGD_SPUB_CODIGO"]) ? $rs->fields["SGD_SPUB_CODIGO"] : $rs->fields["sgd_spub_codigo"]; 
     $tipoUsuarioGrupo = isset($rs->fields["TIPO_USARIO_INTERES"]) ? $rs->fields["TIPO_USARIO_INTERES"] : $rs->fields["tipo_usario_interes"];
     $tipoServicioPqrs = isset($rs->fields["servicio_pqr"]) ? $rs->fields["servicio_pqr"] : $rs->fields["SERVICIO_PQR"];
     $tipoGrupoInteres = isset($rs->fields["grupo_interes"]) ? $rs->fields["grupo_interes"] : $rs->fields["GRUPO_INTERES"];
     $radi_nume_hoja = isset($rs->fields["radi_nume_hoja"]) ? $rs->fields["radi_nume_hoja"] : $rs->fields["RADI_NUME_HOJA"];

     if($noradicar2)
     {
            $fecha_gen_doc = $rs->fields["DOCDIA"] ."-".$rs->fields["DOCMES"] ."-".$rs->fields["DOCANO"];
            $fechproc12=$rs->fields["DOCDIA"];
            $fechproc22=$rs->fields["DOCMES"];
            $fechproc32=$rs->fields["DOCANO"];
        }
    
    $no_tipo = "true";
    include "busca_direcciones.php";
    }
    IF($rad1)
    {
      $encabezado = "<center><b>Copia de datos del Radicado  $radicadopadre ";
      $tipoanexo = "1";
    }
    IF($rad0)
    {
      $encabezado = "<center><b>Anexo de $radicadopadre ";
      $tipoanexo = "0";
      $radicadopadre_exist=1;
    }
     IF($rad2)
     {
     $encabezado = "<center><b>Documento Asociado de $radicadopadre ";
      if(!$Submit4 and !$Submit3){$cuentai = "";}
      $tipoanexo = "2";
      $radicadopadre_exist=1;
    }
     IF($noradicar1)
      $radicadopadre_exist=0;
 ?>
  <script>
function procEst2(formulario,tb)
{
    var lista = document.formulario.codep.value;
    i = document.formulario.codep.value;
    if (i != 0) {
        var dropdownObjectPath = document.formulario.tip_doc;
        var wichDropdown = "tip_doc";
        var d=tb;
        var withWhat = document.formulario.codep.value;
        populateOptions2(wichDropdown, withWhat,tb);
      }
}
function populateOptions2(wichDropdown, withWhat,tbres)
{
    r = new Array;
    i=0;
if (withWhat == "2")
    {
   r[i++]=new Option("NIT", "1");
     }
if (withWhat == "1")
    {
      document.formulario.submit();
      r[i++]=new Option("NIT","4");
      r[i++]=new Option("NUIR","5");
    }
if (withWhat == "3")
    {
        r[i++]=new Option("CC", "0");
        r[i++]=new Option("CE", "2");
        r[i++]=new Option("TI", "1");
        r[i++]=new Option("PASAPORTE", "3");
     }
    if (i==0) {
        alert(i + " " + "Error!!!");
              }
    else{
        dropdownObjectPath = document.formulario.tip_doc;
        eval(document.formulario.tip_doc.length=r.length);
        largestwidth=0;
        for (i=0; i < r.length; i++)
            {
              eval(document.formulario.tip_doc.options[i]=r[i]);
              if (r[i].text.length > largestwidth) {
                 largestwidth=r[i].text.length;    }
            }
        eval(document.formulario.tip_doc.length=r.length);
        //eval(document.myform.cod.options[0].selected=true);
       }
}

function vnum(formulario,n)
{
    valor = formulario.elements[n].value;
    if (isNaN(valor))
      {
        alert ("Dato incorrecto..");
        formulario.elements[n].value="";
        formulario.elements[n].focus();
        return false;
      }
    else
        return true;
}

function fech(formulario,n)

{
m=n-1;
s=m-1;
var f=document.formulario.elements[n].value;
var meses=parseInt(document.formulario.elements[m].value);
eval(lona=document.formulario.elements[n].length);
eval(lonm=document.formulario.elements[m].length);
eval(lond=document.formulario.elements[s].length);
if(lona==44 || lonm==44 || lond==44)
{
alert("Fecha incorrecta  debe ser DD/MM/AAAA !!!");
document.formulario.elements[s].value="";
document.formulario.elements[m].value="";
document.formulario.elements[n].value="";
document.formulario.elements[s].focus();
}
else{
if ((f%4)==0){
if(document.formulario.elements[m].value<13){
switch(meses){
case 12 : if(document.formulario.elements[s].value>31)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 11 : if(document.formulario.elements[s].value>30)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 10 : if(document.formulario.elements[s].value>31)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 9 : if(document.formulario.elements[s].value>30)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 8 : if(document.formulario.elements[s].value>31)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 7 : if(document.formulario.elements[s].value>31)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 6 : if(document.formulario.elements[s].value>30)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 5 : if(document.formulario.elements[s].value>31)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 4 : if(document.formulario.elements[s].value>30)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 3 : if(document.formulario.elements[s].value>31)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 2 : if(document.formulario.elements[s].value>29)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 1 : if(document.formulario.elements[s].value>31)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
}
}
else {alert("Fecha mes inexistente!!");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
}
}
else {
if(document.formulario.elements[m].value<13){
switch(meses){
case 12 : if(document.formulario.elements[s].value>31)
                {
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
    }break;
case 11 : if(document.formulario.elements[s].value>30)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 10 : if(document.formulario.elements[s].value>31)
{
alert ("Fecha incorrecta..");
document.formulario.elements[s].value="";
document.formulario.elements[m].value="";
document.formulario.elements[n].value="";
document.formulario.elements[s].focus();
return false;
}break;
case 9 : if(document.formulario.elements[s].value>30)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
            return false;
}break;
case 8 : if(document.formulario.elements[s].value>31)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 7 : if(document.formulario.elements[s].value>31)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 6 : if(document.formulario.elements[s].value>30)

{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 5 : if(document.formulario.elements[s].value>31)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 4 : if(document.formulario.elements[s].value>30)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 3 : if(document.formulario.elements[s].value>31)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 2 : if(document.formulario.elements[s].value>28)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
case 1 : if(document.formulario.elements[s].value>31)
{
    alert ("Fecha incorrecta..");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    return false;
}break;
}
}
    else {
    alert("Fecha mes inexistente!!");
    document.formulario.elements[s].value="";
    document.formulario.elements[m].value="";
    document.formulario.elements[n].value="";
    document.formulario.elements[s].focus();
    }
    }
}
}
var contadorVentanas=0
</script>
<?php
if ($Buscar1){
   include "busca_direcciones.php";
}

if($Submit3=="ModificarDocumentos")  $var_envio=session_name()."=".trim(session_id())."&ent=$ent&carp_per=$carp_per&carp_codi=$carp_codi&rad=$nurad&depende=$depende&Submit3=$Submit3&depende=$depende";
else $var_envio=session_name()."=".trim(session_id())."&ent=$ent&carp_per=$carp_per&carp_codi=$carp_codi&rad=$nurad&coddepe=$coddepe&depende=$depende";

if($tipoMedio=="eMail"){
    $med = 3;
    $var_envio = $var_envio."&eMailMid=".$_GET['eMailMid']."&eMailPid=". $_GET['eMailPid'] . "&facElect=". $facturacionElectronica ."&uzpFldr=".$unzipFolder . "&nadj=". $numadj;
 
} 
//var_dump($var_envio);
?>

<form action='NEW.php?<?=$var_envio?>'  method="post" name="formulario" id="formulario" class="borde_tab">
<INPUT TYPE=HIDDEN NAME=radicadopadre value='<?=$radicadopadre ?>'>
<input type=hidden name=tipoanexo value='<?=$tipoanexo ?>'>
<input type=hidden name='noradicar' value='<?=$noradicar ?>'>
<input type=hidden name='noradicar1' value='<?=$noradicar1 ?>'>
<input type=hidden name='noradicar2' value='<?=$noradicar2 ?>'>
<input type=hidden name='atrasRad0' value='<?=$rad0 ?>'>
<input type=hidden name='atrasRad1' value='<?=$rad1 ?>'>
<input type=hidden name='atrasRad2' value='<?=$rad2 ?>'>
<input type=hidden name='faxPath' value='<?=$faxPath ?>'>
<input type=hidden name='birds22' id='birds22' value='0'>
<?

// $producto=  $_COOKIE["variable"];
//echo $producto; 

if($tpRadicado) {echo "<input type=hidden name=tpRadicado value=$tpRadicado>";}
?>
<center>
    <br>
    <div id="titulo" style="width: 90%;" align="center">
        <table width="99%"  border="0" align="center" cellpadding="1" cellspacing="1" class="borde_tab">
        <!--<th colspan=4 style="color:#FFFFFF">Tabla1:Encabezado</th>-->
            <tr>
                <td width="6" class="titulos2"><a class="vinculosCabezote" href='./NEW.php?<?= session_name() . "=" . session_id() ?>&rad2=Asociado&krd=<?= $krd ?>&ent=<?= $ent ?>&rad1=<?= $atrasRad1 ?>&rad2=<?= $atrasRad2 ?>&rad0=<?= $atrasRad0 ?>&radicadopadre=<?= $radicadopadre ?>&noradicar=<?= $noradicar ?>&noradicar1=<?= $noradicar1 ?>&noradicar2=<?= $noradicar2 ?>'>Atras</a></td>
                <td width="94%" align="center" valign="middle" class="titulos2" style="font-size: 21px;"><b>
                        <?php
                        
                        $query = "select SGD_TRAD_CODIGO , SGD_TRAD_DESCR from sgd_trad_tiporad where SGD_TRAD_CODIGO=$ent";
                        //$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
                        $db = new ConnectionHandler('..');
                        $rs = $db->conn->query($query);
                        $tRadicacionDesc = $rs->fields["SGD_TRAD_DESCR"];
                        ?>
                        M&oacute;dulo de Radicaci&oacute;n
                        <?= $tRadicacionDesc ?>
                        (Dep
                        <?= $dependencia ?>
                        ->
                        <?= $tpDepeRad[$ent] ?>
                        )</b>
                    <?php
                    if ($nurad) {
                        echo "<b>Rad No " . $nurad;
                        $ent = substr($nurad, -1);
                    }
                    ?>
                    <br>
                    <?= $encabezado ?>
                </td>
            </tr>

        </table>
    </div>
</center>

<table  width=90% border="0" align="center" cellspacing="1" cellpadding="1" class="borde_tab" style="display : none;">
    <tr valign="middle">
        <td class="titulos5" width="15%" align="right">
            <span class="titulos5">Fecha: dd/mm/aaaa</span>
        </td>
                <td class="listado5" width="15%">
                    <label for="fechproc1" style="display:none">Dia</label>
                    <input name="fechproc1" type="text"  readonly="true" title="Campo de fecha actual que indica el dia" id="fechproc1" size="2" maxlength="2" value="<?php echo $ddate; ?>" class="tex_area">/
                    <label for="fechproc2" style="display:none">Mes</label>
                    <input name="fechproc2" type="text"  readonly="true" id="fechproc2" size="2" maxlength="2" title="Campo de fecha actual que indica el mes"value="<?php echo $mdate; ?>" class="tex_area">/
                    <label for="fechproc3" style="display:none">Anho</label>
                    <input name="fechproc3" readonly="true" type="text" id="fechproc3" size="4" maxlength="4" title="Campo de fecha actual que indica el año" value="<?php echo $adate; ?>" class="tex_area">
                </td>
                <td width="15%" class="titulos5" align="right">
                    <font color="" class="titulos5"><label for="fecha_gen_doc" class="titulo5">Fecha Doc. dd/mm/aaaa</label> </font>
                </td>
        <td width="15%" class="listado5">
            <script language="javascript">
                dateAvailable1.date = "<?=date('Y-m-d');?>";
                dateAvailable1.writeControl();
                dateAvailable1.dateFormat="dd-MM-yyyy";
                              
            </script>
        </td>
        <td width="15%" class="titulos5" align="right"><label for="cuentai">Cuenta Interna, Oficio, Referencia</label></td>
        <td width="15%" class="listado5">
            <input name="cuentai" id="cuentai" type="text"  maxlength="20" class="tex_area" title="Campo para agregar una cuenta interna, un oficio o una referencia " value='<?php echo $cuentai; ?>' >
    </td>
    </tr>
</table>
<table width="600" border="0" cellspacing="0" cellpadding="0" style="display : none;">
    <tr>
    <td height="0"> <input name="VERIFICAR" type='hidden' class="ebuttons2" value="Verifique Radicaci&oacute;n">
    </td>
    </tr>
</table>
  
<table width="90%" align="center" border="0" cellspacing="0" cellpadding="0">
        <?
        if($ent==2 or $ent==7 or $ent==$tipoRadicadoPqr) $busq_salida = ""; 
        else  $busq_salida="true";
    ?>
    <tr valign="top">
    <td>
<div class="tabber" id="tab1" border="1">
<?php
for($i=1;$i<=1;$i++){
//  variables a llenar ene l formulario de radicación.
    if($i==1)  {
        //echo '-----> entro al 1 '.$cc_documento_us1;
        $nombre = $nombre_us1;  
        $documento = $documento_us1;
        $papel = $prim_apel_us1;
        $grbNombresUs1 = trim($nombre_us1) . " " . trim($prim_apel_us1) . " ". trim($seg_apel_us1);
        $sapel = $seg_apel_us1;
        $tel = $telefono_us1;
        $dir = $direccion_us1;
        $mail = $mail_us1;
        $muni = $muni_us1;
        $codep = $codep_us1;
        $idp = $idpais1;
        $idc = $idcont1;
        $tipo = $tipo_emp_us1;
        $cc_documento = $cc_documento_us1;
        $otro = $otro_us1;
    }
    if($i==2){
        //echo '-----> entro al 2 '.$documento_us2;
        $nombre = $nombre_us2;
        $documento = $documento_us2;
        $cc_documento = $cc_documento_us2;
        $papel = $prim_apel_us2;
        $sapel = $seg_apel_us2;
        $grbNombresUs2 = trim($nombre_us2) . " " . trim($prim_apel_us2) . " ". trim($seg_apel_us2);
        $tel = $telefono_us2;
        $dir = $direccion_us2;
        $mail = $mail_us2;
        $muni = $muni_us2;
        $codep = $codep_us2;
                $idp = $idpais2;
                $idc = $idcont2;
        $tipo = $tipo_emp_us2;
        $otro = $otro_us2;
    }
    if($i==3){
        //echo '-----> entro al 3 '.$documento_us3;
        $nombre = $nombre_us3;
        $documento = $documento_us3;
        $cc_documento = $cc_documento_us3;
        $grbNombresUs3 = trim($nombre_us3) . " " . trim($prim_apel_us3) . " ".trim($seg_apel_us3);
        $papel = $prim_apel_us3;
        $sapel = $seg_apel_us3;
        $tel = $telefono_us3;
        $dir = $direccion_us3;
        $mail = $mail_us3;
        $muni = $muni_us3;
        $codep = $codep_us3;
                $idp = $idpais3;
                $idc = $idcont3;
        $tipo = $tipo_emp_us3;
        $otro = $otro_us3;
    }
    // si es tercero
    if($tipo==1 or $i==3) {
        $lbl_nombre = "Raz&oacute;n Social";
        $lbl_apellido = "Sigla";
        $lbl_nombre2 = "Rep. Legal";
    }
    else{
        $lbl_nombre = "Nombres / Raz&oacute;n Social";
        $lbl_apellido = "Apellidos / Sigla";
        $lbl_nombre2 = "Segundo Apellido / Rep.Legal";
    }
    
    $bloqEdicion="";
    if ($i==3){
        $bloqEdicion = "readonly='true'";
    }

    if($ent == 2 or $ent == 4){
        $titulo = "REMITENTE";
    }else{
        $titulo = "DESTINATARIO";
    }
    //$titulo = $tip3Nombre[$i][$ent];
    // if(!$titulo)  $titulo = "?? $i";
    ?>
    <div class="tabbertab" title="<?= $titulo ?>">
        <div class="container borde_tab" name='pes<?= $i ?>' id='pes<?= $i ?>'  cellpadding="0" cellspacing="1"> <br>
            <div class="panel panel-default" style="background-color: rgb(246, 246, 246)">
                <br><b>BUSCAR <?=$titulo?>:</b><br><br>                                      
                <div class="row"> 
                    <?php if(!isset($facturacionElectronica) && $facturacionElectronica == '1'): ?>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-left:15px;">
                        <label for="birds">Nombre:</label> <br>
                        <input maxlength="80" id="birds" size="40" name="birds" title="Razón social de la empresa" readonly=true type="text" class="form-control">
                    </div>
                    <?php elseif(isset($eMailMid) && $eMailMid != ''): ?>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-left:15px;">
                        <label for="birds">Nombre:</label> <br>
                        <input maxlength="80" id="birds" size="40" name="birds" title="Razón social" type="text" class="form-control"> (M&iacute;nimo 3 caracteres)
                        </div>
                    <?php else: ?>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-left:15px;">
                        <label for="birds">Nombre:</label> <br>
                        <input maxlength="80" id="birds" size="40" name="birds" title="Campo para buscar usuario por nombre, debe digitar minimo 3 caracteres para la busqueda, para buscar entre las coincidencias use las flechas arriba y abajo" aria-autocomplete="list" aria-haspopup="true" aria-owns="ui-autocomplete-instance" type="text"> (M&iacute;nimo 3 caracteres)
                        </div>
                    <?php endif; ?>  
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <?php if ($_SESSION["usua_perm_agrcontacto"] == 1) { ?>
                            <!--botom  BUSCAR -->
                            <input type="button" name="Button" value="Agregar remitente" class="botones" onClick="Start('buscar_usuario.php?&nombreTp1=<?= $nombreTp1 ?>&nombreTp2=<?= $nombreTp2 ?>&nombreTp3=<?= $nombreTp3 ?>&busq_salida=<?= $busq_salida ?>&ent=<?= $ent ?>',1024,400);" align="left">
                            <input type='hidden' name='depende22' value="<?php echo $depende; ?>">
                        <?php } ?>
                        <?php if ($ent == 2 && $Submit3 != 'ModificarDocumentos' && $_SESSION["preRadica"] == 1 && $_SESSION["tpPerRad"][2] == 3) { ?>
                            | <input type='checkbox' name='radicadoexiste' id='radicadoexiste' onclick="checkradicado();"> Ya tiene radicado                                 
                        <?php } ?>                                                                                  
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-left:15px;">
                        <?php
                        if ($tipoMedio=="eMail" or $med==3){
                            // Indica que muestre los tipos de radicados que en la columna tiporadi_email tiene 1 los cuales son 
                            // los que se van a utilizar para la radicación emal
                            $selectTipoRad = "select sgd_trad_codigo, sgd_trad_descr from sgd_trad_tiporad where tiporadi_email=1 and mostrar_como_tipo=1";
                            $rsTipoRad = $db->conn->query($selectTipoRad);

                            if($Submit44){
                                $selectnombre = "select sgd_trad_descr from sgd_trad_tiporad where sgd_trad_codigo=".$ent;
                                $rsTipoRadNomb = $db->conn->query($selectnombre);
                                $nombreTiporRad = isset($rsTipoRadNomb->fields['sgd_trad_descr']) ? $rsTipoRadNomb->fields['sgd_trad_descr'] : $rsTipoRadNomb->fields['SGD_TRAD_DESCR'];

                                echo '<label for="birds">Tipo de Radicado: </label>'.$nombreTiporRad.'<br>';
                            }

                            if($eMailMid){
                                if($nurad == '' or $nurad == null){
                                    ?><br>
                                        <label for="birds">Tipo de Radicado:</label> <br>
                                        <select class="form-control" name="tipoRadEmail" id="tipoRadEmail">
                                            <option value="0">-- Seleccione Tipo de Radicado --</option>
                                            <?php
        
                                            if ($_POST['tipoRadEmail']) {
                                                $datos = " selected ";
                                            } else {
                                                $datos = "";
                                            }
                                            while(!$rsTipoRad->EOF){
                                                $sgd_trad_codigo = $rsTipoRad->fields['SGD_TRAD_CODIGO'];
                                                $sgd_trad_descr = $rsTipoRad->fields['SGD_TRAD_DESCR'];
        
                                                if($_POST['tipoRadEmail'] == $sgd_trad_codigo){
                                                echo '<option value="'.$sgd_trad_codigo.'" '.$datos.'>'.$sgd_trad_descr.'</option>';
                                                }else{
                                                echo '<option value="'.$sgd_trad_codigo.'">'.$sgd_trad_descr.'</option>';
                                                }
        
                                                //echo '<option value="'.$sgd_trad_codigo.'" '.$datos.'>'.$sgd_trad_descr.'</option>';
                                                $rsTipoRad->MoveNext();
                                            }
                                            ?>
                                        </select>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <?php if ($ent == 2 && $Submit3 != 'ModificarDocumentos' && $_SESSION["preRadica"] == 1 && $_SESSION["tpPerRad"][2] == 3) { ?>
                            <div style="display: none" id='divradicado'>
                                <label for="birds">Número de Radicado:</label> <br>
                                <input type='numeric' class="form-control" minlength="18" maxlength="30" name='radinume' id='radinume' value='' onkeypress="return isTextKeyradicado(event)" onChange="validaRadicado();"/>                                                
                            </div>                                    
                        <?php } ?> 
                    </div><br>
                </div>
            
                <div class="panel-body">
                    <div class="row">

                        <div class="form-group col-lg-3 col-md-3 col-xs-3">
                            <label for="cc_documento_us1">N&uacute;mero de identificaci&oacute;n</label><br>
                            <input type=text name='cc_documento_us<?= $i ?>' value='<?php if(isset($_POST['cc_documento_us1'])) { echo $_POST['cc_documento_us1']; } else { echo $cc_documento_temp; } ?>'readonly="true" id="cc_documento_us1" class="tex_area form-control" title="Campo que contiene el documento de identificacion del usuario o suscriptor buscado">
                            <input type=hidden name='documento_us<?= $i ?>' value='<?= $documento ?>' readonly="true" id="documento_us1" class="tex_area form-control" size="1">
                        </div> 

                        <div class="form-group col-lg-3 col-md-3 col-xs-3">
                            <label for="nombre_us1"><?= $lbl_nombre ?></label><br>
                            <INPUT type=text id="nombre_us1" class="form-control" title="Campo que se autocompleta con el nombre completo del usuario o suscriptor buscado"  name='nombre_us<?= $i ?>' value='<?= $nombre ?>' 
                                   class="tex_area" size=40 readonly="true">
                            
                        </div>

                        <div class="form-group col-lg-3 col-md-3 col-xs-3">
                            <label for="prim_apel_us1"> <?= $lbl_apellido ?></label><br>
                            <?php
                            if ($i == 4) {
                                $ADODB_COUNTRECS = true;
                                $query = "select PAR_SERV_NOMBRE,PAR_SERV_CODIGO FROM PAR_SERV_SERVICIOS order by PAR_SERV_NOMBRE";
                                $rs = $db->conn->query($query);
                                $numRegs = "! " . $rs->RecordCount();
                                $varQuery = $query;
                                print $rs->GetMenu2("sector_us$i", "sector_us$i", "0:-- Seleccione --", false, "", "onChange='procEst(formulario,18,$i )' class='ecajasfecha'");
                                $ADODB_COUNTRECS = false;
                                ?>
                                <select name="sector_us<?= $i ?>" class="select">
                                    <?php
                                    while (!$rs->EOF) {
                                        $codigo_sect = $rs->fields["PAR_SERV_CODIGO"];
                                        $nombre_sect = $rs->fields["PAR_SERV_NOMBRE"];
                                        echo "<option value=$codigo_sect>$nombre_sect</option>";
                                        $rs->MoveNext();
                                    }
                                    ?>
                                </select>
                                <?php
                            } else {
                                ?>
                                <INPUT type=text name='prim_apel_us<?= $i ?>' value='<?= $papel ?>' class="tex_area form-control" id="prim_apel_us1" readonly="true"  size="35" title="Campo que se autocompleta con el primer apellido del usuario o suscriptor buscado">
                                <?php
                            }
                            ?>
                        </div>
                        <input type=hidden name='seg_apel_us<?= $i ?>' value='<?= $sapel ?>'  readonly="true" id="seg_apel_us1"  class="tex_area form-control" size=40 title="Campo que se autocompletaa con el segundo apellido del usuario o suscriptor buscado">
                        <!--<div class="form-group col-lg-3 col-md-3 col-xs-3">
                            <!--<label for="seg_apel_us1"><?= $lbl_nombre2 ?></label><br>-->
                            
                        <!--</div>-->
                        <div class="form-group col-lg-3 col-md-3 col-xs-3">
                            <label for="tipo_emp_us1">Tipo remitente / destinatario</label><br>
                            <select name="tipo_emp_us<?= $i ?>" class="select form-control" readonly="true" tabindex="-1" id="tipo_emp_us1" title="Lista desplegable que contiene los tipos de usuario" >
                                <?php
                                if ($i == 1) {
                                    if ($tipo_emp_us1 == 0) {
                                        $datos = " selected ";
                                    } else {
                                        $datos = "";
                                    }
                                }
                                if ($i == 2) {
                                    if ($tipo_emp_us2 == 0) {
                                        $datos = " selected ";
                                    } else {
                                        $datos = "";
                                    }
                                }
                                if ($i == 3) {
                                    if ($tipo_emp_us3 == 0) {
                                        $datos = " selected ";
                                    } else {
                                        $datos = "";
                                    }
                                }
                                ?>
                                <option value=0 <?= $datos ?>>USUARIO</option>
                                <?php
                                if ($i == 1) {
                                    if ($tipo_emp_us1 == 1) {
                                        $datos = " selected ";
                                    } else {
                                        $datos = "";
                                    }
                                }
                                if ($i == 2) {
                                    if ($tipo_emp_us2 == 1) {
                                        $datos = " selected ";
                                    } else {
                                        $datos = "";
                                    }
                                }
                                if ($i == 3) {
                                    if ($tipo_emp_us3 == 1) {
                                        $datos = " selected ";
                                    } else {
                                        $datos = "";
                                    }
                                }
                                ?>
                                <option value=1 <?= $datos ?>>TERCEROS </option>
                                <?php
                                if ($i == 1) {
                                    if ($tipo_emp_us1 == 2) {
                                        $datos = " selected ";
                                    } else {
                                        $datos = "";
                                    }
                                }
                                if ($i == 2) {
                                    if ($tipo_emp_us2 == 2) {
                                        $datos = " selected ";
                                    } else {
                                        $datos = "";
                                    }
                                }
                                if ($i == 3) {
                                    if ($tipo_emp_us3 == 2) {
                                        $datos = " selected ";
                                    } else {
                                        $datos = "";
                                    }
                                }
                                ?>
                                <option value=2 <?= $datos ?>>EMPRESAS  </option>
                                <?php
                                if ($i == 1) {
                                    if ($tipo_emp_us1 == 6) {
                                        $datos = " selected ";
                                    } else {
                                        $datos = "";
                                    }
                                }
                                if ($i == 2) {
                                    if ($tipo_emp_us2 == 6) {
                                        $datos = " selected ";
                                    } else {
                                        $datos = "";
                                    }
                                }
                                if ($i == 3) {
                                    if ($tipo_emp_us3 == 6) {
                                        $datos = " selected ";
                                    } else {
                                        $datos = "";
                                    }
                                }
                                ?>
                                <option value=6 <?= $datos ?>>FUNCIONARIOS  </option>
                            </select>
                        </div>
                    </div>
                    <?php
                    if($ent == '2' or $ent == $tipoRadicadoPqr){
                        $col = '4';
                    }else{
                        $col = '4';
                    }
                    ?>
                    <div class="row">
                        <div class="form-group col-lg-<?=$col?> col-md-<?=$col?> col-xs-<?=$col?>">
                            <label for="direccion_us1">Direcci&oacute;n</label><br>
                            <INPUT type=text  name='direccion_us<?= $i ?>' value='<?= $dir ?>' <?= $bloqEdicion ?> class="tex_area form-control" id="direccion_us1" size=40 title="Campo que se autocompleta con la direccion del usuario o suscriptor consultado"> 
                        </div>
                        <div class="form-group col-lg-<?=$col?> col-md-<?=$col?> col-xs-3<?=$col?>">
                            <label for="telefono_us1">Tel&eacute;fono</label><br>
                            <input type=text name='telefono_us<?= $i ?>' value='<?= $tel ?>' <?= $bloqEdicion ?> class="tex_area form-control"id="telefono_us1"  size=35 title="Campo que se autocompleta con el telefono del usuario o suscriptor buscado">
                        </div>
                        <div class="form-group col-lg-<?=$col?> col-md-<?=$col?> col-xs-<?=$col?>">
                            <label for="mail_us1">Correo Electrónico</label><br>
                            <INPUT id="mail_us1" type=text name='mail_us<?= $i ?>' value='<?= $mail ?>' <?= $bloqEdicion ?> class="tex_area form-control" size=35 title="Campo que se autocompleta con el correo electronico del usuario o suscriptor buscado">
                        </div>
                        <input type="hidden" name="ent" id="ent" value="<?=$ent?>"/>
                        <?php //if($ent == '2' or $ent == $tipoRadicadoPqr){ ?>
                            <!-- <div class="form-group col-lg-<?=$col?> col-md-<?=$col?> col-xs-<?=$col?>">
                                <label for="sgd_ciu_eps">Eps</label><br>
                                <INPUT id="sgd_ciu_eps" type=text name='sgd_ciu_eps' value='<?= $sgd_ciu_eps ?>' <?= $bloqEdicion ?> class="tex_area form-control" size=35 title="Campo que se autocompleta con el correo electronico del usuario o suscriptor buscado">
                            </div> -->
                        <?php //}else{
                            ?>
                            <!-- <input type="hidden" name="sgd_ciu_eps" id="sgd_ciu_eps" value="<?=$sgd_ciu_eps?>"/> -->
                            <?php
                        //} ?>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-xs-12">
                            <?php
                            if ($i != 3) {
                                ?>
                                <label>Dignatario / Funcionario</label><br>
                                <input type='text' id='otro_us<?= $i ?>' name='otro_us<?= $i ?>' title="Campo para el ingreso de dignatario si existe" value="<?php echo htmlspecialchars(stripcslashes($otro)); ?>"  class='tex_area form-control' size='80' maxlength='50'>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3 col-md-3 col-xs-3">
                            <label for="idcont1">Continente</label><br>
                            <?php
                            /*  En este segmento trabajaremos macrosusticiï¿½n, lo que en el argot php se denomina Variables variables.
                             *  El objetivo es evitar realizar codigo con las mismas asignaciones y comparaciones cuya diferencia es el
                             *  valor concatenado de una variable + $i.
                             */
                            $var_cnt = "idcont" . $i;
                            $var_pai = "idpais" . $i;
                            $var_dpt = "codep_us" . $i;
                            $var_mcp = "muni_us" . $i;

                            /*  Se crean las variables cuyo contenido es el valor por defecto para cada combo, esto segï¿½n el siguiente orden:
                             *  1. Se pregunta si existe idcont1, idcont2 e idcont3 (segï¿½n iteracciï¿½n del ciclo), si es asï¿½ se asigna a $contcodi.
                             *  2. Sino existe (osea que no viene de buscar_usuario.php) se pregunta si existe "localidad" y se asigna el
                             *     respectivo cï¿½digo; de ser negativa la "localidad", $contcodi toma el valor de 0. Esto para cada
                             *     variable de continente, pais, dpto y mncpio respectivamente.
                             */

                            (${$var_cnt}) ? $contcodi = ${$var_cnt} : ($_SESSION['cod_local'] ? $contcodi = (substr($_SESSION['cod_local'], 0, 1) * 1) : $contcodi = 0 );
                            (${$var_pai}) ? $paiscodi = ${$var_pai} : ($_SESSION['cod_local'] ? $paiscodi = (substr($_SESSION['cod_local'], 2, 3) * 1) : $paiscodi = 0 );
                            (${$var_dpt}) ? $deptocodi = ${$var_dpt} : ($_SESSION['cod_local'] ? $deptocodi = $paiscodi . "-" . (substr($_SESSION['cod_local'], 6, 3) * 1) : $deptocodi = 0 );
                            (${$var_mcp}) ? $municodi = ${$var_mcp} : ($_SESSION['cod_local'] ? $municodi = $deptocodi . "-" . (substr($_SESSION['cod_local'], 10, 3) * 1) : $municodi = 0 );

                            //  Visualizamos el combo de continentes.
                            echo $Rs_Cont->GetMenu2("idcont$i", $contcodi, "0:<< seleccione >>", false, 0, " id=\"idcont$i\" CLASS=\"select form-control\" TITLE=\"Lista desplegable con continentes, cambia automaticamente una vez el nombre o suscriptor es consultado\" onchange=\"cambia(this.form, 'idpais$i', 'idcont$i')\" ");
                            $Rs_Cont->Move(0);
                            ?>
                        </div>
                        <div class="form-group col-lg-3 col-md-3 col-xs-3">
                            <label for="idpais1">Pa&iacute;s</label><br>
                            <?php
                            //  Visualizamos el combo de paises.
                            echo "<SELECT name=\"idpais$i\" id=\"idpais$i\" TITLE=\"Lista desplegable con paises, cambia automaticamente una vez el nombre o suscriptor es consultado\" CLASS=\"select form-control\" onchange=\"cambia(this.form, 'codep_us$i', 'idpais$i')\">";
                            while (!$Rs_pais->EOF and ( !$Submit4)) {

                                $pais_id0 = isset($Rs_pais->fields['ID0']) ? $Rs_pais->fields['ID0'] : $Rs_pais->fields['id0'];
                                $pais_id1 = isset($Rs_pais->fields['ID1']) ? $Rs_pais->fields['ID1'] : $Rs_pais->fields['id1'];
                                $pais_nombre = isset($Rs_pais->fields['NOMBRE']) ? $Rs_pais->fields['NOMBRE'] : $Rs_pais->fields['nombre'];

                                if ($pais_id0 == $contcodi) { //Si hay local Y pais pertenece al continente.
                                    ($paiscodi == $pais_id1) ? $s = " selected='selected'" : $s = "";
                                    echo "<option" . $s . " value='" . $pais_id1 . "'>" . $pais_nombre . "</option>";
                                }
                                $Rs_pais->MoveNext();
                            }
                            echo "</SELECT>";
                            $Rs_pais->Move(0);
                            ?>
                        </div>
                        <div class="form-group col-lg-3 col-md-3 col-xs-3">
                            <label for="codep_us1">Departamento</label><br>
                            <?php
                            echo "<SELECT name='codep_us$i' id='codep_us$i' CLASS=\"select form-control\" TITLE=\"Lista desplegable con departamentos, cambia automaticamente una vez el nombre o el suscriptor es consultado\" onchange=\"cambia(this.form, 'muni_us$i', 'codep_us$i')\">";
                            while (!$Rs_dpto->EOF and ( !$Submit4)) {

                                $dpto_id0 = isset($Rs_dpto->fields['ID0']) ? $Rs_dpto->fields['ID0'] : $Rs_dpto->fields['id0'];
                                $dpto_id1 = isset($Rs_dpto->fields['ID1']) ? $Rs_dpto->fields['ID1'] : $Rs_dpto->fields['id1'];
                                $dpto_nombre = isset($Rs_dpto->fields['NOMBRE']) ? $Rs_dpto->fields['NOMBRE'] : $Rs_dpto->fields['nombre'];

                                if ($dpto_id0 == $paiscodi) { //Si hay local Y dpto pertenece al pais.
                                    ($deptocodi == $dpto_id1) ? $s = " selected='selected'" : $s = "";
                                    echo "<option" . $s . " value='" . $dpto_id1 . "'>" . $dpto_nombre . "</option>";
                                }
                                $Rs_dpto->MoveNext();
                            }
                            echo "</SELECT>";
                            $Rs_dpto->Move(0);
                            ?>
                        </div>
                        <div class="form-group col-lg-3 col-md-3 col-xs-3">
                            <label for="muni_us1">Municipio</label><br>
                            <?php
                            echo "<SELECT name=\"muni_us$i\" id=\"muni_us$i\" CLASS=\"select form-control\" TITLE=\"Lista desplegable con municipios, cambia automaticamente una vez el nombre o el suscriptor es consultado\">";
                            while (!$Rs_mcpo->EOF and ( !$Submit4)) {

                                $mcpo_id0 = isset($Rs_mcpo->fields['ID0']) ? $Rs_mcpo->fields['ID0'] : $Rs_mcpo->fields['id0'];
                                $mcpo_id1 = isset($Rs_mcpo->fields['ID1']) ? $Rs_mcpo->fields['ID1'] : $Rs_mcpo->fields['id1'];
                                $mcpo_nombre = isset($Rs_mcpo->fields['NOMBRE']) ? $Rs_mcpo->fields['NOMBRE'] : $Rs_mcpo->fields['nombre'];

                                if ($_SESSION['cod_local']) { //Si hay local
                                    ($municodi == $mcpo_id1) ? $s = " selected='selected'" : $s = "";
                                    echo "<option" . $s . " value='" . $mcpo_id1 . "'>" . $mcpo_nombre . "</option>";
                                }
                                $Rs_mcpo->MoveNext();
                            }
                            echo "</SELECT>";
                            $Rs_mcpo->Move(0);

                            $municodi = 0;
                            $muninomb = "";
                            $deptocodi = 0;
                            ?>
                        </div>
                    </div>
                
        
      
        <?php
        }
        unset($contcodi);
        unset($paiscodi);
        unset($deptocodi);
        unset($municodi);

        if($ent == $tipoRadicadoPqr){
            $cols = "col-lg-4 col-md-4 col-xs-12";
            $displayClass = "block";
        }
        else{
            $cols = "col-lg-12 col-md-12 col-xs-12";
            $displayClass = "none";
        }   
        
        if($ent == $tipoRadicadoPqr or $ent == 2){
            $colsFolios = "col-lg-2 col-md-2 col-xs-12";
            $displayClassFolios = "block";
        }
        else{
            $colsFolios = "col-lg-3 col-md-3 col-xs-12";
            $displayClassFolios = "none";
        }
   
        ?>


                <div class="panel-body">
                    <?php if($ent == $tipoRadicadoPqr){ ?>
                        <div class="row">   
                            <div class="form-group <?=$cols?>" style="display:<?=$displayClass?>">
                                <label for="tipoUsuarioGrupo">Tipos de usuarios</label><br>
                                <?php
                                $query = "select nombre_tipo_usuario ,id_grupo_tipo_usuario from tipo_usuario_grupo order by id_grupo_tipo_usuario ";
                                $rs = $db->conn->query($query);
                                $opcMenu = "0:-- Seleccione tipo de usuario --";
                                $varQuery = $query;
                                if ($rs) {
                                    print $rs->GetMenu2("tipoUsuarioGrupo", $tipoUsuarioGrupo, "$opcMenu", false, "", "class='select form-control' title='Lista desplegable con los tipos de usuario' id='tipoUsuarioGrupo'");
                                }
                                ?>
                                <!--<input type="text" id="tiposUsus" name="tiposUsus" class="form-control" title="Campo que indica el tipo de usuario de la solicitud" ><?php echo $tiposUsus; ?></textarea>-->
                            </div>

                            <?php if($mostrarListados == true){
                                ?>
                                <div class="form-group <?=$cols?>" style="display:<?=$displayClass?>">
                                    <label for="tipoServicioPqrs">Servicio</label><br>
                                    <?php
                                    $queryservicio = "select nombre_servicio_pqrs, id_servicio_pqrs from servicios_pqrs order by id_servicio_pqrs ";
                                    $rsservicio = $db->conn->query($queryservicio);
                                    $opcMenuservicio = "0:-- Seleccione Servicio --";
                                    $varQuery = $queryservicio;
                                    if ($rsservicio) {
                                        print $rsservicio->GetMenu2("tipoServicioPqrs", $tipoServicioPqrs, "$opcMenuservicio", false, "", "class='select form-control' title='Lista desplegable con los servicios' id='tipoServicioPqrs'");
                                    }
                                    ?>
                                </div>
                                <div class="form-group <?=$cols?>" style="display:<?=$displayClass?>">
                                    <label for="tipoGrupoInteres">Centro de Atención</label><br>
                                    <?php
                                    $queryInteres = "select nombre_grupo_interes, id_grupo_interes from grupo_interes order by id_grupo_interes ";
                                    $rsInteres = $db->conn->query($queryInteres);
                                    $opcMenuInteres = "0:-- Seleccione Centro de Atenci&oacute;n --";
                                    $varQuery = $queryInteres;
                                    if ($rsInteres) {
                                        print $rsInteres->GetMenu2("tipoGrupoInteres", $tipoGrupoInteres, "$opcMenuInteres", false, "", "class='select form-control' title='Lista desplegable con los grupos de interes' id='tipoGrupoInteres'");
                                    }
                                    ?>
                                    <!--<input type="text" id="tiposUsus" name="tiposUsus" class="form-control" title="Campo que indica el tipo de usuario de la solicitud" ><?php echo $tiposUsus; ?></textarea>-->
                                </div>
                                
                                <?php
                            }?>                            
                            
                            
                        </div>
                    <?php } ?>
                    <div class="row">
                      <div class="form-group col-lg-12 col-md-12 col-xs-12">
                            <label for="asu">Asunto</label><br> 
                            <textarea id="asu" name="asu" cols="100" class="tex_area form-control" title="Area de texto para escribir el asunto del radicado" maxlength="50000" rows="2"><?php echo $asu; ?></textarea>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group <?=$colsFolios?>">
                            <label for="ane">Descripci&oacute;n Anexos</label><br>
                            <input name="ane" id="ane" type="text" title="Campo para agregar descripcion de los anexos" size="200" class="tex_area form-control" maxlength="200" onKeyPress="return isTextKey3(event)" value="<?php echo htmlspecialchars(stripcslashes($ane));?>">
                        </div>
                        <div class="form-group <?=$colsFolios?>" style="display:<?=$displayClassFolios?>">
                            <label for="radi_nume_hoja">N&uacute;mero de Folios</label><br>
                            <input name="radi_nume_hoja" id="radi_nume_hoja" type="numeric" title="Campo para agregar número de folios" onkeypress="return isNumberKey2(event)" class="tex_area form-control" maxlength="4" value="<?php echo $radi_nume_hoja;?>">
                        </div>
                        <div class="form-group col-lg-3 col-md-3 col-xs-12">
                            <?php
                            //by skina agregamos ent==4
                            if ($ent == 2 or $ent == 4) {
                                echo "<label for='med'>Medio Recepci&oacute;n</label>";
                            } else {

                                echo "<label for='med'>Medio Envio</label>";
                            }
                            /** Si la variable $faxPath viene significa que el tipo de recepcion es fax
                             * Por eso $med se coloca en 2
                             */
                            if(!$med){
                                if ($tipoMedio && $tipoMedio !="eMail"){
                                    $med = 4;
                                }elseif ($tipoMedio=="eMail" or $med==3){
                                    $med = 3;
                                }else{
                                    $med = 4;
                                }
                            }                            

                            ?><br>
                            <?php
                            $query = "Select MREC_DESC, MREC_CODI from MEDIO_RECEPCION ";
                            $rs = $db->conn->query($query);
                            $opcMenu = "0:-- Seleccione medio recepci&oacute;n --";
                            $varQuery = $query;
                            if ($rs) {
                                print $rs->GetMenu2("med", $med, "$opcMenu", false, "", "class='select form-control' title='Lista desplegable con medios de env&iacute;o o recepci&oacute;n' id='med'");
                            }
                            ?>
                        </div>
                        <div class="form-group col-lg-3 col-md-3 col-xs-12">
                            <?php
                            if($ent == $tipoRadicadoPqr){
                              echo '<label for="tdoc">Tipo Solicitud</label><br>';
                            }else{
                              echo '<label for="tdoc">Tipo Documental</label><br>';
                            }
                            ?>
                            
                            <input name="hoj" type=hidden value="<?php echo $hoj; ?>">
                            <?php
                            $query = "select SGD_TPR_DESCRIP,SGD_TPR_CODIGO from SGD_TPR_TPDCUMENTO WHERE SGD_TPR_TP$ent='1' and SGD_TPR_RADICA='1' ORDER BY SGD_TPR_DESCRIP ";
                            $opcMenu = "0:-- Seleccione un tipo --";
                            $fechaHoy = date("Y-m-d");
                            $fechaHoy = $fechaHoy . "";
                            $ADODB_COUNTRECS = true;
                            // $db->conn->debug=true;
                            $rs = $db->conn->query($query);
                            if ($rs && !$rs->EOF) {
                                $numRegs = "!" . $rs->RecordCount();
                                $varQuery = $query;
                                print $rs->GetMenu2("tdoc", $tdoc, "$opcMenu", false, "", "class='select form-control' onChange='typeDoc()' id='tdoc' title='Lista con tipos de dpcumentos'");
                            } else {
                                $tdoc = 0;
                            }
                            $ADODB_COUNTRECS = false;
                            ?>
                        </div>
                        <div class="form-group <?=$colsFolios?>">
                            <label for="birds2">D&iacute;as de T&eacute;rmino: </label><br>
                            <input id="birds2" class="form-control" title="Ingresar numero de dias de vencimiento del radicado" name="birds2" onkeypress="return isNumberKey2(event)" maxlength="2" size="2" value="<?= $birds22 ?>">
                            <input id="fechavencimientorad" type="text" class="form-control" title="Ingresar numero de dias de vencimiento del radicado" name="fechavencimientorad"  size="2" readonly="" value="<?=$fechavencimientorad?>">
                        </div>
                        <?php 
                        /** Jenny Gamez - 10/12/2019 
                        * Se realiza modificacion para que se muestre solo el confidencial o no en los radicados 
                        * de tipo entrada.
                        */
                        //if( $ent == 2 ) { 
                          ?>
                          <div id="div_ejetematico" class="row">
                              <div class="form-group col-lg-12 col-md-12 col-xs-12"  style="margin-left: 22px;">
                                  <?php
                                  if($radiNivelSeguridad == 1){
                                      $nivelSeguridad = 'checked';
                                  }else{
                                      $nivelSeguridad = '';
                                  }
                                  ?>
                                  <input type="checkbox" name="radiNivelSeguridad" id="radiNivelSeguridad" <?= $nivelSeguridad?> value="<?=$radiNivelSeguridad?>"><b> Marcar como confindencial el Radicado.</b>        
                              </div>                                                  
                          </div>
                        <?php //} 

                        /** Luis Miguel Romero - 10/12/2019 
                        * Se realiza modificacion para que se muestre solo el eje tematico cuando el 
                        * tipo de radicado sea PQRS. 
                        */

                        if( $ent == $tipoRadicadoPqr or $ent == 2) { 
                          ?>
                          <div id="div_ejetematico" class="row">
                              <div class="form-group col-lg-12 col-md-12 col-sx-12" style="margin-left: 22px;">
                                  <?php
                                  if($radiEnvioCorreo == 't'){
                                      $estadoCorreo = 'checked';
                                  }else{
                                      $estadoCorreo = '';
                                  }
                                  ?>
                                  <input type="checkbox" name="notificarmeCorreo" id="notificarmeCorreo" <?=$estadoCorreo?> value="true"><b> ¿Usted autoriza recibir respuesta por medio de correo electrónico?</b>        
                              </div>                                                  
                          </div>
                        <?php } ?>  
                    </div>
                </div>                                                                          

                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            <?php
                            if($ent != 2 && $ent != $tipoRadicadoPqr){  //Solo para tipo Entrada y PQRS
                                echo '<label for="coddepe">Punto de Salida: </label><br>';
                            }else{
                                echo '<label for="coddepe">Dependencia responsable:</label><br><br>';
                            }
                            ?>
                            <?php
                            // Busca las dependencias existentes en la Base de datos...
                            if($radi_depe_actu_padre and $tipoanexo==0 and !$coddepeinf)  $coddepe = $radi_depe_actu_padre;
                            if(!$coddepe){
                                $coddepe=$dependencia;
                            }

                            if($depende) {
                                $queryWhere=" where depe_codi='$depende' and depe_estado = 1";
                            }elseif($ent==2 or $ent==$tipoRadicadoPqr or $ent==7) {
                                $queryWhere =" where depe_estado = 1 ";
                            }else{
                                $queryWhere = " where depe_codi='$coddepe' and depe_estado = 1 ";
                            }

                            // Modificado SGD 11-Jul-2007
                            switch( $GLOBALS['entidad'] ){
                                case 'SGD':
                                    $query = "SELECT ".$db->conn->Concat( "DEPE_CODI", "'-'", "DEPE_NOMB" ).", DEPE_CODI
                                    FROM DEPENDENCIA
                                    $queryWhere
                                    ORDER BY DEPE_CODI, DEPE_NOMB";
                                    break;
                                default://query  para  modificar1
                                    $query = "SELECT ".$db->conn->Concat( "DEPE_CODI", "' - '", "DEPE_NOMB" ).", DEPE_CODI from dependencia $queryWhere order by depe_nomb";
                            }

                            $ADODB_COUNTRECS = true;
                            $rs=$db->conn->query($query);
                            $numRegs = "!".$rs->RecordCount();
                            $varQuery = $query;
                            $comentarioDev = "Muestra las dependencias";
                            if ($ent!=2 and $ent!=$tipoRadicadoPqr and $ent!=7 and !$Submit3=="ModificarDocumentos") {
                                print $rs->GetMenu2("coddepe",$coddepe, "0:-- Seleccione una Dependencia --", false," id='coddepe' class='select  form-control'");
                            } else{              
                               if(!isset($_POST['coddepe'])){
                                    if($coddepe == ''){
                                        print $rs->GetMenu2("coddepe","", "0:-- Seleccione una Dependencia --", false,"id='coddepe' class='select form-control' onchange='recargar2();'");
                                    }else{
                                        print $rs->GetMenu2("coddepe",$coddepe, "0:-- Seleccione una Dependencia --", false,"id='coddepe' class='select form-control' onchange='recargar2();'");
                                    }
                               } else{
                                    print $rs->GetMenu2("coddepe",$coddepe, "0:-- Seleccione una Dependencia --", false," id='coddepe' class='select form-control'"); 
                               }
                            } 
                            $ADODB_COUNTRECS = false;
                            ?>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            <label for="coddepe">Usuario responsable:</label> 
                            <?php
                            if($ent != 2 and $ent !=$tipoRadicadoPqr and $ent!= 7){

                                /** Se consulta la información del usuario responsable para mostrar el nombre completo del usuario responsable */
                                $usuarioInfo = "select usua_nomb from usuario where usua_codi=$codusuarioActu and depe_codi='$coddepe'";
                                $rsNombre = $db->conn->query($usuarioInfo);
                                $nombreUsuario = isset($rsNombre->fields['usua_nomb']) ? $rsNombre->fields['usua_nomb'] : $rsNombre->fields['USUA_NOMB'];

                                if($nombreUsuario){
                                    $nombreUsuario = $nombreUsuario;
                                }else{
                                    $nombreUsuario = $usua_nomb;
                                }

                                echo '<input type="text" class=" form-control" disabled value="'.$nombreUsuario.'"/>';
                            }else{
                                echo '<div id="recargado" align="left"></div>';
                            }
                            ?>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-xs-12">
                            <label for="coddepeinf">Copia de radicado a: </label><br>
                            <br>
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <label for="coddepeinf">Dependencias</label> 
                                    <?php
                                    // Modificado SGD 11-Jul-2007
                                    switch( $GLOBALS['entidad'] ){
                                        case 'SGD':
                                            $query = "SELECT  ".$db->conn->Concat( "DEPE_CODI", "' - '", "DEPE_NOMB" ).", DEPE_CODI
                                            FROM DEPENDENCIA
                                            ORDER BY DEPE_CODI, DEPE_NOMB";
                                            break;
                                        default:
                                            $query ="SELECT  ".$db->conn->Concat( "DEPE_CODI", "' - '", "DEPE_NOMB" ).", DEPE_CODI from DEPENDENCIA ORDER BY DEPE_NOMB";
                                    }
                                    $rs=$db->conn->query($query);
                                    $varQuery = $query;
                                    print $rs->GetMenu2("coddepeinf[]", $coddepeinf, false, true,5," onChange='cargarusuariocopiar();' id='coddepeinf' class='select form-control' title='Listado de dependencias, seleccione a la que desea informar'" );
                                    ?>
                                </div>   
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <label for="coddepeinf">Usuarios</label> 
                                    <select name="usCodSelect[]" id="usCodSelect" class="select form-control" multiple=""></select>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>                                                                                   
            </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-xs-12">
                            <?php                            
                            include "../include/tx/Tx.php";
                            include("../include/tx/Radicacion.php");
                            //include("$ruta_raiz/include/tx/Historico.php");
                            include("../class_control/Municipio.php");
                            include("../class_control/TipoDocumental.php");
                            $trd = new TipoDocumental($db);
                            $hist = new Historico($db);
                            $Tx = new Tx($db);
                            
                            if($Submit3=="Radicar"){

                                // $db->conn->debug = true;

                                $ddate=date("d");
                                $mdate=date("m");
                                $adate=date("Y");
                                $fechproc4=substr($adate,2,4);
                                $fechrd=$ddate.$mdate.$fechproc4;
                                if($fechproc12 == ''){
                                    $fechproc12 = date('d');
                                    $fechproc22 = date('m');
                                    $fechproc32 = date('y');
                                }
                                $fechrdoc=$fecha_gen_doc;
                                $apl .="";$apl=trim(substr($apl,0,50));
                                $sapl .="";$sapl=trim(substr($sapl,0,50));
                                $pnom .="";$pnom =trim(substr($pnom,0,89));
                                $adress .="";
                                $tip_rem +=0;
                                $tip_doc +=0;
                                $numdoc .='';$numdoc =trim(substr($numdoc,0,13));
                                $long=strlen($cod);
                                $codep +=0;
                                $tel +=0;
                                $cod +=0;
                                $radicadopadre .='';
                                $fechaQueja .= ''; // PENDIENTE
                                $asu.='';
                                $tip_rem=$tip_rem-1;
                                $rem2.='';
                                $dep +=0;
                                $hoj +=0;
                                $codieesp +=0;
                                $ane .='';
                                $med +=0;
                                $acceso = 1;
                                if($acceso==0) {}
                                else{   

                                        if($tip_rem<0){ $tip_rem=0; }
                                        if(!$documento_us3){ $documento_us3=0; }

                                        if($ent == 2 or $ent==7 or $ent==$tipoRadicadoPqr){

                                            if ($ent==2) $carp_codi ="0";
                                            else $carp_codi=$ent;
                                            $carp_per = "0";

                                            // Se valida si en la lista desplegable viene algun dato seleccionado se asigna ese usuario al usua_radi_actu, de lo contrario se busca cual es el número menor para esa dependencia y se asigna ese usuario como usuario dueño del radicado.
                                            if(!$usua_select){
                                                $selecUsuario = "select min(usua_codi) from usuario where depe_codi='".$coddepe."'";
                                                $resulUsuario = $db->conn->query($selecUsuario);
                                                $radi_usua_actu  = $resulUsuario->fields['MIN'];
                                            }else{
                                                $radi_usua_actu  = $usua_select;
                                            }
                                        }
                                        else{
                                            $carp_codi =$ent;
                                            $carp_per = "0";
                                            $radi_usua_actu = $codusuario;
                                        }

                                        if($coddepe == $dependenciaSalida){
                                            $carp_codi=substr($dependencia,0,2);
                                            $carp_per=1;
                                            $radi_usua_actu = 1;
                                        }
    
                                        if($radi_usua_actu_padre and $radi_depe_actu_padre){
                                            $radi_usua_actu= "$radi_usua_actu_padre";
                                            $coddepe= "$radi_depe_actu_padre";
                                        }

                                        // Buscamos Nivel de Usuario Destino
                                        error_reporting(7);
                                        $tmp_mun = new Municipio($db);
                                        $tmp_mun->municipio_codigo($codep_us1,$muni_us1);
                                        $rad = new Radicacion($db);
                                        $rad->radiTipoDeri = $tpRadicado;
                                        $rad->radiCuentai = "'".trim($cuentai)."'";
                                        $rad->eespCodi =  $documento_us3;
                                        $rad->mrecCodi =  $_POST['med']; // "dd/mm/aaaa"
                                        /* Se realiza validación para asignar el pre-radicado a un remitente y a un responsable para tramitar By - Skinatech - 04-09-2018 -- Para Accción Fiduciaria */
                                        if(isset($_POST['radinume']) && $_POST['radinume'] != ''){
                                            $numero =   $_POST['radinume'];
                                            $consulta = "select * from pre_radicado where radi_nume_radi='$numero' and estado=1";
                                            $resul = $db->conn->query($consulta); 
                                            $rad->radiFechOfic = $resul->fields["radi_fech_radi"];                    
                                        }else{
                                            $fecha_gen_doc_YMD = substr($fecha_gen_doc,6 ,4)."-".substr($fecha_gen_doc,3 ,2)."-".substr($fecha_gen_doc,0 ,2);
                                            $rad->radiFechOfic =  "'".$fecha_gen_doc_YMD."'";
                                        }

                                        if(!$radicadopadre)  $radicadopadre = null;
                                        $rad->radiNumeDeri = trim($radicadopadre);
                                        $rad->radiPais =  $tmp_mun->get_pais_codi();
                                        $rad->descAnex = $ane;
                                        //$rad->fechaQueja = $fechaQueja;
                                        $rad->raAsun = $asu;
                                        $rad->radiDepeActu = "'".$coddepe."'";
                                        $rad->radiDepeRadi = "'".$dependencia."'";
                                        $rad->radiUsuaActu = $radi_usua_actu;
                                        $rad->trteCodi =  $tip_rem;
                                        $rad->tdocCodi=$tdoc;
                                        $rad->tdidCodi=$tip_doc;

                                        /***
                                         * By- Skinatech -- Fecha: 01-12-2020
                                         * Se valida que solo se realice esto para cuando es radicación email y que adicional la lista del
                                         * tipo de radicado exista y sea diferente a 0
                                        ***/
                                        if (($tipoMedio=="eMail" or $med==3) && isset($_POST['tipoRadEmail']) && $_POST['tipoRadEmail'] != 0){
                                            $ent = $_POST['tipoRadEmail'];  // Valor de tipo de radicado
                                            // Si el valor que se recibe es 2 = Entrada se debe poner 0 = carpeta Entrada
                                            if($_POST['tipoRadEmail'] == 2) { $_POST['tipoRadEmail'] = 0; }
                                            $carp_codi = $_POST['tipoRadEmail'];
                                        }
                                        $rad->carpCodi = $carp_codi;
                                        
                                        $rad->carPer = $carp_per;
                                        $rad->trteCodi=$tip_rem;
                                        $rad->ra_asun = htmlspecialchars(stripcslashes($asu));
                                        $rad->radiPath = 'null';
                                        $rad->sgd_spub_codigo = isset($radiNivelSeguridad) ? 1 : 0; 
                                          
                                        /** 
                                         * By - Skinatech
                                         * Se valida si las listas desplegables del tipo de radicado de Pqrs 
                                         * tienen información selecciona. $tipoUsuarioGrupo, $tipoServicioPqrs, $tipoGrupoInteres
                                         **/  
                                        if($tipoUsuarioGrupo == ''){
                                            $rad->tipoUsuarioGrupo =  'null';
                                        }else{
                                            $rad->tipoUsuarioGrupo = $tipoUsuarioGrupo;
                                        }

                                        if($tipoServicioPqrs == ''){
                                            $rad->tipoServicioPqrs =  'null';
                                        }else{
                                            $rad->tipoServicioPqrs = $tipoServicioPqrs;
                                        }

                                        if($tipoGrupoInteres == ''){
                                            $rad->tipoGrupoInteres =  'null';
                                        }else{
                                            $rad->tipoGrupoInteres = $tipoGrupoInteres;
                                        }
                                        
                                        /**
                                         * Skinatech
                                         * Autor: Jenny Gamez
                                         * Fecha: 03-11-2019
                                         * Info: Estas variables guarda la información relacionada a si autoriza o no el envio de notificaciones por correo electronico y si el documento o radicado es publico
                                        **/
                                        $fechaVencimientorad = date('Y/m/d', strtotime($fechavencimientorad));
                                        $rad->radiDocuPublico = 'false';
                                        $rad->fechVcmto = "'".$fechaVencimientorad."'";
                                            
                                        if($notificarmeCorreo == ''){
                                            $rad->radiEnvioCorreo =  'null';
                                        }else{
                                            $rad->radiEnvioCorreo = $notificarmeCorreo;
                                        }
                                                                                        
                                        // El campo radi_estado_pqrs aplica unicamente a la PQRs y entrada ya que es
                                        // el unico radicado que se va a tratar con estados.
                                        if($ent == $tipoRadicadoPqr or $ent == 2){
                                            $rad->radi_estado_pqrs = 2; 
                                            $rad->radiNumeHoja = $radi_nume_hoja;
                                        }else{
                                            $rad->radi_estado_pqrs =  'null';
                                            $rad->radiNumeHoja = 0;
                                        }
                                        
                                        if (strlen(trim($aplintegra)) == 0) $aplintegra = "0";

                                        $rad->sgd_apli_codi = $aplintegra;
                                        $codTx = 2;
                                        $flag = 1;

                                        /**
                                         * By - Skinatech - 04-09-2018 -- Para Accción Fiduciaria
                                         * Se realiza validación para asignar el pre-radicado a un remitente 
                                         */
                                        if(isset($_POST['radinume']) && $_POST['radinume'] != ''){
                                            $numero =   $_POST['radinume'];
                                            $consulta = "update pre_radicado set estado = 0 where radi_nume_radi='$numero'";
                                            $resul = $db->conn->query($consulta);                    
                                        }else{
                                            $numero = '';
                                        }

                                        /**
                                         * Si la dependencia que tiene sesión iniciada es igual a pruebas ejecute siempre 
                                         * la secuencia de pruebas es decir la que tenga la dependencia 998.
                                         **/
                                        if($_SESSION["dependencia"] == $_SESSION["dependenciaPruebas"]){
                                            $noRad = $rad->newRadicado($ent, $_SESSION["dependenciaPruebas"],$db->driver,$numero);
                                        }else{
                                            $noRad = $rad->newRadicado($ent, $tpDepeRad[$ent],$db->driver,$numero);
                                        }

                                        if ($noRad=="-1")
                                            die("<hr><b><font color=red><center>Error no genero un Numero de Secuencia o Inserto el radicado<br>SQL </center></font></b><hr>");

                                        if(!$noRad) echo "<hr>RADICADO GENERADO <HR>$noRad<hr>";
                                        $radicadosSel[0] = $noRad;

                                        $selecthistorico = "select count(*) as count from hist_eventos where usua_doc_old = '1'";
                                        $resulthistorico = $db->conn->query($selecthistorico);
                                        $count = $resulthistorico->fields['COUNT'];
                                        if($count == 0){  $result = '1'; }
                                        else{ $result = ''; }

                                        $hist->insertarHistorico($radicadosSel,  $dependencia , $codusuario, $coddepe, $radi_usua_actu, " Se ha radicado correctamente el documento ", $codTx, $result);

                                        // Se valida si el radicado es confidencial para que se guarde en el historico del radicado.
                                        if($radiNivelSeguridad == 1){
                                            $observa = "Radicado Confidencial";
                                            $radiModi = $hist->insertarHistorico($radicadosSel, $dependencia, $codusuario, $coddepe, $radi_usua_actu, $observa, 54);
                                        }

                                        $nurad = $noRad;
                                        echo "<INPUT TYPE=HIDDEN NAME=nurad value=$nurad>";
                                        echo "<INPUT TYPE=HIDDEN NAME=flag value=$flag>";

                                        if (is_array($usCodSelect)){ 
                                            reset($usCodSelect);
                                            foreach ($usCodSelect as $var) {
                                                $depsel8 = preg_split("/[\s-]+/", $var);
                                                $usCodSelect = $depsel8[1];
                                                $depsel8 = $depsel8[0];
                                                $nombTx = "Se ha generado el radicado No.$nurad y se esta notificando.";
                                                $usCodDestino = $Tx->informar($nurad, $krd, $depsel8, $dependencia, $usCodSelect, $codusuario, $nombTx, $usua_doc) . ", ";

                                                $usCodDestino = substr($usCodDestino, 0, strlen(trim($usCodDestino)) - 1);
                                                //Modificacion skina para enviar email de notificacion
                                                $radicadosSel1 = $nurad;
                                                if (!strpos($usCodDestino, ','))
                                                    $usCodDestino = $usCodDestino;
                                                    $usuariosInfromados .= ','.$usCodDestino;
                                                }
                                                echo "<script>window.open(\"../radicacion/mailInformar.php?dependencia=$depsel8&usunom=$usuariosInfromados&verrad=&radi_nume=$radicadosSel1&asunto=$observa&tx=Informado&codusu=$usCodSelect\", 'Modificacion_de_Datos', 'height=300,width=350,scrollbars=yes');</script>"; 
                                            }
                                        
                                            if($noRad) {
                                                $var_envio = session_name()."=".session_id()."&faxPath&leido=no&krd=$krd&verrad=$nurad&ent=$ent";
                                                ?>
                                                
                                                <center>
                                                    <img src='../iconos/img_alerta_2.gif' title="Icono de alerta">
                                                    <font face='Arial' size='3'><b>
                                                        Se ha generado el radicado No.<b>
                                                    </font>
                                                    <font face='Arial' size='4' color='red'><b><u>
                                                        <?php
                                                        // By Skinatech - 14/08/2018
                                                        if ($estructuraRad == 'ymd'){
                                                            $num = 8;
                                                        }elseif ($estructuraRad == 'ym') {
                                                            $num = 6;
                                                        }else {
                                                            $num = 4;
                                                        }

                                                        $numeroRadSeparado = substr($noRad, 0, $num) . "-" . substr($noRad, $num, $longitud_codigo_dependencia) . "-" . substr($noRad, ($num + $longitud_codigo_dependencia), 6) . "-" . substr($noRad, -1);
                                                        echo $nurad;
                                                        ?>
                                                    </u></b>
                                                    </font>
                                                    <br>
                                                    <?php
                                                    echo "<script language='Javascript'>alert('Radicado creado exitosamente');</script>";

                                                    /**Modificado skina para enviar correo en radicacion de entrada***/
                                                    if( $ent==2 or $ent== 7 or $ent==$tipoRadicadoPqr){
                                                        echo "<script>window.open('../radicacion/mail.php?codusu=$radi_usua_actu&verrad=$nurad&asunto=$asu&nombre=$nombre_us1&apellido=$prim_apel_us1&fecha=$fecha_gen_doc&tx=Radicado&count=$count', 'Modificacion_de_Datos', 'height=200,width=250,scrollbars=yes');</script>";
                                                        //echo "<script>window.open('../radicacion/mailInformarPqr.php?codusu=$radi_usua_actu&verrad=$nurad&asunto=$asu&nombre=$nombre_us1&apellido=$prim_apel_us1&fecha=$fecha_gen_doc&tx=Radicado&count=$count&notificacion=crear', 'Modificacion_de_Datos', 'height=200,width=250,scrollbars=yes');</script>";
                                                    }
                                                    else{
                                                       echo "<script>window.open('../radicacion/mail.php?codusu=$codusuario&verrad=$nurad&asunto=$asu&nombre=$nombre_us1&apellido=$prim_apel_us1&fecha=$fecha_gen_doc&tx=Radicado&count=$count', 'Modificacion_de_Datos', 'height=200,width=250,scrollbars=yes');</script>";
                                                       echo "<script>window.open('../verradicado.php?verrad=$nurad&var_envio=$var_envio".$datos_envio."&datoVer=985&dir_raiz=".$dir_raiz."&menu_ver_tmp=2', 'Modificaciï¿½n_de_Datos', 'height=700,width=650,scrollbars=yes');</script>";
                                                    }

                                                    //by skinatech, grabamos datos de dias de termino
                                                    $mod=0;
                                                    include_once "./grabar_dt.php";
                                                    
                                                    if($eMailMid){
                                                        if($tipoMedio=="eMail" || $med=="3"){
                                                            $varEnvio = session_name()."=".session_id()."&nurad=$nurad"."&eMailMid=".$_GET['eMailMid']."&eMailPid=".$_GET['eMailPid'] . "&folder=".$_GET['folder'];
                                                           
                                                            if(isset($facElect) && $facElect == 1){
                                                                $eMailMid = $_GET['eMailMid'];
                                                                //$varEnvio .= '&uzpFldr='. $uzpFldr.'&nadj='.$nadj.'&facElect=1';
                                                                require_once('../facturacionElectronica/grabarArchivos.php');
                                                            }else{
                                                                require_once('../email/emailGrabarArchivos.php');
                                                                ?>
                                                                <!--<center>
                                                                <input class="botones_largo" value ="ASOCIAR EMAIL A RADICADO" type=button target= 'UploadFax' onclick="window.open('../email/uploadMail.php?<?=$varEnvio?>','formulario', 'height=400, width=640,left=350,top=300')">
                                                                </center>-->                                                                
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>  
                                                </center>
                                                <?php
                                            } else {
                                                echo "<font color=red >Ha ocurrido un Problema<br>Verfique los datos e intente de nuevo</font>";
                                            }

                                            $sgd_dir_us2=2;
                                            $conexion = $db;
                                            error_reporting(7);
                                            include "grb_direcciones.php";
                                            $verradicado = $nurad;
                                        }

                                        echo  "<INPUT TYPE=HIDDEN NAME=nurad value=$nurad>";
                                        echo  "<INPUT TYPE=HIDDEN NAME=codusuarioActu value=$codusuarioActu>";
                                        echo  "<INPUT TYPE=HIDDEN NAME='codieesp' value='$codieesp'>";
                                        echo "<INPUT TYPE=HIDDEN NAME='flag' value='$flag'>";
                                }

                                $vector = $coddepeinf;
                                if($vector){
                                error_reporting(0);
                                foreach ($vector as $key => $coddepeinf){
                                        if( ($coddepeinf!=999) and ($Submit3 or $Submit4)){
                                            $flag=0;
                                            //Modificado skina 020709
                                            if(($coddepeinf!=$coddepe or ($cod_usuario_inf!=1 and $coddepeinf==$coddepe)) and $Submit3 and ($ent==2 or $ent==$tipoRadicadoPqr)){
                                                /* INFORMACION DE ENVIO DE UN RADICADO EL CUAL EL PADRE ESTA EN UNA DEPENDENCIA DIFERENTE
                                                * $observa_add   contiene el mensaje que se enviara al informado
                                                * El mensaje cambia dependiendo a la persona que va.
                                                * Si va a un funcinario le informa al jefe de lo contrario informa a la otra dependencia
                                                **/
                                                //Modificado skina 020709

                                                if($cod_usuario_inf!=1 and $coddepeinf==$coddepe and ($ent==2 or $ent==$tipoRadicadoPqr)){
                                                    $observa_inf = "El documento Anexo del Radicado $radicadopadre se envio directamente al funcionario";
                                                    $cod_usuario_inf = 1;
                                                }else{
                                                    $observa_inf = "El documento Anexo del Radicado $radicadopadre se envio a la dep. $coddepe";
                                                    $cod_usuario_inf = 1;
                                                }
                                            }else{
                                                if(!$Submit4){
                                                    $observa_add = "";
                                                    $coddepeinf="";
                                                }
                                            }
                                        }
                                }
                            }

                            $coddepeinf = $vector;

                            if(!$radi_usua_actu){
                                $radi_usua_actu = $codusuarioActu;
                            }

                            if(($Submit4 or $Submit44) and !$Buscar){

                                //$db->conn->debug = true;

                                $secuens=str_pad($consec,6,"0",STR_PAD_LEFT);
                                $fechproc4=substr($adate,2,4);
                                $fechrd=$ddate.$mdate.$fechproc4;
                                $fechrdoc=$fechproc12.$fechproc22.$fechproc32;
                                $apl .=' ';$apl=trim(substr($apl,0,50));
                                $sapl .=' ';$sapl=substr($sapl,0,50);
                                $pnom .=' ';$pnom =substr($pnom,0,89);
                                $adress .=' ';
                                $tip_rem +=0;$tip_doc +=0;$numdoc .='';$numdoc =trim(substr($numdoc,0,13));
                                $codieesp +=0;$radicadopadre +=0;$long=strlen($cod);
                                $codep +=0;$tel +=0;$cod +=0;$fechaQueja.='';$asu.='';$tip_rem=$tip_rem-1;
                                $rem2.='';
                                $dep +=0;
                                $hoj +=0;
                                $ane .='';
                                $med +=0;
                                if($tip_rem<0){
                                    $tip_rem=0;
                                }
                                if(!$documento_us3){  $documento_us3 = 0; }
                                /** 
                                * En esta linea si la dependencia es 999 ke es la dep. de salida envia el radicado a una
                                * carpeta con el codigo de los dos primeros digitos de la dependencia
                                **/
                                $carp_codi=$ent;
                                $carp_per=0;
                                
                                if($coddepe=='0999') {
                                    $carp_codi=substr($dependencia,0,2);
                                    $carp_per=1;
                                    $radi_usua_actu = 1;
                                }

                                $rad = new Radicacion($db);
                                $rad->radiTipoDeri = $tpRadicado;
                                $rad->radiCuentai = "'$cuentai'";
                                $rad->eespCodi =  $documento_us3;
                                $rad->mrecCodi =  $med;
                                $rad->radiFechOfic =  $fecha_gen_docF;
                                $fecha_gen_doc_YMD = substr($fecha_gen_doc,6 ,4)."-".substr($fecha_gen_doc,3 ,2)."-".substr($fecha_gen_doc,0 ,2);
                                $rad->radiFechOfic =  $fecha_gen_doc_YMD;

                                if(!$radicadopadre)  $radicadopadre = null;
                                $rad->radiNumeDeri = $radicadopadre;
                                $rad->radiPais =  "170";
                                $rad->descAnex = $ane;
                                // $rad->fechaQueja = $fechaQueja;
                                $rad->raAsun = $asu;
                                $rad->radiDepeActu = $coddepe ;
                                $rad->radiUsuaActu = $radi_usua_actu;
                                $rad->trteCodi =  $tip_rem;
                                $rad->tdocCodi=$tdoc;
                                $rad->tdidCodi=$tip_doc;
                                $rad->carPer = $carp_per;
                                $rad->trteCodi=$tip_rem;
                                $rad->ra_asun = $asu;
                                $rad->sgd_spub_codigo = isset($radiNivelSeguridad) ? 1 : 0;  

                                /** 
                                 * By - Skinatech
                                 * Se valida si las listas desplegables del tipo de radicado de Pqrs 
                                 * tienen información selecciona. $tipoUsuarioGrupo, $tipoServicioPqrs, $tipoGrupoInteres
                                **/  
                                if($tipoUsuarioGrupo == ''){
                                  $rad->tipoUsuarioGrupo =  'null';
                                }else{
                                  $rad->tipoUsuarioGrupo = $tipoUsuarioGrupo;
                                }

                                if($tipoServicioPqrs == ''){
                                  $rad->tipoServicioPqrs =  'null';
                                }else{
                                  $rad->tipoServicioPqrs = $tipoServicioPqrs;
                                }

                                if($tipoGrupoInteres == ''){
                                  $rad->tipoGrupoInteres =  'null';
                                }else{
                                  $rad->tipoGrupoInteres = $tipoGrupoInteres;
                                }

                                /**
                                * Skinatech
                                * Autor: Jenny Gamez
                                * Fecha: 03-11-2019
                                * Info: Estas variables guarda la información relacionada a si autoriza o no el envio de notificaciones por correo electronico y si el documento o radicado es publico
                                **/
                                $fechaVencimientorad = date('Y/m/d', strtotime($fechavencimientorad));
                                $rad->radiDocuPublico = 'false';
                                $rad->fechVcmto = "'".$fechaVencimientorad."'";

                                if($notificarmeCorreo == ''){
                                    $rad->radiEnvioCorreo =  'null';
                                }else{
                                    $rad->radiEnvioCorreo = $notificarmeCorreo;
                                }
                                
                                // El campo radi_estado_pqrs aplica unicamente a la PQRs ya que es
                                // el unico radicado que se va a tratar con estados.
                                if($ent == $tipoRadicadoPqr  or $ent == 2){
                                    $rad->radi_estado_pqrs = 2; 
                                    $rad->radiNumeHoja = $radi_nume_hoja;
                                }else{
                                    $rad->radi_estado_pqrs = 'null';
                                    $rad->radiNumeHoja = 0;
                                }

                                if (strlen(trim($aplintegra)) == 0)
                                    $aplintegra = "0";

                                $rad->sgd_apli_codi = $aplintegra;

                                /** 
                                 * Verifica si el tipo de documento fue cambiado, para actualizarlo
                                 * en la tabla que se usa para almacenar los datos de OCR
                                 **/
                                $queryTipoDoc = "select tdoc_codi from radicado where radi_nume_radi='$nurad'";
                                $comparacionTipoDoc = $db->conn->execute($queryTipoDoc)->fetchRow();

                                if($comparacionTipoDoc['tdoc_codi'] != $tdoc){    
                                    try {
                                        // error_log("#### Actualizacion tipo documental ". $comparacionTipoDoc['tdoc_codi'] ." -> ". $tdoc );  
                                        $queryFechaIndex = "select last_update from sphinx_index_meta";
                                        /*Se actualizará la fecha de creación del indice para que sea actualizado
                                         * en la siguiente indexación, por ello la fecha debe ser superior a la fecha 
                                         * de la última indexación (actualización de un radicado en la mitad de un proceso de indexacion)
                                         */
                                        $fechaIndex = $db->conn->execute($queryFechaIndex)->fetchRow();
                                        $fechaIndex = date('Y-m-d H:i:s', strtotime($fechaIndex['last_update']." + 5 minute"));
                                        $existeIndice = $db->conn->query("select indice from datosocr where nume_radi='$nurad'");
                                        if(!$existeIndice->EOF && $existeIndice->fields["indice"] != ''){
                                            //error_log("#### Indice a actualizar ". $existeIndice->fields["indice"] );
                                            $queryActualizaindice = "update datosocr set tdoc_codi=$tdoc, fechaocr='" . $fechaIndex . "' where nume_radi='$nurad'";
                                            $db->conn->execute($queryActualizaindice);
                                        }
                                    } catch (Exception $ex) {
                                    // error_log("#### Error actualizando indice OCR". $ex );
                                    }
                                }

                                $datoAnteAsun != $rad->raAsun ? $modif = ' en el asunto del radicado' : $modif = '';
                                $datoAnteDocR != $documento ? $modif = ' en el remitente/destinatario del radicado' : $modif = '';
                                $datoAnteTrds != $codserie ? $modif = ' en la trd del radicado' : $modif = '';
                                $datoAnteDesA != $rad->descAnex ? $modif = ' en la descripcion de anexos del radicado' : $modif = '';

                                $resultado = $rad->updateRadicado($nurad);

                                $conexion = $db;
                                include "grb_direcciones.php";
                                if($resultado){

                                    echo "<center><label class='alarmas alarmasOk'>Radicado No $nurad fue Modificado Correctamente, </label></center>";
                                    $radicadosSel[] = $nurad;
                                    $codTx = 11;
                                    $hist->insertarHistorico($radicadosSel,  $dependencia , $codusuario, $coddepe, $radi_usua_actu, "Modificacion Documento ".$modif, $codTx);

                                    // Se valida si el radicado es confidencial para que se guarde en el historico del radicado.
                                    if($radiNivelSeguridad == 1){
                                        $observa = "Radicado Confidencial";
                                        $radiModi = $hist->insertarHistorico($radicadosSel, $dependencia, $codusuario, $coddepe, $radi_usua_actu, $observa, 54);
                                    }

                                    //by skinatech, grabamos datos de dias de termino
                                    $mod=1;
                                    include_once "./grabar_dt.php";

                                    if (is_array($usCodSelect)){
                                        reset($usCodSelect);
                                        foreach ($usCodSelect as $var) {
                                            $depsel8 = preg_split("/[\s-]+/", $var);
                                            $usCodSelect = $depsel8[1];
                                            $depsel8 = $depsel8[0];
                                            $nombTx = "Se ha generado el radicado No.$nurad y se esta notificando.";
                                            $usCodDestino = $Tx->informar($nurad, $krd, $depsel8, $dependencia, $usCodSelect, $codusuario, $nombTx, $usua_doc) . ", ";

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

                                //$db->conn->debug = true;
                                if($borrarradicado){
                                    $flag=0;
                                    $observa = "Se borro de Inf. ($krd)";
                                    $depbrr = substr($borrarradicado,0,3);
                                    $fechbrr = substr($borrarradicado,3,20);
                                    $data6 = substr($borrarradicado,3,50);
                                    $radicadosSel [0] = $nurad;
                                    $nombTx = "Borrar Informados";
                                    $codTx = 7;
                                    $isql_inf= "delete from informados where depe_codi='$depbrr' and radi_nume_radi='$nurad' and info_desc like '%$data6%'";
                                    $rs=$db->conn->query($isql_inf);
                                    $hist->insertarHistorico($radicadosSel,  $dependencia , $codusuario, $coddepe, $radi_usua_actu, $observa, $codTx);

                                    if($flag==1){
                                        echo "No se ha borrado la inf. de la dependencia $depbrr<br>";
                                    }else{
                                        echo "<font color=red><center>Se ha borrado un Inf. y registrado en eventos</center><br></font><br>";
                                    }
                                }
                            }

                            if($nurad){
                               ?>
                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12 col-xs-12">
                                        <center>
                                        <label for="coddepeinf">Se ha informado a:</label> <br />
                                            <?php
                                                $query2 = "select b.depe_nomb ,a.INFO_DESC ,b.DEPE_NOMB ,a.DEPE_CODI ,a.info_fech as INFO_FECH ,INFO_DESC from informados a,dependencia b where a.depe_codi=b.depe_codi and a.radi_nume_radi ='$nurad' order by info_fech desc ";
                                                $rsInformados=$db->conn->query($query2); 
                                                
                                                if($rsInformados){ 
                                                    echo '<table border=1 class=borde_tab width=90% style="font-size:small">';
                                                    echo '<tr>';
                                                    echo '<td>Descripción</td>';
                                                    echo '<td>Nombre Dependencia</td>';
                                                    echo '<td>Fecha Informado</td>';
                                                    echo '</tr>'; 
                                                    foreach ($rsInformados as $value) { 
                                                        $data5 = date("d-m-Y", $db->conn->UnixTimeStamp($value['INFO_FECH']));
                                                        $data6 = $db->conn->UnixTimeStamp($value['INFO_DESC']);

                                                        echo "<tr>";
                                                            echo "<td>".$value['INFO_DESC']."</td>";
                                                            echo "<td>".$value['DEPE_CODI']."-".$value['DEPE_NOMB']."</td>";
                                                            echo "<td>".$data5."</td>"; 
                                                        echo "</tr>"; 
                                                    } 
                                                    echo '</table>'; 
                                                } 
                                            ?>
                                        <input type="hidden" name="depende" value="<?php echo $depende; ?>" /><br/>
                                        </center>
                                    </div>
                                </div>
                               <?php 
                            }
                            echo "<INPUT TYPE=HIDDEN NAME=codusuarioActu value=$codusuarioActu>";
                            echo "<INPUT TYPE=HIDDEN NAME=radicadopadre value=$radicadopadre>";
                            echo "<INPUT TYPE=HIDDEN NAME=radicadopadreseg value=2>";
                            echo "<INPUT TYPE=HIDDEN NAME='codieesp' value='$codieesp'>";
                            echo "<INPUT TYPE=HIDDEN NAME='consec' value='$consec'>";
                            echo "<INPUT TYPE=HIDDEN NAME='seri_tipo' value='$seri_tipo'>";
                            echo "<INPUT TYPE=HIDDEN NAME='radi_usua_actu' value='$radi_usua_actu'>";

                            if(!$Submit3 and !$Submit4){
                                ?>
                                <center>
                                    <input type='button' onClick='radicar_doc()' name='Submit33' id='Submit33' value='Asignar Radicado' class="botones_largo">
                                    <input type='hidden'  name='Submit3' value='Radicar' class='ebuttons2'>
                                </center>
                                <?php
                            }else{
                                // Modificacion variable para agregar campos necesarios de sticker web
                                $varEnvio = session_name()."=".session_id()."&faxPath&leido=no&krd=$krd&faxPath=$faxPath&verrad=$nurad&nurad=$nurad&ent=$ent&remite=$grbNombresUs1&dependenciaDestino=$dependencia";
                                ?>
                                <center>
                                    <input type='button' onClick='modificar_doc()' name='Submit44' value='Modificar datos' class="botones_largo">
                                    <br>
                                    <input type='hidden'  name='Submit4' value='Modificar Datos' class='ebuttons2'>
                                    <input type='hidden' name='nurad' value='<?=$nurad?>'>
                                </center>
                                <center>
                                    <br>
                                    <font face='Arial' size='3' color='black'>Haga click en el c&oacute;digo de barras para imprimir el sticker</font>
                                    <br>
                                    <a href="#"  class=vinculos onClick="window.open ('stickerWeb/index.php?<?=$varEnvio?>&alineacion=Center','sticker<?=$nurad?>','menubar=0,resizable=0,scrollbars=0,width=400,height=130,toolbar=0,location=0');"><img src="stickerWeb/codigoBarras.png" alt="Al dar click en la imagen se abrìra una nueva ventana que ejecutara la accion de imprimir" width="300" height="80" border="0"></a>
                                    <br>
                                </center>
                                <?php
                            }
                            ?>
                        </div>                                                                             
                    </div>
                
        </div>
    </div>
</form>


<?php
    $verrad = $nurad;
    $radi = $nurad;
    $contra = $drde;
    $tipo = 1;
    if($Submit3 or $Submit4 or $rad0 or $rad1 or $rad2)
    {   echo "<script language='JavaScript'>";
        for ($i=1; $i<=3; $i++)
        {   $var_pai = "idpais".$i;
            $var_dpt = "codep_us".$i;
            $var_mcp = "muni_us".$i;
            $muni_tmp = ${$var_mcp};
            if (!(is_null($muni_tmp)))
            {   echo "\n";
                echo "cambia(document.formulario, 'idpais$i', 'idcont$i');
                    formulario.idpais$i.value = ${$var_pai};
                    cambia(document.formulario, 'codep_us$i', 'idpais$i');
                    formulario.codep_us$i.value = '${$var_dpt}';
                    cambia(document.formulario, 'muni_us$i', 'codep_us$i');
                    formulario.muni_us$i.value = '${$var_mcp}';";
            }
        }
        echo "</script>";
    }
?>
</body>
</html>
