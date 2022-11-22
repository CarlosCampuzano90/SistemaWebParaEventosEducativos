<?php

require_once "conexion.php";

Class UsuarioDAO {
// funcion que nos permite buscar a un usuario
    public function buscarUsuario(UsuarioDTO $usuario){


            $x=Conexion::conectar()->prepare("SELECT * FROM usuarios where usuario = :nombreUsuario");
            $x->bindValue(':nombreUsuario',$usuario->getUsuario(),PDO::PARAM_STR);
            $x->execute();
            $intento=Conexion::conectar()->prepare("UPDATE usuarios SET ultimo_login = :ahora WHERE  usuario = :nombreUsuario");
            date_default_timezone_set("America/Mexico_City");
            $intento->bindValue(':ahora',date("Y-m-d H:i:s"),PDO::PARAM_STR);
            $intento->bindValue(':nombreUsuario',$usuario->getUsuario(),PDO::PARAM_STR);
            $intento->execute();
            return $x->fetch();
  


    }
// Funcion que muestra a los coordinadores y participantes que estan activos
     public function mostrarUsuarios(UsuarioDTO $usuario){
            $x=Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE rol_id=:rol AND estado=1");
            $x->bindValue(":rol",$usuario->getRol(),PDO::PARAM_INT);
            $x->execute();
            return $x->fetchAll();
   
    }
    public function validarCodigo(UsuarioDTO $usuario){
             $sentencia=Conexion::conectar()->prepare("SELECT * FROM passwords WHERE 
             email=:email and token=:token and codigo=:codigo");
             $sentencia->bindValue(":email",$usuario->getCorreo(),PDO::PARAM_STR);
             $sentencia->bindValue(":token",$usuario->getContrasena(),PDO::PARAM_STR);
             $sentencia->bindValue(':codigo',$usuario->getUsuario(),PDO::PARAM_STR);
             $sentencia->execute();
            return $sentencia->fetch();

    }

    public function nuevaContrasena(UsuarioDTO $usuario){
        $sentencia = Conexion::conectar()->prepare("UPDATE usuarios SET contrasena=:contrasena
        WHERE correo=:correo");
        $password_hash = password_hash( $usuario->getContrasena(), PASSWORD_BCRYPT);
        $sentencia->bindValue(':contrasena',$password_hash,PDO::PARAM_STR);
        $sentencia->bindValue(":correo",$usuario->getCorreo(),PDO::PARAM_STR);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
            return false;
        }
    }

    // Funcion que muestra los participantes que estan inactivos
    public function mostrarInactivos(UsuarioDTO $usuario){
 
        $x=Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE rol_id=:rol AND estado=0");
        $x->bindValue(":rol",$usuario->getUsuario(),PDO::PARAM_INT);
        $x->execute();
        return $x->fetchAll();


    }

    public function restablecerContrasena(UsuarioDTO $usuario){ //insertar en la tabla password los datos para restablecer la contrasena

        $sentencia = Conexion::conectar()->prepare("INSERT INTO passwords(email, token, codigo) 
            VALUES
            (:email,:token,:codigo)");
        $sentencia->bindValue(":email",$usuario->getCorreo(),PDO::PARAM_STR);
        $sentencia->bindValue(":token",$usuario->getContrasena(),PDO::PARAM_STR);
        $sentencia->bindValue(':codigo',$usuario->getUsuario(),PDO::PARAM_STR);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }

    }
        // función que comprueba si existe el usuario y el correo en la base de datos para no registrar usuarios duplicados
        public function existeCorreo(UsuarioDTO $usuario){
            $x=Conexion::conectar()->prepare("SELECT * FROM usuarios where correo=:correo");
            $x->bindValue(':correo',$usuario->getCorreo(),PDO::PARAM_STR);
            $x->execute();
            $correo= $x->fetchColumn();
            if($correo==true){
                return true;
            }else{
                return false;
            }
         
        }




    // función que comprueba si existe el usuario y el correo en la base de datos para no registrar usuarios duplicados
    public function existeUsuario(UsuarioDTO $usuario){
        $x=Conexion::conectar()->prepare("SELECT * FROM usuarios where usuario = :nombreUsuario");
        $x->bindValue(':nombreUsuario',$usuario->getUsuario(),PDO::PARAM_STR);
        $x->execute();
        $nombre= $x->fetchColumn();
        $x=Conexion::conectar()->prepare("SELECT * FROM usuarios where correo=:correo");
        $x->bindValue(':correo',$usuario->getCorreo(),PDO::PARAM_STR);
        $x->execute();
        $correo= $x->fetchColumn();
        if($correo==false && $nombre==false){
            return false;
        }else{
            return true;
        }
     
    }
    // función que comprueba si existe el usuario para no registrar usuarios duplicados
    public function existeUsuarioActualizacion(UsuarioDTO $usuario){
        $x=Conexion::conectar()->prepare("SELECT * FROM usuarios where usuario = :nombreUsuario");
        $x->bindValue(':nombreUsuario',$usuario->getUsuario(),PDO::PARAM_STR);
        $x->execute();
        $nombre= $x->fetchColumn();
        $x=Conexion::conectar()->prepare("SELECT * FROM usuarios where correo=:correo");
        $x->bindValue(':correo',$usuario->getCorreo(),PDO::PARAM_STR);
        $x->execute();
        $correo= $x->fetchColumn();
        if(($correo==true && $nombre==false) || ($correo==false && $nombre==true)){
            return false;
        }else{
            return true;
        }
     
    }
    public function registrarUsuario(UsuarioDTO $usuario){

        $sentencia = Conexion::conectar()->prepare("INSERT INTO usuarios
        (usuario,correo,contrasena,estado,rol_id)
            VALUES
            (:usuario,:correo,:contrasena,:estado,:rol)");
        $sentencia->bindValue(":usuario",$usuario->getUsuario(),PDO::PARAM_STR);
        $sentencia->bindValue(":correo",$usuario->getCorreo(),PDO::PARAM_STR);
        $password_hash = password_hash( $usuario->getContrasena(), PASSWORD_BCRYPT);
        $sentencia->bindValue(':contrasena',$password_hash,PDO::PARAM_STR);
        $sentencia->bindValue(":estado",$usuario->getEstado(),PDO::PARAM_INT);
        $sentencia->bindValue(":rol",$usuario->getRol(),PDO::PARAM_INT);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }

    }

    public function registrarUsuarioConID(UsuarioDTO $usuario){
        $sentencia = Conexion::conectar()->prepare("INSERT INTO usuarios
        (id,usuario,correo,contrasena,estado,rol_id)
            VALUES
            (:id,:usuario,:correo,:contrasena,:estado,:rol)");
        $sentencia->bindValue(":id",$usuario->getId(),PDO::PARAM_INT);
        $sentencia->bindValue(":usuario",$usuario->getUsuario(),PDO::PARAM_STR);
        $sentencia->bindValue(":correo",$usuario->getCorreo(),PDO::PARAM_STR);
        $password_hash = password_hash( $usuario->getContrasena(), PASSWORD_BCRYPT);
        $sentencia->bindValue(":contrasena",$password_hash,PDO::PARAM_STR);
        $sentencia->bindValue(":estado",$usuario->getEstado(),PDO::PARAM_INT);
        $sentencia->bindValue(":rol",$usuario->getRol(),PDO::PARAM_INT);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }

    }

    public function actualizarUsuario(UsuarioDTO $usuario){
        $sentencia = Conexion::conectar()->prepare("UPDATE usuarios SET usuario=:usuario, correo=:correo
                WHERE id=:id");
        $sentencia->bindValue(":usuario",$usuario->getUsuario(),PDO::PARAM_STR);
        $sentencia->bindValue(":correo",$usuario->getCorreo(),PDO::PARAM_STR);
        $sentencia->bindValue(":id",$usuario->getId(),PDO::PARAM_INT);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }

    }

    public function eliminarUsuario(UsuarioDTO $usuario){
        $sentencia = Conexion::conectar()->prepare("DELETE FROM usuarios WHERE id = :id");
        $sentencia->bindValue(':id',$usuario->getId(),PDO::PARAM_INT);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }

    }


    public function  activarUsuario(UsuarioDTO $usuario){
        $sentencia = Conexion::conectar()->prepare("UPDATE usuarios SET estado=1 WHERE id=:id");
        $sentencia->bindValue(':id',$usuario->getId(),PDO::PARAM_INT);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }

    }
}
?>