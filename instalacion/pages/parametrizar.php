<?php
$ambiente = 'pruebas-6.2';

include_once '/var/www/html/'.$ambiente.'/instalacion/functions/funciones.php';
include ('/var/www/html/'.$ambiente.'/config.php');

$dir = '/var/www/html/'.$ambiente.'/config.php';
$dirFunci = dirname(__FILE__).'/functions/funciones.php';

//FUNCION PARA MOSTRAR LA BARRA DE ESPERA

if (isset($_POST['processFiles'])) {
    //cargar_series();
    //cargar_subseries();
    //cargar_tiposDocumentales();
    //cargar_dependencias();
    cargar_usuarios();
}

?>
<div class="container" >
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="panel-heading">
                <h4 class="text-center">Creación y ejecución de la Parametrización</h4>
            </div>
            <div class="form-group">
                Se debe realizar los siguientes pasos para la ejecución de una parametrización exitosa<br>
                1. Ingresar a la ruta <b>instalacion/files/</b><br>
                2. Ejecutar el siguiente comando en la terminal <b>psql -U <?= $usuario?> -d <?= $servicio?> -f base_datos.sql</b>
            </div>
        </div>
    </div>
</div>
<form class="" action="" method="POST">
  <table class="table table-hover" style="height: 100px;">
      <tbody >
          <tr>
              <td class="col-sm-4 offset-sm-4">
                <button type="submit" class="btn btn-primary" name="processFiles">Procesar parametrización</button>
              </td>
          </tr>
      </tbody>
  </table>
</form>
<script type="text/javascript">
window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
  });
}, 164000);
</script>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/alert.js"></script>