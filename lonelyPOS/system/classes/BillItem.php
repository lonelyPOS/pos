<?php

class BillItem
{

    private $id, $bill_id, $product, $qty;

    public function __construct($id, $bill_id, $product, $qty)
    {
        $this->id = $id;
        $this->bill_id = $bill_id;
        $this->product = $product;
        $this->qty = $qty;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getBill_id()
    {
        return $this->bill_id;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getQty()
    {
        return $this->qty;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setBill_id($bill_id)
    {
        $this->bill_id = $bill_id;
    }

    public function setProduct($product)
    {
        $this->product = $product;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }
}
?>