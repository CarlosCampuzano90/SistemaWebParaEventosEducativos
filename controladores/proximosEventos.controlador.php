<?php
class ControladorProximosEventos{
        //función para consultar la informacion de los eventos
        public function ctrConsultarInformacion(){
            $eventos=ModeloProximosEventos::mdlConsultarInformacion();
            return $eventos;
        }

        public function ctrProximosEventosInicio(){
            $eventos=ModeloProximosEventos::mdlConsultarProximosEventos();
            return $eventos;
        }
        public function ctrConsultarInformacionUno($id){
            $eventos=ModeloProximosEventos::mdlConsultarInformacionUno($id);
            return $eventos;
        }


            //función para eliminar la información del eventos
        public function ctrELiminarInformacion(){
            if(isset($_POST["idInformacionEliminar"])){ //esperamos el POST del formulario para eliminar
                $eventos= ModeloProximosEventos::mldEliminarEventos($_POST["idInformacionEliminar"]);
                if($eventos){  //funciones para mostrar notificaciones con JS
                    echo "<script>
                    window.addEventListener('DOMContentLoaded', (event) => {
                        createToast(' Información eliminada','success');  
                        recargarTablaEventos();});
                    </script>";

                }else{

                }

            }


        }

        //función para registrar la información del usuario
        public function ctrRegistrarEventosInfo(){

            if(isset($_POST["InformacionTituloEvento"])){ //esperamos el POST del formulario para registrar
                    $imgContenido = FALSE;
                    $imagen = $_FILES['image']['tmp_name'];
                    if(!empty($imagen)){ //encriptamos las imagenes si no estan vacias
                        $imgContenido = base64_encode(file_get_contents($imagen));  
                    }
                    $respuesta = ModeloProximosEventos::mdlRegistrarEventos($_POST["InformacionUsuarios_id"],$imgContenido,$_POST["InformacionTituloEvento"],$_POST["InformacionFechaProxima"],$_POST["InformacionDescripcion"],$_POST["InformacionNombrePonente"],$_POST["InformacionCupo"],$_POST["InformacionTipoDeEvento"],$imgContenido);
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

        //función para actualizar la información del usuario

        public function ctrActualizarInformacion(){

            if(isset($_POST["InformacionTituloEventoAct"])){ //esperamos el POST del formulario para actualizar
                    $imgContenido = FALSE;
                    $imagen = $_FILES['image']['tmp_name'];
                    if(!empty($imagen)){ //encriptamos las imagenes si no estan vacias
                        $imgContenido = base64_encode(file_get_contents($imagen));  
                    }
                    $respuesta = ModeloProximosEventos::mdlActualizarEventos(NULL,$imgContenido,$_POST["InformacionTituloEventoAct"],$_POST["InformacionFechaProximaAct"],$_POST["InformacionDescripcionAct"],$_POST["InformacionNombrePonenteAct"],$_POST["InformacionCupoAct"],$_POST["InformacionTipoDeEventoAct"],$_POST["InformacionIdAct"]);
                    if($respuesta){
                        echo "<script>
                        window.addEventListener('DOMContentLoaded', (event) => {
                            location.reload();
                        });
                        </script>";

                    }else{
                        echo "<script>
                        window.addEventListener('DOMContentLoaded', (event) => {
                            createToast(' Información actualizada','success')
                        });
                        </script>";

                    }
                }


            }


}

?>