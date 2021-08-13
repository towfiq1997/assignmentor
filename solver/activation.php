<?php
require 'inc/Functions.php';
$token = $_GET['token'];
$verify = new Assignmentor();
$sql = "SELECT * FROM solver WHERE actiavation_token='$token'";
$res = $verify->con->query($sql);
if($res->num_rows>0){
    echo 9;
    $row = $res->fetch_assoc();
    $id = $row['user_id'];
    echo $id;
    $sql2 = "UPDATE solver SET solver_status='active' WHERE solver_id='$id'";
    $res2 = $verify->con->query($sql2);
    header('location:signin.php?verified=1');
}else{
    echo "Wrong token";
}

?>