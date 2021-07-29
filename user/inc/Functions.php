<?php

class Assignmentor{
    public $con;
    function __construct(){
        include_once("db.php");
		$db = new Database();
		$this->con = $db->connect();
    }
    public function signup($email,$username,$fullname,$password){
           $checksql = "SELECT user_name FROM user WHERE user_email='$email' AND user_name='$username'";
           $chk_res = $this->con->query($checksql);
           $token = bin2hex(random_bytes(15));
           if($chk_res->num_rows>0){
               return '<div class="alert alert-error"><i class="fas fa-times"></i>User Already been registered</div>';
           }else{
               $new_entry = "INSERT INTO user (user_fullname,user_email,user_pass,user_name,actiavation_token) VALUES('$fullname','$email','$password','$username','$token')";
               if($this->con->query($new_entry)==TRUE){
                $to_email = $email;
                $msg = "Hi get verified http://localhost/assignmentor/ativation.php?token={$token}";
                mail($to_email,"Account Verification",$msg);
                //header('location:signin.php?activate_info=1'); 
                //    return '<div class="alert alert-success"><i class="fas fa-check"></i>User Created Successfully >> <a href="index.php">Login</a></div>';
               }
           }
           $check = $this->con->query($sql);
           echo $check->num_rows;
    }

    public function login($email,$password){
        $pre_stmt = $this->con->prepare("SELECT user_id,user_name,user_email,user_pass,user_status FROM user WHERE user_email = ? && user_pass = ?");
        $pre_stmt->bind_param("ss", $email, $password);
        $pre_stmt->execute() or die($this->conn->error);
        $result = $pre_stmt->get_result();
        if($result->num_rows<1){
            return '<div class="alert alert-error"><i class="fas fa-times"></i>Masud Valo Hoiya Jaw</div>';
        }else{
            $row = $result->fetch_assoc();
            $u_id = $row['user_id'];
            $u_uname = $row['user_name'];
            $u_status = $row['user_status'];
            $_SESSION['u_id'] = $u_id;
            $_SESSION['u_uname'] = $u_uname;
            $_SESSION['u_status'] = $u_status;
            header('location:dashboard.php?uid='.$u_id.'&uname='.$u_uname.'&ustatus='.$u_status.'');
        }
    }

    public function addpost($title ,$desc,$wordcount,$price,$uid){
        $sql = "INSERT INTO assignment (assignment_title,assignment_description,assignment_user,assignment_acc_status,assignment_pay_status,assignment_page_count,assignment_price) VALUES('$title','$desc','$uid','not_taken','pending','$wordcount','$price')";
        if($this->con->query($sql)===TRUE){
            return '<div class="alert alert-success"><i class="fas fa-check"></i>Post Created Successfully</div>'; 
        }else{
            return '<div class="alert alert-error"><i class="fas fa-times"></i>Something Went Wrong</div>';
        }
    }
}

?>