<?php 

require_once "../controladores/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";

class AjaxProyectos{

	/*===================================
	ACTIVAR PROYECTO
	===================================*/
	public function ajaxActivarProyecto(){

		$respuesta = ModeloProyectos::mdlActualizarProyecto("Proyectos", "Estado", $_POST["estadoProyecto"], "IdProyecto", $_POST["idProyecto"]);
		
		echo $respuesta;

	}

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
	EDITAR PROYECTO
	===================================*/
	public function ajaxEditarProyecto(){

		$item = "IdProyecto";
		$valor = $_POST["IdProyecto"];
		$respuesta = ControladorProyectos::ctrMostrarProyectos($item, $valor);
		echo json_encode($respuesta);
	}

}

/*===================================
ACTIVAR PROYECTO
===================================*/
if(isset($_POST["estadoProyecto"])){

	$activarProyecto = new AjaxProyectos();
	$activarProyecto -> ajaxActivarProyecto();

}

/*===================================
VALIDAR NO REPETIR USUARIO
===================================*/
if(isset($_POST["validarUsuario"])){ 

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> ajaxValidarUsuario();

}

/*===================================
EDITAR PROYECTO
===================================*/
if(isset($_POST["IdProyecto"])){ 

	$editarUsuario = new AjaxProyectos();
	$editarUsuario -> ajaxEditarProyecto();

}
