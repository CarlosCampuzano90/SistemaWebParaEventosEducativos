<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Gestión de las preguntas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li> <a href="encuestas">Gestión de las preguntas</a></li>
      
      <li class="active">Respuestas</li>
    
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
                $idPonencia= $_POST["idPonenciaMostrarRespuestas"];
                $preguntas=$ctrEncuesta->ctrMostrarPreguntas($idPonencia);
                $respuestas = $ctrEncuesta->ctrMostrarRespuestas($idPonencia);
                $i=0;
                ?>
       				<div class="card mx-auto text-center ">
                <hr>
                <div class="card-header font-weight-bold text-white tituloProximosEventos" >
                <h3> Preguntas de la ponencia </h3>
                 
              
                </div>
                <hr>
                <?php foreach ($respuestas as $respuesta){
                  if($i==4)$i=0;
                  if($i==0){?>
                  <div class="card-body d-flex align-items-center mx-auto col-md-8 cuerpoProximosEventos">
                    <p class="rounded text-black" style="background-color: #FBB034;"><?php echo "ID del usuario  ".$respuesta["usuarios_id"]?></p>
                  <p class="card-text font-weight-bold text-justify col-md-12">
                    
                  <?php }
                     
                      echo $preguntas[$i]["pregunta"]." <br>";
                      echo "Respuesta: <kbd class='rounded'> ".$respuesta["respuesta"]."</kbd>";
                      echo "<br><br>";
                      $i++;?>  
                  
                 <?php if($i==4)echo " </p> </div> <br>";}?>

              </div>
        </div>
    </div>
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