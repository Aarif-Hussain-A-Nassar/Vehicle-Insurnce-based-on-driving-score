<?php
include("header.php");
?>
 
 <!-- Contact Start -->
  <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase"></h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">Register</span>Here</h1>
                </div>
                <div class="row g-4">
                   
                   
                    <div class="col-md-12">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form method="post">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="email" name="place" placeholder="Your Email">
                                            <label for="email">Your Place</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="subject" name="password" placeholder="Subject">
                                            <label for="subject">Password</label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <?php
				  include("connection.php");
				  if(isset($_POST['submit']))
				  {
					  $name=$_POST['name'];
					  $email=$_POST['email'];
					  $place=$_POST['place'];
					  $password=$_POST['password'];
					  
					  $ins="insert into user(name,email,place,password) values('$name','$email','$place','$password')";
					  $res=mysqli_query($con,$ins);
					  echo '<script>alert("Succesfully Registered!")
						  window.location="login.php";
						  </script>';
				  }
				  ?>
                  <br>
                            <div align="center">
                            <p>Already Registered?</p>
                            <a href="login.php">Login Here</a>
                            </div>
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