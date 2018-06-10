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
}

