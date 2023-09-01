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


if (isset($_GET['swListar']))
    $swListar = $_GET['swListar'];
if (isset($_GET['accion_sal']))
    $accion_sal = $_GET['accion_sal'];
if (!isset($img7))
    $img7 = "";
?>

<table><tr><td> </td></tr></table>
<table BORDER=0  cellpad=2 cellspacing='2' WIDTH=99%  align='center' class="borde_tab" cellpadding="2">
    <tr> 
        <?php
        if (isset($swListar)) {
            ?>
            <td width='50%'   class="titulos2" >
                <!--
                Skinatech
                Autor: Andrés Mosquera
                Fecha: 06-11-2018
                Información: Se comenta este html para que en envíos no se generen esos filtros ya que no es valido que pase eso
                -->
                <!--<table cellpadding="0" cellspacing="0" border="0" width="100%" >
                    <tr>
                        <td width='30%' align='left' height="40" class="titulos2" ><b>Listar Por </b>
                            <a href='<?= $pagina_actual ?>?<?= $encabezado ?>98&ordcambio=1' aria-label="Ordenar por documentos impresos" >
                                <span class='leidos'>Impresos</span></a>
                            <?= $img7 ?> <a href='<?= $pagina_actual ?>?<?= $encabezado ?>99&ordcambio=1'  aria-label="Ordenar por radicados en espera de impresión"><span class='no_leidos'>
                                    Por Imprimir-*-*-</span></a>
                        </td>
                    </tr>
                </table>-->
            </td>
            <?php
        }
        ?>
        <td width='50%' align="center" class="titulos2" > 
            <a href='<?= $pagina_sig ?>?<?= $encabezado ?> '></a>
            <?php
            if ($accion_sal) {
                ?>
                <input type=submit value="<?= $accion_sal ?>" name=Enviar id=Enviar valign='middle' class='botones_largo' onclick="Marcar(2);">
                <?php
            }
            ?>
        </td>
    </tr>
</table>

<script>
    function Marcar(tipoAnulacion)
    {
        marcados = 0;

        for (i = 0; i < document.formEnviar.elements.length; i++)
        {
            if (document.formEnviar.elements[i].checked == 1)
            {
                marcados++;
            }
        }
        if (marcados >= 1)
        {
            document.formEnviar.submit();
        } else
        {
            alert("Debe seleccionar un radicado");
        }
    }
    //Funcion que activa el sistema de marcar o desmarcar todos los check
    function markAll()
    {
        if (document.formEnviar.elements['checkAll'].checked)
            for (i = 1; i < document.formEnviar.elements.length; i++)
                document.formEnviar.elements[i].checked = 1;
        else
            for (i = 1; i < document.formEnviar.elements.length; i++)
                document.formEnviar.elements[i].checked = 0;
    }
</script>
<!--
function markAll(noRad)
{
        if(document.formEnviar.elements.check_titulo.checked || noRad >=1)
        {
                        for(i=1;i<document.formEnviar.elements.length;i++)
                        {
                                        document.formEnviar.elements[i].checked=1;
                        }
        }
        else
        {
                        for(i=1;i<document.formEnviar.elements.length;i++)
                        {
                                document.formEnviar.elements[i].checked=0;
                        }
        }
}
-->
