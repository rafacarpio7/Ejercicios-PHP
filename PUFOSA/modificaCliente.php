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
    session_start();

    if (!empty($_SESSION['presidente'])) {
        echo '<header>
        <a class="logo-inicio" href="index.html" ><img class="logo"  src="logo.png" alt="logo"></a>
            <nav>
                <ul class="navbar">
                    <li><a href="clientes.php"> Clientes </a></li>
                    <li><a href="empleados.php"> Empleados </a></li>
                    <li><a href="trabajos.php"> Trabajos </a></li>
                    <li><a href="departamentos.php"> Departamentos </a></li>
                    <li><a href="ubicacion.php"> Ubicacion </a></li>
                    <li><a href="informeDepartamentos.php"> Informe Departamentos </a></li>
                </ul>
            </nav>
            <a class="tag" href="logout.php"><button>Desconectar</button></a>
        </header>';
    } else if(!empty($_SESSION['admin'])){
        echo '<header>
        <a class="logo-inicio" href="index.html" ><img class="logo"  src="logo.png" alt="logo"></a>
            <nav>
                <ul class="navbar">
                    <li><a href="clientes.php"> Clientes </a></li>
                    <li><a href="empleados.php"> Empleados </a></li>
                    <li><a href="trabajos.php"> Trabajos </a></li>
                    <li><a href="departamentos.php"> Departamentos </a></li>
                    <li><a href="ubicacion.php"> Ubicacion </a></li>
                    
                </ul>
            </nav>
            <a class="tag"   href="logout.php"><button>Desconectar</button></a>
        </header>';
    }else {
        echo '<header>
        <a class="logo-inicio" href="index.html" ><img class="logo"  src="logo.png" alt="logo"></a>
            <nav>
                <ul class="navbar">
                    <li><a href="clientes.php"> Clientes </a></li>
                </ul>
            </nav>
            <a class="tag"   href="logout.php"><button>Desconectar</button></a>
        </header>';
    }


    
    ?>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Nuevo Cliente</legend>
            ID Cliente :
            <input type="number" name="idCliente" required><br>
            Nombre :
            <input type="text" name="nombre" required><br>
            Direccion : 
            <input type="text" name="direccion" required><br>
            Ciudad : 
            <input type="text" name="ciudad" required><br>
            Estado : 
            <input type="text" name="estado" required><br>
            Codigo Postal :
            <input type="text" name="codigoPostal" required><br>
            Codigo Area :
            <input type="text" name="codigoArea" required><br>
            Telefono : 
            <input type="text" name="telefono" required><br>
            Vendedor : 
            <input type="text" name="vendedorID" required><br>
            Limite de Credito :
            <input type="text" name="limiteCredito" required><br>
            Comentarios : 
            <input type="text" name="comentarios" required><br>
            <input type="submit" name="btnAñadir" value="Añadir">
        </fieldset>
    </form>

<?php
    echo "<ul>
        <li>Codigo Cliente : ".$_REQUEST['idCliente']."</li>
        <li>Nombre : ".$_REQUEST['nombreCli']."</li>
        <li>Direccion : ".$_REQUEST['direccionCli']."</li>
        <li>Ciudad : ".$_REQUEST['ciudadCli']."</li>
        <li>Estado : ".$_REQUEST['estadoCli']."</li>
        <li>Codigo Postal : ".$_REQUEST['codPostalCli']."</li>
        <li>Codigo Area : ".$_REQUEST['codAreaCli']."</li>
        <li>Telefono : ".$_REQUEST['telefonoCli']."</li>
        <li>Vendedor ID : ".$_REQUEST['vendedorIdCli']."</li>
        <li>Limite de Credito : ".$_REQUEST['limCredCli']."</li>
        <li>Comentarios : ".$_REQUEST['comentarioCli']."</li>
    </ul>"
?>
</body>
</html>

