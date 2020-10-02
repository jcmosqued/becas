/*===================================
CARGAR LA TABLA DINAMICA DE UNIDADES ACADEMICAS
===================================*/




/*$.ajax({
	url:"ajax/tablaUnidadesAcademicas.ajax.php",
	success: function(respuesta){
		$('.TablaUnidadesAcademicas').append(respuesta);
		console.log(respuesta);
	}
 
});*/

$('.TablaUnidadesAcademicas').DataTable({
	"ajax":"ajax/tablaUnidadesAcademicas.ajax.php",
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
REVISAR SI EL UNIDADES ACADEMICAS YA EXISTE
===================================*/

	$(".validarUnidadAcademica").change(function(){

		$(".alert").remove();
		var unidadAcademica = $(this).val();
		var datos = new FormData();
		datos.append("validarUnidadAcademica", unidadAcademica);


		$.ajax({
			url:"ajax/unidadesAcademicas.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData:false,
			success: function(respuesta){
				console.log(respuesta);
				if(respuesta != "false"){
					$(".validarUnidadAcademica").parent().after('<div class="alert alert-warning">El usuario ya existe</div>');
					$(".validarUnidadAcademica").val("");
				}
			}
			
		})

	})

	/*===================================
EDITAR UNIDADES ACADEMICAS
===================================*/


$('.TablaUnidadesAcademicas').on("click", ".btnEditarUnidadAcademica", function(){
	
	var IdUnidadAcademica = $(this).attr("IdUnidadAcademica");
	var NomUnidadAcademica = $(this).attr("NomUnidadAcademica");
	
	$("#IdUnidadAcademica").val(IdUnidadAcademica);
	$("#IdUnidadAcademica2").val(IdUnidadAcademica);
	$("#NomUnidadAcademica").val(NomUnidadAcademica);


	/*var datos = new FormData();

	datos.append("IdUnidadAcademica", IdUnidadAcademica);
	
	$.ajax({
		url:"ajax/unidadesAcademicas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$("#IdUnidadAcademica").val(respuesta["IdUnidadAcademica"]);
			$("#NomUnidadAcademica").val(respuesta["NomUnidadAcademica"]);
			

		}
	})*/

})



/*===================================
ELIMINAR CATEGORIA
===================================*/

$('.TablaUnidadesAcademicas').on("click", ".btnEliminarUnidadAcademica", function(){
   var IdUnidadAcademica = $(this).attr("IdUnidadAcademica");
   
   
	   
   swal({
	   title: "¿Está seguro de elimnar la Unidad Academica?",
	   text: "Una vez eliminado no se puede deshacer la operación",
	   type: "warning",
	   showCancelButton: true,
	   confirmButtonColor: '#3085d6',
	   cancelButtonColor: '#d33',
	   cancelButtonText: 'Cancelar',
	   confirmButtonText: 'Eliminar'
   }).then(function(result){

	   if(result.value){
		   window.location = "index.php?ruta=unidadesacademicas&IdUnidadAcademica="+IdUnidadAcademica;
	   }
   })


})