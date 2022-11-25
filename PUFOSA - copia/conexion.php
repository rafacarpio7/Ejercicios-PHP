<?php
$servername = "localhost";
$username = "root";
$password = "";
$sql="";
$conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>