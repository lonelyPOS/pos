<?php
require 'autoload.php';
$bcode= $_POST['edi'];
$quant = $_POST['quant'];

if(ProductMgnt::editQuantity($quant, $bcode))
{ 
    echo "<script> document.location.href=\"../listproduct.php\";</script>";
}else {
    echo "<script> document.location.href=\"../listproduct.php\";</script>";
    
}


?>