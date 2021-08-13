<?php
session_start();
require 'template/header.php'; 
$assid = $_GET['assid'];
$sql = "SELECT * FROM assignment WHERE assignment_id='$assid'";
$res = $assignmentor->con->query($sql);
$row = $res->fetch_assoc();

if($row['assignment_solv_status']=="solved"){
    $sql2 = "SELECT * FROM files WHERE assignment_id='$assid'";
    $res2 = $assignmentor->con->query($sql2);
    $row2 = $res2->fetch_assoc();
    $file = $row2['filename']; ?>
     <a href="solver/uploads/<?php echo $file; ?>" download><?php echo $file; ?></a>
    
<?php }else{
    echo '<div class="container">
    <div class="alert alert-error"><i class="fas fa-times"></i>You have not paid</div>
    </div>';
   
}
?>
    <?php require 'template/footer.php'; ?>