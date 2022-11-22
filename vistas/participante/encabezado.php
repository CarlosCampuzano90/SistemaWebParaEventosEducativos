<header>

	<?php
          $participante = $_SESSION["participante"];
    ?> 


		<nav class="navbar navbar-dark bg-primary" >

			<a class="navbar-brand" href="promocion">
				<img src="vistas/img/icono.png" height="40" alt="UPEMOR" >
			</a>
			<span class="text-white text-center mx-auto">Sistema Web Para Eventos Educativos </span>
			
			<a href="#" class="menu-toggle" id="nav-expander"><i class="fa fa-bars"></i></a>
			<!-- Offsite navigation -->
		</nav>

		

	<nav class="menu">
		<a href="#" class="close"><i class="fa fa-close"></i></a>
		<ul class="navbar-nav">
		
			<img class="rounded" src="vistas/img/perfilUsuario.png " alt="">
			<p class="text-white text-center" style="    position: absolute; "> <?php echo $participante['usuario'];?> </p>

		
			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'inicio') ? "class='active'" : ""; ?> >
				<a class="nav-link" href="inicio"><i class="fa fa-home"></i><span>&nbsp;Inicio</span></a>
			</li>
			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'perfil') ? "class='active'" : ""; ?> >
				<a data-scroll class="nav-link" href="perfil"><i class="fa fa-address-book-o" aria-hidden="true"></i>&nbsp;Perfil personal</a>
			</li>
			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'inscripcionAPonencia') ? "class='active'" : ""; ?> >
				<a data-scroll class="nav-link" href="inscripcionAPonencia"><i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp;Inscripción a ponencias</a>
			</li>


			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'pagosPendientes') ? "class='active'" : ""; ?> >
				<a data-scroll class="nav-link" href="pagosPendientes"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></i>&nbsp;Pagos pendientes</a>
			</li>

			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'codigosQR') ? "class='active'" : ""; ?> >
				<a data-scroll class="nav-link" href="codigosQR"><i class="fa fa-qrcode" aria-hidden="true"></i>&nbsp;Generación de gafetes</a>
			</li>

			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'constancias') ? "class='active'" : ""; ?> >
				<a data-scroll class="nav-link" href="constancias"><i class="fa fa-file-text" aria-hidden="true"></i></i>&nbsp;Constancias</a>
			</li>

			<li>
				<a  class="nav-link" href="salir"><i class="fa fa-user"></i>&nbsp;Cerrar Sesión</a>
			</li>

		</ul>

		<div id="toasts"></div>
	</nav>
</header>
