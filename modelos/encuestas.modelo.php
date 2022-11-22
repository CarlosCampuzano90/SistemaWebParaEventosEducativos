<?php

require_once "conexion.php";

Class ModeloEncuestas{

    static public function mdlExistenPreguntas($idponencia){ //función para consultar la informacion de una ponencia
        $encuestaDTO=new EncuestasDTO(null,null,$idponencia,null,null,null,null); //inicalizamos todo en null por que solo necesitamos la ID
        $encuestaDAO=new EncuestasDAO();
        $respuesta=$encuestaDAO->existenPreguntas($encuestaDTO);
        return $respuesta;
    }
    static public function mdlExistenRespuestas($idponencia){ //función para consultar la informacion de una ponencia
        $encuestaDTO=new EncuestasDTO(null,null,$idponencia,null,null,null,null); //inicalizamos todo en null por que solo necesitamos la ID
        $encuestaDAO=new EncuestasDAO();
        $respuesta=$encuestaDAO->existenRespuestas($encuestaDTO);
        return $respuesta;
    }

    static public function mdlEncuestaContestada($idponencia,$idparticipante){ //función para consultar la informacion de una ponencia
        $encuestaDTO=new EncuestasDTO(null,$idparticipante,$idponencia,null,null,null,null); //inicalizamos todo en null por que solo necesitamos la ID
        $encuestaDAO=new EncuestasDAO();
        $respuesta=$encuestaDAO->encuestaContestada($encuestaDTO);
        return $respuesta;
    }

    static public function mdlRegistrarPreguntas($idponencia,$pregunta1,$pregunta2,$pregunta3,$pregunta4){ //función para registrar las preguntas de una ponencia
        $encuestaDTO=new EncuestasDTO(null,null,$idponencia,$pregunta1,$pregunta2,$pregunta3,$pregunta4); //inicalizamos con todas las preguntas
        $encuestaDAO=new EncuestasDAO();
        $respuesta=$encuestaDAO->registrarPreguntas($encuestaDTO);
        return $respuesta;
    }

    static public function mdlRegistrarRespuestasParticipante($idUsuario, $idponencia,$pregunta1,$pregunta2,$pregunta3,$pregunta4){
        $encuestaDTO=new EncuestasDTO(null,$idUsuario,$idponencia,$pregunta1,$pregunta2,$pregunta3,$pregunta4); //inicalizamos con todas las preguntas
        $encuestaDAO=new EncuestasDAO();
        $respuesta=$encuestaDAO->registrarRespuestasParticipante($encuestaDTO);
        return $respuesta;
    }

    static public function mdlActualizarPreguntas($idpregunta,$pregunta){ //función para actualizar las preguntas de una ponencia
        $encuestaDTO=new EncuestasDTO($idpregunta,null,null,$pregunta,null,null,null); //inicalizamos solo con la pregunta que vamos a modificar
        $encuestaDAO=new EncuestasDAO();
        $respuesta=$encuestaDAO->actualizarPreguntas($encuestaDTO);
        return $respuesta;
    }
    static public function mdlMostrarPreguntas($idponencia){
        $encuestaDTO=new EncuestasDTO(null,null,$idponencia,null,null,null,null); //inicalizamos todo en null por que solo necesitamos la ID
        $encuestaDAO=new EncuestasDAO();
        $respuesta=$encuestaDAO->mostrarPreguntas($encuestaDTO);
        return $respuesta;
    }
    static public function mdlMostrarRespuestas($idponencia){ //función para mostrar las respuestas existentes
        $encuestaDTO=new EncuestasDTO(null,null,$idponencia,null,null,null,null); //inicalizamos todo en null por que solo necesitamos la ID
        $encuestaDAO=new EncuestasDAO();
        $respuesta=$encuestaDAO->mostrarRespuestas($encuestaDTO);
        return $respuesta;
    }
    static public function mldEliminarPreguntas($idponencia){
        $encuestaDTO=new EncuestasDTO(null,null,$idponencia,null,null,null,null); //inicalizamos todo en null por que solo necesitamos la ID
        $encuestaDAO=new EncuestasDAO();
        $respuesta=$encuestaDAO->eliminarPreguntas($encuestaDTO);
        return $respuesta;
    }
   

}


