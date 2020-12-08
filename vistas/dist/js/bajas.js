/*===================================
CARGAR LA TABLA DINAMICA DE BAJASs
===================================*/

$('.TablaBajas').DataTable({
	"ajax":"ajax/tablaBajas.ajax.php",
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
REVISAR SI LA BAJA YA EXISTE
===================================*/

$(".validarBaja").change(function(){

		$(".alert").remove();
		var baja = $(this).val();
		var datos = new FormData();
		datos.append("validarBaja", baja);


		$.ajax({
			url:"ajax/bajas.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData:false,
			success: function(respuesta){
				if(respuesta == "true"){
					$(".validarBaja").parent().after('<div class="alert alert-warning">La baja ya existe</div>');
					$(".validarBaja").val("0");
				}
			}
			
		})

	})

	/*===================================
EDITAR BAJAS
===================================*/


$('.TablaBajas').on("click", ".btnEditarBaja", function(){
	
	 var IdBaja = $(this).attr("IdBaja");
   
   var datos = new FormData();

   datos.append("IdBaja", IdBaja);

	$.ajax({
	   url: "ajax/bajas.ajax.php",
	   method: "POST",
	   data: datos,
	   cache: false,
	   contentType: false,
	   processData: false,
	   dataType: "json",
	   success: function(respuesta){  
		$("#IdBaja").val(respuesta["IdBaja"]);
		$("#IdBaja2").val(respuesta["IdBaja"]);
		$("#FechaBaja").val(respuesta["FechaBaja"]);
		$("#IdAlumno").val(respuesta["IdAlumno"]);
		$("#IdEmpleado").val(respuesta["IdEmpleado"]);
		$("#TipoBaja").val(respuesta["TipoBaja"]);
		$("#Alcance").val(respuesta["Alcance"]);
		$("#IdMotivo").val(respuesta["IdMotivo"]);
		$("#Observaciones").val(respuesta["Observaciones"]);
	   }
   })
	
})


/*===================================
ELIMINAR BAJA
===================================*/

$('.TablaBajas').on("click", ".btnEliminarBaja", function(){

   var IdBaja = $(this).attr("IdBaja");
   
   
	   
   swal({
	   title: "¿Está seguro de eliminar la Baja?",
	   text: "Una vez eliminado no se puede deshacer la operación",
	   type: "warning",
	   showCancelButton: true,
	   confirmButtonColor: '#3085d6',
	   cancelButtonColor: '#d33',
	   cancelButtonText: 'Cancelar',
	   confirmButtonText: 'Eliminar'
   }).then(function(result){

	   if(result.value){
		   window.location = "index.php?ruta=bajas&IdBaja="+IdBaja;
	   }
   })


})