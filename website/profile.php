<?php
if (isset($_SESSION['uid'])) {
} else {
    echo "<script>
		window.location='index'
		</script>";
}

include_once ('header.php');
?>


<div class="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>My Profile</h2>
                    <h4>Your Details</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="myCarousel" class="carousel slide testimonial_Carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="carousel-caption">
                                    <div class="row">
                                        <div class="offset-md-2 col-md-8 margin_boot">
                                            <div class="test_box" style="border-radius:50px">
                                                <div class="row">
                                                    <div class="col-md-4 offset-4">
                                                        <img src="../admin/upload/userimg/<?php echo is_object($fetch) ? htmlspecialchars($fetch->profileImg) : 'N/A'; ?>"alt="#" width="100%" />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h4>Name: <?php echo is_object($fetch) ? htmlspecialchars($fetch->username) : 'N/A'; ?></h4>
                                                        <h4>Email: <?php echo is_object($fetch) ? htmlspecialchars($fetch->email) : 'N/A'; ?></h4>
                                                        <h4><?php echo $fetch->gender; ?></h4>
                                                    </div>
                                                </div>
                                                <a href="editprofile?eprofile=<?php echo $fetch->ID ;?>" name="save" class="btn btn-primary">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end testimonial -->
</div>
<?php
include_once ('footer.php');
?>
</body>

</html>