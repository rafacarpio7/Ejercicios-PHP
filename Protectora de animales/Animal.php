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
    private static $TABLA="animales";


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

        $sql = ("INSERT INTO " .self::$TABLA." VALUES ($this->id,$this->nombre,$this->raza,$this->genero,$this->color,$this->edad)");
        $this->conexion->exec($sql);

    }

    public function actualizar()
    {

        $sql = "UPDATE ".self::$TABLA." SET id=$this->id,nombre=$this->nombre,raza=$this->raza,genero=$this->genero,color=$this->color,edad=$this->edad;";
        $this->conexion->exec($sql);
        
    }

}


?>