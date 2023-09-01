<?php
session_start();
$ruta_raiz = "../../";
include_once "$ruta_raiz/config.php";
$verradicado = $verrad;
$krdOld = $krd;
$menu_ver_tmpOld = $menu_ver_tmp;
$menu_ver_Old = $menu_ver;

foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;
$nomcarpeta = $_GET["nomcarpeta"];
if ($_GET["tipo_carp"])
    $tipo_carp = $_GET["tipo_carp"];

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];
$estructuraRad = $_SESSION['estructuraRad'];
$logoEtiqueta = $_SESSION['logoEtiqueta'];

if (!$krd)
    $krd = $krdOld;

include_once "$ruta_raiz/include/db/ConnectionHandler.php";

if ($verradicado)
    $verrad = $verradicado;
$numrad = $verrad;
$db = new ConnectionHandler($ruta_raiz);
$db->conn->SetFetchMode(3);

include $ruta_raiz . '/ver_datosrad.php';

// SQL para extraer nombre de la depe destino
$depe_sql = "select depe_nomb  FROM dependencia  WHERE depe_codi = '$radi_depe_actu'";
$rs_depe = $db->conn->Execute($depe_sql);
$dependenciaDestino = isset($rs_depe->fields["depe_nomb"]) ? $rs_depe->fields["depe_nomb"]:$rs_depe->fields["DEPE_NOMB"] ;
?>
<html>
    <head>
        <title>Sticker web</title>
        <style type="text/css">

            body {
                margin-bottom:0;
                margin-left:0;
                margin-right:0;
                margin-top:0;
                padding-bottom:0;
                padding-left:0;
                padding-right:0;
                padding-top:0;
                font-family: Arial, Helvetica, sans-serif;
            }

            .stik1{
                font-size: 12px;
            }

            .stik2{
                font-size: 12px;
                text-align: center;
                vertical-align:top;
            }
            .stik3{
                font-size: 12px;
                text-align: center;
            }
            font{
                line-height:100%;
            }

        </style>
        <script type="text/javascript" src="jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="./js/jquery-barcode.js"></script>
    </head>
    <?php
    $noRad = $_REQUEST['nurad'];

    // By Skinatech - 14/08/2018
    // Para la construcción del número de radicado, esto indica la parte inicial del radicado.
    if ($estructuraRad == 'ymd'){
        $num = 8;
    }elseif ($estructuraRad == 'ym') {
        $num = 6;
    }else {
        $num = 4;
    }

    $numeroRadSeparado = substr($noRad, 0, $num) . "-" . substr($noRad, $num, $longitud_codigo_dependencia) . "-" . substr($noRad, ($num + $longitud_codigo_dependencia), 6) . "-" . substr($noRad, -1);
    $logoEtiqueta == true ? $displayLogo = 'block' : $displayLogo = 'none';
    ?>
    <body topmargin="0" leftmargin="0" onload="generateBarcode();">
        <table width="400px" height="120px" cellpadding="0" cellspacing="0">
            <tr>
                <td colspan=3 width=40px>
                    <br><br>
                    <img src='<?= $ruta_raiz ?>/radicacion/stickerWeb/logoEntidad.png' alt="<?= $_SESSION["entidad"] ?>" width=70px height=60px >
                </td>
                <td colspan=1 align=center>
                    <?php
                    $text = $_REQUEST['nurad'];
                    //echo "<img alt='testing' src='barcode.php?codetype=Code39&size=70&text=".$text."&print=true'/>";
                    //echo "<img alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=".$text."&code=Code39&translate-esc=on'/>"
                    ?>

                    <div style='text-align: center;'>
                    <!-- insert your custom barcode setting your data in the GET parameter "data" -->
                    <img alt='Barcode Generator TEC-IT'
                        src='https://barcode.tec-it.com/barcode.ashx?data=<?=$text?>&code=Code39&translate-esc=on' style="width: 100%; margin-left: -50px; height: 30%;"/>
                    </div><br>
                    <div align="left" style="font-size: 12px; line-height:100%; margin-top: -13px;">
                        <!-- <strong>Rad No. <?= $numeroRadSeparado ?></strong><br> -->
                        Fecha Rad: <?= substr($radi_fech_radi, 0, 16) ?> - Usu Rad: <?= $usuarioLoginRadicador ?><br>
                        <?php
                        // By Skinatech Jenny Gamez - 02/05/2017
                        // Se evalua si el radicado que se genera es de salida, ya que en este tipo de radicado el stiker se genera de forma distinta
                        if (substr($noRad, -1) == 1) {
                            echo "Rem/Des: " . substr($dependenciaDestino, 0, 50) . "  <br>";
                            echo "Destino: " . substr($nombreremdes, 0, 50) . "  <br>";
                        } else {
                            echo "Destino: " . substr($dependenciaDestino, 0, 50) . " <br>";
                            echo "Rem/Des: " . substr($nombreremdes, 0, 50) . "  <br>";
                        }
                        ?>
                        <strong>Asunto: <?= mb_convert_case(substr($ra_asun, 0, 24), MB_CASE_UPPER, 'UTF-8') ?></strong></br>
                        No.Folios: <?=$radi_nume_hoja?> - Desc.Anexos: <?=$radi_desc_anex?><br>
                        <?= $_SESSION["entidad"] ?><br>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
