<?php 


require_once "../controladores/carreras.controlador.php";
require_once "../modelos/carreras.modelo.php";



class TablaCarreras{

	/*===================================
	MOSTRAR LA TABLA DE CATEGORIAS
	===================================*/

	public function mostrarTabla(){

		$item = null;
		$valor = null;

		$carreras = ControladorCarreras::ctrMostrarCarreras($item, $valor);



		$datosJson = '{
			"data":[';

		for($i=0; $i< count($carreras); $i++){

			

			//CARGA LOS BOTONES DE EDITAR Y ELIMINAR
			$acciones = "<div class = 'btn-group'> <button class='btn btn-warning btnEditarCarrera' IdCarrera='".$carreras[$i]["IdCarrera"]."' data-toggle='modal' data-target='#modalEditarCarrera'><i class='fa fa-pencil'></i></button> <button class='btn btn-danger btnEliminarCarrera' IdCarrera='".$carreras[$i]["IdCarrera"]."'><i class='fa fa-times'></i></button> </div";

			//CARGA EL RESTO DE CAMPOS DE LA TABLA
			$datosJson .= '[
					"'.$carreras[$i]["IdCarrera"].'",
                    "'.$carreras[$i]["NomCarrera"].'",
                    "'.$carreras[$i]["IdUnidadAcademica"].'",
                    "'.$acciones.'"
					],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=']
		}';

		echo $datosJson;

	}

}


/*===================================
ACTIVAR TABLA DE CATEGORIAS
===================================*/

$activar = new TablaCarreras();
$activar -> mostrarTabla();