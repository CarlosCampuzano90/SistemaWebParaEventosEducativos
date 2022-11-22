<?php

require_once "conexion.php";

Class ProximosEventosDAO {


     public function mostrarProximosEventos(ProximosEventosDTO $eventos){ //función para consultar la informacion de los eventos en la base de datos
        $x=Conexion::conectar()->prepare("SELECT * FROM proximoseventos");
        $x->execute();
        return $x->fetchAll();

    }

    public function mostrarProximosEventosInicio(){ //Función para mostrar los proximos eventos en la pagina de inicio
        $fechaActual = date('Y-m-d');
        $x=Conexion::conectar()->prepare("SELECT * FROM proximoseventos WHERE fechaProxima > :fechaActual ");
        $x->bindValue(":fechaProxima",$fechaActual,PDO::PARAM_STR);
        $x->execute();
        return $x->fetchAll();

    }
    public function mostrarProximosEventosUno(ProximosEventosDTO $eventos){ // función para mostrar un evento
        $x=Conexion::conectar()->prepare("SELECT * FROM proximoseventos WHERE id=:id ");
        $x->bindValue(":id",$eventos->getId(),PDO::PARAM_INT);
        $x->execute();
        return $x->fetch();

    }


    
    public function registrarEventos(ProximosEventosDTO $eventos){ //función para registrar la informacion de los eventos en la base de datos
        $sentencia =Conexion::conectar()->prepare("INSERT INTO proximoseventos
        (usuarios_id,foto,tituloEvento,fechaProxima,descripcion,nombrePonente,cupo,tipoDeEvento)
            VALUES
            (:usuarios_id,:foto,:tituloEvento,:fechaProxima,:descripcion,:nombrePonente,:cupo,:tipoDeEvento)");
        $sentencia->bindValue(":usuarios_id",$eventos->getUsuarios_id(),PDO::PARAM_INT);
        $sentencia->bindValue(":foto",$eventos->getFoto(),PDO::PARAM_LOB);
        $sentencia->bindValue(":tituloEvento",$eventos->getTituloEvento(),PDO::PARAM_STR);
        $sentencia->bindValue(":fechaProxima",$eventos->getFechaProxima(),PDO::PARAM_STR);
        $sentencia->bindValue(":descripcion",$eventos->getDescripcion(),PDO::PARAM_STR);
        $sentencia->bindValue(":nombrePonente",$eventos->getNombrePonente(),PDO::PARAM_STR);
        $sentencia->bindValue(":cupo",$eventos->getCupo(),PDO::PARAM_INT);
        $sentencia->bindValue(":tipoDeEvento",$eventos->getTipoDeEvento(),PDO::PARAM_STR);
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



    public function actualizarEventos(ProximosEventosDTO $eventos){ //función para actualizar la informacion del usuario en la base de datos
        if($eventos->getFoto()==FALSE){ //Si no hay foto del usuario entonces no la actualizamos
            $sentencia = Conexion::conectar()->prepare("UPDATE proximoseventos SET tituloEvento=:tituloEvento, fechaProxima=:fechaProxima
            ,descripcion=:descripcion,nombrePonente=:nombrePonente,cupo=:cupo,tipoDeEvento=:tipoDeEvento WHERE id=:id");
            $sentencia->bindValue(":id",$eventos->getId(),PDO::PARAM_INT);
            $sentencia->bindValue(":tituloEvento",$eventos->getTituloEvento(),PDO::PARAM_STR);
            $sentencia->bindValue(":fechaProxima",$eventos->getFechaProxima(),PDO::PARAM_STR);
            $sentencia->bindValue(":descripcion",$eventos->getDescripcion(),PDO::PARAM_STR);
            $sentencia->bindValue(":nombrePonente",$eventos->getNombrePonente(),PDO::PARAM_STR);
            $sentencia->bindValue(":cupo",$eventos->getCupo(),PDO::PARAM_INT);
            $sentencia->bindValue(":tipoDeEvento",$eventos->getTipoDeEvento(),PDO::PARAM_STR);
            $sentencia->execute();
            $count = $sentencia->rowCount();
        }else{ //Si hay foto del evento entonces la actualizamos
            $sentencia = Conexion::conectar()->prepare("UPDATE proximoseventos SET tituloEvento=:tituloEvento, fechaProxima=:fechaProxima
            ,descripcion=:descripcion,nombrePonente=:nombrePonente,cupo=:cupo,tipoDeEvento=:tipoDeEvento,foto=:foto WHERE id=:id");
            $sentencia->bindValue(":id",$eventos->getId(),PDO::PARAM_INT);
            $sentencia->bindValue(":tituloEvento",$eventos->getTituloEvento(),PDO::PARAM_STR);
            $sentencia->bindValue(":fechaProxima",$eventos->getFechaProxima(),PDO::PARAM_STR);
            $sentencia->bindValue(":descripcion",$eventos->getDescripcion(),PDO::PARAM_STR);
            $sentencia->bindValue(":nombrePonente",$eventos->getNombrePonente(),PDO::PARAM_STR);
            $sentencia->bindValue(":cupo",$eventos->getCupo(),PDO::PARAM_INT);
            $sentencia->bindValue(":tipoDeEvento",$eventos->getTipoDeEvento(),PDO::PARAM_STR);  
            $sentencia->bindValue(":foto",$eventos->getFoto(),PDO::PARAM_LOB);   
            $sentencia->execute();
            $count = $sentencia->rowCount();
            
        }

        if($count>0){
            return true;
        }else{
             $console = implode(',', $sentencia->errorInfo());
             echo "<script>console.log('Console: " . $console. "' );</script>";
             return false;
        }

    }

    public function eliminarEventos(ProximosEventosDTO $eventos){ //función para eliminar la informacion de los proximos eventos en la base de datos
        $sentencia = Conexion::conectar()->prepare("DELETE FROM proximoseventos WHERE id = :id");
        
        $sentencia->bindValue(":id",$eventos->getId(),PDO::PARAM_INT);
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