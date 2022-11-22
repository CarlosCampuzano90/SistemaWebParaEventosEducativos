<?php
class ProximosEventosDTO
{
    //atributos de la clase
    private $id,$usuarios_id,$foto,$tituloEvento,$fechaProxima,$descripcion,$nombrePonente,$cupo,$tipoDeEvento;

    //constructor de la clase asesor
    public function __construct($id,$usuarios_id,$foto,$tituloEvento,$fechaProxima,$descripcion,$nombrePonente,$cupo,$tipoDeEvento)
    {
        $this->id = $id;
        $this->usuarios_id=$usuarios_id;
        $this->foto = $foto;
        $this->tituloEvento = $tituloEvento;
        $this->fechaProxima = $fechaProxima;
        $this->descripcion = $descripcion;
        $this->nombrePonente = $nombrePonente;
        $this->cupo = $cupo;
        $this->tipoDeEvento=$tipoDeEvento;
        
    }


    public static function constructorPorDefecto() {
            $obj = new ProximosEventosDTO(null,null,null,null,null,null,null,null,null); 
            // other initialization
            return $obj;
        }

    public function setId($id){
        $this->id = $id;
        }
    public function getId(){
        return $this->id;
        } 
       
    public function setUsuarios_id($usuarios_id){
        $this-> usuarios_id = $usuarios_id;
        }
    public function getUsuarios_id(){
        return $this->usuarios_id;
        } 

    public function setFoto($foto){
        $this->foto = $foto;
        }

    public function getFoto(){
        return $this->foto;
        }

    public function setTituloEvento($tituloEvento){
        $this->tituloEvento = $tituloEvento;
        }

    public function getTituloEvento(){
        return $this->tituloEvento;
        }
    
    public function setFechaProxima($fechaProxima){
        $this->fechaProxima = $fechaProxima;
        }

    public function getFechaProxima(){
        return $this->fechaProxima;
        } 

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
        }

    public function getDescripcion(){
        return $this->descripcion;
        }  


    public function setNombrePonente($nombrePonente){
        $this->nombrePonente = $nombrePonente;
        }

    public function getNombrePonente(){
        return $this->nombrePonente;
        }   


    public function setCupo($cupo){
        $this->cupo = $cupo;
        }

    public function getCupo(){
        return $this->cupo;
        }   

    public function setTipoDeEvento($tipoDeEvento){
        $this->tipoDeEvento = $tipoDeEvento;
        }

    public function getTipoDeEvento(){
        return $this->tipoDeEvento;
        }   
    



}
?>