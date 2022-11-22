<?php



class ControladorPonencias{
	public function ctrMostrarPonenciasGraficaPastel(){ // función para consultar la información y generar la grafica pastel
		$ponencia=ModeloPonencias::mdlMostrarPonenciasGraficaPastel();
		return $ponencia;
		
	}

	public function ctrMostrarPonenciasPorPeriodo(){ //funcion para consultar la información por periodos de la ponencia
		if(isset($_POST["periodoGrafica"])){
			$ponencia=ModeloPonencias::mdlMostrarPonenciasPorPeriodo($_POST["periodoGrafica"]);
			if($ponencia[0]["total"]!=NULL){
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast('Datos cargados','success');
				});
				</script>";
			}else{
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast('No se encontraron datos','warning');
				});
				</script>";
			}

	
			return $ponencia;
		}
	}

	public function ctrConsultarInformacion($id){ //función para consultar la información de una ponencia
		$ponencia=ModeloPonencias::mdlConsultarInformacionPonencia($id);
		return $ponencia;
		
	}

	public function ctrConsultarPonenciasPagadas($idUsuario){
		$ponencia=ModeloPonencias::mdlConsultarPonenciasPagadas($idUsuario);
		return $ponencia;
		
	}

	public function ctrConsultarPonenciasNoPagadas($idUsuario){
		$ponencia=ModeloPonencias::mdlConsultarPonenciasNoPagadas($idUsuario);
		return $ponencia;
		
	}

	public function ctrConsultarUsuariosSinPagar($idponencia){
		$ponencia=ModeloPonencias::mdlConsultarUsuariosSinPagar($idponencia);
		return $ponencia;
		
	}

	public function ctrMostrarPonenciasCalendario(){ //función para mostrar la información de todas las ponencias en un calendario
		$ponencia=ModeloPonencias::mdlMostrarPonenciasCalendario();
		return $ponencia;	
	}

	public function ctrMostrarInformacionPonencia(){ //función para consultar la información de todas las ponencias
		$ponencia=ModeloPonencias::mdlMostrarInformacion();
		return $ponencia;		
	}

	public function ctrMostrarInformacionPonente($id){ //función para consultar la información de ponente

		$ponencia=ModeloPonencias::mdlConsultarInformacion($id);
		return $ponencia;

	}



	public function ctrRegistrarPago(){ //función para registrar participante a ponencia
		if(isset($_POST["idPonenciaRegistrarPago"])){
			$respuesta = ModeloPonencias::mdlRegistrarPago($_POST["idParticipanteRegistrarPago"],$_POST["idPonenciaRegistrarPago"]);
			if($respuesta){
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					location.reload();
				});
				</script>";

			}else{
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Pago registrado','success')
				});
				</script>";

			}
		}
	}

	public function ctrRegistrarParticipantePonencia(){ //función para registrar participante a ponencia
		if(isset($_POST["idParticipanteARegistrar"])){
			$respuesta = ModeloPonencias::mdlRegistrarParticipantePonencia($_POST["idParticipanteARegistrar"],$_POST["idPonenciaARegistrar"]);
			if($respuesta){
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Participante registrado a ponencia','success');
					
				});
				</script>";

			}else{
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' El participante ya estaba registrado','error');
				});
				</script>";

			}
		}
	}

	public function ctrRegistrarPonencia(){ //función para registrar la información de una ponencia

		if(isset($_POST["NombrePonencia"])){
			$revisar = getimagesize($_FILES["imageFirma"]["tmp_name"]);
			if($revisar !== false){
				$image=FALSE;
				$image = $_FILES['image']['tmp_name'];  
				if(!empty($image)){ //encriptamos las imagenes si no estan vacias
					$imgContenido = base64_encode(file_get_contents($image));  
				}
				$firma = $_FILES['imageFirma']['tmp_name'];
				$imgFirma = base64_encode(file_get_contents($firma));
				$respuesta = ModeloPonencias::mdlRegistrarPonencia($_POST["idCoordinador"],$_POST["NombrePonencia"],$_POST["fechaPonencia"],$_POST["horaPonencia"],$_POST["espaciosPonencia"],
				$_POST["nombrePonente"],$_POST["gradoAcademicoPonente"],$imgContenido,$imgFirma,$_POST["categoriaPonencia"],$_POST["modalidadPonencia"],$_POST["numeroPonencia"],$_POST["costoDePonencia"]);
				if($respuesta){
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Ponencia registrada','success')
						window.location = 'ponencias';
					});
					</script>";
				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Ponencia no registrada','error')
					});
					</script>";

				}
			}


		}

	}

	public function ctrActualizarPonente(){ //función para actualizar la información de un ponente

		if(isset($_POST["nombrePonenteActualizar"])){  
				$imgContenido=FALSE;  // inicializamos las variables en FALSE 
				$imgFirma=FALSE;
				$image = $_FILES['imageActualizar']['tmp_name'];  
				if(!empty($image)){ //encriptamos las imagenes si no estan vacias
					$imgContenido = base64_encode(file_get_contents($image));  
				}

				$image = $_FILES['firmaActualizar']['tmp_name'];
				if(!empty($image)){
					$imgFirma = base64_encode(file_get_contents($image));
				}

		
				$respuesta = ModeloPonencias::mdlActualizarPonente($_POST["idPonencia"],$_POST["nombrePonenteActualizar"],$_POST["gradoPonenteActualizar"],$imgContenido,$imgFirma);
				if($respuesta){
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						location.reload();
					});
					</script>";

				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Ponente Actualizado','success')
					});
					</script>";

				}
		}

	}

	public function ctrActualizarPonencia(){ //función para actualizar la información de una ponencia
		if(isset($_POST["NombrePonenciaActualizar"])){
			$respuesta = ModeloPonencias::mdlActualizarPonencia($_POST["idPonencia"],$_POST["idCoordinadorActualizar"],$_POST["NombrePonenciaActualizar"],$_POST["fechaPonenciaActualizar"],$_POST["horaPonenciaActualizar"],$_POST["espaciosPonenciaActualizar"],$_POST["categoriaPonenciaActualizar"],$_POST["modalidadPonenciaActualizar"],$_POST["numeroPonenciaAct"],$_POST["costoPonenciaAct"]);
			if($respuesta){
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Ponencia Actualizada','success')
					recargarPonencias();
				});
				</script>";



			}else{
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' La ponencia no se actualizo','error')
				});
				</script>";

			}
		}
	}
 
	public function ctrEliminarPonencia(){ //función para eliminar la información de una ponencia
		if(isset($_POST["idInformacionEliminar"])){
			$usuario= ModeloPonencias::mldEliminarPonencia($_POST["idInformacionEliminar"]);
			if($usuario==true){
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Ponencia eliminada','success');
					recargarPonencias();});
				</script>";
			}else{

			}



		}

	}

	public function ctrSubirMaterialPDF(){
		$tamanio = 100000; //10 megas maximos
		if(isset($_FILES['documento']) && $_FILES['documento']['type'] == 'application/pdf'){

			if( $_FILES['documento']['size'] < ($tamanio * 1024) ){
				move_uploaded_file( $_FILES['documento']['tmp_name'], 'documentos/'.'ponencia'.$_POST["idPonencia"].'.pdf');
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Documento subido correctamente','success')
				});
				</script>";

			}else{
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Error peso superior al permitido','error')
				});
				</script>";
			}

		}else if(isset($_FILES['documento']) && $_FILES['documento']['type'] != 'application/pdf'){
			echo "<script>
			window.addEventListener('DOMContentLoaded', (event) => {
				createToast(' Solo se permiten PDF','warning')
			});
			</script>";
		}
	}

}
?>

