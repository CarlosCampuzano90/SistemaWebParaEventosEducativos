<script defer src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script> 
<script defer src="https://superal.github.io/canvas2image/canvas2image.js"></script> 
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script> 
<section class="perfil">

  <div class="content-header perfilRuta">
    
    <h1>
      
    Gafete
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li> <a href="usuarios">Generación de gafetes</a></li>
      
      <li class="active">Gafete</li>
    
    </ol>

  </div>



  <!-- Main content -->


    

    <!-- Default box -->
    <div class="box" id="hola">
      <div class="box-header with-border">
        <h3 class="box-title">Información del usuario</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" 
                  title="Ocultar Coordinadores">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body" >

                <div class="container col-xl-4 col-lg-6 col-md-8" id="informacionUsuario">
                <?php $ctrInformacion= new ControladorUsuarioInformacion();
                $ctrParticipante= new ControladorParticipantes();

                $idPonencia= $_POST["idPonenciaGeneracionQR"];

                $participante = $_SESSION["participante"];
                $informacionUsuario=$ctrInformacion->ctrConsultarInformacion($participante["id"]);
                ?>
                <div class="row border border-dark" id="gafetePersonal">
                  <div class="col-lg-12 tituloTabla">

                    <img src="vistas/img/icono.png" class="img-fluid" style="width:60px;" > Gafete Personal
                    
                  </div>        
                  <div class="col-lg-12 text-center">
            
                    <br>
                    <?php echo '<img height="130" width="130" alt="Sin foto del usuario" class="rounded" src="data:image/jpeg;base64,'.($informacionUsuario["foto"]).'"/>';?>     

                  </div>
                  <div class="col-lg-12">
                    <hr>
                    Nombre: <?php echo $informacionUsuario["nombre"]." ".$informacionUsuario["apellido"]?>
                    <hr>
                    Matrícula: <?php echo $informacionUsuario["matricula"] ?>
                    <hr>
                    Grado y grupo del participante: <?php echo $informacionUsuario["gradoYgrupo"]?>
                    <hr>
             

                  </div>
                  <div class="col-lg-7 container-fluid">
                        <?php
                              $ctrParticipante -> generarCodigoQR();
                        ?>
                        <div id="contenedorQR" class="rounded mx-auto" style="padding:5px;"></div>
                
                  </div>

                </div>
                <div class="text-center">
                  <button class="btn btn-success text-center" id="boton-descarga">Descargar Gafete</button>
                </div>
              </div>
      </div>
      <!-- /.box-footer-->
    <!-- /.box -->
    <div class="box-footer">
        <a href="codigosQR"> <button class="btn btn-success" href="ponencias"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar</button></a>
    </div>
							

  </section>
  <!-- /.content -->


<script>

$(document).ready(function(){

$("#boton-descarga").click(function() {
          html2canvas($('#gafetePersonal')[0]).then(function(canvas) {
          return Canvas2Image.saveAsPNG(canvas);
          $(".response").append(canvas);
   });
  });
});
</script>