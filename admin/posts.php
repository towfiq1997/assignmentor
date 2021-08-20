<?php 
session_start();
include 'inc/Functions.php';
include 'parts/header.php';
$id = isset($_SESSION['admin']) ? $_SESSION['admin'] : NULL;
if(!isset($id)){
    header('location:index.php');
}

?>
<!-- $sql ="SELECT assignment.assignment_id,assignment.assignment_title,assignment.assignment_user,assignment.assignment_acc_status,assignment.assignment_solv_status,assignment.assignment_pay_status,assignment.p_time,user.user_name,user.user_id,solver.solver_id,solver.solver_username,reviews.review_id,reviews.review_ass_id,reviews.reviews_star FROM assignment INNER JOIN user ON assignment.assignment_user=user.user_id INNER JOIN solver ON assignment.assignment_user=solver.solver_id INNER JOIN reviews ON reviews.review_ass_id=assignment.assignment_id"; -->
<div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
             <div class="table-responsive">
                  <table class="table align-items-center table-flush" width="100%">
                      <thead class="thead-light">
                       <tr>
                       <th>SN</th>
                       <th>Id</th>
                       <th>Title</th>
                       <th>User</th>
                       <th>Accepetence Status</th>
                       <th>Solution Status</th>
                       <th>Payment</th>
                      <th>Delete</th>
                      </tr>
                    </thead>
       <?php
       $assignmentor = new Assignmentor();
       $sql = "SELECT assignment.assignment_id,assignment.assignment_title,assignment.assignment_user,assignment.assignment_acc_status,assignment.assignment_solv_status,assignment.assignment_pay_status,assignment.p_time,user.user_name,user.user_id FROM assignment INNER JOIN user ON assignment.assignment_user=user.user_id";

       //$sql = "SELECT * FROM assignment WHERE assignment_solver='$id'";
       if($excute = $assignmentor->con->query($sql)){
           $i = 1;
        while($row = $excute->fetch_assoc()){ ?>
        <tr>
        <td class="text-center"><?php echo $i; ?></td>
        <td class="text-center"><?php echo $row['assignment_id']; ?></td>
        <td class="text-center"><?php echo substr($row['assignment_title'],0,15).'...'; ?></td>
        <td class="text-center"><?php echo $row['user_name']; ?></td>
        <td class="text-center">
            <?php 
            if($row['assignment_acc_status']=="not_taken"){ ?>
                <div class="flex_column icon_d red">
                    <p>Not Taken</p>
                </div>
           <?php }else{ ?>
            <div class="flex_column icon_d green">
                    <p>Taken</p>
                </div>
           <?php }
            ?>
        </td>
        <td class="text-center">
            <?php 
            if($row['assignment_solv_status']=="pending"){ ?>
                <div class="flex_column icon_d red">
                    <p><i class="fas fa-times-circle"></i>Pending</p>
                </div>
           <?php }elseif($row['assignment_solv_status']=="solving"){ ?>
                <div class="flex_column icon_d blue">
                    <p>Solving</p>
                </div>
           <?php }else{ ?>
                <div class="flex_column icon_d green">
                    <p>Solved</p>
                </div>
           <?php }
            ?>
            </td>
        <td class="text-center">
        <?php 
            if($row['assignment_pay_status']=="pending"){ ?>
                <div class="flex_column icon_d red ">
                    <p>Pending</p>
                </div>
           <?php }else{?>
                <div class="flex_column icon_d green">
                    <p>Sent</p>
                </div>
           <?php }?>
        </td>
        <td class="text-center"><a href="deletepost.php?assid=<?php echo $row['assignment_id'];?>">DELETE</a></td>
        </tr>
       </tr>
       <?php
       $i++;
    }
    }
       ?>
   </table>
                </div>
          </div>
      </div> 
</div>
 



<?php require "parts/footer.php"; ?>