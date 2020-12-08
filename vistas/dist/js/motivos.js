/*===================================
CARGAR LA TABLA DINAMICA DE MOTIVOS
===================================*/


$('.TablaMotivos').DataTable({
	"ajax": "ajax/tablaMotivos.ajax.php",
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
EDITAR MOTIVOSs
===================================*/

$('.TablaMotivos').on("click", ".btnEditarMotivo", function(){

   var IdMotivo = $(this).attr("IdMotivo");
   
   var datos = new FormData();

   datos.append("IdMotivo", IdMotivo);
   
   $.ajax({
	   url: "ajax/motivos.ajax.php",
	   method: "POST",
	   data: datos,
	   cache: false,
	   contentType: false,
	   processData: false,
	   dataType: "json",
	   success: function(respuesta){
		   $("#IdMotivo").val(respuesta["IdMotivo"]);
		   $("#Motivo").val(respuesta["Motivo"]);
		   $("EditarMotivo").val(respuesta["Motivo"]);
		  
		   $("#id1").val(respuesta["IdMotivo"]);
	   }
   })

})

/*===================================
ELIMINAR CATEGORIA
===================================*/

$('.TablaMotivos').on("click", ".btnEliminarMotivo", function(){

   var IdMotivo = $(this).attr("IdMotivo");
   swal({
	   title: "¿Está seguro de eliminar al Motivo?",
	   text: "Una vez eliminado no se puede deshacer la operación",
	   type: "warning",
	   showCancelButton: true,
	   confirmButtonColor: '#3085d6',
	   cancelButtonColor: '#d33',
	   cancelButtonText: 'Cancelar',
	   confirmButtonText: 'Eliminar'
   }).then(function(result){

	   if(result.value){
		   window.location = "index.php?ruta=motivos&IdMotivo="+IdMotivo;
	   }
   })


})

/*===================================
REVISAR SI EL MOTIVO YA EXISTE
===================================*/
	$(".validarMotivo").change(function(){

		$(".alert").remove();
		var motivo = $(this).val();
		var datos = new FormData();
		datos.append("validarMotivo", motivo);


		$.ajax({
			url:"ajax/motivos.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData:false,
			success: function(respuesta){
				if(respuesta == "true"){
					$(".validarMotivo").parent().after('<div class="alert alert-warning">El Motivo ya existe</div>');
					$(".validarMotivo").val("");
				}
			}
			
		})

	})