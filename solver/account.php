<?php
session_start();
require "inc/Functions.php";
require "template/header.php";
$assignmentor = new Assignmentor();
$solver_id = $_SESSION['id'];
$sql = "SELECT * FROM solver_account WHERE solver_acc_solver_id  = '$solver_id'";
$excute = $assignmentor->con->query($sql);
$num_rows = $excute->num_rows*20;
?>
<div class="container">
    <h3>ACCOUNT BALANCE</h3>
    <h3><?php echo $num_rows ?></h3>
    <button>Withdraw</button>
</div>
<?php require "template/footer.php"; ?>