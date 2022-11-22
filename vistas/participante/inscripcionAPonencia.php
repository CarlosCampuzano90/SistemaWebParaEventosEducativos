
	<?php
          $participante = $_SESSION["participante"];
          $ctrPonencia= new ControladorPonencias();
          $ponencias=$ctrPonencia->ctrMostrarPonenciasCalendario();
    ?> 


<link rel="stylesheet" type="text/css" href="vistas/dist/css/fullcalendar.min.css">

<section class="perfil">
  

  <!-- Main content -->
  <div class="content">

    <div class="content-header perfilRuta">
      
      <h1>
        
    Inscripción del participante a ponencia
      
      </h1>

      <ol class="breadcrumb">
        
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li> <a href="active">Inscripción del participante a ponencia</a></li>
        
      
      </ol>

    </div>

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
                            foreach ($ponencias as $ponencia) { ?>  
                            {
                            _id: '<?php echo $ponencia['idponencia']; ?>',
                            title: '<?php echo $ponencia['nombre']; ?>',
                            start: '<?php echo $ponencia['fecha']."T".$ponencia["hora"]; ?>',
                            color: "#"+Math.floor(Math.random()*16777215).toString(16),
                            extendedProps: {
                              modalidad: '<?php echo $ponencia['modalidad']; ?>',
                              numeroCuenta: '<?php echo $ponencia['numeroCuenta']; ?>',
                              categoria: '<?php echo $ponencia['categoria']; ?>',
                              costo: '<?php echo $ponencia['costo']; ?>'
                            },
                            },
                            <?php } ?>
                        ],

                    //Modificar Evento del Calendario 
                    eventClick:function(event){
                        var idEvento = event._id;
                        $('input[name=idPonenciaARegistrar').val(idEvento);

                        $("#nombreEventoParticipante").empty();
                        $("#modalidadEventoParticipante").empty();
                        $("#costoEventoParticipante").empty();
                        $("#numeroEventoParticipante").empty();
                        $("#categoriaEventoParticipante").empty();
                        
                        $("#categoriaEventoParticipante").append("Categoría: <kbd>"+event.extendedProps.categoria+"</kbd>");
                        $("#nombreEventoParticipante").append("Nombre del evento: <kbd>"+event.title+"</kbd>");
                        $("#modalidadEventoParticipante").append("Modalidad: <kbd>"+event.extendedProps.modalidad+"</kbd>");
                        $("#costoEventoParticipante").append("Costo del evento: <kbd>"+event.extendedProps.costo+"$</kbd>");
                        $("#numeroEventoParticipante").append("Número de cuenta: <kbd>"+event.extendedProps.numeroCuenta+"</kbd>");
                        
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
              <input class="form-control"  id="idParticipanteARegistrar" name="idParticipanteARegistrar" value="<?php echo $participante["id"]?>" hidden>
              <div class="form-group">
                <label for="evento" id="nombreEventoParticipante" class="col-sm-12 control-label"><kbd></kbd></label>
                <label for="" class="col-sm-12 control-label" id="categoriaEventoParticipante"> </label>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-12 control-label" id="modalidadEventoParticipante"> </label>
                <label for="" class="col-sm-12 control-label" id="costoEventoParticipante"></label>
                <label for="" class="col-sm-12 control-label" id="numeroEventoParticipante"></label>
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
							

  </div>
  <!-- /.content -->


</section>
  <!-- /.content 
<script>  document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("actualizarInformacion").addEventListener('submit', validacionActualizacionInformacion); 
      });</script>-->