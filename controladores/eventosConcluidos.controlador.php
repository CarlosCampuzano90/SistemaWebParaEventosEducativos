<?php
class ControladorEventosConcluidos{
        //función para consultar si ya existe el evento concluido del proximo evento
        public function ctrExisteEventoConcluido($id){
            $evento=ModeloEventosConcluidos::mdlConsultarInformacionUno($id);
            return $evento;
        }

        public function ctrMostrarUnEventoConcluido($id){ // función para consultar a uun solo evento concluido
            $evento=ModeloEventosConcluidos::mdlConsultarEventoUno($id);
            return $evento;
        }

        public function ctrMostrarEventos(){ // función para consultar a uun solo evento concluido
            $eventos=ModeloEventosConcluidos::mdlConsultarEventos();
            return $eventos;
        }
        //función para registrar el evento concluido
        public function ctrRegistrarEventoConcluido(){
            if(isset($_POST["descripcionEventoConcluido"])){ //esperamos el POST del formulario para registrar
                $imgContenido = FALSE;
                $imagen = $_FILES['image']['tmp_name'];
                if(!empty($imagen)){ //encriptamos las imagenes si no estan vacias
                    $imgContenido = base64_encode(file_get_contents($imagen));  
                }
                $respuesta = ModeloEventosConcluidos::mdlRegistrarEventoConcluido($_POST["idProximoEventoConcluido"],$imgContenido,$_POST["descripcionEventoConcluido"]);
                if($respuesta){  //funciones para mostrar notificaciones con JS
                    echo "<script>
                    window.addEventListener('DOMContentLoaded', (event) => {
                        createToast(' Información registrada','success')
                        recargarTablaEventos();
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

        //función para actualizar el evento concluido
        public function ctrActualizarEventoConcluido(){
            if(isset($_POST["tituloEventoConcluidoAct"])){ //esperamos el POST del formulario para registrar
                $imgContenido = FALSE;
                $imagen = $_FILES['image']['tmp_name'];
                if(!empty($imagen)){ //encriptamos las imagenes si no estan vacias
                    $imgContenido = base64_encode(file_get_contents($imagen));  
                }
                $respuesta = ModeloEventosConcluidos::mdlActualizarEventoConcluido($_POST["idEventoConcluido"],$imgContenido,$_POST["descripcionEventoConcluidoAct"],$_POST["tituloEventoConcluidoAct"],$_POST["fechaEventoConcluidoAct"]);
				if($respuesta){
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						location.reload();
					});
					</script>";

				}else{
					echo "<script>
					window.addEventListener('DOMContentLoaded', (event) => {
						createToast(' Evento concluido modificado','success')
					});
					</script>";

				}

            }
        }

        //función para eliminar la información del eventos
        public function ctrELiminarEventoConcluido(){
            if(isset($_POST["idEventoConcluidoEliminar"])){ //esperamos el POST del formulario para eliminar
                $eventos= ModeloEventosConcluidos::mldEliminarEvento($_POST["idEventoConcluidoEliminar"]);
                if($eventos){  //funciones para mostrar notificaciones con JS
                    echo "<script>
                    window.addEventListener('DOMContentLoaded', (event) => {
                        createToast(' Información eliminada','success');   
                        window.location = 'proximosEventos';});
                    </script>";
    
                }else{
                    echo "<script>
                    window.addEventListener('DOMContentLoaded', (event) => {
                        createToast(' Ocurrio un error','error');});   
                    </script>";
    
                }

            }


        }

}

?>