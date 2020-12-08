<?php

require_once "conexion.php";

class ModeloBajas{
	/*================================
	MOSTRAR BAJAS 
	=================================*/

	static public function mdlMostrarBajas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");		
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);		
			$stmt->execute();
			return $stmt->fetch();
			

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla 
				INNER JOIN alumnos ON $tabla.IdAlumno = alumnos.IdAlumno
				INNER JOIN empleados ON $tabla.IdEmpleado = empleados.IdEmpleado
				INNER JOIN motivos ON $tabla.IdMotivo = motivos.IdMotivo

				ORDER BY IdBaja DESC");
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

	/*================================
	INGRESAR BAJAS
	=================================*/


	static public function mdlIngresarBaja($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (FechaBaja, IdAlumno, IdEmpleado, TipoBaja, Alcance, IdMotivo, IdSubmotivo, Observaciones) VALUES (:FechaBaja, :IdAlumno, :IdEmpleado, :TipoBaja, :Alcance, :IdMotivo, :IdSubmotivo, :Observaciones);");

		$stmt->bindParam(":FechaBaja", $datos["FechaBaja"], PDO::PARAM_STR);
		$stmt->bindParam(":IdAlumno", $datos["IdAlumno"], PDO::PARAM_STR);
		$stmt->bindParam(":IdEmpleado", $datos["IdEmpleado"], PDO::PARAM_STR);
		$stmt->bindParam(":TipoBaja", $datos["TipoBaja"], PDO::PARAM_STR);
		$stmt->bindParam(":Alcance", $datos["Alcance"], PDO::PARAM_STR);
		$stmt->bindParam(":IdMotivo", $datos["IdMotivo"], PDO::PARAM_STR);
		$stmt->bindParam(":IdSubmotivo", $datos["IdSubmotivo"], PDO::PARAM_STR);
		$stmt->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	/*================================
	EDITAR BAJAS
	=================================*/

	static public function mdlEditarBaja($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET FechaBaja = :FechaBaja, IdAlumno = :IdAlumno, IdEmpleado = :IdEmpleado, TipoBaja = :TipoBaja, Alcance = :Alcance, IdMotivo = :IdMotivo, Observaciones = :Observaciones where IdBaja = :IdBaja");


		$stmt->bindParam(":IdBaja", $datos["IdBaja"], PDO::PARAM_STR);
		$stmt->bindParam(":FechaBaja", $datos["FechaBaja"], PDO::PARAM_STR);
		$stmt->bindParam(":IdAlumno", $datos["IdAlumno"], PDO::PARAM_STR);
		$stmt->bindParam(":IdEmpleado", $datos["IdEmpleado"], PDO::PARAM_STR);
		$stmt->bindParam(":TipoBaja", $datos["TipoBaja"], PDO::PARAM_STR);
		$stmt->bindParam(":Alcance", $datos["Alcance"], PDO::PARAM_STR);
		$stmt->bindParam(":IdMotivo", $datos["IdMotivo"], PDO::PARAM_STR);
		$stmt->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);


		if($stmt->execute()){
	      return "ok";
	    } else {
	      return "error";
	    }

	    $stmt->close();
	    $stmt = null;
	}

	/*================================
	ELIMINAR BAJAS
	=================================*/

	static public function mdlEliminarBaja($tabla, $IdBaja){

		$stmt = Conexion::conectar()->prepare("DELETE from $tabla where IdBaja = :IdBaja");
	    $stmt -> bindParam(":IdBaja", $IdBaja, PDO::PARAM_INT);
	    $stmt->execute();

	       


	    if($stmt->execute()){
	      return "ok";
	    } else {
	      return "error";
	    }

	    $stmt->close();
	    $stmt = null;

	}

	static public function mdlCargarListaAlumnos($tabla){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                  $stmt->execute();

                  return $stmt;
    $stmt->close();
    $stmt=null;

  }

  static public function mdlCargarListas($tabla){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                  $stmt->execute();

                  return $stmt;
    $stmt->close();
    $stmt=null;

  }

}
