<?php

include("header.php");
?>
 
 <!-- Contact Start -->
  <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase"></h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">Vehicle</span>Details</h1>
                </div>
                <div class="row g-4">
                   
                   
                    <div class="col-md-12">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <table  class="table table-hover">
                            <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Result</th>
                            <th scope="col">Token</th>
                            <th scope="col">Date</th>
                           
                            
<!--                             
                            <th scope="col">Monthly Payment </th>
                            <th scope="col">Claim </th> -->
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            session_start();
                             include("connection.php");
                                $user=$_SESSION['uid'];
                                $sel = "SELECT * FROM `result` ORDER BY `date` DESC;";
                                $res=mysqli_query($con,$sel);
                                $i=1;
								while ($row=mysqli_fetch_array($res)) 
                                 {
									 

									 $sel1 = mysqli_query($con,"SELECT * FROM `user` where id='$row[user_id]'");
                                $res1=mysqli_fetch_array($sel1);
         
                                ?>
                             <tr>
                             
                            <td><?php echo $i; ?></td>
                            <td><?php echo $res1['name'] ?></td>
                            <td><?php echo $row['result']; ?></td>
                            <td><?php echo $row['token']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                           
                            
                            
                            </tr>
                             <?php 
							 $i++;
							 } ?>
    
                            </tbody>
                        </table>
			
                          
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