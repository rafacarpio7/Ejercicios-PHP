<?php
class Producto  
{
    private $codProd;
    private $nombre;
    private $pvp;
    private $descripcion;
    
    private static $TABLA="producto";

    

    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad,$nuevoValor)
    {
        $this->$propiedad=$nuevoValor;
    }


}


?>