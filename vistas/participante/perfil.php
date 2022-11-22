<?php
          $participante = $_SESSION["participante"];
          $ctrInformacion= new ControladorUsuarioInformacion();
          $informacionUsuario=$ctrInformacion->ctrConsultarInformacion($participante["id"]);
    ?> 

<section class="perfil" >
    <div id="tablaParticipantes">
            <?php
            if(!empty($informacionUsuario)){
            ?>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3">
                        <div class="card">
                            <div class="card-body ">
                                    <div class="mx-auto text-center">
                                        <?php echo '<img alt="Sin foto del participante"  style="border-radius:160px; border:5px solid #4F1F91; width:200px;height:200px; " src="data:image/jpeg;base64,'.($informacionUsuario["foto"]).'"/>';?>   
                                    </div>
                                    <h4 class="card-title mt-2 text-center"><?php echo $informacionUsuario["nombre"]." ".$informacionUsuario["apellido"]?></h4> 
                                    <h6 class="card-subtitle text-center"><?php echo $participante["usuario"]?></h6><hr>
                                    <p class="card-subtitle text-center"><?php echo $informacionUsuario["puesto"]?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" class="form-horizontal form-material mx-2" enctype="multipart/form-data" id="actualizarInformacion">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" value="<?php echo $participante["id"]?>"  name="idUsuarioInfomacion" hidden>
                                        <input type="text" class="form-control form-control-sm" value="<?php echo $informacionUsuario['id']?>" id="InformacionIDAct" name="InformacionIDAct" hidden>
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
                                        
                            
                                        <button type="submit" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizar información</button>
                                        
                                        </div>

                                        <?php
                                            $usuario = new ControladorUsuarioInformacion();
                                            $usuario -> ctrActualizarInformacion();

                                        ?>
                                </form>
                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            <?php }else{
                ?>
                <br><br><br><br>
                <div class="border border-warning alert alert-dismissible fade show col-md-8 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
                <i class="fa fa-exclamation-triangle fa-lg"></i>
                <h4 class="alert-heading text-dark text-center" > <kbd>Sin información personal!</kbd></h4>
                <p class="text-dark">Primero sube tu información y la mostraremos :)</p>
                <hr>
                <p class="mb-0 text-dark text-right"><i class="fa fa-hand-o-right fa-lg"></i> Usa el botón verde</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <br> <br> <br> <br> <br> <br> <br>
                <hr>
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#registrarInformacionPerfil" >Subir información personal <i class="fa fa-plus-square-o" aria-hidden="true"></i></button>

                <div  class="modal fade" id="registrarInformacionPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                <form method="post" enctype="multipart/form-data" id="formularioInformacion">
                                    <div class="form-group">
                                    <label for="usuario" class="col-form-label">ID del usuario:</label>
                                    <input type="text" class="form-control form-control-sm" id="usuarioInformacionID" name="InformacionID" value="<?php echo $participante["id"] ?>" readonly>
                                    </div>
                            
                                    <div class="form-group">
                                    <label for="tipoUsuario" class="col-form-label">Tipo de usuario:</label>
                                    <i class="fa fa-info-circle" aria-hidden="true" title="Eliga si el usuario pertenece a la UPEMOR o es un visitante"></i>
                                    <select class="form-control form-control-sm" id="tipoUsuario" onchange="mostrarTipoUsuario()">
                                    <option value="Interno" selected>Interno</option>
                                    <option value="Externo">Externo </option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="usuario" class="col-form-label">Nombre(s):</label>
                                    <input type="text" class="form-control form-control-sm" name="InformacionNombre" id="idInformacionNombre" >
                                    </div>

                                    <div class="form-group">
                                    <label for="contrasena" class="col-form-label">Apellido(s):</label>
                                    <input type="text" class="form-control form-control-sm" name="InformacionApellido" id="idInformacionApellido">
                                    </div>

                                    <div class="form-group" id="idMatriculaInformacion">
                                    <label for="contrasena" class="col-form-label">Matrícula:</label>
                                    <input type="text" class="form-control form-control-sm" name="InformacionMatricula" id="idInputInformacionMatricula">
                                    </div>

                                    <div class="form-group" id="idGradoYGrupo" >
                                    <label for="contrasena" class="col-form-label">Grado y grupo:</label>
                                    <input type="text" class="form-control form-control-sm" name="InformacionGrado" id="idLlenarGrado">
                                    </div>

                                    <div class="form-group" id="idPuestoInformacion" >
                                    <label for="contrasena" class="col-form-label">Puesto:</label>
                                    <input type="text" class="form-control form-control-sm" name="InformacionPuesto" id="idInputInformacionPuesto">
                                    </div>
                                    <div class="form-group">
                                    <label for="InformacionGeneroAct" class="col-form-label">Genero: </label>
                                    <select class="form-control form-control-sm" name="InformacionGenero" id="InformacionGenero">
                                        <option value="Masculino" selected>Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                    <label class="col-form-label">Foto</label>
                                    <i class="fa fa-info-circle" aria-hidden="true" title="Se puede dejar vacio"></i>
                                    <input type="file" class="form-control form-control-sm" id="image" name="image" multiple />
                                    </div>

                                    <div class="modal-footer">
                            
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                                    <button id="botonValidarInformacion" type="button" class="btn btn-success" onclick="validacionUsuarioInformacion()">Registrar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                                    
                                    </div>

                                    <?php
                                        $usuario = new ControladorUsuarioInformacion();
                                        $usuario -> ctrRegistrarUsuarioInfo();
                                        
                                    ?>
                                </form>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
                <br><br><br>
              <?php }?>

    </div>
</section>

<script>  document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("actualizarInformacion").addEventListener('submit', validacionActualizacionInformacion); 
      });</script>