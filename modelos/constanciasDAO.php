<?php

require_once "conexion.php";

Class ConstanciaDAO {
    public function consultarConstancias(){
        $x=Conexion::conectar()->prepare("SELECT id,nombre,idPonencia FROM constancia");
        $x->execute();
        return $x->fetchAll();

    }
    public function consultarConstancia(ConstanciaDTO $constancia){
        $sentencia=Conexion::conectar()->prepare("SELECT * FROM constancia WHERE id=:id");
        $sentencia->bindValue(':id',$constancia->getId(),PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetch();
    }

    public function consultarPonenciasSinConstancia(){ // con esta función obtenemos ponencias las cuales aun no tienen una constancia relacionada

        $x=Conexion::conectar()->prepare("SELECT nombre, idponencia
        FROM ponencia
        WHERE idponencia NOT IN (SELECT idPonencia
                             FROM constancia)");
        $x->execute();
        return $x->fetchAll();

    }

    public function registrarConstancia(ConstanciaDTO $constancia){
        $sentencia = Conexion::conectar()->prepare("INSERT INTO constancia
        (nombre,fechaEvento,firmaDigitalPonente,firmaDigitalCoordinador,textoAgradecimiento,idPonencia)
            VALUES
            (:nombre,:fechaEvento,:firmaDigitalPonente,:firmaDigitalCoordinador,:textoAgradecimiento,:idPonencia)");
        $sentencia->bindValue(":nombre",$constancia->getNombre(),PDO::PARAM_STR);
        $sentencia->bindValue(":fechaEvento",$constancia->getFechaEvento(),PDO::PARAM_STR);
        $sentencia->bindValue(":firmaDigitalPonente",$constancia->getFirmaDigitalPonente(),PDO::PARAM_LOB);
        $sentencia->bindValue(":firmaDigitalCoordinador",$constancia->getFirmaDigitalCoordinador(),PDO::PARAM_LOB);
        $sentencia->bindValue(":textoAgradecimiento",$constancia->getTextoAgradecimiento(),PDO::PARAM_STR);
        $sentencia->bindValue(":idPonencia",$constancia->getIdPonencia(),PDO::PARAM_INT);

        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }
    }

    public function actualizarConstancia(ConstanciaDTO $constancia){
        if($constancia->getFirmaDigitalCoordinador()==FALSE){
            $sentencia = Conexion::conectar()->prepare("UPDATE constancia SET textoAgradecimiento=:textoAgradecimiento WHERE id=:id");
            $sentencia->bindValue(":textoAgradecimiento",$constancia->getTextoAgradecimiento(),PDO::PARAM_STR);    
            $sentencia->bindValue(':id',$constancia->getId(),PDO::PARAM_INT);
        }else{
            $sentencia = Conexion::conectar()->prepare("UPDATE constancia SET firmaDigitalCoordinador=:firmaDigitalCoordinador, textoAgradecimiento=:textoAgradecimiento WHERE id=:id ");
            $sentencia->bindValue(":firmaDigitalCoordinador",$constancia->getFirmaDigitalCoordinador(),PDO::PARAM_LOB);
            $sentencia->bindValue(":textoAgradecimiento",$constancia->getTextoAgradecimiento(),PDO::PARAM_STR);    
            $sentencia->bindValue(':id',$constancia->getId(),PDO::PARAM_INT);
        }

        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }
    }
    
    public function eliminarConstancia(ConstanciaDTO $constancia){
        $sentencia = Conexion::conectar()->prepare("DELETE FROM constancia WHERE id = :id");
        $sentencia->bindValue(':id',$constancia->getId(),PDO::PARAM_INT);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }
    }

    public function consultarInformacionPonencia($id){
            $x=Conexion::conectar()->prepare("SELECT * FROM ponencia WHERE idponencia=:id");
            $x->bindValue(":id",$id,PDO::PARAM_INT);
            $x->execute();
            return $x->fetch();
    }

}
?>