<?php
class PonenciaDTO
{
    //atributos de la clase
    private $idponencia,$idCoordinador,$nombre,$fecha,$hora,$espaciosDisponibles,$nombreCompletoPonente,
    $gradoAcademico,$foto,$firmaDigital,$categoria,$modalidad,$numeroCuenta,$costo;
    //constructor de la clase asesor
    public function __construct($idponencia,$idCoordinador,$nombre,$fecha,$hora,$espaciosDisponibles,$nombreCompletoPonente,$gradoAcademico,$foto,$firmaDigital,$categoria,$modalidad,$numeroCuenta,$costo)
    {
        $this->nombre=$nombre;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->espaciosDisponibles = $espaciosDisponibles;
        $this->nombreCompletoPonente = $nombreCompletoPonente;
        $this->gradoAcademico=$gradoAcademico;
        $this->foto = $foto;
        $this->firmaDigital=$firmaDigital;
        $this->categoria=$categoria;
        $this->modalidad=$modalidad;
        $this->idponencia = $idponencia;
        $this->idCoordinador=$idCoordinador;
        $this->numeroCuenta=$numeroCuenta;
        $this->costo=$costo;

    }


    public static function constructorPorDefecto() {
            $obj = new PonenciaDTO(null,null,null,null,null,null,null,null,null,null,null,null,null,null); 
            // other initialization
            return $obj;
        }

    

    public function setNombre($nombre){
        $this->nombre = $nombre;
        }

    public function getNombre(){
        return $this->nombre;
        }

    public function setIdCoordinador($idCoordinador){
        $this->idCoordinador = $idCoordinador;
        }

    public function getIdCoordinador(){
        return $this->idCoordinador;
        }
    
    public function setFecha($fecha){
        $this->fecha = $fecha;
        }

    public function getFecha(){
        return $this->fecha;
        }    

    public function setHora($hora){
        $this->hora = $hora;
        }

    public function getHora(){
        return $this->hora;
        }  

    public function setEspaciosDisponibles($espaciosDisponibles){
        $this->espaciosDisponibles = $espaciosDisponibles;
        }

    public function getEspaciosDisponibles(){
        return $this->espaciosDisponibles;
        }  

    public function setNombreCompletoPonente($nombreCompletoPonente){
        $this->nombreCompletoPonente = $nombreCompletoPonente;
        }

    public function getNombreCompletoPonente(){
        return $this->nombreCompletoPonente;
        }  

    public function setGradoAcademico($gradoAcademico){
        $this->gradoAcademico = $gradoAcademico;
        }

    public function getGradoAcademico(){
        return $this->gradoAcademico;
        }  


    public function setFoto($foto){
        $this->foto = $foto;
        }

    public function getFoto(){
        return $this->foto;
        }  

    public function setFirmaDigital($firmaDigital){
        $this->firmaDigital = $firmaDigital;
        }

    public function getFirmaDigital(){
        return $this->firmaDigital;
        }  


    public function setCategoria($categoria){
        $this->categoria = $categoria;
        }

    public function getCategoria(){
        return $this->categoria;
        }  
    
    public function setModalidad($modalidad){
        $this->modalidad = $modalidad;
        }

    public function getModalidad(){
        return $this->modalidad;
        }
          
    public function setNumeroCuenta($numeroCuenta){
        $this->numeroCuenta = $numeroCuenta;
        }

    public function getNumeroCuenta(){
        return $this->numeroCuenta;
        }  

        public function setCosto($costo){
            $this->costo = $costo;
            }
    
        public function getCosto(){
            return $this->costo;
            }  
    


    public function setIdponencia($idponencia){
        $this->$idponencia = $idponencia;
        }

    public function getIdponencia(){
        return $this->idponencia;
        } 

}
?>