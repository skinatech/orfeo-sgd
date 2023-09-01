<h1 class="page-header">Inicio</h1>


<p><?//Mediante este configurador usted podra ajustar su aplicación?></p>
<p><?//Es importante que tenga los datos requeridos para poder realizar su configuración?></p>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
<?php

//php_version default < 5.3.4
if (version_compare(PHP_VERSION, '5.3.4', '<')) {
	//die('Se necesita PHP 5.3.4 o superior para esta version de Orfeo!');
	$test_php        = "Se necesita PHP 5.3.4 o superior para esta version de Orfeo!";
	$action_test_php = "danger";
} else {
	$test_php        = "OK";
	$action_test_php = "success";
}

//display_errors default On
if (ini_set('display_errors', '1') === true) {
	$test_displayErrors   = "OK";
	$action_displayErrors = "success";

} else {
	$test_displayErrors   = "ERROR";
	$action_displayErrors = "danger";
}

//register_globals default Off
if (ini_get('register_globals') == '') {
	$test_register_globals   = "OK";
	$action_register_globals = "success";
} else {
	$test_register_globals   = "ERROR";
	$action_register_globals = "danger";
}

//session_save_path default writer
if (ini_get('session.save_handler') == 'files') {
	$session_save_path = session_save_path();
	if (strpos($session_save_path, ";") !== FALSE) {
		$session_save_path = substr($session_save_path, strpos($session_save_path, ";")+1);
	}

	if (is_dir($session_save_path)) {
		if (is_writable($session_save_path)) {
			$test_session_save_path   = "OK";
			$action_session_save_path = "success";
		} else {
			$test_session_save_path   = "ERROR";
			$action_session_save_path = "danger";
		}
	} else {
		$test_session_save_path   = "Session save path no es un directorio";
		$action_session_save_path = "danger";
	}
}

// session.gc_maxlifetimr default 1440
if (ini_get('session.gc_maxlifetime') == '1') {
	$test_gc_maxlifetime   = "OK";
	$action_gc_maxlifetime = "success";
	//$actual                = ini_get('session.gc_maxlifetime');
} else {
	$test_gc_maxlifetime   = "ERROR";
	$action_gc_maxlifetime = "danger";
}

// session.cache_expire default 0
if (ini_get('session.cache_expire') == '0') {
	$test_cache_expire   = "OK";
	$action_cache_expire = "success";
} else {
	$test_cache_expire   = "ERROR";
	$action_cache_expire = "danger";
}

// session.use_trans_sid default 1
if (ini_get('session.use_trans_sid') == '1') {
	$test_use_trans_sid   = "OK";
	$action_use_trans_sid = "success";
} else {
	$test_use_trans_sid   = "ERROR";
	$action_use_trans_sid = "danger";
}

// short_open_tag default 1
if (ini_get('short_open_tag') == '1') {
	$test_short_open_tag   = "OK";
	$action_short_open_tag = "success";
} else {
	$test_short_open_tag   = "ERROR";
	$action_short_open_tag = "danger";
}

// allow_url_include default 1
if (ini_get('allow_url_include') == '1') {
	$test_allow_url_include   = "OK";
	$action_allow_url_include = "success";
} else {
	$test_allow_url_include   = "ERROR";
	$action_allow_url_include = "danger";
}

// extension gd default 1
if (extension_loaded('gd')) {
	$test_extension_gd   = "OK";
	$action_extension_gd = "success";
} else {
	$test_extension_gd   = "ERROR";
	$action_extension_gd = "danger";
}

// extension json default 1
if (extension_loaded('json')) {
	$test_extension_json   = "OK";
	$action_extension_json = "success";
} else {
	$test_extension_json   = "ERROR";
	$action_extension_json = "danger";
}

//Contol .
//echo "PHP >>> (".$test_php.") <<<";
//echo "DISPLAY ERRORS >>> (".$test_displayErrors.") <<<";
//Finaliza control .

?>

<h3 align="center">COMPROBACIONES PREVIAS</h3>
<td style="width:34%">
	<p>Si alguno de estos elementos no está soportado (marcado con ERROR), por favor, realice las acciones necesarias para corregirlo. Los fallos podrían hacer que su instalación de Orfeo no funcionara correctamente.</p>
	</td>



<table class="table table-responsive" align="center">

  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>Parametro sistema</th>
      <th>Valor</th>
    </tr>
  </thead>


  <tbody>
    <tr>
      	<th scope="row">1</th>
      	<td>La versión de PHP debe ser 5.3 o superior</td>
	  	<td class="<?=$action_test_php?>"><?=$test_php?></tr>
    </tr>

    <tr>
      	<th scope="row">2</th>
      	<td>Display Errors debe estar apagado</td>
      	<td class="<?=$action_displayErrors?>"> <?=$test_displayErrors?> </td>
    </tr>


    <tr>
      	<th scope="row">3</th>
      	<td>Register globals debe estar apagado</td>
      	<td class="<?=$action_register_globals?>"><?=$test_register_globals?></td>
    </tr>

    <tr>
      	<th scope="row">4</th>
      	<td>Session save path es escribible</td>
      	<td class="<?=$action_session_save_path?>"><?=$test_session_save_path?></td>
    </tr>

	<tr>
    	<th scope="row">5</th>
      	<td>Session.gc_maxlifetime debe estar prendido</td>
      	<td class="<?=$action_gc_maxlifetime?>"><?=$test_gc_maxlifetime?></td>
    </tr>

	<tr>
    	<th scope="row">6</th>
      	<td>Session.cache_expire debe estar apagado</td>
      	<td class="<?=$action_cache_expire?>"><?=$test_cache_expire?></td>
    </tr>

	<tr>
    	<th scope="row">7</th>
      	<td>Session.use_trans_sid  debe estar prendido</td>
      	<td class="<?=$action_use_trans_sid?>"><?=$test_use_trans_sid?></td>
    </tr>

	<tr>
    	<th scope="row">8</th>
      	<td>Short_open_tag debe estar prendido</td>
      	<td class="<?=$action_short_open_tag?>"><?=$test_short_open_tag?></td>
    </tr>

	<tr>
    	<th scope="row">9</th>
      	<td>Allow_url_include debe estar prendido</td>
      	<td class="<?=$action_allow_url_include?>"><?=$test_allow_url_include?></td>
    </tr>

	<tr>
    	<th scope="row">10</th>
      	<td>Soporte GD</td>
      	<td class="<?=$action_extension_gd?>"><?=$test_extension_gd?></td>
    </tr>

	<tr>
    	<th scope="row">11</th>
      	<td>Soporte JSON</td>
      	<td class="<?=$action_extension_json?>"><?=$test_extension_json?></td>
    </tr>

  </tbody>
</table>


	<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>



<table class="table table-responsive" align="center" >
	<tr>
		<td align="center">
			<button type="button" class="btn btn-labeled btn-info" onClick="location.reload();">
                <span class="btn-label"><i class="glyphicon glyphicon-refresh"></i></span>Recargar</button>

		</td>
	</tr>
</table>
