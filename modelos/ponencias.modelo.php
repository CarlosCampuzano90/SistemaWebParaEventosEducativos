<?php

require_once "conexion.php";

Class ModeloPonencias{

    static public function mdlMostrarPonenciasGraficaPastel(){
        $ponenciaDAO=new PonenciaDAO();
        $respuesta=$ponenciaDAO->mostrarPonenciasGraficaPastel();
        return $respuesta;
    }

    static public function mdlConsultarPonenciasPagadas($idParticipante){
        $ponenciaDTO=new PonenciaDTO(NULL,$idParticipante,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL); //Inicializamos el constructor con toda la información para registrar una ponencia
        $ponenciaDAO=new PonenciaDAO();
        $respuesta=$ponenciaDAO->consultarPonenciasPagadas($ponenciaDTO);
        return $respuesta;
    }
    static public function mdlConsultarUsuariosSinPagar($idponencia){
        $ponenciaDTO=new PonenciaDTO($idponencia,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL); //Inicializamos el constructor con toda la información para registrar una ponencia
        $ponenciaDAO=new PonenciaDAO();
        $respuesta=$ponenciaDAO->consultarUsuariosSinPagar($ponenciaDTO);
        return $respuesta;
    }

    static public function mdlConsultarPonenciasNoPagadas($idParticipante){
        $ponenciaDTO=new PonenciaDTO(NULL,$idParticipante,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL); //Inicializamos el constructor con toda la información para registrar una ponencia
        $ponenciaDAO=new PonenciaDAO();
        $respuesta=$ponenciaDAO->consultarPonenciasNoPagadas($ponenciaDTO);
        return $respuesta;
    }

    static public function mdlRegistrarPago($idParticipante,$idPonencia){
        $ponenciaDTO=new PonenciaDTO($idPonencia,$idParticipante,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL); //Inicializamos el constructor con toda la información para registrar una ponencia
        $ponenciaDAO=new PonenciaDAO();
        $respuesta=$ponenciaDAO->registrarPago($ponenciaDTO);
        return $respuesta;
    }


    static public function mdlMostrarPonenciasPorPeriodo($periodo){ //Mostrar las ponencias totales de un periodo
        $ponenciaDAO=new PonenciaDAO();
        $ponencias=$ponenciaDAO->mostrarPonenciasPorPeriodo($periodo);
        $respuesta = $ponenciaDAO->mostrarPonenciasPorAsistencia($ponencias);
        return $respuesta;
    }

    static public function mdlConsultarInformacion($id){ //función para consultar la informacion de una ponencia
        $ponenciaDTO=new PonenciaDTO($id,null,null,null,null,null,null,null,null,null,null,null,null,null); //inicalizamos todo en null por que solo necesitamos la ID
        $ponenciaDAO=new PonenciaDAO();
        $respuesta=$ponenciaDAO->mostrarPonenciaPonente($ponenciaDTO);
        return $respuesta;
    }

    static public function mdlMostrarInformacion(){ //función para consultar la informacion de  todas las ponencias
        $ponenciaDAO=new PonenciaDAO();
        $respuesta=$ponenciaDAO->mostrarTodasPonencias();
        return $respuesta;
    }

    static public function mdlConsultarInformacionPonencia($id){
        $ponenciaDTO=new PonenciaDTO($id,null,null,null,null,null,null,null,null,null,null,null,null,null); //inicalizamos todo en null por que solo necesitamos la ID
        $ponenciaDAO=new PonenciaDAO();
        $respuesta=$ponenciaDAO->consultarInformacionPonencia($ponenciaDTO);
        return $respuesta;
    }

    
    static public function mdlMostrarPonenciasCalendario(){ //función para consultar las ponencias que se mostraran en el calendario
        $ponenciaDAO=new PonenciaDAO();
        $respuesta=$ponenciaDAO->mostrarPonenciasCalendario();
        return $respuesta;
    }

    static public function mldEliminarPonencia($id){ //función para eliminar la informacion de  una  ponencia
        $ponenciaDTO=new PonenciaDTO($id,null,null,null,null,null,null,null,null,null,null,null,null,null); //inicalizamos todo en null por que solo necesitamos la ID
        $ponenciaDAO=new PonenciaDAO();
        $respuesta=$ponenciaDAO->eliminarPonencia($ponenciaDTO);
        return $respuesta;
    }

    static public function mdlRegistrarPonencia($idCoordinador,$nombre,$fecha,$hora,$espaciosDisponibles,$nombreCompletoPonente,$gradoAcademico,$foto,$firmaDigital,$categoria,$modalidad,$cuenta,$costo){
        $ponenciaDTO=new PonenciaDTO(null,$idCoordinador,$nombre,$fecha,$hora,$espaciosDisponibles,$nombreCompletoPonente,$gradoAcademico,$foto,$firmaDigital,$categoria,$modalidad,$cuenta,$costo); //Inicializamos el constructor con toda la información para registrar una ponencia
        $ponenciaDAO=new PonenciaDAO();
        $respuesta=$ponenciaDAO->registrarPonencia($ponenciaDTO);
        return $respuesta;
    }

    static public function mdlRegistrarParticipantePonencia($idParticipante,$idPonencia){
        $ponenciaDTO=new PonenciaDTO($idPonencia,$idParticipante,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL); //Inicializamos el constructor con toda la información para registrar una ponencia
        $ponenciaDAO=new PonenciaDAO();
        $existe=$ponenciaDAO->existeRegistroParticipante($ponenciaDTO);
        if($existe==false){
            $respuesta=$ponenciaDAO->registrarUsuarioPonencia($ponenciaDTO);
            return $respuesta;
        }else{
            return false;
        }

    }

    static public function mdlActualizarPonente($id,$nombreCompletoPonente,$gradoAcademico,$foto,$firmaDigital){ //función para actualizar al ponente solamente
        $ponenciaDTO=new PonenciaDTO($id,NULL,NULL,NULL,NULL,NULL,$nombreCompletoPonente,$gradoAcademico,$foto,$firmaDigital,NULL,NULL,NULL,NULL); // Solo llenamos la información del ponente en este constructor
        /*$ponenciaDTO=PonenciaDTO::constructorPorDefecto();
        $ponenciaDTO->setNombreCompletoPonente($nombreCompletoPonente);
        $ponenciaDTO->setGradoAcademico($gradoAcademico);
        $ponenciaDTO->setFoto($foto);
        $ponenciaDTO->setFirmaDigital($firmaDigital);
        $ponenciaDTO->setIdponencia($id);*/
        $ponenciaDAO=new PonenciaDAO();
        $respuesta=$ponenciaDAO->actualizarPonente($ponenciaDTO);
        return $respuesta;
    }

    static public function mdlActualizarPonencia($id,$idCoordinador,$nombre,$fecha,$hora,$espaciosDisponibles,$categoria,$modalidad,$cuenta,$costo){ //función para actualizar a la ponencia sin el ponente solamente
        $ponenciaDTO=new PonenciaDTO($id,$idCoordinador,$nombre,$fecha,$hora,$espaciosDisponibles,NULL,NULL,NULL,NULL,$categoria,$modalidad,$cuenta,$costo); // Llenamos toda la información de la ponencia con excepción del ponente
        $ponenciaDAO=new PonenciaDAO();
        $respuesta=$ponenciaDAO->actualizarPonencia($ponenciaDTO);
        return $respuesta;
    }


}


