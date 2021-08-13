<?php
require 'inc/Functions.php';
$id = $_GET['id'];
$verify = new Assignmentor();
$sql2 = "UPDATE user_account SET status='verified' WHERE id='$id'";
if($verify->con->query($sql2)===TRUE){
   header('location:dashboard.php');
}
?>