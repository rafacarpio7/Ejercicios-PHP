<?php
class Viviendas2 
{
    function totalViviendas()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=inmobiliaria;charset=utf8", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
        $stmt = $conn->prepare("SELECT COUNT(*) FROM viviendas ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function totalViviendasFiltro($zonaParametro)
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=inmobiliaria;charset=utf8", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
        $stmt = $conn->prepare("SELECT COUNT(*) FROM viviedas WHERE zona=:zona");
        $stmt->bindParam(':zona',$zonaParametro);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


 

?>