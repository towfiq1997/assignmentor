<?php
session_start();
include 'template/header.php';
include 'inc/Functions.php';
$assid = $_GET['assid'];
$id = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;
$name = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if(!isset($id)){
    header('location:index.php');
}
$assignmentor = new Assignmentor();
if(isset($_POST['submit'])){
    $assignment_id = $_POST['assignment_id'];
    $solver_id = $_POST['solver_id'];
    $user_id = $_POST['user_id'];
    $comment = $_POST['assignment_comment'];
     $filename = rand(1000,10000)."-".$_FILES['myfile']['name'];
     $tmp_name = $_FILES['myfile']['tmp_name'];
     $new_finale_name = strtolower($filename);
     $finale_file = str_replace(' ','-',$new_finale_name);
     if(move_uploaded_file($tmp_name,"uploads/".$finale_file)){
         $sql = "INSERT INTO files (assignment_id,user_id,solver_id,filename,comment) VALUES('$assignment_id','$user_id','$solver_id','$finale_file','$comment')";
         $insert = $assignmentor->insert($sql);
         if($insert){
             $sql2 = "UPDATE assignment SET assignment_solv_status='solved' WHERE assignment_id='$assignment_id'";
             $update_status = $assignmentor->con->query($sql2);
             
         }
         
     }
}
$sql = "SELECT assignment_pay_status FROM assignment WHERE assignment_id='$assid'";
$res = $assignmentor->con->query($sql);
$row = $res->fetch_assoc();
if($row['assignment_pay_status']=="pending"){
    echo '<div class="container">
    <div class="alert alert-error"><i class="fas fa-times"></i>User has not paid yet</div>
    </div>';
    return;
}else{
    $sql2 = "SELECT assignment.assignment_id,assignment.assignment_title,assignment.p_time,user.user_name,user.user_id,user.user_email,solver.solver_username,solver.solver_id,solver.solver_email FROM assignment INNER JOIN user ON assignment.assignment_user=user.user_id INNER JOIN solver ON assignment.assignment_solver=solver.solver_id WHERE assignment.assignment_id='$assid'";
    $res2 = $assignmentor->con->query($sql2);
    $row2 = $res2->fetch_assoc();

}
?>
<div class="up_section">
    <div class="container flex">
    <div class="info_section py-4">
        <?php if(isset($insert)){
            echo $insert;
        } ?>
       <h4>Assignment ID : <?php echo $row2['assignment_id']; ?></h4>
       <h4>Assignment Title : <?php echo $row2['assignment_title']; ?></h4>
       <h4>Assignment Solver : <?php echo $row2['solver_username']; ?></h4>
       <h4>Assignment Setter : <?php echo $row2['user_name']; ?></h4>
       <h4>Assignment Date : <?php echo $row2['p_time']; ?></h4>

    </div>
    <form class="my-2 upload_section"  method="POST" enctype="multipart/form-data">

        <input type="text" class="my-1" value="<?php echo $row2['assignment_id']; ?>" name="assignment_id" id="assignment_id" readonly="readonly">

        <input type="text" class="my-1" value="<?php echo $row2['solver_id']; ?>" name="solver_id"  id="solver_id" readonly="readonly">

        <input type="text" class="my-1" value="<?php echo $row2['user_id']; ?>" name="user_id" id="user_id" readonly="readonly">

        <input type="text" class="my-1" name="assignment_comment" id="assignment_comment" placeholder="Emter Comments">

        <input type="file" name="up_file">
        <label class="custom-file-upload text-center my-2">
             <input type="file" name="myfile">
             <i class="fas fa-file"></i> Upload 
        </label>

        <input class="btn" type="submit" name="submit" value="Submit">
    </form>
    </div>
</div>
<?php require 'template/footer.php'; ?>