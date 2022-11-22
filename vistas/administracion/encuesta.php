<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Gestión de las preguntas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li> <a href="encuestas">Gestión de las preguntas</a></li>
      
      <li class="active">Preguntas</li>
    
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
                <?php $ctrEncuesta= new ControladorEncuestas();
                $idPonencia= $_POST["idEncuestaVer"];
                $preguntas=$ctrEncuesta->ctrMostrarPreguntas($idPonencia);
                $i=1;
                ?>
       				<div class="card mx-auto text-center ">
					<hr>
					<div class="card-header font-weight-bold text-white tituloProximosEventos" >
					 <h3>  Preguntas de la ponencia </h3>
						
				
					</div>
					<hr>
					<div class="card-body d-flex align-items-center mx-auto col-md-6 cuerpoProximosEventos">

						<p class="card-text font-weight-bold text-justify col-md-12">
            <?php foreach ($preguntas as $pregunta) {
                echo "Pregunta $i: <br>";
                echo $pregunta["pregunta"];
                echo "<br><br>";
                $i++;
              }?>  
            </p>
					
					</div>

					<div class="card-footer font-weight-bold bg-white row align-items-center" >
						<div class="col-md-5 text-white " style="background-color: #FBB034; padding:10px;">&nbsp;</div>
						<div class="tituloProximosEventos col-md-7 text-white" style="padding:10px;">&nbsp;</div>

					</div>
				</div>
                <div class="col-md text-center">
                      <button type="button" class="btn btn-warning float-left" onclick="mostrarFormularioPreguntas()"><i class="fa fa-pencil-square" aria-hidden="true"></i> Actualizar</button>
                      <form method="post">
                        <input type="hidden" value="<?php echo $idPonencia ?>" name="idEncuestaAEliminar">
                        <button type="submit" class="btn btn-danger float-right" onclick="return confirm('¿Deseas continuar?');"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Eliminar</button>
                        <?php $ctrEncuesta->ctrEliminarPreguntas()?> 
                        </form>
                    </div>
              </div>

          
            <form method="post" id="formularioActualizarPreguntas" enctype="multipart/form-data" style="display: none;">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm" id="idEncuestaVer" name="idEncuestaVer" value="<?php echo $idPonencia ?> " hidden>
                    <input type="text" class="form-control form-control-sm"  name="encuestasIdActualizar[]" value="<?php echo $preguntas[1]["id"];?> " hidden>
                    <input type="text" class="form-control form-control-sm"  name="encuestasIdActualizar[]" value="<?php echo $preguntas[2]["id"];?> " hidden>
                    <input type="text" class="form-control form-control-sm"  name="encuestasIdActualizar[]" value="<?php echo $preguntas[3]["id"];?> " hidden>
                  </div>
                <div class="form-group">
                            <label for="encuestaPregunta2" class="col-form-label">Pregunta 1:</label>
                            <input type="text" class="form-control form-control-sm" id="encuestaPregunta2" name="encuestaPreguntaActualizar[]" value="<?php echo $preguntas[1]["pregunta"];?>" >
                </div>

                <div class="form-group">
                        <label for="encuestaPregunta3" class="col-form-label">Pregunta 2:</label>
                        <input type="text" class="form-control form-control-sm" id="encuestaPregunta3" name="encuestaPreguntaActualizar[]" value="<?php echo $preguntas[2]["pregunta"];?>" >
                </div>

                <div class="form-group">
                        <label for="encuestaPregunta4" class="col-form-label">Pregunta 3:</label>
                        <input type="text" class="form-control form-control-sm" id="encuestaPregunta4" name="encuestaPreguntaActualizar[]" value="<?php echo $preguntas[3]["pregunta"];?>">
                </div>

                <div class="modal-footer">
        
                    <button type="button" class="btn btn-danger" onclick="regresarAPreguntas()">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                    <button type="submit" class="btn btn-success">Actualizar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                    
                </div>

                <?php
                  $ctrEncuesta->ctrActualizarPreguntas();
                ?>
                </form>



      </div>
      <!-- /.box-footer-->
    <!-- /.box -->
    <div class="box-footer">
        <a href="encuestas"> <button class="btn btn-success" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar</button></a>
    </div>
							

  </section>
  <!-- /.content -->


</div>
  <!-- /.content 
<script>  document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("actualizarInformacion").addEventListener('submit', validacionActualizacionInformacion); 
      });</script>-->