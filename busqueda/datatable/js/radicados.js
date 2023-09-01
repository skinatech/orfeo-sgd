jQuery(document).ready(function($) {
    
    var s_DOCTO = $('#s_DOCTO').val();
    var s_entrada = $('#s_entrada').val();
    var s_desde_dia = $('#s_desde_dia').val();
    var s_desde_mes = $('#s_desde_mes').val();
    var s_desde_ano = $('#s_desde_ano').val();
    var s_hasta_dia = $('#s_hasta_dia').val();
    var s_hasta_mes = $('#s_hasta_mes').val();
    var s_hasta_ano = $('#s_hasta_ano').val();
    var s_TDOC_CODI = $('#s_TDOC_CODI').val();
    var s_RADI_NOMB = $('#s_RADI_NOMB').val();
    var s_RADI_NUME_RADI = $('#s_RADI_NUME_RADI').val();
    var s_RADI_DEPE_ACTU = $('#s_RADI_DEPE_ACTU').val();
    var s_SGD_EXP_SUBEXPEDIENTE = $('#s_SGD_EXP_SUBEXPEDIENTE').val(); 

	$.ajax({	
  		method: "POST",
  		url: "datatable/ajax.php",
  		data: { 
            type: 8, 
            s_DOCTO: s_DOCTO, 
            s_entrada: s_entrada, 
            s_desde_dia: s_desde_dia, 
            s_desde_mes: s_desde_mes, 
            s_desde_ano: s_desde_ano,
            s_hasta_dia: s_hasta_dia,
            s_hasta_mes: s_hasta_mes,
            s_hasta_ano: s_hasta_ano,
            s_TDOC_CODI: s_TDOC_CODI,
            s_RADI_NOMB: s_RADI_NOMB,
            s_RADI_NUME_RADI: s_RADI_NUME_RADI,
            s_RADI_DEPE_ACTU: s_RADI_DEPE_ACTU,
            s_SGD_EXP_SUBEXPEDIENTE: s_SGD_EXP_SUBEXPEDIENTE
        }
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
			        className: 'btn btn-primary2 botones'
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
				{ "bSortable": true }
			],
			"pageLength": 25
		}).draw();

		$('#tablaRadicados').show();

	});

});