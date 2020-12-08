<?php

class ControladorAlumnos{
	/*================================
	MOSTRAR ALUMNOS
	=================================*/

	static public function ctrMostrarAlumnos($item, $valor){

		//$tabla ="usuarios";
		$tabla ="alumnos";

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
							"IdGrupo"=>$_POST["Grupo"],
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
			"IdGrupo"=>$_POST["Grupo"],
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

	/*================================
	VALIDAR ALUMNOS
	=================================*/
	static public function ctrValidarAlumnos($item, $valor){
		$tabla ="alumnos";

		$respuesta = ModeloAlumnos::mdlValidarDatos($tabla, $item, $valor);
		return $respuesta;

	}


	/*================================
	Listas
	=================================*/

	static public function ctrCargarListaUnidadAcademicas(){
		$tabla = "unidadesacademicas";

		$stmt = ModeloAlumnos::mdlCargarListas($tabla);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
     		foreach ($results as $row) {
      			echo "<option value='".$row["IdUnidadAcademica"]."'>".$row["NomUnidadAcademica"]."</option>";
    	} 
		}

	}

	static public function ctrCargarListaCarreras(){
		$tabla= "carreras";

		$stmt = ModeloAlumnos::mdlCargarListas($tabla);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
     		foreach ($results as $row) {
      			echo "<option value='".$row["IdCarrera"]."'>".$row["NomCarrera"]."</option>";
    	} 
		}

	}

	static public function ctrCargarListaEspecialidades(){
		$tabla= "especialidades";

		$stmt = ModeloAlumnos::mdlCargarListas($tabla);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
     		foreach ($results as $row) {
      			echo "<option value='".$row["IdEspecialidad"]."'>".$row["NomEspecialidad"]."</option>";
    	} 
		}

	}

	static public function ctrCargarListaBecas(){
		$tabla= "becas";

		$stmt = ModeloAlumnos::mdlCargarListas($tabla);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
     		foreach ($results as $row) {
      			echo "<option value='".$row["IdBeca"]."'>".$row["NomBeca"]."</option>";
    	} 
		}

	}

	static public function ctrCargarListaGrupos(){
		$tabla= "grupos";

		$stmt = ModeloAlumnos::mdlCargarListas($tabla);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
     		foreach ($results as $row) {
      			echo "<option value='".$row["IdGrupo"]."'>".$row["NomGrupo"]."</option>";
    	} 
		}

	}


}