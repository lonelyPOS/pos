<?php
class color
{
    private $id,$name,$hex;
    public function __construct($id,$name,$hex)
    {
        $this->id=$id;
        $this->name=$name;
        $this->hex=$hex;      
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getHex()
    {
        return $this->hex;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $hex
     */
    public function setHex($hex)
    {
        $this->hex = $hex;
    }

}
?>