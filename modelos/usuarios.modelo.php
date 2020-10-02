<?php


require_once "conexion.php";

class ModeloUsuarios{

	/*================================
	MOSTRAR USUARIOS
	=================================*/
	static public function mdlMostrarUsuarios2($tabla, $item, $valor){

		//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		//$stmt = Conexion::conectar()->prepare("select e.*,u.TipoUsuario from " . $tabla . " e inner join usuarios u where u.IdUsuario = e.IdUsuario");

		$stmt = Conexion::conectar()->prepare("select e.*,u.* from " . $tabla . " e inner join usuarios u where u.IdUsuario = e.IdUsuario and NumEmpleado=" . $valor . "");

		//$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		
		if($item != null){

			
			$stmt = Conexion::conectar()->prepare("select u.*,e.* from usuarios u inner join " . $tabla . " e where e.IdUsuario = u.IdUsuario and e.NumEmpleado=" . $valor . "");	
					
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);		
			$stmt->execute();
			return $stmt->fetch();
			
			

		} else {

			//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idUsuario DESC");
			$stmt = Conexion::conectar()->prepare("select e.*,u.* from " . $tabla . " e inner join usuarios u where u.IdUsuario = e.IdUsuario");
			$stmt->execute();
			return $stmt->fetchAll();
			
		}

		$stmt->close();
		$stmt=null;

	}

	/*================================
	ACTIVAR USUARIO
	=================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		
		if ($stmt->execute()){
			return $valor1;
		} else {
			return "error";
		}

		$stmt->close();
		$stmt=null;
			
	}

	static public function mdlIngresarUsuario($tabla, $tabla2, $datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2 (Contrasenia, TipoUsuario) VALUES (:Contrasenia, :TipoUsuario);");
		$stmt->bindParam(":Contrasenia", $datos["Contrasenia"], PDO::PARAM_STR);
		$stmt->bindParam(":TipoUsuario", $datos["TipoUsuario"], PDO::PARAM_STR);
		$stmt->execute();

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (NomEmpleado, NumEmpleado, Puesto_Cargo, Departamento, CorreoElectronico, Telefono, Ext, Estado, IdUsuario) VALUES (:NomEmpleado, :NumEmpleado, :Puesto_Cargo, :Departamento, :CorreoElectronico, :Telefono, :Ext, 1, (select max(IdUsuario) from usuarios));");

		$stmt->bindParam(":NomEmpleado", $datos["NomEmpleado"], PDO::PARAM_STR);
		$stmt->bindParam(":NumEmpleado", $datos["NumEmpleado"], PDO::PARAM_INT);
		$stmt->bindParam(":Puesto_Cargo", $datos["Puesto_Cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":Departamento", $datos["Departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":CorreoElectronico", $datos["CorreoElectronico"], PDO::PARAM_STR);
		$stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":Ext", $datos["Ext"], PDO::PARAM_STR);
		

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}


	static public function mdlEditarUsuario($tabla, $tabla2, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NomEmpleado = :NomEmpleado, NumEmpleado = :NumEmpleado, Puesto_Cargo = :Puesto_Cargo, Departamento = :Departamento, CorreoElectronico = :CorreoElectronico, Telefono = :Telefono, Ext = :Ext where IdEmpleado = :IdEmpleado");
		$stmt->bindParam(":IdEmpleado", $datos["IdEmpleado"], PDO::PARAM_STR);
		$stmt->bindParam(":NomEmpleado", $datos["NomEmpleado"], PDO::PARAM_STR);
		$stmt->bindParam(":NumEmpleado", $datos["NumEmpleado"], PDO::PARAM_INT);
		$stmt->bindParam(":Puesto_Cargo", $datos["Puesto_Cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":Departamento", $datos["Departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":CorreoElectronico", $datos["CorreoElectronico"], PDO::PARAM_STR);
		$stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":Ext", $datos["Ext"], PDO::PARAM_STR);
		$stmt->execute();
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 SET TipoUsuario = :TipoUsuario where IdUsuario = :IdUsuario");
        $stmt->bindParam(":IdUsuario", $datos["IdUsuario"], PDO::PARAM_STR);
		$stmt->bindParam(":TipoUsuario", $datos["TipoUsuario"], PDO::PARAM_STR);
		
		

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}


	static public function mdlEliminarUsuario($tabla, $tabla2, $IdEmpleado, $IdUsuario){

		$stmt = Conexion::conectar()->prepare("DELETE from $tabla where IdEmpleado = :IdEmpleado");
		$stmt -> bindParam(":IdEmpleado", $IdEmpleado, PDO::PARAM_INT);
		$stmt->execute();
		

		$stmt = Conexion::conectar()->prepare("DELETE from $tabla2 where IdUsuario = :IdUsuario");
		$stmt -> bindParam(":IdUsuario", $IdUsuario, PDO::PARAM_INT);
		


		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

}