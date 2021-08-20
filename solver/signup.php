<?php
include 'inc/Functions.php';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['pass'];
    $adress = $_POST['address'];
    $uni = $_POST['uni'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $mobileno = $_POST['mobileno'];
    $filename = rand(1000,10000)."-".$_FILES['profilepic']['name'];
    $tmp_name = $_FILES['profilepic']['tmp_name'];
    $new_finale_name = strtolower($filename);
    $finale_file = str_replace(' ','-',$new_finale_name);
    if(move_uploaded_file($tmp_name,"uploads/".$finale_file)){
        $conn = new Assignmentor();
        $signupp = $conn->signup($email,$username,$firstname,$lastname,$password,$adress,$uni,$age,$gender,$department,$finale_file,$mobileno);
        // echo $email;
        // echo $username;
        // echo $firstname;
        // echo $lastname;
        // echo $password;
        // echo $uni;
        // echo $age;
        // echo $gender;
        // echo $department;
        // echo $finale_file;


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
    <div class="login py-3 signup flex" style="height:100%">
        <div class="inner-login-box  flex" style="height:100%">
            <img src="assets/images/am.jpg" alt="">
            <h3 class="text-center my-1">Sign Up Form</h3>

            <?php if(isset($error)){
                echo $error;
            }if(isset($signupp)){
                echo $signupp;
            }
            
            ?>
            

            <form action="" method="POST" style="width: 100%; height:100%" enctype="multipart/form-data">
                <label for="FullName"><b>First Name*</b></label>
                   <input  class="my-1 q-all" type="text" name="firstname" placeholder="Enter First Name" id="digit_validation" required>
                   <label for="FullName"><b>Last Name*</b></label>
                   <input  class="my-1 q-all" type="text" name="lastname" placeholder="Enter Last Name" id="digit_validation" required>
                   <label for="email"><b>Email*</b></label>
                   <input class="my-1 q-all" type="email" placeholder="Enter Email" name="email" id="user_email" required>
                   <label for="FullName"><b>Address*</b></label>
                   <input  class="my-1 q-all" type="text" name="address" placeholder="Enter Address" id="digit_validation" required>
                   <label for="FullName"><b>University*</b></label>
                   <input  class="my-1 q-all" type="text" name="uni" placeholder="Enter University" id="digit_validation" required>
                   <label for="FullName"><b>Department*</b></label>
                   <input  class="my-1 q-all" type="text" name="department" placeholder="Enter Department" id="digit_validation" required>
                   <label for="FullName"><b>Age*</b></label>
                   <input  class="my-1 q-all" type="number" name="age" placeholder="Enter Age" id="age" required>
                   <label for="FullName"><b>Gender</b></label>
                   <br>
                   <input type="radio" id="html" name="gender" value="male">
                   <label for="html">Male</label><br>
                   <input type="radio" id="css" name="gender" value="Female">
                   <label for="css">Female</label><br>
                   <input type="radio" id="javascript" name="gender" value="Others">
                   <label for="javascript">Others</label>
                   <br><br> 
                   <label for="username"><b>Username*</b></label>
                   <input class="my-1 q-all" type="text" placeholder="Enter Username" name="username" id="user_uname" required autocomplete="off" required>
                   <label for="psw"><b>Password*</b></label>
                    <input class="my-1 q-all" type="password" name="pass" placeholder="Enter your password" autocomplete="off" required>
                    <label for="FullName"><b>Bkash No*</b></label>
                   <input  class="my-1 q-all" type="number" name="mobileno" placeholder="Enter Bkash No" id="age" required>
                    <label for="psw"><b>Profile Pic *</b></label>
                    <br>
                    <input class="my-1 q-all" type="file" name="profilepic" placeholder="Upload Profile Pic"  required>
                    <br>
                <input class="btn" type="submit" name="submit" value="Sign Up">
            </form>
            <a href="signin">Log In</a>
        </div>
    </div>
    <script>
        const fullname = document.getElementById("user_fname");
        const email = document.getElementById("user_email");
const username = document.getElementById("user_uname");

email.addEventListener("change", () => {
  const parts = email.value.split("@");
  const usernameValue = parts[0];
  console.log(usernameValue);
  username.value = usernameValue;
});

    </script>
    <script src="assets/js/app.js"></script>
</body>
</html>