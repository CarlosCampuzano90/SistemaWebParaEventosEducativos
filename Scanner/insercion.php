
<?php
// conexion a la base de datos
class Conexion{
    public static function conectar(){
        $link = new PDO("mysql:host=localhost; dbname=bdponenciasfinal", "root", "");
        return $link;
    }
}

$clave = "yc10yc20yc30";
function decrypt($string, $key) // función para desencriptar el texto del QR
{
	$result = '';
	$string = base64_decode($string);
	for ($i = 0; $i < strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key)) - 1, 1);
		$char = chr(ord($char) - ord($keychar));
		$result .= $char;
	}
	return $result;
}

// Obtenemos el texto encriptado por el Request y a desencriptamos
$asistencia = decrypt($_REQUEST["asistencia"], $clave);


if ($asistencia !=""){ // si no esta vacia ingresamos el texto desencriptado para separlo
    $datos= explode(",", $asistencia); // separamos la cadena para obtener el id del usuario y del participante
    $sentencia = Conexion::conectar()->prepare("UPDATE participante_ponencia SET asistencia=1
    WHERE usuarios_id=:usuariosId AND ponencia_idponencia=:ponenciaIdponencia"); // preparamos la consulta
    $sentencia->bindValue(":usuariosId",$datos[0],PDO::PARAM_INT);
    $sentencia->bindValue(":ponenciaIdponencia",$datos[1],PDO::PARAM_INT);
    $sentencia->execute(); // la ejecutamos
    date_default_timezone_set("America/Mexico_City");
    $count = $sentencia->rowCount();
    if($count>0){
      $fecha= date('l jS \of F Y h:i:s A');   
      echo "Su asistencia fue capturada correctamente el $fecha,success";
 
    }else{
      echo 'Su asistencia ya ha sido registrada o no esta registrado a esta ponencia,error';
    }

    
}

?>