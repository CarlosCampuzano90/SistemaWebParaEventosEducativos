<div id="back"></div>

<div class="login-box">
  

  <div class="login-box-body">
  

    <p id="de" class="login-box-msg">Iniciar Sesión</p>
    <img src="vistas/img/Logo-login.jpg" class="img-fluid" style="padding:5px 100px  30px">


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
      
      </div>

      <div class="row">
       
        <div class="col-sm">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        
        </div>

      </div>

      <?php

        $login = new ControladorCoordinadores();
        $login -> ctrIngresoUsuario();
        
      ?>

    </form>

  </div>

</div>
