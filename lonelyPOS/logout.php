<?php
    session_start();
    session_destroy(); 
    unset($_SESSION['USER']);
    header("location:login.php");
?>