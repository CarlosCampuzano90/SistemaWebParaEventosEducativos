
<section class="perfil">

  <div class="content-header perfilRuta">
    
    <h1>
      
    Constancia
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li> <a href="constancias">Constancias</a></li>
      
      <li class="active">Constancia</li>
    
    </ol>

  </div>



  <!-- Main content -->


    

    <!-- Default box -->
    <div class="box" id="hola">
      <div class="box-header with-border">
        <h3 class="box-title">Constancia</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" 
                  title="Ocultar Coordinadores">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body"  >
                <?php $ctrConstancia= new ControladorConstancias();
                $idConstancia= $_POST["idConstanciaVer"];
                $constancia=$ctrConstancia->ctrMostrarConstanciaUna($idConstancia);
                $participante = $_SESSION["participante"];
                $ctrInformacion = new ControladorUsuarioInformacion();
                $informacionParticipante = $ctrInformacion -> ctrConsultarInformacion($participante["id"]);
                if(!empty($constancia)){
                ?>
                <div class="card mx-auto text-center" id="imprimir" > 
                  <hr>
                  <div class="mx-auto align-items-center">

                    <img class="float-center bg-white" style="width: 100%; "
                    src="vistas/img/encabezadoConstancia.png" alt="Imagen de la constancia">
                    <br><br><br>
                    <p>Otorga la presente </p> 
                    <h3 >CONSTANCIA</h3>  
                    <p>a:</p>
                    <p> <u>  &emsp;&emsp;&emsp;  <?php echo $informacionParticipante["nombre"]." ".$informacionParticipante["apellido"]?>     &emsp;&emsp;&emsp;    </u> </p>
                    <div class="col-md-8 mx-auto">
                      <p>La universidad Politécnica del Estado de Morelos le agradece a usted por ser parte del evento, <?php echo $constancia["nombre"] ?>, el cual se realizo el
                      <?php echo $ctrConstancia->fechaCastellano($constancia["fechaEvento"]) ?>. </p>
                      <p><?php echo $constancia["textoAgradecimiento"] ?></p>
                      <br><br><br>
                    </div>
                    <div class="float-left bg-white col-md-3 col-6">
                      <img  style="width: 120px; height:70px; border-bottom: 5px solid #000000;"
                      src="data:image/jpeg;base64,<?php echo $constancia["firmaDigitalCoordinador"]?>" alt="Firma coordinador">
                      <p>Firma del coordinador</p>
                    </div>
                    <div class="float-right bg-white col-md-3 col-6">
                      <img  style="width: 120px; height:70px; border-bottom: 5px solid #000000;"
                      src="data:image/jpeg;base64,<?php echo $constancia["firmaDigitalPonente"]?>" alt="Firma ponente">
                      <p>Firma del ponente</p>
                    </div>
                    
                </div>
                <div class="card-footer font-weight-bold bg-white row align-items-center" >
                    <div class="col-md-5 text-white " style="background-color: #FBB034; padding:10px;">&emsp;  </div>
                    <div class="tituloProximosEventos col-md-7 text-white" style="padding:10px;">"Ciencia y Tecnología para el Bien Común"</div>

                  </div>
                </div>
  

                <?php }else{ ?>
                  <br><br><br>
                  <div class="border border-warning alert alert-dismissible fade show col-md-6 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
                    <i class="fa fa-exclamation-triangle fa-lg"></i>
                    <h4 class="alert-heading text-dark text-center" > <kbd>Upps!</kbd></h4>
                    <p class="text-dark">Todavía no se diseña la constancia para esta ponencia, pronto estará lista :)</p>
                    <hr>

                
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <br><br><br><br><br>
                <?php } ?>
                        
                <div id="bypassme"></div>
      </div>
      <div class="box-footer">
        <a href="constancias"> <button class="btn btn-success" href="constancias"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar</button></a>
        <button type="button" onclick="printHTML()" class="btn btn-success float-right" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Descargar</button>
      </div>

      
  <!-- /.content -->

  <script src="vistas/js/html2pdf.bundle.min.js"></script>
  <script>

      async function printHTML() {
        var element = document.getElementById('imprimir');
        var opt = {
          margin:       0,
          filename:     'constancia',
          image:        { type: 'jpeg', quality: 1 },
          html2canvas:  { scale: 2 },
          jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
        };

        // New Promise-based usage:
        html2pdf().set(opt).from(element).save();


      }
</script>