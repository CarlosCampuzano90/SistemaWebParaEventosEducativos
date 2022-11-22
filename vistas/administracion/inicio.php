<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js" integrity="sha256-+8RZJua0aEWg+QVVKg4LEzEEm/8RFez5Tb4JBNiV5xA=" crossorigin="anonymous"></script>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tablero
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tablero</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Estadísticas de las ponencias</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

        <div class="col-sm-6 container-fluid text-center  float-left" >

            <p>Total de asistencias de las ponencias</p>
            <?php
                $ctrPonencia=new ControladorPonencias();
                $ponenciasPorPeriodo = $ctrPonencia->ctrMostrarPonenciasPorPeriodo();
                if(!empty($ponenciasPorPeriodo)){
            ?>
            <canvas id="grafico2"  style="max-width: 600px; max-height: 420px;" ></canvas>
            <?php }else{
                ?>
                <br><br><br><br>
                <div class="border border-warning alert alert-dismissible fade show col-md-10 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
                <i class="fa fa-exclamation-triangle fa-lg"></i>
                <h4 class="alert-heading text-dark text-center" > <kbd>No hay ninguna consulta!</kbd></h4>
                <p class="text-dark">Primero selecciona el periodo para buscar información</p>
                <hr>
                </div>
                <br><br><br>
              <?php }?>
            <form method="post">
            <div class="form-group">
                <label class="col-sm-6 float-left" for="periodoGrafica">Selecciona el periodo:</label>
                <select class="col-sm-5 form-control float-left"  id="periodoGrafica" name="periodoGrafica" required>
                  <option value="4" selected>Invierno</option>
                  <option value="8" >Primavera</option>
                  <option value="12">Otoño</option>
                </select>
                <button type="submit" class="float-right btn btn-success" ><i class="fa fa-search" aria-hidden="true"></i></i></button>
            </div>

          </form>
        </div>

        <div class="col-sm-6 container-fluid text-center float-right" >
        <p>Total de ponencias realizadas por periodos</p>
          <br>

            <?php
                $ponencias = $ctrPonencia->ctrMostrarPonenciasGraficaPastel();
                if($ponencias[0]!="0" || $ponencias[1]!="0" || $ponencias[2]!="0" ){    ?>
                  <canvas id="grafico" style="max-width: 600px; max-height: 360px;" ></canvas>
                <?php }else{
                ?>
                <div class="border border-warning alert alert-dismissible fade show col-md-10 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
                <i class="fa fa-exclamation-triangle fa-lg"></i>
                <h4 class="alert-heading text-dark text-center" > <kbd>Sin registros!</kbd></h4>
                <p class="text-dark">Mostraremos la gráfica cuando tengamos información de las ponencias</p>
                <hr>
                </div>
              <?php
            
            }?>
                
        

        </div>
        
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
  <script>
            $(document).ready(mostrarResultados());  
            $(document).ready(mostrarResultadosPeriodo());  
                function mostrarResultados(){
                  var myChart;
                  var data = {
                              labels: [
                                  'Invierno',
                                  'Primavera',
                                  'Otoño'
                              ],
                              datasets: [{
                                  label: 'Grafica de pastel',
                                  data: [<?php echo $ponencias[0].",".$ponencias[1].",".$ponencias[2]?>],
                                  backgroundColor: [
                                  '#4F1F91',
                                  '#F50003',
                                  '#FBB034',
                                  ],
                                  hoverOffset: 4
                              }]
                              };

                  var ctx = document.getElementById('grafico').getContext('2d');

                  var options = {
                      plugins: {
                          legend: { position: 'left' }
                      }
                  }
                  if (myChart) {
                          myChart.destroy();
                      }

                  myChart = new Chart(ctx, { type: 'pie', data, options })

              
                }

                function mostrarResultadosPeriodo(){
                  var myChart;
                  var data = {
                              labels: [ <?php if(isset($ponenciasPorPeriodo)) foreach($ponenciasPorPeriodo as $ponencia){
                                  echo "'".$ponencia["nombre"]."'".",";
                                }?>
                              ],
                              datasets: [{
                                  label: 'Grafica de pastel',
                                  data: [<?php if(isset($ponenciasPorPeriodo))foreach($ponenciasPorPeriodo as $ponencia){
                                  echo $ponencia["total"].",";
                              }?>],
                                  backgroundColor: [
                                  '#4F1F91',
                                  '#F50003',
                                  '#FBB034',
                                  '#5D009A',
                                  '#FFB900',
                                  ],
                                  hoverOffset: 4
                              }]
                              };

                  var ctx = document.getElementById('grafico2').getContext('2d');

                  var options = {
                      plugins: {
                          legend: { position: 'left' }
                      }
                  }
                  if (myChart) {
                          myChart.destroy();
                      }

                  myChart = new Chart(ctx, { type: 'pie', data, options })

              
                }
    </script>
</div>
<!-- /.content-wrapper -->