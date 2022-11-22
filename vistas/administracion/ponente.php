<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Gestión de las ponencias
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li> <a href="ponencias">Gestión de las ponencias</a></li>
      
      <li class="active">Información del ponente</li>
    
    </ol>

  </section>



  <!-- Main content -->
  <section class="content">

    

    <!-- Default box -->
    <div class="box" id="hola">
      <div class="box-header with-border">
        <h3 class="box-title">Información del ponente</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" 
                  title="Ocultar Coordinadores">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body" >

                <div class="container" id="informacionPonente">
                    <?php $ctrPonencia= new ControladorPonencias();
                $idPonencia= $_POST["idPonencia"];
                $ponencia=$ctrPonencia->ctrMostrarInformacionPonente($idPonencia);
                ?>
                <div class="row border border-dark">
                  <div class="col-sm-12 tituloTabla">
                    <img src="vistas/img/icono.png" class="img-fluid" style="width:60px;" >
                  </div>        
                  <div class="col-sm text-center">
            
                    <br>
                    <?php echo '<img height="150" width="150" alt="Sin foto del ponente" class="rounded" src="data:image/jpeg;base64,'.($ponencia["foto"]).'"/>';?>         
                    <hr>
                    Foto del ponente
                  </div>
                  <div class="col-md">
                    <hr>
                    Nombre completo del ponente: <br><?php echo $ponencia["nombreCompletoPonente"] ?>
                    <hr>
                    Grado académico: <?php echo $ponencia["gradoAcademico"] ?>
                    <hr>
                    <div class="col-md text-center">
                      <button type="button" class="btn btn-warning" onclick="mostrarFormularioPonente()"><i class="fa fa-pencil-square" aria-hidden="true"></i> Actualizar</button>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#subirDocumentoPDF"><i class="fa fa-pencil-square" aria-hidden="true"></i> Subir material PDF</button>
                    </div>
                  </div>
                  <div class="col-sm text-center rounded-5">
                    
                    <br>
                    <?php echo '<img height="150" width="250" src="data:image/jpeg;base64,'.($ponencia["firmaDigital"]).'"/>';?>
                    <hr>
                    Firma del ponente
                  </div>
                </div>
              </div>
            <form method="post" enctype="multipart/form-data" id="actualizarPonente" style="display: none;">
                <div class="form-group">
                      <input type="text" value="<?php echo $idPonencia?>" class="form-control form-control-sm" id="idPonencia" name="idPonencia" readonly>
                </div>
                <div class="form-group">
                  <label for="usuario" class="col-form-label">Nombre completo del ponente:</label>
                  <input value="<?php echo $ponencia["nombreCompletoPonente"] ?>" type="text" class="form-control form-control-sm" id="nombrePonenteActualizar" name="nombrePonenteActualizar" >
                </div>

                <div class="form-group">
                  <label for="contrasena" class="col-form-label">Grado academico: <?php echo $ponencia["gradoAcademico"] ?> </label>
                  <select class="form-control form-control-sm" name="gradoPonenteActualizar" id="gradoPonenteActualizar">
                      <option value="Licenciatura" selected>Licenciatura</option>
                      <option value="Maestría">Maestría</option>
                      <option value="Doctorado">Doctorado </option>
                      </select>
                </div>
    
                <div class="form-group">
                  
                      <label class="col-form-label">Foto </label>
                      <i class="fa fa-info-circle" aria-hidden="true" title="Se puede dejar vacío si no desea cambiarla">:</i>
                      <input type="file" class="form-control form-control-sm" id="imageActualizar" name="imageActualizar" multiple/>
                </div>

                <div class="form-group">
                      <label class="col-form-label">Firma digital </label>
                      <i class="fa fa-info-circle" aria-hidden="true" title="Se puede dejar vacío si no desea cambiarla">:</i>
                      <input type="file" class="form-control form-control-sm" id="firmaActualizar" name="firmaActualizar" multiple/>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" onclick="regresarInformacion()"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</button>
                  <button type="submit" class="btn btn-success"><i class="fa fa-pencil-square" aria-hidden="true"></i> Actualizar</button>

                </div>

                <?php
                $ctrPonencia->ctrActualizarPonente();
                ?>
            </form>

      </div>
      <!-- /.box-footer-->
    <!-- /.box -->
    <div class="box-footer">
        <a href="ponencias"> <button class="btn btn-success" href="ponencias"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar</button></a>
        <div  class="modal fade" id="subirDocumentoPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


                        <hr>
                        <form method="post" enctype="multipart/form-data">
                            <h4 class="text-center mb-4">Máximo 10 mb en formato PDF</h4>
                            <input type="file" name="documento" id="">
                            <input type="text" value="<?php echo $idPonencia?>" class="form-control form-control-sm" id="idPonencia" name="idPonencia" hidden>
                            <input type="submit">
                            <?php
                              $ctrPonencia->ctrSubirMaterialPDF();

                            ?>
                        </form>
 
                  </div>
              </div>

            </div>
          </div>
      </div>

    </div>
							

  </section>
  <!-- /.content -->


</div>
<!-- /.content-wrapper -->
<script>  document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("actualizarPonente").addEventListener('submit', validacionActualizacionPonente); 
      });</script>