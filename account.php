<?php session_start();
 require 'template/header.php'; 
$uid = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : NULL;
$u_uname = isset($_SESSION['u_uname']) ? $_SESSION['u_uname'] : NULL;
if (empty($uid) || empty($u_uname)) {
    header('location:index.php');
}
if(isset($_POST['topup'])){
    $userid = $_POST['user_id'];
    $fromno = $_POST['from_no'];
    $tono = $_POST['to_no'];
    $amount = $_POST['amount'];
    $trxid = $_POST['trxid'];

    $sql = "INSERT INTO user_account (fromno,tono,sender,trxid,amount) VALUES('$fromno','$tono','$userid','$trxid','$amount')";
    $topup = $assignmentor->insert($sql);

}
 ?>
 <div class="container">
     <?php
     if(isset($topup)){
         echo $topup;
     }
     ?>
     <div class="payment_section flex my-2 p-2">
             <form action="" method="POST" class="pay_tbl" style="padding-bottom: 40px;">
                <h2 class="text-center" style="width: 100%; background-color: black; color: white;">Top Up</h2>
                 <table class="user_pay">
                     <tr>
                         <td>User ID</td>
                         <td><input type="number" name="user_id" value="<?php echo $uid; ?>" readonly="readonly"></td>
                     </tr>
                     <tr>
                        <td>From No</td>
                        <td><input type="number" name="from_no" id=""  required></td>
                     </tr>
                     <tr>
                        <td>To No</td>
                        <td><input type="text" name="to_no" id="" value="01789756456" readonly="readonly"></td>
                     </tr>
                     <tr>
                        <td>Amount</td>
                        <td><input type="text" name="amount" id="" required></td>
                     </tr>
                     <tr>
                        <td>Trx ID</td>
                        <td><input type="text" name="trxid" required></td>
                     </tr>
                     <tr>
                         <td colspan="2" class="no_padding">
                             <input type="submit" class="btn" name="topup" value="Pay">
                         </td>
                     </tr>
                 </table>
            </form>
    </div>
 </div>
 <div class="container">
     <table class="assignment_user_table" width="100%">
   <tr>
           <th>SN</th>
           <th>From No</th>
           <th>To No</th>
           <th>Amount</th>
           <th>Trxid</th>
           <th>Time</th>
           <th>Status</th>
       </tr>
       <?php
       $sql = "SELECT * FROM user_account WHERE sender='$uid'";
       if($excute = $assignmentor->con->query($sql)){
           $i = 1;
        while($row = $excute->fetch_assoc()){ ?>
        <tr>
        <td class="text-center"><?php echo $i; ?></td>
        <td class="text-center"><?php echo $row['fromno']; ?></td>
        <td class="text-center"><?php echo $row['tono']; ?></td>
        <td class="text-center"><?php echo $row['amount']; ?></td>
        <td class="text-center"><?php echo $row['trxid']; ?></td>
        <td class="text-center"><?php echo $row['time']; ?></td>
        <td class="text-center">
            <?php 
            if($row['status']=="pending"){ ?>
                <div class="flex_column icon_d red">
                    <p><i class="fas fa-times-circle"></i>Pending</p>
                </div>
           <?php }else{ ?>
            <div class="flex_column icon_d green">
                    <p><i class="fas fa-check"></i>Verified</p>
                </div>
           <?php }
            ?>
        </td>
        </tr>
       </tr>
       <?php
       $i++;
    }
    }
       ?>
   </table>
 </div>
 <div class="pagination_section flex my-4">
    <a href="#">Prev</a>
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">Next</a>
</div>
<?php require 'template/footer.php'; ?>