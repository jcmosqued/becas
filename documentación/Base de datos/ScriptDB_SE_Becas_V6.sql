/*
    Name:       Proyecto Estadias UTL
    
    Version:    6.0
    Date:       22/08/2020 01:40:00 p.m.
    Author:     Huerta Medina Andy Mariano
    Email:      utlandymariano@gmail.com
    Comments:   Sexta version de la DB_SE_Becas, se agrego la tabla de bajas, motivos, submotivos, además
    			de crear una nueva tabla llamada grupos, que esta relacionada a las tablas de alumnos y
    			especialidades. Se agregaron las columnas de estatus e inscrito en la tabla alumnos.
*/

DROP DATABASE IF EXISTS DB_SE_Becas;
CREATE DATABASE DB_SE_Becas;

USE DB_SE_Becas;

CREATE TABLE Usuarios
(
	IdUsuario 		INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Contrasenia 	VARCHAR(45) DEFAULT '',
    TipoUsuario 	VARCHAR(45) DEFAULT ''
);

CREATE TABLE Empleados
(
	IdEmpleado 			INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NomEmpleado 		VARCHAR(45) DEFAULT '',
    NumEmpleado         INT(20),
    Puesto_Cargo 		VARCHAR(45) DEFAULT '',
    Departamento 		VARCHAR(45) DEFAULT '',
    CorreoElectronico 	VARCHAR(45) DEFAULT '',
    Telefono 			VARCHAR(45) DEFAULT '',
    Ext 				VARCHAR(10) DEFAULT '',
    Estado 				INT(2) DEFAULT '1',
    IdUsuario 			INT(11) NOT NULL,
    
    CONSTRAINT fk_empleados_usuarios FOREIGN KEY (IdUsuario) REFERENCES Usuarios(IdUsuario) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Areas
(
	IdArea		INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NomArea 	VARCHAR(45) DEFAULT ''
);

CREATE TABLE Cuatrimestres
(
	IdCuatrimestre		INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NomCuatrimestre		VARCHAR(45) DEFAULT ''
);

CREATE TABLE Proyectos
(
	IdProyecto					INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NomProyecto					VARCHAR(45) DEFAULT '', 
    IdEmpleado					INT(11) NOT NULL, 
    IdArea						INT(11) NOT NULL,
    Departamento 				VARCHAR(45) DEFAULT '',
    TipoActividades				TEXT,
    EspecificarActividades		TEXT,
    IdCuatrimestre				INT(11) NOT NULL,
    FechaInicio					DATE,
    Duracion					INT(2),
    CantidadAlumnos				INT(5),
    Sexo						VARCHAR(25) DEFAULT 'Indistinto',
    CarrerasPreferentes			TEXT,
    Observaciones				TEXT,
    Estado		 				INT(2) DEFAULT '1',
    Estatus						VARCHAR(15) DEFAULT 'En proceso', 

    CONSTRAINT fk_proyectos_empleados FOREIGN KEY (IdEmpleado) REFERENCES Empleados(IdEmpleado) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_proyectos_areas FOREIGN KEY (IdArea) REFERENCES Areas(IdArea) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_proyectos_cuatrimestres FOREIGN KEY (IdCuatrimestre) REFERENCES Cuatrimestres(IdCuatrimestre) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Becas
(
	IdBeca		INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NomBeca		VARCHAR(45) DEFAULT ''
);

CREATE TABLE UnidadesAcademicas
(
	IdUnidadAcademica		INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NomUnidadAcademica		VARCHAR(45) DEFAULT ''
);

CREATE TABLE Carreras
(
	IdCarrera		    INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NomCarrera		    VARCHAR(45) DEFAULT '',
    IdUnidadAcademica   INT(11) NOT NULL,

    CONSTRAINT fk_carreras_unidadesAcademicas FOREIGN KEY (IdUnidadAcademica) REFERENCES UnidadesAcademicas(IdUnidadAcademica) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Especialidades
(
	IdEspecialidad		INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NomEspecialidad		VARCHAR(45) DEFAULT '',
    IdCarrera           INT(11) NOT NULL,

    CONSTRAINT fk_especialidades_carreras FOREIGN KEY (IdCarrera) REFERENCES Carreras(IdCarrera) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Grupos
(
	IdGrupo 				INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	NomGrupo				VARCHAR(45) DEFAULT '',
	IdEspecialidad			INT(11) NOT NULL,

	CONSTRAINT fk_grupos_especialidades FOREIGN KEY (IdEspecialidad) REFERENCES Especialidades(IdEspecialidad) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Alumnos
(
	IdAlumno					INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NomAlumno					VARCHAR(45) DEFAULT '',
    Matricula					INT(10) NOT NULL,
    IdUnidadAcademica			INT(11) NOT NULL,
    IdCarrera					INT(11) NOT NULL,
    IdEspecialidad				INT(11) NOT NULL,
    Turno						VARCHAR(45) DEFAULT '',
    IdGrupo						INT(11) NOT NULL,
    IdBeca						INT(11) NOT NULL,
    HorasServicioBecario		INT(2) DEFAULT '32',
    Estado		 				INT(2) DEFAULT '1',
    Estatus 					VARCHAR(15) DEFAULT '',
    Inscrito					VARCHAR(10) DEFAULT '',

    CONSTRAINT fk_alumnos_unidadesAcademicas FOREIGN KEY (IdUnidadAcademica) REFERENCES UnidadesAcademicas(IdUnidadAcademica) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_alumnos_carreras FOREIGN KEY (IdCarrera) REFERENCES Carreras(IdCarrera) ON DELETE CASCADE ON UPDATE CASCADE,    
	CONSTRAINT fk_alumnos_especialidades FOREIGN KEY (IdEspecialidad) REFERENCES Especialidades(IdEspecialidad) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_alumnos_grupos FOREIGN KEY (IdGrupo) REFERENCES Grupos(IdGrupo) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_alumnos_becas FOREIGN KEY (IdBeca) REFERENCES Becas(IdBeca) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Motivos
(
	IdMotivo 		INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Motivo 			VARCHAR(64) DEFAULT ''
);

CREATE TABLE Submotivos
(
	IdSubmotivo 		INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Submotivo   		VARCHAR(45) DEFAULT '',
	IdMotivo 			INT(11) NOT NULL,

	CONSTRAINT fk_submotivos_motivos FOREIGN KEY (IdMotivo) REFERENCES Motivos(IdMotivo) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Bajas
(
	IdBaja				INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    FechaBaja			DATE,
    IdAlumno			INT(11) NOT NULL,
    IdEmpleado			INT(11) NOT NULL,
    TipoBaja			VARCHAR(45) DEFAULT '',
    Alcance				VARCHAR(45) DEFAULT '',
    IdMotivo			INT(11) NOT NULL,
    IdSubmotivo			INT(11) NOT NULL,
    Observaciones		TEXT,

    CONSTRAINT fk_bajas_alumnos FOREIGN KEY (IdAlumno) REFERENCES Alumnos(IdAlumno) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_bajas_empleados FOREIGN KEY (IdEmpleado) REFERENCES Empleados(IdEmpleado) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_bajas_motivos FOREIGN KEY (IdMotivo) REFERENCES Motivos(IdMotivo) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_bajas_submotivos FOREIGN KEY (IdSubmotivo) REFERENCES Submotivos(IdSubmotivo) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Alumnos_Proyectos
(
	IdAlumno					INT(11) NOT NULL,
    IdProyecto					INT(11) NOT NULL,
    HorasCumplidas				INT(5),
    EstatusServicioBecario		VARCHAR(45) DEFAULT '',
    IdCuatrimestre			    INT(20) NOT NULL,
    FechaInicio					DATE,
    FechaFin					DATE,
    FechaLimite					DATE,
    Observaciones				TEXT,

    CONSTRAINT fk_alumnosProyectos_alumnos FOREIGN KEY (IdAlumno) REFERENCES Alumnos(IdAlumno) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_alumnosProyectos_proyectos FOREIGN KEY (IdProyecto) REFERENCES Proyectos(IdProyecto) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_alumnosProyectos_cuatrimestres FOREIGN KEY (IdCuatrimestre) REFERENCES Cuatrimestres(IdCuatrimestre) ON DELETE CASCADE ON UPDATE CASCADE
);