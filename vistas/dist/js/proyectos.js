/*===================================
CARGAR LA TABLA DINAMICA DE PROYECTOS
===================================*/
/*$.ajax({
	url:"ajax/tablaUnidadesAcademicas.ajax.php",
	success: function(respuesta){
		$('.TablaUnidadesAcademicas').append(respuesta);
		console.log(respuesta);
	}
 
});*/

$('.TablaProyectos').DataTable({
	"ajax":"ajax/tablaProyectos.ajax.php",
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
ACTIVAR PROYECTO
===================================*/
$('.TablaProyectos').on("click",".btnActivar", function(){

   var idProyecto = $(this).attr("idProyecto");
   var estadoProyecto = $(this).attr("estadoProyecto");

   var datos = new FormData();
   datos.append("idProyecto", idProyecto);
   datos.append("estadoProyecto", estadoProyecto);
   $.ajax({
	   url:"ajax/proyectos.ajax.php",
	   method: "POST",
	   data: datos,
	   cache: false,
	   contentType: false,
	   processData:false,
	   success: function(respuesta){

		   console.log(respuesta);
	   }
   });

   if(estadoProyecto == 0){
	   $(this).removeClass('btn-success');
	   $(this).addClass('btn-danger');
	   $(this).html('Desactivado');
	   $(this).attr('estadoProyecto', 1);
   } else {
	   $(this).removeClass('btn-danger');
	   $(this).addClass('btn-success');
	   $(this).html('Activado');
	   $(this).attr('estadoProyecto', 0);
   }

})

/*===================================
REVISAR SI EL PROYECTO YA EXISTE
===================================*/
	$(".validarProyecto").change(function(){

		$(".alert").remove();
		var proyecto = $(this).val();
		var datos = new FormData();
		datos.append("validarProyecto", proyecto);


		$.ajax({
			url:"ajax/proyectos.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData:false,
			success: function(respuesta){
				if(respuesta == "true"){
					$(".validarProyecto").parent().after('<div class="alert alert-warning">El Proyecto ya existe</div>');
					$(".validarProyecto").val("");
				}
			}
			
		})

	})

/*===================================
EDITAR PROYECTOS
===================================*/
$('.TablaProyectos').on("click", ".btnEditarProyecto", function(){
	
	var idProyecto = $(this).attr("IdProyecto");
	
	$("#IdProyecto").val(idProyecto);
	$("#IdProyecto2").val(idProyecto);

	var datos = new FormData();

	datos.append("IdProyecto", idProyecto);
	
	$.ajax({
		url:"ajax/proyectos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			//$("#IdUnidadAcademica").val(respuesta["IdUnidadAcademica"]);
			//$("#NomUnidadAcademica").val(respuesta["NomUnidadAcademica"]);
			$("#IdProyecto").val(respuesta["IdProyecto"]);
			//$("#IdProyecto2").val(respuesta["NomUnidadAcademica"]);
			$("#NomProyecto").val(respuesta["NomProyecto"]);
			$("#IdEmpleado").val(respuesta["IdEmpleado"]);
			$("#IdArea").val(respuesta["IdArea"]);
			$("#Departamento").val(respuesta["Departamento"]);
			$("#TipoActividades").val(respuesta["TipoActividades"]);
			$("#EspecificarActividades").val(respuesta["EspecificarActividades"]);
			$("#IdCuatrimestre").val(respuesta["IdCuatrimestre"]);
			$("#FechaInicio").val(respuesta["FechaInicio"]);
			$("#Duracion").val(respuesta["Duracion"]);
			$("#CantidadAlumnos").val(respuesta["CantidadAlumnos"]);
			$("#Sexo").val(respuesta["Sexo"]);
			$("#CarrerasPreferentes").val(respuesta["CarrerasPreferidas"]);
			$("#Observaciones").val(respuesta["Observaciones"]);
			$("#Estatus").val(respuesta["Estatus"]);
		
		}
	})

})

/*===================================
ELIMINAR PROYECTOS
===================================*/
$('.TablaProyectos').on("click", ".btnEliminarProyecto", function(){

   var IdProyecto = $(this).attr("IdProyecto");
	   
   swal({
	   title: "¿Está seguro de eliminar el Proyecto?",
	   text: "Una vez eliminado no se puede deshacer la operación",
	   type: "warning",
	   showCancelButton: true,
	   confirmButtonColor: '#3085d6',
	   cancelButtonColor: '#d33',
	   cancelButtonText: 'Cancelar',
	   confirmButtonText: 'Eliminar'
   }).then(function(result){

	   if(result.value){
		   window.location = "index.php?ruta=proyectos&IdProyecto="+IdProyecto;
	   }
   })


})