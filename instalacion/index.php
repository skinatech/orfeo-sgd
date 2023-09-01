<?php

include "./_config/_config.php";
define('RAIZ_APLICACION', dirname(__FILE__));

// Pequeña lógica para capturar la pagina que queremos abrir
$pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'iniciaconfig';

// El fragmento de html que contiene la cabecera de nuestra web
require_once './pages/header.php';

/* Estamos considerando que el parámetro enviando tiene el mismo nombre del archivo a cargar, si este no fuera así
  se produciría un error de archivo no encontrado */
if ($_GET['p'] != 'menuParametrizcion') {
    require_once './pages/' . $pagina . '.php';
} else {
    require_once "./pages/menuParametrizcion.php";
}
// Otra opción es validar usando un switch, de esta manera para el valor esperado le indicamos que página cargar
// El fragmento de html que contiene el pie de página de nuestra web
require_once './pages/footer.php';
?>
