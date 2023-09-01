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


session_start();
if (!$ruta_raiz)
    $ruta_raiz = "..";
$sqlFechaDocto = $db->conn->SQLDate("Y-m-D H:i:s A", "mf.sgd_rdf_fech");
$sqlSubstDescS = 's.sgd_srd_descrip';
$sqlSubstDescSu = 'su.sgd_sbrd_descrip';
$sqlSubstDescT = 't.sgd_tpr_descrip';
$sqlSubstDescD = 'd.depe_nomb';

include "$ruta_raiz/include/query/trd/querylista_tiposAsignados.php";
$isqlC = 'select ' . $sqlConcat . '      AS "CODIGO" 
            , ' . $sqlSubstDescS . '  AS "SERIE" 
            , ' . $sqlSubstDescSu . ' AS "SUBSERIE" 
            , ' . $sqlSubstDescT . '  AS "TIPO_DOCUMENTO" 
            , ' . $sqlSubstDescD . '  AS "DEPENDENCIA"
            , m.sgd_mrd_codigo        AS "CODIGO_TRD"
            , b.usua_codi            AS "USUARIO"
            , b.depe_codi            AS "DEPE"
        from 
            SGD_RDF_RETDOCF b,
            SGD_MRD_MATRIRD m, 
            DEPENDENCIA d,
            SGD_SRD_SERIESRD s,
            SGD_SBRD_SUBSERIERD su, 
            SGD_TPR_TPDCUMENTO t
        where d.depe_codi     = b.depe_codi 
            and s.sgd_srd_codigo  = m.sgd_srd_codigo 
            and su.sgd_sbrd_codigo = m.sgd_sbrd_codigo 
            and su.sgd_srd_codigo = m.sgd_srd_codigo
            and t.sgd_tpr_codigo  = m.sgd_tpr_codigo
            and b.sgd_mrd_codigo = m.sgd_mrd_codigo
             ' . $whereFiltro;
error_reporting(7);
?>
<br>
<TABLE class="borde_tab"><tr><td>
            Clasificación de los radicados <?= $whereFiltro2 ?></td></tr></table>
<br>
<table class=borde_tab width="100%" cellpadding="0" border='1' cellspacing="5">
    <tr class="titulos3" align="center">
        <td width="10%" >Código</td>
        <td width="20%">Serie</td>
        <td width="20%">Subserie</td>
        <td width="20%">Tipo de documento</td>
        <td width="20%">Dependencia</td>
        <td width="20%">Acción</td>
    </tr>
    <?php
//    $db->conn->debug=true;
    $rsC = $db->query($isqlC);
    while (!$rsC->EOF) {
        $coddocu = $rsC->fields["CODIGO"];
        $dserie = $rsC->fields["SERIE"];
        $dsubser = $rsC->fields["SUBSERIE"];
        $dtipodo = $rsC->fields["TIPO_DOCUMENTO"];
        $ddepend = $rsC->fields["DEPENDENCIA"];
        $codiTRDEli = $rsC->fields["CODIGO_TRD"];
        $codiTRDModi = $codiTRDEli;
        ?> 
        <td class="listado2"> <font size=-3><?= $coddocu ?></font> </td> 
        <td class="listado2"> <font size=-3><?= $dserie ?></font> </td>
        <td class="listado2"> <font size=-3><?= $dsubser ?></font> </td>
        <td class="listado2"> <font size=-3><?= $dtipodo ?></font> </td>
        <td class="listado2"> <font size=-3><?= $ddepend ?></font> </td>
        <td  <? if (!$rsC->fields["CODIGO"]) echo " class='celdaGris' "; else echo " class='listado2' "; ?>  > <font size=2>
    <?php
    if ($coddocu && $rsC->fields["USUARIO"] == $codusua && $rsC->fields["DEPE"] == $coddepe) {
        echo "<a href=javascript:borrarArchivo('$codiTRDEli','si')><span class='botones_largo'>&nbsp;Borrar&nbsp;</a> ";
    }
    ?> 

            </font>
        </td>
    </tr>
    <?php
    $rsC->MoveNext();
}
//<font face="Arial, Helvetica, sans-serif" class="etextomenu">
?>
</table>
