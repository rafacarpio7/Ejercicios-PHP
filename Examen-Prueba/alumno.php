<?php
class Alumno{
    private $nombre;
    private $apellido;
    private $telefono;
    private $email;

    public function __construct($nombreC,$apellidoC,$telefonoC,$emailC){
        $this->nombre=$nombreC;
        $this->apellido=$apellidoC;
        $this->telefono=$telefonoC;
        $this->email=$emailC;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombreNuevo)
    {
        $this->nombre=$nombreNuevo;
    }

    
}


?>