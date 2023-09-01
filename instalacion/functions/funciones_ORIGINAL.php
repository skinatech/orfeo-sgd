<?php
require_once 'db/conexion.php';

function create_databases($rootconn) {
	//function create_databases($hostRoot, $userRoot, $passRoot, $portRoot, $dbseRoot) {
	global $usuario;
	global $contrasena;
	global $ambiente;
	global $ambiente_capacitacion;
	global $servicio;

	//echo "USUARIO =" . $usuario;
	//echo "CONTRASEÑA = ". $contrasena;
	//echo "AMBIENTE =". $ambiente;
	//echo "AMBIENTE CAPACITACION =" . $ambiente_capacitacion;

	//echo $servicio;
	//Estos son los querys de creacion de usuarios y de bases de datos
	$query_user = "DROP ROLE IF EXISTS ".$usuario.";";
	$query_user .= "CREATE ROLE ".$usuario." LOGIN PASSWORD '".$contrasena."';";
	$query_user .= "CREATE ROLE admin LOGIN PASSWORD '".$contrasena."';";
	$query_drop_production   = "DROP DATABASE IF EXISTS ".$ambiente.";";
	$query_create_production = "CREATE DATABASE ".$ambiente." WITH ENCODING = 'UTF8' ;";
	$query_drop_training     = "DROP DATABASE IF EXISTS ".$ambiente_capacitacion.";";
	$query_create_training   = "CREATE DATABASE ".$ambiente_capacitacion." WITH ENCODING = 'UTF8' ;";
	$query_alter_databases   = "ALTER DATABASE ".$ambiente_capacitacion." OWNER TO ".$usuario.";";
	$query_alter_databases .= "ALTER DATABASE ".$ambiente."  OWNER TO ".$usuario.";";

	//Borramos base de datos producción si existiera.
	$exec_query = pg_query($query_drop_production) or die("ERROR AL BORRAR LA BASE DE DATOS : ".$servicio.pg_last_error());
	if ($query_drop_production) {

		echo "Se borro la base de datos : ".$ambiente;
	} else {
		echo "No se pudo borrar la base de datos : ".$ambiente;
	}
	//Creamos la base de datos producción.
	$exec_query = pg_query($query_create_production) or die("ERROR AL CREAR LA BASE DE DATOS : ".$ambiente.pg_last_error());
	if ($query_create_production) {
		echo "Se creo la base de datos : ".$ambiente;
	} else {
		echo "No se creo la base de datos : ".$ambiente;
	}
	//Borramos base de datos capacitación si existiera:
	$exec_query = pg_query($query_drop_training) or die("ERROR AL BORRAR LA BASE DE DATOS : ".$ambiente_capacitacion.pg_last_error());
	if ($query_drop_training) {
		echo "Se borro la base de datos : ".$ambiente_capacitacion;
	} else {
		echo "No se pudo borrar la base de datos : ".$ambiente_capacitacion;
	}
	//Creamos la base de datos capacitacion.
	$exec_query = pg_query($query_create_training) or die("ERROR AL CREAR LA BASE DE DATOS : ".$ambiente_capacitacion.pg_last_error());
	if ($query_create_training) {
		echo "Se creo la base de datos : ".$ambiente_capacitacion;
	} else {
		echo "No se creo la base de datos : ".$ambiente_capacitacion;
	}
	//Se creara el usuario de CONEXION
	$exec_query = pg_query($query_user) or die("ERROR AL CREAR EL USUARIO : ".$usuario.pg_last_error());
	if ($query_user) {
		echo "Se creo el usuario : ".$usuario;
	} else {
		echo "No se creo el usuario : ".$usuario;
	}
	//Asignamos permisos a las bases de datos.
	$exec_query = pg_query($query_alter_databases) or die("ERROR AL ASIGNAR PERMISOS A LAS BASES DE DATOS : ".$ambiente." & ".$ambiente_capacitacion.pg_last_error());
	if ($query_alter_databases) {
		echo "Se asigno permisos a las bases de datos : ".$ambiente." y ".$ambiente_capacitacion;
	} else {
		echo "No se asignaron permisos a las bases de datos : ".$ambiente." y ".$ambiente_capacitacion;
	}

	return $basesCreadas;
}
//####### INICIO ###################
//Crear tabla temṕral ya no la vamos a usar.
function create_tables($conexionproducccion) {
	$query_create_tables = "DROP TABLE IF EXISTS  tmp_auxiliar;";
	$query_create_tables .= "CREATE TABLE IF NOT EXISTS tmp_auxiliar (id_estado numeric(1) NOT NULL,estado_descripcion varchar(30)
) ";

	//$exec_query = pg_query("BEGIN");
	$exec_query = pg_query($query_create_tables) or die("NO PUDE CREAR LA TABLA : TMP_AUXILIAR ".pg_last_error());

}
//##### FIN #####################

//####### INICIO ###################
//Cargamos los archivos a la tabla sgd_trad_tiporad
//Dstos Cargados: sgd_trad_codigo, sgd_trad_descr, sgd_trad_genradsal

function cargar_tiposRadicados() {
	$directorio = 'csv/archivos/';
	$archivo    = '1-tiposRadicados.csv';
	$path       = $directorio.$archivo;

	if (file_exists($path)) {
		//echo "El archivo $archivo si existe\n";

		$registros = array();
		if (($fichero = fopen($path, "r")) !== false) {
			// Lee los nombres de los campos
			$nombres_campos = fgetcsv($fichero, 1000, ",", "\"", "\"");
			$num_campos     = count($nombres_campos);
			// Lee los registros
			while (($datos = fgetcsv($fichero, 1000, ",", "\"", "\"")) !== false) {
				// Crea un array asociativo con los nombres y valores de los campos
				for ($icampo = 0; $icampo < $num_campos; $icampo++) {
					$registro[$nombres_campos[$icampo]] = $datos[$icampo];
				}
				// Añade el registro leido al array de registros
				$registros[] = $registro;
			}

			fclose($fichero);
			//Esta alerta se podria eliminar.
			echo '<script>alert(" Se procesaran '.count($registros).' registros")</script>';
			//echo "Se procesaran ".count($registros)." registros";

			for ($i = 0; $i < count($registros); $i++) {

				if ($registros[$i]['generan_salida'] == 'SI') {
					$registros[$i]['generan_salida'] = 1;
				} elseif ($registros[$i]['generan_salida'] == 'NO') {
					$registros[$i]['generan_salida'] = 0;
				}

				$sql = "TRUNCATE TABLE sgd_trad_tiporad CASCADE;";
				$sql .= "INSERT INTO sgd_trad_tiporad (sgd_trad_codigo, sgd_trad_descr,sgd_trad_genradsal) values (".$registros[$i]['consecutivo'].",'".$registros[$i]['descripción']."',".$registros[$i]['generan_salida'].")";
				//echo $sql;
				$result = pg_query($sql);

			}
			echo '<script language="javascript">alert("Finalizo la carga");</script>';
		}

	} else {
		echo '<script language="javascript">alert("El archivo $archivo no existe");</script>';

	}
}
//##### FIN #####################

//####### INICIO ###################
//Cargamos los archivos a la tabla dependencia
//Dstos Cargados: depe_codi,depe_nomb,dep_sigla,depe_codi_padre,depe_codi_territorial,dpto_codi,muni_codi,dep_direccion,depe_estado,depe_rad_tp1,depe_rad_tp2,depe_rad_tp4

function cargar_dependencias() {
	$directorio = 'csv/archivos/';
	$archivo    = '2-dependencias.csv';
	$path       = $directorio.$archivo;

	if (file_exists($path)) {
		//echo "El archivo $archivo si existe\n";

		$registros = array();
		if (($fichero = fopen($path, "r")) !== false) {
			// Lee los nombres de los campos
			$nombres_campos = fgetcsv($fichero, 1000, ",", "\"", "\"");
			$num_campos     = count($nombres_campos);
			// Lee los registros
			while (($datos = fgetcsv($fichero, 1000, ",", "\"", "\"")) !== false) {
				// Crea un array asociativo con los nombres y valores de los campos
				for ($icampo = 0; $icampo < $num_campos; $icampo++) {
					$registro[$nombres_campos[$icampo]] = $datos[$icampo];
				}
				// Añade el registro leido al array de registros
				$registros[] = $registro;
			}

			fclose($fichero);
			//Esta alerta se podria eliminar.
			echo '<script>alert(" Se cargaran  '.count($registros).' dependencias")</script>';

			for ($i = 0; $i < count($registros); $i++) {

				//Extraemos el codigo del departamento.
				if ($registros[$i]['depe_estado'] == 'ACTIVA' || $registros[$i]['depe_estado'] == 'ACTIVO') {
					$registros[$i]['depe_estado'] = 1;
				} elseif ($registros[$i]['depe_estado'] == 'INACTIVA') {
					$registros[$i]['depe_estado'] = 0;

				}

				$sql_dpto_codi    = "select dpto_codi from departamento where dpto_nomb = '".$registros[$i]['dpto_codi']."' ;";
				$result_dpto_codi = pg_query($sql_dpto_codi);
				while ($row_dpto_codi = pg_fetch_array($result_dpto_codi)) {
					$dpto_codi = $row_dpto_codi['dpto_codi'];

				}
				//Extraemos el codigo del Municipio.

				$sql_muni_codi    = "select muni_codi from municipio where muni_nomb = '".$registros[$i]['muni_codi']."' ;";
				$result_muni_codi = pg_query($sql_muni_codi);
				while ($row_muni_codi = pg_fetch_array($result_muni_codi)) {
					$muni_codi = $row_muni_codi['muni_codi'];

				}
				//Insertamos las dependencias.
				$sql = "INSERT INTO dependencia (depe_codi,depe_nomb,dep_sigla,dpto_codi,muni_codi,dep_direccion,depe_estado)values
				('".str_pad($registros[$i]['depe_codi'], 4, "0", STR_PAD_LEFT)."','".trim($registros[$i]['depe_nomb'])."','"
				.$registros[$i]['dep_sigla']."',"
				//.$registros[$i]['depe_codi_padre']."','"
				//.$registros[$i]['depe_codi_territorial'].","
				 .$dpto_codi.","
				.$muni_codi.",'"
				.$registros[$i]['dep_direccion']."',"
				.$registros[$i]['depe_estado'].");";
				//.$registros[$i]['depe_rad_tp1']."','"
				//.$registros[$i]['depe_rad_tp2']."','"
				//.$registros[$i]['depe_rad_tp4'].
				//")";
				//echo $sql;
				$result = pg_query($sql);

				//$depe_codi_padre = "";
				//separo depe_codi_padre
				$sql_depe_codi_padre    = "select distinct depe_codi from dependencia where depe_nomb = '".trim($registros[$i]['depe_codi_padre'])."';";
				$result_depe_codi_padre = pg_query($sql_depe_codi_padre);
				while ($row_depe_codi_padre = pg_fetch_array($result_depe_codi_padre)) {
					$depe_codi_padre = $row_depe_codi_padre['depe_codi'];
				}
				//separo depe_codi_territorial
				$sql_depe_codi_territorial    = "select distinct depe_codi from dependencia where depe_nomb = '".trim($registros[$i]['depe_codi_territorial'])."';";
				$result_depe_codi_territorial = pg_query($sql_depe_codi_territorial);
				while ($row_depe_codi_territorial = pg_fetch_array($result_depe_codi_territorial)) {
					$depe_codi_territorial = $row_depe_codi_territorial['depe_codi'];
				}

				//separo depe_depe_rad_tp1
				$sql_depe_rad_tp1    = "select distinct depe_codi from dependencia where depe_nomb = '".trim($registros[$i]['depe_rad_tp1'])."';";
				$result_depe_rad_tp1 = pg_query($sql_depe_rad_tp1);
				while ($row_depe_rad_tp1 = pg_fetch_array($result_depe_rad_tp1)) {
					$depe_rad_tp1 = $row_depe_rad_tp1['depe_codi'];
				}
				//separo depe_depe_rad_tp2
				$sql_depe_rad_tp2    = "select distinct depe_codi from dependencia where depe_nomb = '".trim($registros[$i]['depe_rad_tp2'])."';";
				$result_depe_rad_tp2 = pg_query($sql_depe_rad_tp2);
				while ($row_depe_rad_tp2 = pg_fetch_array($result_depe_rad_tp2)) {
					$depe_rad_tp2 = $row_depe_rad_tp2['depe_codi'];
				}
				//separo depe_depe_rad_tp4
				$sql_depe_rad_tp4    = "select distinct depe_codi from dependencia where depe_nomb = '".trim($registros[$i]['depe_rad_tp4'])."';";
				$result_depe_rad_tp4 = pg_query($sql_depe_rad_tp4);
				while ($row_depe_rad_tp4 = pg_fetch_array($result_depe_rad_tp4)) {
					$depe_rad_tp4 = $row_depe_rad_tp4['depe_codi'];
				}
				$update_dependencia = "update dependencia set
				 depe_codi_padre = '".str_pad($depe_codi_padre, 4, "0", STR_PAD_LEFT)."' ,
				 depe_codi_territorial = '".str_pad($depe_codi_territorial, 4, "0", STR_PAD_LEFT)."' ,
				 depe_rad_tp1 = '".str_pad($depe_rad_tp1, 4, "0", STR_PAD_LEFT)."',
				 depe_rad_tp2 = '".str_pad($depe_rad_tp2, 4, "0", STR_PAD_LEFT)."' ,
				 depe_rad_tp4 = '".str_pad($depe_rad_tp4, 4, "0", STR_PAD_LEFT).
				"' where depe_nomb = '".trim($registros[$i]['depe_nomb'])."';";
				$result_update_dependencia = pg_query($sql_muni_codi);

				$result = pg_query($update_dependencia);

				//searo depe_codi_territorial

			}
			echo '<script language="javascript">alert(" Fueron cargadas  '.count($registros).' dependencias");</script>';
		}

	} else {
		echo '<script language="javascript">alert("El archivo $archivo no existe");</script>';

	}
}

////##### FIN #####################

//####### INICIO ###################
//  sgd_parexp_codigo, depe_codi,sgd_parexp_tabla, sgd_parexp_orden, sgd_parexp_etiqueta, sgd_parexp_editable
//  sgd_parexp_codigo,depe_codi,sgd_parexp_etiqueta
//  sgd_parexp_paramexpediente
function cargar_paramexpediente() {
	$directorio = 'csv/archivos/';
	$archivo    = '2-1-paramexpediente.csv';
	$path       = $directorio.$archivo;
	echo $path;
	if (file_exists($path)) {
		echo "El archivo $archivo si existe\n";

		$registros = array();
		if (($fichero = fopen($path, "r")) !== false) {
			// Lee los nombres de los campos
			$nombres_campos = fgetcsv($fichero, 1000, ",", "\"", "\"");
			$num_campos     = count($nombres_campos);
			// Lee los registros
			while (($datos = fgetcsv($fichero, 1000, ",", "\"", "\"")) !== false) {
				// Crea un array asociativo con los nombres y valores de los campos
				for ($icampo = 0; $icampo < $num_campos; $icampo++) {
					$registro[$nombres_campos[$icampo]] = $datos[$icampo];
				}
				// Añade el registro leido al array de registros
				$registros[] = $registro;
			}

			fclose($fichero);

			//echo "Leidos " . count($registros) . " registros";

			for ($i = 0; $i < count($registros); $i++) {

				$sql = "INSERT INTO sgd_parexp_paramexpediente (sgd_parexp_codigo,depe_codi,sgd_parexp_etiqueta,sgd_parexp_orden,sgd_parexp_editable,sgd_parexp_tabla) values
                (".
				$registros[$i]['sgd_parexp_codigo'].",'".
				str_pad($registros[$i]['depe_codi'], 4, "0", STR_PAD_LEFT)."','".
				trim($registros[$i]['sgd_parexp_etiqueta'])."'".",1".","."1,0".")";
				echo $sql;

				$result = pg_query($sql);

			}

		}

	} else {
		echo "El archivo $archivo no existe";

	}
}

////##### FIN #####################

//####### INICIO ###################
//Cargamos los archivos a la tabla usuario
//Dstos Cargados: usua_codi,depe_codi,usua_nomb,usua_perfil,usua_login,usua_doc,usua_email,usua_esta,usua_nuevo

/**
 *
 */
function cargar_usuarios() {
	$directorio = 'csv/archivos/';
	$archivo    = '3-usuarios.csv';
	$archivo2   = 'usuarios_perfiles.csv';
	$path       = $directorio.$archivo;
	$path2      = $directorio.$archivo2;

	if (file_exists($path) && file_exists($path2)) {
		//echo "El archivo $archivo si existe\n";

		$registros = array();
		if (($fichero = fopen($path, "r")) !== false && ($fichero2 = fopen($path2, "r")) !== false) {
			// Lee los nombres de los campos
			$nombres_campos  = fgetcsv($fichero, 1000, ",", "\"", "\"");
			$nombres_campos2 = fgetcsv($fichero2, 1000, ";", "\"", "\"");

			$num_campos  = count($nombres_campos);
			$num_campos2 = count($nombres_campos2);

			// Lee los registros
			while (($datos = fgetcsv($fichero, 1000, ",", "\"", "\"")) !== false) {
				// Crea un array asociativo con los nombres y valores de los campos
				for ($icampo = 0; $icampo < $num_campos; $icampo++) {
					$registro[$nombres_campos[$icampo]] = $datos[$icampo];
				}
				// Añade el registro leido al array de registros
				$registros[] = $registro;
				//$registros[$nombres_campos[$icampo]] = $registro;
			}

			// Lee los registros
			while (($datos2 = fgetcsv($fichero2, 1000, ";", "\"", "\"")) !== false) {
				// Crea un array asociativo con los nombres y valores de los campos
				for ($icampo = 0; $icampo < $num_campos2; $icampo++) {
					$permiso[$nombres_campos2[$icampo]] = $datos2[$icampo];
				}
				// Añade el registro leido al array de registros
				$permisos[$permiso['desc_permiso']] = $permiso;

			}

			fclose($fichero);
			fclose($fichero2);

			//Esta alerta se podria eliminar.
			//echo '<script>alert(" Se cargaran  '.count($registros).' usuarios")</script>';
			$contador = 1;
			for ($i = 0; $i < count($registros); $i++) {

				$sql_usua_depe_codi    = "select depe_codi from dependencia where depe_nomb = '".trim($registros[$i]['depe_codi'])."';";
				$result_usua_depe_codi = pg_query($sql_usua_depe_codi);
				while ($row_usua_depe_codi = pg_fetch_array($result_usua_depe_codi)) {
					$usua_depe_codi = $row_usua_depe_codi['depe_codi'];
				}
				if ($registros[$i]['usua_perfil'] == 'JEFE' || $registros[$i]['usua_perfil'] == 'jefe' || $registros[$i]['usua_perfil'] == 'Jefe') {

					$registros[$i]['usua_codi'] = 1;
					$contador                   = 1;

				} else {
					if ($contador == 1) {
						$registros[$i]['usua_codi'] = 2;
						$contador == $contador++;
					} else {
						$contador == $contador++;
					}
					$registros[$i]['usua_codi'] = $contador;
				}

				echo '<pre>';
				print_r($usua_depe_codi);
				//print_r($codigo_usuario);
				print_r($registros[$i]['usua_perfil']);
				print_r($registros[$i]['usua_codi']);
				echo '</pre>';
				/*
				else{

				}
				/* echo '<pre>';
				print_r($registros[$i]['usua_codi']);
				echo '</pre'
				}
				 */

				if ($registros[$i]['usua_esta'] == 'INACTIVA' || $registros[$i]['usua_esta'] == 'INACTIVO' || $registros[$i]['usua_esta'] == 'NO') {
					$registros[$i]['usua_esta'] = 0;

				} elseif ($registros[$i]['usua_esta'] == 'ACTIVA' || $registros[$i]['usua_esta'] == 'ACTIVO' || $registros[$i]['usua_esta'] == 'INACTIVO' || $registros[$i]['usua_esta'] == 'DIRECTIVO' || $registros[$i]['usua_esta'] == 'SI' || $registros[$i]['usua_esta'] == 'PAPEL' || $registros[$i]['usua_esta'] == 'Papel' || $registros[$i]['usua_esta'] == 'CT' || $registros[$i]['usua_esta'] == 'CONSERVACION TOTAL' || $registros[$i]['usua_esta'] == 'CONSERVACIONTOTAL') {
					$registros[$i]['usua_esta'] = 1;

				} elseif ($registros[$i]['usua_esta'] == 'ADMSISTEMAS' || $registros[$i]['usua_esta'] == 'ELECTRONICO' || $registros[$i]['usua_esta'] == 'Electrónico' || $registros[$i]['usua_esta'] == 'E' || $registros[$i]['usua_esta'] == 'ELIMIINACION TOTAL') {
					$registros[$i]['usua_esta'] = 2;

				} elseif ($registros[$i]['usua_esta'] == 'ADMONGD' || $registros[$i]['usua_esta'] == 'MT' || $registros[$i]['usua_esta'] == 'MEDIO TECNOLOGICO') {
					$registros[$i]['usua_esta'] = 3;

				} elseif ($registros[$i]['usua_esta'] == 'ASISTENTE' || $registros[$i]['usua_esta'] == 'S' || $registros[$i]['usua_esta'] == 'SELECCION') {
					$registros[$i]['usua_esta'] = 4;

				} elseif ($registros[$i]['usua_esta'] == 'FUNCIONARIO' || $registros[$i]['usua_esta'] == 'CT/MT' || $registros[$i]['usua_esta'] == 'C.TOTAL/M.TECNOLOGICO') {
					$registros[$i]['usua_esta'] = 5;

				} elseif ($registros[$i]['usua_esta'] == 'JEFE' || $registros[$i]['usua_esta'] == 'E/MT' || $registros[$i]['usua_esta'] == 'ELIMINACION/M.TECNOLOGICO') {
					$registros[$i]['usua_esta'] = 6;

				} elseif ($registros[$i]['usua_esta'] == 'RADICADOR-DIGITALIZADOR-ENVIO' || $registros[$i]['usua_esta'] == 'MT/S' || $registros[$i]['usua_esta'] == 'M/TECNOLOGICO/SELECCION') {
					$registros[$i]['usua_esta'] = 7;

				}

				if ($registros[$i]['usua_nuevo'] == 'INACTIVA' || $registros[$i]['usua_nuevo'] == 'INACTIVO' || $registros[$i]['usua_nuevo'] == 'NO') {
					$registros[$i]['usua_nuevo'] = 0;

				} elseif ($registros[$i]['usua_nuevo'] == 'ACTIVA' || $registros[$i]['usua_nuevo'] == 'ACTIVO' || $registros[$i]['usua_nuevo'] == 'INACTIVO' || $registros[$i]['usua_nuevo'] == 'DIRECTIVO' || $registros[$i]['usua_nuevo'] == 'SI' || $registros[$i]['usua_nuevo'] == 'PAPEL' || $registros[$i]['usua_nuevo'] == 'Papel' || $registros[$i]['usua_nuevo'] == 'CT' || $registros[$i]['usua_nuevo'] == 'CONSERVACION TOTAL' || $registros[$i]['usua_nuevo'] == 'CONSERVACIONTOTAL') {
					$registros[$i]['usua_nuevo'] = 1;

				} elseif ($registros[$i]['usua_nuevo'] == 'ADMSISTEMAS' || $registros[$i]['usua_nuevo'] == 'ELECTRONICO' || $registros[$i]['usua_nuevo'] == 'Electrónico' || $registros[$i]['usua_nuevo'] == 'E' || $registros[$i]['usua_nuevo'] == 'ELIMIINACION TOTAL') {
					$registros[$i]['usua_nuevo'] = 2;

				} elseif ($registros[$i]['usua_nuevo'] == 'ADMONGD' || $registros[$i]['usua_nuevo'] == 'MT' || $registros[$i]['usua_nuevo'] == 'MEDIO TECNOLOGICO') {
					$registros[$i]['usua_nuevo'] = 3;

				} elseif ($registros[$i]['usua_nuevo'] == 'ASISTENTE' || $registros[$i]['usua_nuevo'] == 'S' || $registros[$i]['usua_nuevo'] == 'SELECCION') {
					$registros[$i]['usua_nuevo'] = 4;

				} elseif ($registros[$i]['usua_nuevo'] == 'FUNCIONARIO' || $registros[$i]['usua_nuevo'] == 'CT/MT' || $registros[$i]['usua_nuevo'] == 'C.TOTAL/M.TECNOLOGICO') {
					$registros[$i]['usua_nuevo'] = 5;

				} elseif ($registros[$i]['usua_nuevo'] == 'JEFE' || $registros[$i]['usua_nuevo'] == 'E/MT' || $registros[$i]['usua_nuevo'] == 'ELIMINACION/M.TECNOLOGICO') {
					$registros[$i]['usua_nuevo'] = 6;

				} elseif ($registros[$i]['usua_nuevo'] == 'RADICADOR-DIGITALIZADOR-ENVIO' || $registros[$i]['usua_nuevo'] == 'MT/S' || $registros[$i]['usua_nuevo'] == 'M/TECNOLOGICO/SELECCION') {
					$registros[$i]['usua_nuevo'] = 7;

				}

				//Insertamos usuarios
				$sql = "INSERT INTO usuario (
                usua_codi,
                depe_codi,
                usua_nomb,
                usua_login,
                usua_doc,
                usua_email,
                usua_esta,
                usua_pasw,
                usua_nuevo,
                perm_radi,
                codi_nivel,
                usua_admin_archivo,
                usua_masiva,
                usua_perm_dev,
                sgd_panu_codi,
                usua_prad_tp1,
                usua_prad_tp2,
                usua_perm_envios,
                usua_perm_modifica,
                usua_perm_impresion,
                sgd_perm_estadistica,
                usua_admin_sistema,
                usua_perm_trd,
                usua_perm_firma,
                usua_perm_prestamo,
                usuario_publico,
                usuario_reasignar,
                usua_perm_expediente,
                id_pais,
                id_cont,
                usua_auth_ldap,
                perm_archi,
                perm_vobo,
                perm_borrar_anexo,
                perm_tipif_anexo,
                usua_perm_adminflujos,
                usua_perm_notifica,
                perm_radi_sal,
                usua_admin,
                usua_perm_numera_res,
                usua_encuesta,
                usua_prad_tp4)values
				(".

				$registros[$i]['usua_codi'].",'".
				$usua_depe_codi."','".
				//$registros[$i]['depe_codi']."','".
				strtoupper($registros[$i]['usua_nomb'])."','".
				strtoupper($registros[$i]['usua_login'])."',".
				$registros[$i]['usua_doc'].",'".
				strtolower($registros[$i]['usua_email'])."',".
				$registros[$i]['usua_esta'].",'123',".
				$registros[$i]['usua_nuevo'].",".
				$permisos[$registros[$i]['usua_perfil']]['perm_radi'].",".
				$permisos[$registros[$i]['usua_perfil']]['codi_nivel'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_admin_archivo'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_masiva'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_perm_dev'].",".
				$permisos[$registros[$i]['usua_perfil']]['sgd_panu_codi'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_prad_tp1'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_prad_tp2'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_perm_envios'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_perm_modifica'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_perm_impresion'].",".
				$permisos[$registros[$i]['usua_perfil']]['sgd_perm_estadistica'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_admin_sistema'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_perm_trd'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_perm_firma'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_perm_prestamo'].",".
				$permisos[$registros[$i]['usua_perfil']]['usuario_publico'].",".
				$permisos[$registros[$i]['usua_perfil']]['usuario_reasignar'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_perm_expediente'].",".
				$permisos[$registros[$i]['usua_perfil']]['id_pais'].",".
				$permisos[$registros[$i]['usua_perfil']]['id_cont'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_auth_ldap'].",".
				$permisos[$registros[$i]['usua_perfil']]['perm_archi'].",".
				$permisos[$registros[$i]['usua_perfil']]['perm_vobo'].",".
				$permisos[$registros[$i]['usua_perfil']]['perm_borrar_anexo'].",".
				$permisos[$registros[$i]['usua_perfil']]['perm_tipif_anexo'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_perm_adminflujos'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_perm_notifica'].",".
				$permisos[$registros[$i]['usua_perfil']]['perm_radi_sal'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_admin'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_perm_numera_res'].",".
				$permisos[$registros[$i]['usua_perfil']]['usua_encuesta'].",".
				//$permisos[$registros[$i]['usua_perfil']]['usua_prad_tp3'] ."," .
				$permisos[$registros[$i]['usua_perfil']]['usua_prad_tp4'].") order by 1 ".
				//$permisos[$registros[$i]['usua_perfil']]['usua_prad_tp5'] ."," .
				//$permisos[$registros[$i]['usua_perfil']]['usua_prad_tp6'] ."," .
				//$permisos[$registros[$i]['usua_perfil']]['usua_prad_tp7'] ."," .
				//$permisos[$registros[$i]['usua_perfil']]['usua_prad_tp8'] ."," .
				//$permisos[$registros[$i]['usua_perfil']]['usua_prad_tp9'] .
				";";

				echo $sql;

				//AQUI EJECUTO
				//$result = pg_query($sql);
				//Aqui cierro el for
			}
			echo '<script language="javascript">alert(" Fueron cargados  '.count($registros).' usuarios");</script>';
		}

	} else {
		echo '<script language="javascript">alert("El archivo $archivo no existe");</script>';

	}
}

////##### FIN #####################

//####### INICIO ###################
//  sgd_parexp_codigo, depe_codi,sgd_parexp_tabla, sgd_parexp_orden, sgd_parexp_etiqueta, sgd_parexp_editable
//  sgd_parexp_codigo,depe_codi,sgd_parexp_etiqueta
//  sgd_parexp_paramexpediente
function cargar_tiposDocumentales() {
	$directorio = 'csv/archivos/';
	$archivo    = '4-tiposdocumentales.csv';
	$path       = $directorio.$archivo;
	echo $path;
	if (file_exists($path)) {
		echo "El archivo $archivo si existe\n";

		$registros = array();
		if (($fichero = fopen($path, "r")) !== false) {
			// Lee los nombres de los campos
			$nombres_campos = fgetcsv($fichero, 1000, ",", "\"", "\"");
			$num_campos     = count($nombres_campos);
			// Lee los registros
			while (($datos = fgetcsv($fichero, 1000, ",", "\"", "\"")) !== false) {
				// Crea un array asociativo con los nombres y valores de los campos
				for ($icampo = 0; $icampo < $num_campos; $icampo++) {

					$registro[$nombres_campos[$icampo]] = $datos[$icampo];

				}
				// Añade el registro leido al array de registros
				$registros[] = $registro;
			}

			fclose($fichero);

			echo '<script>alert(" Se cargaran  '.count($registros).' tipos documentales")</script>';

			for ($i = 0; $i < count($registros); $i++) {
				for ($i = 0; $i < count($registros); $i++) {

					//Extraemos el codigo del departamento.
					if ($registros[$i]['estado'] == 'ACTIVA' || $registros[$i]['estado'] == 'ACTIVO') {
						$registros[$i]['estado'] = 1;
					} elseif ($registros[$i]['estado'] == 'INACTIVA') {
						$registros[$i]['estado'] = 0;

					}

					$sql = "INSERT INTO sgd_tpr_tpdcumento
 				(sgd_tpr_codigo,sgd_tpr_descrip,sgd_tpr_termino,sgd_tpr_tp1,sgd_tpr_tp2,sgd_tpr_estado,sgd_tpr_tp4) values
                (".
					$registros[$i]['codigo'].",'".
					trim($registros[$i]['descripcion'])."',".
					$registros[$i]['tiempo_termino'].",".
					$registros[$i]['sgd_tpr_tp1_salida'].",".
					$registros[$i]['sgd_tpr_tp2_entrada'].",".
					$registros[$i]['estado'].",".
					$registros[$i]['sgd_tpr_tp4_pqr'].");";
					echo $sql;

					$result = pg_query($sql);
				}
			}
			echo '<script language="javascript">alert(" Fueron cargados  '.count($registros).' tipos documentales");</script>';
		}

	} else {
		echo "El archivo $archivo no existe";

	}
}

////##### FIN #####################

//####### INICIO ###################

//  sgd_srd_codigo,sgd_srd_descrip, sgd_srd_fechini, sgd_srd_fechfin
//  codigo,descripcion
//  sgd_srd_seriesrd
function cargar_series() {
	$directorio = 'csv/archivos/';
	$archivo    = '5-series.csv';
	$path       = $directorio.$archivo;
	echo $path;
	if (file_exists($path)) {
		echo "El archivo $archivo si existe\n";

		$registros = array();
		if (($fichero = fopen($path, "r")) !== false) {
			// Lee los nombres de los campos
			$nombres_campos = fgetcsv($fichero, 1000, ",", "\"", "\"");
			$num_campos     = count($nombres_campos);
			// Lee los registros
			while (($datos = fgetcsv($fichero, 1000, ",", "\"", "\"")) !== false) {
				// Crea un array asociativo con los nombres y valores de los campos
				for ($icampo = 0; $icampo < $num_campos; $icampo++) {
					$registro[$nombres_campos[$icampo]] = $datos[$icampo];
				}
				// Añade el registro leido al array de registros
				$registros[] = $registro;
			}

			fclose($fichero);
			echo '<script>alert(" Se cargaran  '.count($registros).' series")</script>';

			for ($i = 0; $i < count($registros); $i++) {

				$sql = "INSERT INTO sgd_srd_seriesrd (sgd_srd_codigo,sgd_srd_descrip, sgd_srd_fechini, sgd_srd_fechfin) values(".$registros[$i]['codigo'].",'".trim($registros[$i]['descripcion'])."','".$hoy = date("Y-m-d")."','".$hoy = date("Y-m-d")."');";
				echo $sql;

				$result = pg_query($sql);

			}
			echo '<script language="javascript">alert(" Fueron cargadas  '.count($registros).' series");</script>';
		}

	} else {
		echo "El archivo $archivo no existe";

	}
}

////##### FIN #####################

//####### INICIO ###################
//Cargamos los archivos a la tabla dependencia
//Dstos Cargados: depe_codi,depe_nomb,dep_sigla,depe_codi_padre,depe_codi_territorial,dpto_codi,muni_codi,dep_direccion,depe_estado,depe_rad_tp1,depe_rad_tp2,depe_rad_tp4

function cargar_subseries() {
	$directorio = 'csv/archivos/';
	$archivo    = '6-subseries.csv';
	$path       = $directorio.$archivo;

	if (file_exists($path)) {
		//echo "El archivo $archivo si existe\n";

		$registros = array();
		if (($fichero = fopen($path, "r")) !== false) {
			// Lee los nombres de los campos
			$nombres_campos = fgetcsv($fichero, 1000, ",", "\"", "\"");
			$num_campos     = count($nombres_campos);
			// Lee los registros
			while (($datos = fgetcsv($fichero, 1000, ",", "\"", "\"")) !== false) {
				// Crea un array asociativo con los nombres y valores de los campos
				for ($icampo = 0; $icampo < $num_campos; $icampo++) {
					$registro[$nombres_campos[$icampo]] = $datos[$icampo];
				}
				// Añade el registro leido al array de registros
				$registros[] = $registro;
			}

			fclose($fichero);
			//Esta alerta se podria eliminar.
			echo '<script>alert(" Se cargaran  '.count($registros).' subseries")</script>';

			for ($i = 0; $i < count($registros); $i++) {

				$sql_serie_codi    = "select sgd_srd_codigo from sgd_srd_seriesrd where sgd_srd_descrip  = '".$registros[$i]['codigo_serie']."' ;";
				$result_serie_codi = pg_query($sql_serie_codi);
				while ($row_serie_codi = pg_fetch_array($result_serie_codi)) {
					$sgd_srd_codigo = $row_serie_codi['sgd_srd_codigo'];
				}

				if ($registros[$i]['disposicion_final'] == 'INACTIVA' || $registros[$i]['disposicion_final'] == 'INACTIVO' || $registros[$i]['disposicion_final'] == 'NO') {
					$registros[$i]['disposicion_final'] = 0;

				} elseif ($registros[$i]['disposicion_final'] == 'ACTIVA' || $registros[$i]['disposicion_final'] == 'INACTIVO' || $registros[$i]['disposicion_final'] == 'DIRECTIVO' || $registros[$i]['disposicion_final'] == 'SI' || $registros[$i]['disposicion_final'] == 'PAPEL' || $registros[$i]['disposicion_final'] == 'Papel' || $registros[$i]['disposicion_final'] == 'CT' || $registros[$i]['disposicion_final'] == 'CONSERVACION TOTAL' || $registros[$i]['disposicion_final'] == 'CONSERVACIONTOTAL') {
					$registros[$i]['disposicion_final'] = 1;

				} elseif ($registros[$i]['disposicion_final'] == 'ADMSISTEMAS' || $registros[$i]['disposicion_final'] == 'ELECTRONICO' || $registros[$i]['disposicion_final'] == 'Electrónico' || $registros[$i]['disposicion_final'] == 'E' || $registros[$i]['disposicion_final'] == 'ELIMIINACION TOTAL') {
					$registros[$i]['disposicion_final'] = 2;

				} elseif ($registros[$i]['disposicion_final'] == 'ADMONGD' || $registros[$i]['disposicion_final'] == 'MT' || $registros[$i]['disposicion_final'] == 'MEDIO TECNOLOGICO') {
					$registros[$i]['disposicion_final'] = 3;

				} elseif ($registros[$i]['disposicion_final'] == 'ASISTENTE' || $registros[$i]['disposicion_final'] == 'S' || $registros[$i]['disposicion_final'] == 'SELECCION') {
					$registros[$i]['disposicion_final'] = 4;

				} elseif ($registros[$i]['disposicion_final'] == 'FUNCIONARIO' || $registros[$i]['disposicion_final'] == 'CT/MT' || $registros[$i]['disposicion_final'] == 'C.TOTAL/M.TECNOLOGICO') {
					$registros[$i]['disposicion_final'] = 5;

				} elseif ($registros[$i]['disposicion_final'] == 'JEFE' || $registros[$i]['disposicion_final'] == 'E/MT' || $registros[$i]['disposicion_final'] == 'ELIMINACION/M.TECNOLOGICO') {
					$registros[$i]['disposicion_final'] = 6;

				} elseif ($registros[$i]['disposicion_final'] == 'RADICADOR-DIGITALIZADOR-ENVIO' || $registros[$i]['disposicion_final'] == 'MT/S' || $registros[$i]['disposicion_final'] == 'M/TECNOLOGICO/SELECCION') {
					$registros[$i]['disposicion_final'] = 7;

				}

				if ($registros[$i]['soporte'] == 'INACTIVA' || $registros[$i]['soporte'] == 'INACTIVO' || $registros[$i]['soporte'] == 'NO') {
					$registros[$i]['soporte'] = 0;

				} elseif ($registros[$i]['soporte'] == 'ACTIVA' || $registros[$i]['soporte'] == 'INACTIVO' || $registros[$i]['soporte'] == 'DIRECTIVO' || $registros[$i]['soporte'] == 'SI' || $registros[$i]['soporte'] == 'PAPEL' || $registros[$i]['soporte'] == 'Papel' || $registros[$i]['soporte'] == 'CT' || $registros[$i]['soporte'] == 'CONSERVACION TOTAL' || $registros[$i]['soporte'] == 'CONSERVACIONTOTAL') {
					$registros[$i]['soporte'] = 1;

				} elseif ($registros[$i]['soporte'] == 'ADMSISTEMAS' || $registros[$i]['soporte'] == 'ELECTRONICO' || $registros[$i]['soporte'] == 'Electrónico' || $registros[$i]['soporte'] == 'E' || $registros[$i]['soporte'] == 'ELIMIINACION TOTAL') {
					$registros[$i]['soporte'] = 2;

				} elseif ($registros[$i]['soporte'] == 'ADMONGD' || $registros[$i]['soporte'] == 'MT' || $registros[$i]['soporte'] == 'MEDIO TECNOLOGICO') {
					$registros[$i]['soporte'] = 3;

				} elseif ($registros[$i]['soporte'] == 'ASISTENTE' || $registros[$i]['soporte'] == 'S' || $registros[$i]['soporte'] == 'SELECCION') {
					$registros[$i]['soporte'] = 4;

				} elseif ($registros[$i]['soporte'] == 'FUNCIONARIO' || $registros[$i]['soporte'] == 'CT/MT' || $registros[$i]['soporte'] == 'C.TOTAL/M.TECNOLOGICO') {
					$registros[$i]['soporte'] = 5;

				} elseif ($registros[$i]['soporte'] == 'JEFE' || $registros[$i]['soporte'] == 'E/MT' || $registros[$i]['soporte'] == 'ELIMINACION/M.TECNOLOGICO') {
					$registros[$i]['soporte'] = 6;

				} elseif ($registros[$i]['soporte'] == 'RADICADOR-DIGITALIZADOR-ENVIO' || $registros[$i]['soporte'] == 'MT/S' || $registros[$i]['soporte'] == 'M/TECNOLOGICO/SELECCION') {
					$registros[$i]['soporte'] = 7;

				}

				//Insertamos las subseries
				$sql = "INSERT INTO sgd_sbrd_subserierd (sgd_srd_codigo, sgd_sbrd_codigo, sgd_sbrd_descrip, sgd_sbrd_fechini, sgd_sbrd_fechfin, sgd_sbrd_tiemag,sgd_sbrd_tiemac, sgd_sbrd_dispfin, sgd_sbrd_soporte, sgd_sbrd_procedi)values
				(".
				$sgd_srd_codigo.",".
				//$registros[$i]['codigo_serie'] .",".
				$registros[$i]['codigo_subserie'].",'".
				$registros[$i]['descripcion']."',".
				$registros[$i]['fecha_inicio'].",".
				$registros[$i]['fecha_fin'].",".
				$registros[$i]['tiempo_archivo_gestion'].",".
				$registros[$i]['tiempo_archivo_central'].",".
				$registros[$i]['disposicion_final'].",".
				$registros[$i]['soporte'].",'".
				$registros[$i]['procedimiento']."');";

				//echo $sql;

				//AQUI EJECUTO
				$result = pg_query($sql);

			}
			echo '<script language="javascript">alert(" Fueron cargadas  '.count($registros).' subseries");</script>';
		}

	} else {
		echo '<script language="javascript">alert("El archivo $archivo no existe");</script>';

	}
}




////##### FIN #####################

////##########PRUEBAS"################


////###########FINALIZA PRUEBAS############




function cargar_nohabiles() {
	$directorio = 'csv/archivos/';
	$archivo    = 'nohabiles.csv';
	$path       = $directorio.$archivo;
	echo $path;
	if (file_exists($path)) {
		echo "El archivo $archivo si existe\n";

		$registros = array();
		if (($fichero = fopen($path, "r")) !== false) {
			// Lee los nombres de los campos
			$nombres_campos = fgetcsv($fichero, 1000, ",", "\"", "\"");
			$num_campos     = count($nombres_campos);
			// Lee los registros
			while (($datos = fgetcsv($fichero, 1000, ",", "\"", "\"")) !== false) {
				// Crea un array asociativo con los nombres y valores de los campos
				for ($icampo = 0; $icampo < $num_campos; $icampo++) {

					$registro[$nombres_campos[$icampo]] = $datos[$icampo];

				}
				// Añade el registro leido al array de registros
				$registros[] = $registro;
			}

			fclose($fichero);

			echo '<script>alert(" Se cargaran  '.count($registros).' dias, no habiles")</script>';

			for ($i = 0; $i < count($registros); $i++) {
				for ($i = 0; $i < count($registros); $i++) {

					$sql = "INSERT INTO sgd_noh_nohabiles
 				(noh_fecha) values
                ('".
					$registros[$i]['noh_fecha']."');";
					echo $sql;

					$result = pg_query($sql);
				}
			}
			echo '<script language="javascript">alert(" Fueron cargados  '.count($registros).' dias, no habiles");</script>';
		}

	} else {
		echo "El archivo $archivo no existe";

	}
}
////##### FIN #####################
