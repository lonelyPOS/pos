<?php

class Product
{

    private $id, $bcode, $brand, $name, $color, $size, $price, $qty,$image,$description;

    public function __construct($id, $bcode, $brand, $name, $color, $size, $price, $qty,$image,$description)
    {
        $this->id = $id;     
        $this->bcode = $bcode;      
        $this->brand = $brand;        
        $this->name = $name;        
        $this->color = $color;        
        $this->size = $size;      
        $this->price = $price;       
        $this->qty = $qty;
        $this->image =$image;
        $this->description=$description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getBcode()
    {
        return $this->bcode;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQty()
    {
        return $this->qty;
    }

    public function getImage()
    {
        return $this->image;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setBcode($bcode)
    {
        $this->bcode = $bcode;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
}

?>
