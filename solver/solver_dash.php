<?php
 session_start();
require 'template/header.php'; 
require 'inc/Functions.php';
$id = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;
$name = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if(!isset($id)){
    header('location:index.php');
}
  ?>
    <div class="breadcumb_section my-2">
        <div class="container text-center">
            <h3>Home / Assignments</h3>
        </div>
    </div>
   <table class="assignment_user_table" width="100%">
   <tr>
           <th>SN</th>
           <th>Id</th>
           <th>Title</th>
           <th>User</th>
           <th>Accepetence Status</th>
           <th>Solution Status</th>
           <th>Payment</th>
           <th>Upload Solution</th>
       </tr>
       <?php
       $assignmentor = new Assignmentor();
       $sql = "SELECT assignment.assignment_id,assignment.assignment_title,assignment.assignment_user,assignment.assignment_acc_status,assignment.assignment_solv_status,assignment.assignment_pay_status,assignment.p_time,user.user_name,user.user_id FROM assignment INNER JOIN user ON assignment.assignment_user=user.user_id WHERE assignment.assignment_solver='$id'";

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
                    <p><i class="fas fa-times-circle"></i>Not Taken</p>
                </div>
           <?php }else{ ?>
            <div class="flex_column icon_d green">
                    <p><i class="fas fa-check"></i>Taken</p>
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
                    <p><i class="fas fa-check"></i>Solving</p>
                </div>
           <?php }else{ ?>
                <div class="flex_column icon_d green">
                    <p><i class="fas fa-check"></i>Solved</p>
                </div>
           <?php }
            ?>
            </td>
        <td class="text-center">
        <?php 
            if($row['assignment_pay_status']=="pending"){ ?>
                <div class="flex_column icon_d red ">
                    <p><i class="fas fa-times-circle"></i>Pending</p>
                </div>
           <?php }else{?>
                <div class="flex_column icon_d green">
                    <p><i class="fas fa-paper-plane"></i>Sent</p>
                </div>
           <?php }?>
        </td>
        <td class="text-center"><a href="assignment_up.php?assid=<?php echo $row['assignment_id'];?>"><img class="uplaod_img" src="assets/images/icons/upload.png" alt=""></a></td>
        </tr>
       </tr>
       <?php
       $i++;
    }
    }
       ?>
   </table>
   <div class="pagination_section flex my-4">
    <a href="#">Prev</a>
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">Next</a>
</div>
<?php require 'template/footer.php';?>