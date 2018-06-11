<?php
require 'autoload.php';
$bcode= $_POST['edi'];
$quant = $_POST['quant'];

if(ProductMgnt::editQuantity($quant, $b_code))
{ 
    echo "<script> document.location.href=\"../addBrand.php\";</script>";
}else {
    echo "<script> document.location.href=\"../addBrand.php\";</script>";
    
}


?>