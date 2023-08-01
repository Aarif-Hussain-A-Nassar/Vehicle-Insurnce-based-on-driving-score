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
							<th>User</th>
							<th>Token</th>
							<th>Date</th>
						</tr>
					<?php
					 include("connection.php");
					 session_start();
					 $user=$_SESSION['cid'];
					 $sel = "SELECT * FROM insurance_apply WHERE cmp='$_SESSION[cname]'";
					 //echo $sel;
					 $res=mysqli_query($con,$sel);
					 $i=1;
					 while ($row=mysqli_fetch_array($res)) 
					 {
						 $sel1=mysqli_query($con,"SELECT * FROM `company` WHERE `cmp`='$row[ins_id]'");
						 $row1=mysqli_fetch_array($sel1);
						 
						 $sel2=mysqli_query($con,"SELECT * FROM `user` WHERE `id`='$row[user_id]'");
						 $row2=mysqli_fetch_array($sel2);
					?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row2['name']; ?></td>
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