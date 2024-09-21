<?php
include_once ('header.php');
?>

<div class="container">
    <h2>Add Service</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Service Name:</label>
            <input type="text" class="form-control" id="Service_Name" name="Service_Name">
        </div>
        <div class="form-group">
            <label for="total-ser">Total Service:</label>
            <input type="number" class="form-control" id="Total_Service" name="Total_Service">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="Price" name="Price">
        </div>
        <div class="form-group">
            <label for="ser_img">Service Image:</label>
            <input type="file" class="form-control" id="Service_Image" name="Service_Image">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
include_once ('footer.php')
?>