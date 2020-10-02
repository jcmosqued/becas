<!--=========================
UNIDADES ACADEMICAS
==========================-->

<div class="content-wrapper">
  
  <section class="content-header">
    
    <h1>
        Unidades Academicas
    </h1>
                  <ol class="breadcrumb">
                    <li><a href="index.php?ruta=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li class="active">Unidades Academicas</li>
                  </ol>
                
                </section>

                <section class="content">

                  <div class="box">
                    <div class="box-header with-border">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUnidadAcademica">Agregar Unidad Academica</button>
                    </div>
                    <div class="box-body">
                      <table class="table table-bordered table-striped dt-responsive TablaUnidadesAcademicas" width="100%">
                        <thead>
                          <tr>
                            <th>Id Unidad Academica</th>
                            <th>Nombre de la Unidad Academica</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>

                      </table>
                    </div>
                  </div>
                </section>
              </div>

            <!--=========================
            MODAL EDITAR Unidades Academicas 
            ==========================-->

            
            <div id="modalEditarUnidadAcademica" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="post" enctype="multipart/form-data">
                  
                    <div class="modal-header" style="background: #3c8dbc; color: white">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editar Unidad Academica</h4>
                    </div>
                  
                    <div class="modal-body">
                      <div class="box-body">

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" disabled="disabled" class="form-control input-lg" placeholder="Id" name="IdUnidadAcademica2" id="IdUnidadAcademica2" required>
                            <input type="hidden" class="form-control input-lg" name="IdUnidadAcademica" id="IdUnidadAcademica">
                          </div>              
                        </div>
                        
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Edita el Nombre de la Unidad Academica" name="EditarNomUnidadAcademica" id="NomUnidadAcademica" required>
                          </div>              
                        </div>

                      </div>
                      
                    </div>
                  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-primary">Editar Unidad Academica</button>
                    </div>
                  
                  </form> 

                  <?php
                    $editarUnidadAcademica = new ControladorUnidadesAcademicas();
                    $editarUnidadAcademica -> ctrEditarUnidadAcademica();
                  ?>

                </div>
              </div>
            </div>
            

            
            <!--=========================
            MODAL AGREGAR Unidades Academicas 
            ==========================-->

            <div id="modalAgregarUnidadAcademica" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="post" enctype="multipart/form-data">
                  
                    <div class="modal-header" style="background: #3c8dbc; color: white">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Agregar Unidad Academica</h4>
                    </div>
                  
                    <div class="modal-body">
                      <div class="box-body">
                        
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Nombre de la Unidad Academica" name="NomUnidadAcademica" required>
                          </div>              
                        </div>

                      </div>
                      
                    </div>
                  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-primary">Guardar Unidad Academica</button>
                    </div>
                  
                  </form> 

                  <?php
                    $crearUnidadAcademica = new ControladorUnidadesAcademicas();
                    $crearUnidadAcademica-> ctrCrearUnidadAcademica();
                  ?>

                </div>
              </div>
            </div>
            
            <?php
              $eliminarUnidadAcademica = new ControladorUnidadesAcademicas();
              $eliminarUnidadAcademica-> ctrEliminarUnidadAcademica();
            ?>
    
  


