<?php

class Cart
{

    private $member;
    private $items;
    private $totalPaying;
    public function __construct()
    {
        $this->member = null;
        $this->items = array();
        $this->totalPaying = 0;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }

    public function addItems($cart_item)
    {
        return $this->items[] = $cart_item;
    }

    public function setMember($member)
    {
        $this->member = $member;
    }

    public function getMember()
    {
        return $this->member;
    }
    
    public function removeItemsByBCode($b_code){
        $item_new = array();
        foreach ($this->items as $cart_item){
            if($cart_item->getBcode() != $b_code){
                $item_new [] = $cart_item;
            }
        }
        $this->items = $item_new;
    }
    
    public function getCount(){
        $count = 0;
        foreach ($this->items as $cart_item){
            $count+=$cart_item->getQty();
        }
        return $count;
    }
    
    public function getTotalPrice() {
        $price = 0;
        foreach ($this->items as $cart_item){
            $price+=$cart_item->getTotalPrice();
        }
        return $price;
    }

    public function getTotalPaying()
    {
        return $this->totalPaying;
    }

    public function setTotalPaying($totalPaying)
    {
        $this->totalPaying = $totalPaying;
    }
 
}
?>
