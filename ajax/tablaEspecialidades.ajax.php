<?php 

require_once "../controladores/especialidades.controlador.php";
require_once "../modelos/especialidades.modelo.php";

class TablaEspecialidades{

	/*===================================
	MOSTRAR LA TABLA
	===================================*/
	public function mostrarTablaEspecialidades(){

		$item = null;
		$valor = null;

		$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades($item, $valor);

		$datosJson = '{
			"data":[';

			for($i=0; $i< count($especialidades); $i++){

			//CARGA LOS BOTONES DE EDITAR Y ELIMINAR
				$acciones = "<div class = 'btn-group'> <button class='btn btn-warning btnEditarEspecialidad' IdEspecialidad='".$especialidades[$i]["IdEspecialidad"]."' NomEspecialidad='".$especialidades[$i]["NomEspecialidad"]."' data-toggle='modal' data-target='#modalEditarEspecialidad'><i class='fa fa-pencil'></i></button> <button class='btn btn-danger btnEliminarEspecialidad'IdEspecialidad='".$especialidades[$i]["IdEspecialidad"]."'><i class='fa fa-times'></i></button> </div>";

			//CARGA EL RESTO DE CAMPOS DE LA TABLA
				$datosJson .= '[
				"'.$especialidades[$i]["IdEspecialidad"].'",
				"'.$especialidades[$i]["NomEspecialidad"].'",
				"'.$especialidades[$i]["NomCarrera"].'",
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
ACTIVAR TABLA
===================================*/
$activar = new TablaEspecialidades();
$activar -> mostrarTablaEspecialidades();