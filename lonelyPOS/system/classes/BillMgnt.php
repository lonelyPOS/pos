<?php

class BillMgnt
{

    public static function getBillByBillID($bill_id)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM Bill WHERE ID ='" . $bill_id . "'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            $member = MemberMgnt::getMemberByID($result['MEMBER_ID']);
            $employee = EmployeeMgnt::getEmployeeByID($result['EMPLOYEE_ID']);
            $bill = new Bill($result['ID'], $member, $result['EMPLOYEE_ID'], $result['DATE_TIME'], $result['TOTAL_PRICE'], $result['PAY_AMOUNT']);
            $bill->setBillItems(BillMgnt::getBillItemsByBillID($bill_id));
            return $bill;
        }
        return null;
    }

    public static function getBillItemsByBillID($bill_id)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM BillItem WHERE BILL_ID = '" . $bill_id . "' ";
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

    public static function createBill($bill)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $mem_id = $bill->getMember()->getId();
        $em_id = $bill->getEmployee()->getIndex();
        $date = $bill->getDate();
        $total = $bill->getTotal();
        $amount = $bill->getPayAmount();
        $sql = "INSERT INTO Bill (MEMBER_ID,EMPLOYEE_ID,DATE_TIME,TOTAL_PRICE,PAY_AMOUNT) VALUES ('$mem_id','$em_id','$date','$total','$amount');";
        $query = $conn->query($sql);
        if ($query) {
            $sql = "SELECT * FROM Bill WHERE MEMBER_ID = '$mem_id' ORDER BY ID DESC LIMIT 1";
            $query = $conn->query($sql);
            $result = $query->fetch_assoc();
            if ($result) {
                $bill_id = $result['ID'];
                $items = $bill->getBillItems();
                foreach ($items as $item){
                    $product_id = $item->getProduct()->getId();
                    $qty = $item->getQty();
                    $sql = "INSERT INTO BillItem (BILL_ID,PRODUCT_LINE_ID,QUANTITY)  VALUES ('$bill_id','$product_id','$qty')";
                    $query = $conn->query($sql);
                }
                return $bill_id;
            }
        }
        return -1;
    }
}

