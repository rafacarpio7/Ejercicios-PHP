<?php
class Conexion{
    private $usuario="root";
    private $contraseña="";
    private $nombreServidor="localhost";
    private $nombreBBDD="inmobiliaria";

    

    protected function nuevaConexion(){
        try {
            $conn = new PDO("mysql:host=$this->nombreServidor;dbname=$this->nombreBBDD;charset=utf8",$this->usuario,$this->contraseña);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
           return $e->getMessage();
        } 
    }
}
?>