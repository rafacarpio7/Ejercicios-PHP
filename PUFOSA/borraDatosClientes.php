
<?php

if (isset($_REQUEST['btnBorrar'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",
        $username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT CLIENTE_ID FROM cliente WHERE cliente_id=:idCliente;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idCliente', $_REQUEST['idCliente']);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($registros)>0) {
            $sql= "DELETE FROM cliente WHERE cliente_id=:idCliente; " ;
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idCliente', $_REQUEST['idCliente']);
                $stmt->execute();
                
        }        

    } catch (PDOException $e) {
        echo 'ERROR '. $e->getMessage();
    }
    $conn = null ;
}
header("Location: clientes.php");
?>
