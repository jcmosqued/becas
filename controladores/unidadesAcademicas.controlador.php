<?php



class ControladorUnidadesAcademicas{

/*================================
	MOSTRAR UNIDADES ACADEMICAS
	=================================*/

	static public function ctrMostrarUnidadesAcademicas($item, $valor){

		$tabla ="UnidadesAcademicas";

		$respuesta = ModeloUnidadesAcademicas::mdlMostrarUnidadesAcademicas($tabla, $item, $valor);
		return $respuesta;

	}

	/*================================
	EDITAR UNIDADES ACADEMICAS
	=================================*/

	static public function ctrEditarUnidadAcademica(){

		if(isset($_POST['EditarNomUnidadAcademica'])){

			$datos = array(	"IdUnidadAcademica"=>$_POST["IdUnidadAcademica"],
							"NomUnidadAcademica"=>$_POST["EditarNomUnidadAcademica"]);

			$respuesta = ModeloUnidadesAcademicas::mdlEditarUnidadAcademica("unidadesacademicas", $datos);

			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "La Unidad Academica se ha Editado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=unidadesacademicas";
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
								window.location = "index.php?ruta=unidadesacademicas";
							}
						})
					</script>';

			}
		}

		}


	/*================================
	CREAR UNIDADES ACADEMICAS
	=================================*/

	static public function ctrCrearUnidadAcademica(){

		if(isset($_POST['NomUnidadAcademica'])){

			$datos = array("NomUnidadAcademica"=>$_POST["NomUnidadAcademica"]);
							

			$respuesta = ModeloUnidadesAcademicas::mdlIngresarUnidadAcadmica("unidadesacademicas", $datos);


			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El usuario se ha guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=unidadesacademicas";
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
								window.location = "index.php?ruta=unidadesacademicas";
							}
						})
					</script>';

			}
		}
	}


	/*================================
	ELIMINAR UNIDAD ACADEMICA
	=================================*/

	static public function ctrEliminarUnidadAcademica(){

		if(isset($_GET["IdUnidadAcademica"])){

					

			ModeloUnidadesAcademicas::mdlEliminarUnidadAcademica("unidadesacademicas", $_GET["IdUnidadAcademica"]);

		}

	}


	
}
