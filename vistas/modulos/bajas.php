<!--=========================
BAJASs
==========================-->

<div class="content-wrapper">
  
  <section class="content-header">
    
    <h1>
        Bajas
    </h1>
                  <ol class="breadcrumb">
                    <li><a href="index.php?ruta=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li class="active">Bajas</li>
                  </ol>
                
                </section>

                <section class="content">

                  <div class="box">
                    <div class="box-header with-border">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarBaja">Agregar Baja</button>
                    </div>
                    <div class="box-body">
                      <table class="table table-bordered table-striped dt-responsive TablaBajas" width="100%">
                        <thead>
                          <tr>
                            <th>Id Baja</th>
                            <th>Fecha de la Baja</th>
                            <th>Alumno</th>
                            <th>Empleado</th>
                            <th>Tipo de Baja</th>
                            <th>Alcance</th>
                            <th>Motivo</th>
                            <th>Observaciones</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>

                      </table>
                    </div>
                  </div>
                </section>
              </div>

            
            <!--=========================
            MODAL AGREGAR Unidades Academicas 
            ==========================-->

            <div id="modalAgregarBaja" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="post" enctype="multipart/form-data">
                  
                    <div class="modal-header" style="background: #3c8dbc; color: white">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Agregar Baja</h4>
                    </div>
                  
                    <div class="modal-body">
                      <div class="box-body">



                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Fecha de la Baja Ejem: 2020-08-19" name="FechaBaja" required>
                          </div>              
                        </div>




                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <select type="text" class="form-control input-lg validarBaja" placeholder="Ingresar IdAlumno" name="IdAlumno" required >
                              <option value="0">Seleccione Alumno:</option>
                              <?php
 
                                $stmt = new ControladorBajas();
                                $stmt -> ctrCargarListaAlumnos()

                                ?>

                            </select>
                          </div>              
                        </div>



                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <select type="text" class="form-control input-lg" placeholder="Ingresar IdEmpleado" name="IdEmpleado" required>
                              <option value="0">Seleccione Empleado:</option>
                              <?php
 
                                $stmt = new ControladorBajas();
                                $stmt -> ctrCargarListaEmpleados()
                                ?>
                            </select>
                          </div>              
                        </div>



                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Tipo de Baja" name="TipoBaja" required>
                          </div>              
                        </div>



                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Alcance" name="Alcance" required>
                          </div>              
                        </div>



                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <select type="text" class="form-control input-lg" placeholder="Ingresar Motivo" name="IdMotivo" required>
                              <option value="0">Seleccione Motivo:</option>
                              <?php
 
                                $stmt = new ControladorBajas();
                                $stmt -> ctrCargarListaMotivos()
                                ?>
                            </select>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <select type="text" class="form-control input-lg" placeholder="Ingresar Submotivo" name="IdSubmotivo" required>
                              <option value="0">Seleccione Submotivo:</option>
                              <?php
 
                                $stmt = new ControladorBajas();
                                $stmt -> ctrCargarListaSubmotivos()
                                ?>
                            </select>
                          </div>              
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Observaciones" name="Observaciones" required>
                          </div>              
                        </div>


                      </div>
                      
                    </div>
                  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-primary">Guardar Bajas</button>
                    </div>
                  
                  </form> 

                  <?php
                    $crearBaja = new ControladorBajas();
                    $crearBaja-> ctrCrearBaja();
                  ?>

                </div>
              </div>
            </div>



             <!--=========================
            MODAL EDITAR Unidades Academicas s
            ==========================-->

            
            <div id="modalEditarBaja" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="post" enctype="multipart/form-data">
                  
                    <div class="modal-header" style="background: #3c8dbc; color: white">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editar Bajas</h4>
                    </div>
                  
                    <div class="modal-body">
                      <div class="box-body">

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" disabled="disabled" class="form-control input-lg" placeholder="Id" name="IdBaja2" id="IdBaja2" required>
                            <input type="hidden" class="form-control input-lg" name="IdBaja" id="IdBaja">
                          </div>              
                        </div>
                        


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control input-lg" placeholder="Edita Fecha de Bajas" name="EditarFechaBajas" id="FechaBaja" required>
                          </div>              
                        </div>



                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <select type="text" class="form-control input-lg validarBaja" placeholder="Edita Id Alumno" name="EditarIdAlumno" id="IdAlumno" required>
                              <option value="0">Seleccione Alumno:</option>
                              <?php
 
                                $stmt = new ControladorBajas();
                                $stmt -> ctrCargarListaAlumnos()
                                ?>
                            </select>
                          </div>              
                        </div>



                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <select type="text" class="form-control input-lg" placeholder="Edita Id Empleado" name="EditarIdEmpleado" id="IdEmpleado" required>
                              <option value="0">Seleccione Empleado:</option>
                              <?php
 
                                $stmt = new ControladorBajas();
                                $stmt -> ctrCargarListaEmpleados()
                                ?>
                            </select>
                          </div>              
                        </div>



                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control input-lg" placeholder="Edita Tipo de Baja" name="EditarTipoBaja" id="TipoBaja" required>
                          </div>              
                        </div>



                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control input-lg" placeholder="Edita Alcance" name="EditarAlcance" id="Alcance" required>
                          </div>              
                        </div>




                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <select type="text" class="form-control input-lg" placeholder="Edita Motivo" name="EditarIdMotivo" id="IdMotivo" required>
                              <option value="0">Seleccione Motivo:</option>
                              <?php
 
                                $stmt = new ControladorBajas();
                                $stmt -> ctrCargarListaMotivos()
                                ?>
                            </select>
                          </div>              
                        </div>




                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control input-lg" placeholder="Edita Observaciones" name="EditarObservaciones" id="Observaciones" required>
                          </div>              
                        </div>


                      </div>
                      
                    </div>
                  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-primary">Editar Bajas</button>
                    </div>
                  
                  </form> 

                  <?php
                    $editarBaja = new ControladorBajas();
                    $editarBaja -> ctrEditarBaja();
                  ?>

                </div>
              </div>
            </div>
            <?php
              $eliminarBaja = new ControladorBajas();
              $eliminarBaja-> ctrEliminarBaja();
            ?>
    
  


