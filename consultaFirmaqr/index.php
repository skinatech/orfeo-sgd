<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

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
error_reporting(7);
$url_raiz = dirname($_SERVER['HTTP_HOST']);
$dir_raiz = '../';
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

include_once "$dir_raiz/include/db/ConnectionHandler.php";
include "$dir_raiz/config.php";
$db = new ConnectionHandler("$dir_raiz");
$db->conn->debuger = true;

/* * * Se recibe numero de radicado convertido en base64 por GET ** */
$radicado = base64_decode($_GET['radicado']);

switch ($db->driver) {
    case 'postgres':
        $permiso_firma = "case when f.permiso_firma = 1 then 'Si' else 'No' End as usu_permiso_firma";
        $firma_qr = "case when u.firma_qr = 1 then 'Si' else 'No' End as usu_permiso_firma_act";
        $radi_nume_deri = "case when r.radi_nume_deri = '0' then r.radi_nume_radi else r.radi_nume_deri end as radicado_padre ";
        break;
    case 'oci8':
        $permiso_firma = "case f.permiso_firma when 1 then 'Si' else 'No' End as usu_permiso_firma";
        $firma_qr = "case u.firma_qr when 1 then 'Si' else 'No' End as usu_permiso_firma_act";
        $radi_nume_deri = "case r.radi_nume_deri when '0' then r.radi_nume_radi else r.radi_nume_deri end as radicado_padre ";
        break;
}

$sqlR = "SELECT "
        . "f.*, "
        . "$permiso_firma,"
        . "$firma_qr, "
        . "a.anex_desc as ra_asun,"
        . "d.depe_nomb as dependencia,"
        . "r.radi_fech_radi,"
        . "$radi_nume_deri "
        . "from sgd_firmas_qr f "
        . "INNER JOIN radicado r ON f.radi_nume_radi = r.radi_nume_radi "
        . "INNER JOIN anexos a ON f.radi_nume_radi = a.radi_nume_salida "
        . "INNER JOIN usuario u ON f.usua_login = u.usua_login "
        . "INNER JOIN dependencia d ON f.depe_codi = d.depe_codi "
        . "where f.radi_nume_radi ='$radicado' ";

$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

if ($radicado) {
    $rs = $db->query($sqlR);
} else {
    $rs = [];
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>.:: ORFEO5 Sistema de Gesti&oacute;n Documental ::.</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    <body class="is-preload">

        <!-- Wrapper -->
        <div id="wrapper">

            <!-- Header -->
            <header id="header" class="alt">
                    <!-- <section> -->
                <img src="../logoEntidad.png" width="200px"; height="100px";  alt="" />
                <a class="logo"><span style="color:#ffffff">Esté modulo de <strong>Consulta Firma QR</strong> permite verificar la información de un documento firmado en en el sistema de Orfeo.</span></a>
                <img src="../<?= $imagenes2 ?>/sgd.png" width="200px"; height="100px";  alt="" />
                <!-- </section> -->
            </header> 

            <!-- Main -->
            <div id="main">
                <?php if (!$rs->EOF && $rs->fields['RADI_NUME_RADI']) { ?>
                    <!-- One -->
                    <section id="one" class="tiles">

                        <article>
                            <header class="major">
                                <h3>Información de la firma</h3>
                                <p><span style="color:#8f0000" >Fecha firma:</span> <?= date("d-m-Y H:i:s", strtotime($rs->fields['FIRMA_FECHA'])); ?>  </p>
                                <p><span style="color:#8f0000" >Nombre usuario:</span> <?= $rs->fields['USUA_NOMB'] ?> </p>
                                <p><span style="color:#8f0000" >Dependencia:</span> <?= $rs->fields['DEPE_CODI'] . ' - ' . $rs->fields['DEPENDENCIA'] ?></p>
                                <p><span style="color:#8f0000" >Permiso de firma actual del usuario:</span> <?= $rs->fields['USU_PERMISO_FIRMA_ACT'] ?> </p>
                                <br>
                                <p><span style="color:#8f0000" > Nota:</span> Cuando se firmó el documento el permiso era <?= $rs->fields['USU_PERMISO_FIRMA'] ?>. </p>
                                <br>
                            </header>
                        </article>
                        <article>

                            <header class="major">
                                <h3>Información del radicado</h3>
                                <p><span style="color:#8f0000" > Nº radicado padre:</span> <?= $rs->fields['RADICADO_PADRE'] ?> </p>
                                <p><span style="color:#8f0000" > Nº radicado:</span> <?= $rs->fields['RADI_NUME_RADI'] ?> </p>
                                <p><span style="color:#8f0000" > Fecha radicado:</span> <?= date("d-m-Y H:i:s", strtotime($rs->fields['RADI_FECH_RADI'])); ?> </p>
                                <p><span style="color:#8f0000" > Asunto:</span> <?= $rs->fields['RA_ASUN'] ?> </p>
                            </header>
                        </article>
                    </section>

                <?php } else { ?>
                    <!-- Two -->
                    <section id="two">
                        <div class="inner">
                            <header class="major">
                                <h2>Validación de firma QR.</h2>
                            </header>
                            <p>El código QR escaneado no es valido para el sistema.</p>
                        </div>
                    </section>
                <?php } ?>
            </div>

            <!-- Footer -->
            <footer id="footer">
                <br>
                <!-- <div class="inner"> -->
                <center>
                    <a href="https://www.skinatech.com/portal/" target="_blank" > <img src="<?= $dir_raiz ?>logo_nit_blanco__200px.png" width="100px"; height="60px"; alt="Logo Skina" alt="" /></a>
                    <ul class="copyright">
                        <li>Copyright &copy; <?= date('Y') ?> <a href="https://www.skinatech.com/portal/" target="_blank" > Skina Technologies S.A.S</a>  Póliticas de privacidad</li>
                    </ul>
                </center>
                <!--  </div> -->
            </footer>

        </div>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/jquery.scrollex.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>

    </body>
</html>