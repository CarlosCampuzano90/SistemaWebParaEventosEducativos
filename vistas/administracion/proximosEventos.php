
<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
  Gestión de Próximos Eventos y Eventos Concluidos
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
    
    <li class="active">   Gestión de Próximos Eventos y Eventos Concluidos</li>
  
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
    <div class="box-body" id="contenidoEventos">
      <?php
        $proximosEventosCtr = new ControladorProximosEventos();
        $eventos=$proximosEventosCtr->ctrConsultarInformacion();

        $eventosConcluidos = new ControladorEventosConcluidos();

        $coordinadorCtr = new ControladorCoordinadores();
        $coordinadores=$coordinadorCtr->ctrRellenarTablaCoordinador();
        date_default_timezone_set('America/Mexico_City');
        $horaActual = date('H:i', time()); 
            if(!empty($eventos)){
              ?>
              <div class="tablaResposive" >
              <table class="table table-bordered">
                <thead class="tituloTabla">
                  <tr>
                    <th>Id</th>
                    <th>Id_Coordinador</th>
                    <th>Titulo de evento</th>
                    <th>Tipo de evento</th>
                    <th>Información completa</th>
                    <th>Evento Concluido</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($eventos as $evento) { ?>
                    <tr>
                      <td><?php echo $evento["id"] ?></td>
                      <td><?php echo $evento["usuarios_id"] ?></td>
                      <td><?php echo $evento["tituloEvento"] ?></td>
                      <td><?php if($evento["tipoDeEvento"]=="Gratuito") echo "Gratuito"; else echo "Costo";?></td>
                      
                  
                      <td>
                        <form method="post" action="evento">
                          <input type="hidden" value="<?php echo $evento["id"] ?>" name="InformacionIdAct">
                          <button type="submit" class="btn btn-success"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                        </form>
                      </td>

                      <td>
                        <?php $eventoConcluido=$eventosConcluidos->ctrExisteEventoConcluido($evento["id"])?>
                        <?php if(!empty($eventoConcluido)){?>
                          <form method="post" action="eventoConcluido">
                            <input type="hidden" value="<?php echo $evento["id"] ?>" name="idEventoConcluido" >
                            <button type="submit" class="btn btn-success"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                          </form>
                        <?php }else{?>
                          <button class="btn btn-success text-white" data-toggle="modal" data-target="#registrarEventoConcluido" onclick="llenarIdEventoConcluido(<?php echo $evento['id'] ?>)"> 
                          <i class="fa fa-upload fa-lg" aria-hidden="true"></i>
                          </button>
                        <?php }?>
                      </td>
                      <td>
                      <form method="post">
                        <input type="hidden" value="<?php echo $evento["id"] ?>" name="idInformacionEliminar">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Deseas continuar?');"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button>
                        <?php $proximosEventosCtr->ctrELiminarInformacion();?>
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
                <p class="text-dark">Pero no te preocupes, registra un próximo evento para mostrarlo en la pagina principal :)</p>
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
    <div class="box-footer">
        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#registrarProximoEventos" >Registrar próximo eventos <i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
        <div class="modal fade" id="registrarProximoEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header tituloTabla">
                <img src="vistas/img/icono.png" class="img-fluid" style="max-width: 7%;" >
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form method="post" id="formularioRegistroEventos" enctype="multipart/form-data">
                <div class="form-group">
                <label for="usuarios_id">Selecciona al Coordinador:</label>
                        <select class="form-control"  id="InformacionUsuarios_id" name="InformacionUsuarios_id" required>
                        
                        <?php foreach ($coordinadores as $coordinador) {
                        echo "<option value='".$coordinador["id"]."'> Usuario: ".$coordinador["usuario"]."</option>";
                        }
                        ?>
                        </select>
                </div>
                <div  class="form-group">
                      <label for="image" class="col-form-label">Foto</label>
                      <i class="fa fa-info-circle" aria-hidden="true" title="Se puede dejar vacío"></i>
                      <input type="file" class="form-control form-control-sm" id="image" name="image" multiple />
                    </div>
                    
                <div class="form-group">
                    <label for="tituloEvento" class="col-form-label">Titulo de Evento:</label>
                    <input type="text" class="form-control form-control-sm" id="InformacionTituloEvento" name="InformacionTituloEvento" >
                </div>

                <div class="form-group">
                  <label for="fechaProxima" class="col-form-label">Fecha proxima:</label>
                  <input type="date" class="form-control form-control-sm" id="InformacionFechaProxima"  name="InformacionFechaProxima" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-form-label">Descripcion:</label>
                    <input type="text" class="form-control form-control-sm" id="InformacionDescripcion" name="InformacionDescripcion" >
                </div>
                <div class="form-group">
                      <label for="nombrePonente" class="col-form-label">Nombre completo ponente:</label>
                      <input type="text" class="form-control form-control-sm" id="InformacionNombrePonente" name="InformacionNombrePonente" >
                </div>
                <div class="form-group">
                      <label for="cupo" class="col-form-label">Cupo:</label>
                      <input type="number" class="form-control form-control-sm" id="InformacionCupo" name="InformacionCupo" max=999>
                </div>
                <div class="form-group">
                    <label for="tipoDeEvento" class="col-form-label">Tipo de evento:</label>
                    <i class="fa fa-info-circle" aria-hidden="true" title="En caso de ser de ser costo se tendrá que poner un numero de cuenta"></i>
                      <select class="form-control form-control-sm" name="InformacionTipoDeEvento" id="InformacionTipoDeEvento">
                      <option value="Gratuito" selected>Gratuito</option>
                      <option value="Costo">Costo </option>
                      </select>
                    </div>
                <div class="modal-footer">
        
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                    <button type="submit" class="btn btn-success"  >Registrar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                
                </div>

                <?php
              
                $proximosEventosCtr -> ctrRegistrarEventosInfo();
                ?>
                </form>
            </div>
            </div>
            </div>
        </div>

        <div class="modal fade" id="registrarEventoConcluido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header tituloTabla">
                <img src="vistas/img/icono.png" class="img-fluid" style="max-width: 7%;" >
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form method="post" id="formularioRegistroEventoConcluido" enctype="multipart/form-data">
                <div class="form-group">
                          <label for="idProximoEventoConcluido" class="col-form-label">ID del proximo evento:</label>
                          <input type="text" class="form-control form-control-sm" id="idProximoEventoConcluido" name="idProximoEventoConcluido" readonly>
                </div>

                <div  class="form-group">
                      <label for="image" class="col-form-label">Imagen del evento concluido</label>
                      <input type="file" class="form-control form-control-sm" id="image" name="image" multiple />
                    </div>
                    
                <div class="form-group">
                    <label for="descripcionEventoConcluido" class="col-form-label">Descripción:</label>
                    <input type="text" class="form-control form-control-sm" id="descripcionEventoConcluido" name="descripcionEventoConcluido" >
                </div>

               
                <div class="modal-footer">
        
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                    <button type="submit" class="btn btn-success"  >Registrar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                
                </div>

                <?php
              
                  $eventosConcluidos  -> ctrRegistrarEventoConcluido();
                ?>
                </form>
            </div>
            </div>
            </div>
        </div>
        </div>
  <!-- /.box -->

     
  </div>
                          

</section>
<!-- /.content -->


</div>
