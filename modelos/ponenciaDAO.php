<?php

require_once "conexion.php";

Class PonenciaDAO {


    public function mostrarTodasPonencias(){ // Función para mostrar todas las ponencias
        $sentencia=Conexion::conectar()->prepare("SELECT idponencia,idCoordinador,nombre,fecha,hora,espaciosDisponibles,categoria,modalidad,numeroCuenta,costo FROM ponencia");
        $sentencia->execute();
        return $sentencia->fetchAll();

    }

    public function consultarInformacionPonencia(PonenciaDTO $ponencia){
        $sentencia=Conexion::conectar()->prepare("SELECT idponencia,idCoordinador,nombre,fecha,hora,espaciosDisponibles,categoria,modalidad,numeroCuenta,costo FROM ponencia WHERE idponencia=:idponencia");
        $sentencia->bindValue(":idponencia",$ponencia->getIdponencia(),PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetch();
    }

    public function consultarPonenciasPagadas(PonenciaDTO $ponencia){
        $sentencia = Conexion::conectar()->prepare("SELECT * FROM participante_ponencia WHERE usuarios_id=:usuarios_id AND pagado=1 ");
        $sentencia->bindValue(":usuarios_id",$ponencia->getIdCoordinador(),PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function consultarUsuariosSinPagar(PonenciaDTO $ponencia){
        $sentencia = Conexion::conectar()->prepare("SELECT * FROM participante_ponencia WHERE ponencia_idponencia = :ponencia_idponencia  AND pagado=0 ");
        $sentencia->bindValue(":ponencia_idponencia",$ponencia->getIdponencia(),PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function consultarPonenciasNoPagadas(PonenciaDTO $ponencia){
        $sentencia = Conexion::conectar()->prepare("SELECT * FROM participante_ponencia WHERE usuarios_id=:usuarios_id AND pagado=0 ");
        $sentencia->bindValue(":usuarios_id",$ponencia->getIdCoordinador(),PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function mostrarPonenciasPorPeriodo($ponencia){ //funcion para consultar las ponencias por periodos teniendo un limite de 10 registros
        $inicioPeriodo=$ponencia-4;
        $finPeriodo=$ponencia+1;
        $x=Conexion::conectar()->prepare("SELECT idponencia, nombre FROM ponencia WHERE MONTH(fecha) > :inicioPeriodo AND MONTH(fecha) < :finPeriodo LIMIT 10");
        $x->bindParam(":inicioPeriodo",$inicioPeriodo,PDO::PARAM_INT);
        $x->bindParam(":finPeriodo",$finPeriodo,PDO::PARAM_INT);
        $x->execute();
        return $x->fetchAll();

    }

    public function mostrarPonenciasPorAsistencia($ponencias){
        $i=0;
        $total=new ArrayObject();
        foreach($ponencias as $ponencia){
            $x=Conexion::conectar()->prepare("SELECT  COUNT(id) AS total FROM participante_ponencia WHERE ponencia_idponencia=:idponencia AND asistencia=1 LIMIT 1");
            $x->bindValue(":idponencia",$ponencia["idponencia"],PDO::PARAM_INT);
            $x->execute();
            $total[$i]["total"]=0;
            $total[$i]["nombre"]=$ponencia["nombre"];
            foreach ($x as $key){ $total[$i]["total"] = ($key['total'] == null)? 0 : $key['total']; }
            $i++;

        }
        return $total;

    }


    public function mostrarPonenciasGraficaPastel(){
        $total = array();
        $numero=0;
        for($i=4; $i<13; $i=$i+4){

            $inicioPeriodo=$i-4;
            $finPeriodo=$i+1;

            $x=Conexion::conectar()->prepare("SELECT  COUNT(idponencia) AS total FROM ponencia WHERE MONTH(fecha) > :inicioPeriodo AND MONTH(fecha) < :finPeriodo LIMIT 1");
            $x->bindParam(":inicioPeriodo",$inicioPeriodo,PDO::PARAM_INT);
            $x->bindParam(":finPeriodo",$finPeriodo,PDO::PARAM_INT);
            $x->execute();
    
            $total[$numero] = 0;
            foreach ($x as $key){ $total[$numero] = ($key['total'] == null)? 0 : $key['total']; }
            $numero++;
        }			 
        return $total;
    }
    public function registrarPago(PonenciaDTO $ponencia){ //función para registrar el pago del participante
        $sentencia=Conexion::conectar()->prepare("UPDATE participante_ponencia SET pagado=1 WHERE usuarios_id=:usuariosId AND ponencia_idponencia=:ponenciaIdponencia");
        $sentencia->bindValue(":usuariosId",$ponencia->getIdCoordinador(),PDO::PARAM_INT);
        $sentencia->bindValue(":ponenciaIdponencia",$ponencia->getIdponencia(),PDO::PARAM_INT);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }
    }

    public function existeRegistroParticipante(PonenciaDTO $ponencia){//función para saber si el usuario ya se encuentra registrado en la ponencia
        $x=Conexion::conectar()->prepare("SELECT * FROM participante_ponencia WHERE usuarios_id=:usuariosId AND ponencia_idponencia=:ponenciaIdponencia");
        $x->bindValue(":usuariosId",$ponencia->getIdCoordinador(),PDO::PARAM_INT);
        $x->bindValue(":ponenciaIdponencia",$ponencia->getIdponencia(),PDO::PARAM_INT);
        $x->execute();
        $respuesta= $x->fetchColumn();
        if(($respuesta)){
            return true;
        }else{
            return false;
        }
    }

    public function registrarUsuarioPonencia(PonenciaDTO $ponencia){ //función para registrar a un participante a una ponencia
        
        $sentencia = Conexion::conectar()->prepare("SELECT espaciosDisponibles,modalidad FROM ponencia WHERE idponencia=:idponencia");
        $sentencia->bindValue(":idponencia",$ponencia->getIdponencia(),PDO::PARAM_INT);
        $sentencia->execute();
        $evento= $sentencia->fetch(); //primero consultamos si hay espacios disponibles
        if($evento["espaciosDisponibles"] > 0){
            $sentencia = Conexion::conectar()->prepare("UPDATE ponencia SET espaciosDisponibles=(espaciosDisponibles-1) WHERE idponencia=:idponencia");
            $sentencia->bindValue(":idponencia",$ponencia->getIdponencia(),PDO::PARAM_INT);
            $sentencia->execute(); //restamos 1 a los espacios disponibles

            if($evento["modalidad"]=="Gratuito"){ //Si la modalidad es gratuita entonces insertamos al campo pagado 1 para saber que ya esta pagado
                $sentencia = Conexion::conectar()->prepare("INSERT INTO participante_ponencia
                (usuarios_id,ponencia_idponencia,asistencia,pagado)
                    VALUES
                    (:usuarios_id,:ponencia_idponencia,0,1)");
            }else{ // si no es gratuita, insertamos 0 para indicar que el usuario aun no paga la ponencia
                $sentencia = Conexion::conectar()->prepare("INSERT INTO participante_ponencia
                (usuarios_id,ponencia_idponencia,asistencia,pagado)
                    VALUES
                    (:usuarios_id,:ponencia_idponencia,0,0)");
            }
            //ejecutamos la sentencia para registrar al participante a la ponencia
            $sentencia->bindValue(":usuarios_id",$ponencia->getIdCoordinador(),PDO::PARAM_INT);
            $sentencia->bindValue(":ponencia_idponencia",$ponencia->getIdponencia(),PDO::PARAM_INT);
            $sentencia->execute();
            $count = $sentencia->rowCount();
            if($count>0){
                return true;
            }else{
                 return false;
            }
        }else{
            return false;
        }


    }

    public function mostrarPonenciasCalendario(){ //Función para mostrar las ponencia en el calendario
        $fechaActual = date('Y-m-d');
        $x=Conexion::conectar()->prepare("SELECT idponencia,idCoordinador,nombre,fecha,hora,espaciosDisponibles,categoria,modalidad,numeroCuenta,costo FROM ponencia WHERE fecha >= :fecha AND espaciosDisponibles>0 ");
        $x->bindValue(":fecha",$fechaActual,PDO::PARAM_STR);
        $x->execute();
        return $x->fetchAll();

    }

    public function eliminarPonencia(PonenciaDTO $ponencia){ // función para eliminar la ponencia
        $sentencia = Conexion::conectar()->prepare("DELETE FROM ponencia WHERE idponencia = :idponencia");
        $sentencia->bindValue(':idponencia',$ponencia->getIdponencia(),PDO::PARAM_INT);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }
    }

    public function registrarPonencia(PonenciaDTO $ponencia){ //función para registrar ponencia
        $sentencia = Conexion::conectar()->prepare("INSERT INTO ponencia
        (idCoordinador,nombre,fecha,hora,espaciosDisponibles,nombreCompletoPonente,gradoAcademico,foto,firmaDigital,categoria,modalidad,numeroCuenta,costo)
            VALUES
            (:idCoordinador,:nombre,:fecha,:hora,:espaciosDisponibles,:nombreCompletoPonente,:gradoAcademico,:foto,:firmaDigital,:categoria,:modalidad,:numeroCuenta,:costo)");
        $sentencia->bindValue(":idCoordinador",$ponencia->getIdCoordinador(),PDO::PARAM_INT);
        $sentencia->bindValue(":nombre",$ponencia->getNombre(),PDO::PARAM_STR);
        $sentencia->bindValue(":fecha",$ponencia->getFecha(),PDO::PARAM_STR);
        $sentencia->bindValue(":hora",$ponencia->getHora(),PDO::PARAM_STR);
        $sentencia->bindValue(":espaciosDisponibles",$ponencia->getEspaciosDisponibles(),PDO::PARAM_INT);
        $sentencia->bindValue(":nombreCompletoPonente",$ponencia->getNombreCompletoPonente(),PDO::PARAM_STR);
        $sentencia->bindValue(":gradoAcademico",$ponencia->getGradoAcademico(),PDO::PARAM_STR);
        $sentencia->bindValue(":foto",$ponencia->getFoto(),PDO::PARAM_LOB);
        $sentencia->bindValue(":firmaDigital",$ponencia->getFirmaDigital(),PDO::PARAM_LOB);
        $sentencia->bindValue(":categoria",$ponencia->getCategoria(),PDO::PARAM_STR);
        $sentencia->bindValue(":modalidad",$ponencia->getModalidad(),PDO::PARAM_STR);
        $sentencia->bindValue(":numeroCuenta",$ponencia->getNumeroCuenta(),PDO::PARAM_INT);
        $sentencia->bindValue(":costo",$ponencia->getCosto(),PDO::PARAM_STR);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }

    }

    public function actualizarPonencia(PonenciaDTO $ponencia){ //función para actualizar la ponencia
        $sentencia = Conexion::conectar()->prepare("UPDATE ponencia SET idCoordinador=:idCoordinador
        ,nombre=:nombre,fecha=:fecha,hora=:hora,espaciosDisponibles=:espaciosDisponibles,
        categoria=:categoria,modalidad=:modalidad,numeroCuenta=:numeroCuenta,costo=:costo WHERE idponencia=:idPonencia");
        $sentencia->bindValue(":idCoordinador",$ponencia->getIdCoordinador(),PDO::PARAM_INT);
        $sentencia->bindValue(":nombre",$ponencia->getNombre(),PDO::PARAM_STR);
        $sentencia->bindValue(":fecha",$ponencia->getFecha(),PDO::PARAM_STR);
        $sentencia->bindValue(":hora",$ponencia->getHora(),PDO::PARAM_STR);
        $sentencia->bindValue(":espaciosDisponibles",$ponencia->getEspaciosDisponibles(),PDO::PARAM_INT);
        $sentencia->bindValue(":categoria",$ponencia->getCategoria(),PDO::PARAM_STR);
        $sentencia->bindValue(":modalidad",$ponencia->getModalidad(),PDO::PARAM_STR);
        $sentencia->bindValue(":numeroCuenta",$ponencia->getNumeroCuenta(),PDO::PARAM_INT);
        $sentencia->bindValue(":costo",$ponencia->getCosto(),PDO::PARAM_STR);
        $sentencia->bindValue(":idPonencia",$ponencia->getIdponencia(),PDO::PARAM_INT);
        $sentencia->execute();
        $count = $sentencia->rowCount();
        if($count>0){
            return true;
        }else{
             return false;
        }

    }

    public function mostrarPonenciaPonente(PonenciaDTO $ponencia){ //función para mostrar el ponente de la ponencia
        $x=Conexion::conectar()->prepare("SELECT nombreCompletoPonente,gradoAcademico,foto,firmaDigital FROM ponencia WHERE idponencia=:id");
        $x->bindValue(":id",$ponencia->getIdponencia(),PDO::PARAM_INT);
        $x->execute();
        return $x->fetch();
    }

    public function actualizarPonente(PonenciaDTO $ponencia){ //funcion para actualizar al ponente dependiendo si se va a actualizar su foto o su firma digital
        if($ponencia->getFoto()==FALSE and $ponencia->getFirmaDigital()==FALSE){
            $sentencia = Conexion::conectar()->prepare("UPDATE ponencia SET nombreCompletoPonente=:nombreCompletoPonente,gradoAcademico=:gradoAcademico WHERE idponencia=:idPonencia");
            $sentencia->bindValue(":nombreCompletoPonente",$ponencia->getNombreCompletoPonente(),PDO::PARAM_STR);
            $sentencia->bindValue(":gradoAcademico",$ponencia->getGradoAcademico(),PDO::PARAM_STR);
            $sentencia->bindValue(":idPonencia",$ponencia->getIdponencia(),PDO::PARAM_INT);
            $sentencia->execute();
            $count = $sentencia->rowCount();
           
        }elseif($ponencia->getFoto()==FALSE){
            $sentencia = Conexion::conectar()->prepare("UPDATE ponencia SET nombreCompletoPonente=:nombreCompletoPonente,gradoAcademico=:gradoAcademico,firmaDigital=:firmaDigital WHERE idponencia=:idPonencia");
            $sentencia->bindValue(":nombreCompletoPonente",$ponencia->getNombreCompletoPonente(),PDO::PARAM_STR);
            $sentencia->bindValue(":gradoAcademico",$ponencia->getGradoAcademico(),PDO::PARAM_STR);
            $sentencia->bindValue(":firmaDigital",$ponencia->getFirmaDigital(),PDO::PARAM_LOB);
            $sentencia->bindValue(":idPonencia",$ponencia->getIdponencia(),PDO::PARAM_INT);
            $sentencia->execute();
            $count = $sentencia->rowCount();

        }elseif($ponencia->getFirmaDigital()==FALSE){
            $sentencia = Conexion::conectar()->prepare("UPDATE ponencia SET nombreCompletoPonente=:nombreCompletoPonente,gradoAcademico=:gradoAcademico,foto=:foto WHERE idponencia=:idPonencia");
            $sentencia->bindValue(":nombreCompletoPonente",$ponencia->getNombreCompletoPonente(),PDO::PARAM_STR);
            $sentencia->bindValue(":gradoAcademico",$ponencia->getGradoAcademico(),PDO::PARAM_STR);
            $sentencia->bindValue(":foto",$ponencia->getFoto(),PDO::PARAM_LOB);
            $sentencia->bindValue(":idPonencia",$ponencia->getIdponencia(),PDO::PARAM_INT);
            $sentencia->execute();
            $count = $sentencia->rowCount();
        }else{
            $sentencia = Conexion::conectar()->prepare("UPDATE ponencia SET nombreCompletoPonente=:nombreCompletoPonente,gradoAcademico=:gradoAcademico,foto=:foto,firmaDigital=:firmaDigital WHERE idponencia=:idPonencia");
            $sentencia->bindValue(":nombreCompletoPonente",$ponencia->getNombreCompletoPonente(),PDO::PARAM_STR);
            $sentencia->bindValue(":gradoAcademico",$ponencia->getGradoAcademico(),PDO::PARAM_STR);
            $sentencia->bindValue(":foto",$ponencia->getFoto(),PDO::PARAM_LOB);
            $sentencia->bindValue(":firmaDigital",$ponencia->getFirmaDigital(),PDO::PARAM_LOB);
            $sentencia->bindValue(":idPonencia",$ponencia->getIdponencia(),PDO::PARAM_INT);
            $sentencia->execute();
            $count = $sentencia->rowCount();
        }
        
        if($count>0){
            return true;
        }else{
             return false;
        }

    }
    
    


}
?>