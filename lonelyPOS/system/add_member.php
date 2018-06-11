<?php
require 'autoload.php';
if($_POST){
    $fname = $_POST['m_fname'];
    $lname = $_POST['m_lname'];
    $email = $_POST['m_email'];
    $add = $_POST['m_adds'];
    $tel = $_POST['m_tel'];
    $gender = $_POST['m_gender'];
    $b_date = $_POST['m_b_date'];
    $member = MemberMgnt::addMember($fname, $lname, $email, $add, $tel, $b_date, $gender);
    if($member != null){
        $member = MemberMgnt::getMemberByCode($member->getMem_code());
        $cart->setMember($member);
        echo "<script language=\"JavaScript\">";
        echo "alert('Add member success!!')";
        echo "</script>";
        echo "<script> document.location.href=\"../pos.php\";</script>";
    }else{
        echo "<script language=\"JavaScript\">";
        echo "alert('Add member failed!!')";
        echo "</script>";
        echo "<script> document.location.href=\"../pos.php\";</script>";
    }
}else{
    echo "<script> document.location.href=\"../pos.php\";</script>";
}
?>