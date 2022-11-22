<script defer src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>    <!-- libreria para generar codigo QR--> 
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Código QR
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li> <a href="codigosQR">Generación de códigos QR</a></li>
      
      <li class="active">Código QR</li>
    
    </ol>

  </section>



  <!-- Main content -->
  <section class="content">

    

    <!-- Default box -->
    <div class="box" id="hola">
      <div class="box-header with-border">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" 
                  title="Ocultar Coordinadores">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body" >

            <div class="container" id="preguntasPonencia">
                <?php $ctrParticipante= new ControladorParticipantes();
                $idPonencia= $_POST["idPonenciaGeneracionQR"];
                $participantes=$ctrParticipante->ctrRellenarTablaParticipante()

                ?>
       				<div class="card mx-auto text-center ">
					<hr>
					<div class="card-header font-weight-bold text-white tituloProximosEventos" >
					 <h3>  Generación de códigos QR </h3>
						
				
					</div>
					<hr>
					<div class="card-body align-items-center mx-auto col-md-6 cuerpoProximosEventos">
            <form method="post">
                  <div class="form-group ">
                      <label for="Coordinador">ID de la ponencia:</label>
                      <input type="text"  class="form-control " id="idPonenciaGeneracionQR" name="idPonenciaGeneracionQR" value="<?php echo $idPonencia ?>" readonly>
                  </div>
                  <div class="form-group">
                        <label for="Coordinador">Selecciona al participante:</label>
                        <select class="form-control"  id="idParticipanteCodigoQR" name="idParticipanteCodigoQR" required>
                        
                        <?php foreach ($participantes as $participante) {
                        echo "<option value='".$participante["id"]."'> Usuario: ".$participante["usuario"]."</option>";
                        }
                        ?>
                        </select>
                  </div>

                  <div class="form-group">
                      <button type="submit" class="btn btn-success" >Generar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                  </div>

                  <?php
                        $ctrParticipante -> generarCodigoQR();
                  ?>
                              

            </form>
            <div id="contenedorQR" class="rounded col-md-7 container-fluid" style="padding:5px;"></div>
					</div>
          

					<div class="card-footer font-weight-bold bg-white row align-items-center" >
						<div class="col-md-5 text-white " style="background-color: #FBB034; padding:10px;">&nbsp;</div>
						<div class="tituloProximosEventos col-md-7 text-white" style="padding:10px;">&nbsp;</div>

					</div>
				</div>
      </div>

        



      </div>
      <!-- /.box-footer-->
    <!-- /.box -->
    <div class="box-footer">
        <a href="codigosQR"> <button class="btn btn-success" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar</button></a>
    </div>
							

  </section>
  <!-- /.content -->


</div>
  <!-- /.content 
<script>  document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("actualizarInformacion").addEventListener('submit', validacionActualizacionInformacion); 
      });</script>-->