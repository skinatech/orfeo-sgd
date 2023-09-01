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
$url_raiz = "..";
$dir_raiz = "..";
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$depeNomb = $_SESSION["depe_nomb"];
$abreviatura = $_SESSION["abreviatura"];
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
// echo '<pre>';
// print_r($_SESSION);

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
  
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

$assoc = $_SESSION['assoc'];
define('ADODB_ASSOC_CASE', $assoc);

$krd = $_SESSION["krd"];
// $depe_codi = $_SESSION["depecodi"];
$usua_codi = $_SESSION["codusuario"];
$usua_doc = $_SESSION["usua_doc"];
$usua_nomb = $_SESSION["usua_nomb"];
$dep_sel = ( isset($_POST['dep_sel']) ? $_POST['dep_sel'] : 0 );
$usu_sel = ( isset($_POST['usu_sel']) ? $_POST['usu_sel'] : 0 );
$fecharchivo = ( isset($_POST['fecharchivo']) ? $_POST['fecharchivo'] : date('Y-m-d') );
// $_SESSION['archivo_pdf'] = '';
$archivo_pdf = ( isset($_SESSION['archivo_pdf']) ? $_SESSION['archivo_pdf'] : '' );

include("$dir_raiz/config.php");
if (!isset($_SESSION['dependencia']))
    include $dir_raiz."/rec_session.php";
if (isset($db))
    unset($db);
include_once($dir_raiz."/include/db/ConnectionHandler.php");
// include_once($dir_raiz."/include/PHPMailer/class.phpmailer.php");
include_once($dir_raiz."/include/PHPMailer5.2/PHPMailerAutoload.php");

$db = new ConnectionHandler("$dir_raiz");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
$sqlFechaHoy = $db->conn->OffsetDate(0, $db->conn->sysTimeStamp);
// $db->conn->debug=true;

// echo '<pre>';
// print_r($_POST);
// print_r($_GET);
// print_r($_SESSION);

?>
<head>
    <title>SGD Orfeo 6 </title>
    <link rel="stylesheet" href="<?= $url_raiz . $_SESSION["ESTILOS_PATH_ORFEO"] ?>">
    <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
    <script src="../estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.dataTables.min.js" ></script>
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <!-- <link href="../estilos/orfeo50/bootstrap.css" rel="stylesheet" type="text/css"/> -->
    <link href="./css/estilos.css" rel="stylesheet" type="text/css"/>
    <script src="../estilos/js/bootstrap.js" ></script>
    <script src="js/remove-accents/index.js" ></script>
    <!-- <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" /> -->
    <link type="text/css" href="jquery-datatables-checkboxes-1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
    <!-- <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script> -->
    <script type="text/javascript" src="jquery-datatables-checkboxes-1.2.11/js/dataTables.checkboxes.min.js"></script> 
    <style type="text/css">
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('images/loader.gif') 50% 50% no-repeat rgb(249,249,249);
            opacity: .8;
        }

        .download-link {
          text-decoration: none;
          border: 1px solid #ccc;
          padding: .5em;
          font-family: Helvetica;
          color: #c00;
          display: block;
          text-align: center;
          margin: 1em 0;
        }

        .alert-informacion {
            font-size: 14px;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid transparent;
            color: #31708f;
            background-color: #d9edf7;
            border-color: #bce8f1;
        }
    </style>
</head>
<script>
	function cambiarUsuario( id ){
		document.all.formBus.submit();
	}

	function actionBuscar(){

		var campos = ['dep_sel', 'fecharchivo'];

		for (i=0; i < campos.length; i++ ){
			if( document.getElementById(campos[i]).value == 0 || document.getElementById(campos[i]).value == ''  ){
                var msj = '';
                switch( campos[i] ){
                    case 'dep_sel':
                        msj = 'Seleccione la dependencia.';
                    break;
                    case 'fecharchivo':
                        msj = 'Seleccione una fecha.';
                    break;
                }
                
                alert(msj);
				document.getElementById(campos[i]).focus();
				return false;
			}
		}
		reload();
	}
</script>
<body>
    <div id="loader" class="loader"></div>
    <br>
    <form name="formBus" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
	    <table width="90%" align="center" border="0" cellpadding="0" cellspacing="5" class="menuEnlaces">
	        <div id="titulo" style="width: 90%; margin-left: 5%" align="center" >M&oacute;dulo  Transferencias Documentales </div>
	        <tr>
                <td colspan="4">
                    <div class="alert-informacion" role="alert">
                        Los expedientes que se muestran en este módulo son los que ya fueron archivados físicamente, es decir los que ya tienen una ubicación topográfica
                    </div>
                </td>
            </tr>
            <tr bordercolor="#FFFFFF">
                
	            <td align="center" class="listado1" width="70%">
	            	<label for="dependencia"> Dependencia </label>
	            <?php
	            	include_once "$dir_raiz/include/query/envios/queryPaencabeza.php";
	                $sqlConcat = $db->conn->Concat($db->conn->substr . "($conversion,1,5) ", "'-'", $db->conn->substr . "(depe_nomb,1,200) ");
	                $sql = "select $sqlConcat, depe_codi from dependencia where depe_estado = 1 order by depe_codi";
	                $rsDep = $db->conn->Execute($sql);
	                print $rsDep->GetMenu2("dep_sel", "$dep_sel", "0: Seleccione Dependencia", false, 0, "onChange='cambiarUsuario(this.value)' class='select form-control' title='Listado de dependencias a la que pertenecen los usuarios' id='dep_sel' style='width: 96%;'");
		        ?>
	            </td>
	            <td align="center" class="listado1" width="30%">
	            	<label for="usuarios"> Usuarios </label>
	            <?php 

	            	$sqlU = "select usua_nomb , usua_login from usuario where depe_codi = '".$dep_sel."' order by usua_codi";
	                $rsUs = $db->conn->Execute($sqlU);
	            	print $rsUs->GetMenu2("usu_sel", "$usu_sel", "0: Seleccione Usuario", false, 0, " class='select form-control' title='Usuario activo' id='usu_sel' style='width: 96%;'");
	            ?>
	            </td>
	            <td align="center" class="listado1" width="8%">
	            	<label for="fechArchivo"> Fecha de archivo </label>
	                <input type="date" class="form-control" name="fecharchivo" id="fecharchivo" value="<?= $fecharchivo ?>" style='width: 96%;' maxlength="45" required >
	            </td>
                <td align="center" width="10%" class="listado1" >
                        <input name="btn_accion" type="button" class="botones" id="btn_accion" value="Buscar..." onclick="actionBuscar()" aria-label="Busca los radicados archivados segun el filtro indicado">
	        	</td>
	        </tr>
	    </table>
	</form>
    <?php 
        // Valida si la variable $archivo_pdf es diferente a vacio para descargar ultimo archivo
        if($archivo_pdf != '') { 
    ?>
        <a href="<?= '../bodega/'.date('Y').'/transDocumentales/'.$archivo_pdf ?>" data-id="200" class="download-link adescargar" onclick="descargArchi()" >
    Ver formato de transferencia documental</a>
    <?php } ?>

	<div style="width: 90%; margin-left: 5%; font-size: small" align="center" >
		<table id="tablaConsulta" class="display" width="100%" cellspacing="0" style="font-size: small">
	        <thead>
	            <tr>
                    <th></th>
	                <th>Nombre Expediente</th>
	                <th>Serie</th>
	                <th>Subserie</th>
	                <th>Tipo Documental</th>
	                <th>N&uacute;mero Radicado</th>
	                <th>Fecha de archivado</th>
	                <th>Dependencia</th>
	                <th>Usuario que archivo</th>
	            </tr>
	        </thead>
	    </table>
	    <table class="display" width="100%" cellspacing="0">
	    	<tr>
	    		<td>
	    			<span class="e_texto1"><center>
                       	<input id="btn_trans" name="btn_trans" type="button" class="botones" value="Transferencia" aria-label="Transferir radicados seleccionados">
	                </center></span>
	    		</td>
	    	</tr>
	    </table>
	</div>
	<script>
        var radicadosSeleccionados = new Array();

        function descargArchi(){

            var aElements = document.getElementsByClassName('adescargar'); 
            for(a of aElements){
                a.download = 'Transferencia documental';
                //Como tiene el atributo downlaod=true, simplemente haciendo click la imagen se descarga
                a.click();
            }
        }

        function reload( ) {
            table.ajax.reload();
        }

        $(document).ready(function() {
            $('#loader').hide();

            table = $('#tablaConsulta').DataTable({
                "language": {
                    "url": "./js/Spanish.json"
                },
                "ajax": {
                    "type": "POST",
                    "url": "./consulta.php",
                    "data": function (d) {
                        d.dep_sel = $('#dep_sel').val();
                        d.usu_sel = $('#usu_sel').val();
                        d.fecharchivo = $('#fecharchivo').val();
                    },
                    error: function (XMLHttpRequest) {
                        if( XMLHttpRequest.responseText != '' ){
                            alert(XMLHttpRequest.responseText);
                        }
                    }
                },
                'columnDefs': [
                    {
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true
                        }
                    }
                ],
                'select': {
                    'style': 'multi'
                },
                "order": [[1, 'asc']]
            });

        });

        $(document).ready(function(){
            $("#btn_trans").click(function(){

                $( "#btn_trans" ).prop( "disabled", true );
                $('#loader').show();

                var rows_selected = table.column(0).checkboxes.selected();

                for( var i=0; i < rows_selected.length; i++ ){
                    radicadosSeleccionados.push(rows_selected[i]);
                }

                if( radicadosSeleccionados.length > 0 ){
                    $.post("transferiRadicados.php",
                    {
                        val_radi: radicadosSeleccionados,
                        val_depe: $("#dep_sel").val(),
                    },
                    function(data){
                        
                        if(data.status){
                            alert(data.text);
                            descargArchi();
                        }else{
                            alert(data.text);
                        }

                        $( "#btn_trans" ).prop( "disabled", false );
                        $('#loader').hide();

                        document.all.formBus.submit();

                    });
                }else{
                    $('#loader').hide();
                    $( "#btn_trans" ).prop( "disabled", false );
                    alert("Seleccione m\xednimo un radicado");
                    return false;
                }
            }); // btn_trans

		});// document

    </script>

</body>