<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"]=='inicio') ? "class='active'" : ""; ?> >

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'usuarios') ? "class='active'" : ""; ?>>

				<a href="usuarios">
					<i class="fa fa-user"></i>
					<span>Usuarios</span>
				</a>

			</li>

			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'solicitudes') ? "class='active'" : ""; ?>>
				<a href="solicitudes">

					<i class="fa fa-users"></i>
					<span>Solicitud de usuarios</span>

				</a>
			</li>
			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'ponencias') ? "class='active'" : ""; ?>>
				<a href="ponencias">
					<i class="fa fa-product-hunt"></i>
					<span>Ponencias</span>
				</a>
			</li>

			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'encuestas') ? "class='active'" : ""; ?>>
				<a href="encuestas">
				<i class="fa fa-question-circle-o" aria-hidden="true"></i>
					<span>Encuestas</span>
				</a>
			</li>

			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'constancias') ? "class='active'" : ""; ?>>
				<a href="constancias">
					<i class="fa fa-file-text" ></i>
					<span>Constancias</span>
				</a>
			</li>

			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'proximosEventos') ? "class='active'" : ""; ?>>
			<a href="proximosEventos">

				<i class="fa fa-calendar"></i>
				<span>Próximos eventos</span>

			</a>
			</li>


			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'inscripcionAPonencia') ? "class='active'" : ""; ?>>

				<a href="inscripcionAPonencia">

					<i class="fa fa-th"></i>
					<span>Inscripción a eventos</span>

				</a>

			</li>

			
			<li <?php echo (isset($_GET["ruta"]) && $_GET["ruta"] == 'codigosQR') ? "class='active'" : ""; ?>>

				<a href="codigosQR">

					<i class="fa fa-qrcode" aria-hidden="true"></i>
					<span>Códigos QR</span>

				</a>

			</li>






		</ul>

	 </section>

</aside>