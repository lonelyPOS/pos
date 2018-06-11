<?php

class BillMgnt
{
    public static function getBillByBillID($bill_id){
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM Bill WHERE ID ='".$bill_id."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if($result){
            $member = MemberMgnt::getMemberByID($result['MEMBER_ID']);
            $employee = EmployeeMgnt::getEmployeeByID($result['EMPLOYEE_ID']);
            $bill = new Bill($result['ID'], $member, $result['EMPLOYEE_ID'], $result['DATE_TIME'], $result['TOTAL_PRICE'],$result['PAY_AMOUNT']);
            $bill->setBillItems(BillMgnt::getBillItemsByBillID($bill_id));
            return $bill;
        }
        return null;
    }
    
    public static function getBillItemsByBillID($bill_id){
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM BillItem WHERE BILL_ID = '" . $bill_id. "' ";
        $query = $conn->query($sql);
        $resultArray = array();
        $count = 0;
        while ($result = $query->fetch_array()) {
            $product = ProductMgnt::getProductByID($result['PRODUCT_LINE_ID']);
            $qty = $result['QUANTITY'];
            $id = $result['ID'];
            $billItem = new BillItem($id, $bill_id, $product, $qty);
            $resultArray[] = $billItem;
            $count ++;
        }
        if ($count === 0) {
            return NULL;
        }
        return $resultArray;
    }
}

