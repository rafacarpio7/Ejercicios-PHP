<?php
class Conexion{
    private $usuario;
    private $contraseña;
    private $nombreServidor;
    private $nombreBBDD;

    public function __construct()
    {
        $this->usuario="root";
        $this->contraseña="";
        $this->nombreServidor="localhost";
        $this->nombreBBDD="protectora_animales";
    }

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