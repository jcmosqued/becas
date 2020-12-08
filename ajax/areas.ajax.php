<?php 


require_once "../controladores/areas.controlador.php";
require_once "../modelos/areas.modelo.php";


class AjaxAreas{

	/*===================================
	VALIDAR NO REPETIR ÁREA
	===================================*/

	public function ajaxValidarArea(){

		$item = "NomArea";
		$valor = $_POST["validarArea"];
		$respuesta = ControladorAreas::ctrValidarAreas($item, $valor);
		echo json_encode($respuesta);
	}

	/*===================================
	EDITAR Area
	===================================*/
	public function ajaxEditarAreas(){

		$item = "IdArea";
		$valor = $_POST["IdArea"];
		$respuesta = ControladorAreas::ctrMostrarAreas($item, $valor);
		echo json_encode($respuesta);
	}

}

/*===================================
VALIDAR AREA
===================================*/
if(isset($_POST["validarArea"])){

	$valArea = new AjaxAreas();
	$valArea -> ajaxValidarArea();

}

/*===================================
EDITAR AREA
===================================*/

if(isset($_POST["IdArea"])){ 

	$editarAreas = new AjaxAreas();
	$editarAreas -> ajaxEditarAreas();

}
