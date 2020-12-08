<?php



class ControladorAreas{

/*================================
	MOSTRAR AREAS
	=================================*/

	static public function ctrMostrarAreas($item, $valor){

		$tabla ="areas";

		$respuesta = ModeloAreas::mdlMostrarAreas($tabla, $item, $valor);
		return $respuesta;

	}

	/*================================
	EDITAR AREAS
	=================================*/

	static public function ctrEditarAreas(){

		if(isset($_POST['editarNombreArea'])){

			$datos = array(	"IdArea"=>$_POST["IdArea"],
							"NomArea"=>$_POST["editarNombreArea"]);

			$respuesta = ModeloAreas::mdlEditarAreas("areas", $datos);

			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El Area se ha Editado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=areas";
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
								window.location = "index.php?ruta=areas";
							}
						})
					</script>';

			}
		}

		}


	/*================================
	VALIDAR AREAS
	=================================*/
	static public function ctrValidarAreas($item, $valor){
		$tabla ="areas";

		$respuesta = ModeloAreas::mdlValidarDatos($tabla, $item, $valor);
		return $respuesta;
	}



	/*================================
	CREAR AREAS
	=================================*/

	static public function ctrCrearAreas(){

		if(isset($_POST['NomArea'])){

			$datos = array("NomArea"=>$_POST["NomArea"]);
							

			$respuesta = ModeloAreas::mdlIngresarAreas("areas", $datos);


			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El Area se ha Guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=areas";
							}
						})
					</script>';
			} else {
				echo '<script>
					swal({
						type: "error",
						title: "El registro no se Guardo, intentalo nuevamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=areas";
							}
						})
					</script>';

			}
		}
	}


	/*================================
	ELIMINAR Areas
	=================================*/

	static public function ctrEliminarAreas(){

		if(isset($_GET["IdArea"])){

					

			ModeloAreas::mdlEliminarAreas("areas", $_GET["IdArea"]);

		}

	}


	
}
