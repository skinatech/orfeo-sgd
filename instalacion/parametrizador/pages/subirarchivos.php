<?php
$directorio = 'files';
$ficheros1 = scandir($directorio);
//print_r($ficheros1);
//VERIFICO 1 A 1 LOS ARHIVOS
if (in_array("1-tiposRadicados.csv", $ficheros1)) {
    $file1Radicado = "EXISTE";
    $file1Accion = "success";
} else {
    $file1Radicado = "NO EXISTE";
    $file1Accion = "danger";
}

if (in_array("2-dependencias.csv", $ficheros1)) {
    $file3Radicado = "EXISTE";
    $file3Accion = "success";
} else {
    $file3Radicado = "NO EXISTE";
    $file3Accion = "danger";
}

if (in_array("3-usuarios.csv", $ficheros1)) {
    $file4Radicado = "EXISTE";
    $file4Accion = "success";
} else {
    $file4Radicado = "NO EXISTE";
    $file4Accion = "danger";
}

if (in_array("4_tiposdocumentales.csv", $ficheros1)) {
    $file5Radicado = "EXISTE";
    $file5Accion = "success";
} else {
    $file5Radicado = "NO EXISTE";
    $file5Accion = "danger";
}

if (in_array("5_series.csv", $ficheros1)) {
    $file6Radicado = "EXISTE";
    $file6Accion = "success";
} else {
    $file6Radicado = "NO EXISTE";
    $file6Accion = "danger";
}

if (in_array("6_subseries.csv", $ficheros1)) {
    $file7Radicado = "EXISTE";
    $file7Accion = "success";
} else {
    $file7Radicado = "NO EXISTE";
    $file7Accion = "danger";
}

if (in_array("base_datos.sql", $ficheros1)) {
    $file9Radicado = "EXISTE";
    $file9Accion = "success";
} else {
    $file9Radicado = "NO EXISTE";
    $file9Accion = "danger";
}

if (in_array("clientes.csv", $ficheros1)) {
    $file10Radicado = "EXISTE";
    $file10Accion = "success";
} else {
    $file10Radicado = "NO EXISTE";
    $file10Accion = "danger";
}

if (in_array("logo_cliente.jpg", $ficheros1)) {
    $file13Radicado = "EXISTE";
    $file13Accion = "success";
} else {
    $file13Radicado = "NO EXISTE";
    $file13Accion = "danger";
}
?>

<div class="container" >
    <div class="panel panel-primary">
        <div class="panel-body">
            <form name="form1" id="form1" method="post" action="pages/upload.php" enctype="multipart/form-data">
                <div class="panel-heading">
                    <h4 class="text-center">Subir archivos de configuración </h4>
                </div>
                <div class="form-group">
			Tenga en cuenta que el logo se debe llamar logo_cliente y debe tener extensión .JPG, además debe tener un tamaño entre Ancho : 300 píxeles y Alto: 75 píxeles<br><br>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
                    </div>
                    <button type="submit"   class="btn btn-primary" >Subir archivos <span class="glyphicon glyphicon-upload" ></span></button>
                    <input type="button" class="btn btn-primary" value="Verificar archivos" onClick="location.reload(); testeame();"  />
                </div>
                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
            </form>

        </div>
    </div>
</div>

<table class="table table-responsive" align="center">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Archivo</th>
            <th>Existe</th>

    </thead>
    <tbody>
        <tr class="<?= $file1Accion ?>" >
            <th scope="row" >1</th>
            <td >1-tiposRadicados.csv</td>
            <td ><?= $file1Radicado ?></td>
        </tr>
        <tr class="<?= $file3Accion ?>">
            <th scope="row" >2</th>
            <td >2-dependencias.csv</td>
            <td ><?= $file3Radicado ?></td>
        </tr>
        <tr class="<?= $file4Accion ?>">
            <th scope="row" >3</th>
            <td >3-usuarios.csv</td>
            <td ><?= $file4Radicado ?></td>
        </tr>
        <tr class="<?= $file5Accion ?>">
            <th scope="row" >4</th>
            <td >4-tiposdocumentales.csv</td>
            <td ><?= $file5Radicado ?></td>
        </tr>
        <tr class="<?= $file6Accion ?>">
            <th scope="row" >5</th>
            <td >5-series.csv</td>
            <td ><?= $file6Radicado ?></td>
        </tr>
        <tr class="<?= $file7Accion ?>">
            <th scope="row" >6</th>
            <td >6-subseries.csv</td>
            <td ><?= $file7Radicado ?></td>
        </tr>
        <tr class="<?= $file9Accion ?>">
            <th scope="row" >7</th>
            <td >base_datos.sql</td>
            <td ><?= $file9Radicado ?></td>
        </tr>
        <tr class="<?= $file10Accion ?>">
            <th scope="row" >8</th>
            <td >clientes.csv</td>
            <td ><?= $file10Radicado ?></td>
        </tr>
        <tr class="<?= $file13Accion ?>">
            <th scope="row" >9</th>
            <td >logo_cliente.jpg</td>
            <td ><?= $file13Radicado ?></td>
        </tr>
    </tbody>
</table>

