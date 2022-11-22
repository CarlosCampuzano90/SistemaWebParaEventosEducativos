<?php

class ControladorUsuarioInformacion{

	//función para consultar la informacion del usuario
	public function ctrConsultarInformacion($id){
		$usuario=ModeloUsuariosInformacion::mdlConsultarInformacion($id);
		return $usuario;
		
	}

	public function ctrConsultarNombre($id){
		$usuario=ModeloUsuariosInformacion::mdlConsultarNombre($id);
		return $usuario;
		
	}


		//función para eliminar la información del usuario
	public function ctrELiminarInformacion(){
		if(isset($_POST["idInformacionEliminar"])){ //esperamos el POST del formulario para eliminar
			$usuario= ModeloUsuariosInformacion::mldEliminarUsuario($_POST["idInformacionEliminar"]);
			if($usuario){  //funciones para mostrar notificaciones con JS
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Información eliminada','success');   
					window.location = 'usuarios';});
				</script>";

			}else{
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Ocurrio un error','error');});   
				</script>";

			}

		}


	}

	//función para registrar la información del usuario
	public function ctrRegistrarUsuarioInfo(){

		if(isset($_POST["InformacionNombre"])){ //esperamos el POST del formulario para registrar
				$imgContenido = FALSE;
				$imagen = $_FILES['image']['tmp_name'];
				if(!empty($imagen)){ //encriptamos las imagenes si no estan vacias
					$imgContenido = base64_encode(file_get_contents($imagen));  
				}
				$respuesta = ModeloUsuariosInformacion::mdlRegistrarUsuario($_POST["InformacionNombre"],$_POST["InformacionApellido"],$_POST["InformacionMatricula"],$_POST["InformacionGrado"],$_POST["InformacionPuesto"],$_POST["InformacionGenero"],$imgContenido,$_POST["InformacionID"]);
				if($respuesta){  //funciones para mostrar notificaciones con JS
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Información registrada','success')
						recargarTablaCoordinadores();
						recargarTablaParticipantes();
					});
					</script>";
				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Información no registrada ','error')
					});
					</script>";

				}
			
		}

	}
	
	//función para actualizar la información del usuario

	public function ctrActualizarInformacion(){

		if(isset($_POST["InformacionNombreAct"])){ //esperamos el POST del formulario para actualizar
				$imgContenido = FALSE;
				$imagen = $_FILES['image']['tmp_name'];
				if(!empty($imagen)){ //encriptamos las imagenes si no estan vacias
					$imgContenido = base64_encode(file_get_contents($imagen));  
				}
				$respuesta = ModeloUsuariosInformacion::mdlActualizarUsuario($_POST["InformacionNombreAct"],$_POST["InformacionApellidoAct"],$_POST["InformacionMatriculaAct"],$_POST["InformacionGradoAct"],$_POST["InformacionPuestoAct"],$_POST["InformacionGeneroAct"],$imgContenido,$_POST["InformacionIDAct"]);
				if($respuesta){
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						location.reload();
					});
					</script>";

				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Información Actualizada','success')
					});
					</script>";

				}
			}


		}

	
}
/*			$allowedFileType = ['image/jpg','image/png','image/jpeg'];
			if(in_array($_FILES["image"]["type"],$allowedFileType)){ */
?>

