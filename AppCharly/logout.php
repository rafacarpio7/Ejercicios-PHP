<?php
    session_start();
    session_destroy();
    header("Location: AppPalabras.php");
?>