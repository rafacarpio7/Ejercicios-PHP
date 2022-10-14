<?php
class Cuenta  
{
    private $nombreCliente;
    private $numeroCuenta;
    private $tipoInteres;
    private $saldo;
    
    
    public function __construct($nombre,$numeroC,$tipoI,$saldo)
    {
        $this->nombreCliente = $nombre;
        $this->numeroCuenta=$numeroC;
        $this->tipoInteres=$tipoI;
        $this->saldo=$saldo;
    }


    public function get_NombreCliente()
    {
        return $this->nombreCliente;
    }

    public function set_NombreCliente($nombreCli)
    {
        $this->nombreCliente=$nombreCli;
    }

    public function get_NumeroCuenta()
    {
        return $this->numeroCuenta;
    }

    public function set_NumeroCuenta($numeroCu)
    {
        $this->numeroCuenta=$numeroCu;
    }

    public function get_TipoInteres()
    {
        return $this->tipoInteres;
    }
    
    public function set_TipoInteres($tipoIn)
    {
        $this->tipoInteres=$tipoIn;
    }

    public function get_Saldo()
    {
        return $this->saldo;
    }

    public function set_Saldo($saldoN)
    {
        $this->saldo=$saldoN;
    }

    public function ingreso($cantidad)
    {
        $this->saldo=$this->saldo+$cantidad;
        return true;
    }

    public function reintegro($cantidad)
    {
        if (($this->saldo-$cantidad)<=0 ) {
            
            return false;
        }else {
            $this->saldo=$this->saldo-$cantidad;
            return true;
        }
    }

    function printCaracteristicas($cuentaAImprimir)
    {
        
        echo 'Nombre Cliente: '. $cuentaAImprimir->get_NombreCliente();
        echo "<br>";
        echo 'Numero de Cuenta: '. $cuentaAImprimir->get_NumeroCuenta();
        echo "<br>";
        echo 'Tipo de Interes: '. $cuentaAImprimir->get_TipoInteres();
        echo "<br>";
        echo 'Saldo: '. $cuentaAImprimir->get_Saldo() . '€';
        
    }

}

?>