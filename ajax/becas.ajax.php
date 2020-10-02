<?php 


require_once "../controladores/becas.controlador.php";
require_once "../modelos/becas.modelo.php";


class AjaxBeca{

/*===================================
	VALIDAR NO REPETIR BECAS
	=================================*/

	public function ajaxValidarBecas(){

		$item = "becas";
		$valor = $_POST["validarBeca"];
		$respuesta = ControladorBecas::ctrMostrarBecas($item, $valor);
		echo json_encode($respuesta);
	}


	/*===================================
	EDITAR BECA
	===================================*/
	public function ajaxEditarBeca(){

		$item = "IdBeca";
		$valor = $_POST["IdBeca"];
		$respuesta = ControladorBecas::ctrMostrarBecas($item, $valor);
		echo json_encode($respuesta);
	}


	/*===================================
EDITAR UNIDAD Academica
===================================*/

if(isset($_POST["Idbeca"])){ 

	$editarBeca = new AjaxBeca();
	$editarbeca -> ajaxEditarBeca();

}


	/*===================================
VALIDAR NO REPETIR UNIDAD ACADEMICA
===================================*/

if(isset($_POST["validarBeca"])){ 

	

}



}

