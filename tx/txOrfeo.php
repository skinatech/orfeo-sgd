<?php

session_start();
error_reporting(7);
$url_raiz=$_SESSION['url_raiz'];
$dir_raiz=$_SESSION['dir_raiz'];		
$driver = $_SESSION['driver'];
$tipoRadicadoPqr = $_SESSION["tipoRadicadoPqr"];

if (!$dir_raiz) $dir_raiz=$_SESSION['dir_raiz'];
?>
<link rel="stylesheet" type="text/css" href="<?=$url_raiz?>/js/spiffyCal/spiffyCal_v2_1.css">
<script language="JavaScript" src="<?=$url_raiz?>/js/spiffyCal/spiffyCal_v2_1.js"></script>
<script language="javascript">
    <!-- Funcion que activa el sistema de marcar o desmarcar todos los check  -->
    function markAll(){
        if(document.form1.elements['checkAll'].checked)
            for(i=1;i<document.form1.elements.length;i++)
            document.form1.elements[i].checked=1;
        else
            for(i=1;i<document.form1.elements.length;i++)
            document.form1.elements[i].checked=0;
    }
    <?php
    require_once("$dir_raiz/js/pestanas.js");
    /**  TRANSACCIONES DE DOCUMENTOS
    *  @depsel number  contiene el codigo de la dependcia en caso de reasignacion de documentos
    *  @depsel8 number Contiene el Codigo de la dependencia en caso de Informar el documento
    *  @carpper number Indica codigo de la carpeta a la cual se va a mover el documento.
    *  @codTx   number Indica la transaccion a Trabajar. 8->Informat, 9->Reasignar, 21->Devlver
    */
    ?>
</script>
<script type="text/javascript">
        
    function showCalendarTable(){
        var calendarTable = document.getElementById('calendarTable');
        if(calendarTable.style.display==='none'){
            calendarTable.style.display='table';
        }else{
           calendarTable.style.display='none'; 
        }         
    }

    function vistoBueno(){
       changedepesel(9);
       document.getElementById('EnviaraV').value = 'VoBo';
       envioTx();
    }

    function devolver(){
       changedepesel(12);
       envioTx();
    }

    function txAgendar(){
        if (!validaAgendar('SI'))
        return;
        changedepesel(14);
        envioTx();
    } 

    function txNoAgendar(){
        changedepesel(15);
        envioTx();
    }

    function archivar() {
       changedepesel(13);
       envioTx();
    }

    function nrr() {
       changedepesel(16);
       envioTx();
    }

    function trd_m() {
       changedepesel(61);
       envioTx();
    }

    function envioTx() {
        sw=0;
        <?
        if(!$verrad){
        ?>
            for(i=1;i<document.form1.elements.length;i++)
            if (document.form1.elements[i].checked)
              sw=1;
            if (sw==0) {
                alert ("<?php echo utf8_decode("Debe seleccionar uno o más radicados"); ?>");
                return;
            }
        <?
        }
        ?>
       document.form1.submit();
    }

    function window_onload(){
       document.getElementById('depsel').style.display = 'none';
       document.getElementById('depsel8').style.display = 'none';
       document.getElementById('carpper').style.display = 'none';
       document.getElementById('Enviar').style.display = 'none';

        <?
        if(!$verrad){}else{
           ?>
           window_onload2();
           <?
        }
        if($carpeta==11 and $_SESSION['codusuario']==1){
            echo "document.getElementById('salida').style.display = ''; ";
            echo "document.getElementById('enviara').style.display = ''; ";
            echo "document.getElementById('Enviar').style.display = ''; ";
        }else{
          echo " ";
        }
        if($carpeta==11 and $_SESSION['codusuario']!=1){
            echo "document.getElementById('enviara').style.display = 'none'; ";
            echo "document.getElementById('Enviar').style.display = 'none'; ";
        }
        ?>
    }

    function retroalimentacionradicado(){

        if($('#retroalimentacion').val() != 0){

            $.post('<?=$url_raiz?>/buscaRutaArchivoPrincipal.php', {
                tipo: 11, 
                verrad: $('#verrad').val(),
                valor: $('#retroalimentacion').val()
            })
            .done(function(html) {
                alert('Se hizo el proceso correctamente.');
                window.location.reload();
            });
        }
        
    }

</script>
<body onload="MM_preloadImages('<?=$dir_raiz?>/imagenes/internas/overVobo.gif','<?=$dir_raiz?>/imagenes/internas/overNRR.gif','<?=$dir_raiz?>/imagenes/internas/overMoverA.gif','<?=$dir_raiz?>/imagenes/internas/overReasignar.gif','<?=$dir_raiz?>/imagenes/internas/overInformar.gif','<?=$dir_raiz?>/imagenes/internas/overDevolver.gif','<?=$dir_raiz?>/imagenes/internas/overArchivar.gif')"><table width="100%" border="1" cellspacing="0" cellpadding="0" align="center">
<?php
/* Si esta en la Carpeta de Visto Bueno no muesta las opciones de reenviar*/
//$db->conn->debug = true;
if (($mostrar_opc_envio==0) || ($_SESSION['codusuario'] == $radi_usua_actu && $_SESSION['dependencia'] == $radi_depe_actu)) {
    // Modificado SGD 21-Septiembre-2007
    $sql = "SELECT PERM_ARCHI AS \"PERM_ARCHI\", PERM_VOBO AS \"PERM_VOBO\" FROM USUARIO WHERE USUA_CODI = " . $_SESSION['codusuario'] . " AND 
            DEPE_CODI = '" . $_SESSION['dependencia']."'";
    $rs = $db->query($sql);

    if(!$rs->EOF) {
        $permArchi = $rs->fields["PERM_ARCHI"];
        $permVobo = $rs->fields["PERM_VOBO"];
    }
?>
<tr>
    <td>	
        <table id="calendarTable" width="100%" height="25"  border="0" cellpadding="0" cellspacing="0" style="display: none" >
            <tr>
                <td width="730" valign="bottom">
                    <?php
                    //Modificado skina if ($controlAgenda==1)
                    if ($controlAgenda==1 or $controlAgenda==2){
                        //Si el esta consultando la carpeta de documentos agendados entonces muestra el boton de sacar de la agenda
                        if ($agendado){	
                            echo("<img name='principal_r5_c1'  src='$url_raiz/imagenes/internas/noAgendar.gif' alt='Menu para asignar fecha de agendado al radicado seleccionado' width='130' height='20' border='0' alt=''>");
                            echo ("<input name='Submit2' type='button' class='botones' value='Agendar' onClick='txNoAgendar();'>");
                        }else{	
                            echo("<img name='principal_r5_c1'  src='$url_raiz/imagenes/internas/agendar.gif' width='69' height='20' border='0' alt='Menu para asignar fecha de agendado al radicado seleccionado'> ");
                            ?>
                            <script language="javascript">
                                var dateAvailable = new ctlSpiffyCalendarBox("dateAvailable", "form1","fechaAgenda","btnDate1","",scBTNMODE_CUSTOMBLUE);
                                dateAvailable.date = "2003-08-05";
                                dateAvailable.writeControl();
                                dateAvailable.dateFormat="yyyy-MM-dd";
                            </script>
                            <input name="Submit2" type="button" class="botones" value="Agendar" alt="Agendar radicado" title="Agendar radicado" onClick='txAgendar();'>
                            <?php
                        }
                    }
                    ?>		
                </td>
                <?php
                if (!$agendado) {		
                    if (($_SESSION['depe_codi_padre'] and $_SESSION['codusuario']==1) or $_SESSION['codusuario']!=1) {
                        if(!empty($permVobo) && $permVobo != 0) {
                            ?>
                            <script language="JavaScript" type="text/JavaScript">var VOBOPerm = true;</script>
                            <?php
                        }
                    }

                    if(!empty($permArchi) && $permArchi != 0) {
                        ?>
                        <script language="JavaScript" type="text/JavaScript">var archivarPerm = true;</script>            
                        <?php
                    }

                    if($codusuario){
                        ?>
                        <script language="JavaScript" type="text/JavaScript">var NRRPerm = false;</script>
                        <?php
                    }
                }
                ?>
            </tr>
        </table>
    </td>
</tr>
<?php
}
/* Final de opcion de enviar para carpetas que no son 11 y 0(VoBo)
*/
?>
<tr>
	<td height="59" colspan="3" >
            <table BORDER=0 class="titulos2"  WIDTH=100%  align='center' id="menuListar">
	<tr>
		<td width='40%'>
		<? if ($controlAgenda==1){ ?>
			<table width="100%"  border="0" cellpadding="0" cellspacing="5" class="titulos2">
			<tr>
				<td width="15%" class="titulos2">Listar por: </td>
				<td width="60%" class="titulos2">
					<a href='<?=$url_raiz?>/cuerpo.php?<?=session_name()."=".trim(session_id()).$encabezado."7&orderTipo=DESC&orderNo=10"; ?>' aria-label='Ordenar Por radicados Leidos' title='Ordenar Por radicados Leidos' alt='Ordenar Por radicados Leidos'>
					<span class='leidos'>Le&iacute;dos</span></a><?=$img7 ?>&nbsp;
					<a href='<?=$url_raiz?>/cuerpo.php?<?=session_name()."=".trim(session_id()).$encabezado."8&orderTipo=ASC&orderNo=10" ?>' title='Ordenar Por radicados no Le&iacute;dos' alt='Ordenar Por radicados no Le&iacute;dos' aria-label='Ordenar Por radicados no Le&acute;dos' class="tparr">
                                        <span class='no_leidos'>No le&iacute;dos</span></a>
				</td>
			</tr>
			</table>
			<?}?>
		</td>
<?php
/* si esta en la Carpeta de Visto Bueno no muesta las opciones de reenviar
*/
if (($mostrar_opc_envio==0) || ($_SESSION['codusuario'] == $radi_usua_actu && $_SESSION['dependencia'] == $radi_depe_actu)){
?>
		<td width='55%'  align="right" class="titulos2"  >
	<?php
	$row1 = array();
	// Combo en el que se muestran las dependencias, en el caso  de que el usuario escoja reasignar.
	$dependencianomb=substr($dependencianomb,0,35);
//	$subDependencia = 'depe_nomb';
    $subDependencia = $db->conn->Concat( "DEPE_CODI", "' - '", "DEPE_NOMB" );
	if($_SESSION["codusuario"]!=1 && $_SESSION["usuario_reasignacion"] !=1)
	{
        /*Se agrega filtro para que solo muestre las dependencias que esten activas*/
	  $whereReasignar = " where depe_codi = '$dependencia' and depe_estado=1";
	}
	else
	{
	  $whereReasignar = "where depe_estado=1";
	}
	$sql = "select $subDependencia, depe_codi from DEPENDENCIA $whereReasignar ORDER BY DEPE_NOMB";
	$rs = $db->query($sql);
    //echo '************ '.$sql;
	print $rs->GetMenu2('depsel',$dependencia,false,false,0," id=depsel class=select tabindex='-1' aria-label='Listado de dependencias para reasignar, seleccione una.' ");
	// genera las dependencias para informar
	$row1 = array();

	$dependencianomb=substr($dependencianomb,0,35);
    //$subDependencia = 'depe_nomb';
        $subDependencia = $db->conn->Concat( "DEPE_CODI", "' - '", "DEPE_NOMB" );

    /*Se agrega filtro para que solo muestre las dependencias que esten activas*/
	$sql = "select $subDependencia, depe_codi from DEPENDENCIA where depe_estado=1 ORDER BY DEPE_NOMB";
	$rs = $db->conn->Execute($sql);
	print $rs->GetMenu2('depsel8[]',$dependencia,false,true,5," id='depsel8' class='select' tabindex='-1' aria-label='Listado de dependencias para informar, seleccione una.' ");
	// Aqui se muestran las carpetas Personales

	$dependencianomb=substr($dependencianomb,0,35);
	$datoPersonal = "(Personal)";
	$nombreCarpeta = $db->conn->Concat("' $datoPersonal'",'nomb_carp');
    //$db->conn->debug = true;
	switch ($driver){
             case 'mssql':
                 $codigoCarpetaGen = $db->conn->Concat("10000","carp_codi");
                 $codigoCarpetaPer = $db->conn->Concat("11000","codi_carp");
                 break;
             case 'oci8':
                 $codigoCarpetaGen = $db->conn->Concat("cast(10000 as varchar(5))","carp_codi");
                 $codigoCarpetaPer = $db->conn->Concat("cast(11000 as varchar(5))","codi_carp");                 
                break;
            case 'mysql':
                 $codigoCarpetaGen = $db->conn->Concat("cast(10000 as char(5))","carp_codi");
                 $codigoCarpetaPer = $db->conn->Concat("cast(11000 as char(5))","codi_carp");
                 break;
             case 'postgres':
                 $codigoCarpetaGen = $db->conn->Concat("cast(10000 as varchar(5))","carp_codi");
                 $codigoCarpetaPer = $db->conn->Concat("cast(11000 as varchar(5))","codi_carp");
                break;
        }

	$sql = "select carp_desc as nomb_carp,$codigoCarpetaGen as carp_codi, 0 as orden from carpeta where carp_codi <> 11 "
                . "union select $nombreCarpeta as nomb_carp,$codigoCarpetaPer as carp_codi,1 as orden from carpeta_per "
                . "where usua_codi = $codusuario and depe_codi ='". $dependencia."' order by orden, carp_codi";
	$rs = $db->conn->Execute($sql);
        
	print $rs->GetMenu2('carpSel',1,false,false,0," id=carpper class=select tabindex='-1' aria-label='Listado de carpetas disponibles del usuario para mover documentos' ");

	// Fin de Muestra de Carpetas personales
	?>
		<input type=hidden name=enviara value=9>
		<input type=hidden name=EnviaraV id=EnviaraV value=''>
		</td>
		<td width='5%'class="titulos2" align="right">
			<input type=button value='Realizar' name=Enviar id=Enviar valign='middle' class='botones' aria-label='Enviar transacción documental'  onClick="envioTx();">
			<input type=hidden name=codTx value=9>
		</td>
<?php
/* Fin no mostrar opc_envio*/
}
?>
</TR>
</TABLE>
<?php
/**  FIN DE VISTA DE TRANSACCIONES **/


// if($carpeta == $tipoRadicadoPqr or $ent == $tipoRadicadoPqr){

//     if((isset($verrad) && $verrad != '')){

//         if(($radi_usua_actu == $_SESSION['codusuario']) && ($radi_depe_actu == $_SESSION['dependencia'])){

//             echo '
//             <div style="margin-left: 85%; margin-top: 10px;">
//                 <b>Retroalimentación: </b>
//                 <select name="retroalimentacion" id="retroalimentacion" onchange="retroalimentacionradicado()">
//                     <option value="0">-- Seleccionar --</option>
//                     <option value="1">Preventivo</option>
//                     <option value="2">Correctivo</option>
//                     <option value="3">Mejorar</option>
//                     <option value="4">Tramite/Consulta</option>
//                 </select>
//             </div>';

//         }

//     }

// }
?>
