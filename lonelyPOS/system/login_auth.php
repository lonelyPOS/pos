<?php
require 'autoload.php';
if (! isset($_POST['username']) || ! isset($_POST['password'])) {
    echo "<script> document.location.href=\"../login.php\";</script>";
} else {
    $userinput = $_POST['username'];
    $passinput = $_POST['password'];
    if ($userinput === "" || $passinput === "") {
        echo "<script language=\"JavaScript\">";
        echo "alert('Please input username,password!!!')";
        echo "</script>";
        echo "<script> document.location.href=\"../login.php\";</script>";
    } else {
        $user = LoginMgnt::loginAuth($userinput, $passinput);
        if ($user != null) {
            $_SESSION["USER"] = $user;
            session_write_close();
            echo "<script language=\"JavaScript\">";
            echo "alert('Welcome " . $user->getFname() . " " . $user->getLname() . "')";
            echo "</script>";
            echo "<script> document.location.href=\"../index.php\";</script>";
        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('Incorrect ussername or password!!!')";
            echo "</script>";
            echo "<script> document.location.href=\"../login.php\";</script>";
        }
    }
}

?>