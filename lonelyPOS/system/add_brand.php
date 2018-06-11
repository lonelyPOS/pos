<?php
require 'autoload.php';
$brandname= $_POST['bname'];
ProductMgnt::addBrand($brandname);
echo "<script language=\"JavaScript\">";
echo "alert('add brand success)";
echo "</script>";
echo "<script> document.location.href=\"../addBrand.php\";</script>";

?>