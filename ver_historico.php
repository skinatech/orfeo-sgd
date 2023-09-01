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
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];
define('ADODB_ASSOC_CASE', $assoc);
?>
<html>
    <head>
        <title>Historico</title>
        <!--<link rel="stylesheet" href="estilos/orfeo.css">-->
    </head>
    <body >
        <table width="100%" border="1" cellpadding="0" cellspacing="5">
            <tr> 
                <td class="titulos2" colspan="6" >Historico </td>
            </tr>
        </table>
        <?php
        require_once("$ruta_raiz/class_control/Transaccion.php");
        require_once("$ruta_raiz/class_control/Dependencia.php");
        require_once("$ruta_raiz/class_control/usuario.php");
        error_reporting(7);
        //$db->conn->debug=true;
        $trans = new Transaccion($db);
        $objDep = new Dependencia($db);
        $objUs = new Usuario($db);

        $isql = "select usua_nomb from usuario where depe_codi='$radi_depe_actu' and usua_codi=$radi_usua_actu";
        $rs = $db->query($isql);
        $usuario_actual = $assoc == 0 ? $rs->fields["usua_nomb"] : $rs->fields["USUA_NOMB"];

        $isql = "select depe_nomb from dependencia where depe_codi='$radi_depe_actu'";
        $rs = $db->query($isql);        
        $dependencia_actual = $assoc == 0 ? $rs->fields["depe_nomb"] : $rs->fields["DEPE_NOMB"];

        //by skinatech, dependencia de radicacion
        $isql = "select usuario.usua_nomb from usuario INNER JOIN hist_eventos historial ON (usuario.usua_doc=historial.usua_doc AND (historial.sgd_ttr_codigo=2 OR historial.sgd_ttr_codigo=30)) where historial.radi_nume_radi='" . $verrad . "'";
        $rs = $db->query($isql);

        if ($usuario_actual == '') {
            $usuario_rad = 'Ciudadano';
        } else {
            $usuario_rad = $assoc == 0 ? $rs->fields["usua_nomb"] : $rs->fields["USUA_NOMB"];
        }

        $isql = "select depe_nomb from dependencia where depe_codi='$radi_depe_radi'";
        $rs = $db->query($isql);

        $dependencia_rad = $assoc == 0 ? $rs->fields["depe_nomb"] : $rs->fields["DEPE_NOMB"];
        ?>
        <table width="100%" align="center" border="1" cellpadding="0" cellspacing="5" class="borde_tab"  >
            <tr align="left">
                <td width=10% class="listado1" height="24">Usuario actual             </td>
                <td width=15% class="listado2" height="24"><?= $usuario_actual ?>     </td>
                <td width=10% class="listado1" height="24">Dependencia actual         </td>
                <td width=15% class="listado2" height="24"><?= $dependencia_actual ?> </td>
            </tr>
            <tr class='etextomenu' align="left">
                <td width=10% class="listado1" height="24">Usuario radicador                </td>
                <td width=15% class="listado2" height="24"><?= $usuario_rad ?>              </td>
                <td width=10% class="listado1" height="24">Dependencia de radicaci&oacute;n </td> 
                <td width=15% class="listado2" height="24"><?= $dependencia_rad ?>          </td>
            </tr>
        </table>
        <table width="100%" border="1" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <td height="25" class="titulos2">Flujo hist&oacute;rico del documento</td>
            </tr>
        </table>
        <table  width="100%" align="center" border="1" cellpadding="0" cellspacing="5" class="borde_tab" >
            <tr align="center">
                <td width=10% class="titulos3" height="24">Dependencia          </td>
                <td width=10%  class="titulos3" height="24">Fecha               </td>
                <td width=15% class="titulos3" height="24">Transacci&oacute;n   </td>  
                <td width=15% class="titulos3" height="24">US. origen           </td>
                <td width=35% class="titulos3" height="24">Comentario           </td>
            </tr>
            <?php
            $sqlFecha = $db->conn->SQLDate("d-m-Y H:i A", "a.HIST_FECH");
            $isql = "select ". $sqlFecha ." AS HIST_FECH1, a.depe_codi, a.usua_codi, a.RADI_NUME_RADI, a.hist_obse, a.usua_codi_dest, a.usua_doc, a.hist_obse, a.sgd_ttr_codigo from hist_eventos a where a.radi_nume_radi ='$verrad' order by hist_fech desc ";
            $i = 1;
            $rs = $db->query($isql);

            if ($rs) {
                while (!$rs->EOF) {
                    $usua_doc_dest = "";
                    $usua_doc_hist = "";
                    $usua_nomb_historico = "";
                    $usua_destino = "";
                    $numdata = $assoc == 0 ? trim($rs->fields["carp_codi"]) : trim($rs->fields["CARP_CODI"]);
                    if ($data == "") {
                        $assoc == 0 ? $rs1->fields["usua_nomb"] : $rs1->fields["USUA_NOMB"];
                    }

                    $data = "NULL";
                    $numerot = $assoc == 0 ? $rs->fields["num"] : $rs->fields["NUM"];
                    $usua_doc_hist = $assoc == 0 ? $rs->fields["usua_doc"] : $rs->fields["USUA_DOC"];
                    $usua_codi_dest = $assoc == 0 ? $rs->fields["usua_codi_dest"] : $rs->fields["USUA_CODI_DEST"];
                    $usua_dest = intval(substr($usua_codi_dest, 3, 3));
                    $depe_dest = intval(substr($usua_codi_dest, 0, 3));
                    $usua_codi = $assoc == 0 ? $rs->fields["usua_codi"] : $rs->fields["USUA_CODI"];
                    $depe_codi = $assoc == 0 ? $rs->fields["depe_codi"] : $rs->fields["DEPE_CODI"];
                    $codTransac = $assoc == 0 ? $rs->fields["sgd_ttr_codigo"] : $rs->fields["SGD_TTR_CODIGO"];
                    $descTransaccion = $assoc == 0 ? $rs->fields["sgd_ttr_descrip"] : $rs->fields["SGD_TTR_DESCRIP"];

                    if (!$codTransac)
                        $codTransac = "0";
                    $trans->Transaccion_codigo($codTransac);
                    $objUs->usuarioDocto($usua_doc_hist);
                    $objDep->Dependencia_codigo($depe_codi);
                    error_reporting(7);
                    if ($carpeta == $numdata) {
                        $imagen = "usuarios.gif";
                    } else {
                        $imagen = "usuarios.gif";
                    }
                    if ($i == 1) {
                        ?>
                        <tr class='tpar'> <?php
                            $i = 1;
                        }
                        ?>
                        <td class="listado2" >
                            <?= $objDep->getDepe_nomb() ?></td>
                        <td class="listado2">
                            <?= $rs->fields["HIST_FECH1"] ?>
                        </td>
                        <td class="listado2"  >
                            <?= $trans->getDescripcion() ?>
                        </td>
                        <td class="listado2"  >
                            <?php
                            if ($objUs->get_usua_nomb() == '') {
                                echo 'Ciudadano';
                            } else {
                                echo $objUs->get_usua_nomb();
                            }
                            ?>
                        </td>
                        <?php
                        /**
                         *  Campo qque se limino de forma Temporal USUARIO - DESTINO 
                         * <td class="celdaGris"  >
                         * <?=$usua_destino?> </td> 
                         */
                        ?>
                        <td class="listado2"><?= $assoc == 0 ? $rs->fields["hist_obse"] : $rs->fields["HIST_OBSE"] ?></td>
                    </tr>
                    <?php
                    $rs->MoveNext();
                }
            }
            // Finaliza Historicos
            ?>
        </table>
        <?php
        //empieza datos de envio
        include "$ruta_raiz/include/query/queryver_historico.php";
        $isql = "select $numero_salida from anexos a where a.anex_radi_nume='$verrad'";
        $rs = $db->query($isql);
        $radicado_d = "";
        while (!$rs->EOF) {
            $valor = $rs->fields["RADI_NUME_SALIDA"];
            if (trim($valor)) {
                $radicado_d .= "'" . trim($valor) . "', ";
            }
            $rs->MoveNext();
        }

        $radicado_d .= "'$verrad'";
        error_reporting(7);

        include "$ruta_raiz/include/query/queryver_historico.php";
        $sqlFechaEnvio = $db->conn->SQLDate("d-m-Y H:i A", "a.SGD_RENV_FECH");

        $isql = "select $sqlFechaEnvio AS SGD_RENV_FECH, a.DEPE_CODI, a.USUA_DOC, a.RADI_NUME_SAL, a.SGD_RENV_NOMBRE, a.SGD_RENV_DIR, a.SGD_RENV_MPIO, a.SGD_RENV_DEPTO, a.SGD_RENV_PLANILLA, a.SGD_RENV_GUIA, b.DEPE_NOMB, c.SGD_FENV_DESCRIP, $numero_sal, a.SGD_RENV_OBSERVA, a.SGD_DEVE_CODIGO, sgd_renv_codigo from sgd_renv_regenvio a, dependencia b, sgd_fenv_frmenvio c where a.radi_nume_sal in($radicado_d) AND a.depe_codi=b.depe_codi AND a.sgd_fenv_codigo = c.sgd_fenv_codigo order by a.SGD_RENV_FECH desc ";
        $rs = $db->query($isql);

        ?>
        <table width="100%" align="center" border="1" cellpadding="0" cellspacing="5" class="borde_tab">
            <tr>
                <td height="25" class="titulos2">Datos de env&iacute;o</td>
            </tr>
        </table>
        <table width="100%"  align="center" border="1" cellpadding="0" cellspacing="5" class="borde_tab" >
            <tr  align="center">
                <td width=10% class="titulos3" height="24"> Radicado                        </td>
                <td width=15% class="titulos3" height="24"> Dependencia                     </td>
                <td width=10% class="titulos3" height="24"> Fecha Envio                     </td>
                <td width=15% class="titulos3" height="24"> Destinatario                    </td>      
                <td width=15% class="titulos3" height="24"> Direcci&oacute;n                </td>
                <td width=15% class="titulos3" height="24"> Departamento                    </td>
                <td width=15% class="titulos3" height="24"> Municipio                       </td>
                <td width=15% class="titulos3" height="24"> Tipo Env&iacute;o               </td>
                <td width=10% class="titulos3" height="24"> No.planilla                     </td>
                <td width=10% class="titulos3" height="24"> No.Gu&iacute;a                  </td>
                <td width=15% class="titulos3" height="24"> Observaciones O desc de anexos  </td>      
            </tr>
            <?php
            $i = 1;
            while (!$rs->EOF) {
                $radDev = $rs->fields["SGD_DEVE_CODIGO"];
                $radEnviado = $rs->fields["RADI_NUME_SAL"];
                if ($radDev) {
                    $imgRadDev = "<img src='$ruta_raiz/imagenes/devueltos.gif' alt='Documento Devuelto por empresa de Mensajeria' title='Documento Devuelto por empresa de Mensajeria'>";
                } else {
                    $imgRadDev = "";
                }
                $numdata = trim($rs->fields["CARP_CODI"]);
                if ($data == "")
                    $data = "NULL";
                //$numerot = $rs->RecordCount();
                if ($carpeta == $numdata) { $imagen = "usuarios.gif"; } else { $imagen = "usuarios.gif"; }
                ?>
                <tr>
                    <?php
                    if ($i == 1) { $i = 1; }
                    ?>
                    <td class="listado2"><?= $imgRadDev ?><?= $radEnviado ?>    </td>
                    <td class="listado2"><?= $rs->fields["DEPE_NOMB"] ?>        </td>
                    <td class="listado2">
                        <?php
                        echo "<a class=vinculos href='./verradicado.php?verrad=$radEnviado&krd=$krd' target='verrad$radEnviado'><span class='timpar'>" . $rs->fields["SGD_RENV_FECH"] . "</span></a>";
                        ?>
                    </td>
                    <td class="listado2"><?= $rs->fields["SGD_RENV_NOMBRE"] ?>   </td>
                    <td class="listado2"><?= $rs->fields["SGD_RENV_DIR"] ?>      </td>
                    <td class="listado2"><?= $rs->fields["SGD_RENV_DEPTO"] ?>    </td>
                    <td class="listado2"><?= $rs->fields["SGD_RENV_MPIO"] ?>     </td>
                    <td class="listado2"><?= $rs->fields["SGD_FENV_DESCRIP"] ?>  </td>
                    <td class="listado2"><?= $rs->fields["SGD_RENV_PLANILLA"] ?> </td>
                    <td class="listado2"><?= $rs->fields["SGD_RENV_GUIA"] ?>     </td>
                    <td class="listado2"><?= $rs->fields["SGD_RENV_OBSERVA"] ?>  </td>
                </tr>
                <?php
                $rs->MoveNext();
            }
            // Finaliza Historicos
            ?>
        </table>
    </body>
</html>
