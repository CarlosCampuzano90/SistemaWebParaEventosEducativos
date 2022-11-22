<?php
class EventosConcluidosDTO
{
    //atributos de la clase
    private $id,$proximosEventos_id,$imagen,$tituloEvento,$fecha,$descripcion;

    //constructor de la clase asesor
    public function __construct($id,$proximosEventos_id,$imagen,$tituloEvento,$fecha,$descripcion)
    {
        $this->id = $id;
        $this->proximosEventos_id=$proximosEventos_id;
        $this->imagen = $imagen;
        $this->tituloEvento = $tituloEvento;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
        
    }


    public static function constructorPorDefecto() {
            $obj = new EventosConcluidosDTO(null,null,null,null,null,null); 
            // other initialization
            return $obj;
        }

    public function setId($id){
        $this->id = $id;
        }
    public function getId(){
        return $this->id;
        } 
       
    public function setProximoEvento($proximosEventos_id){
        $this-> proximosEventos_id = $proximosEventos_id;
        }
    public function getProximoEvento(){
        return $this->proximosEventos_id;
        } 

    public function setImagen($imagen){
        $this->imagen = $imagen;
        }

    public function getImagen(){
        return $this->imagen;
        }

    public function setTituloEvento($tituloEvento){
        $this->tituloEvento = $tituloEvento;
        }

    public function getTituloEvento(){
        return $this->tituloEvento;
        }
    
    public function setFecha($fecha){
        $this->fecha = $fecha;
        }

    public function getFecha(){
        return $this->fecha;
        } 

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
        }

    public function getDescripcion(){
        return $this->descripcion;
        }  




}
?>