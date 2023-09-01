<?php
/**
 * En este frame se van cargado cada una de las funcionalidades del sistema
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
  |                       MAIN                               |
  +--------------------------------------------------------- */

include_once "class_control/AplIntegrada.php";
$objApl = new AplIntegrada($db);
$lkGenerico = "&usuario=$krd&nsesion=" . trim(session_id()) . "&nro=$verradicado" . "$datos_envio";
?>
<script src="js/popcalendar.js"></script>
<script>
    function regresar(){    
        //window.history.go(0);
        window.location.reload();
    }

    /**
    * Autor: Luis Miguel Romero 
    * Fecga: 18-12-2019
    * Infor: Se agrega permiso para publicar documentos
    */
    function publicarDocumento( verrad, estadoPublico ){
    
        if(estadoPublico == 't'){ 
            var estado = 'Confidencial';
        }else{
            var estado = 'Publico';
        }
        if ( confirm('Esta seguro que desea poner el documento principal como '+estado+' ?') ) {
            window.open("<?= $ruta_raiz ?>/seguridad/generar.php?&codanexo=" + verrad +
                        "&estadoPublico="+estadoPublico+"&krd=<?= $krd ?>&ind_ProcAnex=<?= $ind_ProcAnex ?>&responsable=<?= $responsable ?>&coddepe=<?= $coddepe ?>&codusua=<?= $codusua ?>", "Responsable", "height=200,width=600,scrollbars=yes");
        }
        return;
    }

    /**
    * Autor: Jenny Gamez 
    * Fecga: 05-08-2020
    * Infor: Se agrega permiso para cambiar confidencialidad del radicado.
    */
    function confidencialidadDocumento( verrad, nivelRad){
        window.open("<?= $ruta_raiz ?>/seguridad/radicado.php?&verrad=" + verrad +
            "&nivelRad="+nivelRad+"&krd=<?= $krd ?>&ind_ProcAnex=<?= $ind_ProcAnex ?>&responsable=<?= $responsable ?>&coddepe=<?= $coddepe ?>&codusua=<?= $codusua ?>", "Responsable", "height=250,width=680,scrollbars=yes");
        return;
    }
</script>

<table width="100%" border="0" cellpadding="0" cellspacing="5" >
        <tr> 
            <td class="titulos2" colspan="6" ><b>Informaci&oacute;n general </bl></td>
        </tr>
</table>

<table border=1 cellspace=2 cellpad=2 WIDTH=100% align="left" class="borde_tab" id=tb_general>
        <tr> 
            <td  width="25%" align="right" height="25"  class="listado1" >Asunto</td>
            <td class='listado2' colspan="" width="25%"><?= $ra_asun ?></td>

            <td  height="25" class="listado1" >Fecha de radicado</td>
            <td  width="25%" height="25" colspan="3" class="listado2"><?= $radi_fech_radi ?></td>
        </tr>
        <tr> 
            <?php
            if (isset($nombret_us1)) {
                ?>
                <td align="right"  height="25"  class="listado1">Remitente/Destinatario</td>
                <td class='listado2' width="25%" height="25"><?= $nombret_us1 ?></td>
                <td width="25%" align="right" height="25"  class="listado1" >Direcci&oacute;n de correspondencia</td>
                <td class='listado2' width="25%"><?= $direccion_us1 ?> / <?= $telefono_us1 ?> </td>
                <td width="25%" align="right" height="25"  class="listado1" >Mun/Dpto</td>
                <td class='listado2' width="25%"><?= $dpto_nombre_us1 . "/" . $muni_nombre_us1 ?></td>
                <?php
            } elseif (isset($nombret_us2)) {
                ?>
                <td align="right"   height="25"  class="listado1">Remitente/Destinatario</td>
                <td class='listado2' width="25%" height="25"> <?= $nombret_us2 ?></td>
                <td   width="25%" align="right" height="25"  class="listado1">Direcci&oacute;n de correspondencia </td>
                <td class='listado2' width="25%"> <?= $direccion_us2 ?></td>
                <td   width="25%" align="right" height="25"  class="listado1">Mun/Dptop</td>
                <td class='listado2' width="25%"> <?= $dpto_nombre_us2 . "/" . $muni_nombre_us2 ?></td>
                <?php
            } elseif (isset($nombret_us3)) {
                ?>
                <td align="right"   height="25"  class="listado1">Remitente/Destinatario</td>
                <td class='listado2' width="25%" height="25"> <?= $nombret_us3 ?></td>
                <td   width="25%" align="right" height="25"  class="listado1">Direcci&oacute;n de correspondencia</td>
                <td class='listado2' width="25%"> <?= $direccion_us3 ?></td>
                <td   width="25%" align="right" height="25"  class="listado1">Mun/Dpto</td>
                <td class='listado2' width="25%"> <?= $dpto_nombre_us3 . "/" . $muni_nombre_us3 ?></td>
                <?php
            }
            ?>
        </tr>
        <tr>
            <td width="25%" height="25" align="right" class="listado1"> Descripci&oacute;n Anexos </td>
            <td class='listado2' width="25%" height="11"> <?= $radi_desc_anex ?></td>
            <td width="25%" align="right" height="25" class="listado1">Identificaci&oacute;n/correo</td>
            <td class='listado2' width="25%"><?= $cc_documento_us1 ?> / <?= $mail_us1 ?></td>
            <td width="25%" align="right" height="25" class="listado1"><?= $ent == $tipoRadicadoPqr ? 'Tipo de Usuario':'Dignatario' ?></td>
            <td class='listado2' width="25%"><?= $ent == $tipoRadicadoPqr ? $tipoUsuarioGrupoNombre : $otro ?></td>
        </tr>
        <tr> 
            <td align="right"   height="25"  class="listado1">
                Imagen
            </td>
            <td class='listado2' width="25%" height="25">
                <?php
                if ($carpeta_rad == 3) {
                    $sqlServerAnex = "select COUNT(anex_radi_nume) as numero from anexos where anex_radi_nume='".$verradicado."'";
                    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
                    $rsAnex = $db->query($sqlServerAnex);
                    if($rsAnex->fields["numero"] == 0){
                        echo "<span class='vinculos'>$imagenv</span>";
                    }else{
                        echo "<span class='vinculos'>Ya cuenta con una actualizaci&oacute;n de tarjeta de firma</span>";
                    }
                }else{
                    echo "<span class='vinculos'>$imagenv</span>";
                }
                ?>
            </td>
            <td align="right" height="25" colspan="1"  class="listado1">
                Nivel de confidencialidad
            </td>
            <td align="right" height="25" colspan="1"  class="listado1">
                <font color="black">
                    <?php
                    if($nivel_seguridad == 1){
                        $confidencialidadRadicado = 'Confidencial';
                    }else{
                        $confidencialidadRadicado = 'Público';
                    }

                    echo $confidencialidadRadicado;
                    ?>
                </font>
                <?php
                // Se verifica que el usuario actual es el mismo que el usuario que inicio sesión ya que es la unica persona que puede cambiar el nivel del radicado.
                if(($radi_usua_actu == $_SESSION['codusuario']) && ($radi_depe_actu == $_SESSION['dependencia'])){
                    ?>
                    <input type=button name=mosrtar_tipo_confidencial value='...' class=botones_2 onClick="confidencialidadDocumento('<?=$verrad?>', <?=$nivelRad?>);" aria-label="Botón para aplicar confidencialidad al radicado">
                    <?php
                }
                ?>                
            </td>
            <td width="25%" height="25" align="right" class="listado1">Restricción Radicado</td>
            <?php 
            /**
            * Autor: Luis Miguel Romero 
            * Fecga: 18-12-2019
            * Infor: Se agrega permiso para publicar documentos
            */
            if( $_SESSION['usua_perm_doc_publico'] == '1' ){ 
                ?> 
                <td >
                    <font size=1>
                    <?php
                        $extRadi = substr($radi_path, -3); 
                        // Verifica la extensión que sea PDF para que se muestre
                        if( $extRadi == 'pdf' or $extRadi == 'PDF' ) {
                            if( $radi_docu_publico == 't' ){
                                echo "<span style='color:green; font-size: 12px;' ><b><a href=javascript:publicarDocumento('$verrad','".$radi_docu_publico."'); aria-label='Publicar documento'>Marcar Confidencial</a></b></span>" ;
                            }else{
                                echo "<a class=vinculos href=javascript:publicarDocumento('$verrad','".$radi_docu_publico."');  aria-label='Publicar documento'>Marcar Público</a> ";
                            }
                        }else{
                            echo 'No se puede publicar el documento principal del radicado';
                        }
                        
                    ?>
                    </font>
                </td>
                <?php 
            } /** Fin usua_perm_doc_publico */
            ?> 
        </tr>
        <tr> 
            <td align="right" height="25" colspan="1"  class="listado1">
                Tabla de retención documental (TRD)
            </td>
            <td class='listado2' <?php if($ent == 4){  echo "colspan='2'";   }else{  echo "colspan='5'"; } ?> >
                <?php
                if (!$codserie)
                    $codserie = "0";
                if (!$tsub)
                    $tsub = "0";
                if (trim($val_tpdoc_grbTRD) == "///")
                    $val_tpdoc_grbTRD = "";
                ?>
                <?= $serie_nombre ?><font color=black>/</font><?= $subserie_nombre ?><font color=black>/</font><?= $tpdoc_nombreTRD ?>
                <?php
                if ($verradPermisos == "Full" or $datoVer == "985") {
                    ?>
                    <input type=button name=mosrtar_tipo_doc2 value='...' class=botones_2 onClick="ver_tipodocuTRD(<?= $codserie ?>,<?= $tsub ?>);" aria-label="Botón para aplicar una TRD al radicado">
                <?php
                }
                ?>
            </td>

            <?php  if($ent == 4){  ?>
                <td align="right" height="25" colspan="1"  class="listado1">
                    Fecha de queja
                </td>

                <td class='listado2' colspan="2">
                    <?php
 
                        $fecha_queja = $db->conn->execute("SELECT fecha_queja, radi_fech_radi FROM radicado WHERE radi_nume_radi = '".$verrad."'")->getRows();
                        $print_fecha = ($fecha_queja[0]['FECHA_QUEJA']) ?  $fecha_queja[0]['FECHA_QUEJA'] :  $fecha_queja[0]['RADI_FECH_RADI'];
                        echo date("Y-m-d H:i", strtotime($print_fecha));
         
                    ?>
                </td>
            <?php  } ?>



        </tr>
</table>
