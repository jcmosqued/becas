<?php


require_once "conexion.php";

class ModeloUnidadesAcademicas{

	/*================================
	MOSTRAR UNIDAES ACADEMICAS
	=================================*/

	static public function mdlMostrarUnidadesAcademicas($tabla, $item, $valor){

		
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");		
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);		
			$stmt->execute();
			return $stmt->fetch();
			

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY IdUnidadAcademica DESC");
			$stmt->execute();
			return $stmt->fetchAll();
			
		}

		$stmt->close();
		$stmt=null;

	}

	static public function mdlIngresarUnidadAcadmica($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (NomUnidadAcademica) VALUES (:NomUnidadAcademica);");
		$stmt->bindParam(":NomUnidadAcademica", $datos["NomUnidadAcademica"], PDO::PARAM_STR);
		

		

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}


	static public function mdlEditarUnidadAcademica($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NomUnidadAcademica = :NomUnidadAcademica where IdUnidadAcademica = :IdUnidadAcademica;");
		
		$stmt->bindParam(":IdUnidadAcademica", $datos["IdUnidadAcademica"], PDO::PARAM_STR);
		$stmt->bindParam (":NomUnidadAcademica", $datos["NomUnidadAcademica"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlEliminarUnidadAcademica($tabla, $IdUnidadAcademica){

		$stmt = Conexion::conectar()->prepare("DELETE from $tabla where IdUnidadAcademica = :IdUnidadAcademica;");
		$stmt -> bindParam(":IdUnidadAcademica", $IdUnidadAcademica, PDO::PARAM_INT);
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

