
/*$.ajax({
	url:"ajax/tablaServiciosr.ajax.php",
	success: function(respuesta){
		
		console.log(respuesta);
	}
 
})*/

/*===================================
CARGAR LA TABLA DINAMICA DE USUARIOS
===================================*/

$('.tablaCarreras').DataTable({
	"ajax": "ajax/tablaCarreras.ajax.php",
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
REVISAR SI EL USUARIO YA EXISTE
===================================*/

   $(".validarUsuario").change(function(){

	   $(".alert").remove();
	   var usuario = $(this).val();
	   var datos = new FormData();
	   datos.append("validarUsuario", usuario);


	   $.ajax({
		   url:"ajax/usuarios.ajax.php",
		   method: "POST",
		   data: datos,
		   cache: false,
		   contentType: false,
		   processData:false,
		   success: function(respuesta){
			   console.log(respuesta);
			   if(respuesta != "false"){
				   $(".validarUsuario").parent().after('<div class="alert alert-warning">El usuario ya existe</div>');
				   $(".validarUsuario").val("");
			   }
		   }
		   
	   });

   })




/*===================================
EDITAR CARRERAS
===================================*/

$('.tablaCarreras').on("click", ".btnEditarCarrera", function(){

   var IdCarrera = $(this).attr("IdCarrera");
   
   var datos = new FormData();

   datos.append("IdCarrera", IdCarrera);
   
   $.ajax({
	   url: "ajax/carreras.ajax.php",
	   method: "POST",
	   data: datos,
	   cache: false,
	   contentType: false,
	   processData: false,
	   dataType: "json",
	   success: function(respuesta){
		   $("#IdCarrera").val(respuesta["IdCarrera"]);
		   $("#NomCarrera").val(respuesta["NomCarrera"]);
		   $("#IdUnidadAcademica").val(respuesta["IdUnidadAcademica"]);
		  
		   $("#id1").val(respuesta["IdCarrera"]);
	   }
   })

})


/*===================================
ELIMINAR CATEGORIA
===================================*/

$('.tablaCarreras').on("click", ".btnEliminarCarrera", function(){

   var IdCarrera = $(this).attr("IdCarrera");
   
   
	   
   swal({
	   title: "¿Está seguro de elimnar la carrera?",
	   text: "Una vez eliminado no se puede deshacer la operación",
	   type: "warning",
	   showCancelButton: true,
	   confirmButtonColor: '#3085d6',
	   cancelButtonColor: '#d33',
	   cancelButtonText: 'Cancelar',
	   confirmButtonText: 'Eliminar'
   }).then(function(result){

	   if(result.value){
		   window.location = "index.php?ruta=carreras&IdCarrera="+IdCarrera;
	   }
   })


})
