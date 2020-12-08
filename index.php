<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/unidadesAcademicas.controlador.php";
require_once "controladores/becas.controlador.php";
require_once "controladores/cuatrimestres.controlador.php";
require_once "controladores/especialidades.controlador.php";
require_once "controladores/proyectos.controlador.php";
require_once "controladores/areas.controlador.php";
require_once "controladores/carreras.controlador.php";
require_once "controladores/alumnos.controlador.php";
require_once "controladores/bajas.controlador.php";
require_once "controladores/motivos.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/unidadesAcademicas.modelo.php";
require_once "modelos/becas.modelo.php";
require_once "modelos/cuatrimestres.modelo.php";
require_once "modelos/especialidades.modelo.php";
require_once "modelos/proyectos.modelo.php";
require_once "modelos/carreras.modelo.php";
require_once "modelos/areas.modelo.php";
require_once "modelos/alumnos.modelo.php";
require_once "modelos/bajas.modelo.php";
require_once "modelos/motivos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla ->plantilla();
