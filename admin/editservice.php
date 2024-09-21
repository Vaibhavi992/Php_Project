<?php
include_once ('header.php');
?>

<div class="container">
    <h2>Edit Service</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Edit Service Name:</label>
            <input type="text" value="<?php echo $fetch->Service_Name ; ?>" class="form-control" id="Service_Name" name="Service_Name">
        </div>
        <div class="form-group">
            <label for="total-ser">Edit Total Service:</label>
            <input type="number" class="form-control" value="<?php echo $fetch->Total_Service;?>" id="Total_Service" name="Total_Service">
        </div>
        <div class="form-group">
            <label for="price">Edit Price:</label>
            <input type="number" class="form-control" value="<?php echo $fetch->Price;?>" id="Price" name="Price">
        </div>
        <div class="form-group">
            <label for="ser_img">Change Service Image:</label>
            <input type="file" class="form-control" id="Service_Image" name="Service_Image">
            <img src="upload/serviceimg/<?php echo $fetch->Service_Image;?>" alt="" width="150px">
        </div>

        <button type="submit" name="save" class="btn btn-primary">Save Data</button>
    </form>
</div>

<?php
include_once ('footer.php')
?>