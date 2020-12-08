<?php

class ControladorMotivos{

	/*================================
	MOSTRAR MOTIVOS
	=================================*/

	static public function ctrMostrarMotivos($item, $valor){

		$tabla ="motivos";

		$respuesta = ModeloMotivos::mdlMostrarMotivos($tabla, $item, $valor);
		return $respuesta;

	}

	/*================================
	EDITAR MOTIVOS
	=================================*/

	static public function ctrEditarMotivos(){

		if(isset($_POST['EditarMotivo'])){

			$datos = array(	"IdMotivo"=>$_POST["IdMotivo"],
							"Motivo"=>$_POST["EditarMotivo"]);

			$respuesta = ModeloMotivos::mdlEditarMotivos("motivos", $datos);

			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El Motivo se ha Editado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=motivos";
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
								window.location = "index.php?ruta=motivos";
							}
						})
					</script>';

			}
		}

		}

		/*================================
	CREAR MOTIVOS
	=================================*/

	static public function ctrCrearMotivos(){

		if(isset($_POST['Motivo'])){

			$datos = array("Motivo"=>$_POST["Motivo"]);
							

			$respuesta = ModeloMotivos::mdlIngresarMotivos("motivos", $datos);


			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El Motivo se ha Guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=motivos";
							}
						})
					</script>';
			} else {
				echo '<script>
					swal({
						type: "error",
						title: "El Motivo no se Guardo, intentalo nuevamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=motivos";
							}
						})
					</script>';

			}
		}
	}


	/*================================
	ELIMINAR Areas
	=================================*/

	static public function ctrEliminarMotivos(){

		if(isset($_GET["IdMotivo"])){

					

			ModeloMotivos::mdlEliminarMotivos("motivos", $_GET["IdMotivo"]);

		}

	}

	/*================================
	VALIDAR MOTIVOS
	=================================*/
	static public function ctrValidarMotivos($item, $valor){
		$tabla ="motivos";

		$respuesta = ModeloMotivos::mdlValidarDatos($tabla, $item, $valor);
		return $respuesta;
	}

}