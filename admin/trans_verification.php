<?php
require 'inc/Functions.php';
$id = $_GET['id'];
$sender = $_GET['sender'];
$amount = $_GET['amount'];
$verify = new Assignmentor();
$sql2 = "UPDATE user_account SET status='verified' WHERE id='$id'";
if($verify->con->query($sql2)===TRUE){
   $sql = "SELECT * FROM user WHERE user_id='$sender'";
   $query = $verify->con->query($sql);
   $row = $query->fetch_assoc();
   $amount += $row['net_money'];
   print_r($amount);
   $updatesql = "UPDATE user SET net_money='$amount' WHERE user_id='$sender'";
   $upquery = $verify->con->query($updatesql);

   //header('location:dashboard.php');
}
?>