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
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

$krdOld = $krd;
$carpetaOld = $carpeta;
$tipoCarpOld = $tipo_carp;

foreach ($_GET as $key => $valor) ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor;

if (!$tipoCarpOld)
    $tipoCarpOld = $tipo_carpt;
if (!$krd)
    $krd = $krdOld;

$envio_peso = $_POST['envio_peso'];
$valor_unit = $_POST['valor_unit'];
$departamento_us = $_POST['departamento_us'];
$destino = $_POST['destino'];
$dir_codigo = $_POST['dir_codigo'];
$pais_us = $_POST['pais_us'];

define('ADODB_ASSOC_CASE', $assoc);

include_once "$dir_raiz/include/db/ConnectionHandler.php";
if (!$db)
    $db = new ConnectionHandler($dir_raiz);
//$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
//$db->conn->debug = true;
if (!$_SESSION['dependencia'])
    include_once "../rec_session.php";

$usua_doc = $_SESSION['usua_doc'];

/***
Skinatech
Autor: Andrés Mosquera
Fecha: 17-10-2018
Información: Variables cargadas con los datos enviados por GET para que funcione el devolver a listado
***/
$estado_sal = $_GET['estado_sal'];
$estado_sal_max = $_GET['estado_sal_max'];
$nomcarpeta = $_GET['nomcarpeta'];
/***
Skinatech
Autor: Andrés Mosquera
Fecha: 17-10-2018
Información: Fin Variables cargadas con los datos enviados por GET para que funcione el devolver a listado
***/

?>
<html>
    <head>
        <title>Envío documentos</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <?php
        if (!$radicados) {  //echo "radica ".print_r($_GET['checkValue']);
            $radicados = implode('*,*', array_keys($_GET['checkValue']));
            $whereFiltro = ' and a.anex_codigo in(*' . $radicados . '*)';
        }

        $procradi = $radicados;
        ?>
        <script>
            function back1()
            {
                history.go(-1);
            }

            function generar_envio()
            {
                if (document.forma.elements['valor_unit'].value == '' || document.forma.elements['valor_unit'].value == 0)
                {
                    alert('Seleccione Empresa de Envio Y digite el peso del mismo');
                    return false;
                }
                //Validación anterior no verificaba que numero de gua o estuviera vacío 
                //if (document.forma.elements['no_guia'].value == 0 || document.forma.elements['no_guia'].value == '')
                if (document.forma.elements['no_guia[0]'].value == 0 || document.forma.elements['no_guia[0]'].value == '')
                {
                    alert('Porfavor verifique el numero de guia');
                    return false;
                }

            }
        </script>
    </head>
    <body>
        <br>
        <span class=etexto>
            <center>
                <a class="vinculos" href='../envios/cuerpoEnvioNormal.php?<?= session_name() . "=" . session_id() . "&krd=$krd&fecha_h=$fechah&dep_sel=$dep_sel&estado_sal=$estado_sal&estado_sal_max=$estado_sal_max&nomcarpeta=$nomcarpeta" ?>'>Devolver a Listado</a>
            </center></span>
        <?php
        /** INICIO GRABACION DE DATOS * */
        ?>
    <center>
        <div id="titulo" style="width: 85%;" align="center">Env&iacute;o de documentos</div>
    </center>
    <form name='forma' action='envia.php?<?= session_name() . "=" . session_id() . "&krd=$krd&fecha_h=$fechah&dep_sel=$dep_sel&whereFiltro=$whereFiltro&estado_sal=$estado_sal&estado_sal_max=$estado_sal_max&no_planilla=$no_planilla&codigo_envio=$codigo_envio&verrad_sal=$verrad_sal&nomcarpeta=$nomcarpeta&no_guia=$no_guia" ?>' method="post">
        <input type='hidden' name='radicados' value='<?= $radicados ?>'>
        <?php
        $whereFiltro = str_replace("*", "'", $whereFiltro);
        include_once("$dir_raiz/include/query/envios/queryEnvia.php");
        if (!isset($_POST["reg_envio"])) {
            ?>
            <table border=1 align="center" width=85% class=borde_tab>
                <!--DWLayoutTable-->
                <tr class='titulos2' >
                    <td >Empresa de env&iacute;o</td>
                    <td >Peso(Grs)</td>
                    <td >Unidad de Medida</td>
                    <td colspan="2" >Valor Total C/U</td>

                </tr>
                <tr class=listado2>
                    <td height="26" align="center"><font size=2><B>
                            <?php
//                            $db->conn->debug = true;
                            $rsEnv = $db->conn->query($sql);
                            print $rsEnv->GetMenu2("empresa_envio", 0, "0:&lt;&lt; Seleccione  &gt;&gt;", false, 0, " id='empresa_envio' class='select' onChange='calcular_precio();'");
                            ?>
                    </td>
                    <td> <input type='text' name='envio_peso' id='envio_peso' value='<?= $envio_peso ?>' size="6" onChange="calcular_precio();" class="tex_area"></td>
                    <TD><input type="text" name="valor_gr" id="valor_gr"  value='<?= $valor_gr ?>' size="30" disabled class="tex_area"> </td>
                    <td align="center"> <input type="text" name="valor_unit" id="valor_unit"  readonly   value="<?= $valor_unit ?>" class="tex_area"> </td>
                    <td> <input type="button" name="Calcular_button" id="Calcular_button" Value="Calcular" onClick="calcular_precio();" class="botones"> </td>
                </tr>
            </table>
            <?php
        }
        ?>
        <table border=1 align="center" width=85% class=borde_tab>
            <!--DWLayoutTable-->
            <tr class='titulos2' >
                <td valign="top" >Radicado</td>
            <input id='radicados' name='radicados' type='hidden' readonly='readonly' value='<?= $radicados ?>'>
            <td valign="top" >Radicado Padre</td>
            <td valign="top" >Destinatario</td>
            <td valign="top" >Direcci&oacute;n</td>
            <td valign="top" >Municipio</td>
            <td valign="top" >Departamento</td>
            <td valign="top" >Pa&iacute;s</td>
            </tr>
            <?php
            include "$dir_raiz/config.php";
            require_once("$dir_raiz/class_control/ControlAplIntegrada.php");
            include_once "$dir_raiz/include/db/ConnectionHandler.php";
            //modificado skina 23-12-08
            //Se modifica para que los envios ya hechos puedan ser reenviados.
            if (isset($_POST['radicados']))
                $whereFiltro = ' and a.anex_codigo in(*' . $_POST['radicados'] . '*)';
            $whereFiltro = str_replace("*", "'", $whereFiltro);
            $isql = "SELECT distinct a.SGD_DIR_TIPO, " . $RADI_NUME_SALIDA . " as RADI_NUME_SALIDA, " . $radi_nume_deri . " AS RADI_NUME_DERI, b.RA_ASUN
		FROM ANEXOS a,RADICADO b WHERE a.radi_nume_salida=b.radi_nume_radi " . $whereFiltro .
                    " AND anex_estado>=2 AND a.sgd_dir_tipo <> 7 " . $comb_salida .
                    "ORDER BY a.SGD_DIR_TIPO ";
            $db = new ConnectionHandler("$dir_raiz");
            $db->conn->BeginTrans();
            if (isset($_POST["reg_envio"])) {
                //Modificado skina $objCtrlAplInt = new ControlAplIntegrada($db); 
            }
//
            $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
            $ADODB_COUNTRECS = true;
//            $db->conn->debug = true;
            $rsEnviar = $db->query($isql);

            $ADODB_COUNTRECS = false;
            $igual_destino = "si";
            $tmp = explode('-', $_SESSION['cod_local']);
            $tmp_idcl = $tmp[0];
            $tmp_idpl = $tmp[1];
            $tmp_iddl = $tmp_idpl . '-' . $tmp[2] * 1;
            $tmp_idml = $tmp_iddl . '-' . $tmp[3] * 1;
            unset($tmp);

//by skina; numero de guia y observaciones
            $i = 0;
            $j = 0;

            while ($j != 0) {
                if (isset($_POST['no_guia']["$i"]) || isset($_POST['observaciones']["$i"])) {
                    //echo "Entre a asignar";
                    $no_guia[$i] = $_POST['no_guia']["$i"];
                    $observaciones[$i] = $_POST['observaciones']["$i"];
                    $i++;
                } else {
                    $j++;
                }
            }
            if (!isset($_POST['no_guia']['0']) && !isset($_POST['observaciones']['0'])) {
                //echo "Entre a crear arreglo";
                $no_guia = array();
                $observaciones = array();
            }
            $i = 0;

            // By Skinatech - 14/08/2018
            // Para la construcción del número de radicado, esto indica la parte inicial del radicado.
            if ($estructuraRad == 'ymd') {
                $num = 8;
            } elseif ($estructuraRad == 'ym') {
                $num = 6;
            } else {
                $num = 4;
            }

            if ($rsEnviar && !$rsEnviar->EOF) {
                $pCodDepAnt = "";
                $pCodMunAnt = "";
                if (!isset($_POST["reg_envio"])) {
                    $cnt_idcl = 0;
                    $cnt_idcc = 0;
                    $cnt_idpl = 0;
                    $cnt_idpc = 0;
                    $cnt_idml = 0;
                    $cnt_idmc = 0;

                    while (!$rsEnviar->EOF) {
                        $verrad_sal = $rsEnviar->fields["RADI_NUME_SALIDA"];   //OK
                        $verrad = $rsEnviar->fields["RADI_NUME_SALIDA"];   //OK
                        $verrad_padre = $rsEnviar->fields["RADI_NUME_DERI"];
                        $sgd_dir_tipo = $rsEnviar->fields["SGD_DIR_TIPO"];
                        $rem_destino = $rsEnviar->fields["SGD_DIR_TIPO"];
                        $anex_radi_nume = $rsEnviar->fields["RADI_NUME_SALIDA"];
                        $dep_radicado = substr($verrad_sal, $num, $longitud_codigo_dependencia);
                        $ano_radicado = substr($verrad_sal, 0, 4);
                        $carp_codi = substr($dep_radicado, 0, 2);
                        $radi_path_sal = "/$ano_radicado/$dep_radicado/docs/$ref_pdf";

                        if (substr($rem_destino, 0, 1) == "7")
                            $anex_radi_nume = $verrad_sal;
                        $nurad = $anex_radi_nume;
                        $verrad = $anex_radi_nume;

                        //by skina, borro el include porque no trae bien el asunto
                        //include "../ver_datosrad.php";
                        $sql = "select ra_asun as RA_ASUN from radicado where radi_nume_radi='$verrad'";
                        $rs_asun = $db->query($sql);
                        $ra_asun = $rs_asun->fields["RA_ASUN"];

                        if ($radicadopadre)
                            $radicado = $radicadopadre;
                        if ($nurad)
                            $radicado = $nurad;

                        include "../clasesComunes/datosDest.php";

                        //$dat = new DATOSDEST($db,$radicado,$espcodi,$sgd_dir_tipo,$rem_destino);
                        $dat = new DATOSDEST($db, $verrad_sal, $espcodi, $sgd_dir_tipo, $rem_destino);
                        $pCodDep = $dat->codep_us;
                        $pCodMun = $dat->muni_us;
                        $pNombre = $dat->nombre_us;
                        $pPriApe = $dat->prim_apel_us;
                        $pSegApe = $dat->seg_apel_us;
                        $nombre_us = substr($pNombre . " " . $pPriApe . " " . $pSegApe, 0, 33);
                        $direccion_us = $dat->direccion_us;
                        if ($pCodDepAnt == "")
                            $pCodDepAnt = $pCodDep;
                        if ($pCodMunAnt == "")
                            $pCodMunAnt = $pCodMun;
                        //	Validacion de local(local/nacional)/intenacional(grupo1/grupo2)
                        if ($dat->idcont == $tmp_idcl) { //Comparativo desde el 1er continente con el continente local
                            $cnt_idcl += 1;
                            if ($dat->idpais == $tmp_idpl) { //Comparativo desde el 1er pais con el continente local
                                $cnt_idpl += 1;
                                if ($dat->muni_us == $tmp_idml) { //Comparativo desde el 1er mcpio con el continente local
                                    $cnt_idml += 1;
                                } else
                                    $cnt_idmc += 1;
                            } else
                                $cnt_idpc += 1;
                        } else
                            $cnt_idcc += 1;

                        if (!$rem_destino)
                            $rem_destino = 1;
                        $sgd_dir_tipo = 1;
                        echo "<input type=hidden name=$espcodi value='$espcodi'>";

                        include "../include/jh_class/funciones_sgd.php";
                        $a = new LOCALIZACION($pCodDep, $pCodMun, $db);
                        $departamento_us = $a->departamento;
                        $destino = $a->municipio;
                        $pais_us = $a->GET_NOMBRE_PAIS($dat->idpais, $db);
                        $dir_codigo = $dat->documento_us;

                        include "../envios/listaEnvio.php";
                        $i++;
                        $cantidadDestinos++;
                        $rsEnviar->MoveNext();
                    }
                    if ($cnt_idcl > 0 && $cnt_idcc > 0)
                        $igual_destino = "no";
                    else {
                        ($cnt_idcl > 0) ? $masiva = 3 : $masiva = 4;
                        //Si contador continente local > 0  ==> masiva = 3 (Grupo 1)  sino masiva = 4 (Grupo 2)
                        if ($cnt_idpl > 0 && $cnt_idpc > 0)
                            $igual_destino = "no";
                        else {
                            if ($cnt_idpl > 0)
                                $masiva = 2;
                            //Si contador paises local > 0  ==> masiva = 2 (Envios nacionales)
                            if ($cnt_idml > 0 && $cnt_idmc > 0)
                                $igual_destino = "no";
                            else {
                                if ($cnt_idml > 0)
                                    $masiva = 1;
                                //Si contador municipio local > 0  ==> masiva = 1 (Envios locales)
                            }
                        }
                    }
                } // no reg_envio
                if ($igual_destino == "si") {
                    if (!isset($_POST["reg_envio"])) {
                        ?>
                        <tr>
                            <td colspan="7" class="listado1">
                                <table class="borde_tab" width="100%" border="0">
                                    <tr>
                                        <td valign="top" >
                                    <font><center>
                                        <input name="reg_envio" type="submit" value="Generar Registro de Env&iacute;o de Documento" id="GENERAR REGISTRO DE ENVIO DE DOCUMENTO" onClick="return generar_envio();" class="botones_largo">
                                        <input name="masiva" value="<?= $masiva ?>" type="hidden">
                                    </center></font>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?php
        } else {
            if (!$k) {
                while (!$rsEnviar->EOF) {
                    $verrad_sal = $rsEnviar->fields["RADI_NUME_SALIDA"];
                    $verrad_padre = $rsEnviar->fields["RADI_NUME_DERI"];
                    $rem_destino = $rsEnviar->fields["SGD_DIR_TIPO"];
                    if (!$rem_destino)
                        $rem_destino = 1;
                    if (!trim($rem_destino))
                        $isql_w = " sgd_dir_tipo is null ";
                    else
                        $isql_w = " sgd_dir_tipo='$rem_destino' ";
                    $isql = "update ANEXOS set ANEX_ESTADO=4, fecha_rec_remi=".$db->conn->OffsetDate(0, $db->conn->sysTimeStamp).", anex_tipo_envio=1, ANEX_FECH_ENVIO= "
                            . $db->conn->OffsetDate(0, $db->conn->sysTimeStamp) . " where RADI_NUME_SALIDA ='$verrad_sal' and sgd_dir_tipo <>7 and  $isql_w";
                    $rsUpdate1 = $db->query($isql);
                    if ($rsUpdate1)
                        $k++;
                    if (!$codigo_envio) { //include_once("$dir_raiz/include/query/envios/queryEnvia.php");
                        $sql_sgd_renv_codigo = "select SGD_RENV_CODIGO FROM SGD_RENV_REGENVIO ORDER BY SGD_RENV_CODIGO DESC ";
                        $rsRegenvio = $db->conn->SelectLimit($sql_sgd_renv_codigo, 10);
                        $nextval = $rsRegenvio->fields["SGD_RENV_CODIGO"];
                        $nextval++;
                        $codigo_envio = $nextval;
                        $radi_nume_grupo = $verrad_sal;
                        $isql = "update RADICADO set SGD_EANU_CODIGO=9 where RADI_NUME_RADI ='$verrad_sal'";
                        $rsUpdate = $db->query($isql);
                    } else {
                        $nextval = $codigo_envio;
                        $valor_unit = 0;
                    }
                    $dir_tipo = $rem_destino;
                    //Modificado skina 
                    //echo $no_guia[$i];
                    //$observaciones=" Guia No. ".$no_guia[$i];
                    $isql_select = "select * from sgd_dir_drecciones where radi_nume_radi = '$verrad_sal'";
                    $rsSelect = $db->query($isql_select);

                    $telefono = $assoc == 0 ? $rsSelect->fields["sgd_dir_telefono"] : $rsSelect->fields["SGD_DIR_TELEFONO"];
                    $mail = $assoc == 0 ? $rsSelect->fields["sgd_dir_mail"] : $rsSelect->fields["SGD_DIR_MAIL"];
                    $nombre_us = $assoc == 0 ? $rsSelect->fields["sgd_dir_nomremdes"] : $rsSelect->fields["SGD_DIR_NOMREMDES"];
                    $direccion_us = $assoc == 0 ? $rsSelect->fields["sgd_dir_direccion"] : $rsSelect->fields["SGD_DIR_DIRECCION"];

                    if (!isset($empresa_envio) && isset($_POST['empresa_envio']))
                        $empresa_envio = $_POST['empresa_envio'];
                    if (!isset($dependencia))
                        $dependencia = substr($verrad_sal, $num, $longitud_codigo_dependencia);

                    $isql = "INSERT INTO SGD_RENV_REGENVIO(USUA_DOC ,SGD_RENV_CODIGO ,SGD_FENV_CODIGO
							,SGD_RENV_FECH ,RADI_NUME_SAL ,SGD_RENV_DESTINO ,SGD_RENV_TELEFONO
							,SGD_RENV_MAIL ,SGD_RENV_PESO ,SGD_RENV_VALOR ,SGD_RENV_CERTIFICADO
							,SGD_RENV_ESTADO ,SGD_RENV_NOMBRE ,SGD_DIR_CODIGO ,DEPE_CODI
							,SGD_DIR_TIPO ,RADI_NUME_GRUPO ,SGD_RENV_PLANILLA ,SGD_RENV_DIR
							,SGD_RENV_DEPTO, SGD_RENV_MPIO, SGD_RENV_PAIS, SGD_RENV_OBSERVA ,SGD_RENV_CANTIDAD, SGD_RENV_GUIA)
							VALUES('$usua_doc' ,'$nextval' ,'$empresa_envio' ," . $db->conn->OffsetDate(0, $db->conn->sysTimeStamp) . "
									, '$verrad_sal', '$destino', '$telefono', '$mail', '$envio_peso', '$valor_unit', 0, 1, '$nombre_us'
									, '$dir_codigo', '$dependencia', '$dir_tipo', '$verrad_sal', '$no_planilla', '$direccion_us'
									, '$departamento_us' ,'$destino', '$pais_us', '$observaciones[$i]',1 , '$no_guia[$i]')";
                    $rsInsert = $db->query($isql);
                    $db->conn->debug = false;
                    $rsEnviar->MoveNext();

                    include "../envios/listaEnvio.php";
                    $i++;
                }
                $db->conn->CommitTrans();
            } //$k
            //by skina 
            //include "../envios/listaEnvio.php";
            echo "<center><b><span>Registro de Env&iacute;o Generado</span> </b></center><br><br>";
        }  //FIN else no reg_envio
    }
    else {
        echo "<hr><table class=borde_tab><tr class=titulosError><td>NO PUEDE SELECCIONAR VARIOS DOCUMENTOS PARA UN MISMO DESTINO CON CIUDAD Y/O DEPARTAMENTO DIFERENTE</td></tr></table><hr>";
    }
}
?>
</table>
</form>
<?php
$encabezado = "krd=$krd&fecha_h=$fechah&dep_sel=$dep_sel&estado_sal=$estado_sal
&estado_sal_max=$estado_sal_max&nomcarpeta=$nomcarpeta";
?>
<center>
    <a class=vinculos href='cuerpoEnvioNormal.php?<?= session_name() . "=" . session_id() . "&$encabezado" ?>'>Devolver a Listado</a>
</center>
<script>
<?php
if ($igual_destino == 'si') {
    echo "function calcular_precio(){";
        $dir_raiz = "..";
        $no_tipo = "true";
        //$db->conn->debug = true;
        include_once "../config.php";
        include_once "$dir_raiz/include/db/ConnectionHandler.php";
        if (!isset($db))
            $db = new ConnectionHandler("$dir_raiz");
        define('ADODB_ASSOC_CASE', $assoc);
        $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
    //	HLP. Creamos el query que trae los valores para envios nacionales o internacionales.
        switch ($masiva) {
            case 1:
            case 2: {
                    $var_grupo = 1;
                    $campos_valores = " b.SGD_TAR_VALENV1 as VALOR1, b.SGD_TAR_VALENV2 as VALOR2 ";
                } break;
            case 3: {
                    $var_grupo = 2;
                    $campos_valores = " b.SGD_TAR_VALENV1G1 as VALOR1 ";
                } break;
            case 4: {
                    $var_grupo = 2;
                    $campos_valores = " b.SGD_TAR_VALENV2G2 as VALOR1 ";
                }
        }
        $isql = "SELECT a.SGD_FENV_CODIGO, a.SGD_CLTA_DESCRIP, a.SGD_CLTA_PESDES, a.SGD_CLTA_PESHAST, " . $campos_valores .
                "FROM SGD_CLTA_CLSTARIF a,SGD_TAR_TARIFAS b WHERE a.SGD_FENV_CODIGO = b.SGD_FENV_CODIGO
            AND a.SGD_TAR_CODIGO = b.SGD_TAR_CODIGO AND a.SGD_CLTA_CODSER = b.SGD_CLTA_CODSER AND a.SGD_CLTA_CODSER = " . $var_grupo;
        //db->conn->debug=true;
        $rsEnvio = $db->query($isql);
        //error_log('--------------- '.$isql);
        $tmp = 0;
        echo "\n
            var obj_peso = document.getElementById('envio_peso');
            if (obj_peso.value != ''){
                if (isNaN(parseInt(obj_peso.value)) || obj_peso.value <= 0){
                    alert('Digite Correctamente Peso del Envio');
                    obj_peso.value = '';
                    return false;
                }
                var hallar_rango = false;\n";

                while ($rsEnvio && !$rsEnvio->EOF) {
                    $tmp += 1;
                    if ($masiva == 1 or $masiva == 2) {
            //            error_log('--------------- '.$rsEnvio->fields["VALOR1"].' --------'.$rsEnvio->fields["VALOR2"]);
                        $valor_local = $rsEnvio->fields["VALOR1"];
                        $valor_fuera = $rsEnvio->fields["VALOR2"];
                    } else {
                        $valor_local = $rsEnvio->fields["VALOR1"];
                        $valor_fuera = $rsEnvio->fields["VALOR1"];
                    }

                    $rango = $rsEnvio->fields["SGD_CLTA_DESCRIP"];
                    $fenvio = $rsEnvio->fields["SGD_FENV_CODIGO"];
                    $pesoinicial = $rsEnvio->fields["SGD_CLTA_PESDES"];
                    $pesofinal = $rsEnvio->fields["SGD_CLTA_PESHAST"];

                    //error_log('*********** '.$rango.' ********* '.$fenvio .' ******* '.$pesoinicial. ' ******* '.$pesofinal);

                    echo "\n
                        if (document.forma.elements['empresa_envio'].value==$fenvio && document.getElementById('envio_peso').value>=$pesoinicial &&  document.getElementById('envio_peso').value<=$pesofinal) \n{
                            hallar_rango = true;
                            document.getElementById('valor_gr').value = '$rango';
                            dp_especial = '$dependencia';

                            if (document.forma.elements['destino'].value == '$depe_municipio'){
                                valor = $valor_local + 0;
                            }else{
                                valor = $valor_fuera + 0;
                            }
                        }\n";
                    $rsEnvio->MoveNext();
                }

                echo "\n
                    if (hallar_rango) {
                        document.getElementById('valor_unit').value = valor;
                    } else {
                        alert('Rango y peso especificado no está configurado, Comuníquese con el administrador del sistema.');
                    }
            }
        }\n";
} else
    echo "function calcular_precio() {}";
?>
</script>
</body>
</html>
