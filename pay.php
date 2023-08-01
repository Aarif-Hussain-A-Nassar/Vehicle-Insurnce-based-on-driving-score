<?php
include("header.php");
?>

<style>
.a{
	text-align: center;
}
.b{
	text-align: left;
}
</style>
 
 
<?php
	include("connection.php");

	$sel = "SELECT * FROM `insurance_details` WHERE `insurance_id`='$_REQUEST[id]'";
	//echo $sel;
	$res=mysqli_query($con,$sel);
	$row=mysqli_fetch_array($res); 
	
	$sel1="SELECT * FROM `vehicle_details` WHERE `ins_no`='$_REQUEST[id]'";
	$res1=mysqli_query($con,$sel1);
	$row1=mysqli_fetch_array($res1);
	

?>
 
 
<!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
				<h1 class="mb-5">CERTIFICATE OF<span class="text-primary text-uppercase"> INSURANCE</span></h1>
				<h6 class="section-title text-center text-primary text-uppercase">Private Car</h6>
				
            </div>
			<div class="row g-4">
				<table class="table-bordered">
				  <tr>
					<th>Policy No:</th>
					<td colspan='3'><?php echo $row['policy_no']; ?></td>
				  </tr>
				  <tr>
					<th>Insurance ID:</th>
					<td colspan='3'><?php echo $row['insurance_id']; ?></td
				  </tr>
				  <tr>
					<th>Owner Name:</th>
					<td colspan='3'><?php echo $row['owner_name']; ?></td>
				  </tr>
				  <tr>
					<th>Period of Insurance:</th>
					<td colspan='3'><?php echo $row['period']; ?></td>
				  </tr>
				  <tr>
					<th colspan='4' style='background-color: antiquewhite;'><center>Vehicle Details</center></th>
				  </tr>
				  <tr class='a'>
					<th>Vehicle No.</th>
					<th>Car Model</th>
					<th>Chasis No.</th>
					<th>Fuel Type</th>
				  </tr>
				  <tr>
					<td><?php echo $row1['v_no']; ?></td>
					<td><?php echo $row1['model']; ?></td>
					<td><?php echo $row1['ch_no']; ?></td>
					<td><?php echo $row1['fuel']; ?></td>
				  </tr>
				  <tr>
					<th colspan='2'><center>Limitations as to use</center></th>
					<th colspan='2'><center>Current Insurance Amount</center></th>
				  </tr>
				  <tr>
					  <td colspan='2' rowspan='6'>
						The policy covers use of the vehicle for any purpose other than 
						<br>
						a) Hire or Reward <br>
						b) Carriage of Goods (other than samples or personal luggage) <br>

						c) Organized Racing <br>
						
						d) Pace Making <br>

						e) Speed Testing and Reliability Trails <br>

						f) Use in connection with Motor Trade <br>
					  </td>
					  <td>Premium</td>
					  <td>₹ <?php echo $row['premium_amount']; ?>.00</td>
				  </tr>
				  <tr>
				  <?php
					  $number = $row['premium_amount'];
					  $percentage = 9;

					  $result = ($number * $percentage) / 100;
					  $roundedResult = round($result);
				  ?>

					  <td>CGST (9%)</td>
					  <td>₹ <?php echo $roundedResult; ?>.00</td>
				  </tr>
				  <tr>
					  <td>SGST (9%)</td>
					  <td>₹ <?php echo $roundedResult; ?>.00</td>
				  </tr>
				  <tr>
					  <td>Stamp Duty</td>
					  <td>₹ 1.00</td>
				  </tr>
				  <tr>
					  <td>Reciept No</td>
					  <td><?php echo $row['reciept_no']; ?></td>
				  </tr>
				  <tr>
				  <?php
					  $cc = $row['premium_amount']+$roundedResult+$roundedResult+1;
				  ?>
					  <td>Total (Round off)</td>
					  <td><?php echo $cc; ?>.00</td>
				  </tr>
				 
				</table>
                    
            </div>
			
			
			<br><br><br>
							
							
							<!-- Newsletter Start -->
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4">Insurance with <span class="text-primary text-uppercase">Driving Score</span></h4>
								<form method="post">
									<div class="row g-3">
										<?php
										//Execute a query
										$query = "SELECT * FROM `result` WHERE `user_id`='$_SESSION[uid]'";
										$result = mysqli_query($con, $query);

										// Fetch the data
										$values = array();
										while ($row = mysqli_fetch_assoc($result)) {
											$values[] = $row['result'];
										}

										//Calculate the average
										$totalValues = count($values);
										$sum = array_sum($values);
										$average = $totalValues > 0 ? $sum / $totalValues : 0;

										// Display the average
										//echo "Average: " . $average;

										
										
										?>
										
										<div class="col-md-12">
											<div class="form-floating">
												<input type="text" class="form-control" id="name" name="model" placeholder="Your Name" value='<?php echo $average; ?>' readonly>
												<label for="name">Driving Score</label>
											</div>
										</div>
										<?php
										
										$qq = "SELECT * FROM `insurance_details` WHERE `insurance_id`='$_REQUEST[id]'";
										//echo $sel;
										$res=mysqli_query($con,$qq);
										$qw=mysqli_fetch_array($res); 
										
										
										//echo $qw['premium_amount'];
										//echo $average;
										if($average>=80)
										{
											$pre=$qw['premium_amount']-(0.25*$qw['premium_amount']);
										}
										elseif ($average >= 70 && $average < 80) 
										{
											$pre=$qw['premium_amount']-(0.20*$qw['premium_amount']);
										}
										elseif ($average >= 65 && $average < 70) 
										{
											$pre=$qw['premium_amount'];
										}
										elseif ($average >= 60 && $average < 65) 
										{
											$pre=$qw['premium_amount']+(0.50*$qw['premium_amount']);
										}
										elseif ($average >= 60 && $average < 65)
										{
											$pre=$qw['premium_amount']+(0.05*$qw['premium_amount']);
										}
										elseif($average<60)
										{
											$pre=$qw['premium_amount']+(0.15*$qw['premium_amount']);
											//echo $pre;
											//echo $row['premium_amount'];
										}else
										{
										}
										
										
										?>
										
										<table class="table-bordered">
										  <tr class="b">
											<th>Premium</th>
											<td colspan='3'><?php echo $pre; ?></td>
										  </tr>
										  <?php
											  $number = $pre;
											  $percentage = 9;

											  $result = ($number * $percentage) / 100;
											  $roundedResult = round($result);
										  ?>
										  <tr class="b">
											<th>CGST (9%)</th>
											<td colspan='3'>₹ <?php echo $roundedResult; ?>.00</td>
										  </tr>
										  <tr class="b">
											<th>SGST (9%)</th>
											<td colspan='3'>₹ <?php echo $roundedResult; ?>.00</td>
										  </tr>
										  <tr class="b">
											<th>Stamp Duty</th>
											<td colspan='3'>₹ 1.00</td>
										  </tr>
										  <?php
											  $ccc = $pre+$roundedResult+$roundedResult+1;
										  ?>
										  <tr class="b">
											<th>Total (Round off)</th>
											<td colspan='3'><?php echo $ccc; ?>.00</td>
										  </tr>
										</table>
										
									   
										<div class="col-12">
											<button class="btn btn-primary w-100 py-3" name="submit" type="submit">Pay</button>
										</div>
									</div>
								</form>
								
								<?php
							  session_start();
							  include("connection.php");
							  if(isset($_POST['submit']))
							  {
								 
								  $ins="UPDATE `insurance_details` SET `payment_status`='completed' WHERE `insurance_id`='$_REQUEST[id]'";
								  $res=mysqli_query($con,$ins);
								  
								  //$_SESSION['data_added'] = true;
								  
								  echo '<script>alert("Payment Completed!")
									  window.location="viewins.php";
									  </script>';
								  
							  }
							?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Start -->
         </div>
     </div>
        <!-- Service End -->
			
             <br><br>  
             <br><br>  
             <br><br>  
        <?php
include("footer.php");
?>