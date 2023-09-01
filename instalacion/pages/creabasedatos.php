<?php
if(file_exists('/var/www/conf-orfeo/config.php')){
$ruta_raiz = "..";
include "/var/www/conf-orfeo/config.php";
include_once "$ruta_raiz/include/db/ConnectionHandler.php";
if($driver != ''){
$db = new ConnectionHandler($ruta_raiz);
}
//$db = new ConnectionHandler($ruta_raiz);
//error_log('------> db',0);
//define('ADODB_ASSOC_CASE', 1);
}

function createDatabases() {
    global $usuario;
    global $contrasena;
    global $ambiente;
    global $servicio;
    global $ambiente_capacitacion;

    $query_user = "DROP ROLE IF EXISTS " . $_POST['usuario'] . ";";
    $query_user .= "CREATE ROLE " . $_POST['usuario'] . " LOGIN PASSWORD '" . $_POST['contrasena'] . "';";
    //Aqui consulto si existe el usuario admin.
    $query_user_exist = "SELECT 1 FROM pg_roles WHERE rolname = '" . $_POST['usuario'] . "';";
    $query_check_table = "SELECT count(*) FROM information_schema.tables where table_name = '" . $tabla . "';";
    $query_drop_production = "DROP DATABASE IF EXISTS " . $_POST['servicio'] . ";";
    $query_create_production = "CREATE DATABASE " . $_POST['servicio'] . " WITH ENCODING = 'UTF8' ;";
    $query_alter_databases = "ALTER DATABASE " . $_POST['servicio'] . "  OWNER TO " . $_POST['usuario'] . ";";

    //Borramos base de datos producción si existiera.
    $exec_query = @pg_query($query_drop_production) or die("ERROR AL BORRAR LA BASE DE DATOS : " . $_POST['servicio'] . pg_last_error());
    if ($query_drop_production) {
        echo '<div class="alert alert-success" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Éxito!</strong> YA HE BORRADO : ' . $_POST['servicio'];
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Precaucion!</strong> NO PUDE BORRAR : ' . $_POST['servicio'];
        echo '</div>';
    }
    //Creamos la base de datos producción.
    $exec_query = @pg_query($query_create_production) or die("ERROR AL CREAR LA BASE DE DATOS : " . $_POST['servicio'] . pg_last_error());
    if ($query_create_production) {
        echo '<div class="alert alert-success" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Éxito!</strong> CREANDO : ' . $_POST['servicio'];
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Precaucion!</strong> NO PUDE CREAR : ' . $_POST['servicio'];
        echo '</div>';
    }
    //Se creara el usuario de CONEXION
    $exec_query = @pg_query($query_user) or die("ERROR AL CREAR EL USUARIO : " . $_POST['usuario'] . pg_last_error());
    if ($query_user) {
        echo '<div class="alert alert-success" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Éxito!</strong> YA HE CREADO : ' . $_POST['usuario'];
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Precaucion!</strong> NO PUDE CREAR : ' . $_POST['usuario'];
        echo '</div>';
    }
    //Asignamos permisos a las bases de datos.
    $exec_query = @pg_query($query_alter_databases) or die("ERROR AL ASIGNAR PERMISOS A LAS BASES DE DATOS : " . $_POST['servicio'] . pg_last_error());
    if ($query_alter_databases) {
        echo '<div class="alert alert-success" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Éxito!</strong> YA HE MODIFICADO PERMISOS EN : ' . $_POST['servicio'];
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>¡Precaucion!</strong> NO PUDE MODIFICAR PERMISOS EN : ' . $_POST['servicio'];
        echo '</div>';
    }
}

?>
