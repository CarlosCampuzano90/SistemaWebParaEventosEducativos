 
<section class="perfil">

  <div class="content-header perfilRuta">
    
    <h1>
      
   Encuesta
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li> <a href="encuestas">Encuestas</a></li>
      
      <li class="active">Encuesta</li>
    
    </ol>

  </div>



  <!-- Main content -->


    

    <!-- Default box -->
    <div class="box" id="hola">
      <div class="box-header with-border">
        <h3 class="box-title">Preguntas a contestar</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" 
                  title="Ocultar Coordinadores">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body" >

                <div class="container col-md-8" id="informacionUsuario">
                <?php $ctrEncuesta= new ControladorEncuestas();
                $idPonencia= $_POST["idPreguntasParticipante"];
                $preguntas=$ctrEncuesta->ctrMostrarPreguntas($idPonencia);
                $participante = $_SESSION["participante"];
                if(!empty($preguntas)){ ?>
                
                <div class="card-body d-flex align-items-center mx-auto col-md-8 ">
                    <form method="post" id="formularioRegistroParticipanteInicio">
                      <input type="text" name="idPreguntasParticipante" value=<?php echo $idPonencia ?> hidden>
                      <input type="text" name="idParticipanteRespuestas" value=<?php echo $participante["id"] ?> hidden>
                      <div class="form-group text-center">
                        <label for="usuario" class="col-form-label"> <?php echo $preguntas[0]["pregunta"]?> </label>
                          <p class="clasificacion">
                              <input id="radio1" type="radio" name="estrellas" value="5"><!--
                            --><label for="radio1">★</label><!--
                            --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                            --><label for="radio2">★</label><!--
                            --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                            --><label for="radio3">★</label><!--
                            --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                            --><label for="radio4">★</label><!--
                            --><input id="radio5" type="radio" name="estrellas" value="1" checked><!--
                            --><label for="radio5">★</label>
                          </p>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label for="contrasena" class="col-form-label"><?php echo $preguntas[1]["pregunta"]?> </label>
                        <input type="text" class="form-control form-control-sm" name="respuestaParticipante1" id = "correoNuevo" required>
                      </div>

                      <div class="form-group">
                        <label for="contrasena" class="col-form-label"><?php echo $preguntas[2]["pregunta"]?> </label>
                        <input type="text" class="form-control form-control-sm" name="respuestaParticipante2" id = "contrasenaNuevo" required>
                      </div>

                      <div class="form-group">
                        <label for="contrasena" class="col-form-label"><?php echo $preguntas[3]["pregunta"]?> </label>
                        <input type="text" class="form-control form-control-sm"   id = "respuestaParticipante3" name="respuestaParticipante3" required>
                      </div>

                        <button type="submit" class="btn btn-success">Contestar <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                      

                      <?php
                        $ctrEncuesta->ctrRegistrarRespuestasParticipante();
                      ?>
                    </form>
                
                
                </div>
                <?php } else { ?>
                  <div class="border border-warning alert alert-dismissible fade show col-md-12 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
                      <i class="fa fa-exclamation-triangle fa-lg"></i>
                      <h4 class="alert-heading text-dark text-center" > <kbd>Upps !!!</kbd></h4>
                      <p class="text-dark">El coordinador aun no registra la encuesta, pronto aparecera aquí :)</p>
                      <hr>

                  
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                <?php } ?>
      </div>
      <!-- /.box-footer-->
    <!-- /.box -->
    <div class="box-footer">
        <a href="constancias"> <button class="btn btn-success" href="ponencias"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar</button></a>
    </div>

    <style>
      input[type="radio"] {
        display: none;
      }

      label {
        color: grey;
      }

      .clasificacion {
        direction: rtl;
        unicode-bidi: bidi-override;
        font-size: 40px;
      }

      label:hover,
      label:hover ~ label {
        color: orange;
      }

      input[type="radio"]:checked ~ label {
        color: orange;
    
      }
    </style>
							

      </div>
  <!-- /.content -->


