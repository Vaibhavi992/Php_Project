<?php
include_once ('header.php');
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Manage Blog </h2>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <hr>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">#ID</th>
                                    <th style="text-align:center;">Blog_Name</th>
                                    <th style="text-align:center;">Blog_Description</th>
                                    <th style="text-align:center;">Image</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($data)) {
                                    foreach ($data as $blog) {
                                        ?>
                                        <tr style="text-align:center;">
                                            <td><?php echo $blog->ID ?></td>
                                            <td><?php echo $blog->Blog_Name ?></td>
                                            <td><?php echo $blog->Blog_Description ?></td>
                                            <td><img src="upload/blogimg/<?php echo $blog->Image ?>" alt="" width="100px"></td>
                                            <td>
                                                <a href="delete?dblog=<?php echo $blog->ID; ?>"
                                                    class="btn btn-danger">Delete</a>
                                                <a href="edit_blog?eblog=<?php echo $blog->ID; ?>" class="btn btn-info">Edit</a>
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
    </div>
</div>


<?php
include_once ('footer.php')
    ?>