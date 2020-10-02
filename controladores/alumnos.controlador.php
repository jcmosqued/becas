<?php

class ControladorAlumnos{
	/*================================
	MOSTRAR ALUMNOS
	=================================*/

	static public function ctrMostrarAlumnos($item, $valor){

		//$tabla ="usuarios";
		$tabla ="Alumnos";

		$respuesta = ModeloAlumnos::mdlMostrarAlumnos($tabla, $item, $valor);
		return $respuesta;

	}


	/*================================
	CREAR Alumnos
	=================================*/

	static public function ctrCrearAlumno(){

		if(isset($_POST['NomAlumno'])){

			

			$datos = array("NomAlumno"=>$_POST["NomAlumno"],
							"Matricula"=>$_POST["Matricula"],
							"IdUnidadAcademica"=>$_POST["IdUnidadAcademica"],
							"IdCarrera"=>$_POST["IdCarrera"],
							"IdEspecialidad"=>$_POST["IdEspecialidad"],
							"Turno"=>$_POST["Turno"],
							"Grupo"=>$_POST["Grupo"],
							"IdBeca"=>$_POST["IdBeca"],
							"HorasServicioBecario"=>$_POST["HorasServicioBecario"]);

							

			$respuesta = ModeloAlumnos::mdlIngresarAlumno("alumnos", $datos);
			


			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El usuario se ha guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=alumnos";
							}
						})
					</script>';
			}
			if($respuesta == "error"){
				echo '<script>
					swal({
						type: "error",
						title: "El registro no se guardo, intentalo nuevamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=alumnos";
							}
						})
					</script>';
			}

		}		
	}

	/*================================
	EDITAR ALUMNO
	=================================*/

	static public function ctrEditarAlumno(){

		if(isset($_POST['editarNomNombre'])){

			$datos = array("IdAlumno"=>$_POST["IdAlumno"],
			"NomAlumno"=>$_POST["editarNomNombre"],
			"Matricula"=>$_POST["Matricula"],
			"IdUnidadAcademica"=>$_POST["IdUnidadAcademica"],
			"IdCarrera"=>$_POST["IdCarrera"],
			"IdEspecialidad"=>$_POST["IdEspecialidad"],
			"Turno"=>$_POST["Turno"],
			"Grupo"=>$_POST["Grupo"],
			"IdBeca"=>$_POST["IdBeca"],
			"HorasServicioBecario"=>$_POST["HorasServicioBecario"]);

			$respuesta = ModeloAlumnos::mdlEditarAlumno("alumnos", $datos);


			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El alumno se ha guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=alumnos";
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
								window.location = "index.php?ruta=alumnos";
							}
						})
					</script>';

			}

		}		

	}

	/*================================
	ELIMINAR ALUMNO
	=================================*/

	static public function ctrEliminarAlumno(){

		if(isset($_GET["IdAlumno"])){

			

			ModeloAlumnos::mdlEliminarAlumno("alumnos", $_GET["IdAlumno"]);

		}

	}
}