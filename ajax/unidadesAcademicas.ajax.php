<?php 


require_once "../controladores/unidadesAcademicas.controlador.php";
require_once "../modelos/unidadesAcademicas.modelo.php";


class AjaxUnidadAcademica{

/*===================================
	VALIDAR NO REPETIR USUARIO
	===================================*/

	public function ajaxValidarUnidadesAcademicas(){

		$item = "unidadAcademica";
		$valor = $_POST["validarUnidadAcademica"];
		$respuesta = ControladorUnidadesAcademicas::ctrMostrarUnidadesAcademicas($item, $valor);
		echo json_encode($respuesta);
	}


	/*===================================
	EDITAR UNIDAD ACADEMICA
	===================================*/
	public function ajaxEditarUnidadAcademica(){

		$item = "IdUnidadAcademica";
		$valor = $_POST["IdUnidadAcademica"];
		$respuesta = ControladorUnidadesAcademicas::ctrMostrarUnidadesAcademicas($item, $valor);
		echo json_encode($respuesta);
	}


	/*===================================
EDITAR UNIDAD Academica
===================================*/

if(isset($_POST["IdUnidadAcademica"])){ 

	$editarUnidadAcademica = new AjaxUnidadAcademica();
	$editarUnidadAcademica -> ajaxEditarUnidadAcademica();

}


	/*===================================
VALIDAR NO REPETIR UNIDAD ACADEMICA
===================================*/

if(isset($_POST["validarUnidadAcademica"])){ 

	

}



}

