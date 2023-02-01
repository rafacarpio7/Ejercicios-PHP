<?php
    session_start();

    // segun la informacion guardada en nuestro login sabremos por la sesion si es admin presidente o empleado,
    // por tanto aqui se elige el menu de navegacion que vamos a mostrar segun sea .
    if (!isset($_SESSION['idUsuario'])) {
        header("Location: ../Vista/login.php");
    } else {
        if ($_SESSION['idUsuario']=='admin') {
            echo '<header>
            <a class="logo-inicio" href="inicio.php" ><img class="logo"  src="../img/logo.png" alt="logo"></a>
                <nav>
                    <ul class="navbar">
                        <li><a href="../Vista/vistaPrueba.php"> Viviendas </a></li>
                        <li><a href="empleados.php"> Usuarios </a></li>
                        <li><a href="../Vista/vista_filtros.php"> Filtrar </a></li>
                    </ul>
                </nav>
                <p>  '.$_SESSION['idUsuario'].'  </p>';
                
                if (isset($_COOKIE["fecha"])) {
                    echo '<p>   '.$_COOKIE["fecha"].'   </p>';
                }

                echo '<a class="tag" href="../Controlador/logout.php"><button>Desconectar</button></a>
            </header>';
        } else if($_SESSION['idUsuario']!='admin'){
            echo '<header>
            <a class="logo-inicio" href="inicio.php" ><img class="logo"  src="../img/logo.png" alt="logo"></a>
                <nav>
                    <ul class="navbar">
                        <li><a href="../Vista/vistaPrueba.php"> Viviendas </a></li>
                        <li><a href="../Vista/vista_filtros.php"> Filtrar </a></li>
                    </ul>
                </nav>
                <p>'.$_SESSION['idUsuario'].'</p>
                <a class="tag" href="../Controlador/logout.php"><button>Desconectar</button></a>
            </header>';
        }
    }
    
    ?>