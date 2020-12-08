
/*$.ajax({
	url:"ajax/tablaServiciosr.ajax.php",
	success: function(respuesta){
		
		console.log(respuesta);
	}
 
})*/

/*===================================
CARGAR LA TABLA DINAMICA DE CUATRIMESTRES
===================================*/
$('.TablaCuatrimestres').DataTable({
	"ajax": "ajax/tablaCuatrimestres.ajax.php",
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
EDITAR CUATRIMESTRE
===================================*/
$('.TablaCuatrimestres').on("click", ".btnEditarCuatrimestre", function(){

   var idCuatrimestre = $(this).attr("IdCuatrimestre");
   var nomCuatrimestre = $(this).attr("NomCuatrimestre");

   $("#idCuatrimestre").val(idCuatrimestre);
   $("#idCuatrimestre2").val(idCuatrimestre);
   $("#nombreCuatrimestre").val(nomCuatrimestre);
   
   var datos = new FormData();

   datos.append("IdCuatrimestre", idCuatrimestre);
   
   $.ajax({
	   url: "ajax/cuatrimestres.ajax.php",
	   method: "POST",
	   data: datos,
	   cache: false,
	   contentType: false,
	   processData: false,
	   dataType: "json",
	   success: function(respuesta){

		   $("#idUsuario").val(respuesta["IdCuatrimestre"]);
		   $("#idUsuario2").val(respuesta["IdCuatrimestre"]);
		   $("#nombreCuatrimestre").val(respuesta["NomCuatrimestre"]);

	   }
   })

})


/*===================================
ELIMINAR CUATRIMESTRE
===================================*/
$('.TablaCuatrimestres').on("click", ".btnEliminarCuatrimestre", function(){

   var IdCuatrimestre = $(this).attr("idCuatrimestre");
	   
   swal({
	   title: "¿Está seguro de eliminar el Cuatrimestre?",
	   text: "Una vez eliminado no se puede deshacer la operación",
	   type: "warning",
	   showCancelButton: true,
	   confirmButtonColor: '#3085d6',
	   cancelButtonColor: '#d33',
	   cancelButtonText: 'Cancelar',
	   confirmButtonText: 'Eliminar'
   }).then(function(result){

	   if(result.value){
		   window.location = "index.php?ruta=cuatrimestres&IdCuatrimestre="+IdCuatrimestre;
	   }
   })

})

/*===================================
REVISAR SI LA CARRERA YA EXISTE
===================================*/

	$(".validarCuatrimestre").change(function(){

		$(".alert").remove();
		var cuatrimestre = $(this).val();
		var datos = new FormData();
		datos.append("validarCuatrimestre", cuatrimestre);


		$.ajax({
			url:"ajax/cuatrimestres.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData:false,
			success: function(respuesta){
				if(respuesta == "true"){
					$(".validarCuatrimestre").parent().after('<div class="alert alert-warning">El Cuatrimestre ya existe</div>');
					$(".validarCuatrimestre").val("");
				}
			}
			
		})

	})
