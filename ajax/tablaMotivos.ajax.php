<?php

require_once "../controladores/motivos.controlador.php";
require_once "../modelos/motivos.modelo.php";


class TablaMotivos{
	/*===================================
	MOSTRAR LA TABLA DE MOTIVOS
	===================================*/

	public function mostrarTabla(){

		$item = null;
		$valor = null;

		$motivos = ControladorMotivos::ctrMostrarMotivos($item, $valor);

		$datosJson = '{
			"data":[';

		for($i=0; $i< count($motivos); $i++){

			

			//CARGA LOS BOTONES DE EDITAR Y ELIMINAR
			$acciones = "<div class = 'btn-group'> <button class='btn btn-warning btnEditarMotivo' IdMotivo='".$motivos[$i]["IdMotivo"]."' data-toggle='modal' data-target='#modalEditarMotivo'><i class='fa fa-pencil'></i></button> <button class='btn btn-danger btnEliminarMotivo' IdMotivo='".$motivos[$i]["IdMotivo"]."'><i class='fa fa-times'></i></button> </div";

			//CARGA EL RESTO DE CAMPOS DE LA TABLA
			$datosJson .= '[
					"'.$motivos[$i]["IdMotivo"].'",
                    "'.$motivos[$i]["Motivo"].'",
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

$activar = new TablaMotivos();
$activar -> mostrarTabla();

