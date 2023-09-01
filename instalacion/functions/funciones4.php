<?php

$ruta_raiz = "..";
include "$ruta_raiz/config.php";
include_once "$ruta_raiz/include/db/ConnectionHandler.php";
$db = new ConnectionHandler("$ruta_raiz");
//define('ADODB_ASSOC_CASE', 1);

function createDatabases(){
  global $usuario;
  global $contrasena;
  global $ambiente;
  global $servicio;
  global $ambiente_capacitacion;

  	//Borro y creo  el usuario  si llegase a existir.
//echo '<script language="javascript">alert('$_POST['entidad']');</script>';



    $query_user ="DROP ROLE IF EXISTS ".$_POST['usuario'].";";
    $query_user .= "CREATE ROLE ".$_POST['usuario']." LOGIN PASSWORD '".$_POST['contrasena']."';";
    //Aqui consulto si existe el usuario admin.
  	$query_user_exist = "SELECT 1 FROM pg_roles WHERE rolname = '".$_POST['usuario']."';";
    $query_check_table =  "SELECT count(*) FROM information_schema.tables where table_name = '".$tabla."';";

    //$query_user .= "DROP ROLE IF EXISTS admin;";
  	//$query_user .= "CREATE ROLE admin LOGIN PASSWORD '".$contrasena."';";

  	$query_drop_production   = "DROP DATABASE IF EXISTS ".$_POST['servicio'].";";
  	$query_create_production = "CREATE DATABASE ".$_POST['servicio']." WITH ENCODING = 'UTF8' ;";
  	//$query_drop_training     = "DROP DATABASE IF EXISTS ".$ambiente_capacitacion.";";
  	//$query_create_training   = "CREATE DATABASE ".$ambiente_capacitacion." WITH ENCODING = 'UTF8' ;";
  	//$query_alter_databases   = "ALTER DATABASE ".$ambiente_capacitacion." OWNER TO ".$usuario.";";

  	$query_alter_databases = "ALTER DATABASE ".$_POST['servicio']."  OWNER TO ".$_POST['usuario'].";";



  	//Borramos base de datos producción si existiera.
  	$exec_query = @pg_query($query_drop_production) or die("ERROR AL BORRAR LA BASE DE DATOS : ".$_POST['servicio'].pg_last_error());
    if ($query_drop_production) {

      echo '<div class="alert alert-success" role="alert">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      echo '<strong>¡Éxito!</strong> YA HE BORRADO : '.$_POST['servicio'];
      echo '</div>';

    } else {
      echo '<div class="alert alert-danger" role="alert">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      echo '<strong>¡Precaucion!</strong> NO PUDE BORRAR : '.$_POST['servicio'];
      echo '</div>';
    }
  	//Creamos la base de datos producción.
  	$exec_query = @pg_query($query_create_production) or die("ERROR AL CREAR LA BASE DE DATOS : ".$_POST['servicio'].pg_last_error());
    if ($query_create_production) {
      echo '<div class="alert alert-success" role="alert">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      echo '<strong>¡Éxito!</strong> CREANDO : '.$_POST['servicio'];
      echo '</div>';
    } else {
      echo '<div class="alert alert-danger" role="alert">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      echo '<strong>¡Precaucion!</strong> NO PUDE CREAR : '.$_POST['servicio'];
      echo '</div>';
    }
  	//Borramos base de datos capacitación si existiera:
    /*
  	$exec_query = pg_query($query_drop_training) or die("ERROR AL BORRAR LA BASE DE DATOS : ".$ambiente.pg_last_error());
  	if ($query_drop_training) {
      echo '<div class="alert alert-success" role="alert">';
    	echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    	echo '<strong>¡Éxito!</strong> BORRANDO : '.$ambiente_capacitacion;
    	echo '</div>';

  	} else {
      echo '<div class="alert alert-danger" role="alert">';
    	echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    	echo '<strong>¡Precaucion!</strong> NO HE PODIDO BORRAR : '.$ambiente_capacitacion;
    	echo '</div>';
  	}
  	//Creamos la base de datos capacitacion.
  	$exec_query = pg_query($query_create_training) or die("ERROR AL CREAR LA BASE DE DATOS : ".$ambiente_capacitacion.pg_last_error());
  	if ($query_create_training) {
      echo '<div class="alert alert-success" role="alert">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      echo '<strong>¡Éxito!</strong> CREANDO : '.$ambiente_capacitacion;
      echo '</div>';
  	} else {
      echo '<div class="alert alert-danger" role="alert">';
    	echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    	echo '<strong>¡Precaucion!</strong> NO HE PODIDO CREAR : '.$ambiente_capacitacion;
    	echo '</div>';
  	}
    */
  	//Se creara el usuario de CONEXION
  	$exec_query = @pg_query($query_user) or die("ERROR AL CREAR EL USUARIO : ".$_POST['usuario'].pg_last_error());
  	if ($query_user) {
      echo '<div class="alert alert-success" role="alert">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      echo '<strong>¡Éxito!</strong> YA HE CREADO : '.$_POST['usuario'];
      echo '</div>';

    } else {
      echo '<div class="alert alert-danger" role="alert">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      echo '<strong>¡Precaucion!</strong> NO PUDE CREAR : '.$_POST['usuario'];
      echo '</div>';
    }
  	//Asignamos permisos a las bases de datos.
  	$exec_query = @pg_query($query_alter_databases) or die("ERROR AL ASIGNAR PERMISOS A LAS BASES DE DATOS : ".$_POST['servicio'].pg_last_error());
  	if ($query_alter_databases) {
        echo '<div class="alert alert-success" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Éxito!</strong> YA HE MODIFICADO PERMISOS EN : '.$_POST['servicio'];
        echo '</div>';

      } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Precaucion!</strong> NO PUDE MODIFICAR PERMISOS EN : '.$_POST['servicio'];
        echo '</div>';
      }
}

//ESTA FUNCION VAMOS A CARGAR EL PRIMER ARCHIVO.
function cargar_tiposRadicados() {
    $directorio = 'files/';
    $archivo = '1-tiposRadicados.csv';
    $path = $directorio . $archivo;
    $lineas = file($path); //cargamos el archivo
    $i = 0; //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera líne
    $er = 0;

    if (file_exists($path)) {
        foreach ($lineas as $linea_num => $linea) {
            if ($i != 0) {
                $datos = explode(",", $linea);

                if (count($datos) < 3) {
                    $er = 1;
                    $mensaje = 'Falta una columa, verifique :' . $archivo;
                } elseif ($datos[0] == '' || $datos[1] == '' || $datos[2] == '') {
                    $er = 1;
                    $mensaje = 'Columna 1, 2 o 3 estan en blanco, verifique :' . $archivo;
                }

                if ($er == 1) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    echo '<strong>¡Precaucion!</strong> ' . $mensaje;
                    echo '</div>';
                } else {
                    $consecutivo = trim($datos[0]);
                    $descripcion = utf8_encode(trim($datos[1]));
                    $generanSalida = trim($datos[2]);

                    if ($generanSalida == 'SI' || $generanSalida == 'si') {
                        $generanSalida = 1;
                    } else {
                        $generanSalida = 0;
                    }
                    $sql = "insert into sgd_trad_tiporad (sgd_trad_codigo,sgd_trad_descr,sgd_trad_genradsal) "
                            . "values($consecutivo,'$descripcion',$generanSalida)";
                    $rsSql = pg_query($sql);
                  
		   $sqlCarpeta = "insert into carpeta (carp_codi,carp_desc) values($consecutivo,'$descripcion')";
                   $rsSql = pg_query($sqlCarpeta);
 
                    
		    // Verifica si la columna existe en la tabla dependencia de lo contrario la crea
                    $sqlExisteDepe = "select count(column_name) FROM information_schema.columns WHERE table_name='dependencia' and column_name='depe_rad_tp$consecutivo'";
                    $rssqlExisteDepe = pg_query($sqlExisteDepe);
                    while ($rowrssqlExisteDepe = pg_fetch_array($rssqlExisteDepe)) {
                        $countDepe = $rowrssqlExisteDepe["count"];
                    }

                    if ($countDepe == 0) {
                        $mofificaTablaDepe = "ALTER TABLE dependencia ADD COLUMN depe_rad_tp$consecutivo character(5)";
                        $rsmofificaTablaDepe = pg_query($mofificaTablaDepe);
                    }
                    
                    // Verifica si la columna existe en la tabla sgd_tpr_tpdcumento de lo contrario la crea
                    $sqlExisteTpdCu = "select count(column_name) FROM information_schema.columns WHERE table_name='sgd_tpr_tpdcumento' and column_name='sgd_tpr_tp$consecutivo'";
                    $rssqlExisteTpdCu = pg_query($sqlExisteTpdCu);
                    while ($rowrssqlExisteTpdCu = pg_fetch_array($rssqlExisteTpdCu)) {
                        $countTpdCu = $rowrssqlExisteTpdCu["count"];
                    }

                    if ($countTpdCu == 0) {
                        $mofificaTablaTpdCu = "ALTER TABLE sgd_tpr_tpdcumento ADD COLUMN sgd_tpr_tp$consecutivo numeric(1,0)";
                        $rsmofificaTablaTpdCu = pg_query($mofificaTablaTpdCu);
                    }
                    
                    // Verifica si la columna existe en la tabla usuario de lo contrario la crea
                    $sqlExisteUsu = "select count(column_name) FROM information_schema.columns WHERE table_name='usuario' and column_name='usua_prad_tp$consecutivo'";
                    $rssqlExisteUsu = pg_query($sqlExisteUsu);
                    while ($rowrssqlExisteUsu = pg_fetch_array($rssqlExisteUsu)) {
                        $countUsu = $rowrssqlExisteUsu["count"];
                    }

                    if ($countUsu == 0) {
                        $mofificaTablaUsu = "ALTER TABLE usuario ADD COLUMN usua_prad_tp$consecutivo numeric(1,0)";
                        $rsmofificaTablaUsu = pg_query($mofificaTablaUsu);
                    }

                    // Verifica si la columna existe en la tabla SGD_TIP3_TIPOTERCERO de lo contrario la crea
                    $sqlExisteTp3 = "select count(column_name) FROM information_schema.columns WHERE table_name='sgd_tip3_tipotercero' and column_name='sgd_tpr_tp$consecutivo'";
                    $rssqlExisteTp3 = pg_query($sqlExisteTp3);
                    while ($rowrssqlExisteTp3 = pg_fetch_array($rssqlExisteTp3)) {
                        $countTp3 = $rowrssqlExisteTp3["count"];
                    }

                    if ($countTp3 == 0) {
                        $mofificaTablaTp3 = "ALTER TABLE SGD_TIP3_TIPOTERCERO ADD COLUMN sgd_tpr_tp$consecutivo numeric(1,0)";
                        $rsmofificaTablaTp3 = pg_query($mofificaTablaTp3);
                    }

                    // Verifica si la columna existe en la tabla perfiles de lo contrario la crea
                    $sqlExistePer = "select count(column_name) FROM information_schema.columns WHERE table_name='perfiles' and column_name='usua_prad_tp$consecutivo'";
                    $rssqlExistePer = pg_query($sqlExistePer);
                    while ($rowrssqlExistePer = pg_fetch_array($rssqlExistePer)) {
                        $countPer = $rowrssqlExistePer["count"];
                    }

                    if ($countPer == 0) {
                        $mofificaTablaPer = "ALTER TABLE perfiles ADD COLUMN usua_prad_tp$consecutivo numeric(1,0)";
                        $rsmofificaTablaPer = pg_query($mofificaTablaPer);
                    }
                }
            }
            $i++;
        }
        echo '<div class="alert alert-success" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Éxito!</strong> He ejecutado el archivo : ' . $archivo . ' Se han creado ' . count($lineas) . ' registros';
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Precaucion!</strong> No esta cargado el archivo : ' . $archivo;
        echo '</div>';
    }
}

function cargar_dependencias() {
    $directorio = 'files/';
    $archivo = '2-dependencias.csv';
    $path = $directorio . $archivo;
    $lineas = file($path); //cargamos el archivo
    $i = 0; //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera líne
    $er = 0;

    if (file_exists($path)) {
        foreach ($lineas as $linea_num => $linea) {
            if ($i != 0) {
                $datos = explode(",", $linea);
                if (count($datos) < 11) {
                    $er = 1;
                    $mensaje = 'Falta una columa, verifique :' . $archivo;
                } elseif ($datos[0] == '' || $datos[1] == '' || $datos[2] == '' || $datos[3] == '' || $datos[4] == '' ||
                        $datos[5] == '' || $datos[6] == '' || $datos[7] == '' || $datos[8] == '' || $datos[9] == '' ||
                        $datos[10] == '' || $datos[11] == '') {
                    $er = 1;
                    $mensaje = 'Alguna columna estan en blanco, verifique :' . $archivo;
                }

                if ($er == 0) {
                    $depe_codi = str_pad(trim($datos[0]), 4, '0', STR_PAD_LEFT);
                    $depe_nomb = utf8_encode(trim($datos[1]));
                    $dep_sigla = trim($datos[2]);
                    $depe_codi_padre = utf8_encode(trim($datos[3]));
                    $depe_codi_territorial = utf8_encode(trim($datos[4]));
                    // codigo del departamento
                    $dpto_codi = utf8_encode(trim($datos[5]));
                    $sqldpto = "select dpto_codi from departamento where DPTO_NOMB='$dpto_codi'";
                    $query = pg_query($sqldpto);

                    while ($rowsqldpto = pg_fetch_array($query)) {
                        $dpto_codi = $rowsqldpto["dpto_codi"];
                    }

                    // codigo del municipio
                    $muni_codi = utf8_encode(trim($datos[6]));
                    $sqlmuni = "select muni_codi from municipio where MUNI_NOMB='$muni_codi'";
                    $querymuni = pg_query($sqlmuni);

                    while ($rowsqlmuni = pg_fetch_array($querymuni)) {
                        $muni_codi = $rowsqlmuni["muni_codi"];
                    }

                    $dep_direccion = trim($datos[7]);
                    $depe_estado = trim($datos[8]);
                    if ($depe_estado == 'ACTIVO' || $depe_estado == 'ACTIVA') {
                        $depe_estado = 1;
                    } else {
                        $depe_estado = 0;
                    }
                    $depe_rad_tp1 = utf8_encode(trim($datos[9]));
                    $depe_rad_tp2 = utf8_encode(trim($datos[10]));
                    $depe_rad_tp4 = utf8_encode(trim($datos[11]));

                    /* Coonsulta si la dependencia ya existe para no volver a insertarla*/
                    $isqlDepe = "select depe_codi from dependencia where depe_codi='$depe_codi'";
                    $rsisqlDepe = pg_query($isqlDepe);

                    while ($rowisqlDepe = pg_fetch_array($rsisqlDepe)) {
                        $depe_codi_cons = $rowisqlDepe["depe_codi"];
                    }

                    if (pg_num_rows($rsisqlDepe) == 0) {
                        $sql = "insert into dependencia (depe_codi,depe_nomb,dep_sigla,dpto_codi,muni_codi,dep_direccion,depe_estado) "
                                . "values('$depe_codi','$depe_nomb','$dep_sigla', '$dpto_codi','$muni_codi','$dep_direccion',$depe_estado)";
                        $rsSql = pg_query($sql);
                        //error_log('----- insert '.$sql, 0);

                        $sqlpadre = "select distinct depe_codi from dependencia where depe_nomb = '$depe_codi_padre'";
                        $rssqlpadre = pg_query($sqlpadre);

                        while ($rowsqlpadre = pg_fetch_array($rssqlpadre)) {
                            $depe_codi_padre = $rowsqlpadre["depe_codi"];
                        }

                        $sqlterritorial = "select distinct depe_codi from dependencia where depe_nomb = '$depe_codi_territorial'";
                        $rssqlterritorial = pg_query($sqlterritorial);

                        while ($rowsqlterritorial = pg_fetch_array($rssqlterritorial)) {
                            $depe_codi_territorial = $rowsqlterritorial["depe_codi"];
                        }

                        //separo depe_depe_rad_tp1
                        $sqldepe_rad_tp1 = "select distinct depe_codi from dependencia where depe_nomb = '$depe_rad_tp1'";
                        $rssqldepe_rad_tp1 = pg_query($sqldepe_rad_tp1);

                        while ($rowsqldepe_rad_tp1 = pg_fetch_array($rssqldepe_rad_tp1)) {
                            $depe_rad_tp1 = $rowsqldepe_rad_tp1["depe_codi"];
                        }

                        //separo depe_depe_rad_tp2
                        $sqldepe_rad_tp2 = "select distinct depe_codi from dependencia where depe_nomb = '$depe_rad_tp2'";
                        $rssqldepe_rad_tp2 = pg_query($sqldepe_rad_tp2);

                        while ($rowsqldepe_rad_tp2 = pg_fetch_array($rssqldepe_rad_tp2)) {
                            $depe_rad_tp2 = $rowsqldepe_rad_tp2['depe_codi'];
                        }

                        //separo depe_depe_rad_tp4
                        $sqldepe_rad_tp4 = "select distinct depe_codi from dependencia where depe_nomb = '$depe_rad_tp4'";
                        $rssqldepe_rad_tp4 = pg_query($sqldepe_rad_tp4);

                        while ($rowsqldepe_rad_tp4 = pg_fetch_array($rssqldepe_rad_tp4)) {
                            $depe_rad_tp4 = $rowsqldepe_rad_tp4['depe_codi'];
                        }

                        $sqlUpdate = "update dependencia set depe_codi_padre = '" . str_pad($depe_codi_padre, 4, "0", STR_PAD_LEFT) . "' , "
                                . "depe_codi_territorial = '" . str_pad($depe_codi_territorial, 4, "0", STR_PAD_LEFT) . "' , "
                                . "depe_rad_tp1 = '" . str_pad($depe_rad_tp1, 4, "0", STR_PAD_LEFT) . "', "
                                . "depe_rad_tp2 = '" . str_pad($depe_rad_tp2, 4, "0", STR_PAD_LEFT) . "' , "
                                . "depe_rad_tp4 = '" . str_pad($depe_rad_tp4, 4, "0", STR_PAD_LEFT) . "' where depe_nomb = '$depe_codi'";
                        $rsisql = pg_query($sqlUpdate);

                        $insertExpt = "insert into sgd_parexp_paramexpediente (sgd_parexp_codigo,depe_codi, sgd_parexp_tabla, sgd_parexp_etiqueta,"
                                . "sgd_parexp_orden,sgd_parexp_editable) values($i,'$depe_codi','','Nombre de Carpeta',1,1)";
                        $rsinsertExpt = pg_query($insertExpt);

                    }

                    $subseriess = trim($datos[12]);
                    $tipodocumental = trim($datos[13]);

                    $isqlSbrs = "SELECT sgd_srd_codigo, sgd_sbrd_codigo, sgd_sbrd_soporte FROM sgd_sbrd_subserierd WHERE id_tabla=" . $subseriess;
                    $rsisqlsbrs = pg_query($isqlSbrs);
                    //error_log('----> subserie '. $isqlSbrs, 0);

                    while ($rowisqlSbr = pg_fetch_array($rsisqlsbrs)) {
                        $sbrserie_codi = $rowisqlSbr["sgd_srd_codigo"];
                        $sbrsubserie_codi = $rowisqlSbr["sgd_sbrd_codigo"];
                        $sbsoporte = $rowisqlSbr["sgd_sbrd_soporte"];
                    }

                    $isql = "SELECT MAX(sgd_mrd_codigo) AS numero FROM sgd_mrd_matrird";
                    $rsisql = pg_query($isql);

                    while ($rowisql = pg_fetch_array($rsisql)) {
                        $matriz_codi = $rowisql['numero'] + 1;
                    }

                    $sqlMatriz = "insert into sgd_mrd_matrird (sgd_mrd_codigo,depe_codi,sgd_srd_codigo, sgd_sbrd_codigo,soporte,"
                            . "sgd_tpr_codigo,sgd_mrd_esta) values($matriz_codi,'$depe_codi',$sbrserie_codi,$sbrsubserie_codi,'$sbsoporte',$tipodocumental,'1')";
                    $rsSqlMatriz = pg_query($sqlMatriz);
                    //error_log('---> matriz '. $sqlMatriz, 0);
                }
            }
            $i++;
        }
        if ($er == 0) {
            echo '<div class="alert alert-success" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>¡Éxito!</strong> He ejecutado el archivo : ' . $archivo . ' Se han creado ' . count($lineas) . ' registros';
            echo '</div>';
        } elseif ($er == 1) {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>¡Precaucion!</strong> ' . $mensaje;
            echo '</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Precaucion!</strong> No esta cargado el archivo : ' . $archivo;
        echo '</div>';
    }
}

function cargar_usuarios() {
    $directorio = 'files/';
    $archivo = '3-usuarios.csv';
    $path = $directorio . $archivo;
    $lineas = file($path); //cargamos el archivo
    $i = 0; //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera líne
    $er = 0;

    if (file_exists($path)) {
        foreach ($lineas as $linea_num => $linea) {
            if ($i != 0) {
                $datos = explode(",", $linea);

                if (count($datos) < 8) {
                    $er = 1;
                    $mensaje = 'Falta una columa, verifique :' . $archivo;
                } elseif ($datos[0] == '' || $datos[1] == '' || $datos[2] == '' || $datos[3] == '' || $datos[4] == '' ||
                        $datos[5] == '' || $datos[6] == '' || $datos[7] == '' || $datos[8] == '') {
                    $er = 1;
                    $mensaje = 'Alguna Columna estan en blanco, verifique :' . $archivo;
                }

                if ($er == 0) {
                    $usua_codi = trim($datos[0]);
                    $depe_codi = utf8_encode(trim($datos[1]));
                    $usua_nomb = utf8_encode(trim($datos[2]));
                    $usua_login = trim($datos[4]);
                    $usua_doc = trim($datos[5]);
                    $usua_email = trim($datos[6]);
                    $usua_esta = trim($datos[7]);
                    $usua_nuevo = trim($datos[8]);

	            $sqldepe_codi = "select distinct depe_codi from dependencia where depe_nomb = '$depe_codi'";
                    $rssqldepe_codi = pg_query($sqldepe_codi);
                   
		    while ($rowsqldepe_codi = pg_fetch_array($rssqldepe_codi)) {
                            $depe_codi = $rowsqldepe_codi['depe_codi'];
                    }

		    if($usua_esta == 'ACTIVO' || $usua_esta == 'ACTIVA' || $usua_esta == 'Activo' || $usua_esta == 'Activa' || $usua_esta == 'activo' || $usua_esta =='activa'){	
			$usua_esta = 1;
		    }else{
			$usua_esta = 0;
		    }

		    if($usua_nuevo == 'SI' || $usua_nuevo == 'si' || $usua_nuevo == 'Si'){
			$usua_nuevo = 1;
		    }else{
		      	$usua_nuevo = 0;
		    }

		    $sql = "insert into usuario (usua_codi,depe_codi,usua_nomb,usua_login,usua_pasw,usua_doc,usua_email,usua_esta, "
                            . "usua_nuevo) values($usua_codi,'$depe_codi','$usua_nomb','$usua_login','123','$usua_doc','$usua_email','$usua_esta','$usua_nuevo')";
                    $rsSql = pg_query($sql);
		    //error_log('usuario --> '.$sql,0);
		    

                    $insertCarpetaPer = "insert into carpeta_per (usua_codi,depe_codi,nomb_carp,desc_carp,codi_carp) values($usua_codi,'$depe_codi','Masiva','Radicacion Masiva',99)";
                    $rsinsertCarpetaPer = pg_query($insertCarpetaPer);
		    //error_log('carpeta_per --> '.$insertCarpetaPer,0);	

                    $usua_perfil = ucfirst(strtolower(trim($datos[3])));
		    //error_log('-----> perfil '.$usua_perfil, 0);

                    $sqlPerfil = "select * from perfiles where nomb_perfil='$usua_perfil'";
                    $rssqlPerfil = pg_query($sqlPerfil);

                    while ($rowsqlPerfil = pg_fetch_array($rssqlPerfil)) {
                        $perm_radi = $rowsqlPerfil['perm_radi'];
                        $usua_admin = $rowsqlPerfil['usua_admin'];
                        $codi_nivel = $rowsqlPerfil['codi_nivel'];
                        $perm_radi_sal = $rowsqlPerfil['perm_radi_sal'];
                        $usua_admin_archivo = $rowsqlPerfil['usua_admin_archivo'];
                        $usua_masiva = $rowsqlPerfil['usua_masiva'];
                        $usua_perm_dev = $rowsqlPerfil['usua_perm_dev'];
                        $usua_perm_numera_res = $rowsqlPerfil['usua_perm_numera_res'];
                        $usua_perm_numeradoc = $rowsqlPerfil['usua_perm_numeradoc'];
                        $sgd_panu_codi = $rowsqlPerfil['sgd_panu_codi'];
                        $usua_prad_tp1 = $rowsqlPerfil['usua_prad_tp1'];
                        $usua_prad_tp2 = $rowsqlPerfil['usua_prad_tp2'];
                        $usua_prad_tp4 = $rowsqlPerfil['usua_prad_tp4'];
                        $usua_perm_envios = $rowsqlPerfil['usua_perm_envios'];
                        $usua_perm_modifica = $rowsqlPerfil['usua_perm_modifica'];
                        $usua_perm_impresion = $rowsqlPerfil['usua_perm_impresion'];
                        $sgd_aper_codigo = $rowsqlPerfil['sgd_aper_codigo'];
                        $sgd_perm_estadistica = $rowsqlPerfil['sgd_perm_estadistica'];
                        $usua_admin_sistema = $rowsqlPerfil['usua_admin_sistema'];
                        $usua_perm_trd = $rowsqlPerfil['usua_perm_trd'];
                        $usua_perm_firma = $rowsqlPerfil['usua_perm_firma'];
                        $usua_perm_prestamo = $rowsqlPerfil['usua_perm_prestamo'];
                        $usuario_publico = $rowsqlPerfil['usuario_publico'];
                        $usuario_reasignar = $rowsqlPerfil['usuario_reasignar'];
                        $usua_perm_notifica = $rowsqlPerfil['usua_perm_notifica'];
                        $usua_perm_expediente = $rowsqlPerfil['usua_perm_expediente'];
                        $usua_auth_ldap = $rowsqlPerfil['usua_auth_ldap'];
                        $usua_perm_numera_res = $rowsqlPerfil['usua_perm_numera_res'];
                        $usua_perm_numeradoc = $rowsqlPerfil['usua_perm_numeradoc'];
                        $perm_archi = $rowsqlPerfil['perm_archi'];
                        $perm_vobo = $rowsqlPerfil['perm_vobo'];
                        $perm_borrar_anexo = $rowsqlPerfil['perm_borrar_anexo'];
                        $perm_tipif_anexo = $rowsqlPerfil['perm_tipif_anexo'];
                        $usua_perm_adminflujos = $rowsqlPerfil['usua_perm_adminflujos'];
                        $usua_exp_trd = $rowsqlPerfil['usua_exp_trd'];
                        $usua_perm_rademail = $rowsqlPerfil['usua_perm_rademail'];
                        $usua_perm_accesi = $rowsqlPerfil['usua_perm_accesi'];
                        $usua_perm_agrcontacto = $rowsqlPerfil['usua_perm_agrcontacto'];
                    }

                    $sqlupdate = "update usuario set perm_radi='$perm_radi', usua_admin='$usua_admin', codi_nivel=$codi_nivel,"
                            . "perm_radi_sal=$perm_radi_sal, usua_admin_archivo=$usua_admin_archivo, usua_masiva=$usua_masiva, "
                            . "usua_perm_dev=$usua_perm_dev, usua_perm_numera_res='$usua_perm_numera_res', "
                            . "usua_perm_numeradoc=$usua_perm_numeradoc, sgd_panu_codi=$sgd_panu_codi, usua_prad_tp1=$usua_prad_tp1, "
                            . "usua_prad_tp2=$usua_prad_tp2, usua_prad_tp4=$usua_prad_tp4, usua_perm_envios=$usua_perm_envios, "
                            . "usua_perm_modifica=$usua_perm_modifica, usua_perm_impresion=$usua_perm_impresion, "
                            . "sgd_aper_codigo=$sgd_aper_codigo, sgd_perm_estadistica=$sgd_perm_estadistica, "
                            . "usua_admin_sistema=$usua_admin_sistema, usua_perm_trd=$usua_perm_trd, usua_perm_firma=$usua_perm_firma,"
                            . "usua_perm_prestamo=$usua_perm_prestamo, usuario_publico=$usuario_publico, "
                            . "usuario_reasignar=$usuario_reasignar, usua_perm_notifica=$usua_perm_notifica, "
                            . "usua_perm_expediente=$usua_perm_expediente, usua_auth_ldap=$usua_auth_ldap,"
                            . "perm_archi='$perm_archi', perm_vobo='$perm_vobo', perm_borrar_anexo=$perm_borrar_anexo, "
                            . "perm_tipif_anexo=$perm_tipif_anexo, usua_perm_adminflujos=$usua_perm_adminflujos, "
                            . "usua_exp_trd=$usua_exp_trd, usua_perm_rademail=$usua_perm_rademail,"
                            . "usua_perm_accesi=$usua_perm_accesi, usua_perm_agrcontacto=$usua_perm_agrcontacto "
                            . "where usua_login='$usua_login'";
                    $rssqlupdate = pg_query($sqlupdate);
		    //error_log('--> '.$sqlupdate,0);
                }
            }
            $i++;
        }
        if ($er == 0) {
            echo '<div class="alert alert-success" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>¡Éxito!</strong> He ejecutado el archivo : ' . $archivo . ' Se han creado ' . count($lineas) . ' registros';
            echo '</div>';
        } elseif ($er == 1) {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>¡Precaucion!</strong> ' . $mensaje;
            echo '</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Precaucion!</strong> No esta cargado el archivo : ' . $archivo;
        echo '</div>';
    }
}

function cargar_series() {
    $directorio = 'files/';
    $archivo = '5-series.csv';
    $path = $directorio . $archivo;
    $lineasseries = file($path); //cargamos el archivo
    $s = 0; //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera líne
    $er = 0;

    if (file_exists($path)) {
        foreach ($lineasseries as $linea_numseries => $lineaserie) {
            if ($s != 0) {
                $datosseries = explode(",", $lineaserie);

                if (count($datosseries) < 2) {
                    $er = 1;
                    $mensaje = 'Falta una columa, verifique :' . $archivo;
                } elseif ($datosseries[0] == '' || $datosseries[1] == '') {
                    $er = 1;
                    $mensaje = 'Columna 1 o 2 estan en blanco, verifique :' . $archivo;
                }

                if ($er == 0) {
                    $serie_codi = trim($datosseries[0]);
                    $serie_nomb = utf8_encode(trim($datosseries[1]));
                    $date = date('Y-m-d');

                    $sqlseries = "insert into sgd_srd_seriesrd (sgd_srd_codigo,sgd_srd_descrip,sgd_srd_fechini,sgd_srd_fechfin) "
                            . "values($serie_codi,'$serie_nomb','$date','2050-12-31')";
                    $rsSqlseries = pg_query($sqlseries);
		    //error_log('---------> '.$sqlseries,0);
                }
            }
            $s++;
        }
        if ($er == 0) {
            echo '<div class="alert alert-success" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>¡Éxito!</strong> He ejecutado el archivo : ' . $archivo . ' Se han creado ' . count($lineasseries) . ' registros';
            echo '</div>';
        } elseif ($er == 1) {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>¡Precaucion!</strong> ' . $mensaje;
            echo '</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Precaucion!</strong> No esta cargado el archivo : ' . $archivo;
        echo '</div>';
    }
}

function cargar_subseries() {
    $directorio = 'files/';
    $archivo = '6-subseries.csv';
    $path = $directorio . $archivo;
    $lineassubseries = file($path); //cargamos el archivo
    $sb = 0; //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera líne
    $er = 0;
	
    if (file_exists($path)) {
        foreach ($lineassubseries as $linea_numsubseries => $lineasubserie) {
            if ($sb != 0) {
                $datossubseries = explode(",", $lineasubserie);

                if (count($datossubseries) < 10) {
                    $er = 1;
                    $mensaje = 'Falta una columa, verifique :' . $archivo;
                } elseif ($datossubseries[0] == '' || $datossubseries[1] == '' || $datossubseries[2] == '' || $datossubseries[3] == '' ||
                        $datossubseries[4] == '' || $datossubseries[5] == '' || $datossubseries[6] == '' || $datossubseries[7] == '' ||
                        $datossubseries[8] == '' || $datossubseries[9] == '' || $datossubseries[10] == '') {
                    $er = 1;
                    $mensaje = 'Alguna Columna esta en blanco, verifique :' . $archivo;
                }

                if ($er == 0) {
                    $sbserie_codi = trim($datossubseries[1]);
                    $sqlsbSerie = "select sgd_srd_codigo from sgd_srd_seriesrd where sgd_srd_descrip='$sbserie_codi'";
                    $querysbSerie = pg_query($sqlsbSerie);
                    while ($rowsqlsbSerie = pg_fetch_array($querysbSerie)) {
                        $sbserie_codi = $rowsqlsbSerie['sgd_srd_codigo'];
                    }
//                $sbserie_codi = $querysbSerie->fields["SGD_SRD_CODIGO"];

                    $sb_codi = trim($datossubseries[2]);
                    $sb_descripcion = utf8_encode(trim($datossubseries[3]));
                    $sb_fechaIni = trim($datossubseries[4]);
                    $sb_fechaFin = trim($datossubseries[5]);
                    $sb_tiempoAG = trim($datossubseries[6]);
                    $sb_tiempoAC = trim($datossubseries[7]);
                    $sb_dipoFinal = trim($datossubseries[8]);
                    $sb_soporte = utf8_encode(trim($datossubseries[9]));
                    $sb_procedimiento = utf8_encode(trim($datossubseries[10]));
                    $date = date('Y-m-d');

                    $isqlsubseries = "SELECT MAX(id_tabla) AS NUMERO FROM sgd_sbrd_subserierd";
                    $rsisqlsubseries = pg_query($isqlsubseries);

                    while ($rowisqlsubseries = pg_fetch_array($rsisqlsubseries)) {
                        $Idsubseries = $rowisqlsubseries['NUMERO'] + 1;
                    }
//                $Idsubseries = $rsisqlsubseries->fields["NUMERO"] + 1;

                    $sqlSubseriess = "insert into sgd_sbrd_subserierd (sgd_srd_codigo,sgd_sbrd_codigo,sgd_sbrd_descrip,sgd_sbrd_fechini,sgd_sbrd_fechfin,"
                            . "sgd_sbrd_tiemag,sgd_sbrd_tiemac,sgd_sbrd_dispfin,sgd_sbrd_soporte,sgd_sbrd_procedi,id_tabla) values($sbserie_codi,$sb_codi,"
                            . "'$sb_descripcion','$date','$sb_fechaFin',$sb_tiempoAG,$sb_tiempoAC,'$sb_dipoFinal','$sb_soporte','$sb_procedimiento',$datossubseries[0])";
                    $rsSqlSubseries = pg_query($sqlSubseriess);
		    //error_log('----> '.$sqlSubseriess,0);
                }
            }
            $sb++;
        }
        if ($er == 0) {
            echo '<div class="alert alert-success" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>¡Éxito!</strong> He ejecutado el archivo : ' . $archivo . ' Se han creado ' . count($lineassubseries) . ' registros';
            echo '</div>';
        } elseif ($er == 1) {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>¡Precaucion!</strong> ' . $mensaje;
            echo '</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Precaucion!</strong> No esta cargado el archivo : ' . $archivo;
        echo '</div>';
    }
}

function cargar_tiposDocumentales() {
    $directorio = 'files/';
    $archivo = '4-tiposdocumentales.csv';
    $path = $directorio . $archivo;
    $lineastipos = file($path); //cargamos el archivo
    $t = 0; //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera líne
    $er = 0;

    if (file_exists($path)) {
        foreach ($lineastipos as $linea_numtipos => $lineatipo) {
            if ($t != 0) {
                $datostipo = explode(",", $lineatipo);

                if (count($datostipo) < 8) {
                    $er = 1;
                    $mensaje = 'Falta una columa, verifique :' . $archivo;
                } elseif ($datostipo[0] == '' || $datostipo[1] == '' || $datostipo[2] == '' || $datostipo[3] == '' ||
                        $datostipo[4] == '' || $datostipo[5] == '' || $datostipo[6] == '' || $datostipo[7] == '' ||
                        $datostipo[8] == '') {
                    $er = 1;
                    $mensaje = 'Alguna Columna esta en blanco, verifique :' . $archivo;
                }

                if ($er == 0) {
                    $tipo_codi = trim($datostipo[0]);
                    $tipo_nomb = utf8_encode(trim($datostipo[1]));
                    $tipo_termino = trim($datostipo[2]);
                    $tipo_radicacion = trim($datostipo[3]);
                    $tipo_salida = trim($datostipo[4]);
                    $tipo_entrada = trim($datostipo[5]);
                    $tipo_estado = trim($datostipo[6]);

                    if ($tipo_estado == 'ACTIVO') {
                        $tipo_estado = 1;
                    } else {
                        $tipo_estado = 0;
                    }
                    $tipo_pqr = trim($datostipo[7]);
                    $tipo_formulario = trim($datostipo[8]);

                    $isqltipos = "SELECT MAX(SGD_TPR_CODIGO) AS NUMERO FROM SGD_TPR_TPDCUMENTO";
                    $rsisqltipos = pg_query($isqltipos);

                    while ($rowisqltipos = pg_fetch_array($rsisqltipos)) {
                        $tipos_codi = $rowisqltipos['NUMERO'] + 1;
                    }

                    $sqltipos = "insert into sgd_tpr_tpdcumento (sgd_tpr_codigo,sgd_tpr_descrip,sgd_tpr_termino,sgd_tpr_radica,sgd_tpr_tp1,sgd_tpr_tp2,"
                            . "sgd_tpr_estado,sgd_tpr_tp4,sgd_tpr_web) values($tipos_codi,'$tipo_nomb',$tipo_termino,'$tipo_radicacion',$tipo_salida,$tipo_entrada,"
                            . "$tipo_estado,$tipo_pqr,$tipo_formulario)";
                    $rsSqltpos = pg_query($sqltipos);
		    //error_log('----------> '.$sqltipos,0);
                }
            }
            $t++;
        }
        if ($er == 0) {
            echo '<div class="alert alert-success" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>¡Éxito!</strong> He ejecutado el archivo : ' . $archivo . ' Se han creado ' . count($lineastipos) . ' registros';
            echo '</div>';
        } elseif ($er == 1) {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>¡Precaucion!</strong> ' . $mensaje;
            echo '</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Precaucion!</strong> No esta cargado el archivo : ' . $archivo;
        echo '</div>';
    }
}

function truncateData() {
    $sql = "TRUNCATE TABLE sgd_trad_tiporad CASCADE;";
    $result = pg_query($sql);

    $sql = "TRUNCATE TABLE dependencia CASCADE;";
    $result = pg_query($sql);

    $sqlInser = "INSERT INTO dependencia(depe_codi,depe_nomb,dpto_codi,muni_codi,depe_codi_padre,depe_codi_territorial, id_cont,id_pais,dep_central,depe_estado)  VALUES ('0999', 'Dependencia de Salida', 11, 1, '0999','0999', 1, 170, 1, 1);
	INSERT INTO dependencia(depe_codi,depe_nomb,dpto_codi,muni_codi,depe_codi_padre,depe_codi_territorial, id_cont,id_pais,dep_central,depe_estado) VALUES ('0998', 'Dependencia de Prueba', 11, 1, '0998', '0998',1, 170, 1, 1)";
    $rssqlInser = pg_query($sqlInser);

    $sql = "TRUNCATE TABLE sgd_parexp_paramexpediente CASCADE;";
    $result = pg_query($sql);

    $sql = "TRUNCATE TABLE usuario CASCADE;";
    $result = pg_query($sql);

    $sqlUsuario = "INSERT INTO usuario(usua_codi,depe_codi,usua_login,usua_fech_crea,usua_pasw,usua_esta,usua_nomb,
	perm_radi,usua_admin,usua_nuevo,usua_doc,codi_nivel,usua_sesion,usua_fech_sesion,
	usua_ext,usua_nacim,usua_email,perm_radi_sal,usua_admin_archivo,usua_masiva,
	usua_perm_dev,usua_perm_numeradoc,sgd_panu_codi,usua_prad_tp1,usua_prad_tp2,
	usua_prad_tp4,usua_perm_envios,usua_perm_modifica,usua_perm_impresion,
	sgd_aper_codigo,sgd_perm_estadistica,usua_perm_sancionados,usua_admin_sistema,
	usua_perm_trd,usua_perm_firma,usua_perm_prestamo,usuario_publico,usuario_reasignar,
	usua_perm_notifica,usua_perm_expediente,id_pais,id_cont,usua_auth_ldap,perm_archi,
	perm_vobo,perm_borrar_anexo,perm_tipif_anexo,usua_perm_adminflujos,usua_exp_trd)
	VALUES (1, '0999', 'DSALIDA', '2011-09-09', '123', '1', 'Usuario DE SALIDA', 
	'0', '0', '0', '12345678909', 1,NULL, NULL, 
	NULL, NULL, NULL, NULL,0, 0, 
	0, 0, 0, 0, 0, 
	0, 0, 0, NULL, 
	NULL, 0, NULL, 0,
	0, 0, NULL, 0, NULL,
	NULL, 0, 170, 1, 0, '1',
	'1', NULL, NULL, 0, 0);
	INSERT INTO usuario (usua_codi,depe_codi,usua_login,usua_fech_crea,usua_pasw,usua_esta,usua_nomb,
	perm_radi,usua_admin,usua_nuevo,usua_doc,codi_nivel,usua_sesion,usua_fech_sesion,
	usua_ext,usua_nacim,usua_email,perm_radi_sal,usua_admin_archivo,usua_masiva,
	usua_perm_dev,usua_perm_numeradoc,sgd_panu_codi,usua_prad_tp1,usua_prad_tp2,
	usua_prad_tp4,usua_perm_envios,usua_perm_modifica,usua_perm_impresion,
	sgd_aper_codigo,sgd_perm_estadistica,usua_perm_sancionados,usua_admin_sistema,
	usua_perm_trd,usua_perm_firma,usua_perm_prestamo,usuario_publico,usuario_reasignar,
	usua_perm_notifica,usua_perm_expediente,id_pais,id_cont,usua_auth_ldap,perm_archi,
	perm_vobo,perm_borrar_anexo,perm_tipif_anexo,usua_perm_adminflujos,usua_exp_trd)
	VALUES (1, '0998', 'ADMON', '2011-09-09', '1232f297a57a5a743894a0e4a8', '1', 'Usuario Administrador', 
	'1', '1', '1', '1234567890', 5, '170921085338o1921688113ADMON', NULL,
	NULL, NULL, 'pruebas@skinatech.com', NULL, 4, 0,
	1, 1, 1, 3, 3,
	3, 1, 1, 2,
	NULL, 2, NULL, 1, 
	1, 0, 1, 0, 1,
	1, 2, 170, 1, 0, '1',
	'1', 1, 1, 1, 0);";
    $sqlUsuario = pg_query($sqlUsuario);

    $sql = "TRUNCATE TABLE sgd_tpr_tpdcumento CASCADE;";
    $result = pg_query($sql);

    $insert = "INSERT INTO sgd_tpr_tpdcumento(sgd_tpr_codigo,sgd_tpr_descrip,sgd_tpr_termino,sgd_tpr_tpuso,sgd_tpr_numera,
	sgd_tpr_radica,sgd_tpr_tp1,sgd_tpr_tp2,sgd_tpr_tp4,sgd_tpr_estado,sgd_termino_real,
	sgd_tpr_web) VALUES (0, 'No Definido', 0, 1, ' ', '1', 1, 1, 1, 1, 0, 1);";
    $rsinsert = pg_query($insert);

    $sql = "TRUNCATE TABLE sgd_srd_seriesrd CASCADE;";
    $result = pg_query($sql);
    $sql = "TRUNCATE TABLE sgd_sbrd_subserierd CASCADE;";
    $result = pg_query($sql);
//    $sql = "TRUNCATE TABLE sgd_noh_nohabiles CASCADE;";
//    $resutl = pg_query($sql);
}
?>
