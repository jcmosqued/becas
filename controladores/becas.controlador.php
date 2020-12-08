<?php



class ControladorBecas{

/*================================
	MOSTRAR BECASs
	=================================*/

	static public function ctrMostrarBecas($item, $valor){

		$tabla ="Becas";

		$respuesta = ModeloBecas::mdlMostrarBecas($tabla, $item, $valor);
		return $respuesta;

	}

	/*================================
	EDITAR Becas
	=================================*/

	static public function ctrEditarBeca(){

		if(isset($_POST['EditarNomBeca'])){

			$datos = array(	"IdBeca"=>$_POST["IdBeca"],
							"NomBeca"=>$_POST["EditarNomBeca"]);

			$respuesta = ModeloBecas::mdlEditarBeca("becas", $datos);

			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "La Beca se ha Editado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=becas";
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
								window.location = "index.php?ruta=becas";
							}
						})
					</script>';

			}
		}

		}


	/*================================
	CREAR Becas
	=================================*/

	static public function ctrCrearBeca(){

		if(isset($_POST['NomBeca'])){

			$datos = array("NomBeca"=>$_POST["NomBeca"]);
							

			$respuesta = ModeloBecas::mdlIngresarBeca("becas", $datos);


			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "La beca se ha guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=becas";
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
								window.location = "index.php?ruta=becas";
							}
						})
					</script>';

			}
		}
	}


	/*================================
	ELIMINAR BECAS
	=================================*/

	static public function ctrEliminarBeca(){

		if(isset($_GET["IdBeca"])){

					

			ModeloBecas::mdlEliminarBeca("becas", $_GET["IdBeca"]);

		}

	}

	/*================================
	VALIDAR BECAS
	=================================*/
	static public function ctrValidarBecas($item, $valor){
		$tabla ="becas";

		$respuesta = ModeloBecas::mdlValidarDatos($tabla, $item, $valor);
		return $respuesta;
	}


	
}
