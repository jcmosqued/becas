<?php 


require_once "../controladores/areas.controlador.php";
require_once "../modelos/areas.modelo.php";


class AjaxAreas{


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
	EDITAR Area
	===================================*/
	public function ajaxEditarAreas(){

		$item = "IdArea";
		$valor = $_POST["IdArea"];
		$respuesta = ControladorAreas::ctrMostrarAreas($item, $valor);
		echo json_encode($respuesta);
	}

}





/*===================================
EDITAR AREA
===================================*/

if(isset($_POST["IdArea"])){ 

	$editarAreas = new AjaxAreas();
	$editarAreas -> ajaxEditarAreas();

}
