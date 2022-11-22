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

            <div class="container" id="informacionProximoEvento">
                    <?php $ctrInformacion= new ControladorProximosEventos();
                $idUsuario= $_POST["InformacionIdAct"];
                $evento=$ctrInformacion->ctrConsultarInformacionUno($idUsuario);
                ?>
       				<div class="card mx-auto text-center ">
					<hr>
					<div class="card-header font-weight-bold text-white tituloProximosEventos" >
					 <h3>  <?php echo $evento["tituloEvento"] ?> </h3>
						
				
					</div>
					<hr>
					<div class="card-body d-flex align-items-center mx-auto col-md-6 cuerpoProximosEventos">

						<img class="float-center   bg-white col-md-3" style="width: 180px; border-radius: 0px 40px 0px 40px; border: 5px solid #FFF; "
						src="data:image/jpeg;base64,<?php echo $evento["foto"]?>" alt="Imagen del evento">
						<p class="card-text font-weight-bold text-justify float-left col-md-9">Con un cupo de <?php echo $evento["cupo"]." personas.<br> ".$evento["descripcion"]?> </p>
					
					</div>
					<br>
					<div class="fechaProximosEventos d-flex align-items-center mx-auto col-md-3"> <?php echo $evento["fechaProxima"] ?> <i class="fa fa-calendar fa-5x " aria-hidden="true"></i></div>
					<br>
					<div class="card-footer font-weight-bold bg-white row align-items-center" >
						<div class="col-md-5 text-white " style="background-color: #FBB034; padding:10px;">Siguenos en: <i class="fa fa-facebook-official fa-lg" aria-hidden="true"></i> <i class="fa fa-twitter fa-lg" aria-hidden="true"></i> <i class="fa fa-instagram fa-lg" aria-hidden="true"></i></div>
						<div class="tituloProximosEventos col-md-7 text-white" style="padding:10px;">Ponente, <?php echo $evento["nombrePonente"] ?></div>

					</div>
				</div>
                <div class="col-md text-center">
                      <button type="button" class="btn btn-warning" onclick="mostrarFormularioProximoEvento()"><i class="fa fa-pencil-square" aria-hidden="true"></i> Actualizar</button>
                    </div>
              </div>


            <form method="post" id="formularioActualizarEventos" enctype="multipart/form-data" style="display: none;">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm" id="InformacionIdAct" name="InformacionIdAct" value="<?php echo $evento["id"] ?> " hidden>
                </div>
                <div  class="form-group">
                      <label for="image" class="col-form-label">Foto</label>
                      <i class="fa fa-info-circle" aria-hidden="true" title="Se puede dejar vacío"></i>
                      <input type="file" class="form-control form-control-sm" id="image" name="image" multiple />
                </div>
                <div class="form-group">
                    <label for="tituloEventoActualizar" class="col-form-label">Titulo de Evento:</label>
                    <input type="text" class="form-control form-control-sm" id="InformacionTituloEventoAct" name="InformacionTituloEventoAct" value="<?php echo $evento["tituloEvento"] ?> ">
                </div>
                <div class="form-group">
                  <label for="fechaProximaActualizar" class="col-form-label">Fecha proxima:</label>
                  <input type="date" class="form-control form-control-sm" id="InformacionFechaProximaAct"  name="InformacionFechaProximaAct" value="<?php echo $evento["fechaProxima"] ?>" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                </div>
                <div class="form-group">
                    <label for="descripcionActualizar" class="col-form-label">Descripcion:</label>
                    <input type="text" class="form-control form-control-sm" id="InformacionDescripcionAct" name="InformacionDescripcionAct" value="<?php echo $evento["descripcion"]?>">
                </div>
                <div class="form-group">
                      <label for="nombrePonenteActualizar" class="col-form-label">Nombre completo ponente:</label>
                      <input type="text" class="form-control form-control-sm" id="InformacionNombrePonenteAct" name="InformacionNombrePonenteAct" value="<?php echo $evento["nombrePonente"] ?>">
                </div>
                <div class="form-group">
                      <label for="cupoActualizar" class="col-form-label">Cupo:</label>
                      <input type="number" class="form-control form-control-sm" id="InformacionCupoAct" value="<?php echo $evento["cupo"] ?>" name="InformacionCupoAct" max=999>
                </div>
                <div class="form-group">
                    <label for="tipoDeEventoActualizar" class="col-form-label">Tipo de evento:</label>
                    <i class="fa fa-info-circle" aria-hidden="true" title="En caso de ser de ser costo se tendrá que poner un numero de cuenta"></i>
                      <select class="form-control form-control-sm" name="InformacionTipoDeEventoAct" id="InformacionTipoDeEventoAct">
                      <option value="Gratuito" selected>Gratuito</option>
                      <option value="Costo">Costo </option>
                      </select>
                    </div>
                <div class="modal-footer">
        
                    <button type="button" class="btn btn-danger" onclick="regresarInformacionProximoEvento()">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                    <button type="submit" class="btn btn-success">Actualizar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                    
                </div>

                <?php
                $ctrInformacion -> ctrActualizarInformacion();
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