<?php

class CartItem
{
    private $bcode;
    private $product;
    private $qty;
    public function __construct($product, $qty){
        $this->bcode = $product->getBcode();
        $this->product = $product;
        $this->qty = $qty;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getQty()
    {
        return $this->qty;
    }

    public function setProduct($product)
    {
        $this->product = $product;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }
 
    public function getBcode()
    {
        return $this->bcode;
    }

    public function setBcode($bcode)
    {
        $this->bcode = $bcode;
    }
    
    public function getTotalPrice(){
        return $this->product->getPrice() * $this->qty;
    }
 
}
?>

