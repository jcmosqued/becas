<?php


require_once "conexion.php";

class ModeloBecas{

	/*================================
	MOSTRAR Becas
	=================================*/

	static public function mdlMostrarBecas($tabla, $item, $valor){

		
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");		
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);		
			$stmt->execute();
			return $stmt->fetch();
			

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY IdBeca DESC");
			$stmt->execute();
			return $stmt->fetchAll();
			
		}

		$stmt->close();
		$stmt=null;

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

	static public function mdlIngresarBeca($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (NomBeca) VALUES (:NomBeca);");
		$stmt->bindParam(":NomBeca", $datos["NomBeca"], PDO::PARAM_STR);
		

		

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}


	static public function mdlEditarBeca($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NomBeca = :NomBeca where IdBeca = :IdBeca;");
		
		$stmt->bindParam(":IdBeca", $datos["IdBeca"], PDO::PARAM_STR);
		$stmt->bindParam (":NomBeca", $datos["NomBeca"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlEliminarBeca($tabla, $IdUnidadAcademica){

		$stmt = Conexion::conectar()->prepare("DELETE from $tabla where IdBeca = :IdBeca;");
		$stmt -> bindParam(":IdBeca", $IdUnidadAcademica, PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}


}

