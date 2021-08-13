<?php
require 'inc/Functions.php';
$token = $_GET['token'];
$verify = new Assignmentor();
$sql = "SELECT * FROM user WHERE actiavation_token='$token'";
$res = $verify->con->query($sql);
if($res->num_rows>0){
    echo 9;
    $row = $res->fetch_assoc();
    $id = $row['user_id'];
    echo $id;
    $sql2 = "UPDATE user SET user_status='active' WHERE user_id='$id'";
    $res2 = $verify->con->query($sql2);
    header('location:signin.php?verified=1');

}

?>