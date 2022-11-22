<section class="iniciarSesion">

    <div id="back"></div>

    <div class="login-box">
      
    <div id="toasts"></div>
      <div class="login-box-body">
        <img src="vistas/img/logoInicioS.png" class="img-fluid" style="padding:5px 60px  30px">
        <h3 id="de" class="login-box-msg">Sistema Web de eventos educativos</h3>
        <p id="de" class="login-box-msg">Iniciar Sesión</p>



        <form method="post">

          <div class="form-group has-feedback">
          <div class="col-sm">  
            <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required > 
            <span class="form-control-feedback"><i class="fa fa-user "></i></span>
          </div>
          </div>

          <div class="form-group has-feedback">

            <div class="col-sm">  
              <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required >
              <span class="form-control-feedback"><i class="fa fa-lock"></i></span>
            </div>
            <div class="text-center mx-auto " ><a  class="text-white" href="cambioContrasena">Olvidé mi contraseña</a> <br></div>

          </div>
     
          <div class="row">
          
            <div class="col-sm">
 
              <button type="submit" class="btn btn-secondary btn-block">Ingresar</button>
            
            </div>

          </div>

          <?php

            $login = new ControladorCoordinadores();
            $login -> ctrIngresoUsuario();
            
          ?>

        </form>

      </div>

    </div>




</section>

