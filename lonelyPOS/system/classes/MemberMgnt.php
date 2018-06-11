<?php

class MemberMgnt
{

    public static function getMemberByCode($b_code)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $b_code = $conn->real_escape_string($b_code);
        $sql = "SELECT * FROM Member WHERE B_CODE = '$b_code'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            $member = new Member($result['ID'], $result['B_CODE'], $result['FNAME'], $result['LNAME'], $result['EMAIL'], $result['GENDER'], $result['B_DATE'], $result['ADDRESS'], $result['TEL']);
            return $member;
        } else {
            return NULL;
        }
    }

    public static function getMember($m_fname)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM Member WHERE BARCODE_ID = '$b_code'"; // ทำไงอะ
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            $product = new Product($result['ID'], $b_code, null, 'xxx', $result['COLOR_ID'], $result['SIZE_ID'], $result['PRICE'], $result['QUANTITY']);
            return $product;
        } else {
            return NULL;
        }
    }

    public static function addMember($fname, $lname, $email, $add, $tel, $b_date, $gender)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $fname = $conn->real_escape_string($fname);
        $lname = $conn->real_escape_string($lname);
        $email = $conn->real_escape_string($email);
        $add = $conn->real_escape_string($add);
        $tel = $conn->real_escape_string($tel);
        $gender = $conn->real_escape_string($gender);
        $b_date = $conn->real_escape_string($b_date);
        $bcode = MemberMgnt::generateCodeMember();
        $sql = "INSERT INTO Member (B_CODE,FNAME,LNAME,EMAIL, GENDER,B_DATE,ADDRESS, TEL)
		VALUES('$bcode','$fname','$lname','$email','$gender','$b_date','$add','$tel');";
        $result = $conn->query($sql);
        $conn->close();
        if ($result) {
            $member = new Member(null, $bcode, $fname, $lname, $email, $gender, $b_date, $add, $tel);
            return $member;
        } else {
            return null;
        }
    }

    public static function generateCodeMember($length = 20)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        while (true) {
            $code = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
            $sql = "SELECT * FROM Member WHERE B_CODE = '$code' ";
            $query = $conn->query($sql);
            $result = $query->fetch_assoc();
            if (! $result) {
                return $code;
            }
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
            
            $product = new Product($result['PRODUCT_ID'], $result['barid'], $result['bname'], $result['pname'], $result['cname'], $result['size'], $result['price'], $result['quantity'], $result['proimages'], $result['pdescription']);
            $resultArray[] = $product;
        }
        sort($resultArray);
        return $resultArray;
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
}

?>
