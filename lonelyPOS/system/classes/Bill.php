<?php

class Bill
{

    private $bill_id, $member, $employee, $date, $total,$payAmount;
    private $billItems;

    public function __construct($bill_id, $member, $employee, $date, $total,$payAmount)
    {
        $this->bill_id = $bill_id;
        $this->member = $member;
        $this->employee = $employee;
        $this->date = $date;
        $this->total = $total;
        $this->billItems = array();
        $this->payAmount = $payAmount;
    }

    public function getMember()
    {
        return $this->member;
    }

    public function getEmployee()
    {
        return $this->employee;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getBillItems()
    {
        return $this->billItems;
    }

    public function setMember($member)
    {
        $this->member = $member;
    }

    public function setEmployee($employee)
    {
        $this->employee = $employee;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function setBillItems($billItems)
    {
        $this->billItems = $billItems;
    }

    public function addBillItems($billItem)
    {
        $this->billItems[] = $billItem;
    }

    public function getBill_id()
    {
        return $this->bill_id;
    }

    public function setBill_id($bill_id)
    {
        $this->bill_id = $bill_id;
    }

    public function getPayAmount()
    {
        return $this->payAmount;
    }

    public function setPayAmount($payAmount)
    {
        $this->payAmount = $payAmount;
    }

  
}
?>
