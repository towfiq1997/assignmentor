<?php
require "inc/Functions.php";
$assid = $_GET['assid'];
$assignmentor = new Assignmentor();
$sql = "DELETE FROM assignment WHERE assignment_id='$assid'";
if($assignmentor->con->query($sql)===TRUE){
    header("location:posts.php");
}

?>