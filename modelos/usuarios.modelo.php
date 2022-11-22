<?php

require_once "conexion.php";

Class ModeloUsuarios{
    //funcion para iniciar sesión
    static public function mdlIniciarSesion($valor){
        $usuarioDTO=new UsuarioDTO(null,$valor,null,null,null,null);
        $usuarioDAO=new UsuarioDAO();
        $respuesta=$usuarioDAO->buscarUsuario($usuarioDTO);
        return $respuesta;

    }

    static public function mdlNuevaContrasena($contrasena,$email){
        $usuarioDTO=new UsuarioDTO(null,null,$email,$contrasena,null,null);
        $usuarioDAO=new UsuarioDAO();
        $respuesta=$usuarioDAO->nuevaContrasena($usuarioDTO);
        return $respuesta;

    }
    static public function mdlValidarCodigo($email,$token,$codigo){
        $usuarioDTO=new UsuarioDTO(null,$codigo,$email,$token,null,null);
        $usuarioDAO=new UsuarioDAO();
        $respuesta=$usuarioDAO->validarCodigo($usuarioDTO);
        return $respuesta;

    }
    //funcion para iniciar sesión
    static public function mdlRestablecerContrasena($email){
        //primero realizamos el cuerpo del correo
        $bytes = random_bytes(5);
        $token =bin2hex($bytes);
        $para  =$email . ', '; 
        $título = 'Restablecer password Sistema Web Para Eventos Educativos';
        $codigo= rand(1000,9999);
        $usuarioDTO=new UsuarioDTO(null,$codigo,$email,$token,null,null);
        $usuarioDAO=new UsuarioDAO();
        $mensaje ='
        <html>
        <head>
        <title>Restablecer</title>
        </head>
        <body>
            <h1>Nombre de la empresa</h1>
            <div style="text-align:center; background-color:#fff">
                <p>Restablecer contraseña</p>
                <h3>'.$codigo.'</h3>
                <p> <a 
                    href="http://localhost/Estadia/vistas/reset.php?email='.$email.'&token='.$token.'"> 
                    para restablecer da click aqui </a> </p>
                <p> <small>Si usted no envio este codigo favor de omitir</small> </p>
            </div>
        </body>
        </html>
        ';
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $respuesta=$usuarioDAO->existeCorreo($usuarioDTO);
        if(mail($para, $título, $mensaje, $cabeceras) && $respuesta==true){
            $respuesta=$usuarioDAO->restablecerContrasena($usuarioDTO);
            return $respuesta;
        }
        return false;

    }


    //consultamos la informacón de los participantes y coordinadores
    static public function mdlMostrarTabla($valor){
        $usuarioDTO=new UsuarioDTO($valor,null,null,null,null,null);
        $usuarioDAO=new UsuarioDAO();
        $respuesta=$usuarioDAO->mostrarUsuarios($usuarioDTO);
        return $respuesta;
    }
        //consultamos a los usuarios inactivos
    static public function mdlMostrarInactivos($valor){
            $usuarioDTO=new UsuarioDTO($valor,null,null,null,null,null);
            $usuarioDAO=new UsuarioDAO();
            $respuesta=$usuarioDAO->mostrarInactivos($usuarioDTO);
            return $respuesta;
        }
    //función para registrar a un usuario
    static public function mdlRegistrarUsuario($rol,$usuario,$correo,$contraseña,$activo){
        $usuarioDTO=new UsuarioDTO($rol,$usuario,$correo,$contraseña,$activo,null);
        $usuarioDAO=new UsuarioDAO();
        $existe=$usuarioDAO->existeUsuario($usuarioDTO);
        if($existe==false){
            $respuesta=$usuarioDAO->registrarUsuario($usuarioDTO);
            return $respuesta;
        }else{
            return false;
        }
  
    }

    static public function mdlEncriptarQR($string){
            $key = "yc10yc20yc30";
			$result = '';
			for ($i = 0; $i < strlen($string); $i++) {
				$char = substr($string, $i, 1);
				$keychar = substr($key, ($i % strlen($key)) - 1, 1);
				$char = chr(ord($char) + ord($keychar));
				$result .= $char;
			}
		return base64_encode($result);
    }
    
    //función para eliminar a un usuario
    static public function mldEliminarUsuario($id){
        $usuarioDTO=new UsuarioDTO(null,null,null,null,null,$id);
        $usuarioDAO=new UsuarioDAO();
        $respuesta=$usuarioDAO->eliminarUsuario($usuarioDTO);
        return $respuesta;
    }

    //función para activar a un usuario
    static public function mldActivarUsuario($id){
        $usuarioDTO=new UsuarioDTO(null,null,null,null,null,$id);
        $usuarioDAO=new UsuarioDAO();
        $respuesta=$usuarioDAO->activarUsuario($usuarioDTO);
        return $respuesta;
    }
    //función para actualizar a un usuario
    static public function mdlActualizarUsuario($usuario,$correo,$id){
        $usuarioDTO=new UsuarioDTO(null,$usuario,$correo,null,null,$id);
        $usuarioDAO=new UsuarioDAO();
        $existe=$usuarioDAO->existeUsuarioActualizacion($usuarioDTO);
        if($existe==false){
            $respuesta=$usuarioDAO->actualizarUsuario($usuarioDTO);
            return $respuesta;
        }else{
            return false;
        }
    }
    //función para importar información con un excel
     static public function mdlImportarExcel(&$targetPath){
        $Reader = new SpreadsheetReader($targetPath);
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i); 
            foreach ($Reader as $Row) 
            {
                if($Row[0]=="ID") continue;
                $usuarioDTO=new UsuarioDTO(3,$Row[1],$Row[2],$Row[3],1,(int)$Row[0]);
                if (!empty($usuarioDTO->getUsuario()) || !empty($usuarioDTO->getContrasena()) || !empty($usuarioDTO->getCorreo()) || !empty($usuarioDTO->getId()) ) {
                    $usuarioDAO=new UsuarioDAO();
                    $respuesta=$usuarioDAO->registrarUsuarioConID($usuarioDTO);
                }
            }
        
        }
        return $respuesta;
        
    }

}


