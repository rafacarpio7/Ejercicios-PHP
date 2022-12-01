<?php
class Usuario extends CRUD {

    private $id;
    private $nombre;
    private $apellido;
    private $sexo;
    private $direccion;
    private $telefono;
    private $conexion;
    private static $TABLA="usuarios"; 


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

        $sql = ("INSERT INTO " .self::$TABLA." VALUES (:id,:nombre,:apellido,:sexo,:direccion,:telefono,:fechaCreacion,:fechaModificacion)");
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':sexo', $this->sexo);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':fechaCreacion', $DateAndTime);
        $stmt->bindParam(':fechaModificacion', $DateAndTime);

        $stmt->execute();
        

    }

    public function actualizar()
    {
        $DateAndTime = date('Y-m-d h:i:s a', time());
        $sql = "UPDATE ".self::$TABLA." SET id=:id,nombre=:nombre,apellido=:apellido,sexo=:sexo,direccion=:direccion,telefono=:telefono,updated_at=:actualizado;";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':sexo', $this->sexo);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':actualizado', $DateAndTime);
        $stmt->execute();
        
    }


    
}


?>