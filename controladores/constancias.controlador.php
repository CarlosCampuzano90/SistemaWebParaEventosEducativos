<?php
class ControladorConstancias{

	public function ctrMostrarInformacionPonencia(){ //función para consultar la información de todas las ponencias
		$ponencia=ModeloConstancias::mdlConsultarPonencias();
		return $ponencia;		
	}

	public function ctrMostrarConstancias(){ //función para mostrar todas las constancias
		$constancias= ModeloConstancias::mdlConsultarConstancias();
		return $constancias;
	}
	public function ctrMostrarConstanciaUna($id){
		$constancias= ModeloConstancias::mdlConsultarConstanciaUno($id);
		return $constancias;
	}

			
	public function fechaCastellano ($fecha) {
		$fechaEsp= ModeloConstancias::mdlTransformarFecha($fecha);
		return $fechaEsp;

	  }

	public function ctrGenerarConstancia(){

		if(isset($_POST["generarConstancia"])){
			
	
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					window.location='constancias';
				});
				</script>";
		

		}
		
		
	}



	public function ctrRegistrarConstancia(){ //función para registrar la información de una ponencia

		if(isset($_POST["textoAgradecimiento"])){
			$revisar = getimagesize($_FILES["imageFirma"]["tmp_name"]);
			if($revisar !== false){
				$firma = $_FILES['imageFirma']['tmp_name'];
				$imgFirma = base64_encode(file_get_contents($firma));
				$respuesta = ModeloConstancias::mdlRegistrarConstancia($imgFirma,$_POST["textoAgradecimiento"],$_POST["idPonencia"]);
				if($respuesta){
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Constancia registrada','success')
						recargarTablaConstancias();
					});
					</script>";
				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Constancia no registrada','error')
					});
					</script>";

				}
			}


		}

	}

	public function ctrActualizarConstancia(){ //función para actualizar la información de un ponente

		if(isset($_POST["textoAgradecimientoActualizar"])){  
									 // inicializamos las variables en FALSE 
				$imgFirma=FALSE;
				$image = $_FILES['firmaActualizar']['tmp_name'];
				if(!empty($image)){
					$imgFirma = base64_encode(file_get_contents($image));
				}

				$respuesta = ModeloConstancias::mdlActualizarConstancia($imgFirma,$_POST["textoAgradecimientoActualizar"],$_POST["idConstanciaVer"]);
				if($respuesta){
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						location.reload();
					});
					</script>";

				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Constancia modificada','success')
					});
					</script>";

				}
		}

	}


 
	public function ctrEliminarConstancia(){ //función para eliminar la información de una ponencia
		if(isset($_POST["idConstanciaEliminar"])){
			$usuario= ModeloConstancias::mdlEliminarConstancia($_POST["idConstanciaEliminar"]);
			if($usuario==true){
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Ponencia eliminada','success');
					recargarTablaConstancias();});
				</script>";
			}else{

			}



		}

	}

}
?>