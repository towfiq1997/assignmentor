<?php

class Assignmentor{
    public $con;
    function __construct(){
        include_once("db.php");
		$db = new Database();
		$this->con = $db->connect();
    }
    public function sumcount(){
     $sql = "SELECT SUM(amount) FROM user_account WHERE status='verified'";
     $res = $this->con->query($sql);
     $row = $res->fetch_assoc();
     return $row['SUM(amount)'];
    }
    public function insert($sql){
        if($this->con->query($sql)===TRUE){
            return '<div class="alert alert-success"><i class="fas fa-check"></i>Inserted Successfully</div>'; 
        }else{
            return '<div class="alert alert-error"><i class="fas fa-times"></i>Something Went Wrong</div>';
        }
    }
    public function changepass($password,$token){
        $sql = "SELECT * FROM user where forget_token='$token'";
        $res = $this->con->query($sql);
        if($res->num_rows>0){
            $row = $res->fetch_assoc();
            $id = $row['user_id'];
            $updatepass = "UPDATE user SET user_pass='$password' WHERE user_id='$id'";
            $passexcute = $this->con->query($updatepass);
            return '<div class="alert alert-success"><i class="fas fa-check"></i>Password reseted successfully</div>';
        }else{
            return '<div class="alert alert-error"><i class="fas fa-times"></i>Missing token</div>';
        }
    }
    public function forgatepass($email){
        $sql = "SELECT user_email FROM user WHERE user_email='$email'";
        $check_mail = $this->con->query($sql);
        if($check_mail->num_rows>0){
            $token = bin2hex(random_bytes(15));
            $row = $check_mail->fetch_assoc();
            $updateemail = "UPDATE user SET forget_token='$token' WHERE user_email='$email'";
            $res = $this->con->query($updateemail);
            $to_email = $email;
            $subject = "Forgate password";
            $body = "Hi follow the link to reset passowrd http://localhost/assignmentor/password_change.php?token={$token}";
            $headers = "From:jsislove21@gmail.com";
            if (mail($to_email, $subject, $body, $headers)) {
                return '<div class="alert alert-success"><i class="fas fa-check"></i>Email sent with recovery link</div>';
            } else {
                return '<div class="alert alert-error"><i class="fas fa-times"></i>Email sending failed</div>';
            }
        }else{
            return '<div class="alert alert-error"><i class="fas fa-times"></i>Email is not exist</div>';
        }

    }
    public function addcomment($assid,$com_text,$commentar){
        $sql = "INSERT INTO comments (comment_assignment_id,comment_text,comment_commentar) VALUES('$assid','$com_text','$commentar')";
        if($this->con->query($sql)==TRUE){
            echo json_encode(array("alert"=>"Error"));
        }

    }
    public function signup($email,$username,$fullname,$password,$adress,$uni,$age,$gender,$birthday){
        $checksql = "SELECT user_name FROM user WHERE user_email='$email' AND user_name='$username'";
        $chk_res = $this->con->query($checksql);
        $token = bin2hex(random_bytes(15));
        if($chk_res->num_rows>0){
            return '<div class="alert alert-error"><i class="fas fa-times"></i>User Already been registered</div>';
        }else{
            $new_entry = "INSERT INTO user (user_fullname,user_email,user_pass,user_name,actiavation_token,address,university,age,gender,birthday) VALUES('$fullname','$email','$password','$username','$token','$adress','$uni','$age','$gender','$birthday')";
            if($this->con->query($new_entry)==TRUE){
             $to_email = $email;
             $subject = "Account verification";
             $body = "Hi {$fullname} get verified http://localhost/assignmentor/activation.php?token={$token}";
             $headers = "From:jsislove21@gmail.com";
             
             if (mail($to_email, $subject, $body, $headers)) {
                 echo "Email successfully sent to $to_email...";
             } else {
                 echo "Email sending failed...";
             }
             header('location:signin.php?activation=1');
             // $to_email = $email;
             // $msg = "Hi get verified http://localhost/assignmentor/ativation.php?token={$token}";  
             //mail($to_email,"Account Verification",$msg);
             //header('location:signin.php?activate_info=1'); 
             //    return '<div class="alert alert-success"><i class="fas fa-check"></i>User Created Successfully >> <a href="index.php">Login</a></div>';
            }
        }
 }

    public function login($email,$password){
        $pre_stmt = $this->con->prepare("SELECT user_id,user_name,user_email,user_pass,user_status FROM user WHERE user_email = ? && user_pass = ?");
        $pre_stmt->bind_param("ss", $email, $password);
        $pre_stmt->execute() or die($this->conn->error);
        $result = $pre_stmt->get_result();
        if($result->num_rows<1){
            return '<div id="demo" class="alert alert-error"><i class="fas fa-times"></i>Password or email incorrect</div>';
        }else{
            $row = $result->fetch_assoc();
            if($row['user_status']=='active'){
                $u_id = $row['user_id'];
                $u_uname = $row['user_name'];
                $u_status = $row['user_status'];
                $_SESSION['u_id'] = $u_id;
                $_SESSION['u_uname'] = $u_uname;
                $_SESSION['u_status'] = $u_status;
                header('location:dashboard.php?uid='.$u_id.'&uname='.$u_uname.'&ustatus='.$u_status.'');
            }else if($row['user_status']=='pending'){
                return '<div class="alert alert-error"><i class="fas fa-times"></i>You have not verified your account</div>'; 
            }else{
                return '<div class="alert alert-error"><i class="fas fa-times"></i>Your have been banned</div>';
            }
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

     public function user_payment($user_id,$solver_id,$ass_id){
        $user_net_point = $this->sumcount();
        if($user_net_point<25){
             return 9;
        }else{
           $sql = "INSERT INTO solver_account (user_id,solver_acc_solver_id,solver_acc_ass_id) VALUES('$user_id','$solver_id','$ass_id')";
        if($this->con->query($sql)===TRUE){
            $sql2 = "UPDATE assignment SET assignment_pay_status='sent' WHERE assignment_id='$ass_id'";
            $res = $this->con->query($sql2);
            return '<div class="alert alert-success"><i class="fas fa-check"></i>Payment Sent Successfully Added</div>'; 
        }else{
            return '<div class="alert alert-error"><i class="fas fa-times"></i>Something Went Wrong</div>';
          }
        }
        
     } 
}

?>