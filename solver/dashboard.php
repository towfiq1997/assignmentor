<?php 
session_start();
require 'template/header.php'; 
require 'inc/Functions.php';
$id = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;
$name = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if(!isset($id)){
    header('location:index.php');
}
// if (!empty($id) || !empty($name)) {
//     header('location:index.php');
// }
 ?>
    <div class="timeline-section">
        
  <?php 
    $page = isset($_GET['page'])?$_GET['page']:1;
    $of = ($page-1)*8;
    $posts = new Assignmentor();
    $sql = "SELECT  assignment.assignment_acc_status,assignment.assignment_id,assignment.assignment_title,assignment.assignment_description,assignment.assignment_user,assignment.assignment_price,assignment.p_time,user.user_id,user.user_name FROM assignment INNER JOIN user ON assignment.assignment_user=user.user_id ORDER BY assignment.assignment_id DESC LIMIT $of,8";
    if($excute = $posts->con->query($sql)){
        $count = ceil($excute->num_rows/8);
        while($row = $excute->fetch_assoc()){ 
            $status = $row['assignment_acc_status'];
            ?>
              <div class="single-post my-2">
            <div class="container">
                <div class="card <?php if($status=='taken'){
                                echo 'taken_red';
                                }else{
                                    echo 'nontaken_green';
                                }
                                ?>">
                    <div class="post_title flex my-1">
                        <h2><i class="fas fa-question-circle"></i><?php echo $row['assignment_title'];?></h2>
                        <button type="button" class="btn-loading <?php if($status=='taken'){echo 'taken_btn';}?>" id="applyBtn" data-assid=<?php echo $row['assignment_id']; ?> data-solver=<?php echo $id; ?>>
                            <?php if($status=='taken'){
                                echo 'Taken';
                                }else{
                                    echo 'Apply';
                                }
                                ?>
                        </button>
                    </div>
                    <div class="post_information my-1 flex">
                          <h5><i class="fas fa-user"></i><?php echo $row['user_name']; ?></h5>
                          <h5><i class="fas fa-clock"></i><?php echo $row['p_time']; ?></h5>
                          
                    </div>
                    <div class="post_desc">
                        <p><?php echo $row['assignment_description']; ?></p>
                    </div>
                    <p class="noselect" id="commment_toggle">Comments</p>
                    <div class="post_comment my-2 d_none" id="toogle_comment">
                    <?php
                    $assid = $row['assignment_id'];
                     $sql2 = "SELECT * FROM comments WHERE comment_assignment_id='$assid'";
                     if($excute2 = $posts->con->query($sql2)){
                         if($excute2->num_rows>0){
                            //  $count = $excute2->num_rows;
                            //  echo $count;
                            while($row2 = $excute2->fetch_assoc()){ ?>
                                <div class="single-comment my-1 flex">
                                   <h5><i class="fas fa-user"></i><?php echo $row2['comment_text']."(User)"; ?></h5>
                                   <p><?php echo $row2['comment_commentar']; ?></p>
                                </div>
                           <?php }
                         }
                     }
                    ?>
                    <div class="header_search">
                    <form method="post" class="flex comment_form">
                    <input type="text"   data-id=<?php echo $row['assignment_id']; ?> data-name=<?php echo $name; ?> name="commment">
                    <button class="btn" type="submit">Commment</button>
                    </form>
                </div>
                    </div>
                </div>
                <!-- h -->
            </div>
        </div> 
    
       <?php }
    }
  ?>
    </div>
    <div class="pagination_section flex my-4">
        <?php
        for($i = 1;$i<=$count;$i++){ ?>
           <a href="<?php echo 'dashboard.php?page='.$i ?>"><?php echo $i; ?></a>
      <?php  }
        
        ?>
    </div>
    <?php require 'template/footer.php'; ?>