<?php
session_start();
include 'template/header.php'; 
if(isset($_POST['submit'])){
    $title = $_POST['post_title'];
    $desc = $_POST['post_desc'];
    $wordcount = $_POST['word_count'];
    $price = $_POST['price'];
    if($title==NULL || $desc ==NULL || $wordcount==NULL || $price==NULL){
        $error = '<div class="alert alert-error"><i class="fas fa-times"></i>Field Must Not Be Empty</div>';
    }else{
        $uid = $_SESSION['u_id'];
        $addpost = $assignmentor->addpost($title ,$desc,$wordcount,$price,$uid);
       
    }
 }
?>

    <div class="breadcumb_section my-2">
        <div class="container text-center">
            <h3>Home / Addpost</h3>
        </div>
    </div>
   <div class="addpost_section my-2">
       <div class="container">
       <?php
             if(isset($error)){
                echo $error;
            }
            if(isset($addpost)){
                echo $addpost;
            }
            ?>
        <form action="" method="POST">
            <label for="description">Post Title</label>
            <input class="my-1" type="text" name="post_title" placeholder="Enter Title">
            <label for="Word">Word Count</label>
            <input class="my-1" type="number" name="word_count" placeholder="Enter Word Count" id="word_count">
            <label for="description">Price</label>
            <input class="my-1" type="number" name="price" placeholder="Enter Price" id="price">
            <label for="post_des">Description</label>
            <textarea class="my-1" name="post_desc" id="" cols="30" rows="20"></textarea>
            <input type="submit" name="submit" value="Submit">
       </form>
       <script>
           const word = document.getElementById("word_count");
           const price = document.getElementById("price");

          word.addEventListener("change", () => {
          const priceValue = word.value*0.1;
          price.value = Math.round(priceValue);
          });
       </script>
       </div>
   </div> 
   <?php include 'template/footer.php'; ?>