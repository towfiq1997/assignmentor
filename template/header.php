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
    <div class="header_search py-1">
        <div class="container flex">
              <a href="#" class="logo flex">
                  <img src="assets/images/am.jpg" alt="">
              </a>
              <div class="search_bar">
                  <i class="fas fa-search"></i>
                  <input type="text" name="h_search" id="h_search">
              </div>
              <a href="account" class="account_info flex">
                  <div class="icon_dollar">
                      <img src="assets/images/icons/money.png" alt="">
                  </div>
                  <div class="name_amt">
                      <?php
                      require 'inc/Functions.php';
                      $assignmentor = new Assignmentor();
                      $netmoney = $assignmentor->sumcount();
                      ?>
                      <p><?php echo $_SESSION['u_uname']; ?></p>
                      <p><?php echo $netmoney; ?></p>

                  </div>
                  
              </a>
        </div>
    </div>
    <div class="header-nav py-1">
        <div class="container">
            <div class="nav_icons flex">
                <a class="flex-c" href="dashboard">
                    <img src="assets/images/icons/house.png" alt="">
                    <p>Home</p>
                </a>
                <a class="flex-c" href="addpost">
                    <img src="assets/images/icons/plus.png" alt="">
                    <p>Add Post</p>
                </a>
                <a class="flex-c" href="user_dash">
                    <img src="assets/images/icons/dashboard.png" alt="">
                    <p>Dashboard</p>
                </a>
                <a class="flex-c" href="profile">
                    <img src="assets/images/icons/user.png" alt="">
                    <p>Profile</p>
                </a>
                <a class="flex-c" href="logout">
                    <img src="assets/images/icons/logout.png" alt="">
                    <p>Logout</p>
                </a>
            </div>
        </div>
    </div>