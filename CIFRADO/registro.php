<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    text-decoration: none;
    
    
}

li,a,button {
    font-family: 'Ubuntu', sans-serif;
    font-weight: 500;
    font-size: 16px;
    color: black;
    text-decoration: none;
}


header {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding: 7px 10%;
    background-color: #fff8f5;

}

.logo-inicio {
    cursor: pointer;
    height: 75px;
    margin-right: auto;
}


.logo {
    cursor: pointer;
    height: 75px;
    margin-right: auto;
    border: 0.5;
    border-radius: 30px;
}

.navbar {
    list-style: none;
    

}

.navbar li{
    display: inline-block;
    padding: 0px 20px;

}

.navbar li a{
    transition: all 0.3 ease 0s;
}

.navbar li a:hover {
    color: burlywood;
}
h1{
    text-align: center; 
    padding-top: 25px; 
    margin-top: 25px;
    font-family: 'Roboto';
}

button {
    margin-left: 40px;
    padding: 9px 25px;
    background-color: rgb(223, 235, 156);
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3 ease 0s;
}

button:hover {
    background-color:burlywood;
}

body {
    margin: 0;
    background: #f5e0d7;
    font-family: sans-serif;
    font-weight: 100;
}

.container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

table {
    margin: auto;
    margin-top: 5px;
    width: 800px;
    border-collapse: collapse;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);

}

th,td {
    padding: 15px;
    background-color: rgba(255,255,255,0.2);
    color: rgb(0, 0, 0);
    font-family: 'roboto';
}



th {
    text-align: center;
    
}

    th {
        background-color: #b6e2d3;
    }

form {
    width: 400px;
    background: #b6e2d3;
    padding-left: 20px;
    padding-top: 5px;
    margin: auto;
    margin-top: 75px;
    border-radius: 4px;


}

input {
    width: 150px;
    padding: 7px;
    border-radius: 4px;
    margin-bottom: 15px;
    margin-left: 10px;
    border: 1px solid #49a09d;
    font-family: 'Ubuntu', sans-serif;
}

legend {
    font-size: 22px;
    margin-bottom: 20px;
    margin-top: 20px;
}

.inicio {
    display: flex;
    align-items: center;
    justify-content: center;
    
}


   
    </style>
</head>
<body>
<form action="" method="post">
        <legend>REGISTRO</legend>
        Usuario : 
        <input type="text" placeholder="usuario" name="usuarioRegistro" required><br>
        Contrañesa :
        <input type="password" placeholder="contraseña" name="contraseñaRegistro" required><br>

        <input type="submit" name="btnRegistro" value="REGISTRATE">
        <a href="login.php">
            <input type="button" name="btnLogin" value="LOGIN">
        </a>
    </form>
</body>
</html>