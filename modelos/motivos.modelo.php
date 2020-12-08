<?php


require_once "conexion.php";

class ModeloMotivos{

	/*================================
	MOSTRAR MOTIVOS
	=================================*/

	static public function mdlMostrarMotivos($tabla, $item, $valor){

		
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");		
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);		
			$stmt->execute();
			return $stmt->fetch();
			

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY IdMotivo DESC");
			$stmt->execute();
			return $stmt->fetchAll();
			
		}

		$stmt->close();
		$stmt=null;

	}

	
	static public function mdlIngresarMotivos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Motivo) VALUES (:Motivo);");
		$stmt->bindParam(":Motivo", $datos["Motivo"], PDO::PARAM_STR);
		

		

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlEditarMotivos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Motivo = :Motivo where IdMotivo = :IdMotivo");
		
		$stmt->bindParam(":IdMotivo", $datos["IdMotivo"], PDO::PARAM_STR);
		$stmt->bindParam (":Motivo", $datos["Motivo"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlEliminarMotivos($tabla, $IdMotivo){

		$stmt = Conexion::conectar()->prepare("DELETE from $tabla where IdMotivo = :IdMotivo");
		$stmt -> bindParam(":IdMotivo", $IdMotivo, PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlValidarDatos($tabla, $item, $valor){
    $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE $item = :$item");  
          $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
          $stmt ->execute();
          $existencia = $stmt->fetchColumn();

          if ($existencia > 0) {
              return true;
          } else {
              return null;
          }
  	}

}