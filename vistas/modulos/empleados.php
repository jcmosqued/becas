<!--=========================
USUARIOS
==========================-->

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Empleados
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?ruta=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Empleados</li>
      </ol>
    </section>

    <section class="content">

      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Empleado</button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablaUsuarios" width="100%">
            <thead>
              <tr>
                <th>IdEmpleado</th>
                <th>Nombre</th>
                <th>NumEmpleado</th>
                <th>Puesto_Cargo</th>
                <th>Departamento</th>
                <th>Estado</th>
                <th>Acciones</th>
                <th>Telefono</th>
                <th>Ext</th>
                <th>E-mail</th>
                <th>Tipo Usuario</th>
                
                
                
              </tr>
            </thead>

          </table>
        </div>
      </div>
    </section>
  </div>

<!--=========================
MODAL AGREGAR USUARIO 
==========================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">
      
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Empleado</h4>
        </div>
      
        <div class="modal-body">
          <div class="box-body">
            
          <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" placeholder="Ingresar nombre" name="NomEmpleado" required>
              </div>              
            </div>

          <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="number" class="form-control input-lg validarUsuario usuario " placeholder="Ingresar numero del empleado" name="NumEmpleado" required>
              </div>              
            </div>
    
         
         

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" placeholder="Ingresar puesto o cargo" name="Puesto_Cargo" required>
              </div>              
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" placeholder="Ingresar departamento" name="Departamento" required>
              </div>              
            </div>

          <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control input-lg" placeholder="Ingresar correo electronico" name="CorreoElectronico" required>
              </div>    
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-vcard"></i></span>
                <input type="text" class="form-control input-lg" placeholder="Ingresar Telefono" name="Telefono" required>
              </div>              
            </div>


            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-vcard"></i></span>
                <input type="text" class="form-control input-lg" placeholder="Ingresar extencion" name="Ext" required>
              </div>              
            </div>


          
          
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" class="form-control input-lg" placeholder="Ingresar contraseña" name="Contrasenia" required>
              </div>              
            </div>

            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" placeholder="Ingresar tipo de usuario" name="TipoUsuario" required>
              </div>              
            </div>

          </div>
          
        </div>
        
      
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Empleado</button>
        </div>
      
      </form> 

      <?php
        $crearUsuario = new ControladorUsuarios();
        $crearUsuario-> ctrCrearUsuario();
      ?>

    </div>
  </div>
</div>



<!--=========================
MODAL EDITAR USUARIO 
==========================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">
      
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Empleado</h4>
        </div>
      
        <div class="modal-body">
          <div class="box-body">

          <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <input type="hidden" class="form-control input-lg" name="IdEmpleado" id="IdEmpleado">
                <input type="text" disabled="disabled" class="form-control input-lg" placeholder="Id" name="IdEmpleado2" id="IdEmpleado2" required>
                <input type="hidden" class="form-control input-lg" name="IdUsuario" id="IdUsuario">
                
                
              </div>              
            </div>
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <input type="text" class="form-control input-lg" placeholder="Ingresar nombre" name="editarNombre" id="NomEmpleado" required>
              </div>              
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="number" class="form-control input-lg validarUsuario usuario"  placeholder="Ingresar el numero de empleado" name="NumEmpleado" id="NumEmpleado" required>
              </div>              
            </div>


            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" placeholder="Ingresar puesto o cargo" name="Puesto_Cargo" id="Puesto_Cargo" required>
              </div>              
            </div>

             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" placeholder="Ingresar departamento" name="Departamento" id="Departamento" required>
              </div>              
            </div>

             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control input-lg" placeholder="Ingresar correo electronico" name="CorreoElectronico" id="CorreoElectronico" required>
              </div>              
            </div>

             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-vcard"></i></span>
                <input type="text" class="form-control input-lg" placeholder="Ingresar telefono" name="Telefono" id="Telefono" required>
              </div>              
            </div>

             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-vcard"></i></span>
                <input type="text" class="form-control input-lg" placeholder="Ingresar extencion" name="Ext" id="Ext" required>
              </div>              
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" placeholder="Ingresar tipo de usuario" name="TipoUsuario" id="TipoUsuario" required>
              </div>              
            </div>

          </div>
          
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Empleado</button>
        </div>
      
      </form> 

      <?php
        $editarUsuario = new ControladorUsuarios();
        $editarUsuario-> ctrEditarUsuario();
      ?>

    </div>
  </div>
</div>

<?php
  $eliminarUsuario = new ControladorUsuarios();
  $eliminarUsuario-> ctrEliminarUsuario();
?>

