<?php

class ControladorBajas{

	/*================================
	MOSTRAR BAJAS 
	=================================*/

	static public function ctrMostrarBajas($item, $valor){
		$tabla = "Bajas";

		$respuesta = ModeloBajas::mdlMostrarBajas($tabla, $item, $valor);

		return $respuesta;
	}

	/*================================
	EDITAR BAJAS
	=================================s*/
	static public function ctrEditarBaja(){

		if(isset($_POST['EditarFechaBajas'])){

			$datos = array(	"IdBaja"=>$_POST["IdBaja"],
							"FechaBaja"=>$_POST["EditarFechaBajas"],
							"IdAlumno"=>$_POST["EditarIdAlumno"],
							"IdEmpleado"=>$_POST["EditarIdEmpleado"],
							"TipoBaja"=>$_POST["EditarTipoBaja"],
							"Alcance"=>$_POST["EditarAlcance"],
							"IdMotivo"=>$_POST["EditarIdMotivo"],
							"Observaciones"=>$_POST["EditarObservaciones"]);

			$respuesta = ModeloBajas::mdlEditarBaja("bajas", $datos);

			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "La Baja se ha Editado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=bajas";
							}
						})
					</script>';
			} else {
				echo '<script>
					swal({
						type: "error",
						title: "El registro no se Edito, intentalo nuevamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=bajas";
							}
						})
					</script>';

			}
		}

	}

	/*================================
	VALIDAR BAJAS
	=================================*/
	static public function ctrValidarBajas($item, $valor){
		$tabla ="bajas";

		$respuesta = ModeloBajas::mdlValidarDatos($tabla, $item, $valor);
		return $respuesta;
	}

	/*================================
	CREAR BAJAS
	=================================*/

	static public function ctrCrearBaja(){

		if(isset($_POST['FechaBaja'])){

			$datos = array(	"FechaBaja"=>$_POST["FechaBaja"],
							"IdAlumno"=>$_POST["IdAlumno"],
							"IdEmpleado"=>$_POST["IdEmpleado"],
							"TipoBaja"=>$_POST["TipoBaja"],
							"Alcance"=>$_POST["Alcance"],
							"IdMotivo"=>$_POST["IdMotivo"],
							"IdSubmotivo"=>$_POST["IdSubmotivo"],
							"Observaciones"=>$_POST["Observaciones"]);
							

			$respuesta = ModeloBajas::mdlIngresarBaja("bajas", $datos);


			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "La Baja se ha guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=bajas";
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
								window.location = "index.php?ruta=bajas";
							}
						})
					</script>';

			}
		}
	}

	/*================================
	ELIMINAR BAJAS
	=================================*/

	static public function ctrEliminarBaja(){

		if(isset($_GET["IdBaja"])){

					

			ModeloBajas::mdlEliminarBaja("bajas", $_GET["IdBaja"]);

		}

	}


	/*================================
	Listas
	=================================*/

	static public function ctrCargarListaAlumnos(){
		$tabla = "alumnos";

		$stmt = ModeloBajas::mdlCargarListas($tabla);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
     		foreach ($results as $row) {
      			echo "<option value='".$row["IdAlumno"]."'>".$row["NomAlumno"]."-".$row["Matricula"]."</option>";
    	} 
		}

	}

	static public function ctrCargarListaEmpleados(){
		$tabla = "empleados";

		$stmt = ModeloBajas::mdlCargarListas($tabla);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
     		foreach ($results as $row) {
      			echo "<option value='".$row["IdEmpleado"]."'>".$row["NomEmpleado"]."</option>";
    	} 
		}

	}

	static public function ctrCargarListaMotivos(){
		$tabla = "motivos";

		$stmt = ModeloBajas::mdlCargarListas($tabla);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
     		foreach ($results as $row) {
      			echo "<option value='".$row["IdMotivo"]."'>".$row["Motivo"]."</option>";
    	} 
		}

	}

	static public function ctrCargarListaSubmotivos(){
		$tabla = "submotivos";

		$stmt = ModeloBajas::mdlCargarListas($tabla);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
     		foreach ($results as $row) {
      			echo "<option value='".$row["IdSubmotivo"]."'>".$row["Submotivo"]."</option>";
    	} 
		}

	}
}