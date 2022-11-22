<?php

class Conexion{
    public static function conectar(){
        $link = new PDO("mysql:host=localhost; dbname=bdponenciasfinal", "root", "");
        return $link;
    }
}
