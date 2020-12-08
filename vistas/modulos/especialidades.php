<!--=========================
ESPECIALIDADES
==========================-->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Especialidades
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php?ruta=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Especialidades</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEspecialidad">Agregar Especialidad</button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablaEspecialidades" width="100%">
          <thead>
            <tr>
              <th>Id Especialidad</th>
              <th>Nombre Especialidad</th>
              <th>Carrera</th>
              <th>Acciones</th> 
            </tr>
          </thead>

        </table>
      </div>
    </div>
  </section>
</div>

<!--=========================
MODAL EDITAR ESPECIALIDAD
==========================-->
<div id="modalEditarEspecialidad" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Especialidad</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <input type="text" disabled="disabled" class="form-control input-lg" placeholder="Id" name="IdEspecialidad" id="IdEspecialidad" required>
                <input type="hidden" class="form-control input-lg" name="IdEspecialidad2" id="IdEspecialidad2">
              </div>              
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <input type="text" class="form-control input-lg validarEspecialidad" placeholder="Editar Nombre de la Especialidad" name="EditarNombreEspecialidad" id="NomEspecialidad" required>
              </div>              
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <select type="text" class="form-control input-lg" name="EditarIdCarrera" id="IdCarrera" required>
                  <option value="0">Seleccione Carrera:</option>
                              <?php
 
                                $stmt = new ControladorEspecialidades();
                                $stmt -> ctrCargarListaCarreras()
                                ?>
                </select>
              </div>              
            </div>



          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Editar Especialidad</button>
        </div>

      </form> 

      <?php
      $editarEspecialidad = new ControladorEspecialidades();
      $editarEspecialidad -> ctrEditarEspecialidad();
      ?>

    </div>
  </div>
</div>

<!--=========================
MODAL AGREGAR ESPECIALIDADES
==========================-->

<div id="modalAgregarEspecialidad" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Especialidad</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg validarEspecialidad" placeholder="Ingresar nombre de la especialidad" name="nombreEspecialidad" required>
              </div>              
            </div>
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <select type="text" class="form-control input-lg" placeholder="Ingresar ID de la Carrera" name="IdCarrera" required>
                  <option value="0">Seleccione Carrera:</option>
                              <?php
 
                                $stmt = new ControladorEspecialidades();
                                $stmt -> ctrCargarListaCarreras()
                                ?>
                </select>
              </div>              
            </div>
          

          </div>  
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Especialidad</button>
        </div>

      </form> 

      <?php
      $crearEspecialidad = new ControladorEspecialidades();
      $crearEspecialidad-> ctrInsertarEspecialidad();
      ?>

    </div>
  </div>
</div>

<?php
$eliminarEspecialidad = new ControladorEspecialidades();
$eliminarEspecialidad-> ctrEliminarEspecialidad();
?>




