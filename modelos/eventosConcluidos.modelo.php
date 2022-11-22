<?php

require_once "conexion.php";

Class ModeloEventosConcluidos{
    static public function mdlConsultarInformacionUno($id){
        $eventosDTO=new EventosConcluidosDTO(null,$id,null,null,null,null);
        $eventosDAO=new EventosConcluidosDAO();
        $respuesta=$eventosDAO->existeEventoConcluido($eventosDTO);
        return $respuesta;
    }

    static public function mdlConsultarEventoUno($id){
        $eventosDTO=new EventosConcluidosDTO(null,$id,null,null,null,null);
        $eventosDAO=new EventosConcluidosDAO();
        $respuesta=$eventosDAO->consultarEvento($eventosDTO);
        return $respuesta;
    }

    static public function mdlConsultarEventos(){
        $eventosDAO=new EventosConcluidosDAO();
        $respuesta=$eventosDAO->consultarTodosLosEventos();
        return $respuesta;
    }

    static public function mldEliminarEvento($id){
        $eventosDTO=new EventosConcluidosDTO($id,null,null,null,null,null);
        $eventosDAO=new EventosConcluidosDAO();
        $respuesta=$eventosDAO->eliminarEvento($eventosDTO);
        return $respuesta;
    }
    static public function mdlRegistrarEventoConcluido($proximosEventos_id,$imagen,$descripcion){
        $eventosDTO=new ProximosEventosDTO($proximosEventos_id,null,null,null,null,null,null,null,null);
        $eventosDAO=new ProximosEventosDAO();
        $respuesta=$eventosDAO->mostrarProximosEventosUno($eventosDTO);
        $eventosDTO=new EventosConcluidosDTO(null,$proximosEventos_id,$imagen,$respuesta["tituloEvento"],$respuesta["fechaProxima"],$descripcion);
        $eventosDAO=new EventosConcluidosDAO();
        $respuesta=$eventosDAO->registrarEventoConcluido($eventosDTO);
        return $respuesta;
    }

    static public function mdlActualizarEventoConcluido($id,$imagen,$descripcion,$tituloEvento,$fecha){
        $eventosDTO=new EventosConcluidosDTO($id,null,$imagen,$tituloEvento,$fecha,$descripcion);
        $eventosDAO=new EventosConcluidosDAO();
        $respuesta=$eventosDAO->actualizarEventoConcluido($eventosDTO);
        return $respuesta;
    }


}


