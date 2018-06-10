<?php

class ProductMgnt
{

    public static function deleteProduct($proline_id)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "DELETE FROM ProducLine WHERE ID='$proline_id'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
    }

    public static function getProduct($b_code)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT ProductLine.BARCODE_ID AS barid ,ProductLine.PRO_images AS proimages,
        ProductLine.PRODUCT_ID AS PID,
        ProductLine.PRICE AS price , ProductLine.QUANTITY AS quantity,
        Brand.NAME AS bname, COLOR.NAME AS cname, SIZE.CODE AS size,
        Product.NAME AS pname,Product.DESCRIPTION AS pdescription
        FROM ProductLine INNER JOIN Product ON ProductLine.PRODUCT_ID=Product.ID
        INNER JOIN Brand ON Product.BRAND_ID=Brand.ID
        INNER JOIN COLOR ON ProductLine.COLOR_ID=COLOR.ID
        INNER JOIN SIZE ON ProductLine.SIZE_ID=SIZE.ID WHERE ProductLine.BARCODE_ID ='" . $b_code . "'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            $product = new Product($result['PID'], $result['barid'], $result['bname'], $result['pname'], $result['cname'], $result['size'], $result['price'], $result['quantity'], $result['proimages'], $result['pdescription']);
            return $product;
        } else {
            return NULL;
        }
    }

    public static function getAllProduct()
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT ProductLine.BARCODE_ID AS barid ,ProductLine.PRO_images AS proimages,
        ProductLine.PRICE AS price , ProductLine.QUANTITY AS quantity,
        Brand.NAME AS bname, COLOR.NAME AS cname, SIZE.CODE AS size,
        Product.NAME AS pname,Product.DESCRIPTION AS pdescription
        FROM ProductLine INNER JOIN Product ON ProductLine.PRODUCT_ID=Product.ID
        INNER JOIN Brand ON Product.BRAND_ID=Brand.ID
        INNER JOIN COLOR ON ProductLine.COLOR_ID=COLOR.ID
        INNER JOIN SIZE ON ProductLine.SIZE_ID=SIZE.ID";
        $query = $conn->query($sql);
        $resultArray = array();
        while ($result = $query->fetch_array()) {
            
            $product = new Product($result['ID'], $result['barid'], $result['bname'], $result['pname'], $result['cname'], $result['size'], $result['price'], $result['quantity'], $result['proimages'], $result['pdescription']);
            $resultArray[] = $product;
        }
        sort($resultArray);
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
        $sql = "SELECT ProductLine.BARCODE_ID AS barid ,ProductLine.PRO_images AS proimages,
        ProductLine.PRICE AS price , ProductLine.QUANTITY AS quantity,
        Brand.NAME AS bname, COLOR.NAME AS cname, SIZE.CODE AS size,
        Product.NAME AS pname,Product.DESCRIPTION AS pdescription
        FROM ProductLine INNER JOIN Product ON ProductLine.PRODUCT_ID=Product.ID
        INNER JOIN Brand ON Product.BRAND_ID=Brand.ID
        INNER JOIN COLOR ON ProductLine.COLOR_ID=COLOR.ID
        INNER JOIN SIZE ON ProductLine.SIZE_ID=SIZE.ID WHERE pname LIKE '%$name%'";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            
            $product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_IMAGE"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], $result["PRO_STOCKS"], $promotion);
            $resultArray[] = $product;
            $i ++;
        }
        if ($i == 0) {
            return null;
        }
        return $resultArray;
    }
}

?>
