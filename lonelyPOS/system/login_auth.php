<?php
require 'autoload.php';
$userinput = $_POST['username'];
$passinput = $_POST['password'];
if ($userinput === "" || $passinput === "") {
    echo "<script language=\"JavaScript\">";
    echo "alert('กรุณาใส่ข้อมูลให้ครบถ้วน')";
    echo "</script>";
    echo "<script> document.location.href=\"../login.php\";</script>";
} else {
    $ac = LoginMgnt::loginAuth($userinput, $passinput);
    if ($ac != null) {
        $_SESSION["ACC"] = $ac;
        session_write_close();
        echo "<script language=\"JavaScript\">";
        echo "alert('Welcome " . $ac->getFname() . " " . $ac->getLname() . "')";
        echo "</script>";
        echo "<script> document.location.href=\"../index.php\";</script>";
    } else {
        echo "<script language=\"JavaScript\">";
        echo "alert('ไม่พบบัญชีผู้ใช้หรือรหัสผ่านไม่ถูกต้อง')";
        echo "</script>";
        echo "<script> document.location.href=\"../login.php\";</script>";
    }
}
?>