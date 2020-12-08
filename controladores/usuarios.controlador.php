<?php

class ControladorUsuarios{

	/*================================
	INGRESO DE USUARIOS
	=================================*/
	public function ctrIngresoUsuarios(){

		if(isset($_POST["ingUsuario"])){

			$tabla = "empleados";
			$item = "IdUsuario";
			$valor = $_POST["ingUsuario"];
			
			$respuesta = ModeloUsuarios::mdlMostrarUsuarios2($tabla, $item, $valor);

			
			
			if ($respuesta["NumEmpleado"]==$_POST["ingUsuario"] && $respuesta["Contrasenia"]== $_POST["ingPassword"] && $respuesta["Estado"]==1){
				$_SESSION["sesionGestor"] = "ok";
				$_SESSION["id"] = $respuesta["IdUsuario"];
				$_SESSION["password"] = $respuesta["Contrasenia"];
				$_SESSION["tipoUsuario"] = $respuesta["TipoUsuario"];
				$_SESSION["nombre"] = $respuesta["NomEmpleado"];
				
				

				

				echo '<script>window.location = "index.php?ruta=inicio" </script>';
			}
			else {
				echo '<br> <div class="alert alert-danger">Usuario o contraseña incorrecto</div>';
			}

		}
	}

	/*================================
	MOSTRAR USUARIOS
	=================================*/

	static public function ctrMostrarUsuarios($item, $valor){
		//ITEM = NULL
		//VALOR = NULL
		//$tabla ="usuarios";
		$tabla ="empleados";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
		return $respuesta;

	}

	/*================================
	VALIDAR USUARIOS
	=================================*/
	static public function ctrValidarUsuarios($item, $valor){
		$tabla ="empleados";

		$respuesta = ModeloUsuarios::mdlValidarDatos($tabla, $item, $valor);
		return $respuesta;

	}



	/*================================
	CREAR USUARIOS
	=================================*/

	static public function ctrCrearUsuario(){

		if(isset($_POST['NomEmpleado'])){

			

			$datos = array("NomEmpleado"=>$_POST["NomEmpleado"],
							"NumEmpleado"=>$_POST["NumEmpleado"],
							"Puesto_Cargo"=>$_POST["Puesto_Cargo"],
							"Departamento"=>$_POST["Departamento"],
							"CorreoElectronico"=>$_POST["CorreoElectronico"],
							"Telefono"=>$_POST["Telefono"],
							"Ext"=>$_POST["Ext"],
							"Contrasenia"=>$_POST["Contrasenia"],
							"TipoUsuario"=>$_POST["TipoUsuario"]);

							

			$respuesta = ModeloUsuarios::mdlIngresarUsuario("empleados", "usuarios", $datos);
			


			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El usuario se ha Guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=empleados";
							}
						})
					</script>';
			}
			if($respuesta == "error"){
				echo '<script>
					swal({
						type: "error",
						title: "El registro no se Guardo, intentalo nuevamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=empleados";
							}
						})
					</script>';
			}

		}		

	}


	/*================================
	EDITAR USUARIO
	=================================*/

	static public function ctrEditarUsuario(){

		if(isset($_POST['editarNombre'])){

			$datos = array("IdEmpleado"=>$_POST["IdEmpleado"],
			"NomEmpleado"=>$_POST["editarNombre"],
			"NumEmpleado"=>$_POST["NumEmpleado"],
			"Puesto_Cargo"=>$_POST["Puesto_Cargo"],
			"Departamento"=>$_POST["Departamento"],
			"CorreoElectronico"=>$_POST["CorreoElectronico"],
			"Telefono"=>$_POST["Telefono"],
			"Ext"=>$_POST["Ext"],
			"IdUsuario"=>$_POST["IdUsuario"],
			"Contrasenia"=>$_POST["Contrasenia"],
			"TipoUsuario"=>$_POST["TipoUsuario"],
			"IdUsuario"=>$_POST["IdUsuario"]);

			$respuesta = ModeloUsuarios::mdlEditarUsuario("empleados", "usuarios", $datos);


			if ($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El usuario se ha Guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=empleados";
							}
						})
					</script>';
			} else {
				echo '<script>
					swal({
						type: "error",
						title: "El registro no se Guardo, intentalo nuevamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value){
								window.location = "index.php?ruta=empleados";
							}
						})
					</script>';

			}

		}		

	}

	/*================================
	ELIMINAR USUARIO
	=================================*/

	static public function ctrEliminarUsuario(){

		if(isset($_GET["IdEmpleado"])){

			

			ModeloUsuarios::mdlEliminarUsuario("empleados", "usuarios", $_GET["IdEmpleado"], $_GET["IdUsuario"]);

		}

	}

	
}








