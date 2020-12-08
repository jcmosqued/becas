<?php 

require_once "../controladores/cuatrimestres.controlador.php";
require_once "../modelos/cuatrimestres.modelo.php";

class AjaxCuatrimestres{

	/*===================================
	ACTIVAR USUARIO
	===================================*/

	/*public function ajaxActivarUsuario(){

		$respuesta = ModeloUsuarios::mdlActualizarUsuario("usuarios", "estado", $_POST["estadoUsuario"], "idUsuario", $_POST["idUsuario"]);
		
		echo $respuesta;

	}*/

	/*===================================
	VALIDAR NO REPETIR CUATRIMESTRES
	===================================*/

	public function ajaxValidarCuatrimestre(){

		$item = "NomCuatrimestre";
		$valor = $_POST["validarCuatrimestre"];
		$respuesta = ControladorCuatrimestres::ctrValidarCuatrimestres($item, $valor);
		echo json_encode($respuesta);
	}

	/*===================================
	EDITAR CUATRIMESTRE
	===================================*/
	public function ajaxEditarCuatrimestre(){

		$item = "IdCuatrimestre";
		$valor = $_POST["idCuatrimestre"];
		$respuesta = ControladorCuatrimestres::ctrMostrarCuatrimestres($item, $valor);
		echo json_encode($respuesta);
	}

}

/*===================================
VALIDAR NO REPETIR CUATRIMESTRE
===================================*/

if(isset($_POST["validarCuatrimestre"])){ 

	$valUsuario = new AjaxCuatrimestres();
	$valUsuario -> ajaxValidarCuatrimestre();

}

/*===================================
EDITAR Cuatrimestre
===================================*/
if(isset($_POST["idCuatrimestre"])){ 

	$editarCuatrimestre = new AjaxCuatrimestres();
	$editarCuatrimestre -> ajaxEditarCuatrimestre();

}
