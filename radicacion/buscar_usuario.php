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
$driver = $_SESSION['driver'];
$saveInformation = $_SESSION['saveInformation'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */


/**
 * Modificacion Variables Globales Infometrika 2009-05
 * Licencia GNU/GPL
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;

$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tpNumRad = $_SESSION["tpNumRad"];
$tpPerRad = $_SESSION["tpPerRad"];
$tpDescRad = $_SESSION["tpDescRad"];
if (!$dir_raiz)
    $dir_raiz = "..";
$ent = $_POST["ent"];
if (!$ent)
    $ent = $_GET["ent"];

//if(!$_SESSION['dependencia']) include "$ruta_raiz/rec_session.php"; 

require_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$dir_raiz");
include("crea_combos_universales.php");
$db->conn->SetFetchMode(ADODB_FETCH_NUM);
//$db->conn->debug = true;
?>
<html>
    <head>
        <title>Busqueda Remitente / Destino</title>
        <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">
        <script Language="JavaScript" SRC="../js/crea_combos.js"></script>
        <script LANGUAGE="JavaScript">

            <?php
            // Convertimos los vectores de los paises, dptos y municipios creados en crea_combos_universales.php a vectores en JavaScript.
            echo arrayToJsArray($vpaisesv, 'vp');
            echo arrayToJsArray($vdptosv, 'vd');
            echo arrayToJsArray($vmcposv, 'vm');
            ?>

            function verif_data() {
                if (document.formu1.idcont_ok_1.value == "0" || document.formu1.idpais_ok_1.value == "0" || document.formu1.codep_us_ok_1.value == "0" || document.formu1.muni_us_ok_1.value == "0") {
                    alert("Seleccione la geografia completa del destinatario");
                    return false;
                }

                if (document.formu1.codep_us_ok_1.value == "0") {
                    alert("Seleccione la geografia completa del destinatario (Departamento)");
                    return false;
                }

                if (document.formu1.muni_us_ok_1.value == "0") {
                    alert("Seleccione la geografia completa del destinatario (Municipio)");
                    return false;
                }
                
                if (document.formu1.tagregar.value == 'seleccione') {
                    alert("Debe seleccionar un tipo de cliente");
                    return false;
                }
                //modificado por skina
                //este javascript permite generar valores obligatorios por usuario o empresa.
                //Valores obligatorios para usuarios 
                if (document.formu1.tagregar.value == 0) {
                    if (document.formu1.no_documento1_ok.value == '') {
                        alert("Debe colocar un numero de identificacion.");
                        return false;
                    }

                    if (document.formu1.nombre_nus1_ok.value == '') {
                        alert("Debe colocar un nombre del remitente/destinatario.");
                        return false;
                    }

                    if (document.formu1.direccion_nus1_ok.value == '') {
                        alert("Debe colocar Direccion de la persona.");
                        return false;
                    }

                    if (document.formu1.seg_apell_nus1_ok.value == '') {
                        alert("Debe colocar primer apellido.");
                        return false;
                    }
                    return true;
                }
                
                //valores obligatorios para empresas 
                if (document.formu1.tagregar.value == 2) {
                    if (document.formu1.no_documento1_ok.value == '') {
                        alert("Debe colocar documento (Nit).");
                        return false;
                    }

                    if (document.formu1.nombre_nus1_ok.value == '') {
                        alert("Debe colocar el nombre de la empresa.");
                        return false;
                    }

                    if (document.formu1.seg_apell_nus1_ok.value == '') {
                        alert("Debe colocar contacto o representante legal.");
                        return false;
                    }

                    if (document.formu1.direccion_nus1_ok.value == '') {
                        alert("Debe colocar direccion de la empresa.");
                        return false;
                    }
                    return true;
                }
            }
            function pasar_datos(i) {
                documento = document.getElementById("documento_us" + i).value;
                if (documento) {
                    nombre = document.getElementById("nombre_us" + i).value + ' ';
                    apellido1 = document.getElementById("seg_apell_us" + i).value + ' ';
                    opener.document.formulario.documento_us1.value = documento;
                    opener.document.formulario.nombre_us1.value = nombre;
                    opener.document.formulario.prim_apel_us1.value = apellido1;
                    opener.document.formulario.telefono_us1.value = document.getElementById("telefono_us" + i).value;
                    opener.document.formulario.mail_us1.value = document.getElementById("mail_us" + i).value;
                    opener.document.formulario.direccion_us1.value = document.getElementById("direccion_us" + i).value;
                    opener.document.formulario.tipo_emp_us1.value = document.getElementById("tipo_emp_us" + i).value;
                    opener.document.formulario.cc_documento_us1.value = document.getElementById("cc_documento_us" + i).value;

                    opener.document.formulario.idcont1.value = document.getElementById("idcont" + i).value;
                    opener.cambia(opener.document.formulario, 'idpais1', 'idcont1');

                    opener.document.formulario.idpais1.value = document.getElementById("idpais" + i).value;
                    opener.cambia(opener.document.formulario, 'codep_us1', 'idpais1');

                    opener.document.formulario.codep_us1.value = document.getElementById("codep_us" + i).value;
                    opener.cambia(opener.document.formulario, 'muni_us1', 'codep_us1');

                    opener.document.formulario.muni_us1.value = document.getElementById("muni_us" + i).value;
                    opener.document.formulario.otro_us1.focus();
                    opener.focus();
                    window.close();
                }
            }
        </script>
    </head>
    <body bgcolor="#FFFFFF">
        <script LANGUAGE="JavaScript">
            function pasarInfoactu(i) {
                documento = document.getElementById("documento_us" + i).value;
                if (documento) {
                    document.formu1.tipo_emp_us1_ok.value = document.getElementById("tipo_emp_us" + i).value;
                    document.formu1.codigo.value = document.getElementById("documento_us" + i).value;
                    document.formu1.no_documento1_ok.value = document.getElementById("cc_documento_us" + i).value;
                    document.formu1.nombre_nus1_ok.value = document.getElementById("nombre_us" + i).value;
                    document.formu1.seg_apell_nus1_ok.value = document.getElementById("seg_apell_us" + i).value;
                    document.formu1.direccion_nus1_ok.value = document.getElementById("direccion_us" + i).value;
                    document.formu1.telefono_nus1_ok.value = document.getElementById("telefono_us" + i).value;
                    document.formu1.idcont_ok_1.value = document.getElementById("idcont" + i).value;
                    document.formu1.idpais_ok_1.value = document.getElementById("idpais" + i).value;
                    document.formu1.codep_us_ok_1.value = document.getElementById("codep_us" + i).value;
                    document.formu1.muni_us_ok_1.value = document.getElementById("muni_us" + i).value;
                    document.formu1.tagregar.value = document.getElementById("tipo_emp_us" + i).value;
                    document.formu1.mail_nus1_ok.value = document.getElementById("mail_us" + i).value;
                    document.getElementById("agregar").disabled = true;
                    document.getElementById("modificar").disabled = false;
                }
            }

            function activa_chk(forma) {
                if (forma.tbusqueda.value == 1)
                    forma.chk_desact.disabled = false;
                else
                    forma.chk_desact.disabled = true;
            }

            function tipocliente() {
                tipo = document.formu1.tagregar.value;
                fila = document.getElementById("nuevoingreso").getElementsByTagName('tr');
                if (tipo == 2) {
                    document.getElementById("labelcliente").innerHTML = 'Representante Legal *';
                    document.getElementById("labeltipoclientedocumento").innerHTML = 'Documento / Nit *';
                    document.getElementById("labeltipoclientenombre").innerHTML = 'Nombre *';
                    fila[1].getElementsByTagName('td')[4].style.display = "";
                    fila[2].getElementsByTagName('td')[4].style.display = "";
                    fila[1].getElementsByTagName('td')[5].style.display = "";
                    fila[2].getElementsByTagName('td')[5].style.display = "";
                    fila[1].getElementsByTagName('td')[2].style.display = "";
                    fila[2].getElementsByTagName('td')[2].style.display = "";
                } else if (tipo == 7) {
                    document.getElementById("labeltipoclientedocumento").innerHTML = 'Codigo SFC *';
                    document.getElementById("labeltipoclientenombre").innerHTML = 'Codigo negocio *';
                    fila[1].getElementsByTagName('td')[4].style.display = "none";
                    fila[2].getElementsByTagName('td')[4].style.display = "none";
                    fila[1].getElementsByTagName('td')[5].style.display = "none";
                    fila[2].getElementsByTagName('td')[5].style.display = "none";
                    fila[1].getElementsByTagName('td')[2].style.display = "none";
                    fila[2].getElementsByTagName('td')[2].style.display = "none";
                } else {
                    document.getElementById("labeltipoclientedocumento").innerHTML = 'Documento / Nit *';
                    document.getElementById("labeltipoclientenombre").innerHTML = 'Nombre *';
                    document.getElementById("labelcliente").innerHTML = 'Primer Apellido *';
                    fila[1].getElementsByTagName('td')[4].style.display = "";
                    fila[2].getElementsByTagName('td')[4].style.display = "";
                    fila[1].getElementsByTagName('td')[5].style.display = "";
                    fila[2].getElementsByTagName('td')[5].style.display = "";
                    fila[1].getElementsByTagName('td')[2].style.display = "";
                    fila[2].getElementsByTagName('td')[2].style.display = "";
                }
            }

            function isTextKey3(evt) {
                tipo = document.formu1.tagregar.value;
                var charCode = (evt.which) ? evt.which : event.keyCode;
                if (tipo != 7) {
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                }
                return true;
            }

            function check(e) {
                tecla = (document.all) ? e.keyCode : e.which;

                //Tecla de retroceso para borrar, siempre la permite
                if (tecla == 8) {
                    return true;
                }

                // Patron de entrada, en este caso solo acepta numeros y letras
                patron = /[A-Za-z- ]/;
                tecla_final = String.fromCharCode(tecla);
                return patron.test(tecla_final);
            }
        </script>
        <?php
        if (!$envio_salida and ! $busq_salida) {
            $label_us = $nombreTp1;
            $label_pred = $nombreTp2;
            $label_emp = $nombreTp3;
        } else {
            $label_us = "DESTINATARIO";
            $label_pred = "$nombreTp2";
            $label_emp = "$nombreTp3";
        }

        $tbusqueda = $_POST['tbusqueda'];

        if ($tagregar and $agregar) {
            $tbusqueda = $tagregar;
        }

        if ($no_documento1_ok and ( $agregar or $modificar)) {
            $no_documento = $no_documento1_ok;
        }
        if (!$no_documento1_ok and $nombre_nus1_ok and ( $agregar or $modificar)) {
            $nombre_essp = $nombre_nus1_ok;
        }

        if (!$formulario) {
            ?>  
            <form method="post" name="formu1" id="formu1" action="buscar_usuario.php?busq_salida=<?= $busq_salida ?>&krd=<?= $krd ?>&verrad=<?= $verrad ?>&nombreTp1=<?= $nombreTp1 ?>&nombreTp2=<?= $nombreTp2 ?>&nombreTp3=<?= $nombreTp3 ?>&tipoval=<?= $_GET['tipoval'] ?>" >
                <?php
            }
            ?> 
            <center>
                <input type="hidden" name="radicados" value="<?= $radicados_old ?>">
                <table border=1 width="95%" class="borde_tab" cellpadding="0" cellspacing="5">
                    <tr> 
                        <td width="30%" colspan="2" class="titulos5">
                            Buscar por:
                            <select name='tbusqueda' class='select form-control' onchange="activa_chk(this.form)">
                                <?php
                                if ($tbusqueda == 0) {
                                    $datos = "selected";
                                    $tbusqueda = 0;
                                } else {
                                    $datos = "";
                                }
                                ?> 
                                <option value=0 <?= $datos ?>>Ciudadano</option>
                                <?php
                                if ($tbusqueda == 1) {
                                    $datos = "selected";
                                    $tbusqueda = 1;
                                } else {
                                    $datos = "";
                                }
                                //Entidades
                                //if (strlen($nombreTp3) > 0) echo "<option value=1 $datos>$nombreTp3</option>";
                                if (strlen($nombreTp3) > 0)
                                    echo "<option value=1 $datos>Persona Natural</option>";


                                if ($tbusqueda == 2) {
                                    $datos = "selected";
                                    $tbusqueda = 2;
                                } else {
                                    $datos = "";
                                }
                                ?> 
                                <option value=2 <?= $datos ?>>Persona Juridica</option>
                                <?php
                                if ($tbusqueda == 8) {
                                    $datos = " selected ";
                                    $tbusqueda = 8;
                                } else {
                                    $datos = "";
                                }
                                ?>
                                <option value=8 selected <?= $datos ?>>Todos</option>
                            </select>
                        </td>
                        <td class="titulos5" valign="middle">
                            <span class="titulos5">Nombre</span> 
                            <input type=text name=nombre_essp value='' class="tex_area form-control">
                        </td>
                        <td class="titulos5" valign="middle">
                            Documento
                            <input type=text name=no_documento value='' class="tex_area form-control">
                            </font>
                        </td>     
                        <td width="5%" align="center" class="titulos5" > 
                            <input type=submit name=buscar value='BUSCAR' class="botones">
                        </td>
                    </tr>
                </table>               
                <br>
                <div id="titulo" style="width: 95%;" align="center">Resultado de b&uacute;squeda
                </div>
                <table class=borde_tab width="95%" border='1' cellpadding="0" cellspacing="5">
                    <tr class="grisCCCCCC" align="center"> 
                        <td width="11%" class="titulos3" colspan=""><?= $tagregar == 7 ? 'C&oacute;digo SFC' : 'Documento / Nit' ?> </td>
                        <td width="11%" class="titulos3" colspan=""><?= $tagregar == 7 ? 'C&oacute;digo negocio' : 'Nombre' ?></td>
                        <?= $tagregar != 7 ? '<td width="15%" class="titulos3" >Primer Apellido /<br> Representante Legal</td>' : ''; ?>
                        <td width="14%" class="titulos3" colspan="">Direcci&oacute;n</td>
                        <td width="9%" class="titulos3" >Tel&eacute;fono</td>
                        <td width="7%" class="titulos3" >Email</td>
                        <td colspan="3" class="titulos3" >Colocar como</td>
                    </tr> 
                    <?php
                    $existe = 0;
//                    $db->conn->debug = true;
                    $grilla = "titulos5";
                    $i = 0;
                    // ********************************
                    // ********************************
                    if ($modificar == "MODIFICAR" or $agregar == "AGREGAR") {
                        $idcont1 = $idcont_ok_1;
                        $idpais1 = $idpais_ok_1;

                        $muni_tmp = explode("-", $muni_us_ok_1);
                        $muni_tmp = $muni_tmp[2];
                        $dpto_tmp = explode("-", $codep_us_ok_1);
                        $dpto_tmp = $dpto_tmp[1];
                    }
                    
                    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
                    if ($agregar == "AGREGAR") {
                        $no_documento1_ok = trim($no_documento1_ok);
                        $sqlTercero = "select NIT_DE_LA_EMPRESA as SGD_CIU_CEDULA, 'Persona Natural' as TIPO from BODEGA_EMPRESAS be WHERE NIT_DE_LA_EMPRESA='$no_documento1_ok'";
                        $sqlNatural = "select SGD_CIU_CEDULA as SGD_CIU_CEDULA, 'Ciudadano' as TIPO from SGD_CIU_CIUDADANO sc WHERE SGD_CIU_CEDULA='$no_documento1_ok'";
                        $sqlJuridico = "select SGD_OEM_NIT as SGD_CIU_CEDULA, 'Persona Juridica' as TIPO from SGD_OEM_OEMPRESAS oe WHERE SGD_OEM_NIT='$no_documento1_ok'";
                        $sqlFuncionario = "select usua_doc as SGD_CIU_CEDULA, 'Funcionario' as TIPO from usuario oe WHERE usua_doc='$no_documento1_ok'";
                        $rsSqlsCLientes = $db->query($sqlTercero . ' union ' . $sqlNatural . ' union ' . $sqlJuridico. ' union ' . $sqlFuncionario);

                        if (!$rsSqlsCLientes->EOF){
                            $cedula = trim($rsSqlsCLientes->fields["SGD_CIU_CEDULA"]);
                            $tipoCliente = trim($rsSqlsCLientes->fields["TIPO"]);
                            $existe = 1;    
                        }else{
                            $existe = 0;
                        }
                    }

                    switch ($saveInformation){
                        case 1:
                            // transforma la información a mayuscula
                            $nombre_nus1_ok = trim(strtoupper($nombre_nus1_ok));
                            $seg_apell_nus1_ok = trim(strtoupper($seg_apell_nus1_ok));
                            $prim_apell_nus1_ok = trim(strtoupper($prim_apell_nus1_ok));
                        break;
                        case 2:
                            // transforma la información a minuscula
                            $nombre_nus1_ok = trim(strtolower($nombre_nus1_ok));
                            $seg_apell_nus1_ok = trim(strtolower($seg_apell_nus1_ok));
                            $prim_apell_nus1_ok = trim(strtolower($prim_apell_nus1_ok));
                        break;
                        case 3:
                            // transforma la información a tipo titulo
                            $nombre_nus1_ok = trim(ucfirst($nombre_nus1_ok));
                            $seg_apell_nus1_ok = trim(ucfirst($seg_apell_nus1_ok));
                            $prim_apell_nus1_ok = trim(ucfirst($prim_apell_nus1_ok));
                        break;
                    }

                    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
                    if ($agregar == "AGREGAR" and $tagregar == 0) {
                        $no_documento1_ok = trim($no_documento1_ok);

                        if ($existe == 1) {
                            echo "<center><b><font color=red><center><br><< No se ha podido agregar el usuario, El usuario ya se encuentra registrado como $tipoCliente >> <br><br></center></font>";
                        } else {

                                $nextval = $db->conn->nextId("sec_ciu_ciudadano", $driver);
                                // $nombre_nus1 = trim(strtoupper($nombre_nus1_ok));
                                // $seg_apell_nus1 = trim(strtoupper($seg_apell_nus1_ok));
                                $no_documento1_ok = trim($no_documento1_ok);
                                $codigo = trim($codigo);

                                if ($nextval == -1) {
                                    die("<span class='etextomenu'>No se encontro la secuencia sec_ciu_ciudadano ");
                                }

                                // Si se ingresa en el documento el valor de 4 ceros genera número aleatorio.
                                if($no_documento1_ok == '0000' or $no_documento1_ok == '0' or $no_documento1_ok == '00' or $no_documento1_ok == '000'){
                                    $no_documento1_ok = '00'.str_pad(rand(1,1500), 7, '0',STR_PAD_LEFT);
                                }

                                $isql = "INSERT INTO SGD_CIU_CIUDADANO(SGD_CIU_CEDULA, TDID_CODI, SGD_CIU_CODIGO, SGD_CIU_NOMBRE,
                                SGD_CIU_DIRECCION, SGD_CIU_APELL1, SGD_CIU_APELL2, SGD_CIU_TELEFONO, SGD_CIU_EMAIL, ID_CONT, ID_PAIS, 
                                DPTO_CODI, MUNI_CODI) values ('$no_documento1_ok', 2, $nextval, '$nombre_nus1_ok', '$direccion_nus1_ok', 
                                '$seg_apell_nus1_ok', '','$telefono_nus1_ok', '$mail_nus1_ok', 
                                $idcont1, $idpais1, $dpto_tmp, $muni_tmp)";

                                $rs = $db->query($isql);

                                if (!trim($no_documento_ok))$nombre_essp = "$nombre_nus1_ok $seg_apell_nus1_ok";
                                
                                if (!$rs) {
                                    $db->conn->RollbackTrans();
                                    die("<span class='etextomenu'>No se pudo actualizar SGD_CIU_CIUDADANO ($isql) ");
                                }
                        }

                        if ($flag == 1) {
                            echo "<center><br><b><font color=red><center>No se ha podido agregar el usuario, verifique que los datos sean correctos</center><br><br></font>";
                        }
                        $isqlCiudadano = "select * from SGD_CIU_CIUDADANO where SGD_CIU_CEDULA='$no_documento1_ok'";
                        $rsisqlCiudadano = $db->query($isqlCiudadano);
                        $tbusqueda = 0;
                    }

                    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
                    if ($agregar == "AGREGAR" and $tagregar == 1) {                        
                        $no_documento1_ok = trim($no_documento1_ok);
                        // $nombre_nus1_ok = trim($nombre_nus1_ok);
                        $direccion_nus1_ok = trim($direccion_nus1_ok);
                        // $seg_apell_nus1_ok = trim($seg_apell_nus1_ok);
                        $telefono_nus1_ok = trim($telefono_nus1_ok);
                        $codigo = trim($codigo);
                        
                        if($existe == 1){
                            echo "<center><b><font color=red><center><br><< No se ha podido agregar el usuario, El usuario ya se encuentra registrado como $tipoCliente >> <br><br></center></font>";        
                        }else{

                            
                                $nextval = $db->conn->nextId("sec_bodega_empresas", $driver);
                                if ($nextval == -1) {
                                    die("<span class='etextomenu'>No se encontr&oacute; la secuencia sec_bodega_empresas ");
                                }

                                // Si se ingresa en el documento el valor de 4 ceros genera número aleatorio.
                                if($no_documento1_ok == '0000' or $no_documento1_ok == '0' or $no_documento1_ok == '00' or $no_documento1_ok == '000'){
                                    $no_documento1_ok = '00'.str_pad(rand(1,1500), 7, '0',STR_PAD_LEFT);
                                }

                                $isql = "INSERT INTO bodega_empresas( are_esp_secue, identificador_empresa, nit_de_la_empresa, nombre_de_la_empresa, direccion, 
                                        nombre_rep_legal, sigla_de_la_empresa, telefono_1, ID_CONT, ID_PAIS, codigo_del_departamento, codigo_del_municipio, email) 
                                        values (8, $nextval, '$no_documento1_ok', '$nombre_nus1_ok', '$direccion_nus1_ok', '$seg_apell_nus1_ok', 
                                                        '', '$telefono_nus1_ok',$idcont1, $idpais1, $dpto_tmp, $muni_tmp, '$mail_nus1_ok')";
                                $rs = $db->query($isql);

                                if (!$rs){
                                    die("<span class='titulosError'>No se pudo insertar en bodega_empresas ($isql) ");
                                }else{
                                    $isqlBodega = "select * from bodega_empresas where nit_de_la_empresa='$no_documento1_ok'";
                                    $rsisqlBodega = $db->query($isqlBodega);
                                    $tbusqueda = 1;
                                }
                        }
                    }
                    
                    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
                    if ($agregar == "AGREGAR" and $tagregar == 2) {
                        $no_documento1_ok = trim($no_documento1_ok);
                        // $nombre_nus1_ok = trim($nombre_nus1_ok);
                        $direccion_nus1_ok = trim($direccion_nus1_ok);
                        // $seg_apell_nus1_ok = trim($seg_apell_nus1_ok);
                        $telefono_nus1_ok = trim($telefono_nus1_ok);
                        $codigo = trim($codigo);

                        if($existe == 1){
                            echo "<center><b><font color=red><center><br><< No se ha podido agregar el usuario, El usuario ya se encuentra registrado como $tipoCliente >> <br><br></center></font>";
//                            $isql = "select * from bodega_empresas where nit_de_la_empresa='$no_documento1_ok'";
                        }else{

                            
                                $nextval = $db->conn->nextId("sec_oem_oempresas", $driver);
                                if ($nextval == -1) {
                                    die("<span class='etextomenu'>No se encontr&oacute; la secuencia sec_oem_oempresas ");
                                }

                                // Si se ingresa en el documento el valor de 4 ceros genera número aleatorio.
                                if($no_documento1_ok == '0000' or $no_documento1_ok == '0' or $no_documento1_ok == '00' or $no_documento1_ok == '000'){
                                    $no_documento1_ok = '00'.str_pad(rand(1,1500), 7, '0',STR_PAD_LEFT);
                                }

                                $isql = "INSERT INTO SGD_OEM_OEMPRESAS( tdid_codi, SGD_OEM_CODIGO, SGD_OEM_NIT, SGD_OEM_OEMPRESA, SGD_OEM_DIRECCION, 
                                        SGD_OEM_REP_LEGAL, SGD_OEM_SIGLA, SGD_OEM_TELEFONO, ID_CONT, ID_PAIS, DPTO_CODI, MUNI_CODI, email) 
                                        values (4, $nextval, '$no_documento1_ok', '$nombre_nus1_ok', '$direccion_nus1_ok', '$seg_apell_nus1_ok', 
                                                        '', '$telefono_nus1_ok',$idcont1, $idpais1, $dpto_tmp, $muni_tmp,'$mail_nus1_ok')";
                                $rs = $db->query($isql);

                                if (!$rs){
                                    die("<span class='titulosError'>No se pudo insertar en SGD_OEM_OEMPRESAS ($isql) ");
                                }else{
                                    $isqlOem = "select * from SGD_OEM_OEMPRESAS where SGD_OEM_NIT='$no_documento1_ok'";
                                    $rsisqlOem = $db->query($isqlOem);
                                    $tbusqueda = 2;
                                }
                            
                        }
                    }
                                       
                    /**** Modificación de información segun el tipo de cliente ****/
                    /**/
                    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
                    if ($modificar == "MODIFICAR" and $tagregar == 0) {
                        $no_documento1_ok = trim($no_documento1_ok);
                        if ($no_documento1_ok) {
                            $isql = "select SGD_CIU_CEDULA from SGD_CIU_CIUDADANO WHERE SGD_CIU_CEDULA='$no_documento1_ok' and SGD_CIU_CODIGO <> $codigo";
                            $rs = $db->query($isql);
                            if (!$rs->EOF)
                                $cedula = trim($rs->fields["SGD_CIU_CEDULA"]);
                            $flag == 0;
                        }
//                        echo "--->Doc > $no_documento1_ok <<<<<< $cedula <<<<<< " . $rs->fields["sgd_ciu_cedula"];

                        if ($cedula == $no_documento1_ok and $no_documento1_ok != "" and $no_documento1_ok != 0) {
                            echo "<center><b><font color=red><center><br><< No se ha podido actualizar el usuario, El usuario ya se encuentra >> <br><br></center></font>";
                        } else {
                            $no_documento1_ok = trim($no_documento1_ok);
                            // $prim_apell_nus1_ok = trim($prim_apell_nus1_ok);
                            // $nombre_nus1_ok = trim($nombre_nus1_ok);
                            $direccion_nus1_ok = trim($direccion_nus1_ok);
                            $telefono_nus1_ok = trim($telefono_nus1_ok);
                            $mail_nus1 = trim($mail_nus1);

                            $isql = "update SGD_CIU_CIUDADANO set SGD_CIU_CEDULA='$no_documento1_ok', SGD_CIU_NOMBRE='$nombre_nus1_ok', 
                            SGD_CIU_DIRECCION='$direccion_nus1_ok', SGD_CIU_APELL1='$prim_apell_nus1_ok', SGD_CIU_APELL2='$seg_apell_nus1_ok',
                            SGD_CIU_TELEFONO='$telefono_nus1_ok', SGD_CIU_EMAIL='$mail_nus1_ok', ID_CONT=$idcont1, ID_PAIS=$idpais1, 
                            DPTO_CODI=$dpto_tmp, MUNI_CODI=$muni_tmp where SGD_CIU_CODIGO=$codigo ";
                            $rs = $db->query($isql);
                            if (!$rs) {
                                die("<span class='etextomenu'>No se pudo actualizar SGD_CIU_CIUDADANO ($isql) ");
                            }
                        }
                        $isql = "select * from SGD_CIU_CIUDADANO where SGD_CIU_CEDULA='$no_documento1_ok'";
                        $rs = $db->query($isql);
                    }

                    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
                    if ($modificar == "MODIFICAR" and $tagregar == 2) {
                        $no_documento1_ok = trim($no_documento1_ok);
                        if ($no_documento1_ok) {
                            $isql = "select SGD_OEM_NIT from SGD_OEM_OEMPRESAS WHERE SGD_OEM_NIT='$no_documento1_ok' and SGD_OEM_CODIGO <> $codigo";
                            $rs = $db->query($isql);
                            if (!$rs->EOF)
                                $cedula = trim($rs->fields["SGD_OEM_NIT"]);
                            $flag == 0;
                        }
                        if ($cedula == $no_documento1_ok and $no_documento1_ok != "" and $no_documento1_ok != 0) {
                            echo "<center><b><font color=red><center><br><br><< No se ha podido actualizar el usuario, El usuario ya se encuentra >> <br><br></center></font>";
                        } else {
                            // $nombre_nus1_ok = trim($nombre_nus1_ok);
                            $direccion_nus1_ok = trim($direccion_nus1_ok);
                            // $seg_apell_nus1_ok = trim($seg_apell_nus1_ok);
                            $telefono_nus1_ok = trim($telefono_nus1_ok);
                            $codigo = trim($codigo);
                            $isql = "UPDATE SGD_OEM_OEMPRESAS SET SGD_OEM_NIT='$no_documento1_ok', SGD_OEM_OEMPRESA='$nombre_nus1_ok', 
                SGD_OEM_DIRECCION='$direccion_nus1_ok', SGD_OEM_REP_LEGAL='$seg_apell_nus1_ok',
                SGD_OEM_TELEFONO='$telefono_nus1_ok', email='$mail_nus1_ok', ID_CONT=$idcont1, ID_PAIS= $idpais1, DPTO_CODI=$dpto_tmp, 
                MUNI_CODI=$muni_tmp where SGD_OEM_CODIGO='$codigo'";
                            $rs = $db->query($isql);

                            if (!$rs) {
                                $db->conn->RollbackTrans();
                            }
                        }
                        $isql = "select * from SGD_CIU_CIUDADANO where SGD_CIU_CEDULA='$no_documento1_ok'";
                        $rs = $db->query($isql);
                    }
                    
                    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
                    if ($modificar == "MODIFICAR" and $tagregar == 1) {
                        $no_documento1_ok = trim($no_documento1_ok);
                        if ($no_documento1_ok) {
                            $isql = "select NIT_DE_LA_EMPRESA from BODEGA_EMPRESAS WHERE NIT_DE_LA_EMPRESA='$no_documento1_ok' and identificador_empresa <> $codigo";
                            $rs = $db->query($isql);
                            if (!$rs->EOF)
                                $cedula = trim($rs->fields["NIT_DE_LA_EMPRESA"]);
                            $flag == 0;
                        }
                        if ($cedula == $no_documento1_ok and $no_documento1_ok != "" and $no_documento1_ok != 0) {
                            echo "<center><b><font color=red><center><br><br><< No se ha podido actualizar el usuario, El usuario ya se encuentra >> <br><br></center></font>";
                        } else {
                            // $nombre_nus1_ok = trim($nombre_nus1_ok);
                            $direccion_nus1_ok = trim($direccion_nus1_ok);
                            // $seg_apell_nus1_ok = trim($seg_apell_nus1_ok);
                            $telefono_nus1_ok = trim($telefono_nus1_ok);
                            $codigo = trim($codigo);
                            $isql = "UPDATE BODEGA_EMPRESAS SET NIT_DE_LA_EMPRESA='$no_documento1_ok', nombre_de_la_empresa='$nombre_nus1_ok', 
                direccion='$direccion_nus1_ok', nombre_rep_legal='$seg_apell_nus1_ok',
                telefono_1='$telefono_nus1_ok', email='$mail_nus1_ok', ID_CONT=$idcont1, ID_PAIS= $idpais1, codigo_del_departamento=$dpto_tmp, 
                codigo_del_municipio=$muni_tmp where identificador_empresa='$codigo'";
                            $rs = $db->query($isql);

                            if (!$rs) {
                                $db->conn->RollbackTrans();
                            }
                        }
                        $isql = "select * from BODEGA_EMPRESAS where NIT_DE_LA_EMPRESA='$no_documento1_ok'";
                        $rs = $db->query($isql);
                    }

                    $db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
                    if ($no_documento or $nombre_essp) {

                        if ($tbusqueda == 0 or $tbusqueda == 8 and $existe == 0) {
                            $isql = "select SGD_CIU_CEDULA, "
                                        . "SGD_CIU_NOMBRE, "
                                        . "SGD_CIU_APELL1, "
                                        . "SGD_CIU_CODIGO, "
                                        . "SGD_CIU_DIRECCION, "
                                        . "SGD_CIU_TELEFONO, "
                                        . "SGD_CIU_APELL2, "
                                        . "SGD_CIU_EMAIL, "
                                        . "DPTO_CODI, "
                                        . "MUNI_CODI, "
                                        . "ID_PAIS, "
                                        . "ID_CONT, "
                                        . "'0' as TABLA "
                                    . "from SGD_CIU_CIUDADANO ";
                            if ($nombre_essp) {
                                
                                $sqlConact = $db->conn->Concat("sgd_ciu_nombre", "sgd_ciu_apell1", "sgd_ciu_apell2");

                                $strtoupper = ' or '.$sqlConact . " LIKE '%" .strtoupper($nombre_essp). "%' ";
                                $strtolower = ' or '.$sqlConact . " LIKE '%" .strtolower($nombre_essp). "%' ";
                                $ucwords = ' or '.$sqlConact . " LIKE '%" .ucwords($nombre_essp). "%' ";

                                $where_split = $sqlConact . " ILIKE '%" .$nombre_essp. "%' ".$strtoupper.' '.$strtolower.' '.$ucwords;

                                $isql .= " where $where_split ";
                            }
                            if ($no_documento) {
                                $no_documento = trim($no_documento);
                                if ($nombre_essp)
                                    $isql .= " and ";
                                else
                                    $isql .= " where ";
                                $isql .= " SGD_CIU_CEDULA like '%$no_documento%' ";
                            }
                            
                            $isql0 = $isql;
                            $isql .= " order by sgd_ciu_nombre,sgd_ciu_apell1,sgd_ciu_apell2 ";
                        }

                        // Busqueda por empresas o todos
                        // 8 = Todos, 2 = Persona Juridica (sgd_oem_oempresas)
                        if ($tbusqueda == 2 or $tbusqueda == 8 and $existe == 0) {
                            $isql = "select SGD_OEM_NIT AS SGD_CIU_CEDULA, "
                                        . "SGD_OEM_OEMPRESA as SGD_CIU_NOMBRE, "
                                        . "SGD_OEM_SIGLA AS SGD_CIU_APELL1, "
                                        . "SGD_OEM_CODIGO AS SGD_CIU_CODIGO, "
                                        . "SGD_OEM_DIRECCION as SGD_CIU_DIRECCION, "
                                        . "SGD_OEM_TELEFONO AS SGD_CIU_TELEFONO, "
                                        . "SGD_OEM_REP_LEGAL as SGD_CIU_APELL2, "
                                        . "EMAIL as SGD_CIU_EMAIL, "
                                        . "DPTO_CODI, "
                                        . "MUNI_CODI, "
                                        . "ID_PAIS, "
                                        . "ID_CONT, "                                    
                                        . "'2' as TABLA "
                                    . "from SGD_OEM_OEMPRESAS";
                            
                            if ($nombre_essp && !$no_documento) {
                                
                                $strtoupper = " or sgd_oem_oempresa LIKE '%" .strtoupper($nombre_essp). "%' ";
                                $strtolower = " or sgd_oem_oempresa LIKE '%" .strtolower($nombre_essp). "%' ";
                                $ucwords = " or sgd_oem_oempresa LIKE '%" .ucwords($nombre_essp). "%' ";
                            
                                $where_split = "sgd_oem_oempresa LIKE '%" .$nombre_essp. "%' ".$strtoupper.' '.$strtolower.' '.$ucwords;
                                $isql .= " where $where_split ";

                            } elseif ($no_documento && !$nombre_essp) {
                                
                                $no_documento = trim($no_documento);                                
                                $isql .= " where SGD_OEM_NIT like '%$no_documento%' ";
                                
                            }elseif($nombre_essp && $no_documento){
                                
                                $strtoupper = " or sgd_oem_oempresa LIKE '%" .strtoupper($nombre_essp). "%' ";
                                $strtolower = " or sgd_oem_oempresa LIKE '%" .strtolower($nombre_essp). "%' ";
                                $ucwords = " or sgd_oem_oempresa LIKE '%" .ucwords($nombre_essp). "%' ";
                                
                                $where_split = " (sgd_oem_oempresa LIKE '%" .$nombre_essp. "%' ".$strtoupper." ".$strtolower." ".$ucwords. ") and SGD_OEM_NIT like '%" .$no_documento. "%' ";
                                $isql .= " where $where_split ";
                                 
                            }
                            
                            $isql2 = $isql;
                            $isql .= " order by sgd_oem_oempresa";
                        }

                        // busqueda por terceros(f.f.m.m) o todos
                        if ($tbusqueda == 1 or $tbusqueda == 8 and $existe == 0) {
                            $isql = "select NIT_DE_LA_EMPRESA AS SGD_CIU_CEDULA, "
                                        . "NOMBRE_DE_LA_EMPRESA as SGD_CIU_NOMBRE, "
                                        . "SIGLA_DE_LA_EMPRESA as SGD_CIU_APELL1, "
                                        . "IDENTIFICADOR_EMPRESA AS SGD_CIU_CODIGO, "
                                        . "DIRECCION as SGD_CIU_DIRECCION, "
                                        . "TELEFONO_1 AS SGD_CIU_TELEFONO, "
                                        . "NOMBRE_REP_LEGAL as SGD_CIU_APELL2, "
                                        . "EMAIL as SGD_CIU_EMAIL, "
                                        . "cast(CODIGO_DEL_DEPARTAMENTO as numeric) as DPTO_CODI, "
                                        . "cast(CODIGO_DEL_MUNICIPIO as numeric) as MUNI_CODI, "
                                        . "ID_PAIS, ID_CONT, "
                                        . "'1' as TABLA "
                                    . "from BODEGA_EMPRESAS ";
                            
                            if ($nombre_essp && !$no_documento) {
                                
                                $strtoupper = " or nombre_de_la_empresa LIKE '%" .strtoupper($nombre_essp). "%' ";
                                $strtolower = " or nombre_de_la_empresa LIKE '%" .strtolower($nombre_essp). "%' ";
                                $ucwords = " or nombre_de_la_empresa LIKE '%" .ucwords($nombre_essp). "%' ";
                            
                                $where_split = "nombre_de_la_empresa LIKE '%" .$nombre_essp. "%' ".$strtoupper.' '.$strtolower.' '.$ucwords;
                                $isql .= " where $where_split ";

                            } elseif ($no_documento && !$nombre_essp) {
                                
                                $no_documento = trim($no_documento);                                
                                $isql .= " where nit_de_la_empresa like '%$no_documento%' ";
                                
                            }elseif($nombre_essp && $no_documento){
                                
                                $strtoupper = " or nombre_de_la_empresa LIKE '%" .strtoupper($nombre_essp). "%' ";
                                $strtolower = " or nombre_de_la_empresa LIKE '%" .strtolower($nombre_essp). "%' ";
                                $ucwords = " or nombre_de_la_empresa LIKE '%" .ucwords($nombre_essp). "%' ";
                                
                                $where_split = " (nombre_de_la_empresa LIKE '%" .$nombre_essp. "%' ".$strtoupper." ".$strtolower." ".$ucwords. ") and nit_de_la_empresa like '%" .$no_documento. "%' ";
                                $isql .= " where $where_split ";
                                 
                            }
                            
                            $isql1 = $isql;
                            $isql .= " order by NOMBRE_DE_LA_EMPRESA";
                            
                        }

                        // busqueda por funcionario o todos
                        // 8 = Todos, 2 = Funcionarios
                        if ($tbusqueda == 6 or $tbusqueda == 8 and $existe == 0) {
                            $array_nombre = preg_split(" ", $nombre_essp . "    ");
                            $isql = "select usua_doc AS SGD_CIU_CEDULA, "
                                        . "usua_nomb as SGD_CIU_NOMBRE, "
                                        . "'' as SGD_CIU_APELL1, "
                                        . "cast(USUA_DOC as numeric) AS SGD_CIU_CODIGO, "
                                        . "dependencia.depe_nomb as SGD_CIU_DIRECCION, "
                                        . "'' AS SGD_CIU_TELEFONO, "
                                        . "USUARIO.USUA_LOGIN as SGD_CIU_APELL2, "
                                        . "USUARIO.usua_email as SGD_CIU_EMAIL, "
                                        . "dependencia.DPTO_CODI as DPTO_CODI, "
                                        . "dependencia.MUNI_CODI as MUNI_CODI, "
                                        . "dependencia.ID_PAIS, "
                                        . "dependencia.ID_CONT, "
                                        . "'6' as TABLA "
                                    . "from USUARIO, dependencia "
                                    . "where USUA_ESTA='1' AND USUARIO.depe_codi = dependencia.depe_codi";
                            if ($nombre_essp) {
                                if ($array_nombre[0]) {
                                    $where_split = "  UPPER(USUA_NOMB) LIKE '%" . $array_nombre[0] . "%' ";
                                }
                                if ($array_nombre[1]) {
                                    $where_split .= " AND UPPER(USUA_NOMB) LIKE '%" . $array_nombre[1] . "%' ";
                                }
                                if ($array_nombre[2]) {
                                    $where_split .= " AND UPPER(USUA_NOMB) LIKE '%" . $array_nombre[2] . "%' ";
                                }
                                if ($array_nombre[3]) {
                                    $where_split .= " AND UPPER(USUA_NOMB) LIKE '%" . $array_nombre[3] . "%' ";
                                }
                                $isql .= " and $where_split ";
                            }
                            if ($no_documento) {
                                if ($nombre_eesp)
                                    $isql .= " and ";
                                else
                                    $isql .= " and ";
                                $isql .= " usua_doc='$no_documento' ";
                            }

                            //$isql .= " order by usua_nomb ";
                            $isql6 = $isql;
                            //echo 'consulta funcionarios --- '.$isql;
                        }

                        if ($tbusqueda == 8) {
                            $isql = $isql0 . "  UNION " . $isql1 . "  UNION " . $isql2/*. "  UNION " . $isql6 */;
                        }

                        $rs = $db->query($isql);
                        
                        //echo $isql; 

                        $tipo_emp = $tbusqueda;
                        if ($rs && !$rs->EOF) { //echo $isql;                           
                            $i = 1;
                            while (!$rs->EOF) {
                                $grilla = ($grilla == "listado2") ? "listado1" : "listado2";
                                ?>
                                <tr class='<?= $grilla ?>'> 
                                    <TD> 
                                        <input type="hidden" name="muni_us<?= $i ?>" id="muni_us<?= $i ?>" value="<?= $rs->fields["ID_PAIS"] . "-" . $rs->fields["DPTO_CODI"] . "-" . $rs->fields["MUNI_CODI"] ?>" >
                                        <input type="hidden" name="codep_us<?= $i ?>" id="codep_us<?= $i ?>" value="<?= $rs->fields["ID_PAIS"] . "-" . $rs->fields["DPTO_CODI"]; ?>" >
                                        <input type="hidden" name="idpais<?= $i ?>" id="idpais<?= $i ?>" value="<?= $rs->fields["ID_PAIS"] ?>" >
                                        <input type="hidden" name="idcont<?= $i ?>" id="idcont<?= $i ?>" value="<?= $rs->fields["ID_CONT"] ?>" >
                                        <!-- Datos correspondientes a la fila seleccionada -->
                                        <font size="-3"><?= $rs->fields["SGD_CIU_CEDULA"] ?></font>
                                        <input type="hidden" name="tipo_emp_us<?= $i ?>" id="tipo_emp_us<?= $i ?>" value="<?= $rs->fields['TABLA'] ?>">
                                        <input type="hidden" name="documento_us<?= $i ?>" id="documento_us<?= $i ?>" size="3" value="<?= trim($rs->fields["SGD_CIU_CODIGO"]) ?>" >
                                        <input type="hidden" name="cc_documento_us<?= $i ?>" id="cc_documento_us<?= $i ?>" value="<?= $rs->fields["SGD_CIU_CEDULA"] ?>" readonly size="14" class="ecajasfecha">
                                    </TD>
                                    <TD> 
                                        <font size="-3"> <?= substr($rs->fields["SGD_CIU_NOMBRE"], 0, 120) ?></font>
                                        <input type="hidden" name="nombre_us<?= $i ?>" id="nombre_us<?= $i ?>" value="<?= substr($rs->fields["SGD_CIU_NOMBRE"], 0, 120) ?>" readonly class="ecajasfecha" size="14">
                                    </TD>
                                    <TD> 
                                        <font size="-3"> <?= substr($rs->fields["SGD_CIU_APELL1"], 0, 70) . $rs->fields["SGD_CIU_APELL2"] ?> </font>
                                        <input type="hidden" name="seg_apell_us<?= $i ?>" id="seg_apell_us<?= $i ?>" value="<?= substr($rs->fields["SGD_CIU_APELL1"], 0, 70) . $rs->fields["SGD_CIU_APELL2"] ?>" readonly class="ecajasfecha" size="14">
                                    </TD>
                                    <TD>
                                        <font size="-3"> <?= $rs->fields["SGD_CIU_DIRECCION"] ?></font>
                                        <input type="hidden" name="direccion_us<?= $i ?>" id="direccion_us<?= $i ?>" value="<?= $rs->fields["SGD_CIU_DIRECCION"] ?>" readonly class="ecajasfecha" size="14">
                                    </TD>
                                    <TD>
                                        <font size="-3"> <?= $rs->fields["SGD_CIU_TELEFONO"] ?> </font>
                                        <input type="hidden" name="telefono_us<?= $i ?>" id="telefono_us<?= $i ?>" value="<?= $rs->fields["SGD_CIU_TELEFONO"] ?>" readonly class="ecajasfecha" size="10">
                                    </TD>
                                    <TD> 
                                        <font size="-3"> <?= $rs->fields["SGD_CIU_EMAIL"] ?></font>
                                        <input type="hidden" name="mail_us<?= $i ?>" id="mail_us<?= $i ?>" value="<?= $rs->fields["SGD_CIU_EMAIL"] ?>" readonly class="ecajasfecha" size="14">
                                    </TD>
                                    <TD width="6%" align="center" valign="top">
                                        <font size="-3"><a href="#btnpasar" onClick="pasar_datos(<?= $i ?>);">Pasar al Formulario</a></font> |
                                        <!-- SI el usuario buscado es funcionario no se muestra la opción de actualizar-->
                                        <?php if($rs->fields["TABLA"] != 6){  ?>
                                        <font size="-3"><a href="#btnpasardatos" onClick="pasarInfoactu(<?= $i ?>);">Actualizar</a></font>
                                        <?php }?>
                                    </TD>
                                </tr>

                                                                                                                        <!--<script>-->
                                <?php
                                $cc_documento = trim($rs->fields["SGD_CIU_CODIGO"]) . " ";
                                $email = str_replace('"', ' ', $rs->fields["SGD_CIU_EMAIL"]) . " ";
                                $telefono = str_replace('"', ' ', $rs->fields["SGD_CIU_TELEFONO"]) . " ";
                                $direccion = str_replace('"', ' ', $rs->fields["SGD_CIU_DIRECCION"]) . " ";
                                $apell2 = str_replace('"', ' ', $rs->fields["SGD_CIU_APELL2"]) . " ";
                                $apell1 = str_replace('"', ' ', $rs->fields["SGD_CIU_APELL1"]) . " ";
                                $nombre = str_replace('"', ' ', $rs->fields["SGD_CIU_NOMBRE"]) . " ";
                                $codigo = trim($rs->fields["SGD_CIU_CODIGO"]);
                                $codigo_cont = $rs->fields["ID_CONT"];
                                $codigo_pais = $rs->fields["ID_PAIS"];
                                $codigo_dpto = $codigo_pais . "-" . $rs->fields["DPTO_CODI"];
                                $codigo_muni = $codigo_dpto . "-" . $rs->fields["MUNI_CODI"];
                                $cc_documento = trim($rs->fields["SGD_CIU_CEDULA"]);

                                $i++;
                                $rs->MoveNext();
                            }
//                            echo '<input type="text" name="totalregistros" id="totalregistros" value="' . $i . '" > ';
                        } else {
                            echo "<span class='titulosError'><br><< No se encontraron Registros >> $no_documento<br><br></span>";
                        }
                    }
                    ?>
                </table>
                <br>
                <div id="titulo" style="width: 95%;" align="center">Informaci&oacute;n de ingreso nuevo</div>
                <table class=borde_tab border='1' width="95%" cellpadding="0" cellspacing="4" id="nuevoingreso">
                    <tr class="<?= $grilla ?>">
                        <td colspan="7">
                            <b>Seleccionar tipo de remitente: </b> <select name="tagregar" id="tagregar" onchange="tipocliente();" class="select form-control" style="width: 98%">
                                <option value='seleccione'><< Seleccione >></option>
                                <option value='1' <?= isset($tipo_emp_us) && $tipo_emp_us == 1 ? 'selected': '' ?>>Persona Natural</option>
<!--                            // Para apartado se quita la opción de poder registrar en ciu_ciudadano debido a que no se ingresa
                                // usuario de logeo desde orfeo.-->
                                <!--<option value='0' <?= isset($tipo_emp_us1) && $tipo_emp_us == 0 ? 'selected': '' ?>>Persona Natural</option>-->
                                <option value='2' <?= isset($tipo_emp_us) && $tipo_emp_us == 2 ? 'selected': '' ?>>Persona Juridica</option>
                            </select> 
                        </td>
                    </tr>
                    <tr align="center" class='titulos3' > 
                        <td id="labeltipoclientedocumento">Documento / Nit <font color="#ffffff">*</font></td>
                        <td id="labeltipoclientenombre">Nombre <font color="#ffffff">*</font></td>
                        <td id="labelcliente" class="labelcliente">Primer Apellido / Representante Legal <font color="#ffffff">*</font></td>
                        <td>Direcci&oacute;n <font color="#ffffff">*</font></td>
                        <td id="labelclientetelefono" class="labelclientetelefono">Tel&eacute;fono</td>
                        <td id="labelclientecorreo" class="labelclientecorreo">Email</td>
                    </tr>                    
                    <tr class='<?= $grilla ?>' align="center"> 
                        <TD>
                            <input type="hidden" name="tipo_emp_us1_ok" class="e_cajas" size="3" value='' >
                            <input type="hidden" name="codigo" class="e_cajas" size="3" value='' >
                            <input type="text" name="no_documento1_ok" value="" onkeypress="return isTextKey3(event)" size="13" class="ecajasfecha">
                        </TD>
                        <TD><input type="text" name="nombre_nus1_ok" value=""class="ecajasfecha" size=15 ></TD>
                        <TD class="labelcliente"><input type="text" name="seg_apell_nus1_ok" value="" class="ecajasfecha" size="14" ></TD>
                        <TD><input type="text" name="direccion_nus1_ok" value=""class="ecajasfecha" size="15"></TD>
                        <TD class="labelclientetelefono"><input type="text" name="telefono_nus1_ok" value="" class="ecajasfecha" size="10" onkeypress="return isTextKey3(event)"></TD>
                        <TD class="labelclientecorreo"><input type="text" name="mail_nus1_ok" id="mail_nus1_ok" value="" class="ecajasfecha" size=16></TD>
                    </tr>
                    <tr align="center" class='titulos3' > 
                        <td>Continente</font><font color="#ffffff">*</font></td>
                        <td>Pa&iacute;s</font><font color="#ffffff">*</font></td>
                        <td>Dpto / Estado</font><font color="#ffffff">*</font></td>
                        <td>Municipio</font><font color="#ffffff">*</font></td>
                        <td colspan="4" rowspan="2" >
                            <input type='SUBMIT' name='agregar' id='agregar' value='AGREGAR' class="botones" onclick="return verif_data();">
                            <input type='SUBMIT' name='modificar' id='modificar' value='MODIFICAR' class="botones" disabled="" onclick="return verif_data();">
                        </td>
                    </tr>
                    <tr class='<?= $grilla ?>' align="center"> 
                        <TD>
                            <?php
                            $i = 1;
                            echo $Rs_Cont->GetMenu2("idcont_ok_$i", substr($_SESSION['cod_local'], 0, 1) * 1, "$0:&lt;&lt; seleccione &gt;&gt;", false, 0, " CLASS=\"select form-control\" id=\"idcont$i\" onchange=\"cambia(this.form, 'idpais_ok_$i', 'idcont_ok_$i')\" ");
//                            echo $Rs_Cont->GetMenu2("idcont_ok_$i", substr($_SESSION['cod_local'], 0, 1) * 1, "$0:&lt;&lt; seleccione &gt;&gt;", false, 0, " CLASS=\"select form-control\" id=\"idcont$i\" onchange=\"alert(this.form, 'idpais_ok_$i', 'idcont_ok_$i')\" ");
                            $Rs_Cont->Move(0);
                            ?>
                        </TD>
                        <TD>
                            <?php
                            if ($_SESSION['cod_local'])
                                $paiscodi = substr($_SESSION['cod_local'], 2, 3) * 1;
                            echo "<SELECT NAME=\"idpais_ok_$i\" ID=\"idpais_ok_$i\" TITLE=\"Lista desplegable con paises, cambia automaticamente una vez el nombre o suscriptor es consultado\" CLASS=\"select form-control\" onchange=\"cambia(this.form, 'codep_us_ok_$i', 'idpais_ok_$i')\">";
                            while (!$Rs_pais->EOF) {
                                if ($_SESSION['cod_local'] and ( $Rs_pais->fields['ID0'] == substr($_SESSION['cod_local'], 0, 1) * 1)) {//Si hay local Y pais pertenece al continente.
                                    ($paiscodi == $Rs_pais->fields['ID1']) ? $s = " selected='selected'" : $s = "";
                                    echo "<option" . $s . " value='" . $Rs_pais->fields['ID1'] . "'>" . $Rs_pais->fields['NOMBRE'] . "</option>";
                                }
                                $Rs_pais->MoveNext();
                            }
                            echo "</SELECT>";
                            $Rs_pais->Move(0);
                            ?>
                        </TD>
                        <TD>
                            <?php
                            echo "<SELECT NAME=\"codep_us_ok_$i\" ID=\"codep_us_ok_$i\" CLASS=\"select form-control\" TITLE=\"Lista desplegable con departamentos, cambia automaticamente una vez el nombre o el suscriptor es consultado\" onchange=\"cambia(this.form, 'muni_us_ok_$i', 'codep_us_ok_$i')\">";
                            while (!$Rs_dpto->EOF) {
                                if ($_SESSION['cod_local'] and ( $Rs_dpto->fields['ID0'] == substr($_SESSION['cod_local'], 2, 3) * 1)) { //Si hay local Y dpto pertenece al pais.
                                    ((substr($_SESSION['cod_local'], 2, 3) * 1) . "-" . (substr($_SESSION['cod_local'], 6, 3) * 1) == $Rs_dpto->fields['ID1']) ? $s = " selected='selected'" : $s = "";
                                    echo "<option" . $s . " value='" . $Rs_dpto->fields['ID1'] . "'>" . $Rs_dpto->fields['NOMBRE'] . "</option>";
                                }
                                $Rs_dpto->MoveNext();
                            }
                            echo "</SELECT>";
                            $Rs_dpto->Move(0);
                            ?>
                        </TD>
                        <TD>
                            <?php
                            echo "<SELECT NAME=\"muni_us_ok_$i\" ID=\"muni_us_ok_$i\" TITLE=\"Lista desplegable con municipios, cambia automaticamente una vez el nombre o el suscriptor es consultado\" CLASS=\"select form-control\">";
                            while (!$Rs_mcpo->EOF) {
                                if ($_SESSION['cod_local'] and ( $Rs_mcpo->fields['ID'] == substr($_SESSION['cod_local'], 2, 3) * 1) and ( $Rs_mcpo->fields['ID0'] == substr($_SESSION['cod_local'], 6, 3) * 1)) { //Si hay local Y mcpio pertenece al pais Y dpto.
                                    ((substr($_SESSION['cod_local'], 2, 3) * 1) . "-" . (substr($_SESSION['cod_local'], 6, 3) * 1) . "-" . (substr($_SESSION['cod_local'], 10, 3) * 1) == $Rs_mcpo->fields['ID1']) ? $s = " selected='selected'" : $s = "";
                                    echo "<option" . $s . " value='" . $Rs_mcpo->fields['ID1'] . "'>" . $Rs_mcpo->fields['NOMBRE'] . "</option>";
                                }
                                $Rs_mcpo->MoveNext();
                            }
                            echo "</SELECT>";
                            $Rs_mcpo->Move(0);
                            ?> 
                        </td>
                    </tr>
                </table>
                <BR>
                <center>
                    <?php
                    if ($envio_salida) {
                        ?>
                        <input type=submit name=grb_destino value='Grabar el Destino de Este Radicado' class="botones_largo">
                        <input type=hidden name=verrad_sal value='<?= $verrad_sal ?>' >
                        <?php
                    } else {
                        ?>
    <!--                        <B><A href="javascript:pasar_datos('<?= $fechah ?>');" name="btnpasar"><span name=btnpasardatos id=btnpasardatos class="botones_largo">&nbsp;PASAR DATOS AL FORMULARIO DE RADICACIÓN &nbsp;</span></a></B>
                        <input type=hidden name=verrad_sal value='<?= $verrad_sal ?>' >-->
                        <?php
                    }
                    ?> 
                    <BR>

                    <?php
                    if (!$formulario) {
                        ?>
                        </form>
                        <?php
                    }
                    ?>
                    <input type='button' value='Cerrar' class="botones_largo" onclick='window.close()'></center>
                </body>
                </html>
