<style>
            

            /*Cabecera inicio*/
            .cabecera {
                /*width: 100%;*/
                background-color: white;
                border-bottom: 3px solid #325F8F;
                box-shadow: 0 2px 5px rgba(0,0,0,.26);
                font-size: 14px;
                display: flex;
                justify-content: space-between;
                transition: font-size 0.2s ease;
            }

            .cabecera > div:nth-child(1) img {
                /*width: 100%;*/
                max-width: 100%;
                vertical-align: middle;
            }

            .cabecera > div:nth-child(2) {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .cabecera > div:nth-child(2) > div:nth-child(2) {
                text-align: right;
            }

            .cabecera > div:nth-child(2) > div:nth-child(2) span {
/*                display: inline-block;
                padding: 2px 10px 2px 2px;*/
            }


            /*Media queries inicio*/

            @media only screen and (max-width : 1018px) {
                .cabecera {
                    font-size: 13px;
                }
            }

            @media only screen and (max-width : 997px) {

                .opacar {
                    position: fixed;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.6);
                }

                .cabecera {
                    flex-direction: column;
                }

                .cabecera > div:nth-child(2) > div:nth-child(2) div {
                    padding: 2px 0;
                    display: table-cell;
                }

            }

            @media only screen and (max-width : 644px) {
                .cabecera > div:nth-child(2) > div:nth-child(2) div {
                    text-align: left;
                    padding: 2px 0;
                    display: block;
                }

            }

            @media only screen and (max-width : 436px) {
                .cabecera {
                    /*font-size: 1em;*/
                }
            }

            /*Media queries fin*/

        </style>
            

            
        




 <!-- main-header -->

 <form name="forma" method="post" action="" style="z-index: 100">
            <input type="hidden" name="yAccion" id="yAccion" value="">
            <input type="hidden" name="yCveCanalizacion" id="yCveCanalizacion" value="0">
            <input type="hidden" name="yCveEstadiaInf" id="yCveEstadiaInf" value="0">
            <input type="hidden" name="yCvePeriodo" id="yCvePeriodo" value="0">
 
 <header class="cabecera">

  <!-- logo -->
    <!-- <a href="#" class="logo"> -->
      
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!--<span class="logo-mini"><img src="vistas/img/plantilla/icono.png" class="img-responsive" style="padding:0px -10px; filter:contrast(900%);"></span> --> 
      <!-- logo for regular state and mobile devices -->    
      <!--<span class="logo-lg"><img src="vistas/img/plantilla/logo.jpg" class="img-responsive" style="padding:0px 0px; filter:contrast(200%);"></span>--> 
    
    <!-- </a> -->
    <!-- logo -->

     <!-- navbar -->

  
  
  
      


  <div style = "float: left;">

                <a style="float:left;margin-left:0px;">
                  <img src="vistas/img/plantilla/barraUtl.jpg" alt="Universidad Tecnologica de León" >
                </a>

  </div>

    
  
    


    <!-- navbar-custom-menu -->
      <div class="navbar-custom-menu" style = "float: right; text-align: right; z-index: 1000px;"> 

        <a href="#" class="sidebar-toggle; menu-toggle-input; menu-toggle-button" data-tg-on="\2630" data-tg-off="\2716" data-toggle="push-menu" role="button" style="float:left;margin-left:0%;">
          </a>

        <ul class="nav navbar-nav">

          
      
        <?php

          include "cabezote/usuario.php";

        ?>

        </ul>

      </div>
    <!-- navbar-custom-menu -->


    <!-- navbar -->

 </header>
</form>
 <!-- main-header -->