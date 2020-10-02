<?php 


require_once "../controladores/becas.controlador.php";
require_once "../modelos/becas.modelo.php";



class TablaBecas{

	/*===================================
	MOSTRAR LA TABLA DE BECAS
	===================================*/

	public function mostrarTablaBecas(){

		$item = null;
		$valor = null;

		$becas = ControladorBecas::ctrMostrarBecas($item, $valor);


		$datosJson = '{
			"data":[';

		for($i=0; $i< count($becas); $i++){
			//CARGA LOS BOTONES DE EDITAR Y ELIMINAR
			$acciones = "<div class = 'btn-group'> <button class='btn btn-warning btnEditarBeca' IdBeca='".$becas[$i]["IdBeca"]."' NomBeca='".$becas[$i]["NomBeca"]."' data-toggle='modal' data-target='#modalEditarBeca'><i class='fa fa-pencil'></i></button> <button class='btn btn-danger btnEliminarBeca'IdBeca='".$becas[$i]["IdBeca"]."'><i class='fa fa-times'></i></button> </div>";
			//CARGA EL RESTO DE CAMPOS DE LA TABLA
			$datosJson .= '[
					"'.$becas[$i]["IdBeca"].'",
					"'.$becas[$i]["NomBeca"].'",
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

$activar = new TablaBecas();
$activar -> mostrarTablaBecas();