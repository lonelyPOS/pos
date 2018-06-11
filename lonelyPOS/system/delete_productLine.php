<?php
require 'autoload.php';
echo $_POST['del'];
$b_code = $_POST['del'];


if (ProductMgnt::deleteProduct($b_code))
{
echo "<script> document.location.href=\"../listproduct.php\";</script>";
}
else 
{
    echo "<script> document.location.href=\"../listproduct.php\";</script>";
}
?>