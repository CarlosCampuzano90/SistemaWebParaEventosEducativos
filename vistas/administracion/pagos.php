<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Gestión de constancias y Pagos de los participantes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li> <a href="constancias">Gestión de constancias y Pagos de los participantes</a></li>
      
      <li class="active">Pagos pendientes</li>
    
    </ol>

  </section>



  <!-- Main content -->
  <section class="content">

    

    <!-- Default box -->
    <div class="box" id="hola">
      <div class="box-header with-border">
        <h3 class="box-title">Pagos</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" 
                  title="Ocultar Coordinadores">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body" >

       <div class="container" id="tablaPonencias">
        
          <?php $ctrPonencia= new ControladorPonencias();
                $idPonencia= $_POST["idPagosPendientes"];
                $ctrUsuarioInformacion= new ControladorUsuarioInformacion();
                $ponenciasNoPagadas=$ctrPonencia->ctrConsultarUsuariosSinPagar($idPonencia);

                if(!empty($ponenciasNoPagadas)){
                ?>
                <?php foreach ($ponenciasNoPagadas as $ponenciaNoPagada) { 
                  $participante = $ctrUsuarioInformacion->ctrConsultarInformacion($ponenciaNoPagada["usuarios_id"]);
                    if(!empty($participante)) { ?>			
                      <div class="d-flex flex-row border mx-auto col-md-8 rounded border-danger" >

                          <div class="p-0 tituloTabla">
                            <img src="vistas/img/icono.png" class="img-fluid" style="width:60px;" >	
                          </div>
                          <div class="pl-3 pt-2 pr-2 pb-2 w-100 border-left">
                              <h4 class="text-black"> Nombre del participante:  <strong><?php echo $participante["nombre"]." ". $participante["nombre"] ?></strong> </h4>
                              <h5 class="text-black">	  Matrícula: <strong><?php echo $participante["matricula"]?></strong><br> 											
                                            Grado y Grupo: <strong ><?php echo $participante["gradoYgrupo"]?></strong><br>
                              </h5>
                              <ul class="m-0 float-left text-black" style="list-style: none; margin:0; padding: 0">
                                <li>Ponencia sin pagar  </li>
                              </ul>
                              <p class="text-right m-0 "><button type="button" data-toggle="modal" data-target="#registrarPagoParticipante" class="btn btn-success" onclick="llenarValoresPagoParticipante(<?php echo $ponenciaNoPagada['ponencia_idponencia']?>,<?php echo $ponenciaNoPagada['usuarios_id']?>)"><i class="fa fa-plus" aria-hidden="true"></i> Registrar pago</button></p>


                          </div>
                        </div>
                      <?php } ?>

                      <hr>
            <?php }}else{
                    ?>
              <br>
                      <div class="border border-warning alert alert-dismissible fade show col-md-12 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
                      <i class="fa fa-exclamation-triangle fa-lg"></i>
                      <h4 class="alert-heading text-dark text-center" > <kbd>No hay pagos pendientes</kbd></h4>
                      <p class="text-dark">Los pagos pendientes aparecerán aquí :)</p>
                      <hr>

                  
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>

                    <?php
                    
                  } ?>
       </div>



      </div>
      <!-- /.box-footer-->
    <!-- /.box -->
    <div class="box-footer">
        <a href="codigosQR"> <button class="btn btn-success" ><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar</button></a>
    </div>
							

  </section>
  <!-- /.content -->
  <div class="modal fade" id="registrarPagoParticipante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header tituloTabla">
                <img src="vistas/img/icono.png" class="img-fluid" style="max-width: 7%;" >
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <form method="post" >
                  <div class="form-group">
                    <label for="usuario" class="col-form-label">Usuario participante:</label>
                    <input type="text" class="form-control form-control-sm" id="idParticipanteRegistrarPago" name="idParticipanteRegistrarPago" readonly>
                    <input type="text" class="form-control form-control-sm" value="<?php echo $idPonencia?>" id="idPagosPendientes" name="idPagosPendientes" hidden>
                  </div>

                  <div class="form-group">
                    <label for="correoRP" class="col-form-label">Usuario ponencia:</label>
                    <input type="text" class="form-control form-control-sm" id="idPonenciaRegistrarPago" name="idPonenciaRegistrarPago" readonly>
                  </div>
                


                  <div class="modal-footer">
          
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Registrar pago</button>
                  
                  </div>

                  <?php $ctrPonencia->ctrRegistrarPago()?>
              </form>
            </div>

          </div>
        </div>
        
       
     </div>

</div>

<script>
  function llenarValoresPagoParticipante(id,usuario) {
    var inputUsuario = document.getElementById("idParticipanteRegistrarPago");
    inputUsuario.value = usuario;

    var inputPonencia= document.getElementById("idPonenciaRegistrarPago");
    inputPonencia.value = id;

}
</script>