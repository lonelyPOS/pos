<?php
require 'autoload.php';
$colorname= $_POST['cname'];
$hex =$_POST['hexcode'];

if(ProductMgnt::addColor($colorname, $hex))
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