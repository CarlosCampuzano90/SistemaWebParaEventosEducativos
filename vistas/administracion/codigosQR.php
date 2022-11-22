
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Generación de códigos QR y Pagos de los participantes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Generación de códigos QR y Pagos de los participantes</li>
    
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
                      <th>Pagos pendientes</th>
                      <th>Modalidad</th>
                      <th>Códigos QR</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ponencias as $ponencia) { ?>
                      <tr>
                        <td><?php echo $ponencia["idponencia"] ?></td>
                        <td><?php echo $ponencia["nombre"] ?></td>
                        <td><?php echo $ponencia["fecha"]."/".$ponencia["hora"]?></td>
                        <td><?php echo $ponencia["categoria"]?></td>
                        <td><?php if($ponencia["modalidad"]=="Costo"){?>
                              <form method="post" action="pagos">
                                <input type="hidden" value="<?php echo $ponencia["idponencia"] ?>" name="idPagosPendientes" >
                                <button type="submit" class="btn btn-success"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                              </form>   
                        <?php }?></td>
                        <td><?php if($ponencia["modalidad"]=="Gratuito") echo "Gratuito"; else echo "Costo: ".$ponencia["costo"];?></td>
                        <td>
                              <form method="post" action="codigo">
                                <input type="hidden" value="<?php echo $ponencia["idponencia"] ?>" name="idPonenciaGeneracionQR" >
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
                  <div class="border border-warning alert alert-dismissible fade show col-md-5 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
                  <i class="fa fa-exclamation-triangle fa-lg"></i>
                  <h4 class="alert-heading text-dark text-center" > <kbd>Sin registros!</kbd></h4>
                  <p class="text-dark">Pero no te preocupes, registra una ponencia en la sección ponencias :)</p>
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
      <a  target="_blank" class="btn btn-success" href="Scanner/index.php">Scanner QR</a>
     </div>
							

  </section>
  <!-- /.content -->


</div>
<!-- /.content-wrapper -->