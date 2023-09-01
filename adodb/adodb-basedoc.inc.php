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

        /*---------------------------------------------------------+
        |                     INCLUDES                             |
        +---------------------------------------------------------*/


        /*---------------------------------------------------------+
        |                    DEFINICIONES                          |
        +---------------------------------------------------------*/
//session_start();
error_reporting(7);
$url_raiz="..";
$dir_raiz=$_SESSION['dir_raiz'];
$ESTILOS_PATH2 =$_SESSION['ESTILOS_PATH2'];

        /*---------------------------------------------------------+
        |                       MAIN                               |
        +---------------------------------------------------------*/

?>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<body>
<?php
$ADODB_COUNTRECS = false;
include_once("$dir_raiz/config.php"); 			// incluir configuracion.
include_once("$dir_raiz/include/db/ConnectionHandler.php");
include_once("$dir_raiz/adodb/adodb-paginacion.inc.php");

$db = new ConnectionHandler("$dir_raiz");
if ($db){	
	$db->conn->SetFetchMode(ADODB_FETCH_ASSOC);	
	$query=unserialize($_SESSION['xsql']);
	$rs=$db->conn->execute($query);
	echo $_SESSION['xheader'];	
	?>
	<table border=1>
		<tr>	
	<?php	
	foreach($rs->fields as $key=>$campo){
		$pre=substr($key, 0, 4);		
		if($pre!='CHK_'	&& $pre!='HID_'&& $pre!='CHU_'){	
			if($pre=='IDT_' || $pre=='DAT_' || $pre=='IMG_'){
				$key=substr($key, 4);		
			}
			echo "<td> ". ucfirst(strtolower($key)) ." </td>";
		}		
	}
	?>
		</tr>	
	<?php
	reset($rs);	
	while(!$rs->EOF){
		?><tr><?php		
		foreach($rs->fields as $key=>$campo){
			$pre=substr($key, 0, 4);		
			if($pre!='CHK_'	&& $pre!='HID_' && $pre!='CHU_'){	
				echo "<td> &nbsp;$campo</td>";		
			}		
		}
		?></tr><?php		
		$rs->moveNext();	
	}
	?>
	</table>
	<?php		
}else{
	echo "<BR>NO CONECTADO<BR>";
}

?>
</body>
</html>
