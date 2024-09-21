<?php
include_once ('header.php');
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Manage Contact </h2>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <hr>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">ID</th>
                                    <th style="text-align:center;">Full_Name</th>
                                    <th style="text-align:center;">Email</th>
                                    <th style="text-align:center;">Phone_Number</th>
                                    <th style="text-align:center;">Message</th>
                                    <th style="text-align:center;">Status</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($data)) {
                                    foreach ($data as $contact) {
                                        ?>
                                        <tr style="text-align:center;">
                                            <td><?php echo $contact->ID ?></td>
                                            <td><?php echo $contact->Full_Name ?></td>
                                            <td><?php echo $contact->Email ?></td>
                                            <td><?php echo $contact->Phone_Number ?></td>
                                            <td><?php echo $contact->Message ?></td>
                                            <td><?php echo $contact->Status ?></td>
                                            <td>
                                                <a href="delete?dcontact=<?php echo $contact->ID ?>"
                                                    class="btn btn-danger">Delete</a>
                                                <!-- <a href="#" class="btn btn-info">Edit</a> -->

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

    <?php
    include_once ('footer.php')
        ?>