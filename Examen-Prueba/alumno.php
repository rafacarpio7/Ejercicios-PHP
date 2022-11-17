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

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellidoNuevo)
    {
        $this->apellido=$apellidoNuevo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefonoNuevo)
    {
        $this->telefono= $telefonoNuevo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($emailNuevo)
    {
        $this->email=$emailNuevo;
    }

    public function compruebaCorreo($correoParametro)
    {
        if (str_contains($correoParametro,"@") && str_contains($correoParametro,".")) {
            return true;
        } else {
            return false;
        }
        
    }
}




?>