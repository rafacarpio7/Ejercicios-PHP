<?php
class Calculadora 
{
    private $resultado;


    public function suma($num1,$num2)
    {
        $this->resultado = $num1 + $num2;
        return $this->resultado;
    }

    public function resta($num1,$num2)
    {
        $this->resultado = $num1 - $num2;
        return $this->resultado;
    }

    public function multiplicacion($num1,$num2)
    {
        $this->resultado = $num1 * $num2;
        return $this->resultado;
    }

    public function division($num1,$num2)
    {
        $this->resultado = $num1 / $num2;
        return $this->resultado;
    }

}


?>