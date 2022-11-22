<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Gestión de próximos Eventos y Eventos Concluidos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li> <a href="proximosEventos">Gestión de próximos Eventos y Eventos Concluidos</a></li>
      
      <li class="active">Información del proximo evento</li>
    
    </ol>

  </section>



  <!-- Main content -->
  <section class="content">

    

    <!-- Default box -->
    <div class="box" id="hola">
      <div class="box-header with-border">
        <h3 class="box-title">Asi se mostrara en la pagina de inicio</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" 
                  title="Ocultar Coordinadores">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body" >

            <div class="container mx-auto" id="informacionProximoEvento">
                    <?php $ctrInformacion= new ControladorEventosConcluidos();
                $idEvento= $_POST["idEventoConcluido"];
                $evento=$ctrInformacion->ctrMostrarUnEventoConcluido($idEvento);
                
                ?>
                <div id="carouselExampleCaptions" class="carousel slide"  data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src=  "data:image/jpeg;base64,<?php echo $evento["imagen"]?>" class="d-block w-75 mx-auto" alt="...">
                        <div class="descripcionEventoConcluido carousel-caption mx-auto font-weight-bold d-none d-md-block" >
                          <h4><?php echo $evento["titulo"]?></h4>
                          <p><?php echo $evento["descripcion"]?> <br> <?php echo $evento["fecha"]?></p>
                        </div>
                      </div>
                    </div>
                 </div>

                <div class="col-md text-center">
                      <button type="button" class="btn btn-warning float-left" onclick="mostrarFormularioProximoEvento()"><i class="fa fa-pencil-square" aria-hidden="true"></i> Actualizar</button>
                      <form method="post">
                        <input type="hidden" value="<?php echo $evento["id"] ?>" name="idEventoConcluidoEliminar">
                        <button type="submit" class="btn btn-danger float-right" onclick="return confirm('¿Deseas continuar?');"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Eliminar</button>
                        <?php $ctrInformacion->ctrELiminarEventoConcluido()?> 
                        </form>
                    </div>
              </div>


            <form method="post" id="formularioActualizarEventos" enctype="multipart/form-data" style="display: none;">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm" id="idEventoConcluido" name="idEventoConcluido" value="<?php echo $evento["proximosEventos_id"] ?> " hidden>
                </div>
                <div  class="form-group">
                      <label for="image" class="col-form-label">Imagen</label>
                      <i class="fa fa-info-circle" aria-hidden="true" title="Se puede dejar vacío"></i>
                      <input type="file" class="form-control form-control-sm" id="image" name="image" multiple />
                </div>
                <div class="form-group">
                    <label for="tituloEventoConcluidoAct" class="col-form-label">Titulo de Evento:</label>
                    <input type="text" class="form-control form-control-sm" id="tituloEventoConcluidoAct" name="tituloEventoConcluidoAct" value="<?php echo $evento["titulo"] ?> ">
                </div>
                <div class="form-group">
                  <label for="fechaEventoConcluidoAct" class="col-form-label">Fecha de evento concluido:</label>
                  <input type="date" class="form-control form-control-sm" id="fechaEventoConcluidoAct"  name="fechaEventoConcluidoAct" value="<?php echo $evento["fecha"] ?>" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                </div>
                <div class="form-group">
                    <label for="descripcionEventoConcluidoAct" class="col-form-label">Descripcion:</label>
                    <input type="text" class="form-control form-control-sm" id="descripcionEventoConcluidoAct" name="descripcionEventoConcluidoAct" value="<?php echo $evento["descripcion"]?>">
                </div>
                <div class="modal-footer">
        
                    <button type="button" class="btn btn-danger" onclick="regresarInformacionProximoEvento()">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                    <button type="submit" class="btn btn-success">Actualizar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                    
                </div>

                <?php
                $ctrInformacion->ctrActualizarEventoConcluido();
                ?>
                </form>



      </div>
      <!-- /.box-footer-->
    <!-- /.box -->
    <div class="box-footer">
        <a href="proximosEventos"> <button class="btn btn-success" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar</button></a>
    </div>
							

  </section>
  <!-- /.content -->


</div>
  <!-- /.content 
<script>  document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("actualizarInformacion").addEventListener('submit', validacionActualizacionInformacion); 
      });</script>-->