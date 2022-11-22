
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Solicitudes de usuarios nuevos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Solicitudes de usuarios nuevos</li>
    
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
      <div class="box-body" id="tablaParticipantes">
        <?php
          $participanteCtr = new ControladorParticipantes();
          $participantes=$participanteCtr->ctrMostrarParticipantesInactivos();
              if(!empty($participantes)){
                ?>
                <div class="tablaResposive" >
                <table class="table table-bordered">
                  <thead class="tituloTabla">
                    <tr>
                      <th>Id</th>
                      <th>Usuario</th>
                      <th>Correo</th>
                      <th>Fecha de solicitud</th>
                      <th>Activar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($participantes as $participante) { ?>
                      <tr>
                        <td><?php echo $participante["id"] ?></td>
                        <td><?php echo $participante["usuario"] ?></td>
                        <td><?php echo $participante["correo"] ?></td>
                        <td><?php echo $participante["fecha_creacion"] ?></td>
                        
                        <td>
                        <form method="post">
                          <input type="hidden" value="<?php echo $participante["id"] ?>" name="idActivarParticipante">
                          <button type="submit" class="btn btn-success" ><i class="fa fa-check-square-o fa-lg" aria-hidden="true"></i></button>
                          <?php $participanteCtr->ctrActivarParticipante()?>
                        </form>
                        </td>
                        <td>
                        <form method="post">
                          <input type="hidden" value="<?php echo $participante["id"] ?>" name="idParticipante">
                          <button type="submit" class="btn btn-danger" onclick="return confirm('¿Deseas continuar?');"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button>
                          <?php $participanteCtr->ctrELiminarParticipante()?>
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
                  <h4 class="alert-heading text-dark text-center" > <kbd>Sin solicitudes!</kbd></h4>
                  <hr>
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
  
       
    </div>
							

  </section>
  <!-- /.content -->


</div>
<!-- /.content-wrapper -->
