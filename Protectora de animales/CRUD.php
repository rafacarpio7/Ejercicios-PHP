<?php
abstract class CRUD extends Conexion{
    private $tabla;
    private $conexion;


    public function __contruct($tabla,$conexion)
    {
        $this->tabla=$tabla;
        $this->conexion=$this->nuevaConexion();
    }

    public function obtieneTodos()
    {
        $statement = $this->conexion->prepare("SELECT * FROM $this->tabla ");
        $statement->execute();

        $registros = $statement->fetchAll(PDO::FETCH_OBJ);



    }

    public function obtieneDeID($idParametro){

        
    }
    
}


?>