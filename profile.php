<?php 
    session_start();   
    require 'template/header.php';
    $id = $_SESSION['u_id'];
    $sql = "SELECT * FROM user WHERE user_id='$id'";
    $res = $assignmentor->con->query($sql);
    $row = $res->fetch_assoc();
?>
    <div class="payment_section flex my-2 p-2">
             <form action="POST" class="pay_tbl" style="padding-bottom: 40px;">
                <h2 class="text-center" style="width: 100%; background-color: black; color: white;">Profile</h2>
                <div class="imageflex my-2">
                     <img class="profilepic" src="<?php echo "uploads/".$row['profilepic']; ?>" alt="">
                </div>
                 <table class="user_pay">
                     <tr>
                         <td>Full Name</td>
                         <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                     </tr>
                     <tr>
                        <td>Email</td>
                        <td><?php echo $row['user_email']; ?></td>
                     </tr>
                     <tr>
                        <td>Address</td>
                        <td><?php echo $row['address']; ?></td>
                     </tr>
                     <tr>
                        <td>University</td>
                        <td><?php echo $row['university']; ?></td>
                     </tr>
                     <tr>
                        <td>Department</td>
                        <td><?php echo $row['department']; ?></td>
                     </tr>
                     <tr>
                        <td>Age</td>
                        <td><?php echo $row['age']; ?></td>
                     </tr>
                     <tr>
                        <td>Gender</td>
                        <td><?php echo $row['gender']; ?></td>
                     </tr>  
                 </table>
             </form>
    </div>
<?php require 'template/footer.php'; ?>