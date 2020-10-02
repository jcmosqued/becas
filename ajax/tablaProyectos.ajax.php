<?php 

require_once "../controladores/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";

class TablaProyectos{

	/*===================================
	MOSTRAR LA TABLA PROYECTOS
	===================================*/
	public function mostrarTablaProyectos(){

		$item = null;
		$valor = null;

		$proyectos = ControladorProyectos::ctrMostrarProyectos($item, $valor);

		$datosJson = '{
			"data":[';

		for($i=0; $i< count($proyectos); $i++){

			//DEFINE SI EL ESTADO ESTA ACTIVADO O DESACTIVADO
			if ($proyectos[$i]["Estado"]== 0){
				$estado = "<button class= 'btn btn-danger btn-xs btnActivar' estadoProyecto='1' idProyecto=".$proyectos[$i]["IdProyecto"].">Desactivado</button>";
			} else{
				$estado = "<button class= 'btn btn-success btn-xs btnActivar' estadoProyecto='0' idProyecto=".$proyectos[$i]["IdProyecto"].">Activado</button>";	
			}

			//CARGA LOS BOTONES DE EDITAR Y ELIMINAR
			$acciones = "<div class = 'btn-group'> <button class='btn btn-warning btnEditarProyecto' IdProyecto='".$proyectos[$i]["IdProyecto"]."' NomProyecto='".$proyectos[$i]["NomProyecto"]."' data-toggle='modal' data-target='#modalEditarProyecto'><i class='fa fa-pencil'></i></div>";

			//CARGA EL RESTO DE CAMPOS DE LA TABLA
			$datosJson .= '[
					"'.$proyectos[$i]["NomProyecto"].'",
					"'.$proyectos[$i]["NomEmpleado"].'",
					"'.$proyectos[$i]["NomArea"].'",
					"'.$proyectos[$i]["Departamento"].'",
					"'.$proyectos[$i]["TipoActividades"].'",
					"'.$proyectos[$i]["EspecificarActividades"].'",
					"'.$proyectos[$i]["NomCuatrimestre"].'",
					"'.$proyectos[$i]["FechaInicio"].'",
					"'.$estado.'",
					"'.$acciones.'",
					"'.$proyectos[$i]["Duracion"].'",
					"'.$proyectos[$i]["CantidadAlumnos"].'",
					"'.$proyectos[$i]["Sexo"].'",
					"'.$proyectos[$i]["CarrerasPreferentes"].'",
					"'.$proyectos[$i]["Observaciones"].'",
					"'.$proyectos[$i]["Estatus"].'"
					
					],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=']
		}';

		echo $datosJson;

	}

}


/*===================================
ACTIVAR TABLA PROYECTOS
===================================*/
$activar = new TablaProyectos();
$activar -> mostrarTablaProyectos();