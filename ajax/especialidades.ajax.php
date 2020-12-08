<?php 

require_once "../controladores/especialidades.controlador.php";
require_once "../modelos/especialidades.modelo.php";

class AjaxEspecialidades{

	/*===================================
	VALIDAR NO REPETIR USUARIO
	===================================*/
	public function ajaxValidarEspecialidad(){

		$item = "NomEspecialidad";
		$valor = $_POST["validarEspecialidad"];
		$respuesta = ControladorEspecialidades::ctrValidarEspecialidades($item, $valor);
		echo json_encode($respuesta);
	}

	/*===================================
	EDITAR ESPECIALIDAD
	===================================*/
	public function ajaxEditarEspecialidad(){

		$item = "IdEspecialidad";
		$valor = $_POST["IdEspecialidad"];
		$respuesta = ControladorEspecialidades::ctrMostrarEspecialidades($item, $valor);
		echo json_encode($respuesta);
	}

}


/*===================================
VALIDAR NO REPETIR USUARIO
===================================*/

if(isset($_POST["validarEspecialidad"])){ 

	$valEspecialidad = new AjaxEspecialidades();
	$valEspecialidad -> ajaxValidarEspecialidad();

}

/*===================================
EDITAR ESPECIALIDAD
===================================*/
if(isset($_POST["IdEspecialidad"])){ 

	$editarEspecialidad = new AjaxEspecialidades();
	$editarEspecialidad -> ajaxEditarEspecialidad();

}