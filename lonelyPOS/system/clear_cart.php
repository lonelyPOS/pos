<?php
    require 'autoload.php';
    session_start();
    $_SESSION['CART'] = new Cart();
    header("location:../pos.php");
?>