jQuery(document).ready(function($) {

	//Lanza datatables
	$('#tablaRadicadosContenido').DataTable({
		language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "No se encontraron documentos",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Búsqueda Avanzada:",
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
            { "bSortable": false }
        ],
        "pageLength": 150
	});

		$('.loadingRadicados').show();

			$.ajax({
		  		method: "POST",
		  		url: "reasignacionMasivaProcess.php",
		  		data: { type: 2 }
			})
		  	.done(function(html) {

		  		console.log(html);

		  		//$('#tablaConfiguracion').DataTable().destroy();
		    	$('#tbdoyLoadData').html(html);
		    	$('#tablaConfiguracion').DataTable({
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
			            { "bSortable": false }
			        ],
			        "pageLength": 150
				}).draw();

		    	$('.loadingRadicados').hide();
				$('#tablaRadicados').show();

				radicadosSeleccionados = [];
				$('#selectAllRadicados').prop('checked', false);
		  	})
		  	.fail(function(err) {
		  		$('.loadingRadicados').hide();
		  	});
	});

	$('#botonReasignar').on('click', function() {

			$(this).prop("disabled", true);
			$(this).text("Cargando...");
			$(this).css("background-color", "slategray");

			$('#contenidoPanelReasignacion').hide();
			$('#reasignacionCargandoAlert').show();

			$.ajax({
		  		method: "POST",
		  		url: "reasignacionMasivaProcess.php",
		  		data: { 
		  			type: 1, 
		  			numeroPeriocidad: $('#numeroPeriocidad').val(), 
		  			listPeriocidad: $('#listPeriocidad').val(), 
		  			numeroAntesVencimiento: $('#numeroAntesVencimiento').val()
		  		}
			})
			.done(function(data) {

				//Html listados
				$('#reasignacionCargandoAlert').hide();
				$('.loadingRadicados').hide();
				$('#tablaRadicados').hide();
				$('#contenidoPanelReasignacion').show();

				$('#reasignacionCorrectaAlert').text(data);
				$('#reasignacionCorrectaAlert').show();

				//Html botón
				$('#botonReasignar').prop("disabled", false);
				$('#botonReasignar').text("Guardar");
				$('#botonReasignar').css("background-color", "#1c4056");

			})

	});