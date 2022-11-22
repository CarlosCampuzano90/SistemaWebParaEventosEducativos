<?php
class UsuarioInformacionDTO
{
    //atributos de la clase
    private $nombre,$apellido,$matricula,$grado,$puesto,$genero,$foto,$id;
    //constructor de la clase asesor
    public function __construct($nombre,$apellido,$matricula,$grado,$puesto,$genero,$foto,$id)
    {
        $this->nombre=$nombre;
        $this->apellido = $apellido;
        $this->matricula = $matricula;
        $this->grado = $grado;
        $this->puesto = $puesto;
        $this->foto = $foto;
        $this->genero = $genero;
        $this->id = $id;
        
        
    }


    public static function constructorPorDefecto() {
            $obj = new UsuarioInformacionDTO(null,null,null,null,null,null,null,null); 
            // other initialization
            return $obj;
        }

    

    public function setNombre($nombre){
        $this->nombre = $nombre;
        }

    public function getNombre(){
        return $this->nombre;
        }

    public function setApellido($apellido){
        $this->apellido = $apellido;
        }

    public function getApellido(){
        return $this->apellido;
        }
    
    public function setMatricula($matricula){
        $this->matricula = $matricula;
        }

    public function getMatricula(){
        return $this->matricula;
        } 
           

    public function setGrado($grado){
        $this->grado = $grado;
        }

    public function getGrado(){
        return $this->grado;
        }  


    public function setPuesto($puesto){
        $this->puesto = $puesto;
        }

    public function getPuesto(){
        return $this->puesto;
        }   


    public function setGenero($genero){
        $this->genero = $genero;
        }

    public function getGenero(){
        return $this->genero;
        }   


    public function setFoto($foto){
        $this->foto = $foto;
        }

    public function getFoto(){
        return $this->foto;
        }  


    public function setId($id){
        $this->id = $id;
        }

    public function getId(){
        return $this->id;
        } 

}
?>