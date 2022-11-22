<?php 
Class EncuestasDTO {
    private $id, $id_usuario, $idponencia,$pregunta1,$pregunta2,$pregunta3,$pregunta4;
    
    public function __construct($id, $id_usuario, $idponencia,$pregunta1,$pregunta2,$pregunta3,$pregunta4)
    {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->idponencia = $idponencia;
        $this->pregunta1 = $pregunta1;
        $this->pregunta2 = $pregunta2;
        $this->pregunta3 = $pregunta3;
        $this->pregunta4 = $pregunta4;
    }

    public static function constructorPorDefecto() {
        $obj = new EncuestasDTO(null,null,null,null,null,null,null); 
        // other initialization
        return $obj;
    }



    public function setId($id){
        $this->id = $id;
        }

    public function getId(){
        return $this->id;
        }
    public function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
        }

    public function getIdUsuario(){
        return $this->id_usuario;
        }
        
    public function setIdponencia($idponencia){
        $this->idponencia = $idponencia;
        }

    public function getIdponencia(){
        return $this->idponencia;
        }

    public function setPregunta1($pregunta1){
        $this->pregunta1 = $pregunta1;
        }

    public function getPregunta1(){
        return $this->pregunta1;
        } 
    public function setPregunta2($pregunta2){
        $this->pregunta2 = $pregunta2;
        }

    public function getPregunta2(){
        return $this->pregunta2;
        } 

    public function setPregunta3($pregunta3){
        $this->pregunta3 = $pregunta3;
        }

    public function getPregunta3(){
        return $this->pregunta3;
        } 
    public function setPregunta4($pregunta4){
        $this->pregunta4 = $pregunta4;
        }

    public function getPregunta4(){
        return $this->pregunta4;
        } 
}
?>