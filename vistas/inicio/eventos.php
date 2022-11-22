<!-- Services section start -->
<section id="services" class="eventos">
	<div class="contenedorEventos">
		<!--Carousel Wrapper-->
		<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
		<br>
		<!--Slides-->
		<div class="carousel-inner" role="listbox">
			<!--First slide-->
			<?php 
			$proximosEventosCtr = new ControladorProximosEventos();
        	$eventos=$proximosEventosCtr->ctrConsultarInformacion();
			$i=0;
			if(!empty($eventos)){ ?>
			<?php foreach ($eventos as $evento) { 
				 ?>
			<div class="carousel-item <?php echo ($i==0) ? "active" : ""; ?> ">

				<div class="card mx-auto text-center ">
					<hr>
					<div class="card-header font-weight-bold text-white tituloProximosEventos" >
					 <h3>  <?php echo $evento["tituloEvento"] ?> </h3>
						
				
					</div>
					<hr>
					<div class="card-body d-flex align-items-center mx-auto col-md-6 cuerpoProximosEventos">

						<img class="float-center   bg-white col-md-3" style="width: 180px; border-radius: 0px 40px 0px 40px; border: 5px solid #FFF; "
						src="data:image/jpeg;base64,<?php echo $evento["foto"]?>" alt="Imagen del evento">
						<p class="card-text font-weight-bold text-justify float-left col-md-9">Con un cupo de <?php echo $evento["cupo"]." personas.<br> ".$evento["descripcion"]?> </p>
					
					</div>
					<br>
					<div class="fechaProximosEventos d-flex align-items-center mx-auto col-md-3"> <?php echo fechaCastellano($evento["fechaProxima"]) ?> <i class="fa fa-calendar fa-5x " aria-hidden="true"></i></div>
					<br>
					<div class="card-footer font-weight-bold bg-white row align-items-center" >
						<div class="col-md-5 text-white " style="background-color: #FBB034; padding:10px;">Siguenos en: <i class="fa fa-facebook-official fa-lg" aria-hidden="true"></i> <i class="fa fa-twitter fa-lg" aria-hidden="true"></i> <i class="fa fa-instagram fa-lg" aria-hidden="true"></i></div>
						<div class="tituloProximosEventos col-md-7 text-white" style="padding:10px;">Ponente, <?php echo $evento["nombrePonente"] ?></div>

					</div>
				</div>

			</div>
			<?php $i++; }
            
			}else{
				?>
						<br><br><br><br><br><br>
				<div class="border border-warning alert alert-dismissible fade show col-md-5 mx-auto rounded" style="background-color: rgba(255, 193, 0,0.5); border-width:5px !important;" role="alert">
				<i class="fa fa-exclamation-triangle fa-lg"></i>
				<h4 class="alert-heading text-dark text-center" > <kbd>Sin proximos eventos!</kbd></h4>
				<p class="text-dark">Pero no te preocupes, pronto habra nuevos eventos :)</p>
				<hr>
				<p class="mb-0 text-dark text-right"><i class="fa fa-hand-o-right fa-lg"></i></p>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<br><br><br><br><br><br>
			<?php
			
			
			}
			
			function fechaCastellano ($fecha) {
				$fecha = substr($fecha, 0, 10);
				$numeroDia = date('d', strtotime($fecha));
				$dia = date('l', strtotime($fecha));
				$mes = date('F', strtotime($fecha));
				$anio = date('Y', strtotime($fecha));
				$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
				$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
				$nombredia = str_replace($dias_EN, $dias_ES, $dia);
			  	$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
				$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
				$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
				return $nombredia." ".$numeroDia." de ".$nombreMes." del ".$anio;
			  }?>
		

		</div>
		<!--/.Slides-->

		<a class="carousel-control-prev" href="#multi-item-example" role="button" data-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#multi-item-example" role="button" data-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>

		</div>
		<!--/.Carousel Wrapper-->
	</div>		
	<br>
				
		
		<footer class="piePagina">
				<div class="col-md-10">
					<address>
						<strong>Dirección:</strong> Boulevard Cuauhnáhuac #566, Col. Lomas del Texcal, Jiutepec, Morelos. CP 62550&nbsp;&nbsp;&nbsp;&nbsp;
						<strong>Tel:</strong> (777) 229-3517 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<strong>Email:</strong> informes@upemor.edu.mx &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</address>
				</div>
				</footer>

	</section>

