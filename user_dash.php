<?php
session_start();
include 'template/header.php';
include 'inc/Functions.php';


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
           <th>Solver</th>
           <th>Price</th>
           <th>Accepetence Status</th>
           <th>Solution Status</th>
           <th>Pay</th>
           <th>Details/Download</th>
       </tr>
       <?php
       $user_dash = new Assignmentor();
       $sql = "SELECT * FROM assignment";
       if($excute = $user_dash->con->query($sql)){
           $i = 1;
        while($row = $excute->fetch_assoc()){ ?>
        <tr>
        <td class="text-center"><?php echo $i; ?></td>
        <td class="text-center"><?php echo $row['assignment_id']; ?></td>
        <td class="text-center"><?php echo substr($row['assignment_title'],0,15).'...'; ?></td>
        <td class="text-center"><?php echo $row['assignment_price']; ?></td>
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
                    <a href="user_pay.php?assid=<?php echo $row['assignment_id'];?>" class="bouncing"><i class="fas fa-times-circle"></i>Do Pay</a>
                </div>
           <?php }elseif($row['assignment_pay_status']=="sent"){ ?>
                <div class="flex_column icon_d blue">
                    <p><i class="fas fa-paper-plane"></i>Sent</p>
                </div>
           <?php }else{ ?>
                <div class="flex_column icon_d green">
                    <p><i class="fas fa-check"></i>Accepted</p>
                </div>
           <?php }
            ?>
        </td>
        <td class="text-center"><a href=""><i class="fas fa-info-circle"></i></a></td>
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
<?php require 'template/footer.php'; ?>