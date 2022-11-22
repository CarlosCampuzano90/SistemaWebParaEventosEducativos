

<link rel="stylesheet" type="text/css" href="vistas/dist/css/fullcalendar.min.css">

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
   Inscripción del participante a ponencia
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li> <a href="active">Inscripción del participante a ponencia</a></li>
      
    
    </ol>

  </section>



  <!-- Main content -->
  <section class="content">

    

    <!-- Default box -->
    <div class="box" id="hola">
      <div class="box-header with-border">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" 
                  title="Ocultar Coordinadores">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
    <div class="box-body" >
      

          <div class="container" id="calendario">
          <script type="text/javascript" src="vistas/js/moment.min.js"></script>	
          <script type="text/javascript" src="vistas/js/fullcalendar.min.js"></script>
          <script src='vistas/locales/es.js'></script>
          <div id="calendar"></div>
          <script type="text/javascript">
                $(document).ready(function() {
                    $("#calendar").fullCalendar({
                        header: {
                        left: "prev,next today",
                        center: "title",
                        right: "month,agendaWeek,agendaDay",
                        themeSystem: 'bootstrap',
                   
                        },
                        locale: 'es',
                        defaultView: "month",
                        navLinks: true, 
                        eventLimit: true, 
                        selectable: true,
                        contentHeight: 600,
                        selectHelper: false,
                        events: [
                        <?php 
                            $ctrPonencia= new ControladorPonencias();
                            $ponencias=$ctrPonencia->ctrMostrarPonenciasCalendario();
                            foreach ($ponencias as $ponencia) { ?>  
                            {
                            _id: '<?php echo $ponencia['idponencia']; ?>',
                            title: '<?php echo $ponencia['nombre']; ?>',
                            start: '<?php echo $ponencia['fecha']."T".$ponencia["hora"]; ?>',
                            color: "#"+Math.floor(Math.random()*16777215).toString(16)
                            },
                            <?php } ?>
                        ],

                    //Modificar Evento del Calendario 
                    eventClick:function(event){
                        var idEvento = event._id;
                        $('input[name=idPonenciaARegistrar').val(idEvento);
                        $('input[name=evento').val(event.title);

          

                        $("#modalInscripcion").modal();
                    },


                    });




                });

            </script>
          </div>
    </div>
      <!-- /.box-footer-->
    <!-- /.box -->
    <div class="box-footer">
      <div class="modal" id="modalInscripcion"  tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Inscribirse al evento </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form  method="post"  >
              <input type="text" class="form-control" name="idPonenciaARegistrar" id="idPonenciaARegistrar" hidden>
              <div class="form-group">
                <label for="evento" class="col-sm-12 control-label">Nombre del Evento</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="evento" id="evento" placeholder="Nombre del Evento" readonly/>
                </div>
              </div>

              <div class="form-group">
                <label for="fecha_inicio" class="col-sm-12 control-label">Participante a registrar</label>
                <div class="col-sm-12">
                  <?php $participanteCtr = new ControladorParticipantes();
                  $participantes=$participanteCtr->ctrRellenarTablaParticipante();?>
                  <select class="form-control"  id="idParticipanteARegistrar" name="idParticipanteARegistrar" required>
                            
                            <?php foreach ($participantes as $participante) {
                            echo "<option value='".$participante["id"]."'> Usuario: ".$participante["usuario"]."</option>";
                            }
                            ?>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Registrarse <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i></button>
                </div>
                <?php      $ctrPonencia= new ControladorPonencias();
                          $ctrPonencia->ctrRegistrarParticipantePonencia();?>
                
            </form>
            
          </div>
        </div>
      </div>
    </div>
							

  </section>
  <!-- /.content -->


</div>
  <!-- /.content 
<script>  document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("actualizarInformacion").addEventListener('submit', validacionActualizacionInformacion); 
      });</script>-->