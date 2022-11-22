
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Gestión de las preguntas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Gestión de las preguntas</li>
    
    </ol>

  </section>



  <!-- Main content -->
  <section class="content">

    

    <!-- Default box -->
    <div class="box" id="hola">
      <div class="box-header with-border">
        <h3 class="box-title">Información</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" 
                  title="Ocultar Coordinadores">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body" id="tablaEncuestas">
      <?php
          $ctrPonencia= new ControladorPonencias();
          $ctrEncuesta= new ControladorEncuestas();
          $ponencias=$ctrPonencia->ctrMostrarInformacionPonencia();

              if(!empty($ponencias)){
                ?>
                <div class="tablaResposiveGrande" >
                <table class="table">
                  <thead class="tituloTabla">
                    <tr>
                      <th>ID</th>
                      <th>Título</th>
                      <th>Fecha y hora</th>
                      <th>Categoría</th>
                      <th>Modalidad</th>
                      <th>Ver respuestas</th>
                      <th>Preguntas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ponencias as $ponencia) { ?>
                      <tr>
                        <td><?php echo $ponencia["idponencia"] ?></td>
                        <td><?php echo $ponencia["nombre"] ?></td>
                        <td><?php echo $ponencia["fecha"]."/".$ponencia["hora"]?></td>
                        <td><?php echo $ponencia["categoria"]?></td>
                        <td><?php if($ponencia["modalidad"]=="Gratuito") echo "Gratuito"; else echo "Costo: ".$ponencia["costo"];?></td>
                        <td>
                            <?php $respuesta=$ctrEncuesta->ctrExistenRespuestas($ponencia["idponencia"])?>
                            <?php if(!empty($respuesta)){?>
                              <form method="post" action="respuesta">
                                <input type="hidden" value="<?php echo $ponencia["idponencia"] ?>" name="idPonenciaMostrarRespuestas" >
                                <button type="submit" class="btn btn-success"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                              </form>
                            <?php }else{?>
                              <p>Sin respuestas</p>
                            <?php }?>
                        </td>

                        <td>
                            <?php $pregunta=$ctrEncuesta->ctrExistenPreguntas($ponencia["idponencia"])?>
                            <?php if(!empty($pregunta)){?>
                              <form method="post" action="encuesta">
                                <input type="hidden" value="<?php echo $ponencia["idponencia"] ?>" name="idEncuestaVer" >
                                <button type="submit" class="btn btn-success"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                              </form>
                            <?php }else{?>
                              <button class="btn btn-success text-white" data-toggle="modal" data-target="#registrarEncuesta" onclick="llenarIdEncuesta(<?php echo $ponencia['idponencia']?>, '<?php echo $ponencia['nombre'] ?>')"> 
                              <i class="fa fa-upload fa-lg" aria-hidden="true"></i>
                              </button>
                            <?php }?>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <?php
              
              }else{
                ?>
                  <div class="border border-warning alert alert-dismissible fade show col-md-5 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
                  <i class="fa fa-exclamation-triangle fa-lg"></i>
                  <h4 class="alert-heading text-dark text-center" > <kbd>Sin registros!</kbd></h4>
                  <p class="text-dark">Pero no te preocupes, registra una ponencia :)</p>
                  <hr>

              
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  </div>

                <?php
                
              }
              

      ?>
      </div>     
      <!-- /.box-footer-->
    <!-- /.box -->
    <div class="box-footer">
      

      <div  class="modal fade" id="registrarEncuesta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header tituloTabla">
                <img src="vistas/img/icono.png" class="img-fluid" style="max-width: 7%;" >
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
       
                  <form method="post" id="formularioRegistroEncuesta">
                    <div class="form-group">
                            <label for="idPonenciaEncuesta" class="col-form-label">ID de la ponencia:</label>
                            <input type="text" class="form-control form-control-sm" id="idPonenciaEncuesta" name="idPonenciaEncuesta" readonly>
                    </div>

                    <div class="form-group">
                            <label for="encuestaPregunta1" class="col-form-label">Pregunta de la calificación sobre la ponencia:</label>
                            <input type="text" value="¿Que calificación del 1 al 5 le das a la ponencia?" class="form-control form-control-sm" id="encuestaPregunta1" name="encuestaPregunta1" readonly>
                    </div>

                    <div class="form-group">
                            <label for="encuestaPregunta2" class="col-form-label">Pregunta 1:</label>
                            <input type="text" class="form-control form-control-sm" id="encuestaPregunta2" name="encuestaPregunta2" >
                    </div>

                    <div class="form-group">
                            <label for="encuestaPregunta3" class="col-form-label">Pregunta 2:</label>
                            <input type="text" class="form-control form-control-sm" id="encuestaPregunta3" name="encuestaPregunta3" >
                    </div>

                    <div class="form-group">
                            <label for="encuestaPregunta4" class="col-form-label">Pregunta 3:</label>
                            <input type="text" class="form-control form-control-sm" id="encuestaPregunta4" name="encuestaPregunta4" >
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success" onclick="validacionRegistroEncuesta()" >Registrar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                    </div>

                    <?php
                          $ctrEncuesta -> ctrRegistrarPreguntas();
                    ?>
                  </form>
                </div>
            </div>

          </div>
        </div>
        </div>
      
        <div  class="modal fade" id="actualizarInformacionPonencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header tituloTabla">
                <img src="vistas/img/icono.png" class="img-fluid" style="max-width: 7%;" >
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                  <form method="post"  id="formularioActualizarPonencia">
              
                  </form>
                </div>
            </div>
          </div>
        </div>
       
     </div>
							

  </section>
  <!-- /.content -->


</div>
<!-- /.content-wrapper -->