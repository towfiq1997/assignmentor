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
              <a href="signin.php" class="logo flex">
                  <img src="assets/images/am.jpg" alt="">
              </a>
              <div class="search_bar">
                  <i class="fas fa-search"></i>
                  <input type="text" name="h_search" id="h_search">
              </div>
              <div class="account_info">
                  <h5><?php echo $_SESSION['username']; ?></h5>
                  <h5>500$</h5>
              </div>
        </div>
    </div>
    <div class="header-nav py-1">
        <div class="container">
            <div class="nav_icons flex">
                <a class="flex-c" href="dashboard.php">
                    <img src="assets/images/icons/house.png" alt="">
                    <p>Home</p>
                </a>
                <a class="flex-c" href="addpost.php">
                    <img src="assets/images/icons/plus.png" alt="">
                    <p>Add Post</p>
                </a>
                <a class="flex-c" href="solver_dash">
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