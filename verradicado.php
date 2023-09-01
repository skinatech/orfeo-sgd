<?php

/*---------------------------------------------------------+
|                    DEFINICIONES                          |
+---------------------------------------------------------*/
session_start();
error_reporting(7);
$url_raiz = $_SESSION['url_raiz'];
$dir_raiz = $_SESSION['dir_raiz'];
$assoc = $_SESSION['assoc'];
define('ADODB_ASSOC_CASE', $assoc);

/*---------------------------------------------------------+
|                       MAIN                               |
+---------------------------------------------------------*/

foreach ($_GET as $key => $valor) { ${$key} = $valor; }
foreach ($_POST as $key => $valor) { ${$key} = $valor; }

$imagenes = $_SESSION["imagenes"];
$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tip3desc = $_SESSION["tip3desc"];
$tip3img = $_SESSION["tip3img"];
$tpNumRad = $_SESSION["tpNumRad"];
$tpPerRad = $_SESSION["tpPerRad"];
$tpDescRad = $_SESSION["tpDescRad"];
$tip3Nombre = $_SESSION["tip3Nombre"];
$tpDepeRad = $_SESSION["tpDepeRad"];
$usuaPermExpediente = $_SESSION["usuaPermExpediente"];
$estructuraRad = $_SESSION['estructuraRad'];
$nomcarpeta = $_GET["nomcarpeta"];
$verradicado = $_GET['verrad'];
//Solo se usa cuando se quiere mostrar un anexo desde el listado de busquedaOCR
$rutaAnexo = $_GET['rutaAnexo'];

if (!isset($ent)) { $ent = substr($verradicado, -1); }
if (!$carpeta) { $carpeta = $carpetaOld;}
if (!isset($menu_ver_tmpOld)) { $menu_ver_tmpOld = ""; }
if (!isset($menu_ver_tmp)) { $menu_ver_tmp = $menu_ver_tmpOld; }
if (!$menu_ver) { $menu_ver = $menu_ver_Old; }
if (!$menu_ver) { $menu_ver = 3; }
if ($menu_ver_tmp) { $menu_ver = $menu_ver_tmp; }

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "." . DIRECTORY_SEPARATOR . "config.php";
include "./include/db/ConnectionHandler.php";
if ($verradicado) { $verrad = $verradicado;}
if (!$ruta_raiz) { $ruta_raiz = "."; }

$numrad = $verrad;
$db = new ConnectionHandler(".");
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

//$db->conn->debug = true;
if ($carpeta == 8) {
    $info = 8;
    $nombcarpeta = "Informados";
}

$ruta_raiz = ".";
include_once "$ruta_raiz/class_control/Radicado.php";
$objRadicado = new Radicado($db);
$objRadicado->radicado_codigo($verradicado);
$path = $objRadicado->getRadi_path();

$tiposDocumentos = array();
$consultaTipo = "select cod_tp_tpdcumento from rol_tipos_doc where cod_rol=" . $_SESSION['rol'];
$resultTipo = $db->conn->execute($consultaTipo)->getRows();
if (count($resultTipo) == 0) {
    reportarErrores("Error de permisos: No se detectaron tipos de documentos habilitados para este usuario");
}
/* Formateo los id's de los tipos documentales como arreglo que servirá de filtro
 * para las busquedas que realiza sphinx
 */
foreach ($resultTipo as $tipoDoc) {
    $tiposDocumentos[] = $tipoDoc['COD_TP_TPDCUMENTO'];
}
if (!in_array($objRadicado->tdoc_codi, $tiposDocumentos)) {
    $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/" . basename(__DIR__) . "/paginaError.php";
    $url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    $detalleTipoDoc = $db->conn
        ->execute("select sgd_tpr_descrip from sgd_tpr_tpdcumento where SGD_TPR_CODIGO=" . $objRadicado->tdoc_codi)
        ->fetchRow();
    $data = base64_encode("Usted no tiene acceso al tipo documental  \"" . $detalleTipoDoc['SGD_TPR_DESCRIP'] . "\". Comuníquese con el administrador.");
    header("Location: $url?data=$data");
}

/** verificacion si el radicado se encuentra en el usuario Actual */
include "$ruta_raiz/tx/verifSession.php";
?>
<html>
    <head>
        <title>.: Modulo total :.</title>
        <link href="<?=$ruta_raiz . $ESTILOS_PATH2?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?=$ruta_raiz . $_SESSION['ESTILOS_PATH_ORFEO']?>">

        <!-- seleccionar todos los checkboxes-->
        <script language="JavaScript">
            //Menu inferior visible
            var visible = true;
            anexosSeleccionados = [];
            radicadosSeleccionados = [];

            window.onload = function () {   }

            function datosBasicos(){
                window.location='radicacion/NEW.PHP?<?=session_name() . "=" . session_id()?>&<?="nurad=$verrad&fechah=$fechah&ent=$ent&Buscar=Buscar Radicado&carpeta=$carpeta&nomcarpeta=$nomcarpeta";?>';
            }

            function mostrar(nombreCapa){
                document.getElementById(nombreCapa).style.display="";
            }

            function ocultar(nombreCapa){
            document.getElementById(nombreCapa).style.display='none';
            }

            var contadorVentanas=0
            <?php
            if($verradPermisos == "Full" or $datoVer=="985"){
                if($datoVer=="985"){
                ?>
                    function  window_onload(){
                        <?php
                        if ($verradPermisos == "Full" or $datoVer == "985") {
                            ?>
                            window_onload2();
                            <?php
                        }
                        ?>
                    }
                <?php
                }

                include "js/pestanas.js";
            }
            else{}
            ?>

            function window_onload2(){
                <?php
                if ($menu_ver==3){
                    echo "ocultar_mod(); ";
                    if ($ver_causal) {echo "ver_causales();"; }
                    if ($ver_tema) {echo "ver_temas();"; }
                    if ($ver_sectores) {echo "ver_sector();"; }
                    if ($ver_flujo) {echo "ver_flujo();"; }
                    //if ($ver_subtipo) {echo "verSubtipoDocto();"; }
                    if ($ver_VinAnexo) {echo "verVinculoDocto();"; }
                }
                ?>
            }

            function verNotificacion() {
              mostrar("mod_notificacion");
              ocultar("tb_general");
              ocultar("mod_causales");
              ocultar("mod_temas");
              ocultar("mod_sector");
              ocultar("mod_flujo");
            }

            function ver_datos(){
              mostrar("tb_general");
              ocultar("mod_causales");
              ocultar("mod_temas");
              ocultar("mod_sector");
              ocultar("mod_flujo");
            }

            function ocultar_mod(){
              ocultar("mod_causales");
              ocultar("mod_temas");
              ocultar("mod_sector");
              ocultar("mod_flujo");
            }

            function ver_tipodocumental(){
                <?php
                if($menu_ver_tmp!=2){
                    ?>
                    ocultar("tb_general");
                    ocultar("mod_causales");
                    ocultar("mod_temas");
                    ocultar("mod_flujo");
                    <?php
                } ?>
            }

            function ver_tipodocumento(){
              ocultar("tb_general");
              ocultar("mod_causales");
              ocultar("mod_temas");
              ocultar("mod_flujo");
            }

            function verDecision(){
              ocultar("tb_general");
              ocultar("mod_causales");
              ocultar("mod_temas");
              ocultar("mod_flujo");
            }

            function ver_tipodocuTRD(codserie,tsub){
                <?php
                $isqlDepR = "SELECT RADI_DEPE_ACTU, RADI_USUA_ACTU, TDOC_CODI from radicado WHERE RADI_NUME_RADI = '$numrad'";
                $rsDepR = $db->conn->Execute($isqlDepR);
                $coddepe = $rsDepR->fields['RADI_DEPE_ACTU'];
                $codusua = $rsDepR->fields['RADI_USUA_ACTU'];
                $tipodocu = $rsDepR->fields['TDOC_CODI'];
                $ind_ProcAnex = "N";
                ?>
                window.open("./radicacion/tipificar_documento.php?nurad=<?=$verrad?>&ind_ProcAnex=<?=$ind_ProcAnex?>&codusua=<?=$codusua?>&coddepe=<?=$coddepe?>&codusuario=<?=$codusuario?>&dependencia=<?=$dependencia?>&tdoc=<?=$tipodocu?>&tsub="+tsub+"&codserie="+codserie,"Tipificacion_Documento","height=500,width=750,scrollbars=yes");
            }

            function ver_notificacionR(tNotNotifica,tNotNotificado,tNotObserva,tFechNot,tipoNotific){
                <?php
                $isqlDepR = "SELECT RADI_DEPE_ACTU,RADI_USUA_ACTU from radicado WHERE RADI_NUME_RADI = '$numrad'";
                $rsDepR = $db->conn->Execute($isqlDepR);
                $coddepe = $rsDepR->fields['RADI_DEPE_ACTU'];
                $codusua = $rsDepR->fields['RADI_USUA_ACTU'];
                $ind_ProcAnex = "N";
                ?>
              window.open("./notificacion/notificacion.php?nurad=<?=$verrad?>&codusua=<?=$codusua?>&coddepe=<?=$coddepe?>&codusuario=<?=$codusuario?>&dependencia=<?=$dependencia?>&radi_fech_radi=<?=$radi_fech_radi?>&nomcarpeta=<?=$nomcarpeta?>&mostrar_opc_envio=<?=$mostrar_opc_envio?>&carpeta=<?=$carpeta?>&leido=<?=$leido?>&tNotNotifica="+tNotNotifica+"&tNotNotificado="+tNotNotificado+"&tNotObserva="+tNotObserva+"&tFechNot="+tFechNot+"&tipoNotific="+tipoNotific,"NotificaciondeResolucion","height=300,width=500,scrollbars=yes");
            }

            function verVinculoDocto(){
                window.open("./vinculacion/mod_vinculacion.php?verrad=<?=$verrad?>&codusuario=<?=$codusuario?>&dependencia=<?=$dependencia?>","Vinculacion_Documento","height=500,width=750,scrollbars=yes");
            }

            function verResolucion(){
              ocultar("tb_general");
              ocultar("mod_causales");
              ocultar("mod_temas");
              ocultar("mod_flujo");
              ocultar("mod_tipodocumento");
              mostrar("mod_resolucion");
              ocultar("mod_notificacion");
            }

            function ver_temas(){
              ocultar("tb_general");
              ocultar("mod_tipodocumento");
              ocultar("mod_causales");
              ocultar("mod_sector");
              ocultar("mod_flujo");
              ocultar("mod_tipodocumento");
              mostrar("mod_temas");
              ocultar("mod_resolucion");
              ocultar("mod_notificacion");
            }

            function ver_flujo(){
              mostrar("mod_flujo");
              ocultar("tb_general");
              ocultar("mod_tipodocumento");
              ocultar("mod_causales");
              ocultar("mod_temas");
              ocultar("mod_sector");
              // mostrar("mod_flujo");
              ocultar("mod_resolucion");
              ocultar("mod_notificacion");
            }

            function hidden_tipodocumento(){
                <?php
                if (!$ver_tipodoc) {
                }
                ?>
            }

            function selectallradicados(){

                if ($('#selectAllRadicados').is(':checked')) {
                    $('.inputCheckboxRadi').each(function(index, el) {
                        $('#' + el.id).prop('checked', true);
                        anexosSeleccionados.push(el.id);
                    });

                } else {
                    $('.inputCheckboxRadi').each(function(index, el) {
                        $('#' + el.id).prop('checked', false);
                        var deleteItem = anexosSeleccionados.indexOf(el.id);
                        if (deleteItem != -1) {
                            anexosSeleccionados.splice(deleteItem, 1);
                        }
                    });
                }

            }

            function inputcheckboxradi(anex_codigo){

                anexosSeleccionados = [];

                if ($('#' + anex_codigo).is(':checked')) {
                    anexosSeleccionados.push(anex_codigo);
                } else {
                    var deleteItem = anexosSeleccionados.indexOf(anex_codigo);
                    if (deleteItem != -1) {
                        anexosSeleccionados.splice(deleteItem, 1);
                    }
                }

            }
        </script>

        <div id="spiffycalendar" class="text"></div>
        <script language="JavaScript" src="js/spiffyCal/spiffyCal_v2_1.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="js/spiffyCal/spiffyCal_v2_1.css">
    </head>
    <?php
    // Modificado Supersolidaria
    if (isset($_GET['ordenarPor']) && $_GET['ordenarPor'] != "") {
      $body = "document.location.href='#t1';";
    }
    ?>
    <body bgcolor="#FFFFFF" topmargin="0" onLoad="window_onload();<? print $body; ?>">

        <?php
        /***
        Autor: Andrés Mosquera
        Fecha: 2019-09-05
        Info: Se valida si el radicado viene con la carpeta 14(Reasignación masiva) para extraer el último dígito del radicado y así moverlo a la carpeta que corresponde
        ***/
        if ($_SESSION['carpeta'] == 14) {
            $radiTempUpdateCarpeta = $verrad;
            if (substr($radiTempUpdateCarpeta, -1) == 2) {
                $queryUpdateCarpetaRadicado = "UPDATE radicado SET carp_codi = '0' WHERE radi_nume_radi = '" . $verrad . "'";
                $updateCarpetaRadicado = $db->conn->Execute($queryUpdateCarpetaRadicado);
            } else {
                $queryUpdateCarpetaRadicado = "UPDATE radicado SET carp_codi = '" . substr($radiTempUpdateCarpeta, -1) . "' WHERE radi_nume_radi = '" . $verrad . "'";
                $updateCarpetaRadicado = $db->conn->Execute($queryUpdateCarpetaRadicado);
            }
        }

        //$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);
        $fechah = date("dmy_h_m_s") . " " . time();
        $check = 1;
        $numeroa = 0;
        $numero = 0;
        $numeros = 0;
        $numerot = 0;
        $numerop = 0;
        $numeroh = 0;

        include "ver_datosrad.php";
        $sqlInformados = "select usua_codi, depe_codi from informados where radi_nume_radi ='" . $verradicado . "'";
        $rsInformados = $db->conn->Execute($sqlInformados);

        while (!$rsInformados->EOF) {
            $usuariosInformados[] = $rsInformados->fields["USUA_CODI"];
            $dependenciaInformados[] = $rsInformados->fields["DEPE_CODI"];
            $rsInformados->MoveNext();
        }

        if ($verradPermisos == "Full" or $datoVer == "985") {
        } else {

            $numRad = $verrad;

            // Diferente usuario y diferente dependencia + el radicado confidencial + no tener el permiso
            if (($_SESSION['codusuario'] != $usuario_actual && $_SESSION['depecodi'] != $dependencia_actual) && $permission == 1 && $_SESSION["usua_perm_consulta_rad"] == 0) {

                if (!in_array($_SESSION['codusuario'], $usuariosInformados) && !in_array($_SESSION['depecodi'], $dependenciaInformados)) {

                    include "$ruta_raiz/seguridad/sinPermisoRadicado.php";
                }
            }
            // Diferente usuario y misma dependencia + el radicado confidencial + no tener el permiso
            elseif (($_SESSION['codusuario'] != $usuario_actual && $_SESSION['depecodi'] == $dependencia_actual) && $permission == 1 && $_SESSION["usua_perm_consulta_rad"] == 0) {

                if (!in_array($_SESSION['codusuario'], $usuariosInformados) && !in_array($_SESSION['depecodi'], $dependenciaInformados)) {

                    include "$ruta_raiz/seguridad/sinPermisoRadicado.php";
                }
            }
            // Mismo usuario y diferente dependencia + el radicado confidencial + no tener el permiso
            elseif (($_SESSION['codusuario'] == $usuario_actual && $_SESSION['depecodi'] != $dependencia_actual) && $permission == 1 && $_SESSION["usua_perm_consulta_rad"] == 0) {

                if (!in_array($_SESSION['codusuario'], $usuariosInformados) && !in_array($_SESSION['depecodi'], $dependenciaInformados)) {

                    include "$ruta_raiz/seguridad/sinPermisoRadicado.php";
                }
            }
        }

        if ($krd) {
          ?>
          <center>
              <div id="titulo" style="width: 95%;" align="center">
                  <table border=0 width=95%  cellpadding="0" cellspacing="5" class="borde_tab">
                      <tr>
                          <td class="titulos2">
                            <a class=vinculosCabezote HREF='javascript:history.back();'>P&aacute;gina Anterior</a>
                          </td>
                          <td width=55% class="titulos2">
                              <?php
                                  $isql = "select * From usuario where USUA_LOGIN ='$krd' and USUA_SESION='" . substr(session_id(), 0, 29) . "' ";
                                  $rs = $db->query($isql);

                                  echo 'Datos del radicado No:';
                                  if ($mostrar_opc_envio == 0 and $carpeta != 8 and !$agendado) {

                                    $ent = substr($verrad, -1);

                                    // Se verifica que el usuario actual es el mismo que el usuario que inicio sesión ya que es la unica persona que puede cambiar el nivel del radicado.
                                    if(($radi_usua_actu == $_SESSION['codusuario']) && ($radi_depe_actu == $_SESSION['dependencia'])){
                                      
                                      echo "<a aria-label='Datos del radicado número' class='vinculosCabezote' title='Click para modificar el Documento' href='./radicacion/NEW.php?nurad=$verrad&Buscar=BuscarDocModUS&" . session_name() . "=" . session_id() . "&Submit3=ModificarDocumentos&Buscar1=BuscarOrfeo78956jkgf' notborder >$verrad</a>";
                                      
                                    }else{
                                      echo $verrad;
                                    }
                                  } else { echo $verrad; }

                                  if ($numExpediente && $_GET['expIncluido'][0] == "") {

                                    $sExpediente = 'si';
                                    echo "<span class=noleidos>&nbsp;&nbsp;&nbsp;PERTENECIENTE AL EXPEDIENTE No. " . ($_SESSION['numExpedienteSelected'] != "" ? $_SESSION['numExpedienteSelected'] : $numExpediente) . "</span>";

                                  } else if ($_GET['expIncluido'][0] != "") {

                                      $sExpediente = 'si';
                                      echo "<span class=noleidos>&nbsp;&nbsp;&nbsp;PERTENECIENTE AL EXPEDIENTE No. " . $_GET['expIncluido'][0] . "</span>";
                                      $_SESSION['numExpedienteSelected'] = $_GET['expIncluido'][0];

                                  } else {
                                      $sExpediente = 'no';
                                  }
                              ?>
                          </td>
                          <td height="20" class="titulos2">
                              <?php
                              $datosaenviar = "fechaf=$fechaf&mostrar_opc_envio=$mostrar_opc_envio&tipo_carp=$tipo_carp&carpeta=$carpeta&nomcarpeta=$nomcarpeta&datoVer=$datoVer&ascdesc=$ascdesc&orno=$orno";
                              ?>
                              Listado&nbsp;de:&nbsp;<?=$nomcarpeta?>
                          </td>
                          <td class="titulos2">
                              <a aria-label="Enlace para revisar estado de reservas del usuario actual" class="vinculosCabezote" href='./solicitar/Reservas.php?radicado=<?="$verrad"?>'>Solicitados</a>
                          </td>
                          <td class="titulos2">
                              <a aria-label="Enlace para solicitar el documento físico del radicado actual" class="vinculosCabezote" href='./solicitar/Reservar.php?radicado=<?="$verrad&sAction=insert&sExpediente=$sExpediente"?>'>Solicitar&nbspF&iacute;sico</a>
                          </td>
                      </tr>
                  </table>
              </div>
          </center>

          <form name="form1" id="form1" action="<?=$ruta_raiz?>/tx/formEnvio.php?<?=session_name()?>=<?=session_id()?>" method="GET">
              <?php
              $controlAgenda = 1;
              if($verradPermisos=="Full"){ include "$ruta_raiz/tx/txOrfeo.php"; }
              else{}
              ?>
              <script>
                  //Ajustar ancho de barra de acciones del radicado
                  barra = document.getElementById('menuListar');
                  barra.style.width="95%";
                  barra.style.marginTop="9px";
              </script>
              <input type=hidden name='checkValue[<?=$verrad?>]' value='CHKANULAR'>
              <input type=hidden name=enviara value='9'>
          </form>

          <table border="1" align='center' cellpadding="0" cellspacing="0" width="95%" >
              <form action='verradicado.php?<?=session_name()?>=<?=trim(session_id())?>&verrad=<?=$verrad?>&datoVer=<?=$datoVer?>&chk1=<?=$verrad . "&carpeta=$carpeta&nomcarpeta=$nomcarpeta"?>' method='GET' name='form2'>
                  <?php
                      echo "<input type='hidden' name='fechah' value='$fechah'>";
                      print "<input type='hidden' name='verrad' id='verrad' value='" . $verrad . "'>";

                      if ($flag == 2) {
                          echo "<CENTER>No se ha podido realizar la consulta<CENTER>";
                      } else {
                          $row = array();
                          $row1 = array();
                          if ($info) {
                              $row["INFO_LEIDO"] = 1;
                              $row1["DEPE_CODI"] = "'" . $dependencia . "'";
                              $row1["USUA_CODI"] = $codusuario;
                              $row1["RADI_NUME_RADI"] = "'" . $verrad . "'";
                              $rs = $db->update("informados", $row, $row1);
                          } elseif (($leido != "no" or !$leido) and $datoVer != 985) {
                              $row["RADI_LEIDO"] = 1;
                              $row1["radi_depe_actu"] = "'" . $dependencia . "'";
                              $row1["radi_usua_actu"] = $codusuario;
                              $row1["radi_nume_radi"] = "'" . $verrad . "'";
                              $rs = $db->update("radicado", $row, $row1);
                          }
                      }

                      //include "ver_datosrad.php";
                      include "ver_datosgeo.php";
                      $tipo_documento .= "<input type=hidden name=menu_ver value='$menu_ver'>";
                      $hdatos = session_name() . "=" . session_id() . "&leido=$leido&nomcarpeta=$nomcarpeta&tipo_carp=$tipo_carp&carpeta=$carpeta&verrad=$verrad&datoVer=$datoVer&fechah=fechah&menu_ver_tmp=";
                      //var_dump($hdatos);
                      /***
                      Autor: Jenny Gamez
                      Fecha: 2019-12-05
                      Info: Se valida si el radicado es PQRs, para validar si tiene autorización para enviar respuesta por correo
                      ***/
                      if ($ent == $tipoRadicadoPqr) {
                          
                          if ($enviocorreo == 't') {
                            echo '<span style="margin-left: 34px; font-size: 14px;"><br>';
                            echo '<b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;El ciudadano autorizó enviar respuesta por correo electrónico.</b><br><br>';
                            echo '</span>';
                          } else {
                            echo '<span style="margin-left: 34px; font-size: 14px;">';
                            echo '<br><b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;El ciudadano no autorizó enviar respuesta por correo electrónico, debe ser enviada físicamente a la dirección de correspondencia.</b><br><br>';
                            echo '</span>';
                          }
                          
                      }
                  ?>
                  <tr>
                      <td height="8" width="94%" class="titulos3">
                          <table border=0 width=69% cellpadding="0" cellspacing="0">
                              <tr>
                                  <td>
                                      <ul class="tabbernav">
                                          <?php
                                          echo "<li class='$datos6'>";
                                          echo '<a id="opPrincipal" title="Básicos" href="verradicado.php?' . $hdatos . '6">Imagen Principal</a>';
                                          echo '</li>';
                                          ?>
                                          <li class='<?=$datos3?>'>
                                              <a id="opGeneral" title="B&aacute;sicos" href='verradicado.php?<?=$hdatos?>3'>Informaci&oacute;n general</a>
                                          </li>
                                          <li class="<?=$datos1?>">
                                              <a id="opHistorico" title="Historico" href='verradicado.php?<?=$hdatos?>1'>Hist&oacute;rico</a>
                                          </li>
                                          <li class="<?=$datos2?>">
                                              <a id="opDocumentos" title="Documentos" href='verradicado.php?<?=$hdatos?>2'>Documentos</a>
                                          </li>
                                          <li class="<?=$datos4?>">
                                              <a id="opExpedientes" title="Expedientes" href='verradicado.php?<?=$hdatos?>4'>Expedientes</a>
                                          </li>
                                      </ul>
                                  </td>
                              </tr>
                          </table>
                      </td>
                  </tr>
                  <tr>
                      <td  bgcolor="" width="94%" height="100">
                          <?php
                          error_reporting(7);
                          switch ($menu_ver) {
                              case 1:
                                  include "ver_historico.php";
                                  break;
                              case 2:
                                  include "./lista_anexos.php";
                                  break;
                              case 3:
                                  include "lista_general.php";
                                  break;
                              case 4:
                                  include "./expediente/lista_expediente.php";
                                  break;
                              case 5:
                                  include "plantilla.php";
                                  break;
                              case 6:
                                  include "imagen_principal.php";
                                  break;
                              default:break;
                          }
                          ?>
                      </td>
                  </tr>
                  <input type=hidden name=menu_ver value='<?=$menu_ver?>'>
              </form>
          </table>
          <?php
        }else{
          ?>
          <form name='form1' action='enviar.php' method='GET'>
              <input type=hidden name=depsel>
              <input type=hidden name=depsel8>
              <input type=hidden name=carpper>
              <center><span class='eerrores'>Su sesión ha terminado o ha sido iniciada en otro equipo</span><br></center>
          </form>
          <?php
        }
        ?>
    </body>
</html>