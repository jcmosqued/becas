/*
    Name:       Proyecto Estadias UTL
    
    Version:    1.0
    Date:       08/07/2020 11:40:00
    Author:     Huerta Medina Andy Mariano
    Email:      utlandymariano@gmail.com
    Comments:   Primera version de la DB_SE_Becas
*/

DROP DATABASE IF EXISTS DB_SE_Becas;
CREATE DATABASE DB_SE_Becas;

USE DB_SE_Becas;

CREATE TABLE Usuarios
(
	IdUsuario 		INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NomUsuario 		VARCHAR(45) DEFAULT '',
    Contrasenia 	VARCHAR(45) DEFAULT '',
    TipoUsuario 	VARCHAR(45) DEFAULT ''
);

CREATE TABLE Empleados
(
	IdEmpleado 			INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NomEmpleado 		VARCHAR(45) DEFAULT '',
    Puesto_Cargo 		VARCHAR(45) DEFAULT '',
    Departamento 		VARCHAR(45) DEFAULT '',
    CorreoElectronico 	VARCHAR(45) DEFAULT '',
    Telefono 			VARCHAR(45) DEFAULT '',
    Ext 				VARCHAR(10) DEFAULT '',
    IdUsuario 			INT(11) NOT NULL,
    
    CONSTRAINT fk_Empleados_Usuarios FOREIGN KEY (IdUsuario) REFERENCES Usuarios(IdUsuario) ON DELETE CASCADE ON UPDATE CASCADE
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
    Duracion					VARCHAR(45) DEFAULT '',
    CantidadAlumnos				INT(5),
    Sexo						VARCHAR(25) DEFAULT 'Indistinto',
    CarerrasPreferentes			TEXT,
    Observaciones				TEXT,
    Estatus						VARCHAR(15) DEFAULT 'En proceso', 

    CONSTRAINT fk_Proyectos_Empleados FOREIGN KEY (IdEmpleado) REFERENCES Empleados(IdEmpleado) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_Proyectos_Areas FOREIGN KEY (IdArea) REFERENCES Areas(IdArea) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_Proyectos_Cuatrimestres FOREIGN KEY (IdCuatrimestre) REFERENCES Cuatrimestres(IdCuatrimestre) ON DELETE CASCADE ON UPDATE CASCADE
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
	IdCarrera		INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NomCarrera		VARCHAR(45) DEFAULT ''
);

CREATE TABLE Especialidades
(
	IdEspecialidad		INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NomEspecialidad		VARCHAR(45) DEFAULT ''
);

CREATE TABLE UnidadesAcademicas_Carreras
(
	IdUnidadAcademica		INT(11) NOT NULL,
	IdCarrera				INT(11) NOT NULL,

	CONSTRAINT fk_UnidadesAcademicasCarreras_UnidadesAcademicas FOREIGN KEY (IdUnidadAcademica) REFERENCES UnidadesAcademicas(IdUnidadAcademica) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_UnidadesAcademicasCarreras_Carreras FOREIGN KEY (IdCarrera) REFERENCES Carreras(IdCarrera) ON DELETE CASCADE ON UPDATE CASCADE
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
    Grupo						VARCHAR(10) DEFAULT '',
    IdBeca						INT(11) NOT NULL,
    HorasServicioBecario		INT(2) DEFAULT '32',

    CONSTRAINT fk_Alumnos_UnidadesAcademicas FOREIGN KEY (IdUnidadAcademica) REFERENCES UnidadesAcademicas(IdUnidadAcademica) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_Alumnos_Carreras FOREIGN KEY (IdCarrera) REFERENCES Carreras(IdCarrera) ON DELETE CASCADE ON UPDATE CASCADE,    
	CONSTRAINT fk_Alumnos_Especialidades FOREIGN KEY (IdEspecialidad) REFERENCES Especialidades(IdEspecialidad) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_Alumnos_Becas FOREIGN KEY (IdBeca) REFERENCES Becas(IdBeca) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Alumnos_Proyectos
(
	IdAlumno					INT(11) NOT NULL,
    IdProyecto					INT(11) NOT NULL,
    HorasCumplidas				INT(5),
    EstatusServicioSocial		VARCHAR(45) DEFAULT '',
    PeriodoLiberacion			VARCHAR(15) DEFAULT '',
    FechaInicio					DATE,
    FechaFin					DATE,
    FechaLimite					DATE,
    Observaciones				TEXT,

    CONSTRAINT fk_AlumnosProyectos_Alumnos FOREIGN KEY (IdAlumno) REFERENCES Alumnos(IdAlumno) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_AlumnosProyectos_Proyectos FOREIGN KEY (IdProyecto) REFERENCES Proyectos(IdProyecto) ON DELETE CASCADE ON UPDATE CASCADE
);