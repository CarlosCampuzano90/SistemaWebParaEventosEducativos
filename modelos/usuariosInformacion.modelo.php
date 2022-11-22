<?php

require_once "conexion.php";

Class ModeloUsuariosInformacion{
    static public function mdlConsultarInformacion($id){
        $usuarioDTO=new UsuarioInformacionDTO(null,null,null,null,null,null,null,$id);
        $usuarioDAO=new UsuarioInformacionDAO();
        $respuesta=$usuarioDAO->mostrarUsuarioInformacion($usuarioDTO);
        return $respuesta;
    }

    static public function mdlConsultarNombre($id){
        $usuarioDTO=new UsuarioInformacionDTO(null,null,null,null,null,null,null,$id);
        $usuarioDAO=new UsuarioInformacionDAO();
        $respuesta=$usuarioDAO->mostrarUsuarioNombre($usuarioDTO);
        return $respuesta;
    }


    static public function mdlRegistrarUsuario($nombre,$apellido,$matricula,$grado,$puesto,$genero,$foto,$id){
        $usuarioDTO=new UsuarioInformacionDTO($nombre,$apellido,$matricula,$grado,$puesto,$genero,$foto,$id);
        $usuarioDAO=new UsuarioInformacionDAO();
        $respuesta=$usuarioDAO->registrarUsuario($usuarioDTO);
        return $respuesta;
    }
    

    static public function mldEliminarUsuario($id){
        $usuarioDTO=new UsuarioInformacionDTO(null,null,null,null,null,null,null,$id);
        $usuarioDAO=new UsuarioInformacionDAO();
        $respuesta=$usuarioDAO->eliminarUsuario($usuarioDTO);
        return $respuesta;
    }

    static public function mdlActualizarUsuario($nombre,$apellido,$matricula,$grado,$puesto,$genero,$foto,$id){
        $usuarioDTO=new UsuarioInformacionDTO($nombre,$apellido,$matricula,$grado,$puesto,$genero,$foto,$id);
        $usuarioDAO=new UsuarioInformacionDAO();
        $respuesta=$usuarioDAO->actualizarUsuario($usuarioDTO);
        return $respuesta;
    }

    


}


