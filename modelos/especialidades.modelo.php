<?php

require_once "conexion.php";

class ModeloEspecialidades{

	/*================================
	MOSTRAR ESPECIALIDADES
	=================================*/
	static public function mdlMostrarEspecialidades($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");		
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);		
			$stmt->execute();
			return $stmt->fetch();

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY IdEspecialidad DESC");
			$stmt->execute();
			return $stmt->fetchAll();
			
		}

		$stmt->close();
		$stmt=null;

	}

	/*================================
	INGRESAR ESPECIALIDAD
	=================================*/
	static public function mdlIngresarEspecialidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (NomEspecialidad, IdCarrera) VALUES (:nombre, :idCarrera);");
		$stmt->bindParam(":nombre", $datos["nomEspecialidad"], PDO::PARAM_STR);
		$stmt->bindParam(":idCarrera", $datos["idCarrera"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	/*================================
	EDITAR ESPECIALIDAD
	=================================*/
	static public function mdlEditarEspecialidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NomEspecialidad = :nombre WHERE IdEspecialidad = :idEspecialidad;");
		
		$stmt->bindParam(":idEspecialidad", $datos["IdEspecialidad"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["NomEspecialidad"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	/*================================
	ELIMINAR ESPECIALIDAD
	=================================*/
	static public function mdlEliminarEspecialidad($tabla, $idEspecialidad){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IdEspecialidad = $idEspecialidad;");
		
		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

}