<?php 


require_once "../controladores/carreras.controlador.php";
require_once "../modelos/carreras.modelo.php";


class AjaxCarreras{

	/*===================================
	VALIDAR NO REPETIR CARRERA
	===================================*/

	public function ajaxValidarCarrera(){

		$item = "NomCarrera";
		$valor = $_POST["validarCarrera"];
		$respuesta = ControladorCarreras::ctrValidarCarreras($item, $valor);
		echo json_encode($respuesta);
	}

	/*===================================
	EDITAR CARRERA
	===================================*/
	public function ajaxEditarCarreras(){

		$item = "IdCarrera";
		$valor = $_POST["IdCarrera"];
		$respuesta = ControladorCarreras::ctrMostrarCarreras($item, $valor);
		echo json_encode($respuesta);
	}

}


/*===================================
	VALIDAR NO REPETIR CARRERA
===================================*/
if(isset($_POST["validarCarrera"])){

	$valCarrera = new AjaxCarreras();
	$valCarrera -> ajaxValidarCarrera();

}


/*===================================
EDITAR CARRERA
===================================*/

if(isset($_POST["IdCarrera"])){ 

	$editarAreas = new AjaxCarreras();
	$editarAreas -> ajaxEditarCarreras();

}
