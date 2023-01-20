<?php
require_once "../Modelo/CRUD.php";
class Fotos extends CRUD
{
    private  $id;
    private $id_vivienda;
    private $foto;
    private $conexion;
    private static $TABLA="fotos";


    public function __construct()
    {
        parent::__contruct(self::$TABLA);
        $this->conexion=parent::nuevaConexion();
    }

    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad,$nuevoValor)
    {
        $this->$propiedad=$nuevoValor;
    }

    public function crear()
    {
        
        $this->id_vivienda = $_REQUEST["id_vivienda"];
        $this->especie = $_REQUEST["especie"];
        $this->foto = $_REQUEST["foto"];
        $this->direccion = $_REQUEST["direccion"];
        $this->ndormitorios = $_REQUEST["ndormitorios"];
        $this->precio = $_REQUEST["precio"];

        $DateAndTime = date('Y-m-d h:i:s a', time());
        $sql = ("INSERT INTO " .self::$TABLA."(id_vivienda,foto)
                 VALUES (:id_vivienda,:foto)");
        $stmt = $this->conexion->prepare($sql);
        
        $stmt->bindParam(':id_vivienda', $this->id_vivienda);
        $stmt->bindParam(':foto', $this->foto);

        if($stmt->execute()){
            header("Location:../Vista/vista_fotos.php");
        }
    }

    public function actualizar()
    {
        $this->id = $_REQUEST["id"];
        $this->id_vivienda = $_REQUEST["id_vivienda"];
        $this->especie = $_REQUEST["especie"];
        $this->foto = $_REQUEST["foto"];
        $this->direccion = $_REQUEST["direccion"];
        $this->ndormitorios = $_REQUEST["ndormitorios"];
        $this->precio = $_REQUEST["precio"];

        $DateAndTime = date('Y-m-d h:i:s a', time());
        $sql = "UPDATE ".self::$TABLA." SET id=:id,id_vivienda=:id_vivienda,foto=:foto
                    WHERE id=:idAnterior;";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':id_vivienda', $this->id_vivienda);
        $stmt->bindParam(':foto', $this->foto);
        if($stmt->execute()){
            header("Location:../Vista/vista_fotos.php");
        }
    }

}


?>