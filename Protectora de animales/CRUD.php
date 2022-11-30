<?php
abstract class CRUD extends Conexion{
    private $tabla;
    private $conexion;


    public function __contruct($tabla)
    {
        $this->tabla=$tabla;
        $this->conexion=parent::nuevaConexion();
    }

    public function obtieneTodos(){
        $statement = $this->conexion->prepare("SELECT * FROM $this->tabla ");
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function obtieneDeID($idParametro){
        $statement = $this->conexion->prepare("SELECT $idParametro FROM $this->tabla ");
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } 
    }

    public function borra($idParametro)
    {
        $sql = "SELECT $idParametro FROM $this->tabla WHERE id=$idParametro";
        
        $this->conexion->execute($sql);

    }

    public abstract function crear();

    public abstract function actualizar();

}


?>