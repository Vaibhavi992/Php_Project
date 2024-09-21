<?php include_once ('header.php'); ?>

<footer id="contact mt-5 mb-5 bg-white">
    <div class="footer">
        <div class="container">
            <class class="row">
                <div class="col-md-6">
                    <div class="titlepage">
                        <h2>Appointment For Service </h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="location_icon">
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> Locatins</li>
                        <li><a href="#"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></a> +91
                            9722310904
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <form id="request" method="POST" class="main_form" action="">
                        <div class="row">
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="Full Name" type="text" name="Full_Name"
                                    required="Pls Enter Full Name">
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Email" type="email" name="Email"
                                    required="Pls Enter Email">
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Phone Number" type="number" name="Phone_Number"
                                    required="Pls Enter Phone Number">
                            </div>
                            <div class="col-sm-col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <button class="send_btn" type="submit" name="submit">Submit Data</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</footer >


    <?php
    include_once ('footer.php');
    ?>
    </body>

    </html>