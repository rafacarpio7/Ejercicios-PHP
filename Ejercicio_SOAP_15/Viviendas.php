<?php
require_once "CRUD.php";
class Viviendas extends CRUD
{
    private  $id;
    private $tipo;
    private $zona;
    private $direccion;
    private $ndormitorios;
    private $precio;
    private $tamaño;
    private $extras;
    private $observaciones;
    private $conexion;
    private static $TABLA="viviendas";


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

    public function actualizar()
    {
        
    }
    public function crear()
    {

    }

    public function totalViviendas()
    {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM " .self::$TABLA." ");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function totalViviendasFiltro($zonaParametro)
    {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM " .self::$TABLA." WHERE zona=:zona");
        $stmt->bindParam(':zona',$zonaParametro);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

}

?>