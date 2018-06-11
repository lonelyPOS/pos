<?php

class Employee
{

    private $index,$id, $pass, $type, $email, $fname, $lname, $gender, $citID, $tel;

    public function __construct($index,$id, $pass, $type, $email, $fname, $lname, $gender, $citID, $tel)
    {
        $this->index = $index;
        $this->id = $id;
        $this->pass = $pass;
        $this->type = $type;
        $this->email = $email;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->gender = $gender;
        $this->citID = $citID;
        $this->tel = $tel;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getPASS()
    {
        return $this->pass;
    }

    public function getTYPE()
    {
        return $this->type;
    }

    public function getEMAIL()
    {
        return $this->email;
    }

    public function getFNAME()
    {
        return $this->fname;
    }

    public function getLNAME()
    {
        return $this->lname;
    }

    public function getGENDER()
    {
        return $this->genger;
    }

    public function getTEL()
    {
        return $this->tel;
    }

    public function setID($id)
    {
        $this->id = id;
    }

    public function setPASS($pass)
    {
        $this->pass = pass;
    }

    public function setTYPE($type)
    {
        $this->TYPE = type;
    }

    public function setEMAIL($email)
    {
        $this->email = email;
    }

    public function setFNAME($fname)
    {
        $this->fname = fname;
    }

    public function setLNAME($lname)
    {
        $this->lname = lname;
    }

    public function setGENDER($gender)
    {
        $this->gender = gender;
    }

    public function setTEL($tel)
    {
        $this->tel = tel;
    }

    public function getCitID()
    {
        return $this->citID;
    }

    public function setCitID($citID)
    {
        $this->citID = $citID;
    }

    public function getIndex()
    {
        return $this->index;
    }

    public function setIndex($index)
    {
        $this->index = $index;
    }

    
    
}
?>
