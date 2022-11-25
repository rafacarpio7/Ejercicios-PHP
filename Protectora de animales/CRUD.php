<?php
abstract class CRUD extends Conexion{
    private $tabla;
    private $conexion;


    public function __contruct($tabla,$conexion)
    {
        $this->tabla=$tabla;
        $this->conexion=new Conexion();
    }

    public function obtieneTodos()
    {
        $statement = $this->conexion->prepare("SELECT * FROM $this->tabla ");
        if ($statement->execute()) {

            while ($registros = $statement->fetch(PDO::FETCH_OBJ)) {
                echo $registros[''];
            }
            

        }else {
            
        }

        



    }

    public function obtieneDeID($idParametro){

        
    }
    
}


?>