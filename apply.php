<?php
session_start();
include("header.php");
include("connection.php");
?>
 
 <!-- Contact Start -->
  <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">INSURANCE POLICY</h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">APPLY INSURANCE</span></h1>
                </div>
                <div class="row g-4">
                   
                   
                    <div class="col-md-12">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form method="post">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <?php
										$q=mysqli_query($con,"SELECT * FROM result WHERE user_id = '$_SESSION[uid]' ORDER BY id DESC LIMIT 1");
										$cc=mysqli_fetch_array($q);
										?>
										<div class="form-floating">
                                            <input type="text" class="form-control" value="<?php echo $cc['result'] ?>" name="score" placeholder="Your Name" readonly>
                                            <label for="name">Driving Score</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select class="form-control" name="reason" required>
												<option value=''>--select vehicle--</option>
												<option>by fire explosion</option>
												<option>by burglary house breaking or target</option>
												<option>by riot and strike</option>
												<option>by accidental external means</option>
												<option>malicious act</option>
												<option>other</option>
											</select>
											<label for="subject">Reason</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="remark" rows="5"></textarea>
                                            <label for="subject">Remarks</label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Get Claim</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                            
				  
				  if(isset($_POST['submit']))
				  {
					  $score=$_POST['score'];
					  $reason=$_POST['reason'];
					  $remark=$_REQUEST['remark'];
					  $uid=$_SESSION['uid'];
					  $ins=$_REQUEST['id'];
					  $c=$_REQUEST['c'];
					  
					  $tok=$score.$reason.$remark.$ins.$uid;
					  
					  
					 
						
						//echo $_REQUEST['c'];
					  
					  $query = mysqli_query($con,"SELECT COUNT(*) AS cc FROM insurance_apply WHERE user_id = '$_SESSION[uid]'");
					  $row = mysqli_fetch_assoc($query);
					  if ($cc >= 2) {
							echo '<script>alert("You have reached your limit.!")
						  window.location="viewins.php";
						  </script>';
						} else {
							
							 include('simplechain.php');

					  $myfile = fopen("block.txt", "r") or die("Unable to open file!");
					  $data=fread($myfile,filesize("block.txt"));
					  //echo $data;
					  fclose($myfile);
						
						date_default_timezone_set('Asia/Kolkata');
						$date = date( 'Y-m-d h:i:s');
					  
					  $ins="INSERT INTO `insurance_apply`(`user_id`, `ins_id`, `reason`, `remarks`, `token`, `date`,cmp) VALUES ('$_SESSION[uid]','$ins','$reason','$remark','$data','$date','$c')";
					  $res=mysqli_query($con,$ins);
					  echo '<script>alert("Succesfully Inserted!")
						  window.location="viewins.php";
						  </script>';
						}
				  }
				  ?>
                        </div>
                    </div>
					<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
						<br><br><br>
						<h3 class="mb-5">Claim<span class="text-primary "> Details</span></h3>
					</div>
					<table class="table-bordered">
					  <tr>
						<th>Driving Score</th>
						<th>% of depreciation</th>
					  </tr>
					  <tr>
						<td>x >= 70%</td>
						<td>Bonus claim(+20%)</td>
					  </tr>
					  <tr>
						<td>x <= 70%</td>
						<td>Claim amount(-20%)</td>
					  </tr>
					  <tr>
						<td>50% < x < 70%</td>
						<td>Claim amount(-20%)</td>
					  </tr>
					</table>
					<p><b>Nb:</b> x denote driving score</p>
                </div>
            </div>
        </div>
        <br><br>
        <br><br>
        <br><br>
        <!-- Contact End -->
        <?php
include("footer.php");
?>