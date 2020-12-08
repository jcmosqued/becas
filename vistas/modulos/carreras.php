<!--=========================
CARRERAS
==========================-->
<?php
// Verificamos la conexión con el servidor y la base de datos
  //$mysqli = new mysqli('127.0.0.1', 'root', '', 'db_se_becas');

?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Carreras
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?ruta=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Carreras</li>
      </ol>
    </section>

    <section class="content">

      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCarrera">Agregar Carreras</button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablaCarreras" width="100%">
            <thead>
              <tr>
                <th>IdCarrera</th>
                <th>Nombre Carrera</th>
                <th>Unidad Academica</th>
                <th>Acciones</th>
                
              </tr>
            </thead>

          </table>
        </div>
      </div>
    </section>
  </div>

<!--=========================
MODAL AGREGAR CARRERAS
==========================-->

<div id="modalAgregarCarrera" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">
      
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Carreras</h4>
        </div>
      
        <div class="modal-body">
          <div class="box-body">
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <input type="text" class="form-control input-lg validarCarrera" placeholder="Ingresar Carrera" name="NomCarrera" required>
              </div>              
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                  <select type="text" class="form-control input-lg" placeholder="id unidad academica" name="IdUnidadAcademica" required>
                  <option value="0">Seleccione Unidad Academica:</option>
                <?php

                $stmt = new ControladorCarreras();
                $stmt -> ctrCargarListas()
                ?>
                 </select>
              </div>              
            </div>

            


          </div>
          
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Carrera</button>
        </div>
      
      </form> 

      <?php
        $crearCarrera = new ControladorCarreras();
        $crearCarrera-> ctrCrearCarreras();
      ?>

    </div>
  </div>
</div>


<!--=========================
MODAL EDITAR CARRERAS
==========================-->

<div id="modalEditarCarrera" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">
      
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Carrera</h4>
        </div>
      
        <div class="modal-body">
          <div class="box-body">
            
          <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <input type="text" disabled="disabled" class="form-control input-lg" placeholder="ID Areas" name="id1" id="id1" required>
                <input type="hidden" class="form-control input-lg" name="IdCarrera" id="IdCarrera">
              </div>              
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <input type="text" class="form-control input-lg validarCarrera" placeholder="Ingresar Carrera" name="editarNombreCarrera" id="NomCarrera" required>
              </div>              
            </div>
          </div>
          
          <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <select  class="form-control input-lg"  name="IdUnidadAcademica" id="IdUnidadAcademica" required="">
                  <option value="0">Seleccione Unidad Academica:</option>
                  <?php
 
                $stmt = new ControladorCarreras();
                $stmt -> ctrCargarListas()
                ?>
                </select>
              </div>              
            </div>
          </div>
        
      
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Carreras</button>
        </div>
      
      </form> 

      <?php
        $editarCarreras = new ControladorCarreras();
        $editarCarreras-> ctrEditarCarreras();
      ?>

    </div>
  </div>
</div>

<?php
  $eliminarCarrera = new ControladorCarreras();
  $eliminarCarrera-> ctrEliminarCarreras();
?>
