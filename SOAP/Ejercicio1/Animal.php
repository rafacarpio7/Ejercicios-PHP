<?php

class Animal 
{
    private static $conexion;
    private static $consulta;

    public function booleanAdopcion($idParametro)
    {
        try {
            $conexion=new PDO("mysql:host=localhost;dbname=protectora_animales;charset=utf8","root","");
            $consulta=$conexion->prepare("SELECT idAnimal FROM animal  
                                                INNER JOIN adopcion ON animal.id=adopcion.idAnimal 
                                                WHERE animal.id=:idParametro");
            $consulta->bindParam(':idParametro', $idParametro);
            $consulta->execute();
            $cantidad=$consulta->fetchAll(PDO::FETCH_ASSOC);
            if (count($cantidad)>0) {
                return "Este animal ya se encuentra adoptado";
            } else {
                return "Este animal NO se encuentra adoptado";
            }
        } catch (PDOException $e) {
            return "ERROR : ". $e->getMessage();
        }
    }
}


?>