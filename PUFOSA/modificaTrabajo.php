    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <title>Document</title>
    </head>
    <?php
    include_once "CRUD.php"; 
    ?>
    <body>
        <form action="" method="post">
            
                <legend>Modifica Trabajo</legend>
                ID Trabajo :
                <input type="text" name="idTrabajo" value="<?=$_REQUEST['trabajoId']?>"disabled><br>
                Funcion :
                <input type="text" name="funcion" value="<?=$_REQUEST['funcion']?>" required><br>
                <input type="submit" name="btnModificar" value="Modificar">
            
        </form>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $sql="";
        $idTrabajoGuardado = $_REQUEST['trabajoId'];
        if (isset($_REQUEST['btnModificar'])) {
            try {
                $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE trabajos SET Trabajo_ID=:trabajID,Funcion=:fun WHERE Trabajo_ID=:trabajoIDGuardada;";

                $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':trabajID', $idTrabajoGuardado);
                    $stmt->bindParam(':fun', $_REQUEST['funcion']);
                    $stmt->bindParam(':trabajoIDGuardada', $idTrabajoGuardado);
                    $log = fopen("log.csv","a+b");
                    $DateAndTime = date('d-m-Y h:i:s a', time());
                    fwrite($log,"UPDATE;".$_SESSION['sesion'].";$DateAndTime\n");
                    fclose($log);
                    if ($stmt->execute()) {
                        echo'<script type="text/javascript">
                                alert("Trabajo modificado correctamente");
                                window.location.href="trabajos.php";
                                </script>';
                    }
                    
                
            }catch (PDOException $e) {
                echo 'Conexion fallida'. $e->getMessage();
                
            }
        }
            $conn=null;
        
        ?>

    </body>
    </html>