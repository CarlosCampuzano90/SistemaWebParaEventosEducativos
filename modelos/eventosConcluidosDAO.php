<?php

require_once "conexion.php";

Class EventosConcluidosDAO {

    public function existeEventoConcluido(EventosConcluidosDTO $evento){ // función para mostrar un evento
        $x=Conexion::conectar()->prepare("SELECT titulo FROM eventoconcluido WHERE proximosEventos_id=:id ");
        $x->bindValue(":id",$evento->getProximoEvento(),PDO::PARAM_INT);
        $x->execute();
        return $x->fetch();

    }

    public function consultarEvento(EventosConcluidosDTO $evento){ // función para mostrar un evento
        $x=Conexion::conectar()->prepare("SELECT * FROM eventoconcluido WHERE proximosEventos_id=:id ");
        $x->bindValue(":id",$evento->getProximoEvento(),PDO::PARAM_INT);
        $x->execute();
        return $x->fetch();
    }

    public function consultarTodosLosEventos(){
        $x=Conexion::conectar()->prepare("SELECT * FROM eventoconcluido");
        $x->execute();
        return $x->fetchAll();
    }

    public function eliminarEvento(EventosConcluidosDTO $evento){ // función para mostrar un evento
        $sentencia=Conexion::conectar()->prepare("DELETE FROM eventoconcluido WHERE id=:id ");
        $sentencia->bindValue(":id",$evento->getId(),PDO::PARAM_INT);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }
    }


    public function registrarEventoConcluido(EventosConcluidosDTO $evento){
        $sentencia =Conexion::conectar()->prepare("INSERT INTO eventoConcluido
        (titulo,fecha,descripcion,imagen,proximosEventos_id)
            VALUES
            (:titulo,:fecha,:descripcion,:imagen,:proximosEventos_id)");
        $sentencia->bindValue(":titulo",$evento->getTituloEvento(),PDO::PARAM_STR);
        $sentencia->bindValue(":fecha",$evento->getFecha(),PDO::PARAM_STR);
        $sentencia->bindValue(":descripcion",$evento->getDescripcion(),PDO::PARAM_STR);
        $sentencia->bindValue(":imagen",$evento->getImagen(),PDO::PARAM_LOB);
        $sentencia->bindValue(":proximosEventos_id",$evento->getProximoEvento(),PDO::PARAM_INT);

        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
            $console = implode(',', $sentencia->errorInfo());
            echo "<script>console.log('Console: " . $console . "' );</script>";
            return false;
        }
    }

    public function actualizarEventoConcluido(EventosConcluidosDTO $evento){
        if($evento->getImagen()==FALSE){
            $sentencia =Conexion::conectar()->prepare("UPDATE eventoConcluido SET titulo = :titulo, 
             fecha = :fecha, descripcion = :descripcion WHERE proximosEventos_id=:id");
            $sentencia->bindValue(":titulo",$evento->getTituloEvento(),PDO::PARAM_STR);
            $sentencia->bindValue(":fecha",$evento->getFecha(),PDO::PARAM_STR);
            $sentencia->bindValue(":descripcion",$evento->getDescripcion(),PDO::PARAM_STR);
            $sentencia->bindValue(":id",$evento->getId(),PDO::PARAM_INT);
    
        }else{
            $sentencia =Conexion::conectar()->prepare("UPDATE eventoConcluido SET titulo = :titulo, 
             fecha = :fecha, descripcion = :descripcion, imagen=:imagen WHERE proximosEventos_id=:id");
            $sentencia->bindValue(":titulo",$evento->getTituloEvento(),PDO::PARAM_STR);
            $sentencia->bindValue(":fecha",$evento->getFecha(),PDO::PARAM_STR);
            $sentencia->bindValue(":descripcion",$evento->getDescripcion(),PDO::PARAM_STR);
            $sentencia->bindValue(":imagen",$evento->getImagen(),PDO::PARAM_LOB);
            $sentencia->bindValue(":id",$evento->getId(),PDO::PARAM_INT);
        }


        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
            $console = implode(',', $sentencia->errorInfo());
            echo "<script>console.log('Console: " . $console . "' );</script>";
            return false;
        }
    }


}
?>