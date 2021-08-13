<?php
require 'inc/Functions.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$comment = isset($data->pushComment)?$data:NULL;
$applyreq = isset($data->assignmentid)?$data:NULL;

if($comment !==NULL){
    // $sql = "INSERT INTO comments (comment_assignment_id,comment_text,comment_commentar) VALUES(20,'jkjk','kkl')";
    $com = new Assignmentor();
    $assid = $data->assignmentId;
    $com_text = $data->commentar;
    $commentar = $data->comment;
    $res = $com->addcomment($assid,$com_text,$commentar);

}
if($applyreq !==NULL){
    $assignmentid = $data->assignmentid;
    $solverid = $data->solver;
    $apply = new Assignmentor();
    $res = $apply->applyreq($assignmentid,$solverid);
}

?>