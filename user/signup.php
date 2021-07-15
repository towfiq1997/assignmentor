<?php
include 'inc/Functions.php';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['pass'];
    if($email==NULL || $username ==NULL || $password ==NULL || $fullname ==NULL){
        $error = '<div class="alert alert-error"><i class="fas fa-times"></i>Field Must Not Be Empty</div>';
    }else{
        $conn = new Assignmentor();
        $signupp = $conn->signup($email,$username,$fullname,$password);
       
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
    <div class="login py-3 signup flex">
        <div class="inner-login-box  flex">
            <img src="assets/images/am.jpg" alt="">
            <h3 class="text-center my-1">Sign Up Form</h3>

            <?php if(isset($error)){
                echo $error;
            }if(isset($signupp)){
                echo $signupp;
            }
            
            ?>

            <form action="" method="post" style="width: 100%;" autocomplete="off">
                <label for="FullName"><b>Full Name</b></label>
                   <input  class="my-1 q-all" type="text" name="fullname" placeholder="Enter Full Name" id="user_fname" >
                   <label for="email"><b>Email</b></label>
                   <input class="my-1 q-all" type="email" placeholder="Enter Email" name="email" id="user_email" required>
                   <label for="username"><b>Username</b></label>
                   <input class="my-1 q-all" type="text" placeholder="Enter Username" name="username" id="user_uname" required autocomplete="off">
                   <label for="psw"><b>Password</b></label>
                    <input class="my-1 q-all" type="password" name="pass" placeholder="Enter your password" autocomplete="off">
                <input class="btn" type="submit" name="submit" value="Sign Up">
            </form>
            <a href="#">Log In</a>
        </div>
    </div>
    <script>
        const fullname = document.getElementById("user_fname");
        const email = document.getElementById("user_email");
const username = document.getElementById("user_uname");

email.addEventListener("change", () => {
  const parts = email.value.split("@");
  const usernameValue = parts[0];

  username.value = usernameValue;
});

    </script>
</body>
</html>