<?php 


require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";



class TablaUsuarios{

	/*===================================
	MOSTRAR LA TABLA DE CATEGORIAS
	===================================*/

	public function mostrarTabla(){

		$item = null;
		$valor = null;

		$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);


		$datosJson = '{
			"data":[';

		for($i=0; $i< count($usuarios); $i++){

			//DEFINE SI EL ESTADO ESTA ACTIVADO O DESACTIVADO
			if ($usuarios[$i]["Estado"]== 0){
				$estado = "<button class= 'btn btn-danger btn-xs btnActivar' estadoUsuario='1' idUsuario=".$usuarios[$i]["IdEmpleado"].">Desactivado</button>";
			} else{
				$estado = "<button class= 'btn btn-success btn-xs btnActivar' estadoUsuario='0' idUsuario=".$usuarios[$i]["IdEmpleado"].">Activado</button>";	
			}
			
			//CARGA LA IMAGEN DEL USUARIO
			//$imgUsuario = "<img class='img-thumbnail' src='".$usuarios[$i]["foto"]."' width='50px'>";

			//CARGA LOS BOTONES DE EDITAR Y ELIMINAR
			$acciones = "<div class = 'btn-group'> <button class='btn btn-warning btnEditarUsuario' NumEmpleado='".$usuarios[$i]["NumEmpleado"]."' data-toggle='modal' data-target='#modalEditarUsuario'><i class='fa fa-pencil'></i></button> <button class='btn btn-danger btnEliminarUsuario' IdEmpleado='".$usuarios[$i]["IdEmpleado"]."' IdUsuario='".$usuarios[$i]["IdUsuario"]."'><i class='fa fa-times'></i></button> </div";

			//CARGA EL RESTO DE CAMPOS DE LA TABLA
			$datosJson .= '[
					"'.$usuarios[$i]["IdEmpleado"].'",
					"'.$usuarios[$i]["NomEmpleado"].'",
					"'.$usuarios[$i]["NumEmpleado"].'",
					"'.$usuarios[$i]["Puesto_Cargo"].'",
					"'.$usuarios[$i]["Departamento"].'",
					"'.$estado.'",
					"'.$acciones.'",
					"'.$usuarios[$i]["Telefono"].'",
					"'.$usuarios[$i]["Ext"].'",
					"'.$usuarios[$i]["CorreoElectronico"].'",
					"'.$usuarios[$i]["TipoUsuario"].'"
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

$activar = new TablaUsuarios();
$activar -> mostrarTabla();