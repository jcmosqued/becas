

<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PLANTILLA BASE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!--=========================
HOJAS DE ESTILO
==========================-->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="vistas/dist/css/skins/skin-blue.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/square/blue.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <!-- bootstrap datepicker -->
   <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!--=========================
PLUGINS DE JAVASCRIPT
==========================-->
  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <!-- iCheck -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>
  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <!-- SweetAlert 2 https://sweetalert2.github.io/-->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
   <!-- bootstrap datetimepicker http://bootstrap-datepicker.readthedocs.io-->
  <script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/50aa839002.js" crossorigin="anonymous"></script>
  
</head>

<body class="hold-transition sidebar-mini">

<?php
session_start();

  if (isset($_SESSION["sesionGestor"]) && $_SESSION["sesionGestor"]==="ok"){

    echo '<div class="wrapper">';

    /*********************************
    ENCABEZADO
    *********************************/
    include "modulos/cabezote.php";

    /*********************************
    LATERAL
    *********************************/
    include "modulos/lateral.php";

    /*********************************
    CONTENIDO
    *********************************/
    if (isset($_GET["ruta"])){

      if($_GET["ruta"]== "alumnos" ||
      $_GET["ruta"]== "areas" ||
      $_GET["ruta"]== "becas" ||
      $_GET["ruta"]== "carreras" ||
      $_GET["ruta"]== "cuatrimestres" ||
      $_GET["ruta"]== "especialidades" ||
      $_GET["ruta"]== "inicio" ||
      $_GET["ruta"]== "proyectos" ||
      $_GET["ruta"]== "empleados" ||
      $_GET["ruta"]== "unidadesacademicas" ||
      $_GET["ruta"]== "bajas" ||
      $_GET["ruta"]== "motivos" ||
      $_GET["ruta"]== "salir"){
            include "modulos/".$_GET["ruta"].".php";
        }
    }

    /*********************************
    FOOTER
    *********************************/
    include "modulos/footer.php";


    echo '</div>';
  } else {

    echo '<div class="wrapper" align="center" style="background-image: url(vistas/img/plantilla/fondo.png);">';

    include "modulos/login.php";  

    echo '</div>';

  }

?>
  <script src="vistas/dist/js/UnidadesAcademicas.js"></script>
  <script src="vistas/dist/js/Becas.js"></script>
  <script src="vistas/dist/js/usuarios.js"></script>
  <script src="vistas/dist/js/cuatrimestres.js"></script>
  <script src="vistas/dist/js/proyectos.js"></script>
  <script src="vistas/dist/js/especialidades.js"></script>
  <script src="vistas/dist/js/areas.js"></script>
  <script src="vistas/dist/js/carreras.js"></script>
  <script src="vistas/dist/js/alumnos.js"></script>


  <!-- REQUIRED JS SCRIPTS -->
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>

  <script>
    $('.datepicker').datepicker();
  </script>

</body>
</html>