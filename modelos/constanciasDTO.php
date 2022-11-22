<?php
class ConstanciaDTO
{
    //atributos de la clase
    private $id,$nombre,$fechaEvento,$firmaDigitalPonente,$firmaDigitalCoordinador,$textoAgradecimiento,$idPonencia;
    //constructor de la clase asesor
    public function __construct($id,$nombre,$fechaEvento,$firmaDigitalPonente,$firmaDigitalCoordinador,$textoAgradecimiento,$idPonencia)
    {
        $this->nombre=$nombre;
        $this->id = $id;
        $this->fechaEvento = $fechaEvento;
        $this->firmaDigitalPonente = $firmaDigitalPonente;
        $this->firmaDigitalCoordinador = $firmaDigitalCoordinador;
        $this->textoAgradecimiento = $textoAgradecimiento;
        $this->idPonencia = $idPonencia;
    }


    public static function constructorPorDefecto() {
            $obj = new ConstanciaDTO(null,null,null,null,null,null,null); 
            // other initialization
            return $obj;
        }

    

    public function setId($id){
        $this->id = $id;
        }

    public function getId(){
        return $this->id;
        }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
        }

    public function getNombre(){
        return $this->nombre;
        }

    public function setFechaEvento($fechaEvento){
        $this->fechaEvento = $fechaEvento;
        }

    public function getFechaEvento(){
        return $this->fechaEvento;
        }
    
    public function setFirmaDigitalPonente($firmaDigitalPonente){
        $this->firmaDigitalPonente = $firmaDigitalPonente;
        }

    public function getFirmaDigitalPonente(){
        return $this->firmaDigitalPonente;
        }
    
    public function setFirmaDigitalCoordinador($firmaDigitalCoordinador){
        $this->firmaDigitalCoordinador = $firmaDigitalCoordinador;
        }

    public function getFirmaDigitalCoordinador(){
        return $this->firmaDigitalCoordinador;
        }
    
    public function setTextoAgradecimiento($textoAgradecimiento){
        $this->textoAgradecimiento = $textoAgradecimiento;
        }

    public function getTextoAgradecimiento(){
        return $this->textoAgradecimiento;
        }
    
    public function setIdPonencia($idPonencia){
        $this->idPonencia = $idPonencia;
        }

    public function getIdPonencia(){
        return $this->idPonencia;
        }


}
?>