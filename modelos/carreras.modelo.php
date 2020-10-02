<?php


require_once "conexion.php";

class ModeloCarreras{

	/*================================
	MOSTRAR Carreras
	=================================*/

	static public function mdlMostrarCarreras($tabla, $item, $valor){

		
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");		
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);		
			$stmt->execute();
			return $stmt->fetch();
			

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY IdCarrera DESC");
			$stmt->execute();
			return $stmt->fetchAll();
			
		}

		$stmt->close();
		$stmt=null;

	}

	static public function mdlIngresarCarreras($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (NomCarrera, IdUnidadAcademica) VALUES (:NomCarrera, :IdUnidadAcademica);");
        $stmt->bindParam(":NomCarrera", $datos["NomCarrera"], PDO::PARAM_STR);
        $stmt->bindParam(":IdUnidadAcademica", $datos["IdUnidadAcademica"], PDO::PARAM_INT);
		

		

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}


	static public function mdlEditarCarreras($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NomCarrera = :NomCarrera, IdUnidadAcademica = :IdUnidadAcademica where IdCarrera = :IdCarrera");
		
		$stmt->bindParam(":IdCarrera", $datos["IdCarrera"], PDO::PARAM_STR);
        $stmt->bindParam (":NomCarrera", $datos["NomCarrera"], PDO::PARAM_STR);
        $stmt->bindParam (":IdUnidadAcademica", $datos["IdUnidadAcademica"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlEliminarCarreras($tabla, $IdArea){

		$stmt = Conexion::conectar()->prepare("DELETE from $tabla where IdCarrera = :IdCarrera");
		$stmt -> bindParam(":IdCarrera", $IdArea, PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}


}

