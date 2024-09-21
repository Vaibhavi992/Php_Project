<?php
if (isset($_SESSION['uid'])) {
}
 else {
    echo "<script>
		window.location='index';
		</script>";
}
include_once ('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 text-center">
                <h1 class="text-primary text-capitalize ">Edit Profile</h1>
            </div>
            <div class="col-md-8 offset-2">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">User Name:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $fetch->username;?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender :</label>
                        <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $fetch->gender;?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $fetch->email;?>">
                    </div>
                    <div class="form-group mb-5">
                        <label for="profileImg">Profile Image :</label>
                        <input type="file" class="form-control" id="profileImg" name="profileImg">
                        <img src="../admin/upload/userimg/<?php echo $fetch->profileImg;?>" alt="">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="save" class="btn btn-primary mb-3">Save Data</button>
                        </div>
                        <div class="col-md-6">
                            <a href="profile" class="btn btn-primary mb-3">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include_once ('footer.php');
?>