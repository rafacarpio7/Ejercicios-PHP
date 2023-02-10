<?php
    if (session_status()==PHP_SESSION_NONE) {
        session_start();
        $usuarioCookie=$_SESSION['idUsuario'];
    // segun la informacion guardada en nuestro login sabremos por la sesion si es admin presidente o empleado,
    // por tanto aqui se elige el menu de navegacion que vamos a mostrar segun sea .
    if (!isset($_SESSION['idUsuario'])) {
        header("Location: ../Vista/login.php");
    } else {
        if ($_SESSION['idUsuario']=='admin') {
            echo '<header>
            <a class="logo-inicio" href="../index.php" ><img class="logo"  src="../img/logo.png" alt="logo"></a>
                <nav>
                    <ul class="navbar">
                        <li><a href="../Vista/vista_viviendas.php"> Viviendas </a></li>
                        <li><a href="../Vista/vista_usuarios.php"> Usuarios </a></li>
                        <li><a href="../Vista/vista_filtros.php"> Filtrar </a></li>
                    </ul>
                </nav>
                <p id="usuario">'.$_SESSION['idUsuario'].'</p>';
                
                if (isset($_COOKIE[$usuarioCookie])) {
                    echo '<p id="cookie">'.$_COOKIE[$usuarioCookie].'</p>';
                }
                echo '<a class="tag" href="../Controlador/logout.php"><button>Desconectar</button></a>
            </header>';
        } else if($_SESSION['idUsuario']!='admin'){
            echo '<header>
            <a class="logo-inicio" href="../index.php" ><img class="logo"  src="../img/logo.png" alt="logo"></a>
                <nav>
                    <ul class="navbar">
                        <li><a href="../Vista/vista_viviendas.php"> Viviendas </a></li>
                        <li><a href="../Vista/vista_filtros.php"> Filtrar </a></li>
                    </ul>
                </nav>
                <p id="usuario">'.$_SESSION['idUsuario'].'</p>';
                if (isset($_COOKIE[$usuarioCookie])) {
                    echo '<p id="cookie">   '.$_COOKIE[$usuarioCookie].'   </p>';
                }
                echo '<a class="tag" href="../Controlador/logout.php"><button>Desconectar</button></a>
            </header>';
        }
    }
    } else {
    
    
    
    $usuarioCookie=$_SESSION['idUsuario'];
    // segun la informacion guardada en nuestro login sabremos por la sesion si es admin presidente o empleado,
    // por tanto aqui se elige el menu de navegacion que vamos a mostrar segun sea .
    if (!isset($_SESSION['idUsuario'])) {
        header("Location: ../Vista/login.php");
    } else {
        if ($_SESSION['idUsuario']=='admin') {
            echo '<header>
            <a class="logo-inicio" href="../index.php" ><img class="logo"  src="../img/logo.png" alt="logo"></a>
                <nav>
                    <ul class="navbar">
                        <li><a href="../Vista/vista_viviendas.php"> Viviendas </a></li>
                        <li><a href="../Vista/vista_usuarios.php"> Usuarios </a></li>
                        <li><a href="../Vista/vista_filtros.php"> Filtrar </a></li>
                    </ul>
                </nav>
                <p id="usuario">'.$_SESSION['idUsuario'].'</p>';
                
                if (isset($_COOKIE[$usuarioCookie])) {
                    echo '<p id="cookie">'.$_COOKIE[$usuarioCookie].'</p>';
                }
                echo '<a class="tag" href="../Controlador/logout.php"><button>Desconectar</button></a>
            </header>';
        } else if($_SESSION['idUsuario']!='admin'){
            echo '<header>
            <a class="logo-inicio" href="../index.php" ><img class="logo"  src="../img/logo.png" alt="logo"></a>
                <nav>
                    <ul class="navbar">
                        <li><a href="../Vista/vista_viviendas.php"> Viviendas </a></li>
                        <li><a href="../Vista/vista_filtros.php"> Filtrar </a></li>
                    </ul>
                </nav>
                <p id="usuario">'.$_SESSION['idUsuario'].'</p>';
                if (isset($_COOKIE[$usuarioCookie])) {
                    echo '<p id="cookie">   '.$_COOKIE[$usuarioCookie].'   </p>';
                }
                echo '<a class="tag" href="../Controlador/logout.php"><button>Desconectar</button></a>
            </header>';
        }
    }
        # code...
    }
    ?>