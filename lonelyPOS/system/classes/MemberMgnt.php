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
    
    public static function getMemberByID($id)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $id = $conn->real_escape_string($id);
        $sql = "SELECT * FROM Member WHERE ID = '$id'";
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
        $sql = "SELECT * FROM Member WHERE FNAME = '$m_fname'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            $product = new Member($result['ID'], $result['B_CODE'], $result['FNAME'], $result['LNAME'], $result['EMAIL'], $result['GENDER'], $result['B_DATE'], $result['ADDRESS'], $result['TEL']);
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
        $sql = "INSERT INTO Member (B_CODE,FNAME,LNAME,EMAIL,GENDER,B_DATE,ADDRESS,TEL)
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

    public static function getAllMember()
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM Member";
        $query = $conn->query($sql);
        $resultArray = array();
        while ($result = $query->fetch_array()) {
            
            $product = new Product($result['ID'], $result['B_CODE'], $result['FNAME'], $result['LNAME'], $result['EMAIL'], $result['GENDER'], $result['B_DATE'], $result['ADDRESS'], $result['TEL']);
            $resultArray[] = $product;
        }
        sort($resultArray);
        return $resultArray;
    }
}

?>
