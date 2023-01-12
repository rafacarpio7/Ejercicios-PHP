<?php

class Fecha  
{
    public function booleanFecha($fechaparam)
    {
        $nacimiento = new DateTime($fechaparam);
        $ahora = new DateTime(date("Y-m-d"));
        $diferencia = $ahora->diff($nacimiento);
        if ($diferencia->format("%y")>=18) {
            return "Tiene : " .$diferencia->format("%y")." años y es mayor de edad ";
        }else {
            return "Tiene : " .$diferencia->format("%y")." años y es menor de edad ";
        }
    }
}



?>