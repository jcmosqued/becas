/*
    Name:       Proyecto Estadias UTL
    
    Version:    2.0
    Date:       24/04/2020 01:20:00 a.m.
    Author:     Huerta Medina Andy Mariano
    Email:      utlandymariano@gmail.com
    Comments:   Segunda version de los StoredProceduresDB_SE_Becas,
				Creacion de los procedimientos de agregación faltantes para 
				las tablas Proyectos, Alumnos, UnidadesAcademicas, Carreras, Especialidades, Becas,
                Areas, Cuatrimestres, Alumnos_Proyectos.
*/

USE DB_SE_Becas;

DROP PROCEDURE IF EXISTS insertar_empleado;
#Procedimiento almacenado para insertar un Empleado:
DELIMITER $$
CREATE PROCEDURE insertar_empleado (IN v_nombre          VARCHAR(45),
                                    IN v_numero         INT(20),
                                    IN v_puesto         VARCHAR(45),
                                    IN v_departamento   VARCHAR(45),
                                    IN v_correo         VARCHAR(45),
                                    IN v_telefono       VARCHAR(24),
                                    IN v_ext            VARCHAR(10), 
                                    IN v_tipo           VARCHAR(45),                       
                                    OUT v_idUsuario     INT(11),
                                    OUT v_contrasenia   VARCHAR(45))
BEGIN
    #Insertamos en la tabla [Usuarios]:
    INSERT INTO Usuarios (TipoUsuario)
                VALUES (v_tipo);

    #Recuperamos el ID generado en la tabla [Usuarios]:
    SET v_idUsuario = LAST_INSERT_ID();

    #Insertamos en la tabla [Empleados]:
    INSERT INTO Empleados (NomEmpleado, NumEmpleado, Puesto_Cargo, Departamento,
                           CorreoElectronico, Telefono, Ext, IdUsuario)
                VALUES (v_nombre, v_numero, v_puesto, v_departamento,
                        v_correo, v_telefono, v_ext, v_idUsuario);
    
    #Generamos la contrasenia del usuario:
    SET v_contrasenia = CONCAT("Utl-", v_numero);
    
    #Actualizamos en la tabla [Usuarios]:
    UPDATE Usuarios SET Contrasenia = v_contrasenia
                    WHERE IdUsuario = v_idUsuario;
END 
$$
DELIMITER ;
                        
#Procedimiento almacenado para insertar un Alumno:
DROP PROCEDURE IF EXISTS insertar_alumno;
DELIMITER $$
CREATE PROCEDURE insertar_alumno(IN v_nombre            VARCHAR(45),
                                 IN v_matricula         INT(10),
                                 IN v_unidadAcademica   INT(11),
                                 IN v_carrera           INT(11),
                                 IN v_especialidad      INT(11),
                                 IN v_turno             VARCHAR(45),
                                 IN v_grupo             VARCHAR(10), 
                                 IN v_beca              INT(11),                       
                                 IN v_horasServicio     INT(2))
BEGIN
    #Insertamos en la tabla [Alumnos]:
    INSERT INTO Alumnos(NomAlumno, Matricula, IdUnidadAcademica, IdCarrera,
                        IdEspecialidad, Turno, Grupo, IdBeca, HorasServicioBecario)
                VALUES(v_nombre, v_matricula, v_unidadAcademica, v_carrera,
                       v_especialidad, v_turno, v_grupo, v_beca, v_horasServicio);
END 
$$
DELIMITER ;

#Procedimiento almacenado para insertar una Unidad Academica:
DROP PROCEDURE IF EXISTS insertar_unidadAcademica;
DELIMITER $$
CREATE PROCEDURE insertar_unidadAcademica(IN v_nombre       VARCHAR(45))
BEGIN
    #Insertamos en la tabla [UnidadesAcademicas]:
    INSERT INTO UnidadesAcademicas(NomUnidadAcademica)
                            VALUES(v_nombre);
END 
$$
DELIMITER ;

#Procedimiento almacenado para insertar una Carrera:
DROP PROCEDURE IF EXISTS insertar_carrera;
DELIMITER $$
CREATE PROCEDURE insertar_carrera(IN v_nombre                   VARCHAR(45),
                                  IN v_idUnidadAcademica        INT(11))
BEGIN
    #Insertamos en la tabla [Carreras]:
    INSERT INTO Carreras(NomCarrera, IdUnidadAcademica)
				  VALUES(v_nombre, v_idUnidadAcademica);
END 
$$
DELIMITER ;

#Procedimiento almacenado para insertar una Especialidad
DROP PROCEDURE IF EXISTS insertar_especialidad;
DELIMITER $$
CREATE PROCEDURE insertar_especialidad(IN v_nombre			VARCHAR(45),
									   IN v_idCarrera		INT(11))
BEGIN
    #Insertamos en la tabla [Especialidades]:
    INSERT INTO Especialidades(NomEspecialidad, IdCarrera)
						VALUES(v_nombre, v_idCarrera);
END 
$$
DELIMITER ;

#Procedimiento almacenado para insertar una beca
DROP PROCEDURE IF EXISTS insertar_beca;
DELIMITER $$
CREATE PROCEDURE insertar_beca(IN v_nombre      VARCHAR(45))
BEGIN
    #Insertamos en la tabla [Becas]:
    INSERT INTO Becas(NomBeca)
			   VALUES(v_nombre);
END 
$$
DELIMITER ;

#Procedimiento almacenado para insertar una Area
DROP PROCEDURE IF EXISTS insertar_area;
DELIMITER $$
CREATE PROCEDURE insertar_area(IN v_nombre      VARCHAR(45))
BEGIN
    #Insertamos en la tabla [Areas]:
    INSERT INTO Areas(NomArea)
			   VALUES(v_nombre);
END 
$$
DELIMITER ;

#Procedimiento almacenado para insertar un cuatrimestre
DROP PROCEDURE IF EXISTS insertar_cuatrimestre;
DELIMITER $$
CREATE PROCEDURE insertar_cuatrimestre(IN v_nombre      VARCHAR(45))
BEGIN
    #Insertamos en la tabla [Cuatrimestres]:
    INSERT INTO Cuatrimestres(NomCuatrimestre)
					   VALUES(v_nombre);
END 
$$
DELIMITER ;

#Procedimiento almacenado para insertar un Proyecto:
DROP PROCEDURE IF EXISTS insertar_proyecto;
DELIMITER $$
CREATE PROCEDURE insertar_proyecto(IN v_nombre              VARCHAR(45),
                                   IN v_idEmpleado          INT(11),
                                   IN v_idArea              INT(11),
                                   IN v_departamento        VARCHAR(45),
                                   IN v_tipoActividades     TEXT,
                                   IN v_especificar         TEXT,
                                   IN v_idCuatrimestre      INT(11), 
                                   IN v_fechaInicio         DATE,                       
                                   IN v_duracion            INT(2),
                                   IN v_cantidad            INT(5),
                                   IN v_sexo                VARCHAR(45),
                                   IN v_carreras            TEXT,
                                   IN v_observaciones       TEXT,
                                   IN v_estatus             VARCHAR(45))
BEGIN
    #Insertamos en la tabla [Proyectos]:
    INSERT INTO Proyectos(NomProyecto, IdEmpleado, IdArea, Departamento,
                          TipoActividades, EspecificarActividades, IdCuatrimestre, 
                          FechaInicio, Duracion, CantidadAlumnos, Sexo,
                          CarrerasPreferentes, Observaciones, Estatus)
                   VALUES(v_nombre, v_idEmpleado, v_idArea, v_departamento,
                          v_tipoActividades, v_especificar, v_idCuatrimestre, 
                          v_fechaInicio, v_duracion, v_cantidad, v_sexo,
                          v_carreras, v_observaciones, v_estatus);
END 
$$
DELIMITER ;

#Procedimiento almacenado para insertar un Alumno_Proyecto:
DROP PROCEDURE IF EXISTS insertar_alumnoProyecto;
DELIMITER $$
CREATE PROCEDURE insertar_alumnoProyecto(IN v_idAlumno          INT(11),
                                         IN v_idProyecto        INT(11),
                                         IN v_horas             INT(5),
                                         IN v_estatus           VARCHAR(45),
                                         IN v_idCuatrimestre    INT(11),
                                         IN v_fechaInicio       DATE,
                                         IN v_fechaFin          DATE,                       
                                         IN v_fechaLimite       DATE,
                                         IN v_observaciones     TEXT)
BEGIN
    #Insertamos en la tabla [Alumnos_Proyectos]:
    INSERT INTO Alumnos_Proyectos(IdAlumno, IdProyecto, HorasCumplidas, EstatusServicioBecario,
                                  idCuatrimestre, FechaInicio, FechaFin, FechaLimite,
                                  Observaciones)
                           VALUES(v_idAlumno, v_idProyecto, v_horas, v_estatus,
                                  v_idCuatrimestre, v_fechaInicio, v_fechaFin, v_fechaLimite,
                                  v_observaciones);
END 
$$
DELIMITER ;
                        