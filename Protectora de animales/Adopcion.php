<?php
class Adopcion extends CRUD
{
    private $id;
    private $idAnimal;
    private $fecha;
    private $razon ;
    private $conexion ;
    private static $TABLA="adopciones";

    public function __construct(){
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
        $DateAndTime = date('Y-m-d h:i:s a', time());
        $sql = ("INSERT INTO " .self::$TABLA." VALUES (:id,:idAnimal,:fecha,:razon,:creado,actualizado)");
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':idAnimal', $this->idAnimal);
        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':razon', $this->razon);
        $stmt->bindParam(':creado', $DateAndTime);
        $stmt->bindParam(':actualizado', $DateAndTime);
        $stmt->execute();
    }

    public function actualizar()
    {
        $DateAndTime = date('Y-m-d h:i:s a', time());
        $sql = "UPDATE ".self::$TABLA." SET id=:id,idAnimal=:idAnimal,fecha=:fecha,razon=:razon,updated_at=:actualizado;";
        $this->conexion->exec($sql);
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':idAnimal', $this->idAnimal);
        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':razon', $this->razon);
        $stmt->bindParam(':actualizado', $DateAndTime);
        $stmt->execute();
    }
}

?>