<?php
session_start();
require 'template/header.php'; 
require 'inc/Functions.php';
$assid = $_GET['assid'];
$pay_check = new Assignmentor();
$sql = "SELECT assignment_acc_status FROM assignment WHERE assignment_id='$assid'";
$res = $pay_check->con->query($sql);
$row = $res->fetch_assoc();

if($row['assignment_acc_status']=="not_taken"){
    echo '<div class="container">
    <div class="alert alert-error"><i class="fas fa-times"></i>You Assignment Not Been Taken yet</div>
    </div>';
    return;
}else{
    $sql2 = "SELECT assignment.assignment_id,assignment.assignment_price,assignment.assignment_page_count,user.user_name,user.user_id,user.user_email,solver.solver_username,solver.solver_id,solver.solver_email FROM assignment INNER JOIN user ON assignment.assignment_user=user.user_id INNER JOIN solver ON assignment.assignment_solver=solver.solver_id WHERE assignment.assignment_id='$assid'";
    $res2 = $pay_check->con->query($sql2);
    $row2 = $res2->fetch_assoc();
    print_r($row2);

}
?>
    <div class="payment_section flex my-2 p-2">
             <form action="POST" class="pay_tbl" style="padding-bottom: 40px;">
                <h2 class="text-center" style="width: 100%; background-color: black; color: white;">Payment</h2>
                 <table class="user_pay">
                     <tr>
                         <td>User Name</td>
                         <td><?php echo $row2['user_name']; ?></td>
                     </tr>
                     <tr>
                        <td>User Email</td>
                        <td><?php echo $row2['user_email']; ?></td>
                     </tr>
                     <tr>
                        <td>Solver Name</td>
                        <td><?php echo $row2['solver_username']; ?></td>
                     </tr>
                     <tr>
                        <td>Solver Email</td>
                        <td><?php echo $row2['solver_email']; ?></td>
                     </tr>
                     <tr>
                        <td>Assignment Id</td>
                        <td><?php echo $row2['assignment_id']; ?></td>
                     </tr>
                     <tr>
                         <td colspan="2" class="no_padding">
                             <div class="my-2">
                                <input  type="number" name="pay_amt" placeholder="Enter Amount to pay" value="<?php echo 89; ?>" disabled>
                             </div>
                         </td>
                     </tr>
                     <tr>
                         <td colspan="2" class="no_padding">
                             <input type="submit" class="btn" name="pay" value="Pay">
                         </td>
                     </tr>
                 </table>
             </form>
    </div>
    <?php require 'template/footer.php'; ?>