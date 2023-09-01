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
        /*---------------------------------------------------------+
        |                       MAIN                               |
        +---------------------------------------------------------*/
/**
  * Se añadio compatibilidad con variables globales en Off
  * @autor Jairo Losada 2009-05
  * @licencia GNU/GPL V 3
  */

foreach ($_GET as $key => $valor) ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor;

if($_SESSION['usua_admin_sistema'] !=1 ) die(include "$dir_raiz/errorAcceso.php");
$ADODB_COUNTRECS = false;
include_once($dir_raiz.'/config.php'); 			// incluir configuracion.
include_once($dir_raiz."/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$dir_raiz");
//$db->conn->debug = true;	
if ($db){	
    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
    $error = 0;
    if (isset($_POST['btn_accion'])){
        $dpto_tmp = explode("-",$codep_us1);
        $dpto_tmp = $dpto_tmp[1];
        $record = array();
        $record['DPTO_CODI'] = $dpto_tmp;
        $record['MUNI_CODI'] = $_POST['txtIdMcpio'];
        $record['ID_PAIS'] = $_POST['idpais1'];	
        $dptoCodi = $dpto_tmp;
        $muniCodi = $_POST['txtIdMcpio'];
        $muniNomb = $_POST['txtModelo'];
        $paisCodi = $_POST['idpais1'];	
        $contiCodi = $_POST['idcont1'];
        $record['ID_CONT'] = $_POST['idcont1'];
        $record['MUNI_NOMB'] = $_POST['txtModelo'];
        $record['HOMOLOGA_MUNI'] = $_POST['Slc_defa'];

        if ( $_POST['Slc_defa'] == '1' ) {	
            $record['HOMOLOGA_IDMUNI'] = $_POST['idcont2'].'-'.$_POST['muni_us2'];
        }
        else {	
            if (!defined('ADODB_FORCE_NULLS')) define('ADODB_FORCE_NULLS',1);
                $ADODB_FORCE_TYPE = ADODB_FORCE_NULL;
                $record['HOMOLOGA_IDMUNI'] = 'null';
        }
        $homologaIdMuni = $record['HOMOLOGA_IDMUNI'];
        $homologaMuni =$record['HOMOLOGA_MUNI'];

        switch($_POST['btn_accion']){	
            Case 'Agregar':{
                $rsSqlCodi = $db->conn->Execute("select muni_codi,muni_nomb from municipio where muni_codi= $muniCodi and dpto_codi=$dpto_tmp AND ID_PAIS=$paisCodi");
                $rsSqlNomb = $db->conn->Execute("select muni_codi,muni_nomb from municipio where muni_nomb= '$muniNomb' and dpto_codi=$dpto_tmp AND ID_PAIS=$paisCodi");
                
                if ($rsSqlCodi->RecordCount() != 0){	
                    $error = 6;	                
                }else if ($rsSqlNomb->RecordCount() != 0){	
                    $error = 7;	                
                }else{
                    $rs = $db->conn->Execute("insert into MUNICIPIO values ($muniCodi,$dpto_tmp,'$muniNomb',$contiCodi,$paisCodi,'$homologaMuni','$homologaIdMuni',1)");
                    $ok ? $error = $ok : $error = 2;  
                }
            }break;
            Case 'Modificar': {
                $ok = $db->conn->Replace('MUNICIPIO',$record,array('DPTO_CODI','MUNI_CODI','ID_PAIS','ID_CONT'),$autoquote = true);
                $ok ? $error = $ok : $error = 4;
            }break;
            Case 'Eliminar': {	
                $ADODB_COUNTRECS = true;
                $record = array_slice($record, 0, 3);
                $rs = $db->conn->Execute("SELECT * FROM SGD_DIR_DRECCIONES WHERE DPTO_CODI=$dptoCodi AND MUNI_CODI=$muniCodi AND ID_PAIS=$paisCodi");
                $ADODB_COUNTRECS = false;
                if ($rs->RecordCount() != 0){	$error = 5;	}
                else {	
                    if (!($db->conn->Execute("DELETE FROM MUNICIPIO WHERE DPTO_CODI=$dptoCodi AND MUNI_CODI=$muniCodi AND ID_PAIS=$paisCodi"))){
                        $error = 5;
                    }else{
                        $error = 8;
                    }
                }
            }break;
        }
        unset($record);
    }
    include "$url_raiz/radicacion/crea_combos_universales.php";
}
else{
	$error = 3;
}
?>
<html>
<head>
<title>Orfeo- Admon de Municipios.</title>
<?$url_raiz="../..";?>
    <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
    <script language="JavaScript" src="../../js/crea_combos_2.js"></script>
    <script language="JavaScript">
        function Actual(){
            var Obj = document.getElementById('muni_us1');
            var i = Obj.selectedIndex;
            var x = 0;
            var y = 0;
            var found = true;
            var str = "";
            while(found){	
                if (vm[x]['ID1'] == Obj.options[i].value)	
                break;
                x += 1;
            }

            str = vm[x]['ID1'];
            str = str.split('-');
            document.getElementById('txtModelo').value = vm[x]['NOMBRE'];
            document.getElementById('txtIdMcpio').value = str[2]
            document.getElementById('Slc_defa').value = vm[x]['HOMOLOGA_MUNI'];
            if (vm[x]['HOMOLOGA_MUNI'] == 1){	
                str = vm[x]['HOMOLOGA_IDMUNI'];
                str = str.split('-');
                if(str.length > 2){
                    document.form1.idcont2.value = str[0];
                    cambia(form1,'idpais2','idcont2');
                    document.form1.idpais2.value = str[1];
                    cambia(form1,'codep_us2','idpais2');
                    document.form1.codep_us2.value = str[1]+'-'+str[2];
                    cambia(form1,'muni_us2','codep_us2');
                    document.form1.muni_us2.value = str[1]+'-'+str[2]+'-'+str[3];  
                }
                this.homologa();
            }
            else{
                borra_combo(form1, 9);
                borra_combo(form1, 10);
                borra_combo(form1, 11);
            }
        }

        function borra_datos(){
            document.getElementById('txtIdMcpio').value = "";
            document.getElementById('txtModelo').value = "";
            document.getElementById('Slc_defa').value = "";
            document.getElementById('idcont2').value = 0;
            borra_combo(form1, 9);
            borra_combo(form1, 10);
            borra_combo(form1, 11);
            document.getElementById('idpais2').value = "";
            document.getElementById('codep_us2').value = "";
            document.getElementById('muni_us2').value = "";
        }

        function ver_listado(){
            window.open('listados.php?var=mcp','','scrollbars=yes,menubar=no,height=600,width=800,resizable=yes,toolbar=no,location=no,status=no');
        }

        function ValidarInformacion(dataCaracter){	
            var strMensaje = "Por favor ingrese las datos.";
            if(document.form1.idcont1.value == "0" ){
                alert("Debe seleccionar el continente.\n" + strMensaje);
                document.form1.idcont1.focus();
                return false;
            }

            if(document.form1.idpais1.value == "0"){	
                alert("<?= utf8_decode("Debe seleccionar el país") ?>.\n" + strMensaje);
                document.form1.idpais1.focus();
                return false;
            }

            if(document.form1.codep_us1.value == "0" ){	
                alert("Debe seleccionar el departamento.\n" + strMensaje);
                document.form1.codep_us1.focus();
                return false;
            }

            if(document.form1.txtIdMcpio.value <= "0") {	
                alert("Debe ingresar el Codigo del Municipio.\n" + strMensaje);
                document.form1.txtIdMcpio.focus();
                return false;
            }
            else if(isNaN(document.form1.txtIdMcpio.value)){	
                alert("El Codigo del Municipio debe ser numerico.\n" + strMensaje);
                document.form1.txtIdMcpio.select();
                document.form1.txtIdMcpio.focus();
                return false; 
            }
            
            if(dataCaracter == "A" || dataCaracter == "M"){	
                if(document.form1.txtModelo.value == ""){	
                    alert("Debe ingresar nombre del Municipio.\n" + strMensaje);
                    document.form1.txtModelo.focus();
                    return false; 
                }
                if(!isNaN(document.form1.txtModelo.value)){	
                    alert("El nombre del Municipio no debe ser numerico.\n" + strMensaje);
                    document.form1.txtModelo.select();
                    document.form1.txtModelo.focus();
                    return false; 
                }
                               
                if ((document.form1.Slc_defa.value == "") || (document.form1.Slc_defa.value == "1" && (document.form1.muni_us2.value == "" || document.form1.muni_us2.value == "0") )){	
                    alert("Debe seleccionar si los precios de env\u00EDo corresponden con los de otra ciudad.\n" );
                    document.form1.Slc_defa.focus();
                    return false; 
                }
            }
            if(dataCaracter == "E"){
                if(confirm("<?= utf8_decode("\u00bfEst\u00E1 seguro de borrar el registro?") ?>")){	
                    document.form1.submit();	
                }
                else{	
                    return false;	
                }
            }
            document.form1.submit();
        }

        function homologa(){
            if ((document.form1.Slc_defa.value == "1")){
                document.getElementById('idcont2').disabled = false;
                document.getElementById('idpais2').disabled = false;
                document.getElementById('codep_us2').disabled = false;
                document.getElementById('muni_us2').disabled = false;
            }else{
                document.getElementById('idcont2').disabled = true;
                document.getElementById('idpais2').disabled = true;
                document.getElementById('codep_us2').disabled = true;
                document.getElementById('muni_us2').disabled = true;    
            }
        }
        <?php
        // Convertimos los vectores de los paises, dptos y municipios creados en crea_combos_universales.php a vectores en JavaScript.
        echo arrayToJsArray($vpaisesv, 'vp'); 
        echo arrayToJsArray($vdptosv, 'vd');
        echo arrayToJsArray($vmcposv, 'vm');
        ?>
    </script>
</head>
<body>
    <br>
    <br>
    <form name="form1" method="post" id="form1" action="<?= $_SERVER['PHP_SELF'] ?>">  
        <input type="hidden" name="hdBandera" value="">
        <center>
            <div id="titulo" style="width: 75%;" align="center" >Administrador de municipios</div>
            <table width="75%" border="1" align="center" cellspacing="0">
                <tr bordercolor="#FFFFFF">
                        <!--<td colspan="3" align="center" valign="middle" class="titulos4"><b>ADMINISTRADOR DE MUNICIPIOS</b></td>-->
                </tr>
                <tr> 
                    <td width="3%" align="center" class="titulos2"><b>1.</b></td>
                    <td width="25%" align="left" class="titulos2"><b>&nbsp;<label for="idcont1">Seleccione Continente</label></b></td>
                    <td width="72%" class="listado2">
                        <?php
                        // Listamos los continentes.
                        echo $Rs_Cont->GetMenu2('idcont1', 0, "0:&lt;&lt; SELECCIONE &gt;&gt;", false, 0, "id=\"idcont1\" class=\"select\" title=\"Listado de continentes\" onchange=\"borra_datos();cambia(this.form,'idpais1','idcont1')\"");
                        $Rs_Cont->Move(0);
                        ?>	
                    </td>
                </tr>
                <tr>
                    <td align="center" class="titulos2"><b>2.</b></td>
                    <td align="left" class="titulos2"><b>&nbsp;<label for="idpais1">Seleccione Pa&iacute;s</label></b></td>
                    <td align="left" class="listado2">
                        <select name="idpais1" id="idpais1" class="select" onChange="borra_datos();cambia(this.form, 'codep_us1', 'idpais1')" title="Listado de pa&iacute;ses de acuerdo al continente seleccionado">
                            <option value="0" selected>&lt;&lt; Seleccione Continente &gt;&gt;</option>
                        </select>
                    </td>
                </tr>
                <tr> 
                    <td align="center" class="titulos2"><b>3.</b></td>
                    <td align="left" class="titulos2"><b>&nbsp;<label for="codep_us1">Seleccione Departamento</label></b></td>
                    <td align="left" class="listado2">
                        <select name='codep_us1' id ="codep_us1" class='select' onChange="borra_datos();cambia(this.form, 'muni_us1', 'codep_us1')" title="Listado de departamentos de acuerdo al pa&iacute;s seleccionado"><option value='0' selected>&lt;&lt; Seleccione Pa&iacute;s &gt;&gt;</option></select>
                    </td>
                </tr>
                <tr> 
                    <td align="center" class="titulos2"><b>4.</b></td>
                    <td align="left" class="titulos2"><b>&nbsp;<label for="muni_us1">Seleccione Municipio</label></b></td>
                    <td align="left" class="listado2">
                        <select name='muni_us1' id="muni_us1" class='select' onchange="borra_datos();Actual()" title="Listado de municipios de acuerdo al departamento seleccionado"><option value='0' selected>&lt;&lt; Seleccione Dpto &gt;&gt;</option></select>
                    </td>
                </tr>

                <tr> 
                    <td rowspan="4" align="center" class="titulos2"><b>5.</b></td>
                    <td align="left" class="titulos2"><b>&nbsp;<label for="txtIdMcpio">Indicativo del Municipio</label></b></td>
                    <td class="listado2"><input name="txtIdMcpio" id="txtIdMcpio" type="text" size="10" maxlength="3" title="Campo para ver,ingresar o modificar el c&oacute;digo del municipio"></td>
                </tr>
                <tr> 
                    <td align="left" class="titulos2"><b>&nbsp;<label for="txtModelo">Nombre del Municipio</label></b></td>
                    <td class="listado2"><input name="txtModelo" id="txtModelo" type="text" size="50" maxlength="70" title="Campo para ver,ingresar o modificar el nombre del municipio"></td>
                </tr>
                <tr> 
                    <td align="left" class="titulos2"><b>&nbsp;<label for="Slc_defa"><?= "¿Los precios de envío corresponden con los de otra ciudad?" ?></label></b></td>
                    <td class="listado2">
                        <select name="Slc_defa" onChange="homologa()" class="select" id="Slc_defa" title="Seleccione si el municipio ratifica los precios de env&iacute;o de otra ciudad">
                            <option value="" selected>&lt; seleccione &gt;</option>
                            <option value="0"> NO </option>
                            <option value="1"> SI </option>
                        </select>	
                    </td>
                </tr>
                <tr> 
                    <td align="left" class="titulos2"><b>&nbsp;Seleccione la ciudad</b></td>
                    <td class="listado2">
                        <?php
                        echo $Rs_Cont->GetMenu2('idcont2', 0, "0:&lt;&lt; SELECCIONE &gt;&gt;", false, 0, "id=\"idcont2\" class=\"select\" disabled title=\"Continente al que pertenece la ciudad\" onchange=\"cambia(this.form,'idpais2','idcont2')\"");
                        $Rs_Cont->Move(0);
                        ?>
                        <select name="idpais2" class="select" id="idpais2" onChange="cambia(this.form, 'codep_us2', 'idpais2')" title="País al que pertenece la ciudad" disabled></select>
                        <select name="codep_us2" class="select" id="codep_us2" onChange="cambia(this.form, 'muni_us2', 'codep_us2')" title="Departamento al que pertenece la ciudad" disabled></select>
                        <select name="muni_us2" class="select" id="muni_us2" title="Municipio al que pertenece la ciudad o municipo como tal" disabled></select>
                    </td>
                </tr>
                <?php
                if ($error) {
                    echo '<tr bordercolor="#FFFFFF"><td width="3%" align="center" class="titulosError" colspan="3" bgcolor="#FFFFFF">';
                    switch ($error) {
                        case 1: echo "Informaci&oacute;n actualizada!!";
                            break;             //ACUTALIZACION REALIZADA
                        case 2: echo "Municipio creado satisfactoriamente!!";
                            break;          //INSERCION REALIZADA
                        case 3: echo "Error al conectar a BD, comun&iacute;quese con el Administrador de sistema !!";
                            break; //NO CONECCION A BD
                        case 4: echo "Error al gestionar datos, comun&iacute;quese con el Administrador de sistema !!";
                            break; //ERROR EJECUCCI�N SQL
                        case 5: echo "No se puede eliminar municipio, se encuentra ligado a direcciones. !!";
                            break;
                        case 6: echo "Error: El indicativo del municipio que intenta crear ya existe. !!";
                            break;
                        case 7: echo "Error: El municipio que intenta crear ya existe. !!";
                            break;
                        case 8: echo "Se elimino de forma correcta el municipio. !!";
                            break;
                    }
                    echo '</td></tr>';
                }
                ?>
            </table>
            <table width="75%" border="0" align="center" cellpadding="0" cellspacing="0" class="listado2">
                <tr class="cajaBotonesMedio">
                    <td width="10%"class="listado1">&nbsp;</td>
                    <td width="20%" class="listado1" align="center"><input name="btn_accion" type="button" class="botones" id="btn_accion" value="Listado" onClick="ver_listado();" accesskey="L" alt="Alt + L" aria-label="Listar los municipios existentes en una nueva ventana"></td>
                    <td width="20%"class="listado1" align="center"><input name="btn_accion" type="submit" class="botones" id="btn_accion" value="Agregar" onClick="return ValidarInformacion('A');" accesskey="A" title="Agregar municipio"></td>
                    <td width="20%" class="listado1" align="center"><input name="btn_accion" type="submit" class="botones" id="btn_accion" value="Modificar" onClick="return ValidarInformacion('M');" accesskey="M" aria-label="Guardar cambios del municipio seleccionado"></td>
                    <td width="20%" class="listado1" align="center"><input name="btn_accion" type="submit" class="botones" id="btn_accion" value="Eliminar" onClick="return ValidarInformacion('E');" accesskey="E" aria-label="Eliminar municipio seleccionado"></td>
                    <td width="10%" class="listado1" >&nbsp;</td>
                </tr>
            </table>
        </center>
    </form>
</body>
</html>