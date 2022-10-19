<?php
class Repetidor extends Alumno
{
    private $asignatura;

    public function __construct($asig,$nom,$ape)
    {
        $this->asignatura=$asig;
        parent::__construct($nom,$ape);
    }

    public function get_asignatura () {
        return $this->asignatura;
    }

    public function set_asignatura ($asig) {
        $this->asignatura=$asig;
    }
    
}

?>