
/*$.ajax({
	url:"ajax/tablaServiciosr.ajax.php",
	success: function(respuesta){
		
		console.log(respuesta);
	}
 
})*/

/*===================================
CARGAR LA TABLA DINAMICA DE USUARIOS
===================================*/

$('.tablaUsuarios').DataTable({
	"ajax": "ajax/tablaUsuarios.ajax.php",
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
ACTIVAR USUARIO
===================================*/

$('.tablaUsuarios').on("click",".btnActivar", function(){

   var idUsuario = $(this).attr("idusuario");
   var estadoUsuario = $(this).attr("estadousuario");

   var datos = new FormData();
   datos.append("idUsuario", idUsuario);
   datos.append("estadoUsuario", estadoUsuario);
   $.ajax({
	   url:"ajax/usuarios.ajax.php",
	   method: "POST",
	   data: datos,
	   cache: false,
	   contentType: false,
	   processData:false,
	   success: function(respuesta){

		   console.log(respuesta);
	   }
   });


   if(estadoUsuario ==0){
	   $(this).removeClass('btn-success');
	   $(this).addClass('btn-danger');
	   $(this).html('Desactivado');
	   $(this).attr('estadoUsuario', 1);
   } else {
	   $(this).removeClass('btn-danger');
	   $(this).addClass('btn-success');
	   $(this).html('Activado');
	   $(this).attr('estadoUsuario', 0);
   }

})


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
			   if(respuesta == "true"){
				   $(".validarUsuario").parent().after('<div class="alert alert-warning">El usuario ya existe</div>');
				   $(".validarUsuario").val("");
			   }
		   }
		   
	   });

   })



/*===================================
SUBIR FOTO DE USUARIO
===================================*/

$('.fotoPortada').change(function(){

   var imagen = this.files[0];

   /*===================================
   SUBIR FOTO DE USUARIO
   ===================================*/

   if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "image/jpg"){
	   $('.fotoPortada').val("");
	   swal({
		   title: "Error al subir la imagen",
		   text: "La imagen debe estar en formato JPG o PNG",
		   type: "error",
		   confirmButtonText: "Cerrar"
	   });

	   return;
   } else if (imagen["size"] > 2000000){
	   $('.fotoPortada').val("");
	   swal({
		   title: "Error al subir la imagen",
		   text: "La imagen debe pesar menos de 2MB",
		   type: "error",
		   confirmButtonText: "Cerrar"
	   });

	   return;
   } else{

	   var datosImagen = new FileReader;
	   datosImagen.readAsDataURL(imagen);
	   $(datosImagen).on("load", function(event){
		   var rutaImagen = event.target.result;
		   $('.previsualizarPortada').attr("src",rutaImagen);

	   })

   }

})

/*===================================
EDITAR USUARIO
===================================*/

$('.tablaUsuarios').on("click", ".btnEditarUsuario", function(){

   var idUsuario = $(this).attr("NumEmpleado");
   
   var datos = new FormData();

   datos.append("NumEmpleado", idUsuario);
   
   $.ajax({
	   url: "ajax/usuarios.ajax.php",
	   method: "POST",
	   data: datos,
	   cache: false,
	   contentType: false,
	   processData: false,
	   dataType: "json",
	   success: function(respuesta){
		   $("#IdEmpleado").val(respuesta["IdEmpleado"]);
		   $("#NomEmpleado").val(respuesta["NomEmpleado"]);
		   $("#NumEmpleado").val(respuesta["NumEmpleado"]);
		   $("#Puesto_Cargo").val(respuesta["Puesto_Cargo"]);
		   $("#Departamento").val(respuesta["Departamento"]);
		   
		   $("#CorreoElectronico").val(respuesta["CorreoElectronico"]);
		   $("#Telefono").val(respuesta["Telefono"]);
		   $("#Ext").val(respuesta["Ext"]);
		   $("#TipoUsuario").val(respuesta["TipoUsuario"]);
		   $("#IdUsuario").val(respuesta["IdUsuario"]);
		   $("#IdEmpleado2").val(respuesta["IdEmpleado"]);
	   }
   })

})


/*===================================
ELIMINAR CATEGORIA
===================================*/

$('.tablaUsuarios').on("click", ".btnEliminarUsuario", function(){

   var IdEmpleado = $(this).attr("IdEmpleado");
   var IdUsuario = $(this).attr("IdUsuario");
   
	   
   swal({
	   title: "¿Está seguro de eliminar al Usuario?",
	   text: "Una vez eliminado no se puede deshacer la operación",
	   type: "warning",
	   showCancelButton: true,
	   confirmButtonColor: '#3085d6',
	   cancelButtonColor: '#d33',
	   cancelButtonText: 'Cancelar',
	   confirmButtonText: 'Eliminar'
   }).then(function(result){

	   if(result.value){
		   window.location = "index.php?ruta=empleados&IdEmpleado="+IdEmpleado+"&IdUsuario="+IdUsuario;
	   }
   })


})
