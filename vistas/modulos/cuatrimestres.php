<!--=========================
CUATRIMESTRES
==========================-->

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Cuatrimestre
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?ruta=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Cuatrimestres</li>
      </ol>
    </section>

    <section class="content">

      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCuatrimestre">Agregar Cuatrimestre</button>
        </div>

        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive TablaCuatrimestres" width="100%">

            <thead>
              <tr>
                <th>IdCuatrimestre</th>
                <th>Nombre Cuatrimestre</th>
                <th>Acciones</th> 
              </tr>
            </thead>

          </table>
        </div>

      </div>
    </section>
  </div>

<!--=========================
MODAL AGREGAR CUATRIMESTRE
==========================-->

<div id="modalAgregarCuatrimestre" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">
      
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Cuatrimestre</h4>
        </div>
      
        <div class="modal-body">
          <div class="box-body">
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="text" class="form-control input-lg validarCuatrimestre" placeholder="Ingresar nombre del Cuatrimestre" name="nombreCuatrimestre" required>
              </div>              
            </div>

          </div>
        </div>

      
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Cuatrimestre</button>
        </div>
      
      </form> 

      <?php
        $crearCuatrimestre = new ControladorCuatrimestres();
        $crearCuatrimestre-> ctrInsertarCuatrimestre();
      ?>

    </div>
  </div>
</div>


<!--=========================
MODAL EDITAR CUATRIMESTRE
==========================-->

<div id="modalEditarCuatrimestre" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">
      
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Cuatrimestre</h4>
        </div>
      
        <div class="modal-body">
          <div class="box-body">

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-vcard"></i></span>
                <input type="text" disabled="disabled" class="form-control input-lg" name="idCuatrimestre" id="idCuatrimestre" required>
                <input type="hidden" class="form-control input-lg" name="idCuatrimestre2" id="idCuatrimestre2">
              </div>              
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control input-lg validarCuatrimestre" placeholder="Ingresar Nombre" name="editarNombreCuatrimestre" id="nombreCuatrimestre" required>
              </div>              
            </div>
            
          </div>      
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Cuatrimestre</button>
        </div>
      
      </form> 

      <?php
        $editarCuatrimestre = new ControladorCuatrimestres();
        $editarCuatrimestre-> ctrEditarCuatrimestre();
      ?>

    </div>
  </div>
</div>

<?php
  $eliminarUsuario = new ControladorCuatrimestres();
  $eliminarUsuario-> ctrEliminarCuatrimestre();
?>