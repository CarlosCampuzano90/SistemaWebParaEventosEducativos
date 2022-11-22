<?php $ctrInformacion= new ControladorEventosConcluidos();
                $eventos=$ctrInformacion->ctrMostrarEventos();
                
                ?>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
		  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
		  <div class="carousel-item active">
			<img class="d-block w-100" src="vistas/img/1.png" alt="Sistema Integral" title="Sistema Integral">
		  </div>
		  <div class="carousel-item" id="imagenes">
			<img class="d-block w-100" src="vistas/img/2.png"  alt="Ponencia Inteligencia Artificial" title="Ponencia Inteligencia Artificial">
		  </div>
		  
		  <div class="carousel-item">
			<img class="d-block w-100" src="vistas/img/3.png" alt="Ponencia Tecnologías Web" title="Ponencia Tecnologías Web">
		  </div>
			<?php foreach($eventos as $evento){ ?>
			<div class="carousel-item">
			<img src=  "data:image/jpeg;base64,<?php echo $evento["imagen"]?>" class="d-block w-75 mx-auto" alt="...">
			<div class="descripcionEventoConcluido carousel-caption mx-auto font-weight-bold d-none d-md-block" >
				<h4><?php echo $evento["titulo"]?></h4>
				<p><?php echo $evento["descripcion"]?> <br> <?php echo $evento["fecha"]?></p>
			</div>
			</div>
		   <?php } ?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	  </div>
	</div>

	<section class="darker">
		<div class="container">
            <div class="registro row">
                <div class="col-md-4" >
                    <H2 class="text-white text-right"><i class="fa fa-hand-o-right fa-lg"></i><i class="fa fa-hand-o-right fa-lg"></i><i class="fa fa-hand-o-right fa-lg"></i></p>
                </div>
                <div class="col-md-8">
                    <a class="btn btn-lg text-white btn-block" style="background: #FBB034;" href="registrarse">¡Registarse!</a>
                </div>
            </div>
		</div>
		
	</section>
