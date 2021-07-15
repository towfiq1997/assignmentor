<?php session_start();
$uid = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : NULL;
$u_uname = isset($_SESSION['u_uname']) ? $_SESSION['u_uname'] : NULL;
if (!empty($uid) || !empty($u_uname)) {
    header('location:dashboard.php?uid='.$_SESSION['u_id'].'&uname='.$_SESSION['u_uname'].'&ustatus='.$_SESSION['u_status'].'');
}


