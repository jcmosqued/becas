<!--=========================
UNIDADES ACADEMICAS
==========================-->

<div class="content-wrapper">
  
  <section class="content-header">
    
    <h1>
        Becas
    </h1>
                  <ol class="breadcrumb">
                    <li><a href="index.php?ruta=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li class="active">Becas</li>
                  </ol>
                
                </section>

                <section class="content">

                  <div class="box">
                    <div class="box-header with-border">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarBeca">Agregar Beca</button>
                    </div>
                    <div class="box-body">
                      <table class="table table-bordered table-striped dt-responsive TablaBecas" width="100%">
                        <thead>
                          <tr>
                            <th>Id Beca</th>
                            <th>Nombre de la Beca</th>
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

            
            <div id="modalEditarBeca" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="post" enctype="multipart/form-data">
                  
                    <div class="modal-header" style="background: #3c8dbc; color: white">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editar Beca</h4>
                    </div>
                  
                    <div class="modal-body">
                      <div class="box-body">

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" disabled="disabled" class="form-control input-lg" placeholder="Id" name="IdBeca2" id="IdBeca2" required>
                            <input type="hidden" class="form-control input-lg" name="IdBeca" id="IdBeca">
                          </div>              
                        </div>
                        
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg validarBeca" placeholder="Edita el Nombre de la Beca" name="EditarNomBeca" id="NomBeca" required>
                          </div>              
                        </div>

                      </div>
                      
                    </div>
                  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-primary">Editar Beca</button>
                    </div>
                  
                  </form> 

                  <?php
                    $editarBeca = new ControladorBecas();
                    $editarBeca -> ctrEditarBeca();
                  ?>

                </div>
              </div>
            </div>
            

            
            <!--=========================
            MODAL AGREGAR Unidades Academicas 
            ==========================-->

            <div id="modalAgregarBeca" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="post" enctype="multipart/form-data">
                  
                    <div class="modal-header" style="background: #3c8dbc; color: white">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Agregar Beca</h4>
                    </div>
                  
                    <div class="modal-body">
                      <div class="box-body">
                        
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control input-lg validarBeca" placeholder="Ingresar Nombre de la Beca" name="NomBeca" required>
                          </div>              
                        </div>

                      </div>
                      
                    </div>
                  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-primary">Guardar Beca</button>
                    </div>
                  
                  </form> 

                  <?php
                    $crearBeca = new ControladorBecas();
                    $crearBeca-> ctrCrearBeca();
                  ?>

                </div>
              </div>
            </div>
            
            <?php
              $eliminarBeca = new ControladorBecas();
              $eliminarBeca-> ctrEliminarBeca();
            ?>
    
  


