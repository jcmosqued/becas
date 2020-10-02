<?php 


require_once "../controladores/areas.controlador.php";
require_once "../modelos/areas.modelo.php";



class TablaAreas{

	/*===================================
	MOSTRAR LA TABLA DE CATEGORIAS
	===================================*/

	public function mostrarTabla(){

		$item = null;
		$valor = null;

		$areas = ControladorAreas::ctrMostrarAreas($item, $valor);



		$datosJson = '{
			"data":[';

		for($i=0; $i< count($areas); $i++){

			

			//CARGA LOS BOTONES DE EDITAR Y ELIMINAR
			$acciones = "<div class = 'btn-group'> <button class='btn btn-warning btnEditarArea' IdArea='".$areas[$i]["IdArea"]."' data-toggle='modal' data-target='#modalEditarArea'><i class='fa fa-pencil'></i></button> <button class='btn btn-danger btnEliminarArea' IdArea='".$areas[$i]["IdArea"]."'><i class='fa fa-times'></i></button> </div";

			//CARGA EL RESTO DE CAMPOS DE LA TABLA
			$datosJson .= '[
					"'.$areas[$i]["IdArea"].'",
                    "'.$areas[$i]["NomArea"].'",
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

$activar = new TablaAreas();
$activar -> mostrarTabla();