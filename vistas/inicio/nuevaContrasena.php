<?php 
 $email =$_POST['email'];
 $token =$_POST['token'];
 $codigo =$_POST['codigo'];
 $ctrParticipante = new ControladorParticipantes();
 $correcto=$ctrParticipante->ctrValidarCodigo($email,$token,$codigo);
 if($correcto){ 
  
  }else{
    header("Location: iniciarSesion");
  }
?>

<section class="iniciarSesion">

    <div id="back"></div>

    <div class="login-box">
      
    <div id="toasts"></div>
      <div class="login-box-body">
        <img src="vistas/img/logoInicioS.png" class="img-fluid" style="padding:5px 60px  30px">
        <h3 id="de" class="login-box-msg">Sistema Web de eventos educativos</h3>
        <p id="de" class="login-box-msg">Restablecer Contraseña</p>
          <form method="post" id="formularioRegistroParticipanteInicio">

          
                  <div class="form-group">
                    <label for="contrasena" class="col-form-label">Contraseña:</label>
                    <input type="password" class="form-control form-control-sm" name="contrasenaRestablecida" id = "contrasenaNuevo" placeholder="Mínimo 8 caracteres">
                  </div>

                  <div class="form-group">
                    <label for="contrasena" class="col-form-label">Confirmar tu contraseña:</label>
                    <input type="password" class="form-control form-control-sm"   id = "contrasenaNuevo2">
                    <input type="text" value="<?php echo $email?>" name="emailParticipanteRestablecer" hidden>
                  </div>

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Confirmar <i class="fa fa-user-plus" aria-hidden="true"></i></button>
                  </div>

                  <?php
                      $ctrParticipante->ctrNuevaContrasena();
                  ?>
            </form>
      </div>

    </div>




</section>

<script>  document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formularioRegistroParticipanteInicio").addEventListener('submit', validacionCambiarContrasena); 
      });</script>