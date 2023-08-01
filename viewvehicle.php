<?php
include("header.php");
?>
 
 <!-- Contact Start -->
  <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase"></h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">Vehicle</span> Details</h1>
                </div>
                <div class="row g-4">
                   
                   
                    <div class="col-md-12">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <table  class="table table-hover">
                            <thead>
                            <tr>
							<th scope="col">ID:</th>
                            <th scope="col">CAR MODEL</th>
                            <th scope="col">VEHICLE NO:</th>
                            <th scope="col">OWNER NAME:</th>
                            <th scope="col">CHASIS NO:</th>
                            <th scope="col">FUEL TYPE:</th>
                            <th scope="col">INSURANCE NO:</th>
                           
                            
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
                                $sel = "SELECT * FROM vehicle_details WHERE u_id='$user'";
                                $res=mysqli_query($con,$sel);
                                $i=1;
								while ($row=mysqli_fetch_array($res)) 
                                 {
         
                                ?>
                             <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['model']; ?></td>
                            <td><?php echo $row['v_no']; ?></td>
                            <td><?php echo $row['ow_name']; ?></td>
                            <td><?php echo $row['ch_no']; ?></td>
                            <td><?php echo $row['fuel']; ?></td>
                            <td><?php echo $row['ins_no']; ?></td>
                           
                            
                            
                            </tr>
                             <?php 
							 $i++;
							 } 
							 ?>
    
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