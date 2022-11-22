
<section class="iniciarSesion">

    <div id="back"></div>

    <div class="login-box">
      
    <div id="toasts"></div>
      <div class="login-box-body">
        <img src="vistas/img/logoInicioS.png" class="img-fluid" style="padding:5px 60px  30px">
        <h3 id="de" class="login-box-msg">Sistema Web de eventos educativos</h3>
        <p id="de" class="login-box-msg">Restablecer Contraseña</p>

        <form class="col-md-12" method="POST" action="nuevaContrasena">
            <div class="form-group">
                    <label for="c" class="form-label text-white">Código: </label>
                    <input type="number" class="form-control" id="c" name="codigo">
                    <input type="hidden" class="form-control" id="c" name="email" value="<?php  echo $_POST['email'];?>">
                    <input type="hidden" class="form-control" id="c" name="token" value="<?php echo $_POST['token'];?>">
            </div> 
                <button type="submit" class="btn btn-primary">Comprobar Código</button>
        </form>
      </div>

    </div>




</section>

