<?php 
    session_start();   
    require 'template/header.php';
    require 'inc/Functions.php';
    $id = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;
    $name = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
    if(!isset($id)){
    header('location:index.php');
    }
    $pay_check = new Assignmentor();
    $sql = "SELECT solver_fullname,solver_status,solver_username,solver_email,address,university,age,gender,birthday FROM solver WHERE solver_id ='$id'";
    $res = $pay_check->con->query($sql);
    $row = $res->fetch_assoc();
?>
    <div class="payment_section flex my-2 p-2">
             <form action="POST" class="pay_tbl" style="padding-bottom: 40px;">
                <h2 class="text-center" style="width: 100%; background-color: black; color: white;">Profile</h2>
                 <table class="user_pay">
                     <tr>
                         <td>Full Name</td>
                         <td><?php echo $row['solver_fullname']; ?></td>
                     </tr>
                     <tr>
                        <td> Email</td>
                        <td><?php echo $row['solver_email']; ?></td>
                     </tr>
                     <tr>
                        <td>Status</td>
                        <td><?php echo $row['solver_status']; ?></td>
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
                        <td>Age</td>
                        <td><?php echo $row['age']; ?></td>
                     </tr>
                     <tr>
                        <td>Gender</td>
                        <td><?php echo $row['gender']; ?></td>
                     </tr>
                     <tr>
                        <td>Birthday</td>
                        <td><?php echo $row['birthday']; ?></td>
                     </tr>  
                 </table>
             </form>
    </div>
<?php require 'template/footer.php'; ?>