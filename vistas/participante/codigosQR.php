
<section class="perfil">

  <div class="content-header">
    
    <h1>
      
    Generación de gafetes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Generación de gafetes</li>
    
    </ol>

</div>



  <!-- Main content -->
  <div class="content">

    

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
          $participante = $_SESSION["participante"];
          $ctrPonencia= new ControladorPonencias();
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
                      <th>Códigos QR</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ponenciasPagadas as $ponenciaPagada) { ?>
                      <tr>
                        <?php $ponencia = $ctrPonencia->ctrConsultarInformacion($ponenciaPagada["ponencia_idponencia"])?>
                        <td><?php echo $ponencia["idponencia"] ?></td>
                        <td><?php echo $ponencia["nombre"] ?></td>
                        <td><?php echo $ponencia["fecha"]."/".$ponencia["hora"]?></td>
                        <td><?php echo $ponencia["categoria"]?></td>
                        <td><?php if($ponencia["modalidad"]=="Gratuito") echo "Gratuito"; else echo "Costo ".$ponencia["costo"];?></td>
                        <td>
                              <form method="post" action="gafete">
                                <input type="hidden" value="<?php echo $ponencia["idponencia"] ?>" name="idPonenciaGeneracionQR" >
                                <input type="hidden"  name="idParticipanteCodigoQR" value="<?php echo $participante["id"] ?>">
                                <button type="submit" class="btn btn-success"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                              </form>
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