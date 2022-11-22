<?php

require_once "conexion.php";

Class UsuarioInformacionDAO {



     public function mostrarUsuarioInformacion(UsuarioInformacionDTO $usuario){ //función para consultar la informacion del usuario en la base de datos
        $x=Conexion::conectar()->prepare("SELECT * FROM usuario_informacion WHERE idUsuario=:id");
        $x->bindValue(":id",$usuario->getId(),PDO::PARAM_INT);
        $x->execute();
        return $x->fetch();

    }

    public function mostrarUsuarioNombre(UsuarioInformacionDTO $usuario){
        $x=Conexion::conectar()->prepare("SELECT nombre, apellido FROM usuario_informacion WHERE idUsuario=:id");
        $x->bindValue(":id",$usuario->getId(),PDO::PARAM_INT);
        $x->execute();
        return $x->fetch();
    }

    public function registrarUsuario(UsuarioInformacionDTO $usuario){ //función para registrar la informacion del usuario en la base de datos
        $sentencia =Conexion::conectar()->prepare("INSERT INTO usuario_informacion
        (idUsuario,nombre,apellido,matricula,gradoYgrupo,puesto,foto,sexo)
            VALUES
            (:idUsuario,:nombre,:apellido,:matricula,:gradoYgrupo,:puesto,:foto,:sexo)");
        $sentencia->bindValue(":idUsuario",$usuario->getId(),PDO::PARAM_INT);
        $sentencia->bindValue(":nombre",$usuario->getNombre(),PDO::PARAM_STR);
        $sentencia->bindValue(":apellido",$usuario->getApellido(),PDO::PARAM_STR);
        $sentencia->bindValue(":matricula",$usuario->getMatricula(),PDO::PARAM_STR);
        $sentencia->bindValue(":gradoYgrupo",$usuario->getGrado(),PDO::PARAM_STR);
        $sentencia->bindValue(":puesto",$usuario->getPuesto(),PDO::PARAM_STR);
        $sentencia->bindValue(":foto",$usuario->getFoto(),PDO::PARAM_LOB);
        $sentencia->bindValue(":sexo",$usuario->getGenero(),PDO::PARAM_STR);
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



    public function actualizarUsuario(UsuarioInformacionDTO $usuario){ //función para actualizar la informacion del usuario en la base de datos
        if($usuario->getFoto()==FALSE){ //Si no hay foto del usuario entonces no la actualizamos
            $sentencia = Conexion::conectar()->prepare("UPDATE usuario_informacion SET nombre=:nombre, apellido=:apellido
            ,matricula=:matricula,gradoYgrupo=:gradoYgrupo,puesto=:puesto,sexo=:sexo WHERE id=:id");
            $sentencia->bindValue(":nombre",$usuario->getNombre(),PDO::PARAM_STR);
            $sentencia->bindValue(":apellido",$usuario->getApellido(),PDO::PARAM_STR);
            $sentencia->bindValue(":matricula",$usuario->getMatricula(),PDO::PARAM_STR);
            $sentencia->bindValue(":gradoYgrupo",$usuario->getGrado(),PDO::PARAM_STR);
            $sentencia->bindValue(":puesto",$usuario->getPuesto(),PDO::PARAM_STR);
            $sentencia->bindValue(":sexo",$usuario->getGenero(),PDO::PARAM_STR);
            $sentencia->bindValue(":id",$usuario->getId(),PDO::PARAM_INT);
            $sentencia->execute();
            $count = $sentencia->rowCount();
        }else{ //Si hay foto del usuario entonces la actualizamos
            $sentencia = Conexion::conectar()->prepare("UPDATE usuario_informacion SET nombre=:nombre, apellido=:apellido
            ,matricula=:matricula,gradoYgrupo=:gradoYgrupo,puesto=:puesto,sexo=:sexo,foto=:foto WHERE id=:id");
            $sentencia->bindValue(":nombre",$usuario->getNombre(),PDO::PARAM_STR);
            $sentencia->bindValue(":apellido",$usuario->getApellido(),PDO::PARAM_STR);
            $sentencia->bindValue(":matricula",$usuario->getMatricula(),PDO::PARAM_STR);
            $sentencia->bindValue(":gradoYgrupo",$usuario->getGrado(),PDO::PARAM_STR);
            $sentencia->bindValue(":puesto",$usuario->getPuesto(),PDO::PARAM_STR);
            $sentencia->bindValue(":sexo",$usuario->getGenero(),PDO::PARAM_STR);
            $sentencia->bindValue(":foto",$usuario->getFoto(),PDO::PARAM_LOB);
            $sentencia->bindValue(":id",$usuario->getId(),PDO::PARAM_INT);
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

    public function eliminarUsuario(UsuarioInformacionDTO $usuario){ //función para eliminar la informacion del usuario en la base de datos
        $sentencia = Conexion::conectar()->prepare("DELETE FROM usuario_informacion WHERE id = :id");
        $sentencia->bindValue(':id',$usuario->getId(),PDO::PARAM_INT);
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