<?php 

require_once "../controladores/cuatrimestres.controlador.php";
require_once "../modelos/cuatrimestres.modelo.php";

class TablaCuatrimestres{

	/*===================================
	MOSTRAR LA TABLA
	===================================*/
	public function mostrarTablaCuatrimestres(){

		$item = null;
		$valor = null;

		$cuatrimestres = ControladorCuatrimestres::ctrMostrarCuatrimestres($item, $valor);

		$datosJson = '{
			"data":[';

		for($i=0; $i< count($cuatrimestres); $i++){

			//CARGA LOS BOTONES DE EDITAR Y ELIMINAR
			$acciones = "<div class = 'btn-group'> <button class='btn btn-warning btnEditarCuatrimestre' IdCuatrimestre='".$cuatrimestres[$i]["IdCuatrimestre"]."' NomCuatrimestre='".$cuatrimestres[$i]["NomCuatrimestre"]."' data-toggle='modal' data-target='#modalEditarCuatrimestre'><i class='fa fa-pencil'></i></button> <button class='btn btn-danger btnEliminarCuatrimestre'IdCuatrimestre='".$cuatrimestres[$i]["IdCuatrimestre"]."'><i class='fa fa-times'></i></button> </div>";

			//CARGA EL RESTO DE CAMPOS DE LA TABLA
			$datosJson .= '[
					"'.$cuatrimestres[$i]["IdCuatrimestre"].'",
					"'.$cuatrimestres[$i]["NomCuatrimestre"].'",
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
ACTIVAR TABLA
===================================*/
$activar = new TablaCuatrimestres();
$activar -> mostrarTablaCuatrimestres();