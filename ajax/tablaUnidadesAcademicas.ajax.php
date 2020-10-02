<?php 


require_once "../controladores/unidadesAcademicas.controlador.php";
require_once "../modelos/unidadesAcademicas.modelo.php";



class TablaUnidadesAcademicas{

	/*===================================
	MOSTRAR LA TABLA DE UNIDADES ACADEMICAS
	===================================*/

	public function mostrarTablaUnidadesAcademicas(){

		$item = null;
		$valor = null;

		$unidadesAcademicas = ControladorUnidadesAcademicas::ctrMostrarUnidadesAcademicas($item, $valor);


		$datosJson = '{
			"data":[';

		for($i=0; $i< count($unidadesAcademicas); $i++){
			//CARGA LOS BOTONES DE EDITAR Y ELIMINAR
			$acciones = "<div class = 'btn-group'> <button class='btn btn-warning btnEditarUnidadAcademica' IdUnidadAcademica='".$unidadesAcademicas[$i]["IdUnidadAcademica"]."' NomUnidadAcademica='".$unidadesAcademicas[$i]["NomUnidadAcademica"]."' data-toggle='modal' data-target='#modalEditarUnidadAcademica'><i class='fa fa-pencil'></i></button> <button class='btn btn-danger btnEliminarUnidadAcademica'IdUnidadAcademica='".$unidadesAcademicas[$i]["IdUnidadAcademica"]."'><i class='fa fa-times'></i></button> </div>";
			//CARGA EL RESTO DE CAMPOS DE LA TABLA
			$datosJson .= '[
					"'.$unidadesAcademicas[$i]["IdUnidadAcademica"].'",
					"'.$unidadesAcademicas[$i]["NomUnidadAcademica"].'",
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

$activar = new TablaUnidadesAcademicas();
$activar -> mostrarTablaUnidadesAcademicas();