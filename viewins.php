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
					
				  $sel = "SELECT vehicle_details.*, insurance_details.* FROM vehicle_details JOIN insurance_details ON vehicle_details.ins_no = insurance_details.insurance_id;";
				  //echo $sel;
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
                            <h4 class="mb-3"><?php echo $row['insurance_company']; ?></h4>
                            <p><b>Insurance No: </b><?php echo $row['ins_no']; ?></p>
                            <p><b>Status: </b><?php echo $row['payment_status']; ?></p>
                            <p class="text-body mb-0">Terms & Conditions Apply</p>
                        </a><br>
						<center><a href="pay.php?id=<?php echo $row['ins_no']; ?> " class="btn btn-danger" style='margin-right: 36px;'>Pay</a>
						<a href="apply.php?id=<?php echo $row['ins_no']; ?>&c=<?php echo $row['insurance_company']; ?>" class="btn btn-secondary">Claim</a></center>
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