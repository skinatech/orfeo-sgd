jQuery(document).ready(function($) {
	//Array para almacenar los radicados activos a reasignar
	var radicadosSeleccionados = new Array();

	//Listado de las dependecias se lanza automaticamente al cargar el documento
	$('.loadingDependencias').show();
	$.ajax({
  		method: "POST",
  		url: "reasignacionMasivaProcess.php",
  		data: { type: 100 }
	})
	.done(function(html) {
		$('.loadingDependencias').hide();
		$('#loadDependencias').html(html);
		$('.contenidoDependencias').show();
	});

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

	//Valida la dependencia seleccionada
	$('body').on('change', '#dependenciaReasignaMasiva', function() {
		$('.loadingUsuarios').show();
		$('.contenidoUsuarios').hide();
		$('#tablaRadicados').hide();
		$('#reasignacionCorrectaAlert').hide();

		/*** Display none para las listas de reasignar ***/
		$('#footerReasignar').hide();
		$('.loadingDependenciaReasigna').hide();
		$('.contenidoDependenciaReasigna').hide();
		$('.loadingusuariosReasigna').hide();
		$('.contenidousuariosReasigna').hide();

		if($(this).val() > 0) {
			$.ajax({
		  		method: "POST",
		  		url: "reasignacionMasivaProcess.php",
		  		data: { type: 1, dependencia: $(this).val() }
			})
		  	.done(function(html) {
		    	$('.loadingUsuarios').hide();
		    	$('#loadUsuarios').html(html);
		    	$('.contenidoUsuarios').show();
		  	})
		  	.fail(function(err) {
		  		$('#loadUsuarios').html("No se pueden mostrar resultados");
		  		$('#tablaRadicados').hide();
		  	});

		} else {
			$('.loadingUsuarios').hide();
			$('.contenidoUsuarios').hide();
			$('#tablaRadicados').hide();
		}
	});

	//Valida el usuario seleccionado
	$('body').on('change', '#usuarios', function() {
		$('.loadingRadicados').show();
		$('#tablaRadicados').hide();

		/*** Display none para las listas de reasignar ***/
		$('#footerReasignar').hide();
		$('.loadingDependenciaReasigna').hide();
		$('.contenidoDependenciaReasigna').hide();
		$('.loadingusuariosReasigna').hide();
		$('.contenidousuariosReasigna').hide();

		if($(this).val() != 0) {
			$.ajax({
		  		method: "POST",
		  		url: "reasignacionMasivaProcess.php",
		  		data: { type: 2, usuario: $(this).val(), dependencia: $('#dependenciaReasignaMasiva').val() }
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

		} else {
			$('.loadingRadicados').hide();
			$('#tablaRadicados').hide();
		}
	});

	//Acción para el checkbox del de la cabecera y asi seleccionar todos por listado de pagina
	$('body').on('change', '#selectAllRadicados', function() {
		if($(this).is(':checked')) {
			$('.inputCheckboxRadi').each(function(index, el) {
				$('#' + el.id).prop('checked', true);
				radicadosSeleccionados.push(el.id);
			});


			$('.loadingDependenciaReasigna').show();

			$.ajax({
		  		method: "POST",
		  		url: "reasignacionMasivaProcess.php",
		  		data: { type: 3, dependencia: $('#dependenciaReasignaMasiva').val() }
			})
			.done(function(html) {
				$('.loadingDependenciaReasigna').hide();
				$('#loadDependenciaReasigna').html(html);
				$('.contenidoDependenciaReasigna').show();
			})
			.fail(function(err) {
				$('#footerReasignar').hide();
				$('.loadingDependenciaReasigna').hide();
				$('.contenidoDependenciaReasigna').hide();
				$('.loadingusuariosReasigna').hide();
				$('.contenidousuariosReasigna').hide();
			});

		} else {
			$('.inputCheckboxRadi').each(function(index, el) {
				$('#' + el.id).prop('checked', false);
				var deleteItem = radicadosSeleccionados.indexOf(el.id);
				if(deleteItem != -1) {
					radicadosSeleccionados.splice(deleteItem, 1);
				}
			});

			$('#footerReasignar').hide();
			$('.loadingDependenciaReasigna').hide();
			$('.contenidoDependenciaReasigna').hide();
			$('.loadingusuariosReasigna').hide();
			$('.contenidousuariosReasigna').hide();
		}
	});

	//Valida que registros están seleccionados de la lista de radicados
	$('body').on('change', '.inputCheckboxRadi', function() {
		if($('#' + $(this).attr('id')).is(':checked')) {
			radicadosSeleccionados.push($(this).attr('id'));
		} else {
			var deleteItem = radicadosSeleccionados.indexOf($(this).attr('id'));
			if(deleteItem != -1) {
				radicadosSeleccionados.splice(deleteItem, 1);
			}
		}

		if(radicadosSeleccionados.length == 1) {
			$('.loadingDependenciaReasigna').show();

			$.ajax({
		  		method: "POST",
		  		url: "reasignacionMasivaProcess.php",
		  		data: { type: 3, dependencia: $('#dependenciaReasignaMasiva').val() }
			})
			.done(function(html) {
				$('.loadingDependenciaReasigna').hide();
				$('#loadDependenciaReasigna').html(html);
				$('.contenidoDependenciaReasigna').show();
			})
			.fail(function(err) {
				$('#footerReasignar').hide();
				$('.loadingDependenciaReasigna').hide();
				$('.contenidoDependenciaReasigna').hide();
				$('.loadingusuariosReasigna').hide();
				$('.contenidousuariosReasigna').hide();
			});

		}

		if(radicadosSeleccionados.length == 0) {
			$('#footerReasignar').hide();
			$('.loadingDependenciaReasigna').hide();
			$('.contenidoDependenciaReasigna').hide();
			$('.loadingusuariosReasigna').hide();
			$('.contenidousuariosReasigna').hide();
		}

	});

	//Listar los usuarios una vez se elije dependencia para reasignar
	$('body').on('change', '#selectDependenciaReasignar', function() {
		$('.contenidousuariosReasigna').hide();
		$('.loadingusuariosReasigna').show();

		$.ajax({
	  		method: "POST",
	  		url: "reasignacionMasivaProcess.php",
	  		data: { type: 4, usuario: $('#usuarios').val(), dependenciaReasignar: $(this).val(), dependencia: $('#dependenciaReasignaMasiva').val() }
		})
		.done(function(html) {
			$('.loadingusuariosReasigna').hide();
			$('#loadusuariosReasigna').html(html);
			$('.contenidousuariosReasigna').show();
		})
		.fail(function(err) {
			$('#footerReasignar').hide();
			$('.loadingDependenciaReasigna').hide();
			$('.contenidoDependenciaReasigna').hide();
			$('.loadingusuariosReasigna').hide();
			$('.contenidousuariosReasigna').hide();
		});
	});

	//Muestra el botón para reasignar si se tiene un usuario seleccionado en el campo de usuario a reasignar
	$('body').on('change', '#selectUsuariosReasignar', function() {
		if($(this).val() != 0) {
			$('#footerReasignar').show();
		} else {
			$('#footerReasignar').hide();
		}
	});

	$('#botonReasignar').on('click', function() {
		var confirmReasignaText = $('#confirmReasignaText').val();
		var confirmarReasignacion = confirm(confirmReasignaText);
		if(confirmarReasignacion == true) {
			$(this).prop("disabled", true);
			$(this).text("Cargando...");
			$(this).css("background-color", "slategray");

			$('#contenidoPanelReasignacion').hide();
			$('#reasignacionCargandoAlert').show();

			$.ajax({
		  		method: "POST",
		  		url: "reasignacionMasivaProcess.php",
		  		data: { type: 5, radicadosAreasignar: radicadosSeleccionados, usuarioOrigen: $('#usuarios').val(), dependenciaOrigen: $('#dependenciaReasignaMasiva').val(), usuarioReasignar: $('#selectUsuariosReasignar').val(), dependenciaReasignar: $('#selectDependenciaReasignar').val() }
			})
			.done(function(data) {

				radicadosSeleccionados = []; //Reinicia el array de los radicados seleccionados

				//Valores por defecto

				//Html listados
				$('#reasignacionCargandoAlert').hide();
				$('.loadingDependenciaReasigna').hide();
				$('.loadingUsuarios').hide();
				$('.contenidoUsuarios').hide();
				$('.loadingRadicados').hide();
				$('#tablaRadicados').hide();
				$('#footerReasignar').hide();
				$('.contenidoDependenciaReasigna').hide();
				$('.loadingusuariosReasigna').hide();
				$('.contenidousuariosReasigna').hide();
				$('#contenidoPanelReasignacion').show();

				$('#reasignacionCorrectaAlert').text(data);
				$('#reasignacionCorrectaAlert').show();

				//Html botón
				$('#botonReasignar').prop("disabled", false);
				$('#botonReasignar').text("Reasignar");
				$('#botonReasignar').css("background-color", "#1c4056");

				//Lista las dependecias una vez el proceso fue exitoso
				$('.loadingDependencias').show();
				$.ajax({
			  		method: "POST",
			  		url: "reasignacionMasivaProcess.php",
			  		data: { type: 100 }
				})
				.done(function(html) {
					$('.loadingDependencias').hide();
					$('#loadDependencias').html(html);
					$('.contenidoDependencias').show();
				});
			})

		} else {
	    	$(this).prop("disabled", false);
			$(this).text("Reasignar");
			$(this).css("background-color", "#1c4056");
		}

	});
});