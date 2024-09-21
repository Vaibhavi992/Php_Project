<?php
include_once ('header.php');
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Manage Services </h2>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <hr>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">#ID</th>
                                    <th style="text-align:center;">Service_Name</th>
                                    <th style="text-align:center;">Total_Service</th>
                                    <th style="text-align:center;">Price</th>
                                    <th style="text-align:center;">Service_Image</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($data)) {
                                    foreach ($data as $service) {
                                        ?>
                                        <tr style="text-align:center;">
                                            <td><?php echo $service->ID ?></td>
                                            <td><?php echo $service->Service_Name ?></td>
                                            <td><?php echo $service->Total_Service ?></td>
                                            <td><?php echo $service->Price ?></td>
                                            <td><img src="upload/serviceimg/<?php echo $service->Service_Image ?>" alt=""
                                                    width="150px"></td>
                                            <td>
                                                <a href="delete?dservice=<?php echo $service->ID ?>" class="btn btn-danger">Delete</a>
                                                <a href="editservice?eservice=<?php echo $service->ID ?>" class="btn btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td align="center" colspan="6">
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