<?php

require_once "conexion.php";

Class ModeloConstancias{
    static public function mdlConsultarConstancias(){
        $constanciaDAO=new ConstanciaDAO();
        $respuesta=$constanciaDAO->consultarConstancias();
        return $respuesta;
    }

    static public function mdlConsultarPonencias(){
        $constanciaDAO=new ConstanciaDAO();
        $respuesta=$constanciaDAO->consultarPonenciasSinConstancia();
        return $respuesta;
    }
    static public function mdlConsultarConstanciaUno($id){
        $constanciaDAO=new ConstanciaDAO();
        $constanciaDTO=new ConstanciaDTO($id,null,null,null,null,null,null); //Inicializamos el constructor con toda la información para registrar una ponencia
        $respuesta=$constanciaDAO->consultarConstancia($constanciaDTO);
        return $respuesta;
    }
    static public function mdlTransformarFecha($fecha){
        $fecha = substr($fecha, 0, 10);
		$numeroDia = date('d', strtotime($fecha));
		$dia = date('l', strtotime($fecha));
		$mes = date('F', strtotime($fecha));
		$anio = date('Y', strtotime($fecha));
		$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
		$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
		$nombredia = str_replace($dias_EN, $dias_ES, $dia);
		  $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
		return $nombredia." ".$numeroDia." de ".$nombreMes." del ".$anio;

    }

    static public function mdlRegistrarConstancia($firmaDigitalCoordinador,$textoAgradecimiento,$idPonencia){

        $constanciaDAO=new ConstanciaDAO();
        $informacionPonencia = $constanciaDAO->consultarInformacionPonencia($idPonencia);
        $constanciaDTO=new ConstanciaDTO(null,$informacionPonencia["nombre"],$informacionPonencia["fecha"],$informacionPonencia["firmaDigital"],$firmaDigitalCoordinador,$textoAgradecimiento,$idPonencia); //Inicializamos el constructor con toda la información para registrar una ponencia
        $respuesta=$constanciaDAO->registrarConstancia($constanciaDTO);
        return $respuesta;
    }
    static public function mdlActualizarConstancia($firmaDigitalCoordinador,$textoAgradecimiento,$idConstancia){
        $constanciaDAO=new ConstanciaDAO();
        $constanciaDTO=new ConstanciaDTO($idConstancia,null,null,null,$firmaDigitalCoordinador,$textoAgradecimiento,null); //Inicializamos el constructor con toda la información para registrar una ponencia
        $respuesta=$constanciaDAO->actualizarConstancia($constanciaDTO);
        return $respuesta;
    }
    static public function mdlEliminarConstancia($id){
        $constanciaDAO=new ConstanciaDAO();
        $constanciaDTO=new ConstanciaDTO($id,null,null,null,null,null,null); //Inicializamos el constructor con toda la información para registrar una ponencia
        $respuesta=$constanciaDAO->eliminarConstancia($constanciaDTO);
        return $respuesta;
    }
    

}?>