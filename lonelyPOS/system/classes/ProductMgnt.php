<?php
class ProductMgnt
{
    public static function getProduct($b_code)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM ProductLine WHERE BARCODE_ID = '$b_code'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if($result){
            $product = new Product($result['ID'], $b_code, null, 'xxx', $result['COLOR_ID'], $result['SIZE_ID'], $result['PRICE'], $result['QUANTITY']);
            return $product;
        }else{
            return NULL;
        }
    }
    
    public static function getAllProduct()
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT ";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            $promotion = PromotionMgnt::getPromotionByProductID($result["PRO_INDEX"]);
            $product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_IMAGE"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], $result["PRO_STOCKS"],$promotion);
            $resultArray[] = $product;
        }
        shuffle($resultArray);
        return $resultArray;
    }
    
    public static function checkProduct($name)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT WHERE PRO_NAME='" . $name . "' ";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return false;
        }
        return true;
    }
    
    public static function addProduct($name, $image, $price, $des, $type)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO PRODUCT(PRO_NAME,PRO_IMAGE,PRO_PRICE,PRO_DESC,PRO_STOCKS,CAT_INDEX)
		VALUES('" . $name . "','" . $image . "','" . $price . "','" . $des . "','0', '" . $type . "');";
        echo $sql;
        if ($conn->query($sql) === TRUE) {
            echo "<script language=\"JavaScript\">";
            echo "alert('Add new product successfully.')";
            echo "</script>";
            echo "<script> document.location.href=\"../add_product.php\";</script>";
            exit();
        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('Fail to add product.')";
            echo "</script>";
            echo "<script> document.location.href=\"../add_product.php\";</script>";
            exit();
        }
        
        $conn->close();
    }
       
   
    public static function search($name)
    {
        require 'config/config.php';      
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT WHERE PRO_NAME LIKE '%$name%'";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            $promotion = PromotionMgnt::getPromotionByProductID($result["PRO_INDEX"]);
            $product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_IMAGE"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], $result["PRO_STOCKS"],$promotion);
            $resultArray[] = $product;
            $i++;
        }
        if($i==0){
            return null;
        }
        return $resultArray;
    }
}
?>
