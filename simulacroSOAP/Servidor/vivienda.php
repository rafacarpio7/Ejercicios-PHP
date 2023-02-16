<?php
class vivienda {

    public function conexion ($db){
        try {
            $conn = new PDO ("mysql:host={$db['host']};dbname={$db['db']};charset=utf8", $db['username'], $db['password']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conexión establecida";
            return $conn;
        } catch (PDOException $e) {
           return $e->getMessage();
        } 
    }

    // public function conteo ($conn) {
    //     $sql="SELECT COUNT(*) AS 'cantidad' FROM viviendas WHERE zona='".$_POST['zona']."';";
    //     $result=$conn->query($sql);
    //     $num=$result->fetch();
    //     return $num['cantidad'];
    // }

    public function conteo ($db,$valor) {
        $conn = $this->conexion($db);
       
            $sql = "SELECT COUNT(*) FROM viviendas WHERE zona=:zona;";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':zona',$valor);
            $stmt->execute();
            $num = $stmt->fetch();
            return $num;
       
    }
    

}
?>