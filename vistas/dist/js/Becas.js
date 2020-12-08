/*===================================
CARGAR LA TABLA DINAMICA DE Becas
===================================*/




/*$.ajax({
	url:"ajax/tablaBecas.ajax.php",
	success: function(respuesta){
		$('.TablaBecas').append(respuesta);
		console.log(respuesta);
	}
 
});*/

$('.TablaBecas').DataTable({
	"ajax":"ajax/tablaBecas.ajax.php",
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
REVISAR SI LA BECA YA EXISTE
===================================*/

	$(".validarBeca").change(function(){

		$(".alert").remove();
		var beca = $(this).val();
		var datos = new FormData();
		datos.append("validarBeca", beca);


		$.ajax({
			url:"ajax/becas.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData:false,
			success: function(respuesta){
				if(respuesta == "true"){
					$(".validarBeca").parent().after('<div class="alert alert-warning">La Beca ya existe</div>');
					$(".validarBeca").val("");
				}
			}
			
		})

	})

	/*===================================
EDITAR Becas
===================================*/


$('.TablaBecas').on("click", ".btnEditarBeca", function(){
	
	var IdBeca = $(this).attr("IdBeca");
	var NomBeca = $(this).attr("NomBeca");
	
	$("#IdBeca").val(IdBeca);
	$("#IdBeca2").val(IdBeca);
	$("#NomBeca").val(NomBeca);


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

$('.TablaBecas').on("click", ".btnEliminarBeca", function(){
   var IdBeca = $(this).attr("IdBeca");
   
   
	   
   swal({
	   title: "¿Está seguro de elimnar la Beca?",
	   text: "Una vez eliminado no se puede deshacer la operación",
	   type: "warning",
	   showCancelButton: true,
	   confirmButtonColor: '#3085d6',
	   cancelButtonColor: '#d33',
	   cancelButtonText: 'Cancelar',
	   confirmButtonText: 'Eliminar'
   }).then(function(result){

	   if(result.value){
		   window.location = "index.php?ruta=becas&IdBeca="+IdBeca;
	   }
   })


})