<?php require 'template/header.php'; ?>
<div class="up_section">
    <div class="container">
        <h3 class="text-center my-2">Upload your Latest Product</h3>
        <h4>Assignment ID:9999</h4>
        <h4>Assignment User:John Doe</h4>
        <h4>Assignment Price:30$</h4>
        <h4>Assignment Pay Status:Paid</h4>
    <form class="my-2" action="" method="post">
        <input type="file" name="up_file">
        <label class="custom-file-upload text-center">
             <input type="file"/>
             <i class="fas fa-file"></i> Upload 
        </label>
        <input type="text" class="my-2" name="assignment_comment" id="assignment_comment" placeholder="Emter Comments">
        <input class="btn" type="submit" value="Submit">
    </form>
    </div>
</div>
<?php require 'template/footer.php'; ?>