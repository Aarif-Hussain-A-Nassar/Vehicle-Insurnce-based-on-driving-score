<?php
include("header.php");
?>
 
 <!-- Contact Start -->
  <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase"></h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">ENTER VEHICLE DETAILS</span></h1>
                </div>
                <div class="row g-4">
                   
                   
                    <div class="col-md-12">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form method="post">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="model" placeholder="Your Name">
                                            <label for="name">CAR MODEL</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="email" name="v_no" placeholder="Your Email">
                                            <label for="email">VEHICLE NO:</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" name="ow_name" placeholder="Subject">
                                            <label for="subject">OWNER NAME:</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" name="ch_no" placeholder="Subject">
                                            <label for="subject">CHASIS NO:</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" name="fuel" placeholder="Subject">
                                            <label for="subject">FUEL TYPE:</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" name="ins_no" placeholder="Subject">
                                            <label for="subject">INSURANCE NO:</label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <?php
							  session_start();
							  include("connection.php");
							  if(isset($_POST['submit']))
							  {
								  $v_no=$_POST['v_no'];
								  $ow_name=$_POST['ow_name'];
								  $ch_no=$_POST['ch_no'];
								  $fuel=$_POST['fuel'];
								  $ins_no=$_POST['ins_no'];
								  $model=$_POST['model'];
								  $u_id=$_SESSION['uid'];
									
									
								   $query = mysqli_query($con,"SELECT COUNT(*) AS cc FROM vehicle_details WHERE u_id = '$_SESSION[uid]'");
								  $row = mysqli_fetch_array($query);
								  //echo $row;
								  if ($row['cc'] >= 1) {
									echo "<script>alert('Data has already been added.');
								  window.location='addvehicle.php';
								  </script>";
								  }else {
								  $ins="insert into vehicle_details(v_no,ow_name,ch_no,fuel,ins_no,model,u_id) values('$v_no','$ow_name','$ch_no','$fuel','$ins_no','$model','$u_id')";
								  $res=mysqli_query($con,$ins);
								  
								  $_SESSION['data_added'] = true;
								  
								  echo '<script>alert("Succesfully Inserted!")
									  window.location="viewvehicle.php";
									  </script>';
								  }
							  }
							?>
                        </div>
                    </div>
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