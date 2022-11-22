<?php
class UsuarioDTO
{
    //atributos de la clase
    private $id_rol,$usuario,$correo,$contrasena,$activo,$id;
    //constructor de la clase asesor
    public function __construct($id_rol,$usuario,$correo,$contrasena,$activo,$id)
    {
        $this->id_rol=$id_rol;
        $this->usuario = $usuario;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->activo = $activo;
        $this->id = $id;
        
        
    }


    public static function constructorPorDefecto() {
            $obj = new UsuarioDTO(null,null,null,null,null,null); 
            // other initialization
            return $obj;
        }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
        }

    public function getUsuario(){
        return $this->usuario;
        }

    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
        }

    public function getContrasena(){
        return $this->contrasena;
        }
    
    public function setRol($id_rol){
        $this->rol = $id_rol;
        }

    public function getRol(){
        return $this->id_rol;
        }    

    public function setEstado($activo){
        $this->activo = $activo;
        }

    public function getEstado(){
        return $this->activo;
        }  

        
    public function setCorreo($correo){
        $this->correo = $correo;
        }

    public function getCorreo(){
        return $this->correo;
        } 

    public function setId($id){
        $this->id = $id;
        }

    public function getId(){
        return $this->id;
        } 

}
?>