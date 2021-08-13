<?php session_start();
include 'inc/Functions.php';
$token = $_GET['token'];

// if ($uid == !NULL && $u_uname == !NULL) {
//     header('location:dashboard.php?uid='.$_SESSION['u_id'].'&uname='.$_SESSION['u_uname'].'&ustatus='.$_SESSION['u_status'].'');
// }
if(isset($_POST['submit'])){
    $password = isset($_POST['pass'])?$_POST['pass']:NULL;
    if($password ==NULL){
        $error = '<div class="alert alert-error"><i class="fas fa-times"></i>Field Must Not Be Empty</div>';
    }else{
        $conn = new Assignmentor();
        $signin = $conn->changepass($password,$token);
       
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignmentor</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/utilities.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="login flex">
        <div class="inner-login-box flex">
            <a href="dashboard.php"><img src="assets/images/am.jpg" alt=""></a>
            <h3 class="text-center my-1">New Password</h3>
            <?php
            if(isset($signin)){
                echo $signin;
            }
            ?>
                <form method="POST" style="width: 100%;">
                <div class="abs">
                    <i class="fas fa-key"></i>
                    <input class="my-1" type="password" name="pass" placeholder="Enter new password">
                </div>
                <input class="btn" type="submit" name="submit" value="Submit">
            </form>
            <a href="signin.php">Sign In</a>
            <a href="signup.php">Sign Up</a>
        </div>
    </div> 
</body>
</html>