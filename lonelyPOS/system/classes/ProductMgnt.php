<?php

class ProductMgnt
{
    public static function deleteProduct($b_code)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "DELETE FROM ProducLine WHERE ID='$b_code'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if($result)
        {
            echo '<script language="javascript">';
            echo 'alert("Delete success")';
            echo '</script>';
        }
        else {
            echo '<script language="javascript">';
            echo 'alert("Delete failed")';
            echo '</script>';
        }
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
        INNER JOIN SIZE ON ProductLine.SIZE_ID=SIZE.ID WHERE ProductLine.BARCODE_ID ='".$b_code."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            $product = new Product($result['PID'],$result['barid']
                ,$result['bname'], $result['pname'],$result['cname'],
                $result['size'],$result['price'],$result['quantity'],
                $result['proimages'],$result['pdescription']);
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
            $product = new Product($result['ID'],$result['barid']
                ,$result['bname'], $result['pname'],$result['cname'],
                $result['size'],$result['price'],$result['quantity'],
                $result['proimages'],$result['pdescription']);
            $resultArray[] = $product;
        }
        sort($resultArray);
        return $resultArray;
    }
    
    public static function checkProduct($barcode)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM ProductLine WHERE BARCODE_ID='" . $barcode . "' ";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return false;
        }
        return true;
    }
    public static function addBrand($brand)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM Brand WHERE NAME='".$brand."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return $idbrand=$result['ID'];
        }
        else{
            $sql = "INSERT INTO Brand(NAME) VALUES ('".$brand."')";
            $query = $conn->query($sql);
            $sql = "SELECT * FROM Brand WHERE NAME='".$brand."'";
            $query = $conn->query($sql);
            $result = $query->fetch_assoc();
            return $idbrand = $result['ID'];
        }
    }
    public static function addProduct($pid,$pname,$description,$brand)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM Product WHERE ID='".$pid."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return $idp=$result['ID'];
        }
        else{
            $idbrand=ProductMgnt::addBrand($brand);
            $sql1 = "INSERT INTO Product(BRAND_ID, NAME, DESCRIPTION) VALUES ('".$idbrand."','".$pname."','".$description."')";
            $query = $conn->query($sql1);
            $sql = "SELECT * FROM Product WHERE ID='".$pid."'";
            $query = $conn->query($sql);
            $result = $query->fetch_assoc();
            return $idp=$result['ID'];
        }
    }
    public static function addSize($size)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM SIZE WHERE CODE='".$size."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return $idsize=$result['ID'];
        }
        else{
            $sql1 = "INSERT INTO SIZE (CODE) VALUES ('".$size."')";
            $query = $conn->query($sql1);
            $sql = "SELECT * FROM SIZE WHERE CODE='".$size."'";
            $query = $conn->query($sql);
            $result = $query->fetch_assoc();
            return $idsize=$result['ID'];
        }
    }
    public static function addColor($color)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM COLOR WHERE NAME='".$color."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return $idcolor=$result['ID'];
        }
        else {
            $sql1 = "INSERT INTO COLOR(NAME) VALUES ('".$color."')";
            $query = $conn->query($sql1);
            $sql = "SELECT * FROM COLOR WHERE NAME='".$color."'";
            $query = $conn->query($sql);
            $result = $query->fetch_assoc();
            return $idcolor=$result['ID'];
        }
    }
    public static function addProductLine($pid,$pname,$Barcode,$brand,$size,$color,$price,$description,$quantity,$image)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM ProductLine WHERE BARCODE_ID='".$Barcode."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            echo '<script language="javascript">';
            echo 'alert("duplicate product")';
            echo '</script>';
        }
        else {
            $idcolor = ProductMgnt::addColor($color);
            $idbrand = ProductMgnt::addBrand($brand);
            $idp = ProductMgnt::addProduct($pid, $pname, $description, $brand);
            $idsize = ProductMgnt::addSize($size);
            $sql = "INSERT INTO ProductLinr (BARCODE_ID, PRODUCT_ID, COLOR_ID, SIZE_ID, PRICE,
            QUANTITY, PRO_images) VALUES ('".$Barcode."','".$pid."','".$idcolor."',
            '".$idsize."','".$price."','".$quantity."','".$image."',)";
            echo '<script language="javascript">';
            echo 'alert("add success")';
            echo '</script>';
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
        INNER JOIN SIZE ON ProductLine.SIZE_ID=SIZE.ID WHERE pname LIKE '%$name%' OR bname LIKE '%$name%'";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            $product = new Product($result['ID'],$result['barid']
                ,$result['bname'], $result['pname'],$result['cname'],
                $result['size'],$result['price'],$result['quantity'],
                $result['proimages'],$result['pdescription']);
            
            $resultArray[] = $product;
            $i ++;
        }
        if ($i == 0) {
            return null;
        }
        return $resultArray;
    }
    public static function editQuantity($quantity,$b_code)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql="UPDATE ProductLine SET QUANTITY = '".$quantity."' WHERE BARCODE_ID='".$b_code."' ";
        $query =$conn->query($sql);
        $result = $query->fetch_array();
        if($result)
        {
            echo '<script language="javascript">';
            echo 'alert("edit success")';
            echo '</script>';
            
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("edit failed")';
            echo '</script>';
            
        }
    }
}

?>
