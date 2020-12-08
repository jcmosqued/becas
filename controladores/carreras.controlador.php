<?php



class ControladorCarreras{

/*================================
	MOSTRAR AREAS
	=================================*/

	static public function ctrMostrarCarreras($item, $valor){

		$tabla ="carreras";

		$respuesta = ModeloCarreras::mdlMostrarCarreras($tabla, $item, $valor);
		return $respuesta;

	}

	/*================================
	Listas
	=================================*/

	static public function ctrCargarListas(){
		$tabla = "unidadesacademicas";

		$stmt = ModeloCarreras::mdlCargarListas($tabla);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
     		foreach ($results as $row) {
      			echo "<option value='".$row["IdUnidadAcademica"]."'>".$row["NomUnidadAcademica"]."</option>";
    	} 
		}

	}


	/*================================
	EDITAR CARRERAS
	=================================*/

	static public function ctrEditarCarreras(){

		if(isset($_POST['editarNombreCarrera'])){

            $datos = array(	"IdCarrera"=>$_POST["IdCarrera"],
                            "IdUnidadAcademica"=>$_POST["IdUnidadAcademica"],
							"NomCarrera"=>$_POST["editarNombreCarrera"]);

			$respuesta = ModeloCarreras::mdlEditarCarreras("carreras", $datos);

			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "La carrera se ha Editado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=carreras";
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
								window.location = "index.php?ruta=carreras";
							}
						})
					</script>';

			}
		}

		}


	/*================================
	CREAR CARRERAS
	=================================*/

	static public function ctrCrearCarreras(){

		if(isset($_POST['NomCarrera'])){

            $datos = array("NomCarrera"=>$_POST["NomCarrera"],
                          "IdUnidadAcademica"=>$_POST["IdUnidadAcademica"]);
							

			$respuesta = ModeloCarreras::mdlIngresarCarreras("carreras", $datos);


			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "La carrera se ha Guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=carreras";
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
								window.location = "index.php?ruta=carreras";
							}
						})
					</script>';

			}
		}
	}


	/*================================
	ELIMINAR Areas
	=================================*/

	static public function ctrEliminarCarreras(){

		if(isset($_GET["IdCarrera"])){

					

			ModeloCarreras::mdlEliminarCarreras("carreras", $_GET["IdCarrera"]);

		}

	}


	/*================================
	VALIDAR CARRERAS
	=================================*/
	static public function ctrValidarCarreras($item, $valor){
		$tabla ="carreras";

		$respuesta = ModeloCarreras::mdlValidarDatos($tabla, $item, $valor);
		return $respuesta;
	}


	
}
