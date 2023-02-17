<?php
class Usuario
{
    private $nombre;
    private $apellidos;
    private $domicilio;
    private $telefono;
    private $email;
    private $password;
    private static $TABLA="usuario";

    

    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad,$nuevoValor)
    {
        $this->$propiedad=$nuevoValor;
    }

}

?>