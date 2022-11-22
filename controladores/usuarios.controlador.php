<?php

class ControladorCoordinadores{

	public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"])){
	
				$respuesta = ModeloUsuarios::mdlIniciarSesion($_POST["ingUsuario"]);

				if(($respuesta["usuario"] == $_POST["ingUsuario"]) && (password_verify($_POST["ingPassword"], $respuesta["contrasena"])) && ($respuesta["estado"]==1)){
                   if($respuesta["rol_id"]==1){
						$_SESSION["iniciarSesion"] = "administracion";
						$_SESSION['administrador']=$respuesta;
				   }
				   if($respuesta["rol_id"]==2){
						$_SESSION["iniciarSesion"] = "coordinador";
						$_SESSION['coordinador']=$respuesta;
				   }
				   if($respuesta["rol_id"]==3){
						$_SESSION["iniciarSesion"] = "participante";
						$_SESSION['participante']=$respuesta;

				   }
					echo '<script>

						window.location = "inicio";

					</script>';
					
				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Usuario o contraseña incorrectos ','error')
					});
					</script>";
					if($respuesta["estado"]==0){
						echo "<script>
						window.addEventListener('DOMContentLoaded', (event) => {
							createToast(' Tu cuenta no existe o aún no ha sido activada','info')
						});
						</script>";
					}
				}

			}else{
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Recuerda que el usuario debe de tener solo caracteres alfanuméricos ','error')
				});
				</script>";

			}	

		}

	}


	public function ctrMostrarCoordinadores(){
		include "vistas/administracion/usuarios/mostrarCoordinadores.php";
	}

	public function ctrRellenarTablaCoordinador(){
		$coordinadores= ModeloUsuarios::mdlMostrarTabla(2);
		return $coordinadores;
	}
	public function ctrELiminarCoordinador(){
		if(isset($_POST["idCoordinador"])){
			$usuario= ModeloUsuarios::mldEliminarUsuario($_POST["idCoordinador"]);
			if($usuario){
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Coordinador eliminado','success');
					recargarTablaCoordinadores();});
				</script>";

			}else{

			}



		}


	}
	public function ctrRegistrarCoordinador(){

		if(isset($_POST["usuarioRC"])){
				$respuesta = ModeloUsuarios::mdlRegistrarUsuario(2,$_POST["usuarioRC"],$_POST["correoRC"],$_POST["contrasenaRC"],1);
				if($respuesta){

					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Coordinador registrado','success')
						recargarTablaCoordinadores();
					});
					</script>";
					
				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Este coordinador ya esta registrado','error')
					});
					</script>";

				}


		}

	}

	public function ctrActualizarCoordinador(){

		if(isset($_POST["usuarioAC"])){
				$respuesta = ModeloUsuarios::mdlActualizarUsuario($_POST["usuarioAC"],$_POST["correoAC"],$_POST["idCoor"]);
				if($respuesta){
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Coordinador actualizado','success')
						recargarTablaCoordinadores();
						
					});
					</script>";
					
				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Coordinador no actualizado','error')
					});
					</script>";
				}


		}

	}
}
class ControladorParticipantes{
	//Participantes
	public function ctrMostrarParticipante(){
		include "vistas/administracion/usuarios/mostrarParticipante.php";
	}

	public function ctrNuevaContrasena(){
		if(isset($_POST["contrasenaRestablecida"])){
			$respuesta = ModeloUsuarios::mdlNuevaContrasena($_POST["contrasenaRestablecida"],$_POST["emailParticipanteRestablecer"]);
			if($respuesta){
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Contraseña restablecida','success')
				});
				</script>";
			}else{
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Ocurrio un error','error')
				});
				</script>";
			}
		}
	}

	public function ctrRestablecerContrasena(){
		if(isset($_POST["emailRestablecerContrasena"])){
			$respuesta = ModeloUsuarios::mdlRestablecerContrasena($_POST["emailRestablecerContrasena"]);
			if($respuesta){
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Se envió un correo a tu email','success')
				});
				</script>";
			}else{
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Este email no existe','error')
				});
				</script>";
			}
	}
	}

	public function ctrValidarCodigo($email,$token,$codigo){
		$respuesta= ModeloUsuarios::mdlValidarCodigo($email,$token,$codigo);
		return $respuesta;
	}

	public function ctrRellenarTablaParticipante(){
		$participantes= ModeloUsuarios::mdlMostrarTabla(3);
		return $participantes;
	}

	
	public function ctrMostrarParticipantesInactivos(){
		$participantes= ModeloUsuarios::mdlMostrarInactivos(3);
		return $participantes;
	}

	public function generarCodigoQR(){


		if (isset($_POST["idParticipanteCodigoQR"])) {
			$dato =$_POST["idParticipanteCodigoQR"].",".$_POST["idPonenciaGeneracionQR"]; 
			$encriptado= ModeloUsuarios::mdlEncriptarQR($dato);
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					generarCodigoQREncriptado('$encriptado');
					createToast(' Codigo QR Generado','success');
				});
				</script>";


		}
	}
	public function ctrRegistrarParticipante(){

		if(isset($_POST["usuarioRP"])){
				$respuesta = ModeloUsuarios::mdlRegistrarUsuario(3,$_POST["usuarioRP"],$_POST["correoRP"],$_POST["contrasenaRP"],1);
				if($respuesta){
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Participante registrado','success')
						recargarTablaParticipantes();
					});
					</script>";
				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Este participante ya esta registrado','error')
					});
					</script>";
				}


		}

	}
	public function ctrRegistrarseParticipante(){

		if(isset($_POST["usuarioNuevo"])){
				$respuesta = ModeloUsuarios::mdlRegistrarUsuario(3,$_POST["usuarioNuevo"],$_POST["correoNuevo"],$_POST["contrasenaNuevo"],0);
				if($respuesta){
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Solicitud de registro enviada','success')
					});
					</script>";
				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Ya existe un usuario con este nombre de usuario o correo','error')
					});
					</script>";
				}


		}

	}

	public function ctrActualizarParticipante(){

		if(isset($_POST["usuarioAP"])){
				$respuesta = ModeloUsuarios::mdlActualizarUsuario($_POST["usuarioAP"],$_POST["correoAP"],$_POST["idPart"]);
				if($respuesta){

					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Participante actualizado','success')
						recargarTablaParticipantes();
					});
					</script>";
					
				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Participante no actualizado','error')
					});
					</script>";
				}


		}

	}
	public function ctrELiminarParticipante(){
		if(isset($_POST["idParticipante"])){
			$usuario= ModeloUsuarios::mldEliminarUsuario($_POST["idParticipante"]);
			if($usuario){
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Participante eliminado','success');
					recargarTablaParticipantes();});
				</script>";
			}else{
				
			}
		}
	}

	public function ctrActivarParticipante(){
		if(isset($_POST["idActivarParticipante"])){
			$usuario= ModeloUsuarios::mldActivarUsuario($_POST["idActivarParticipante"]);
			if($usuario){
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Participante eliminado','success');
					recargarTablaParticipantes();});
				</script>";
			}else{
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Ocurrio un error','error');
					recargarTablaParticipantes();});
				</script>";
			}
		}
	}


}
	

	

?>
