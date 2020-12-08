<?php

require_once "../controladores/bajas.controlador.php";
require_once "../modelos/bajas.modelo.php";


class TablaBajas{
	/*===================================
	MOSTRAR LA TABLA DE BAJASs
	===================================*/

	public function mostrarTablaBajas(){

		$item = null;
		$valor = null;

		$bajas = ControladorBajas::ctrMostrarBajas($item, $valor);


		$datosJson = '{
			"data":[';

		for($i=0; $i< count($bajas); $i++){

			//CARGA LOS BOTONES DE EDITAR Y ELIMINAR
			$acciones = "<div class = 'btn-group'> <button class='btn btn-warning btnEditarBaja' IdBaja='".$bajas[$i]["IdBaja"]."' data-toggle='modal' data-target='#modalEditarBaja'><i class='fa fa-pencil'></i></button> <button class='btn btn-danger btnEliminarBaja' IdBaja='".$bajas[$i]["IdBaja"]."'><i class='fa fa-times'></i></button> </div";

			//CARGA EL RESTO DE CAMPOS DE LA TABLA
			$datosJson .= '[
					"'.$bajas[$i]["IdBaja"].'",
					"'.$bajas[$i]["FechaBaja"].'",
					"'.$bajas[$i]["NomAlumno"].'",
					"'.$bajas[$i]["NomEmpleado"].'",
					"'.$bajas[$i]["TipoBaja"].'",
					"'.$bajas[$i]["Alcance"].'",
					"'.$bajas[$i]["Motivo"].'",
					"'.$bajas[$i]["Observaciones"].'",
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
ACTIVAR TABLA DE BAJAS
===================================*/

$activar = new TablaBajas();
$activar -> mostrarTablaBajas();