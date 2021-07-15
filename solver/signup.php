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
            <form action="POST" style="width: 100%;">
                <label for="FullName"><b>Full Name</b></label>
                   <input class="my-1" type="text" name="fullname" placeholder="Enter Full Name"  required>
                   <label for="email"><b>Email</b></label>
                   <input class="my-1" type="text" placeholder="Enter Email" name="email" required>
                   <label for="psw"><b>Password</b></label>
                    <input class="my-1" type="password" name="pass" placeholder="Enter your password">
                <input class="btn" type="submit" value="Sign Up">
            </form>
            <a href="#">Log In</a>
        </div>
    </div> 
</body>
</html>