<?php session_start();
include 'inc/Functions.php';
$uid = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : NULL;
$u_uname = isset($_SESSION['u_uname']) ? $_SESSION['u_uname'] : NULL;
if (!empty($uid) || !empty($u_uname)) {
    header('location:dashboard.php?uid='.$_SESSION['u_id'].'&uname='.$_SESSION['u_uname'].'&ustatus='.$_SESSION['u_status'].'');
}
// if ($uid == !NULL && $u_uname == !NULL) {
//     header('location:dashboard.php?uid='.$_SESSION['u_id'].'&uname='.$_SESSION['u_uname'].'&ustatus='.$_SESSION['u_status'].'');
// }
if(isset($_POST['submit'])){
    $email = isset($_POST['email'])?$_POST['email']:NULL;
    if($email==NULL){
        $error = '<div class="alert alert-error"><i class="fas fa-times"></i>Field Must Not Be Empty</div>';
    }else{
        $conn = new Assignmentor();
        $signin = $conn->forgatepass($email);
       
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
            <img src="assets/images/am.jpg" alt="">
            <h3 class="text-center">Reset your password</h3>
            <?php if(isset($signin)){
                echo $signin;
            } ?>
                <form method="POST" style="width: 100%;">
                <div class="abs">
                    <i class="fas fa-envelope-square"></i>
                    <input class="my-1" type="text" name="email" placeholder="Enter Username Or Email">
                </div>
                <input class="btn my-2" type="submit" name="submit" value="Send Email">
            </form>
            <a href="signup.php">Sign Up</a>
            <a href="signin.php">Sign In</a>
        </div>
    </div> 
</body>
</html>