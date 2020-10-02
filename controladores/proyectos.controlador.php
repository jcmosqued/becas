<?php

class ControladorProyectos{

	/*================================
	MOSTRAR PROYECTOS
	=================================*/
	static public function ctrMostrarProyectos($item, $valor){

		$tabla ="Proyectos";

		$respuesta = ModeloProyectos::mdlMostrarProyectos($tabla, $item, $valor);
		return $respuesta;

	}

	/*================================
	INSERTAR PROYECTO
	=================================*/
	static public function ctrInsertarProyecto(){
		if(isset($_POST['nombreProyecto'])){

			$datos = array("NomProyecto"=>$_POST["nombreProyecto"],
						   "IdEmpleado"=>$_POST["idEmpleado"],
						   "IdArea"=>$_POST["idArea"],
						   "Departamento"=>$_POST["departamento"],
						   "TipoActividades"=>$_POST["tipoActividades"],
						   "EspecificarActividades"=>$_POST["especificarActividades"],
						   "IdCuatrimestre"=>$_POST["idCuatrimestre"],
						   "FechaInicio"=>$_POST["fechaInicio"],
						   "Duracion"=>$_POST["duracion"],
						   "CantidadAlumnos"=>$_POST["cantidadAlumnos"],
						   "Sexo"=>$_POST["sexo"],
						   "CarrerasPreferentes"=>$_POST["carrerasPreferentes"],
						   "Observaciones"=>$_POST["observaciones"]);

			$respuesta = ModeloProyectos::mdlIngresarProyecto("Proyectos", $datos);

			if ( $respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El Proyecto se ha guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=proyectos";
							}
						})
					</script>';
			} else {
				echo '<script>
					swal({
						type: "error",
						title: "El registro no se guardo, intentalo nuevamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=proyectos";
							}
						})
					</script>';

			}
		}

	}

	/*================================
	EDITAR PROYECTO
	=================================*/
	static public function ctrEditarProyecto(){

		if(isset($_POST['EditarNomProyecto'])){

			$datos = array(	"IdProyecto"=>$_POST["IdProyecto"],
							"NomProyecto"=>$_POST["EditarNomProyecto"],
							"IdEmpleado"=>$_POST["EditarIdEmpleado"],
							"IdArea"=>$_POST["EditarIdArea"],
							"Departamento"=>$_POST["EditarDepartamento"],
							"TipoActividades"=>$_POST["EditarTipoActividades"],
							"EspecificarActividades"=>$_POST["EditarEspecificarActividades"],
							"IdCuatrimestre"=>$_POST["EditarIdCuatrimestre"],
							"FechaInicio"=>$_POST["EditarFechaInicio"],
							"Duracion"=>$_POST["EditarDuracion"],
							"CantidadAlumnos"=>$_POST["EditarCantidadAlumnos"],
							"Sexo"=>$_POST["EditarSexo"],
							"CarrerasPreferentes"=>$_POST["EditarCarrerasPreferentes"],
							"Observaciones"=>$_POST["EditarObservaciones"],
							"Estatus"=>$_POST["EditarEstatus"]);

			$respuesta = ModeloProyectos::mdlEditarProyecto("Proyectos", $datos);

			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El proyecto se ha guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=proyectos";
							}
						})
					</script>';
			} else {
				echo '<script>
					swal({
						type: "error",
						title: "El registro no se guardo, intentalo nuevamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=proyectos";
							}
						})
					</script>';
			}

		}		

	}

	/*================================
	ELIMINAR CUATRIMESTRE
	=================================*/
	static public function ctrEliminarCuatrimestre(){

		if(isset($_GET["IdCuatrimestre"])){

			ModeloCuatrimestres::mdlEliminarCuatrimestre("Cuatrimestres", $_GET["IdCuatrimestre"]);

		}

	}
}