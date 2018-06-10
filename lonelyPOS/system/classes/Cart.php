<?php

class Cart
{
    private $items; //array LineItem

    public function __construct()
    {
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
}
?>
