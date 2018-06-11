<?php
require 'autoload.php';
$sizename= $_POST['sname'];
$sizecode =$_POST['scode'];

if(ProductMgnt::addSize($sizename, $sizecode))
{
    echo "<script language=\"JavaScript\">";
    echo "alert('add Color success)";
    echo "</script>";
    echo "<script> document.location.href=\"../addBrand.php\";</script>";
}else {
    echo "<script language=\"JavaScript\">";
    echo "alert('add failed)";
    echo "</script>";
    echo "<script> document.location.href=\"../addBrand.php\";</script>";
    
}


?>