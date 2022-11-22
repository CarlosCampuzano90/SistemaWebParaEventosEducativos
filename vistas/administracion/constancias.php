<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
  Gestión de constancias
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
    
    <li class="active"> Gestión de constancias</li>
  
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
    <div class="box-body" id="contenidoConstancias">
      <?php
        $ctrConstancias = new ControladorConstancias();
        $constancias=$ctrConstancias->ctrMostrarConstancias();
        $ponencias=$ctrConstancias->ctrMostrarInformacionPonencia();
        
            if(!empty($constancias)){
              ?>
              <div class="tablaResposive" >
              <table class="table table-bordered">
                <thead class="tituloTabla">
                  <tr>
                    <th>Id</th>
                    <th>Id ponencia</th>
                    <th>Titulo ponencia</th>
                    <th>Visualizar constancia</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($constancias as $constancia) { ?>
                    <tr>
                      <td><?php echo $constancia["id"] ?></td>
                      <td><?php echo $constancia["idPonencia"] ?></td>
                      <td><?php echo $constancia["nombre"] ?></td>
                    
                      
                      <td>
                        <form method="post" action="constancia">
                          <input type="hidden" value="<?php echo $constancia["id"] ?>" name="idConstanciaVer">
                          <button type="submit" class="btn btn-success"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                        </form>
                      </td>


                      <td>
                      <form method="post">
                        <input type="hidden" value="<?php echo $constancia["id"] ?>" name="idConstanciaEliminar">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Deseas continuar?');"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button>
                        
                        <?php $ctrConstancias->ctrEliminarConstancia()?>
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
                <p class="text-dark">Pero no te preocupes, registra una constancia :)</p>
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
        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#registrarConstancia" >Registrar constancia <i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
        <div class="modal fade" id="registrarConstancia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header tituloTabla">
                <img src="vistas/img/icono.png" class="img-fluid" style="max-width: 7%;" >
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form method="post" id="formularioRegistroConstancias" enctype="multipart/form-data">
                <div class="form-group">
                    
                <label for="idPonencia">Selecciona la ponencia:</label>
                        <select class="form-control"  id="idPonencia" name="idPonencia" required>
                        <?php foreach ($ponencias as $ponencia) {
                        echo "<option value='".$ponencia["idponencia"]."'> Nombre ponencia: ".$ponencia["nombre"]."</option>";
                        }
                        ?>
                        </select>
                </div>
                <div  class="form-group">
                      <label for="imageFirma" class="col-form-label">Firma digital del coordinador</label>
                      <input type="file" class="form-control form-control-sm" id="imageFirma" name="imageFirma" multiple />
                    </div>
                    
                <div class="form-group">
                    <label for="textoAgradecimiento" class="col-form-label">Texto de agradecimiento:</label>
                    <input type="text" class="form-control form-control-sm" id="textoAgradecimiento" name="textoAgradecimiento" >
                </div>

               
                <div class="modal-footer">
        
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                    <button type="submit" class="btn btn-success"  >Registrar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                
                </div>

                <?php
              
                $ctrConstancias -> ctrRegistrarConstancia();
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
