<?php
    session_start();
    $session_set = false;
    if(isset($_SESSION['USER'])){
        $session_set = true;
        $user = $_SESSION['USER'];
        $cart = $_SESSION["CART"]; 
    }
?>