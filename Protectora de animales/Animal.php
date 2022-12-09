<?php
class Animal extends CRUD
{
    private $id;
    private $nombre ;
    private $raza;
    private $genero;
    private $color;
    private $edad;
    private $conexion;
    private static $TABLA="animal";


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
        $DateAndTime = date('Y-m-d h:i:s a', time());
        $sql = ("INSERT INTO " .self::$TABLA." VALUES (:id,:nombre,:raza,:genero,:color,:edad,:fechaCreacion,:fechaModificacion)");
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':raza', $this->raza);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':color', $this->color);
        $stmt->bindParam(':edad', $this->edad);
        $stmt->bindParam(':fechaCreacion', $DateAndTime);
        $stmt->bindParam(':fechaModificacion', $DateAndTime);
        $stmt->execute();
    }

    public function actualizar()
    {
        $DateAndTime = date('Y-m-d h:i:s a', time());
        $sql = "UPDATE ".self::$TABLA." SET id=:id,nombre=:nombre,raza=:raza,genero=:genero,color=:color,edad=:edad,updated_at=:actualizado;";
        $this->conexion->exec($sql);
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':raza', $this->raza);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':color', $this->color);
        $stmt->bindParam(':edad', $this->edad);
        $stmt->bindParam(':actualizado', $DateAndTime);
        $stmt->execute();
    }

}


?>