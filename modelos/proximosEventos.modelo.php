<?php

require_once "conexion.php";

Class ModeloProximosEventos{
    static public function mdlConsultarInformacion(){
        $eventosDTO=ProximosEventosDTO::constructorPorDefecto();
        $eventosDAO=new ProximosEventosDAO();
        $respuesta=$eventosDAO->mostrarProximosEventos($eventosDTO);
        return $respuesta;
    }

    static public function  mdlConsultarProximosEventos(){
        $eventosDTO=ProximosEventosDTO::constructorPorDefecto();
        $eventosDAO=new ProximosEventosDAO();
        $respuesta=$eventosDAO->mostrarProximosEventosInicio($eventosDTO);
        return $respuesta;
    }
    static public function mdlConsultarInformacionUno($id){
        $eventosDTO=new ProximosEventosDTO($id,null,null,null,null,null,null,null,null);
        $eventosDAO=new ProximosEventosDAO();
        $respuesta=$eventosDAO->mostrarProximosEventosUno($eventosDTO);
        return $respuesta;
    }

    static public function mdlRegistrarEventos($usuarios_id,$foto,$tituloEvento,$fechaProxima,$descripcion,$nombrePonente,$cupo,$tipoDeEvento){
        $eventosDTO=new ProximosEventosDTO(null,$usuarios_id,$foto,$tituloEvento,$fechaProxima,$descripcion,$nombrePonente,$cupo,$tipoDeEvento);
        $eventosDAO=new ProximosEventosDAO();
        $respuesta=$eventosDAO->registrarEventos($eventosDTO);
        return $respuesta;
    }
    

    static public function mldEliminarEventos($id){
        $eventosDTO=new ProximosEventosDTO($id,null,null,null,null,null,null,null,null);
        $eventosDAO=new ProximosEventosDAO();
        $respuesta=$eventosDAO->eliminarEventos($eventosDTO);
        return $respuesta;
    }

    static public function mdlActualizarEventos($usuarios_id,$foto,$tituloEvento,$fechaProxima,$descripcion,$nombrePonente,$cupo,$tipoDeEvento,$id){
        $eventosDTO=new ProximosEventosDTO($id,$usuarios_id,$foto,$tituloEvento,$fechaProxima,$descripcion,$nombrePonente,$cupo,$tipoDeEvento);
        $eventosDAO=new ProximosEventosDAO();
        $respuesta=$eventosDAO->actualizarEventos($eventosDTO);
        return $respuesta;
    }

    


}


