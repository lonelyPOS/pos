<?php
require 'autoload.php';
if ($session_set) {
   
}else{
    echo "<script> document.location.href=\"../login.php\";</script>";
}
echo "<script> document.location.href=\"../index.php\";</script>";
?>