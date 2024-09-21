<?php
include_once ('header.php');
?>


<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Manage Testimonial </h2>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <hr>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">#ID</th>
                                    <th style="text-align:center;">Image</th>
                                    <th style="text-align:center;">Cust_Name</th>
                                    <th style="text-align:center;">Feedback</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($data)) {
                                    foreach ($data as $testimonial) {
                                        ?>
                                        <tr style="text-align:center;">
                                            <td><?php echo $testimonial->ID ?></td>
                                            <td><img src="upload/testimonialimg/<?php echo $testimonial->tst_img ?>" width="80px"></td>
                                            <td><?php echo $testimonial->Cust_Name ?></td>
                                            <td><?php echo $testimonial->Feedback ?></td>
                                            <td>
                                                <a href="delete?dtestimonial=<?php echo $testimonial->ID ?>" class="btn btn-danger">Delete</a>
                                                <!-- <a href="#" class="btn btn-info">Edit</a> -->
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td align="center" colspan="5">
                                            <h3>Data Not Found</h3>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>

<?php
include_once ('footer.php')
    ?>