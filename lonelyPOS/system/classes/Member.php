<?php

class Member
{

    private $id, $mem_code, $fname, $lname, $email, $gender, $b_date, $address, $tel;

    public function __construct($id, $mem_code, $fname, $lname, $email, $gender, $b_date, $address, $tel)
    {
        $this->id = $id;
        $this->mem_code = $mem_code;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->gender = $gender;
        $this->b_date = $b_date;
        $this->address = $address;
        $this->tel = $tel;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMem_code()
    {
        return $this->mem_code;
    }

    public function getFname()
    {
        return $this->fname;
    }

    public function getLname()
    {
        return $this->lname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getB_date()
    {
        return $this->b_date;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setMem_code($mem_code)
    {
        $this->mem_code = $mem_code;
    }

    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function setB_date($b_date)
    {
        $this->b_date = $b_date;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }
}

