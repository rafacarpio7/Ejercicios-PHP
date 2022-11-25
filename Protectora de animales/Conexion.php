<?php
class Conexion{
    private $usuario;
    private $contraseña;
    private $nombreServidor;

    public function __construct($usuario,$contraseña,$nombreServidor)
    {
        $this->usuario=$usuario;
        $this->contraseña=$contraseña;
        $this->nombreServidor=$nombreServidor;
    }

    protected function nuevaConexion(){
        try {
            $conn = new PDO("mysql:host=$this->nombreServidor;dbname=pufosa;charset=utf8",$this->usuario,$this->contraseña);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            echo 'Conectado correctamente';
        } catch (PDOException $e) {
            echo 'Conexion fallida'. $e->getMessage();
        }
        return $conn;
        
    }

    
}


?>