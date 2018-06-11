<?php

class EmployeeMgnt
{
    
    public static function getEmployeeByID($id)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $id = $conn->real_escape_string($id);
        $sql = "SELECT * FROM Employee WHERE ID = '$id'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            $employee = new Employee($result["USERNAME"], $result["PASSWORD"], $result["TYPE"], $result["EMAIL"], $result["FNAME"], $result["LNAME"], $result["GENDER"], $result["CITIZEN_ID"], $result["TEL"]);
            return $employee;
        } else {
            return NULL;
        }
    }
}

?>
