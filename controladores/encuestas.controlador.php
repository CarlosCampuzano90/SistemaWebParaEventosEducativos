<?php

class ControladorEncuestas{

	public function ctrExistenPreguntas($id){ //función para saber si ya se registraron preguntas de una ponencia
		$encuesta=ModeloEncuestas::mdlExistenPreguntas($id);
		return $encuesta;
		
	}

	public function ctrEncuestaContestada($id,$idParticipante){ //función para saber si ya se registraron preguntas de una ponencia
		$encuesta=ModeloEncuestas::mdlEncuestaContestada($id,$idParticipante);
		return $encuesta;
		
	}

	public function ctrExistenRespuestas($id){  //función para saber si ya se registraron respuestas de una ponencia
		$encuesta=ModeloEncuestas::mdlExistenRespuestas($id);
		return $encuesta;
		
	}

	public function ctrMostrarPreguntas($id){
		$encuesta=ModeloEncuestas::mdlMostrarPreguntas($id);
		return $encuesta;
	}

	public function ctrMostrarRespuestas($id){
		$encuesta=ModeloEncuestas::mdlMostrarRespuestas($id);
		return $encuesta;
	}

	public function ctrRegistrarPreguntas(){ //función para registrar la información de una ponencia

		if(isset($_POST["encuestaPregunta1"])){
				$respuesta = ModeloEncuestas::mdlRegistrarPreguntas($_POST["idPonenciaEncuesta"]
				,$_POST["encuestaPregunta1"],$_POST["encuestaPregunta2"],$_POST["encuestaPregunta3"],$_POST["encuestaPregunta4"]);
				if($respuesta){
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Preguntas registradas','success')
						recargarEncuestas();
					});
					</script>";
				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Preguntas no registradas','error')
					});
					</script>";
				}

		}

	}

	public function ctrRegistrarRespuestasParticipante(){ //función para registrar las respuestas de un participante de una ponencia

		if(isset($_POST["estrellas"])){
				$respuesta = ModeloEncuestas::mdlRegistrarRespuestasParticipante($_POST["idParticipanteRespuestas"],$_POST["idPreguntasParticipante"]
				,$_POST["estrellas"],$_POST["respuestaParticipante1"],$_POST["respuestaParticipante2"],$_POST["respuestaParticipante3"]);
				if($respuesta){
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Respuestas registradas','success')
						window.location='constancias';
					});
					</script>";
				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Respuestas no registradas','error')
					});
					</script>";
				}

		}

	}


	public function ctrActualizarPreguntas(){ //función para actualizar la información de un ponente

		if(isset($_POST["encuestaPreguntaActualizar"])){ 
			 	$idActualizar=$_POST["encuestasIdActualizar"];
				$i=0;
				foreach($_POST['encuestaPreguntaActualizar'] as $pregunta) {
					$respuesta = ModeloEncuestas::mdlActualizarPreguntas($idActualizar[$i],$pregunta);
					$i++;
					if($respuesta)$actualizo=true;
				}
				if($actualizo){
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						location.reload();
					});
					</script>";

				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Preguntas Actualizadas','success')
					});
					</script>";

				}
		}

	}

	public function ctrEliminarPreguntas(){ //función para eliminar la información de una ponencia
		if(isset($_POST["idEncuestaAEliminar"])){
			$usuario= ModeloEncuestas::mldEliminarPreguntas($_POST["idEncuestaAEliminar"]);
			if($usuario==true){
				echo "<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					createToast(' Ponencia eliminada','success');
					window.location = 'encuestas';});
				</script>";
			}else{

			}



		}

	}

}
?>