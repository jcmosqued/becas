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
EDITAR PROYECTO
===================================*/
$('.TablaProyectos').on("click", ".btnEditarProyecto", function(){
	
	var idProyecto = $(this).attr("IdProyecto");
	/*var nomProyecto = $(this).attr("NomProyecto");
	var idEmpleado = $(this).attr("IdEmpleado");
	var idArea = $(this).attr("IdArea");
	var departamento = $(this).attr("Departamento");
	var tipoActividades = $(this).attr("TipoActividades");
	var especificarActividades = $(this).attr("EspecificarActividades");
	var idCuatrimestre = $(this).attr("IdCuatrimestre");
	var fechaInicio = $(this).attr("FechaInicio");
	var duracion = $(this).attr("Duracion");
	var cantidadAlumnos = $(this).attr("CantidadAlumnos");
	var sexo = $(this).attr("Sexo");
	var carrerasPreferentes = $(this).attr("CarrerasPreferentes");
	var observaciones = $(this).attr("Observaciones");
	var estatus = $(this).attr("estatus");*/
	
	$("#IdProyecto").val(idProyecto);
	$("#IdProyecto2").val(idProyecto);
	/*$("#NomProyecto").val(nomProyecto);
	$("#IdEmpleado").val(idEmpleado);
	$("#IdArea").val(idArea);
	$("#Departamento").val(departamento);
	$("#TipoActividades").val(tipoActividades);
	$("#EspecificarActividades").val(especificarActividades);
	$("#IdCuatrimestre").val(idCuatrimestre);
	$("#FechaInicio").val(fechaInicio);
	$("#Duracion").val(duracion);
	$("#CantidadAlumnos").val(cantidadAlumnos);
	$("#Sexo").val(sexo);
	$("#CarrerasPreferentes").val(carrerasPreferentes);
	$("#Observaciones").val(observaciones);
	$("#Estatus").val(estatus);*/

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
			$("#CarrerasPreferentes").val(respuesta["CarrerasPreferentes"]);
			$("#Observaciones").val(respuesta["Observaciones"]);
			$("#Estatus").val(respuesta["Estatus"]);
		
		}
	})

})

/*===================================
ELIMINAR CATEGORIA
===================================*/
/*$('.TablaUnidadesAcademicas').on("click", ".btnEliminarUnidadAcademica", function(){
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


})*/