<?php
if(file_exists('/var/www/conf-orfeo/config.php')){
require_once '/var/www/conf-orfeo/config.php';
//require_once 'db/configRoot.php';
//require 'configRoot.php';
}
//Creamos la conexión inicial antes de crear las bases de datos.



function conexionInicial($hostRoot, $userRoot, $passRoot, $portRoot) {
	
	$rootconn = @pg_connect("user=".$userRoot." "."password=".$passRoot." "."host=".$hostRoot." ");

	 //or die("Error al realizar conexión inicial: ".pg_last_error());
	 return $rootconn;
}


//Creamos la conexión con orfeo producción.
function conectarOrfeo($servidor, $usuario, $contrasena, $port, $servicio) {

	$conexion_produccion = @pg_connect("user=".$usuario." "."password=".$contrasena." "."host=".$servidor." "."dbname=".$servicio)
	or die("Error al conectar con ".$servicio."".pg_last_error());

	//echo "<h3>Conexion exitosa ORFEO PRODUCCION a la base de datos $ambiente con el usuario $usuario </h3><hr><br>";
	//echo '<script language="javascript">alert("Conexion exitosa PRUEBAS");</script>';
	return $conexionambiente;

}
