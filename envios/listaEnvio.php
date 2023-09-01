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


if ($mostrarTable) {
    ?>
    <table>
        <?php
    }
    ?>
    <?php
    if (!$k) {
        ?> 
        <tr class=listado2>
            <td height="21" align="center" class=listado2> <?= $verrad_sal ?></td>
            <td height="21" align="center" class=listado2> <?= $verrad_padre ?></td>
            <?php
        } else {
            ?>
        <tr >
            <td class=listado2><?= $verrad_sal ?></td>
            <td class=listado2><?= $verrad_padre ?></td>
            <?php
        }
        ?>
        <td height="21" align="center" valign="top" class=listado2>
            <input type=text name=nombre_us id=nombre_us value='<?= $nombre_us ?>' size=20 maxlength="40" class="tex_area"></td>
        <td class=listado2><input type=text name=direccion_us id=direccion_us value='<?= $direccion_us ?>' class=e_cajas size=15 class="tex_area"> </Td>
        <?php
        if ($cantidadDestinos >= 1)
            $nombreDestinos = "destino$cantidadDestinos";
        else
            $nombreDestinos = "destino";
        ?>
        <td class=listado2><input type=text name='<?= $nombreDestinos ?>' value='<?= strtoupper($destino) ?>' size=20 class="tex_area"></td>
        <td class=listado2><input type=text name='departamento_us' id='departamento_us' value='<?= strtoupper($departamento_us) ?>' size=10 class="tex_area">
        <td class=listado2>
            <input type=text name='pais_us' id='pais_us' value='<?= $pais_us ?>' size=10 class="tex_area" >
            <input type=hidden name=dir_codigo id=dir_codigo value='<?= $dir_codigo ?>' size=5 class="tex_area">
        </td>
    </tr>

    <?php
    if (!$k) {
        ?>
        <tr  class=listado2>
            <td height="21" colspan="10" class=listado2>Asunto
                <input type=text disabled name=ra_asun value='<?= $ra_asun ?>' class="tex_area" size=120  >
            </td>
        </tr>
        <tr  class=listado2>
            <td height="21" colspan="10">Observaciones o Descripci&oacute;n Anexos
                <input type=text name="observaciones[<?= $i ?>]" size=50 class="tex_area">
            </TD></TR>
        <tr  class=listado2>
            <td height="21" colspan="10">No. de Gu&iacute;a
                <input type=text name="no_guia[<?= $i ?>]" size=20 maxlength="15" class="tex_area">
            </td>
        </tr>

        <?php
    }

    if ($mostrarTable) {
        ?>
    </table>
    <?php
}
?>
