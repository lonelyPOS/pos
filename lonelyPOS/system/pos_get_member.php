<?php
require 'autoload.php';
if (isset($_POST['member_code'])) {
    $code = $_POST['member_code'];
    $member = MemberMgnt::getMemberByCode($code);
    if ($member != null) {
        $name = $member->getFname().' '.$member->getLname();
        echo '<script type="text/javascript">', 'disableMemInput();', '</script>';
        echo '<script type="text/javascript">', 'showMemberCorr();', '</script>';
        echo "<script type='text/javascript'>setMemInput('$name');</script>";
        $cart->setMember($member);
    }else{
        echo '<script type="text/javascript">', 'showMemberNot();', '</script>';
    }
}
?>	