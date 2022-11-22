<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Gestión de constancias
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li> <a href="constancias">Gestión de constancias</a></li>
      
      <li class="active">Constancia</li>
    
    </ol>

  </section>



  <!-- Main content -->
  <section class="content">

    

    <!-- Default box -->
    <div class="box" id="hola">
      <div class="box-header with-border">
        <h3 class="box-title">Así se mostrara para el participante</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" 
                  title="Ocultar Coordinadores">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body" >

       <div class="container" id="informacionProximoEvento">
                <?php $ctrConstancia= new ControladorConstancias();
                $idConstancia= $_POST["idConstanciaVer"];
                $constancia=$ctrConstancia->ctrMostrarConstanciaUna($idConstancia);
                ?>
                <div class="card mx-auto text-center ">
                  <hr>
                  <div class="card-header font-weight-bold" >
                  <h4>Constancia de la ponencia:  <kbd><?php echo $constancia["nombre"] ?></kbd> </h4>
                    
                
                  </div>
                  <div class="mx-auto align-items-center">

                    <img class="float-center bg-white" style="width: 100%; "
                    src="vistas/img/encabezadoConstancia.png" alt="Imagen de la constancia">
                    <p>Otorga la presente </p> 
                    <h3 class="font-weight-bold">CONSTANCIA</h3>  
                    <p>a:</p>
                    <p> <u>  &emsp;&emsp;&emsp;     Nombre del participante   &emsp;&emsp;&emsp;    </u> </p>
                    <div class="col-md-8 mx-auto">
                      <p>La universidad Politécnica del Estado de Morelos le agradece a usted por ser parte del evento, <?php echo $constancia["nombre"] ?>, el cual se realizo el
                      <?php echo $ctrConstancia->fechaCastellano($constancia["fechaEvento"]) ?>. </p>
                      <p><?php echo $constancia["textoAgradecimiento"] ?></p>
                    </div>
                    <div class="float-left bg-white col-md-3">
                      <img  style="width: 120px; height:70px; border-bottom: 5px solid #000000;"
                      src="data:image/jpeg;base64,<?php echo $constancia["firmaDigitalCoordinador"]?>" alt="Firma coordinador">
                      <p>Firma del coordinador</p>
                    </div>
                    <div class="float-right bg-white col-md-3">
                      <img  style="width: 120px; height:70px; border-bottom: 5px solid #000000;"
                      src="data:image/jpeg;base64,<?php echo $constancia["firmaDigitalPonente"]?>" alt="Firma ponente">
                      <p>Firma del ponente</p>
                    </div>
                    
                </div>
                <div class="card-footer font-weight-bold bg-white row align-items-center" >
                    <div class="col-md-5 text-white " style="background-color: #FBB034; padding:10px;">&emsp;  </div>
                    <div class="tituloProximosEventos col-md-7 text-white" style="padding:10px;">"Ciencia y Tecnología para el Bien Común"</div>

                  </div>
                </div>
                <div class="col-md text-center">
                      <button type="button" class="btn btn-warning" onclick="mostrarFormularioProximoEvento()"><i class="fa fa-pencil-square" aria-hidden="true"></i> Editar constancia</button>
                </div>
      </div>


            <form method="post" id="formularioActualizarEventos" enctype="multipart/form-data" style="display: none;">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm" id="idConstanciaVer" name="idConstanciaVer" value="<?php echo $constancia["id"] ?> " hidden>
                </div>
                <div  class="form-group">
                      <label for="firmaActualizar" class="col-form-label">Firma digital del coordinador</label>
                      <i class="fa fa-info-circle" aria-hidden="true" title="Se puede dejar vacío"></i>
                      <input type="file" class="form-control form-control-sm" id="firmaActualizar" name="firmaActualizar" multiple />
                </div>
                <div class="form-group">
                    <label for="textoAgradecimientoActualizar" class="col-form-label">Texto de agradecimiento:</label>
                    <input type="text" class="form-control form-control-sm" id="textoAgradecimientoActualizar" name="textoAgradecimientoActualizar" value="<?php echo $constancia["textoAgradecimiento"] ?> ">
                </div>
                <div class="modal-footer">
        
                    <button type="button" class="btn btn-danger" onclick="regresarInformacionProximoEvento()">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                    <button type="submit" class="btn btn-success">Actualizar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                    
                </div>

                <?php
                $ctrConstancia -> ctrActualizarConstancia();
                ?>
                </form>



      </div>
      <!-- /.box-footer-->
    <!-- /.box -->
    <div class="box-footer">
        <a href="constancias"> <button class="btn btn-success" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar</button></a>
    </div>
							

  </section>
  <!-- /.content -->


</div>
  <!-- /.content 
<script>  document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("actualizarInformacion").addEventListener('submit', validacionActualizacionInformacion); 
      });</script>-->