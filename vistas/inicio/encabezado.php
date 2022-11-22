<header>

	<nav class="navbar navbar-light navbar-dark" >

			<a class="navbar-brand" href="promocion">
				<img src="vistas/img/icono.png" height="40" alt="UPEMOR" >
			</a>

			<a href="" class="menu-toggle" id="nav-expander"><i class="fa fa-bars"></i></a>
			<!-- Offsite navigation -->
		</nav>

	<nav class="menu">
		<a href="#" class="close"><i class="fa fa-close"></i></a>
		<ul class="navbar-nav">
		
				<img src="vistas/img/icono-grande.png"  alt="">
		
			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'promocion') ? "class='active'" : ""; ?> >
				<a class="nav-link" href="promocion"><i class="fa fa-home"></i><span>&nbsp;Inicio</span></a>
			</li>
			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'registrarse') ? "class='active'" : ""; ?> >
				<a data-scroll class="nav-link" href="registrarse"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Registrarse</a>
			</li>
			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'eventos') ? "class='active'" : ""; ?> >
				<a data-scroll class="nav-link" href="eventos"><i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp;Proximos Eventos</a>
			</li>
			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'iniciarSesion') ? "class='active'" : ""; ?> >
				<a  class="nav-link" href="iniciarSesion"><i class="fa fa-user"></i>&nbsp;Iniciar Sesión</a>
			</li>

		</ul>
	</nav>
</header>
