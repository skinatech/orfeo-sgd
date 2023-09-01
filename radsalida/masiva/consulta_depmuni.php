<?
/**
 * Este programa despliega el formulario con los par�metro de selecci�n que para consultar departamento y municipio
 * @author      Sixto Angel Pinz�n
 * @version     1.0
 */
session_start();
$ruta_raiz = "../..";

//Si no llega la dependencia recupera la sesi�n	
if (!$_SESSION['dependencia'])
    include "$ruta_raiz/rec_session.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Untitled Document</title>
        <link href="<?= $ruta_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $ruta_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script language="JavaScript" type="text/JavaScript">
            /**
            * Valida que el formulario desplegado se encuentre adecuadamente diligenciado y si lo est� entonces env�a el formulario
            */
            function enviar()
            {	if (document.consultar.consulta.value.length >0)
            {	document.consultar.submit();	}
            else
            {	alert("Debe ingresar el dato a consultar");	}
            }
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    </head>
    <body>
        <center>
            <div id="titulo" style="width: 45%;" align="center"><?= "Radicaci&oacute;n masiva <br>consulta de la divisi&oacute;n pol&iacute;tica administrativa (divipola)" ?></div>
            <form action="resultado_consulta_depmuni.php?<?= $phpsession ?>&krd=<?= $krd ?>&dependencia=<?= $dependencia ?>" method="post" enctype="multipart/form-data" name="consultar" id="consultar">
                <table width="45%" border="1" cellspacing="5" cellpadding="0" align="center" class="borde_tab">
                    <!--Modificado idrd 25-abr-2008 -->
                    <tr align="center" class='listado2'> 
                        <td class='listado2' height="12"><span class="etextomenu">
                                <BR><label for="Slc_Trd">Seleccione:</label> 
                                <select name="tipoCon" id="Slc_Trd" class="select" title="Categorias de busqueda, puede ser por departamento o por municipio">
                                    <option value='0'>Departamento</option></selected>
                                    <option value='1'>Municipio</option></selected>
                                </select>
                        </td>
                    </tr>
                    <tr align="center" class='listado2'> 
                        <td class='listado2' height="12"><span class="etextomenu">
                                <BR><label for="consulta"><?= "Efect&uacute;e la b&uacute;squeda por el nombre del departamento o municipio."?></label><BR>
                                <input name="consulta" type="input" size="50" class="tex_area"  id="consulta">
                        </td>
                    </tr>
                    <tr align="center" class="listado1"> 
                        <td height="30">
                            <input name="enviaPrueba" type="button"  class="botones" id="enviaPrueba"  onClick="enviar();" value="Consultar">
                        </td>
                    </tr>
                </table>
            </form>
    </body>
</html>
