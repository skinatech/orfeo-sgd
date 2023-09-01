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

//http://www.bloogie.es/tecnologia/programacion/34-ajax-con-jquery-php-y-json-ejemplo-paso-a-paso

session_start();
if (!$ruta_raiz)        $ruta_raiz="..";
require_once("$ruta_raiz/include/db/ConnectionHandler.php");
if (!$db) $db = new ConnectionHandler("$ruta_raiz");
//include("crea_combos_universales.php");
//error_reporting(7);
$db->conn->SetFetchMode(ADODB_FETCH_NUM);
$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);

//$db->conn->debug=true;

$q = $_GET["producto"];
$q2 = $_GET["producto"];

$explode = explode('  ',$q2);

if(count($explode) > 0){
    $q = $explode[0];
    $q2 = $explode[0];
}

 // 0: ciudadanos, 1: Terceros , 2: Empresas, 6:funcionarios
$usua_concat=$db->conn->Concat("RTRIM(SGD_CIU_NOMBRE)","' '","CASE WHEN  SGD_CIU_APELL1 is NULL THEN ' '
ELSE RTRIM(SGD_CIU_APELL1) END","' '","CASE WHEN  SGD_CIU_APELL2 is NULL THEN ' ' ELSE RTRIM(SGD_CIU_APELL2) END");
 $usua_concat="RTRIM(".$usua_concat.")";

switch ($db->driver) {
    case 'mssql':
        $sqlWhereisql0 = "$usua_concat LIKE '$q'";
        $sqlWhereisql1 = "NOMBRE_DE_LA_EMPRESA LIKE '$q' and ACTIVA = 1";
        $sqlWhereisql2 = "SGD_OEM_OEMPRESA LIKE '$q2'";
        $sqlWhereisql6 = "and USUA_NOMB LIKE '$q'";
        break;
    case 'mysql':
        $sqlWhereisql0 = "$usua_concat LIKE '$q'";
        $sqlWhereisql1 = "NOMBRE_DE_LA_EMPRESA LIKE '$q' and ACTIVA = 1";
        $sqlWhereisql2 = "SGD_OEM_OEMPRESA LIKE '$q2'";
        $sqlWhereisql6 = "and USUA_NOMB LIKE '$q'";
        break;
    case 'oci8':
        $sqlWhereisql0 = "$usua_concat LIKE '$q'";
        $sqlWhereisql1 = "NOMBRE_DE_LA_EMPRESA LIKE '$q' and ACTIVA = 1";
        $sqlWhereisql2 = "SGD_OEM_OEMPRESA LIKE '$q2'";
        $sqlWhereisql6 = "and USUA_NOMB LIKE '$q'";
        break;
    case 'postgres':
        $sqlWhereisql0 = "$usua_concat ILIKE '$q'";
        $sqlWhereisql1 = "NOMBRE_DE_LA_EMPRESA ILIKE '$q' and ACTIVA = 1";
        $sqlWhereisql2 = "SGD_OEM_OEMPRESA LIKE '$q2'";
        $sqlWhereisql6 = "and USUA_NOMB ILIKE '$q'";
        break;
}

$isql0 = "select 
            TDID_CODI, 
            SGD_CIU_CODIGO, 
            SGD_CIU_NOMBRE, 
            SGD_CIU_DIRECCION, 
            SGD_CIU_APELL1, 
            SGD_CIU_TELEFONO,
            SGD_CIU_EMAIL, 
            MUNI_CODI, 
            DPTO_CODI,
            SGD_CIU_CEDULA, 
            ID_PAIS, 
            ID_CONT,  
            '' as SGD_CIU_EPS 
        from 
            SGD_CIU_CIUDADANO 
        where ".$sqlWhereisql0;

$isql2 = "select 
            TDID_CODI,  
            SGD_OEM_CODIGO      AS SGD_CIU_CODIGO, 
            SGD_OEM_OEMPRESA    as SGD_CIU_NOMBRE, 
            SGD_OEM_DIRECCION   as SGD_CIU_DIRECCION, 
            SGD_OEM_REP_LEGAL   AS SGD_CIU_APELL1, 
            SGD_OEM_TELEFONO    AS SGD_CIU_TELEFONO, 
            EMAIL               AS SGD_CIU_EMAIL, 
            MUNI_CODI, 
            DPTO_CODI,
            SGD_OEM_NIT         AS SGD_CIU_CEDULA, 
            ID_PAIS, 
            ID_CONT, 
            ''                  as SGD_CIU_EPS 
        from 
            SGD_OEM_OEMPRESAS 
        where " .$sqlWhereisql2;

$isql1 = "select 
            ARE_ESP_SECUE           AS TDID_CODI,
            IDENTIFICADOR_EMPRESA   AS SGD_CIU_CODIGO,
            NOMBRE_DE_LA_EMPRESA    as SGD_CIU_NOMBRE, 
            DIRECCION               as SGD_CIU_DIRECCION, 
            NOMBRE_REP_LEGAL        as SGD_CIU_APELL1, 
            TELEFONO_1              AS SGD_CIU_TELEFONO, 
            EMAIL                   AS SGD_CIU_EMAIL,  
            CODIGO_DEL_MUNICIPIO    as MUNI_CODI, 
            CODIGO_DEL_DEPARTAMENTO as DPTO_CODI, 
            NIT_DE_LA_EMPRESA       AS SGD_CIU_CEDULA, 
            ID_CONT,
            ID_PAIS, 
            ''                      as SGD_CIU_EPS  
        from 
            BODEGA_EMPRESAS 
        WHERE ". $sqlWhereisql1;

$isql6 = "select  
            1  as TDID_CODI, 
            USUA_CODI AS SGD_CIU_CODIGO,
            usua_nomb as SGD_CIU_NOMBRE, 
            dependencia.dep_direccion as SGD_CIU_DIRECCION, 
            USUARIO.USUA_LOGIN as SGD_CIU_APELL1, 
            USUARIO.USUA_EXT AS SGD_CIU_TELEFONO, 
            USUARIO.usua_email as SGD_CIU_EMAIL,
            dependencia.MUNI_CODI as MUNI_CODI, 
            dependencia.DPTO_CODI as DPTO_CODI,
            usua_doc AS SGD_CIU_CEDULA,  
            dependencia.ID_PAIS, 
            dependencia.ID_CONT, 
            '' as SGD_CIU_EPS  
        from 
            USUARIO, 
            dependencia 
        where 
            USUA_ESTA='1' 
            AND USUARIO.depe_codi = dependencia.depe_codi 
            ".$sqlWhereisql6;

   //Para conocer  si es ciudadano, empresa,entidad o funcionario.

   $rs0=$db->query($isql0);
   $rs1=$db->query($isql1);
   $rs2=$db->query($isql2);
   $rs6=$db->query($isql6);
   
   $nomb0=null;
   $nomb1=null;
   $nomb2=null;
   $nomb6=null;
   if(isset($rs0->fields["SGD_CIU_NOMBRE"]))  
   	$nomb0=$rs0->fields["SGD_CIU_NOMBRE"];
   if(isset($rs1->fields["SGD_CIU_NOMBRE"]))  
	   $nomb1=$rs1->fields["SGD_CIU_NOMBRE"];
   if(isset($rs2->fields["SGD_CIU_NOMBRE"]))  
	   $nomb2=$rs2->fields["SGD_CIU_NOMBRE"];
   if(isset($rs6->fields["SGD_CIU_NOMBRE"]))  
	   $nomb6=$rs6->fields["SGD_CIU_NOMBRE"];

//Modificado skinatech
  $tbusqueda=0; 

  if($nomb0!=null) { $tbusqueda=0; $isql=$isql0; }
  elseif($nomb1!=null) { $tbusqueda=1; $isql=$isql1; }
  elseif($nomb2!=null) { $tbusqueda=2; $isql=$isql2; }
  elseif($nomb6!=null) { $tbusqueda=6; $isql=$isql6; }
  
  $rs=$db->conn->CacheExecute(15,$isql);

  $jsondata=array(); 
   
   $jsondata['NOM']          = str_replace('"',' ',$rs->fields["SGD_CIU_NOMBRE"]) . " ";
   $jsondata['APELL1']       = str_replace('"',' ',$rs->fields["SGD_CIU_APELL1"]) . " ";
   $jsondata['APELL2']       = str_replace('"',' ',$rs->fields["SGD_CIU_APELL2"]) . " ";
   $jsondata['TELEFONO']     = str_replace('"',' ',$rs->fields["SGD_CIU_TELEFONO"]) . " ";
   $jsondata['DIRECCION']    = str_replace('"',' ',$rs->fields["SGD_CIU_DIRECCION"]) . " ";
   $jsondata['DOCUMENTO']    = trim($rs->fields["SGD_CIU_CODIGO"]);
   $jsondata['MAIL']         = str_replace('"',' ',$rs->fields["SGD_CIU_EMAIL"]) . " ";
   $jsondata['TIPO_EMPRESA'] = $tbusqueda;
   $jsondata['CC_DOCUMENTO'] = trim($rs->fields["SGD_CIU_CEDULA"]) ;
   $jsondata['CONT']         = $rs->fields["ID_CONT"];
   $jsondata['PAIS']         = $rs->fields["ID_PAIS"];
   $jsondata['DPTO']         = $jsondata['PAIS']."-".$rs->fields["DPTO_CODI"];
   $jsondata['MUNI']         = $jsondata['DPTO']."-".$rs->fields["MUNI_CODI"];
   $jsondata['SGD_CIU_EPS']  = $rs->fields["SGD_CIU_EPS"];

  echo json_encode($jsondata);
?>
