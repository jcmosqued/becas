
/*$.ajax({
	url:"ajax/tablaServiciosr.ajax.php",
	success: function(respuesta){
		
		console.log(respuesta);
	}
 
})*/

/*===================================
CARGAR LA TABLA DINAMICA DE USUARIOS
===================================*/

$('.tablaAreas').DataTable({
	"ajax": "ajax/tablaAreas.ajax.php",
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
REVISAR SI EL AREA YA EXISTE
===================================*/

	$(".validarArea").change(function(){

		$(".alert").remove();
		var area = $(this).val();
		var datos = new FormData();
		datos.append("validarArea", area);


		$.ajax({
			url:"ajax/areas.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData:false,
			success: function(respuesta){
				if(respuesta == "true"){
					$(".validarArea").parent().after('<div class="alert alert-warning">El Área ya existe</div>');
					$(".validarArea").val("");
				}
			}
			
		})

	})



/*===================================
EDITAR AREAS
===================================*/

$('.tablaAreas').on("click", ".btnEditarArea", function(){

   var IdArea = $(this).attr("IdArea");
   
   var datos = new FormData();

   datos.append("IdArea", IdArea);
   
   $.ajax({
	   url: "ajax/areas.ajax.php",
	   method: "POST",
	   data: datos,
	   cache: false,
	   contentType: false,
	   processData: false,
	   dataType: "json",
	   success: function(respuesta){
		   $("#IdArea").val(respuesta["IdArea"]);
		   $("#NomArea").val(respuesta["NomArea"]);
		  
		   $("#id1").val(respuesta["IdArea"]);
	   }
   })

})


/*===================================
ELIMINAR CATEGORIA
===================================*/

$('.tablaAreas').on("click", ".btnEliminarArea", function(){

   var IdArea = $(this).attr("IdArea");
   
   
	   
   swal({
	   title: "¿Está seguro de eliminar al Área?",
	   text: "Una vez eliminado no se puede deshacer la operación",
	   type: "warning",
	   showCancelButton: true,
	   confirmButtonColor: '#3085d6',
	   cancelButtonColor: '#d33',
	   cancelButtonText: 'Cancelar',
	   confirmButtonText: 'Eliminar'
   }).then(function(result){

	   if(result.value){
		   window.location = "index.php?ruta=areas&IdArea="+IdArea;
	   }
   })


})
