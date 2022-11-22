<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Gestión de usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li> <a href="usuarios">Gestión de usuarios</a></li>
      
      <li class="active">Información del usuario</li>
    
    </ol>

  </section>



  <!-- Main content -->
  <section class="content">

    

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

                <div class="container" id="informacionUsuario">
                    <?php $ctrInformacion= new ControladorUsuarioInformacion();
                $idUsuario= $_POST["idUsuarioInfomacion"];
                $informacionUsuario=$ctrInformacion->ctrConsultarInformacion($idUsuario);
                ?>
                <div class="row border border-dark">
                  <div class="col-sm-12 tituloTabla">

                    <img src="vistas/img/icono.png" class="img-fluid" style="width:60px;" >
                    
                  </div>        
                  <div class="col-sm text-center">
            
                    <br>
                    <?php echo '<img height="160" width="130" alt="Sin foto del usuario" class="rounded" src="data:image/jpeg;base64,'.($informacionUsuario["foto"]).'"/>';?>         
                    <hr>
                    Foto del usuario
                  </div>
                  <div class="col-md">
                    <hr>
                    Nombre completo del usuario: <br> <?php echo $informacionUsuario["nombre"]." ".$informacionUsuario["apellido"]?>
                    <hr>
                    Matrícula: <?php echo $informacionUsuario["matricula"] ?>
                    <hr>
                      Grado y grupo del usuario: <br> <?php echo $informacionUsuario["gradoYgrupo"]?>
                    <hr>
             

                  </div>
                  <div class="col-sm">
                
                      <hr>
                      Puesto: <?php echo $informacionUsuario["puesto"] ?>
                      <hr>
                      Genero: <?php echo $informacionUsuario["sexo"] ?>
                      <hr>
                      <div class="col-sm text-center">
                        <button type="button" class="btn btn-warning float-left" onclick="mostrarFormularioInformacion()"><i class="fa fa-pencil-square" aria-hidden="true"></i> Actualizar</button>
                        <form method="post">
                        <input type="hidden" value="<?php echo $informacionUsuario["id"] ?>" name="idInformacionEliminar">
                        <button type="submit" class="btn btn-danger float-right" onclick="return confirm('¿Deseas continuar?');"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Eliminar</button>
                        <?php $ctrInformacion->ctrELiminarInformacion()?> 
                        </form>
                      </div>
                  </div>
                </div>
              </div>



              <form method="post" enctype="multipart/form-data" id="actualizarInformacion" style="display: none;">
                  <div class="form-group">
                  <input type="text" class="form-control form-control-sm" value="<?php echo $idUsuario?>"  name="idUsuarioInfomacion" hidden>
                      <label for="InformacionIDAct" class="col-form-label">ID de la Informacion:</label>
                      <input type="text" class="form-control form-control-sm" value="<?php echo $informacionUsuario["id"]?>" id="InformacionIDAct" name="InformacionIDAct" readonly>
                    </div>
                    <div class="form-group">
                      <label for="InformacionNombreAct" class="col-form-label">Nombre(s):</label>
                      <input type="text" class="form-control form-control-sm" value="<?php echo $informacionUsuario["nombre"]?>" id="InformacionNombreAct" name="InformacionNombreAct" >
                    </div>

                    <div class="form-group">
                      <label for="InformacionApellidoAct" class="col-form-label">Apellido(s):</label>
                      <input type="text" class="form-control form-control-sm" value="<?php echo $informacionUsuario["apellido"]?>" id="InformacionApellidoAct"  name="InformacionApellidoAct" >
                    </div>

                    <div class="form-group">
                      <label for="InformacionMatriculaAct" class="col-form-label">Matrícula:</label>
                      <i class="fa fa-info-circle" aria-hidden="true" title="En caso de no contar dejar en blanco o escribir 'invitado'"></i>
                      <input type="text" class="form-control form-control-sm" id="InformacionMatriculaAct" value="<?php echo $informacionUsuario["matricula"]?>" name="InformacionMatriculaAct" >
                    </div>

                    <div class="form-group" id="idGradoYGrupo">
                      <label for="InformacionCorreoAct" class="col-form-label">Grado y grupo:</label>
                      <i class="fa fa-info-circle" aria-hidden="true" title="Se puede dejar en blanco"></i>
                      <input type="text" class="form-control form-control-sm" value="<?php echo $informacionUsuario["gradoYgrupo"]?>" id="InformacionGradoAct" name="InformacionGradoAct" >
                    </div>

                    <div class="form-group">
                      <label for="InformacionPuestoAct" class="col-form-label">Puesto:</label>
                      <i class="fa fa-info-circle" aria-hidden="true" title="En caso de no pertenecer a la institución dejar en blanco o escribir 'invitado'"></i>
                      <input type="text" class="form-control form-control-sm" value="<?php echo $informacionUsuario["puesto"]?>" id="InformacionPuestoAct" name="InformacionPuestoAct" >
                    </div>
                    <div class="form-group">
                      <label for="InformacionGeneroAct" class="col-form-label">Genero: </label>
                      <select class="form-control form-control-sm" value="<?php echo $informacionUsuario["sexo"]?>" name="InformacionGeneroAct" id="InformacionGeneroAct">
                          <option value="Masculino" <?php if($informacionUsuario["sexo"]=="Masculino") echo "Selected";?>>Masculino</option>
                          <option value="Femenino" <?php if($informacionUsuario["sexo"]=="Femenino") echo "Selected";?>>Femenino</option>
                          </select>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Foto</label>
                      <i class="fa fa-info-circle" aria-hidden="true" title="Se puede dejar vacío"></i>
                      <input type="file" class="form-control form-control-sm" id="image" name="image" multiple />
                    </div>

                    <div class="modal-footer">
                    
                    <button type="button" class="btn btn-danger" onclick="regresarInformacionUsuario()"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</button>
                      <button type="submit" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizar</button>
                    
                    </div>

                    <?php
                          $usuario = new ControladorUsuarioInformacion();
                          $usuario -> ctrActualizarInformacion();

                    ?>
                  </form>

      </div>
      <!-- /.box-footer-->
    <!-- /.box -->
    <div class="box-footer">
        <a href="usuarios"> <button class="btn btn-success" href="ponencias"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar</button></a>
    </div>
							

  </section>
  <!-- /.content -->


</div>

<script>  document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("actualizarInformacion").addEventListener('submit', validacionActualizacionInformacion); 
      });</script>