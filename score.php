<?php
include("header.php");
?>
 
 <?php
                  session_start();
				  include("connection.php");
				  if(isset($_POST['submit']))
				  {
                    $target_path_file = "uploads/test.csv";
                    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path_file)) {
                       //echo "The file ".  basename( $_FILES['file']['name']). " has been uploaded";
					   
					   $fileHandle = fopen("$target_path_file", "r");
					   
					   $i=0;
					//Loop through the CSV rows.
					while (($row = fgetcsv($fileHandle, 0, ",")) !== FALSE) {
						//Print out my column data.
						//echo $row;
						 if ($i == 0) {
							$i++;
							continue;
							}
							//$i++; 
						

					$a=mysqli_real_escape_string($con,$row[0]);
					$b=mysqli_real_escape_string($con,$row[1]);
					$c=mysqli_real_escape_string($con,$row[2]);
					$d=mysqli_real_escape_string($con,$row[3]);
					$e=mysqli_real_escape_string($con,$row[4]);
					$f=mysqli_real_escape_string($con,$row[5]);
					$g=mysqli_real_escape_string($con,$row[6]);
					$h=mysqli_real_escape_string($con,$row[7]);
					$i=mysqli_real_escape_string($con,$row[8]);
					$j=mysqli_real_escape_string($con,$row[9]);
					$k=mysqli_real_escape_string($con,$row[10]);
					
					date_default_timezone_set('Asia/Kolkata');
					$date = date( 'Y-m-d h:i:s');
					
					mysqli_query($con,"INSERT INTO `log`(`user_id`,`date`, ` Horizontal_Dilution_of_Precision`, ` G(x)`, ` G(y)`, ` G(z)`, ` G(calibrated)`, `Acceleration_Sensor(Total)(g)`, `Acceleration_Sensor(X axis)(g)`, `Acceleration_Sensor(Y axis)(g)`, `Acceleration_Sensor(Z axis)(g)`, `Engine_Load(%)`, `Engine_RPM(rpm)`)
					VALUES('$_SESSION[uid]','$date','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')") or die("ERROR".mysqli_error($con));
							
								$i++;			
						//echo " $i Student  Automatically Add <br>";
						}
                    } else{
                        echo "There was an error uploading the file, please try again!";
                    }
				
					  $u_id=$_SESSION['uname'];

					  
					  //$ins="insert into uploads(file,u_id) values('$target_path_file','$u_id')";
					 // $res=mysqli_query($con,$ins);

                    $python=`python test.py`;
                    //echo $python;
						date_default_timezone_set('Asia/Kolkata');
						$date = date('Y-m-d h:i:s');
						
						include('simplechain1.php');
						
						$myfile = fopen("block1.txt", "r") or die("Unable to open file!");
					  $data=fread($myfile,filesize("block.txt"));
					  //echo $data;
					  fclose($myfile);
						
						$ins="INSERT INTO `result`(`user_id`,`result`,`date`,token) VALUES ('$_SESSION[uid]','$python','$date','$data')";
					 $res=mysqli_query($con,$ins);
					 
					$_SESSION['cc']=mysqli_insert_id($con);
					//$cc=mysqli_insert_id($con);
					 
					 

					//   echo '<script>alert("Succesfully Inserted!")
					// 	  window.location="score.php";
					// 	  </script>';
				  }
				  ?>
                       
 <!-- About Start -->
 <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase"></h6>
                        <h1 class="mb-4">Driving <span class="text-primary text-uppercase">Score</span></h1>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fas fa-tachometer-alt fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" ><?php echo $python ?>%</h2>
                                        <p class="mb-0">Score</p>
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>
                        <form method="post" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="file" class="form-control" id="name" name="file" accept=".csv" placeholder="Your Name">
                                            <label for="name">DRIVING DATA</label>
                                        </div>
                                    </div>
                                  
                                   
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Upload</button>
                                    </div>
                                </div>
                            </form>
							
							
							
							
                 
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/courses-2.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/courses-3.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
			
             <br><br>  
             <br><br>  
             <br><br>  
        <?php
include("footer.php");
?>