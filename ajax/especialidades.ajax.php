<?php 

require_once "../controladores/especialidades.controlador.php";
require_once "../modelos/especialidades.modelo.php";

class AjaxEspecialidades{

	/*===================================
	VALIDAR NO REPETIR USUARIO
	===================================*/
	public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $_POST["validarUsuario"];
		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
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

if(isset($_POST["validarUsuario"])){ 

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> ajaxValidarUsuario();

}

/*===================================
EDITAR ESPECIALIDAD
===================================*/
if(isset($_POST["IdEspecialidad"])){ 

	$editarEspecialidad = new AjaxEspecialidades();
	$editarEspecialidad -> ajaxEditarEspecialidad();

}