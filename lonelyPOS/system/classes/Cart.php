<?php

class Cart
{

    private $member;
    private $items;
 // array LineItem
    public function __construct()
    {
        $this->member = null;
        $this->items = array();
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }

    public function addItems($product)
    {
        return $this->items[] = $product;
    }

    public function setMember($member)
    {
        $this->member = $member;
    }

    public function getMember()
    {
        return $this->member;
    }
}
?>
