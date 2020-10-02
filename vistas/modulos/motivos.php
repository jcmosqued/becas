<!--=========================
BAJAS
==========================-->

<div class="content-wrapper">
  
  <section class="content-header">
    
    <h1>
        Motivo de Bajas
    </h1>
                  <ol class="breadcrumb">
                    <li><a href="index.php?ruta=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li class="active">Motivo</li>
                  </ol>
                
                </section>

                <section class="content">

                  <div class="box">
                    <div class="box-header with-border">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMotivo">Agregar Motivo</button>
                    </div>
                    <div class="box-body">
                      <table class="table table-bordered table-striped dt-responsive TablaMotivos" width="100%">

                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Motivo</th>
                                 <th>Acciones</th>
                          </tr>
                        </thead>

                      </table>
                    </div>
                  </div>
                </section>
              </div>

            
            <!--=========================
            MODAL AGREGAR motivo 
            ==========================-->

            <div id="modalAgregarMotivo" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="post" enctype="multipart/form-data">
                  
                    <div class="modal-header" style="background: #3c8dbc; color: white">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Agregar Motivo</h4>
                    </div>
                  
                    <div class="modal-body">
                      <div class="box-body">




                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control input-lg" placeholder="Ingresar Motivo" name="Motivo" required>
                          </div>              
                        </div>




                      </div>
                      
                    </div>
                  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-primary">Guardar Motivo</button>
                    </div>
                  
                  </form> 

                  <?php
                   
                  ?>

                </div>
              </div>
            </div>



             <!--=========================
            MODAL EDITAR motivo 
            ==========================-->

            
            <div id="modalEditarMotivo" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="post" enctype="multipart/form-data">
                  
                    <div class="modal-header" style="background: #3c8dbc; color: white">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editar Motivo</h4>
                    </div>
                  
                    <div class="modal-body">
                      <div class="box-body">

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control input-lg" placeholder="Edita Motivo" name="EditarMotivo" id="Motivo" required>
                          </div>              
                        </div>




                      </div>
                      
                    </div>
                  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-primary">Editar Motivo</button>
                    </div>
                  
                  </form> 

                  <?php
                  ?>

                </div>
              </div>
            </div>



            
            <?php
            ?>
    
  


