<section class="iniciarSesion">

    <div id="back"></div>

    <div class="login-box">
      
    <div id="toasts"></div>
      <div class="login-box-body">
        <img src="vistas/img/logoInicioS.png" class="img-fluid" style="padding:5px 60px  30px">
        <h3 id="de" class="login-box-msg">Sistema Web de eventos educativos</h3>
        <p id="de" class="login-box-msg">Restablecer Contraseña</p>

        <form class="col-md-12" method="POST">
                <div class="form-group">
                    <label for="c" class="col-form-label text-white">Email: </label>
                    <input type="email" class="form-control form-control-sm" id="c" name="emailRestablecerContrasena">
                 
                </div>
               
                <button type="submit" class="btn btn-primary">Restablecer</button>
                <?php $ctrParticipante = new ControladorParticipantes();
                $ctrParticipante->ctrRestablecerContrasena();?>
        </form>
      </div>

    </div>




</section>

