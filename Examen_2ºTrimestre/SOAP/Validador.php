<?php

class Validador 
{
    public function validar($contraseña)
    {
        if (count($contraseña)<8 ) {
            return false;
        } else {
            return true;
        }
        
    }
}


?>