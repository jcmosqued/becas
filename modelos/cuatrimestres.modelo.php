<?php

require_once "conexion.php";

class ModeloCuatrimestres{

	/*================================
	MOSTRAR CUATRIMESTRES
	=================================*/
	static public function mdlMostrarCuatrimestres($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");		
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);		
			$stmt->execute();
			return $stmt->fetch();

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY IdCuatrimestre DESC");
			$stmt->execute();
			return $stmt->fetchAll();
			
		}

		$stmt->close();
		$stmt=null;

	}

	/*================================
	INGRESAR CUATRIMESTRE
	=================================*/
	static public function mdlIngresarCuatrimestre($tabla, $datos){

		//$stmt = Conexion::conectar()->prepare("CALL insertar_cuatrimestre(?);");
		//$stmt->bindParam(1, $datos["nomCuatrimestre"], PDO::PARAM_STR);

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (NomCuatrimestre) VALUES (:nombre);");
		$stmt->bindParam(":nombre", $datos["nomCuatrimestre"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	/*================================
	EDITAR CUATRIMESTRE
	=================================*/
	static public function mdlEditarCuatrimestre($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NomCuatrimestre = :nombre WHERE IdCuatrimestre = :idCuatrimestre;");
		$stmt->bindParam(":idCuatrimestre", $datos["IdCuatrimestre"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["NomCuatrimestre"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	/*================================
	ELIMINAR CUATRIMESTRE
	=================================*/
	static public function mdlEliminarCuatrimestre($tabla, $idCuatrimestre){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IdCuatrimestre = $idCuatrimestre;");
		//$stmt -> bindParam(1, $idCuatrimestre, PDO::PARAM_INT);
		
		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

}