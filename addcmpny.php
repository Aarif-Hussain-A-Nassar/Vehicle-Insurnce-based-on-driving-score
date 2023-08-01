<?php
include("header.php");
?>
 
 <!-- Contact Start -->
  <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase"></h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">Add Insurance Company</span></h1>
                </div>
                <div class="row g-4">
                   
                   
                    <div class="col-md-12">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form method="post">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="cmpname" placeholder="Your Name">
                                            <label for="name">Company Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="name" name="email" placeholder="Your Name">
                                            <label for="name">Company Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="password" placeholder="Your Name">
                                            <label for="name">Company Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="email" name="place" placeholder="Your Email">
                                            <label for="email">Place</label>
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
					  $cmpname=$_POST['cmpname'];
					  $email=$_POST['email'];
					  $password=$_POST['password'];
					  $place=$_POST['place'];
					  $ins_name=$_POST['ins_name'];
					  $details=$_POST['details'];
					  $ins_no=$_POST['ins_no'];
					

					  
					  $ins="insert into company(cmpname,email,password,place) values('$cmpname','$email','$password','$place')";
					  $res=mysqli_query($con,$ins);
					  echo '<script>alert("Succesfully Inserted!")
						  window.location="viewins1.php";
						  </script>';
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