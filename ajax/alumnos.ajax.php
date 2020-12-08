<?php 


require_once "../controladores/alumnos.controlador.php";
require_once "../modelos/alumnos.modelo.php";


class AjaxAlumnos{


	/*===================================
	ACTIVAR ALUMNO
	===================================*/

	public function ajaxActivarAlumno(){

		$respuesta = ModeloAlumnos::mdlActualizarAlumno("Alumnos", "Estado", $_POST["estadoAlumno"], "IdAlumno", $_POST["IdAlumno"]);
		
		echo $respuesta;

	}

	/*===================================
	VALIDAR NO REPETIR ALUMNO
	===================================*/

	public function ajaxValidarAlumno(){

		$item = "Matricula";
		$valor = $_POST["validarAlumno"];
		$respuesta = ControladorAlumnos::ctrValidarAlumnos($item, $valor);
		echo json_encode($respuesta);
	}

	/*===================================
	EDITAR ALUMNO
	===================================*/
	public function ajaxEditarAlumno(){

		$item = "IdAlumno";
		$valor = $_POST["IdAlumno"];
		$respuesta = ControladorAlumnos::ctrMostrarAlumnos($item, $valor);
		echo json_encode($respuesta);
	}

}

/*===================================
ACTIVAR CATEGORIA
===================================*/

if(isset($_POST["estadoAlumno"])){

	$activarAlumno = new AjaxAlumnos();
	$activarAlumno -> ajaxActivarAlumno();

}

/*===================================
VALIDAR NO REPETIR ALUMNO
===================================*/

if(isset($_POST["validarAlumno"])){ 

	$valAlumno = new AjaxAlumnos();
	$valAlumno -> ajaxValidarAlumno();

}

/*===================================
EDITAR ALUMNO
===================================*/

if(isset($_POST["IdAlumno"])){ 

	$editarAlumno = new AjaxAlumnos();
	$editarAlumno -> ajaxEditarAlumno();

}
