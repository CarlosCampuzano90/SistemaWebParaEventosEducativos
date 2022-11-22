 
  <section class="container">

    <div class="registroParticipante">

      <!-- Default box -->
      <div class="box" >

        <div class="box-header with-border">
          <br><br>
              <div class="modal-header tituloTabla">
                  <h1 >Registro de participante</h1>
                  <img src="vistas/img/logoInicioS.png" class="img-fluid" style="max-width: 12%;" >
                
              </div>
        </div>
        
      <div class="box-body" >
        

      <div class="modal-content">

              <div class="modal-body">

                <form method="post" id="formularioRegistroParticipanteInicio">
                  <div class="form-group">
                    <label for="usuario" class="col-form-label">Ingresa tu nombre de usuario:</label>
                    <input type="text" class="form-control form-control-sm"  name="usuarioNuevo"  id = "usuarioNuevo" placeholder="Mínimo 6 caracteres alfanuméricos">
                  </div>
                  <div class="form-group">
                    <label for="contrasena" class="col-form-label">Correo:</label>
                    <input type="text" class="form-control form-control-sm" name="correoNuevo" id = "correoNuevo">
                  </div>

                  <div class="form-group">
                    <label for="contrasena" class="col-form-label">Contraseña:</label>
                    <input type="password" class="form-control form-control-sm" name="contrasenaNuevo" id = "contrasenaNuevo" placeholder="Mínimo 8 caracteres">
                  </div>

                  <div class="form-group">
                    <label for="contrasena" class="col-form-label">Confirmar tu contraseña:</label>
                    <input type="password" class="form-control form-control-sm"   id = "contrasenaNuevo2">
                  </div>

                  <div class="modal-footer">
          

                    <button type="submit" class="btn btn-success">Registrar <i class="fa fa-user-plus" aria-hidden="true"></i></button>
                  
                  </div>

                  <?php
                      $participante= new ControladorParticipantes();
                      $participante->ctrRegistrarseParticipante();
                  ?>
                </form>
              </div>

            </div>


      <div class="box-footer">

          <footer class="piePagina">
          <div class="col-md-12">
              <address>
                  <strong>Dirección:</strong> Boulevard Cuauhnáhuac #566, Col. Lomas del Texcal, Jiutepec, Morelos. CP 62550&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong>Tel:</strong> (777) 229-3517 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong>Email:</strong> informes@upemor.edu.mx &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </address>
          </div>
          </footer>

        
      </div>

      </div>
      <div id="toasts"></div>
  </section>

  <script>  document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formularioRegistroParticipanteInicio").addEventListener('submit', validacionRegistroInicio); 
      });</script>