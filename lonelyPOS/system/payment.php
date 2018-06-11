<?php
require 'autoload.php';
if ($session_set) {
   if(!isset($_POST['mode'])){
       $post_mode = $_POST['mode'];
       if($post_mode === 'payment'){
           $todays_date = date("Y-m-d H:i:s");
           $bill = new Bill(0, $cart->getMember(), $user, $todays_date, $cart->getTotalPrice(), $cart->getTotalPaying());
           $count = 0;
           foreach ($cart->getItems() as $cart_item){
               $bill_item = new BillItem(0, 0, $cart_item->getProduct(), $cart_item->getQty());
               $bill->addBillItems($bill_item);
               $count++;
           }
           if($count > 0){
               $id = BillMgnt::createBill($bill);
               if($id != -1){
                   $_SESSION['CART'] = new Cart();
                   echo "<script> document.location.href=\"../bill_show.php?bill_id=$id\";</script>";
               }else{
                   echo "<script language=\"JavaScript\">";
                   echo "alert('Create Bill fail!!!')";
                   echo "</script>";
                   echo "<script> document.location.href=\"../pos.php\";</script>";
               }
           }else{
               echo "<script language=\"JavaScript\">";
               echo "alert('Please add item!!!')";
               echo "</script>";
               echo "<script> document.location.href=\"../pos.php\";</script>";
           }
       }
   }
}
echo "<script> document.location.href=\"../index.php\";</script>";
?>