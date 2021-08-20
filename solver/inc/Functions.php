<?php

class Assignmentor{
    public $con;
    function __construct(){
        include_once("db.php");
		$db = new Database();
		$this->con = $db->connect();
    }
     public function insert($sql){
        if($this->con->query($sql)===TRUE){
            return '<div class="alert alert-success"><i class="fas fa-check"></i>Inserted Successfully</div>'; 
        }else{
            return '<div class="alert alert-error"><i class="fas fa-times"></i>Something Went Wrong</div>';
        }
    }
    public function changepass($password,$token){
        $sql = "SELECT * FROM solver where forget_token='$token'";
        $res = $this->con->query($sql);
        if($res->num_rows>0){
            $row = $res->fetch_assoc();
            $id = $row['user_id'];
            $updatepass = "UPDATE solver SET user_pass='$password' WHERE user_id='$id'";
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
            $body = "Hi follow the link to reset passowrd http://localhost/assignmentor/solver/password_change.php?token={$token}";
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
    public function applyreq($assignmentid,$solverid){
        $sql = "SELECT * FROM assignment WHERE assignment_id='$assignmentid'";
        $check = $this->con->query($sql);
        if($check->num_rows>0){
            $row = $check->fetch_assoc();
            $assid = $row['assignment_id'];
            if($row['assignment_acc_status']=='not_taken'){
                $updatesql = "UPDATE assignment SET assignment_solver='$solverid',
                assignment_solv_status='solving',
                assignment_acc_status='taken' WHERE assignment_id='$assid'";
                //$update = $this->con->query($updatesql);
                if($this->con->query($updatesql)===TRUE){
                    sleep(1);
                     echo json_encode(array(
                    "response"=>"success"
                ));
                }else{
                     echo json_encode(array(
                    "response"=>"server_error"
                ));
                }
            }else{
                 echo json_encode(array(
                    "response"=>"taken"
                ));
            }

        }else{
             echo json_encode(array(
                    "response"=>"not_found"
                ));
        }
    }
     public function signup($email,$username,$firstname,$lastname,$password,$adress,$uni,$age,$gender,$department,$finale_file,$mobileno){
        $checksql = "SELECT solver_email FROM solver WHERE solver_email='$email' AND solver_username='$username'";
        $chk_res = $this->con->query($checksql);
        $token = bin2hex(random_bytes(15));
        $userid = rand(1,1000);
        if($chk_res->num_rows>0){
            return '<div class="alert alert-error"><i class="fas fa-times"></i>User Already been registered</div>';
        }else{
            $new_entry = "INSERT INTO solver (solver_id,solver_username,solver_email,solver_pass,actiavation_token,address,university,age,gender,first_name,last_name,profilepic,department,mobileno) VALUES('$userid','$username','$email','$password','$token','$adress','$uni','$age','$gender','$firstname','$lastname','$finale_file','$department','$mobileno')";
            // $new_entry = "INSERT INTO solver(solver_id,solver_username,solver_email,solver_pass,solver_status) VALUES('676','LL','MM','NN','pending')";
            // $query = $this->con->query($new_entry);

            if($this->con->query($new_entry)==TRUE){
             $to_email = $email;
             $subject = "Account verification";
             $body = "Hi {$fullname} get verified http://localhost/assignmentor/solver/activation.php?token={$token}";
             $headers = "From:jsislove21@gmail.com";
             
             if (mail($to_email, $subject, $body, $headers)) {
                 echo "Email successfully sent to $to_email...";
             } else {
                 echo "Email sending failed...";
             }
             header('location:index.php?activation=1');
            }
            // $entry = "INSERT INTO solver () VALUES('9')";
            // $query = $this->con->query($entry);
        }
 }

    public function login($email,$password){
        $pre_stmt = $this->con->prepare("SELECT solver_id,solver_username,solver_email,solver_pass,solver_status FROM solver WHERE solver_email = ? && solver_pass = ?");
        $pre_stmt->bind_param("ss", $email, $password);
        $pre_stmt->execute() or die($this->conn->error);
        $result = $pre_stmt->get_result();
        if($result->num_rows<1){
            return '<div id="demo" class="alert alert-error"><i class="fas fa-times"></i>Password or email incorrect</div>';
        }else{
            $row = $result->fetch_assoc();
            if($row['solver_status']=='active'){
                $id = $row['solver_id'];
                $username = $row['solver_username'];
                $status = $row['solver_status'];
                $_SESSION['id'] =  $id;
                $_SESSION['username'] = $username;
                $_SESSION['status'] = $status;
                header('location:dashboard.php');
            }else if($row['solver_status']=='pending'){
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

     public function user_payment($user_id,$solver_id,$ass_id,$trxid,$word_count,$price){
        $sql = "INSERT INTO admin_account (admin_ass_id,admin_page_count,admin_user_id,admin_amount,admin_solver_id,trxid) VALUES('$ass_id','$word_count','$user_id','$price','$solver_id','$trxid')";
        if($this->con->query($sql)===TRUE){
            $sql2 = "UPDATE assignment SET assignment_pay_status='sent' WHERE assignment_id='$ass_id'";
            $res = $this->con->query($sql2);
            return '<div class="alert alert-success"><i class="fas fa-check"></i>Payment Deposite Successfully Added</div>'; 
        }else{
            return '<div class="alert alert-error"><i class="fas fa-times"></i>Something Went Wrong</div>';
        }
     } 
}

?>