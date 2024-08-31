<?php
session_start();
include("dis_header.php");
include("connect.php");



?>
		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">ALL PRESCRIPTION DETAIL REPORT</a>
										
										<h4><br/>Simplifying Healthcare, Impacting Lives.</h4></center>
										
									</div>
									
									<div class="clearfix"> </div>
								</div>
							</div>
		<!-- team-grids-caption -->

		<div class="contact">
				<div class="container">
					
					<div class="row">
						
						<div class="col-md-12">
						<?php
						
						$disid=$_SESSION['disid'];
						$res1=mysql_query("select * from prescription_detail where city=(select city from distributor_regis where dis_id='$disid')");
						
						if(mysql_num_rows($res1)>0)
						{
							echo "<table class='table table-bordered'>
									<tr>
										<th>PRESCRIPTION ID</th>
										<th>UPLOAD DATE</th>
										<th>CUSTOMER NAME</th>
										<th>DELIEVERY ADDRESS</th>
										<th>CITY</th>
										<th>MOBILE NO</th>
										
										<th>PRESCRIPTION IMAGE</th>
									
									</tr>";
							while($r1=mysql_fetch_array($res1))
							{
								echo "<tr>";
								echo "<td>$r1[0]</td>";
								echo "<td>$r1[1]</td>";
								$res2=mysql_query("select * from customer_detail where customer_id='$r1[2]'");
								$r2=mysql_fetch_array($res2);
								echo "<td>$r2[1]</td>";
								echo "<td>$r1[3]</td>";
								echo "<td>$r1[4]</td>";
								echo "<td>$r1[5]</td>";
								
								echo "<td><a href='$r1[6]' target='_blank'><img src='$r1[6]' style='width:150px; height:150px;'></a></td>";
								
								echo "</tr>";
							}
							echo "</table>";
						}else{
							echo "<h2>No New Record Found</h2><br/><br/><br/><br/><br/><br/>";
						}
						
						?>
						</div>
					</div>
					<!----- contact-grids ----->		
					
					
				</div>
			</div>
		<!-- /Contact -->
		</div>
		


<?php
include("footer.php");
?>