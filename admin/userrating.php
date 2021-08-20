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
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Assignment ID</th>
                        <th>Assignment Title</th>
                        <th>Solver Name</th>
                        <th>User Name</th>
                        <th>Rating</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $assignmentor = new Assignmentor();
                        $sql = "SELECT assignment.assignment_id,assignment.assignment_title,assignment.assignment_user,assignment.assignment_solver,assignment.assignment_acc_status,assignment.assignment_solv_status,assignment.assignment_pay_status,assignment.p_time,user.user_name,user.user_id,solver.solver_id,solver.solver_username,reviews.review_id,reviews.review_ass_id,reviews.reviews_star FROM assignment INNER JOIN user ON assignment.assignment_user=user.user_id INNER JOIN solver ON assignment.assignment_solver =solver.solver_id INNER JOIN reviews ON assignment.assignment_id = reviews.review_ass_id";
                        if($excute = $assignmentor->con->query($sql)){
                            while($row = $excute->fetch_assoc()){ ?>
                                 <tr>
                                     <td><?php echo $row['assignment_id']; ?></td>
                                     <td><?php echo substr($row['assignment_title'],0,15).'...'; ?></td>
                                     <td><?php echo $row['solver_username']; ?></td>
                                     <td><?php echo $row['user_name']; ?></td>
                                     <td><?php echo $row['reviews_star']; ?></td>
                                 </tr>
                        <?php }
                        }
                        ?>
                    </tbody>
                  </table>
                </div>
          </div>
      </div> 
</div>
 



<?php require "parts/footer.php"; ?>