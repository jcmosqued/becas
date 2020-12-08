<?php 


require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";


class AjaxUsuarios{


	/*===================================
	ACTIVAR USUARIO
	===================================*/

	public function ajaxActivarUsuario(){

		$respuesta = ModeloUsuarios::mdlActualizarUsuario("empleados", "Estado", $_POST["estadoUsuario"], "IdEmpleado", $_POST["idUsuario"]);
		
		echo $respuesta;

	}

	/*===================================
	VALIDAR NO REPETIR USUARIO
	===================================*/

	public function ajaxValidarUsuario(){

		$item = "NumEmpleado";
		$valor = $_POST["validarUsuario"];
		$respuesta = ControladorUsuarios::ctrValidarUsuarios($item, $valor);
		echo json_encode($respuesta);
	}

	/*===================================
	EDITAR USUARIO
	===================================*/
	public function ajaxEditarUsuario(){

		$item = "IdEmpleado";
		$valor = $_POST["NumEmpleado"];
		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
		echo json_encode($respuesta);
	}

}

/*===================================
ACTIVAR CATEGORIA
===================================*/

if(isset($_POST["estadoUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> ajaxActivarUsuario();

}

/*===================================
VALIDAR NO REPETIR USUARIO
===================================*/

if(isset($_POST["validarUsuario"])){ 

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> ajaxValidarUsuario();

}

/*===================================
EDITAR USUARIO
===================================*/

if(isset($_POST["NumEmpleado"])){ 

	$editarUsuario = new AjaxUsuarios();
	$editarUsuario -> ajaxEditarUsuario();

}
