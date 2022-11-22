<?php

class ControladorPagina{
	public function ctrAdmin(){
		include "vistas/admin.php";
	}


	public function ctrParticipante(){ //Modulos que puede utilizar el participante
		if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "participante"){
		
		 
			 /*=============================================
			 Encabezado y menu*/
			 include "vistas/participante/encabezado.php";

		  /*=============================================
			 Cuerpo*/
			 if(isset($_GET["ruta"])){
		
			   if($_GET["ruta"] == "inicio"|| 
				  $_GET["ruta"] == "inscripcionAPonencia"|| 
				  $_GET["ruta"] == "codigosQR"||
				  $_GET["ruta"] == "pagosPendientes"||
				  $_GET["ruta"] == "constancias"||
				  $_GET["ruta"] == "constancia"||
				  $_GET["ruta"] == "encuesta"||
				  $_GET["ruta"] == "gafete"||
				  $_GET["ruta"] == "perfil"||
			   	  $_GET["ruta"] == "salir"){
				 include "vistas/participante/".$_GET["ruta"].".php";
			   }else{
		 
				 include "vistas/participante/404.php";
			   }
		 
			 }else{
		 
				include "vistas/participante/inicio.php";
		  
			  }
			  /*=============================================
			 Footer*/
			 include "vistas/participante/footer.php";

		}
	}


	public function ctrModulos(){

		if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "administracion"){

			echo '<div class="wrapper">';
		 
			 /*=============================================
			 Encabezado*/
		 
			 include "vistas/administracion/encabezado.php";
			 /*=============================================
			 Menu*/
		 
			 include "vistas/administracion/menu.php";
			 /*=============================================
			 Contenido*/
		 
			 if(isset($_GET["ruta"])){
		 
			   if($_GET["ruta"] == "inicio" ||
				  $_GET["ruta"] == "usuarios" ||
				  $_GET["ruta"] == "informacion" ||
				  $_GET["ruta"] == "ponencias" ||
				  $_GET["ruta"] == "ponente" ||
				  $_GET["ruta"] == "solicitudes" ||
				  $_GET["ruta"] == "proximosEventos" ||
				  $_GET["ruta"] == "eventoConcluido" ||
				  $_GET["ruta"] == "evento" ||
				  $_GET["ruta"] == "constancias" ||
				  $_GET["ruta"] == "inscripcionAPonencia" ||
				  $_GET["ruta"] == "constancia" ||
				  $_GET["ruta"] == "encuestas" ||
				  $_GET["ruta"] == "encuesta" || 
				  $_GET["ruta"] == "respuesta" ||
				  $_GET["ruta"] == "pagos" ||
				  $_GET["ruta"] == "codigosQR" ||
				  $_GET["ruta"] == "codigo" ||
				  $_GET["ruta"] == "salir"){
				 include "vistas/administracion/".$_GET["ruta"].".php";
				 
			   }else{
		 
				 include "vistas/administracion/404.php";
		 
			   }
		 
			 }else{
		 
			   include "vistas/administracion/inicio.php";
		 
			 }
		 
			 /*=============================================
			 Footer*/
		 
			 include "vistas/administracion/footer.php";
		 
			 echo '</div>';
		   }

		   if(!isset($_SESSION["iniciarSesion"])){
			include "vistas/inicio/encabezado.php";
			if(isset($_GET["ruta"])){
				if($_GET["ruta"] == "eventos" ||
				$_GET["ruta"] == "promocion" ||
				$_GET["ruta"] == "cambioContrasena" ||
				$_GET["ruta"] == "reset" ||
				$_GET["ruta"] == "nuevaContrasena" || 
				$_GET["ruta"] == "iniciarSesion" || 
				$_GET["ruta"] == "registrarse" ){
					include "vistas/inicio/".$_GET["ruta"].".php";
				}else{
					include "vistas/inicio/promocion.php";
				}
			}else{
				include "vistas/inicio/promocion.php";
			}

		   }

		   
	
		 		 
	}

	public function ctrImportarExcel(){
		if (isset($_POST["import"]))
		{
			$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
			if(in_array($_FILES["file"]["type"],$allowedFileType)){
				
					$targetPath = 'modelos/subidas/'.$_FILES['file']['name'];
					move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
					$respuesta=ModeloUsuarios::mdlImportarExcel($targetPath);
					if (! empty($respuesta)) {
						echo "<script>
						window.addEventListener('DOMContentLoaded', (event) => {
							createToast(' Excel importado correctamente','success');
							recargarTablaParticipantes();});
						</script>";
					} else {
						echo "<script>
						window.addEventListener('DOMContentLoaded', (event) => {
							createToast(' Error al importar','error');});
						</script>"; 
					}
				}
				else
				{ 
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' El archivo enviado es invalido','warning');});
					</script>";
				}
			}
	}
	

}