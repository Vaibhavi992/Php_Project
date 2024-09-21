<?php
include_once ('header.php');
?>


<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Manage Users </h2>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <hr>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">ID</th>
                                    <th style="text-align:center;">username</th>
                                    <th style="text-align:center;">profileImg</th>
                                    <th style="text-align:center;">gender</th>
                                    <th style="text-align:center;">email</th>
                                    <th style="text-align:center;">password</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($data)) {
                                    foreach ($data as $user_details) {
                                        ?>
                                        <tr style="text-align:center;">
                                            <td><?php echo $user_details->ID ?></td>
                                            <td><?php echo $user_details->username ?></td>
                                            <td><img src="upload/userimg/<?php echo $user_details->profileImg ?>" width="80px">
                                            </td>
                                            <td><?php echo $user_details->gender ?></td>
                                            <td><?php echo $user_details->email ?></td>
                                            <td><?php echo $user_details->password ?></td>
                                            <td>
                                                <a href="delete?duser=<?php echo $user_details->ID ?>" class="btn btn-danger">Delete</a>
                                                <a href="status?status_show=<?php echo $user_details->ID ?>" name="<?php echo $user_details->status ?>" class="btn btn-success"><?php echo $user_details->status ?></a>
                                                <a href="#" class="btn btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td align="center" colspan="7">
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