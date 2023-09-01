<h1 class="page-header">Datos configuración</h1>
<?php
//$archivo_configurador = (ROOT_PATH . 'config.php');
$archivo_configurador = '/home/uceva/public_html/trunk/config.php';
//$archivo_configurador = '../config.php';

echo '........... '.$archivo_configurador;

if (file_exists($archivo_configurador)) {
    ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>¡Éxito!</strong> El archivo existe, puede configurar!
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/alert.js"></script>

    <?php
    //include 'formconfig.php';
    include 'configform.php';
    /* Inicio carga forumlario */

    /* Finalizo carga formulario */
} else {
    ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>¡Érror!</strong> El no existe el archivo config.php, se creara automaticamente..!
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/alert.js"></script>
    <?php
    $miArchivo = fopen($archivo_configurador, "w") or die("No se puede abrir/crear el archivo!");

    //Creamos la estructura del archivo config.php para ORFEO 4

    $php = "<?php
       \$entidad = \"\";
       \$entidad_largo = \"\";
       \$nit_entidad = \"\";
       \$entidad_tel = \"\";
       \$entidad_contacto = \"\";
       \$entidad_dir = \"\";
       \$pais = \"\";
       \$driver = \"\";
       \$servidor = \"\";
       \$servicio = \"\";
       \$usuario = \"\";
       \$contrasena = \"\";
       \$db = \"\";
       \$servidor_mail = \"\";
       \$protocolo_mail = \"\";
       \$puerto_mail = \"\";
       \$servidor_mail_smtp = \"\";
       \$protocolo_mail_smtp = \"\";
       \$cuenta_mail = \"\";
       \$contrasena_mail = \"\";
        \$ldapServer = \"\";
        \$cadenaBusqLDAP = \"\";
        \$campoBusqLDAP = \"\";
        \$ADODB_PATH = \"\";
        \$ADODB_CACHE_DIR = \"\";
        \$PEAR_PATH = \"\";
        \$menuAdicional = \"\";
        \$usua_perm_avanz = \"\";
       \$ambiente = \"\";
        \$servProcDocs = \"\";
        \$MODULO_RADICACION_DOCS_ANEXOS = \"\";
        \$MODULO_ENVIOS = \"\";
        \$colorFondo = \"\";
        \$administrador = \"\";
        \$ESTILOS_PATH = \"\";
        \$ESTILOS_PATH2 = \"\";
        \$ESTILOS_PATH_ORFEO = \"\";
        \$logoSuperiorOrfeo = \"\";
        \$imagenes = \"\";
        \$imagenes2 = \"\";
        \$dependenciaPruebas = \"\";
        \$dependenciaSalida = \"\";
        \$tipoRadicadoPqr = \"\";
        \$longitud_codigo_dependencia = \"\";
        \$depeRadicaFormularioWeb = \"\";
        \$entidad_depsal = \"\";
        \$usuaRecibeWeb = \"\";
        \$secRadicaFormularioWeb = \"\";
	?>";
    fwrite($miArchivo, $php);
    fclose($miArchivo);
    ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>¡Éxito!</strong> El archivo se ha creado..!
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/alert.js"></script>
    <?php
}
?>

