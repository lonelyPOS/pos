<?php

class LoginMgnt
{

    public static function loginAuth($user, $pass)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $user = $conn->real_escape_string($user);
        $pass = $conn->real_escape_string($pass);
        $sql = "SELECT * FROM Employee WHERE USERNAME = '$user' AND PASSWORD ='$pass' ";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            $acc = new Employee($result["ID"],$result["USERNAME"], $result["PASSWORD"], $result["TYPE"], $result["EMAIL"], $result["FNAME"], $result["LNAME"], $result["GENDER"], $result["CITIZEN_ID"], $result["TEL"]);
            $conn->close();
            return $acc;
        }
        return null;
    }

    public static function logout()
    {
        session_start();
        session_destroy();
        header("location:../index.php");
        exit();
    }
}
?>
