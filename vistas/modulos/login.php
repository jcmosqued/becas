<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body" align="center" style="background-image: url(vistas/img/plantilla/utleon.jpg); border-radius: 5px; width: 400px">
    <a href="">
      <img src="vistas/img/plantilla/logoUtl.png" width="" style="padding:20px 20px;">
    </a>
    <h1 class="login-box-msg" style="color: #0E1D6A"> BECAS </h1>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
      <br>
    </form>




    <a href="http://google.com" target="_blank">  <u style="color: #0E1D6A">Consultar Estatus De la Beca  </u> </a>
      </div>


    <?php 
      $login = new ControladorUsuarios();
      $login -> ctrIngresoUsuarios();

    ?>

  </div>
  <!-- /.login-box-body -->

  <div align="center">
    <h5 style="color: #FFFFFF">Blvd: Universidad Tecnologica #225 |Col. San Carlos. CP:37670, León, Gto. Mex. Tel (###) # ## ## ##</h5>
  </div>

</div>
<!-- /.login-box -->