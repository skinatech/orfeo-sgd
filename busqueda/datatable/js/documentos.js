jQuery(document).ready(function($) {
	//Array para almacenar los radicados activos a reasignar
	var rowSeleccionados = new Array();

	$('.loadingRadicados').show();
	$('#tablaRadicados').hide();

	$.ajax({	
  		method: "POST",
  		url: "datatable/ajax.php",
  		data: { type: 1 }
	})
	.done(function(html) {

		$('#tablaRadicadosContenido').DataTable().destroy();
		//console.log(html);
		$('#tbdoyLoadData').html(html);
		$('#tablaRadicadosContenido').DataTable({
			dom: 'Bfrtip',
		    buttons: [
		        {
			        extend: 'excelHtml5',
			        text: 'Generar Reporte',
			        className: 'btn-filtros'
			    }
		    ],
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
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": false }
			],
			"pageLength": 30
		}).draw();

		$('.loadingRadicados').hide();
		$('#tablaRadicados').show();

	});
	
	// formulario de consulta
	$(document).on("submit","#form-filter", function(e, submit){

		var data = {
			radi_nume_radi: $('#radi_nume_radi').val(),
			sgd_sexp_parexp1: $('#sgd_sexp_parexp1').val(),
			sgd_exp_numero: $('#sgd_exp_numero').val(),
			ra_asun: $('#ra_asun').val(),
			sgd_dir_nomremdes: $('#sgd_dir_nomremdes').val(),
			sgd_dir_doc: $('#sgd_dir_doc').val(),
			radi_depe_radi: $('#radi_depe_radi').val(),
			radi_usua_radi: $('#radi_usua_radi').val(),
			radi_depe_actu: $('#radi_depe_actu').val(),
			radi_usua_actu: $('#radi_usua_actu').val(),
			sgd_trad_codigo: $('#sgd_trad_codigo').val(),
			tdoc_codi: $('#tdoc_codi').val(),
			esta_codi: $('#esta_codi').val(),
			radi_fech_radi_ini: $('#radi_fech_radi_ini').val(),
			radi_fech_radi_end: $('#radi_fech_radi_end').val()	
		};

		//console.log(data);

		$('.loadingRadicados').show();
		$('#tablaRadicados').hide();
	
		if(data) {
			$.ajax({
				method: "POST",
				url: "datatable/ajax.php",
				data: { type: 1, form: data }
			})
			.done(function(html) {

				$('#tablaRadicadosContenido').DataTable().destroy();
				//console.log(data);
				$('#tbdoyLoadData').html(html);
				$('#tablaRadicadosContenido').DataTable({
					dom: 'Bfrtip',
					buttons: [
						{
							extend: 'excelHtml5',
							text: 'Generar Reporte',
							className: 'btn-filtros'
						}
					],
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
						{ "bSortable": true },
						{ "bSortable": true },
						{ "bSortable": false }
					],
					"pageLength": 30
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