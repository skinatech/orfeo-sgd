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
$url_raiz="../..";
$dir_raiz=$_SESSION['dir_raiz'];
$ESTILOS_PATH2 =$_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];
$driver = $_SESSION['driver'];
        /*---------------------------------------------------------+
        |                       MAIN                               |
        +---------------------------------------------------------*/

/**
  * Se añadio compatibilidad con variables globales en Off
  * @autor Jairo Losada 2009-05
  * @licencia GNU/GPL V 3
  */

//Modificado skina if($_SESSION['usua_admin_sistema'] !=1 ) die(include "$ruta_raiz/errorAcceso.php");
if (!isset($krd))
    $krd = $_POST['krd'];
else
    $krd = $_GET['krd'];
if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";

require_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler($dir_raiz);
$error = 0;

if ($db) {
    include_once($dir_raiz . "/radicacion/crea_combos_universales.php");
    define('ADODB_ASSOC_CASE', $assoc);
    //$db->conn->debug=true;

    if (isset($_POST['btn_accion'])) {
        $record = array();
        // Si se ingresa en el documento el valor de 4 ceros genera número aleatorio.
        if($no_documento1_ok == '0000' or $no_documento1_ok == '0' or $no_documento1_ok == '00' or $no_documento1_ok == '000'){
            $no_documento1_ok = '00'.str_pad(rand(1,1500), 7, '0',STR_PAD_LEFT);
        }

        $record['NUIR'] = $_POST['txt_nuir'];
        $record['NOMBRE_DE_LA_EMPRESA'] = strtoupper(trim($_POST['txt_name']));
        $record['NIT_DE_LA_EMPRESA'] = strtoupper(trim($_POST['txt_nit']));
        $record['SIGLA_DE_LA_EMPRESA'] = (string) trim($_POST['txt_sigla']);    
        $record['DIRECCION'] = $_POST['txt_dir'];

        include_once("$dir_raiz/class_control/Municipio.php");
        $tmp_mun = new Municipio($db);
        $tmp_mun->municipio_codigo($_POST['codep_us1'], $_POST['muni_us1']);
        $record['ID_CONT'] = $tmp_mun->get_cont_codi();
        $record['ID_PAIS'] = $tmp_mun->get_pais_codi();
        $record['CODIGO_DEL_DEPARTAMENTO'] = $tmp_mun->dpto_codi;
        $record['CODIGO_DEL_MUNICIPIO'] = $tmp_mun->muni_codi;

        $record['TELEFONO_1'] = $_POST['txt_tel1'];
        isset($_POST['txt_tel2']) ? $record['TELEFONO_2'] = $_POST['txt_tel2'] : $record['TELEFONO_2'] = null;
        $record['EMAIL'] = $_POST['txt_mail'];
        ($_POST['Slc_act'] == "S") ? $record['ACTIVA'] = 1 : $record['ACTIVA'] = 0;
        $record['ARE_ESP_SECUE'] = 8;
        $record['NOMBRE_REP_LEGAL'] = strtoupper(trim($_POST['txt_namer']));
        $record['CODIGO_SUSCRIPTOR'] = strtoupper(trim($_POST['txt_codsusc']));
        
        if ($_POST['btn_accion'] == 'Agregar')
            $record['IDENTIFICADOR_EMPRESA'] = $db->conn->nextId("SEC_BODEGA_EMPRESAS",$driver);
        if ($_POST['btn_accion'] == 'Modificar')
            $record['IDENTIFICADOR_EMPRESA'] = $_POST['sls_idesp'];
        switch ($_POST['btn_accion']) {
            Case 'Agregar':{
//                error_log ('********************************************** Agregar');
                    $res = $db->conn->Replace('BODEGA_EMPRESAS', $record, 'IDENTIFICADOR_EMPRESA', $autoquote = true);
                    ($res) && $res == 2 ? $error = 4 : $error = 2;
                }break;
            Case 'Modificar': {
//                error_log ('********************************************** Modificar');
                    $res = $db->conn->Replace('BODEGA_EMPRESAS', $record, 'IDENTIFICADOR_EMPRESA', $autoquote = true);
                    ($res) ? ($res == 1 ? $error = 3 : $error = 4 ) : $error = 2;
                }break;
            Case 'Eliminar': {
//                error_log ('********************************************** Eliminar');
                    $ADODB_COUNTRECS = true;
                    $sql = "SELECT * FROM SGD_DIR_DRECCIONES WHERE SGD_ESP_CODI = " . $_POST['sls_idesp'];
                    $ok1 = $db->conn->Execute($sql);
                    $sql = "SELECT ctt_id FROM SGD_DEF_CONTACTOS WHERE ctt_id_tipo=0 AND ctt_id_empresa=" . $_POST['sls_idesp'];
                    $ok2 = $db->conn->Execute($sql);
                    //// VALIDAR TAMBIEN CONTACTOS.
                    $ADODB_COUNTRECS = false;
                    if ($ok1->RecordCount() > 0 || $ok2->RecordCount() > 0) {
                        $error = 5;
                    } else {
                        $db->conn->BeginTrans();
                        $ok = $db->conn->Execute("DELETE FROM BODEGA_EMPRESAS WHERE IDENTIFICADOR_EMPRESA=" . $_POST['sls_idesp']);
                        ($ok) ? $db->conn->CommitTrans() : $db->conn->RollbackTrans();
                    }
                }break;
            Default: break;
        }
        unset($record);
    }
} else {
    $error = 1;
}

if ($error) {
    $msg = '<tr bordercolor="#FFFFFF">
			<td width="3%" align="center" class="titulosError" colspan="3" bgcolor="#FFFFFF">';
    switch ($error) {
        case 1: //NO CONECCION A BD
            $msg .= "Error al conectar a BD, comuníquese con el Administrador de sistema !!";
            break;
        case 2: //ERROR EJECUCCI�N SQL
            $msg .= "Error al gestionar datos, comuníquese con el Administrador de sistema !!";
            break;
        case 3: //ACUTALIZACION REALIZADA
            $msg .= "Informaci&oacute;n actualizada!!";
            break;
        case 4: //INSERCION REALIZADA
            $msg .= "Entidad creada satisfactoriamente!!";
            break;
        case 5: //IMPOSIBILIDAD DE ELIMINAR ESP, TIENE HISTORIAL, EST� LIGADO CON DIRECCIONES
            $msg .= "No se puede eliminar Entidad, se encuentra ligado a direcciones contactos.";
            break;
    }
    $msg .= '</td></tr>';
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../js/jquery-ui/development-bundle/themes/base/jquery.ui.all.css">
        <script src="../../js/jquery-ui/development-bundle/jquery-1.7.1.js"></script>
        <script src="../../js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
        <script src="../../js/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
        <script src="../../js/jquery-ui/development-bundle/ui/jquery.ui.position.js"></script>
        <script src="../../js/jquery-ui/development-bundle/ui/jquery.ui.autocomplete.js"></script>
        <script type="text/javascript" src="../../ajax/js/ajax.js"></script> 
        <link rel="stylesheet" href="../../js/jquery-ui/development-bundle/demos/demos.css">
        <style>
            .ui-autocomplete-loading { background: white url('../../js/jquery-ui/development-bundle/demos/autocomplete/images/ui-anim_basic_16x16.gif') right center no-repeat; }
        </style>
        <SCRIPT Language="JavaScript" src="../../js/crea_combos_2.js"></SCRIPT>
        <script type="text/javascript" src="../../js/tabber.js"></script>
        <script language="JavaScript" src="../../js/formchek.js"></script>
        <script language="JavaScript">
            function ver_listado(que){
            window.open('listados.php?var=bge','','scrollbars=yes,menubar=no,height=600,width=800,resizable=yes,toolbar=no,location=no,status=no');
            }

            //Modificacion Skina, Se invluye busqueda autocompletar
            //Ing Camilo Pintor - cpintor@skinatech.com
            //2015 - Mayo
            var producto="hola ";
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
                                response( data );
                            }
                        });
                    }
                });
            });


            function seleccion(event, ui){     
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

            //  document.formulario.nombre_us1.value=producto;

            // $("#birds").val(producto.descripcion);  
            //  event.preventDefault();  
            } 

            function restults(data)
            {
            document.getElementById('txt_name').value = data.NOM;
            document.getElementById('txt_nuir').value = data.NUIR;
            document.getElementById('txt_nit').value = data.CC_DOCUMENTO;
            document.getElementById('txt_sigla').value = data.APELL2;
            document.getElementById('txt_mail').value = data.MAIL;
            document.getElementById('txt_tel1').value = data.TELEFONO;
            document.getElementById('txt_tel2').value = data.TELEFONO2;
            document.getElementById('txt_dir').value = data.DIRECCION;
            document.getElementById('txt_namer').value = data.APELL1;
            document.getElementById('txt_codsusc').value = data.SUSCRIPTOR; 
            document.getElementById('sls_idesp').value =data.DOCUMENTO; 
            if (data.ACTIVA == 1) {
            document.getElementById('Slc_act').value = 'S';
            } else {
            document.getElementById('Slc_act').value = 'N';
            }
            crea_var_idlugar_defa(data.CONT+'-'+data.PAIS+'-'+data.DPTO+'-'+data.MUNI);

            }
            //Fin Modificacion Skina, Se invluye busqueda autocompletar

            function validarinfo(form)
            {	
            for(i=0;i<form.length;i++)
            {	//alert(form.elements[i].name+'\n'+form.elements[i].type);
            switch (form.elements[i].type)
            {	case 'text':
            case 'textarea':
            case 'select-multiple':
            // MODIFICADO SKINA
            {	if ((form.hdBandera.value =='A') && (form.elements[i].value == 0))			
            {	if (rightTrim(form.elements[i].value) == '' && (form.elements[i].name == 'txt_nit' ))


            {	alert("Por favor ingrese NIT del cliente");
            form.elements[i].focus();
            return false;
            }
            /*	if (rightTrim(form.elements[i].value) == '' && (form.elements[i].name == 'txt_dir' )) {	
            alert("Por favor ingrese la direccion del cliente");
            form.elements[i].focus();
            return false;
            }*/

            if (form.elements[i].name == 'txt_name' ) 
            {	alert ("Por favor ingrese el nombre del cliente");
            form.elements[i].focus();
            return false;
            }

            /*		if ((form.elements[i].name == 'txt_mail') && !(isEmail(form.elements[i].value, true)))
            {	alert ("Digite correctamente el correo electronico");
            form.elements[i].focus();
            return false;
            } */
            }	}break;
            case 'checkbox':
            {	alert(form.elements[i].checked);
            }break;
            /*case 'select-one':
            {  	if (form.elements[i].name =='sls_idesp')
            {	if ((form.hdBandera.value =='M' || form.hdBandera.value =='E') && (form.elements[i].value == 0))
            {
            alert('Seleccione primero el cliente');
            return false;
            }
            }
            /*else if (form.elements[i].value == '0')
            {	alert("Por favor complete todos los campos del registro");
            form.elements[i].focus();
            return false;
            }*/
            /*	}break;*/
            }
            }
            form.submit();
            }

            /*
            *	Funcion que se le envia el id del municipio en el formato general c-ppp-ddd-mmm y lo desgloza
            *	creando las variables en javascript para su uso individual, p.e. para los combos respectivos.
            */
            function crea_var_idlugar_defa(id_mcpio)
            {       if (id_mcpio == 0) return;
               
            var str = id_mcpio.preg_split('-');
            //console.log(str);
            document.form1.idcont1.value = str[0]*1;
            cambia(form1,'idpais1','idcont1');
            document.form1.idpais1.value = str[1]*1;
            cambia(form1,'codep_us1','idpais1');
            document.form1.codep_us1.value = str[1]*1+'-'+str[2]*1;
            cambia(form1,'muni_us1','codep_us1');
            document.form1.muni_us1.value = str[1]*1+'-'+str[2]*1+'-'+str[3]*1;
            }

            function actualiza_datos(form)
            {	if (form.sls_idesp.value>0)
            {	document.getElementById('txt_name').value = ve[form.sls_idesp.value]['nombre'];
            document.getElementById('txt_nuir').value = ve[form.sls_idesp.value]['nuir'];
            document.getElementById('txt_nit').value = ve[form.sls_idesp.value]['nit'];
            document.getElementById('txt_sigla').value = ve[form.sls_idesp.value]['sigla'];
            document.getElementById('txt_mail').value = ve[form.sls_idesp.value]['mail'];
            document.getElementById('txt_tel1').value = ve[form.sls_idesp.value]['tel1'];
            document.getElementById('txt_tel2').value = ve[form.sls_idesp.value]['tel2'];
            document.getElementById('txt_dir').value = ve[form.sls_idesp.value]['dir'];
            document.getElementById('txt_namer').value = ve[form.sls_idesp.value]['nombrer'];
            document.getElementById('txt_codsusc').value = ve[form.sls_idesp.value]['codsusc'];
            if (ve[form.sls_idesp.value]['activa'] == 1)
            document.getElementById('Slc_act').value = 'S';
            else
            document.getElementById('Slc_act').value = 'N';
            crea_var_idlugar_defa(ve[form.sls_idesp.value]['id_cont']+'-'+ve[form.sls_idesp.value]['id_pais']+'-'+ve[form.sls_idesp.value]['id_dpto']+'-'+ve[form.sls_idesp.value]['id_muni']);
            }
            else
            {	document.getElementById('txt_name').value = '';
            document.getElementById('txt_nuir').value = '';
            document.getElementById('txt_nit').value = '';
            document.getElementById('txt_sigla').value = '';
            document.getElementById('txt_mail').value = '';
            document.getElementById('txt_tel1').value = '';
            document.getElementById('txt_tel2').value = '';
            document.getElementById('Slc_act').value = '0';
            document.getElementById('txt_dir').value = '';
            document.getElementById('txt_namer').value = '';
            document.getElementById('txt_codsusc').value = '';
            crea_var_idlugar_defa(<?php echo "'" . ($_SESSION['cod_local']) . "'"; ?>);
            }
            }

            /***
            Skinatech
            Autor: Andrés Mosquera
            Fecha: 30-11-2018
            Información: Valida que los inputs de texto no permitan caracteres especiales
            ***/
            function validaNumLetra(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toString();

                /*console.log(key);
                console.log(tecla);*/

                 //Se define todo lo que se quiere que se muestre
                caracter = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                especiales = [];

                tecla_especial = false;
                for(var i in especiales)
                {
                    if(key == especiales[i])
                    {
                        tecla_especial = true;
                        break;
                    }
                }
                if(caracter.indexOf (tecla) == -1 && !tecla_especial){
                    alert('Caracter no acpetado');
                    return false;
                }
            }
            /***
            Skinatech
            Autor: Andrés Mosquera
            Fecha: 30-11-2018
            Información: Fin Valida que los inputs de texto no permitan caracteres especiales
            ***/

            /***
            Skinatech
            Autor: Andrés Mosquera
            Fecha: 30-11-2018
            Información: Valida campo mail que cumpla con lo requerido
            ***/
            function validarEmail() {
                re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/
                if(!re.exec(document.getElementById('txt_mail').value))
                {
                    alert('<?= utf8_decode("Correo electrónico no valido, verifique") ?>');
                }
            }


            /*function validarEmail() {
              if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(document.getElementById('txt_mail').value)){
               alert("La dirección de email " + valor + " es correcta.");
              } else {
               alert("La dirección de email es incorrecta.");
              }

              alert(document.getElementById('txt_mail').value);
            }*/
            /***
            Skinatech
            Autor: Andrés Mosquera
            Fecha: 30-11-2018
            Información: Fin Valida campo mail que cumpla con lo requerido
            ***/
            <?php
// Convertimos los vectores de los paises, dptos y municipios creados en crea_combos_universales.php a vectores en JavaScript.

            echo arrayToJsArray($vpaisesv, 'vp');
            echo arrayToJsArray($vdptosv, 'vd');
            echo arrayToJsArray($vmcposv, 'vm');
        
            //echo arrayToJsArray($v_esp, 've');
            ?>
        </script>
        <script language="JavaScript" src="../../js/crea_combos_2.js"></script>
        <link href="<?= "../.." . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= "../.." . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <title>.: ORFEO :. Administraci&oacute;n de ESP(Entidades)</title>
    </head>
    <body onLoad="crea_var_idlugar_defa(<?php echo "'" . ($_SESSION['cod_local']) . "'"; ?>);">
        <form name="form1" id="form1" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            <input type="hidden" id="hdBandera" name="hdBandera" value="">
            <input type="hidden" id="krd" name="krd" value="<?= $krd ?>">
            <!--<table width="75%" align="center" border="1" cellspacing="0" class="tablas">
                    <tr bordercolor="#FFFFFF">
                            Modificado skina
                            <td colspan="6" height="40" class="titulos4" valign="middle" align="center">Administraci&oacute;n de Entidades.</td>
                            <td colspan="6" height="40" class="titulos4" valign="middle" align="center">Administraci&oacute;n de Clientes.</td>
                    </tr>
            </table>-->
            <center>
                <br>
                <style>
                    .listado2{
                        text-align: center !important;
                    }
                </style>
                <div id="titulo" style="width: 65%;" align="center">Administraci&oacute;n de Terceros</div>
                <table border="1" cellpadding="0" cellspacing="0" align="center" width="65%">
		 	<?php echo $msg; ?>
                    <tr>
                            <!--<td width="5%" align="center" valign="middle" class="titulos2">1.</td>-->
                        <td width="18%" align="left" class="titulos2">1. Seleccione Cliente</td>
                        <td class="listado2">
                            
                                <div class="ui-widget">
                                    <label for="birds">Nombre: &nbsp;&nbsp;&nbsp;</label>
                                    <input id="birds" name="birds" title="Campo para buscar usuario por nombre, debe digitar minimo 3 caracteres para la busqueda, para buscar entre las coincidencias use las flechas arriba y abajo" aria-autocomplete="list" aria-haspopup="true" aria-owns="ui-autocomplete-instance" type="text"><?= "(m&iacute;nimo 3 caracteres)" ?></div>
                            
                            <?php
                            /* 	echo $Rs_esp->GetMenu2('sls_idesp',0,"0:&lt;&lt; SELECCIONE &gt;&gt;",false,0,"id=\"sls_idesp\" class=\"select\" onchange=\"actualiza_datos(this.form)\"");
                              $Rs_esp->Close(); */
                            ?>
                            <input class="tex_area" type="hidden" name="sls_idesp" id="sls_idesp" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="14%" align="left" class="titulos2"><?= "2. Modificaci&oacute;n o Ingrese de datos" ?></td>
                    </tr>
                    <tr bordercolor = "#FFFFFF">
                            <!--<td width="5%" align="center" valign="middle" class="titulos2">2.</td>-->
                        
                        <!--<td width="14%" align="left" class="titulos2">2. Mod. o Ingrese datos</td>-->
                        <td colspan="2">
                            <table border="1" cellpadding="0" cellspacing="0" width="100%" class="borde_tab">
                                <tr class="listado1">
                                    <td width="33%" align="center" valign="middle"><label>Nuir</label></td>
                                    <td width="33%" align="center" valign="middle"><label>Nit *</label></td>
                                    <td  align="center" valign="middle"><label>C&oacute;digo suscriptor</label></td>
                                    <!--<td width="34%" align="center" valign="middle"><label>Sigla</label></td>-->
                                </tr>
                                <tr align="center">
                                    <td width="33%" class="listado2"><input class="tex_area" type="text" name="txt_nuir" id="txt_nuir" maxlength="13" onkeypress="return validaNumLetra(event);"></td>
                                    <td width="33%" class="listado2"><input class="tex_area" type="text" name="txt_nit" id="txt_nit" maxlength="80" onkeypress="return validaNumLetra(event);"></td>
                                    <td align="center"class="listado2">
                                        <input class="tex_area" type="text" name="txt_codsusc" id="txt_codsusc" maxlength="13" onkeypress="return validaNumLetra(event);">
                                    </td>
                                    <!--<td width="34%" class="listado2"><input class="tex_area" type="text" name="txt_sigla" id="txt_sigla" maxlength="80"></td>-->
                                </tr>
                                <tr class="listado1">
                                    <td width="34%" align="center" valign="middle"><label>Sigla</label></td>
                                    <td width="34%" align="center" colspan="2" valign="middle"><label><?= "Correo Electr&oacute;nico" ?></label></td>
                                </tr>
                                <tr>
                                    <td width="34%" class="listado2">
                                        <input class="tex_area" type="text" name="txt_sigla" id="txt_sigla" maxlength="80">
                                    </td>
                                    <td width="34%" align="center" colspan="2" valign="bottom"class="listado2">
                                        <input class="tex_area" type="text" name="txt_mail" id="txt_mail" maxlength="50" size="50" onblur="validarEmail();">
                                    </td>
                                <tr class="listado1">
                                    <td  align="center" valign="middle">
                                        <label>Nombre *</label>
                                    </td>
                                       <td colspan="2" align="center" valign="middle"><label>Representante legal</label></td>
                                </tr>
                                <tr>
                                    <td  align="center" valign="middle" class="listado2">
                                        <input class="tex_area" type="text" name="txt_name" id="txt_name" size="20" maxlength="160">
                                    </td>
                                    <td colspan="2" align="center" valign="middle" class="listado2">
                                        <input class="tex_area" type="text" name="txt_namer" id="txt_namer" size="50" maxlength="160">
                                    </td>
                                </tr>
                                <tr class="listado1">
                                    <td colspan="3" align="center" valign="middle">
                                        <label>Direcci&oacute;n Completa *</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="center" valign="middle" class="listado2">
                                        <input class="tex_area" type="text" name="txt_dir" id="txt_dir" size="60" maxlength="160" required >
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="center" valign="middle"class="listado2">
                                        <?php
                                        echo $Rs_Cont->GetMenu2("idcont1", substr($_SESSION['cod_local'], 0, 1) * 1, "$0:&lt;&lt; seleccione &gt;&gt;", false, 0, " CLASS=\"select \" id=\"idcont1\" onchange=\"cambia(this.form,'idpais1','idcont1')\" ");
                                        $Rs_Cont->Move(0);
                                        ?>
                                        &nbsp;
                                        <?php
                                            if ($_SESSION['cod_local'])
                                                $paiscodi = substr($_SESSION['cod_local'], 2, 3) * 1;
                                            echo "<SELECT NAME=\"idpais1\" ID=\"idpais1\" TITLE=\"Lista desplegable con paises, cambia automaticamente una vez el nombre o suscriptor es consultado\" CLASS=\"select\" onchange=\"cambia(this.form, 'codep_us1', 'idpais1')\">";
                                            while (!$Rs_pais->EOF) {
                                                if ($_SESSION['cod_local'] and ( $Rs_pais->fields['ID0'] == substr($_SESSION['cod_local'], 0, 1) * 1)) {//Si hay local Y pais pertenece al continente.
                                                    ($paiscodi == $Rs_pais->fields['ID1']) ? $s = " selected='selected'" : $s = "";
                                                    echo "<option" . $s . " value='" . $Rs_pais->fields['ID1'] . "'>" . $Rs_pais->fields['NOMBRE'] . "</option>";
                                                }
                                                $Rs_pais->MoveNext();
                                            }
                                            echo "</SELECT>";
                                            $Rs_pais->Move(0);
                                        ?>
                                        &nbsp;
                                        <?php
                                            echo "<SELECT NAME=\"codep_us1\" ID=\"codep_us1\" CLASS=\"select \" TITLE=\"Lista desplegable con departamentos, cambia automaticamente una vez el nombre o el suscriptor es consultado\" onchange=\"cambia(this.form, 'muni_us1', 'codep_us1')\">";
                                            while (!$Rs_dpto->EOF) {
                                                if ($_SESSION['cod_local'] and ( $Rs_dpto->fields['ID0'] == substr($_SESSION['cod_local'], 2, 3) * 1)) { //Si hay local Y dpto pertenece al pais.
                                                    ((substr($_SESSION['cod_local'], 2, 3) * 1) . "-" . (substr($_SESSION['cod_local'], 6, 3) * 1) == $Rs_dpto->fields['ID1']) ? $s = " selected='selected'" : $s = "";
                                                    echo "<option" . $s . " value='" . $Rs_dpto->fields['ID1'] . "'>" . $Rs_dpto->fields['NOMBRE'] . "</option>";
                                                }
                                                $Rs_dpto->MoveNext();
                                            }
                                            echo "</SELECT>";
                                            $Rs_dpto->Move(0);
                                        ?>
                                        &nbsp;
                                        <?php
                                            echo "<SELECT NAME=\"muni_us1\" ID=\"muni_us1\" TITLE=\"Lista desplegable con municipios, cambia automaticamente una vez el nombre o el suscriptor es consultado\" CLASS=\"select\">";
                                            while (!$Rs_mcpo->EOF) {
                                                if ($_SESSION['cod_local'] and ( $Rs_mcpo->fields['ID'] == substr($_SESSION['cod_local'], 2, 3) * 1) and ( $Rs_mcpo->fields['ID0'] == substr($_SESSION['cod_local'], 6, 3) * 1)) { //Si hay local Y mcpio pertenece al pais Y dpto.
                                                    ((substr($_SESSION['cod_local'], 2, 3) * 1) . "-" . (substr($_SESSION['cod_local'], 6, 3) * 1) . "-" . (substr($_SESSION['cod_local'], 10, 3) * 1) == $Rs_mcpo->fields['ID1']) ? $s = " selected='selected'" : $s = "";
                                                    echo "<option" . $s . " value='" . $Rs_mcpo->fields['ID1'] . "'>" . $Rs_mcpo->fields['NOMBRE'] . "</option>";
                                                }
                                                $Rs_mcpo->MoveNext();
                                            }
                                            echo "</SELECT>";
                                            $Rs_mcpo->Move(0);
                                        ?>
                                    </td>
                                </tr>
                    </tr>
                    <tr class="listado1">
                        <td width="33%" align="center" valign="middle"><label>Telefono 1</label></td>
                        <td width="33%" align="center" valign="middle"><label>Telefono 2</label></td>
                        <td width="34%" align="center" valign="middle"><label>Est&aacute; activa ?</label></td>
                    </tr>
                    <tr align="center">
                        <td width="33%" class="listado2"><input class="tex_area" type="text" name="txt_tel1" id="txt_tel1" maxlength="15" onkeypress="return validaNumLetra(event);"></td>
                        <td width="33%"class="listado2"><input class="tex_area" type="text" name="txt_tel2" id="txt_tel2" maxlength="15" onkeypress="return validaNumLetra(event);"></td>
                        <td width="34%"class="listado2">
                            <select name="Slc_act" id="Slc_act" class="select">
                                <option value="0">Seleccione</option>
                                <option value="S"> Si</option>
                                <option value="N"> No</option>
                            </select>
                        </td>
                    </tr>
                </table>
                </td>
                </tr>
                <?php //echo $msg; ?>
                </table>
                <table width="65%" border="0" align="center" cellpadding="0" cellspacing="0" class="tablas">
                    <tr class="cajaBotonesMedio">
                        <td width="10%" class="listado1">&nbsp;</td>
                        <td width="20%"  class="listado1">
                            <span class="celdaGris"><center>
                                    <input name="btn_accion" type="button" class="botones" id="btn_accion" value="Listado" onClick="ver_listado();">
                                </center></span>	</td>
                        <td width="20%" class="listado1">
                            <span class="e_texto1"><center>
                                    <input name="btn_accion" type="submit" class="botones" id="btn_accion" value="Agregar" onClick="document.form1.hdBandera.value = 'A'; return validarinfo(this.form);">
                                </center></span>	</td>
                        <td width="20%" class="listado1">
                            <span class="e_texto1"><center>
                                    <input name="btn_accion" type="submit" class="botones" id="btn_accion" value="Modificar" onClick="document.form1.hdBandera.value = 'M'; return validarinfo(this.form);">
                                </center></span>	</td>
                        <!--
                        //Modificacion Skina, No se pemrite eliminar datos de esp
                        //Ing Camilo Pintor - cpintor@skinatech.com
                        //2015 - Mayo
                        -->
                        <!--	<td width="20%" class="listado2">
                                        <span class="e_texto1"><center>
                                          <input name="btn_accion" type="submit" class="botones" id="btn_accion" value="Eliminar" onClick="document.form1.hdBandera.value='E'; return validarinfo(this.form);">
                                          </center></span>	</td>
                        //Fin Modificacion Skina, No se pemrite eliminar datos de esp
                        -->
                        <td width="10%" class="listado1">&nbsp;</td>
                    </tr>
                </table>
            </center>
            <br>
        </form>
    </body>
</html>
