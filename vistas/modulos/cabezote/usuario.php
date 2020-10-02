<!--=====================================
USUARIOS
======================================--> 

<!-- user-menu -->

<div>
                  <div>
                    <span id="idses" style="display:none">FA3313C2C446B3104AF8CA2A44F642C5</span><span id="copy" style="cursor: copy;"></span> 
                  </div>

                  <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown"> 
                      <h4> <b style="color: #0E1D6A;"> 
                        <span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["nombre"] ?>
                    <span class="caret"></span> </b> </h4>
                  </button>

                     <!--=====================================
                      MENU DESPLEGABLE
                     ======================================-->



                      <ul class="dropdown-menu">
                        <li>
                          <a style="font-size: 15px;" href="">
                            <span style="font-size: 15px;" class="glyphicon glyphicon-wrench"></span>Soporte Técnico
                          </a>
                        </li>
                        
                        <li>
                          <a style="font-size: 15px;" href="index.php?ruta=salir">
                            <span style="font-size: 15px;" class="glyphicon glyphicon-off"></span>Cerrar Sesión
                          </a>
                        </li>
                      </ul>
                  </div>
              </div>