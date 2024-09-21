<?php
include_once ('header.php');
?>

<!-- testimonial -->
<div class="testimonial">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Testimonial</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div id="myCarousel" class="carousel slide testimonial_Carousel " data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="carousel-caption ">
                           <div class="row">
                              <?php
                              foreach ($data as $testimonial) {
                                 ?>
                                 <div class="col-md-6 margin_boot">
                                    <div class="test_box mb-3">
                                       <div class="row">
                                          <div class="col-lg-4">
                                             <img
                                                   src="../admin/upload/testimonialimg/<?php echo $testimonial->tst_img ?>"
                                                   width="100%"" alt="Image" />
                                          </div>
                                          <div class="col-lg-8">
                                             <h4><?php echo $testimonial->Cust_Name; ?></h4>
                                             <p><?php echo $testimonial->Feedback ?></p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                              }
                              ?>
                           </div>
                        </div>
                     </div>
                  </div>
                 
                  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                  </a>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
   <hr>
   <div class="col-md-6 offset-3">
      <form id="request" method="POST" class="main_form" action="" enctype="multipart/form-data">
         <div class="row">
            <div class="col-md-12 ">
               <input class="contactus" placeholder="Upload Image" type="file" name="tst_img">
            </div>
            <div class="col-md-12">
               <input class="contactus" placeholder="Your Name" type="text" name="Cust_Name">
            </div>
            <div class="col-md-12">
               <textarea class="textarea" placeholder="Feedback" type="text" name="Feedback"
                  Message="Feedback"></textarea>
            </div>
            <div class="col-sm-col-xl-6 col-lg-6 col-md-6 col-sm-12">
               <button class="btn btn-primary mb-5" type="submit" name="submit">Submit Feedback</button>
            </div>
         </div>
      </form>
   </div>
   <!-- end testimonial -->
</div>
<?php
include_once ('footer.php');
?>
</body>

</html>