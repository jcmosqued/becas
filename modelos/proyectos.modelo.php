<?php

require_once "conexion.php";

class ModeloProyectos{

	/*================================
	MOSTRAR PROYECTOSs
	=================================*/
	static public function mdlMostrarProyectos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");		
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);		
			$stmt->execute();
			return $stmt->fetch();

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla
				INNER JOIN empleados ON $tabla.IdEmpleado = empleados.IdEmpleado
				INNER JOIN areas ON $tabla.IdArea = areas.IdArea
				INNER JOIN cuatrimestres ON $tabla.IdCuatrimestre = cuatrimestres.IdCuatrimestre

				ORDER BY IdProyecto DESC");
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
	ACTIVAR PROYECTO

	from p, c.NomCuatrimestre, e.NomEmpleado, a.NomArea
											FROM $tabla p
											JOIN Cuatrimestres c ON p.IdCuatrimestre = c.IdCuatrimestre
											JOIN Empleados e ON p.IdEmpleado = e.IdEmpleado
											JOIN Areas a on p.IdArea = a.IdArea ORDER BY IdProyecto DESC;"

	unidades academicas
	carreras
	especialidades
	cuatrimestres
	Areas
	=================================*/
	static public function mdlActualizarProyecto($tabla, $item1, $valor1, $item2, $valor2){

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

	/*================================
	INGRESAR PROYECTO
	=================================*/
	static public function mdlIngresarProyecto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (NomProyecto, IdEmpleado, IdArea, Departamento, TipoActividades, EspecificarActividades, IdCuatrimestre, FechaInicio, Duracion, CantidadAlumnos, Sexo, CarrerasPreferidas, Observaciones) VALUES (:nombre, :idEmpleado, :idArea, :departamento, :tipoActividades, :especificar, :idCuatrimestre, :fechaInicio, :duracion, :cantidad, :sexo, :carreras, :observaciones);");

		$stmt->bindParam(":nombre", $datos["NomProyecto"], PDO::PARAM_STR);
		$stmt->bindParam(":idEmpleado", $datos["IdEmpleado"], PDO::PARAM_STR);
		$stmt->bindParam(":idArea", $datos["IdArea"], PDO::PARAM_STR);
		$stmt->bindParam(":departamento", $datos["Departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoActividades", $datos["TipoActividades"], PDO::PARAM_STR);
		$stmt->bindParam(":especificar", $datos["EspecificarActividades"], PDO::PARAM_STR);
		$stmt->bindParam(":idCuatrimestre", $datos["IdCuatrimestre"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaInicio", $datos["FechaInicio"], PDO::PARAM_STR);
		$stmt->bindParam(":duracion", $datos["Duracion"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["CantidadAlumnos"], PDO::PARAM_STR);
		$stmt->bindParam(":sexo", $datos["Sexo"], PDO::PARAM_STR);
		$stmt->bindParam(":carreras", $datos["CarrerasPreferentes"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["Observaciones"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	/*================================
	EDITAR PROYECTO
	=================================*/
	static public function mdlEditarProyecto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NomProyecto = :nombre, 
			IdEmpleado = :idEmpleado, IdArea = :idArea, Departamento = :departamento, 
			TipoActividades = :tipoActividades, EspecificarActividades = :especificarActividades,
			IdCuatrimestre = :idCuatrimestre, FechaInicio = :fechaInicio, Duracion = :duracion, 
			CantidadAlumnos = :cantidadAlumnos, Sexo = :sexo, CarrerasPreferidas = :carrerasPreferentes,
			Observaciones = :observaciones, Estatus = :estatus 
			WHERE IdProyecto = :idProyecto;");

		$stmt->bindParam(":idProyecto", $datos["IdProyecto"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["NomProyecto"], PDO::PARAM_STR);
		$stmt->bindParam(":idEmpleado", $datos["IdEmpleado"], PDO::PARAM_STR);
		$stmt->bindParam(":idArea", $datos["IdArea"], PDO::PARAM_STR);
		$stmt->bindParam(":departamento", $datos["Departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoActividades", $datos["TipoActividades"], PDO::PARAM_STR);
		$stmt->bindParam(":especificarActividades", $datos["EspecificarActividades"], PDO::PARAM_STR);
		$stmt->bindParam(":idCuatrimestre", $datos["IdCuatrimestre"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaInicio", $datos["FechaInicio"], PDO::PARAM_STR);
		$stmt->bindParam(":duracion", $datos["Duracion"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidadAlumnos", $datos["CantidadAlumnos"], PDO::PARAM_STR);
		$stmt->bindParam(":sexo", $datos["Sexo"], PDO::PARAM_STR);
		$stmt->bindParam(":carrerasPreferentes", $datos["CarrerasPreferentes"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["Observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $datos["Estatus"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	/*================================
	ELIMINAR PROYECTO
	=================================*/
	static public function mdlEliminarProyecto($tabla, $idProyecto){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IdProyecto = $idProyecto;");
		//$stmt -> bindParam(1, $idCuatrimestre, PDO::PARAM_INT);
		
		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlCargarListas($tabla){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                  $stmt->execute();

                  return $stmt;
    $stmt->close();
    $stmt=null;
}

}