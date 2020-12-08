<?php

require_once "../controladores/bajas.controlador.php";
require_once "../modelos/bajas.modelo.php";

class AjaxBaja{

	/*===================================
	VALIDAR NO REPETIR BAJASs
	============s=======================*/
	public function ajaxValidarBaja(){

		$item = "IdAlumno";
		$valor = $_POST["validarBaja"];
		$respuesta = ControladorBajas::ctrValidarBajas($item, $valor);
		echo json_encode($respuesta);
	}


	/*===================================
	EDITAR BAJA
	===================================*/
	public function ajaxEditarBajas(){

		$item = "IdBaja";
		$valor = $_POST["IdBaja"];
		$respuesta = ControladorBajas::ctrMostrarBajas($item, $valor);
		echo json_encode($respuesta);
	}
}


/*===================================
EDITAR BAJA
===================================*/

if(isset($_POST["IdBaja"])){ 

	$editarAreas = new AjaxBaja();
	$editarAreas -> ajaxEditarBajas();

}

/*===================================
VALIDAR BAJA
===================================*/

if(isset($_POST["validarBaja"])){ 

	$editarAreas = new AjaxBaja();
	$editarAreas -> ajaxValidarBaja();

}