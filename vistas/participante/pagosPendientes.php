
<section class="perfil">

  <div class="content-header">
    
    <h1>
      
   Pagos pendientes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Pagos pendientes</li>
    
    </ol>

</div>



  <!-- Main content -->
  <div class="content">

    

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
      <div class="box-body" id="tablaEncuestas">
      <?php
          $participante = $_SESSION["participante"];
          $ctrPonencia= new ControladorPonencias();
          $ctrParticipante = new ControladorUsuarioInformacion();
          $ponenciasNoPagadas=$ctrPonencia->ctrConsultarPonenciasNoPagadas($participante["id"]);
          $informacionParticipante=$ctrParticipante->ctrConsultarInformacion($participante["id"]);
              if(!empty($ponenciasNoPagadas)){
                ?>
                  <div class="row">
                    <?php foreach ($ponenciasNoPagadas as $ponenciaNoPagada) { ?>
              

                      <div class="col-6 col-md-6 text-justify">
                        <?php $ponencia = $ctrPonencia->ctrConsultarInformacion($ponenciaNoPagada["ponencia_idponencia"])?>
                        <p>
                          Nombre de la ponencia: <?php echo $ponencia["nombre"] ?> <br>
                          Fecha: <?php echo $ponencia["fecha"]."/".$ponencia["hora"]?><br>
                          Categoría: <?php echo $ponencia["categoria"]?><br>
                          Modalidad: <?php if($ponencia["modalidad"]=="Gratuito") echo "Gratuito"; else echo "Costo ".$ponencia["costo"];?> <br>
                          Número de cuenta: <?php echo $ponencia["numeroCuenta"]?>
                        </p>
                        <button class="btn btn-success" onclick="generarFichaPago('<?php echo $informacionParticipante['matricula'] ?>','<?php echo $informacionParticipante['nombre'].' '.$informacionParticipante['apellido'] ?>',' <?php echo $ponencia['nombre'] ?>',' <?php echo $ponencia['fecha'] ?>','<?php echo $ponencia['costo'] ?>','<?php echo $ponencia['numeroCuenta'] ?>')">Generar ficha de pago</button>
                      </div>
          
                    <?php } ?>
                  </div>
                  <hr><br><br><br><br><br>
              <?php
              }else{
                ?>
                  <br><br><br><br><br>
                  <div class="border border-warning alert alert-dismissible fade show col-md-5 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
                  <i class="fa fa-exclamation-triangle fa-lg"></i>
                  <h4 class="alert-heading text-dark text-center" > <kbd>Sin pagos pendientes!</kbd></h4>
                  <p class="text-dark">Aquí se mostraran los pagos pendientes :)</p>
                  <hr>

              
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <br><br><br><br><br>
                <?php
                
              }
              

      ?>
      </div>     
      <!-- /.box-footer-->
    <!-- /.box -->
      <div class="box-footer">
      
     </div>
							

    </div>
  <!-- /.content -->


</section>
<!-- /.content-wrapper -->
<script src="vistas/js/jspdf.min.js"></script>
<script>
function generarFichaPago(matricula, nombre, ponencia, fecha,importe,cuenta){
  var doc = new jsPDF();
  var logo = new Image();
  logo.src = 'vistas/img/fichaUpemor.jpg';
  doc.addImage(logo, 'JPEG', 10, 0,80,35);
  logo.src = 'vistas/img/logoBanamex.png';
  doc.addImage(logo, 'PNG', 100, 8,100,20);

  doc.setFontSize(20).setFont(undefined, 'bold');
  doc.text(68, 50, "Ficha de Pago Banamex")
  doc.setFontSize(10).setFont(undefined, 'normal');

  doc.text(15, 60, "Dirección: BOULEVARD CUAUHNÁHUAC #566, COL. LOMAS DEL TEXCAL, JIUTEPEC, MORELOS. CP 62550");
  doc.text(15, 68, "Teléfono: (777) 2290470");
  doc.text(15, 76, "RFC: UPE 040707 82A"); 
  doc.text(15, 84, "Convenio PA: 3929/01 UPEMOR"); 
  doc.text(15, 92, "Matrícula - Nombre:        "+matricula+" - "+nombre); 
  doc.text(15, 100, "Concepto: Pago de la ponencia "+ponencia); 
  doc.text(15, 108, "Fecha de vencimiento: "+fecha); 
  doc.text(15, 116, "Importe: $"+importe); 
  doc.text(15, 124, "Número de cuenta: "+cuenta); 
  doc.save('FichaDePago.pdf');
  }

</script>