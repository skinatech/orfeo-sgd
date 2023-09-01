jQuery(document).ready(function($) {

	//Array para almacenar los radicados activos a reasignar
	var rowSeleccionados = new Array();

	$('.loadingRadicados').show();
	$('#tablaRadicados').hide();

	$.ajax({	
  		method: "POST",
  		url: "datatable/ajax.php",
  		data: { type: 5 }
	})
	.done(function(html) {

		$('#tablaRadicadosContenido').DataTable().destroy();
		$('#tbdoyLoadData').html(html);
		$('#tablaRadicadosContenido').DataTable({
			language: {
				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "No se encontraron resultados",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar avanzado:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			},
			"aoColumns": [
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": false }
			],
			"pageLength": 10
		}).draw();

		$('.loadingRadicados').hide();
		$('#tablaRadicados').show();

	});
	
	// formulario de consulta
	$(document).on("submit","#form-filter", function(e, submit){

		var data = {
			uni_administrativa: $('#uni_administrativa').val(),
			ofi_productora: $('#ofi_productora').val(),
			objeto: $('#objeto').val(),
			codigo: $('#codigo').val(),
			nombre: $('#nombre').val(),
			sub_serie: $('#sub_serie').val(),
			modulo: $('#modulo').val(),
			estante: $('#estante').val(),
			caja: $('#caja').val(),
			carpeta: $('#carpeta').val(),
			tomo: $('#tomo').val(),
			otro: $('#otro').val(),
			soporte: $('#soporte').val(),
			fr_consulta: $('#fr_consulta').val(),
			fecha_ext_ini: $('#fecha_ext_ini').val(),
			fecha_ext_end: $('#fecha_ext_end').val(),
		};

		$('.loadingRadicados').show();
		$('#tablaRadicados').hide();
	
		if(data) {
			$.ajax({
				method: "POST",
				url: "datatable/ajax.php",
				data: { type: 5, form: data }
			})
			.done(function(html) {

				$('#tablaRadicadosContenido').DataTable().destroy();
				$('#tbdoyLoadData').html(html);
				$('#tablaRadicadosContenido').DataTable({
					language: {
						"sProcessing":     "Procesando...",
						"sLengthMenu":     "Mostrar _MENU_ registros",
						"sZeroRecords":    "No se encontraron resultados",
						"sEmptyTable":     "No se encontraron resultados",
						"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
						"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
						"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
						"sInfoPostFix":    "",
						"sSearch":         "Buscar avanzado:",
						"sUrl":            "",
						"sInfoThousands":  ",",
						"sLoadingRecords": "Cargando...",
						"oPaginate": {
							"sFirst":    "Primero",
							"sLast":     "Último",
							"sNext":     "Siguiente",
							"sPrevious": "Anterior"
						},
						"oAria": {
							"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
							"sSortDescending": ": Activar para ordenar la columna de manera descendente"
						}
					},
					"aoColumns": [
						{ "bSortable": true },
						{ "bSortable": true },
						{ "bSortable": true },
						{ "bSortable": true },
						{ "bSortable": true },
						{ "bSortable": true },
						{ "bSortable": true },
						{ "bSortable": true },
						{ "bSortable": true },
						{ "bSortable": true },
						{ "bSortable": false }
					],
					"pageLength": 10
				}).draw();

				$('.loadingRadicados').hide();
				$('#tablaRadicados').show();

				rowSeleccionados = [];
				$('#selectAllRadicados').prop('checked', false);
			})
			.fail(function(err) {
				$('.loadingRadicados').hide();
			});

		} else {
			$('.loadingRadicados').hide();
			$('#tablaRadicados').hide();
		}

		

		return false;

	});


});

$(document).on('hidden.bs.modal', '[data-dismiss="modal-close"]', function(){
	document.location.reload();
});