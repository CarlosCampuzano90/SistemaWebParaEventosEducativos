
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Gestión de las ponencias
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Gestión de las ponencias</li>
    
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
      <div class="box-body" id="tablaPonencias">
      <?php
          $coordinadorCtr = new ControladorCoordinadores();
          $coordinadores=$coordinadorCtr->ctrRellenarTablaCoordinador();
          $ctrPonencia= new ControladorPonencias();
          $ponencias=$ctrPonencia->ctrMostrarInformacionPonencia();
          $ctrInfomacionCoordinador= new ControladorUsuarioInformacion();
          date_default_timezone_set('America/Mexico_City');
          $horaActual = date('H:i', time());  

              if(!empty($ponencias)){
                ?>
                <div class="tablaResposiveGrande" >
                <table class="table">
                  <thead class="tituloTabla">
                    <tr>
                      <th>ID</th>
                      <th>Coordinador</th>
                      <th>Título</th>
                      <th>Fecha y hora</th>
                      <th>Espacios</th>
                      <th>Categoría</th>
                      <th>Modalidad</th>
                      <th>Núm. Cuenta</th>
                      <th>Ponente</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ponencias as $ponencia) { ?>
                      <tr>
                        <td><?php echo $ponencia["idponencia"] ?></td>
                        <?php  $InformacionCoordinador=$ctrInfomacionCoordinador->ctrConsultarNombre($ponencia["idCoordinador"]) ?>
                        <td><?php echo $InformacionCoordinador["nombre"]?></td>
                        <td><?php echo $ponencia["nombre"] ?></td>
                        <td><?php echo $ponencia["fecha"]."/".$ponencia["hora"]?></td>
                        <td><?php echo $ponencia["espaciosDisponibles"]?></td>
                        <td><?php echo $ponencia["categoria"]?></td>
                        <td><?php if($ponencia["modalidad"]=="Gratuito") echo "Gratuito"; else echo "Costo: ".$ponencia["costo"];?></td>
                        <td><?php echo $ponencia["numeroCuenta"]?></td>
                        <td>
                        <form method="post" action="ponente">
                          <input type="hidden" value="<?php echo $ponencia["idponencia"] ?>" name="idPonencia">
                          <button type="submit" class="btn btn-success"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                        </form>
                        </td>

                        <td>
                        <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#actualizarInformacionPonencia" 
                        onclick="llenarValoresPonente(<?php echo $ponencia['idponencia'] ?>, <?php echo $ponencia['idCoordinador'] ?>
                        ,'<?php echo $ponencia['nombre'] ?>','<?php echo $ponencia['fecha'] ?>','<?php echo $ponencia['hora'] ?>',<?php echo $ponencia['espaciosDisponibles'] ?>,
                        '<?php echo $ponencia['categoria'] ?>','<?php echo $ponencia['modalidad'] ?>',<?php echo $ponencia['numeroCuenta'] ?>,<?php echo $ponencia['costo'] ?>)"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></button>
            
                        </td>
                        <td>
                        <form method="post">
                          <input type="hidden" value="<?php echo $ponencia['idponencia'] ?>" name="idInformacionEliminar">
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Esta acción eliminara información relacionada a la ponencia, ¿Desea continuar?');"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button>
                          <?php $ctrPonencia->ctrEliminarPonencia();?>
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
                  <p class="text-dark">Pero no te preocupes, registra una ponencia :)</p>
                  <hr>

                  <p class="mb-0 text-dark text-right"><i class="fa fa-hand-o-right fa-lg"></i> Usa el botón verde</p>
              
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
      
    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#registrarPonencia" >Registrar Ponencia <i class="fa fa-plus " aria-hidden="true"></i></button>
      <div  class="modal fade" id="registrarPonencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
       
                  <form method="post" id="formularioRegistroPonencia" enctype="multipart/form-data">
                  <div class="form-group">
                        <label for="Coordinador">Selecciona al Coordinador:</label>
                        <select class="form-control"  id="idCoordinador" name="idCoordinador" required>
                        
                        <?php foreach ($coordinadores as $coordinador) {
                        echo "<option value='".$coordinador["id"]."'> Usuario: ".$coordinador["usuario"]."</option>";
                        }
                        ?>
                        </select>
                
                    </div>
                    <div class="form-group">
                      <label for="NombrePonencia" class="col-form-label">Nombre de la ponencia:</label>
                      <input type="text" class="form-control form-control-sm" id="NombrePonencia"  name="NombrePonencia" >
                    </div>

                    <div class="form-group">
                      <label for="fechaPonencia" class="col-form-label">Fecha:</label>
                      <input type="date" class="form-control form-control-sm" id="fechaPonencia"  name="fechaPonencia" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                    </div>
                    <div class="form-group">
                      <label for="horaPonencia"  class="col-form-label">Hora:</label>
                      <input name="horaPonencia"  type="time" id="horaPonencia" class="form-control "  max="20:00:00">
                     </div>
            

                    <div class="form-group">
                      <label for="espaciosPonencia" class="col-form-label">Espacios Disponibles:</label>
                      <input type="number" class="form-control form-control-sm" id="espaciosPonencia" name="espaciosPonencia" max=999>
                    </div>

                    <div class="form-group">
                      <label for="nombrePonente" class="col-form-label">Categoría:</label>
                      <input type="text" class="form-control form-control-sm" id="categoriaPonencia" name="categoriaPonencia" >
                    </div>

                    <div class="form-group">
                    <label for="modalidadPonencia" class="col-form-label">Modalidad:</label>
                    <i class="fa fa-info-circle" aria-hidden="true" title="En caso de ser de ser costo se tendrá que poner un numero de cuenta"></i>
                      <select class="form-control form-control-sm" name="modalidadPonencia" id="modalidadPonencia" onchange="mostrarNumeroDeCuenta()">
                      <option value="Gratuito" selected>Gratuito</option>
                      <option value="Costo">Costo </option>
                      </select>
                    </div>

                    <div id="numeroDeCuenta" class="form-group" style="display: none;">
                      <label for="InformacionPuestoAct" class="col-form-label">Numero de cuenta:</label>
                      <input type="number" class="form-control form-control-sm" id="numeroPonencia" name="numeroPonencia" >
                    </div>

                    <div id="costoPonencia" class="form-group" style="display: none;">
                      <label for="InformacionPuestoAct" class="col-form-label">Costo de ponencia</label>
                      <input type="number" class="form-control form-control-sm" id="costoDePonencia" name="costoDePonencia" >
                    </div>
                    
                    <div class="form-group">
                      <label for="nombrePonente" class="col-form-label">Nombre completo ponente:</label>
                      <input type="text" class="form-control form-control-sm" id="nombrePonente" name="nombrePonente" >
                    </div>
                    <div class="form-group">
                      <label for="nombrePonente" class="col-form-label">Grado academico:</label>                      
                      <select class="form-control form-control-sm" name="gradoAcademicoPonente" id="gradoAcademicoPonente">
                      <option value="Licenciatura" selected>Licenciatura</option>
                      <option value="Maestría">Maestría</option>
                      <option value="Doctorado">Doctorado </option>
                      </select>
                    </div>

                    <div  class="form-group">
                      <label for="image" class="col-form-label">Foto</label>
                      <i class="fa fa-info-circle" aria-hidden="true" title="Se puede dejar vacío"></i>
                      <input type="file" class="form-control form-control-sm" id="image" name="image" multiple />
                    </div>
                    
                    <div  class="form-group">
                      <label for="imageFirma" class="col-form-label">Firma digital</label>
                      <input type="file" class="form-control form-control-sm" id="imageFirma" name="imageFirma" multiple />
                    </div>
                    <div class="modal-footer">
            
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                      <button type="submit" class="btn btn-success" onclick="validacionRegistroPonencia()" >Registrar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                    
                    </div>

                    <?php
                          $ctrPonencia -> ctrRegistrarPonencia();
                    ?>
                  </form>
                </div>
            </div>

          </div>
        </div>
        </div>
      
        <div  class="modal fade" id="actualizarInformacionPonencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <form method="post"  id="formularioActualizarPonencia">
                  <div class="form-group">
                      <input type="text"  class="form-control form-control-sm" id="idPonencia" name="idPonencia" readonly>
                  </div>
                  <div class="form-group" >
                        <label for="idCoordinadorActualizar">Selecciona al Coordinador:</label>
                        <select class="form-control" id="idCoordinadorActualizar" name="idCoordinadorActualizar" required>
                        
                        <?php foreach ($coordinadores as $coordinador) {
                        echo "<option value='".$coordinador["id"]."'> Usuario: ".$coordinador["usuario"]."</option>";
                        }
                        ?>
                        </select>
                
                    </div>
                    <div class="form-group">
                      <label for="NombrePonenciaActualizar" class="col-form-label">Nombre de la ponencia:</label>
                      <input type="text" class="form-control form-control-sm" id="NombrePonenciaActualizar" name="NombrePonenciaActualizar" >
                    </div>

                    <div class="form-group">
                      <label for="fechaPonenciaActualizar" class="col-form-label">Fecha:</label>
                      <input type="date" class="form-control form-control-sm" id="fechaPonenciaActualizar"  name="fechaPonenciaActualizar" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                    </div>
                    <div class="form-group">
                      <label for="horaPonenciaActualizar"  class="col-form-label">Hora:</label>
                      <input name="horaPonenciaActualizar"  type="time" id="horaPonenciaActualizar" class="form-control " min="07:00:00" max="20:00:00">
                     </div>
            

                    <div class="form-group">
                      <label for="espaciosPonenciaActualizar" class="col-form-label">Espacios Disponibles:</label>
                      <input type="number" class="form-control form-control-sm" id="espaciosPonenciaActualizar" name="espaciosPonenciaActualizar" max=999>
                    </div>

                    <div class="form-group">
                      <label for="categoriaPonenciaActualizar" class="col-form-label">Categoría:</label>
                      <input type="text" class="form-control form-control-sm" id="categoriaPonenciaActualizar" name="categoriaPonenciaActualizar" >
                    </div>

                    <div class="form-group">
                    <label for="modalidadPonenciaActualizar" class="col-form-label">Modalidad:</label>
                    <i class="fa fa-info-circle" aria-hidden="true" title="En caso de ser de ser costo se tendrá que poner un numero de cuenta"></i>
                      <select class="form-control form-control-sm" name="modalidadPonenciaActualizar" id="modalidadPonenciaActualizar" onchange="mostrarNumeroDeCuentaActualizar()">
                      <option value="Gratuito" selected>Gratuito</option>
                      <option value="Costo">Costo </option>
                      </select>
                    </div>

                    <div id="numeroPonenciaActualizar" class="form-group" >
                      <label for="numeroPonenciaActualizar" class="col-form-label">Numero de cuenta:</label>
                      <input type="number" class="form-control form-control-sm" id="numeroPonenciaAct" name="numeroPonenciaAct" >
                    </div>

                    <div id="costoPonenciaActualizar" class="form-group" >
                      <label for="numeroPonenciaActualizar" class="col-form-label">Costo:</label>
                      <input type="number" class="form-control form-control-sm" id="costoPonenciaAct" name="costoPonenciaAct" >
                    </div>

                    <div class="modal-footer">
            
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                      <button type="submit" class="btn btn-success">Actualizar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                    
                    </div>

                    <?php
                          $ctrPonencia -> ctrActualizarPonencia();
                    ?>
                  </form>
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
        document.getElementById("formularioRegistroPonencia").addEventListener('submit', validacionRegistroPonencia); 
        document.getElementById("formularioActualizarPonencia").addEventListener('submit', validacionActualizacionPonencia); 
      });</script>