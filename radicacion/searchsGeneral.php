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
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
session_start();
$ruta_raiz = "..";
$driver = $_SESSION['driver'];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */

require_once("$ruta_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler("$ruta_raiz");

//error_reporting(7);
$db->conn->SetFetchMode(ADODB_FETCH_NUM);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

// $db->conn->debug=true;

/** Carga las subseries segun la serie seleccionada * */
if (isset($_POST['serie'])) {
    $html = '';
    $q = $_POST['serie'];
    $isql1 = 'select sgd_sbrd_descrip as "DESCRIPCION", sgd_sbrd_codigo as "CODIGO" from sgd_sbrd_subserierd where sgd_srd_codigo = '.$q;
    $rs = $db->query($isql1);

    while (!$rs->EOF) {
        $codigo_sect = $rs->fields["CODIGO"];
        $nombre_sect = $rs->fields["DESCRIPCION"];
        $html .= "<option value=$codigo_sect>$codigo_sect -$nombre_sect</option>";
        $rs->MoveNext();
    }
    echo $html;
}

/** Carga los usuarios segun la dependencia seleccionada * */
if (isset($_POST['dependencias'])) {
    $htmls = '';
    $q = $_POST['dependencias'];

    $driver == 'postgres' ? $var_usua_codi = "RTRIM(cast(u.usua_codi AS character(20)))" : $var_usua_codi = "RTRIM(CONVERT(varchar(20),u.usua_codi))";
    
    $cad = $db->conn->Concat("RTRIM(u.depe_codi)", "'-'",$var_usua_codi);
    $cad2 = $db->conn->Concat($db->conn->IfNull("d.DEP_SIGLA", "'N.N.'"), "'-'", "RTRIM(u.usua_nomb)");
    $sql = "select $cad2 as USUA_NOMB, $cad as USUA_CODI from usuario u,dependencia d where u.depe_codi in('" . $q . "') and u.USUA_ESTA='1' and u.depe_codi = d.depe_codi ORDER BY usua_nomb";
    $rs = $db->query($sql);

    while (!$rs->EOF) {
        $codigo_sect = $rs->fields["USUA_CODI"];
        $nombre_sect = $rs->fields["USUA_NOMB"];
        $htmls .= "<option value=$codigo_sect>$nombre_sect</option>";
        $rs->MoveNext();
    }
    echo $htmls;
}

/** Verifica si el numero de radicado ya existe en el sistema y si esta asociado a un remitente **/
if (isset($_POST['radinume'])) {
    $q = $_POST['radinume'];
    $jsondata = array();
    $sql = "select * from pre_radicado where radi_nume_radi='$q' and estado=0";
    $rs = $db->query($sql);

    if ($rs->RecordCount() == -1) {
        $consultas = "select sgd_dir_nomremdes as REMITENTE from sgd_dir_drecciones where radi_nume_radi ='" . $rs->fields["radi_nume_radi"] . "'";
        $rsconsultas = $db->query($consultas);
        if ($rsconsultas->RecordCount() == -1) {
            $jsondata['REMITENTE'] = $rsconsultas->fields["REMITENTE"];
        }else{
            $jsondata['REMITENTE'] = '';
        }
    } else {
        $jsondata['REMITENTE'] = '';
    }

    echo json_encode($jsondata);
}
?>
