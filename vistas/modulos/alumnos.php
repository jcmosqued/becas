<!--=========================
ALUMNOS 
==========================-->

<div class="content-wrapper">
  
  <section class="content-header">
    
    <h1>
        Alumnos
    </h1>
                  <ol class="breadcrumb">
                    <li><a href="index.php?ruta=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li class="active">Alumnos</li>
                  </ol>
                
                </section>

                <section class="content">

                  <div class="box">
                    <div class="box-header with-border">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAlumno">Agregar Alumnos</button>
                    </div>
                    <div class="box-body">
                      <table class="table table-bordered table-striped dt-responsive TablaAlumnos" width="100%">
                        <thead>
                          <tr>
                            <th>Id Alumnos</th>
                            <th>Nombre</th>
                            <th>Matricula</th>
                            <th>Unidad Academica</th>
                            <th>Carrera</th>
                            <th>Especialidad</th>
                            <th>Turno</th>
                            <th>Grupo</th>
                            <th>Beca</th>
                            <th>Horas Servicio Becario</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>

                      </table>
                    </div>
                  </div>
                </section>
              </div>


            <!--=========================
            MODAL AGREGAR ALUMNOS
            ==========================-->

            <div id="modalAgregarAlumno" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="post" enctype="multipart/form-data">
                  
                    <div class="modal-header" style="background: #3c8dbc; color: white">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Agregar Alumno</h4>
                    </div>
                  
                    <div class="modal-body">
                      <div class="box-body">

                                                
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Nombre" name="NomAlumno" required>
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg validarAlumno" placeholder="Matricula" name="Matricula" required minlength="8" maxlength="8">
                          </div>              
                        </div>



                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <select type="text" class="form-control input-lg" placeholder="Id Unidad Academica" name="IdUnidadAcademica" required>
                              <option value="0">Seleccione Unidad Academica:</option>
                              <?php
 
                                $stmt = new ControladorAlumnos();
                                $stmt -> ctrCargarListaUnidadAcademicas()
                                ?>
                            </select>
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <select type="text" class="form-control input-lg" placeholder="Id Carrera" name="IdCarrera" required>
                              <option value="0">Seleccione Carrera:</option>
                              <?php
 
                                $stmt = new ControladorAlumnos();
                                $stmt -> ctrCargarListaCarreras()
                                ?>
                            </select>
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <select type="text" class="form-control input-lg" placeholder="Id Especialidad" name="IdEspecialidad" required>
                              <option value="0">Seleccione Especialidad:</option>
                                 <?php
 
                                $stmt = new ControladorAlumnos();
                                $stmt -> ctrCargarListaEspecialidades()
                                ?>

                            </select>
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <select type="text" class="form-control input-lg" placeholder="Turno" name="Turno" required>
                              <option value="0">Seleccione Turno:</option>
                              <option value="Mat">Matutino</option>
                              <option value="Ves">Vespertino</option>
                              </select>
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <select type="text" class="form-control input-lg" placeholder="Grupo" name="Grupo" required>
                              <option value="0">Seleccione Grupo:</option>
                                 <?php
 
                                $stmt = new ControladorAlumnos();
                                $stmt -> ctrCargarListaGrupos()
                                ?>
                            </select>
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <select type="text" class="form-control input-lg" placeholder="Id Beca" name="IdBeca" required>
                              <option value="0">Seleccione Beca:</option>

                                 <?php
 
                                $stmt = new ControladorAlumnos();
                                $stmt -> ctrCargarListaBecas()
                                ?>
                              
                            </select>
                          </div>              
                        </div>




                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Horas de Servicio Becario" name="HorasServicioBecario" required>
                          </div>              
                        </div>



                      </div>
                      
                    </div>
                  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-primary">Guardar Alumno</button>
                    </div>
                  
                  </form> 

                  <?php
                    $crearAlumno = new ControladorAlumnos();
                    $crearAlumno-> ctrCrearAlumno();
                  ?>

                </div>
              </div>
            </div>







            <!--=========================
            MODAL ALUMNOS
            ==========================-->

            
            <div id="modalEditarAlumno" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="post" enctype="multipart/form-data">
                  
                    <div class="modal-header" style="background: #3c8dbc; color: white">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editar Alumnos</h4>
                    </div>
                  
                    <div class="modal-body">
                      <div class="box-body">

                         <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" disabled="disabled" class="form-control input-lg" placeholder="Id" name="IdAlumno2" id="IdAlumno2" required>
                            <input type="hidden" class="form-control input-lg" name="IdAlumno" id="IdAlumno">
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Nombre" name="editarNomNombre" id="NomAlumno" required>
                            
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg validarAlumno" placeholder="Matricula" name="Matricula" id="Matricula" required minlength="8" maxlength="8">
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <select type="text" class="form-control input-lg" placeholder="IdUnidadAcademica" name="IdUnidadAcademica" id="IdUnidadAcademica" required>
                              <option value="0">Seleccione Unidad Academica:</option>
                              <?php
 
                                $stmt = new ControladorAlumnos();
                                $stmt -> ctrCargarListaUnidadAcademicas()
                                ?>
                            </select>
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <select type="text" class="form-control input-lg" placeholder="IdCarrera" name="IdCarrera" id="IdCarrera" required>
                              <option value="0">Seleccione Carrera:</option>
                              <?php
 
                                $stmt = new ControladorAlumnos();
                                $stmt -> ctrCargarListaCarreras()
                                ?>
                            </select>
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <select type="text" class="form-control input-lg" placeholder="IdEspecialidad" name="IdEspecialidad" id="IdEspecialidad" required>
                              <option value="0">Seleccione Especialidad:</option>
                               <?php
 
                                $stmt = new ControladorAlumnos();
                                $stmt -> ctrCargarListaEspecialidades()
                                ?>


                            </select>
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <select type="text" class="form-control input-lg" placeholder="Turno" name="Turno" id="Turno" required>
                              <option value="0">Seleccione Turno:</option>
                              <option value="Mat">Matutino</option>
                              <option value="Ves">Vespertino</option>
                            </select>
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <select type="text" class="form-control input-lg" placeholder="Grupo" name="Grupo" id="Grupo" required>
                              <option value="0">Seleccione Grupo:</option>
                                 <?php
 
                                $stmt = new ControladorAlumnos();
                                $stmt -> ctrCargarListaGrupos()
                                ?>
                            </select>
                          </div>              
                        </div>



                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <select type="text" class="form-control input-lg" placeholder="IdBeca" name="IdBeca" id="IdBeca" required>
                              <option value="0">Seleccione Beca:</option>
                              <?php
 
                                $stmt = new ControladorAlumnos();
                                $stmt -> ctrCargarListaBecas()
                                ?>

                            </select>
                          </div>              
                        </div>


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text"  class="form-control input-lg" placeholder="HorasServicioBecario" name="HorasServicioBecario" id="HorasServicioBecario" required>
                          </div>              
                        </div>


                      </div>
                      
                    </div>
                  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-primary">Editar Alumno</button>
                    </div>
                  
                  </form> 

                  <?php
                    $editarAlumno = new ControladorAlumnos();
                    $editarAlumno -> ctrEditarAlumno();
                  ?>

                </div>
              </div>
            </div>
        
            
            <?php
              $eliminarAlumno = new ControladorAlumnos();
              $eliminarAlumno-> ctrEliminarAlumno();
            ?>