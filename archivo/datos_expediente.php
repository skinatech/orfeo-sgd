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
$autenticaPorLDAP = $_SESSION["autentica_por_LDAP"];
$driver = $_SESSION['driver'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
//
//echo '*********** <pre>';
//print_r($_SESSION);
//echo '</pre>';
//exit();

$CARPETA = 7;
$CAJA = 4;
$FOLIOS = 200;
foreach ($_GET as $key => $valor) ${$key} = $valor;
foreach ($_POST as $key => $valor) ${$key} = $valor;

$dependencia = $_SESSION["dependencia"];
if (!isset($dependencia))
    include "../rec_session.php";

require_once("$dir_raiz/include/db/ConnectionHandler.php");
include_once "$dir_raiz/include/tx/Historico.php";
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$db = new ConnectionHandler($dir_raiz);
$objHistorico = new Historico($db);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
// $db->conn->debug = true;

//
//$dep_sel = $_POST['dep_sel'];
//$car = $_GET['ent'];
//$num_expediente = $_GET['num_expediente'];
//$nurad = $_GET['nurad'];
//$fechah = $_GET['fechah'];
//Modificado por Fabian Mauricio Losada
?>

<html>
    <head>
        <meta http-equiv="Cache-Control" content="cache">
        <meta http-equiv="Pragma" content="public">
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <?php
        $fechah = date("dmy") . "_" . time();
        $encabezado = session_name() . "=" . session_id() . "&krd=$krd";
        if (!$estado_sal) {
            $estado_sal = 2;
        }
        if (!$estado_sal_max)
            $estado_sal_max = 3;
        $accion_sal = "Marcar como Archivado Fisicamente";
        $pagina_sig = "envio.php";
        if (!$dep_sel)
            $dep_sel = $dependencia;
        switch ($db->driver) {
            case 'mssql':
                $dependencia_busq1 = " and d.depe_codi like '$dep_sel'";
                $dependencia_busq2 = " and radi_depe_actu  like '$dep_sel'";
                break;
            case 'mysql':
                $dependencia_busq1 = " and d.depe_codi like '$dep_sel'";
                $dependencia_busq2 = " and radi_depe_actu like '$dep_sel'";
                break;
            case 'postgres':
                $dependencia_busq1 = " and d.depe_codi like '$dep_sel'";
                $dependencia_busq2 = " and radi_depe_actu like '$dep_sel'";
                break;
            case 'ocipo':
            case 'oci8':
                $dependencia_busq1 = " and d.depe_codi like '$dep_sel'";
                $dependencia_busq2 = " and radi_depe_actu like '$dep_sel'";
                break;
        }
        $tbbordes = "#CEDFC6";
        $tbfondo = "#FFFFCC";
        if (!$orno) {
            $orno = 1;
        }
        $imagen = "flechadesc.gif";
        ?>
        <link rel="stylesheet" type="text/css" href="../js/spiffyCal/spiffyCal_v2_1.css">
        <script language="JavaScript" src="../js/spiffyCal/spiffyCal_v2_1.js"></script>
        <script>
            function Etiquetas(numeroExpediente) {
                window.open("<?= $dir_raiz ?>/expediente/etiquetas.php?&numeroExpediente=" + numeroExpediente +
                        "&nurad=<?= $nurad ?>&krd=<?= $krd ?>&coddepe=<?= $coddepe ?>&codusua=<?= $codusua ?>", "Etiquetas", "height=300,width=450");
            }

            function validarForm(){

                var campos = ['codDpto2', 'codMuni2', 'exp_edificio2', 'exp_carpeta' ];

                if( document.all.codDpto2.value == '0' ){
                    alert('Seleccione el departamento');
                    document.all.codDpto2.focus();
                    return false;
                }

                if( document.all.codMuni2.value == '0' ){
                    alert('Seleccione el municipio');
                    document.all.codMuni2.focus();
                    return false;
                }

                if( document.all.exp_edificio2.value == '0' ){
                    alert('Seleccione el edificio');
                    document.all.exp_edificio2.focus();
                    return false;
                }

                var radios = document.all.UN;
                var valRadios = false;
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].type === 'radio' && !radios[i].checked) {
                        valRadios = true;
                    }
                }

                if( valRadios == false ){
                    alert('Seleccione unidad de conservaci\xf3n');
                    return false;
                }

                if( document.all.exp_carpeta.value == '' ){
                    alert('Digite el n\xfamero de ubicaci\xf3n');
                    document.all.exp_carpeta.focus();
                    return false;
                }

                /*if( document.all.UN.length == false ){
                    alert('Seleccione unidad de conservaci\xf3n');
                    document.all.exp_carpeta.focus();
                    return false;
                }*/



                document.getElementById("form1").submit();

            }
        </script>
    </head>

    <body bgcolor="#FFFFFF" topmargin="0" >
        <div id="object1" style="position:absolute; visibility:show; left:10px; top:-50px; width:80%; z-index:2" >
            <p>Cuadro de Historico</p>
        </div>

        <?php
        /*
          PARA EL FUNCIONAMIENTO CORRECTO DE ESTA PAGINA SE NECESITAN UNAS VARIABLE QUE DEBEN VENIR
          carpeta  "Codigo de la carpeta a abrir"
          nomcarpeta "Nombre de la Carpeta"
          tipocarpeta "Tipo de Carpeta  (0,1)(Generales,Personales)"
          seleccionar todos los checkboxes
         */
        $img1 = "";
        $img2 = "";
        $img3 = "";
        $img4 = "";
        $img5 = "";
        $img6 = "";
        $img7 = "";
        $img8 = "";
        $img9 = "";
        IF ($ordcambio) {
            IF ($ascdesc == "DESC") {
                $ascdesc = "";
                $imagen = "flechaasc.gif";
            } else {
                $ascdesc = "DESC";
                $imagen = "flechadesc.gif";
            }
        }
        if ($orno == 1) {
            $order = " d.sgd_exp_numero $ascdesc";
            $img1 = "<img src='$dir_raiz/iconos/$imagen' border=0 alt='$data'>";
        }
        if ($orno == 2) {
            $order = " a.radi_nume_radi $ascdesc";
            $img2 = "<img src='$dir_raiz/iconos/$imagen' border=0 alt='$data'>";
        }
        if ($orno == 3) {
            $order = " a.radi_fech_radi $ascdesc";
            $img3 = "<img src='$dir_raiz/iconos/$imagen' border=0 alt='$data'>";
        }
        if ($orno == 4) {
            $order = " a.ra_asun $ascdesc";
            $img4 = "<img src='$dir_raiz/iconos/$imagen' border=0 alt='$data'>";
        }
        if ($orno == 5) {
            $order = " e.depe_nomb $ascdesc";
            $img5 = "<img src='$dir_raiz/iconos/$imagen' border=0 alt='$data'>";
        }
        if ($orno == 6) {
            $order = " f.usua_nomb $ascdesc";
            $img6 = "<img src='$dir_raiz/iconos/$imagen' border=0 alt='$data'>";
        }
        if ($orno == 9) {
            $order = " f.usua_nomb $ascdesc";
            $img9 = "<img src='$dir_raiz/iconos/$imagen' border=0 alt='$data'>";
        }
        if ($orno == 7) {
            $order = " plt_codi desc ,radi_fech_radi";
            $img7 = " <img src='$dir_raiz/iconos/flechanoleidos.gif' border=0 alt='$data'> ";
        }
        if ($orno == 8) {
            $order = " plt_codi asc ,radi_fech_radi";
            $img7 = " <img src='$dir_raiz/iconos/flechaleidos.gif' border=0 alt='$data'> ";
        }
        $datosaenviar = "fechaf=$fechaf&tipo_carp=$tipo_carp&ascdesc=$ascdesc&orno=$orno";
        $encabezado = session_name() . "=" . session_id() . "&krd=$krd&estado_sal=$estado_sal&fechah=$fechah&estado_sal_max=$estado_sal_max&ascdesc=$ascdesc&dep_sel=$dep_sel&exp_fechaFin=$exp_fechaFin&exp_fechaIni=$exp_fechaIni&exp_retenci=$exp_retenci&orno=";
        $fechah = date("dmy") . "_" . time();
        $check = 1;
        $fechaf = date("dmy") . "_" . time();
        $numeroa = 0;
        $numero = 0;
        $numeros = 0;
        $numerot = 0;
        $numerop = 0;
        $numeroh = 0;

        $isql = "select * From usuario where USUA_LOGIN ='$krd' and USUA_SESION='" . substr(session_id(), 0, 29) . "' ";
        $rs = $db->query($isql);
//        
//        echo '************** '.$isql;
        // Validacion de Usuario y COntrasea MD5
        isset($rs->fields["USUA_LOGIN"]) ? $usua_login = $rs->fields["USUA_LOGIN"] : $usua_login = $rs->fields["usua_login"];

        if (trim($usua_login) == trim($krd)) {

            $nombusuario = $assoc == 0 ? $rs->fields["usua_nomb"] : $rs->fields["USUA_NOMB"];
            $contraxx = $assoc == 0 ? $rs->fields["usua_pasw"] : $rs->fields["USUA_PASW"];
            $permiso = $assoc == 0 ? $rs->fields["usua_admin_archivo"] : $rs->fields["USUA_ADMIN_ARCHIVO"];
            $nivelus = $assoc == 0 ? $rs->fields["codi_nivel"] : $rs->fields["CODI_NIVEL"];
            $codusuario = $assoc == 0 ? $rs->fields["usua_codi"] : $rs->fields["USUA_CODI"];

            $usua_nuevoexp = $assoc == 0 ? $rs->fields["usua_nuevo"] : $rs->fields["USUA_NUEVO"];

            if ($usua_nuevoexp == "1" or $autenticaPorLDAP == '1') {
                $carpeta = 200;
                $nomcarpeta = "UBICACI&Oacute;N EXPEDIENTE";
                include "../envios/paEncabeza.php";
                ?>
                <br>
            <center>
                <div id="titulo" style="width: 90%;" align="center">
                    Radicado No <b><?= $nurad ?></b> <br> Perteneciente al expediente No <b><?= $num_expediente ?></b>
                </div>
                <form name='form1' id='form1' action='datos_expediente.php?<?= session_name() . "=" . session_id() . "&krd=$krd&fechah=$fechah&nurad=$nurad&num_expediente=$num_expediente&exp_fechaFin=$exp_fechaFin&exp_fechaIni=$exp_fechaIni&exp_archivo=$exp_archivo&exp_unicon=$exp_unicon&item3=$item3&item4=$item4&item5=$item5&car=$car&exp_carpeta2=$exp_carpeta2&exp_carpeta=$exp_carpeta " ?>' method="POST">
                    <br>
                    <table width="90%" align="center" cellspacing="5" cellpadding="0" class="borde_tab">
                        <tr>
                            <td class='titulos3'>
                                <table BORDER=0  cellpad=2 cellspacing='2' WIDTH=100% class='t_bordeGris' valign='top' align='center' cellpadding="2" >
                                    <tr>
                                        <!--<td class='titulos2'>Radicado No <b><?= $nurad ?></b> Perteneciente al expediente No <b><?= $num_expediente ?></b></td>-->
                                        <?php
                                        //Modificado por Fabian Mauricio Losada
                                        $queryUs = "select SGD_SEXP_PAREXP1,SGD_SEXP_PAREXP2,SGD_SEXP_PAREXP3,SGD_SEXP_PAREXP4,SGD_SEXP_PAREXP5 from
                                                    SGD_SEXP_SECEXPEDIENTES where SGD_EXP_NUMERO='$num_expediente'";
                                        $rsUs = $db->conn->Execute($queryUs);
//                                        echo '++++++++++++++++++ '.$queryUs.' ++++ <br> ';
                                        if (!$rsUs->EOF) {
                                            $eti1 = $assoc == 0 ? $rsUs->fields['sgd_sexp_parexp1'] : $rsUs->fields['SGD_SEXP_PAREXP1'];
                                            $eti2 = $assoc == 0 ? $rsUs->fields['sgd_sexp_parexp2'] : $rsUs->fields['SGD_SEXP_PAREXP2'];
                                            $eti3 = $assoc == 0 ? $rsUs->fields['sgd_sexp_parexp3'] : $rsUs->fields['SGD_SEXP_PAREXP3'];
                                            $eti4 = $assoc == 0 ? $rsUs->fields['sgd_sexp_parexp4'] : $rsUs->fields['SGD_SEXP_PAREXP4'];
                                            $eti5 = $assoc == 0 ? $rsUs->fields['sgd_sexp_parexp5'] : $rsUs->fields['SGD_SEXP_PAREXP5'];
                                        }
                                        $etiquetas = $eti1;
                                        if ($eti2 != "")
                                            $etiquetas .= "," . $eti2;
                                        if ($eti3 != "")
                                            $etiquetas .= "," . $eti3;
                                        if ($eti4 != "")
                                            $etiquetas .= "," . $eti4;
                                        if ($eti5 != "")
                                            $etiquetas .= "," . $eti5;
                                        $dir_raiz = "..";
                                        require "$dir_raiz/class_control/class_control.php";
                                        $btt = new CONTROL_ORFEO($db);

//                                        echo "archivar $Archivar";
                                        if ($Archivar) {
                                            
//                                            $db->conn->debug = true;
                                            switch ($driver) {
                                                case 'mssql':
                                                    include 'datos_expediente_default.php';
                                                    break;
                                                case 'mysql':
                                                    include 'datos_expediente_mysql.php';
                                                    break;
                                                case 'postgres':
                                                    include 'datos_expediente_default.php';
                                                    break;
                                                case 'ocipo':
                                                case 'oci8':
                                                    include 'datos_expediente_default.php';
                                                    break;
                                            }
                                        }

                                        if ($ent == 1) {
//                                            echo '<BR>--- '.$num_expediente.' ---- '.$nurad.' -----';
                                            $btt->datos_expediente($num_expediente, $nurad);
                                            $num_carpetas = $btt->exp_num_carpetas;
                                            $exp_subexpediente = $btt->exp_subexpediente;
                                            $exp_caja = $btt->exp_caja;
                                            $exp_carpeta = $btt->exp_carpeta;
                                            $exp_estado = $btt->exp_estado;
                                            $exp_archivo = $btt->exp_archivo;
                                            $exp_unidad = $btt->exp_unicon;
                                            $exp_fechaIni = $btt->exp_fechaIni;
                                            $exp_fechaFin = $btt->exp_fechaFin;
                                            $exp_folio = $btt->exp_folio;
                                            $exp_retenci = $btt->exp_rete;
                                            $exp_entrepa = $btt->exp_entrepa;
                                            $exp_edificio = $btt->exp_edificio;
                                            $EST = $btt->exp_archivo;
                                            $UN = $btt->exp_unicon;
                                            $CD_TOL = $btt->exp_cd;
                                            $NREF = $btt->exp_nref;
                                            /**************************************************************************************************************** 
                                             * Los select que se muestran: edificio, archivo, estante, entrepaño, caja, carpeta, se empiezan a cargar    	 *
                                             * desde esta linea y tener encuenta que van en sentido contrario es decir empieza desde la carpeta $bus es el 	 *							 * codigo de la carpeta 											 *
                                             * *************************************************************************************************************** */
                                            if (($exp_carpeta == "" or $exp_carpeta == 0) and $exp_carpeta != "")
                                                $bus = $exp_carpeta;
                                            else
                                                $bus = $exp_caja; //solo para que funcione con 8 jerarquias verificar !!!!!
                                            $qpri = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $bus");

                                            /* ----- INFORMACION DEL CARPETA ----- */
                                            if (!$qpri->EOF) {
                                                $it1 = $assoc == 0 ? $qpri->fields['sgd_eit_cod_padre'] : $qpri->fields['SGD_EIT_COD_PADRE'];
                                                //$qsec=$db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo like '$it1'");
                                                $qsec = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $it1");

                                                /* ----- INFORMACION DE LA CAJA ----- */
                                                if (!$qsec->EOF) {
                                                    $it2 = $assoc == 0 ? $qsec->fields['sgd_eit_cod_padre'] : $qsec->fields['SGD_EIT_COD_PADRE'];
                                                    //$qtir=$db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo like '$it2'");
                                                    $qtir = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $it2");

                                                    /* ----- INFORMACION DEL ENTREPAÑO ----- */
                                                    if (!$qtir->EOF) {
                                                        $it3 = $assoc == 0 ? $qtir->fields['sgd_eit_cod_padre'] : $qtir->fields['SGD_EIT_COD_PADRE'];
                                                        //$qcua=$db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo like '$it3'");
                                                        $qcua = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $it3");

                                                        /* ----- INFORMACION DEL ESTAND ----- */
                                                        if (!$qcua->EOF) {
                                                            $it4 = $assoc == 0 ? $qcua->fields['sgd_eit_cod_padre'] : $qcua->fields['SGD_EIT_COD_PADRE'];
                                                            //$qqin=$db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo like '$it4'");
                                                            $qqin = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $it4");

                                                            if (!$qqin->EOF) {
                                                                $it5 = $assoc == 0 ? $qqin->fields['sgd_eit_cod_padre'] : $qqin->fields['SGD_EIT_COD_PADRE'];
                                                                //$qsex=$db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo like '$it5'");
                                                                $qsex = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $it5");

                                                                if (!$qsex->EOF) {
                                                                    $it6 = $assoc == 0 ? $qsex->fields['sgd_eit_cod_padre'] : $qsex->fields['SGD_EIT_COD_PADRE'];
                                                                    //$qset=$db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo like '$it6'");
                                                                    $qset = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $it6");

                                                                    if (!$qset->EOF) {
                                                                        $it7 = $assoc == 0 ? $qset->fields['sgd_eit_cod_padre'] : $qset->fields['SGD_EIT_COD_PADRE'];
                                                                        $qset = $db->conn->Execute("select sgd_eit_cod_padre from sgd_eit_items where sgd_eit_codigo = $it7");
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }

                                            //echo(" bus ".$bus ." it1 ".$it1." it2 ".$it2." it3 ".$it3." it4 ".$it4." it5 ".$it5." it6 ".$it6." it7 ".$it7 );
                                            if ($it7 and $it7 == $exp_edificio) {
                                                $ite1 = $it6;
                                                $ite2 = $it5;
                                                $ite3 = $it4;
                                                $ite4 = $it3;
                                                $ite5 = $it2;
                                                $ite6 = $it1;
                                            }
                                            if ($it6 and $it6 == $exp_edificio) {
                                                $ite1 = $it5;
                                                $ite2 = $it4;
                                                $ite3 = $it3;
                                                $ite4 = $it2;
                                                $ite5 = $it1;
                                            }
                                            if ($it5 and $it5 == $exp_edificio) {
                                                $ite1 = $it4;
                                                $ite2 = $it3;
                                                $ite3 = $it2;
                                                $ite4 = $it1;
                                            }
                                            if ($it4 and $it4 == $exp_edificio) {
                                                $ite1 = $it3;
                                                $ite2 = $it2;
                                                $ite3 = $it1;
                                            }
                                            // Modificado skinaTech 10/11/09, para que aparezca la información del expediente cuando ha sido archivado previamente.
                                            if ($it3 and $it3 == $exp_edificio) {
                                                $ite1 = $it2;
                                                $ite2 = $it1;
                                                $ite3 = $bus;
                                            }
                                            $ent++;
                                        }

                                        //echo(" ite1 ".$ite1." ite2 ".$ite2." ite3 ".$ite3." ite4 ".$ite4." ite5 ".$ite5." ite6 ".$ite6." ite7 ".$ite7 );
                                        //modificado skina conversion de variables
                                        //$queryed = "select CODI_DPTO,CODI_MUNI from SGD_EIT_ITEMS where cast(SGD_EIT_CODIGO as varchar) LIKE '$exp_edificio'";
                                        switch ($db->driver) {
                                            case 'mssql':
                                                $queryed = "select CODI_DPTO,CODI_MUNI from SGD_EIT_ITEMS where cast(SGD_EIT_CODIGO as varchar(5)) LIKE '$exp_edificio'";
                                                break;
                                            case 'mysql':
                                                $queryed = "select CODI_DPTO,CODI_MUNI from SGD_EIT_ITEMS where cast(SGD_EIT_CODIGO as char(5)) LIKE '$exp_edificio'";
                                                break;
                                            case 'postgres':
                                                $queryed = "select CODI_DPTO,CODI_MUNI from SGD_EIT_ITEMS where cast(SGD_EIT_CODIGO as varchar(5)) LIKE '$exp_edificio'";
                                                break;
                                            case 'ocipo':
                                            case 'oci8':
                                                $queryed = "select CODI_DPTO,CODI_MUNI from SGD_EIT_ITEMS where cast(SGD_EIT_CODIGO as varchar(5)) LIKE '$exp_edificio'";
                                                break;
                                        }
                                        // $queryed = "select CODI_DPTO,CODI_MUNI from SGD_EIT_ITEMS where cast(SGD_EIT_CODIGO as varchar(5)) LIKE '$exp_edificio'";
                                        //$db->conn->debug=true;
                                        $rsed = $db->conn->Execute($queryed);
                                        if (!$rsed->EOF) {
                                            $codDpto = $assoc == 0 ? $rsed->fields['codi_dpto'] : $rsed->fields['CODI_DPTO'];
                                            $codMuni = $assoc == 0 ? $rsed->fields['codi_muni'] : $rsed->fields['CODI_MUNI'];
                                        }

                                        if ($exp_carpeta != "" and $car) {
                                            $sqlrad4 = "select SGD_EXP_CAJA FROM SGD_EXP_EXPEDIENTE WHERE SGD_EXP_NUMERO LIKE '$num_expediente' and SGD_EXP_CARPETA LIKE '$exp_carpeta'";
                                            $rsrad4 = $db->query($sqlrad4);
                                            if (!$rsrad4->EOF)
                                                $exp_caja = $assoc == 0 ? $rsrad4->fields['sgd_exp_caja'] : $rsrad4->fields['SGD_EXP_CAJA'];
                                        }
                                        ?>
                                    </tr>
                                </table>  
                            </td>
                        </tr>
                        <tr>
                            <td class=listado1>
                                <table width="95%" height="99%" border="1" cellspacing="5"  align="center" class="borde_tab" >
                                    <tr class='listado2'>                                     
                                        <td colspan="3">
                                            <?php
                                            // parametrizacion de items
                                            //modificado skina conversion de variables
                                            switch ($driver) {
                                                case 'mssql':
                                                    $sql = "select SGD_EIT_NOMBRE, SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as varchar(5)) like '0'";
                                                    break;
                                                case 'mysql':
                                                    $sql = "select SGD_EIT_NOMBRE, SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as char(5)) like '0'";
                                                    break;
                                                case 'postgres':
                                                    $sql = "select SGD_EIT_NOMBRE, SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as varchar(5)) like '0'";
                                                    break;
                                                case 'ocipo':
                                                case 'oci8':
                                                    $sql = "select SGD_EIT_NOMBRE, SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as varchar(5)) like '0'";
                                                    break;
                                            }

                                            $rs = $db->query($sql);
                                            $item1 = $assoc == 0 ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                                            $cod1 = $assoc == 0 ? $rs->fields["sgd_eit_codigo"] : $rs->fields["SGD_EIT_CODIGO"];
                                            ?>
                                            <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" class="borde_tab"  >
                                                <!--                                                        <TR  class='titulos2'><TD>&nbsp;</TD></TR>-->

                                                <tr valign="bottom" >
                                                    <TD colspan="4" class='listado2'><H3>Nombre del Expediente: <?= $etiquetas ?></H3></td>
                                                </tr>
        <!--                                                <tr class='listado2'>
                                                    <td colspan="2"><b>Subexpediente</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type=text class='tex_area' name="exp_subexpediente" id="exp_subexpediente" value='<?= $exp_subexpediente ?>' size=3 maxlength="2"><BR>
                                                    </td>
                                                </tr>-->

                                                <tr valign="bottom" class='listado2'>
                                                    <td><b>Departamento</b>
                                                    <td>
                                                        <?PHP
                                                        //$db->conn->debug=true;
                                                        if ($codDpto != "")
                                                            $codDpto2 = $codDpto;
                                                        //modificado skina error nombre de columna en tabla sgd_eit_items
                                                        $queryDpto = "select distinct(d.dpto_nomb),d.dpto_codi from departamento d, sgd_eit_items i where d.dpto_codi=i.codi_dpto ORDER BY dpto_nomb";
                                                        $rsD = $db->query($queryDpto);
                                                        print $rsD->GetMenu2("codDpto2", $codDpto2, "0:-- Seleccione --", false, "", " onChange='submit()' class='select' required='required'");
                                                        ?>
                                                    </td>
                                                    </td>
                                                    <td><b>Municipio</b>
                                                    <td>
                                                        <?PHP
                                                        if (!isset($codDpto2)) {
                                                            $codDpto2 = 0;
                                                        }
                                                        if ($codMuni != "")
                                                            $codMuni2 = $codMuni;
                                                        //modificado skina error nombre de campo en tabla sgd_eit_items
                                                        $queryMuni = "select distinct(m.MUNI_NOMB),m.MUNI_CODI FROM MUNICIPIO m , SGD_EIT_ITEMS i WHERE m.MUNI_CODI=i.codi_muni and DPTO_CODI='$codDpto2' ORDER BY MUNI_NOMB";
                                                        $rsm = $db->query($queryMuni);
                                                        print $rsm->GetMenu2("codMuni2", $codMuni2, "0:-- Seleccione --", false, "", " onChange='submit()' class='select' required='required'");
                                                        ?>
                                                    </td>
                                                    </td>
                                                </tr>
                                                <tr class='listado2'>
                                                    <td><b>Edificio</b></td>
                                                    <td>
                                                        <?php
                                                        if ($exp_edificio != "" and $exp_edificio2 == "")
                                                            $exp_edificio2 = $exp_edificio;
                                                        //modificado skina error nombre ce campos en tabla sgd_eit_items
                                                        switch ($driver) {
                                                            case 'mysql':
                                                                $sql = "select sgd_eit_nombre,SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(codi_muni as char(5)) like '$codMuni2' and cast(codi_dpto as char(4)) like '$codDpto2' order by sgd_eit_nombre";
                                                                break;
                                                            default:
                                                                $sql = "select sgd_eit_nombre,SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(codi_muni as varchar(5)) like '$codMuni2' and cast(codi_dpto as varchar(4)) like '$codDpto2' order by sgd_eit_nombre";
                                                                break;
                                                        }
                                                        $rs = $db->query($sql);
                                                        print $rs->GetMenu2('exp_edificio2', $exp_edificio2, true, false, "", " onChange='submit()' class=select");
                                                        ?>
                                                    </td>
                                                    <?php
                                                    //modificado skina conversion de variables
                                                    switch ($driver) {
                                                        case 'mysql':
                                                            $sql = "select SGD_EIT_NOMBRE , SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as char(5)) like '$exp_edificio2' order by SGD_EIT_NOMBRE ";
                                                            break;
                                                        default:
                                                            $sql = "select SGD_EIT_NOMBRE , SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as varchar(5)) like '$exp_edificio2' order by SGD_EIT_NOMBRE ";
                                                            break;
                                                    }

                                                    $rs = $db->query($sql);
                                                    if (!$rs->EOF)
                                                        $item21 = $assoc == 0 ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                                                    $item2 = explode(' ', $item21);
                                                    ?>
                                                    <td><?= $item2[0] ?></td>
                                                    <td>
                                                        <?php
                                                        /* -------- LISTA DESPLEGABLE ARCHIVO ------ */
                                                        if ($ent == 2)
                                                            $exp_piso2 = $ite1;
                                                        if ($exp_piso2 == "")
                                                            $exp_piso2 = $assoc == 0 ? $rs->fields["sgd_eit_codigo"] : $rs->fields["SGD_EIT_CODIGO"];
                                                        //modificado skina conversion de variables
                                                        switch ($driver) {
                                                            case 'mysql':
                                                                $sql = "select SGD_EIT_NOMBRE,SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as char(5)) like '$exp_edificio2' order by SGD_EIT_NOMBRE";
                                                                break;
                                                            default:
                                                                $sql = "select SGD_EIT_NOMBRE,SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as varchar(5)) like '$exp_edificio2' order by SGD_EIT_NOMBRE";
                                                                break;
                                                        }
                                                        $rs = $db->query($sql);
                                                        //print $rs->GetMenu2('exp_piso2',$exp_piso2,true,false,""," onChange='submit()' class=select");
                                                        print $rs->GetMenu2('exp_piso2', $exp_piso2, true, false, "", " onChange='submit()' class=select");
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr class='listado2'>
                                                    <?php
                                                    switch ($driver) {
                                                        case 'mysql':
                                                            $sql = "select SGD_EIT_NOMBRE , SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as char(5)) like '$exp_piso2' order by SGD_EIT_NOMBRE ";
                                                            break;
                                                        default:
                                                            $sql = "select SGD_EIT_NOMBRE , SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as varchar(5)) like '$exp_piso2' order by SGD_EIT_NOMBRE ";
                                                            break;
                                                    }
                                                    $rs = $db->query($sql);
                                                    if (!$rs->EOF)
                                                        $item31 = $assoc == 0 ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                                                    $item3 = explode(' ', $item31);

                                                    if ($item3[0] != "") {
                                                        ?>
                                                        <td ><?= $item3[0] ?></td>
                                                        <td>
                                                            <?php
                                                            // Se crea consulta para tomar el dato del edificio guardado en BD y no solo muestre el listado completo
                                                            // Fecha: 25 de Octubre 2016 
                                                            // By Skina 
                                                            $ubicacion = "select e.sgd_exp_ufisica as ubicacion from sgd_exp_expediente e, radicado r where e.sgd_exp_numero like '$num_expediente' and r.RADI_NUME_RADI=e.RADI_NUME_RADI  and e.RADI_NUME_RADI = '$nurad'";
                                                            $rsUbicacion = $db->query($ubicacion);
                                                            if ($ent == 2) {
                                                                $exp_item12 = $assoc == 0 ? $rsUbicacion->fields['ubicacion'] : $rsUbicacion->fields['UBICACION'];
                                                            }
                                                            if ($exp_item12 == "")
                                                                $exp_item12 = $assoc == 0 ? $rs->fields["sgd_eit_codigo"] : $rs->fields['SGD_EIT_CODIGO'];
                                                            print $rs->GetMenu2('exp_item12', $exp_item12, true, false, "", " onChange='submit()' class=select");
                                                            ?>
                                                        </td>
                                                        <?php
                                                    }
                                                    switch ($driver) {
                                                        case 'mysql':
                                                            $sql = "select SGD_EIT_NOMBRE , SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as char(5)) like '$exp_item12' order by SGD_EIT_NOMBRE";
                                                            break;
                                                        default:
                                                            $sql = "select SGD_EIT_NOMBRE , SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as varchar(5)) like '$exp_item12' order by SGD_EIT_NOMBRE";
                                                            break;
                                                    }

                                                    $rs = $db->query($sql);
                                                    if (!$rs->EOF)
                                                        $item41 = $assoc == 0 ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                                                    $item4 = explode(' ', $item41);
                                                    if ($item4[0] != "") {
                                                        ?>
                                                        <td><?= $item4[0] ?></td>
                                                        <td>
                                                            <?php
                                                            // Se crea consulta para tomar el dato del edificio guardado en BD y no solo muestre el listado completo
                                                            // Fecha: 25 de Octubre 2016
                                                            // By Skina
                                                            $entrepano = "select e.sgd_exp_carro as entrepano from sgd_exp_expediente e, radicado r where e.sgd_exp_numero like '$num_expediente' and r.RADI_NUME_RADI=e.RADI_NUME_RADI  and e.RADI_NUME_RADI = '$nurad'";
                                                            $rsEntrepano = $db->query($entrepano);
                                                            if ($ent == 2) {
                                                                $exp_item22 = $assoc == 0 ? $rsEntrepano->fields['entrepano'] : $rsEntrepano->fields['ENTREPANO'];
                                                            }
                                                            if ($exp_item22 == "")
                                                                $exp_item22 = $assoc == 0 ? $rs->fields["sgd_eit_codigo"] : $rs->fields['SGD_EIT_CODIGO'];
                                                            print $rs->GetMenu2('exp_item22', $exp_item22, true, false, "", " onChange='submit()' class=select");
                                                            ?>
                                                        </td>
                                                        <?php
                                                    }
                                                    //modificado skina conversion de variables
                                                    switch ($driver) {
                                                        case 'mysql':
                                                            $sql = "select SGD_EIT_NOMBRE , SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as char(5)) like '$exp_item22' order by SGD_EIT_NOMBRE";
                                                            break;
                                                        default:
                                                            $sql = "select SGD_EIT_NOMBRE , SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as varchar(5)) like '$exp_item22' order by SGD_EIT_NOMBRE";
                                                            break;
                                                    }

                                                    $rs = $db->query($sql);
                                                    if (!$rs->EOF)
                                                        $item51 = $assoc == 0 ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                                                    $item5 = explode(' ', $item51);
                                                    ?>
                                                <tr class='listado2'>
                                                    <?php if ($item5[0] != "") { ?>
                                                        <td><?= $item5[0] ?></td>
                                                        <td>
                                                            <?php
                                                            // Se crea consulta para tomar el dato del edificio guardado en BD y no solo muestre el listado completo
                                                            // Fecha: 25 de Octubre 2016
                                                            // By Skina
                                                            $cajasArch = "select e.sgd_exp_caja as cajasArch from sgd_exp_expediente e, radicado r where e.sgd_exp_numero like '$num_expediente' and r.RADI_NUME_RADI=e.RADI_NUME_RADI  and e.RADI_NUME_RADI = '$nurad'";
                                                            $rsCajasArch = $db->query($cajasArch);
                                                            if ($ent == 2) {
                                                                $exp_item31 = $assoc == 0 ? $rsCajasArch->fields["cajasarch"] : $rsCajasArch->fields["CAJASARCH"];
                                                            }
                                                            if ($exp_item31 == "")
                                                                $exp_item31 = $assoc == 0 ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                                                            print $rs->GetMenu2('exp_item31', $exp_item31, true, false, "", " onChange='submit()' class=select");
                                                            ?>
                                                        </td>
                                                        <?php
                                                    }
                                                    //modificado skina conversion de variables
                                                    switch ($driver) {
                                                        case 'mysql':
                                                            $sql = "select SGD_EIT_NOMBRE , SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as char(5)) like '$bus' order by SGD_EIT_NOMBRE";
                                                            break;
                                                        default:
                                                            $sql = "select SGD_EIT_NOMBRE , SGD_EIT_CODIGO from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as varchar(5)) like '$bus' order by SGD_EIT_NOMBRE";
                                                            break;
                                                    }
                                                    $rs = $db->query($sql);
                                                    if (!$rs->EOF)
                                                        $item61 = $assoc == 0 ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                                                    $item6 = explode(' ', $item61);
                                                    if ($item6[0] != "") {
                                                        ?>
                                                        <?PHP
                                                    }
                                                    //modificado skina conversion de variables
                                                    switch ($driver) {
                                                        case 'mysql':
                                                            $sql = "select SGD_EIT_NOMBRE from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as char(5)) like '$exp_entre' order by SGD_EIT_NOMBRE";
                                                            break;
                                                        default:
                                                            $sql = "select SGD_EIT_NOMBRE from SGD_EIT_ITEMS where cast(SGD_EIT_COD_PADRE as varchar(5)) like '$exp_entre' order by SGD_EIT_NOMBRE";
                                                            break;
                                                    }
                                                    $rs = $db->query($sql);
                                                    if (!$rs->EOF)
                                                        $item71 = $assoc == 0 ? $rs->fields["sgd_eit_nombre"] : $rs->fields["SGD_EIT_NOMBRE"];
                                                    $item7 = explode(' ', $item71);
                                                    ?>
                                                </tr>
<!--                                                <tr class='listado2'>
                                                    <td><b>NRO referencia</b> &nbsp;&nbsp;</td>
                                                    <td><input type="text" maxlength="5" size="6"  name="NREF" value="<?= $NREF ?>"> </td>
                                                </tr>-->
                                                <?php if (!$exp_fechaIni) $exp_fechaIni = date("Y-m-d"); ?>
                                                <tr class='listado2'>
                                                    <td width="20%" ><b>Fecha Inicial</b></td>
                                                    <td width="25%" >
                                                        <script language="javascript">
                                                            var dateAvailable1 = new ctlSpiffyCalendarBox("dateAvailable1", "form1", "exp_fechaIni", "btnDate1", "<?= $exp_fechaIni ?>", scBTNMODE_CUSTOMBLUE);
                                                            dateAvailable1.date = "<?= date('Y-m-d'); ?>";
                                                            dateAvailable1.writeControl();
                                                            dateAvailable1.dateFormat = "yyyy-MM-dd";
                                                        </script>
                                                    </td>
                                                    <?php if ($EST == 2 or $exp_fechaFin != "") { ?>
                                                        <td width="20%" ><b>Fecha final</b>&nbsp;&nbsp;&nbsp;</td>
                                                        <td width="30%" >
                                                            <script language="javascript">
                                                                var dateAvailable3 = new ctlSpiffyCalendarBox("dateAvailable3", "form1", "exp_fechaFin", "btnDate1", "<?= $exp_fechaFin ?>", scBTNMODE_CUSTOMBLUE);
                                                                dateAvailable3.date = "<?= date('Y-m-d'); ?>";
                                                                dateAvailable3.writeControl();
                                                                dateAvailable3.dateFormat = "yyyy-MM-dd";
                                                            </script>
                                                            &nbsp;
                                                        </td>
                                                    <?php } ?>

                                                </tr>
                                                <tr class='listado2'>
                                                    <?php
                                                    $sqlrad = "select e.RADI_NUME_RADI,e.SGD_EXP_ESTADO,r.RADI_NUME_HOJA,r.MEDIO_M, e.SGD_EXP_CARPETA FROM SGD_EXP_EXPEDIENTE e, RADICADO r WHERE SGD_EXP_NUMERO LIKE '$num_expediente' and r.RADI_NUME_RADI=e.RADI_NUME_RADI and e.sgd_exp_estado !=2";
                                                    if ($exp_carpeta != "" and $car)
                                                        $sqlrad .= " and e.SGD_EXP_CARPETA LIKE '$exp_carpeta'";
                                                    //if($exp_carpeta=="")$sqlrad.=" and e.SGD_EXP_CARPETA IS NULL";					
                                                    /* Modificado skinatech 231109 */
                                                    $sqlrad .= " and r.radi_nume_radi = '$nurad' ORDER BY e.RADI_NUME_RADI";
                                                    $rsrad = $db->query($sqlrad);
                                                    //$db->conn->debug = true;
                                                    $j = 1;
                                                    $exp_folio = 0;
                                                    $CD_TOL = 0;

                                                    while (!$rsrad->EOF) {
                                                        $fol[$j] = $assoc == 0 ? $rsrad->fields['radi_nume_hoja'] : $rsrad->fields['RADI_NUME_HOJA'];
                                                        $esta[$j] = $assoc == 0 ? $rsrad->fields['sgd_exp_estado'] : $rsrad->fields['SGD_EXP_ESTADO'];
                                                        $CD[$j] = $assoc == 0 ? $rsrad->fields['medio_m'] : $rsrad->fields['MEDIO_M'];
                                                        if ($esta[$j] == 1) {
                                                            $exp_folio += $fol[$j];
                                                            $CD_TOL += $CD[$j];
                                                        }
                                                        $rsrad->MoveNext();
                                                        $j++;
                                                    }
                                                    if ($exp_folio >= $FOLIOS) {
//                                                        echo '---- ' . $exp_folio . ' ----- ' . $FOLIOS
                                                        ?>
                                                    <script language="javascript">
                                                        confirm('Debe hacer el cambio de carpeta. Maximo 200 Folios por Carpeta');
                                                    </script>
                                                <?php } ?>
                                                <td align="right"><b>Folios total:</b>&nbsp;</td>
                                                <td align="left"><?= $exp_folio ?></td>
                                                <td align="right"><b>Anexos total:</b>&nbsp;</td>
                                                <td align="left"><?= $CD_TOL ?></td>
                                                <input type="hidden" name="efolio" value="<?= $exp_folio ?>">
                                                <input type="hidden" name="eanexo" value="<?= $CD_TOL ?>">
                                                </tr>
                                                <tr class='listado2'><td colspan="4" align="center"><b>Estado:</b></td></tr>
                                                <tr class='listado2'>
                                                    <td align="right"><b>Abierto</b> 
                                                    <td align="left">
                                                        <?php
//                                                        echo '************ '.$EST;
                                                        if ($EST == 1 or $EST == "") { //$datoss = "checked"; else $datoss= "";  ?>
                                                            <h3>&nbsp;&nbsp;&nbsp;&nbsp;  X </h3>
                                                        <?php } ?>
                                                    </td>
                                                    </td>
                                                    <td align="right"><b>Cerrado</b>
                                                    <td  align="left">
                                                        <?php if ($EST == 2) {  //$datoss = " checked"; else $datoss= "";  ?>
                                                            <h3>&nbsp;&nbsp;&nbsp;&nbsp;   X </h3>
                                                        <?php } ?>
                                                    </td>
                                                    </td>
                                                </tr>
                                                <tr><td colspan="4" align="center"><b>Unidad de conservaci&oacute;n</b> :</td></tr>
                                                <tr class='listado2'>
                                                    <td colspan="4" align="center">CAR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <?php
                                                        if ($UN == 1)
                                                            $datoss = "checked";
                                                        else
                                                            $datoss = "";
                                                        ?>
                                                        <input name="UN" id="UN" type="radio" class="select" value="1" <?= $datoss ?>>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AZ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <?php
                                                        if ($UN == 2)
                                                            $datoss = "checked";
                                                        else
                                                            $datoss = "";
                                                        ?>
                                                        <input name="UN" id="UN" type="radio" class="select" value="2" <?= $datoss ?>>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <?php
                                                        if ($UN == 3)
                                                            $datoss = "checked";
                                                        else
                                                            $datoss = "";
                                                        ?>
                                                        <input name="UN" id="UN" type="radio" class="select" value="3" <?= $datoss ?>>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <?php
                                                        if ($UN == 4)
                                                            $datoss = "checked";
                                                        else
                                                            $datoss = "";
                                                        ?>
                                                        <input name="UN" id="UN" type="radio" class="select" value="4" <?= $datoss ?>>
                                                    </td>
                                                </tr>
                                                <?php
                                                $querycar = "select max(cast(sgd_exp_carpeta as int)) as MAXI from sgd_exp_expediente where sgd_exp_numero like '$num_expediente'";
                                                $rscar = $db->conn->Execute($querycar);
                                                $carpetamax = $assoc == 0 ? $rscar->fields['maxi'] : $rscar->fields['MAXI'];

                                                /* CAMPO CORRESPONDIENTE A LA CARPRTA DEL EXPEDIENTE RELACIONADA CON EL RADICADO */
                                                $querycarpeta = "select e.sgd_exp_carpeta as CARPETA from sgd_exp_expediente e, radicado r where e.sgd_exp_numero like '$num_expediente' and r.RADI_NUME_RADI=e.RADI_NUME_RADI  and e.RADI_NUME_RADI = '$nurad'";
                                                $rscarpeta = $db->conn->Execute($querycarpeta);
                                                $exp_carpeta = $assoc == 0 ? $rscarpeta->fields['carpeta'] : $rscarpeta->fields['CARPETA'];
                                                ?>
                                                <tr class='listado2'>
                                                    <td  align="center" colspan="4"> 
                                                       <!-- No:<input type="text" name="exp_carpeta" value="<?//=$exp_carpeta?>" size="3" maxlength="2" > DE <?//=$carpetamax?>&nbsp;&nbsp;&nbsp;-->
                                                        No:<input type="text" name="exp_carpeta" value="<?= $exp_carpeta ?>" size="3" maxlength="15" > DE <?= $CARPETA ?>&nbsp;&nbsp;&nbsp;
                                                        <input type="submit" name="car" value=">>" class="botones_2">
                                                    </td>
                                                </tr>
                                                <input type="hidden" name="exp_carpeta2" value="<?= $exp_carpeta ?>">
                                                <?php
                                                $exp_carpeta2 = $exp_carpeta;
                                                $sqlrad1 = "select e.RADI_NUME_RADI,e.SGD_EXP_ESTADO,r.RADI_NUME_HOJA FROM SGD_EXP_EXPEDIENTE e, RADICADO r WHERE SGD_EXP_NUMERO LIKE '$num_expediente' and r.RADI_NUME_RADI=e.RADI_NUME_RADI and e.sgd_exp_estado !=333";
                                                if ($exp_carpeta != "" and $car)
                                                    $sqlrad1 .= " and e.SGD_EXP_CARPETA LIKE '$exp_carpeta'";
                                                //if($exp_carpeta=="")$sqlrad1.=" and e.SGD_EXP_CARPETA IS NULL";
                                                //Modificado skinatech 231109
                                                $sqlrad1 .= " and e.RADI_NUME_RADI = '$nurad' ORDER BY e.RADI_NUME_RADI";
                                                // $db->conn->debug=true;
                                                $rsrad = $db->query($sqlrad1);
                                                $ce = 1;
                                                while (!$rsrad->EOF) {
                                                    $arrayRad[$ce] = $assoc == 0 ? $rsrad->fields['radi_nume_radi'] : $rsrad->fields['RADI_NUME_RADI'];
                                                    $rsrad->MoveNext();
                                                    $ce++;
                                                }
                                                ?>
                                                <tr><td align="center" colspan="4"><b>Estos son los radicados incluidos en este expediente:</b></td></tr>
                                                <tr class='listado2'>
                                                    <td colspan="2"><b>Radicado</b></td>
                                                    <td><b>Folios</b></td>
                                                    <td><b>Anexos</b></td>
                                                    <td><b>Incluir</b></td>
                                                </tr>
                                                <?php
                                                $p = 3;
                                                for ($t = 1; $t < $ce; $t++) {
                                                    ?>
                                                    <tr class='listado2'>  
                                                        <td  colspan="2"><?= $arrayRad[$t] ?></td>
                                                        <?php
                                                        if ($esta[$t] == '1' or $arrayRad[$t] == $nurad)
                                                            $st = "checked";
                                                        else
                                                            $st = "";
                                                        if ($fol[$t] == "")
                                                            $fol[$t] = 0;
                                                        if ($CD[$t] == "")
                                                            $CD[$t] = 0;
                                                        ?>
                                                        <td ><input type="text"  value="<?= $fol[$t] ?>" name="fol[<?= $t ?>]" maxlength="4" size="5"></td>
                                                        <td ><input type="text"  value="<?= $CD[$t] ?>" name="CD[<?= $t ?>]" maxlength="4" size="5"></td>
                                                        <td ><input name="inclu[<?= $t ?>]" type="checkbox" class="select" value="<?= $p ?>" <?= $st ?>></td>
                                                    </tr>
                                                    <?php
                                                    $arrayRad3[$t] = $arrayRad[$t];
                                                    $p++;
                                                }
                                                ?>
                                                <tr><td>&nbsp;</td></tr>
                                                <tr>
                                                    <?php if ($exp_estado == 0 or $permiso >= 1) { ?>
                                                        <td colspan="4" align="center"><input type="submit" onclick="return validarForm();" value=Archivar name=Archivar class="botones">&nbsp;</td>
                                                        <?php
                                                        if ($Grabar) {
                                                            $exp_archivo = $EST;
                                                            $exp_unidad = $UN;
                                                            $exp_rete = $exp_retenci;
                                                            $arrayRad3 = $arrayRad;
                                                        }
                                                    }
                                                    ?> <BR>
                                                </tr>
                                                <td colspan="4" align="center"><a href="../expediente/cuerpo_exp.php?<?=$encabezado?>" ><button type="button" value=Volver name=Volver class="botones">Volver</button></a></td>
        <!--                                                            <tr><td colspan="4"></td> </tr>-->
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>    
                                </table>
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                // $row = array();
            } else {
                ?>
                <form name='form1' action='../enviar.php' method=post>
                    <?php
                    echo "<input type=hidden name=depsel>";
                    echo "<input type=hidden name=depsel8>";
                    echo "<input type=hidden name=carpper>";
                    ?>    
                </form>
                <?php
                echo "<form action='usuarionuevo.php' method=post name=form2>";
                // Si es un usuario nuevo pide la nueva contrasea.
                $usuanuevo_exp = $assoc == 0 ? $rs->fields["usua_nuevo"] : $rs->fields["USUA_NUEVO"];
                if ($usuanuevo_exp == "0") {
                    echo "<center><B>USUARIO NUEVO </CENTER>";
                    echo "<P><P><center>Por favor introduzca la nueva contrasea<p></p>";
                    echo "<CENTER><input type=hidden name='usuarionew' value=$krd><B>USUARIO $krd<br></p>";
                    echo "<table border=0>";
                    echo "<tr>";
                    echo "<td><center>CONTRASE  </td><td><input type=password name=contradrd vale=''><br></td>";
                    echo "</tr>";
                    echo "<tr><td><center>RE-ESCRIBA LA CONTRASE  </td><td><input type=password name=contraver vale=''></td>";
                    echo "</tr>";
                    echo "</table></p></p>";
                    echo "";
                    echo "";
                    echo "<center>Seleccione la dependencia a la cual pertenece \n";
                    $isql = "select depe_codi,depe_nomb from DEPENDENCIA ORDER BY DEPE_NOMB";
                    $rs1 = $db->query($isql);
                    $numerot = $rs1->RecordCount();
                    echo "<br><b><center>Dependencia <select name='depsel' class='e_buttons'>\n";
                    $dependencianomb = substr($dependencianomb, 0, 35);
                    echo "<option value=$dependencia>$dependencianomb</option>\n";

                    do {
                        $depcod = $assoc == 0 ? $rs1->fields["depe_codi"] : $rs1->fields["DEPE_CODI"];
                        $depdes = substr($assoc == 0 ? $rs1->fields["depe_nomb"] : $rs1->fields["DEPE_NOMB"], 0, 35);
                        echo "<option value=$depcod>$depdes</option>\n";
                    } while (!$rs1->EOF);
                    echo "</select>";
                    echo "<br><input type=submit value=Aceptar>";
                } else {
                    echo "<input type=hidden name=depsel>";
                    echo "<input type=hidden name=carpper>";
                }
                echo '</form>';
            }
        } else {
            if (!isset($dependencia))
                include "./rec_session.php";
            ?>
            <form name='form1' action='../enviar.php' method=post>
                <div align="center">
                    <input type=hidden name=depsel>
                    <input type=hidden name=depsel8>
                    <input type=hidden name=carpper>
                    <span class='etextou'>NO TIENE AUTORIZACION PARA INGRESAR</span><BR>
                    <span class='eerrores'>
                        <a href='../login.php' target=_parent>
                            <span class="textoOpcion">PorFavor intente validarse de nuevo. Presione aca !</span>
                        </a>
                    </span> 
                </div>
            </form>
        <?php } ?>
        <br>
        <form name=jh >
            <input type=hidDEN name=jj value=0>
            <input type=hidDEN name=dS value=0>
        </form>
    </body>    
</html>    
