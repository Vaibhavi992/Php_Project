<?php
include_once ('header.php');
?>

<div class="container">
    <h2>Edit Blog</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Edit Blog Name:</label>
            <input type="text" value="<?php echo $fetch->Blog_Name;?>" class="form-control" id="Blog_Name" name="Blog_Name">
        </div>
        <div class="form-group">
            <label for="Blog-dec">Edit Blog Description:</label>
            <input type="text" class="form-control" value="<?php echo $fetch->Blog_Description;?>" id="Blog_Description" name="Blog_Description" rows="4" cols="4"></input>
        </div>
        <div class="form-group">
            <label for="blog_img">Edit Blog Image:</label>
            <input type="file" class="form-control" id="Image" name="Image">
            <img src="upload/blogimg/<?php echo $fetch->Image;?>" alt="" width="150px">

        </div>
        
        <button type="submit" name="save" class="btn btn-primary">Save Data</button>
    </form>
</div>

<?php 
include_once('footer.php')
?>