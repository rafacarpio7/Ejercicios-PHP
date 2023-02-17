<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";


//COMPROBACIÖN DE USUARIO
if (isset($_REQUEST['camareroId'])) {
    $conexion = new PDO("mysql:host=$servername;dbname=mi_restaurante_favorito;charset=utf8",$username,$password);
    $sql = "SELECT usuario, contrasena FROM usuarios WHERE usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $_REQUEST['camareroId']);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (password_verify($_REQUEST["contrasena"], $registros[0]["contrasena"])&&($_REQUEST["camareroId"] == $registros[0]["usuario"])) {
            $_SESSION['idUsuario']=$_REQUEST['camareroId'];
            echo "Usuario:".$_SESSION['idUsuario'] . "<br>";
        } else {
            header("location: login.php");
        }
} else {
}

//RECOGIDA DE TODOS LOS DATOS PARA SER MOSTRAOS EN LA PAGINA INICIAL
try {
    $conexion = new PDO("mysql:host=$servername;dbname=mi_restaurante_favorito;charset=utf8",$username,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement =$conexion->prepare("SELECT * FROM platos ;");
    $statement->execute();

    $registros =$statement->fetchAll();



} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a class="tag" href="logout.php"><button>Desconectar</button></a>
    <form action="" method="get">
        <?php
        //TRATAMIENTO DE DATOS SIENDO MOSTRADOS
            foreach ($registros as $valor ) {
                echo "Plato de ".$valor['nombre_plato']. " :".$valor['precio']."€"."<input type='checkbox' name='platos[]' id='".$valor['id']."' value='".$valor['nombre_plato']."' ><br>" ;
                
            }
        ?>
        <br>
        <input type="submit" name="btnAñadir" value="Añadir">
        <input type="submit" name="btnEliminar" value="Eliminar">
       
        <input type="submit" name="btnCerrarCuenta" value="Cerrar cuenta"> 
        
    </form>

    <?php

    if (isset($_REQUEST['btnAñadir'])) {

        if (isset($_REQUEST['platos'])) {

            foreach ($_REQUEST['platos'] as $key=>$value ) {  //Cojemos el nombre de request platos y le asignamos al indice el nombre y creamos un valor
               // echo $_REQUEST['platos'][$key]; key es el nombre, valor
                // echo $_SESSION[$value];
                if (empty($_SESSION) || !array_key_exists($_REQUEST['platos'][$key],$_SESSION)) {
                        //creamos la sesion con el nombre del plato y le asignamos 1 si no existia
                    $_SESSION[$_REQUEST['platos'][$key]]=1;

                }else {
                        //Recuperamos lo que valia la sesion y le sumamos uno
                    $cantidadPlatos= $_SESSION[$value]+1;
                        //ese valor recuperado se lo metemos a la sesion
                    $_SESSION[$_REQUEST['platos'][$key]]=$cantidadPlatos;

                }
            }
        }
        
    }

    if (isset($_REQUEST['btnEliminar'])) {

        if (!empty($_REQUEST['platos'])) {

            foreach ($_REQUEST['platos'] as $key=>$value ) {

                if (empty($_SESSION) || !array_key_exists($_REQUEST['platos'][$key],$_SESSION)) {
                    //sino existe no hacemos nada
                }else{

                    if ($_SESSION[$value]<=0) {
                        //si su valor es 0 no hacemos nada
                    } else {
                        //si existe y su valor no es 0 le restamos 1
                        $cantidadPlatos= $_SESSION[$value]-1;
                    $_SESSION[$_REQUEST['platos'][$key]]=$cantidadPlatos;

                    }
                }
            }
        }
    }

    if (isset($_REQUEST['btnCerrarCuenta'])) {

        header("Location: cuenta.php");

    }



    ?>

    <div>
        <ul>
            <?php
            print_r($_SESSION);
            echo "<br>";
            echo $_SESSION['idUsuario'];

            //IMPRIMIMOS LOS VALORES DE LAS SESIONES PARA SABER CUANTOS PLATOS LLEVAMOS DE CADA COSA
                foreach ($_SESSION as $key=>$value) {
                    if ($key=='idUsuario') {
                        
                    }else {
                        echo "<li>". $key ." : " . $value.  "</li>";
                    }
                    
                }
            ?>
        </ul>   

    </div>


    <div>
        <ul>
            <h1>Platos mas pedidos</h1>
            <?php
            $sesiones_cookie = unserialize($_COOKIE['sesiones_altas']);
            //print_r($_COOKIE['sesiones_altas']);
            $cookie_mostrar = array_slice($sesiones_cookie,0,3,true);
            foreach ($cookie_mostrar as $key=>$value) {
                if ($key=='idUsuario') {
                    
                }else {
                    echo "<li>". $key ." : " . $value.  "</li>";
                }
                
                
                
                }
            ?>
        </ul>
    </div>
</body>
</html>