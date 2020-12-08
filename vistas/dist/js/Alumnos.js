/*===================================
CARGAR LA TABLA DINAMICA DE UNIDADES ACADEMICAS
===================================*/




/*$.ajax({
	url:"ajax/tablaUnidadesAcademicas.ajax.php",
	success: function(respuesta){
		$('.TablaAlumnos').append(respuesta);
		console.log(respuesta);
	}
 
});*/

$('.TablaAlumnos').DataTable({
	"ajax":"ajax/tablaAlumnos.ajax.php",
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
REVISAR SI Alumno YA EXISTE
===================================*/

	$(".validarAlumno").change(function(){

		$(".alert").remove();
		var alumno = $(this).val();
		var datos = new FormData();
		datos.append("validarAlumno", alumno);


		$.ajax({
			url:"ajax/alumnos.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData:false,
			success: function(respuesta){
				if(respuesta == "true"){
					$(".validarAlumno").parent().after('<div class="alert alert-warning">El Alumno ya existe</div>');
					$(".validarAlumno").val("");
				}
			}
			
		})

	})

	/*===================================
ACTIVAR USUARIO
===================================*/

$('.TablaAlumnos').on("click",".btnActivar", function(){

   var IdAlumno = $(this).attr("IdAlumno");
   var estadoAlumno = $(this).attr("estadoAlumno");

   var datos = new FormData();
   datos.append("IdAlumno", IdAlumno);
   datos.append("estadoAlumno", estadoAlumno);
   $.ajax({
	   url:"ajax/alumnos.ajax.php",
	   method: "POST",
	   data: datos,
	   cache: false,
	   contentType: false,
	   processData:false,
	   success: function(respuesta){

		   console.log(respuesta);
	   }
   });


   if(estadoAlumno ==0){
	   $(this).removeClass('btn-success');
	   $(this).addClass('btn-danger');
	   $(this).html('Desactivado');
	   $(this).attr('estadoAlumno', 1);
   } else {
	   $(this).removeClass('btn-danger');
	   $(this).addClass('btn-success');
	   $(this).html('Activado');
	   $(this).attr('estadoAlumno', 0);
   }

})

	/*===================================
EDITAR ALUMNOS
===================================*/


$('.TablaAlumnos').on("click", ".btnEditarAlumno", function(){
	
	var idAlumno = $(this).attr("IdAlumno");
	
	var datos = new FormData();

	datos.append("IdAlumno", idAlumno);
	
 
 	$.ajax({
	   url: "ajax/alumnos.ajax.php",
	   method: "POST",
	   data: datos,
	   cache: false,
	   contentType: false,
	   processData: false,
	   dataType: "json",
	   success: function(respuesta){
		   $("#IdAlumno").val(respuesta["IdAlumno"]);
			$("#IdAlumno2").val(respuesta["IdAlumno"]);
			$("#NomAlumno").val(respuesta["NomAlumno"]);
			$("#Matricula").val(respuesta["Matricula"]);
			$("#IdUnidadAcademica").val(respuesta["IdUnidadAcademica"]);
			$("#IdCarrera").val(respuesta["IdCarrera"]);
			$("#IdEspecialidad").val(respuesta["IdEspecialidad"]);
			$("#Turno").val(respuesta["Turno"]);
			$("#Grupo").val(respuesta["IdGrupo"]);
			$("#IdBeca").val(respuesta["IdBeca"]);
			$("#HorasServicioBecario").val(respuesta["HorasServicioBecario"]);
	   }
   })
	
	
	


	/*var datos = new FormData();

	datos.append("IdAlumno", IdAlumno);
	
	$.ajax({
		url:"ajax/alumnos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$("#IdAlumno").val(respuesta["IdAlumno"]);
			$("#NomAlumno").val(respuesta["NomAlumno"]);
			$("#Matricula").val(respuesta["Matricula"]);
			$("#IdUnidadAcademica").val(respuesta["IdUnidadAcademica"]);
			$("#IdCarrera").val(respuesta["IdCarrera"]);
			$("#IdEspecialidad").val(respuesta["IdEspecialidad"]);
			$("#Turno").val(respuesta["Turno"]);
			$("#Grupo").val(respuesta["Grupo"]);
			$("#IdBeca").val(respuesta["IdBeca"]);
			$("#HorasServicioBecario").val(respuesta["HorasServicioBecario"]);
			$("#IdAlumno2").val(respuesta["IdAlumno2"]);
			

		}
	})*/

})



/*===================================
ELIMINAR CATEGORIA
===================================*/

$('.TablaAlumnos').on("click", ".btnEliminarAlumno", function(){
   var IdAlumno = $(this).attr("IdAlumno");
   
   
	   
   swal({
	   title: "¿Está seguro de eliminar el Alumno?",
	   text: "Una vez eliminado no se puede deshacer la operación",
	   type: "warning",
	   showCancelButton: true,
	   confirmButtonColor: '#3085d6',
	   cancelButtonColor: '#d33',
	   cancelButtonText: 'Cancelar',
	   confirmButtonText: 'Eliminar'
   }).then(function(result){

	   if(result.value){
		   window.location = "index.php?ruta=alumnos&IdAlumno="+IdAlumno;
	   }
   })


})