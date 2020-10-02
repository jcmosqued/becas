<?php

class ControladorCuatrimestres{

	/*================================
	MOSTRAR CUATRIMESTRES
	=================================*/
	static public function ctrMostrarCuatrimestres($item, $valor){

		$tabla ="Cuatrimestres";

		$respuesta = ModeloCuatrimestres::mdlMostrarCuatrimestres($tabla, $item, $valor);
		return $respuesta;

	}

	/*================================
	INSERTAR CUATRIMESTRE
	=================================*/
	static public function ctrInsertarCuatrimestre(){
		if(isset($_POST['nombreCuatrimestre'])){

			$datos = array("nomCuatrimestre"=>$_POST["nombreCuatrimestre"]);

			$respuesta = ModeloCuatrimestres::mdlIngresarCuatrimestre("Cuatrimestres", $datos);

			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El cuatrimestre se ha guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=cuatrimestres";
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
								window.location = "index.php?ruta=cuatrimestres";
							}
						})
					</script>';

			}
		}

	}

	/*================================
	EDITAR CUATRIMESTRE
	=================================*/
	static public function ctrEditarCuatrimestre(){

		if(isset($_POST['editarNombreCuatrimestre'])){

			$datos = array(	"IdCuatrimestre"=>$_POST["idCuatrimestre"],
							"NomCuatrimestre"=>$_POST["editarNombreCuatrimestre"]);

			$respuesta = ModeloCuatrimestres::mdlEditarCuatrimestre("Cuatrimestres", $datos);

			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El cuatrimestre se ha guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=cuatrimestres";
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
								window.location = "index.php?ruta=cuatrimestres";
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