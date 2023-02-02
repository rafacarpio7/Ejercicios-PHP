<?php
session_start();
//setcookie("trend", $_SESSION, time()+60*60*24,'/');

session_destroy();
header("Location: login.php");
?>