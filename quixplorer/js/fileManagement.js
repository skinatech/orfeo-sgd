jQuery(document).ready(function($) {
	//Array para almacenar los radicados activos a reasignar
	var radicadosSeleccionados = new Array();

	//Listado de las carpetas base, se lanza automaticamente al cargar el documento
	$('.loadingModulosAyuda').show();
	$.ajax({
  		method: "POST",
  		url: "fileManagementProcess.php",
  		data: { type: 100 }
	})
	.done(function(html) {
		$('.loadingModulosAyuda').hide();
		$('#loadModulosAyuda').html(html);
		$('.contenidoModulosAyuda').show();
	});

	//Lanza datatables
	$('#tableFilesContent').DataTable({
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
            { "bSortable": false },
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true }
        ],
        "pageLength": 150
	});

	//Valida carpeta seleccionada
	$('body').on('change', '#moduloAyuda', function() {
		$('.loadingFilesContent').show();
		$('#tablaFilesContent').hide();
		$('#topMessage').hide();

		$('#carpeta').val( $('#moduloAyuda').val() );

		if($(this).val() != 0) {
			
			recargaDataTable();

		} else {
			$('.loadingFilesContent').hide();
			$('#tablaFilesContent').hide();
			$('.fileManagementForm').hide();
		}
	});

	//Confirmación de eliminación de archivos
	$('#confirmDeleteFile').on('click', function(){
		
		var file = $('#confirmDeleteFile').val();
		$.ajax({
			method: "POST",
			url: "fileManagementProcess.php",
			data: { type: 400, file: file }
		})
		.done(function(html) {
			$('.divDeleteFile').hide();
			$('.fileManagementForm').show();

			recargaDataTable();
			alert('Archivo eliminado correctamente');
		});
	});

	$('#botonSubirArchivo').on('click', function(){
		//Validar peso del archivo
		var fileSize = $('#subirArchivo')[0].files[0].size;
		var upload_max_filesize = $("#MAX_FILE_SIZE").val();
		if (fileSize > upload_max_filesize) {
			alert("El tamaño del archivo no es correcto, se permiten archivos de " + ((upload_max_filesize / 1024) / 1024) + "MB máximo.");
			return false;
		}

		//Validar tipo de archivo 
		var fileInput = document.getElementById('subirArchivo');
		var filePath = fileInput.value;
		var allowedExtensions = /(.pdf|.doc|.docx|.odt)$/i;
		if(!allowedExtensions.exec(filePath)){
			alert('Solo están permitidas las siguientes extensiones: (.pdf .doc .docx y .odt)');
			fileInput.value = '';
			return false;
		}
		
		$('#fileForm').submit();
	});

});

//Función de eliminación
function deleteFile(file) {
	$('#confirmDeleteFile').val(file);
	$('.fileManagementForm').hide();
	$('.divDeleteFile').show();
}

//Regargar datatable
function recargaDataTable() {
	$.ajax({
		method: "POST",
		url: "fileManagementProcess.php",
		data: { type: 200, carpeta: $('#moduloAyuda').val() }
  })
	.done(function(html) {
	  $('.fileManagementForm').show();
	  $('.divDeleteFile').hide();
	  $('#topMessage').hide();

	  $('#tableFilesContent').DataTable().destroy();
	  $('#tbdoyLoadData').html(html);
	  $('#tableFilesContent').DataTable({
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
			  { "bSortable": false },
			  { "bSortable": true },
			  { "bSortable": true },
			  { "bSortable": true },
			  { "bSortable": true },
			  { "bSortable": true },
			  { "bSortable": true }
		  ],
		  "pageLength": 150
	  }).draw();

	  $('.loadingFilesContent').hide();
	  $('#tablaFilesContent').show();

	  radicadosSeleccionados = [];
	  $('#selectAllFiles').prop('checked', false);
	})
	.fail(function(err) {
		$('.loadingFilesContent').hide();
	});
}