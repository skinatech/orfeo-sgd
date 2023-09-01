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
session_start();
error_reporting(7);
$url_raiz = "..";
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$assoc = $_SESSION['assoc'];
$driver = $_SESSION['driver'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


$krdOld = $krd;

if (!$krd)
    $krd = $krdOld;
if (!$dir_raiz)
    $dir_raiz = "..";
//include "$dir_raiz/rec_session.php";
include_once("$dir_raiz/include/db/ConnectionHandler.php");
include_once "$dir_raiz/include/tx/Historico.php";
include_once "$dir_raiz/include/tx/Expediente.php";
$db = new ConnectionHandler("$dir_raiz");
// $db->conn->debug = true;
$encabezadol = "$PHP_SELF?" . session_name() . "=" . session_id() . "&dependencia=$dependencia&krd=$krd";
?>
<script>
    function RegresarV() {
        window.location.assign("adminEdificio.php?<?= $encabezado1 ?>&fechah=$fechah&$orno&adodb_next_page");
    }
</script>
<?php
$codep_us = $_POST['codep_us'];
$muni_us = $_POST['muni_us'];

/**
 * Grabar los datos del edificio.
 */
if (isset($_POST['btnGrabar']) && $_POST['btnGrabar'] != "") {
    $db->conn->BeginTrans();

    /** * Crea el registro con los datos del edificio. */
    $q_insertE = "INSERT INTO SGD_EIT_ITEMS( SGD_EIT_CODIGO, SGD_EIT_COD_PADRE,";
    $q_insertE .= " SGD_EIT_NOMBRE, SGD_EIT_SIGLA, CODI_DPTO, CODI_MUNI )";
    $sec = $db->conn->nextId('sec_edificio',$driver);
    $q_insertE .= " VALUES( '$sec', 0,";
    $q_insertE .= " UPPER( '" . $_POST['hidNombreEdificio'] . "' ),";
    $q_insertE .= " UPPER( '" . $_POST['hidSiglaEdificio'] . "' ),";
    $q_insertE .= " " . $_POST['hidDepartamento'] . ", " . $_POST['hidMunicipio'] . " )";
    echo $muni_us;
    $listo = $db->query($q_insertE);
    /**
     * Datos de las unidades de almacenamiento del edificio.
     */
    foreach ($_POST as $clavePOST => $valorPOST) {
        if (strncmp($clavePOST, 'nombre_', 7) == 0) {
            $nombreUA = $valorPOST;
        }
        if (strncmp($clavePOST, 'sigla_', 6) == 0) {
            $siglaUA = $valorPOST;
        }

        if ($nombreUA != "" && $siglaUA != "") {
            /*
             * Crea el registro correspondiente a la unidad de almacenamiento.
             */
            $q_insertUA = "INSERT INTO SGD_EIT_ITEMS( SGD_EIT_CODIGO,SGD_EIT_COD_PADRE, SGD_EIT_NOMBRE,";
            $q_insertUA .= " SGD_EIT_SIGLA )";
            $q_insertUA .= " VALUES( " . $db->conn->nextId('SEC_EDIFICIO',$driver) . ", $sec,";
            $q_insertUA .= " UPPER( '" . $nombreUA . "' ), UPPER( '" . $siglaUA . "' ) )";
            if ($listo) {
                $listo = $db->query($q_insertUA);
            }
            $nombreUA = "";
            $siglaUA = "";
        }
    }

    if ($listo) {
        $db->conn->CommitTrans();
        ?>
        <script>
            window.open('<?= $url_raiz ?>/archivo/relacionTiposAlmac.php?dependencia=<?= $dependencia ?>&krd=<?= $krd ?>&tipo=<?= $tipo ?>&idEdificio=<?= $idEdificio ?>&codp=<?= $sec ?>', "Relacion Tipos Almacenamiento", "height=450,width=900,scrollbars=yes");
        </script>
        <?php
    } else {
        $db->conn->RollbackTrans();
    }

    // header( "Location: relacionTiposAlmac.php?".$encabezadol."&idEdificio=".$idEdificio);
}
?>
<html>
    <head>
        <title>Ingreso de edificios</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script language="JavaScript">
            function mostrarCampos(){
                var departamento = document.getElementById('codep_us').options[document.getElementById('codep_us').selectedIndex].value;
                var municipio2 = document.getElementById('muni_us').options[document.getElementById('muni_us').selectedIndex].value;
                var nombreEdificio = document.getElementById('nombre').value;
                var siglaEdificio = document.getElementById('sigla').value;


                if( document.all.codep_us.value == ''){
                    alert('Seleccione el departamento');
                    document.all.codep_us.focus();
                    return false;
                }

                if( document.all.muni_us.value == ''){
                    alert('Seleccione el municipio');
                    document.all.muni_us.focus();
                    return false;
                }

                if( document.all.nombre.value == ''){
                    alert('Ingrese el nombre edificio');
                    document.all.nombre.focus();
                    return false;
                }

                if (document.getElementById('numero').value == "" || isNaN(document.getElementById('numero').value)) {
                    alert('Debe ingresar Numero de Tipos de Almacenamiento.');
                    document.getElementById('numero').focus();
                    return false;
                } else {
                    var i;
                    var j = parseInt(document.getElementById('numero').value);
                    document.open();
                    document.write("<html>" +
                            "<head>" +
                            "<title>Ingresar edificios</title>" +
                            "<link rel='stylesheet' href='../estilos/orfeo.css'>" +
                            "<link rel='stylesheet' href='../estilos/orfeo50/bootstrap.css'>" +
                            "</head>"
                            );
                    document.write("<body bgcolor='#FFFFFF'>" +
                            "<form name='frmCampos' action='<?= $encabezadol ?>' method='post' >" +
                            "<input type='hidden' name='hidDepartamento' value='" + departamento + "'>" +
                            "<input type='hidden' name='hidMunicipio' value='" + municipio2 + "'>" +
                            "<input type='hidden' name='hidNombreEdificio' value='" + nombreEdificio + "'>" +
                            "<input type='hidden' name='hidSiglaEdificio' value='" + siglaEdificio + "'>" +
                            "<center><div id='titulo' style='width: 60%;' align='center'>Ingreso de edificios</div>" +
                            "<table border='1' width='60%' cellpadding='0' align='center' class='borde_tab'>" +
                            "<tr>" +
                            "<td height='30' class='titulos2'>" +
                            "<div align='center'>" +
                            "NOMBRE" +
                            "</div>" +
                            "</td>" +
                            "<td height='30' class='titulos2'>" +
                            "<div align='center'>" +
                            "SIGLA" +
                            "</div>" +
                            "</td>" +
                            "</tr>"
                            );
                    for (i = 0; i < j; i++){
                        document.write("<tr>" +
                                "<td class='listado2'>" +
                                "<div align='center'>" +
                                "<input type='text' name='nombre_" + i + "' size='40' maxlength='40'>" +
                                "</div>" +
                                "</td>" +
                                "<td class='listado2'>" +
                                "<div align='center'>" +
                                "<input type='text' name='sigla_" + i + "' size='4' maxlength='4'>" +
                                "</div>" +
                                "</td>" +
                                "</tr>"
                                );
                    }
                    document.write("<tr>" +
                            "<td align='center' colspan='2' class='listado2'>" +
                            "<input type='submit' class='botones' value='Grabar' name='btnGrabar'>" +
                            "<input type='button' class='botones' value='Cancelar' name='Cancelar' onClick='javascript:history.back()'>" +
                            "</td>" +
                            "</tr>" +
                            "</table>" +
                            "</center>" +
                            "</form>" +
                            "</body>" +
                            "</html>"
                            );
                    document.close()
                }
            }
        </script>
    </head>
    <body bgcolor="#FFFFFF">
        <form name="inEdificio" action="<?= $encabezadol ?>" method="post" >
            <center>
                <div id="titulo" style="width: 90%;" align="center">Ingreso de edificios</div>
                <table border="1" width="90%" cellpadding="0" align="center" class="borde_tab">
                    <tr>
                        <td height="30" class="listado2">
                            <div align="left">
                                <label for="codep_us">Departamento</label>
                                <select name="codep_us" id="codep_us" onChange="document.inEdificio.submit();" class="select" title="Departamento donde se encuentra el edificio">
                                    <option value="" selected>
                                    <font color="">-----</font>
                                    </option>
                                    <?php
                                    $isql = "SELECT DPTO_CODI, DPTO_NOMB FROM DEPARTAMENTO ORDER BY DPTO_NOMB";
                                    $rs = $db->query($isql);
                                    while ($rs && !$rs->EOF) {
                                        $deptocodi = trim($rs->fields[0]);
                                        $deptonomb = trim($rs->fields[1]);
                                        if (strlen(trim($codep_us)) != 0) {
                                            if ($deptocodi == $codep_us) {
                                                $datos = " selected ";
                                            } else {
                                                $datos = "";
                                            }
                                        }
                                        print "<option value='$deptocodi' $datos><font color=''>$deptonomb</font></option>";
                                        $rs->MoveNext();
                                    }
                                    ?>
                                </select>
                            </div>
                        </td>

                        <td class="listado2">
                            <div align="left">
                                <b><label for="muni_us">Municipio</label></b>
                                <select name="muni_us" id="muni_us" onChange="document.inEdificio.submit();" class="select" title="Municipio donde se encuentra el edificio">
                                    <?php
                                    if ($codep_us) {
                                        $depto = $codep_us;
                                    }
                                    if (strlen(trim($codep_us)) != 0) {
                                        $depto = $codep_us;
                                    }
                                    if (!$depto) {
                                        $depto = '0';
                                    }
                                    $isql = "SELECT MUNI_CODI,MUNI_NOMB FROM MUNICIPIO where DPTO_CODI = $depto order by muni_nomb";
                                    $rs = $db->query($isql);
                                    echo "<option value='' $datos>---</font></option>";

                                    while ($rs && !$rs->EOF) {
                                        $municodi = trim($rs->fields[0]);
                                        $muninomb = trim($rs->fields[1]);
                                        if (strlen(trim($muni_us)) != 0) {
                                            if ($municodi == $muni_us) {
                                                $datos = " selected ";
                                            } else {
                                                $datos = "";
                                            }
                                        } else if ($municodi == 1) {
                                            $datos = " selected ";
                                        } else {
                                            $datos = "";
                                        }
                                        print "<option value='$municodi' $datos>$muninomb</font></option>";
                                        $rs->MoveNext();
                                    }
                                    $municodi = "";
                                    $muninomb = "";
                                    $depto = "";
                                    ?>
                                </select>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td height="23" class="listado2">
                            <div align="left">
                                <label for="nombre"> Nombre</label>
                                <input type="text" name="nombre" id="nombre" value="<?php print $_POST['nombre']; ?>" size="40" maxlength="40" align="right" title="Ingrese el nombre del edificio" required=''>
                            </div>
                        </td>
                        <td class="listado2">
                            <div align="left">
                                <label for="sigla">Sigla</label>
                                <input type="text" name="sigla" id="sigla" value="<?php print $_POST['sigla']; ?>" size="4" maxlength="4" align="right" title="Ingrese una abreviación para el nombre del edificio" required=''>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td height="26" class="listado2">
                            <div align="left">
                                <label for="numero">Ingrese N&uacute;mero de Tipos de Almacenamiento</label>
                                <input type="text" name="numero" id="numero" value="<?php print $_POST['numero']; ?>" size="2" maxlength="2" align="right" title="Ingrese el número de tipos de almacenamiento que tiene el edificio" required=''>
                            </div>
                        </td>
                        <td class="listado2">
                            <input type="button" name="btnMostrarCampos" class="titulos2" value="&gt;&gt;" onClick="mostrarCampos();" aria-label="Registrar la información del edificio">
                        </td>
                    </tr>
                    <tr>
                        <td class="listado2" colspan="2">
                            <input name='SALIR' type="button" class="botones" id="envia22" onClick="opener.regresar();window.close();" value="SALIR" align="middle" aria-label="Cerrar esta ventana y volver a administración de edificios">
                        </td>
                    </tr>
                </table>
            </center>
        </form>
    </body>
</html>
