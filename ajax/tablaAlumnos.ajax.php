<?php 


require_once "../controladores/alumnos.controlador.php";
require_once "../modelos/alumnos.modelo.php";



class TablaAlumnos{

	/*===================================
	MOSTRAR LA TABLA DE CATEGORIAS
	===================================*/

	public function mostrarTablaAlumnos(){

		$item = null;
		$valor = null;

		$alumnos = ControladorAlumnos::ctrMostrarAlumnos($item, $valor);



		$datosJson = '{
			"data":[';

		for($i=0; $i< count($alumnos); $i++){

			//DEFINE SI EL ESTADO ESTA ACTIVADO O DESACTIVADO
			if ($alumnos[$i]["Estado"]== 0){
				$estado = "<button class= 'btn btn-danger btn-xs btnActivar' estadoAlumno='1' IdAlumno=".$alumnos[$i]["IdAlumno"].">Desactivado</button>";
			} else{
				$estado = "<button class= 'btn btn-success btn-xs btnActivar' estadoAlumno='0' IdAlumno=".$alumnos[$i]["IdAlumno"].">Activado</button>";	
			}
			

			//CARGA LOS BOTONES DE EDITAR Y ELIMINAR
			$acciones = "<div class = 'btn-group'> <button class='btn btn-warning btnEditarAlumno' IdAlumno='".$alumnos[$i]["IdAlumno"]."' NomAlumno='".$alumnos[$i]["NomAlumno"]."' Matricula='".$alumnos[$i]["Matricula"]."' IdUnidadAcademica='".$alumnos[$i]["IdUnidadAcademica"]."' IdCarrera='".$alumnos[$i]["IdCarrera"]."' IdEspecialidad='".$alumnos[$i]["IdEspecialidad"]."' Turno='".$alumnos[$i]["Turno"]."' Grupo='".$alumnos[$i]["Grupo"]."' IdBeca='".$alumnos[$i]["IdBeca"]."' HorasServicioBecario='".$alumnos[$i]["HorasServicioBecario"]."' data-toggle='modal' data-target='#modalEditarAlumno'><i class='fa fa-pencil'></i></button> <button class='btn btn-danger btnEliminarAlumno' IdAlumno='".$alumnos[$i]["IdAlumno"]."' IdAlumno='".$alumnos[$i]["IdAlumno"]."'><i class='fa fa-times'></i></button> </div";

			//CARGA EL RESTO DE CAMPOS DE LA TABLA
			$datosJson .= '[
					"'.$alumnos[$i]["IdAlumno"].'",
					"'.$alumnos[$i]["NomAlumno"].'",
					"'.$alumnos[$i]["Matricula"].'",
					"'.$alumnos[$i]["IdUnidadAcademica"].'",
					"'.$alumnos[$i]["IdCarrera"].'",
					"'.$alumnos[$i]["IdEspecialidad"].'",
					"'.$alumnos[$i]["Turno"].'",
					"'.$alumnos[$i]["Grupo"].'",
					"'.$alumnos[$i]["IdBeca"].'",
					"'.$alumnos[$i]["HorasServicioBecario"].'",
					"'.$estado.'",
					"'.$acciones.'"
					
					],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=']
		}';

		echo $datosJson;

	}
}

/*===================================
ACTIVAR TABLA DE CATEGORIAS
===================================*/

$activar = new TablaAlumnos();
$activar -> mostrarTablaAlumnos();