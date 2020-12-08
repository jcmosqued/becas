<?php
 

require_once "conexion.php";

class ModeloAlumnos{

    /*================================
  MOSTRAR Alumnos
  =================================*/

  static public function mdlMostrarAlumnos($tabla, $item, $valor){

    
    if($item != null){

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");   
      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);    
      $stmt->execute();
      return $stmt->fetch();
      

    } else {

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla 
                    INNER JOIN unidadesacademicas ON $tabla.IdUnidadAcademica = unidadesacademicas.IdUnidadAcademica
                    INNER JOIN carreras ON $tabla.IdCarrera = carreras.IdCarrera
                    INNER JOIN especialidades ON $tabla.IdEspecialidad = especialidades.IdEspecialidad
                    INNER JOIN grupos ON $tabla.IdGrupo = grupos.IdGrupo
                    INNER JOIN becas ON $tabla.IdBeca = becas.IdBeca
                    ORDER BY IdAlumno DESC");
      $stmt->execute();
      return $stmt->fetchAll();
      
    }

    $stmt->close();
    $stmt=null;

  }

  static public function mdlIngresarAlumno($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (NomAlumno, Matricula, IdUnidadAcademica, IdCarrera, IdEspecialidad, Turno, IdGrupo, IdBeca, HorasServicioBecario, Estado) VALUES (:NomAlumno, :Matricula, :IdUnidadAcademica, :IdCarrera, :IdEspecialidad, :Turno, :Grupo, :IdBeca, :HorasServicioBecario, 1);");

    $stmt->bindParam(":NomAlumno", $datos["NomAlumno"], PDO::PARAM_STR);
    $stmt->bindParam(":Matricula", $datos["Matricula"], PDO::PARAM_STR);
    $stmt->bindParam(":IdUnidadAcademica", $datos["IdUnidadAcademica"], PDO::PARAM_STR);
    $stmt->bindParam(":IdCarrera", $datos["IdCarrera"], PDO::PARAM_STR);
    $stmt->bindParam(":IdEspecialidad", $datos["IdEspecialidad"], PDO::PARAM_STR);
    $stmt->bindParam(":Turno", $datos["Turno"], PDO::PARAM_STR);
    $stmt->bindParam(":Grupo", $datos["IdGrupo"], PDO::PARAM_STR);
    $stmt->bindParam(":IdBeca", $datos["IdBeca"], PDO::PARAM_STR);
    $stmt->bindParam(":HorasServicioBecario", $datos["HorasServicioBecario"], PDO::PARAM_STR);


    if($stmt->execute()){
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt = null;

  }


  static public function mdlEditarAlumno($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NomAlumno = :NomAlumno, Matricula = :Matricula, IdUnidadAcademica = :IdUnidadAcademica, IdCarrera  = :IdCarrera, IdEspecialidad = :IdEspecialidad, Turno = :Turno, IdGrupo = :Grupo, IdBeca = :IdBeca, HorasServicioBecario = :HorasServicioBecario where IdAlumno = :IdAlumno");
    
    $stmt->bindParam(":IdAlumno", $datos["IdAlumno"], PDO::PARAM_STR);
    $stmt->bindParam(":NomAlumno", $datos["NomAlumno"], PDO::PARAM_STR);
    $stmt->bindParam(":Matricula", $datos["Matricula"], PDO::PARAM_INT);
    $stmt->bindParam(":IdUnidadAcademica", $datos["IdUnidadAcademica"], PDO::PARAM_INT);
    $stmt->bindParam(":IdCarrera", $datos["IdCarrera"], PDO::PARAM_INT);
    $stmt->bindParam(":IdEspecialidad", $datos["IdEspecialidad"], PDO::PARAM_INT);
    $stmt->bindParam(":Turno", $datos["Turno"], PDO::PARAM_STR);
    $stmt->bindParam(":Grupo", $datos["IdGrupo"], PDO::PARAM_STR);
    $stmt->bindParam(":IdBeca", $datos["IdBeca"], PDO::PARAM_INT);
    $stmt->bindParam(":HorasServicioBecario", $datos["HorasServicioBecario"], PDO::PARAM_STR);

     
    

    if($stmt->execute()){
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt = null;

  }

  static public function mdlEliminarAlumno($tabla, $IdAlumno){

    $stmt = Conexion::conectar()->prepare("DELETE from $tabla where IdAlumno = :IdAlumno");
    $stmt -> bindParam(":IdAlumno", $IdAlumno, PDO::PARAM_INT);
    $stmt->execute();

       


    if($stmt->execute()){
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt = null;

  }

  /*================================
  ACTIVAR USUARIO
  =================================*/

  static public function mdlActualizarAlumno($tabla, $item1, $valor1, $item2, $valor2){

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

  static public function mdlCargarListas($tabla){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                  $stmt->execute();

                  return $stmt;
    $stmt->close();
    $stmt=null;
}
}

