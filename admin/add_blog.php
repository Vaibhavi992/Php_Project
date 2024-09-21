<?php
include_once ('header.php');
?>

<div class="container">
    <h2>Add Blog</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Blog Name:</label>
            <input type="text" class="form-control" id="Blog_Name" name="Blog_Name">
        </div>
        <div class="form-group">
            <label for="Blog-dec">Blog Description:</label>
            <textarea type="text" class="form-control" id="Blog_Description" name="Blog_Description" rows="4" cols="4"></textarea>
        </div>
        <div class="form-group">
            <label for="blog_img">Blog Image:</label>
            <input type="file" class="form-control" id="Image" name="Image">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php 
include_once('footer.php')
?>