<?php
    require 'autoload.php';
    $_SESSION['CART']->setMember(null);
    header("location:../pos.php");
?>