<?php

require_once "../controladores/motivos.controlador.php";
require_once "../modelos/motivos.modelo.php";

class AjaxMotivos{

/*===================================
	EDITAR MOTIVOS
	===================================*/
	public function ajaxEditarMotivos(){

		$item = "IdMotivo";
		$valor = $_POST["IdMotivo"];
		$respuesta = ControladorMotivos::ctrMostrarMotivos($item, $valor);
		echo json_encode($respuesta);
	}

	/*===================================
	VALIDAR NO REPETIR MOTIVO
	===================================*/

	public function ajaxValidarMotivo(){

		$item = "Motivo";
		$valor = $_POST["validarMotivo"];
		$respuesta = ControladorMotivos::ctrValidarMotivos($item, $valor);
		echo json_encode($respuesta);
	}

}



/*===================================
EDITAR MOTIVOS
===================================*/

if(isset($_POST["IdMotivo"])){ 

	$editarAreas = new AjaxMotivos();
	$editarAreas -> ajaxEditarMotivos();

}

/*===================================
VALIDAR MOTIVOS
===================================*/

if(isset($_POST["validarMotivo"])){ 

	$editarAreas = new AjaxMotivos();
	$editarAreas -> ajaxValidarMotivo();

}
