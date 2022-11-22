
<section class="perfil" >
	<div class="content-header perfilRuta"> 
		<h3><strong>Mis ponencias:</strong> </h3>
		<hr>
		

		<ol class="breadcrumb">
		
		<li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Estoy inscrito</li>
		</ol>
	</div>
	<div class="container rounded" >
		<div class="row mb-12">
		<div class="col-md-6 ">
				<h4 class="text-center"><strong>Ponencias pagadas</strong> </h4>
					<?php
					$participante = $_SESSION["participante"];
					$ctrPonencia= new ControladorPonencias();
					$ponenciasPagadas=$ctrPonencia->ctrConsultarPonenciasPagadas($participante["id"]);

						if(!empty($ponenciasPagadas)){
							?>
							<?php foreach ($ponenciasPagadas as $ponenciaPagada) { ?>
								<?php $ponencia = $ctrPonencia->ctrConsultarInformacion($ponenciaPagada["ponencia_idponencia"])?>			
								<div class="d-flex flex-row border border-primary rounded" >
									<div class="p-0 tituloTabla">
										<img src="vistas/img/icono.png" class="img-fluid" style="width:60px;" >	
									</div>
									<div class="pl-3 pt-2 pr-2 pb-2 w-100 border-left">
											<h4 class="text-black"> Nombre de la ponencia:  <strong><?php echo $ponencia["nombre"] ?></strong> </h4>
											<h5 class="text-black">	  Fecha: <strong><?php echo $ponencia["fecha"]."/".$ponencia["hora"]?></strong><br> 											
																		Categoría: <strong ><?php echo $ponencia["categoria"]?></strong><br>
																		Modalidad: <strong ><?php if($ponencia["modalidad"]=="Gratuito") echo "Gratuito"; else echo "Costo ".$ponencia["costo"];?> </strong><br>
																		Número de cuenta: <strong > <?php echo $ponencia["numeroCuenta"]?></strong>
											</h5>
											<ul class="m-0 float-left text-black" style="list-style: none; margin:0; padding: 0">
												<li>Documentos  </li>
											</ul>
											<p class="text-right m-0  "><a onclick="openModelPDF('ponencia<?php echo $ponencia['idponencia'].'.pdf'?>')" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i> Material de ponencia</a></p>
									</div>
								</div>
							<hr>

			
						<?php }} else{
                	?>
					<br>
                  <div class="border border-warning alert alert-dismissible fade show col-md-12 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
                  <i class="fa fa-exclamation-triangle fa-lg"></i>
                  <h4 class="alert-heading text-dark text-center" > <kbd>Sin registros!</kbd></h4>
                  <p class="text-dark">Pero no te preocupes, registrate en alguna ponencia diponible :)</p>
                  <hr>

              
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  </div>

                <?php
                
              } ?>
			</div>

			<div class="col-md-6">
				<h4 class="text-center"><strong>Ponencias por pagar</strong> </h4>
				<?php
					$ponenciasNoPagadas=$ctrPonencia->ctrConsultarPonenciasNoPagadas($participante["id"]);

						if(!empty($ponenciasNoPagadas)){
						?>
						<?php foreach ($ponenciasNoPagadas as $ponenciaNoPagada) { 
							$ponencia = $ctrPonencia->ctrConsultarInformacion($ponenciaNoPagada["ponencia_idponencia"])?>			
							<div class="d-flex flex-row border rounded border-danger" >

									<div class="p-0 tituloTabla">
										<img src="vistas/img/icono.png" class="img-fluid" style="width:60px;" >	
									</div>
									<div class="pl-3 pt-2 pr-2 pb-2 w-100 border-left">
											<h4 class="text-black"> Nombre de la ponencia:  <strong><?php echo $ponencia["nombre"] ?></strong> </h4>
											<h5 class="text-black">	  Fecha: <strong><?php echo $ponencia["fecha"]."/".$ponencia["hora"]?></strong><br> 											
																		Categoría: <strong ><?php echo $ponencia["categoria"]?></strong><br>
																		Modalidad: <strong ><?php if($ponencia["modalidad"]=="Gratuito") echo "Gratuito"; else echo "Costo ".$ponencia["costo"];?> </strong><br>
																		Número de cuenta: <strong > <?php echo $ponencia["numeroCuenta"]?></strong>
											</h5>
											<ul class="m-0 float-left text-black" style="list-style: none; margin:0; padding: 0">
												<li>Ponencia sin pagar  </li>
											</ul>
											<p class="text-right m-0 "><a href="pagosPendientes" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i> Pagos pendientes</a></p>
									</div>
								</div>
							<hr>
				<?php }}else{
                ?>
					<br>
                  <div class="border border-warning alert alert-dismissible fade show col-md-12 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
                  <i class="fa fa-exclamation-triangle fa-lg"></i>
                  <h4 class="alert-heading text-dark text-center" > <kbd>Sin registros!</kbd></h4>
                  <p class="text-dark">Pero no te preocupes, registrate en alguna ponencia diponible :)</p>
                  <hr>

              
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  </div>

                <?php
                
              } ?>
			</div>
			
		</div>

</div>
<div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ver archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
<hr> <br><br><br><br><br>
</section>
<script>                            
             function openModelPDF(url) {
                                $('#modalPdf').modal('show');
                                $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/estadia/documentos/'; ?>'+url);
                            }</script>