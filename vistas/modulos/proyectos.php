<!--=========================
PROYECTOS
==========================-->
<div class="content-wrapper">
  
  <section class="content-header">
    
    <h1>
      Proyectos
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php?ruta=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Proyectos</li>
    </ol>
    
  </section>

  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProyecto">Agregar Proyecto</button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive TablaProyectos" width="100%">
          <thead>
            <tr>
              <th>Proyecto</th>
              <th>Empleado</th>
              <th>Area</th>
              <th>DPTO.</th>
              <th>Tipo Act.</th>
              <th>Especificar Act.</th>
              <th>Cuatrimestre</th>
              <th>Fecha Inicio</th>
              <th>Estado</th>
              <th>Acciones</th>
              <th>Duracion</th>
              <th>Cant. Alumnos</th>
              <th>Sexo</th>
              <th>Carreras pref.</th>
              <th>OBS</th>
              <th>Liberacion</th>
            </tr>
          </thead>

        </table>
      </div>
    </div>
  </section>
</div>

            <!--=========================
            MODAL EDITAR PROYECTO
            ==========================--> 
            <div id="modalEditarProyecto" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="post" enctype="multipart/form-data">

                    <div class="modal-header" style="background: #3c8dbc; color: white">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editar Proyecto</h4>
                    </div>
                    
                    <div class="modal-body">
                      <div class="box-body">

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" disabled="disabled" class="form-control input-lg" placeholder=""name="IdProyecto" id="IdProyecto" required>
                            <input type="hidden" class="form-control input-lg" name="IdProtecto2" id="IdProyecto2">
                          </div>              
                        </div>
                        
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar Nombre del Proyecto" name="EditarNomProyecto" id="NomProyecto" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar ID del Empleado" name="EditarIdEmpleado" id="IdEmpleado" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar ID del &Aacute;rea" name="EditarIdArea" id="IdArea" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar Nombre del Departamento" name="EditarDepartamento" id="Departamento" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar Tipo de Actividad/Actividades" name="EditarTipoActividades" id="TipoActividades" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar Escificaci&oacute;nes de la Actividad/Actividades" name="EditarEspecificarActividades" id="EspecificarActividades" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar ID del Cuatrimestre" name="EditarIdCuatrimestre" id="IdCuatrimestre" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar Fecha de Inicio" name="EditarFechaInicio" id="FechaInicio" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar Duraci&oacute;n" name="EditarDuracion" id="Duracion" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar Cantidad de Alumnos" name="EditarCantidadAlumnos" id="CantidadAlumnos" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar Sexo Requerido" name="EditarSexo" id="Sexo" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar Carreras Preferentes" name="EditarCarrerasPreferentes" id="CarrerasPreferentes" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar Observaciones" name="EditarObservaciones" id="Observaciones" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Editar Estatus del Proyecto" name="EditarEstatus" id="Estatus" required>
                          </div>              
                        </div>

                      </div>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-primary">Editar Proyecto</button>
                    </div>
                    
                  </form> 

                  <?php
                  $editarProyecto = new ControladorProyectos();
                  $editarProyecto -> ctrEditarProyecto();
                  ?>

                </div>
              </div>
            </div>
              
            <!--=========================
            MODAL AGREGAR PROYECTO
            ==========================-->
            <div id="modalAgregarProyecto" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="post" enctype="multipart/form-data">
                    
                    <div class="modal-header" style="background: #3c8dbc; color: white">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Agregar Proyecto</h4>
                    </div>
                    
                    <div class="modal-body">
                      <div class="box-body">
                        
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Nombre del Proyecto" name="nombreProyecto" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar ID del Empleado" name="idEmpleado" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresa el ID del &Aacute;rea" name="idArea" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Nombre del Departamento" name="departamento" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Tipo de Actividad/Actividades" name="tipoActividades" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Espec&iacute;ficar la Actividad/Actividades" name="especificarActividades" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar el ID del Cuatrimestre" name="idCuatrimestre" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar la Fecha de Inicio Ejem: 2020-08-19" name="fechaInicio" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar la Duraci&oacute;n en Horas" name="duracion" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Cantidad de Alumnos Requeridos" name="cantidadAlumnos" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Sexo Requerido para la Actividad" name="sexo" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Carreras Preferentes" name="carrerasPreferentes" required>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Observaciones" name="observaciones" required>
                          </div>              
                        </div>

                      </div>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
                    </div>
                    
                  </form> 

                  <?php
                  $crearProyecto = new ControladorProyectos();
                  $crearProyecto-> ctrInsertarProyecto();
                  ?>

                </div>
              </div>
            </div>
            
            <?php
            //$eliminarProyecto = new ControladorUnidadesAcademicas();
            //$eliminarProyecto-> ctrEliminarUnidadAcademica();
            ?>

