<?php 
Class EncuestasDAO {
    
    public function existenPreguntas(EncuestasDTO $encuesta){ // función para eliminar la ponencia
        $sentencia = Conexion::conectar()->prepare("SELECT pregunta FROM preguntasponencias WHERE ponencia_idponencia = :idponencia");
        $sentencia->bindValue(':idponencia',$encuesta->getIdponencia(),PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetch();
    }

    public function encuestaContestada(EncuestasDTO $encuesta){ //funcion para saber si el usuario ya contesto la encuesta
        $sentencia = Conexion::conectar()->prepare("SELECT respuesta FROM respuestasparticipante WHERE ponencia_idponencia = :idponencia AND usuarios_id=:usuarioid");
        $sentencia->bindValue(':idponencia',$encuesta->getIdponencia(),PDO::PARAM_INT);
        $sentencia->bindValue(':usuarioid',$encuesta->getIdUsuario(),PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetch();
    }

    public function existenRespuestas(EncuestasDTO $encuesta){
        $sentencia = Conexion::conectar()->prepare("SELECT respuesta FROM respuestasparticipante WHERE ponencia_idponencia = :idponencia");
        $sentencia->bindValue(':idponencia',$encuesta->getIdponencia(),PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetch();
    }

    public function mostrarPreguntas(EncuestasDTO $encuesta){
        $sentencia = Conexion::conectar()->prepare("SELECT * FROM preguntasponencias WHERE ponencia_idponencia = :idponencia");
        $sentencia->bindValue(':idponencia',$encuesta->getIdponencia(),PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function mostrarRespuestas(EncuestasDTO $encuesta){
        $sentencia = Conexion::conectar()->prepare("SELECT * FROM respuestasparticipante WHERE ponencia_idponencia = :idponencia");
        $sentencia->bindValue(':idponencia',$encuesta->getIdponencia(),PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function actualizarPreguntas(EncuestasDTO $encuesta){
        $sentencia = Conexion::conectar()->prepare("UPDATE preguntasponencias SET pregunta=:pregunta WHERE id=:id");
        $sentencia->bindParam(":id",$encuesta->getId(),PDO::PARAM_INT);
        $sentencia->bindParam(":pregunta",$encuesta->getPregunta1(),PDO::PARAM_STR);
        $sentencia->execute();  
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }
    }

    public function eliminarPreguntas(EncuestasDTO $encuesta){
        $sentencia = Conexion::conectar()->prepare("DELETE FROM preguntasponencias WHERE ponencia_idponencia = :idponencia");
        $sentencia->bindValue(':idponencia',$encuesta->getIdponencia(),PDO::PARAM_INT);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }

    }

    public function registrarRespuestasParticipante(EncuestasDTO $encuesta){
        $sentencia = Conexion::conectar()->prepare("INSERT INTO respuestasparticipante
        (respuesta,usuarios_id,ponencia_idponencia)
            VALUES
            (:respuesta,:usuarios_id,:ponencia_idponencia)");
        $sentencia->bindParam(":ponencia_idponencia",$idPonencia,PDO::PARAM_INT); // Utilizamos bindParam para utilizar variables 
        $sentencia->bindParam(":usuarios_id",$idParticipante,PDO::PARAM_INT); // Utilizamos bindParam para utilizar variables 
        $sentencia->bindParam(":respuesta",$pregunta,PDO::PARAM_STR);

        $idPonencia = $encuesta->getIdponencia(); //primero establacemos el id de la ponencia
        $idParticipante =  $encuesta->getIdUsuario();

        $pregunta = $encuesta->getPregunta1(); //insertamos la primera pregunta 
        $sentencia->execute();

        $pregunta = $encuesta->getPregunta2(); //insertamos la segunda pregunta 
        $sentencia->execute();

        $pregunta = $encuesta->getPregunta3(); //insertamos la tercera pregunta 
        $sentencia->execute();

        $pregunta = $encuesta->getPregunta4(); //insertamos la cuarta pregunta 
        $sentencia->execute();
        
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }
    }

    public function registrarPreguntas(EncuestasDTO $encuesta){ //función para registrar preguntas
        $sentencia = Conexion::conectar()->prepare("INSERT INTO preguntasponencias
        (ponencia_idponencia,pregunta)
            VALUES
            (:ponencia_idponencia, :pregunta)");
        $sentencia->bindParam(":ponencia_idponencia",$idPonencia,PDO::PARAM_INT); // Utilizamos bindParam para utilizar variables 
        $sentencia->bindParam(":pregunta",$pregunta,PDO::PARAM_STR);

        $idPonencia = $encuesta->getIdponencia(); //primero establacemos el id de la ponencia
        $pregunta = $encuesta->getPregunta1(); //insertamos la primera pregunta 
        $sentencia->execute();

        $pregunta = $encuesta->getPregunta2(); //insertamos la segunda pregunta 
        $sentencia->execute();

        $pregunta = $encuesta->getPregunta3(); //insertamos la tercera pregunta 
        $sentencia->execute();

        $pregunta = $encuesta->getPregunta4(); //insertamos la cuarta pregunta 
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