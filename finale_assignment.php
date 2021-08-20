<?php
session_start();
require 'template/header.php'; 
$assid = $_GET['assid'];
$sql = "SELECT * FROM assignment WHERE assignment_id='$assid'";
$res = $assignmentor->con->query($sql);
$row = $res->fetch_assoc();
if(isset($_POST['submit'])){
    $review_star = $_POST['rating'];
    $checksql = "SELECT * FROM reviews WHERE review_ass_id='$assid'";
    $checkquery = $assignmentor->con->query($checksql);
    if($checkquery->num_rows<=0){
        $sqlinsert = "INSERT INTO reviews (review_ass_id,reviews_star) VALUES('$assid','$review_star')";
        $query_insert = $assignmentor->con->query($sqlinsert);
        $alertinfo = '<div class="alert alert-success"><i class="fas fa-times"></i>Rating Added Successfully</div>';
    }
    else{
       $alertinfo = '<div class="alert alert-danger"><i class="fas fa-times"></i>Rating already been given </div>'; 
    }
}

if($row['assignment_solv_status']=="solved"){
    $sql2 = "SELECT * FROM files WHERE assignment_id='$assid'";
    $res2 = $assignmentor->con->query($sql2);
    $row2 = $res2->fetch_assoc();
    $file = $row2['filename']; 
   ?>
    <div class="container">
        <?php
        if(isset($alertinfo)){
            echo $alertinfo;
        }
        
        ?>
       <a class="my-2" href="solver/uploads/<?php echo $file; ?>" download><?php echo $file; ?></a>
       <form action="" method="POST" class="my-2">
           <select name="rating" id="">
               <option value="1">1 Star</option>
               <option value="2">2 Star</option>
               <option value="3">3 Star</option>
               <option value="4">4 Star</option>
               <option value="5">5 Star</option>
           </select>
           <input class="btn my-2" type="submit" value="Submit" name="submit">
       </form>
    </div>
<?php }else{
    echo '<div class="container">
    <div class="alert alert-error"><i class="fas fa-times"></i>You have not paid</div>
    </div>';
   
}
?>
    <?php require 'template/footer.php'; ?>