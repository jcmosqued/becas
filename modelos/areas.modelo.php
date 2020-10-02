<?php


require_once "conexion.php";

class ModeloAreas{

	/*================================
	MOSTRAR Areas
	=================================*/

	static public function mdlMostrarAreas($tabla, $item, $valor){

		
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");		
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);		
			$stmt->execute();
			return $stmt->fetch();
			

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY IdArea DESC");
			$stmt->execute();
			return $stmt->fetchAll();
			
		}

		$stmt->close();
		$stmt=null;

	}

	static public function mdlIngresarAreas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (NomArea) VALUES (:NomArea);");
		$stmt->bindParam(":NomArea", $datos["NomArea"], PDO::PARAM_STR);
		

		

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}


	static public function mdlEditarAreas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NomArea = :NomArea where IdArea = :IdArea");
		
		$stmt->bindParam(":IdArea", $datos["IdArea"], PDO::PARAM_STR);
		$stmt->bindParam (":NomArea", $datos["NomArea"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlEliminarAreas($tabla, $IdArea){

		$stmt = Conexion::conectar()->prepare("DELETE from $tabla where IdArea = :IdArea");
		$stmt -> bindParam(":IdArea", $IdArea, PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}


}

