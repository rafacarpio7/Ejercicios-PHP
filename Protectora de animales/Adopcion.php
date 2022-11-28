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

        $sql = ("INSERT INTO " .self::$TABLA." VALUES ($this->id,$this->idAnimal,$this->fecha,$this->razon)");
        $this->conexion->exec($sql);

    }

    public function actualizar()
    {

        $sql = "UPDATE ".self::$TABLA." SET id=$this->id,idAnimal=$this->idAnimal,fecha=$this->fecha,razon=$this->razon;";
        $this->conexion->exec($sql);
        
    }
}

?>