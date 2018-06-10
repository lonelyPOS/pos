<?php
function __autoload($class_name) {
    if(file_exists('classes/'.$class_name . '.php')) {
        require_once('classes/'.$class_name . '.php');
    } else {
        throw new Exception("Unable to load $class_name.");
    }
}
require '../includes/session.php';
if ($session_set) {
    $user = $_SESSION['USER'];
    $cart = $_SESSION["CART"]; 
}
?>