<!--=========================
USUARIOSs
==========================-->

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Áreas
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?ruta=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Áreas</li>
      </ol>
    </section>

    <section class="content">

      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArea">Agregar Área</button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablaAreas" width="100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Área</th>
                <th>Acciones</th>
              </tr>
            </thead>

          </table>
        </div>
      </div>
    </section>
  </div>

<!--=========================
MODAL AGREGAR AREA
==========================-->

<div id="modalAgregarArea" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">
      
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Área</h4>
        </div>
      
        <div class="modal-body">
          <div class="box-body">
            
          <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-folder"></i></span>
                <input type="text" class="form-control input-lg validarArea" placeholder="Ingresar Área" name="NomArea" required>
              </div>              
            </div>

          </div>
          
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Área</button>
        </div>
      
      </form> 

      <?php
        $crearArea = new ControladorAreas();
        $crearArea-> ctrCrearAreas();
      ?>

    </div>
  </div>
</div>


<!--=========================
MODAL EDITAR AREA
==========================-->

<div id="modalEditarArea" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">
      
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Área</h4>
        </div>
      
        <div class="modal-body">
          <div class="box-body">
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <input type="text" disabled="disabled" class="form-control input-lg" placeholder="ID Areas" name="id1" id="id1" required>
                <input type="hidden" class="form-control input-lg" name="IdArea" id="IdArea">
              </div>              
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <input type="text" class="form-control input-lg validarArea" placeholder="Ingresar Area" name="editarNombreArea" id="NomArea" required>
              </div>              
            </div>

            
          </div>
          
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Área</button>
        </div>
      
      </form> 

      <?php
        $editarUsuario = new ControladorAreas();
        $editarUsuario-> ctrEditarAreas();
      ?>

    </div>
  </div>
</div>

<?php
  $eliminarArea = new ControladorAreas();
  $eliminarArea-> ctrEliminarAreas();
?>
