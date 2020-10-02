<?php 


require_once "../controladores/carreras.controlador.php";
require_once "../modelos/carreras.modelo.php";


class AjaxCarreras{


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
		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
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
EDITAR CARRERA
===================================*/

if(isset($_POST["IdCarrera"])){ 

	$editarAreas = new AjaxCarreras();
	$editarAreas -> ajaxEditarCarreras();

}
