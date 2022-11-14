
<?php
session_start();
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
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"DELETE;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
                echo'<script type="text/javascript">
                    alert("El Cliente ha sido borrado correctamente");
                    window.location.href="clientes.php";
                    </script>';
        }        

    } catch (PDOException $e) {
        echo 'ERROR '. $e->getMessage();
        echo'<script type="text/javascript">
                    alert("El cliente no puede ser borrado");
                    window.location.href="clientes.php";
                    </script>';
    }
    $conn = null ;
}

?>
