jQuery(document).ready(function ($) {

	$('.loadingRadicados').show();
	$('#tablaRadicados').hide();

	/*** Display none para las listas de reasignar ***/
	$('#footerReasignar').hide();
	$('.loadingDependenciaReasigna').hide();
	$('.contenidoDependenciaReasigna').hide();
	$('.loadingusuariosReasigna').hide();
	$('.contenidousuariosReasigna').hide();

	$.ajax({
		method: "POST",
		url: "expedienteProcess.php",
		data: { type: 100, infoExpediente: $('#infoUsuario').val() }
	})
		.done(function (html) {
			$('#tablaRadicadosContenido').DataTable().destroy();
			$('#tbdoyLoadData').html(html);
			$('#tablaRadicadosContenido').DataTable({
				language: {
					"sProcessing": "Procesando...",
					"sLengthMenu": "Mostrar _MENU_ registros",
					"sZeroRecords": "No se encontraron resultados",
					"sEmptyTable": "No se encontraron resultados",
					"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix": "",
					"sSearch": "Buscar avanzado: ",
					"sUrl": "",
					"sInfoThousands": ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst": "Primero",
						"sLast": "Último",
						"sNext": "Siguiente",
						"sPrevious": "Anterior"
					},
					"oAria": {
						"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
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
					{ "bSortable": false }
				],
				"pageLength": 150
			}).draw();

			$('.loadingRadicados').hide();
			$('#tablaRadicados').show();

			radicadosSeleccionados = [];
			$('#selectAllRadicados').prop('checked', false);
		});

	//Valida serie seleccionada
	$('body').on('change', '#codserie', function() {
		$.ajax({
			method: "POST",
			url: "expedienteProcess.php",
			data: { type: 2, codserie: $('#codserie').val() }
		})
		.done(function(html) {
			$('#loadusuariosReasigna').html(html);
		})
	});

	//Valida serie seleccionada
	$('body').on('change', '#tsub', function() {

		var tsub = $('#tsub').val();
		var codserie = $('#codserie').val();
		var anoExp = $('#anoExp').val();
		var depExp = $('#depExp').val();
		var consecutivoExp = $('#consecutivoExp').val();
		var digCheckExp = $('#digCheckExp').val();

		$('#trdExp').val(String(codserie).padStart(2, '0')+String(tsub).padStart(2, '0'));
		$('#numexp').html(anoExp+depExp+$('#trdExp').val()+consecutivoExp+digCheckExp);
		$('#numeroExpediente').val(anoExp+depExp+$('#trdExp').val()+consecutivoExp+digCheckExp);
	});

	//Elimina campo para el subexpediente 
	$("#delete-more").click(function () {
		var nFilas = $("#test>tbody tr").length;
		if(nFilas >= 2){
			$('#test>tbody tr:last-child').remove();
		}
	});

	//Agrega campo para el subexpediente
	$("#agregar").click(function () {
		var nFilas = $("#test tr").length;
		if(nFilas <= 3){
			$("#test>tbody").append("<tr id='"+nFilas+"'><td width='13%' height='25' class='titulos5' align='left'>Nombre de subcarpeta:</td><td width='30%'><input type='text' class='form-control' name='subnombre[]' id='subnombre"+nFilas+"' required='true'/></td></tr>");
		}
	});

	//guarda la información del expediente que se esta creando
	$("#procesar").click(function () {
		var codSerie = $('#codserie').val();
		var codSubserie = $('#tsub').val();
		var numExpediente = $('#numeroExpediente').val();
		var usuaResposanble = $('#usuaDocExp').val();
		var nombExpediente = $('#parExp').val();
		var subCarpetas2 = $('#subnombre2').val();
		var subCarpetas3 = $('#subnombre3').val();

		if(codSerie == 0 || codSubserie == 0 || numExpediente == '' || usuaResposanble == 0 || nombExpediente == ''){
			alert('Debe seleccionar o diligenciar todos los campos que se muestran en el formulario por favor.');
		}else{

			$.ajax({
				method: "POST",
				url: "expedienteProcess.php",
				data: { 
					type: 3, codSerie: codSerie, codSubserie: codSubserie, numExpediente: numExpediente, 
					usuaResposanble: usuaResposanble, nombExpediente: nombExpediente, subCarpetas2: subCarpetas2, subCarpetas3: subCarpetas3
				}
			})
			.done(function(html) {
				var res = html.split(" | ");

				if(res[0] == true){
					window.close();
					alert('Se creo correctamente el expediente');
				}else{
					alert('Error: '+res[1]);
				}
				
			})

		}

		
	});

	//Valida serie seleccionada
	$('body').on('change', '#nombreExpediente', function() {

		$.ajax({
			method: "POST",
			url: "expedienteProcess.php",
			data: { type: 5, numeroExpediente: $('#numeroExpediente').val(), nombExpediente: $('#nombreExpediente').val() }
		})
		.done(function(html) {
			$('#loadSubcarpetas').html(html);
		})
	});
});

function crearexpediente(){
	window.open("../expediente/formularioExpediente.php", "height=600,width=750,scrollbars=yes");
}

function visualizarexpediente(expediente){
	
	//$("#transfeModal").modal("hide");
	$.ajax({
		method: "POST",
		url: "expedienteProcess.php",
		data: {  type: 4, expediente: expediente }
	})
	.done(function(html) {
		$('#tableRadicados').html(html);
	})

    $("#myModalExpediente").modal();
}

function visualizarhistorico(expediente){
	
	//$("#transfeModal").modal("hide");
	$.ajax({
		method: "POST",
		url: "expedienteProcess.php",
		data: {  type: 6, expediente: expediente }
	})
	.done(function(html) {
		$('#tableHistorico').html(html);
	})

    $("#myModalExpedienteHistorico").modal();
}

/////// funcionalidad nueva ////////////////
document.addEventListener('DOMContentLoaded', function(){
    console.log(document.querySelector('#button-crear-subnivel-1'));
    document.querySelector('#button-crear-subnivel-1').addEventListener('click', function(){
		document.querySelector('#contenedor-subnivel-1').appendChild(makeSubfolder('subnivel1[]', 'subnivel 1'));
    });

	/*let addButtons = document.querySelectorAll('.add-folder-button');
	deleteButtons.forEach(element => {
		element.addEventListener('click', function(event){
			event.preventDefault();
		});
	});

	let deleteButtons = document.querySelectorAll('.delete-folder-button');
	deleteButtons.forEach(element => {
		element.addEventListener('click', function(event){
			event.preventDefault();
		});
	});*/
});

function makeSubfolder(subnivel, labelText){
    let row = document.createElement('div');
    row.classList.add('row');
    row.setAttribute('name', subnivel);
    row.appendChild(addLabel(labelText));
    row.appendChild(addInput(subnivel, 'text', 'contenedor-subnivel-1'));
    row.appendChild(addButton('Eliminar subnivel1', 'delete', row));
    row.appendChild(addButton('Crear subnivel2', 'add', row));
    row.appendChild(addContenedorSubnivel('contenedor-subnivel-2'));
    //crear el espacio para el siguiente nivel si es 1

   return row;
}

function addLabel(labelText){
    let divLabel = document.createElement('div');
    divLabel.classList.add('col-md-3');
    let label = document.createElement('label');
    label.innerHTML = labelText;
    divLabel.appendChild(label);
    return divLabel;
}

function addInput(nombre, tipo, clase){
    let div = document.createElement('div');
    div.classList.add('col-md-5');
    let input = document.createElement('input');
    input.classList.add('form-control', clase);
    input.setAttribute('name', nombre);
    input.setAttribute('type', tipo);
    div.appendChild(input);
    
    return div;
}

function addButton(text, type, element){
    let div = document.createElement('div');
    div.classList.add('col-md-2');
    let button = document.createElement('button');
    button.innerHTML = text;

	button.setAttribute('type', 'button');

    button.addEventListener('click', function(event){
        event.preventDefault();
        
		if(type == 'delete'){
			button.classList.add('delete-folder-button');
            deleteSubnivel(element);
        }else if(type == 'add'){
			button.classList.add('add-folder-button');
            addSubnivel2(element);
        }
        
    });
    div.appendChild(button);
    return div;
}

function addContenedorSubnivel(identificador){
    let div = document.createElement('div');
    div.classList.add('col-md-12', identificador);
    return div;
}

function deleteSubnivel(element){
    element.remove();
}

function addSubnivel2(element){
    let row = document.createElement('div');
    row.classList.add('row');
    row.appendChild(addLabel('Subnivel 2'));
    row.appendChild(addInput('subnivel2[]', 'text'));
    row.appendChild(addButton('Eliminar subnivel 2', 'delete', row));
    //row.appendChild(addButton('Crear subnivel2', 'add', row));
    let cantidadContenedoresSubnivel1 = document.querySelectorAll('.contenedor-subnivel-1').length;
    console.log('ccn1: ', cantidadContenedoresSubnivel1);
    //console.log(document.querySelectorAll('.contenedor-subnivel-2')[cantidadContenedoresSubnivel1-1]);
    //document.querySelectorAll('.contenedor-subnivel-2')[cantidadContenedoresSubnivel1-1].appendChild(row);
    element.querySelector('.contenedor-subnivel-2').appendChild(row);
}


////// fin funcionalidad nueva ////////////