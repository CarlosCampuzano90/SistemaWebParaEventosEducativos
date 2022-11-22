
<section class="perfil">

  <div class="content-header">
    
    <h1>
      
    Constancias
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Constancias</li>
    
    </ol>

</div>



  <!-- Main content -->
  <div class="content">

    

    <!-- Default box -->
    <div class="box" id="hola">
      <div class="box-header with-border">
        <h3 class="box-title">Después de contestar la encuesta se podrá generar tu constancia</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" 
                  title="Ocultar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body" id="tablaEncuestas">
      <?php
          $participante = $_SESSION["participante"];
          $ctrPonencia= new ControladorPonencias();
          $ctrEncuesta = new ControladorEncuestas();
          $ponenciasPagadas=$ctrPonencia->ctrConsultarPonenciasPagadas($participante["id"]);

              if(!empty($ponenciasPagadas)){
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
                      <th>Progreso</th>
                      <th>Constancia</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ponenciasPagadas as $ponenciaPagada) { ?>
                      <tr>
                        <?php $ponencia = $ctrPonencia->ctrConsultarInformacion($ponenciaPagada["ponencia_idponencia"]);
                              $contestado=$ctrEncuesta->ctrEncuestaContestada($ponencia["idponencia"],$participante["id"]);?>
                        <td><?php echo $ponencia["idponencia"] ?></td>
                        <td><?php echo $ponencia["nombre"] ?></td>
                        <td><?php echo $ponencia["fecha"]."/".$ponencia["hora"]?></td>
                        <td><?php echo $ponencia["categoria"]?></td>
                        <td><?php if($ponencia["modalidad"]=="Gratuito") echo "Gratuito"; else echo "Costo ".$ponencia["costo"];?></td>
                        <td>
                         <?php if($ponenciaPagada["asistencia"]==1) { 
                                 
                                  if(empty($contestado)){?>
                                    <form method="post" action="encuesta">
                                      <input type="hidden" value="<?php echo $ponencia["idponencia"] ?>" name="idPreguntasParticipante" >
                                      <button type="submit" class="btn btn-success">Contestar encuesta <i class="fa fa-arrow-circle-o-right fa-lg" aria-hidden="true"></i> </button>
                                    </form>
                                  <?php }else {echo "Encuesta realizada";} ?>
                          <?php }else {echo "Sin asistencia";} ?>
                        </td>

                        <td>
                         <?php if(!empty($contestado)) { ?>
                              <form method="post" action="constancia">
                                <input type="hidden" value="<?php echo $ponencia["idponencia"] ?>" name="idConstanciaVer" >
                                <button type="submit" class="btn btn-success"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                              </form>
                          <?php }else {echo "Requisitos incompletos";} ?>
                        </td>


                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <?php
              
              }else{
                ?>
                <br><br><br><br><br>
                  <div class="border border-warning alert alert-dismissible fade show col-md-5 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
                  <i class="fa fa-exclamation-triangle fa-lg"></i>
                  <h4 class="alert-heading text-dark text-center" > <kbd>Sin registros!</kbd></h4>
                  <p class="text-dark">Pero no te preocupes, registrate en alguna ponencia diponible :)</p>
                  <hr>

              
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <br><br><br><br><br>
                <?php
                
              }
              

      ?>
      </div>     
      <!-- /.box-footer-->
    <!-- /.box -->
      <div class="box-footer">
      
     </div>
							

    </div>
  <!-- /.content -->


</section>
<!-- /.content-wrapper -->


    </div>
      
  <!-- /.content -->
