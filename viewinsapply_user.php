<?php
include("header.php");
?>
 

                       

                          <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Insurance Details</h6>
                    <h1 class="mb-5">INSURANCE  <span class="text-primary text-uppercase">APPLICATIONS</span></h1>
                </div>
				<div class="row g-4">
					<table class="table">
						<tr>
							<th>#</th>
							<th>Insurance Company</th>
							<th>Insurance id</th>
							<th>Token</th>
							<th>Date</th>
						</tr>
					<?php
					 include("connection.php");
					 session_start();
					 $user=$_SESSION['uid'];
					 $sel = "SELECT * FROM insurance_apply WHERE user_id='$user'";
					 //echo $sel;
					 $res=mysqli_query($con,$sel);
					 $i=1;
					 while ($row=mysqli_fetch_array($res)) 
					 {
					?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row['cmp']; ?></td>
							<td><?php echo $row['ins_id']; ?></td>
							<td><?php echo $row['token']; ?></td>
							<td><?php echo $row['date']; ?></td>
						</tr>
					<?php
					$i++;
					} 
					?>
					</table>
                    
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