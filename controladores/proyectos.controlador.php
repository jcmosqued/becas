<?php

class ControladorProyectos{

	/*================================
	MOSTRAR PROYECTOS
	=================================*/
	static public function ctrMostrarProyectos($item, $valor){

		$tabla ="proyectos";

		$respuesta = ModeloProyectos::mdlMostrarProyectos($tabla, $item, $valor);
		return $respuesta;

	}

	/*================================
	INSERTAR PROYECTOs
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

			$datos = array(	"IdProyecto"=>$_POST["IdProyecto2"],
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
	ELIMINAR PROYECTOS
	=================================*/
	static public function ctrEliminarProyecto(){

		if(isset($_GET["IdProyecto"])){

			ModeloProyectos::mdlEliminarProyecto("Proyectos", $_GET["IdProyecto"]);

		}

	}

	/*================================
	Listas
	=================================*/

	static public function ctrCargarListaEmpleados(){
		$tabla = "empleados";

		$stmt = ModeloProyectos::mdlCargarListas($tabla);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
     		foreach ($results as $row) {
      			echo "<option value='".$row["IdEmpleado"]."'>".$row["NomEmpleado"]."</option>";
    	} 
		}

	}

	static public function ctrCargarListaAreas(){
		$tabla = "areas";

		$stmt = ModeloProyectos::mdlCargarListas($tabla);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
     		foreach ($results as $row) {
      			echo "<option value='".$row["IdArea"]."'>".$row["NomArea"]."</option>";
    	} 
		}

	}

	static public function ctrCargarListaCuatrimestres(){
		$tabla = "cuatrimestres";

		$stmt = ModeloProyectos::mdlCargarListas($tabla);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
     		foreach ($results as $row) {
      			echo "<option value='".$row["IdCuatrimestre"]."'>".$row["NomCuatrimestre"]."</option>";
    	} 
		}

	}

	/*================================
	VALIDAR PROYECTOS
	=================================*/
	static public function ctrValidarProyectos($item, $valor){
		$tabla ="proyectos";

		$respuesta = ModeloProyectos::mdlValidarDatos($tabla, $item, $valor);
		return $respuesta;
	}
}