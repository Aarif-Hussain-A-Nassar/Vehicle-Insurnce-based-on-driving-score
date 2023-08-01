<?php
include("header.php");
?>
 

                       

                          <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Insurance company Details</h6>
                    <h1 class="mb-5">INSURANCE  <span class="text-primary text-uppercase">DETAILS</span></h1>
                </div>
<div class="row g-4">

                <?php
                             include("connection.php");
                                
                                $sel = "SELECT * FROM company";
                                $res=mysqli_query($con,$sel);
                                while ($row=mysqli_fetch_array($res)) 
                                 {
         
                                ?>
                
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="service-item rounded" >
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-hotel fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3"><?php echo $row['cmpname']; ?></h5>
                            <h6 class="mb-3"><b>Email:</b><?php echo $row['email']; ?></h6>
                            <p><b>Place:</b><?php echo $row['place']; ?></p>
                        </a><br>
						
                    </div>
                   
                    
                    <?php } ?>
                    
                </div>
            </div>
        </div>
        <!-- Service End -->
			
             <br><br>  
             <br><br>  
             <br><br>  
        <?php
include("footer.php");
?>