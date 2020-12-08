/*===================================
CARGAR LA TABLA DINAMICA DE ESPECIALIDADES
===================================*/

/*$.ajax({
	url:"ajax/tablaUnidadesAcademicas.ajax.php",
	success: function(respuesta){
		$('.TablaUnidadesAcademicas').append(respuesta);
		console.log(respuesta);
	}
 
});*/

$('.tablaEspecialidades').DataTable({
	"ajax":"ajax/tablaEspecialidades.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing":true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
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
	}

});

/*===================================
EDITAR ESPECIALIDADES
===================================*/
$('.tablaEspecialidades').on("click", ".btnEditarEspecialidad", function(){
	
	var idEspecialidad = $(this).attr("IdEspecialidad");
	var nomEspecialidad = $(this).attr("NomEspecialidad");
	
	$("#IdEspecialidad").val(idEspecialidad);

	var datos = new FormData();

	datos.append("IdEspecialidad", idEspecialidad);
	
	$.ajax({
		url:"ajax/especialidades.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#IdEspecialidad").val(respuesta["IdEspecialidad"]);
			$("#IdEspecialidad2").val(respuesta["IdEspecialidad"]);
			$("#NomEspecialidad").val(respuesta["NomEspecialidad"]);
			$("#IdCarrera").val(respuesta["IdCarrera"]);
			
		}
	})

})

/*===================================
ELIMINAR ESPECIALIDAD
===================================*/
$('.tablaEspecialidades').on("click", ".btnEliminarEspecialidad", function(){

	var IdEspecialidad = $(this).attr("IdEspecialidad");

	swal({
		title: "¿Está seguro de eliminar la Especialidad?",
		text: "Una vez eliminado no se puede deshacer la operación",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Eliminar'
	}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=especialidades&IdEspecialidad="+IdEspecialidad;
		}
	})

})

/*===================================
REVISAR SI LA ESPECIALIDAD YA EXISTE
===================================*/

	$(".validarEspecialidad").change(function(){

		$(".alert").remove();
		var Especialidad = $(this).val();
		var datos = new FormData();
		datos.append("validarEspecialidad", Especialidad);


		$.ajax({
			url:"ajax/especialidades.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData:false,
			success: function(respuesta){
				if(respuesta == "true"){
					$(".validarEspecialidad").parent().after('<div class="alert alert-warning">La Especialidad ya existe</div>');
					$(".validarEspecialidad").val("");
				}
			}
			
		})

	})
