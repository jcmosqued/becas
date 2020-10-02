<?php

class ControladorEspecialidades{

	/*================================
	MOSTRAR ESPECIALIDADES
	=================================*/
	static public function ctrMostrarEspecialidades($item, $valor){

		$tabla ="Especialidades";

		$respuesta = ModeloEspecialidades::mdlMostrarEspecialidades($tabla, $item, $valor);
		return $respuesta;

	}

	/*================================
	INSERTAR ESPECIALIDAD
	=================================*/
	static public function ctrInsertarEspecialidad(){
		if(isset($_POST['nombreEspecialidad'])){

			$datos = array("idCarrera"=>$_POST["IdCarrera"],
						   "nomEspecialidad"=>$_POST["nombreEspecialidad"]);

			$respuesta = ModeloEspecialidades::mdlIngresarEspecialidad("Especialidades", $datos);

			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "La especialidad se ha guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=especialidades";
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
								window.location = "index.php?ruta=especialidades";
							}
						})
					</script>';

			}
		}

	}

	/*================================
	EDITAR ESPECIALIDAD
	=================================*/
	static public function ctrEditarEspecialidad(){

		if(isset($_POST['EditarNombreEspecialidad'])){

			$datos = array(	"IdEspecialidad"=>$_POST["IdEspecialidad"],/*el nombre cambiara*/
							"NomEspecialidad"=>$_POST["EditarNombreEspecialidad"]);

			$respuesta = ModeloEspecialidades::mdlEditarEspecialidad("Especialidades", $datos);

			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "La especialidad se ha guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=especialidades";
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
								window.location = "index.php?ruta=especialidades";
							}
						})
					</script>';
			}

		}		

	}

	/*================================
	ELIMINAR ESPECIALIDAD
	=================================*/
	static public function ctrEliminarEspecialidad(){

		if(isset($_GET["IdEspecialidad"])){

			ModeloEspecialidades::mdlEliminarEspecialidad("Especialidades", $_GET["IdEspecialidad"]);

		}

	}
}