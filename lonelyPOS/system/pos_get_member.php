<?php
require 'autoload.php';
require 'classes/config/config.php';
echo '<script src="js/pos.js"></script>';
if (isset($_POST['member_code'])) {
    $code = $_POST['member_code'];
    $member = MemberMgnt::getMemberByCode($code);
    if ($member != null) {
        $name = $member->getFname().' '.$member->getLname();
        echo '<script type="text/javascript">', 'disableMemInput();', '</script>';
        echo "<script type='text/javascript'>setMemInput('$name');</script>";
        $cart->setMember($member);
    }
}
?>	